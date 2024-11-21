<?php

declare(strict_types=1);

namespace App\Tests\Utils;

use App\Entity\User;
use App\Repository\UserRepository;
use PHPUnit\Framework\Attributes\Test;
use RuntimeException;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class AuthenticationHelperTest extends WebTestCase
{
    private function createTestUser(): User
    {
        $user = new User();
        $user->setEmail('test@example.com');
        $user->setNni('CUSTOM123');
        $user->setRoles(['ROLE_USER']);

        // Configurer les autres propriétés nécessaires
        // Par exemple, définir un mot de passe de test si nécessaire
        return $user;
    }

    #[Test] public function defaultUserAuthentication(): void
    {
        $client = static::createClient();

        // Authentification avec utilisateur par défaut
        $user = AuthenticationHelper::authenticateUser(client: $client);

        // Vérifications de base
        self::assertNotNull(actual: $user);
        self::assertInstanceOf(expected: User::class, actual: $user);

        // Vérifier que le token de sécurité est correctement défini
        $tokenStorage = $client->getContainer()->get(id: 'security.token_storage');
        $token = $tokenStorage->getToken();

        self::assertNotNull(actual: $token);
        self::assertInstanceOf(expected: UsernamePasswordToken::class, actual: $token);
        self::assertSame(expected: $user->getEmail(), actual: $token->getUserIdentifier());

        // Me rendre sur la page de connexion
        $client->request(method: Request::METHOD_GET, uri: '/connexion');

        // Soumettre le formulaire de connexion
        $client->submitForm(button: 'Connexion', fieldValues: [
            'email' => $user->getEmail(),
            'password' => 'admin',
        ]);

        // Vérifier la redirection vers la page de tableau de bord
        self::assertResponseRedirects(expectedLocation: '/dashboard/' . $user->getNni() . '/');

        // suivre la redirection
        $client->followRedirect();

        self::assertResponseIsSuccessful();
    }

    #[Test] public function customUserAuthentication(): void
    {
        $client = static::createClient();

        // Créer un utilisateur de test personnalisé
        $customUser = $this->createTestUser();

        // Authentification avec l'utilisateur personnalisé
        $authenticatedUser = AuthenticationHelper::authenticateUser(
            client: $client,
            user: $customUser
        );

        // Vérifications
        self::assertSame($customUser, $authenticatedUser);

        $tokenStorage = $client->getContainer()->get('security.token_storage');
        $token = $tokenStorage->getToken();

        self::assertNotNull($token);
        self::assertInstanceOf(UsernamePasswordToken::class, $token);
        self::assertSame($customUser->getEmail(), $token->getUserIdentifier());
    }

    #[Test] public function authenticationWithLoginFormSubmission(): void
    {
        $client = static::createClient();

        // Authentification via soumission du formulaire
        $user = AuthenticationHelper::authenticateUser(
            client: $client,
            submitLoginForm: true
        );

        // Vérifications de base
        self::assertNotNull($user);
        self::assertInstanceOf(User::class, $user);

        // Vérifier le token de sécurité
        $tokenStorage = $client->getContainer()->get('security.token_storage');
        $token = $tokenStorage->getToken();

        self::assertNotNull($token);
        //self::assertInstanceOf(UsernamePasswordToken::class, $token);
        self::assertSame($user->getEmail(), $token->getUserIdentifier());

        // Vérifier l'accès à une page protégée
        $client->request('GET', '/dashboard/' . $user->getNni() . '/');
        self::assertResponseIsSuccessful();
    }

    #[Test] public function authenticationFailsWithNoDefaultUser(): void
    {
        $client = static::createClient();

        // Mock du UserRepository pour simuler l'absence d'utilisateur
        $userRepositoryMock = $this->createMock(UserRepository::class);
        $userRepositoryMock
            ->expects($this->once())
            ->method('findOneBy')
            ->willReturn(null);

        // Remplacer le repository réel par le mock
        $client->getContainer()->set(UserRepository::class, $userRepositoryMock);

        // Vérifier que l'exception est levée
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('Aucun utilisateur de test trouvé');

        // Tenter l'authentification
        AuthenticationHelper::authenticateUser(client: $client);
    }
}
