<?php

declare(strict_types=1);

namespace App\Tests\Controller\Security;

use App\Controller\Security\SecurityController;
use App\Entity\User;
use App\Security\MainAuthenticator;
use DateTimeImmutable;
use DateTimeZone;
use Doctrine\ORM\EntityManagerInterface;
use Flasher\Prime\FlasherInterface;
use LogicException;
use PHPUnit\Framework\Attributes\Test;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
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

    #[Test] public function login(): void
    {
        $client = static::createClient();
        $client->request(method: Request::METHOD_GET, uri: $this->pathBase);

        self::assertResponseIsSuccessful();
    }

    #[Test] public function loginAccessibleIfUserIsNotAuthenticated(): void
    {
        $client = static::createClient();

        // Requête vers la page de connexion
        $client->request(method: Request::METHOD_GET, uri: $this->pathLogin);

        // Vérification que la page est accessible (code 200)
        self::assertResponseIsSuccessful();

        // Vérification que nous sommes bien sur la page de login id du formulaire="loginForm"
        self::assertSelectorExists(selector: 'form#loginForm');

        // Vérification de la présence des champs du formulaire email et password
        self::assertSelectorExists(selector: 'input[name="email"]');
        self::assertSelectorExists(selector: 'input[name="password"]');

        // Vérification de la présence du bouton de soumission du formulaire nommé Connexion
        self::assertSelectorExists(selector: 'button[type="submit"]');
        self::assertSelectorTextSame(selector: 'button[type="submit"]', text: 'Connexion');

        // Vérification de la présence du lien "Mot de passe oublié ?" pointant vers "#"
        // TODO: Création de la page de réinitialisation du mot de passe
        self::assertSelectorTextSame(selector: 'a[href="#"]', text: 'Mot de passe oublié ?');
    }

    #[Test] public function loginSuccessfulWithValidCredentials(): void
    {
        $client = static::createClient();

        // Accès à la page de connexion
        $crawler = $client->request(method: Request::METHOD_GET, uri: $this->pathLogin);

        // Soumission du formulaire avec les identifiants corrects
        $form = $crawler->selectButton(value: 'Connexion')->form(['email' => $this->emailAdmin, 'password' => 'admin']);

        $client->submit(form: $form);

        // Vérification de la redirection vers la page dashboard/nni
        self::assertStringStartsWith(prefix: $this->dashboardRoute, string: $client->getResponse()->headers->get(key: 'Location'));

        // Suivi de la redirection
        $client->followRedirect();

        // Vérification que la page d'accueil est bien chargée
        self::assertResponseIsSuccessful();
    }

    #[Test] public function loginFailureWithInvalidCredentials(): void
    {
        $client = static::createClient();

        // Test avec email invalide et mot de passe correct
        $crawler = $client->request(method: Request::METHOD_GET, uri: $this->pathLogin);
        $form = $crawler->selectButton(value: 'Connexion')->form(['email' => 'invalid@email.com', 'password' => 'admin']);

        $client->submit(form: $form);
        $client->followRedirect(); // Suivre la redirection vers la page de connexion

        self::assertResponseIsSuccessful();
        self::assertSelectorExists(selector: 'div.alert.alert-danger');
        self::assertSelectorTextContains(selector: 'div.alert.alert-danger', text: 'Identifiants invalides');

        // Test avec email valide et mot de passe incorrect
        $crawler = $client->request(method: Request::METHOD_GET, uri: $this->pathLogin);
        $form = $crawler->selectButton(value: 'Connexion')->form(['email' => $this->emailAdmin, 'password' => 'wrongpassword']);

        $client->submit(form: $form);
        $client->followRedirect(); // Suivre la redirection vers la page de connexion

        self::assertResponseIsSuccessful();
        self::assertSelectorExists(selector: 'div.alert.alert-danger');
        self::assertSelectorTextContains(selector: 'div.alert.alert-danger', text: 'Identifiants invalides');

        // Test avec email et mot de passe incorrects
        $crawler = $client->request(method: Request::METHOD_GET, uri: $this->pathLogin);
        $form = $crawler->selectButton(value: 'Connexion')->form(['email' => 'wrong@email.com', 'password' => 'wrongpassword']);

        $client->submit(form: $form);
        $client->followRedirect(); // Suivre la redirection vers la page de connexion

        self::assertResponseIsSuccessful();
        self::assertSelectorExists(selector: 'div.alert.alert-danger');
        self::assertSelectorTextContains(selector: 'div.alert.alert-danger', text: 'Identifiants invalides');
    }

    #[Test] public function authenticationSuccessThrowsExceptionForInvalidUserType(): void
    {
        $client = static::createClient();

        // Simuler une connexion avec des identifiants valides
        $crawler = $client->request(method: Request::METHOD_GET, uri: $this->pathLogin);
        $form = $crawler->selectButton(value: 'Connexion')->form(['email' => 'bruce.wayne@gotham.city', 'password' => 'admin']);

        $client->submit(form: $form);

        // Créer une classe utilisateur de test qui respecte UserInterface mais n'est pas une instance de User
        $fakeUser = new class implements UserInterface {
            public function getRoles(): array
            {
                return [];
            }

            public function getPassword(): ?string
            {
                return null;
            }

            public function getSalt(): ?string
            {
                return null;
            }

            public function getUsername(): string
            {
                return 'fakeuser';
            }

            public function eraseCredentials(): void
            {
            }

            public function getUserIdentifier(): string
            {
                return 'fakeuser';
            }
        };

        // Récupérer le jeton et définir l'utilisateur comme FakeUser
        $token = $client->getContainer()->get(id: 'security.token_storage')->getToken();
        $token->setUser(user: $fakeUser);

        // Définir l'exception attendue
        $this->expectException(LogicException::class);
        $this->expectExceptionMessage('L\'utilisateur doit être une instance de ' . User::class);

        // Appeler `onAuthenticationSuccess` qui devrait lever l'exception
        $authenticator = $client->getContainer()->get(id: MainAuthenticator::class);
        $authenticator->onAuthenticationSuccess(request: new Request(), token: $token, firewallName: 'main');
    }

    #[Test] public function testRedirectionToTargetPathOnAuthenticationSuccess(): void
    {
        $client = static::createClient();

        // Créer un mock du UserProvider
        $userProviderMock = $this->createMock(originalClassName: UserProviderInterface::class);
        $userProviderMock->expects($this->any())->method(constraint: 'loadUserByIdentifier')->willReturn(value: new User($this->emailAdmin, 'admin'));

        // Remplacer le UserProvider par le mock dans le container
        $client->getContainer()->set(id: UserProviderInterface::class, service: $userProviderMock);

        // Simuler une connexion réussie
        $crawler = $client->request(method: Request::METHOD_GET, uri: $this->pathLogin);
        $form = $crawler->selectButton(value: 'Connexion')->form(['email' => $this->emailAdmin, 'password' => 'admin']);
        $client->submit($form);

        // Appeler `onAuthenticationSuccess` pour tester la redirection
        $authenticator = $client->getContainer()->get(id: MainAuthenticator::class);
        $token = $client->getContainer()->get(id: 'security.token_storage')->getToken();
        $response = $authenticator->onAuthenticationSuccess(request: $client->getRequest(), token: $token, firewallName: 'main');

        // Vérifier la redirection
        self::assertInstanceOf(expected: RedirectResponse::class, actual: $response);
        self::assertEquals(expected: $this->dashboardRoute, actual: $response->getTargetUrl());
    }

    public function test_successful_authentication_updates_last_login_at(): void
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

    public function test_authentication_with_invalid_user_type_throws_exception(): void
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

    public function test_successful_authentication_with_target_path_redirects_to_target(): void
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
        $this->assertTrue($response->isRedirect('/target-path'));
    }

    public function testLogoutThrowsLogicException(): void
    {
        $this->expectException(LogicException::class);
        $this->expectExceptionMessage('This method can be blank - it will be intercepted by the logout key on your firewall.');

        // Appel direct de la méthode logout
        $controller = new SecurityController();
        $controller->logout();
    }

    protected function setUp(): void
    {
        $this->entityManager = $this->createMock(originalClassName: EntityManagerInterface::class);
        $this->urlGenerator = $this->createMock(originalClassName: UrlGeneratorInterface::class);
        $this->session = new Session(new MockArraySessionStorage());
        $this->authenticator = new MainAuthenticator($this->urlGenerator, $this->entityManager);
    }


}
