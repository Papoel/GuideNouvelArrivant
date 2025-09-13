<?php

declare(strict_types=1);

namespace App\Tests\Repository;

use App\Entity\Speciality;
use App\Repository\SpecialityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class SpecialityRepositoryTest extends KernelTestCase
{
    private ?EntityManagerInterface $entityManager = null;
    private ?SpecialityRepository $repository = null;
    
    protected function setUp(): void
    {
        self::bootKernel();
        $this->entityManager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->entityManager->getRepository(Speciality::class);
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
        $this->assertInstanceOf(SpecialityRepository::class, $this->repository);
    }
    
    public function testFindAll(): void
    {
        // Vérifier que findAll() retourne un tableau
        $specialities = $this->repository->findAll();
        $this->assertIsArray($specialities);
    }
    
    public function testFindBy(): void
    {
        // Vérifier que findBy() fonctionne avec des critères
        $specialities = $this->repository->findBy([], ['name' => 'ASC']);
        $this->assertIsArray($specialities);
    }
    
    public function testFindOneBy(): void
    {
        // Test avec un repository réel
        $speciality = $this->repository->findOneBy(['code' => 'NON_EXISTENT_CODE']);
        $this->assertNull($speciality); // Devrait être null car le code n'existe pas
    }
}
