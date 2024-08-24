<?php

namespace App\Controller\Admin\Action;

use App\Entity\Action;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

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
        // yield DateTimeField::new(propertyName: 'agentValidatedAt')->hideOnIndex();
        yield BooleanField::new(propertyName: 'AgentValidated')
            ->setLabel(label: 'Validation Agent')
            ->onlyOnIndex();

        yield AssociationField::new(propertyName: 'module');

        // TODO: Créer une fonction pour obtenir un BooleanField sur la page index
        yield TextField::new(propertyName: 'agentVisa');
        yield TextField::new(propertyName: 'mentorVisa');
    }
}
