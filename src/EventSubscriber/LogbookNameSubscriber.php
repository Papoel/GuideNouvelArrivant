<?php

declare(strict_types=1);

namespace App\EventSubscriber;

use App\Entity\Logbook;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Event\AfterEntityUpdatedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

readonly class LogbookNameSubscriber implements EventSubscriberInterface
{
    public function __construct(
        private EntityManagerInterface $entityManager
    ) {
    }

    /**
     * @return array<class-string, array<int, string>>
     */
    public static function getSubscribedEvents(): array
    {
        return [
            BeforeEntityPersistedEvent::class => ['nameLogbookWithUserFullname'],
            AfterEntityUpdatedEvent::class => ['updateLogbookName'],
        ];
    }

    public function nameLogbookWithUserFullname(BeforeEntityPersistedEvent $event): void
    {
        $entity = $event->getEntityInstance();

        if (!$entity instanceof Logbook) {
            return;
        }

        $this->setName($entity);
    }

    private function setName(Logbook $entity): void
    {
        $owner = $entity->getOwner();

        if (null !== $owner) {
            $entity->setName(name: 'Carnet de '.$owner->getFullname().' ('.$owner->getSpecialityAbreviation().')');

            $this->entityManager->persist($entity);
            $this->entityManager->flush();
        }
    }

    public function updateLogbookName(AfterEntityUpdatedEvent $event): void
    {
        $entity = $event->getEntityInstance();

        if (!$entity instanceof Logbook) {
            return;
        }

        $owner = $entity->getOwner();

        if (null !== $owner) {
            $logbookName = $entity->getName();

            if (null === $logbookName) {
                $entity->setName(name: 'Carnet de '.$owner->getFullname());

                $this->entityManager->persist($entity);
                $this->entityManager->flush();
            }
        }
    }
}
