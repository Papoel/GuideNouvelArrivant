<?php

namespace App\Repository;

use App\Entity\Logbook;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/** @extends ServiceEntityRepository<Logbook> */
class LogbookRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Logbook::class);
    }

    /**
     * @return array<int, array<string, bool|string|null>>
     */
    public function checkConformity(): array
    {
        $logbooks = $this->findAll();
        $conformity = [];

        foreach ($logbooks as $logbook) {
            $conformity[] = $this->checkConformityForLogbook($logbook);
        }

        return $conformity;
    }

    /**
     * @return array<string, bool|string|null>
     */
    public function checkConformityForLogbook(Logbook $logbook): array
    {
        $conformity = [];

        // 1. Nouvel apprenant est identifié (Nom, Prénom, Métier, Service) ?
        $owner = $logbook->getOwner();

        if ($owner instanceof User) {
            $conformity['apprenant_first_name'] = $owner->getFirstName() !== '';
            $conformity['apprenant_last_name'] = $owner->getLastName() !== '';
            $conformity['apprenant_job'] = $owner->getJob() !== null;
            $conformity['apprenant_service'] = $owner->getService() !== null;
            // 2. Le tuteur (Mentor) est désigné ?
            $conformity['mentor'] = $owner->getMentor() !== null;
            // 4. Informations sur le carnet
            $conformity['fullname'] = $owner->getFullname();
        } else {
            $conformity['apprenant_first_name'] = false;
            $conformity['apprenant_last_name'] = false;
            $conformity['apprenant_job'] = false;
            $conformity['apprenant_service'] = false;
            $conformity['mentor'] = false;
            $conformity['fullname'] = null;
        }

        // 3. Le missionement des tuteurs et compagnons sont formalisés par une lettre de mission
        $conformity['mission'] = 'TODO';

        return $conformity;
    }

    /**
     * Finds all logbooks with their owners and mentors preloaded
     *
     * @return array<int, Logbook> Returns an array of Logbook objects with preloaded relations
     */
    public function findAllWithOwnerAndMentor(): array
    {
        $result = $this->createQueryBuilder('l')
            ->leftJoin('l.owner', 'o')
            ->addSelect('o')
            ->leftJoin('o.mentor', 'm')
            ->addSelect('m')
            ->getQuery()
            ->getResult();

        /** @var array<int, Logbook> $result */
        return $result;
    }
}
