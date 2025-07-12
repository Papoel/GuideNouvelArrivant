<?php

namespace App\Controller\Admin\Action;

use App\Entity\Action;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

/** @extends AbstractCrudController<Action> */
class ActionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Action::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new(propertyName: 'id')->hideOnForm();

        yield TextareaField::new(propertyName: 'description');

        yield BooleanField::new(propertyName: 'AgentValidated')
            ->setLabel(label: 'Validation Agent')
            ->onlyOnIndex();

        yield AssociationField::new(propertyName: 'module');

        yield TextField::new(propertyName: 'agentVisa');

        yield TextField::new(propertyName: 'mentorVisa');
    }
}
