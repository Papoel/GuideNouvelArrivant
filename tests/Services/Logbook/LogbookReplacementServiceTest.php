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
        $this->entityManager = $this->createMock(originalClassName: EntityManagerInterface::class);
        $this->logbookRepository = $this->createMock(originalClassName: EntityRepository::class);

        // Configure le mock pour que getRepository retourne le mock de EntityRepository
        $this->entityManager->method('getRepository')
            ->with(Logbook::class)
            ->willReturn(value: $this->logbookRepository);

        $this->service = new LogbookReplacementService(entityManager: $this->entityManager);
    }

    private function createLogbookWithOwner(User $owner, array $themes = []): Logbook
    {
        $logbook = $this->createMock(originalClassName: Logbook::class);
        $logbook->method('getOwner')->willReturn(value: $owner);
        $logbook->method('getThemes')->willReturn(value: new ArrayCollection($themes));

        return $logbook;
    }

    #[Test] public function handleExistingLogbookReturnsTrueWhenLogbookExists(): void
    {
        $owner = $this->createMock(originalClassName: User::class);
        $newLogbook = $this->createLogbookWithOwner(owner: $owner);

        // Simulation d'un logbook existant pour le même owner
        $this->logbookRepository->method('findOneBy')
            ->with(['owner' => $owner])
            ->willReturn(value: $this->createMock(Logbook::class));

        $result = $this->service->handleExistingLogbook(newLogbook: $newLogbook);

        $this->assertTrue(condition: $result);
    }

    #[Test] public function handleExistingLogbookReturnsFalseWhenLogbookDoesNotExist(): void
    {
        $owner = $this->createMock(originalClassName: User::class);
        $newLogbook = $this->createLogbookWithOwner(owner: $owner);

        // Simulation d'aucun logbook existant pour le même owner
        $this->logbookRepository->method('findOneBy')
            ->with(['owner' => $owner])
            ->willReturn(value: null);

        $result = $this->service->handleExistingLogbook(newLogbook: $newLogbook);

        $this->assertFalse(condition: $result);
    }

    #[Test] public function deleteExistingLogbookRemovesLogbookWhenItExists(): void
    {
        $owner = $this->createMock(originalClassName: User::class);
        $theme = $this->createMock(originalClassName: Theme::class);
        $newLogbook = $this->createLogbookWithOwner(owner: $owner, themes: [$theme]);
        $existingLogbook = $this->createMock(originalClassName: Logbook::class);

        // Simulation d'un logbook existant
        $this->logbookRepository->method('findOneBy')
            ->with(['owner' => $owner])
            ->willReturn(value: $existingLogbook);

        // Configuration des méthodes de l'EntityManager
        $this->entityManager->expects($this->once())->method('persist')->with($theme);
        $this->entityManager->expects($this->once())->method('remove')->with($existingLogbook);
        $this->entityManager->expects($this->once())->method('flush');

        $this->service->deleteExistingLogbook(newLogbook: $newLogbook);
    }

    #[Test] public function deleteExistingLogbookDoesNothingWhenNoExistingLogbook(): void
    {
        $owner = $this->createMock(originalClassName: User::class);
        $newLogbook = $this->createLogbookWithOwner(owner: $owner);

        // Simulation d'aucun logbook existant pour le même owner
        $this->logbookRepository->method('findOneBy')
            ->with(['owner' => $owner])
            ->willReturn(value: null);

        // On s'assure que les méthodes `persist`, `remove`, et `flush` ne sont pas appelées
        $this->entityManager->expects($this->never())->method('persist');
        $this->entityManager->expects($this->never())->method('remove');
        $this->entityManager->expects($this->never())->method('flush');

        $this->service->deleteExistingLogbook(newLogbook: $newLogbook);
    }
}
