<?php

declare(strict_types=1);

namespace App\Tests\Services;

use App\Entity\Action;
use App\Entity\Logbook;
use App\Entity\LogbookArchive;
use App\Entity\Module;
use App\Entity\Theme;
use App\Entity\User;
use App\Repository\LogbookArchiveRepository;
use App\Repository\LogbookRepository;
use App\Repository\UserRepository;
use App\Services\Admin\Users\UserDeletionService;
use App\Tests\Utils\UserTestHelper;
use Doctrine\ORM\EntityManagerInterface;
use PHPUnit\Framework\Attributes\Test;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Tests du flux de suppression d'utilisateur.
 *
 * Intention : la suppression d'un compte ne doit JAMAIS détruire la preuve du
 * parcours de compagnonnage. Le service doit donc, dans la même transaction :
 *  1. figer chaque carnet dans une archive (identité, tuteur, contenu, PDF) ;
 *  2. supprimer l'utilisateur et ses données liées.
 *
 * Couvre aussi la régression du bug historique : deleteUserOnly tentait
 * setUser(null) sur actions.user_id NOT NULL, ce qui plantait la suppression
 * dès qu'un utilisateur avait des actions.
 */
class UserDeletionServiceTest extends KernelTestCase
{
    private EntityManagerInterface $entityManager;
    private UserDeletionService $deletionService;
    private UserRepository $userRepository;
    private LogbookRepository $logbookRepository;
    private LogbookArchiveRepository $archiveRepository;

    protected function setUp(): void
    {
        parent::setUp();
        $kernel = self::bootKernel();
        $container = $kernel->getContainer();

        $this->entityManager = $container->get(id: 'doctrine')->getManager();
        $this->deletionService = $container->get(UserDeletionService::class);
        $this->userRepository = $this->entityManager->getRepository(User::class);
        $this->logbookRepository = $this->entityManager->getRepository(Logbook::class);
        $this->archiveRepository = $this->entityManager->getRepository(LogbookArchive::class);

        $this->entityManager->beginTransaction();
    }

    protected function tearDown(): void
    {
        $this->entityManager->rollback();
        $this->entityManager->close();
        parent::tearDown();
    }

    /**
     * Scénario de l'incident client : Pascal a un carnet rempli (actions +
     * commentaires + visas). Sa suppression doit :
     *  - créer une archive complète AVANT la suppression,
     *  - supprimer l'utilisateur, son carnet et ses actions,
     *  - ne plus jamais échouer sur la contrainte actions.user_id NOT NULL.
     */
    #[Test] public function deleteUserArchivesLogbookThenDeletesUser(): void
    {
        // Arrange : Pascal + carnet + action complète
        $owner = UserTestHelper::createUser(['firstname' => 'Pascal', 'lastname' => 'Dupont']);
        $this->persistUserWithDependencies($owner);
        $logbook = $this->createLogbookWithAction($owner);

        $actor = UserTestHelper::createAdminUser();
        $this->entityManager->persist($actor);
        $this->entityManager->flush();

        $ownerId = $owner->getId();
        $logbookId = $logbook->getId();
        $actionId = $logbook->getActions()->first()?->getId();

        // Act : l'assistante supprime l'utilisateur
        $this->deletionService->deleteUserOnly($owner, $actor);

        // Assert : l'utilisateur, son carnet et ses actions ont disparu
        self::assertNull($this->userRepository->find($ownerId), 'L\'utilisateur doit être supprimé.');
        self::assertNull($this->logbookRepository->find($logbookId), 'Le carnet doit être supprimé.');
        self::assertNull($this->entityManager->getRepository(Action::class)->find($actionId), 'L\'action doit être supprimée.');

        // ... mais une archive complète les remplace
        $archives = $this->archiveRepository->findAll();
        self::assertCount(1, $archives, 'Une archive du carnet doit avoir été créée.');

        $archive = $archives[0];
        self::assertSame('Pascal DUPONT', $archive->getOwnerFullname());
        self::assertSame($actor->getFullname(), $archive->getArchivedBy());
        self::assertNotEmpty($archive->getPayload()['themes'], 'Le payload doit contenir les thèmes.');
        self::assertNotNull($archive->getPdf(), 'Le PDF probant doit être conservé.');
        self::assertNotNull($archive->getExpiresAt());
    }

    /**
     * Un utilisateur sans carnet doit pouvoir être supprimé proprement,
     * sans créer d'archive inutile.
     */
    #[Test] public function deleteUserWithoutLogbookCreatesNoArchive(): void
    {
        $user = UserTestHelper::createUser();
        $this->persistUserWithDependencies($user);
        $this->entityManager->flush();
        $userId = $user->getId();

        $this->deletionService->deleteUserOnly($user);

        self::assertNull($this->userRepository->find($userId));
        self::assertCount(0, $this->archiveRepository->findAll(), 'Aucun carnet => aucune archive.');
    }

    /**
     * Régression : un utilisateur qui possède des actions ne doit plus faire
     * échouer la suppression (bug setUser(null) sur colonne NOT NULL).
     */
    #[Test] public function deleteUserWithActionsDoesNotFail(): void
    {
        $owner = UserTestHelper::createUser();
        $this->persistUserWithDependencies($owner);
        $this->createLogbookWithAction($owner);
        $this->entityManager->flush();

        $ownerId = $owner->getId();

        // Avant le fix : exception "Column 'user_id' cannot be null" au flush
        $this->deletionService->deleteUserOnly($owner);

        self::assertNull($this->userRepository->find($ownerId));
    }

