<?php

declare(strict_types=1);

namespace App\Enum;

enum JobEnum: string
{
    case TECHNICIEN = 'Technicien';
    case INGENIEUR = 'Ingénieur';
    case CHARGE_AFFAIRES = "Chargé d'affaires";
    case CHARGE_AFFAIRES_PROJET = "Chargé d'affaires projet";
    case CHARGE_SURVEILLANCE = 'CSI';

    public function getAbbreviation(): string
    {
        return match ($this) {
            self::TECHNICIEN => 'TECH',
            self::INGENIEUR => 'ING',
            self::CHARGE_AFFAIRES => 'CA',
            self::CHARGE_AFFAIRES_PROJET => 'CAP',
            self::CHARGE_SURVEILLANCE => 'CSI',
        };
    }
}
