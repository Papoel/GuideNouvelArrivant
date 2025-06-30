<?php

namespace App\Repository;

use App\Entity\Feedback;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Feedback>
 */
class FeedbackRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Feedback::class);
    }

    /**
     * Recherche des feedbacks avec critères et pagination.
     *
     * @param array<string, bool|int|string|null> $criteria   Critères de filtrage (ex: ['isReviewed' => true])
     * @param string|null                         $searchTerm Terme de recherche (recherche dans title et content)
     * @param int                                 $page       Page actuelle
     * @param int                                 $limit      Nombre d'éléments par page
     *
     * @return array{items: array<Feedback>, totalItems: int, totalPages: int}
     */
    public function findByCriteriaPaginated(array $criteria = [], ?string $searchTerm = null, int $page = 1, int $limit = 10): array
    {
        $qb = $this->createQueryBuilder('f')
            ->leftJoin('f.author', 'a')
            ->leftJoin('f.reviewedBy', 'r')
            ->addSelect('a')
            ->addSelect('r')
            ->orderBy('f.createdAt', 'DESC');

        // Appliquer les critères de filtrage
        foreach ($criteria as $field => $value) {
            $qb->andWhere("f.$field = :$field")
                ->setParameter($field, $value);
        }

        // Recherche par terme
        if ($searchTerm) {
            $qb->andWhere('f.title LIKE :search OR f.content LIKE :search OR a.firstname LIKE :search OR a.lastname LIKE :search')
                ->setParameter('search', "%$searchTerm%");
        }

        // Pagination
        $firstResult = ($page - 1) * $limit;
        $query = $qb->setFirstResult($firstResult)
            ->setMaxResults($limit)
            ->getQuery();

        $paginator = new Paginator($query);
        $totalItems = count($paginator);
        $totalPages = (int) ceil($totalItems / $limit);

        return [
            'items' => iterator_to_array($paginator->getIterator()),
            'totalItems' => $totalItems,
            'totalPages' => $totalPages,
        ];
    }
}
