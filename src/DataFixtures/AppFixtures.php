<?php

namespace App\DataFixtures;

use App\Entity\Job;
use App\Entity\User;
use App\Entity\Theme;
use App\Enum\JobEnum;
use App\Entity\Action;
use App\Entity\Module;
use App\Entity\Logbook;
use App\Entity\Service;
use App\Entity\Speciality;
use Faker\Factory as Faker;
use App\Enum\SpecialityEnum;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[\AllowDynamicProperties] class AppFixtures extends Fixture
{
    public function __construct(
        private readonly UserPasswordHasherInterface $passwordHasher,
    ) {
        $this->faker = Faker::create(locale: 'fr_FR');
    }

    public function load(ObjectManager $manager): void
    {
        // Création des jobs
        $this->createJobs(manager: $manager);

        // Création des spécialités
        $this->createSpecialities(manager: $manager);
        $manager->flush();

        // Création de l'administrateur
        $admin = new User();
        $admin->setFirstname(firstname: 'Bruce')
            ->setLastname(lastname: 'Wayne')
            ->setEmail(email: 'bruce.wayne@gotham.city')
            ->setRoles(roles: ['ROLE_ADMIN', 'ROLE_USER'])
            ->setPassword(password: $this->passwordHasher->hashPassword(user: $admin, plainPassword: 'Admin1234'))
            ->setNni(nni: 'H12345')
            ->setJob($this->getReference('job_CHARGE_AFFAIRES', Job::class))
            ->setSpeciality($this->getReference('speciality_CHA', Speciality::class))
            ->setHiringAt(hiringAt: new \DateTimeImmutable('-3 years'));

        $manager->persist(object: $admin);
        $this->addReference(name: 'admin_user', object: $admin);

        // Création des utilisateurs
        $mentors = $this->createMentors(manager: $manager);
        $users = $this->createUsers(manager: $manager, mentors: $mentors);

        // Création des services
        $allUsers = array_merge([$admin], $mentors, $users);
        $services = $this->createServices(manager: $manager, users: $allUsers, admin: $admin);

        // Affectation des utilisateurs aux services
        $this->assignUsersToServices(manager: $manager, users: $allUsers, services: $services);

        // Création des thèmes
        $themes = $this->createThemes(manager: $manager);

        // Création des modules pour chaque thème
        $modules = $this->createModules(manager: $manager, themes: $themes);

        // Création des logbooks
        $this->createLogbooks(manager: $manager, users: $users, themes: $themes);

        $manager->flush();

        // Création des actions après le flush pour s'assurer que toutes les entités ont leur ID
        $logbooks = $manager->getRepository(className: Logbook::class)->findAll();
        if (!empty($logbooks)) {
            $this->createActions(manager: $manager, users: $users, modules: $modules, logbooks: $logbooks);
            $manager->flush();
        }
    }

    private function createMentors(ObjectManager $manager): array
    {
        $mentors = [];
        $jobs = JobEnum::cases();

        $jobRefs = [];
        foreach (JobEnum::cases() as $jobEnum) {
            $jobRefs[] = $this->getReference('job_' . $jobEnum->name, Job::class);
        }
        $specialityRefs = [];
        foreach (SpecialityEnum::cases() as $specEnum) {
            $specialityRefs[] = $this->getReference('speciality_' . $specEnum->name, Speciality::class);
        }
        for ($i = 0; $i < 5; ++$i) {
            $mentor = new User();
            $mentor->setFirstname(firstname: $this->faker->firstName)
                ->setLastname(lastname: $this->faker->lastName)
                ->setEmail(email: sprintf('mentor%d@example.com', $i))
                ->setPassword(password: $this->passwordHasher->hashPassword(user: $mentor, plainPassword: 'Password123!'))
                ->setRoles(roles: ['ROLE_MENTOR'])
                ->setJob($jobRefs[array_rand($jobRefs)])
                ->setNni(nni: sprintf('%s%s', chr(codepoint: 65 + $i), str_pad(string: $i, length: 5, pad_string: '0', pad_type: STR_PAD_LEFT)))
                ->setSpeciality($specialityRefs[array_rand($specialityRefs)])
                ->setHiringAt(hiringAt: new \DateTimeImmutable(datetime: '-' . random_int(1, 5) . ' years'));

            $manager->persist(object: $mentor);
            $this->addReference(name: 'mentor_' . $i, object: $mentor);
            $mentors[] = $mentor;
        }

        return $mentors;
    }

    private function createUsers(ObjectManager $manager, array $mentors): array
    {
        $users = [];
        $jobEnums = JobEnum::cases();
        $specialityEnums = SpecialityEnum::cases();

        for ($i = 0; $i < 20; ++$i) {
            $user = new User();

            // Sélectionne un job au hasard
            $jobEnum = $jobEnums[array_rand($jobEnums)];
            $job = $this->getReference('job_' . $jobEnum->name, Job::class);

            // Sélectionne une spécialité au hasard
            $specialityEnum = $specialityEnums[array_rand($specialityEnums)];
            $speciality = $this->getReference('speciality_' . $specialityEnum->name, Speciality::class);

            $user->setFirstname($this->faker->firstName)
                ->setLastname($this->faker->lastName)
                ->setEmail(sprintf('user%d@example.com', $i))
                ->setPassword($this->passwordHasher->hashPassword($user, 'Password123!'))
                ->setRoles(['ROLE_USER'])
                ->setNni(sprintf('%s%s', chr(70 + $i), str_pad($i, 5, '0', STR_PAD_LEFT)))
                ->setMentor($mentors[array_rand($mentors)])
                ->setJob($job)
                ->setSpeciality($speciality)
                ->setHiringAt(new \DateTimeImmutable('-' . random_int(1, 3) . ' months'));

            $manager->persist($user);
            $this->addReference('user_' . $i, $user);
            $users[] = $user;
        }

        return $users;
    }

    private function createThemes(ObjectManager $manager): array
    {
        $themes = [];
        $themeNames = ['Sécurité', 'Qualité', 'Production', 'Maintenance', 'Innovation'];

        foreach ($themeNames as $i => $name) {
            $theme = new Theme();
            $theme->setTitle(title: $name)
                ->setDescription(description: $this->faker->paragraph);

            $manager->persist($theme);
            $this->addReference(name: 'theme_' . $i, object: $theme);
            $themes[] = $theme;
        }

        return $themes;
    }

    private function createModules(ObjectManager $manager, array $themes): array
    {
        $modules = [];
        foreach ($themes as $themeIndex => $theme) {
            for ($i = 0; $i < 3; ++$i) {
                $module = new Module();
                $module->setTitle(title: sprintf('Module %d - %s', $i + 1, $theme->getTitle()))
                    ->setDescription(description: $this->faker->paragraph)
                    ->setTheme(theme: $theme);

                $manager->persist($module);
                $this->addReference(name: 'module_' . $themeIndex . '_' . $i, object: $module);
                $modules[] = $module;
            }
        }

        return $modules;
    }

    private function createLogbooks(ObjectManager $manager, array $users, array $themes): void
    {
        foreach ($users as $userIndex => $user) {
            $logbook = new Logbook();
            $logbook->setOwner($user);
            $logbook->setName('Carnet de ' . $user->getFirstname() . ' ' . $user->getLastname());

            // Ajout de 1 à 3 thèmes aléatoires
            $selectedThemes = array_rand($themes, min(count($themes), rand(1, 3)));
            if (!is_array($selectedThemes)) {
                $selectedThemes = [$selectedThemes];
            }

            foreach ($selectedThemes as $themeIndex) {
                $logbook->addTheme($themes[$themeIndex]);
            }

            $manager->persist($logbook);
            $this->addReference('logbook_' . $userIndex, $logbook);
        }
    }

    private function createActions(ObjectManager $manager, array $users, array $modules, array $logbooks): void
    {
        foreach ($users as $user) {
            $userLogbook = null;
            foreach ($logbooks as $logbook) {
                if ($logbook->getOwner() === $user) {
                    $userLogbook = $logbook;
                    break;
                }
            }

            if (null === $userLogbook) {
                continue;
            }

            for ($i = 0; $i < rand(3, 8); ++$i) {
                $action = new Action();
                $action->setDescription($this->faker->sentence)
                    ->setUser($user)
                    ->setModule($modules[array_rand($modules)])
                    ->setLogbook($userLogbook)
                    ->setAgentComment($this->faker->paragraph)
                    ->setAgentValidatedAt(new \DateTime('-' . rand(1, 30) . ' days'))
                    ->setAgentVisa($user->getFirstname() . ' ' . $user->getLastname());

                $mentor = $user->getMentor();
                if ($mentor) {
                    $action->setMentorComment($this->faker->paragraph)
                        ->setMentorValidatedAt(new \DateTime('-' . rand(1, 15) . ' days'))
                        ->setMentorCommentedAt(new \DateTime('-' . rand(1, 15) . ' days'))
                        ->setMentorVisa($mentor->getFirstname() . ' ' . $mentor->getLastname());
                }

                $manager->persist($action);
            }
        }
    }

    private function createServices(ObjectManager $manager, array $users, User $admin): array
    {
        // Etape 1 : Création de trois services: "MRC", "SPL", "KDE"
        // Etape 2 : Affecter un chef de service à chaque service
        // Etape 3 : Assigner à chaque utilisateur un service

        // Bruce Wayne est le chef du service MRC
        $bruceWayne = $admin;

        // Sélection aléatoire de chefs pour les autres services
        $randomUsers = array_filter(
            $users,
            function ($user) use ($admin) {
                return $user !== $admin;
            }
        );
        $randomUsers = array_values($randomUsers); // Réindexer le tableau
        shuffle($randomUsers);

        // Création du service MRC avec Bruce Wayne comme chef
        $serviceMRC = new Service();
        $serviceMRC->setName('MRC')
            ->setDescription('Mécanique Robinetterie Chaudronnerie')
            ->setChef($bruceWayne);
        $manager->persist($serviceMRC);
        $this->addReference('MRC', $serviceMRC);

        // Création du service SPL
        $serviceSPL = new Service();
        $serviceSPL->setName('SPL')
            ->setDescription('Support et Planification Logistique')
            ->setChef($randomUsers[0]);
        $manager->persist($serviceSPL);
        $this->addReference('SPL', $serviceSPL);

        // Création du service KDE
        $serviceKDE = new Service();
        $serviceKDE->setName('KDE')
            ->setDescription('Contrôle et Développement des Équipements')
            ->setChef($randomUsers[1]);
        $manager->persist($serviceKDE);
        $this->addReference('KDE', $serviceKDE);

        // Assurer que Bruce Wayne est bien assigné au service MRC
        $bruceWayne->setService($serviceMRC);
        $manager->persist($bruceWayne);

        // Assurer que les autres chefs sont bien assignés à leurs services respectifs
        $randomUsers[0]->setService($serviceSPL);
        $manager->persist($randomUsers[0]);
        $randomUsers[1]->setService($serviceKDE);
        $manager->persist($randomUsers[1]);

        return [
            'MRC' => $serviceMRC,
            'SPL' => $serviceSPL,
            'KDE' => $serviceKDE
        ];
    }

    private function assignUsersToServices(ObjectManager $manager, array $users, array $services): void
    {
        // Récupérer les chefs de service pour les exclure de l'assignation aléatoire
        $serviceChefs = [];
        foreach ($services as $service) {
            $chef = $service->getChef();
            if ($chef) {
                $serviceChefs[] = $chef;
            }
        }

        // Assigner aléatoirement les autres utilisateurs aux services
        $serviceKeys = array_keys($services);

        foreach ($users as $user) {
            // Vérifier si l'utilisateur est déjà chef d'un service
            if (in_array($user, $serviceChefs, true)) {
                continue; // Passer à l'utilisateur suivant car déjà assigné
            }

            // Assigner aléatoirement un service
            $randomServiceKey = $serviceKeys[array_rand($serviceKeys)];
            $user->setService($services[$randomServiceKey]);
            $manager->persist($user);
        }
    }

    private function createJobs(ObjectManager $manager): void
    {
        foreach (JobEnum::cases() as $job) {
            $jobEntity = new Job();
            $jobEntity->setName(name: $job->value)
                ->setCode(code: $job->getAbbreviation());

            $manager->persist(object: $jobEntity);
            $this->addReference(name: 'job_' . $job->name, object: $jobEntity);
        }
    }

    private function createSpecialities(ObjectManager $manager): void
    {
        foreach (SpecialityEnum::cases() as $speciality) {
            $specialityEntity = new Speciality();
            $specialityEntity->setName(name: $speciality->value)
                ->setCode(code: $speciality->getAbbreviation());

            $manager->persist(object: $specialityEntity);
            $this->addReference(name: 'speciality_' . $speciality->name, object: $specialityEntity);
        }
    }
}
