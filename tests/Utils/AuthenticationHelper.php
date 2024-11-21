<?php

declare(strict_types=1);

namespace App\Tests\Utils;

use App\Repository\UserRepository;
use RuntimeException;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Core\User\UserInterface;

class AuthenticationHelper
{
    /**
     * Authentifie un utilisateur dans l'application pour les tests
     *
     * @param KernelBrowser      $client       Le client de test Symfony
     * @param UserInterface|null $user         Utilisateur à authentifier (si null, un utilisateur par défaut sera créé)
     * @param string             $firewallName Nom du firewall de sécurité (défaut: 'main')
     *
     * @return UserInterface L'utilisateur authentifié
     */
    public static function authenticateUser(KernelBrowser $client, ?UserInterface $user = null, string $firewallName = 'main', bool $submitLoginForm = false
    ): UserInterface {
        /** @var UserRepository $userRepository */
        $userRepository = $client->getContainer()->get(id: UserRepository::class);

        // Si aucun utilisateur n'est fourni, récupérer un utilisateur par défaut
        if ($user === null) {
            $user = $userRepository->findOneBy(criteria: ['email' => 'bruce.wayne@gotham.city']);
            if (!$user) {
                throw new RuntimeException(message: 'Aucun utilisateur de test trouvé. Assurez-vous que les fixtures sont chargées.');
            }
        }

        // Simuler l'authentification via un token de sécurité
        $token = new UsernamePasswordToken(
            user: $user,
            firewallName: $firewallName,
            roles: $user->getRoles()
        );

        // Récupérer le service de gestion des tokens
        $tokenStorage = $client->getContainer()->get(id: 'security.token_storage');
        $tokenStorage->setToken(token: $token);

        // Si demandé, simuler la soumission du formulaire de connexion
        if ($submitLoginForm) {
            $crawler = $client->request(method: Request::METHOD_GET, uri: '/connexion');
            $form = $crawler->selectButton(value: 'Connexion')->form([
                'email' => $user->getEmail(),
                'password' => 'admin',
            ]);
            $client->submit(form: $form);
            $client->followRedirect();
        }

        return $user;
    }
}
