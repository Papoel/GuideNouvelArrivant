<?php

namespace App\Tests\Controller\App;

use PHPUnit\Framework\Attributes\Test;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HomeControllerTest extends WebTestCase
{
    #[Test]
    public function homepage_should_be_redirected_to_login_page(): void
    {
        $client = static::createClient();
        $client->request(method: Request::METHOD_GET, uri: '/');

        // Vérifier que la page est redirigée vers la page de login
        self::assertResponseRedirects();
        self::assertResponseStatusCodeSame(expectedCode: Response::HTTP_FOUND);

        // Vérifier les meta tags essentiels
        self::assertSelectorExists(selector: 'meta[charset="UTF-8"]');

        // Vérifie que l’en-tête Location est bien celui attendu
        self::assertSame('/connexion', $client->getResponse()->headers->get('Location'));

        // Vérifie que la route est bien celle attendue
        // self::assertRouteSame(expectedRoute: 'app_login');
    }

    public function homepage_should_contain_required_elements(): void
    {
        $client = static::createClient();
        $crawler = $client->request(method: Request::METHOD_GET, uri: '/');

        // Vérifier le titre de la page
        self::assertSelectorTextContains(selector: 'title', text: 'EDF - GNA - Accueil');

        // Vérifier la présence de la navbar
        self::assertSelectorExists(selector: 'nav.navbar');
        self::assertSelectorExists(selector: 'a.navbar-brand');

        // Vérifier la présence des sections principales
        self::assertSelectorExists(selector: '.hero-section');
        self::assertSelectorExists(selector: '.stats-section');
        self::assertSelectorExists(selector: '#benefits');
    }

    public function homepage_should_load_required_assets(): void
    {
        $client = static::createClient();
        $crawler = $client->request(method: Request::METHOD_GET, uri: '/');

        // Vérifier les feuilles de style essentielles
        self::assertSelectorExists(selector: 'link[href*="bootstrap"]');
        self::assertSelectorExists(selector: 'link[href*="aos.css"]');
        self::assertSelectorExists(selector: 'link[href*="bootstrap-icons"]');

        // Vérifier les scripts essentiels
        self::assertSelectorExists(selector: 'script[src*="aos.js"]');
    }
}
