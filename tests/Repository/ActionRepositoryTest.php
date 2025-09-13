<?php

declare(strict_types=1);

namespace App\Tests\Repository;

use App\Entity\Action;
use App\Entity\Logbook;
use App\Entity\Module;
use App\Entity\Service;
use App\Entity\Theme;
use App\Entity\User;
use App\Repository\ActionRepository;
use App\Tests\Utils\UserTestHelper;
use Doctrine\ORM\EntityManagerInterface;
use PHPUnit\Framework\Attributes\Test;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Uid\Uuid;

class ActionRepositoryTest extends KernelTestCase
{
    private EntityManagerInterface $entityManager;
    private ActionRepository $repository;

    public function createUser(): User
    {
        $uniqueId = uniqid();
        $user = new User();
        $user->setFirstname('Bruce');
        $user->setLastname('Wayne');
        $user->setEmail("batman{$uniqueId}@gotham.city");
        $user->setNni("H" . substr($uniqueId, -5));
        $user->setPassword('password');

        return $user;
    }

    protected function setUp(): void
    {
        parent::setUp();
        $kernel = self::bootKernel();

        $this->entityManager = $kernel->getContainer()
            ->get(id: 'doctrine')
            ->getManager();

        $this->repository = $this->entityManager->getRepository(className: Action::class);

        // Démarrer une transaction
        $this->entityManager->beginTransaction();
    }

    protected function tearDown(): void
    {
        // Annuler la transaction
        $this->entityManager->rollback();

        parent::tearDown();
        $this->entityManager->close();
    }

    #[Test] public function constructor(): void
    {
        self::assertInstanceOf(expected: ActionRepository::class, actual: $this->repository);
    }

    #[Test] public function findAll(): void
    {
        $actions = $this->repository->findAll();
        self::assertIsArray(actual: $actions);
    }

    #[Test] public function find(): void
    {
        // Créer un utilisateur
        $user = UserTestHelper::createUser();
        // Définissez d'autres propriétés requises pour l'utilisateur

        $this->entityManager->persist(object: $user);
        $this->entityManager->flush();

        // Créer une action avec l'utilisateur
        $action = new Action();
        $action->setUser(user: $user);
        // Définissez d'autres propriétés requises pour l'action

        $this->entityManager->persist(object: $action);
        $this->entityManager->flush();

        $foundAction = $this->repository->find(id: $action->getId());
        self::assertInstanceOf(expected: Action::class, actual: $foundAction);
        self::assertNotNull(actual: $foundAction->getUser());
    }

    #[Test] public function findOneBy(): void
    {
        // Créer un utilisateur
        $user = $this->createUser();
        // Définissez d'autres propriétés requises pour l'utilisateur

        $this->entityManager->persist(object: $user);
        $this->entityManager->flush();

        // Créer une action avec l'utilisateur
        $action = new Action();
        $action->setUser(user: $user);
        // Définissez d'autres propriétés requises pour l'action

        $this->entityManager->persist(object: $action);
        $this->entityManager->flush();

        $foundAction = $this->repository->findOneBy(criteria: ['id' => $action->getId()]);
        self::assertInstanceOf(expected: Action::class, actual: $foundAction);
        self::assertNotNull(actual: $foundAction->getUser());
    }

    #[Test] public function remove(): void
    {
        // Créer un utilisateur
        $user = $this->createUser();
        $this->entityManager->persist($user);
        $this->entityManager->flush();

        // Créer une action
        $action = new Action();
        $action->setUser($user);
        $this->entityManager->persist($action);
        $this->entityManager->flush();

        // Récupérer l'ID avant suppression
        $actionId = $action->getId();

        // Supprimer l'action
        $this->repository->remove($action);
        $this->entityManager->flush();

        // Vérifier que l'action a bien été supprimée
        $deletedAction = $this->repository->find($actionId);
        self::assertNull($deletedAction);
    }

