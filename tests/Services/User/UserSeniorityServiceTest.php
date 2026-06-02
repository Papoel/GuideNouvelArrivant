<?php

declare(strict_types=1);

namespace App\Tests\Services\User;

use App\Services\User\UserSeniorityService;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\AllowMockObjectsWithoutExpectations;
use PHPUnit\Framework\TestCase;

#[AllowMockObjectsWithoutExpectations]

class UserSeniorityServiceTest extends TestCase
{
    private UserSeniorityService $service;

    protected function setUp(): void
    {
        // Initialisation du service pour chaque test
        $this->service = new UserSeniorityService();
    }

    /**
     * Fournit différentes dates de prise de poste et leur ancienneté attendue
     */
    public static function seniorityProvider(): array
    {
        $now = new \DateTimeImmutable('2025-05-01');
        return [
            'exact years'            => [new \DateTimeImmutable('2022-05-01'), $now, '3 années'],
            'exact months'           => [new \DateTimeImmutable('2024-12-01'), $now, '5 mois'],
            'exact days'             => [new \DateTimeImmutable('2025-04-16'), $now, '15 jours'],
            'years and months'       => [new \DateTimeImmutable('2023-02-01'), $now, '2 années 3 mois'],
            'years, months, and days' => [new \DateTimeImmutable('2024-02-21'), $now, '1 année 2 mois 10 jours'],
            'months and days'        => [new \DateTimeImmutable('2024-10-16'), $now, '6 mois 15 jours'],
        ];
    }

    #[DataProvider('seniorityProvider')]
    #[Test] public function getSeniority(\DateTimeInterface $hiringAt, \DateTimeInterface $now, string $expectedSeniority): void
    {
        $result = $this->service->getSeniority(hiringAt: $hiringAt, now: $now);
        self::assertEquals(expected: $expectedSeniority, actual: $result);
    }
}
