<?php

declare(strict_types=1);

namespace App\Services\Dashboard;

use App\Entity\Action;
use App\Entity\Logbook;
use App\Entity\Module;
use App\Entity\Theme;
use App\Entity\User;
use App\Repository\LogbookRepository;

/**
 * Provides optimized data retrieval for dashboard.
 * This class follows the Single Responsibility Principle (SRP) by focusing solely
 * on data retrieval with optimized queries.
 */
readonly class DashboardDataProvider implements DashboardDataProviderInterface
{
    public function __construct(
        private LogbookRepository $logbookRepository,
    ) {
    }

    /**
     * Retrieves all dashboard data for a given user using a single optimized query.
     * This method eliminates N+1 query problems by using JOINs in the repository.
     *
     * @return array{
     *     logbooks: array<Logbook>,
     *     themes: array<Theme>,
     *     modules: array<Module>,
     *     actions: array<Action>
     * }
     */
    public function getDashboardDataForUser(User $user): array
    {
        $logbooks = $this->logbookRepository->findByUserWithFullRelations($user);

        $themes = $this->extractThemesFromLogbooks($logbooks);
        $modules = $this->extractModulesFromThemes($themes);
        $actions = $this->extractActionsForUser($modules, $user);

        return [
            'logbooks' => $logbooks,
            'themes' => $themes,
            'modules' => $modules,
            'actions' => $actions,
        ];
    }

    /**
     * Extracts unique themes from logbooks (already loaded via JOIN).
     *
     * @param array<Logbook> $logbooks
     * @return array<Theme>
     */
    private function extractThemesFromLogbooks(array $logbooks): array
    {
        $themes = [];
        $themeIds = [];

        foreach ($logbooks as $logbook) {
            foreach ($logbook->getThemes() as $theme) {
                $themeId = $theme->getId()?->toString();
                if ($themeId && !isset($themeIds[$themeId])) {
                    $themes[] = $theme;
                    $themeIds[$themeId] = true;
                }
            }
        }

        return $themes;
    }

    /**
     * Extracts unique modules from themes (already loaded via JOIN).
     *
     * @param array<Theme> $themes
     * @return array<Module>
     */
    private function extractModulesFromThemes(array $themes): array
    {
        $modules = [];
        $moduleIds = [];

        foreach ($themes as $theme) {
            foreach ($theme->getModules() as $module) {
                $moduleId = $module->getId()?->toString();
                if ($moduleId && !isset($moduleIds[$moduleId])) {
                    $modules[] = $module;
                    $moduleIds[$moduleId] = true;
                }
            }
        }

        return $modules;
    }

    /**
     * Extracts actions for the specified user (already loaded via JOIN).
     *
     * @param array<Module> $modules
     * @return array<Action>
     */
    private function extractActionsForUser(array $modules, User $user): array
    {
        $actions = [];
        $actionIds = [];

        foreach ($modules as $module) {
            foreach ($module->getActions() as $action) {
                // Filter by user and avoid duplicates
                if ($action->getUser()?->getId() === $user->getId()) {
                    $actionId = $action->getId()?->toString();
                    if ($actionId && !isset($actionIds[$actionId])) {
                        $actions[] = $action;
                        $actionIds[$actionId] = true;
                    }
                }
            }
        }

        return $actions;
    }
}
