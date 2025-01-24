<?php

namespace App\Tests\Enum;

use App\Enum\JobEnum;
use App\Enum\SpecialityEnum;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class EnumJobAndSpecialityTest extends TestCase
{
    #[Test] public function specialityEnumValues(): void
    {
        self::assertSame(expected: ['Chaudronnerie', 'Levage', 'Mécanique', 'Robinetterie', 'Soudage'], actual: array_column(SpecialityEnum::cases(), column_key: 'value'));
    }

    #[Test] public function specialityEnumAbbreviations(): void
    {
        self::assertSame(['CHA', 'LEV', 'MEC', 'ROB', 'SOU'], array_map(fn (SpecialityEnum $enum) => $enum->getAbbreviation(), SpecialityEnum::cases()));
    }

    #[Test] public function jobEnumValues(): void
    {
        self::assertSame(['Technicien', 'Ingénieur', 'Chargé d\'affaires', 'Chargé d\'affaires projet', 'Chargé de surveillance'], array_column(JobEnum::cases(), 'value'));
    }

    #[Test] public function jobEnumAbbreviations(): void
    {
        self::assertSame(['TECH', 'ING', 'CA', 'CAP', 'CSI'], array_map(fn (JobEnum $enum) => $enum->getAbbreviation(), JobEnum::cases()));
    }
}
