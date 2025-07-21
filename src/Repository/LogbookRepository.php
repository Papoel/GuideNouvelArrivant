<?php

namespace App\Repository;

use App\Entity\Logbook;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/** @extends ServiceEntityRepository<Logbook> */
class LogbookRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Logbook::class);
    }

    public function checkConformity(): array
    {
        $logbooks = $this->findAll();
        $conformity = [];

        foreach ($logbooks as $logbook) {
            $conformity[] = $this->checkConformityForLogbook($logbook);
        }

        return $conformity;
    }

    public function checkConformityForLogbook(Logbook $logbook): array
    {
        $conformity = [];

        // 1. Nouvel apprenant est identifié (Nom, Prénom, Métier, Service) ?
        $conformity['apprenant_first_name'] = $logbook->getOwner()->getFirstName() !== null;
        $conformity['apprenant_last_name'] = $logbook->getOwner()->getLastName() !== null;
        $conformity['apprenant_job'] = $logbook->getOwner()->getJob() !== null;
        $conformity['apprenant_service'] = $logbook->getOwner()->getService() !== null;
        // 2. Le tuteur (Mentor) est désigné ?
        $conformity['mentor'] = $logbook->getOwner()->getMentor() !== null;
        // 3. Le missionement des tuteurs et compagnons sont formalisés par une lettre de mission
        $conformity['mission'] = 'TODO';
        // 4. Informations sur le carnet
        $conformity['fullname'] = $logbook->getOwner()->getFullname();

        return $conformity;
    }
}
