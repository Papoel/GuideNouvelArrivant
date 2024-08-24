<?php

declare(strict_types=1);

namespace App\Services\Dashboard;

use App\Entity\Logbook;
use App\Entity\User;
use App\Repository\LogbookRepository;
use App\Services\SeniorityService;

readonly class DashboardService
{
    public function __construct(
        private SeniorityService $seniorityService,
        private LogbookRepository $logbookRepository,
        private UserValidationService $userValidationService,
        private LogbookProgressService $logbookProgressService
    ) {
    }

    public function getDashboardData(string $nni, ?User $currentUser): array
    {
        // 1. Vérifier si l'utilisateur est connecté
        $this->userValidationService->validateUser(currentUser: $currentUser, nni: $nni);

        assert(assertion: $currentUser instanceof User);

        // Récupérer tous les carnets de log de l'utilisateur
        $logbooks = $currentUser->getLogbooks();

        /*if ($logbooks->isEmpty()) {
            throw new \RuntimeException(message: 'Aucun carnet de compagnonnage trouvé pour cet utilisateur.');
        }*/

        // Récupération et transformation des détails du logbook
        $logbooksDetails = array_map(
            fn (Logbook $logbook) => $this->transformLogbookDetails($logbook),
            $logbooks->toArray()
        );

        return [
            'user' => $currentUser,
            'logbooks' => $logbooksDetails,
            'userSeniority' => $this->calculateSeniority($currentUser->getHiringAt()),
            'mentorSeniority' => $this->calculateSeniority($currentUser->getMentor()?->getHiringAt()),
        ];
    }

    private function transformLogbookDetails(Logbook $logbook): array
    {
        // Récupérer les détails bruts depuis le repository
        $rawDetails = $this->logbookRepository->findLogbookDetails($logbook);

        // Transformation des détails en une structure hiérarchique
        $themes = [];
        foreach ($rawDetails as $item) {
            $themeId = $item['themeId'];
            $moduleId = $item['moduleId'];

            // Initialiser le thème si non existant
            if (!isset($themes[$themeId])) {
                $themes[$themeId] = [
                    'title' => $item['themeTitle'],
                    'description' => $item['themeDescription'],
                    'modules' => [],
                ];
            }

            // Initialiser le module si non existant
            if (!isset($themes[$themeId]['modules'][$moduleId])) {
                $themes[$themeId]['modules'][$moduleId] = [
                    'title' => $item['moduleTitle'],
                    'description' => $item['moduleDescription'],
                    'actions' => [],
                ];
            }

            // Ajouter l'action si présente
            if (!empty($item['actionId'])) {
                $themes[$themeId]['modules'][$moduleId]['actions'][] = [
                    'id' => $item['actionId'],
                    'description' => $item['actionDescription'],
                    'agentComment' => $item['agentComment'],
                    'agentValidatedAt' => $item['agentValidatedAt'],
                    'agentVisa' => $item['agentVisa'],
                    'mentorComment' => $item['mentorComment'],
                    'mentorValidatedAt' => $item['mentorValidatedAt'],
                    'mentorVisa' => $item['mentorVisa'],
                ];
            }
        }

        // Calcul de la progression
        $progress = $this->logbookProgressService->calculateLogbookProgress($themes);

        return [
            'logbook' => $logbook,
            'themes' => $themes,
            'progress' => $progress['overall'],
            'unvalidated_sections' => $progress['unvalidated_sections'],
            'progress_class' => $progress['progress_class'],
        ];
    }

    private function calculateSeniority(?\DateTimeImmutable $hiringAt): string
    {
        return $hiringAt ? $this->seniorityService->getSeniority(hiringAt: $hiringAt) : 'Non défini';
    }
}
