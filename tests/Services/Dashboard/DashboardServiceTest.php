<?php

declare(strict_types=1);

namespace App\Tests\Services\Dashboard;


use App\Entity\Action;
use App\Entity\Logbook;
use App\Entity\Module;
use App\Entity\Theme;
use App\Entity\User;
use App\Services\Dashboard\DashboardService;
use App\Services\Logbook\LogbookProgressService;
use App\Services\User\UserSeniorityService;
use App\Services\User\UserValidationService;
use App\Tests\Utils\UserTestHelper;
use DateTimeImmutable;
use DateTimeZone;
use Doctrine\Common\Collections\ArrayCollection;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\MockObject\MockObject;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Security\Core\Exception\UserNotFoundException;
use Symfony\Component\Uid\Uuid;

class DashboardServiceTest extends WebTestCase
{
    private UserValidationService $userValidationService;
    private UserSeniorityService $seniorityService;
    private LogbookProgressService $logbookProgressService;
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
        $user->addLogbook($logbook);
        $theme = $this->createMockTheme();
        $module = $this->createMockModule();
        $action = $this->createMockAction($user);

        // Configuration des autres mocks
        $logbook->method('getThemes')->willReturn(value: new ArrayCollection(elements: [$theme]));
        $theme->method('getModules')->willReturn(value: new ArrayCollection(elements: [$module]));
        $module->method('getActions')->willReturn(value: new ArrayCollection(elements: [$action]));

        // Mocks des services
        $this->userValidationService
            ->expects($this->once())
            ->method(constraint: 'validateUserAccess')
            ->with($nni)
            ->willReturn($user);

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

        // Assert
        $this->expectException(\InvalidArgumentException::class);

