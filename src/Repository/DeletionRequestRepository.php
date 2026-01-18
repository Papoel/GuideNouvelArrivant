<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\DeletionRequest;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DeletionRequest>
 */
class DeletionRequestRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DeletionRequest::class);
    }

    /**
     * @return list<DeletionRequest>
     */
    public function findPendingRequestsReadyForDeletion(): array
    {
        /** @var list<DeletionRequest> $result */
        $result = $this->createQueryBuilder('dr')
            ->andWhere('dr.status = :status')
            ->andWhere('dr.scheduledDeletionAt <= :now')
            ->setParameter('status', DeletionRequest::STATUS_PENDING)
            ->setParameter('now', new \DateTimeImmutable())
            ->getQuery()
            ->getResult();

        return $result;
    }

    public function findPendingRequestForUser(User $user): ?DeletionRequest
    {
        /** @var DeletionRequest|null $result */
        $result = $this->createQueryBuilder('dr')
            ->innerJoin('dr.user', 'u')
            ->andWhere('u.id = :userId')
            ->andWhere('dr.status = :status')
            ->setParameter('userId', $user->getId(), 'uuid')
            ->setParameter('status', DeletionRequest::STATUS_PENDING)
            ->getQuery()
            ->getOneOrNullResult();

        return $result;
    }

    public function findByToken(string $token): ?DeletionRequest
    {
        /** @var DeletionRequest|null $result */
        $result = $this->createQueryBuilder('dr')
            ->andWhere('dr.cancellationToken = :token')
            ->andWhere('dr.status = :status')
            ->setParameter('token', $token)
            ->setParameter('status', DeletionRequest::STATUS_PENDING)
            ->getQuery()
            ->getOneOrNullResult();

        return $result;
    }
}
