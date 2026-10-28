<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class RoleExtension extends AbstractExtension
{
    /** @var array<string, array{label: string, color: string, text: string}> */
    private array $roleStyles = [
        'ROLE_SUPER_ADMIN' => [
            'label' => 'Super admin',
            'color' => '#43356e', // Indigo profond
            'text' => '#ffffff',
        ],
        'ROLE_SERVICE_HEAD' => [
            'label' => 'Chef de service',
            'color' => '#305080', // Bleu foncé institutionnel
            'text' => '#ffffff',
        ],
        'ROLE_ADMIN' => [
            'label' => 'Administrateur',
            'color' => '#b02a37', // Rouge foncé désaturé
            'text' => '#ffffff',
        ],
        'ROLE_MANAGER' => [
            'label' => 'Manager',
            'color' => '#5c84a8', // Bleu clair/gris
            'text' => '#ffffff',
        ],
        'ROLE_MENTOR' => [
            'label' => 'Tuteur',
            'color' => '#5e8a73', // Vert désaturé sérieux
            'text' => '#ffffff',
        ],
        'ROLE_USER' => [
            'label' => 'Utilisateur',
            'color' => '#c4c9d0', // Gris clair bleuté
            'text' => '#2c384e',
        ],
    ];

    public function getFunctions(): array
    {
        return [
            new TwigFunction(name: 'get_role_style', callable: $this->getRoleStyle(...)),
            new TwigFunction(name: 'get_highest_role', callable: $this->getHighestRole(...)),
        ];
    }

    /** @return array{label: string, color: string, text: string} */
    public function getRoleStyle(string $role): array
    {
        return $this->roleStyles[$role] ?? $this->roleStyles['ROLE_USER'];
    }

    /** @param string[] $roles */
    public function getHighestRole(array $roles): string
    {
        // Ordre de priorité des rôles (du plus élevé au plus bas)
        $priorityOrder = [
            'ROLE_SUPER_ADMIN',
            'ROLE_SERVICE_HEAD',
            'ROLE_ADMIN',
            'ROLE_MANAGER',
            'ROLE_MENTOR',
            'ROLE_USER',
        ];

        // Parcourir l'ordre de priorité et retourner le premier rôle trouvé
        foreach ($priorityOrder as $role) {
            if (in_array(needle: $role, haystack: $roles, strict: true)) {
                return $role;
            }
        }

        return 'ROLE_USER';
    }
}
