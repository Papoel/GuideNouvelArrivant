<?php

declare(strict_types=1);

namespace App\Services\User;

use App\Entity\User;

/**
 * @param User|null $currentUser
 *
 * @phpstan-assert User $currentUser
 */
class UserValidationService
{
    public function validateUser(?User $currentUser, string $nni): void
    {
        if (null === $currentUser) {
            throw new \RuntimeException(message: 'Utilisateur non connecté');
        }

        // Vérification du NNI, autoriser si l'utilisateur est un administrateur
        if ($currentUser->getNni() !== $nni && !$currentUser->isAdmin()) {
            throw new \RuntimeException(message: 'Vous n\'avez pas les droits pour accéder à cette page');
        }
    }
}
