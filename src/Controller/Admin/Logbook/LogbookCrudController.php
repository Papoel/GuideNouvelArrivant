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
        yield IdField::new(propertyName: 'id')
            ->hideOnForm()
            ->hideOnIndex()
        ;

        yield TextField::new(propertyName: 'name', label: 'Nom');

        yield AssociationField::new(propertyName: 'themes', label: 'Nb de Thèmes')
            ->setFormTypeOptions([
                'by_reference' => false,
            ])
        ;

        yield AssociationField::new(propertyName: 'users', label: 'Propriétaire')
            ->setFormTypeOptions([
                'by_reference' => false,
            ])
        ;
    }

    /*    public function configureActions(Actions $actions): Actions
        {
            $dump = Action::new(name: self::DUMP, label: 'Dump', icon: 'fa fa-dumpster')
                ->linkToCrudAction(crudActionName: 'dumpFunction')
                ->setCssClass(cssClass: 'btn btn-danger')
                ->setIcon(icon: 'fa fa-dumpster')
            ;

            return $actions
                ->add(pageName: Crud::PAGE_INDEX, actionNameOrObject: $dump);
        }*/

    /*    public function dumpFunction(AdminContext $context):void
        {
            $entity = $context->getEntity()->getInstance();
            // Get All Module for each theme in the logbook
            $themes = $entity->getThemes();
            $modules = [];

            foreach ($themes as $theme) {
                $modules[] = $theme->getModules();
            }

            // Afficher tous les modules
            // dd($modules);
        }*/
}
