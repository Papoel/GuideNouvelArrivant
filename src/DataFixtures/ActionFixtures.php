<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Action;
use App\Entity\Module;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ActionFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $modules = $manager->getRepository(className: Module::class)->findAll();

        foreach ($modules as $module) {
            for ($i = 1; $i <= 3; ++$i) {
                $action = new Action();
                $action->setDescription(description: 'Action '.$i.' pour '.$module->getTitle());
                $action->setModule(module: $module);

                $manager->persist(object: $action);
            }
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            ModuleFixtures::class,
        ];
    }
}
