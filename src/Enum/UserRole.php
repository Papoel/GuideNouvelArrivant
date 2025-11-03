<?php

declare(strict_types=1);

namespace App\Enum;

enum UserRole: string
{
    case USER = 'ROLE_USER';
    case ADMIN = 'ROLE_ADMIN';
    case SUPER_ADMIN = 'ROLE_SUPER_ADMIN';
    case SERVICE_HEAD = 'ROLE_SERVICE_HEAD';
    case SERVICE_HEAD_DELEGATE = 'ROLE_SERVICE_HEAD_DELEGATE';
    case MANAGER = 'ROLE_MANAGER';
    case MANAGER_DELEGATE = 'ROLE_MANAGER_DELEGATE';
    case MENTOR = 'ROLE_MENTOR';
    case NEWCOMER = 'ROLE_NEWCOMER';

    /**
     * Retourne le label français du rôle
     */
    public function getLabel(): string
    {
        return match ($this) {
            self::USER => 'Utilisateur',
            self::ADMIN => 'Administrateur',
            self::SUPER_ADMIN => 'Super Administrateur',
            self::SERVICE_HEAD => 'Chef de service',
            self::SERVICE_HEAD_DELEGATE => 'Chef de service délégué',
            self::MANAGER => 'Manager',
            self::MANAGER_DELEGATE => 'Manager délégué',
            self::MENTOR => 'Tuteur',
            self::NEWCOMER => 'Nouvel arrivant',
        };
    }

    /**
     * Retourne la couleur du badge Bootstrap pour ce rôle
     */
    public function getBadgeColor(): string
    {
        return match ($this) {
            self::ADMIN, self::SUPER_ADMIN => 'danger',
            self::SERVICE_HEAD, self::SERVICE_HEAD_DELEGATE => 'primary',
            self::MANAGER, self::MANAGER_DELEGATE => 'info',
            self::MENTOR => 'success',
            self::NEWCOMER => 'warning',
            self::USER => 'secondary',
        };
    }

    /**
     * Retourne tous les choix pour un champ de formulaire
     * Format: ['Label' => 'ROLE_VALUE']
     *
     * @return array<string, string>
     */
    public static function getChoices(): array
    {
        $choices = [];
        foreach (self::cases() as $role) {
            $choices[$role->getLabel()] = $role->value;
        }
        return $choices;
    }

    /**
     * Retourne le mapping des badges pour EasyAdmin
     * Format: ['ROLE_VALUE' => 'color']
     *
     * @return array<string, string>
     */
    public static function getBadgeMapping(): array
    {
        $mapping = [];
        foreach (self::cases() as $role) {
            $mapping[$role->value] = $role->getBadgeColor();
        }
        return $mapping;
    }

    /**
     * Vérifie si un rôle est un rôle d'administration
     */
    public function isAdmin(): bool
    {
        return match ($this) {
            self::ADMIN, self::SUPER_ADMIN => true,
            default => false,
        };
    }

    /**
     * Vérifie si un rôle est un rôle de management
     */
    public function isManager(): bool
    {
        return match ($this) {
            self::SERVICE_HEAD,
            self::SERVICE_HEAD_DELEGATE,
            self::MANAGER,
            self::MANAGER_DELEGATE => true,
            default => false,
        };
    }

    /**
     * Crée une instance depuis une chaîne (pour compatibilité)
     */
    public static function fromString(string $role): ?self
    {
        return self::tryFrom($role);
    }
}
