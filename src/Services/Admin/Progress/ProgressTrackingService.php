<?php

declare(strict_types=1);

namespace App\Services\Admin\Progress;

use App\Entity\Logbook;
use App\Entity\Theme;
use App\Entity\User;
use App\Repository\UserRepository;
use App\Services\Admin\interfaces\LogbookDataProviderInterface;
use App\Services\Admin\interfaces\ProgressAccessServiceInterface;
use App\Services\Admin\interfaces\ProgressTrackingServiceInterface;
use App\Services\Admin\interfaces\StatisticsServiceInterface;
use App\Services\Admin\interfaces\ThemeProgressServiceInterface;
use App\Services\Logbook\LogbookProgressService;
use DateTimeInterface;
use Doctrine\DBAL\Exception;
use Doctrine\ORM\EntityManagerInterface;

/** Service responsable du suivi de la progression des utilisateurs.
 * Ce service coordonne les différents aspects du suivi de progression en déléguant
 * les responsabilités spécifiques à des services spécialisés. */
readonly class ProgressTrackingService implements ProgressTrackingServiceInterface
{
    public function __construct(
        private UserRepository $userRepository,
        private LogbookDataProviderInterface $logbookDataProvider,
        private StatisticsServiceInterface $statisticsService,
        private ThemeProgressServiceInterface $themeProgressService,
        private ProgressAccessServiceInterface $progressAccessService,
        private LogbookProgressService $logbookProgressService,
        private EntityManagerInterface $entityManager,
    ) {
    }

    /** Récupère les données de progression pour tous les utilisateurs avec pagination et recherche.
     * Cette méthode coordonne la récupération des données de progression des utilisateurs
     * en tenant compte des droits d'accès, de la pagination et des termes de recherche.
     * Elle délègue les opérations spécifiques aux services spécialisés.
     *
     * @param string|null $searchTerm Terme de recherche optionnel pour filtrer les utilisateurs
     * @param int         $page       Numéro de page pour la pagination
     * @param int         $limit      Nombre d'éléments par page
     *
     * @return array{
     *     users: list<array{
     *         user: User,
     *         logbook: Logbook|null,
     *         mentor: User|null,
     *         last_action_date: DateTimeInterface|null,
     *         hiring_date: DateTimeInterface|null,
     *         days_since_hiring: int,
     *         progress: array<string, int|string|float>
     *     }>,
     *     global_stats: array<string, int|float>,
     *     pagination: array{
     *         currentPage: int,
     *         totalPages: int,
     *         totalItems: int,
     *         itemsPerPage: int
     *     },
     *     search_term: string|null
     * } */
    public function getUsersProgressData(?string $searchTerm = null, int $page = 1, int $limit = 25): array
    {
        // Récupérer les critères d'accès basés sur les droits de l'utilisateur
        $accessCriteria = $this->progressAccessService->getAccessCriteria();

        // Récupérer les utilisateurs en fonction des droits d'accès
        $usersData = $this->getUsersWithPagination($searchTerm, $page, $limit, $accessCriteria);

        // Enrichir les données des utilisateurs avec les informations de progression
        $usersWithProgressData = $this->enrichUsersWithProgressData($usersData['users']);

        // Récupérer les statistiques globales (adaptées aux restrictions d'accès)
        $globalStats = $this->statisticsService->getGlobalStatistics($accessCriteria);

        return [
            'users' => $usersWithProgressData,
            'global_stats' => $globalStats,
            'pagination' => $usersData['pagination'],
            'search_term' => $searchTerm,
        ];
    }

    /** Récupère les utilisateurs avec pagination en fonction des droits d'accès.
     * Cette méthode gère deux cas de figure :
     * - Pour les super administrateurs : utilisation de la méthode standard avec pagination
     * - Pour les autres utilisateurs : filtrage par service avec pagination manuelle.
     *
     * @param string|null          $searchTerm     Terme de recherche
     * @param int                  $page           Numéro de page
     * @param int                  $limit          Nombre d'éléments par page
     * @param array<string, mixed> $accessCriteria Critères d'accès
     *
     * @return array{
     *      users: list<User>,
     *      pagination: array{
     *          currentPage: int,
     *          totalPages: int,
     *          totalItems: int,
     *          itemsPerPage: int
     *      }
     *  }
     *
     * @throws Exception */
    private function getUsersWithPagination(?string $searchTerm, int $page, int $limit, array $accessCriteria): array
    {
        $users = [];
        $totalItems = 0;
        $totalPages = 1;

        // Si l'utilisateur est un SUPER_ADMIN, on utilise la méthode standard avec pagination
        if ($this->progressAccessService->isSuperAdmin()) {
            $paginatedData = $this->userRepository->findBySearchTermPaginated(
                $searchTerm,
                'ROLE_USER',
                $page,
                $limit
            );
            $users = $paginatedData['users'];
            $totalItems = $paginatedData['totalItems'];
            $totalPages = $paginatedData['totalPages'];
        } else {
            // Pour les utilisateurs non SUPER_ADMIN, récupérer les utilisateurs avec carnet
            $conn = $this->entityManager->getConnection();
            $currentUserService = $this->progressAccessService->getCurrentUserService();

            if ($currentUserService) {
                // Convertir l'UUID textuel en format binaire pour la requête SQL
                $binaryUuid = $this->hexToUuidBinary($currentUserService);

                // Récupérer les utilisateurs avec carnet pour le service spécifié
                $sql = '
                    SELECT DISTINCT u.id 
                    FROM users u 
                    JOIN logbooks l ON l.owner_id = u.id 
                    WHERE u.service_id = :serviceId
                ';

                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':serviceId', $binaryUuid, \PDO::PARAM_STR);
                $resultSet = $stmt->executeQuery();
                $userIds = $resultSet->fetchFirstColumn();

                // Récupérer les entités utilisateur complètes
                $allUsers = [];
                foreach ($userIds as $userId) {
                    $user = $this->userRepository->find($userId);
                    if ($user) {
                        $allUsers[] = $user;
                    }
                }

                // Si aucun utilisateur n'est trouvé avec un carnet, afficher tous les utilisateurs du service
                if (empty($allUsers)) {
                    $serviceSql = 'SELECT u.id FROM users u WHERE u.service_id = :serviceId';
                    $serviceStmt = $conn->prepare($serviceSql);
                    $serviceStmt->bindValue(':serviceId', $binaryUuid, \PDO::PARAM_STR);
                    $serviceResultSet = $serviceStmt->executeQuery();
                    $serviceUserIds = $serviceResultSet->fetchFirstColumn();

                    foreach ($serviceUserIds as $userId) {
                        $user = $this->userRepository->find($userId);
                        if ($user) {
                            $allUsers[] = $user;
                        }
                    }
                }

                // Filtrer par terme de recherche si nécessaire
                if ($searchTerm) {
                    $allUsers = $this->filterUsersBySearchTerm(users: $allUsers, searchTerm: $searchTerm);
                }

                // Pagination manuelle
                $totalItems = count(value: $allUsers);
                $totalPages = (int) ceil(num: $totalItems / $limit);
                $offset = ($page - 1) * $limit;
                $users = array_slice(array: $allUsers, offset: $offset, length: $limit);
            }
        }

        // Garantir que $users est une liste (indices numériques consécutifs)
        $usersList = array_values($users);

        return [
            'users' => $usersList,
            'pagination' => [
                'currentPage' => $page,
                'totalPages' => $totalPages,
                'totalItems' => $totalItems,
                'itemsPerPage' => $limit,
            ],
        ];
    }

    /** Filtre les utilisateurs en fonction d'un terme de recherche
     *
     * @param list<User>  $users      Liste des utilisateurs
     *                                à filtrer
     * @param string|null $searchTerm Terme de recherche
     *
     * @return list<User> Liste filtrée des utilisateurs */
    private function filterUsersBySearchTerm(array $users, ?string $searchTerm): array
    {
        if (!is_string($searchTerm) || '' === $searchTerm) {
            return $users;
        }

        $normalizedSearchTerm = strtolower($searchTerm);

        $filtered = array_filter(
            $users,
            callback: static function (User $user) use ($normalizedSearchTerm): bool {
                $firstname = strtolower(string: $user->getFirstname());
                $lastname = strtolower(string: $user->getLastname());
                $email = strtolower(string: $user->getEmail() ?? '');

                $nni = $user->getNni();
                $nniNormalized = is_string(value: $nni) ? strtolower(string: $nni) : null;

                return
                    str_contains(haystack: $firstname, needle: $normalizedSearchTerm)
                    || str_contains(haystack: $lastname, needle: $normalizedSearchTerm)
                    || str_contains(haystack: $email, needle: $normalizedSearchTerm)
                    || ($nniNormalized && str_contains(haystack: $nniNormalized, needle: $normalizedSearchTerm));
            }
        );

        // Réindexer le tableau pour garantir qu'il s'agit d'une liste (indices numériques consécutifs)
        return array_values($filtered);
    }

    /** Enrichit les données des utilisateurs avec les informations de progression.
     * Pour chaque utilisateur, cette méthode récupère :
     * - Le carnet de l'utilisateur
     * - Les données de progression
     * - La date de la dernière action
     * - Le nombre de jours depuis l'embauche.
     *
     * @param list<User> $users
     *
     * @return list<array{
     *      user: User,
     *      logbook: Logbook|null,
     *      mentor: User|null,
     *      last_action_date: DateTimeInterface|null,
     *      hiring_date: DateTimeInterface|null,
     *      days_since_hiring: int,
     *      progress: array<string, int|string|float>
     *  }> Liste des utilisateurs avec leurs données de progression */
    private function enrichUsersWithProgressData(array $users): array
    {
        $usersData = [];

        foreach ($users as $user) {
            $logbook = $this->logbookDataProvider->getLogbookForUser($user);
            $lastActionDate = $this->logbookDataProvider->getLastActionDate($user);
            $daysSinceHiring = $this->logbookDataProvider->getDaysSinceHiring($user);

            // Construire les données de l'utilisateur
            $userData = [
                'user' => $user,
                'logbook' => $logbook,
                'mentor' => $user->getMentor(),
                'last_action_date' => $lastActionDate,
                'hiring_date' => $user->getHiringAt(),
                'days_since_hiring' => $daysSinceHiring ?? 0,
            ];

            // Ajouter les données de progression
            if ($logbook) {
                // Utiliser le service LogbookProgressService injecté
                $progress = $this->logbookProgressService->calculateLogbookProgress($logbook);
                $userData['progress'] = $progress;
            } else {
                // Utilisateur sans carnet
                $userData['progress'] = [
                    'agent_progress' => 0,
                    'mentor_progress' => 0,
                    'total_modules' => 0,
                    'completed_by_agent' => 0,
                    'validated_by_mentor' => 0,
                    'modules_awaiting_completion' => 0,
                    'modules_awaiting_validation' => 0,
                    'progress_class_agent' => 'bg-danger',
                    'progress_class_mentor' => 'bg-danger',
                ];
            }

            $usersData[] = $userData;
        }

        return $usersData;
    }

    /** Convertit un UUID au format hexadécimal en format binaire pour les requêtes SQL.
     *
     * Cette méthode permet de convertir un UUID textuel (par exemple "0197e61c-62a0-7117-825a-6370c59ee2a7")
     * en format binaire utilisé dans la base de données MySQL/MariaDB.
     *
     * @param string $uuid UUID au format hexadécimal
     *
     * @return string UUID au format binaire */
    private function hexToUuidBinary(string $uuid): string
    {
        // Supprimer les tirets
        $uuid = str_replace(search: '-', replace: '', subject: $uuid);

        // Convertir l'UUID hexadécimal en binaire
        $binary = '';
        for ($i = 0, $iMax = strlen(string: $uuid); $i < $iMax; $i += 2) {
            $binary .= chr(codepoint: (int) hexdec(hex_string: substr(string: $uuid, offset: $i, length: 2)));
        }

        return $binary;
    }

    /** Récupère les données de progression par thème.
     * Cette méthode délègue la récupération des données de progression par thème
     * au service spécialisé ThemeProgressService.
     *
     * @return list<array{
     *      theme: Theme,
     *      total_modules: int,
     *      modules_completed_by_agent: int,
     *      modules_validated_by_mentor: int,
     *      agent_progress: float,
     *      mentor_progress: float
     *  }> */
    public function getThemeProgressData(): array
    {
        $accessCriteria = $this->progressAccessService->getAccessCriteria();

        /** @var array<string, string|array<string>> $typedAccessCriteria */
        $typedAccessCriteria = $accessCriteria;

        $result = $this->themeProgressService->getThemeProgressData($typedAccessCriteria);

        // Garantir que le résultat est une liste (indices numériques consécutifs)
        return array_values($result);
    }
}
