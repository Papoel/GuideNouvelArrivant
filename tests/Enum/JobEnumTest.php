<?php

declare(strict_types=1);

namespace App\Tests\Enum;

use App\Enum\JobEnum;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\DataProvider;

class JobEnumTest extends TestCase
{
    public function testAllCasesExist(): void
    {
        $cases = JobEnum::cases();

        self::assertCount(9, $cases);
        self::assertContains(JobEnum::TECHNICIEN, $cases);
        self::assertContains(JobEnum::APPRENTI, $cases);
        self::assertContains(JobEnum::AGENT, $cases);
        self::assertContains(JobEnum::INGENIEUR, $cases);
        self::assertContains(JobEnum::CHARGE_AFFAIRES, $cases);
        self::assertContains(JobEnum::CHARGE_AFFAIRES_PROJET, $cases);
        self::assertContains(JobEnum::CHARGE_SURVEILLANCE, $cases);
        self::assertContains(JobEnum::MANAGER_PREMIERE_LIGNE, $cases);
        self::assertContains(JobEnum::MANAGER_PREMIERE_LIGNE_DELEGUE, $cases);
    }

    #[Test]
    public function enumValues(): void
    {
        self::assertEquals('Technicien', JobEnum::TECHNICIEN->value);
        self::assertEquals('Apprenti', JobEnum::APPRENTI->value);
        self::assertEquals('Agent', JobEnum::AGENT->value);
        self::assertEquals('Ingénieur', JobEnum::INGENIEUR->value);
        self::assertEquals("Chargé d'affaires", JobEnum::CHARGE_AFFAIRES->value);
        self::assertEquals("Chargé d'affaires projet", JobEnum::CHARGE_AFFAIRES_PROJET->value);
        self::assertEquals('Chargé de surveillance', JobEnum::CHARGE_SURVEILLANCE->value);
        self::assertEquals('Manager premiere ligne', JobEnum::MANAGER_PREMIERE_LIGNE->value);
        self::assertEquals('Manager premiere ligne délégué', JobEnum::MANAGER_PREMIERE_LIGNE_DELEGUE->value);
    }

    #[DataProvider('abbreviationProvider')]
    public function getAbbreviation(JobEnum $job, string $expectedAbbreviation): void
    {
        self::assertEquals($expectedAbbreviation, $job->getAbbreviation());
    }

    /**
     * @return array<string, array{JobEnum, string}>
     */
    public static function abbreviationProvider(): array
    {
        return [
            'Technicien' => [JobEnum::TECHNICIEN, 'TECH'],
            'Apprenti' => [JobEnum::APPRENTI, 'APP'],
            'Agent' => [JobEnum::AGENT, 'AGENT'],
            'Ingénieur' => [JobEnum::INGENIEUR, 'ING'],
            'Chargé d\'affaires' => [JobEnum::CHARGE_AFFAIRES, 'CA'],
            'Chargé d\'affaires projet' => [JobEnum::CHARGE_AFFAIRES_PROJET, 'CAP'],
            'Chargé de surveillance' => [JobEnum::CHARGE_SURVEILLANCE, 'CSI'],
            'Manager premiere ligne' => [JobEnum::MANAGER_PREMIERE_LIGNE, 'MPL'],
            'Manager premiere ligne délégué' => [JobEnum::MANAGER_PREMIERE_LIGNE_DELEGUE, 'MPLD'],
        ];
    }

    #[Test]
    public function getChoicesReturnsAllCases(): void
    {
        $choices = JobEnum::getChoices();

        self::assertCount(9, $choices);
        self::assertIsArray($choices);
    }

    #[Test]
    public function getChoicesHasCorrectFormat(): void
    {
        $choices = JobEnum::getChoices();

        foreach ($choices as $label => $enum) {
            self::assertIsString($label);
            self::assertInstanceOf(JobEnum::class, $enum);
            self::assertEquals($label, $enum->value);
        }
    }

    #[Test]
    public function getChoicesContainsSpecificEntries(): void
    {
        $choices = JobEnum::getChoices();

        self::assertArrayHasKey('Technicien', $choices);
        self::assertSame(JobEnum::TECHNICIEN, $choices['Technicien']);

        self::assertArrayHasKey('Ingénieur', $choices);
        self::assertSame(JobEnum::INGENIEUR, $choices['Ingénieur']);
    }
}
