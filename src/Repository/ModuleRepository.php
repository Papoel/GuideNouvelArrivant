<?php

namespace App\Repository;

use App\Entity\Action;
use App\Entity\Logbook;
use App\Entity\Module;
use App\Entity\Theme;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/** @extends ServiceEntityRepository<Module> */
class ModuleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Module::class);
    }

    /**
     * Récupère les modules associés à un thème spécifique
     *
     * @param Theme $theme Le thème pour lequel on cherche les modules
     *
     * @return Module[] Liste des modules associés au thème
     */
    public function findByTheme(Theme $theme): array
    {
        return $this->findBy(['theme' => $theme]);
    }

    /**
     * Récupère les actions associées à un thème et un carnet spécifique
     *
     * @param Theme $theme Le thème concerné
     * @param Logbook $logbook Le carnet concerné
     * @param User|null $user L'utilisateur spécifique (optionnel)
     *
     * @return array<Action> Les actions associées aux modules du thème dans le carnet
     */
    public function findActionsForThemeAndLogbook(Theme $theme, Logbook $logbook, ?User $user = null): array
    {
        // Récupérer les modules associés au thème
        $modules = $this->findByTheme($theme);

        if (empty($modules)) {
            return [];
        }

        $allActions = [];
        $entityManager = $this->getEntityManager();

        // Récupérer les actions pour chaque module
        foreach ($modules as $module) {
            $qb = $entityManager->createQueryBuilder();
            $qb->select('a')
                ->from(Action::class, 'a')
                ->where('a.module = :module')
                ->andWhere('a.logbook = :logbook')
                ->setParameter('module', $module)
                ->setParameter('logbook', $logbook);

            // Filtrer par utilisateur si spécifié
            if ($user !== null) {
                $qb->andWhere('a.user = :user')
                    ->setParameter('user', $user);
            }

            $actions = $qb->getQuery()->getResult();

            if (is_array($actions)) {
                foreach ($actions as $action) {
                    if ($action instanceof Action) {
                        $allActions[] = $action;
                    }
                }
            }
        }

        return $allActions;
    }

    /**
     * Supprime les actions associées à un thème et un carnet spécifique
     *
     * @param Theme $theme Le thème concerné
     * @param Logbook $logbook Le carnet concerné
     * @param User|null $user L'utilisateur spécifique (optionnel)
     *
     * @return int Le nombre d'actions supprimées
     */
    public function deleteActionsForThemeAndLogbook(Theme $theme, Logbook $logbook, ?User $user = null): int
    {
        $actions = $this->findActionsForThemeAndLogbook($theme, $logbook, $user);

        if (empty($actions)) {
            return 0;
        }

        $entityManager = $this->getEntityManager();
        $count = 0;

        foreach ($actions as $action) {
            $entityManager->remove($action);
            $count++;
        }

        $entityManager->flush();

        return $count;
    }
}
