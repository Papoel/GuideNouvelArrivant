<?php

declare(strict_types=1);

namespace App\Services\Dashboard;

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

        if ($currentUser->getNni() !== $nni) {
            throw new \RuntimeException(message: 'Le NNI ne correspond pas.');
        }
    }
}
