<?php

declare(strict_types=1);


namespace App\Tests\Entity;

use App\Entity\Traits\TimestampTrait;
use DateTimeImmutable;
use DateTime;
use DateTimeZone;
use PHPUnit\Framework\TestCase;

class TimestampTraitTest extends TestCase
{
    use TimestampTrait;

    public function testAccessorsAndMutators(): void
    {
        // Test des accesseurs
        $this->assertNull(actual: $this->getCreatedAt());
        $this->assertNull(actual: $this->getUpdatedAt());

        // Test des mutateurs
        $createdAt = new DateTimeImmutable(datetime: '2023-05-01 10:00:00', timezone: new DateTimeZone(timezone: 'Europe/Paris'));
        $updatedAt = new DateTime(datetime: '2023-05-15 15:30:00', timezone: new DateTimeZone(timezone: 'Europe/Paris'));

        $this->setCreatedAt(createdAt: $createdAt);
        $this->setUpdatedAt(updatedAt: $updatedAt);

        $this->assertEquals(expected: $createdAt, actual: $this->getCreatedAt());
        $this->assertEquals(expected: $updatedAt, actual: $this->getUpdatedAt());
    }

    public function testCreatedTimestamps(): void
    {
        $this->createdTimestamps();

        $createdAt = $this->getCreatedAt();
        $this->assertInstanceOf(expected: DateTimeImmutable::class, actual: $createdAt);
        $this->assertEquals(expected: 'Europe/Paris', actual: $createdAt->getTimezone()->getName());
        $this->assertLessThanOrEqual(maximum: new DateTimeImmutable(datetime: 'now', timezone: new DateTimeZone(timezone: 'Europe/Paris')), actual: $createdAt);
    }

    public function testUpdatedTimestamps(): void
    {
        $this->updatedTimestamps();

        $updatedAt = $this->getUpdatedAt();
        $this->assertInstanceOf(expected: DateTime::class, actual: $updatedAt);
        $this->assertEquals(expected: 'Europe/Paris', actual: $updatedAt->getTimezone()->getName());
        $this->assertLessThanOrEqual(maximum: new DateTime(datetime: 'now', timezone: new DateTimeZone(timezone: 'Europe/Paris')), actual: $updatedAt);
    }

    public function testEventTriggering(): void
    {
        $entity = $this->createMock(originalClassName: get_class(object: $this));
        $entity->expects($this->once())
            ->method(constraint: 'createdTimestamps');

        $entity->expects($this->once())
            ->method(constraint: 'updatedTimestamps');

        $this->invokeMethod(object: $entity, methodName: 'createdTimestamps');
        $this->invokeMethod(object: $entity, methodName: 'updatedTimestamps');
    }

    private function invokeMethod($object, $methodName, ...$args)
    {
        $reflection = new \ReflectionClass(objectOrClass: get_class(object: $object));
        return $reflection->getMethod(name: $methodName)->invokeArgs($object, $args);
    }
}
