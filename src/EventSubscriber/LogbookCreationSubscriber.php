<?php

declare(strict_types=1);

namespace App\EventSubscriber;

use App\Entity\Logbook;
use App\Repository\LogbookRepository;
use App\Services\Logbook\LogbookReplacementService;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RequestStack;

readonly class LogbookCreationSubscriber implements EventSubscriberInterface
{
    public function __construct(
        private LogbookReplacementService $logbookReplacementService,
        private RequestStack $requestStack,
        private LogbookRepository $logbookRepository,
    ) {}

    public static function getSubscribedEvents(): array
    {
        return [
            BeforeEntityPersistedEvent::class => ['checkExistingLogbook'],
        ];
    }

    /** @phpstan-ignore-next-line */
    public function checkExistingLogbook(BeforeEntityPersistedEvent $event): void
    {
        $entity = $event->getEntityInstance();

        if (!($entity instanceof Logbook)) {
            return;
        }

        // Si un carnet existe, stocker l'information et bloquer la persistance
        if ($this->logbookReplacementService->handleExistingLogbook($entity)) {
            $session = $this->requestStack->getSession();
            $session->set('existing_logbook', true);
            $session->set('new_logbook_data', $entity);

            // Récupérer le carnet existant
            $existingLogbook = $this->logbookRepository->findOneBy(['owner' => $entity->getOwner()]);
            if (null !== $existingLogbook) {
                // Stocker l'id du carnet existant
                $session->set('existing_logbook_id', $existingLogbook->getId());

                // Effacer le carnet existant
                $this->logbookReplacementService->deleteExistingLogbook($entity);

                // Message Flash pour informer l'utilisateur que le carnet a été remplacé
                /* @phpstan-ignore-next-line */
                $session->getFlashBag()->add(type: 'danger', message: 'Le carnet existant a été supprimé et remplacé par le nouveau.');
            }
        }
    }
}
