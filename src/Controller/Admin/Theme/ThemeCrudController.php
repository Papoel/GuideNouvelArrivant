<?php

namespace App\Controller\Admin\Theme;

use App\Entity\Theme;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

/** @extends AbstractCrudController<Theme> */
class ThemeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Theme::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        // Thèmes partagés entre carnets : suppression réservée au SUPER_ADMIN
        return $actions
            ->setPermission(Action::DELETE, 'ROLE_SUPER_ADMIN')
            ->setPermission(Action::BATCH_DELETE, 'ROLE_SUPER_ADMIN');
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new(propertyName: 'id')
            ->hideOnForm()
            ->hideOnIndex();

        yield TextField::new(propertyName: 'title', label: 'Titre');

        yield TextEditorField::new(propertyName: 'description');

        yield AssociationField::new(propertyName: 'modules', label: 'Nb de Modules')->onlyOnIndex();
    }
}
