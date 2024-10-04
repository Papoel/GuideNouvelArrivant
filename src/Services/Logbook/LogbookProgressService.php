<?php

declare(strict_types=1);

namespace App\Services\Logbook;

use App\Entity\Action;
use App\Entity\Logbook;
use App\Entity\Module;
use App\Entity\User;

class LogbookProgressService
{
    /**
     * @return array{
     *     agent_progress: float,
     *     mentor_progress: float,
     *     total_modules: int,
     *     completed_by_agent: int,
     *     validated_by_mentor: int,
     *     modules_awaiting_validation: int,
     *     progress_class: string
     * }
     */
    public function calculateLogbookProgress(Logbook $logbook): array
    {
        $totalModules = 0;
        $completedByAgent = 0;
        $validatedByMentor = 0;

        foreach ($logbook->getThemes() as $theme) {
            foreach ($theme->getModules() as $module) {
                ++$totalModules;
                $owner = $logbook->getOwner();
                if ($owner) {
                    $action = $this->findActionForModule($owner, $module);
                    if ($action) {
                        if ($action->getAgentValidatedAt()) {
                            ++$completedByAgent;
                        }
                        if ($action->getMentorValidatedAt()) {
                            ++$validatedByMentor;
                        }
                    }
                }
            }
        }

        $agentProgress = $totalModules > 0 ? ($completedByAgent / $totalModules) * 100 : 0;
        $mentorProgress = $totalModules > 0 ? ($validatedByMentor / $totalModules) * 100 : 0;

        // Définir la classe de la barre de progression en fonction du pourcentage
        $progressClass = 'bg-danger';
        if ($agentProgress > 75) {
            $progressClass = 'bg-success';
        } elseif ($agentProgress >= 50) {
            $progressClass = 'bg-warning text-dark';
        }

        return [
            'agent_progress' => round(num: $agentProgress, precision: 1),
            'mentor_progress' => round(num: $mentorProgress, precision: 1),
            'total_modules' => $totalModules,
            'completed_by_agent' => $completedByAgent,
            'validated_by_mentor' => $validatedByMentor,
            'modules_awaiting_validation' => $completedByAgent - $validatedByMentor,
            'progress_class' => $progressClass,
        ];
    }

    private function findActionForModule(User $user, Module $module): ?Action
    {
        foreach ($user->getActions() as $action) {
            if ($action->getModule() === $module) {
                return $action;
            }
        }

        return null;
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
