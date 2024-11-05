<?php

declare(strict_types=1);

namespace App\Tests\Entity;

use App\Entity\Action;
use App\Entity\Module;
use App\Entity\Theme;
use App\Tests\Abstract\EntityTestCase;
use App\Tests\Entity\Trait\EntityIdTestTrait;
use Doctrine\Common\Collections\Collection;
use PHPUnit\Framework\Attributes\Test;
use Symfony\Component\Uid\Uuid;

class ModuleTest extends EntityTestCase
{
    use EntityIdTestTrait;

    private Module $module;

    public function setUp(): void
    {
        parent::setUp();
        $this->module = new Module();
    }

    protected function getEntity(): Module
    {
        return $this->getEntityModule();
    }

    protected function modifyEntity(object $entity): void
    {
        if (!$entity instanceof Module) {
            throw new \InvalidArgumentException(message: 'Entity must be an instance of Module');
        }

        $entity->setDescription(description: 'Nouvelle Description');
        $entity->setTitle(title: 'Nouveau Titre');
        $entity->setTheme(theme: new Theme());
    }

    public function getEntityModule(): Module
    {
        $module = new Module();
        $module->setTitle(title: 'Titre de test de module');
        $module->setDescription(description: 'Une description de test pour un module');
        return $module;
    }

    #[Test] public function EntityModuleIsValid(): void
    {
        $this->assertValidationErrorsCount($this->getEntityModule(), count: 0);
    }

    #[Test] public function initialState(): void
    {
        self::assertNull(actual: $this->module->getId());
        self::assertNull(actual: $this->module->getTitle());
        self::assertNull(actual: $this->module->getDescription());
        self::assertNull(actual: $this->module->getTheme());
        self::assertNull(actual: $this->module->getActionByModuleId(moduleId: Uuid::v4()));
        self::assertInstanceOf(expected: Collection::class, actual: $this->module->getActions());
        self::assertEquals(expected: 0, actual: $this->module->getActions()->count());
    }

    #[Test] public function setAndGetTitle(): void
    {
        $name = "Test Module";
        $this->module->setTitle(title: $name);
        self::assertEquals(expected: $name, actual: $this->module->getTitle());

        $this->module->setTitle(title: null);
        self::assertNull(actual: $this->module->getTitle());
    }

    #[Test] public function titleCannotExceed100Characters(): void
    {
        $this->module->setTitle(title: str_repeat(string: 'a', times: 101));
        $this->assertValidationErrorsCount($this->module, count: 1);
    }

    #[Test] public function titleCannotBeBlank(): void
    {
        $this->module->setTitle(title: '');
        $this->assertValidationErrorsCount($this->module, count: 1);
    }

    #[Test] public function setAndGetDescription(): void
    {
        $description = "Test Module Description";
        $this->module->setDescription(description: $description);
        self::assertEquals(expected: $description, actual: $this->module->getDescription());
    }

    #[Test] public function descriptionIsGraterThan1000Characters(): void
    {
        $title = "Test Module";
        $this->module->setTitle(title: $title);
        $this->module->setDescription(description: str_repeat(string: 'a', times: 1001));
        $this->assertValidationErrorsCount($this->module, count: 0);
    }

    #[Test] public function themeCannotBeNull(): void
    {
        $title = "Test Module";
        $this->module->setTitle(title: $title);
        $this->module->setTheme(theme: null);
        $this->assertValidationErrorsCount($this->module, count: 0);
    }

    #[Test] public function testToString(): void
    {
        $title = "Test Module";
        $theme = new Theme();
        $theme->setTitle(title: 'Test Theme');
        $this->module->setTitle(title: $title);
        $this->module->setTheme($theme);

        // Attendu : "Tes | Test Module"
        $expected = substr($theme->getTitle(), offset: 0, length: 3) . ' | ' . $title;
        self::assertEquals(expected: $expected, actual: (string) $this->module);
        $this->assertValidationErrorsCount($this->module, count: 0);
    }

    #[Test] public function testAddAction(): void
    {
        $module = new Module();
        $action = new Action();

        // Test d'ajout d'une Action dans la collection
        $module->addAction($action);
        $this->assertTrue($module->getActions()->contains($action));

        // Vérification que la méthode setModule est correctement appelée
        $this->assertSame($module, $action->getModule());
    }

    #[Test] public function testRemoveAction(): void
    {
        $module = new Module();
        $action = new Action();
        $module->addAction($action);

        // Test de la suppression d'une Action de la collection
        $module->removeAction($action);
        $this->assertFalse($module->getActions()->contains($action));

        // Vérification que la méthode setModule(null) est appelée
        $this->assertNull($action->getModule());
    }

    #[Test] public function testGetActionByModuleId(): void
    {
        $entityModule = $this->getEntity();
        $uuid = Uuid::v4();
        $this->setEntityId($entityModule, $uuid);

        $module = new Module();
        $this->setEntityId($module, $uuid);
        $action1 = new Action();
        $action1->setModule($module);
        $action2 = new Action();
        $action2->setModule($module);
        $module->addAction($action1);
        $module->addAction($action2);

        // Test de récupération d'une Action par son moduleId
        $retrievedAction = $module->getActionByModuleId($uuid);
        $this->assertSame($action1, $retrievedAction);
        $this->assertValidationErrorsCount($entityModule, count: 0);

        // Test lorsque le moduleId ne correspond à aucune action
        $notFoundAction = $module->getActionByModuleId(Uuid::v4());
        $this->assertNull($notFoundAction);
        $this->assertValidationErrorsCount($entityModule, count: 0);
    }
}
