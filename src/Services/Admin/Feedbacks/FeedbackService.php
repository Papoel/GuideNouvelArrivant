<?php

declare(strict_types=1);

namespace App\Services\Admin\Feedbacks;

use App\Entity\Feedback;
use App\Entity\User;
use App\Repository\Interfaces\FeedbackRepositoryInterface;
use App\Services\Admin\interfaces\FeedbackServiceInterface;
use Doctrine\ORM\EntityManagerInterface;

/** Service responsable de la gestion des retours d'expérience (feedbacks).
 * Implémente l'interface FeedbackServiceInterface pour respecter le principe d'inversion de dépendance. */
readonly class FeedbackService implements FeedbackServiceInterface
{
    public function __construct(
        private FeedbackRepositoryInterface $feedbackRepository,
        private EntityManagerInterface $entityManager
    ) {
    }

    /** Récupère les feedbacks avec pagination.
     *
     * @param array<string, bool|int|string|null> $criteria   Critères de filtrage
     * @param string|null                         $searchTerm Terme de recherche
     * @param int                                 $page       Page courante
     * @param int                                 $limit      Nombre d'éléments par page
     *
     * @return array{items: array<Feedback>, totalItems: int, totalPages: int} */
    public function getFeedbacksWithPagination(array $criteria = [], ?string $searchTerm = null, int $page = 1, int $limit = 10): array
    {
        return $this->feedbackRepository->findByCriteriaPaginated($criteria, $searchTerm, $page, $limit);
    }

    /** Récupère les statistiques des feedbacks.
     *
     * @param array<string, bool|int|string|null> $criteria Critères de filtrage
     *
     * @return array<string, int> Statistiques sur les feedbacks */
    public function getFeedbackStatistics(array $criteria = []): array
    {
        // Convertir serviceId en serviceName si nécessaire pour assurer la compatibilité
        if (isset($criteria['serviceId']) && !isset($criteria['serviceName'])) {
            // Si on a un ID de service, mais pas de nom, on utilise l'ID directement
            // Le repository sait gérer ce cas
        }

        return [
            'total' => $this->feedbackRepository->countByCriteria($criteria),
            'pending' => $this->feedbackRepository->countByCriteria(array_merge($criteria, ['isReviewed' => false])),
            'reviewed' => $this->feedbackRepository->countByCriteria(array_merge($criteria, ['isReviewed' => true])),
        ];
    }

    public function markAsReviewed(Feedback $feedback, ?string $comment, ?User $reviewer): void
    {
        $feedback->setManagerComment($comment);
        $feedback->setIsReviewed(true);
        $feedback->setReviewedBy($reviewer);
        $feedback->setReviewAt(new \DateTimeImmutable());

        $this->entityManager->flush();
    }

    public function markAsPending(Feedback $feedback): void
    {
        $feedback->setIsReviewed(false);
        $feedback->setReviewedBy(null);
        $feedback->setReviewAt(null);

        $this->entityManager->flush();
    }

    /** Récupère les feedbacks par nom de service.
     *
     * @param string $serviceName Nom du service
     * @param int    $limit       Nombre maximum de résultats
     * @param int    $offset      Position de départ
     *
     * @return array<int, Feedback> Les feedbacks avec les informations utilisateur */
    public function getFeedbacksByServiceName(string $serviceName, int $limit = 25, int $offset = 0): array
    {
        return $this->feedbackRepository->findFeedbacksByServiceName($serviceName, $limit, $offset);
    }
}
