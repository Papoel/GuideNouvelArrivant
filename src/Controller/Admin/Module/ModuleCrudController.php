<?php

namespace App\Controller\Admin\Module;

use App\Entity\Module;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

/** @extends AbstractCrudController<Module> */
class ModuleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Module::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new(propertyName: 'id')
            ->hideOnForm()
            ->hideOnIndex();

        yield TextField::new(propertyName: 'title', label: 'Titre');

        yield TextEditorField::new(propertyName: 'description');

        yield AssociationField::new(propertyName: 'theme', label: 'Thème');
    }

    // Create Filter by theme (Just one select)
    public function configureFilters(Filters $filters): Filters
    {
        return $filters->add('theme');
    }
}
