<?php

declare(strict_types=1);

namespace App\Enum;

enum JobEnum: string
{
    case TECHNICIEN = 'Technicien';
    case APPRENTI = 'Apprenti';
    case AGENT = 'Agent';
    case INGENIEUR = 'Ingénieur';
    case CHARGE_AFFAIRES = "Chargé d'affaires";
    case CHARGE_AFFAIRES_PROJET = "Chargé d'affaires projet";
    case CHARGE_SURVEILLANCE = 'Chargé de surveillance';
    case MANAGER_PREMIERE_LIGNE = 'Manager premiere ligne';
    case MANAGER_PREMIERE_LIGNE_DELEGUE = 'Manager premiere ligne délégué';

    public function getAbbreviation(): string
    {
        return match ($this) {
            self::TECHNICIEN => 'TECH',
            self::APPRENTI => 'APP',
            self::AGENT => 'AGENT',
            self::INGENIEUR => 'ING',
            self::CHARGE_AFFAIRES => 'CA',
            self::CHARGE_AFFAIRES_PROJET => 'CAP',
            self::CHARGE_SURVEILLANCE => 'CSI',
            self::MANAGER_PREMIERE_LIGNE => 'MPL',
            self::MANAGER_PREMIERE_LIGNE_DELEGUE => 'MPLD',
        };
    }

    public static function getChoices(): array
    {
        $choices = [];
        foreach (self::cases() as $case) {
            $choices[$case->value] = $case;
        }
        return $choices;
    }
}
