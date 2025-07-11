<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Action;
use App\Entity\Module;
use App\Entity\User;
use App\Repository\Interfaces\ActionRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * Repository pour l'entité Action.
 * Gère les opérations de requêtage liées aux actions des utilisateurs.
 *
 * @extends ServiceEntityRepository<Action>
 */
class ActionRepository extends ServiceEntityRepository implements ActionRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Action::class);
    }

    /**
     * Supprime une action de la base de données.
     *
     * @param Action $action L'action à supprimer
     */
    public function remove(Action $action): void
    {
        $this->getEntityManager()->remove($action);
    }

    /**
     * Trouve les actions associées à un module spécifique et répondant à des critères additionnels.
     *
     * @param Module               $module   Le module pour lequel on recherche des actions
     * @param array<string, mixed> $criteria Critères additionnels de filtrage
     *
     * @return Action[] Liste des actions correspondant aux critères
     */
    public function findByModuleAndCriteria(Module $module, array $criteria = []): array
    {
        $qb = $this->createQueryBuilder('a')
            ->andWhere('a.module = :module')
            ->setParameter('module', $module);

        // Ajouter les critères supplémentaires
        foreach ($criteria as $field => $value) {
            if ('service' === $field || 'user.service' === $field) {
                $qb->leftJoin('a.user', 'u')
                   ->leftJoin('u.service', 's')
                   ->andWhere('s = :service')
                   ->setParameter('service', $value);
            } else {
                // Gérer les champs avec des points (relations)
                if (false !== strpos($field, '.')) {
                    [$relation, $property] = explode('.', $field, 2);
                    $alias = $relation[0]; // Première lettre comme alias
                    $qb->leftJoin("a.$relation", $alias)
                       ->andWhere("$alias.$property = :$property")
                       ->setParameter($property, $value);
                } else {
                    $qb->andWhere("a.$field = :$field")
                       ->setParameter($field, $value);
                }
            }
        }

        /** @var array<Action> $result */
        $result = $qb->getQuery()->getResult();

        return $result;
    }

    /**
     * Trouve la dernière action validée par un utilisateur.
     *
     * @param User $user L'utilisateur pour lequel on recherche la dernière action
     *
     * @return Action|null La dernière action validée ou null si aucune n'existe
     */
    public function findLastValidatedActionByUser(User $user): ?Action
    {
        /** @var Action|null $result */
        $result = $this->createQueryBuilder('a')
            ->andWhere('a.user = :user')
            ->andWhere('a.agentValidatedAt IS NOT NULL')
            ->setParameter('user', $user)
            ->orderBy('a.agentValidatedAt', 'DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();

        return $result;
    }

    /**
     * Récupère la date de la dernière action d'un utilisateur.
     *
     * @param User $user L'utilisateur pour lequel on recherche la dernière date d'action
     *
     * @return \DateTimeInterface|null La date de la dernière action ou null si aucune action n'existe
     */
    public function getLastActionDateForUser(User $user): ?\DateTimeInterface
    {
        $lastAction = $this->findLastValidatedActionByUser($user);

        return $lastAction ? $lastAction->getAgentValidatedAt() : null;
    }
}
