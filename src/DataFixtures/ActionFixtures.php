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
        $module = $manager->getRepository(className: Module::class)->find(id: 1);

        $action = new Action();
        $action->setModule(module: $module);
        $action->setAgentComment(agentComment: 'Documentation consultée');

        $manager->persist(object: $action);

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            ModuleFixtures::class,
        ];
    }
}
