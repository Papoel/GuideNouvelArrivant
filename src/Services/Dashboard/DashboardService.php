<?php

declare(strict_types=1);

namespace App\Services\Dashboard;

use App\Entity\User;
use App\Services\User\UserSeniorityService;
use App\Services\User\UserValidationService;

readonly class DashboardService
{
    public function __construct(
        private UserValidationService $userValidationService,
        private UserSeniorityService $seniorityService,
    ) {
    }

    public function getDashboardData(string $nni, ?User $currentUser): array
    {
        // 1. Vérifier si l'utilisateur est connecté
        $this->userValidationService->validateUser(currentUser: $currentUser, nni: $nni);

        assert(assertion: $currentUser instanceof User);

        $logbooks = $this->getLogbooksByUser($currentUser);
        $themes = $this->getThemesByLogbooks($logbooks);
        $modules = $this->getModulesByThemes($themes);
        $actions = $this->getActionsByModules($modules);

        return [
            'user' => $currentUser,
            'logbooks' => $logbooks,
            'themes' => $themes,
            'modules' => $modules,
            'actions' => $actions,
            'userSeniority' => $this->calculateSeniority(hiringAt: $currentUser->getHiringAt()),
            'mentorSeniority' => $this->calculateSeniority(hiringAt: $currentUser->getMentor()?->getHiringAt()),
        ];
    }

    private function getLogbooksByUser(User $user): array
    {
        return $user->getLogbooks()->toArray();
    }

    private function getThemesByLogbooks(array $logbooks): array
    {
        $themes = [];
        foreach ($logbooks as $logbook) {
            foreach ($logbook->getThemes() as $theme) {
                $themes[] = $theme;
            }
        }

        return $themes;
    }

    private function getModulesByThemes(array $themes): array
    {
        $modules = [];
        foreach ($themes as $theme) {
            foreach ($theme->getModules() as $module) {
                $modules[] = $module;
            }
        }

        return $modules;
    }

    private function getActionsByModules(array $modules): array
    {
        $actions = [];
        foreach ($modules as $module) {
            foreach ($module->getActions() as $action) {
                $actions[] = $action;
            }
        }

        return $actions;
    }

    private function calculateSeniority(?\DateTimeImmutable $hiringAt): string
    {
        return $hiringAt ? $this->seniorityService->getSeniority(hiringAt: $hiringAt) : 'Non défini';
    }
}
