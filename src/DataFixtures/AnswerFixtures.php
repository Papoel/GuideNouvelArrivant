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
            $answer->setContent(content: $faker->paragraph(nbSentences: 4));
            $answer->setTheme(theme: $this->getReference(name: 'theme_'.(($i % 10) + 1)));

            $manager->persist(object: $answer);
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
