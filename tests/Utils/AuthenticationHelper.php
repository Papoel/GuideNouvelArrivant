<?php

declare(strict_types=1);

namespace App\Tests\Utils;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;

class AuthenticationHelper
{
    /**
     * Authentifie un utilisateur et le redirige vers son tableau de bord.
     *
     * @param KernelBrowser $client Le client Symfony.
     * @param EntityManagerInterface $entityManager L'EntityManager pour gérer les entités.
     * @param bool $useNni Utiliser le NNI pour l'authentification (paramètre conservé pour compatibilité).
     * @return array [KernelBrowser $client, User $user] Le client connecté et l'utilisateur authentifié.
     */
    public static function authenticateUser(KernelBrowser $client, EntityManagerInterface $entityManager, bool $useNni = false): array
    {
        // Créer et persister un utilisateur
        $user = UserTestHelper::createUserAndAddLogbook($client);

        $entityManager->persist($user);
        $entityManager->flush();

        // Symfony 8 : authentification directe via loginUser()
        // Plus besoin de soumettre le formulaire manuellement
        $client->loginUser($user);

        return [$client, $user];
    }
}
