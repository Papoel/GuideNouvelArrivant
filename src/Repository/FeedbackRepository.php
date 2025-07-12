<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Feedback;
use App\Repository\Interfaces\FeedbackRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\Persistence\ManagerRegistry;

/** Repository pour l'entité Feedback.
 * Gère les opérations de requêtage liées aux retours d'expérience des utilisateurs.
 *
 * @extends ServiceEntityRepository<Feedback> */
class FeedbackRepository extends ServiceEntityRepository implements FeedbackRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Feedback::class);
    }

    /** Recherche des feedbacks avec critères et pagination.
     *
     * @param array<string, bool|int|string|null> $criteria   Critères de filtrage (ex: ['isReviewed' => true])
     * @param string|null                         $searchTerm Terme de recherche (recherche dans title et content)
     * @param int                                 $page       Page actuelle
     * @param int                                 $limit      Nombre d'éléments par page
     *
     * @return array{items: array<Feedback>, totalItems: int, totalPages: int} */
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
            if ('serviceId' === $field) {
                // Utiliser l'ID du service pour filtrer les feedbacks par auteur
                // On utilise déjà l'alias 'a' pour author plus haut dans la requête
                $qb->leftJoin('a.service', 'authorService')
                    ->andWhere('authorService.id = :serviceId')
                    ->setParameter('serviceId', $value);
            } elseif ('serviceName' === $field) {
                // Cas où on filtre par nom de service
                $qb->leftJoin('a.service', 's')
                    ->andWhere('LOWER(s.name) = LOWER(:serviceName)')
                    ->setParameter('serviceName', $value);
            } elseif ('service' === $field) {
                // Cas où on passe directement l'objet Service
                $qb->andWhere('a.service = :service')
                    ->setParameter('service', $value);
            } else {
                $qb->andWhere("f.$field = :$field")
                    ->setParameter($field, $value);
            }
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

        /** @var Feedback[] $items */
        $items = iterator_to_array($paginator->getIterator());

        return [
            'items' => $items,
            'totalItems' => $totalItems,
            'totalPages' => $totalPages,
        ];
    }

    /** Compte le nombre de feedbacks correspondant aux critères donnés.
     *
     * @param array<string, bool|int|string|null> $criteria Critères de filtrage (ex: ['isReviewed' => true])
     *
     * @return int Nombre de feedbacks correspondant aux critères */
    public function countByCriteria(array $criteria = []): int
    {
        $qb = $this->createQueryBuilder('f')
            ->select('COUNT(f.id)');

        // Appliquer les critères de filtrage
        foreach ($criteria as $field => $value) {
            if ('serviceId' === $field) {
                $qb->leftJoin('f.author', 'a')
                    ->leftJoin('a.service', 'authorService')
                    ->andWhere('authorService.id = :serviceId')
                    ->setParameter('serviceId', $value);
            } elseif ('serviceName' === $field) {
                // Cas où on filtre par nom de service
                $qb->leftJoin('f.author', 'a')
                    ->leftJoin('a.service', 's')
                    ->andWhere('LOWER(s.name) = LOWER(:serviceName)')
                    ->setParameter('serviceName', $value);
            } elseif ('service' === $field) {
                // Cas où on passe directement l'objet Service
                $qb->leftJoin('f.author', 'a')
                    ->andWhere('a.service = :service')
                    ->setParameter('service', $value);
            } else {
                $qb->andWhere("f.$field = :$field")
                    ->setParameter($field, $value);
            }
        }

        return (int) $qb->getQuery()->getSingleScalarResult();
    }

    /** Récupère les feedbacks des utilisateurs d'un service spécifique par son nom.
     *
     * @param string $serviceName Nom du service
     * @param int    $limit       Nombre maximum de résultats
     * @param int    $offset      Position de départ
     *
     * @return array<int, Feedback> Les feedbacks avec les informations utilisateur */
    public function findFeedbacksByServiceName(string $serviceName, int $limit = 25, int $offset = 0): array
    {
        $qb = $this->createQueryBuilder('f')
            ->leftJoin('f.author', 'a')
            ->leftJoin('a.service', 's')
            ->addSelect('a')
            ->where('LOWER(s.name) = LOWER(:serviceName)')
            ->setParameter('serviceName', $serviceName)
            ->orderBy('f.createdAt', 'DESC')
            ->setFirstResult($offset)
            ->setMaxResults($limit);

        /** @var array<int, Feedback> $result */
        $result = $qb->getQuery()->getResult();
        return $result;
    }
}
