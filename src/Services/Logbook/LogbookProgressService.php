<?php

declare(strict_types=1);

namespace App\Services\Logbook;

use App\Entity\User;
use App\Entity\Action;
use App\Entity\Module;
use App\Entity\Logbook;
use Doctrine\Common\Collections\Collection;

class LogbookProgressService
{
    /** @return array{
     *     agent_progress: float,
     *     mentor_progress: float,
     *     total_modules: int,
     *     completed_by_agent: int,
     *     validated_by_mentor: int,
     *     modules_awaiting_validation: int,
     *     progress_class_agent: string,
     *     progress_class_mentor: string
     * } */
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
        $progressClassAgent = 'bg-danger';
        if ($agentProgress > 75) {
            $progressClassAgent = 'bg-success';
        } elseif ($agentProgress >= 50) {
            $progressClassAgent = 'bg-warning text-dark';
        }

        $progressClassMentor = 'bg-danger';
        if ($mentorProgress > 75) {
            $progressClassMentor = 'bg-success';
        } elseif ($mentorProgress >= 50) {
            $progressClassMentor = 'bg-warning text-dark';
        }

        return [
            'agent_progress' => round(num: $agentProgress, precision: 1),
            'mentor_progress' => round(num: $mentorProgress, precision: 1),
            'total_modules' => $totalModules,
            'completed_by_agent' => $completedByAgent,
            'validated_by_mentor' => $validatedByMentor,
            'modules_awaiting_completion' => $totalModules - $completedByAgent,
            'modules_awaiting_validation' => $completedByAgent - $validatedByMentor,
            'progress_class_agent' => $progressClassAgent,
            'progress_class_mentor' => $progressClassMentor,
        ];
    }

    /**
     * Récupère la liste des tuteurs ayant des modules en attente de validation
     * @param Collection<int, Logbook>|array<Logbook> $logbooks
     * @return array{
     *     mentors_with_pending_modules: array<string, array{
     *         mentor_email: string,
     *         mentor_firstname: string,
     *         owner_fullname: string,
     *         pending_modules_count: int,
     *         mentor_nni: ?string
     *     }>,
     *     mentor_emails_list: array<string>
     * }
     */
    public function getMentorsWithPendingValidations(Collection|array $logbooks): array
    {
        $mentorsData = [];
        $mentorEmailsList = [];

        foreach ($logbooks as $logbook) {
            $owner = $logbook->getOwner();
            if (!$owner) {
                continue; // Pas de propriétaire, on passe au suivant
            }

            $mentor = $owner->getMentor();
            if (!$mentor || !$mentor->getEmail()) {
                continue; // Pas de mentor ou pas d'email, on passe au suivant
            }

            // Calculer les modules en attente de validation par le mentor
            $pendingModules = $this->calculatePendingModulesForMentor($logbook);

            if ($pendingModules === 0) {
                continue; // Aucun module en attente, on passe au suivant
            }

            $mentorEmail = $mentor->getEmail();

            // Initialiser les données du mentor s'il n'existe pas encore
            if (!isset($mentorsData[$mentorEmail])) {
                $mentorsData[$mentorEmail] = [
                    'mentor_email' => $mentorEmail,
                    'pending_modules_count' => 0,
                    'mentor_firstname' => $mentor->getFirstname(),
                    'owner_fullname' => $owner->getFullName(),
                    'mentor_nni' => $mentor->getNni(),
                ];
            }

            // Ajouter les informations du logbook
            $mentorsData[$mentorEmail]['pending_modules_count'] += $pendingModules;

            // Ajouter l'email à la liste si pas déjà présent
            if (!in_array($mentorEmail, $mentorEmailsList, true)) {
                $mentorEmailsList[] = $mentorEmail;
            }
        }

        return [
            'mentors_with_pending_modules' => $mentorsData,
            'mentor_emails_list' => $mentorEmailsList,
        ];
    }

    /**
     * Calcule le nombre de modules en attente de validation par le mentor pour un logbook
     */
    private function calculatePendingModulesForMentor(Logbook $logbook): int
    {
        $pendingModules = 0;
        $owner = $logbook->getOwner();

        if (!$owner) {
            return 0;
        }

        foreach ($logbook->getThemes() as $theme) {
            foreach ($theme->getModules() as $module) {
                $action = $this->findActionForModule($owner, $module);
                if ($action && $action->getAgentValidatedAt() && !$action->getMentorValidatedAt()) {
                    // Module complété par l'agent mais pas encore validé par le mentor
                    $pendingModules++;
                }
            }
        }

        return $pendingModules;
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
}
