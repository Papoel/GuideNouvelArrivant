<?php

namespace App\Repository;

use App\Entity\Service;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;

/** @extends ServiceEntityRepository<User> */
class UserRepository extends ServiceEntityRepository implements PasswordUpgraderInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    /** Used to upgrade (rehash) the user's password automatically over time. */
    public function upgradePassword(PasswordAuthenticatedUserInterface $user, string $newHashedPassword): void
    {
        if (!$user instanceof User) {
            throw new UnsupportedUserException(message: sprintf('Instances of "%s" are not supported.', $user::class));
        }

        $user->setPassword(password: $newHashedPassword);
        $this->getEntityManager()->persist(object: $user);
        $this->getEntityManager()->flush();
    }

    /** Trouve tous les apprenants associés à un mentor par son NNI
     *
     * @param  string $mentorNni Le NNI du mentor
     *
     * @return array<int, User> Tableau d'utilisateurs (apprenants) */
    public function findApprenantByMentorNni(string $mentorNni): array
    {
        /** @var array<int|string, User> $result */
        $result = $this->createQueryBuilder(alias: 'u')
            ->join(join: 'u.mentor', alias: 'm')
            ->where('m.nni = :mentorNni')
            ->setParameter(key: 'mentorNni', value: $mentorNni)
            ->getQuery()
            ->getResult();

        // Garantir que le résultat est une liste (indices numériques consécutifs)
        /* @var array<int, User> */
        return array_values($result);
    }

    /**
     * Trouve tous les utilisateurs qui n'ont pas de carnet associé
     *
     * @return array<int, User> Tableau d'utilisateurs sans carnet
     */
    public function findUsersWithoutLogbook(): array
    {
        $qb = $this->createQueryBuilder('u');

        /** @var array<int, User> $result */
        $result = $qb->leftJoin('App\\Entity\\Logbook', 'l', 'WITH', 'l.owner = u.id')
            ->where($qb->expr()->isNull('l.id'))
            ->orderBy('u.lastname', 'ASC')
            ->getQuery()
            ->getResult();

        return $result;
    }

    /**
     * Trouve tous les utilisateurs d'un service spécifique qui n'ont pas de carnet associé
     *
     * @param Service $service Le service pour lequel filtrer les utilisateurs
     *
     * @return array<int, User> Tableau d'utilisateurs sans carnet du service spécifié
     */
    public function findUsersWithoutLogbookByService(Service $service): array
    {
        // Approche simple en deux étapes :
        // 1. Récupérer tous les utilisateurs sans carnet
        $usersWithoutLogbook = $this->findUsersWithoutLogbook();

        // 2. Filtrer manuellement par service
        $serviceId = $service->getId();
        if ($serviceId === null) {
            return [];
        }

        $serviceIdString = $serviceId->__toString();
        $filteredUsers = [];

        foreach ($usersWithoutLogbook as $user) {
            $userService = $user->getService();
            $userServiceId = $userService ? $userService->getId() : null;

            if ($userServiceId !== null && $userServiceId->__toString() === $serviceIdString) {
                $filteredUsers[] = $user;
            }
        }

        return $filteredUsers;
    }

    /** Trouve tous les utilisateurs qui ont un rôle spécifique
     * Cette méthode utilise une approche simple qui récupère tous les utilisateurs
     * et filtre en PHP plutôt qu'en SQL pour éviter les problèmes de compatibilité
     * avec les différentes bases de données et versions de Doctrine.
     *
     * @param string $role Rôle à rechercher (ex: 'ROLE_USER')
     *
     * @return User[] Retourne un tableau d'utilisateurs ayant ce rôle */
    public function findByRole(string $role): array
    {
        // Récupérer tous les utilisateurs
        /** @var User[] $allUsers */
        $allUsers = $this->findAll();

        // Filtrer les utilisateurs qui ont le rôle spécifié
        return array_filter(
            $allUsers,
            static function (User $user) use ($role) {
                return in_array($role, $user->getRoles(), true);
            }
        );
    }

    /** Trouve tous les utilisateurs qui ont un rôle spécifique et qui correspondent aux critères supplémentaires.
     *
     * @param string               $role     Rôle à rechercher (ex: 'ROLE_USER')
     * @param array<string, mixed> $criteria Critères supplémentaires (ex: ['service' => $service])
     *
     * @return User[] Retourne un tableau d'utilisateurs correspondant aux critères */
    public function findByRoleWithCriteria(string $role, array $criteria = []): array
    {
        // Récupérer les utilisateurs avec le rôle spécifié
        $usersWithRole = $this->findByRole($role);

        // Si pas de critères supplémentaires, retourner tous les utilisateurs avec le rôle
        if (empty($criteria)) {
            return $usersWithRole;
        }

        // Filtrer les utilisateurs selon les critères supplémentaires
        return array_filter(
            $usersWithRole,
            static function (User $user) use ($criteria) {
                foreach ($criteria as $property => $value) {
                    // Cas spécial pour le service
                    if ('service' === $property) {
                        $userService = $user->getService();
                        if (null === $value && null !== $userService) {
                            return false;
                        }
                        if (
                            null !== $value && $value instanceof Service
                            && ((null === $userService) || ($userService->getName() !== $value->getName()))
                        ) {
                            return false;
                        }
                    }
                }

                return true;
            }
        );
    }

    /** Recherche des utilisateurs par nom avec pagination.
     *
     * @param string|null          $searchTerm Terme de recherche (optionnel)
     * @param string               $role       Rôle à filtrer (ex: 'ROLE_USER')
     * @param int                  $page       Page courante (commence à 1)
     * @param int                  $limit      Nombre d'éléments par page
     * @param array<string, mixed> $criteria   Critères supplémentaires (ex: ['service' => $service])
     *
     * @return array{users: User[], totalItems: int, totalPages: int} */
    public function findBySearchTermPaginated(
        ?string $searchTerm = null,
        string $role = 'ROLE_USER',
        int $page = 1,
        int $limit = 25,
        array $criteria = []
    ): array {
        $qb = $this->createQueryBuilder('u');

        // Condition de recherche si un terme est fourni
        if ($searchTerm) {
            $searchCondition = $qb->expr()->orX(
                $qb->expr()->like('u.firstname', ':search'),
                $qb->expr()->like('u.lastname', ':search'),
                $qb->expr()->like('u.email', ':search'),
                $qb->expr()->like('u.nni', ':search')
            );

            $qb->where($searchCondition)
                ->setParameter('search', '%' . $searchTerm . '%');
        }

        // Ajouter les critères de service si présents
        if (isset($criteria['service'])) {
            $serviceValue = $criteria['service'];
            // Vérification sans comparaison stricte de type
            if (null == $serviceValue || 'null' === $serviceValue) {
                $qb->andWhere('u.service IS NULL');
            } else {
                $qb->leftJoin('u.service', 's')
                    ->andWhere('s = :service')
                    ->setParameter('service', $serviceValue);
            }
        }

        // Tri par nom
        $qb->orderBy('u.lastname', 'ASC')
            ->addOrderBy('u.firstname', 'ASC');

        // Exécution de la requête pour obtenir tous les utilisateurs (sans la pagination)
        /** @var User[] $allUsers */
        $allUsers = $qb->getQuery()->getResult();

        // Filtrage manuel par rôle (comme dans findByRole)
        $filteredUsers = array_filter(
            $allUsers,
            function (User $user) use ($role) {
                return in_array($role, $user->getRoles(), true);
            }
        );

        // Nombre total d'utilisateurs après filtrage
        $totalItems = count($filteredUsers);

        // Calcul du nombre total de pages
        $totalPages = (int) ceil($totalItems / $limit);

        // Application manuelle de la pagination
        $offset = ($page - 1) * $limit;
        $paginatedUsers = array_slice($filteredUsers, $offset, $limit);

        // Retourne les utilisateurs et les informations de pagination
        return [
            'users' => $paginatedUsers,
            'totalItems' => $totalItems,
            'totalPages' => $totalPages,
        ];
    }

    /** Trouve tous les utilisateurs d'un service spécifique qui ont un carnet.
     *
     * @param string $serviceName Nom du service
     *
     * @return User[] Retourne un tableau d'utilisateurs avec carnets */
    public function findUsersWithLogbookByServiceName(string $serviceName): array
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = '
            SELECT DISTINCT u.*
            FROM users u
            JOIN service s ON u.service_id = s.id
            JOIN logbooks l ON l.owner_id = u.id
            WHERE s.name = :serviceName
        ';

        $stmt = $conn->prepare($sql);
        $resultSet = $stmt->executeQuery(['serviceName' => $serviceName]);
        $usersData = $resultSet->fetchAllAssociative();

        $users = [];
        foreach ($usersData as $userData) {
            $user = $this->find($userData['id']);
            if ($user) {
                $users[] = $user;
            }
        }

        return $users;
    }

    /** Trouve tous les utilisateurs d'un service spécifique qui ont un carnet, en utilisant l'ID du service.
     *
     * @param string $serviceId ID du service
     *
     * @return User[] Retourne un tableau d'utilisateurs avec carnets */
    public function findUsersWithLogbookByServiceId(string $serviceId): array
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = '
            SELECT DISTINCT u.*
            FROM users u
            JOIN service s ON u.service_id = s.id
            JOIN logbooks l ON l.owner_id = u.id
            WHERE s.id = :serviceId
        ';

        $stmt = $conn->prepare($sql);
        $resultSet = $stmt->executeQuery(['serviceId' => $serviceId]);
        $usersData = $resultSet->fetchAllAssociative();

        $users = [];
        foreach ($usersData as $userData) {
            $user = $this->find($userData['id']);
            if ($user) {
                $users[] = $user;
            }
        }

        return $users;
    }
}
