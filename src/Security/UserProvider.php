<?php

namespace App\Security;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\Exception\UserNotFoundException;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

/**
 * @implements UserProviderInterface<User>
 */
readonly class UserProvider implements UserProviderInterface, PasswordUpgraderInterface
{
    public function __construct(
        private EntityManagerInterface $entityManager
    ) {
    }

    public function loadUserByIdentifier(string $identifier): UserInterface
    {
        /** @var User $user */
        $user = $this->entityManager->createQueryBuilder()
            ->select('u')
            ->from(from: User::class, alias: 'u')
            ->where('u.email = :identifier')
            ->orWhere('u.nni = :identifier')
            ->setParameter(key: 'identifier', value: $identifier)
            ->getQuery()
            ->getOneOrNullResult();

        if (!$user instanceof User) {
            throw new UserNotFoundException();
        }

        return $user;
    }

    public function refreshUser(UserInterface $user): UserInterface
    {
        if (!$user instanceof User) {
            throw new UnsupportedUserException(message: sprintf('Invalid user class "%s".', get_class(object: $user)));
        }

        return $this->loadUserByIdentifier(identifier: $user->getUserIdentifier());
    }

    public function supportsClass(string $class): bool
    {
        return User::class === $class || is_subclass_of(object_or_class: $class, class: User::class);
    }

    public function upgradePassword(PasswordAuthenticatedUserInterface $user, string $newHashedPassword): void
    {
        if (!$user instanceof User) {
            throw new UnsupportedUserException(message: sprintf('Instances of "%s" are not supported.', get_class(object: $user)));
        }

        $user->setPassword(password: $newHashedPassword);
        $this->entityManager->persist(object: $user);
        $this->entityManager->flush();
    }
}
