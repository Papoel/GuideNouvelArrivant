<?php

namespace App\Services\Admin\Users;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

readonly class UserDeletionService
{
    public function __construct(
        private EntityManagerInterface $entityManager
    ) {
    }

    public function deleteUserOnly(User $user): void
    {
        // Détacher les carnets de l'utilisateur
        foreach ($user->getLogbooks() as $logbook) {
            $logbook->setOwner(owner: null);
        }

        // Détacher les actions de l'utilisateur
        foreach ($user->getActions() as $action) {
            $action->setUser(user: null);
        }

        $this->entityManager->remove(object: $user);
        $this->entityManager->flush();
    }

    public function deleteUserAndLogbooks(User $user): void
    {
        foreach ($user->getLogbooks() as $logbook) {
            // Les thèmes sont des entités du modèle de carnet, partagées entre
            // tous les logbooks : on les détache (liaison seule) — les
            // supprimer détruirait les carnets des autres utilisateurs.
            // Les actions du carnet, elles, sont supprimées via cascade remove.
            foreach ($logbook->getThemes()->toArray() as $theme) {
                $logbook->removeTheme($theme);
            }
            $this->entityManager->remove($logbook);
        }

        $this->entityManager->remove($user);
        $this->entityManager->flush();
    }

    public function deleteLogbooksOnly(User $user): void
    {
        foreach ($user->getLogbooks() as $logbook) {
            $this->entityManager->remove(object: $logbook);
        }

        $this->entityManager->flush();
    }
}
