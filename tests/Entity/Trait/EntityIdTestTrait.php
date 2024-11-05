<?php

declare(strict_types=1);


namespace App\Tests\Entity\Trait;

use ReflectionClass;
use Symfony\Component\Uid\Uuid;

trait EntityIdTestTrait
{
    protected object $entity;

    /**
     * Cette méthode sera appelée après le setUp de la classe parente
     */
    protected function setUpIdTests(): void
    {
        if (!isset($this->entity)) {
            $this->entity = $this->getEntity();
        }
    }

    /**
     * Méthode pour définir l'ID via reflection
     */
    protected function setEntityId(object $entity, ?Uuid $uuid): void
    {
        $reflection = new ReflectionClass($entity);
        $property = $reflection->getProperty('id');
        $property->setAccessible(true);
        $property->setValue($entity, $uuid);
    }

    /**
     * Test que l'ID est null par défaut et valide
     */
    public function testInitialEntityState(): void
    {
        $this->setUpIdTests();

        // Vérifie que l'ID est null par défaut
        $this->assertNull(
            actual: $this->entity->getId(),
            message: "L'ID devrait être null par défaut"
        );

        // Vérifie que l'entité est valide sans ID
        $this->assertValidationErrorsCount($this->entity, 0);
    }

    /**
     * Test de l'UUID
     */
    public function testEntityWithUuid(): void
    {
        $this->setUpIdTests();
        $uuid = Uuid::v4();

        $this->setEntityId($this->entity, $uuid);

        $this->assertInstanceOf(
            expected: Uuid::class,
            actual: $this->entity->getId(),
            message: "getId() devrait retourner une instance de Uuid"
        );

        $this->assertEquals(
            expected: $uuid,
            actual: $this->entity->getId(),
            message: "L'UUID retourné ne correspond pas à celui défini"
        );

        $this->assertValidationErrorsCount($this->entity, 0);
    }

    /**
     * Test de la persistance de l'ID
     */
    public function testEntityIdPersistence(): void
    {
        $this->setUpIdTests();
        $uuid = Uuid::v4();

        $this->setEntityId($this->entity, $uuid);
        $initialId = $this->entity->getId();

        $this->modifyEntity($this->entity);

        $this->assertEquals(
            expected: $initialId,
            actual: $this->entity->getId(),
            message: "L'ID ne devrait pas changer après modification de l'entité"
        );

        $this->assertValidationErrorsCount($this->entity, 0);
    }

    /**
     * Méthodes abstraites à implémenter dans les classes de test
     */
    abstract protected function getEntity(): object;
    abstract protected function modifyEntity(object $entity): void;
}
