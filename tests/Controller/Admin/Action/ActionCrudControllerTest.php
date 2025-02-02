<?php

namespace App\Tests\Controller\Admin\Action;

use App\Controller\Admin\Action\ActionCrudController;
use App\Entity\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use PHPUnit\Framework\TestCase;

class ActionCrudControllerTest extends TestCase
{
    private ActionCrudController $controller;

    protected function setUp(): void
    {
        $this->controller = new ActionCrudController();
    }

    public function testGetEntityFqcn(): void
    {
        $this->assertEquals(Action::class, ActionCrudController::getEntityFqcn());
    }

    public function testConfigureFields(): void
    {
        $fields = iterator_to_array($this->controller->configureFields('index'));

        $this->assertCount(6, $fields);
        
        $this->assertInstanceOf(IdField::class, $fields[0]);
        $this->assertEquals('id', $fields[0]->getAsDto()->getProperty());
        
        $this->assertInstanceOf(TextareaField::class, $fields[1]);
        $this->assertEquals('description', $fields[1]->getAsDto()->getProperty());
        
        $this->assertInstanceOf(BooleanField::class, $fields[2]);
        $this->assertEquals('AgentValidated', $fields[2]->getAsDto()->getProperty());
        $this->assertEquals('Validation Agent', $fields[2]->getAsDto()->getLabel());
        
        $this->assertInstanceOf(AssociationField::class, $fields[3]);
        $this->assertEquals('module', $fields[3]->getAsDto()->getProperty());
        
        $this->assertInstanceOf(TextField::class, $fields[4]);
        $this->assertEquals('agentVisa', $fields[4]->getAsDto()->getProperty());
        
        $this->assertInstanceOf(TextField::class, $fields[5]);
        $this->assertEquals('mentorVisa', $fields[5]->getAsDto()->getProperty());
    }
}
