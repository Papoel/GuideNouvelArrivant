<?php

declare(strict_types=1);

namespace App\Tests\Controller\Security;

use App\Controller\Security\SecurityController;
use App\Entity\User;
use App\Security\MainAuthenticator;
use App\Tests\Utils\UserTestHelper;
use DateTimeImmutable;
use DateTimeZone;
use Doctrine\ORM\EntityManagerInterface;
use LogicException;
use PHPUnit\Framework\Attributes\Test;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\BrowserKit\Cookie;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Session\Storage\MockArraySessionStorage;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

class SecurityControllerTest extends WebTestCase
{
    public const TIMEZONE = 'Europe/Paris';
    private string $pathBase = '/';
    private string $pathLogin = '/connexion';
    private string $emailAdmin = 'bruce.wayne@gotham.city';
    private string $dashboardRoute = '/dashboard/H12345/';

    private EntityManagerInterface $entityManager;
    private UrlGeneratorInterface $urlGenerator;
    private SessionInterface $session;
    private MainAuthenticator $authenticator;

    #[Test] public function loginPageIsAccessible(): void
    {
        $client = static::createClient();
        $client->request(method: Request::METHOD_GET, uri: $this->pathBase);

        self::assertResponseIsSuccessful();
    }

    #[Test] public function loginPageIsAccessibleIfUserIsNotAuthenticated(): void
    {
        $client = static::createClient();

        // Requête vers la page de connexion
        $client->request(method: Request::METHOD_GET, uri: $this->pathLogin);

        // Vérification que la page est accessible (code 200)
        self::assertResponseIsSuccessful();

        // Vérification que nous sommes bien sur la page de login id du formulaire="loginForm"
        self::assertSelectorExists(selector: 'form#loginForm');

        // Vérification de la présence des champs du formulaire identifier et password
        self::assertSelectorExists(selector: 'input[name="identifier"]');
        self::assertSelectorExists(selector: 'input[name="password"]');

        // Vérification de la présence du bouton de soumission du formulaire nommé Connexion
        self::assertSelectorExists(selector: 'button[type="submit"]');
        self::assertSelectorTextSame(selector: 'button[type="submit"]', text: 'Se connecter');

        // Vérification de la présence du lien "Mot de passe oublié ?" pointant vers "#"
        // TODO: Création de la page de réinitialisation du mot de passe
        self::assertSelectorTextSame(selector: 'a[href="#"]', text: 'Mot de passe oublié ?');
    }

    #[Test] public function loginSuccessfulWithValidEmailCredentials(): void
    {
        $client = static::createClient();

        // Créer et persister l'utilisateur
        $entityManager = static::getContainer()->get(id: EntityManagerInterface::class);
        $user = UserTestHelper::createUser();
        $entityManager->persist($user);
        $entityManager->flush();

        // Accès à la page de connexion
        $crawler = $client->request(method: Request::METHOD_GET, uri: $this->pathLogin);

        // Soumission du formulaire avec l'email
        $form = $crawler->selectButton(value: 'Se connecter')->form([
            'identifier' => $user->getEmail(),
            'password' => 'password',
        ]);
        $client->submit($form);

        // Suivi de la redirection
        $client->followRedirect();

        // Vérifications
        self::assertResponseIsSuccessful();
        self::assertRouteSame('dashboard_index');
    }

    #[Test] public function loginSuccessfulWithValidNNICredentials(): void
    {
        $client = static::createClient();

        // Créer et persister l'utilisateur
        $entityManager = static::getContainer()->get(id: EntityManagerInterface::class);
        $user = UserTestHelper::createUser();
        $entityManager->persist($user);
        $entityManager->flush();

        // Accès à la page de connexion
        $crawler = $client->request(method: Request::METHOD_GET, uri: $this->pathLogin);

        // Soumission du formulaire avec le NNI
        $form = $crawler->selectButton(value: 'Se connecter')->form([
            'identifier' => $user->getNni(),
            'password' => 'password',
        ]);
        $client->submit($form);

        // Suivi de la redirection
        $client->followRedirect();

        // Vérifications
        self::assertResponseIsSuccessful();
        self::assertRouteSame('dashboard_index');
    }

