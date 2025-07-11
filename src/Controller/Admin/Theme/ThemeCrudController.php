<?php

namespace App\Controller\Admin\Theme;

use App\Entity\Theme;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

/**
 * @extends AbstractCrudController<Theme>
 */
class ThemeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Theme::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new(propertyName: 'id')
                ->hideOnForm()
                ->hideOnIndex()
        ;

        yield TextField::new(propertyName: 'title', label: 'Titre');

        yield TextEditorField::new(propertyName: 'description');

        yield AssociationField::new(propertyName: 'modules', label: 'Nb de Modules')->onlyOnIndex();
    }
}
