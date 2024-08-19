<?php

namespace App\Controller\Admin\Theme;

use App\Entity\Theme;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ThemeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Theme::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new(propertyName: 'id')->onlyOnIndex(),
            TextField::new(propertyName: 'title'),
            TextEditorField::new(propertyName: 'description'),
        ];
    }
}
