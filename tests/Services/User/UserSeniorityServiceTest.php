<?php

declare(strict_types=1);

namespace App\Tests\Services\User;

use App\Services\User\UserSeniorityService;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class UserSeniorityServiceTest extends TestCase
{
    private UserSeniorityService $service;

    protected function setUp(): void
    {
        // Initialisation du service pour chaque test
        $this->service = new UserSeniorityService();
    }

    /**
     * Fournit différentes dates d'embauche et leur ancienneté attendue
     */
    public static function seniorityProvider(): array
    {
        return [
            'exact years' => [new \DateTime(datetime: '-3 years'), '3 années'],
            'exact months' => [new \DateTime(datetime: '-5 months'), '5 mois'],
            'exact days' => [new \DateTime(datetime: '-15 days'), '15 jours'],
            'years and months' => [new \DateTime(datetime: '-2 years -3 months'), '2 années 3 mois'],
            'years, months, and days' => [new \DateTime(datetime: '-1 year -2 months -10 days'), '1 année 2 mois 10 jours'],
            'months and days' => [new \DateTime(datetime: '-6 months -15 days'), '6 mois 15 jours'],
        ];
    }

    #[DataProvider('seniorityProvider')]
    #[Test] public function testGetSeniority(\DateTimeInterface $hiringAt, string $expectedSeniority): void
    {
        // Vérifie que le calcul de l'ancienneté correspond à l'ancienneté attendue
        $result = $this->service->getSeniority(hiringAt: $hiringAt);
        self::assertEquals(expected: $expectedSeniority, actual: $result);
    }
}
