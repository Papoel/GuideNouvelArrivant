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
        self::assertEquals(expected: 'Carnet de Bruce Wayne', actual: (string) $this->logbook);
    }

    #[Test] public function collectionTypes(): void
    {
        self::assertInstanceOf(expected: Collection::class, actual: $this->logbook->getThemes());
        self::assertInstanceOf(expected: Collection::class, actual: $this->logbook->getActions());

        self::assertEquals(expected: 0, actual: $this->logbook->getThemes()->count());
        self::assertEquals(expected: 0, actual: $this->logbook->getActions()->count());
    }
}
