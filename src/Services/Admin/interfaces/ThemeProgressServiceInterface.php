<?php

declare(strict_types=1);

namespace App\Services\Admin\interfaces;

/** Interface définissant les services de suivi de progression par thème.
 * Permet de suivre l'avancement global des utilisateurs par thématique.
 * Récupère les données de progression par thème.
 *
 * @param array{
 *     service?: string,
 *     roles?: list<string>
 * } $accessCriteria
 *
 * @return list<array{
 *   theme: string,
 *     completed: int,
 *     totalUsers: int,
 *     validatedUsers: int
 * }> */
interface ThemeProgressServiceInterface
{
    /** Récupère les données de progression par thème.
     *
     * @param array<string, string|array<string>> $accessCriteria Critères d'accès pour filtrer les données (ex: service)
     *
     * @return array<int, array{
     *     theme: \App\Entity\Theme,
     *     total_modules: int,
     *     modules_completed_by_agent: int,
     *     modules_validated_by_mentor: int,
     *     agent_progress: float,
     *     mentor_progress: float
     * }> Structure de données contenant les informations de progression par thème */
    public function getThemeProgressData(array $accessCriteria = []): array;
}
