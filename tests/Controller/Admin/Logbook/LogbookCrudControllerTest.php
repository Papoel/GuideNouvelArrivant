<?php

namespace App\Tests\Controller\Admin\Logbook;

use App\Controller\Admin\Logbook\LogbookCrudController;
use App\Entity\Logbook;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class LogbookCrudControllerTest extends KernelTestCase
{
    private LogbookCrudController $controller;

    protected function setUp(): void
    {
        self::bootKernel();
        $this->controller = new LogbookCrudController();
    }

    public function testGetEntityFqcn(): void
    {
        $this->assertEquals(Logbook::class, LogbookCrudController::getEntityFqcn());
    }

    public function testConfigureFieldsForIndexPage(): void
    {
        $fields = $this->controller->configureFields('index');
        $fieldsArray = iterator_to_array($fields);

        $this->assertCount(4, $fieldsArray);

        // Test ID field
        $this->assertInstanceOf(IdField::class, $fieldsArray[0]);
        $this->assertEquals('id', $fieldsArray[0]->getAsDto()->getProperty());

        // Test Name field
        $this->assertInstanceOf(TextField::class, $fieldsArray[1]);
        $this->assertEquals('name', $fieldsArray[1]->getAsDto()->getProperty());
        $this->assertEquals('Nom du carnet', $fieldsArray[1]->getAsDto()->getLabel());

        // Test Owner field
        $this->assertInstanceOf(AssociationField::class, $fieldsArray[2]);
        $this->assertEquals('owner', $fieldsArray[2]->getAsDto()->getProperty());
        $this->assertEquals('Propriétaire du carnet', $fieldsArray[2]->getAsDto()->getLabel());

        // Test Themes field for index page
        $this->assertInstanceOf(AssociationField::class, $fieldsArray[3]);
        $this->assertEquals('themes', $fieldsArray[3]->getAsDto()->getProperty());
        $this->assertEquals('Nb de thèmes', $fieldsArray[3]->getAsDto()->getLabel());
        $this->assertArrayHasKey('by_reference', $fieldsArray[3]->getAsDto()->getFormTypeOptions());
        $this->assertFalse($fieldsArray[3]->getAsDto()->getFormTypeOptions()['by_reference']);
    }

    public function testConfigureFieldsForEditPage(): void
    {
        $fields = $this->controller->configureFields('edit');
        $fieldsArray = iterator_to_array($fields);

        $this->assertCount(4, $fieldsArray);

        // Test Themes field for edit page
        $themesField = $fieldsArray[3];
        $this->assertInstanceOf(AssociationField::class, $themesField);
        $this->assertEquals('themes', $themesField->getAsDto()->getProperty());
        $this->assertEquals('Thèmes associés', $themesField->getAsDto()->getLabel());
        $this->assertArrayHasKey('by_reference', $themesField->getAsDto()->getFormTypeOptions());
        $this->assertFalse($themesField->getAsDto()->getFormTypeOptions()['by_reference']);
    }
}
