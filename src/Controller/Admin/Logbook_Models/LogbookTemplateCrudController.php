<?php

namespace App\Controller\Admin\Logbook_Models;

use App\Enum\JobEnum;
use App\Entity\LogbookTemplate;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use App\Form\DataTransformer\JobsArrayTransformer;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class LogbookTemplateCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return LogbookTemplate::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle(pageName: Crud::PAGE_INDEX, title: 'Modèles de carnet')
            ->setPageTitle(pageName: Crud::PAGE_NEW, title: 'Créer un modèle de carnet')
            ->setPageTitle(pageName: Crud::PAGE_EDIT, title: 'Modifier un modèle de carnet');
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->hideOnForm();
        yield TextField::new('name');
        yield TextEditorField::new('description');
        yield AssociationField::new('themes');
        yield BooleanField::new('isDefault', 'Modèle par défaut');

        // Affichage des métiers dans la liste
        yield TextField::new(propertyName: 'jobLabel', label: 'Métiers')->onlyOnIndex();

        // Utilisation d'un ChoiceField simple pour les métiers
        if ($pageName === Crud::PAGE_NEW || $pageName === Crud::PAGE_EDIT) {
            yield ChoiceField::new('jobs', 'Métiers')
                ->setChoices([
                    'Technicien' => 'TECHNICIEN',
                    'Ingénieur' => 'INGENIEUR',
                    "Chargé d'affaires" => 'CHARGE_AFFAIRES',
                    "Chargé d'affaires projet" => 'CHARGE_AFFAIRES_PROJET',
                    'Chargé de surveillance' => 'CHARGE_SURVEILLANCE',
                ])
                ->allowMultipleChoices()
                ->renderExpanded()
                ->setColumns('col-md-6 col-sm-12');
        }
    }
}
