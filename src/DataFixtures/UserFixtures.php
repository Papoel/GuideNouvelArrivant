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

        // Créer l'administrateur
        $admin = new User();
        $admin->setFirstname(firstname: 'Bruce');
        $admin->setLastname(lastname: 'Wayne');
        $admin->setEmail(email: 'bruce.wayne@gotham.city');
        $admin->setRoles(roles: ['ROLE_ADMIN', 'ROLE_USER']);
        $admin->setPassword(password: $this->passwordHasher->hashPassword(user: $admin, plainPassword: 'admin'));
        $admin->setNni(nni: 'H12345');
        $admin->setJob(job: JobEnum::CHARGE_AFFAIRES);
        $admin->setSpeciality(speciality: SpecialityEnum::CHA);
        $admin->setHiringAt(hiringAt: new \DateTimeImmutable(datetime: '2023/11/02'));

        $manager->persist($admin);
        $this->addReference(name: 'user_admin', object: $admin);

        // Créer 5 utilisateurs normaux
        for ($i = 1; $i <= 5; ++$i) {
            $user = new User();
            $user->setFirstname(firstname: $faker->firstName);
            $user->setLastname(lastname: $faker->lastName);
            $user->setEmail(email: "user{$i}@edf.fr");
            $user->setPassword(password: $this->passwordHasher->hashPassword(user: $user, plainPassword: 'user'));
            $user->setNni(nni: $faker->regexify(regex: '[A-Z]\d{5}'));
            $user->setJob(job: $faker->randomElement(JobEnum::cases()));
            $user->setSpeciality(speciality: $faker->randomElement(SpecialityEnum::cases()));
            $user->setHiringAt(hiringAt: new \DateTimeImmutable(datetime: $faker->dateTimeBetween(startDate: '-10 years')->format(format: 'Y-m-d')));

            $manager->persist(object: $user);
            $this->addReference(name: "user_{$i}", object: $user);
        }

        $manager->flush();
    }
}
