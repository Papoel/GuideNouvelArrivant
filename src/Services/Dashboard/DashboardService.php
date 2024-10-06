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

readonly class DashboardService
{
    public function __construct(
        private UserValidationService $userValidationService,
        private UserSeniorityService $seniorityService,
        private LogbookProgressService $logbookProgressService,
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
        $currentUser = $this->userValidationService->validateUserAccess($nni);

        // Récupération des logbooks associés à l'utilisateur
        $logbooks = $this->getLogbooksByUser($currentUser);

        // Récupération des thèmes liés aux logbooks
        $themes = $this->getThemesByLogbooks($logbooks);

        // Récupération des modules liés aux thèmes
        $modules = $this->getModulesByThemes($themes);

        $logbooksProgress = $this->calculateLogbooksProgress($logbooks);

        return [
            'user' => $currentUser,
            'logbooks' => $logbooks,
            'logbooksProgress' => $logbooksProgress,
            'themes' => $themes,
            'modules' => $modules,
            'actions' => $this->getActionsByModulesForUser($modules, $currentUser),
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

    /** @phpstan-ignore-next-line */
    private function calculateLogbooksProgress(array $logbooks): array
    {
        $logbooksProgress = [];
        foreach ($logbooks as $logbook) {
            if (!$logbook instanceof Logbook) {
                throw new \InvalidArgumentException(message: 'Une erreur est survenue lors du calcul de la progression des carnets.');
            }
            $logbooksProgress[] = $this->logbookProgressService->calculateLogbookProgress($logbook);
        }

        return $logbooksProgress;
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

    private function calculateSeniority(?\DateTimeImmutable $hiringAt): string
    {
        return $hiringAt ? $this->seniorityService->getSeniority(hiringAt: $hiringAt) : 'Non défini';
    }

    /**
     * @param array<Module> $modules
     *
     * @return array<Action>
     */
    private function getActionsByModulesForUser(array $modules, User $user): array
    {
        $actions = [];

        foreach ($modules as $module) {
            foreach ($module->getActions() as $action) {
                // Vérifier si l'action est associée à l'utilisateur courant
                if ($action->getUser()?->getId() === $user->getId()) {
                    $actions[] = $action;
                }
            }
        }

        return $actions;
    }
}
