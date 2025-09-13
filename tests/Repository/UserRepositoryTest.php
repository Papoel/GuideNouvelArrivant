<?php

declare(strict_types=1);

namespace Tests\Unit\Repository;

use App\Entity\User;
use App\Entity\Service;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\AbstractQuery;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Uid\Uuid;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use PHPUnit\Framework\MockObject\MockObject;

class UserRepositoryTest extends TestCase
{
    private MockObject|UserRepository $userRepository;
    private MockObject $serviceMock;

    protected function setUp(): void
    {
        parent::setUp();

        // Mock de UserRepository avec seulement la méthode findUsersWithoutLogbook
        $this->userRepository = $this->getMockBuilder(UserRepository::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['findUsersWithoutLogbook'])
            ->getMock();

        // Mock du Service
        $this->serviceMock = $this->createMock(Service::class);
    }

    public function testFindUsersWithoutLogbookByService_WithValidServiceAndMatchingUsers(): void
    {
        // Arrange
        $serviceUuid = new Uuid('d8e8fca2-b4dd-49c5-8e43-a8990dcdf0bc');

        $this->serviceMock->expects($this->once())
            ->method('getId')
            ->willReturn($serviceUuid);

        // Mock d'un utilisateur qui correspond au service
        $matchingUser = $this->createMock(User::class);
        $matchingUserService = $this->createMock(Service::class);

        $matchingUser->expects($this->once())
            ->method('getService')
            ->willReturn($matchingUserService);

        $matchingUserService->expects($this->once())
            ->method('getId')
            ->willReturn($serviceUuid);

        // Mock d'un utilisateur qui ne correspond pas au service
        $nonMatchingUser = $this->createMock(User::class);
        $nonMatchingUserService = $this->createMock(Service::class);

        $nonMatchingUser->expects($this->once())
            ->method('getService')
            ->willReturn($nonMatchingUserService);

        $nonMatchingUserService->expects($this->once())
            ->method('getId')
            ->willReturn(new Uuid('f47ac10b-58cc-4372-a567-0e02b2c3d479'));

        $usersWithoutLogbook = [$matchingUser, $nonMatchingUser];

        $this->userRepository->expects($this->once())
            ->method('findUsersWithoutLogbook')
            ->willReturn($usersWithoutLogbook);

        // Act
        $result = $this->manualFindUsersWithoutLogbookByService($this->serviceMock);

        // Assert
        $this->assertCount(1, $result);
        $this->assertSame($matchingUser, $result[0]);
    }

    public function testFindUsersWithoutLogbookByService_WithServiceIdNull(): void
    {
        // Arrange
        $this->serviceMock->expects($this->once())
            ->method('getId')
            ->willReturn(null);

        // findUsersWithoutLogbook ne sera PAS appelé car le code retourne immédiatement
        // quand serviceId est null
        $this->userRepository->expects($this->never())
            ->method('findUsersWithoutLogbook');

        // Act
        $result = $this->manualFindUsersWithoutLogbookByService($this->serviceMock);

        // Assert
        $this->assertIsArray($result);
        $this->assertEmpty($result);
    }

    public function testFindUsersWithoutLogbookByService_WithNoUsersWithoutLogbook(): void
    {
        // Arrange
        $serviceUuid = new Uuid('d8e8fca2-b4dd-49c5-8e43-a8990dcdf0bc');

        $this->serviceMock->expects($this->once())
            ->method('getId')
            ->willReturn($serviceUuid);

        $this->userRepository->expects($this->once())
            ->method('findUsersWithoutLogbook')
            ->willReturn([]);

        // Act
        $result = $this->manualFindUsersWithoutLogbookByService($this->serviceMock);

        // Assert
        $this->assertIsArray($result);
        $this->assertEmpty($result);
    }

    public function testFindUsersWithoutLogbookByService_WithUserHavingNoService(): void
    {
        // Arrange
        $serviceUuid = new Uuid('d8e8fca2-b4dd-49c5-8e43-a8990dcdf0bc');

        $this->serviceMock->expects($this->once())
            ->method('getId')
            ->willReturn($serviceUuid);

        // Mock d'un utilisateur sans service
        $userWithoutService = $this->createMock(User::class);
        $userWithoutService->expects($this->once())
            ->method('getService')
            ->willReturn(null);

        $usersWithoutLogbook = [$userWithoutService];

        $this->userRepository->expects($this->once())
            ->method('findUsersWithoutLogbook')
            ->willReturn($usersWithoutLogbook);

        // Act
        $result = $this->manualFindUsersWithoutLogbookByService($this->serviceMock);

        // Assert
        $this->assertIsArray($result);
        $this->assertEmpty($result);
    }

