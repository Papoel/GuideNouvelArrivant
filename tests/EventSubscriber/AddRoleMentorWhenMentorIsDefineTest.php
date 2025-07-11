<?php

declare(strict_types=1);

namespace App\Tests\EventSubscriber;

use App\Entity\User;
use App\EventSubscriber\AddRoleMentorWhenMentorIsDefine;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\UnitOfWork;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityUpdatedEvent;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use stdClass;

class AddRoleMentorWhenMentorIsDefineTest extends TestCase
{
    private EntityManagerInterface $entityManager;
    private AddRoleMentorWhenMentorIsDefine $subscriber;

    #[Test] public function getSubscribedEventsMethodsMapping(): void
    {
        $events = AddRoleMentorWhenMentorIsDefine::getSubscribedEvents();

        $this->assertEquals(expected: ['onBeforeEntityUpdated'], actual: $events[BeforeEntityUpdatedEvent::class]);
    }

    #[Test] public function itDoesNothingIfEntityIsNotUser(): void
    {
        // Créer une instance de BeforeEntityUpdatedEvent avec un objet non-User
        $event = new BeforeEntityUpdatedEvent(new stdClass());

        // Aucune méthode ne doit être appelée sur l'entité
        $this->entityManager->expects($this->never())->method(constraint: 'getUnitOfWork');

        $this->subscriber->onBeforeEntityUpdated(event: $event);
    }

    #[Test] public function itAddsRoleMentorWhenMentorIsSet(): void
    {
        $user = $this->createMock(User::class);
        $mentor = $this->createMock(User::class);

        // Simulation des méthodes
        $user->method('getMentor')->willReturn(value: $mentor);
        $user->method('getRoles')->willReturn(value: ['ROLE_USER']);

        // Créer une instance réelle de BeforeEntityUpdatedEvent avec l'entité User
        $event = new BeforeEntityUpdatedEvent(entityInstance: $user);

        // Simulation de l'originalData
        $unitOfWork = $this->createMock(type: UnitOfWork::class);
        $unitOfWork->method('getOriginalEntityData')->willReturn(value: ['mentor' => null]);
        $this->entityManager->method('getUnitOfWork')->willReturn(value: $unitOfWork);

        // Vérifier les appels à persist et flush
        $this->entityManager->expects($this->once())->method(constraint: 'persist')->with(value: $mentor);
        $this->entityManager->expects($this->once())->method(constraint: 'flush');

        $this->subscriber->onBeforeEntityUpdated(event: $event);
    }

    #[Test] public function itRemovesRoleMentorFromPreviousMentorAndAddsToNewOne(): void
    {
        // Créer les utilisateurs nécessaires
        $user = $this->createMock(type: User::class);
        $previousMentor = $this->createMock(type: User::class);
        $newMentor = $this->createMock(type: User::class);

        // Configuration du comportement de l'utilisateur
        $user->expects($this->once())
            ->method(constraint: 'getMentor')
            ->willReturn(value: $newMentor);

        // Configuration du UnitOfWork
        $unitOfWork = $this->createMock(type: UnitOfWork::class);
        $unitOfWork->expects($this->once())
            ->method(constraint: 'getOriginalEntityData')
            ->with(value: $user)
            ->willReturn(value: ['mentor' => $previousMentor]);

        // Configuration de l'EntityManager
        $this->entityManager
            ->expects($this->once())
            ->method(constraint: 'getUnitOfWork')
            ->willReturn(value: $unitOfWork);

        // Configuration du comportement de l'ancien mentor
        $previousMentor
            ->expects($this->once())
            ->method(constraint: 'getRoles')
            ->willReturn(value: ['ROLE_USER', 'ROLE_MENTOR']);

        $previousMentor
            ->expects($this->once())
            ->method(constraint: 'setRoles')
            ->with(value: ['ROLE_USER']);

        // Configuration du comportement du nouveau mentor
        $newMentor
            ->expects($this->once())
            ->method(constraint: 'getRoles')
            ->willReturn(value: ['ROLE_USER']);

        $newMentor
            ->expects($this->once())
            ->method(constraint: 'setRoles')
            ->with(value: ['ROLE_USER', 'ROLE_MENTOR']);

        // Configuration des appels persist/flush
        $this->entityManager
            ->expects($this->exactly(count: 2))
            ->method(constraint: 'persist')
            ->willReturnMap(valueMap: [
                [$previousMentor],
                [$newMentor]
            ]);

        $this->entityManager
            ->expects($this->exactly(count: 2))
            ->method(constraint: 'flush');

        // Création et exécution de l'événement
        $event = new BeforeEntityUpdatedEvent(entityInstance: $user);
        $this->subscriber->onBeforeEntityUpdated(event: $event);
    }

    #[Test]
    public function itRemovesRoleMentorIfMentorIsRemoved(): void
    {
        // Arrange
        $user = $this->createMock(type: User::class);
        $previousMentor = $this->createMock(type: User::class);

        // Configuration du User pour simuler qu'il n'a plus de mentor
        $user->expects($this->once())
            ->method(constraint: 'getMentor')
            ->willReturn(value: null);

        // Configuration du UnitOfWork pour simuler que l'utilisateur avait un mentor avant
        $unitOfWork = $this->createMock(type: UnitOfWork::class);
        $unitOfWork->expects($this->once())
            ->method(constraint: 'getOriginalEntityData')
            ->with(value: $user)
            ->willReturn(value: ['mentor' => $previousMentor]);

        $this->entityManager
            ->expects($this->once())
            ->method(constraint: 'getUnitOfWork')
            ->willReturn(value: $unitOfWork);

        // Configuration de l'ancien mentor
        $previousMentor
            ->expects($this->once())
            ->method(constraint: 'getRoles')
            ->willReturn(value: ['ROLE_USER', 'ROLE_MENTOR']);

        $previousMentor
            ->expects($this->once())
            ->method(constraint: 'setRoles')
            ->with(value: ['ROLE_USER']);

        // Configuration des appels persist/flush
        $this->entityManager
            ->expects($this->once())
            ->method(constraint: 'persist')
            ->with(value: $previousMentor);

        $this->entityManager
            ->expects($this->once())
            ->method(constraint: 'flush');

        // Act
        $event = new BeforeEntityUpdatedEvent(entityInstance: $user);
        $this->subscriber->onBeforeEntityUpdated(event: $event);
    }

    protected function setUp(): void
    {
        $this->entityManager = $this->createMock(EntityManagerInterface::class);
        $this->subscriber = new AddRoleMentorWhenMentorIsDefine($this->entityManager);
    }
}
