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
        yield IdField::new(propertyName: 'id')->onlyOnIndex();
        yield TextField::new(propertyName: 'name');
        yield AssociationField::new(propertyName: 'themes')
            ->setFormTypeOptions([
                'by_reference' => false,
            ])
        ;
        yield AssociationField::new(propertyName: 'users')
            ->setFormTypeOptions([
                'by_reference' => false,
            ])
        ;
    }
}
