<?php

declare(strict_types=1);

namespace App\Services\Admin;

use App\Entity\Logbook;
use App\Entity\User;
use App\Repository\LogbookRepository;
use App\Repository\UserRepository;
use App\Services\Logbook\LogbookProgressService;
use Doctrine\ORM\EntityManagerInterface;

class ProgressTrackingService
{
    public function __construct(
        private readonly UserRepository $userRepository,
        private readonly LogbookRepository $logbookRepository,
        private readonly LogbookProgressService $logbookProgressService,
        private readonly EntityManagerInterface $entityManager,
    ) {
    }

    /**
     * Récupère les statistiques de progression pour tous les utilisateurs
     * Version avec pagination et recherche.
     *
     * @param string|null $searchTerm Terme de recherche (optionnel)
     * @param int         $page       Page courante (commence à 1)
     * @param int         $limit      Nombre d'éléments par page
     *
     * @return array [
     *               'users' => [
     *               [
     *               'user' => User,
     *               'progress' => [
     *               'agent_progress' => float,
     *               'mentor_progress' => float,
     *               'total_modules' => int,
     *               ...
     *               ],
     *               'logbook' => Logbook,
     *               'mentor' => User|null,
     *               'last_action_date' => \DateTime|null
     *               ],
     *               ...
     *               ],
     *               'global_stats' => [
     *               'total_users' => int,
     *               'average_agent_progress' => float,
     *               'average_mentor_progress' => float,
     *               ...
     *               ],
     *               'pagination' => [
     *               'currentPage' => int,
     *               'totalPages' => int,
     *               'totalItems' => int,
     *               'itemsPerPage' => int
     *               ]
     *               ]
     */
    public function getUsersProgressData(?string $searchTerm = null, int $page = 1, int $limit = 25): array
    {
        // Récupérer les statistiques globales (on utilise tous les utilisateurs pour cela)
        $globalStats = $this->getGlobalStatistics();

        // Récupérer les utilisateurs paginés et recherchés
        $paginatedData = $this->userRepository->findBySearchTermPaginated($searchTerm, 'ROLE_USER', $page, $limit);
        $users = $paginatedData['users'];

        $usersData = [];
        foreach ($users as $user) {
            // Récupérer le carnet de l'utilisateur
            $logbook = $this->getLogbookForUser($user);

            if (!$logbook) {
                // Utilisateur sans carnet
                $usersData[] = [
                    'user' => $user,
                    'progress' => [
                        'agent_progress' => 0,
                        'mentor_progress' => 0,
                        'total_modules' => 0,
                        'completed_by_agent' => 0,
                        'validated_by_mentor' => 0,
                        'modules_awaiting_completion' => 0,
                        'modules_awaiting_validation' => 0,
                        'progress_class_agent' => 'bg-danger',
                        'progress_class_mentor' => 'bg-danger',
                    ],
                    'logbook' => null,
                    'mentor' => $user->getMentor(),
                    'last_action_date' => $this->getLastActionDate($user),
                    'hiring_date' => $user->getHiringAt(),
                    'days_since_hiring' => $this->getDaysSinceHiring($user),
                ];
                continue;
            }

            $progress = $this->logbookProgressService->calculateLogbookProgress($logbook);

            $usersData[] = [
                'user' => $user,
                'progress' => $progress,
                'logbook' => $logbook,
                'mentor' => $user->getMentor(),
                'last_action_date' => $this->getLastActionDate($user),
                'hiring_date' => $user->getHiringAt(),
                'days_since_hiring' => $this->getDaysSinceHiring($user),
            ];
        }

        // Informations de pagination
        $pagination = [
            'currentPage' => $page,
            'totalPages' => $paginatedData['totalPages'],
            'totalItems' => $paginatedData['totalItems'],
            'itemsPerPage' => $limit,
        ];

        return [
            'users' => $usersData,
            'global_stats' => $globalStats,
            'pagination' => $pagination,
            'search_term' => $searchTerm,
        ];
    }