    #[Test] public function loginFailsWithInvalidCredentials(): void
    {
        $client = static::createClient();

        // Accès à la page de connexion
        $crawler = $client->request(method: Request::METHOD_GET, uri: $this->pathLogin);

        // Soumission du formulaire avec des identifiants incorrects
        $form = $crawler->selectButton(value: 'Se connecter')->form([
            'identifier' => 'invalid@email.com',
            'password' => 'wrongpassword',
        ]);
        $client->submit($form);

        // Suivi de la redirection
        $client->followRedirect();

        // Vérifications
        self::assertResponseIsSuccessful();
        self::assertSelectorExists('div.alert.error');
        self::assertSelectorTextContains('div.alert.error', 'Identifiants invalides.');
    }

    #[Test] public function authenticationSuccessThrowsExceptionForInvalidUserType(): void
    {
        $client = static::createClient();

        // Créer et simuler une connexion
        $crawler = $client->request(method: 'GET', uri: $this->pathLogin);
        $form = $crawler->selectButton(value: 'Se connecter')->form([
            'identifier' => 'bruce.wayne@gotham.city',
            'password' => 'admin',
        ]);
        $client->submit($form);

        // Créer un fakeUser
        $fakeUser = new class implements UserInterface {
            public function getRoles(): array { return []; }
            public function getPassword(): ?string { return null; }
            public function eraseCredentials(): void {}
            public function getUserIdentifier(): string { return 'fake-user'; }
        };

        // Créer et injecter un jeton manuel
        $token = new UsernamePasswordToken(user: $fakeUser, firewallName: 'main', roles: ['ROLE_USER']);
        $client->getContainer()->get(id: 'security.token_storage')->setToken(token: $token);

        // Vérifier que l'exception est levée
        $this->expectException(exception: LogicException::class);
        $this->expectExceptionMessage(message: 'L\'utilisateur doit être une instance de ' . User::class);

        // Appeler `onAuthenticationSuccess`
        $authenticator = $client->getContainer()->get(id: MainAuthenticator::class);
        $authenticator->onAuthenticationSuccess(request: new Request(), token: $token, firewallName: 'main');
    }

    #[Test] public function testRedirectionToTargetPathOnAuthenticationSuccess(): void
    {
        $client = static::createClient();

        // Créer un utilisateur fictif
        $user = UserTestHelper::createAdminUser();

        // Créer un jeton manuel
        $token = new UsernamePasswordToken(user: $user, firewallName: 'main', roles: $user->getRoles());

        // Injecter le jeton dans le TokenStorage
        $client->getContainer()->get(id: 'security.token_storage')->setToken($token);

        // Créer une session factice pour la requête
        $session = $client->getContainer()->get(id: 'session.factory')->createSession();
        $session->set(name: '_security.main.target_path', value: $this->dashboardRoute); // Définir le chemin cible
        $session->save(); // Sauvegarder la session pour qu'elle soit utilisable

        // Simuler une requête avec la session
        $request = new Request();
        $request->setSession(session: $session); // Attacher la session à la requête

        // Appeler `onAuthenticationSuccess`
        $authenticator = $client->getContainer()->get(id: MainAuthenticator::class);
        $response = $authenticator->onAuthenticationSuccess(request: $request, token: $token, firewallName: 'main');

        // Vérifier la redirection
        self::assertInstanceOf(expected: RedirectResponse::class, actual: $response);
        self::assertEquals(expected: $this->dashboardRoute, actual: $response->getTargetUrl());
    }

