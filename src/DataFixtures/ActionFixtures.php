<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Action;
use App\Entity\Module;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ActionFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        // Récupérer un module existant
        $module = $manager->getRepository(className: Module::class)->find(1);

        // Récupérer un utilisateur existant pour associer à l'action
        $user = $manager->getRepository(className: User::class)->find(id: 10);

        $action = new Action();
        $action->setModule(module: $module);
        $action->setAgentComment(agentComment: 'Documentation consultée');
        $action->setUser($user);

        $manager->persist(object: $action);
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            ModuleFixtures::class,
            UserFixtures::class,
        ];
    }
}
