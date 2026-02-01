<?php

namespace App\Repository;

use App\Entity\Backup;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Backup>
 */
class BackupRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Backup::class);
    }

    /**
     * @return array<Backup>
     */
    public function findByType(string $type, ?int $limit = null): array
    {
        $qb = $this->createQueryBuilder('b')
            ->andWhere('b.type = :type')
            ->setParameter('type', $type)
            ->orderBy('b.createdAt', 'DESC');

        if ($limit !== null) {
            $qb->setMaxResults($limit);
        }

        /** @var array<Backup> */
        return $qb->getQuery()->getResult();
    }

    /**
     * @return array<Backup>
     */
    public function findOldestByType(string $type, int $skip = 0): array
    {
        /** @var array<Backup> */
        return $this->createQueryBuilder('b')
            ->where('b.type = :type')
            ->setParameter('type', $type)
            ->orderBy('b.createdAt', 'ASC')
            ->setFirstResult($skip)
            ->getQuery()
            ->getResult();
    }

    /**
     * @return Backup|null
     */
    public function findLatestByType(string $type): ?Backup
    {
        /** @var Backup|null */
        return $this->createQueryBuilder('b')
            ->where('b.type = :type')
            ->setParameter('type', $type)
            ->orderBy('b.createdAt', 'DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * @return Backup|null
     */
    public function findMostRecent(): ?Backup
    {
        /** @var Backup|null */
        return $this->createQueryBuilder('b')
            ->orderBy('b.createdAt', 'DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function countByType(string $type): int
    {
        return (int) $this->createQueryBuilder('b')
            ->select('COUNT(b.id)')
            ->where('b.type = :type')
            ->setParameter('type', $type)
            ->getQuery()
            ->getSingleScalarResult();
    }
}
