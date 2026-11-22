<?php

declare(strict_types=1);

namespace App\Tests\Entity;

use App\Entity\Action;
use App\Entity\Logbook;
use App\Entity\Theme;
use App\Entity\User;
use App\Tests\Abstract\EntityTestCase;
use App\Tests\Entity\Trait\EntityIdTestTrait;
use Doctrine\Common\Collections\Collection;
use PHPUnit\Framework\Attributes\Test;

class LogbookTest extends EntityTestCase
{
    use EntityIdTestTrait;

    private Logbook $logbook;

    public function setUp(): void
    {
        parent::setUp();
        $this->logbook = new Logbook();
    }

    protected function getEntity(): Logbook
    {
        return $this->getEntityLogbook();
    }

    protected function modifyEntity(object $entity): void
    {
        if (!$entity instanceof Logbook) {
            throw new \InvalidArgumentException(message: 'Entity must be an instance of Logbook');
        }

        $entity->setName(name: 'Nouveau Logbook');
        $entity->setOwner(owner: null);
    }

    public function getEntityLogbook(): Logbook
    {
        $logbook = new Logbook();
        $logbook->setName(name: 'Logbook 1');
        return $logbook;
    }

    public function testEntityLogbookIsValid(): void
    {
        $this->assertValidationErrorsCount($this->getEntityLogbook(), count: 0);
    }

    #[Test] public function initialState(): void
    {
        self::assertNull(actual: $this->logbook->getId());
        self::assertNull(actual: $this->logbook->getName());
        self::assertNull(actual: $this->logbook->getOwner());
        self::assertInstanceOf(expected: Collection::class, actual: $this->logbook->getThemes());
        self::assertInstanceOf(expected: Collection::class, actual: $this->logbook->getActions());
        self::assertEquals(expected: 0, actual: $this->logbook->getThemes()->count());
        self::assertEquals(expected: 0, actual: $this->logbook->getActions()->count());
    }

    #[Test] public function setAndGetName(): void
    {
        $name = "Test Logbook";
        $this->logbook->setName(name: $name);
        self::assertEquals(expected: $name, actual: $this->logbook->getName());

        $this->logbook->setName(name: null);
        self::assertNull(actual: $this->logbook->getName());
    }

    #[Test] public function setAndGetOwner(): void
    {
        $user = new User();

        $this->logbook->setOwner(owner: $user);
        self::assertSame(expected: $user, actual: $this->logbook->getOwner());

        $this->logbook->setOwner(owner: null);
        self::assertNull(actual: $this->logbook->getOwner());
    }

    /**
     * mentorName : copie figée du nom du tuteur, écrite à l'assignation et aux
     * validations. Elle doit survivre à la suppression du compte tuteur,
     * contrairement à la relation User.mentor (ON DELETE SET NULL).
     */
    #[Test] public function setAndGetMentorName(): void
    {
        self::assertNull(actual: $this->logbook->getMentorName());

        $this->logbook->setMentorName(mentorName: 'Walter MARTIN');
        self::assertSame(expected: 'Walter MARTIN', actual: $this->logbook->getMentorName());

        $this->logbook->setMentorName(mentorName: null);
        self::assertNull(actual: $this->logbook->getMentorName());
    }

    #[Test] public function addAndRemoveAction(): void
    {
        $action = new Action();

        $result = $this->logbook->addAction(action: $action);
        self::assertSame(expected: $this->logbook, actual: $result);
        self::assertTrue(condition: $this->logbook->getActions()->contains(element: $action));

        // Test adding the same action twice
        $this->logbook->addAction(action: $action);
        self::assertEquals(expected: 1, actual: $this->logbook->getActions()->count());

        $result = $this->logbook->removeAction(action: $action);
        self::assertSame(expected: $this->logbook, actual: $result);
        self::assertFalse(condition: $this->logbook->getActions()->contains(element: $action));
    }

