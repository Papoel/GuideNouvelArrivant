<?php

declare(strict_types=1);

namespace App\Tests\Repository;

use App\Entity\Job;
use App\Repository\JobRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class JobRepositoryTest extends KernelTestCase
{
    private ?EntityManagerInterface $entityManager = null;
    private ?JobRepository $repository = null;

    protected function setUp(): void
    {
        self::bootKernel();
        $this->entityManager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->entityManager->getRepository(Job::class);
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

    public function testRepositoryInstance(): void
    {
        $this->assertInstanceOf(JobRepository::class, $this->repository);
    }

    public function testFindAll(): void
    {
        // Vérifier que findAll() retourne un tableau
        $jobs = $this->repository->findAll();
        $this->assertIsArray($jobs);
    }

    public function testFindBy(): void
    {
        // Vérifier que findBy() fonctionne avec des critères
        $jobs = $this->repository->findBy([], ['name' => 'ASC']);
        $this->assertIsArray($jobs);
    }

    public function testFindOneBy(): void
    {
        // Test avec un repository réel
        $job = $this->repository->findOneBy(['code' => 'NON_EXISTENT_CODE']);
        $this->assertNull($job); // Devrait être null car le code n'existe pas
    }
}
