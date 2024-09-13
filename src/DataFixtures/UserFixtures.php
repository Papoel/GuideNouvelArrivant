<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\User;
use App\Enum\JobEnum;
use App\Enum\SpecialityEnum;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory as Faker;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture implements DependentFixtureInterface
{
    public function __construct(
        private readonly UserPasswordHasherInterface $passwordHasher
    ) {
    }

    public function getDependencies(): array
    {
        return [LogbookFixtures::class];
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Faker::create('fr_FR'); // Correction : pas d'arguments nommés ici

        // Création des utilisateurs sans leur assigner de mentor
        for ($i = 2; $i <= 10; ++$i) {
            $user = new User();
            $user->setFirstname(strtolower($faker->firstName())); // Correction : pas d'arguments nommés ici
            $user->setLastname(strtolower($faker->lastName())); // Correction : pas d'arguments nommés ici
            $user->setEmail('email'.$i.'@edf.fr');
            $user->setNni($faker->regexify('/[A-Z]\d{5}/')); // Correction : pas d'arguments nommés ici

            $jobs = JobEnum::cases();
            $user->setJob($jobs[array_rand($jobs)]);

            $specialities = SpecialityEnum::cases();
            $user->setSpeciality($specialities[array_rand($specialities)]);

            $hireDate = $faker->dateTimeBetween('-10 years');
            $immutableHireDate = new \DateTimeImmutable($hireDate->format('Y-m-d'));
            $user->setHiringAt($immutableHireDate);
            $user->setRoles(['ROLE_USER']);
            $plainPassword = 'user';
            $user->setPassword($this->passwordHasher->hashPassword($user, $plainPassword));

            // Associer un nouveau Logbook pour chaque utilisateur
            $user->addLogbook($this->getReference('logbook_'.random_int(1, 3))); // Correction : pas d'arguments nommés ici

            // Ajouter la référence de l'utilisateur pour les mentors
            $this->addReference('user_'.$i, $user); // Correction : pas d'arguments nommés ici

            $manager->persist($user); // Correction : pas d'arguments nommés ici
        }

        // Persist de l'administrateur sans mentor
        $admin = new User();
        $admin->setFirstname('pascal');
        $admin->setLastname('briffard');
        $admin->setNni('F07583');
        $admin->setJob(JobEnum::CHARGE_AFFAIRES);
        $admin->setSpeciality(SpecialityEnum::CHA);
        $admin->setHiringAt(new \DateTimeImmutable('2023-11-02'));
        $admin->setEmail('pascal.briffard@edf.fr');
        $admin->setRoles(['ROLE_ADMIN']);
        $plainPassword = 'admin';
        $admin->setPassword($this->passwordHasher->hashPassword($admin, $plainPassword));

        // Association avec un nouveau Logbook
        $admin->addLogbook($this->getReference('logbook_1')); // Correction : pas d'arguments nommés ici

        $this->addReference('user_1', $admin); // Correction : pas d'arguments nommés ici
        $manager->persist($admin); // Correction : pas d'arguments nommés ici

        // Sauvegarde initiale de tous les utilisateurs
        $manager->flush();

        // Deuxième étape : assigner les mentors
        for ($i = 2; $i <= 10; ++$i) {
            $user = $this->getReference('user_'.$i); // Correction : pas d'arguments nommés ici

            if ($i < 10) {
                $probableMentor = $this->getReference('user_'.($i + 1)); // Correction : pas d'arguments nommés ici
                $user->setMentor($probableMentor); // Correction : pas d'arguments nommés ici
            } else {
                // Pour User 10, on peut choisir un mentor au hasard parmi les autres utilisateurs
                $probableMentor = $this->getReference('user_'.random_int(2, 9)); // Correction : pas d'arguments nommés ici
                $user->setMentor($probableMentor); // Correction : pas d'arguments nommés ici
            }
        }

        // Définir le mentor de l'admin (aléatoire parmi les utilisateurs)
        $probableMentor = $this->getReference('user_'.random_int(2, 10)); // Correction : pas d'arguments nommés ici
        $admin->setMentor($probableMentor); // Correction : pas d'arguments nommés ici

        // Sauvegarde des modifications
        $manager->flush();
    }
}
