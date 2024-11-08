<?php

namespace App\Tests\Controller\App;

use PHPUnit\Framework\Attributes\Test;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;

class HomeControllerTest extends WebTestCase
{
    // Methode à effacer après avoir supprimé le Controller
    #[Test] public function index(): void
    {
        $client = static::createClient();

        $method = Request::METHOD_GET;
        $uri = '/';
        $client->request(method: $method, uri: $uri);

        self::assertResponseIsSuccessful();
        self::assertSelectorTextContains(selector: 'h1', text: 'Pricing');
    }
}
