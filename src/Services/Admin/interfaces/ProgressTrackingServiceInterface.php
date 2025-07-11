<?php

declare(strict_types=1);

namespace App\Services\Admin\interfaces;

/**
 * Interface définissant les services de suivi de progression des utilisateurs.
 * Elle permet de suivre l'avancement des utilisateurs dans leur parcours d'intégration.
 */
interface ProgressTrackingServiceInterface
{
    /**
     * Récupère les données de progression pour tous les utilisateurs avec pagination et recherche.
     *
     * @param string|null $searchTerm Terme de recherche optionnel pour filtrer les utilisateurs
     * @param int         $page       Numéro de page pour la pagination
     * @param int         $limit      Nombre d'éléments par page
     *
     * @return array{
     *     users: list<array{
     *         user: \App\Entity\User,
     *         logbook: \App\Entity\Logbook|null,
     *         mentor: \App\Entity\User|null,
     *         last_action_date: \DateTimeInterface|null,
     *         hiring_date: \DateTimeInterface|null,
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
     * } Structure de données contenant les informations de progression des utilisateurs
     */
    public function getUsersProgressData(?string $searchTerm = null, int $page = 1, int $limit = 25): array;

    /**
     * Récupère les données de progression par thème.
     *
     * @return array<int, array{
     *     theme: \App\Entity\Theme,
     *     total_modules: int,
     *     modules_completed_by_agent: int,
     *     modules_validated_by_mentor: int,
     *     agent_progress: float,
     *     mentor_progress: float
     * }> Structure de données contenant les informations de progression par thème
     */
    public function getThemeProgressData(): array;
}
