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
        // Utilisation de QueryBuilder pour obtenir les détails du carnet de compagnonnage avec actions associées
        $qb = $this->createQueryBuilder(alias: 'l')
            ->select(
                't.id AS themeId',
                't.title AS themeTitle',
                't.description AS themeDescription',
                'm.id AS moduleId',
                'm.title AS moduleTitle',
                'm.description AS moduleDescription',
                'a.id AS actionId',
                'a.description AS actionDescription',
                'a.agentComment AS agentComment',
                'a.agentValidatedAt AS agentValidatedAt',
                'a.agentVisa AS agentVisa',
                'a.mentorComment AS mentorComment',
                'a.mentorValidatedAt AS mentorValidatedAt',
                'a.mentorVisa AS mentorVisa'
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

    public function getPadawanLogbookAccordingToMentorNni(string $mentorNni, string $padawanNni): ?Logbook
    {
        $qb = $this->createQueryBuilder(alias: 'l')
            ->join(join: 'l.owner', alias: 'u')
            ->where('u.nni = :padawanNni')
            ->andWhere('u.mentor = :mentorNni')
            ->setParameter(key: 'padawanNni', value: $padawanNni)
            ->setParameter(key: 'mentorNni', value: $mentorNni);

        $result = $qb->getQuery()->getOneOrNullResult();

        // Vérification explicite du type de retour
        return $result instanceof Logbook ? $result : null;
    }
}
