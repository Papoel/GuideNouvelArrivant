<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\AuditLog;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/** @extends ServiceEntityRepository<AuditLog> */
class AuditLogRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AuditLog::class);
    }

    /** Nombre d'entrées par canal d'acteur.
     * @return array<string, int> actorType => total */
    public function countByActorType(): array
    {
        /** @var list<array{actorType: string, total: int|string}> $rows */
        $rows = $this->createQueryBuilder('a')
            ->select('a.actorType', 'COUNT(a.id) AS total')
            ->groupBy('a.actorType')
            ->getQuery()
            ->getArrayResult();

        $counts = [];
        foreach ($rows as $row) {
            $counts[$row['actorType']] = (int) $row['total'];
        }

        return $counts;
    }

    /** Classes d'entités présentes dans le journal — alimente le filtre "Entité".
     * @return list<string> */
    public function findDistinctEntityClasses(): array
    {
        /** @var list<array{entityClass: string}> $rows */
        $rows = $this->createQueryBuilder('a')
            ->select('DISTINCT a.entityClass')
            ->orderBy('a.entityClass')
            ->getQuery()
            ->getArrayResult();

        return array_column($rows, 'entityClass');
    }

    /** Purge toutes les entrées d'un canal (user / console / anonymous).
     * @return int nombre d'entrées supprimées */
    public function deleteByActorType(string $actorType): int
    {
        $deleted = $this->createQueryBuilder('a')
            ->delete()
            ->where('a.actorType = :actorType')
            ->setParameter('actorType', $actorType)
            ->getQuery()
            ->execute();

        return is_int($deleted) ? $deleted : 0;
    }

    /** Purge totale du journal.
     * @return int nombre d'entrées supprimées */
    public function deleteAll(): int
    {
        $deleted = $this->createQueryBuilder('a')
            ->delete()
            ->getQuery()
            ->execute();

        return is_int($deleted) ? $deleted : 0;
    }
}
