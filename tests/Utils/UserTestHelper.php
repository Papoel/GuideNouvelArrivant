<?php

declare(strict_types=1);

namespace App\Tests\Utils;

use App\Entity\Logbook;
use App\Entity\Module;
use App\Entity\Theme;
use App\Entity\User;
use App\Enum\JobEnum;
use App\Enum\SpecialityEnum;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserTestHelper
{
    public const TIMEZONE = 'Europe/Paris';
    public static function createUser(array $attributes = []): User
    {
        // Récupération des données par défaut ou celles passées en argument
        $user = new User();
        $user->setFirstname(firstname: $attributes['firstname'] ?? 'Bruce');
        $user->setLastname(lastname: $attributes['lastname'] ?? 'Wayne');
        $user->setEmail(email: $attributes['email'] ?? self::generateUniqueEmail());
        $user->setNni(nni: $attributes['nni'] ?? self::generateUniqueNni());
        $user->setJob(job: $attributes['job'] ?? JobEnum::CHARGE_AFFAIRES);
        $user->setSpeciality(speciality: $attributes['specialty'] ?? SpecialityEnum::CHA);

        $timezone = new \DateTimeZone(timezone: self::TIMEZONE);
        $hiringAt = $attributes['hiringAt'] ?? new \DateTimeImmutable(datetime: '2023-11-02 08:00:00', timezone: $timezone);
        $user->setHiringAt(hiringAt: $hiringAt);

        // Encodage du mot de passe
        $rawPassword = $attributes['password'] ?? 'password';
        $encodedPassword = password_hash(password: $rawPassword, algo: PASSWORD_ARGON2ID);
        $user->setPassword(password: $encodedPassword);

        return $user;
    }


    private static function generateUniqueEmail(): string
    {
        return 'user' . uniqid(prefix: '', more_entropy: true) . '@gotham.city';
    }

    private static function generateUniqueNni(): string
    {
        $letter = chr(random_int(65, 90)); // Génère une lettre majuscule aléatoire (A-Z)
        $numbers = str_pad((string)random_int(0, 99999), length: 5, pad_string: '0', pad_type: STR_PAD_LEFT); // Génère 5 chiffres avec des zéros à gauche si nécessaire
        return $letter . $numbers;
    }

    public static function createAdminUser(): User
    {
        $user = self::createUser(['email' => 'admin' . uniqid() . '@example.com']);
        $user->setRoles(['ROLE_ADMIN', 'ROLE_USER']);
        return $user;
    }

    public static function createMentorUser(): User
    {
        $mentor = self::createUser(['email' => 'mentor' . uniqid() . '@example.com']);
        $mentor->setRoles(['ROLE_USER', 'ROLE_MENTOR']);
        return $mentor;
    }

    public static function getUser(KernelBrowser $client)
    {
        $container = $client->getContainer();
        $entityManager = $container->get(id: 'doctrine')->getManager();
        return $entityManager->getRepository(className: User::class)->findOneBy(criteria: ['email' => 'bruce.wayne@gotham.city']);
    }

    public static function addLogbook(KernelBrowser $client, ?object $user): void
    {
        $container = $client->getContainer();
        $entityManager = $container->get(id: 'doctrine')->getManager();

        // Mock : 1. Création des themes
        $theme1 = new Theme();
        $theme1->setTitle(title: 'Theme 1');
        $theme1->setDescription(description: 'Description du theme 1');

        $theme2 = new Theme();
        $theme2->setTitle(title: 'Theme 2');
        $theme2->setDescription(description: 'Description du theme 2');

        // Persister les themes
        $entityManager->persist($theme1);
        $entityManager->persist($theme2);

        // 2. Création des modules
        $module1 = new Module();
        $module1->setTitle(title: 'Module 1');
        $module1->setDescription(description: 'Description du module 1');
        $module1->setTheme($theme1);

        $module2 = new Module();
        $module2->setTitle(title: 'Module 2');
        $module2->setDescription(description: 'Description du module 2');
        $module2->setTheme($theme2);

        // Persister les modules
        $entityManager->persist($module1);
        $entityManager->persist($module2);


        // Mock : Ajouter un carnet à l'utilisateur
        $logbook = new Logbook();
        $logbook->setOwner($user);
        $logbook->setName(name: 'Carnet de '.$user->getFullName()) . ' (' . $user->getSpecialityAbreviation() . ')';
        $logbook->addTheme($theme1);
        $logbook->addTheme($theme2);

        // Persister le carnet
        $entityManager->persist($logbook);
        $entityManager->flush();
    }

    public static function createUserAndAddLogbook(KernelBrowser $client): User
    {
        $container = $client->getContainer();
        $entityManager = $container->get(id: 'doctrine')->getManager();

        // Créer un utilisateur
        $user = self::createUser();
        $entityManager->persist($user);

        $theme1 = new Theme();
        $theme1->setTitle(title: 'Theme 1');
        $theme1->setDescription(description: 'Description du theme 1');

        $theme2 = new Theme();
        $theme2->setTitle(title: 'Theme 2');
        $theme2->setDescription(description: 'Description du theme 2');

        // Persister les themes
        $entityManager->persist($theme1);
        $entityManager->persist($theme2);

        // 2. Création des modules
        $module1 = new Module();
        $module1->setTitle(title: 'Module 1');
        $module1->setDescription(description: 'Description du module 1');
        $module1->setTheme($theme1);

        $module2 = new Module();
        $module2->setTitle(title: 'Module 2');
        $module2->setDescription(description: 'Description du module 2');
        $module2->setTheme($theme2);

        // Persister les modules
        $entityManager->persist($module1);
        $entityManager->persist($module2);


        // Mock : Ajouter un carnet à l'utilisateur
        $logbook = new Logbook();
        $logbook->setOwner($user);
        $logbook->setName(name: 'Carnet de '.$user->getFullName() . ' (' . $user->getSpecialityAbreviation() . ')');
        $logbook->addTheme($theme1);
        $logbook->addTheme($theme2);

        // Persister le carnet
        $entityManager->persist($logbook);
        $entityManager->flush();

        return $user;
    }
}
