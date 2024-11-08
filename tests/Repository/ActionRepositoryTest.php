<?php

declare(strict_types=1);

namespace App\Tests\Repository;

use App\Entity\Action;
use App\Entity\User;
use App\Repository\ActionRepository;
use App\Tests\Utils\UserTestHelper;
use Doctrine\ORM\EntityManagerInterface;
use PHPUnit\Framework\Attributes\Test;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

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
}
