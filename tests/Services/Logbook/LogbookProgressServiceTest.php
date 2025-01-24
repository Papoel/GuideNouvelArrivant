<?php

declare(strict_types=1);

namespace App\Tests\Services\Logbook;

use App\Services\Logbook\LogbookProgressService;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use App\Entity\Logbook;
use App\Entity\Theme;
use App\Entity\Module;
use App\Entity\User;
use App\Entity\Action;

class LogbookProgressServiceTest extends TestCase
{
    private LogbookProgressService $service;

    protected function setUp(): void
    {
        $this->service = new LogbookProgressService();
    }

    private function createLogbookWithModules(array $modules, array $actions = [], ?User $user = null): Logbook
    {
        $logbook = $this->createMock(originalClassName: Logbook::class);
        $theme = $this->createMock(originalClassName: Theme::class);
        $logbook->method('getThemes')->willReturn(value: new ArrayCollection([$theme]));
        $theme->method('getModules')->willReturn(value: new ArrayCollection($modules));

        if ($user) {
            $logbook->method('getOwner')->willReturn(value: $user);
            $user->method('getActions')->willReturn(value: new ArrayCollection($actions));
        }

        return $logbook;
    }

    private function createAction(Module $module, ?DateTime $agentValidatedAt = null, ?DateTime $mentorValidatedAt = null): Action
    {
        $action = $this->createMock(originalClassName: Action::class);
        $action->method('getModule')->willReturn(value: $module);
        $action->method('getAgentValidatedAt')->willReturn(value: $agentValidatedAt);
        $action->method('getMentorValidatedAt')->willReturn(value: $mentorValidatedAt);

        return $action;
    }

    #[Test] public function calculateLogbookProgressWithNoModules(): void
    {
        $logbook = $this->createLogbookWithModules(modules: []);
        $result = $this->service->calculateLogbookProgress(logbook: $logbook);

        $this->assertProgressResult(
            result: $result,
            agentProgress: 0,
            mentorProgress: 0,
            totalModules: 0,
            completedByAgent: 0,
            validatedByMentor: 0,
            awaitingValidation: 0,
            agentClass: 'bg-danger',
            mentorClass: 'bg-danger'
        );
    }

    #[Test] public function calculateLogbookProgressWithCompletedActions(): void
    {
        $module = $this->createMock(originalClassName: Module::class);
        $action = $this->createAction($module, new DateTime(), new DateTime());
        $user = $this->createMock(originalClassName: User::class);
        $logbook = $this->createLogbookWithModules(modules: [$module], actions: [$action], user: $user);

        $result = $this->service->calculateLogbookProgress(logbook: $logbook);

        $this->assertProgressResult(
            result: $result,
            agentProgress: 100.0,
            mentorProgress: 100.0,
            totalModules: 1,
            completedByAgent: 1,
            validatedByMentor: 1,
            awaitingValidation: 0,
            agentClass: 'bg-success',
            mentorClass: 'bg-success'
        );
    }

    #[Test] public function calculateLogbookProgressWithAgentValidatedButMentorNot(): void
    {
        $module = $this->createMock(originalClassName: Module::class);
        $action = $this->createAction(module: $module, agentValidatedAt: new DateTime());
        $user = $this->createMock(originalClassName: User::class);
        $logbook = $this->createLogbookWithModules(modules: [$module], actions: [$action], user: $user);

        $result = $this->service->calculateLogbookProgress(logbook: $logbook);

        $this->assertProgressResult(
            result: $result,
            agentProgress: 100.0,
            mentorProgress: 0.0,
            totalModules: 1,
            completedByAgent: 1,
            validatedByMentor: 0,
            awaitingValidation: 0,
            agentClass: 'bg-success',
            mentorClass: 'bg-danger'
        );
    }

    #[Test] public function calculateLogbookProgressWithoutAnyValidation(): void
    {
        $module = $this->createMock(originalClassName: Module::class);
        $action = $this->createAction($module);
        $user = $this->createMock(originalClassName: User::class);
        $logbook = $this->createLogbookWithModules(modules: [$module], actions: [$action], user: $user);

        $result = $this->service->calculateLogbookProgress(logbook: $logbook);

        $this->assertProgressResult(
            result: $result,
            agentProgress: 0.0,
            mentorProgress: 0.0,
            totalModules: 1,
            completedByAgent: 0,
            validatedByMentor: 0,
            awaitingValidation: 1,
            agentClass: 'bg-danger',
            mentorClass: 'bg-danger'
        );
    }

