<?php

declare(strict_types=1);

namespace App\Tests\Enum;

use App\Enum\UserRole;
use PHPUnit\Framework\TestCase;

class UserRoleTest extends TestCase
{
    public function testAllRoleCasesExist(): void
    {
        $cases = UserRole::cases();
        
        $this->assertCount(9, $cases, 'UserRole devrait avoir 9 rôles définis');
        
        $expectedRoles = [
            'ROLE_USER',
            'ROLE_ADMIN',
            'ROLE_SUPER_ADMIN',
            'ROLE_SERVICE_HEAD',
            'ROLE_SERVICE_HEAD_DELEGATE',
            'ROLE_MANAGER',
            'ROLE_MANAGER_DELEGATE',
            'ROLE_MENTOR',
            'ROLE_NEWCOMER',
        ];
        
        $actualRoles = array_map(fn($role) => $role->value, $cases);
        
        foreach ($expectedRoles as $expectedRole) {
            $this->assertContains(
                $expectedRole,
                $actualRoles,
                sprintf('Le rôle %s devrait exister', $expectedRole)
            );
        }
    }

    public function testGetLabelReturnsCorrectFrenchLabel(): void
    {
        $this->assertSame('Utilisateur', UserRole::USER->getLabel());
        $this->assertSame('Administrateur', UserRole::ADMIN->getLabel());
        $this->assertSame('Tuteur', UserRole::MENTOR->getLabel());
        $this->assertSame('Nouvel arrivant', UserRole::NEWCOMER->getLabel());
    }

    public function testGetBadgeColorReturnsCorrectColor(): void
    {
        $this->assertSame('danger', UserRole::ADMIN->getBadgeColor());
        $this->assertSame('danger', UserRole::SUPER_ADMIN->getBadgeColor());
        $this->assertSame('primary', UserRole::SERVICE_HEAD->getBadgeColor());
        $this->assertSame('info', UserRole::MANAGER->getBadgeColor());
        $this->assertSame('success', UserRole::MENTOR->getBadgeColor());
        $this->assertSame('warning', UserRole::NEWCOMER->getBadgeColor());
        $this->assertSame('secondary', UserRole::USER->getBadgeColor());
    }

    public function testGetChoicesReturnsArrayWithLabelsAsKeys(): void
    {
        $choices = UserRole::getChoices();
        
        $this->assertIsArray($choices);
        $this->assertArrayHasKey('Utilisateur', $choices);
        $this->assertArrayHasKey('Administrateur', $choices);
        $this->assertSame('ROLE_USER', $choices['Utilisateur']);
        $this->assertSame('ROLE_ADMIN', $choices['Administrateur']);
    }

    public function testGetBadgeMappingReturnsArrayWithRoleValuesAsKeys(): void
    {
        $mapping = UserRole::getBadgeMapping();
        
        $this->assertIsArray($mapping);
        $this->assertArrayHasKey('ROLE_USER', $mapping);
        $this->assertArrayHasKey('ROLE_ADMIN', $mapping);
        $this->assertSame('secondary', $mapping['ROLE_USER']);
        $this->assertSame('danger', $mapping['ROLE_ADMIN']);
    }

    public function testIsAdminReturnsTrueForAdminRoles(): void
    {
        $this->assertTrue(UserRole::ADMIN->isAdmin());
        $this->assertTrue(UserRole::SUPER_ADMIN->isAdmin());
        $this->assertFalse(UserRole::USER->isAdmin());
        $this->assertFalse(UserRole::MENTOR->isAdmin());
        $this->assertFalse(UserRole::MANAGER->isAdmin());
    }

    public function testIsManagerReturnsTrueForManagerRoles(): void
    {
        $this->assertTrue(UserRole::SERVICE_HEAD->isManager());
        $this->assertTrue(UserRole::SERVICE_HEAD_DELEGATE->isManager());
        $this->assertTrue(UserRole::MANAGER->isManager());
        $this->assertTrue(UserRole::MANAGER_DELEGATE->isManager());
        $this->assertFalse(UserRole::USER->isManager());
        $this->assertFalse(UserRole::ADMIN->isManager());
        $this->assertFalse(UserRole::MENTOR->isManager());
    }

    public function testFromStringReturnsCorrectEnumCase(): void
    {
        $this->assertSame(UserRole::USER, UserRole::fromString('ROLE_USER'));
        $this->assertSame(UserRole::ADMIN, UserRole::fromString('ROLE_ADMIN'));
        $this->assertNull(UserRole::fromString('ROLE_INVALID'));
    }

    public function testEnumValuesMatchSymfonyRoleConvention(): void
    {
        foreach (UserRole::cases() as $role) {
            $this->assertStringStartsWith(
                'ROLE_',
                $role->value,
                sprintf('Le rôle %s devrait commencer par ROLE_', $role->value)
            );
        }
    }
}
