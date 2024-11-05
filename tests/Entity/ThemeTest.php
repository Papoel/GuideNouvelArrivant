<?php

declare(strict_types=1);

namespace App\Tests\Entity;

use App\Entity\Logbook;
use App\Entity\Module;
use App\Entity\Theme;
use App\Tests\Abstract\EntityTestCase;
use App\Tests\Entity\Trait\EntityIdTestTrait;
use Doctrine\Common\Collections\Collection;
use PHPUnit\Framework\Attributes\Test;

class ThemeTest extends EntityTestCase
{
    use EntityIdTestTrait;

    private Theme $theme;
    public function setUp(): void
    {
        parent::setUp();
        $this->theme = new Theme();
    }
    protected function getEntity(): Theme
    {
        return $this->getEntityTheme();
    }
    protected function modifyEntity(object $entity): void
    {
        if (!$entity instanceof Theme) {
            throw new \InvalidArgumentException(message: 'Entity must be an instance of Theme');
        }

        $entity->setTitle(title: 'Nouveau Titre');
        $entity->setDescription(description: 'Nouvelle Description');
    }
    public function getEntityTheme(): Theme
    {
        $theme = new Theme();
        $theme->setTitle(title: 'Titre de test de theme');
        $theme->setDescription(description: "Une description de test pour un theme");
        return $theme;
    }
    public function testEntityThemeIsValid(): void
    {
        $this->assertValidationErrorsCount($this->getEntityTheme(), count: 0);
    }

    #[Test] public function initialState(): void
    {
        self::assertNull(actual: $this->theme->getId());
        self::assertNull(actual: $this->theme->getTitle());
        self::assertNull(actual: $this->theme->getDescription());
        self::assertInstanceOf(expected: Collection::class, actual: $this->theme->getLogbooks());
        self::assertInstanceOf(expected: Collection::class, actual: $this->theme->getModules());
        self::assertEquals(expected: 0, actual: $this->theme->getLogbooks()->count());
        self::assertEquals(expected: 0, actual: $this->theme->getModules()->count());
    }

    #[Test] public function setAndGetTitle(): void
    {
        $title = 'Test Title';
        $result = $this->theme->setTitle(title: $title);

        self::assertSame(expected: $title, actual: $this->theme->getTitle());
        self::assertSame(expected: $this->theme, actual: $result);
    }

    #[Test] public function setAndGetDescription(): void
    {
        $description = 'Test Description';
        $result = $this->theme->setDescription(description: $description);

        self::assertSame(expected: $description, actual: $this->theme->getDescription());
        self::assertSame(expected: $this->theme, actual: $result);
    }

    #[Test] public function addAndRemoveLogbook(): void
    {
        $logbook = new Logbook();

        // Test d'ajout du logbook
        $result = $this->theme->addLogbook(logbook: $logbook);

        self::assertSame($this->theme, $result);
        self::assertTrue(condition: $this->theme->getLogbooks()->contains(element: $logbook));
        self::assertTrue(condition: $logbook->getThemes()->contains(element: $this->theme));

        // Test d'ajout du même logbook deux fois
        $this->theme->addLogbook($logbook);
        self::assertEquals(expected: 1, actual: $this->theme->getLogbooks()->count());

        // Test suppression du logbook
        $result = $this->theme->removeLogbook(logbook: $logbook);

        self::assertSame(expected: $this->theme, actual: $result);
        self::assertFalse(condition: $this->theme->getLogbooks()->contains(element: $logbook));
        self::assertFalse(condition: $logbook->getThemes()->contains(element: $this->theme));
    }

    #[Test] public function addAndRemoveModule(): void
    {
        $module = new Module();

        // Test d'ajout du module
        $result = $this->theme->addModule(module: $module);

        self::assertSame(expected: $this->theme, actual: $result);
        self::assertTrue(condition: $this->theme->getModules()->contains($module));
        self::assertSame(expected: $this->theme, actual: $module->getTheme());

        // Test d'ajout du même module deux fois
        $this->theme->addModule(module: $module);
        self::assertEquals(expected: 1, actual: $this->theme->getModules()->count());

        // Test de suppression du module
        $result = $this->theme->removeModule(module: $module);

        self::assertSame(expected: $this->theme, actual: $result);
        self::assertFalse(condition: $this->theme->getModules()->contains($module));
        self::assertNull($module->getTheme());
    }

    #[Test] public function toStringReturnsTitle(): void
    {
        // Test sans titre
        self::assertEquals(expected: '', actual: (string)$this->theme);

        // Test avec un titre
        $title = 'Test Theme';
        $this->theme->setTitle(title: $title);
        self::assertEquals(expected: $title, actual: (string)$this->theme);
    }

    #[Test] public function collectionTypes(): void
    {
        self::assertInstanceOf(expected: Collection::class, actual: $this->theme->getLogbooks());
        self::assertInstanceOf(expected: Collection::class, actual: $this->theme->getModules());

        self::assertEquals(expected: 0, actual: $this->theme->getLogbooks()->count());
        self::assertEquals(expected: 0, actual: $this->theme->getModules()->count());
    }

    #[Test] public function moduleRemovalWithDifferentTheme(): void
    {
        $theme1 = new Theme();
        $theme2 = new Theme();
        $module = new Module();

        // Associer le module au theme2
        $theme2->addModule(module: $module);

        // Tenter de retirer le module du theme1
        $result = $theme1->removeModule(module: $module);

        // Vérifier que la méthode retourne bien l'instance de Theme
        self::assertSame(expected: $theme1, actual: $result);

        // Vérifier que le module n'est pas dans la collection de theme1
        self::assertFalse(condition: $theme1->getModules()->contains($module));

        // Vérifier que le module est toujours associé à theme2
        self::assertSame(expected: $theme2, actual: $module->getTheme());
        self::assertTrue(condition: $theme2->getModules()->contains($module));
    }
}
