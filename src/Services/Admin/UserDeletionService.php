<?php

namespace App\Services\Admin;

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
            $this->entityManager->remove($logbook);
        }

        $this->entityManager->remove(object: $user);
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
