<?php

declare(strict_types=1);

namespace App\Tests\Entity;

use App\Entity\Job;
use App\Tests\Abstract\EntityTestCase;
use PHPUnit\Framework\Attributes\Test;

class JobTest extends EntityTestCase
{
    protected function getEntity(): Job
    {
        return $this->getEntityJob();
    }

    protected function modifyEntity(object $entity): void
    {
        if (!$entity instanceof Job) {
            throw new \InvalidArgumentException('Entity must be an instance of Job');
        }

        $entity->setName("Nom modifié");
        $entity->setCode("CODE_MOD");
    }

    private function getEntityJob(): Job
    {
        $job = new Job();
        $job->setName('Test Job ' . uniqid());
        $job->setCode('T' . strtoupper(substr(uniqid(), -4)));
        return $job;
    }

    #[Test]
    public function entityJobIsValid(): void
    {
        $this->assertValidationErrorsCount($this->getEntityJob(), count: 0);
    }

    #[Test]
    public function getId(): void
    {
        $entity = $this->getEntityJob();
        self::assertEquals(expected: null, actual: $entity->getId());
        $this->assertValidationErrorsCount($entity, count: 0);
    }

    #[Test]
    public function setName(): void
    {
        $entity = $this->getEntityJob();
        $name = "Ingénieur";

        $entity->setName($name);
        self::assertEquals($name, $entity->getName());
        $this->assertValidationErrorsCount($entity, count: 0);
    }

    #[Test]
    public function setCode(): void
    {
        $entity = $this->getEntityJob();
        $code = "ING";

        $entity->setCode($code);
        self::assertEquals($code, $entity->getCode());
        $this->assertValidationErrorsCount($entity, count: 0);
    }

    // ========== Tests des contraintes de validation ==========

    #[Test]
    public function nameCannotBeBlank(): void
    {
        $entity = $this->getEntityJob();
        $entity->setName('');

        $this->assertValidationErrorsCount($entity, count: 2, expectedMessage: 'Erreur sur la Propriété Name => Le nom de la spécialité ne peut pas être vide.');
    }

    #[Test]
    public function nameMinLength(): void
    {
        $entity = $this->getEntityJob();
        $entity->setName('A');

        $this->assertValidationErrorsCount($entity, count: 1, expectedMessage: 'Erreur sur la Propriété Name => Le nom doit contenir au moins 2 caractères.');
    }

    #[Test]
    public function nameMaxLength(): void
    {
        $entity = $this->getEntityJob();
        $entity->setName(str_repeat('A', 81));

        $this->assertValidationErrorsCount($entity, count: 1, expectedMessage: 'Erreur sur la Propriété Name => Le nom ne peut pas dépasser 80 caractères.');
    }

    public function codeCannotBeBlank(): void
    {
        $entity = $this->getEntityJob();
        $entity->setCode('');

        $this->assertValidationErrorsCount($entity, count: 1, expectedMessage: 'Erreur sur la Propriété Code => Le code ne peut pas être vide.');
    }

    #[Test]
    public function codeMaxLength(): void
    {
        $entity = $this->getEntityJob();
        $entity->setCode('ABCDEF');

        $this->assertValidationErrorsCount($entity, count: 1, expectedMessage: 'Erreur sur la Propriété Code => Le code ne peut contenir plus de 5 caractères.');
    }

    #[Test]
    public function codeMustBeUppercaseAlphanumeric(): void
    {
        $entity = $this->getEntityJob();
        $entity->setCode('abc');

        $this->assertValidationErrorsCount($entity, count: 1, expectedMessage: 'Erreur sur la Propriété Code => Le code doit contenir uniquement des lettres majuscules et des chiffres.');
    }

    #[Test]
    public function codeWithSpecialCharactersIsInvalid(): void
    {
        $entity = $this->getEntityJob();
        $entity->setCode('AB-C');

        $this->assertValidationErrorsCount($entity, count: 1);
    }

    // ========== Tests des méthodes utilitaires ==========

    #[Test]
    public function getUniqueEntity(): void
    {
        $entity = new Job();
        $entity->setName('Technicien Test');
        $entity->setCode('TECH');

        self::assertEquals('technicien test-TECH', $entity->getUniqueEntity());
    }

    #[Test]
    public function getUniqueEntityWithNullValues(): void
    {
        $entity = new Job();

        self::assertEquals('-', $entity->getUniqueEntity());
    }

    #[Test]
    public function toStringTest(): void
    {
        $entity = $this->getEntityJob();
        $entity->setName('Ingénieur');

        self::assertEquals('Ingénieur', (string) $entity);
    }

    public function toStringWithNullName(): void
    {
        $entity = new Job();

        self::assertEquals('', (string) $entity);
    }
}
