<?php

declare(strict_types=1);

namespace App\Tests\Repository;

use App\Entity\ResetPasswordRequest;
use App\Entity\User;
use App\Repository\ResetPasswordRequestRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use SymfonyCasts\Bundle\ResetPassword\Model\ResetPasswordRequestInterface;

class ResetPasswordRequestRepositoryTest extends KernelTestCase
{
    private ?EntityManagerInterface $entityManager = null;
    private ?ResetPasswordRequestRepository $repository = null;
    
    protected function setUp(): void
    {
        self::bootKernel();
        $this->entityManager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->entityManager->getRepository(ResetPasswordRequest::class);
    }
    
    protected function tearDown(): void
    {
        parent::tearDown();
        
        // Fermer l'EntityManager pour éviter les fuites de mémoire
        if ($this->entityManager) {
            $this->entityManager->close();
            $this->entityManager = null;
        }
        
        $this->repository = null;
    }
    
    public function testRepositoryInstance(): void
    {
        $this->assertInstanceOf(ResetPasswordRequestRepository::class, $this->repository);
    }
    
    public function testCreateResetPasswordRequest(): void
    {
        // Créer un mock de User
        $user = $this->createMock(User::class);
        $expiresAt = new \DateTimeImmutable('+1 hour');
        $selector = 'test_selector';
        $hashedToken = 'test_hashed_token';
        
        // Appeler la méthode createResetPasswordRequest
        $resetRequest = $this->repository->createResetPasswordRequest($user, $expiresAt, $selector, $hashedToken);
        
        // Vérifier que l'objet retourné est du bon type
        $this->assertInstanceOf(ResetPasswordRequestInterface::class, $resetRequest);
        $this->assertInstanceOf(ResetPasswordRequest::class, $resetRequest);
        
        // Vérifier que les propriétés sont correctement définies
        $this->assertSame($user, $resetRequest->getUser());
        $this->assertSame($expiresAt, $resetRequest->getExpiresAt());
    }
    
    public function testFindAll(): void
    {
        // Vérifier que findAll() retourne un tableau
        $requests = $this->repository->findAll();
        $this->assertIsArray($requests);
    }
}
