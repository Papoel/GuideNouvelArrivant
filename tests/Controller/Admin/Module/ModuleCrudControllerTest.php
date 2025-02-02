<?php

namespace App\Tests\Controller\Admin\Module;

use App\Controller\Admin\Module\ModuleCrudController;
use App\Entity\Module;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ModuleCrudControllerTest extends KernelTestCase
{
    private ModuleCrudController $controller;

    protected function setUp(): void
    {
        self::bootKernel();
        $this->controller = new ModuleCrudController();
    }

    public function testGetEntityFqcn(): void
    {
        $this->assertEquals(Module::class, ModuleCrudController::getEntityFqcn());
    }

    public function testConfigureFields(): void
    {
        $fields = iterator_to_array($this->controller->configureFields('index'));

        $this->assertCount(4, $fields);

        // Test ID field
        $this->assertInstanceOf(IdField::class, $fields[0]);
        $this->assertEquals('id', $fields[0]->getAsDto()->getProperty());

        // Test Title field
        $this->assertInstanceOf(TextField::class, $fields[1]);
        $this->assertEquals('title', $fields[1]->getAsDto()->getProperty());
        $this->assertEquals('Titre', $fields[1]->getAsDto()->getLabel());

        // Test Description field
        $this->assertInstanceOf(TextEditorField::class, $fields[2]);
        $this->assertEquals('description', $fields[2]->getAsDto()->getProperty());

        // Test Theme field
        $this->assertInstanceOf(AssociationField::class, $fields[3]);
        $this->assertEquals('theme', $fields[3]->getAsDto()->getProperty());
        $this->assertEquals('Thème', $fields[3]->getAsDto()->getLabel());
    }
}
