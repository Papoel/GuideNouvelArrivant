<?php

declare(strict_types=1);

namespace App\Services\Dashboard;

use App\Entity\Action;
use App\Entity\Logbook;
use App\Entity\Module;
use App\Entity\Theme;
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

    /**
     * @return array{
     *     user: User,
     *     logbooks: array<Logbook>,
     *     themes: array<Theme>,
     *     modules: array<Module>,
     *     actions: array<Action>,
     *     userSeniority: string,
     *     mentorSeniority: ?string
     * }
     */
    public function getDashboardData(string $nni): array
    {
        // Validation et récupération de l'utilisateur par NNI
        $user = $this->userValidationService->validateUserAccess($nni);

        // Vérification des droits d'accès
        $currentUser = $this->userValidationService->getCurrentUser($nni);

        // assert(assertion: $currentUser instanceof User);

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

    /**
     * @return array<Logbook>
     */
    private function getLogbooksByUser(User $user): array
    {
        return $user->getLogbooks()->toArray();
    }

    /**
     * @param array<Logbook> $logbooks
     *
     * @return array<Theme>
     */
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

    /**
     * @param array<Theme> $themes
     *
     * @return array<Module>
     */
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

    /**
     * @param array<Module> $modules
     *
     * @return array<Action>
     */
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
