<?php

declare(strict_types=1);

namespace App\Tests\Repository;

use App\Entity\LogbookTemplate;
use App\Repository\LogbookTemplateRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class LogbookTemplateRepositoryTest extends KernelTestCase
{
    private ?EntityManagerInterface $entityManager = null;
    private ?LogbookTemplateRepository $repository = null;
    
    protected function setUp(): void
    {
        self::bootKernel();
        $this->entityManager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->entityManager->getRepository(LogbookTemplate::class);
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
        $this->assertInstanceOf(LogbookTemplateRepository::class, $this->repository);
    }
    
    public function testFindAll(): void
    {
        // Vérifier que findAll() retourne un tableau
        $templates = $this->repository->findAll();
        $this->assertIsArray($templates);
    }
    
    public function testFindBy(): void
    {
        // Vérifier que findBy() fonctionne avec des critères
        $templates = $this->repository->findBy([], ['name' => 'ASC']);
        $this->assertIsArray($templates);
    }
    
    public function testFindOneBy(): void
    {
        // Test avec un repository réel
        $template = $this->repository->findOneBy(['name' => 'NON_EXISTENT_TEMPLATE']);
        $this->assertNull($template); // Devrait être null car le nom n'existe pas
    }
}