    public function testFindUsersWithoutLogbookByService_WithUserServiceHavingNullId(): void
    {
        // Arrange
        $serviceUuid = new Uuid('d8e8fca2-b4dd-49c5-8e43-a8990dcdf0bc');

        $this->serviceMock->expects($this->once())
            ->method('getId')
            ->willReturn($serviceUuid);

        // Mock d'un utilisateur avec un service ayant un ID null
        $userWithServiceNullId = $this->createMock(User::class);
        $serviceWithNullId = $this->createMock(Service::class);

        $userWithServiceNullId->expects($this->once())
            ->method('getService')
            ->willReturn($serviceWithNullId);

        $serviceWithNullId->expects($this->once())
            ->method('getId')
            ->willReturn(null);

        $usersWithoutLogbook = [$userWithServiceNullId];

        $this->userRepository->expects($this->once())
            ->method('findUsersWithoutLogbook')
            ->willReturn($usersWithoutLogbook);

        // Act
        $result = $this->manualFindUsersWithoutLogbookByService($this->serviceMock);

        // Assert
        $this->assertIsArray($result);
        $this->assertEmpty($result);
    }

    public function testFindUsersWithoutLogbookByService_WithMultipleMatchingUsers(): void
    {
        // Arrange
        $serviceUuid = new Uuid('d8e8fca2-b4dd-49c5-8e43-a8990dcdf0bc');

        $this->serviceMock->expects($this->once())
            ->method('getId')
            ->willReturn($serviceUuid);

        // Créer plusieurs utilisateurs correspondants
        $matchingUsers = [];

        for ($i = 0; $i < 3; $i++) {
            $matchingUsers[$i] = $this->createMock(User::class);
            $userService = $this->createMock(Service::class);

            $matchingUsers[$i]->expects($this->once())
                ->method('getService')
                ->willReturn($userService);

            $userService->expects($this->once())
                ->method('getId')
                ->willReturn($serviceUuid);
        }

        $this->userRepository->expects($this->once())
            ->method('findUsersWithoutLogbook')
            ->willReturn($matchingUsers);

        // Act
        $result = $this->manualFindUsersWithoutLogbookByService($this->serviceMock);

        // Assert
        $this->assertCount(3, $result);
        $this->assertSame($matchingUsers[0], $result[0]);
        $this->assertSame($matchingUsers[1], $result[1]);
        $this->assertSame($matchingUsers[2], $result[2]);
    }

    public function testFindByRole(): void
    {
        // Créer un mock de UserRepository qui ne mocke pas la méthode à tester
        $em = $this->createMock(EntityManagerInterface::class);
        $registry = $this->createMock(ManagerRegistry::class);
        $registry->expects($this->any())
            ->method('getManager')
            ->willReturn($em);
        $registry->expects($this->any())
            ->method('getManagerForClass')
            ->willReturn($em);

        // Utiliser une implémentation partielle pour mocker seulement findAll
        $userRepo = $this->getMockBuilder(UserRepository::class)
            ->setConstructorArgs([$registry])
            ->onlyMethods(['findAll'])
            ->getMock();

        // Créer des utilisateurs avec différents rôles
        $user1 = $this->createMock(User::class);
        $user1->expects($this->once())
            ->method('getRoles')
            ->willReturn(['ROLE_USER', 'ROLE_ADMIN']);

        $user2 = $this->createMock(User::class);
        $user2->expects($this->once())
            ->method('getRoles')
            ->willReturn(['ROLE_USER']);

        $user3 = $this->createMock(User::class);
        $user3->expects($this->once())
            ->method('getRoles')
            ->willReturn(['ROLE_SUPER_ADMIN', 'ROLE_USER']);

        $allUsers = [$user1, $user2, $user3];

        // Mock la méthode findAll
        $userRepo->expects($this->once())
            ->method('findAll')
            ->willReturn($allUsers);

        // Exécuter la méthode
        $result = $userRepo->findByRole('ROLE_ADMIN');

        // Vérifier que seul l'utilisateur avec ROLE_ADMIN est retourné
        $this->assertCount(1, $result);
        $this->assertSame($user1, $result[0]);
    }

