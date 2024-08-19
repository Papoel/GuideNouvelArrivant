<?php

namespace App\Controller\Admin\Module;

use App\Entity\Module;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ModuleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Module::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new(propertyName: 'id')->onlyOnIndex();
        yield TextField::new(propertyName: 'title');
        yield TextEditorField::new(propertyName: 'description');
        yield AssociationField::new(propertyName: 'theme');
    }
}
