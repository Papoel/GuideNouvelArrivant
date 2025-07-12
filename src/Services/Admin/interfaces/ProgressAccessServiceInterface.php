<?php

declare(strict_types=1);

namespace App\Services\Admin\interfaces;

use App\Entity\User;

/** Interface définissant les méthodes de contrôle d'accès pour les fonctionnalités de progression. */
interface ProgressAccessServiceInterface
{
    /** Vérifie si l'utilisateur courant est un super administrateur. */
    public function isSuperAdmin(): bool;

    /** Récupère l'utilisateur actuellement connecté. */
    public function getCurrentUser(): ?User;

    /** Récupère l'ID du service de l'utilisateur actuellement connecté.
     *
     * @return string|null L'ID du service ou null si l'utilisateur n'est pas rattaché à un service */
    public function getCurrentUserService(): ?string;

    /** Récupère les critères d'accès à appliquer aux requêtes.
     *
     * @return array<string, mixed> Critères d'accès (vide pour super admin, filtré par service sinon) */
    public function getAccessCriteria(): array;

    /** Filtre les données utilisateurs en fonction des droits d'accès.
     *
     * @param array<int|string, array<string, mixed>> $usersData Tableau de données utilisateurs à filtrer
     *
     * @return array<int|string, array<string, mixed>> Tableau filtré selon les droits d'accès */
    public function filterUsersByAccess(array $usersData): array;
}
