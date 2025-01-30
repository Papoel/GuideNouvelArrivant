<?php

namespace App\DataFixtures;

use App\Entity\Action;
use App\Entity\Logbook;
use App\Entity\Module;
use App\Entity\Theme;
use App\Entity\User;
use App\Enum\JobEnum;
use App\Enum\SpecialityEnum;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory as Faker;
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
        // Création de l'administrateur
        $admin = new User();
        $admin->setFirstname(firstname: 'Bruce')
            ->setLastname(lastname: 'Wayne')
            ->setEmail(email: 'bruce.wayne@gotham.city')
            ->setRoles(roles: ['ROLE_ADMIN', 'ROLE_USER'])
            ->setPassword(password: $this->passwordHasher->hashPassword(user: $admin, plainPassword: 'admin'))
            ->setNni(nni: 'H12345')
            ->setJob(job: JobEnum::CHARGE_AFFAIRES)
            ->setSpeciality(speciality: SpecialityEnum::CHA)
            ->setHiringAt(hiringAt: new \DateTimeImmutable(datetime: '2023/11/02'));

        $manager->persist($admin);
        $this->addReference(name: 'admin_user', object: $admin);

        // Création des utilisateurs
        $mentors = $this->createMentors(manager: $manager);
        $users = $this->createUsers(manager: $manager, mentors: $mentors);

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

        for ($i = 0; $i < 5; ++$i) {
            $mentor = new User();
            $mentor->setFirstname(firstname: $this->faker->firstName)
                ->setLastname(lastname: $this->faker->lastName)
                ->setEmail(email: sprintf('mentor%d@example.com', $i))
                ->setPassword(password: $this->passwordHasher->hashPassword(user: $mentor, plainPassword: 'Password123!'))
                ->setRoles(roles: ['ROLE_MENTOR'])
                ->setJob(job: JobEnum::cases()[array_rand($jobs)])
                ->setNni(nni: sprintf('%s%s', chr(codepoint: 65 + $i), str_pad(string: $i, length: 5, pad_string: '0', pad_type: STR_PAD_LEFT)))
                ->setSpeciality(speciality: SpecialityEnum::cases()[array_rand(array: SpecialityEnum::cases())])
                ->setHiringAt(hiringAt: new \DateTimeImmutable(datetime: '-'.random_int(1, 5).' years'));

            $manager->persist(object: $mentor);
            $this->addReference(name: 'mentor_'.$i, object: $mentor);
            $mentors[] = $mentor;
        }

        return $mentors;
    }

    private function createUsers(ObjectManager $manager, array $mentors): array
    {
        $users = [];
        for ($i = 0; $i < 20; ++$i) {
            $user = new User();
            $user->setFirstname(firstname: $this->faker->firstName)
                ->setLastname(lastname: $this->faker->lastName)
                ->setEmail(email: sprintf('user%d@example.com', $i))
                ->setPassword(password: $this->passwordHasher->hashPassword(user: $user, plainPassword: 'Password123!'))
                ->setRoles(['ROLE_USER'])
                ->setNni(nni: sprintf('%s%s', chr(codepoint: 70 + $i), str_pad(string: $i, length: 5, pad_string: '0', pad_type: STR_PAD_LEFT)))
                ->setMentor(mentor: $mentors[array_rand(array: $mentors)])
                ->setHiringAt(hiringAt: new \DateTimeImmutable(datetime: '-'.random_int(1, 3).' months'));

            $manager->persist(object: $user);
            $this->addReference(name: 'user_'.$i, object: $user);
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
            $this->addReference(name: 'theme_'.$i, object: $theme);
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
                $this->addReference(name: 'module_'.$themeIndex.'_'.$i, object: $module);
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
            $logbook->setName('Carnet de '.$user->getFirstname().' '.$user->getLastname());

            // Ajout de 1 à 3 thèmes aléatoires
            $selectedThemes = array_rand($themes, min(count($themes), rand(1, 3)));
            if (!is_array($selectedThemes)) {
                $selectedThemes = [$selectedThemes];
            }

            foreach ($selectedThemes as $themeIndex) {
                $logbook->addTheme($themes[$themeIndex]);
            }

            $manager->persist($logbook);
            $this->addReference('logbook_'.$userIndex, $logbook);
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
                    ->setAgentValidatedAt(new \DateTime('-'.rand(1, 30).' days'))
                    ->setAgentVisa($user->getFirstname().' '.$user->getLastname());

                $mentor = $user->getMentor();
                if ($mentor) {
                    $action->setMentorComment($this->faker->paragraph)
                        ->setMentorValidatedAt(new \DateTime('-'.rand(1, 15).' days'))
                        ->setMentorCommentedAt(new \DateTime('-'.rand(1, 15).' days'))
                        ->setMentorVisa($mentor->getFirstname().' '.$mentor->getLastname());
                }

                $manager->persist($action);
            }
        }
    }
}
