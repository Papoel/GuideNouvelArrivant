<?php

declare(strict_types=1);

namespace App\Tests\Services\Dashboard;


use App\Entity\Action;
use App\Entity\Logbook;
use App\Entity\Module;
use App\Entity\Theme;
use App\Entity\User;
use App\Services\Dashboard\DashboardDataProviderInterface;
use App\Services\Dashboard\DashboardService;
use App\Services\Logbook\LogbookProgressService;
use App\Services\User\UserSeniorityService;
use App\Services\User\UserValidationService;
use App\Tests\Utils\UserTestHelper;
use DateTimeImmutable;
use DateTimeZone;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\AllowMockObjectsWithoutExpectations;
use PHPUnit\Framework\MockObject\MockObject;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Security\Core\Exception\UserNotFoundException;
use Symfony\Component\Uid\Uuid;

#[AllowMockObjectsWithoutExpectations]
class DashboardServiceTest extends WebTestCase
{
    private UserValidationService $userValidationService;
    private UserSeniorityService $seniorityService;
    private LogbookProgressService $logbookProgressService;
    private DashboardDataProviderInterface $dataProvider;
    private DashboardService $dashboardService;

    #[Test] public function getDashboardData(): void
    {
        // Générer un utilisateur de test avec NNI aléatoire
        $testUser = UserTestHelper::createUser();
        $nni = $testUser->getNni();

        // Configurer le mock pour valider l'accès utilisateur en utilisant le NNI généré
        $this->userValidationService
            ->expects($this->once())
            ->method(constraint: 'validateUserAccess')
            ->with($nni)
            ->willReturn($testUser);

        // Configurer le mock du dataProvider pour retourner des données vides
        $this->dataProvider
            ->expects($this->once())
            ->method('getDashboardDataForUser')
            ->with($testUser)
            ->willReturn([
                'logbooks' => [],
                'themes' => [],
                'modules' => [],
                'actions' => [],
            ]);

        // Appel du service avec le NNI généré
        $result = $this->dashboardService->getDashboardData(nni: $nni);

        // Asserts pour vérifier le contenu du résultat
        self::assertArrayHasKey(key: 'user', array: $result);
        self::assertEquals(expected: $testUser, actual: $result['user']);
    }

    #[Test] public function getDashboardDataWithValidUser(): void
    {
        // Arrange
        $user = UserTestHelper::createUser();
        $nni = $user->getNni();

        $logbook = $this->createMockLogbook();
        $theme = $this->createMockTheme();
        $module = $this->createMockModule();
        $action = $this->createMockAction($user);

        // Mocks des services
        $this->userValidationService
            ->expects($this->once())
            ->method(constraint: 'validateUserAccess')
            ->with($nni)
            ->willReturn($user);

        // Mock du dataProvider pour retourner les données complètes
        $this->dataProvider
            ->expects($this->once())
            ->method('getDashboardDataForUser')
            ->with($user)
            ->willReturn([
                'logbooks' => [$logbook],
                'themes' => [$theme],
                'modules' => [$module],
                'actions' => [$action],
            ]);

        $this->logbookProgressService
            ->expects($this->once())
            ->method(constraint: 'calculateLogbookProgress')
            ->willReturn(['progress' => 50]);

        $this->seniorityService
            ->expects($this->once())
            ->method(constraint: 'getSeniority')
            ->willReturn(value: '5 ans');

        // Act
        $result = $this->dashboardService->getDashboardData(nni: $nni);

        // Assert
        self::assertArrayHasKey(key: 'user', array: $result);
        self::assertArrayHasKey(key: 'logbooks', array: $result);
        self::assertArrayHasKey(key: 'themes', array: $result);
        self::assertArrayHasKey(key: 'modules', array: $result);
        self::assertArrayHasKey(key: 'actions', array: $result);
        self::assertArrayHasKey(key: 'userSeniority', array: $result);
        self::assertArrayHasKey(key: 'mentorSeniority', array: $result);
        self::assertCount(expectedCount: 1, haystack: $result['logbooks']);
        self::assertCount(expectedCount: 1, haystack: $result['themes']);
        self::assertCount(expectedCount: 1, haystack: $result['modules']);
        self::assertCount(expectedCount: 1, haystack: $result['actions']);
    }

