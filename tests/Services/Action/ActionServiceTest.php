<?php

declare(strict_types=1);

namespace App\Tests\Services\Action;

use App\Entity\Action;
use App\Entity\Logbook;
use App\Entity\Module;
use App\Entity\User;
use App\Repository\ActionRepository;
use App\Services\Action\ActionService;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use LogicException;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

class ActionServiceTest extends TestCase
{
    private ActionService $actionService;
    private MockObject $actionRepository;
    private MockObject $entityManager;
    private MockObject $security;
    private MockObject $requestStack;

    protected function setUp(): void
    {
        // Mocks des dépendances (compatible PHPUnit 13)
        $this->actionRepository = $this->createMock(type: ActionRepository::class);
        $this->entityManager = $this->createMock(type: EntityManagerInterface::class);
        $this->security = $this->createMock(type: Security::class);
        $this->requestStack = $this->createMock(type: RequestStack::class);

        // Création du service à tester
        $this->actionService = new ActionService(
            actionRepository: $this->actionRepository,
            entityManager: $this->entityManager,
            security: $this->security,
            requestStack: $this->requestStack
        );
    }

    private function createUser(): User
    {
        $user = $this->createMock(type: User::class);
        $user->method(constraint: 'getFullName')->willReturn(value: 'John Doe');
        return $user;
    }

    private function createModule(): Module
    {
        return $this->createMock(type: Module::class);
    }

    private function createAction(User $user, Module $module): Action
    {
        $action = $this->createMock(type: Action::class);
        $action->method(constraint: 'getModule')->willReturn(value: $module);
        $action->method(constraint: 'getUser')->willReturn(value: $user);
        return $action;
    }

    #[Test] public function findOrCreateActionReturnsExistingAction(): void
    {
        $user = $this->createUser();
        $module = $this->createModule();

        // Simuler un utilisateur valide dans Security
        $this->security->method(constraint: 'getUser')->willReturn(value: $user);

        // Simuler la recherche d'une action existante
        $existingAction = $this->createAction(user: $user, module: $module);
        $this->actionRepository->method(constraint: 'findOneBy')
            ->with(['module' => $module, 'user' => $user])
            ->willReturn(value: $existingAction);

        // Appel à la méthode
        $action = $this->actionService->findOrCreateAction(module: $module);

        // Vérifier que l'action retournée est l'existante
        $this->assertSame(expected: $existingAction, actual: $action);
    }

    #[Test] public function findOrCreateActionCreatesNewAction(): void
    {
        $user = $this->createUser();
        $module = $this->createModule();

        // Simuler un utilisateur valide dans Security
        $this->security->method(constraint: 'getUser')->willReturn($user);

        // Simuler l'absence d'une action existante
        $this->actionRepository->method(constraint: 'findOneBy')
            ->with(['module' => $module, 'user' => $user])
            ->willReturn(null);

        // Créer une nouvelle action
        $newAction = $this->createMock(type: Action::class);
        $newAction->method(constraint: 'setModule')->with($module);
        $newAction->method(constraint: 'setUser')->with($user);

        // Appel à la méthode
        $action = $this->actionService->findOrCreateAction(module: $module);

        // Vérifier que l'action est bien créée
        $this->assertInstanceOf(expected: Action::class, actual: $action);
    }

    #[Test] public function findOrCreateActionThrowsExceptionWhenUserIsInvalid()
    {
        // Simuler un utilisateur invalide (non instance de User)
        $this->security->method(constraint: 'getUser')->willReturn(value: null); // ou un objet non-User si nécessaire

        $module = new Module(); // Utiliser un module factice pour le test

        $this->expectException(exception: \LogicException::class);
        $this->expectExceptionMessage(message: 'L\'utilisateur actuel n\'est pas valide.');

        $this->actionService->findOrCreateAction(module: $module);
    }

    #[Test] public function validateActionThrowsExceptionWhenUserIsNotValid(): void
    {
        $this->expectException(LogicException::class);
        $this->expectExceptionMessage("L'utilisateur actuel n'est pas valide.");

        // Simuler un utilisateur non valide
        $this->security->method(constraint: 'getUser')->willReturn(value: null);

        $action = $this->createMock(type: Action::class);

        $this->actionService->validateAction(action: $action);
    }

