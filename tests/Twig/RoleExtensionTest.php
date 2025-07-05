<?php

declare(strict_types=1);

namespace App\Tests\Twig;

use App\Twig\RoleExtension;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class RoleExtensionTest extends TestCase
{
    private RoleExtension $extension;

    protected function setUp(): void
    {
        $parameterBag = $this->createMock(ParameterBagInterface::class);
        $parameterBag->method('get')
            ->with('security.role_hierarchy.roles')
            ->willReturn([]); // tu peux tester plus tard avec une vraie hiérarchie

        $this->extension = new RoleExtension($parameterBag);
    }

    #[Test]
    public function getRoleStyleReturnsExpectedStyle(): void
    {
        $style = $this->extension->getRoleStyle(role: 'ROLE_ADMIN');

        $this->assertIsArray(actual: $style);
        $this->assertSame(expected: 'Administrateur', actual: $style['label']);
        $this->assertSame(expected: '#b02a37', actual: $style['color']);
        $this->assertSame(expected: '#ffffff', actual: $style['text']);
    }

    #[Test]
    public function getRoleStyleFallbacksToUser(): void
    {
        $style = $this->extension->getRoleStyle(role: 'ROLE_UNKNOWN');

        $this->assertSame(expected: 'Utilisateur', actual: $style['label']);
    }

    #[Test]
    public function getHighestRoleReturnsExpectedPriority(): void
    {
        $roles = ['ROLE_USER', 'ROLE_MANAGER', 'ROLE_ADMIN'];
        $result = $this->extension->getHighestRole(roles: $roles);

        $this->assertSame(expected: 'ROLE_MANAGER', actual: $result);
    }

    #[Test]
    public function getHighestRoleFallbacksToUser(): void
    {
        $roles = ['ROLE_UNKNOWN'];
        $result = $this->extension->getHighestRole($roles);

        $this->assertSame(expected: 'ROLE_USER', actual: $result);
    }

    #[Test]
    public function allRolesHaveExpectedStyles(): void
    {
        $expected = [
            'ROLE_ADMIN' => ['label' => 'Administrateur', 'color' => '#b02a37', 'text' => '#ffffff'],
            'ROLE_SERVICE_HEAD' => ['label' => 'Chef de service', 'color' => '#305080', 'text' => '#ffffff'],
            'ROLE_SERVICE_HEAD_DELEGATE' => ['label' => 'Chef délégué', 'color' => '#466aa3', 'text' => '#ffffff'],
            'ROLE_MANAGER' => ['label' => 'Manager', 'color' => '#5c84a8', 'text' => '#ffffff'],
            'ROLE_MANAGER_DELEGATE' => ['label' => 'Manager délégué', 'color' => '#aac0d1', 'text' => '#1c2938'],
            'ROLE_MENTOR' => ['label' => 'Tuteur', 'color' => '#5e8a73', 'text' => '#ffffff'],
            'ROLE_NEWCOMER' => ['label' => 'Nouvel arrivant', 'color' => '#d8c4a4', 'text' => '#2c384e'],
            'ROLE_USER' => ['label' => 'Utilisateur', 'color' => '#c4c9d0', 'text' => '#2c384e'],
        ];

        foreach ($expected as $role => $values) {
            $style = $this->extension->getRoleStyle($role);

            $this->assertSame(expected: $values['label'], actual: $style['label'], message: "Label incorrect pour $role");
            $this->assertSame(expected: $values['color'], actual: $style['color'], message: "Couleur incorrecte pour $role");
            $this->assertSame(expected: $values['text'], actual: $style['text'], message: "Couleur du texte incorrecte pour $role");
        }
    }
}