    #[Test] public function getDashboardDataWithInvalidUser(): void
    {
        // Arrange
        $nni = 'invalid';
        $this->userValidationService
            ->expects($this->once())
            ->method(constraint: 'validateUserAccess')
            ->with($nni)
            ->willThrowException(exception: new UserNotFoundException());

        // Assert
        $this->expectException(exception: UserNotFoundException::class);

        // Act
        $this->dashboardService->getDashboardData(nni: $nni);
    }

    #[Test] public function calculateLogbooksProgressWithInvalidArgument(): void
    {
        // Arrange
        $invalidLogbooks = [new \stdClass()];

        // Assert - TypeError is thrown by PHP's type system when invalid type is passed
        $this->expectException(\TypeError::class);

        // Act
        $this->invokePrivateMethod(methodName: 'calculateLogbooksProgress', parameters: [$invalidLogbooks]);
    }

    #[DataProvider('provideHiringDates')]
    #[Test] public function calculateSeniority(?\DateTimeImmutable $hiringDate, string $expectedSeniority): void
    {
        // Arrange
        if ($hiringDate !== null) {
            $this->seniorityService
                ->expects($this->once())
                ->method(constraint: 'getSeniority')
                ->with($hiringDate)
                ->willReturn(value: $expectedSeniority);
        }

        // Act
        $result = $this->invokePrivateMethod(methodName: 'calculateSeniority', parameters: [$hiringDate]);

        // Assert
        self::assertIsString(actual: $result);
        self::assertEquals(expected: $expectedSeniority, actual: $result);
    }

    #[Test] public function getSeniority(): void
    {
        $userSeniorityService = new UserSeniorityService();
        $now = new DateTimeImmutable();

        // Cas 1 : 5 années exactement
        $hiringDate1 = $now->modify('-5 years');
        $interval1 = $now->diff($hiringDate1);
        $expectedSeniority1 = $this->formatSeniorityFromInterval($interval1);
        $result1 = $userSeniorityService->getSeniority($hiringDate1);
        self::assertEquals($expectedSeniority1, $result1);

        // Cas 2 : 1 année et 3 mois
        $hiringDate2 = $now->modify('-1 year -3 months');
        $interval2 = $now->diff($hiringDate2);
        $expectedSeniority2 = $this->formatSeniorityFromInterval($interval2);
        $result2 = $userSeniorityService->getSeniority($hiringDate2);
        self::assertEquals($expectedSeniority2, $result2);

        // Cas 3 : 10 jours
        $hiringDate3 = $now->modify('-10 days');
        $interval3 = $now->diff($hiringDate3);
        $expectedSeniority3 = $this->formatSeniorityFromInterval($interval3);
        $result3 = $userSeniorityService->getSeniority($hiringDate3);
        self::assertEquals($expectedSeniority3, $result3);

        // Cas 4 : Date actuelle (premier jour)
        $hiringDate4 = $now;
        $expectedSeniority4 = 'Premier jour parmi nous !';
        $result4 = $userSeniorityService->getSeniority($hiringDate4);
        self::assertEquals($expectedSeniority4, $result4);

        // Cas 5 : 50 années
        $hiringDate5 = $now->modify('-50 years');
        $interval5 = $now->diff($hiringDate5);
        $expectedSeniority5 = $this->formatSeniorityFromInterval($interval5);
        $result5 = $userSeniorityService->getSeniority($hiringDate5);
        self::assertEquals($expectedSeniority5, $result5);

        // Cas 6 : 3 années, 4 mois et 5 jours
        $hiringDate6 = $now->modify('-3 years -4 months -5 days');
        $interval6 = $now->diff($hiringDate6);
        $expectedSeniority6 = $this->formatSeniorityFromInterval($interval6);
        $result6 = $userSeniorityService->getSeniority($hiringDate6);
        self::assertEquals($expectedSeniority6, $result6);
    }