    /**
     * « Supprimer le carnet » : archive + suppression des carnets SEULEMENT,
     * l'utilisateur reste en base.
     */
    #[Test] public function deleteLogbooksOnlyArchivesAndKeepsUser(): void
    {
        $owner = UserTestHelper::createUser(['firstname' => 'Pascal', 'lastname' => 'Dupont']);
        $this->persistUserWithDependencies($owner);
        $logbook = $this->createLogbookWithAction($owner);
        $this->entityManager->flush();

        $ownerId = $owner->getId();
        $logbookId = $logbook->getId();

        $this->deletionService->deleteLogbooksOnly($owner);

        self::assertNotNull($this->userRepository->find($ownerId), 'L\'utilisateur doit être conservé.');
        self::assertNull($this->logbookRepository->find($logbookId), 'Le carnet doit être supprimé.');
        self::assertCount(1, $this->archiveRepository->findAll(), 'Le carnet supprimé doit être archivé.');
    }

    /**
     * Suppression d'un tuteur : ses filleuls perdent la relation mentor
     * (SET NULL en base), mais la suppression ne doit pas échouer ni toucher
     * aux carnets des filleuls.
     */
    #[Test] public function deleteMentorKeepsMenteesLogbooks(): void
    {
        $mentor = UserTestHelper::createMentorUser();
        $this->persistUserWithDependencies($mentor);

        $mentee = UserTestHelper::createUser(['firstname' => 'Pascal', 'lastname' => 'Dupont']);
        $mentee->setMentor($mentor);
        $this->persistUserWithDependencies($mentee);
        $logbook = $this->createLogbookWithAction($mentee);
        $this->entityManager->flush();

        $menteeId = $mentee->getId();
        $mentorId = $mentor->getId();
        $logbookId = $logbook->getId();

        $this->deletionService->deleteUserOnly($mentor);

        self::assertNull($this->userRepository->find($mentorId), 'Le tuteur doit être supprimé.');
        self::assertNotNull($this->logbookRepository->find($logbookId), 'Le carnet du filleul doit survivre.');

        // La relation mentor est rompue en base — le nom figé devient la référence
        $this->entityManager->clear();
        $menteeReloaded = $this->userRepository->find($menteeId);
        self::assertNull($menteeReloaded?->getMentor(), 'Le lien tuteur est rompu (SET NULL).');
    }

    /**
     * Suppression unitaire d'un carnet (page Carnets, SUPER_ADMIN) :
     * archive puis suppression du seul carnet visé, sans toucher au compte.
     */
    #[Test] public function deleteLogbookArchivesOnlyThatLogbook(): void
    {
        $owner = UserTestHelper::createUser(['firstname' => 'Pascal', 'lastname' => 'Dupont']);
        $this->persistUserWithDependencies($owner);
        $logbook = $this->createLogbookWithAction($owner);
        $this->entityManager->flush();

        $ownerId = $owner->getId();
        $logbookId = $logbook->getId();

        $this->deletionService->deleteLogbook($logbook);

        self::assertNotNull($this->userRepository->find($ownerId), 'Le titulaire doit être conservé.');
        self::assertNull($this->logbookRepository->find($logbookId), 'Le carnet doit être supprimé.');
        self::assertCount(1, $this->archiveRepository->findAll(), 'Le carnet doit avoir été archivé.');
    }

    // ——— Helpers de construction de fixtures ———

    private function persistUserWithDependencies(User $user): void
    {
        if ($job = $user->getJob()) {
            $this->entityManager->persist($job);
        }
        if ($speciality = $user->getSpeciality()) {
            $this->entityManager->persist($speciality);
        }
        $this->entityManager->persist($user);
    }

    private function createLogbookWithAction(User $owner): Logbook
    {
        $theme = new Theme();
        $theme->setTitle('Thème sécurité');
        $this->entityManager->persist($theme);

        $module = new Module();
        $module->setTitle('Module port du casque');
        // addModule synchronise Theme::modules, lu pour le payload d'archive.
        $theme->addModule($module);
        $this->entityManager->persist($module);

        $logbook = new Logbook();
        $logbook->setName('Carnet de ' . $owner->getFullname());
        $logbook->addTheme($theme);
        // addLogbook (et non setOwner) synchronise la collection inverse
        // User::logbooks — indispensable pour le cascade remove.
        $owner->addLogbook($logbook);
        $this->entityManager->persist($logbook);

        $action = new Action();
        $action->setUser($owner);
        $action->setModule($module);
        // addAction synchronise Logbook::actions (cascade remove + payload).
        $logbook->addAction($action);
        $action->setDescription('Action de test');
        $action->setAgentValidatedAt(new \DateTimeImmutable('2023-02-01'));
        $action->setMentorComment('Commentaire tuteur');
        $action->setMentorValidatedAt(new \DateTimeImmutable('2023-02-15'));
        $action->setMentorVisa('Visa tuteur Walter MARTIN');
        $this->entityManager->persist($action);

        return $logbook;
    }
}