    #[Test] public function validateActionSetsAgentVisaAndDate(): void
    {
        $user = $this->createUser();
        $action = $this->createMock(type: Action::class);

        // Simuler un utilisateur valide
        $this->security->method(constraint: 'getUser')->willReturn(value: $user);

        // Créer la date actuelle
        $currentDate = new \DateTime(datetime: 'now', timezone: new \DateTimeZone(timezone: 'Europe/Paris'));
        $formattedDate = $currentDate->format(format: 'd/m/Y');

        // Vérification des appels de méthode
        $action->expects($this->once())->method(constraint: 'setAgentVisa')
            ->with('Validation numérique de John Doe le ' . $formattedDate);

        // Arrondir la date à la seconde près (en ignorant les millisecondes)
        $currentDateRounded = (clone $currentDate)
            ->setTime(
                hour: (int) $currentDate->format(format: 'H'), // Conversion en entier
                minute: (int) $currentDate->format(format: 'i'), // Conversion en entier
                second: (int) $currentDate->format(format: 's')  // Conversion en entier
            );

        // Pour comparer les dates sans tenir compte des millisecondes
        $currentDateRounded->modify(modifier: '0 second'); // Cette ligne supprimera les millisecondes.

        // Vérification que la méthode setAgentValidatedAt reçoit bien la date arrondie
        $action->expects($this->once())->method(constraint: 'setAgentValidatedAt')
            ->with($this->callback(callback: function ($date) use ($currentDateRounded) {
                // On vérifie que la date est égale à la date arrondie
                return $date->format('Y-m-d H:i:s') === $currentDateRounded->format(format: 'Y-m-d H:i:s');
            }));

        $action->expects($this->once())->method(constraint: 'setAgentComment')
            ->with(null);

        // Simuler l'appel à EntityManager pour persister l'action
        $this->entityManager->expects($this->once())->method(constraint: 'persist')->with($action);
        $this->entityManager->expects($this->once())->method(constraint: 'flush');

        // Appel à la méthode
        $this->actionService->validateAction(action: $action);
    }

    #[Test] public function saveActionSetsAgentVisaAndLogbook(): void
    {
        $user = $this->createUser();
        $action = $this->createMock(type: Action::class);
        $module = $this->createModule();
        $logbookId = 'logbook123';

        // Simuler un utilisateur valide
        $this->security->method(constraint: 'getUser')->willReturn(value: $user);

        // Simuler la requête actuelle
        $request = $this->createMock(type: Request::class);
        $request->method(constraint: 'get')->with('logbookId')->willReturn(value: $logbookId);
        $this->requestStack->method(constraint: 'getCurrentRequest')->willReturn(value: $request);

        // Simuler la récupération du carnet
        $logbook = $this->createMock(type: Logbook::class);
        $this->entityManager->method(constraint: 'getRepository')
            ->willReturn($this->createMock(type: EntityRepository::class));
        $this->entityManager->getRepository(className: Logbook::class)->method('find')
            ->with($logbookId)
            ->willReturn($logbook);

        $currentDate = new \DateTime(datetime: 'now', timezone: new \DateTimeZone(timezone: 'Europe/Paris'));
        $formattedDate = $currentDate->format(format: 'd/m/Y à H:i');

        // Vérification des appels de méthode
        $action->expects($this->once())->method(constraint: 'setAgentVisa')
            ->with('Visa numérique de John Doe le ' . $formattedDate);
        $action->expects($this->once())->method(constraint: 'setLogbook')->with($logbook);

        // Format des dates sans millisecondes
        $currentDateFormatted = $currentDate->format(format: 'Y-m-d H:i:s');

        // Comparer la date formatée
        $action->expects($this->once())->method(constraint: 'setAgentValidatedAt')
            ->with($this->callback(callback: function ($date) use ($currentDateFormatted) {
                return $date->format('Y-m-d H:i:s') === $currentDateFormatted;
            }));

        // Simuler l'appel à EntityManager pour persister l'action
        $this->entityManager->expects($this->once())->method(constraint: 'persist')->with($action);
        $this->entityManager->expects($this->once())->method(constraint: 'flush');

        // Appel à la méthode
        $this->actionService->saveAction(action: $action, agentName: 'John Doe', logbookId: $logbookId);
    }
}
