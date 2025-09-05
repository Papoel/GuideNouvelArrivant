<?php

declare(strict_types=1);

namespace App\Enum;

enum SpecialityEnum: string
{
    case CHA = 'Chaudronnerie';
    case LEV = 'Levage';
    case MEC = 'Mécanique';
    case ROB = 'Robinetterie';
    case SOU = 'Soudage';
    case END = 'Examen Non Destructif';
    case ENC = 'Encadrement';
    case ELE = 'Electrique';

    public function getAbbreviation(): string
    {
        return match ($this) {
            self::CHA => 'CHA',
            self::LEV => 'LEV',
            self::MEC => 'MEC',
            self::ROB => 'ROB',
            self::SOU => 'SOU',
            self::END => 'END',
            self::ENC => 'ENC',
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
