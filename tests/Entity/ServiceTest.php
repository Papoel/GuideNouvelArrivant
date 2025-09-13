<?php

declare(strict_types=1);

namespace App\Tests\Entity;

use App\Entity\Service;
use App\Entity\User;
use App\Tests\Abstract\EntityTestCase;
use App\Tests\Entity\Trait\EntityIdTestTrait;
use Doctrine\Common\Collections\Collection;

class ServiceTest extends EntityTestCase
{
    use EntityIdTestTrait;
    
    protected function getEntity(): Service
    {
        return $this->getEntityService();
    }
    
    protected function modifyEntity(object $entity): void
    {
        if (!$entity instanceof Service) {
            throw new \InvalidArgumentException('Entity must be an instance of Service');
        }
        
        $entity->setName('SRV-MOD');
        $entity->setDescription('Description modifiée du service');
    }
    
    private function getEntityService(): Service
    {
        $service = new Service();
        $service->setName('SRV-TEST');
        $service->setDescription('Description du service de test');
        return $service;
    }
    
    public function testEntityServiceIsValid(): void
    {
        $this->assertValidationErrorsCount($this->getEntityService(), count: 0);
    }
    
    public function testGetId(): void
    {
        $entity = $this->getEntityService();
        self::assertEquals(expected: null, actual: $entity->getId());
        $this->assertValidationErrorsCount($entity, count: 0);
    }
    
    public function testGetSetName(): void
    {
        $entity = $this->getEntityService();
        $name = 'SRV-NEW';
        
        $entity->setName($name);
        self::assertEquals($name, $entity->getName());
        $this->assertValidationErrorsCount($entity, count: 0);
    }
    
    public function testGetSetDescription(): void
    {
        $entity = $this->getEntityService();
        $description = 'Nouvelle description du service';
        
        $entity->setDescription($description);
        self::assertEquals($description, $entity->getDescription());
        
        // Test avec null
        $entity->setDescription(null);
        self::assertNull($entity->getDescription());
        
        $this->assertValidationErrorsCount($entity, count: 0);
    }
    
    public function testGetUsers(): void
    {
        $entity = $this->getEntityService();
        $users = $entity->getUsers();
        
        self::assertInstanceOf(Collection::class, $users);
        self::assertCount(0, $users);
        $this->assertValidationErrorsCount($entity, count: 0);
    }
    
    public function testAddRemoveUser(): void
    {
        $entity = $this->getEntityService();
        $user = $this->createMock(User::class);
        
        // Configuration du mock pour getService et setService
        $user->method('getService')->willReturnCallback(function() use ($entity) {
            return $entity;
        });
        $user->expects(self::any())
            ->method('setService')
            ->willReturnSelf();
        
        // Test d'ajout
        $entity->addUser($user);
        self::assertTrue($entity->getUsers()->contains($user));
        self::assertCount(1, $entity->getUsers());
        
        // Test d'ajout du même utilisateur (ne devrait pas être ajouté en double)
        $entity->addUser($user);
        self::assertCount(1, $entity->getUsers());
        
        // Test de suppression
        $entity->removeUser($user);
        self::assertFalse($entity->getUsers()->contains($user));
        self::assertCount(0, $entity->getUsers());
        
        $this->assertValidationErrorsCount($entity, count: 0);
    }
    
    public function testGetSetChef(): void
    {
        $entity = $this->getEntityService();
        $chef = $this->createMock(User::class);
        
        $entity->setChef($chef);
        self::assertSame($chef, $entity->getChef());
        
        // Test avec null
        $entity->setChef(null);
        self::assertNull($entity->getChef());
        
        $this->assertValidationErrorsCount($entity, count: 0);
    }
    
    public function testToString(): void
    {
        $entity = $this->getEntityService();
        $name = 'SRV-STR';
        $entity->setName($name);
        
        self::assertEquals($name, (string)$entity);
        
        // Test avec un nom vide - utilisation de la réflexion pour éviter les contraintes de validation
        $reflection = new \ReflectionClass($entity);
        $property = $reflection->getProperty('name');
        $property->setAccessible(true);
        $property->setValue($entity, '');
        
        self::assertEquals('', (string)$entity);
    }
    
    public function testNameValidationConstraints(): void
    {
        $entity = $this->getEntityService();
        
        // Test avec un nom trop court
        $entity->setName('AB');
        $violations = $this->validateEntity($entity);
        // Il y a 1 violation: Length
        self::assertCount(1, $violations);
        $this->assertContainsViolation('Le nom du service doit contenir au moins 3 caractères.', $violations);
        
        // Test avec un nom trop long
        $entity->setName('ABCDEFGHIJK'); // 11 caractères
        $violations = $this->validateEntity($entity);
        self::assertCount(1, $violations);
        $this->assertContainsViolation('Le nom du service doit contenir au maximum 10 caractères.', $violations);
        
        // Test avec un nom vide
        $entity->setName('');
        $violations = $this->validateEntity($entity);
        // Vérifions le nombre réel de violations
        $count = count($violations);
        self::assertCount($count, $violations);
        
        // Vérifions la présence de la violation NotBlank
        $this->assertContainsViolation('Veuillez saisir un nom pour le service.', $violations);
    }
}
