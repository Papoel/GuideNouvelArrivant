<?php

declare(strict_types=1);

namespace App\Services\Logbook;

use App\Entity\Logbook;

class LogbookProgressService
{
    /**
     * @param array<int, array{
     *     actions?: array<int, array{
     *         agentValidatedAt?: mixed,
     *         mentorValidatedAt?: mixed
     *     }>
     * }> $modules
     *
     * @return array{
     *     overall: float,
     *     unvalidated_sections: int,
     *     progress_class: string
     * }
     */
    public function calculateLogbookProgress(array $modules): array
    {
        $totalActions = 0;
        $validatedActions = 0;

        foreach ($modules as $module) {
            // Utiliser un tableau vide si 'actions' n'est pas défini
            $actions = $module['actions'] ?? [];

            foreach ($actions as $action) {
                ++$totalActions;
                if (!empty($action['agentValidatedAt']) && !empty($action['mentorValidatedAt'])) {
                    ++$validatedActions;
                }
            }
        }

        $progress = $totalActions > 0 ? ($validatedActions / $totalActions) * 100 : 0;

        // Définir la classe de la barre de progression en fonction du pourcentage
        $progressClass = 'bg-danger';
        if ($progress > 75) {
            $progressClass = 'bg-success';
        } elseif ($progress > 50) {
            $progressClass = 'bg-warning';
        }

        return [
            'overall' => round(num: $progress, precision: 2),
            'unvalidated_sections' => $totalActions - $validatedActions,
            'progress_class' => $progressClass,
        ];
    }

    public function calculateProgress(Logbook $logbook): float
    {
        $totalActions = 0;
        $completedActions = 0;

        foreach ($logbook->getThemes() as $theme) {
            foreach ($theme->getModules() as $module) {
                $actions = $module->getActions();
                $totalActions += count($actions);

                foreach ($actions as $action) {
                    if (null !== $action) {
                        ++$completedActions;
                    }
                }
            }
        }

        if (0 === $totalActions) {
            return 0; // Pas d'actions à faire, donc avancement nul
        }

        return ($completedActions / $totalActions) * 100;
    }
}
