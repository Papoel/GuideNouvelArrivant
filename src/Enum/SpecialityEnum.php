<?php

declare(strict_types=1);

namespace App\Enum;

enum SpecialityEnum: string
{
    case CHA = 'Chaudronnerie';
    case LEV = 'Levage';
    case MEC = 'Mécanique';
    case ROB = 'Robinetterie';

    public function getAbbreviation(): string
    {
        return match ($this) {
            self::CHA => 'CHA',
            self::LEV => 'LEV',
            self::MEC => 'MEC',
            self::ROB => 'ROB',
        };
    }
}
