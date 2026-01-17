<?php

declare(strict_types=1);

namespace App\Services\Dashboard;

use App\Entity\Action;
use App\Entity\Logbook;
use App\Entity\Module;
use App\Entity\Theme;
use App\Entity\User;
use App\Services\Logbook\LogbookProgressService;
use App\Services\User\UserSeniorityService;
use App\Services\User\UserValidationService;

/**
 * Dashboard orchestration service following SOLID principles.
 *
 * SOLID Principles Applied:
 * - Single Responsibility: Focuses on orchestrating dashboard data assembly
 * - Open/Closed: Can be extended without modification through dependency injection
 * - Liskov Substitution: Works with DashboardDataProviderInterface
 * - Interface Segregation: Depends on focused interfaces
 * - Dependency Inversion: Depends on abstractions (interfaces) not concretions
 */
readonly class DashboardService
{
    public function __construct(
        private UserValidationService $userValidationService,
        private UserSeniorityService $seniorityService,
        private LogbookProgressService $logbookProgressService,
        private DashboardDataProviderInterface $dataProvider,
    ) {
    }

    /**
     * Orchestrates the retrieval and assembly of all dashboard data.
     * Uses optimized data provider to avoid N+1 queries.
     *
     * @return array{
     *     user: User,
     *     logbooks: array<int, Logbook>,
     *     logbooksProgress: array<int, array<string, mixed>>,
     *     themes: array<int, Theme>,
     *     modules: array<int, Module>,
     *     actions: array<int, Action>,
     *     userSeniority: string,
     *     mentorSeniority: string
     * }
     */
    public function getDashboardData(string $nni): array
    {
        // Validation et récupération de l'utilisateur par NNI
        $currentUser = $this->userValidationService->validateUserAccess($nni);

        // Récupération optimisée des données (résout le problème N+1)
        $dashboardData = $this->dataProvider->getDashboardDataForUser($currentUser);

        // Calcul de la progression des carnets
        $logbooksProgress = $this->calculateLogbooksProgress($dashboardData['logbooks']);

        // Assemblage final des données
        return [
            'user' => $currentUser,
            'logbooks' => $dashboardData['logbooks'],
            'logbooksProgress' => $logbooksProgress,
            'themes' => $dashboardData['themes'],
            'modules' => $dashboardData['modules'],
            'actions' => $dashboardData['actions'],
            'userSeniority' => $this->calculateSeniority($currentUser->getHiringAt()),
            'mentorSeniority' => $this->calculateSeniority($currentUser->getMentor()?->getHiringAt()),
        ];
    }

    /**
     * Calculates progress for all logbooks.
     *
     * @param array<int, Logbook> $logbooks
     * @return array<int, array<string, mixed>>
     */
    private function calculateLogbooksProgress(array $logbooks): array
    {
        $logbooksProgress = [];
        foreach ($logbooks as $logbook) {
            $logbooksProgress[] = $this->logbookProgressService->calculateLogbookProgress($logbook);
        }

        return $logbooksProgress;
    }

    /**
     * Calculates seniority for a given hiring date.
     */
    private function calculateSeniority(?\DateTimeImmutable $hiringAt): string
    {
        return $hiringAt ? $this->seniorityService->getSeniority(hiringAt: $hiringAt) : 'Non défini';
    }
}
