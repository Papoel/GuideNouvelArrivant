<?php

declare(strict_types=1);

namespace App\Services\Admin\interfaces;

use App\Entity\Feedback;
use App\Entity\User;

/**
 * Interface définissant les méthodes pour la gestion des retours d'expérience (feedbacks).
 */
interface FeedbackServiceInterface
{
    /**
     * Récupère les feedbacks avec pagination et filtrage.
     *
     * @param array<string, bool|int|string|null> $criteria   Critères de filtrage
     * @param string|null                         $searchTerm Terme de recherche
     * @param int                                 $page       Page actuelle
     * @param int                                 $limit      Nombre d'éléments par page
     *
     * @return array{items: array<Feedback>, totalItems: int, totalPages: int} Structure de données contenant les feedbacks et les informations de pagination
     */
    public function getFeedbacksWithPagination(array $criteria = [], ?string $searchTerm = null, int $page = 1, int $limit = 10): array;

    /**
     * Récupère les statistiques des feedbacks.
     *
     * @param array<string, bool|int|string|null> $criteria Critères de filtrage
     *
     * @return array<string, int> Structure de données contenant les statistiques des feedbacks
     */
    public function getFeedbackStatistics(array $criteria = []): array;

    /**
     * Marque un feedback comme traité.
     *
     * @param Feedback    $feedback Le feedback à traiter
     * @param string|null $comment  Commentaire du manager
     * @param User|null   $reviewer Utilisateur qui a traité le feedback
     */
    public function markAsReviewed(Feedback $feedback, ?string $comment, ?User $reviewer): void;

    /**
     * Marque un feedback comme en attente.
     *
     * @param Feedback $feedback Le feedback à remettre en attente
     */
    public function markAsPending(Feedback $feedback): void;

    /**
     * Récupère les retours d'expérience des utilisateurs d'un service spécifique par son nom.
     *
     * @param string $serviceName Nom du service
     * @param int    $limit       Nombre maximum de résultats
     * @param int    $offset      Position de départ
     *
     * @return array<int, array<string, mixed>> Les retours d'expérience avec les informations utilisateur
     */
    public function getFeedbacksByServiceName(string $serviceName, int $limit = 25, int $offset = 0): array;
}
