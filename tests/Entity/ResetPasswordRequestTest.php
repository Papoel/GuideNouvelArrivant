<?php

declare(strict_types=1);

namespace App\Tests\Entity;

use App\Entity\ResetPasswordRequest;
use App\Entity\User;
use App\Tests\Abstract\EntityTestCase;
use DateTimeImmutable;

class ResetPasswordRequestTest extends EntityTestCase
{
    protected function getEntity(): ResetPasswordRequest
    {
        return $this->createResetPasswordRequest();
    }

    protected function modifyEntity(object $entity): void
    {
        if (!$entity instanceof ResetPasswordRequest) {
            throw new \InvalidArgumentException('Entity must be an instance of ResetPasswordRequest');
        }

        // Rien à modifier car les propriétés sont en lecture seule
        // L'entité est initialisée dans le constructeur et ne peut pas être modifiée après
    }

    private function createResetPasswordRequest(): ResetPasswordRequest
    {
        $user = $this->createMock(User::class);
        $expiresAt = new DateTimeImmutable('+1 hour');
        $selector = 'selector123';
        $hashedToken = 'hashedToken456';

        return new ResetPasswordRequest($user, $expiresAt, $selector, $hashedToken);
    }

    public function testEntityResetPasswordRequestIsValid(): void
    {
        $this->assertValidationErrorsCount($this->createResetPasswordRequest(), count: 0);
    }

    public function testGetId(): void
    {
        $entity = $this->createResetPasswordRequest();
        self::assertEquals(expected: null, actual: $entity->getId());
        $this->assertValidationErrorsCount($entity, count: 0);
    }

    public function testGetUser(): void
    {
        $user = $this->createMock(User::class);
        $expiresAt = new DateTimeImmutable('+1 hour');
        $selector = 'selector123';
        $hashedToken = 'hashedToken456';

        $entity = new ResetPasswordRequest($user, $expiresAt, $selector, $hashedToken);

        self::assertSame($user, $entity->getUser());
        $this->assertValidationErrorsCount($entity, count: 0);
    }
}
