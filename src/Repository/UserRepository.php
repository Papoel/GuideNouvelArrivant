<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;

/**
 * @extends ServiceEntityRepository<User>
 */
class UserRepository extends ServiceEntityRepository implements PasswordUpgraderInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    /**
     * Used to upgrade (rehash) the user's password automatically over time.
     */
    public function upgradePassword(PasswordAuthenticatedUserInterface $user, string $newHashedPassword): void
    {
        if (!$user instanceof User) {
            throw new UnsupportedUserException(message: sprintf('Instances of "%s" are not supported.', $user::class));
        }

        $user->setPassword(password: $newHashedPassword);
        $this->getEntityManager()->persist(object: $user);
        $this->getEntityManager()->flush();
    }

    /**
     * @return User[]
     */
    public function findApprenantByMentorNni(string $mentorNni): array
    {
        $result = $this->createQueryBuilder(alias: 'u')
            ->join(join: 'u.mentor', alias: 'm')
            ->where('m.nni = :mentorNni')
            ->setParameter(key: 'mentorNni', value: $mentorNni)
            ->getQuery()
            ->getResult();

        // Forcer le type de retour à un tableau d'objets User
        return is_array($result) ? $result : [];
    }
}
