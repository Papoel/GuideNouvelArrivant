<?php

namespace App\DataFixtures;

use App\Entity\Logbook;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class LogbookFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $logbookName = ['Carnet MRC', 'Carnet SPL', 'Carnet SAE'];

        foreach ($logbookName as $i => $name) {
            $logbook = new Logbook();
            $logbook->setName(name: $name);
            $manager->persist(object: $logbook);
            $this->addReference(name: 'logbook_'.$i + 1, object: $logbook);
        }

        $manager->flush();
    }
}
