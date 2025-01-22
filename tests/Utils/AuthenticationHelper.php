<?php

declare(strict_types=1);

namespace App\Tests\Utils;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Component\HttpFoundation\Request;

class AuthenticationHelper
{
    /**
     * Authentifie un utilisateur et le redirige vers son tableau de bord.
     *
     * @param KernelBrowser $client Le client Symfony.
     * @param EntityManagerInterface $entityManager L'EntityManager pour gérer les entités.
     * @return array [KernelBrowser $client, User $user] Le client connecté et l'utilisateur authentifié.
     */
    public static function authenticateUser(KernelBrowser $client, EntityManagerInterface $entityManager): array
    {
        // Créer et persister un utilisateur
        $user = UserTestHelper::createUserAndAddLogbook($client);

        $entityManager->persist($user);
        $entityManager->flush();

        // Accès à la page de connexion
        $crawler = $client->request(method: Request::METHOD_GET, uri: '/connexion');

        // Soumission du formulaire avec les identifiants de l'utilisateur
        $form = $crawler->selectButton(value: 'Se connecter')->form([
            'email' => $user->getEmail(),
            'password' => 'password',
        ]);
        $client->submit(form: $form);

        // Suivi de la redirection après connexion
        $client->followRedirect();

        return [$client, $user];
    }
}
