<?php

namespace App\Tests\Services\User;

use App\Entity\User;
use App\Repository\UserRepository;
use App\Services\User\UserValidationService;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UserValidationServiceTest extends TestCase
{
    private UserRepository $userRepository;
    private Security $security;
    private UserValidationService $service;

    protected function setUp(): void
    {
        // Initialisation des mocks et du service pour éviter la répétition de code
        $this->userRepository = $this->createMock(originalClassName: UserRepository::class);
        $this->security = $this->createMock(originalClassName: Security::class);
        $this->service = new UserValidationService(userRepository: $this->userRepository, security: $this->security);
    }

    /**
     * Créé un utilisateur avec un NNI spécifié pour les tests
     */
    private function createUser(string $nni): User
    {
        $user = new User();
        $user->setNni(nni: $nni);
        return $user;
    }

    #[Test]
    public function getUserFound(): void
    {
        // Cas où l'utilisateur est trouvé par son NNI
        $user = $this->createUser(nni: 'H12345');

        $this->userRepository->expects($this->once())
            ->method(constraint: 'findOneBy')
            ->with(['nni' => 'H12345'])
            ->willReturn(value: $user);

        self::assertEquals(expected: $user, actual: $this->service->validateUserAccess(nni: 'H12345'));
    }

    #[Test]
    public function getUserNotFound(): void
    {
        // Cas où l'utilisateur n'est pas trouvé (retourne null)
        $this->userRepository->expects($this->once())
            ->method(constraint: 'findOneBy')
            ->with(['nni' => 'A00000'])
            ->willReturn(value: null);

        $this->expectException(exception: NotFoundHttpException::class);
        $this->service->validateUserAccess(nni: 'A00000');
    }

    #[Test]
    public function getCurrentUserWithValidNni(): void
    {
        // Cas où l'utilisateur est connecté et accède avec son propre NNI
        $user = $this->createUser(nni: 'H12345');

        $this->security->expects($this->once())
            ->method(constraint: 'getUser')
            ->willReturn(value: $user);

        self::assertEquals(expected: $user, actual: $this->service->getCurrentUser(nni: 'H12345'));
    }

    #[Test]
    public function getCurrentUserWithoutAuthenticatedUser(): void
    {
        // Cas où aucun utilisateur n'est connecté (retourne null)
        $this->security->expects($this->once())
            ->method(constraint: 'getUser')
            ->willReturn(value: null);

        $this->expectException(exception: AccessDeniedHttpException::class);
        $this->expectExceptionMessage(message: 'Utilisateur non connecté.');
        $this->service->getCurrentUser(nni: 'H12345');
    }

    #[Test]
    public function getCurrentUserWithDifferentNni(): void
    {
        // Cas où l'utilisateur connecté tente d'accéder à un NNI différent du sien
        $user = $this->createUser(nni: 'H12345');

        $this->security->expects($this->once())
            ->method(constraint: 'getUser')
            ->willReturn(value: $user);

        $this->expectException(exception: AccessDeniedHttpException::class);
        $this->expectExceptionMessage(message: 'Accès aux données d\'un autre utilisateur interdit.');
        $this->service->getCurrentUser(nni: 'R34612');
    }
}
