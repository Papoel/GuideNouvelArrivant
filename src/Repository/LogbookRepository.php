<?php

namespace App\Repository;

use App\Entity\Logbook;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Logbook>
 */
class LogbookRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Logbook::class);
    }

    /**
     * @return array<array<string, mixed>> $result
     */
    public function findLogbookDetails(Logbook $logbook): array
    {
        // Utiliser QueryBuilder pour obtenir les détails du carnet de compagnonnage
        $qb = $this->createQueryBuilder(alias: 'l')
            ->select(
                'm.id AS moduleId',
                'm.title AS moduleTitle',
                'm.description AS moduleDescription',
                't.id AS themeId',
                't.title AS themeTitle',
                't.description AS themeDescription',
                't.isValidated AS themeIsValidated',
                't.remark AS themeRemark',
                'a.id AS actionId',
                'a.description AS actionDescription',
                'a.agent_validated_at AS agentValidatedAt',
                'a.mentor_validated_at AS mentorValidatedAt'
            )
            ->join(join: 'l.themes', alias: 't')
            ->join(join: 't.modules', alias: 'm')
            ->leftJoin(join: 'm.actions', alias: 'a')
            ->where('l.id = :logbookId')
            ->setParameter(key: 'logbookId', value: $logbook->getId());

        $result = $qb->getQuery()->getArrayResult();
        assert(is_array($result));

        return $result;
    }
}