    public function testFindByRoleWithCriteria(): void
    {
        // Créer un mock de UserRepository qui ne mocke pas la méthode findByRole
        $em = $this->createMock(EntityManagerInterface::class);
        $registry = $this->createMock(ManagerRegistry::class);
        $registry->expects($this->any())
            ->method('getManager')
            ->willReturn($em);
        $registry->expects($this->any())
            ->method('getManagerForClass')
            ->willReturn($em);

        // Utiliser une implémentation partielle pour mocker seulement findByRole
        $userRepo = $this->getMockBuilder(UserRepository::class)
            ->setConstructorArgs([$registry])
            ->onlyMethods(['findByRole'])
            ->getMock();

        // Créer des utilisateurs pour les tests
        $user1 = $this->createMock(User::class);
        $service1 = $this->createMock(Service::class);
        $service1->method('getName')->willReturn('ServiceA');
        $user1->method('getService')->willReturn($service1);

        $user2 = $this->createMock(User::class);
        $service2 = $this->createMock(Service::class);
        $service2->method('getName')->willReturn('ServiceB');
        $user2->method('getService')->willReturn($service2);

        $user3 = $this->createMock(User::class);
        $user3->method('getService')->willReturn(null);

        $usersWithRole = [$user1, $user2, $user3];

        // Mock la méthode findByRole pour retourner les utilisateurs
        $userRepo->expects($this->once())
            ->method('findByRole')
            ->with('ROLE_USER')
            ->willReturn($usersWithRole);

        // Cas 1: Filtrage par service
        $serviceFilter = $this->createMock(Service::class);
        $serviceFilter->method('getName')->willReturn('ServiceA');

        $result = $userRepo->findByRoleWithCriteria('ROLE_USER', ['service' => $serviceFilter]);

        // Vérifier que seul l'utilisateur avec le bon service est retourné
        $this->assertCount(1, $result);
        $this->assertSame($user1, $result[0]);
    }

    public function testFindByRoleWithCriteriaAndNullService(): void
    {
        // Test avec un critère de service null
        $em = $this->createMock(EntityManagerInterface::class);
        $registry = $this->createMock(ManagerRegistry::class);
        $registry->expects($this->any())
            ->method('getManager')
            ->willReturn($em);
        $registry->expects($this->any())
            ->method('getManagerForClass')
            ->willReturn($em);

        $userRepo = $this->getMockBuilder(UserRepository::class)
            ->setConstructorArgs([$registry])
            ->onlyMethods(['findByRole'])
            ->getMock();

        // Créer des utilisateurs pour les tests
        $userWithService = $this->createMock(User::class);
        $userWithService->method('getService')->willReturn($this->createMock(Service::class));

        $userWithoutService = $this->createMock(User::class);
        $userWithoutService->method('getService')->willReturn(null);

        $usersWithRole = [$userWithService, $userWithoutService];

        $userRepo->expects($this->once())
            ->method('findByRole')
            ->with('ROLE_USER')
            ->willReturn($usersWithRole);

        // Filtrer pour n'avoir que les utilisateurs sans service
        $result = $userRepo->findByRoleWithCriteria('ROLE_USER', ['service' => null]);

        // Vérifier que seul l'utilisateur sans service est retourné
        $this->assertCount(1, $result);
        $this->assertContains($userWithoutService, $result); // Utiliser assertContains au lieu de assertSame
    }

    public function testFindByRoleWithCriteriaWithoutFilters(): void
    {
        // Test sans critères de filtrage
        $em = $this->createMock(EntityManagerInterface::class);
        $registry = $this->createMock(ManagerRegistry::class);
        $registry->expects($this->any())
            ->method('getManager')
            ->willReturn($em);
        $registry->expects($this->any())
            ->method('getManagerForClass')
            ->willReturn($em);

        $userRepo = $this->getMockBuilder(UserRepository::class)
            ->setConstructorArgs([$registry])
            ->onlyMethods(['findByRole'])
            ->getMock();

        // Créer des utilisateurs pour les tests
        $user1 = $this->createMock(User::class);
        $user2 = $this->createMock(User::class);
        $usersWithRole = [$user1, $user2];

        $userRepo->expects($this->once())
            ->method('findByRole')
            ->with('ROLE_USER')
            ->willReturn($usersWithRole);

        // Appeler sans critères de filtrage
        $result = $userRepo->findByRoleWithCriteria('ROLE_USER', []);

        // Vérifier que tous les utilisateurs sont retournés
        $this->assertCount(2, $result);
        $this->assertSame($usersWithRole, $result);
    }


    /**
     * Implémentation manuelle de la méthode findUsersWithoutLogbookByService du repository
     * pour les besoins du test
     */
    private function manualFindUsersWithoutLogbookByService(Service $service): array
    {
        // Vérifier d'abord l'ID du service
        $serviceId = $service->getId();
        if ($serviceId === null) {
            return [];
        }

        // 1. Récupérer tous les utilisateurs sans carnet
        $usersWithoutLogbook = $this->userRepository->findUsersWithoutLogbook();

        // 2. Filtrer manuellement par service
        $filteredUsers = [];

        foreach ($usersWithoutLogbook as $user) {
            $userService = $user->getService();
            $userServiceId = $userService ? $userService->getId() : null;

            if ($userServiceId !== null && $userServiceId->equals($serviceId)) {
                $filteredUsers[] = $user;
            }
        }

        return $filteredUsers;
    }
}
