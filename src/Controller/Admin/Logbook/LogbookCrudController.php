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
            IdField::new(propertyName: 'id')->hideOnForm(),
            TextField::new(propertyName: 'name')->setLabel(label: 'Nom du carnet')->onlyOnIndex(),
            AssociationField::new(propertyName: 'owner', label: 'Propriétaire du carnet'),
            AssociationField::new(propertyName: 'themes', label: 'index' === $pageName ? 'Nb de thèmes' : 'Thèmes associés')
                ->setFormTypeOptions([
                    'by_reference' => false,
                ]),
        ];
    }
}
