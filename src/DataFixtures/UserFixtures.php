<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory as Faker;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    public function __construct(
        private readonly UserPasswordHasherInterface $passwordHasher
    ) {
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Faker::create(locale: 'fr_FR');

        // Création de l'utilisateur administrateur
        $admin = new User();
        $admin->setFirstname(firstname: 'pascal');
        $admin->setLastname(lastname: 'briffard');
        $admin->setEmail(email: 'pascal.briffard@edf.fr');
        $admin->setRoles(roles: ['ROLE_ADMIN']);
        $plainPassword = 'admin';
        $admin->setPassword($this->passwordHasher->hashPassword($admin, $plainPassword));
        $manager->persist($admin);
        $this->addReference('user_admin', $admin);

        // Création de plusieurs utilisateurs
        for ($i = 1; $i <= 5; ++$i) {
            $user = new User();
            $user->setFirstname(firstname: strtolower($faker->firstName()));
            $user->setLastname(lastname: strtolower($faker->lastName()));
            $user->setEmail(email: 'email'.$i.'@edf.fr');
            $user->setRoles(roles: ['ROLE_USER']);
            $plainPassword = 'user';
            $user->setPassword($this->passwordHasher->hashPassword($user, $plainPassword));

            $manager->persist($user);
            $this->addReference('user_'.$i, $user);
        }

        $manager->flush();
    }
}