        // Act
        $this->invokePrivateMethod(methodName: 'calculateLogbooksProgress', parameters: [$invalidLogbooks]);
    }

    #[DataProvider('provideSizes')]
    public function testGetLogbooksByUser(int $size): void
    {
        // Arrange
        $user = $this->createMock(originalClassName: User::class);
        $logbooks = [];
        for ($i = 0; $i < $size; $i++) {
            $logbooks[] = $this->createMockLogbook();
        }
        // Utilisation de method() pour simuler le retour de getLogbooks()
        $user->method('getLogbooks')->willReturn(value: new ArrayCollection(elements: $logbooks));

        // Act
        $result = $this->invokePrivateMethod(methodName: 'getLogbooksByUser', parameters: [$user]);

        // Assert
        $this->assertCount(expectedCount: $size, haystack: $result);
    }

    #[DataProvider('provideSizes')]
    #[Test] public function getThemesByLogbooks(int $size): void
    {
        // Arrange
        $logbooks = [];
        $themes = [];
        for ($i = 0; $i < $size; $i++) {
            $logbook = $this->createMockLogbook();
            $theme = $this->createMockTheme();
            $logbook->method('getThemes')->willReturn(value: new ArrayCollection(elements: [$theme]));
            $logbooks[] = $logbook;
            $themes[] = $theme;
        }

        // Act
        $result = $this->invokePrivateMethod(methodName: 'getThemesByLogbooks', parameters: [$logbooks]);

        // Assert
        $this->assertCount(expectedCount: $size, haystack: $result);
    }

    #[DataProvider('provideSizes')]
    #[Test] public function getModulesByThemes(int $size): void
    {
        // Arrange
        $themes = [];
        $modules = [];
        for ($i = 0; $i < $size; $i++) {
            $theme = $this->createMockTheme();
            $module = $this->createMockModule();
            $theme->method('getModules')->willReturn(new ArrayCollection([$module]));
            $themes[] = $theme;
            $modules[] = $module;
        }

        // Act
        $result = $this->invokePrivateMethod(methodName: 'getModulesByThemes', parameters: [$themes]);

        // Assert
        $this->assertCount($size, $result);
    }

    #[DataProvider('provideHiringDates')]
    #[Test] public function calculateSeniority(?\DateTimeImmutable $hiringDate, string $expectedSeniority): void
    {
        // Arrange
        if ($hiringDate !== null) {
            $this->seniorityService
                ->expects($this->once())
                ->method('getSeniority')
                ->with($hiringDate)
                ->willReturn($expectedSeniority);
        }

        // Act
        $result = $this->invokePrivateMethod('calculateSeniority', [$hiringDate]);

        // Assert
        self::assertIsString($result);
        self::assertEquals($expectedSeniority, $result);
    }

    #[Test] public function testGetSeniority(): void
    {
        $userSeniorityService = new UserSeniorityService();

        // Cas 1 : 5 années
        $hiringDate1 = new DateTimeImmutable(datetime: '-5 years');
        $expectedSeniority1 = '5 années';

        // Cas 2 : 1 année et 3 mois
        $hiringDate2 = new DateTimeImmutable(datetime: '-1 year -3 months');
        $expectedSeniority2 = '1 année 3 mois';

        // Cas 3 : 0 année, 0 mois, 10 jours
        $hiringDate3 = new DateTimeImmutable(datetime: '-10 days');
        $expectedSeniority3 = '10 jours';

        // Cas 4 : Date actuelle (premier jour)
        $hiringDate4 = new DateTimeImmutable(datetime: 'now');
        $expectedSeniority4 = 'Premier jour parmi nous !';

        // Cas 5 : 50 années
        $hiringDate5 = new DateTimeImmutable(datetime: '-50 years');
        $expectedSeniority5 = '50 années';

        // Cas 6 : 3 années, 4 mois et 5 jours
        $hiringDate6 = new DateTimeImmutable(datetime: '-3 years -4 months -5 days');
        $expectedSeniority6 = '3 années 4 mois 5 jours';

        $result1 = $userSeniorityService->getSeniority($hiringDate1);
        self::assertEquals($expectedSeniority1, $result1);

        $result2 = $userSeniorityService->getSeniority($hiringDate2);
        self::assertEquals($expectedSeniority2, $result2);

        $result3 = $userSeniorityService->getSeniority($hiringDate3);
        self::assertEquals($expectedSeniority3, $result3);

        $result4 = $userSeniorityService->getSeniority($hiringDate4);
        self::assertEquals($expectedSeniority4, $result4);

        $result5 = $userSeniorityService->getSeniority($hiringDate5);
        self::assertEquals($expectedSeniority5, $result5);

        $result6 = $userSeniorityService->getSeniority($hiringDate6);
        self::assertEquals($expectedSeniority6, $result6);
    }


    #[DataProvider('provideSizes')]
    #[Test] public function getActionsByModulesForUser(int $size): void
    {
        // Arrange
        $user = UserTestHelper::createUser();
        $modules = [];
        $actions = [];

        for ($i = 0; $i < $size; $i++) {
            $module = $this->createMockModule();
            $action = $this->createMockAction($user);
            $module->method('getActions')->willReturn(new ArrayCollection([$action]));
            $modules[] = $module;
            $actions[] = $action;
        }

        // Act
        $result = $this->invokePrivateMethod(methodName: 'getActionsByModulesForUser', parameters: [$modules, $user]);

        // Assert
        $this->assertCount($size, $result);
    }

    protected function setUp(): void
    {
        $this->userValidationService = $this->createMock(originalClassName: UserValidationService::class);
        $this->seniorityService = $this->createMock(originalClassName: UserSeniorityService::class);
        $this->logbookProgressService = $this->createMock(originalClassName: LogbookProgressService::class);

        $this->dashboardService = new DashboardService(
            $this->userValidationService,
            $this->seniorityService,
            $this->logbookProgressService,
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
        return $this->createMock(originalClassName: Logbook::class);
    }

    private function createMockTheme(): Theme & MockObject
    {
        return $this->createMock(Theme::class);
    }

    private function createMockModule(): Module & MockObject
    {
        return $this->createMock(Module::class);
    }

    private function createMockAction($user): Action
    {
        $action = $this->createMock(Action::class);
        $action->method('getUser')->willReturn($user);
        $action->method('getId')->willReturn(Uuid::v7());
        return $action;
    }

    private function invokePrivateMethod(string $methodName, array $parameters = []): mixed
    {
        $reflection = new \ReflectionClass(objectOrClass: DashboardService::class);
        $method = $reflection->getMethod(name: $methodName);
        return $method->invoke($this->dashboardService, ...$parameters);
    }
}
