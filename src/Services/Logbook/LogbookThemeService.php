<?php

declare(strict_types=1);

namespace App\Services\Logbook;

use App\Entity\Action;
use App\Entity\Logbook;
use App\Entity\Module;
use App\Entity\Theme;
use App\Entity\User;
use App\Repository\ActionRepository;
use App\Repository\ModuleRepository;
use Doctrine\ORM\EntityManagerInterface;

class LogbookThemeService
{
    public function __construct(
        private readonly EntityManagerInterface $entityManager,
        private readonly ActionRepository $actionRepository,
        private readonly ModuleRepository $moduleRepository
    ) {
    }

    /**
     * Vérifie si un thème a des actions associées dans un carnet spécifique
     *
     * @param Logbook $logbook Le carnet concerné
     * @param Theme $theme Le thème à vérifier
     * @param User|null $user L'utilisateur spécifique (optionnel)
     *
     * @return bool True si des actions existent, false sinon
     */
    public function hasThemeActions(Logbook $logbook, Theme $theme, ?User $user = null): bool
    {
        // return $this->actionRepository->hasActionsForThemeInLogbook($logbook, $theme, $user);
        $userId = $user && $user->getId() ? $user->getId()->toString() : null;

        $logbookId = $logbook->getId();
        $themeId = $theme->getId();

        if ($logbookId === null || $themeId === null) {
            return false;
        }

        return $this->actionRepository->hasActionsForThemeInLogbookNative($logbookId->toString(), $themeId->toString(), $userId);
    }

    /**
     * Récupère toutes les actions associées à un thème dans un carnet spécifique
     *
     * @param Logbook $logbook Le carnet concerné
     * @param Theme $theme Le thème à vérifier
     * @param User|null $user L'utilisateur spécifique (optionnel)
     *
     * @return Action[]
     */
    public function getThemeActions(Logbook $logbook, Theme $theme, ?User $user = null): array
    {
        return $this->actionRepository->findByLogbookAndTheme($logbook, $theme, $user);
    }

    /**
     * Supprime toutes les actions associées à un thème dans un carnet spécifique
     *
     * @param Logbook $logbook Le carnet concerné
     * @param Theme $theme Le thème à supprimer
     * @param User|null $user L'utilisateur spécifique (optionnel) - si fourni, supprime uniquement les actions de cet utilisateur
     *
     * @return int Le nombre d'actions supprimées
     */
    public function deleteThemeActions(Logbook $logbook, Theme $theme, ?User $user = null): int
    {
        // Utiliser le ModuleRepository pour supprimer les actions
        // Cette méthode s'occupe de récupérer les modules du thème et leurs actions associées
        return $this->moduleRepository->deleteActionsForThemeAndLogbook($theme, $logbook, $user);
    }

    /**
     * Supprime un thème d'un carnet et gère les actions associées
     *
     * @return bool True si la suppression a été effectuée, False si elle a été annulée
     */
    public function removeThemeFromLogbook(Logbook $logbook, Theme $theme, bool $forceDelete = false): bool
    {
        // Vérifier si le thème a des actions associées
        $hasActions = $this->hasThemeActions($logbook, $theme);

        // Si des actions existent et qu'on ne force pas la suppression, annuler
        if ($hasActions && !$forceDelete) {
            return false;
        }

        // Supprimer les actions associées si nécessaire
        if ($hasActions) {
            $this->deleteThemeActions($logbook, $theme);
        }

        // Supprimer le thème du carnet
        $logbook->removeTheme($theme);
        $this->entityManager->persist($logbook);
        $this->entityManager->flush();

        return true;
    }
}
