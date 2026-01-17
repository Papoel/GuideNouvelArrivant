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
use Doctrine\ORM\Query\Expr\Join;
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

    /**
     * Supprime une action de la base de données.
     *
     * @param Action $action L'action à supprimer
     * @param bool $flush Si true, exécute flush() automatiquement
     */
    public function remove(Action $action, bool $flush = false): void
    {
        $this->getEntityManager()->remove($action);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /** Trouve les actions associées à un module spécifique et répondant à des critères additionnels.
     *
     * @param Module               $module   Le module pour lequel on recherche des actions
     * @param array<string, mixed> $criteria Critères additionnels de filtrage
     *
     * @return Action[] Liste des actions correspondant aux critères */
    public function findByModuleAndCriteria(Module $module, array $criteria = []): array
    {
        // Utiliser le findBy natif pour trouver les actions par module
        $actions = $this->findBy(['module' => $module]);

        // Si aucun critère supplémentaire, retourner toutes les actions trouvées
        if (empty($criteria)) {
            return $actions;
        }

        // Filtrer les actions selon les critères supplémentaires
        return array_filter($actions, function (Action $action) use ($criteria) {
            foreach ($criteria as $field => $value) {
                if ('service' === $field) {
                    // Vérifier si l'utilisateur a le service spécifié
                    $userService = $action->getUser()?->getService();
                    if ($userService !== $value) {
                        return false;
                    }
                } elseif ('user' === $field) {
                    // Vérifier si l'action appartient à l'utilisateur spécifié
                    if ($action->getUser() !== $value) {
                        return false;
                    }
                } else {
                    // Gérer les autres critères
                    $getter = 'get' . ucfirst($field);
                    if (method_exists($action, $getter)) {
                        if ($action->$getter() !== $value) {
                            return false;
                        }
                    }
                }
            }

            return true;
        });
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
        // Récupérer toutes les actions du carnet
        $actions = $this->findBy(['logbook' => $logbook]);

        // Filtrer les actions pour ne garder que celles dont le module a le thème spécifié
        $filteredActions = array_filter($actions, function (Action $action) use ($theme, $user) {
            // Vérifier que l'action a un module et que ce module a le thème spécifié
            $module = $action->getModule();
            if ($module === null || $module->getTheme() !== $theme) {
                return false;
            }

            // Si un utilisateur est spécifié, vérifier que l'action lui appartient
            if ($user !== null && $action->getUser() !== $user) {
                return false;
            }

            return true;
        });

        // Convertir le résultat en tableau indexé numériquement
        return array_values($filteredActions);
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

    /**
     * Helper method to check if a join already exists
     *
     * @param array<int, \Doctrine\ORM\Query\Expr\Join> $joins Liste des jointures à vérifier
     * @param string $alias Alias à rechercher
     * @return bool True si l'alias existe déjà dans les jointures
     */
    private function hasJoin(array $joins, string $alias): bool
    {
        foreach ($joins as $join) {
            if ($join->getAlias() === $alias) {
                return true;
            }
        }
        return false;
    }

    public function getLastActionDateForUser(User $user): ?\DateTimeInterface
    {
        // Récupérer toutes les actions de l'utilisateur
        $actions = $this->findBy(['user' => $user]);

        // Filtrer pour ne garder que les actions avec une date de validation
        $validatedActions = array_filter($actions, function (Action $action) {
            return $action->getAgentValidatedAt() !== null;
        });

        // Si aucune action validée n'est trouvée, retourner null
        if (empty($validatedActions)) {
            return null;
        }

        // Trier les actions par date de validation (la plus récente en premier)
        usort($validatedActions, function (Action $a, Action $b) {
            return $b->getAgentValidatedAt() <=> $a->getAgentValidatedAt();
        });

        // Retourner la date de la première action (la plus récente)
        return reset($validatedActions)->getAgentValidatedAt();
    }
}
