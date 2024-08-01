<?php

namespace App\DataFixtures;

use App\Entity\Answer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory as Faker;

class AnswerFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker::create(locale: 'fr_FR');

        for ($i = 1; $i <= 20; ++$i) {
            $answer = new Answer();
            $answer->setContent($faker->paragraph(4));
            $answer->setTheme($this->getReference('theme_'.($i % 10 + 1)));
            $answer->setNewcomer($this->getReference('user_'.($i % 5 + 1)));

            $manager->persist($answer);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            ThemeFixtures::class,
            UserFixtures::class,
        ];
    }
}
