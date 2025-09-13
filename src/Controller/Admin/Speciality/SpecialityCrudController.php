<?php

namespace App\Controller\Admin\Speciality;

use App\Entity\Speciality;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;

/**
 * @extends AbstractCrudController<Speciality>
 */
class SpecialityCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Speciality::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Spécialité')
            ->setEntityLabelInPlural('Spécialités')
            ->setPageTitle('index', 'Gestion des spécialités')
            ->setPageTitle('new', 'Ajouter une spécialité')
            ->setPageTitle('edit', fn(Speciality $speciality) => sprintf('Modifier la spécialité <strong>%s</strong>', $speciality->getName()))
            ->setPageTitle('detail', fn(Speciality $speciality) => sprintf('Détails de la spécialité <strong>%s</strong>', $speciality->getName()))
            ->setSearchFields(['name', 'code'])
            ->setDefaultSort(['name' => 'ASC'])
            ->showEntityActionsInlined()
            ->setFormThemes([
                '@EasyAdmin/crud/form_theme.html.twig',
                'admin/form_theme.html.twig'
            ])
            ->addFormTheme('admin/form_theme.html.twig');
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->add(Crud::PAGE_INDEX, Action::DETAIL)
            ->update(Crud::PAGE_INDEX, Action::NEW, function (Action $action) {
                return $action->setIcon('fa fa-plus')->setLabel('Ajouter une spécialité')
                    ->setCssClass('btn btn-primary');
            })
            ->update(Crud::PAGE_INDEX, Action::EDIT, function (Action $action) {
                return $action->setIcon('fa fa-edit')->setLabel('Modifier');
            })
            ->update(Crud::PAGE_INDEX, Action::DETAIL, function (Action $action) {
                return $action->setIcon('fa fa-eye')->setLabel('Voir');
            })
            ->update(Crud::PAGE_INDEX, Action::DELETE, function (Action $action) {
                return $action->setIcon('fa fa-trash')->setLabel('Supprimer');
            })
            ->update(Crud::PAGE_EDIT, Action::SAVE_AND_RETURN, function (Action $action) {
                return $action->setLabel('Enregistrer les modifications')
                    ->setCssClass('btn btn-primary');
            })
            ->update(Crud::PAGE_NEW, Action::SAVE_AND_RETURN, function (Action $action) {
                return $action->setLabel('Créer la spécialité')
                    ->setCssClass('btn btn-primary');
            });
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            FormField::addPanel('Informations de la spécialité')
                ->setIcon('fa fa-tag')
                ->setHelp('Définissez les informations de la spécialité.')
                ->setCssClass('content-panel'),

            IdField::new('id')
                ->hideOnForm()
                ->setLabel('ID')
                ->setCssClass('text-muted'),

            TextField::new('name')
                ->setLabel('Nom de la spécialité')
                ->setHelp('Ex: Frontend, Backend, DevOps...')
                ->setRequired(true)
                ->setFormTypeOption('attr', [
                    'maxlength' => 80,
                    'placeholder' => 'Nom de la spécialité'
                ])
                ->setCssClass('field-name'),

            TextField::new('code')
                ->setLabel('Code')
                ->setHelp('Code unique pour identifier la spécialité (max 5 caractères)')
                ->setRequired(true)
                ->setFormTypeOption('attr', [
                    'maxlength' => 40,
                    'placeholder' => 'Code de la spécialité (ex: MEC, ROB, CHA, SOU etc...)'
                ])
                ->setCssClass('field-code'),
        ];
    }
}
