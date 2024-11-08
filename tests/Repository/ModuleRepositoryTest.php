<?php

declare(strict_types=1);

namespace App\Tests\Repository;

use App\Entity\Module;
use App\Entity\Theme;
use App\Repository\ModuleRepository;
use Doctrine\ORM\EntityManagerInterface;
use PHPUnit\Framework\Attributes\Test;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ModuleRepositoryTest extends KernelTestCase
{
    private EntityManagerInterface $entityManager;
    private ModuleRepository $repository;

    protected function setUp(): void
    {
        parent::setUp();
        $kernel = self::bootKernel();

        $this->entityManager = $kernel->getContainer()
            ->get(id: 'doctrine')
            ->getManager();

        $this->repository = $this->entityManager->getRepository(className: Module::class);

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
        self::assertInstanceOf(expected: ModuleRepository::class, actual: $this->repository);
    }

    #[Test] public function findAll(): void
    {
        $modules = $this->repository->findAll();
        self::assertIsArray(actual: $modules);
    }

    #[Test] public function findOneBy(): void
    {
        // Créer et persister un Theme
        $theme = new Theme();
        $theme->setTitle(title: 'Theme Test');
        $this->entityManager->persist(object: $theme);

        // Créer et persister deux Modules
        $module1 = new Module();
        $module1->setTitle(title: 'Module Test');
        $module1->setTheme(theme: $theme);
        $module1->setDescription(description: 'Description du module test');
        $this->entityManager->persist(object: $module1);

        $module2 = new Module();
        $module2->setTitle(title: 'Autre Module');
        $module2->setTheme(theme: $theme);
        $module2->setDescription(description: 'Description d\'un autre module');
        $this->entityManager->persist(object: $module2);

        $this->entityManager->flush();
        $this->entityManager->clear();

        // Tester findOneBy avec le titre
        $foundModule = $this->repository->findOneBy(criteria: ['title' => 'Module Test']);
        self::assertInstanceOf(expected: Module::class, actual: $foundModule);
        self::assertEquals(expected: 'Module Test', actual: $foundModule->getTitle());

        // Tester findOneBy avec plusieurs critères
        $foundModuleMultiCriteria = $this->repository->findOneBy([
            'title' => 'Module Test',
            'description' => 'Description du module test'
        ]);
        self::assertInstanceOf(expected: Module::class, actual: $foundModuleMultiCriteria);
        self::assertEquals(expected: $module1->getId(), actual: $foundModuleMultiCriteria->getId());

        // Tester findOneBy avec un critère qui ne correspond à aucun module
        $nonExistentModule = $this->repository->findOneBy(criteria: ['title' => 'Module Inexistant']);
        self::assertNull(actual: $nonExistentModule);
    }
}
