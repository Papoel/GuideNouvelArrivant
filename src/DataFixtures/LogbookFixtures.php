<?php

namespace App\DataFixtures;

use App\Entity\Logbook;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory as Faker;

class LogbookFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker::create(locale: 'fr_FR');

        for ($i = 1; $i <= 5; ++$i) {
            $logbook = new Logbook();
            $logbook->setService($this->getReference('service_'.($i % 7)));
            $logbook->setNewcomer($this->getReference('user_'.$i));
            $logbook->setMentor($this->getReference('user_admin'));

            $manager->persist($logbook);
            $this->addReference('logbook_'.$i, $logbook);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            UserFixtures::class,
            ServiceFixtures::class,
        ];
    }
}
