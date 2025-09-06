<?php

declare(strict_types=1);

namespace App\Tests\Entity;

use App\Entity\Speciality;
use App\Tests\Abstract\EntityTestCase;
use App\Tests\Entity\Trait\EntityIdTestTrait;

class SpecialityTest extends EntityTestCase
{

    protected function getEntity(): Speciality
    {
        return $this->getEntitySpeciality();
    }

    protected function modifyEntity(object $entity): void
    {
        if (!$entity instanceof Speciality) {
            throw new \InvalidArgumentException('Entity must be an instance of Speciality');
        }

        $entity->setName('Spécialité modifiée');
        $entity->setCode('SPE-MOD');
    }

    private function getEntitySpeciality(): Speciality
    {
        $speciality = new Speciality();
        $speciality->setName('Chaudronnerie');
        $speciality->setCode('CHA');
        return $speciality;
    }

    public function testEntitySpecialityIsValid(): void
    {
        $this->assertValidationErrorsCount($this->getEntitySpeciality(), count: 0);
    }

    public function testGetId(): void
    {
        $entity = $this->getEntitySpeciality();
        self::assertEquals(expected: null, actual: $entity->getId());
        $this->assertValidationErrorsCount($entity, count: 0);
    }

    public function testGetSetName(): void
    {
        $entity = $this->getEntitySpeciality();
        $name = 'Soudure';

        $entity->setName($name);
        self::assertEquals($name, $entity->getName());
        $this->assertValidationErrorsCount($entity, count: 0);
    }

    public function testGetSetCode(): void
    {
        $entity = $this->getEntitySpeciality();
        $code = 'SOU';

        $entity->setCode($code);
        self::assertEquals($code, $entity->getCode());
        $this->assertValidationErrorsCount($entity, count: 0);
    }
}