    #[Test] public function findByModuleAndCriteria(): void
    {
        // Créer un service
        $service = new Service();
        $service->setName('IT-DEP'); // Limité à 10 caractères
        $service->setDescription('Information Technology');
        $this->entityManager->persist($service);

        // Créer un utilisateur avec service
        $user = $this->createUser();
        $user->setService($service);
        $this->entityManager->persist($user);

        // Créer un thème
        $theme = new Theme();
        $theme->setTitle('Sécurité');
        $this->entityManager->persist($theme);

        // Créer un module
        $module = new Module();
        $module->setTitle('Module de sécurité');
        $module->setTheme($theme);
        $this->entityManager->persist($module);

        // Créer une action avec module et utilisateur
        $action = new Action();
        $action->setUser($user);
        $action->setModule($module);
        $this->entityManager->persist($action);

        // Créer une autre action avec le même module mais un utilisateur différent
        $otherUser = $this->createUser();
        $this->entityManager->persist($otherUser);

        $otherAction = new Action();
        $otherAction->setUser($otherUser);
        $otherAction->setModule($module);
        $this->entityManager->persist($otherAction);

        $this->entityManager->flush();

        // Vérifier que les actions ont bien été créées
        $allActions = $this->entityManager->getRepository(Action::class)->findAll();
        self::assertNotEmpty(actual: $allActions);
        self::assertNotNull(actual: $allActions);

        // Vérifier que le module est bien enregistré
        $moduleId = $module->getId();
        self::assertNotEmpty(actual: $moduleId);
        self::assertNotNull(actual: $moduleId);
        self::assertIsString(actual: $moduleId->__toString());

        // Test sans critères
        $actions = $this->repository->findByModuleAndCriteria($module);
        self::assertNotEmpty(actual: $actions);
        self::assertNotNull(actual: $actions);
        self::assertIsArray(actual: $actions);
        self::assertCount(2, $actions);

        // Test avec critère service
        $actionsWithService = $this->repository->findByModuleAndCriteria($module, ['service' => $service]);
        self::assertNotEmpty(actual: $actionsWithService);
        self::assertNotNull(actual: $actionsWithService);
        self::assertIsArray(actual: $actionsWithService);
        self::assertCount(1, $actionsWithService);
        self::assertSame($action->getId(), $actionsWithService[0]->getId());

        // Test avec critère utilisateur
        $actionsWithUser = $this->repository->findByModuleAndCriteria($module, ['user' => $user]);
        self::assertNotEmpty(actual: $actionsWithUser);
        self::assertNotNull(actual: $actionsWithUser);
        self::assertIsArray(actual: $actionsWithUser);
        self::assertCount(1, $actionsWithUser);
        self::assertSame($action->getId(), $actionsWithUser[0]->getId());
    }

    #[Test] public function findByLogbookAndTheme(): void
    {
        // Créer un utilisateur
        $user = $this->createUser();
        $this->entityManager->persist($user);

        // Créer un carnet
        $logbook = new Logbook();
        $logbook->setOwner($user);
        $logbook->setName('Carnet de test');
        $this->entityManager->persist($logbook);

        // Créer un thème
        $theme = new Theme();
        $theme->setTitle('Sécurité');
        $this->entityManager->persist($theme);

        // Créer un autre thème
        $otherTheme = new Theme();
        $otherTheme->setTitle('Qualité');
        $this->entityManager->persist($otherTheme);

        // Créer un module pour le thème
        $module = new Module();
        $module->setTitle('Module de sécurité');
        $module->setTheme($theme);
        $this->entityManager->persist($module);

        // Créer un module pour l'autre thème
        $otherModule = new Module();
        $otherModule->setTitle('Module de qualité');
        $otherModule->setTheme($otherTheme);
        $this->entityManager->persist($otherModule);

        // Créer des actions pour le premier thème
        $action1 = new Action();
        $action1->setUser($user);
        $action1->setLogbook($logbook);
        $action1->setModule($module);
        $this->entityManager->persist($action1);

        $action2 = new Action();
        $action2->setUser($user);
        $action2->setLogbook($logbook);
        $action2->setModule($module);
        $this->entityManager->persist($action2);

        // Créer une action pour l'autre thème
        $action3 = new Action();
        $action3->setUser($user);
        $action3->setLogbook($logbook);
        $action3->setModule($otherModule);
        $this->entityManager->persist($action3);

        $this->entityManager->flush();

        // Récupérer les actions pour le premier thème
        $actions = $this->repository->findByLogbookAndTheme($logbook, $theme);

        // Vérifier qu'on a bien les deux actions du premier thème
        self::assertCount(2, $actions);

        // Récupérer les actions pour le premier thème avec filtre utilisateur
        $actionsWithUser = $this->repository->findByLogbookAndTheme($logbook, $theme, $user);

        // Vérifier qu'on a toujours les deux actions
        self::assertCount(2, $actionsWithUser);
    }

