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
        // Récupérer un module existant en utilisant une référence
        $module = $this->getReference('module_1'); // Assurez-vous d'avoir créé cette référence dans ModuleFixtures

        // Récupérer un utilisateur existant en utilisant une référence
        $user = $this->getReference('user_1'); // Cela récupère le premier utilisateur créé dans UserFixtures

        $action = new Action();
        $action->setModule($module);
        $action->setAgentComment('Documentation consultée');
        $action->setUser($user);

        $manager->persist($action);
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
