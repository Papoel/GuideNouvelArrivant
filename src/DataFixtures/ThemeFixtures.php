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
            $theme->setTitle($faker->sentence(nbWords: 3));
            $theme->setDescription($faker->paragraph(nbSentences: 4));
            $theme->addLogbook(logbook: $this->getReference(name: 'logbook_'.(($i % 5) + 1)));

            $manager->persist(object: $theme);
            $this->addReference(name: 'theme_'.$i, object: $theme);
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
