<?php

declare(strict_types=1);

namespace App\Repository\Interfaces;

/**
 * Interface définissant les méthodes de requêtage pour les entités Feedback.
 * Cette interface permet de respecter le principe d'inversion de dépendance (SOLID).
 */
interface FeedbackRepositoryInterface
{
    /**
     * Récupère les feedbacks avec pagination et filtrage.
     *
     * @param array<string, bool|int|string|null> $criteria   Critères de filtrage (ex: ['service' => $service, 'isReviewed' => false])
     * @param string|null                         $searchTerm Terme de recherche optionnel
     * @param int                                 $page       Numéro de page (commence à 1)
     * @param int                                 $limit      Nombre d'éléments par page
     *
     * @return array{items: array<\App\Entity\Feedback>, totalItems: int, totalPages: int} Tableau contenant les éléments et les informations de pagination
     */
    public function findByCriteriaPaginated(array $criteria = [], ?string $searchTerm = null, int $page = 1, int $limit = 10): array;

    /**
     * Compte le nombre de feedbacks correspondant aux critères spécifiés.
     *
     * @param array<string, bool|int|string|null> $criteria Critères de filtrage (ex: ['service' => $service, 'isReviewed' => false])
     *
     * @return int Nombre de feedbacks correspondant aux critères
     */
    public function countByCriteria(array $criteria = []): int;

    /**
     * Récupère les feedbacks des utilisateurs d'un service spécifique par son nom.
     *
     * @param string $serviceName Nom du service
     * @param int    $limit       Nombre maximum de résultats
     * @param int    $offset      Position de départ
     *
     * @return array<int, array<string, mixed>> Les feedbacks avec les informations utilisateur
     */
    public function findFeedbacksByServiceName(string $serviceName, int $limit = 25, int $offset = 0): array;
}
