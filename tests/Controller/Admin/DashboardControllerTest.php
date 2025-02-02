<?php

namespace App\Tests\Controller\Admin;

use App\Controller\Admin\DashboardController;
use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Locale;
use EasyCorp\Bundle\EasyAdminBundle\Dto\LocaleDto;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

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

    public function testAdminRouteRequiresAuthentication(): void
    {
        $this->client->request(method: Request::METHOD_GET, uri: '/admin');

        self::assertResponseRedirects(expectedLocation: '/connexion');
    }

    public function testAdminRouteRequiresAdminRole(): void
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

    public function testConfigureDashboard(): void
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

    public function testMenuItemsForLoggedInUser(): void
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

    public function testMenuItemsForNonLoggedInUser(): void
    {
        $controller = static::getContainer()->get(id: DashboardController::class);
        $menuItems = iterator_to_array(iterator: $controller->configureMenuItems());

        // Test home menu item redirects to login
        $this->assertNotEmpty(actual: $menuItems);
        $homeItem = $menuItems[0]->getAsDto();
        $this->assertEquals(expected: 'app_login', actual: $homeItem->getRouteName());
        $this->assertEmpty(actual: $homeItem->getRouteParameters());
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        // Ensure we clean up any remaining test users
        $this->entityManager->createQuery(dql: 'DELETE FROM App\Entity\User u WHERE u.email IN (:emails)')
            ->setParameter(key: 'emails', value: ['user@example.com', 'admin@example.com'])
            ->execute();
    }
}
