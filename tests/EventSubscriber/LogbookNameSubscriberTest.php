<?php

declare(strict_types=1);

namespace App\Tests\EventSubscriber;

use App\Entity\Logbook;
use App\EventSubscriber\LogbookNameSubscriber;
use App\Tests\Utils\UserTestHelper;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Event\AfterEntityUpdatedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class LogbookNameSubscriberTest extends TestCase
{
    private EntityManagerInterface $entityManager;
    private LogbookNameSubscriber $subscriber;

    protected function setUp(): void
    {
        $this->entityManager = $this->createMock(EntityManagerInterface::class);
        $this->subscriber = new LogbookNameSubscriber($this->entityManager);
    }

    #[Test] public function getSubscribedEventsMethodsMapping(): void
    {
        $events = LogbookNameSubscriber::getSubscribedEvents();

        $this->assertEquals(expected: ['nameLogbookWithUserFullname'], actual:  $events[BeforeEntityPersistedEvent::class]);
        $this->assertEquals(expected: ['updateLogbookName'], actual:  $events[AfterEntityUpdatedEvent::class]);
    }

    #[Test] public function nameLogbookWithUserFullname(): void
    {
        // Création d'un utilisateur fictif
        $user = UserTestHelper::createUser();

        // Récupération des informations de l'utilisateur
        $fullname = $user->getFullname();
        $specialityAbreviation = $user->getSpecialityAbreviation();

        // Création d'un Logbook avec un propriétaire
        $logbook = $this->createMock(originalClassName: Logbook::class);
        $logbook->method('getOwner')->willReturn(value: $user);

        // On s’assure que setName est bien appelé avec les bons arguments
        $logbook->expects($this->once())
            ->method(constraint: 'setName')
            ->with('Carnet de '.$fullname.' ('.$specialityAbreviation.')');

        // Définir les attentes avant d'appeler la méthode de test
        $this->entityManager->expects($this->once())
            ->method(constraint: 'persist')
            ->with($logbook);
        $this->entityManager->expects($this->once())
            ->method(constraint: 'flush');

        // Création de l'événement BeforeEntityPersistedEvent avec le Logbook
        $event = new BeforeEntityPersistedEvent(entityInstance: $logbook);

        // Appel direct à la méthode
        $this->subscriber->nameLogbookWithUserFullname(event: $event);
    }

    #[Test] public function returnFalseIfEntityIsNotInstanceOfLogbook(): void
    {
        // Création d'un objet fictif qui n'est pas un Logbook
        $entity = new \stdClass();

        // Création de l'événement BeforeEntityPersistedEvent avec l'objet fictif
        $event = new BeforeEntityPersistedEvent(entityInstance: $entity);

        // On s'assure que persist et flush ne sont pas appelés
        $this->entityManager->expects($this->never())
            ->method(constraint: 'persist');
        $this->entityManager->expects($this->never())
            ->method(constraint: 'flush');

        // Appel direct à la méthode sans vérifier le retour
        $this->subscriber->nameLogbookWithUserFullname(event: $event);
    }

    #[Test] public function itDoesNotCallPersistAndFlushIfEntityIsNotInstanceOfLogbook(): void
    {
        // Création d'un objet fictif
        $entity = new \stdClass();

        // Création de l'événement AfterEntityUpdatedEvent avec l'objet fictif
        $event = new AfterEntityUpdatedEvent(entityInstance: $entity);

        // On s'assure que persist et flush ne sont pas appelés
        $this->entityManager->expects($this->never())
            ->method(constraint: 'persist');
        $this->entityManager->expects($this->never())
            ->method(constraint: 'flush');

        // Appel direct à la méthode
        $this->subscriber->updateLogbookName(event: $event);
    }

    #[Test] public function itSetsNameIfLogbookNameIsNull(): void
    {
        // Création d'un utilisateur fictif
        $user = UserTestHelper::createUser();

        // Création d'un Logbook avec un propriétaire et un nom nul
        $logbook = $this->createMock(originalClassName: Logbook::class);
        $logbook->method('getOwner')->willReturn(value: $user);
        $logbook->method('getName')->willReturn(value: null);

        // On s’assure que setName est bien appelé avec les bons arguments
        $logbook->expects($this->once())
            ->method(constraint: 'setName')
            ->with('Carnet de '.$user->getFullname());

        // On s'assure que persist et flush sont bien appelés
        $this->entityManager->expects($this->once())
            ->method(constraint: 'persist')
            ->with(value: $logbook);
        $this->entityManager->expects($this->once())
            ->method(constraint: 'flush');

        // Création de l'événement AfterEntityUpdatedEvent avec le Logbook
        $event = new AfterEntityUpdatedEvent(entityInstance: $logbook);

        // Appel direct à la méthode
        $this->subscriber->updateLogbookName(event: $event);
    }

    #[Test] public function itDoesNotSetNameIfLogbookNameIsAlreadyDefined(): void
    {
        // Création d'un utilisateur fictif
        $user = UserTestHelper::createUser();

        // Création d'un Logbook avec un propriétaire et un nom déjà défini
        $logbook = $this->createMock(originalClassName: Logbook::class);
        $logbook->method('getOwner')->willReturn(value: $user);
        $logbook->method('getName')->willReturn(value: 'Carnet de '.$user->getFullname());

        // On s'assure que setName n'est pas appelé
        $logbook->expects($this->never())->method(constraint: 'setName');

        // On s'assure que persist et flush ne sont pas appelés
        $this->entityManager->expects($this->never())
            ->method(constraint: 'persist');
        $this->entityManager->expects($this->never())
            ->method(constraint: 'flush');

        // Création de l'événement AfterEntityUpdatedEvent avec le Logbook
        $event = new AfterEntityUpdatedEvent(entityInstance: $logbook);

        // Appel direct à la méthode
        $this->subscriber->updateLogbookName(event: $event);
    }

}
