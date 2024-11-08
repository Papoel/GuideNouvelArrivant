<?php

declare(strict_types=1);

namespace App\Tests\Controller\Security;

use App\Entity\User;
use App\Security\MainAuthenticator;
use PHPUnit\Framework\Attributes\Test;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

class SecurityControllerTest extends WebTestCase
{
    private string $pathBase = '/';
    private string $pathLogin = '/connexion';
    private string $pathLogout = '/deconnexion';
    private string $emailAdmin = 'bruce.wayne@gotham.city';
    private string $dashboardRoute = '/dashboard/H12345/';

    #[Test] public function login(): void
    {
        $client = static::createClient();
        $client->request(method: Request::METHOD_GET, uri: $this->pathBase);

        self::assertResponseIsSuccessful();
    }

    #[Test] public function logout(): void
    {
        $client = static::createClient();
        $client->request(method: 'GET', uri: $this->pathBase);

        self::assertResponseStatusCodeSame(expectedCode: Response::HTTP_OK);
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
        $form = $crawler->selectButton(value: 'Connexion')->form([
            'email' => $this->emailAdmin,
            'password' => 'admin'
        ]);

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
        $form = $crawler->selectButton(value: 'Connexion')->form([
            'email' => 'invalid@email.com',
            'password' => 'admin'
        ]);

        $client->submit(form: $form);
        $client->followRedirect(); // Suivre la redirection vers la page de connexion

        self::assertResponseIsSuccessful();
        self::assertSelectorExists(selector: 'div.alert.alert-danger');
        self::assertSelectorTextContains(selector: 'div.alert.alert-danger', text: 'Identifiants invalides');

        // Test avec email valide et mot de passe incorrect
        $crawler = $client->request(method: Request::METHOD_GET, uri: $this->pathLogin);
        $form = $crawler->selectButton(value: 'Connexion')->form([
            'email' => $this->emailAdmin,
            'password' => 'wrongpassword'
        ]);

        $client->submit(form: $form);
        $client->followRedirect(); // Suivre la redirection vers la page de connexion

        self::assertResponseIsSuccessful();
        self::assertSelectorExists(selector: 'div.alert.alert-danger');
        self::assertSelectorTextContains(selector: 'div.alert.alert-danger', text: 'Identifiants invalides');

        // Test avec email et mot de passe incorrects
        $crawler = $client->request(method: Request::METHOD_GET, uri: $this->pathLogin);
        $form = $crawler->selectButton(value: 'Connexion')->form([
            'email' => 'wrong@email.com',
            'password' => 'wrongpassword'
        ]);

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
        $form = $crawler->selectButton(value: 'Connexion')->form([
            'email' => 'bruce.wayne@gotham.city',
            'password' => 'admin'
        ]);

        $client->submit(form: $form);

        // Créer une classe utilisateur de test qui respecte UserInterface mais n'est pas une instance de User
        $fakeUser = new class implements UserInterface {
            public function getRoles(): array { return []; }
            public function getPassword(): ?string { return null; }
            public function getSalt(): ?string { return null; }
            public function getUsername(): string { return 'fakeuser'; }
            public function eraseCredentials(): void {}

            public function getUserIdentifier(): string
            {
                return 'fakeuser';
            }
        };

        // Récupérer le jeton et définir l'utilisateur comme FakeUser
        $token = $client->getContainer()->get(id: 'security.token_storage')->getToken();
        $token->setUser(user: $fakeUser);

        // Définir l'exception attendue
        $this->expectException(\LogicException::class);
        $this->expectExceptionMessage('L\'utilisateur doit être une instance de '.User::class);

        // Appeler `onAuthenticationSuccess` qui devrait lever l'exception
        $authenticator = $client->getContainer()->get(id: MainAuthenticator::class);
        $authenticator->onAuthenticationSuccess(request: new Request(), token: $token, firewallName: 'main');
    }

    #[Test] public function testRedirectionToTargetPathOnAuthenticationSuccess(): void
    {
        $client = static::createClient();

        // Créer un mock du UserProvider
        $userProviderMock = $this->createMock(originalClassName: UserProviderInterface::class);
        $userProviderMock->expects($this->any())
            ->method(constraint: 'loadUserByIdentifier')
            ->willReturn(value: new User($this->emailAdmin, 'admin'));

        // Remplacer le UserProvider par le mock dans le container
        $client->getContainer()->set(id: UserProviderInterface::class, service: $userProviderMock);

        // Définir la cible de redirection dans la session
        //$targetPath = $this->dashboardRoute;
        //$client->getContainer()->get(id: 'session')->set('_security.main.target_path', $targetPath);

        // Simuler une connexion réussie
        $crawler = $client->request(method: Request::METHOD_GET, uri: $this->pathLogin);
        $form = $crawler->selectButton(value: 'Connexion')->form([
            'email' => $this->emailAdmin,
            'password' => 'admin'
        ]);
        $client->submit($form);

        // Appeler `onAuthenticationSuccess` pour tester la redirection
        $authenticator = $client->getContainer()->get(id: MainAuthenticator::class);
        $token = $client->getContainer()->get(id: 'security.token_storage')->getToken();
        $response = $authenticator->onAuthenticationSuccess(
            request: $client->getRequest(),
            token: $token,
            firewallName: 'main'
        );

        // Vérifier la redirection
        self::assertInstanceOf(expected: RedirectResponse::class, actual: $response);
        self::assertEquals(expected: $this->dashboardRoute, actual: $response->getTargetUrl());
    }
}
