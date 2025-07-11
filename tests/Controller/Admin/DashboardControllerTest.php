<?php

namespace App\Tests\Controller\Admin;

use App\Controller\Admin\DashboardController;
use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Dto\LocaleDto;
use PHPUnit\Framework\Attributes\Test;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

/**
 * Tests pour le DashboardController
 * 
 * @SuppressWarnings(PHPMD.UnusedFormalParameter)
 */
class DashboardControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $entityManager;
    private UserPasswordHasherInterface $passwordHasher;
    private UserRepository $userRepository;

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->entityManager = static::getContainer()->get(id: EntityManagerInterface::class);
        $this->passwordHasher = static::getContainer()->get(id: UserPasswordHasherInterface::class);
        $this->userRepository = static::getContainer()->get(id: UserRepository::class);
    }

    /**
     * Test que la route admin redirige vers la page de connexion quand l'utilisateur n'est pas authentifié
     * 
     * Note: Ce test déclenche des dépréciations liées à LazyGhost et ProxyHelper, mais elles sont
     * ignorées car elles proviennent de composants internes de Symfony qui seront mis à jour à l'avenir.
     */
    #[Test]
    #[\PHPUnit\Framework\Attributes\IgnoreDeprecations]
    public function adminRouteRequiresAuthentication(): void
    {
        // Test simple et direct de la redirection
        $this->client->request(method: Request::METHOD_GET, uri: '/admin');
        self::assertResponseRedirects(expectedLocation: '/connexion');
    }

    #[Test] public function adminRouteRequiresAdminRole(): void
    {
        // Create a regular user
        $user = new User();
        $user->setEmail(email: 'user@example.com');
        $user->setRoles(roles: ['ROLE_USER']);
        $user->setNni(nni: 'C12345');
        $user->setPassword(password: $this->passwordHasher->hashPassword(user: $user, plainPassword: 'password123'));
        $user->setFirstname(firstname: 'John');
        $user->setLastname(lastname: 'Doe');

        $this->entityManager->persist(object: $user);
        $this->entityManager->flush();

        // Log in as this user
        $this->client->loginUser(user: $user);

        // Try to access admin route
        $this->client->request(method: Request::METHOD_GET, uri: '/admin');

        // Should be forbidden
        $this->assertResponseStatusCodeSame(expectedCode: Response::HTTP_FORBIDDEN);

        // Clean up
        $this->entityManager->remove(object: $user);
        $this->entityManager->flush();
    }

    #[Test] public function configureDashboard(): void
    {
        $controller = static::getContainer()->get(id: DashboardController::class);
        $dashboard = $controller->configureDashboard();
        $dashboardDto = $dashboard->getAsDto();

        $this->assertEquals(expected: 'EDF - Compagnonnage', actual: $dashboardDto->getTitle());

        // Test that French is the only locale and it's properly configured
        $locales = $dashboardDto->getLocales();
        $this->assertCount(expectedCount: 1, haystack: $locales);

        // Get the first locale
        $locale = array_values(array: $locales)[0];

        // Test that it's a LocaleDto object
        $this->assertInstanceOf(expected: LocaleDto::class, actual: $locale);

        // Test the name property which should contain the label
        $this->assertEquals(expected: '🇫🇷 Français', actual: $locale->getName());
    }

    #[Test] public function menuItemsForLoggedInUser(): void
    {
        // Create an admin user
        $user = new User();
        $user->setEmail(email: 'admin@example.com');
        $user->setRoles(roles: ['ROLE_ADMIN']);
        $user->setNni(nni: 'A54321');
        $user->setPassword(password: $this->passwordHasher->hashPassword(user: $user, plainPassword: 'password123'));
        $user->setFirstname(firstname: 'Admin');
        $user->setLastname(lastname: 'User');

        $this->entityManager->persist(object: $user);
        $this->entityManager->flush();

        // Log in as admin
        $this->client->loginUser(user: $user);

        $controller = static::getContainer()->get(id: DashboardController::class);
        $menuItems = iterator_to_array(iterator: $controller->configureMenuItems());

        // Test home menu item
        $this->assertNotEmpty(actual: $menuItems);
        $homeItem = $menuItems[0]->getAsDto();
        $this->assertEquals(expected: 'dashboard_index', actual: $homeItem->getRouteName());
        $this->assertEquals(expected: ['nni' => 'A54321'], actual: $homeItem->getRouteParameters());

        // Test that we have the expected number of menu sections
        $this->assertGreaterThan(minimum: 6, actual: count($menuItems), message: 'Should have at least 6 menu items');

        // Clean up
        $this->entityManager->remove(object: $user);
        $this->entityManager->flush();
    }

    #[Test] public function menuItemsForNonLoggedInUser(): void
    {
        $controller = static::getContainer()->get(id: DashboardController::class);
        $menuItems = iterator_to_array(iterator: $controller->configureMenuItems());

        // Test home menu item redirects to login
        $this->assertNotEmpty(actual: $menuItems);
        $homeItem = $menuItems[0]->getAsDto();
        $this->assertEquals(expected: 'app_login', actual: $homeItem->getRouteName());
        $this->assertEmpty(actual: $homeItem->getRouteParameters());
    }

    #[Test] public function configureAssets(): void
    {
        $controller = static::getContainer()->get(DashboardController::class);
        $assets = $controller->configureAssets();

        // Vérifie que les assets sont correctement configurés
        $this->assertInstanceOf(\EasyCorp\Bundle\EasyAdminBundle\Config\Assets::class, $assets);

        // Convertir en DTO et vérifier qu'il n'y a pas d'erreur
        $assetsDto = $assets->getAsDto();
        $this->assertNotNull($assetsDto);
    }

    #[Test]
    public function indexRedirectsToUserCrudController(): void
    {
        // Désactiver temporairement les avertissements de dépréciation
        $oldErrorHandler = set_error_handler(function() { return false; });

        try {
            // Votre code de test existant...
            // Créer un utilisateur admin
            $admin = new User();
            $admin->setEmail(email: 'admin.test@example.com');
            $admin->setRoles(roles: ['ROLE_ADMIN']);
            $admin->setNni(nni: 'A99999');
            $admin->setPassword(password: $this->passwordHasher->hashPassword(user: $admin, plainPassword: 'password123'));
            $admin->setFirstname(firstname: 'Admin');
            $admin->setLastname(lastname: 'Test');

            $this->entityManager->persist(object: $admin);
            $this->entityManager->flush();

            // Se connecter en tant qu'admin
            $this->client->loginUser(user: $admin);

            // Faire la requête vers /admin
            $this->client->request(method: Request::METHOD_GET, uri: '/admin');

            // Vérifier que la redirection a lieu
            self::assertResponseRedirects();

            // Vérifier que l'URL de redirection contient le bon chemin
            self::assertStringContainsString('/admin/user', $this->client->getResponse()->headers->get('Location'));

            // Nettoyer la base de données
            $this->entityManager->clear(); // Détache toutes les entités
            $admin = $this->userRepository->findOneBy(['email' => 'admin.test@example.com']);
            if ($admin) {
                $this->entityManager->remove($admin);
                $this->entityManager->flush();
            }
        } finally {
            // Restaurer le gestionnaire d'erreurs original
            restore_error_handler();
        }
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        // Ensure we clean up any remaining test users
        $this->entityManager->createQuery(dql: 'DELETE FROM App\Entity\User u WHERE u.email IN (:emails)')
            ->setParameter(key: 'emails', value: ['user@example.com', 'admin@example.com', 'admin.test@example.com'])
            ->execute();
    }
}
