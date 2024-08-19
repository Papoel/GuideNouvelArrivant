<?php

namespace App\DataFixtures;

use App\Entity\Logbook;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class LogbookThemeFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 3; ++$i) {
            /** @var Logbook $logbook */
            $logbook = $this->getReference(name: 'logbook_'.$i);

            for ($j = 1; $j <= 3; ++$j) {
                $logbook->addTheme(theme: $this->getReference(name: 'theme_'.$i));
            }

            $manager->persist(object: $logbook);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            LogbookFixtures::class,
            ThemeFixtures::class,
        ];
    }
}
