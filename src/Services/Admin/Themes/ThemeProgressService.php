<?php

declare(strict_types=1);

namespace App\Services\Admin\Themes;

use App\Entity\Theme;
use App\Repository\Interfaces\ActionRepositoryInterface;
use App\Repository\ThemeRepository;
use App\Repository\UserRepository;
use App\Services\Admin\interfaces\ThemeProgressServiceInterface;

/** Service responsable du calcul de la progression par thème.
 * Implémente l'interface ThemeProgressServiceInterface pour respecter le principe d'inversion de dépendance. */
readonly class ThemeProgressService implements ThemeProgressServiceInterface
{
    public function __construct(
        private ThemeRepository $themeRepository,
        private UserRepository $userRepository,
        private ActionRepositoryInterface $actionRepository
    ) {
    }

    /** Récupère les données de progression par thème.
     * Cette méthode calcule pour chaque thème:
     * - Le nombre total de modules
     * - Le nombre de modules complétés par les agents
     * - Le nombre de modules validés par les mentors
     * - Le pourcentage de progression des agents
     * - Le pourcentage de progression des mentors.
     *
     * @param array<string, mixed> $accessCriteria Critères d'accès pour filtrer les données (ex: service)
     *
     * @return array<int, array{
     *     theme: Theme,
     *     total_modules: int,
     *     modules_completed_by_agent: int,
     *     modules_validated_by_mentor: int,
     *     agent_progress: float,
     *     mentor_progress: float
     * }> Structure de données contenant les informations de progression par thème */
    public function getThemeProgressData(array $accessCriteria = []): array
    {
        $themes = $this->themeRepository->findAll();
        $themeStats = [];

        // Récupérer uniquement les utilisateurs concernés par les restrictions d'accès
        $users = $this->userRepository->findByRoleWithCriteria(role: 'ROLE_USER', criteria: $accessCriteria);
        $userCount = count($users);

        foreach ($themes as $theme) {
            $modules = $theme->getModules();
            $totalModules = count($modules);
            $modulesCompletedByAgent = 0;
            $modulesValidatedByMentor = 0;

            foreach ($modules as $module) {
                // Récupérer uniquement les actions des utilisateurs concernés par les restrictions d'accès
                $actions = $this->actionRepository->findByModuleAndCriteria($module, $accessCriteria);

                foreach ($actions as $action) {
                    if ($action->getAgentValidatedAt()) {
                        ++$modulesCompletedByAgent;
                    }
                    if ($action->getMentorValidatedAt()) {
                        ++$modulesValidatedByMentor;
                    }
                }
            }

            // Éviter la division par zéro en vérifiant que totalModules > 0 ET userCount > 0
            $agentProgress = ($totalModules > 0 && $userCount > 0)
                ? ($modulesCompletedByAgent / ($totalModules * $userCount)) * 100
                : 0;

            $mentorProgress = ($totalModules > 0 && $userCount > 0)
                ? ($modulesValidatedByMentor / ($totalModules * $userCount)) * 100
                : 0;

            // Créer un format de données compatible avec l'interface
            $themeStats[] = [
                'theme' => $theme,
                'total_modules' => $totalModules,
                'modules_completed_by_agent' => $modulesCompletedByAgent,
                'modules_validated_by_mentor' => $modulesValidatedByMentor,
                'agent_progress' => round($agentProgress, 1),
                'mentor_progress' => round($mentorProgress, 1),
            ];
        }

        return $themeStats;
    }
}