    #[Test] public function successful_authentication_updates_last_login_at(): void
    {
        // Arrange
        $user = new User();
        $user->setNni(nni: 'J12345');
        $initialLoginAt = $user->getLastLoginAt();
        self::assertNull(actual: $initialLoginAt);

        $token = $this->createMock(originalClassName: TokenInterface::class);
        $token->method('getUser')->willReturn(value: $user);

        // Création de la request avec une session valide
        $request = Request::create(uri: '/login');
        $request->setSession(session: $this->session);

        $this->urlGenerator->method('generate')->with(MainAuthenticator::HOME_ROUTE, ['nni' => 'J12345'])->willReturn(value: '/dashboard/J12345');

        $this->entityManager->expects($this->once())->method(constraint: 'flush');

        // Act
        $response = $this->authenticator->onAuthenticationSuccess(request: $request, token: $token, firewallName: 'main');

        // Assert
        self::assertNotNull(actual: $user->getLastLoginAt());
        self::assertNotEquals(expected: $initialLoginAt, actual: $user->getLastLoginAt());
        self::assertInstanceOf(expected: DateTimeImmutable::class, actual: $user->getLastLoginAt());

        // Vérification avec le timezone Paris
        $now = new DateTimeImmutable(timezone: new DateTimeZone(timezone: self::TIMEZONE));
        self::assertEqualsWithDelta(expected: $now, actual: $user->getLastLoginAt(), delta: 1);

        self::assertTrue(condition: $response->isRedirect(location: '/dashboard/J12345'));
    }

    #[Test] public function authentication_with_invalid_user_type_throws_exception(): void
    {
        // Arrange
        // Création d'un mock d'utilisateur qui implémente UserInterface mais n'est pas un User
        $invalidUser = $this->createMock(originalClassName: UserInterface::class);

        $token = $this->createMock(originalClassName: TokenInterface::class);
        $token->method('getUser')->willReturn(value: $invalidUser);

        $request = Request::create(uri: '/connexion');
        $request->setSession($this->session);

        // Assert
        $this->expectException(LogicException::class);
        $this->expectExceptionMessage('L\'utilisateur doit être une instance de ' . User::class);

        // Act
        $this->authenticator->onAuthenticationSuccess(request: $request, token: $token, firewallName: 'main');
    }

    #[Test] public function successful_authentication_with_target_path_redirects_to_target(): void
    {
        // Arrange
        $user = new User();
        $user->setNni(nni: 'J12345');

        $token = $this->createMock(originalClassName: TokenInterface::class);
        $token->method('getUser')->willReturn($user);

        // Création de la request avec une session valide
        $request = Request::create(uri: '/login');
        $request->setSession($this->session);

        // Configuration du target path dans la session
        $this->session->set('_security.main.target_path', '/target-path');

        // Act
        $response = $this->authenticator->onAuthenticationSuccess(request: $request, token: $token, firewallName: 'main');

        // Assert
        self::assertTrue($response->isRedirect(location: '/target-path'));
    }

    #[Test] public function logout_redirects_to_home_and_invalidates_session(): void
    {
        $client = static::createClient();

        // Create a mock user
        $user = UserTestHelper::createAdminUser();
        // Create a manual token
        $token = new UsernamePasswordToken(user: $user, firewallName: 'main', roles: $user->getRoles());

        // Inject the token into TokenStorage
        $tokenStorage = $client->getContainer()->get(id: 'security.token_storage');
        $tokenStorage->setToken(token: $token);

        // Perform logout request
        $client->request(method: Request::METHOD_GET, uri: '/deconnexion');

        // Assert redirects to home page
        $client->followRedirect();
        self::assertResponseIsSuccessful();
        self::assertRouteSame(expectedRoute: 'home_index');

        // Verify token is cleared
        self::assertNull(actual: $tokenStorage->getToken());

        // Instead of directly checking session, verify logout behavior
        $session = $client->getRequest()->getSession();
        self::assertFalse(condition: $session->isStarted() || $session->getId() === '');
    }

    protected function setUp(): void
    {
        $this->entityManager = $this->createMock(originalClassName: EntityManagerInterface::class);
        $this->urlGenerator = $this->createMock(originalClassName: UrlGeneratorInterface::class);
        $this->session = new Session(new MockArraySessionStorage());
        $this->authenticator = new MainAuthenticator($this->urlGenerator, $this->entityManager);
    }
}
