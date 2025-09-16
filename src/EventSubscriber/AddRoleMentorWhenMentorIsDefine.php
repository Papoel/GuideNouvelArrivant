<?php

declare(strict_types=1);

namespace App\EventSubscriber;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityUpdatedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

readonly class AddRoleMentorWhenMentorIsDefine implements EventSubscriberInterface
{
    public function __construct(
        private EntityManagerInterface $entityManager
    ) {
    }

    public static function getSubscribedEvents(): array
    {
        return [
            BeforeEntityUpdatedEvent::class => ['onBeforeEntityUpdated'],
        ];
    }

    /** @phpstan-ignore-next-line */
    public function onBeforeEntityUpdated(BeforeEntityUpdatedEvent $event): void
    {
        $entity = $event->getEntityInstance();

        if (!$entity instanceof User) {
            return;
        }

        $currentMentor = $entity->getMentor();
        $originalData = $this->entityManager->getUnitOfWork()->getOriginalEntityData($entity);

        // Récupération de l'ancien mentor avant modification
        $previousMentor = $originalData['mentor'] ?? null;

        // Si le mentor a changé ou est supprimé
        if ($previousMentor instanceof User && $previousMentor !== $currentMentor) {
            $this->removeRoleMentor(mentor: $previousMentor);
        }

        // Ajouter le rôle mentor si un nouveau tuteur est défini
        if ($currentMentor) {
            $this->addRoleMentor(mentor: $currentMentor);
        }
    }

    private function addRoleMentor(User $mentor): void
    {
        $roles = $mentor->getRoles();
        $roles[] = 'ROLE_MENTOR';
        // Utiliser array_values pour garantir que le tableau est une liste (indices numériques consécutifs)
        $mentor->setRoles(array_values(array_unique(array: $roles)));
        $this->entityManager->persist(object: $mentor);
        $this->entityManager->flush();
    }

    private function removeRoleMentor(User $mentor): void
    {
        $roles = $mentor->getRoles();
        $updatedRoles = array_diff($roles, ['ROLE_MENTOR']);
        // Utiliser array_values pour garantir que le tableau est une liste (indices numériques consécutifs)
        $mentor->setRoles(roles: array_values($updatedRoles));
        $this->entityManager->persist(object: $mentor);
        $this->entityManager->flush();
    }
}
