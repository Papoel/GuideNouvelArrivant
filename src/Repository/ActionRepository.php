<?php

namespace App\Repository;

use App\Entity\Action;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Action>
 */
class ActionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Action::class);
    }

    /*
     * @return Action[] Returns an array of Action objects
     *
     * @phpstan-return Action[]
     */
    /*public function findByModuleIdAndUserNni(string $nni, int $moduleId): array
    {
        $qb = $this->createQueryBuilder(alias: 'a')
            ->select('a')
            ->join(join: 'a.module', alias: 'm') // Jointure avec Module
            ->join(join: 'm.theme', alias: 't') // Jointure avec Theme via Module
            ->join(join: 't.logbooks', alias: 'l') // Jointure avec Logbook depuis Theme
            ->join(join: 'l.users', alias: 'u') // Jointure avec User depuis Logbook
            ->where('u.nni = :nni') // Vérifier que l'utilisateur est lié via son NNI
            ->andWhere('m.id = :moduleId') // Filtrer par ID de module
            ->setParameter(key: 'nni', value: $nni)
            ->setParameter(key: 'moduleId', value: $moduleId)
            ->getQuery()
            ->getResult();

        // Assertion pour aider PHPStan, TODO: Utilité en prod?
        assert(assertion: is_array($qb) && $qb === array_filter($qb, static fn ($item) => $item instanceof Action));

        return $qb;
    }*/
}
