<?php

declare(strict_types=1);

namespace App\Tests\Repository;

use App\Entity\Service;
use App\Repository\ServiceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ServiceRepositoryTest extends KernelTestCase
{
    private ?EntityManagerInterface $entityManager = null;
    private ?ServiceRepository $repository = null;
    
    protected function setUp(): void
    {
        self::bootKernel();
        $this->entityManager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->entityManager->getRepository(Service::class);
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
        $this->assertInstanceOf(ServiceRepository::class, $this->repository);
    }
    
    public function testFindAll(): void
    {
        // Vérifier que findAll() retourne un tableau
        $services = $this->repository->findAll();
        $this->assertIsArray($services);
    }
    
    public function testFindBy(): void
    {
        // Vérifier que findBy() fonctionne avec des critères
        $services = $this->repository->findBy([], ['name' => 'ASC']);
        $this->assertIsArray($services);
    }
    
    public function testFindOneBy(): void
    {
        // Test avec un repository réel
        $service = $this->repository->findOneBy(['name' => 'NON_EXISTENT_SERVICE']);
        $this->assertNull($service); // Devrait être null car le nom n'existe pas
    }
    
    public function testFindOneByName(): void
    {
        // Test avec un repository réel
        $service = $this->repository->findOneBy(['name' => 'NON_EXISTENT_SERVICE']);
        $this->assertNull($service); // Devrait être null car le nom n'existe pas
    }
}
