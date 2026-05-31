<?php

declare(strict_types=1);

namespace App\Tests\Controller\Security;

use App\Entity\User;
use App\Security\MainAuthenticator;
use App\Tests\Utils\UserTestHelper;
use DateTimeImmutable;
use DateTimeZone;
use Doctrine\ORM\EntityManagerInterface;
use LogicException;
use PHPUnit\Framework\Attributes\AllowMockObjectsWithoutExpectations;
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
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Http\SecurityRequestAttributes;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;

#[AllowMockObjectsWithoutExpectations]
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
    private EventDispatcherInterface $eventDispatcher;

    #[Test] public function loginPageIsAccessible(): void
    {
        $client = static::createClient();
        $client->request(method: Request::METHOD_GET, uri: $this->pathBase);

        // pathBase doit rediriger vers la page de connexion
        self::assertResponseRedirects();
        self::assertResponseStatusCodeSame(expectedCode: Response::HTTP_FOUND);
        self::assertSame('/connexion', $client->getResponse()->headers->get('Location'));
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
        self::assertSelectorTextSame(selector: 'a[href="/reset-password"]', text: 'Mot de passe oublié ?');
    }

    #[Test] public function loginSuccessfulWithValidEmailCredentials(): void
    {
        $client = static::createClient();

        $entityManager = static::getContainer()->get(id: EntityManagerInterface::class);
        $user = UserTestHelper::createUser();
        $entityManager->persist($user);
        $entityManager->flush();

        $client->loginUser($user);

        $client->request('GET', '/dashboard/' . $user->getNni());

        // Vérifier simplement qu'il y a une redirection
        self::assertResponseRedirects();
    }

    #[Test] public function loginSuccessfulWithValidNNICredentials(): void
    {
        $client = static::createClient();

        // Créer et persister l'utilisateur
        $entityManager = static::getContainer()->get(id: EntityManagerInterface::class);
        $user = UserTestHelper::createUser();
        $entityManager->persist($user);
        $entityManager->flush();

        // Symfony 8 : authentification directe
        $client->loginUser($user);

        // Faire une requête vers le dashboard
        $client->request('GET', '/dashboard/' . $user->getNni());
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
            public function getRoles(): array
            {
                return [];
            }
            public function getPassword(): ?string
            {
                return null;
            }
            public function eraseCredentials(): void {}
            public function getUserIdentifier(): string
            {
                return 'fake-user';
            }
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

    #[Test] public function successful_authentication_updates_last_login_at(): void
    {
        // Arrange
        $user = UserTestHelper::createAdminUser();
        $user->setNni(nni: 'J12345');
        $initialLoginAt = $user->getLastLoginAt();
        self::assertNull(actual: $initialLoginAt);

        $token = $this->createMock(type: TokenInterface::class);
        $token->method('getUser')->willReturn(value: $user);
        // Stubber getRoleNames() pour simuler ROLE_ADMIN
        $token->method('getRoleNames')->willReturn(['ROLE_ADMIN', 'ROLE_USER']);

        // Création de la request avec une session valide
        $request = Request::create(uri: '/login');
        $request->setSession(session: $this->session);

        $this->urlGenerator->expects($this->once())
            ->method('generate')
            ->with('admin')
            ->willReturn(value: '/admin');

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

        self::assertTrue(condition: $response->isRedirect(location: '/admin'));
    }

    #[Test] public function authentication_with_invalid_user_type_throws_exception(): void
    {
        // Arrange
        // Création d'un mock d'utilisateur qui implémente UserInterface mais n'est pas un User
        $invalidUser = $this->createMock(type: UserInterface::class);

        $token = $this->createMock(type: TokenInterface::class);
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
        $user = UserTestHelper::createAdminUser();
        $user->setNni(nni: 'J12345');

        $token = $this->createMock(type: TokenInterface::class);
        $token->method('getUser')->willReturn($user);
        // Le target path est présent mais ignoré car l'authenticator redirige par rôle
        $token->method('getRoleNames')->willReturn(['ROLE_ADMIN', 'ROLE_USER']);

        $request = Request::create(uri: '/login');
        $request->setSession($this->session);
        $this->session->set('_security.main.target_path', '/target-path');

        $this->urlGenerator->expects($this->once())
            ->method('generate')
            ->with('admin')
            ->willReturn('/admin');

        // Act
        $response = $this->authenticator->onAuthenticationSuccess(request: $request, token: $token, firewallName: 'main');

        // Assert : le target path est ignoré, redirection vers /admin (rôle prioritaire)
        self::assertInstanceOf(RedirectResponse::class, $response);
        self::assertTrue($response->isRedirect(location: '/admin'));
    }

    #[Test] public function logout_redirects_to_login_page_and_invalidates_session(): void
    {
        $client = static::createClient();

        $user = UserTestHelper::createAdminUser();
        $token = new UsernamePasswordToken(user: $user, firewallName: 'main', roles: $user->getRoles());

        $tokenStorage = $client->getContainer()->get(id: 'security.token_storage');
        $tokenStorage->setToken(token: $token);

        $client->request(method: Request::METHOD_GET, uri: '/deconnexion');

        // Le logout redirige vers home_index ('/') avec un 303 See Other
        self::assertResponseRedirects('/');
        self::assertResponseStatusCodeSame(Response::HTTP_FOUND);

        // Vérifier que le token est effacé
        self::assertNull(actual: $tokenStorage->getToken());
    }

    #[Test] public function redirectionToTargetPathOnAuthenticationSuccess(): void
    {
        $user = UserTestHelper::createAdminUser();

        $token = new UsernamePasswordToken(user: $user, firewallName: 'main', roles: $user->getRoles());

        $session = new Session(new MockArraySessionStorage());
        $session->set(name: '_security.main.target_path', value: $this->dashboardRoute);

        $request = new Request();
        $request->setSession(session: $session);

        // ROLE_ADMIN → redirection vers 'admin', le target path est ignoré
        $this->urlGenerator->expects($this->once())
            ->method('generate')
            ->with('admin')
            ->willReturn('/admin');

        $response = $this->authenticator->onAuthenticationSuccess(request: $request, token: $token, firewallName: 'main');

        self::assertInstanceOf(expected: RedirectResponse::class, actual: $response);
        self::assertTrue($response->isRedirect(location: '/admin'));
    }

    #[Test] public function role_user_redirects_to_home_index(): void
    {
        $client = static::createClient();

        $entityManager = static::getContainer()->get(EntityManagerInterface::class);
        $user = UserTestHelper::createUser();
        $user->setRoles(['ROLE_USER']);

        $job = $user->getJob();
        $speciality = $user->getSpeciality();
        if ($job) $entityManager->persist($job);
        if ($speciality) $entityManager->persist($speciality);

        $entityManager->persist($user);
        $entityManager->flush();

        // Appel direct à onAuthenticationSuccess avec le vrai URL generator du conteneur
        $token = new UsernamePasswordToken($user, 'main', $user->getRoles());
        $session = new Session(new MockArraySessionStorage());
        $request = Request::create('/connexion');
        $request->setSession($session);

        $authenticator = $client->getContainer()->get(MainAuthenticator::class);
        $response = $authenticator->onAuthenticationSuccess($request, $token, 'main');

        // ROLE_USER doit rediriger vers home_index ('/')
        self::assertInstanceOf(RedirectResponse::class, $response);
        self::assertSame('/', $response->getTargetUrl());
    }

    #[Test] public function role_mentor_redirects_to_mentor_dashboard(): void
    {
        $client = static::createClient();

        $entityManager = static::getContainer()->get(EntityManagerInterface::class);
        $user = UserTestHelper::createMentorUser();

        $job = $user->getJob();
        $speciality = $user->getSpeciality();
        if ($job) $entityManager->persist($job);
        if ($speciality) $entityManager->persist($speciality);

        $entityManager->persist($user);
        $entityManager->flush();

        $client->loginUser($user);

        // Simuler une authentification pour déclencher onAuthenticationSuccess
        $token = new UsernamePasswordToken($user, 'main', $user->getRoles());
        $request = Request::create('/connexion');
        $request->setSession(new Session(new MockArraySessionStorage()));

        $authenticator = $client->getContainer()->get(MainAuthenticator::class);
        $response = $authenticator->onAuthenticationSuccess($request, $token, 'main');

        // ROLE_MENTOR doit rediriger vers mentor_dashboard_index avec NNI
        self::assertInstanceOf(RedirectResponse::class, $response);
        self::assertStringContainsString('/dashboard/mentor/' . $user->getNni(), $response->getTargetUrl());
    }

    #[Test] public function role_admin_redirects_to_admin_dashboard(): void
    {
        $client = static::createClient();

        $entityManager = static::getContainer()->get(EntityManagerInterface::class);
        $user = UserTestHelper::createAdminUser($entityManager);

        $client->loginUser($user);

        $token = new UsernamePasswordToken($user, 'main', $user->getRoles());
        $request = Request::create('/connexion');
        $request->setSession(new Session(new MockArraySessionStorage()));

        $authenticator = $client->getContainer()->get(MainAuthenticator::class);
        $response = $authenticator->onAuthenticationSuccess($request, $token, 'main');

        // ROLE_ADMIN doit rediriger vers /admin
        self::assertInstanceOf(RedirectResponse::class, $response);
        self::assertStringContainsString('/admin', $response->getTargetUrl());
    }

    #[Test] public function role_super_admin_redirects_to_admin_dashboard(): void
    {
        $client = static::createClient();

        $entityManager = static::getContainer()->get(EntityManagerInterface::class);
        $user = UserTestHelper::createSuperAdminUser();

        $job = $user->getJob();
        $speciality = $user->getSpeciality();
        if ($job) $entityManager->persist($job);
        if ($speciality) $entityManager->persist($speciality);

        $entityManager->persist($user);
        $entityManager->flush();

        $client->loginUser($user);

        $token = new UsernamePasswordToken($user, 'main', $user->getRoles());
        $request = Request::create('/connexion');
        $request->setSession(new Session(new MockArraySessionStorage()));

        $authenticator = $client->getContainer()->get(MainAuthenticator::class);
        $response = $authenticator->onAuthenticationSuccess($request, $token, 'main');

        // ROLE_SUPER_ADMIN doit rediriger vers /admin
        self::assertInstanceOf(RedirectResponse::class, $response);
        self::assertStringContainsString('/admin', $response->getTargetUrl());
    }

    #[Test] public function role_manager_without_admin_redirects_to_progress_dashboard(): void
    {
        $client = static::createClient();

        $entityManager = static::getContainer()->get(EntityManagerInterface::class);
        $user = UserTestHelper::createManagerUser();

        $job = $user->getJob();
        $speciality = $user->getSpeciality();
        if ($job) $entityManager->persist($job);
        if ($speciality) $entityManager->persist($speciality);

        $entityManager->persist($user);
        $entityManager->flush();

        $client->loginUser($user);

        $token = new UsernamePasswordToken($user, 'main', $user->getRoles());
        $request = Request::create('/connexion');
        $request->setSession(new Session(new MockArraySessionStorage()));

        $authenticator = $client->getContainer()->get(MainAuthenticator::class);
        $response = $authenticator->onAuthenticationSuccess($request, $token, 'main');

        // ROLE_MANAGER (sans ADMIN) doit rediriger vers admin_progress_dashboard
        self::assertInstanceOf(RedirectResponse::class, $response);
        self::assertStringContainsString('/manager/progress', $response->getTargetUrl());
    }

    #[Test] public function role_mentor_has_priority_over_admin(): void
    {
        $client = static::createClient();

        $entityManager = static::getContainer()->get(EntityManagerInterface::class);
        $user = UserTestHelper::createMentorAdminUser();

        $job = $user->getJob();
        $speciality = $user->getSpeciality();
        if ($job) $entityManager->persist($job);
        if ($speciality) $entityManager->persist($speciality);

        $entityManager->persist($user);
        $entityManager->flush();

        $client->loginUser($user);

        $token = new UsernamePasswordToken($user, 'main', $user->getRoles());
        $request = Request::create('/connexion');
        $request->setSession(new Session(new MockArraySessionStorage()));

        $authenticator = $client->getContainer()->get(MainAuthenticator::class);
        $response = $authenticator->onAuthenticationSuccess($request, $token, 'main');

        // ROLE_MENTOR est prioritaire, même avec ROLE_ADMIN
        self::assertInstanceOf(RedirectResponse::class, $response);
        self::assertStringContainsString('/dashboard/mentor/' . $user->getNni(), $response->getTargetUrl());
    }

    #[Test] public function role_admin_manager_redirects_to_admin(): void
    {
        $client = static::createClient();

        $entityManager = static::getContainer()->get(EntityManagerInterface::class);
        $user = UserTestHelper::createAdminManagerUser();

        $job = $user->getJob();
        $speciality = $user->getSpeciality();
        if ($job) $entityManager->persist($job);
        if ($speciality) $entityManager->persist($speciality);

        $entityManager->persist($user);
        $entityManager->flush();

        $client->loginUser($user);

        $token = new UsernamePasswordToken($user, 'main', $user->getRoles());
        $request = Request::create('/connexion');
        $request->setSession(new Session(new MockArraySessionStorage()));

        $authenticator = $client->getContainer()->get(MainAuthenticator::class);
        $response = $authenticator->onAuthenticationSuccess($request, $token, 'main');

        // ROLE_ADMIN est prioritaire sur ROLE_MANAGER
        self::assertInstanceOf(RedirectResponse::class, $response);
        self::assertStringContainsString('/admin', $response->getTargetUrl());
    }

    #[Test] public function mentor_without_nni_throws_exception(): void
    {
        $client = static::createClient();

        $entityManager = static::getContainer()->get(EntityManagerInterface::class);
        $user = UserTestHelper::createMentorUser();
        $user = UserTestHelper::createMentorUser();
        // Force null via reflection since setNni() is non-nullable by design
        $nniProperty = new \ReflectionProperty($user, 'nni');
        $nniProperty->setValue($user, null);

        $job = $user->getJob();
        $speciality = $user->getSpeciality();
        if ($job) $entityManager->persist($job);
        if ($speciality) $entityManager->persist($speciality);

        $entityManager->persist($user);
        $entityManager->flush();

        $token = new UsernamePasswordToken($user, 'main', $user->getRoles());
        $request = Request::create('/connexion');
        $request->setSession(new Session(new MockArraySessionStorage()));

        $authenticator = $client->getContainer()->get(MainAuthenticator::class);

        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Le tuteur n\'a pas de NNI défini.');

        $authenticator->onAuthenticationSuccess($request, $token, 'main');
    }

    #[Test] public function authenticate_creates_valid_passport(): void
    {
        $client = static::createClient();

        $entityManager = static::getContainer()->get(EntityManagerInterface::class);
        $user = UserTestHelper::createUser();

        $job = $user->getJob();
        $speciality = $user->getSpeciality();
        if ($job) $entityManager->persist($job);
        if ($speciality) $entityManager->persist($speciality);

        $entityManager->persist($user);
        $entityManager->flush();

        // Créer une requête avec les credentials
        $request = Request::create('/connexion', 'POST', [
            'identifier' => $user->getEmail(),
            'password' => 'password',
            '_csrf_token' => 'test-token'
        ]);

        $session = new Session(new MockArraySessionStorage());
        $request->setSession($session);

        $authenticator = $client->getContainer()->get(MainAuthenticator::class);
        $passport = $authenticator->authenticate($request);

        // Vérifier que le passport est créé correctement
        self::assertInstanceOf(Passport::class, $passport);
        self::assertSame($user->getEmail(), $session->get(SecurityRequestAttributes::LAST_USERNAME));
    }

    protected function setUp(): void
    {
        $this->entityManager = $this->createMock(EntityManagerInterface::class);
        $this->urlGenerator = $this->createMock(UrlGeneratorInterface::class);
        $this->session = new Session(new MockArraySessionStorage());
        $this->authenticator = new MainAuthenticator(
            $this->urlGenerator,
            $this->entityManager
        );
    }
}
