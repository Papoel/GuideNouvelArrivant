<?php

namespace App\Controller\Admin\Job;

use App\Entity\Job;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;

/**
 * @extends AbstractCrudController<Job>
 */
class JobCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Job::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Métier')
            ->setEntityLabelInPlural('Métiers')
            ->setPageTitle('index', 'Gestion des métiers')
            ->setPageTitle('new', 'Ajouter un métier')
            ->setPageTitle('edit', fn(Job $job) => sprintf('Modifier le métier <strong>%s</strong>', $job->getName()))
            ->setPageTitle('detail', fn(Job $job) => sprintf('Détails du métier <strong>%s</strong>', $job->getName()))
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
                return $action->setIcon('fa fa-plus')->setLabel('Ajouter un métier')
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
                return $action->setLabel('Créer le métier')
                    ->setCssClass('btn btn-primary');
            });
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            FormField::addPanel('Informations du métier')
                ->setIcon('fa fa-briefcase')
                ->setHelp('Définissez les informations du métier.')
                ->setCssClass('content-panel'),

            IdField::new('id')
                ->hideOnForm()
                ->setLabel('ID')
                ->setCssClass('text-muted'),

            TextField::new('name')
                ->setLabel('Nom du métier')
                ->setHelp('Ex: Développeur, Chef de projet, Designer...')
                ->setRequired(true)
                ->setFormTypeOption('attr', [
                    'maxlength' => 80,
                    'placeholder' => 'Nom du métier'
                ])
                ->setCssClass('field-name'),

            TextField::new('code')
                ->setLabel('Code')
                ->setHelp('Code unique pour identifier le métier (max 5 caractères)')
                ->setRequired(true)
                ->setFormTypeOption('attr', [
                    'maxlength' => 40,
                    'placeholder' => 'Code du métier (ex: TECH, AGENT, CSI, MPL etc..)'
                ])
                ->setCssClass('field-code'),
        ];
    }
}