    #[Test] public function addAndRemoveTheme(): void
    {
        $theme = new Theme();

        $result = $this->logbook->addTheme(theme: $theme);
        self::assertSame(expected: $this->logbook, actual: $result);
        self::assertTrue(condition: $this->logbook->getThemes()->contains(element: $theme));

        // Test adding the same theme twice
        $this->logbook->addTheme(theme: $theme);
        self::assertEquals(expected: 1, actual: $this->logbook->getThemes()->count());

        $result = $this->logbook->removeTheme(theme: $theme);
        self::assertSame(expected: $this->logbook, actual: $result);
        self::assertFalse(condition: $this->logbook->getThemes()->contains(element: $theme));
    }

    #[Test] public function testToString(): void
    {
        self::assertEquals(expected: 'Carnet sans propriétaire', actual: (string) $this->logbook);

        $user = new User();
        $user->setFirstname(firstname: 'Bruce');
        $user->setLastname(lastname: 'Wayne');

        $this->logbook->setOwner(owner: $user);
        self::assertEquals(expected: 'Carnet de Bruce WAYNE', actual: (string) $this->logbook);
    }

    #[Test] public function collectionTypes(): void
    {
        self::assertInstanceOf(expected: Collection::class, actual: $this->logbook->getThemes());
        self::assertInstanceOf(expected: Collection::class, actual: $this->logbook->getActions());

        self::assertEquals(expected: 0, actual: $this->logbook->getThemes()->count());
        self::assertEquals(expected: 0, actual: $this->logbook->getActions()->count());
    }

    /**
     * Dénormalisation du nom du tuteur : quand un tuteur est assigné à un
     * utilisateur, son nom est figé sur ses carnets. C'est ce qui garantit que
     * le PDF reste fidèle même si le compte du tuteur est supprimé ensuite
     * (incident client : le lien mentor est perdu via SET NULL).
     */
    #[Test] public function mentorNameIsPropagatedWhenMentorAssigned(): void
    {
        // Arrange : un titulaire avec un carnet
        $owner = new User();
        $owner->setFirstname('Pascal');
        $owner->setLastname('Dupont');
        $owner->addLogbook($this->logbook);

        $mentor = new User();
        $mentor->setFirstname('Walter');
        $mentor->setLastname('Martin');

        // Act : l'assistante assigne le tuteur
        $owner->setMentor($mentor);

        // Assert : le nom du tuteur est figé sur le carnet
        self::assertSame('Walter MARTIN', $this->logbook->getMentorName());
    }

    /**
     * Un carnet sans propriétaire ne plante pas : la propagation n'a simplement
     * rien à faire (la collection de carnets appartient au titulaire).
     */
    #[Test] public function mentorNameStaysWhenMentorUnassigned(): void
    {
        // Arrange : tuteur assigné puis retiré
        $owner = new User();
        $owner->setFirstname('Pascal');
        $owner->setLastname('Dupont');
        $owner->addLogbook($this->logbook);

        $mentor = new User();
        $mentor->setFirstname('Walter');
        $mentor->setLastname('Martin');
        $owner->setMentor($mentor);

        // Act : le tuteur est désassigné (ou son compte est supprimé)
        $owner->setMentor(null);

        // Assert : le dernier tuteur connu reste la référence du carnet —
        // c'est la vérité historique du document.
        self::assertSame('Walter MARTIN', $this->logbook->getMentorName());
    }

    /**
     * Réassignation : le nom figé suit le nouveau tuteur.
     */
    #[Test] public function mentorNameFollowsReassignment(): void
    {
        $owner = new User();
        $owner->setFirstname('Pascal');
        $owner->setLastname('Dupont');
        $owner->addLogbook($this->logbook);

        $mentorA = new User();
        $mentorA->setFirstname('Walter');
        $mentorA->setLastname('Martin');
        $owner->setMentor($mentorA);

        $mentorB = new User();
        $mentorB->setFirstname('Jean');
        $mentorB->setLastname('Bernard');
        $owner->setMentor($mentorB);

        self::assertSame('Jean BERNARD', $this->logbook->getMentorName());
    }
}
