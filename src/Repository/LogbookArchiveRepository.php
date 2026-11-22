<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\LogbookArchive;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/** @extends ServiceEntityRepository<LogbookArchive> */
class LogbookArchiveRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LogbookArchive::class);
    }

    /** Archives dont la durée de conservation (5 ans) est dépassée.
     * Utilisé par la commande de purge planifiée.
     *
     * @return list<LogbookArchive> */
    public function findExpired(): array
    {
        /** @var list<LogbookArchive> $result */
        $result = $this->createQueryBuilder('a')
            ->where('a.expiresAt <= :now')
            ->setParameter('now', new \DateTimeImmutable())
            ->getQuery()
            ->getResult();

        return $result;
    }

    /** Archives qui expirent dans $days jours ou moins et n'ont pas encore
     * reçu d'avertissement — alimente l'e-mail J-30 de la purge planifiée.
     *
     * @return list<LogbookArchive> */
    public function findExpiringSoon(int $days): array
    {
        /** @var list<LogbookArchive> $result */
        $result = $this->createQueryBuilder('a')
            ->where('a.expiresAt > :now')
            ->andWhere('a.expiresAt <= :limit')
            ->andWhere('a.warningSentAt IS NULL')
            ->setParameter('now', new \DateTimeImmutable())
            ->setParameter('limit', new \DateTimeImmutable('+' . $days . ' days'))
            ->getQuery()
            ->getResult();

        return $result;
    }
}
