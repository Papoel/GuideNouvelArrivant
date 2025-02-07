<?php

declare(strict_types=1);

namespace App\Tests\Services\Mentor;

use App\Entity\Action;
use App\Entity\Logbook;
use App\Entity\Module;
use App\Entity\Theme;
use App\Entity\User;
use App\Repository\UserRepository;
use App\Services\Mentor\MentorService;
use App\Tests\Utils\UserTestHelper;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use LogicException;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\ParameterBag;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class MentorServiceTest extends TestCase
{
    private UserRepository $userRepository;
    private RequestStack $requestStack;
    private EntityManagerInterface $entityManager;

    /**
     * @throws Exception
     */
    protected function setUp(): void
    {
        // Initialisation des mocks
        $this->userRepository = $this->createMock(originalClassName: UserRepository::class);
        $this->requestStack = $this->createMock(originalClassName: RequestStack::class);
        $this->entityManager = $this->createMock(originalClassName: EntityManagerInterface::class);
    }

    #[Test] public function isLogbookNotAccessibleWhenNoOwner(): void
    {
        $mentor = UserTestHelper::createMentorUser();
        $mentorNni = $mentor->getNni();

        // Créer un carnet sans propriétaire
        $logbook = new Logbook();
        $logbook->setOwner(owner: null); // Aucun apprenant associé

        // Instanciation du service
        $mentorService = new MentorService(
            $this->userRepository,
            $this->requestStack,
            $this->entityManager
        );

        // Vérification que l'accès au carnet est refusé
        self::assertFalse($mentorService->isLogbookAccessibleByMentor(mentorNni: $mentorNni, logbook: $logbook));
    }

    /**
     * @throws Exception
     */
    #[Test]
    public function testIsLogbookAccessibleByMentorReturnsFalseWhenNoMentorMatches(): void
    {
        // Crée un User et lui affecter un mentor
        $user = UserTestHelper::createUser();
        $mentor = UserTestHelper::createMentorUser();

        $user->setMentor(mentor: $mentor);

        // Créer un Logbook et assigner l'apprenti à ce carnet
        $logbook = $this->createMock(originalClassName: Logbook::class);
        $logbook->method('getOwner')->willReturn(value: $user); // Un seul apprenti

        // Instancier le service ou la classe qui contient la méthode à tester
        $service = new MentorService(
            userRepository: $this->userRepository,
            request: $this->requestStack,
            entityManager: $this->entityManager
        );

        // Appeler la méthode et vérifier qu'elle retourne false
        $result = $service->isLogbookAccessibleByMentor(mentorNni: 'H12345', logbook: $logbook);

        // Vérifier que le résultat est false
        $this->assertFalse(condition: $result);
    }

    /**
     * @throws Exception
     */
    #[Test] public function getApprenantLogbooks(): void
    {
        // Créez un Mentor réel avec UserTestHelper
        $mentor = UserTestHelper::createMentorUser();
        $mentorNni = $mentor->getNni();  // Utilisation du NNI du mentor créé

        // Créez un apprenant fictif (mock)
        $apprenantMock = $this->createMock(originalClassName: User::class);

        // Simulez le comportement du repository pour renvoyer un apprenant associé au mentor
        $this->userRepository->method('findApprenantByMentorNni')
            ->with($mentorNni)
            ->willReturn(value: [$apprenantMock]);

        // Instanciation du service avec les mocks
        $mentorService = new MentorService(
            $this->userRepository,
            $this->requestStack,
            $this->entityManager
        );

        // Appel de la méthode
        $apprenants = $mentorService->getApprenantLogbooks(mentorNni: $mentorNni);

        // Vérification que le résultat est bien celui attendu
        self::assertCount(expectedCount: 1, haystack: $apprenants);  // Vérifie qu'il y a un seul apprenant
        self::assertSame(expected: $apprenantMock, actual: $apprenants[0]);  // Vérifie que c'est bien l'apprenant que l'on attend
    }

    #[Test] public function getApprenantLogbooksReturnsEmptyArray(): void
    {
        $mentor = UserTestHelper::createMentorUser();
        $mentorNni = $mentor->getNni();

        // Simuler le comportement du repository pour renvoyer une liste vide
        $this->userRepository->method('findApprenantByMentorNni')
            ->with($mentorNni)
            ->willReturn([]);

        $mentorService = new MentorService(
            $this->userRepository,
            $this->requestStack,
            $this->entityManager
        );

        $apprenants = $mentorService->getApprenantLogbooks($mentorNni);

        self::assertEmpty($apprenants);
        self::assertIsArray($apprenants);
    }

    #[Test] public function isLogbookAccessibleByMentor(): void
    {
        // Créez un Mentor avec UserTestHelper
        $mentor = UserTestHelper::createMentorUser();
        $mentorNni = $mentor->getNni();

        // Créez un apprenant avec UserTestHelper et associez-le à un mentor
        $apprenant = UserTestHelper::createUser(['nni' => 'A12345']);
        $apprenant->setMentor(mentor: $mentor); // Associer le mentor à l'apprenant

        // Créez un Logbook et associez l'apprenant à ce Logbook
        $logbook = new Logbook();
        $logbook->setOwner(owner: $apprenant); // Associer l'apprenant au Logbook

        // Instanciation du service MentorService avec les mocks
        $mentorService = new MentorService(
            $this->userRepository,
            $this->requestStack,
            $this->entityManager
        );

        // Appel de la méthode isLogbookAccessibleByMentor
        $isAccessible = $mentorService->isLogbookAccessibleByMentor(mentorNni: $mentorNni, logbook: $logbook);

        // Vérification que l'accès est autorisé
        self::assertTrue(condition: $isAccessible, message: 'Le mentor devrait avoir accès au carnet de l\'apprenant');

        // Test avec un mentor incorrect (celui qui n'est pas associé à l'apprenant)
        $wrongMentor = UserTestHelper::createMentorUser();
        $isAccessible = $mentorService->isLogbookAccessibleByMentor(mentorNni: $wrongMentor->getNni(), logbook: $logbook);

        // Vérification que l'accès n'est pas autorisé
        self::assertFalse(condition: $isAccessible, message: 'Un mentor non associé ne devrait pas avoir accès au carnet de l\'apprenant');
    }

    /**
     * @throws Exception
     */
    #[Test] public function isLogbookNotAccessibleByMentor(): void
    {
        $mentorNni = 'E54681';

        // Créez un apprenant fictif avec un mentor différent
        $apprenant = $this->createMock(originalClassName: User::class);
        $mentor = $this->createMock(originalClassName: User::class);
        $mentor->method('getNni')->willReturn(value: 'wrongMentorNni');
        $apprenant->method('getMentor')->willReturn(value: $mentor);

        // Créez un carnet fictif
        $logbook = $this->createMock(originalClassName: Logbook::class);
        $logbook->method('getOwner')->willReturn(value: $apprenant);

        // Instanciation du service
        $mentorService = new MentorService(
            userRepository: $this->userRepository,
            request: $this->requestStack,
            entityManager: $this->entityManager
        );

        // Vérifiez que l'accès au carnet est refusé
        self::assertFalse(condition: $mentorService->isLogbookAccessibleByMentor(mentorNni: $mentorNni, logbook: $logbook));
    }

    /**
     * @throws Exception
     */
    #[Test] public function getPadawanData(): void
    {
        $mentor = $this->createMock(User::class);
        $logbook = $this->createMock(Logbook::class);
        $padawan = $this->createMock(User::class);
        $action = $this->createMock(Action::class);

        // Simuler que le padawan est associé au carnet
        $logbook->method('getOwner')->willReturn($padawan);

        // Simuler que le padawan a bien ce mentor
        $padawan->method('getMentor')->willReturn($mentor);

        // Créer des actions fictives pour le carnet
        $actions = [$action];
        $logbook->method('getActions')->willReturn(new ArrayCollection($actions));

        // Simuler la récupération du module et du thème des actions
        $module = $this->createMock(Module::class);
        $module->method('getTheme')->willReturn($this->createMock(Theme::class));
        $action->method('getModule')->willReturn($module);

        // Instanciation du service
        $mentorService = new MentorService(
            userRepository: $this->userRepository,
            request: $this->requestStack,
            entityManager: $this->entityManager
        );

        // Appel de la méthode
        $result = $mentorService->getPadawanData(mentor: $mentor, logbook: $logbook);

        // Vérification du résultat
        self::assertSame(expected: $padawan, actual: $result['padawan']);
        self::assertSame(expected: $logbook, actual: $result['logbook']);
        self::assertIsArray(actual: $result['actionsByTheme']);
    }

    /**
     * @throws Exception
     */
    #[Test] public function getPadawanDataAccessDenied(): void
    {
        $mentor = $this->createMock(originalClassName: User::class);
        $logbook = $this->createMock(originalClassName: Logbook::class);
        $padawan = $this->createMock(originalClassName: User::class);

        // Simuler un padawan sans mentor
        $logbook->method('getOwner')->willReturn(value: $padawan);
        $padawan->method('getMentor')->willReturn(value: null);

        // Instanciation du service
        $mentorService = new MentorService(
            userRepository: $this->userRepository,
            request: $this->requestStack,
            entityManager: $this->entityManager
        );

        // Vérifier que la méthode lève une exception d'accès refusé
        $this->expectException(AccessDeniedException::class);
        $mentorService->getPadawanData(mentor: $mentor, logbook: $logbook);
    }

    /**
     * @throws Exception
     */
    #[Test] public function getPadawanDataThrowsAccessDeniedWhenNoPadawan(): void
    {
        $mentor = $this->createMock(originalClassName: User::class);
        $logbook = $this->createMock(originalClassName: Logbook::class);

        // Simuler un carnet sans propriétaire
        $logbook->method('getOwner')->willReturn(value: null);

        $mentorService = new MentorService(
            userRepository: $this->userRepository,
            request: $this->requestStack,
            entityManager: $this->entityManager
        );

        // Vérifier que la méthode lève une exception d'accès refusé
        $this->expectException(exception: AccessDeniedException::class);
        $this->expectExceptionMessage(message: 'Aucun apprenant associé à ce carnet');
        $mentorService->getPadawanData(mentor: $mentor, logbook: $logbook);
    }

    /**
     * @throws Exception
     */
    #[Test] public function getPadawanDataWithActionsWithoutModuleOrTheme(): void
    {
        $mentor = $this->createMock(User::class);
        $mentor->method('getNni')->willReturn('M12345');

        $logbook = $this->createMock(Logbook::class);
        $padawan = $this->createMock(User::class);

        // Action sans module
        $actionWithoutModule = $this->createMock(Action::class);
        $actionWithoutModule->method('getModule')->willReturn(null);

        // Action avec module, mais sans thème
        $moduleWithoutTheme = $this->createMock(Module::class);
        $moduleWithoutTheme->method('getTheme')->willReturn(null);
        $actionWithModuleWithoutTheme = $this->createMock(Action::class);
        $actionWithModuleWithoutTheme->method('getModule')->willReturn($moduleWithoutTheme);

        // Configurer le padawan
        $padawan->method('getMentor')->willReturn($mentor);

        // Configurer le logbook
        $logbook->method('getOwner')->willReturn($padawan);
        $logbook->method('getActions')->willReturn(new ArrayCollection([
            $actionWithoutModule,
            $actionWithModuleWithoutTheme
        ]));

        $mentorService = new MentorService(
            $this->userRepository,
            $this->requestStack,
            $this->entityManager
        );

        $result = $mentorService->getPadawanData(mentor: $mentor, logbook: $logbook);

        self::assertSame($padawan, $result['padawan']);
        self::assertSame($logbook, $result['logbook']);
        self::assertEmpty($result['actionsByTheme']);
    }

    /**
     * @throws Exception
     */
    #[Test] public function getPadawanDataWithMixedActions(): void
    {
        $mentor = $this->createMock(User::class);
        $mentor->method('getNni')->willReturn('M12345');

        $logbook = $this->createMock(Logbook::class);
        $padawan = $this->createMock(User::class);

        // Action valide avec module et thème
        $theme = $this->createMock(Theme::class);
        $theme->method('getTitle')->willReturn('Theme 1');
        $module = $this->createMock(Module::class);
        $module->method('getTheme')->willReturn($theme);
        $validAction = $this->createMock(Action::class);
        $validAction->method('getModule')->willReturn($module);

        // Action sans module
        $actionWithoutModule = $this->createMock(Action::class);
        $actionWithoutModule->method('getModule')->willReturn(null);

        // Configurer le padawan
        $padawan->method('getMentor')->willReturn($mentor);

        // Configurer le logbook
        $logbook->method('getOwner')->willReturn($padawan);
        $logbook->method('getActions')->willReturn(new ArrayCollection([
            $validAction,
            $actionWithoutModule
        ]));

        $mentorService = new MentorService(
            $this->userRepository,
            $this->requestStack,
            $this->entityManager
        );

        $result = $mentorService->getPadawanData(mentor: $mentor, logbook: $logbook);

        self::assertSame($padawan, $result['padawan']);
        self::assertSame($logbook, $result['logbook']);
        self::assertArrayHasKey('Theme 1', $result['actionsByTheme']);
        self::assertCount(1, $result['actionsByTheme']['Theme 1']);
        self::assertSame($validAction, $result['actionsByTheme']['Theme 1'][0]);
    }

    /**
     * @throws Exception
     */
    #[Test] public function deleteComment(): void
    {
        // 1. Créer un User
        $user = UserTestHelper::createUser();

        // 2. Créer un deuxième User (le mentor)
        $mentor = UserTestHelper::createMentorUser();

        // 3. Affection du mentor à l'utilisateur
        $user->setMentor(mentor: $mentor);

        // Créez un vrai objet Action (pas un mock)
        $action = new Action();

        // Ajouter un commentaire à l'action
        $action->setMentorComment(mentorComment: 'Commentaire du mentor');
        $action->setMentorCommentedAt(mentorCommentedAt: new DateTime()); // Date de commentaire

        // Avant la suppression
        self::assertNotNull($action->getMentorComment()); // Vérifiez que le commentaire existe
        self::assertNotNull($action->getMentorCommentedAt()); // Vérifiez que la date de commentaire est renseignée

        // Simuler la requête
        $request = $this->createMock(originalClassName: Request::class);

        // Créez un mock de ParameterBag pour les attributs de la requête
        $parameterBag = $this->createMock(originalClassName: ParameterBag::class);
        $parameterBag->method('get')->with('actionId')->willReturn(value: $action->getId());

        // Associez le ParameterBag au mock Request
        $request->attributes = $parameterBag;

        // Simuler le comportement de getCurrentRequest()
        $this->requestStack->method('getCurrentRequest')->willReturn(value: $request);

        // Simuler l'EntityManager
        $repositoryMock = $this->createMock(originalClassName: EntityRepository::class);
        $repositoryMock->method('find')->willReturn(value: $action);

        $this->entityManager->method('getRepository')->willReturn(value: $repositoryMock);

        // Instanciation du service
        $mentorService = new MentorService(
            userRepository: $this->userRepository,
            request: $this->requestStack,
            entityManager: $this->entityManager
        );

        // Ajoutez des attentes sur la méthode persist
        $this->entityManager->expects($this->once())
            ->method(constraint: 'persist')
            ->with($this->equalTo($action))  // Vérifie que persist est appelé avec l'action correcte
            ->willReturn(null);

        $this->entityManager->expects($this->once())
            ->method(constraint: 'flush')
            ->willReturn(null);

        // Appel de la méthode deleteComment
        $mentorService->deleteComment();

        // Après la suppression, vérifiez l'état de l'objet Action
        self::assertNull($action->getMentorComment()); // Vérifiez que le commentaire est supprimé
        self::assertNull($action->getMentorCommentedAt()); // Vérifiez que la date de commentaire est réinitialisée à null
    }

    #[Test] public function deleteCommentThrowsLogicExceptionWhenNoRequest(): void
    {
        $this->requestStack->method('getCurrentRequest')->willReturn(value: null); // Simuler une requête nulle

        $mentorService = new MentorService(
            userRepository: $this->userRepository,
            request: $this->requestStack,
            entityManager: $this->entityManager
        );

        $this->expectException(exception: LogicException::class);
        $this->expectExceptionMessage(message: 'Impossible de récupérer la requête actuelle.');
        $mentorService->deleteComment();
    }

    /**
     * @throws Exception
     */
    #[Test] public function deleteCommentThrowsAccessDeniedWhenActionNotFound(): void
    {
        // Créer un mock pour Request
        $requestMock = $this->createMock(originalClassName: Request::class);

        // Simuler un attribut 'actionId' dans la requête
        $parameterBagMock = $this->createMock(originalClassName: ParameterBag::class);
        $parameterBagMock->method('get')->willReturn(value: null);  // Simuler l'absence de 'actionId'

        // Assigner les attributs simulés à la requête
        $requestMock->attributes = $parameterBagMock;

        // Simuler le comportement de getCurrentRequest
        $this->requestStack->method('getCurrentRequest')->willReturn(value: $requestMock);

        // Simuler l'EntityManager et le repository retournant null pour find()
        $repositoryMock = $this->createMock(originalClassName: EntityRepository::class);
        $repositoryMock->method('find')->willReturn(value: null); // Simuler une action introuvable

        $this->entityManager->method('getRepository')->willReturn(value: $repositoryMock);

        // Instancier le service
        $mentorService = new MentorService(
            userRepository: $this->userRepository,
            request: $this->requestStack,
            entityManager: $this->entityManager
        );

        // Attendre l'exception AccessDeniedException
        $this->expectException(exception: AccessDeniedException::class);
        $this->expectExceptionMessage(message: 'Une erreur est survenue lors de la récupération de l\'action');

        // Appeler deleteComment
        $mentorService->deleteComment();
    }
}
