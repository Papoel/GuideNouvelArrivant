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
        // Pour l'instant, on vérifie que le mentor a bien le rôle ROLE_MENTOR
        // TODO futur: implémenter une entité MissionLetter pour gérer les lettres de mission formelles
        $hasMissionLetter = false;
        if ($owner instanceof User && $owner->getMentor()) {
            $mentor = $owner->getMentor();
            $hasMissionLetter = in_array('ROLE_MENTOR', $mentor->getRoles(), true);
        }
        $conformity['mission'] = $hasMissionLetter;

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

    /**
     * Finds logbooks for a user with all related data preloaded to avoid N+1 queries.
     * This method uses a batch loading strategy to minimize queries while avoiding
     * the Cartesian product problem of multiple OneToMany joins.
     *
     * Strategy:
     * 1. Load logbooks with owner and mentor (1 query)
     * 2. Batch load themes and modules for these logbooks (2 queries)
     * 3. Batch load actions for these modules (1 query)
     *
     * Total: ~4 queries instead of N+1 queries
     *
     * @return array<int, Logbook> Returns an array of Logbook objects with all relations preloaded
     */
    public function findByUserWithFullRelations(User $user): array
    {
        // Get logbook IDs using native SQL (workaround for UUID comparison issue)
        $conn = $this->getEntityManager()->getConnection();
        $sql = 'SELECT id FROM logbooks WHERE owner_id = :userId';
        $stmt = $conn->prepare($sql);
        $userId = $user->getId();
        if ($userId === null) {
            return [];
        }
        $resultSet = $stmt->executeQuery(['userId' => $userId->toBinary()]);
        $logbookIds = $resultSet->fetchFirstColumn();

        if (empty($logbookIds)) {
            return [];
        }

        // Single query approach: Load everything with JOINs and DISTINCT
        $query = $this->createQueryBuilder('l')
            ->distinct()
            ->leftJoin('l.owner', 'o')->addSelect('o')
            ->leftJoin('o.mentor', 'm')->addSelect('m')
            ->leftJoin('l.themes', 't')->addSelect('t')
            ->leftJoin('t.modules', 'mod')->addSelect('mod')
            ->leftJoin('mod.actions', 'a')->addSelect('a')
            ->leftJoin('a.user', 'au')->addSelect('au')
            ->where('l.id IN (:logbookIds)')
            ->setParameter('logbookIds', $logbookIds)
            ->getQuery();

        // Use HINT to fetch join properly
        $query->setHint(\Doctrine\ORM\Query::HINT_FORCE_PARTIAL_LOAD, false);

        $logbooks = $query->getResult();

        /** @var array<int, Logbook> $logbooks */
        return $logbooks;
    }
}
