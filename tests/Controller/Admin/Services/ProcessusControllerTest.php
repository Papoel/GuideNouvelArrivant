<?php

namespace App\Tests\Controller\Services;

use App\Tests\Utils\AuthenticationHelper;
use PHPUnit\Framework\Attributes\Test;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class ProcessusControllerTest extends WebTestCase
{
    #[Test]
    public function processus_elementaire_should_be_accessible(): void
    {
        $client = static::createClient();
        
        // Authentifier un utilisateur avant d'accéder à la page
        $container = $client->getContainer();
        $entityManager = $container->get('doctrine')->getManager();
        [$client, $user] = AuthenticationHelper::authenticateUser($client, $entityManager);
        
        // Accéder à la page après authentification
        $client->request(method: Request::METHOD_GET, uri: '/pages/processus-elementaire');

        self::assertResponseIsSuccessful();
        self::assertResponseStatusCodeSame(expectedCode: Response::HTTP_OK);
    }
}