    #[Test] public function hasActionsForThemeInLogbookNative(): void
    {
        // Créer un utilisateur
        $user = $this->createUser();
        $this->entityManager->persist($user);

        // Créer un carnet
        $logbook = new Logbook();
        $logbook->setOwner($user);
        $logbook->setName('Carnet de test');
        $this->entityManager->persist($logbook);

        // Créer un thème
        $theme = new Theme();
        $theme->setTitle('Sécurité');
        $this->entityManager->persist($theme);

        // Créer un module pour le thème
        $module = new Module();
        $module->setTitle('Module de sécurité');
        $module->setTheme($theme);
        $this->entityManager->persist($module);

        // Créer une action
        $action = new Action();
        $action->setUser($user);
        $action->setLogbook($logbook);
        $action->setModule($module);
        $this->entityManager->persist($action);

        $this->entityManager->flush();

        // Vérifier qu'il y a des actions pour ce thème dans ce carnet
        $hasActions = $this->repository->hasActionsForThemeInLogbookNative(
            $logbook->getId()->__toString(),
            $theme->getId()->__toString()
        );

        self::assertTrue($hasActions);

        // Vérifier avec un ID de thème inexistant
        $fakeThemeId = Uuid::v4()->__toString();
        $hasNoActions = $this->repository->hasActionsForThemeInLogbookNative(
            $logbook->getId()->__toString(),
            $fakeThemeId
        );

        self::assertFalse($hasNoActions);

        // Vérifier avec un filtre utilisateur
        $hasActionsWithUser = $this->repository->hasActionsForThemeInLogbookNative(
            $logbook->getId()->__toString(),
            $theme->getId()->__toString(),
            $user->getId()->__toString()
        );

        self::assertTrue($hasActionsWithUser);
    }

    #[Test] public function getLastActionDateForUser(): void
    {
        // Créer un utilisateur
        $user = $this->createUser();
        $this->entityManager->persist($user);

        // Créer plusieurs actions validées à différentes dates
        $date1 = new \DateTime('2023-01-01');
        $action1 = new Action();
        $action1->setUser($user);
        $action1->setAgentValidatedAt($date1);
        $this->entityManager->persist($action1);

        $date2 = new \DateTime('2023-02-01');
        $action2 = new Action();
        $action2->setUser($user);
        $action2->setAgentValidatedAt($date2);
        $this->entityManager->persist($action2);

        $date3 = new \DateTime('2023-03-01');
        $action3 = new Action();
        $action3->setUser($user);
        $action3->setAgentValidatedAt($date3);
        $this->entityManager->persist($action3);

        $this->entityManager->flush();

        // Récupérer la date de la dernière action
        $lastDate = $this->repository->getLastActionDateForUser($user);

        // Vérifier que c'est bien la date la plus récente
        self::assertNotNull($lastDate);
        self::assertEquals($date3->format('Y-m-d'), $lastDate->format('Y-m-d'));

        // Tester avec un utilisateur sans actions
        $newUser = $this->createUser();
        $this->entityManager->persist($newUser);
        $this->entityManager->flush();

        $noDate = $this->repository->getLastActionDateForUser($newUser);
        self::assertNull($noDate);
    }
}
