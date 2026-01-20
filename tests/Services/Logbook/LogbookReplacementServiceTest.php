<?php

declare(strict_types=1);

namespace App\Tests\Services\Logbook;

use App\Entity\Logbook;
use App\Entity\Theme;
use App\Entity\User;
use App\Services\Logbook\LogbookReplacementService;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class LogbookReplacementServiceTest extends TestCase
{
    private LogbookReplacementService $service;
    private MockObject $entityManager;
    private MockObject $logbookRepository;

    protected function setUp(): void
    {
        // Crée un mock de EntityRepository, et non ObjectRepository
        $this->entityManager = $this->createMock(type: EntityManagerInterface::class);
        $this->logbookRepository = $this->createMock(type: EntityRepository::class);

        // Configure le mock pour que getRepository retourne le mock de EntityRepository
        $this->entityManager->method(constraint: 'getRepository')
            ->with(Logbook::class)
            ->willReturn(value: $this->logbookRepository);

        $this->service = new LogbookReplacementService(entityManager: $this->entityManager);
    }

    private function createLogbookWithOwner(User $owner, array $themes = []): Logbook
    {
        return $this->createConfiguredMock(Logbook::class, [
            'getOwner' => $owner,
            'getThemes' => new ArrayCollection(elements: $themes),
        ]);
    }

    #[Test] public function handleExistingLogbookReturnsTrueWhenLogbookExists(): void
    {
        $owner = $this->createConfiguredMock(User::class, []);
        $newLogbook = $this->createLogbookWithOwner(owner: $owner);

        // Simulation d'un logbook existant pour le même owner
        $this->logbookRepository->method(constraint: 'findOneBy')
            ->with(['owner' => $owner])
            ->willReturn(value: $this->createConfiguredMock(Logbook::class, []));

        $result = $this->service->handleExistingLogbook(newLogbook: $newLogbook);

        $this->assertTrue(condition: $result);
    }

    #[Test] public function handleExistingLogbookReturnsFalseWhenLogbookDoesNotExist(): void
    {
        $owner = $this->createConfiguredMock(User::class, []);
        $newLogbook = $this->createLogbookWithOwner(owner: $owner);

        // Simulation d'aucun logbook existant pour le même owner
        $this->logbookRepository->method(constraint: 'findOneBy')
            ->with(['owner' => $owner])
            ->willReturn(value: null);

        $result = $this->service->handleExistingLogbook(newLogbook: $newLogbook);

        $this->assertFalse(condition: $result);
    }

    #[Test] public function deleteExistingLogbookRemovesLogbookWhenItExists(): void
    {
        $owner = $this->createConfiguredMock(User::class, []);
        $theme = $this->createConfiguredMock(Theme::class, []);
        $newLogbook = $this->createLogbookWithOwner(owner: $owner, themes: [$theme]);
        $existingLogbook = $this->createConfiguredMock(Logbook::class, []);

        // Simulation d'un logbook existant
        $this->logbookRepository->method(constraint: 'findOneBy')
            ->with(['owner' => $owner])
            ->willReturn(value: $existingLogbook);

        // Configuration des méthodes de l'EntityManager
        $this->entityManager->expects($this->once())->method(constraint: 'persist')->with($theme);
        $this->entityManager->expects($this->once())->method(constraint: 'remove')->with($existingLogbook);
        $this->entityManager->expects($this->once())->method(constraint: 'flush');

        $this->service->deleteExistingLogbook(newLogbook: $newLogbook);
    }

    #[Test] public function deleteExistingLogbookDoesNothingWhenNoExistingLogbook(): void
    {
        $owner = $this->createConfiguredMock(User::class, []);
        $newLogbook = $this->createLogbookWithOwner(owner: $owner);

        // Simulation d'aucun logbook existant pour le même owner
        $this->logbookRepository->method(constraint: 'findOneBy')
            ->with(['owner' => $owner])
            ->willReturn(value: null);

        // On s'assure que les méthodes `persist`, `remove`, et `flush` ne sont pas appelées
        $this->entityManager->expects($this->never())->method(constraint: 'persist');
        $this->entityManager->expects($this->never())->method(constraint: 'remove');
        $this->entityManager->expects($this->never())->method(constraint: 'flush');

        $this->service->deleteExistingLogbook(newLogbook: $newLogbook);
    }
}
