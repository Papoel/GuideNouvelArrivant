<?php

declare(strict_types=1);

namespace App\Tests\Repository;

use App\Entity\Theme;
use App\Repository\ThemeRepository;
use Doctrine\ORM\EntityManagerInterface;
use PHPUnit\Framework\Attributes\Test;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ThemeRepositoryTest extends KernelTestCase
{
    private EntityManagerInterface $entityManager;
    private ThemeRepository $repository;

    protected function setUp(): void
    {
        parent::setUp();
        $kernel = self::bootKernel();

        $this->entityManager = $kernel->getContainer()
            ->get(id: 'doctrine')
            ->getManager();

        $this->repository = $this->entityManager->getRepository(className: Theme::class);

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
        self::assertInstanceOf(expected: ThemeRepository::class, actual: $this->repository);
    }

    #[Test] public function findAll(): void
    {
        $actions = $this->repository->findAll();
        self::assertIsArray(actual: $actions);
    }

    #[Test] public function find(): void
    {
        // Créer et persister un Theme
        $theme = new Theme();
        $theme->setTitle(title: 'Test Theme');
        $theme->setDescription(description: 'Test Description');

        $this->entityManager->persist(object: $theme);
        $this->entityManager->flush();

        // Nettoyer le cache de l'entity manager
        $this->entityManager->clear();

        // Rechercher le theme
        $foundTheme = $this->repository->find(id: $theme->getId());

        self::assertInstanceOf(expected: Theme::class, actual: $foundTheme);
        self::assertEquals(expected: 'Test Theme', actual: $foundTheme->getTitle());
        self::assertEquals(expected: 'Test Description', actual: $foundTheme->getDescription());
    }

    #[Test] public function findOneBy(): void
    {
        // Créer et persister deux Themes
        $theme1 = new Theme();
        $theme1->setTitle(title: 'Theme 1');
        $theme1->setDescription(description: 'Description 1');

        $theme2 = new Theme();
        $theme2->setTitle(title: 'Theme 2');
        $theme2->setDescription(description: 'Description 2');

        $this->entityManager->persist(object: $theme1);
        $this->entityManager->persist(object: $theme2);
        $this->entityManager->flush();

        // Nettoyer le cache de l'entity manager
        $this->entityManager->clear();

        // Tester findOneBy avec le titre
        $foundTheme = $this->repository->findOneBy(criteria: ['title' => 'Theme 1']);
        self::assertInstanceOf(expected: Theme::class, actual: $foundTheme);
        self::assertEquals(expected: 'Theme 1', actual: $foundTheme->getTitle());
        self::assertEquals(expected: 'Description 1', actual: $foundTheme->getDescription());

        // Tester findOneBy avec plusieurs critères
        $foundThemeMultiCriteria = $this->repository->findOneBy([
            'title' => 'Theme 2',
            'description' => 'Description 2'
        ]);
        self::assertInstanceOf(expected: Theme::class, actual: $foundThemeMultiCriteria);
        self::assertEquals(expected: 'Theme 2', actual: $foundThemeMultiCriteria->getTitle());

        // Tester findOneBy avec un critère qui ne correspond à aucun thème
        $nonExistentTheme = $this->repository->findOneBy(criteria: ['title' => 'Theme Inexistant']);
        self::assertNull($nonExistentTheme);
    }
}
