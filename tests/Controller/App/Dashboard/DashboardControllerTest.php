<?php

declare(strict_types=1);

namespace App\Tests\Controller\App\Dashboard;

use App\Security\MainAuthenticator;
use App\Tests\Utils\AuthenticationHelper;
use Doctrine\ORM\EntityManagerInterface;
use PHPUnit\Framework\Attributes\Test;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\Storage\MockArraySessionStorage;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class DashboardControllerTest extends WebTestCase
{
    private EntityManagerInterface $entityManager;
    private UrlGeneratorInterface $urlGenerator;
    private session $session;
    private MainAuthenticator $authenticator;

    protected function setUp(): void
    {
        $this->entityManager = $this->createMock(EntityManagerInterface::class);
        $this->urlGenerator = $this->createMock(UrlGeneratorInterface::class);
        $this->session = new Session(new MockArraySessionStorage());
        $this->authenticator = new MainAuthenticator($this->urlGenerator, $this->entityManager);
    }

    #[Test] public function loginSuccessfulWithValidCredentials(): void
    {
        $client = static::createClient();

        // Accès à la page de connexion
        $crawler = $client->request(method: Request::METHOD_GET, uri: '/connexion');

        // Soumission du formulaire avec les identifiants corrects
        $form = $crawler->selectButton(value: 'Connexion')->form([
            'email' => 'bruce.wayne@gotham.city',
            'password' => 'admin'
        ]);
        $client->submit(form: $form);

        // Vérification de la redirection vers la page dashboard/nni
        self::assertStringStartsWith(
            prefix: '/dashboard/H12345/',
            string: $client->getResponse()->headers->get(key: 'Location'));

        // Suivi de la redirection
        $client->followRedirect();

        // Vérification que la page d'accueil est bien chargée
        self::assertResponseIsSuccessful();
    }

    #[Test] public function iCanAuthenticateUser(): void
    {
        // Given
        $client = static::createClient();

        // Authentification avec utilisateur par défaut
        $user = AuthenticationHelper::authenticateUser(client: $client);

        // Assertions sur l'authentification par défaut
        self::assertNotNull(actual: $user);
    }

    #[Test] public function guideTechniquePageIsAccessible(): void
    {
        // Créez un client HTTP
        $client = static::createClient();

        // Authentification avec soumission automatique du formulaire de connexion
        AuthenticationHelper::authenticateUser($client, submitLoginForm: true);

        // Accédez à la page /guide-technique
        $client->request(method: Request::METHOD_GET, uri: '/dashboard/H12345/guide-technique');

        // Vérifiez que la page est bien accessible (code de statut HTTP 200)
        self::assertResponseIsSuccessful();

        // Vérifiez la présence du titre dans le contenu
        self::assertSelectorTextContains(selector: 'h1', text: 'Guide Technique', message: 'Le titre de la page est incorrect');

        // Vérifiez qu'un breadcrumb avec le lien vers la page d'accueil est présent
        self::assertSelectorTextContains(selector: '.breadcrumb-item a', text: 'Accueil');
    }
}
