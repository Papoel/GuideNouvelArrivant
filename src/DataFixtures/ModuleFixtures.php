<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Module;
use App\Entity\Theme;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ModuleFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $themes = $manager->getRepository(className: Theme::class)->findAll();

        foreach ($themes as $theme) {
            for ($i = 1; $i <= 5; ++$i) {
                $module = new Module();
                $module->setTitle(title: 'Module '.$i.' du '.$theme->getTitle());
                $module->setDescription(description: 'Description du module '.$i);
                $module->setTheme(theme: $theme);

                $manager->persist(object: $module);
            }
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            ThemeFixtures::class,
        ];
    }
}
