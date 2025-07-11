<?php

declare(strict_types=1);

namespace App\Services\Admin\interfaces;

/**
 * Interface définissant les services de statistiques globales.
 * Permet de calculer et récupérer les statistiques agrégées sur l'ensemble des utilisateurs.
 */
interface StatisticsServiceInterface
{
    /**
     * Récupère les statistiques globales basées sur les critères d'accès.
     *
     * @param array<string, mixed> $accessCriteria
     *
     * @return array{
     *     total_users: int,
     *     total_actions: int,
     *     avg_completion_rate: float,
     *     active_users: int
     * }
     */
    public function getGlobalStatistics(array $accessCriteria = []): array;
}
