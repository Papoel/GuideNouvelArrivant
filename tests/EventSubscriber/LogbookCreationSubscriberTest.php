<?php

declare(strict_types=1);

namespace App\Tests\EventSubscriber;

use App\Entity\Logbook;
use App\EventSubscriber\LogbookCreationSubscriber;
use App\Repository\LogbookRepository;
use App\Services\Logbook\LogbookReplacementService;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use Symfony\Component\HttpFoundation\Session\Session;

class LogbookCreationSubscriberTest extends TestCase
{
    private LogbookReplacementService $logbookReplacementService;
    private RequestStack $requestStack;
    private Session $session;
    private FlashBagInterface $flashBag;
    private LogbookRepository $logbookRepository;
    private LogbookCreationSubscriber $subscriber;

    protected function setUp(): void
    {
        $this->logbookReplacementService = $this->createMock(LogbookReplacementService::class);
        $this->requestStack = $this->createMock(RequestStack::class);
        $this->session = $this->createMock(Session::class);
        $this->flashBag = $this->createMock(FlashBagInterface::class);
        $this->logbookRepository = $this->createMock(LogbookRepository::class);

        // Simulation de getFlashBag() pour retourner le FlashBag
        $this->session->method('getFlashBag')->willReturn(value: $this->flashBag);
        $this->requestStack->method('getSession')->willReturn(value: $this->session);

        $this->subscriber = new LogbookCreationSubscriber(
            logbookReplacementService: $this->logbookReplacementService,
            requestStack: $this->requestStack,
            logbookRepository: $this->logbookRepository
        );
    }

    #[Test] public function itDoesNothingIfEntityIsNotLogbook(): void
    {
        $event = new BeforeEntityPersistedEvent(entityInstance: new \stdClass());

        // Aucune méthode ne doit être appelée
        $this->logbookReplacementService->expects($this->never())->method(constraint: 'handleExistingLogbook');
        $this->session->expects($this->never())->method(constraint: 'set');
        $this->logbookRepository
            ->expects($this->never())
            ->method(constraint: 'findOneBy');

        $this->subscriber->checkExistingLogbook(event: $event);
    }

    #[Test] public function itHandlesExistingLogbookIfAlreadyExists(): void
    {
        $logbook = $this->createMock(type: Logbook::class);
        $existingLogbook = $this->createMock(type: Logbook::class);

        // Simulation du carnet déjà existant
        $this->logbookReplacementService
            ->method('handleExistingLogbook')
            ->with(value: $logbook)
            ->willReturn(value: true);

        $this->logbookRepository
            ->method('findOneBy')
            ->with(value: ['owner' => $logbook->getOwner()])
            ->willReturn(value: $existingLogbook);

        // Vérification des appels de la session avec un map
        $this->session
            ->expects($this->exactly(count: 3))
            ->method(constraint: 'set')
            ->willReturnMap([
                ['existing_logbook', true],
                ['new_logbook_data', $logbook],
                ['existing_logbook_id', $existingLogbook->getId()],
            ]);

        // Vérification du message flash
        $this->flashBag
            ->expects($this->once())
            ->method(constraint: 'add')
            ->with('danger', 'Le carnet existant a été supprimé et remplacé par le nouveau.');

        // Vérification de la suppression du carnet existant
        $this->logbookReplacementService
            ->expects($this->once())
            ->method(constraint: 'deleteExistingLogbook')
            ->with(value: $logbook);

        $event = new BeforeEntityPersistedEvent(entityInstance: $logbook);
        $this->subscriber->checkExistingLogbook(event: $event);
    }

    #[Test]
    public function itSetsSessionWithoutDeletingIfNoExistingLogbook(): void
    {
        $logbook = $this->createMock(Logbook::class);

        // Simulation : handleExistingLogbook retourne true, mais aucun carnet existant n'est trouvé
        $this->logbookReplacementService
            ->method('handleExistingLogbook')
            ->with($logbook)
            ->willReturn(value: true);
        $this->logbookRepository
            ->method('findOneBy')
            ->willReturn(value: null);

        // Vérification de la session pour `existing_logbook` et `new_logbook_data` uniquement
        $this->session
            ->expects($this->exactly(count: 2))
            ->method(constraint: 'set')
            ->willReturnMap([
                ['existing_logbook', true],
                ['new_logbook_data', $logbook]
            ]);

        // Vérification que deleteExistingLogbook n'est pas appelé
        $this->logbookReplacementService
            ->expects($this->never())
            ->method(constraint: 'deleteExistingLogbook');

        // Vérification de l'absence de message flash
        $this->flashBag
            ->expects($this->never())
            ->method(constraint: 'add');

        $event = new BeforeEntityPersistedEvent(entityInstance: $logbook);
        $this->subscriber->checkExistingLogbook(event: $event);
    }

    #[Test] public function itSubscribesToBeforeEntityPersistedEvent(): void
    {
        $expectedEvents = [
            BeforeEntityPersistedEvent::class => ['checkExistingLogbook'],
        ];

        self::assertSame(
            expected: $expectedEvents,
            actual: LogbookCreationSubscriber::getSubscribedEvents()
        );
    }

}
