<?php

namespace App\Controller\Admin\Logbook;

use App\Entity\Logbook;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class LogbookCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Logbook::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new(propertyName: 'id')->onlyOnIndex(),
            TextField::new(propertyName: 'name'),

            // TODO: Vérifier pourquoi les thèmes ne s'enregistrent pas
            AssociationField::new(propertyName: 'themes'),
        ];
    }
}
