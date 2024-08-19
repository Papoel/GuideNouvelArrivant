<?php

namespace App\DataFixtures;

use App\Entity\Theme;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ThemeFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $theme1 = new Theme();
        $theme1->setTitle(title: '1.1 Connaissance de la réglementation et des prescriptions');
        $this->addReference(name: 'theme_1', object: $theme1);
        $manager->persist($theme1);

        $theme2 = new Theme();
        $theme2->setTitle(title: '1.2 Connaissance des outils SDIN');
        $this->addReference(name: 'theme_2', object: $theme2);
        $manager->persist($theme2);

        $theme3 = new Theme();
        $theme3->setTitle(title: '1.3 Préparation et réalisation des activités');
        $this->addReference(name: 'theme_3', object: $theme3);
        $manager->persist($theme3);

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [LogbookFixtures::class];
    }
}
