<?php

declare(strict_types=1);

namespace App\Tests\Entity;

use App\Entity\Job;
use App\Tests\Abstract\EntityTestCase;

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
        $job->setName('Technicien');
        $job->setCode('TECH');
        return $job;
    }

    public function testEntityJobIsValid(): void
    {
        $this->assertValidationErrorsCount($this->getEntityJob(), count: 0);
    }

    public function testGetId(): void
    {
        $entity = $this->getEntityJob();
        self::assertEquals(expected: null, actual: $entity->getId());
        $this->assertValidationErrorsCount($entity, count: 0);
    }

    public function testGetSetName(): void
    {
        $entity = $this->getEntityJob();
        $name = "Ingénieur";

        $entity->setName($name);
        self::assertEquals($name, $entity->getName());
        $this->assertValidationErrorsCount($entity, count: 0);
    }

    public function testGetSetCode(): void
    {
        $entity = $this->getEntityJob();
        $code = "ING";

        $entity->setCode($code);
        self::assertEquals($code, $entity->getCode());
        $this->assertValidationErrorsCount($entity, count: 0);
    }
}
