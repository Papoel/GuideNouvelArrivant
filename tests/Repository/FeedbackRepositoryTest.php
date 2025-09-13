<?php

declare(strict_types=1);

namespace App\Tests\Repository;

use App\Entity\Feedback;
use App\Entity\Service;
use App\Entity\User;
use App\Repository\FeedbackRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class FeedbackRepositoryTest extends KernelTestCase
{
    private ?EntityManagerInterface $entityManager = null;
    private ?FeedbackRepository $repository = null;

    protected function setUp(): void
    {
        self::bootKernel();
        $this->entityManager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->entityManager->getRepository(Feedback::class);
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        // Fermer l'EntityManager pour éviter les fuites de mémoire
        if ($this->entityManager) {
            $this->entityManager->close();
            $this->entityManager = null;
        }

        $this->repository = null;
    }

    public function testFindByCriteriaPaginated(): void
    {
        // Test avec un repository réel si la base de données de test est configurée
        if ($this->repository) {
            $result = $this->repository->findByCriteriaPaginated();

            // Vérifier la structure du résultat
            $this->assertIsArray($result);
            $this->assertArrayHasKey('items', $result);
            $this->assertArrayHasKey('totalItems', $result);
            $this->assertArrayHasKey('totalPages', $result);

            // Les items doivent être un tableau (vide ou non)
            $this->assertIsArray($result['items']);

            // totalItems et totalPages doivent être des entiers
            $this->assertIsInt($result['totalItems']);
            $this->assertIsInt($result['totalPages']);
        }
    }

    public function testCountByCriteria(): void
    {
        // Test avec un repository réel si la base de données de test est configurée
        if ($this->repository) {
            $count = $this->repository->countByCriteria();

            // Vérifier que le résultat est un entier
            $this->assertIsInt($count);
        }
    }

    public function testFindFeedbacksByServiceName(): void
    {
        // Test avec un repository réel si la base de données de test est configurée
        if ($this->repository) {
            $result = $this->repository->findFeedbacksByServiceName('TEST-SERVICE');

            // Vérifier que le résultat est un tableau
            $this->assertIsArray($result);
        }
    }
}
