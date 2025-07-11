<?php

declare(strict_types=1);

namespace App\Services\Admin\Progress;

use App\Entity\User;
use App\Services\Admin\interfaces\ProgressAccessServiceInterface;
use Symfony\Bundle\SecurityBundle\Security;

/**
 * Service dédié à la gestion des restrictions d'accès pour le ProgressController
 * Implémente l'interface ProgressAccessServiceInterface pour respecter le principe d'inversion de dépendance.
 */
readonly class ProgressAccessService implements ProgressAccessServiceInterface
{
    public function __construct(
        private Security $security,
    ) {
    }

    /**
     * Vérifie si l'utilisateur actuel est un SUPER_ADMIN.
     */
    public function isSuperAdmin(): bool
    {
        return $this->security->isGranted('ROLE_SUPER_ADMIN');
    }

    /**
     * Récupère l'utilisateur actuellement connecté.
     */
    public function getCurrentUser(): ?User
    {
        $user = $this->security->getUser();

        return $user instanceof User ? $user : null;
    }

    /**
     * Récupère l'ID du service de l'utilisateur connecté.
     *
     * @return string|null L'ID du service ou null si l'utilisateur n'a pas de service
     */
    public function getCurrentUserService(): ?string
    {
        $user = $this->getCurrentUser();
        if (!$user || !$user->getService()) {
            return null;
        }

        return $user->getService()->getId()?->__toString();
    }

    /**
     * Filtre les données utilisateurs en fonction des droits d'accès.
     *
     * @param array<int|string, array<string, mixed>> $usersData Tableau de données utilisateurs à filtrer
     *
     * @return array<int|string, array<string, mixed>> Tableau filtré selon les droits d'accès
     */
    public function filterUsersByAccess(array $usersData): array
    {
        // Les super admins voient tout
        if ($this->isSuperAdmin()) {
            return $usersData;
        }

        // Récupérer le service de l'utilisateur connecté
        $currentUserService = $this->getCurrentUserService();
        if (!$currentUserService) {
            // Si l'utilisateur n'a pas de service, il ne voit rien
            return [];
        }

        // Filtrer les utilisateurs pour ne garder que ceux du même service
        return array_filter($usersData, function ($userData) use ($currentUserService) {
            $user = $userData['user'] ?? null;
            if (!$user || !$user instanceof User) {
                return false;
            }

            $service = $user->getService();
            if (!$service) {
                return false;
            }

            return $service->getId()?->__toString() === $currentUserService;
        });
    }

    /**
     * Récupère les critères d'accès à appliquer aux requêtes.
     *
     * @return array<string, mixed> Critères d'accès (vide pour super admin, filtré par service sinon)
     */
    public function getAccessCriteria(): array
    {
        // Les super admins n'ont pas de restriction
        if ($this->isSuperAdmin()) {
            return [];
        }

        // Récupérer le service de l'utilisateur connecté
        $currentUser = $this->getCurrentUser();
        if (!$currentUser || !$currentUser->getService()) {
            // Si l'utilisateur n'a pas de service, on retourne un critère impossible
            return ['service' => 'non_existent_service'];
        }

        // Retourner le critère de filtrage par service
        return ['service' => $currentUser->getService()];
    }
}
