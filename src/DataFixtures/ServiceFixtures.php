<?php

namespace App\DataFixtures;

use App\Entity\Service;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ServiceFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $services = ['MRC', 'SAE', 'SPL', 'SEA', 'SCO', 'ST', 'KDE'];

        foreach ($services as $index => $service) {
            $serviceEntity = new Service();
            $serviceEntity->setName($service);
            $manager->persist($serviceEntity);
            $this->addReference('service_'.$index, $serviceEntity);
        }

        $manager->flush();
    }
}
