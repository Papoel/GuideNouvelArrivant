<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class RoleExtension extends AbstractExtension
{
    /**
     * @var array<string, array{label: string, color: string, text: string}>
     */
    private array $roleStyles = [
        'ROLE_ADMIN' => [
            'label' => 'Administrateur',
            'color' => '#b02a37', // Rouge foncé désaturé
            'text' => '#ffffff',
        ],
        'ROLE_SERVICE_HEAD' => [
            'label' => 'Chef de service',
            'color' => '#305080', // Bleu foncé institutionnel
            'text' => '#ffffff',
        ],
        'ROLE_SERVICE_HEAD_DELEGATE' => [
            'label' => 'Chef délégué',
            'color' => '#466aa3', // Bleu moyen désaturé
            'text' => '#ffffff',
        ],
        'ROLE_MANAGER' => [
            'label' => 'Manager',
            'color' => '#5c84a8', // Bleu clair/gris
            'text' => '#ffffff',
        ],
        'ROLE_MANAGER_DELEGATE' => [
            'label' => 'Manager délégué',
            'color' => '#aac0d1', // Bleu-gris doux
            'text' => '#1c2938',
        ],
        'ROLE_MENTOR' => [
            'label' => 'Tuteur',
            'color' => '#5e8a73', // Vert désaturé sérieux
            'text' => '#ffffff',
        ],
        'ROLE_NEWCOMER' => [
            'label' => 'Nouvel arrivant',
            'color' => '#d8c4a4', // Beige doux
            'text' => '#2c384e',
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

    /**
     * @return array{label: string, color: string, text: string}
     */
    public function getRoleStyle(string $role): array
    {
        return $this->roleStyles[$role] ?? $this->roleStyles['ROLE_USER'];
    }

    /**
     * @param string[] $roles
     */
    public function getHighestRole(array $roles): string
    {
        // Ordre de priorité des rôles (du plus élevé au plus bas)
        // Ordre spécifique demandé : l'admin n'est affiché que si l'utilisateur n'est pas chef de service ou manager
        $priorityOrder = [
            'ROLE_SERVICE_HEAD',
            'ROLE_SERVICE_HEAD_DELEGATE',
            'ROLE_MANAGER',
            'ROLE_MANAGER_DELEGATE',
            'ROLE_ADMIN',
            'ROLE_MENTOR',
            'ROLE_NEWCOMER',
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
