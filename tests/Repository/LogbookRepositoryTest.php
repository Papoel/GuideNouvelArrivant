<?php

declare(strict_types=1);

namespace App\Tests\Repository;

use App\Entity\Logbook;
use App\Repository\LogbookRepository;
use App\Tests\Utils\UserTestHelper;
use Doctrine\ORM\EntityManagerInterface;
use PHPUnit\Framework\Attributes\Test;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class LogbookRepositoryTest extends KernelTestCase
{
    private EntityManagerInterface $entityManager;
    private LogbookRepository $repository;

    protected function setUp(): void
    {
        parent::setUp();
        $kernel = self::bootKernel();

        $this->entityManager = $kernel->getContainer()
            ->get(id: 'doctrine')
            ->getManager();

        $this->repository = $this->entityManager->getRepository(className: Logbook::class);

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
        self::assertInstanceOf(expected: LogbookRepository::class, actual: $this->repository);
    }

    #[Test] public function findAll(): void
    {
        $logbooks = $this->repository->findAll();
        self::assertIsArray(actual: $logbooks);
    }

    #[Test] public function find(): void
    {
        $logbook = new Logbook();
        $this->entityManager->persist(object: $logbook);
        $this->entityManager->flush();

        $foundLogbook = $this->repository->find(id: $logbook->getId());
        $this->assertInstanceOf(expected: Logbook::class, actual: $foundLogbook);
    }

    #[Test] public function findOneBy(): void
    {
        // Créer et persister l'utilisateur d'abord
        $user = UserTestHelper::createUser();
        $this->entityManager->persist(object: $user);
        $this->entityManager->flush();

        // Créer le logbook et lui associer l'utilisateur
        $logbook = new Logbook();
        $logbook->setOwner(owner: $user);
        $logbook->setName(name: 'Carnet de Bruce Wayne');

        // Persister le logbook
        $this->entityManager->persist(object: $logbook);
        $this->entityManager->flush();

        // Nettoyer le cache de l'entity manager pour s'assurer que nous récupérons les données de la base
        $this->entityManager->clear();

        // Rechercher le logbook
        $foundLogbook = $this->repository->findOneBy(criteria: ['id' => $logbook->getId()]);

        self::assertInstanceOf(expected: Logbook::class, actual: $foundLogbook);
        self::assertNotNull(actual: $foundLogbook->getOwner());
        self::assertEquals(expected: $user->getId(), actual: $foundLogbook->getOwner()->getId());
    }
}
