<?php

declare(strict_types=1);

namespace App\Tests\Controller\App\Dashboard;

use App\Entity\Logbook;
use App\Entity\Module;
use App\Entity\Theme;
use App\Tests\Utils\AuthenticationHelper;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;

class ActionControllerTest extends WebTestCase
{
    public function testEditAction()
    {
        $client = static::createClient();
        $client->followRedirects(followRedirects: false);

        $entityManager = static::getContainer()->get(id: EntityManagerInterface::class);

        // Créer et authentifier l'utilisateur
        [$client, $user] = AuthenticationHelper::authenticateUser(client: $client, entityManager: $entityManager);

        // Créer les mocks nécessaires
        $theme = new Theme();
        $theme->setTitle(title: 'Test Theme');
        $entityManager->persist($theme);
        $entityManager->flush(); // Flush pour obtenir un UUID valide

        $module = new Module();
        $module->setTitle(title: 'Test Module');
        $module->setTheme(theme: $theme);
        $entityManager->persist($module);
        $entityManager->flush(); // Flush pour obtenir un UUID valide

        $logbook = new Logbook();
        $logbook->setName(name: 'Test Logbook');
        $entityManager->persist($logbook);
        $entityManager->flush(); // Flush pour obtenir un UUID valide

        // Accéder à la page d'édition pour obtenir le token CSRF
        $crawler = $client->request(
            Request::METHOD_GET,
            sprintf('/dashboard/%s/module/%s/carnet/%s/edit',
                $user->getNni(),
                $module->getId(),
                $logbook->getId()
            )
        );

        // Récupérer le token CSRF du formulaire
        $form = $crawler->selectButton('Sauvegarder')->form();
        $token = $form->get('user_action[_token]')->getValue();

        // Simuler une soumission de formulaire
        $client->request(
            Request::METHOD_POST,
            sprintf('/dashboard/%s/module/%s/carnet/%s/edit',
                $user->getNni(),
                $module->getId(),
                $logbook->getId()
            ),
            [
                'user_action' => [
                    'agentComment' => 'Test comment',
                    'submit' => true,
                    '_token' => $token
                ]
            ]
        );

        // Vérifier la redirection vers le tableau de bord de l'utilisateur
        self::assertResponseRedirects(sprintf('/dashboard/%s/', $user->getNni()));
    }
}
