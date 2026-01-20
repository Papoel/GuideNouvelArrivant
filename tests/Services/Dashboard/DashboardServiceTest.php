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