    /**
     * Récupère les statistiques globales pour tous les utilisateurs.
     */
    private function getGlobalStatistics(): array
    {
        // Pour les statistiques globales, nous avons besoin de tous les utilisateurs
        $allUsers = $this->userRepository->findByRole('ROLE_USER');

        $totalAgentProgress = 0;
        $totalMentorProgress = 0;
        $usersWithLogbook = 0;
        $usersWithMentorValidation = 0;

        foreach ($allUsers as $user) {
            $logbook = $this->getLogbookForUser($user);

            if ($logbook) {
                $progress = $this->logbookProgressService->calculateLogbookProgress($logbook);

                $totalAgentProgress += $progress['agent_progress'];
                $totalMentorProgress += $progress['mentor_progress'];
                ++$usersWithLogbook;

                if ($progress['mentor_progress'] > 0) {
                    ++$usersWithMentorValidation;
                }
            }
        }

        // Calculer les statistiques globales
        $averageAgentProgress = $usersWithLogbook > 0 ? $totalAgentProgress / $usersWithLogbook : 0;
        $averageMentorProgress = $usersWithLogbook > 0 ? $totalMentorProgress / $usersWithLogbook : 0;

        return [
            'total_users' => count($allUsers),
            'users_with_logbook' => $usersWithLogbook,
            'users_with_mentor_validation' => $usersWithMentorValidation,
            'average_agent_progress' => round($averageAgentProgress, 1),
            'average_mentor_progress' => round($averageMentorProgress, 1),
        ];
    }

    /**
     * Récupère les statistiques par thème pour visualisation.
     */
    public function getThemeProgressData(): array
    {
        $themes = $this->entityManager->getRepository('App\Entity\Theme')->findAll();
        $themeStats = [];

        foreach ($themes as $theme) {
            $modules = $theme->getModules();
            $totalModules = count($modules);
            $modulesCompletedByAgent = 0;
            $modulesValidatedByMentor = 0;

            foreach ($modules as $module) {
                $actions = $this->entityManager->getRepository('App\Entity\Action')
                    ->findBy(['module' => $module]);

                foreach ($actions as $action) {
                    if ($action->getAgentValidatedAt()) {
                        ++$modulesCompletedByAgent;
                    }
                    if ($action->getMentorValidatedAt()) {
                        ++$modulesValidatedByMentor;
                    }
                }
            }

            $users = $this->userRepository->findByRole('ROLE_USER');
            $userCount = count($users);

            // Éviter la division par zéro en vérifiant que totalModules > 0 ET userCount > 0
            $agentProgress = ($totalModules > 0 && $userCount > 0)
                ? ($modulesCompletedByAgent / ($totalModules * $userCount)) * 100
                : 0;

            $mentorProgress = ($totalModules > 0 && $userCount > 0)
                ? ($modulesValidatedByMentor / ($totalModules * $userCount)) * 100
                : 0;

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

    /**
     * Récupère le carnet d'un utilisateur.
     */
    private function getLogbookForUser(User $user): ?Logbook
    {
        return $this->logbookRepository->findOneBy(['owner' => $user]);
    }

    /**
     * Récupère la date de la dernière action d'un utilisateur.
     */
    private function getLastActionDate(User $user): ?\DateTimeInterface
    {
        $lastAction = $this->entityManager->getRepository('App\Entity\Action')
            ->findOneBy(
                ['user' => $user],
                ['agentValidatedAt' => 'DESC']
            );

        return $lastAction ? $lastAction->getAgentValidatedAt() : null;
    }

    /**
     * Calcule le nombre de jours depuis l'embauche.
     */
    private function getDaysSinceHiring(User $user): ?int
    {
        $hiringDate = $user->getHiringAt();
        if (!$hiringDate) {
            return null;
        }

        $now = new \DateTimeImmutable();
        $diff = $now->diff($hiringDate);

        return $diff->days;
    }
}
