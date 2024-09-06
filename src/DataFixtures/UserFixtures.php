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
        $faker = Faker::create(locale: 'fr_FR');

        // Création des utilisateurs sans leur assigner de mentor
        for ($i = 2; $i <= 10; ++$i) {
            $user = new User();
            $user->setFirstname(firstname: strtolower(string: $faker->firstName()));
            $user->setLastname(lastname: strtolower(string: $faker->lastName()));
            $user->setEmail(email: 'email'.$i.'@edf.fr');
            $user->setNni(nni: $faker->regexify(regex: '/[A-Z]\d{5}/'));

            $jobs = JobEnum::cases();
            $user->setJob(job: $jobs[array_rand($jobs)]);

            $specialities = SpecialityEnum::cases();
            $user->setSpeciality(speciality: $specialities[array_rand($specialities)]);

            $hireDate = $faker->dateTimeBetween(startDate: '-10 years');
            $immutableHireDate = new \DateTimeImmutable(datetime: $hireDate->format(format: 'Y-m-d'));
            $user->setHiringAt(hiringAt: $immutableHireDate);
            $user->setRoles(roles: ['ROLE_USER']);
            $plainPassword = 'user';
            $user->setPassword(password: $this->passwordHasher
                ->hashPassword(user: $user, plainPassword: $plainPassword)
            );

            // Associer un nouveau Logbook pour chaque utilisateur
            $user->addLogbook(logbook: $this->getReference(name: 'logbook_'.random_int(1, 3)));

            // Ajouter la référence de l'utilisateur pour les mentors
            $this->addReference(name: 'user_'.$i, object: $user);

            $manager->persist(object: $user);
        }

        // Persist de l'administrateur sans mentor
        $admin = new User();
        $admin->setFirstname(firstname: 'pascal');
        $admin->setLastname(lastname: 'briffard');
        $admin->setNni(nni: 'F07583');
        $admin->setJob(job: JobEnum::CHARGE_AFFAIRES);
        $admin->setSpeciality(speciality: SpecialityEnum::CHA);
        $admin->setHiringAt(hiringAt: new \DateTimeImmutable(datetime: '2023-11-02'));
        $admin->setEmail(email: 'pascal.briffard@edf.fr');
        $admin->setRoles(roles: ['ROLE_ADMIN']);
        $plainPassword = 'admin';
        $admin->setPassword(password: $this->passwordHasher->hashPassword($admin, $plainPassword));

        // Association avec un nouveau Logbook
        $admin->addLogbook(logbook: $this->getReference(name: 'logbook_1'));

        $this->addReference(name: 'user_1', object: $admin);
        $manager->persist(object: $admin);

        // Sauvegarde initiale de tous les utilisateurs
        $manager->flush();

        // Deuxième étape : assigner les mentors
        for ($i = 2; $i <= 10; ++$i) {
            $user = $this->getReference(name: 'user_'.$i);

            if ($i < 10) {
                $probableMentor = $this->getReference(name: 'user_'.($i + 1));
                $user->setMentor(mentor: $probableMentor);
            } else {
                // Pour User 10, on peut choisir un mentor au hasard parmi les autres utilisateurs
                $probableMentor = $this->getReference(name: 'user_'.random_int(2, 9));
                $user->setMentor(mentor: $probableMentor);
            }
        }

        // Définir le mentor de l'admin (aléatoire parmi les utilisateurs)
        $probableMentor = $this->getReference(name: 'user_'.random_int(2, 10));
        $admin->setMentor(mentor: $probableMentor);

        // Sauvegarde des modifications
        $manager->flush();
    }
}