    /**
     * Formate l'ancienneté à partir d'un DateInterval
     * Reproduit la logique de UserSeniorityService::getSeniority()
     */
    private function formatSeniorityFromInterval(\DateInterval $interval): string
    {
        $years = $interval->y;
        $months = $interval->m;
        $days = $interval->d;

        $seniority = '';

        // Ajouter les années si elles existent
        if ($years > 0) {
            $seniority .= $years . ' année' . ($years > 1 ? 's' : '') . ' ';
        }

        // Ajouter les mois seulement s'il y a des années ou si les mois ne sont pas nuls
        if ($months > 0 || (0 === $years && 0 === $months && 0 === $days)) {
            $seniority .= $months . ' mois ';
        }

        // Ajouter les jours si c'est la seule information, ou s'ils sont non nuls
        if ($days > 0 || (0 === $years && 0 === $months)) {
            $seniority .= $days . ' jour' . ($days > 1 ? 's' : '') . ' ';
        }

        // Retirer l'espace en fin de chaîne
        return trim($seniority) ?: 'Premier jour parmi nous !';
    }

    protected function setUp(): void
    {
        $this->userValidationService = $this->createMock(type: UserValidationService::class);
        $this->seniorityService = $this->createMock(type: UserSeniorityService::class);
        $this->logbookProgressService = $this->createMock(type: LogbookProgressService::class);
        $this->dataProvider = $this->createMock(type: DashboardDataProviderInterface::class);

        $this->dashboardService = new DashboardService(
            $this->userValidationService,
            $this->seniorityService,
            $this->logbookProgressService,
            $this->dataProvider,
        );
    }

    public static function provideSizes(): array
    {
        return [
            'empty' => [0],
            'one element' => [1],
            'multiple elements' => [3],
        ];
    }

    public static function provideHiringDates(): array
    {
        $timezone = new DateTimeZone(timezone: 'Europe/Paris');

        return [
            'recent date (1 year ago)' => [
                new DateTimeImmutable(datetime: '-1 year', timezone: $timezone),
                '1 année'
            ],
            'old date (5 years ago)' => [
                new DateTimeImmutable(datetime: '-5 years', timezone: $timezone),
                '5 années'
            ],
            'very old date (20 years ago)' => [
                new DateTimeImmutable(datetime: '-20 years', timezone: $timezone),
                '20 années'
            ],
            'date just months ago' => [
                new DateTimeImmutable(datetime: '-3 months', timezone: $timezone),
                '3 mois'
            ],
            'null date' => [
                null,
                'Non défini'
            ],
            'date with exact year, month and day' => [
                new DateTimeImmutable(datetime: '-1 year 2 months 10 days', timezone: $timezone),
                '1 année 2 mois 10 jours'
            ],
            'new date (current date)' => [
                new DateTimeImmutable(datetime: 'now', timezone: $timezone),
                '0 année 0 mois 0 jour'
            ],
        ];
    }

    private function createMockLogbook(): Logbook & MockObject
    {
        return $this->createConfiguredMock(Logbook::class, []);
    }

    private function createMockTheme(): Theme & MockObject
    {
        return $this->createConfiguredMock(Theme::class, []);
    }

    private function createMockModule(): Module & MockObject
    {
        return $this->createConfiguredMock(Module::class, []);
    }

    private function createMockAction($user): Action
    {
        return $this->createConfiguredMock(Action::class, [
            'getUser' => $user,
            'getId' => Uuid::v7(),
        ]);
    }

    private function invokePrivateMethod(string $methodName, array $parameters = []): mixed
    {
        $reflection = new \ReflectionClass(objectOrClass: DashboardService::class);
        $method = $reflection->getMethod(name: $methodName);
        return $method->invoke($this->dashboardService, ...$parameters);
    }
}
