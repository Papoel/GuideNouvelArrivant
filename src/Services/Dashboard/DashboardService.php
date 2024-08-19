<?php

declare(strict_types=1);

namespace App\Services\Dashboard;

use App\Entity\Logbook;
use App\Entity\User;
use App\Repository\LogbookRepository;
use App\Services\SeniorityService;

readonly class DashboardService
{
    public function __construct(private SeniorityService $seniorityService, private LogbookRepository $logbookRepository, private UserValidationService $userValidationService, private LogbookProgressService $logbookProgressService)
    {
    }

    /**
     * @return array{
     *     user: User,
     *     logbooks: array<int, array{
     *         logbook: Logbook|null,
     *         modules: array<int, array{
     *             actions?: array<int, array{
     *                 agentValidatedAt?: mixed,
     *                 mentorValidatedAt?: mixed
     *             }>
     *         }>,
     *         progress: float,
     *         unvalidated_sections: int,
     *         progress_class: string
     *     }>,
     *     userSeniority: string,
     *     mentorSeniority: string
     * }
     *
     * @throws \Exception
     */
    public function getDashboardData(string $nni, ?User $currentUser): array
    {
        // 1. Vérifier si l'utilisateur est connecté
        $this->userValidationService->validateUser(currentUser: $currentUser, nni: $nni);

        assert($currentUser instanceof User);

        // Récupérer tous les carnets de log de l'utilisateur
        $logbooks = $currentUser->getLogbooks();

        if ($logbooks->isEmpty()) {
            throw new \RuntimeException(message: 'Aucun carnet de compagnonnage trouvé pour cet utilisateur.');
        }

        // Tableau pour stocker les détails de chaque carnet
        $logbooksDetails = [];

        // Parcourir chaque carnet de log
        foreach ($logbooks as $logbook) {
            $logbookDetails = $this->findLogbookDetails(logbook: $logbook);
            $logbooksDetails[] = $logbookDetails;
        }

        return [
            'user' => $currentUser,
            'logbooks' => $logbooksDetails,
            'userSeniority' => $this->calculateSeniority($currentUser->getHiringAt()),
            'mentorSeniority' => $this->calculateSeniority($currentUser->getMentor()?->getHiringAt()),
        ];
    }

    /**
     * @return array{
     *     logbook: Logbook|null,
     *     modules: array<int, array{
     *         actions?: array<int, array{
     *             agentValidatedAt?: mixed,
     *             mentorValidatedAt?: mixed
     *         }>
     *     }>,
     *     progress: float,
     *     unvalidated_sections: int,
     *     progress_class: string
     * }
     */
    private function findLogbookDetails(Logbook $logbook): array
    {
        // Utilise le repository pour obtenir les détails du carnet de compagnonnage
        $result = $this->logbookRepository->findLogbookDetails($logbook);

        // Transformation du format des modules pour correspondre à l'attendu
        $modules = array_map(function (array $module): array {
            // On s'assure que la clé 'actions' existe et est un tableau
            $module['actions'] = isset($module['actions']) && is_array($module['actions']) ? $module['actions'] : [];

            // On retourne le module avec la structure correcte
            return $module;
        }, $result);

        // Calculer la progression
        $progress = $this->logbookProgressService->calculateLogbookProgress($modules);

        return ['logbook' => $logbook, 'modules' => $modules, 'progress' => $progress['overall'], 'unvalidated_sections' => $progress['unvalidated_sections'], 'progress_class' => $progress['progress_class']];
    }

    private function calculateSeniority(?\DateTimeImmutable $hiringAt): string
    {
        return $hiringAt ? $this->seniorityService->getSeniority(hiringAt: $hiringAt) : 'Non défini';
    }
}
