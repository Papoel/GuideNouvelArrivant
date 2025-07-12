<?php

declare(strict_types=1);

namespace App\Services\Admin\interfaces;

use App\Entity\Logbook;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Response;

/** Interface définissant les méthodes pour la gestion de la progression des utilisateurs. */
interface UserProgressServiceInterface
{
    /** Récupère les détails de progression d'un utilisateur.
     *
     * @param User $user L'utilisateur dont on veut récupérer les détails de progression
     *
     * @description Structure de données contenant les détails de progression de l'utilisateur
     *
     * @return array{
     *      user: User,
     *      logbook: Logbook,
     *      progress: array{
     *          agent_progress: float,
     *          mentor_progress: float,
     *          total_modules: int,
     *          completed_by_agent: int,
     *          validated_by_mentor: int,
     *          modules_awaiting_validation: int,
     *          progress_class_agent: string,
     *          progress_class_mentor: string
     *      }
     *  }
     * /
     * @throws \RuntimeException Si l'utilisateur n'a pas de carnet de progression */
    public function getUserProgressDetails(User $user): array;

    /** Vérifie si l'utilisateur a accès aux données d'un autre utilisateur.
     *
     * @param User $targetUser L'utilisateur cible dont on veut consulter les données
     *
     * @return bool True si l'accès est autorisé, false sinon */
    public function canAccessUserData(User $targetUser): bool;

    /** Génère un PDF du carnet de progression d'un utilisateur.
     *
     * @param User $user L'utilisateur dont on veut générer le carnet de progression
     *
     * @return Response Réponse HTTP contenant le PDF
     *
     * @throws \RuntimeException Si l'utilisateur n'a pas de carnet de progression */
    public function generateUserWorkbookPdf(User $user): Response;
}