    #[Test] public function calculateLogbookProgressClassBelow50Percent(): void
    {
        $module = $this->createMock(originalClassName: Module::class);
        $action = $this->createAction($module);
        $user = $this->createMock(originalClassName: User::class);
        $logbook = $this->createLogbookWithModules(modules: [$module], actions: [$action], user: $user);

        $result = $this->service->calculateLogbookProgress(logbook: $logbook);

        $this->assertEquals(expected: 'bg-danger', actual: $result['progress_class_agent']);
        $this->assertEquals(expected: 'bg-danger', actual: $result['progress_class_mentor']);
    }

    #[Test] public function calculateLogbookProgressClassBetween50And75Percent(): void
    {
        $module1 = $this->createMock(originalClassName: Module::class);
        $module2 = $this->createMock(originalClassName: Module::class);
        $action1 = $this->createAction(module: $module1, agentValidatedAt: new DateTime(), mentorValidatedAt: new DateTime());
        $action2 = $this->createAction(module: $module2);
        $user = $this->createMock(originalClassName: User::class);
        $logbook = $this->createLogbookWithModules(modules: [$module1, $module2], actions: [$action1, $action2], user: $user);

        $result = $this->service->calculateLogbookProgress($logbook);

        $this->assertEquals(expected: 'bg-warning text-dark', actual: $result['progress_class_agent']);
        $this->assertEquals(expected: 'bg-warning text-dark', actual: $result['progress_class_mentor']);
    }

    #[Test] public function calculateLogbookProgressClassAbove75Percent(): void
    {
        $modules = [$this->createMock(originalClassName: Module::class), $this->createMock(originalClassName: Module::class), $this->createMock(originalClassName: Module::class)];
        $actions = array_map(fn($module) => $this->createAction($module, new DateTime(), new DateTime()), $modules);
        $user = $this->createMock(originalClassName: User::class);
        $logbook = $this->createLogbookWithModules(modules: $modules, actions: $actions, user: $user);

        $result = $this->service->calculateLogbookProgress(logbook: $logbook);

        $this->assertEquals(expected: 'bg-success', actual: $result['progress_class_agent']);
        $this->assertEquals(expected: 'bg-success', actual: $result['progress_class_mentor']);
    }

    #[Test] public function calculateLogbookProgressWithNullAction(): void
    {
        $module = $this->createMock(originalClassName: Module::class);
        $user = $this->createMock(originalClassName: User::class);

        // Création d'un logbook avec un module et aucun action associée
        $logbook = $this->createLogbookWithModules(modules: [$module], user: $user);

        $result = $this->service->calculateLogbookProgress(logbook: $logbook);

        $this->assertProgressResult(
            result: $result,
            agentProgress: 0.0,
            mentorProgress: 0.0,
            totalModules: 1,
            completedByAgent: 0,
            validatedByMentor: 0,
            awaitingValidation: 1,
            agentClass: 'bg-danger',
            mentorClass: 'bg-danger'
        );
    }
    private function assertProgressResult(
        array $result,
        float $agentProgress,
        float $mentorProgress,
        int $totalModules,
        int $completedByAgent,
        int $validatedByMentor,
        int $awaitingValidation,
        string $agentClass,
        string $mentorClass
    ): void {
        $this->assertEquals(expected: $agentProgress, actual: $result['agent_progress']);
        $this->assertEquals(expected: $mentorProgress, actual: $result['mentor_progress']);
        $this->assertEquals(expected: $totalModules, actual: $result['total_modules']);
        $this->assertEquals(expected: $completedByAgent, actual: $result['completed_by_agent']);
        $this->assertEquals(expected: $validatedByMentor, actual: $result['validated_by_mentor']);
        $this->assertEquals(expected: $awaitingValidation, actual: $result['modules_awaiting_validation']);
        $this->assertEquals(expected: $agentClass, actual: $result['progress_class_agent']);
        $this->assertEquals(expected: $mentorClass, actual: $result['progress_class_mentor']);
    }
}
