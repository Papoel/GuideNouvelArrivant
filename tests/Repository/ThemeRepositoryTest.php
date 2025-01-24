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
        $theme1->setTitle(title: 'Ratus');
        $theme1->setDescription(description: 'Un petit rat');

        $theme2 = new Theme();
        $theme2->setTitle(title: 'Batman');
        $theme2->setDescription(description: 'Un super-héros');

        $this->entityManager->persist(object: $theme1);
        $this->entityManager->persist(object: $theme2);
        $this->entityManager->flush();

        // Nettoyer le cache de l'entity manager
        $this->entityManager->clear();

        // Tester findOneBy avec le titre
        $foundTheme = $this->repository->findOneBy(criteria: ['title' => 'Ratus']);
        self::assertInstanceOf(expected: Theme::class, actual: $foundTheme);
        self::assertEquals(expected: 'Ratus', actual: $foundTheme->getTitle());
        self::assertEquals(expected: 'Un petit rat', actual: $foundTheme->getDescription());

        // Tester findOneBy avec plusieurs critères
        $foundThemeMultiCriteria = $this->repository->findOneBy([
            'title' => 'Batman',
            'description' => 'Un super-héros',
        ]);
        self::assertInstanceOf(expected: Theme::class, actual: $foundThemeMultiCriteria);
        self::assertEquals(expected: 'Batman', actual: $foundThemeMultiCriteria->getTitle());
        self::assertEquals(expected: 'Un super-héros', actual: $foundThemeMultiCriteria->getDescription());

        // Tester findOneBy avec un critère qui ne correspond à aucun thème
        $nonExistentTheme = $this->repository->findOneBy(criteria: ['title' => 'Theme Inexistant']);
        self::assertNull($nonExistentTheme);
    }
}
