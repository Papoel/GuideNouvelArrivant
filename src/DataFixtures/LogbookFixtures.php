<?php

namespace App\DataFixtures;

use App\Entity\Logbook;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class LogbookFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 10; ++$i) {
            $logbook = new Logbook();
            $logbook->setName(name: 'Logbook '.$i);
            $manager->persist(object: $logbook);
            $this->addReference(name: 'logbook_'.$i, object: $logbook);
        }

        $manager->flush();
    }
}
