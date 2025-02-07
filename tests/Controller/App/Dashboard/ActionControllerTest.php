<?php

declare(strict_types=1);

namespace App\Tests\Controller\App\Dashboard;

use App\Entity\Logbook;
use App\Entity\Module;
use App\Entity\Theme;
use App\Entity\User;
use App\Tests\Utils\AuthenticationHelper;
use App\Tests\Utils\UserTestHelper;
use PHPUnit\Framework\Attributes\Test;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class ActionControllerTest extends WebTestCase
{
    #[Test]
    public function editAction(): void
    {
        // 1. Création unique du client
        $client = static::createClient();
        $client->followRedirects(false);

        // 2. Configuration de l'EntityManager
        $entityManager = static::getContainer()->get(EntityManagerInterface::class);

        // 3. Création et persistance des entités de test
        $user = UserTestHelper::createUser();
        $entityManager->persist($user);

        $theme = new Theme();
        $theme->setTitle('Test Theme');
        $entityManager->persist($theme);

        $module = new Module();
        $module->setTitle('Test Module');
        $module->setTheme($theme);
        $entityManager->persist($module);

        $logbook = new Logbook();
        $logbook->setName('Test Logbook');
        $entityManager->persist($logbook);

        $entityManager->flush();

        // 4. Authentification manuelle de l'utilisateur
        $client->loginUser($user);

        // 5. Test de l'action d'édition
        $url = sprintf('/dashboard/%s/module/%s/carnet/%s/edit',
            $user->getNni(),
            $module->getId(),
            $logbook->getId()
        );

        $crawler = $client->request(Request::METHOD_GET, $url);
        $form = $crawler->selectButton('Sauvegarder')->form();
        $token = $form->get('user_action[_token]')->getValue();

        $client->request(
            Request::METHOD_POST,
            $url,
            [
                'user_action' => [
                    'agentComment' => 'Test comment',
                    'submit' => true,
                    '_token' => $token
                ]
            ]
        );

        self::assertResponseRedirects(sprintf('/dashboard/%s/', $user->getNni()));
    }
}
