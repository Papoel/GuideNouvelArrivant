<?php

namespace App\DataFixtures;

use App\Entity\Theme;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory as Faker;

class ThemeFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker::create(locale: 'fr_FR');

        for ($i = 1; $i <= 10; ++$i) {
            $theme = new Theme();
            $theme->setTitle($faker->sentence(3));
            $theme->setDescription($faker->paragraph(4));
            $theme->addLogbook($this->getReference('logbook_'.($i % 5 + 1)));

            $manager->persist($theme);
            $this->addReference('theme_'.$i, $theme);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            LogbookFixtures::class,
        ];
    }
}
