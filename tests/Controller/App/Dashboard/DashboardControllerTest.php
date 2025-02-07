<?php

declare(strict_types=1);

namespace App\Tests\Controller\App\Dashboard;

use App\Security\MainAuthenticator;
use App\Tests\Utils\AuthenticationHelper;
use App\Tests\Utils\UserTestHelper;
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
    private Session $session;
    private MainAuthenticator $authenticator;

    protected function setUp(): void
    {
        $this->entityManager = $this->createMock(EntityManagerInterface::class);
        $this->urlGenerator = $this->createMock(UrlGeneratorInterface::class);
        $this->session = new Session(new MockArraySessionStorage());
        $this->authenticator = new MainAuthenticator($this->urlGenerator, $this->entityManager);
    }

    #[Test] public function testUserIsRedirectedToDashboardAfterLogin(): void
    {
        $client = static::createClient();
        $entityManager = static::getContainer()->get(id: EntityManagerInterface::class);

        // Utilisation de la méthode authenticateUser
        [$client, $user] = AuthenticationHelper::authenticateUser($client, $entityManager);

        // Vérifications après authentification
        self::assertResponseIsSuccessful();

        // Vérifier que l'utilisateur est redirigé vers la page de tableau de bord
        $uri = $client->getRequest()->getRequestUri();

        // route = /dashboard/{nni}/module/{moduleId}/carnet/{logbookId}/edit
        $nni = $user->getNni();


        $redirectedTo = '/dashboard/' . $nni;
        self::assertStringStartsWith($redirectedTo, $uri);
    }

    #[Test] public function testUserIsRedirectedToDashboardAfterLoginWithEmail(): void
    {
        $client = static::createClient();
        $entityManager = static::getContainer()->get(id: EntityManagerInterface::class);

        // Utilisation de la méthode authenticateUser avec email
        [$client, $user] = AuthenticationHelper::authenticateUser($client, $entityManager, false);

        // Vérifications après authentification
        self::assertResponseIsSuccessful();

        // Vérifier que l'utilisateur est redirigé vers la page de tableau de bord
        $uri = $client->getRequest()->getRequestUri();
        $redirectedTo = '/dashboard/' . $user->getNni();
        self::assertStringStartsWith($redirectedTo, $uri);
    }

    #[Test] public function testUserIsRedirectedToDashboardAfterLoginWithNNI(): void
    {
        $client = static::createClient();
        $entityManager = static::getContainer()->get(id: EntityManagerInterface::class);

        // Utilisation de la méthode authenticateUser avec NNI
        [$client, $user] = AuthenticationHelper::authenticateUser($client, $entityManager, true);

        // Vérifications après authentification
        self::assertResponseIsSuccessful();

        // Vérifier que l'utilisateur est redirigé vers la page de tableau de bord
        $uri = $client->getRequest()->getRequestUri();
        $redirectedTo = '/dashboard/' . $user->getNni();
        self::assertStringStartsWith($redirectedTo, $uri);
    }

    #[Test] public function iCanAuthenticateUser(): void
    {
        $client = static::createClient();
        $entityManager = static::getContainer()->get(id: EntityManagerInterface::class);

        // Utilisation de la méthode authenticateUser
        [$client, $user] = AuthenticationHelper::authenticateUser($client, $entityManager);

        // Assertions sur l'authentification par défaut
        self::assertNotNull(actual: $user);
    }

    #[Test] public function iCanAuthenticateUserWithEmail(): void
    {
        $client = static::createClient();
        $entityManager = static::getContainer()->get(id: EntityManagerInterface::class);

        // Test avec email
        [$client, $user] = AuthenticationHelper::authenticateUser($client, $entityManager, false);
        self::assertNotNull($user);
        self::assertResponseIsSuccessful();
    }

    #[Test] public function iCanAuthenticateUserWithNNI(): void
    {
        $client = static::createClient();
        $entityManager = static::getContainer()->get(id: EntityManagerInterface::class);

        // Test avec NNI
        [$client, $user] = AuthenticationHelper::authenticateUser($client, $entityManager, true);
        self::assertNotNull($user);
        self::assertResponseIsSuccessful();
    }

    #[Test] public function guideTechniquePageIsAccessible(): void
    {
        $client = static::createClient();
        $entityManager = static::getContainer()->get(id: EntityManagerInterface::class);

        // Utilisation de la méthode authenticateUser
        [$client, $user] = AuthenticationHelper::authenticateUser($client, $entityManager);

        // Accédez à la page /guide-technique
        $client->request(method: Request::METHOD_GET, uri: '/dashboard/' . $user->getNni() . '/guide-technique');

        // Vérifiez que la page est bien accessible (code de statut HTTP 200)
        self::assertResponseIsSuccessful();

        // Vérifiez la présence du titre dans le contenu
        self::assertSelectorTextContains(selector: 'h1', text: 'Guide Technique', message: 'Le titre de la page est incorrect');

        // Vérifiez qu'un breadcrumb avec le lien vers la page d'accueil est présent
        self::assertSelectorTextContains(selector: '.breadcrumb-item a', text: 'Accueil');
    }

    #[Test] public function guideTechniquePageIsAccessibleAfterLoginWithEmail(): void
    {
        $client = static::createClient();
        $entityManager = static::getContainer()->get(id: EntityManagerInterface::class);

        // Test avec email
        [$client, $user] = AuthenticationHelper::authenticateUser($client, $entityManager, false);
        $client->request(Request::METHOD_GET, '/dashboard/' . $user->getNni() . '/guide-technique');
        self::assertResponseIsSuccessful();
        self::assertSelectorTextContains('h1', 'Guide Technique');
        self::assertSelectorTextContains('.breadcrumb-item a', 'Accueil');
    }

    #[Test] public function guideTechniquePageIsAccessibleAfterLoginWithNNI(): void
    {
        $client = static::createClient();
        $entityManager = static::getContainer()->get(id: EntityManagerInterface::class);

        // Test avec NNI
        [$client, $user] = AuthenticationHelper::authenticateUser($client, $entityManager, true);
        $client->request(Request::METHOD_GET, '/dashboard/' . $user->getNni() . '/guide-technique');
        self::assertResponseIsSuccessful();
        self::assertSelectorTextContains('h1', 'Guide Technique');
        self::assertSelectorTextContains('.breadcrumb-item a', 'Accueil');
    }
}
