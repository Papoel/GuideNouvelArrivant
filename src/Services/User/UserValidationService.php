<?php

declare(strict_types=1);

namespace App\Services\User;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/** @param User|null $currentUser
 *
 * @phpstan-assert User $currentUser */
readonly class UserValidationService
{
    public function __construct(
        private UserRepository $userRepository,
        private Security $security,
    ) {
    }

    public function validateUserAccess(string $nni): User
    {
        // Recherche de l'utilisateur par son NNI
        $user = $this->userRepository->findOneBy(['nni' => $nni]);

        if (null === $user) {
            // throw new NotFoundHttpException(message: "Utilisateur avec NNI $nni non trouvé.");
            throw new NotFoundHttpException(message: 'Une erreur est survenue, veuillez réessayer.');
        }

        return $user;
    }

    public function getCurrentUser(string $nni): User
    {
        // Récupération de l'utilisateur connecté
        $currentUser = $this->security->getUser();

        if (!$currentUser instanceof User) {
            throw new AccessDeniedHttpException(message: 'Utilisateur non connecté.');
        }

        // Si l'utilisateur tente d'accéder à un NNI différent du sien, redirection
        if ($currentUser->getNni() !== $nni) {
            // Redirection vers l'URL du dashboard avec le NNI de l'utilisateur connecté
            throw new AccessDeniedHttpException(message: 'Accès aux données d\'un autre utilisateur interdit.');
        }

        return $currentUser;
    }
}
