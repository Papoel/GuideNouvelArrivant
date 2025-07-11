<?php

declare(strict_types=1);

namespace App\Services\Admin\Statistics;

use App\Entity\User;
use App\Repository\Interfaces\FeedbackRepositoryInterface;
use App\Repository\UserRepository;
use App\Services\Admin\interfaces\LogbookDataProviderInterface;
use App\Services\Admin\interfaces\StatisticsServiceInterface;
use App\Services\Logbook\LogbookProgressService;
use Symfony\Bundle\SecurityBundle\Security;

/**
 * Service responsable du calcul des statistiques globales de l'application.
 * Implémente l'interface StatisticsServiceInterface pour respecter le principe d'inversion de dépendance.
 */
readonly class StatisticsService implements StatisticsServiceInterface
{
    public function __construct(
        private UserRepository $userRepository,
        private FeedbackRepositoryInterface $feedbackRepository,
        private LogbookProgressService $logbookProgressService,
        private LogbookDataProviderInterface $logbookDataProvider,
        private Security $security
    ) {
    }

    /**
     * Récupère les statistiques globales basées sur les critères d'accès.
     *
     * @param array<string, mixed> $accessCriteria Critères d'accès pour filtrer les statistiques (ex: service)
     *
     * @return array<string, mixed> Structure de données contenant les statistiques globales
     */
    public function getGlobalStatistics(array $accessCriteria = []): array
    {
        $allUsers = $this->getAllUsers(accessCriteria: $accessCriteria);
        $logbookStats = $this->calculateLogbookStatistics(users: $allUsers);
        $feedbackStats = $this->calculateFeedbackStatistics();
        $currentUserService = $this->getCurrentUserService();

        return $this->buildStatisticsArray(
            logbookStats: $logbookStats,
            feedbackStats: $feedbackStats,
            currentUserService: $currentUserService,
            totalUsers: count(value: $allUsers)
        );
    }

    /**
     * Récupère tous les utilisateurs selon les critères d'accès.
     *
     * @param array<string, mixed> $accessCriteria
     *
     * @return array<User>
     */
    private function getAllUsers(array $accessCriteria): array
    {
        return $this->userRepository->findByRoleWithCriteria(role: 'ROLE_USER', criteria: $accessCriteria);
    }

    /**
     * Calcule les statistiques liées aux carnets de bord.
     *
     * @param array<User> $users
     *
     * @return array{
     *     usersWithLogbook: int,
     *     usersWithMentorValidation: int,
     *     averageAgentProgress: float,
     *     averageMentorProgress: float
     * }
     */
    private function calculateLogbookStatistics(array $users): array
    {
        $totalAgentProgress = 0.0;
        $totalMentorProgress = 0.0;
        $usersWithLogbook = 0;
        $usersWithMentorValidation = 0;

        foreach ($users as $user) {
            $logbook = $this->logbookDataProvider->getLogbookForUser(user: $user);

            if (!$logbook) {
                continue;
            }

            $progress = $this->logbookProgressService->calculateLogbookProgress(logbook: $logbook);
            $this->updateProgressCounters(
                $progress,
                totalAgentProgress: $totalAgentProgress,
                totalMentorProgress: $totalMentorProgress,
                usersWithLogbook: $usersWithLogbook,
                usersWithMentorValidation: $usersWithMentorValidation
            );
        }

        return [
            'usersWithLogbook' => $usersWithLogbook,
            'usersWithMentorValidation' => $usersWithMentorValidation,
            'averageAgentProgress' => $this->calculateAverage(total: $totalAgentProgress, count: $usersWithLogbook),
            'averageMentorProgress' => $this->calculateAverage(total: $totalMentorProgress, count: $usersWithLogbook),
        ];
    }

    /**
     * Met à jour les compteurs de progression.
     *
     * @param array<string, mixed> $progress
     */
    private function updateProgressCounters(
        array $progress,
        float &$totalAgentProgress,
        float &$totalMentorProgress,
        int &$usersWithLogbook,
        int &$usersWithMentorValidation
    ): void {
        $totalAgentProgress += $progress['agent_progress'];
        $totalMentorProgress += $progress['mentor_progress'];
        ++$usersWithLogbook;

        if ($progress['mentor_progress'] > 0) {
            ++$usersWithMentorValidation;
        }
    }

    /**
     * Calcule la moyenne en évitant la division par zéro.
     */
    private function calculateAverage(float $total, int $count): float
    {
        return $count > 0 ? $total / $count : 0.0;
    }

    /**
     * Calcule les statistiques liées aux feedbacks.
     *
     * @return array{totalFeedbacks: int, pendingFeedbacks: int}
     */
    private function calculateFeedbackStatistics(): array
    {
        $feedbackCriteria = $this->getFeedbackCriteria();

        /** @var array<string, bool|int|string|null> $pendingCriteria */
        $pendingCriteria = array_merge($feedbackCriteria, ['isReviewed' => false]);

        return [
            'totalFeedbacks' => $this->feedbackRepository->countByCriteria(criteria: $feedbackCriteria),
            'pendingFeedbacks' => $this->feedbackRepository->countByCriteria(criteria: $pendingCriteria),
        ];
    }

    /**
     * Détermine les critères de filtrage des feedbacks selon les permissions.
     *
     * @return array<string, bool|int|string|null>
     */
    private function getFeedbackCriteria(): array
    {
        if ($this->isSuperAdmin()) {
            return [];
        }

        return ['serviceName' => $this->getCurrentUserService()];
    }

    /**
     * Construit le tableau final des statistiques.
     *
     * @param array<string, mixed> $logbookStats
     * @param array<string, mixed> $feedbackStats
     *
     * @return array<string, mixed>
     */
    private function buildStatisticsArray(
        array $logbookStats,
        array $feedbackStats,
        string $currentUserService,
        int $totalUsers
    ): array {
        return [
            'service utilisateur connecté' => $currentUserService,
            'total_users' => $totalUsers,
            'users_with_logbook' => $logbookStats['usersWithLogbook'],
            'users_with_mentor_validation' => $logbookStats['usersWithMentorValidation'],
            'average_agent_progress' => round(
                num: is_numeric($logbookStats['averageAgentProgress'])
                    ? (float) $logbookStats['averageAgentProgress']
                    : 0.0,
                precision: 1
            ),
            'average_mentor_progress' => round(
                num: is_numeric($logbookStats['averageMentorProgress'])
                    ? (float) $logbookStats['averageMentorProgress']
                    : 0.0,
                precision: 1
            ),
            'total_feedbacks' => $feedbackStats['totalFeedbacks'],
            'pending_feedbacks' => $feedbackStats['pendingFeedbacks'],
        ];
    }

    /**
     * Vérifie si l'utilisateur actuel est un SUPER_ADMIN.
     */
    public function isSuperAdmin(): bool
    {
        return $this->security->isGranted(attributes: 'ROLE_SUPER_ADMIN');
    }

    /**
     * Récupère le service de l'utilisateur connecté.
     */
    private function getCurrentUserService(): string
    {
        $user = $this->security->getUser();

        if (!$user || !method_exists(object_or_class: $user, method: 'getService')) {
            return 'Non assigné';
        }

        $service = $user->getService();
        if (!$service) {
            return 'Non assigné';
        }

        return $service->getName();
    }
}
