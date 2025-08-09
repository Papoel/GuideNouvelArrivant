<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Action;
use App\Entity\Logbook;
use App\Entity\Module;
use App\Entity\Theme;
use App\Entity\User;
use App\Repository\Interfaces\ActionRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\AbstractQuery;
use Doctrine\Persistence\ManagerRegistry;

/** Repository pour l'entité Action.
 * Gère les opérations de requêtage liées aux actions des utilisateurs.
 *
 * @extends ServiceEntityRepository<Action> */
class ActionRepository extends ServiceEntityRepository implements ActionRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Action::class);
    }

    /** Supprime une action de la base de données.
     *
     * @param Action $action L'action à supprimer */
    public function remove(Action $action): void
    {
        $this->getEntityManager()->remove($action);
    }

    /** Trouve les actions associées à un module spécifique et répondant à des critères additionnels.
     *
     * @param Module               $module   Le module pour lequel on recherche des actions
     * @param array<string, mixed> $criteria Critères additionnels de filtrage
     *
     * @return Action[] Liste des actions correspondant aux critères */
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

        /** @var array<int, Action> $result */
        $result = $qb->getQuery()->getResult();

        return $result;
    }

    /** Trouve la dernière action validée par un utilisateur.
     *
     * @param User $user L'utilisateur pour lequel on recherche la dernière action
     *
     * @return Action|null La dernière action validée ou null si aucune n'existe */
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

    /** Trouve les actions associées à un thème spécifique dans un carnet donné.
     *
     * @param Logbook $logbook Le carnet concerné
     * @param Theme $theme Le thème pour lequel on recherche des actions
     *
     * @return Action[] Liste des actions associées au thème dans le carnet */
    public function findByLogbookAndTheme(Logbook $logbook, Theme $theme, ?User $user = null): array
    {
        // Utilise une requête avec des jointures explicites pour garantir que toutes les actions liées sont trouvées
        $qb = $this->createQueryBuilder('a')
            ->innerJoin('a.module', 'm', 'WITH', 'm.theme = :theme')
            ->where('a.logbook = :logbook')
            ->setParameter('logbook', $logbook)
            ->setParameter('theme', $theme)
            ->orderBy('a.id', 'ASC');

        // Si un utilisateur est spécifié, filtrer par utilisateur
        if ($user !== null) {
            $qb->andWhere('a.user = :user')
                ->setParameter('user', $user);
        }

        /** @var array<int, Action> $result */
        $result = $qb->getQuery()->getResult();
        return $result;
    }

    /**
     * Version SQL native pour debug/comparaison
     */
    public function hasActionsForThemeInLogbookNative(string $logbookId, string $themeId, ?string $userId = null): bool
    {
        $sql = "
            SELECT COUNT(a.id) as count_actions
            FROM actions a
            JOIN modules m ON m.id = a.module_id
            WHERE a.logbook_id = UNHEX(REPLACE(:logbook_id, '-', ''))
            AND m.theme_id = UNHEX(REPLACE(:theme_id, '-', ''))
        ";

        $params = [
            'logbook_id' => $logbookId,
            'theme_id' => $themeId
        ];

        if ($userId !== null) {
            $sql .= " AND a.user_id = UNHEX(REPLACE(:user_id, '-', ''))";
            $params['user_id'] = $userId;
        }

        $stmt = $this->getEntityManager()->getConnection()->prepare($sql);
        $result = $stmt->executeQuery($params)->fetchAssociative();

        return $result !== false && isset($result['count_actions']) && $result['count_actions'] > 0;
    }

    public function getLastActionDateForUser(User $user): ?\DateTimeInterface
    {
        $result = $this->createQueryBuilder(alias: 'a')
            ->select('a.agentValidatedAt')
            ->where('a.user = :user')
            ->setParameter(key: 'user', value: $user)
            ->orderBy(sort: 'a.agentValidatedAt', order: 'DESC')
            ->setMaxResults(maxResults: 1)
            ->getQuery()
            ->getOneOrNullResult(hydrationMode: AbstractQuery::HYDRATE_SINGLE_SCALAR);

        return $result instanceof \DateTimeInterface ? $result : null;
    }
}
