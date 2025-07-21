<?php

namespace App\Tests\Controller\Admin\Logbook;

use App\Controller\Admin\Logbook\LogbookCrudController;
use App\Entity\Logbook;
use App\Repository\ActionRepository;
use App\Services\Logbook\LogbookThemeService;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class LogbookCrudControllerTest extends KernelTestCase
{
    private LogbookCrudController $controller;

    protected function setUp(): void
    {
        self::bootKernel();
        $container = static::getContainer();

        $logbookThemeService = $container->get(LogbookThemeService::class);
        $entityManager = $container->get(EntityManagerInterface::class);
        $actionRepository = $container->get(ActionRepository::class);

        $this->controller = new LogbookCrudController(
            $logbookThemeService,
            $entityManager,
            $actionRepository
        );
    }

    public function testGetEntityFqcn(): void
    {
        $this->assertEquals(Logbook::class, LogbookCrudController::getEntityFqcn());
    }

    public function testConfigureFieldsForIndexPage(): void
    {
        $fields = $this->controller->configureFields('index');
        $fieldsArray = iterator_to_array($fields);

        $this->assertCount(3, $fieldsArray);

        // Test Name field (indice 0)
        $this->assertInstanceOf(TextField::class, $fieldsArray[0]);
        $this->assertEquals('name', $fieldsArray[0]->getAsDto()->getProperty());
        $this->assertEquals('Nom du carnet', $fieldsArray[0]->getAsDto()->getLabel());

        // Test Owner field (indice 1)
        $this->assertInstanceOf(AssociationField::class, $fieldsArray[1]);
        $this->assertEquals('owner', $fieldsArray[1]->getAsDto()->getProperty());
        $this->assertEquals('Propriétaire du carnet', $fieldsArray[1]->getAsDto()->getLabel());

        // Test Themes field (indice 2)
        $this->assertInstanceOf(AssociationField::class, $fieldsArray[2]);
        $this->assertEquals('themes', $fieldsArray[2]->getAsDto()->getProperty());
        $this->assertEquals('Nb de thèmes', $fieldsArray[2]->getAsDto()->getLabel());

        // Vérification des options du formulaire pour le champ themes
        $formTypeOptions = $fieldsArray[2]->getAsDto()->getFormTypeOptions();
        $this->assertArrayHasKey('by_reference', $formTypeOptions);
        $this->assertFalse($formTypeOptions['by_reference']);
    }

    public function testConfigureFieldsForEditPage(): void
    {
        $fields = $this->controller->configureFields('edit');
        $fieldsArray = iterator_to_array($fields);

        $this->assertCount(3, $fieldsArray);

        // Test Themes field for edit page
        $themesField = $fieldsArray[2];
        $this->assertInstanceOf(AssociationField::class, $themesField);
        $this->assertEquals('themes', $themesField->getAsDto()->getProperty());
        $this->assertEquals('Thèmes associés', $themesField->getAsDto()->getLabel());
        $this->assertArrayHasKey('by_reference', $themesField->getAsDto()->getFormTypeOptions());
        $this->assertFalse($themesField->getAsDto()->getFormTypeOptions()['by_reference']);
    }
}
