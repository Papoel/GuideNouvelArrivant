<?php

namespace App\Controller\Admin\Logbook_Models;

use App\Entity\LogbookTemplate;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

/**
 * @template-extends AbstractCrudController<LogbookTemplate>
 */
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
            ->setPageTitle(pageName: Crud::PAGE_EDIT, title: 'Modifier un modèle de carnet')
            ->setPageTitle(pageName: Crud::PAGE_DETAIL, title: 'Détails du modèle de carnet')
            ->setSearchFields(fieldNames: ['name', 'description', 'service.name'])
            ->setDefaultSort(sortFieldsAndOrder: ['name' => 'ASC'])
            ->showEntityActionsInlined()
            ->setPaginatorPageSize(maxResultsPerPage: 10)
            ->setPaginatorRangeSize(maxPagesOnEachSide: 3)
            ->setHelp(pageName: Crud::PAGE_INDEX, helpMessage: 'Les modèles de carnet permettent de définir des structures prédéfinies de carnet d\'accueil pour différents métiers et services.')
            ->setHelp(pageName: Crud::PAGE_NEW, helpMessage: 'Créez un nouveau modèle de carnet en renseignant les informations ci-dessous.')
            ->setHelp(pageName: Crud::PAGE_EDIT, helpMessage: 'Modifiez les informations du modèle de carnet.');
    }

    public function configureFields(string $pageName): iterable
    {
        // Champs communs à toutes les pages
        if ($pageName === Crud::PAGE_INDEX) {
            yield TextField::new(propertyName: 'name', label: 'Nom du modèle');
            yield TextField::new(propertyName: 'jobLabel', label: 'Métiers concernés')
                ->formatValue(callable: function ($value, $entity) {
                    if (empty($value)) {
                        return '';
                    }

                    // Vérifier que l'entité est bien un LogbookTemplate
                    if (!$entity instanceof LogbookTemplate) {
                        return is_string($value) ? $value : '';
                    }

                    // Traitement des jobs
                    $jobs = $entity->getJobs();

                    // Si les jobs sont vides, retourner une chaîne vide
                    if (empty($jobs)) {
                        return '';
                    }

                    $badges = [];
                    $classes = [
                        'TECHNICIEN' => 'badge-info',
                        'INGENIEUR' => 'badge-primary',
                        'CHARGE_AFFAIRES' => 'badge-success',
                        'CHARGE_AFFAIRES_PROJET' => 'badge-warning',
                        'CHARGE_SURVEILLANCE' => 'badge-danger',
                    ];

                    $labels = [
                        'TECHNICIEN' => 'Technicien',
                        'INGENIEUR' => 'Ingénieur',
                        'CHARGE_AFFAIRES' => 'Chargé d\'affaires',
                        'CHARGE_AFFAIRES_PROJET' => 'CAP',
                        'CHARGE_SURVEILLANCE' => 'CSI',
                    ];

                    foreach ($jobs as $job) {
                        $badgeClass = $classes[$job] ?? 'badge-secondary';
                        $jobLabel = $labels[$job] ?? $job;
                        $badges[] = sprintf(
                            '<span class="badge %s rounded-pill me-1 fw-light">%s</span>',
                            $badgeClass,
                            htmlspecialchars(string: (string) $jobLabel)
                        );
                    }

                    return implode(separator: '', array: $badges);
                });
            yield AssociationField::new(propertyName: 'service', label: 'Service associé')->setCssClass(cssClass: 'text-center');
            yield AssociationField::new(propertyName: 'themes', label: 'Thèmes')->setCssClass(cssClass: 'text-center');

            return;
        }

        // Pour les pages de détail
        if ($pageName === Crud::PAGE_DETAIL) {
            // Panel Informations générales
            yield FormField::addPanel(label: 'Informations générales')
                ->setCssClass(cssClass: 'panel panel-info')
                ->setIcon(iconCssClass: 'fas fa-info-circle');

            // yield IdField::new(propertyName: 'id')->setLabel(label: 'ID');
            yield TextField::new(propertyName: 'name', label: 'Nom du modèle')
                ->setCssClass(cssClass: 'fw-bold fs-5');
            yield TextareaField::new(propertyName: 'description', label: 'Description')
                ->renderAsHtml();
            yield BooleanField::new(propertyName: 'isDefault', label: 'Modèle par défaut')
                ->renderAsSwitch(isASwitch: false)
                ->setHelp(help: 'Si activé, ce modèle est proposé par défaut');

            // Panel Service et Métiers
            yield FormField::addPanel(label: 'Service et Métiers')
                ->setCssClass(cssClass: 'panel panel-secondary mt-3')
                ->setIcon(iconCssClass: 'fas fa-building');

            yield AssociationField::new(propertyName: 'service', label: 'Service associé')
                ->setTemplatePath('admin/field/service_detail.html.twig');

            yield TextField::new(propertyName: 'jobLabel', label: 'Métiers concernés')
                ->formatValue(callable: function ($value, $entity) {
                    if (!$entity instanceof LogbookTemplate || empty($entity->getJobs())) {
                        return '<span class="badge bg-secondary">Aucun métier défini</span>';
                    }

                    $badges = [];
                    $classes = [
                        'TECHNICIEN' => 'bg-info-subtle text-info-emphasis',
                        'INGENIEUR' => 'bg-primary-subtle text-primary-emphasis',
                        'CHARGE_AFFAIRES' => 'bg-success-subtle text-success-emphasis',
                        'CHARGE_AFFAIRES_PROJET' => 'bg-warning-subtle text-warning-emphasis',
                        'CHARGE_SURVEILLANCE' => 'bg-danger-subtle text-danger-emphasis',
                    ];

                    $labels = [
                        'TECHNICIEN' => 'Technicien',
                        'INGENIEUR' => 'Ingénieur',
                        'CHARGE_AFFAIRES' => 'Chargé d\'affaires',
                        'CHARGE_AFFAIRES_PROJET' => 'CAP',
                        'CHARGE_SURVEILLANCE' => 'CSI',
                    ];

                    foreach ($entity->getJobs() as $job) {
                        $badgeClass = $classes[$job] ?? 'bg-secondary';
                        $jobLabel = $labels[$job] ?? $job;
                        $badges[] = sprintf(
                            '<span class="badge %s rounded-pill me-2 py-1 px-2">%s</span>',
                            $badgeClass,
                            htmlspecialchars(string: (string) $jobLabel)
                        );
                    }

                    return implode('', $badges);
                })
                ->setTextAlign('left');

            // Panel Thèmes associés
            yield FormField::addPanel(label: 'Thèmes associés')
                ->setCssClass(cssClass: 'panel panel-success mt-3')
                ->setIcon(iconCssClass: 'fas fa-list-ul');

            yield AssociationField::new(propertyName: 'themes', label: 'Thèmes')
                ->setTemplatePath('admin/field/themes_detail.html.twig');

            return;
        }

        // Pour les pages d'édition et de création
        // Panel Informations de base
        yield FormField::addPanel(label: 'Informations générales')
            ->setCssClass(cssClass: 'panel-modern bg-light rounded p-4 mb-4')
            ->setIcon(iconCssClass: 'fas fa-info-circle text-success');

        yield TextField::new(propertyName: 'name', label: 'Nom du modèle')
            ->setRequired(isRequired: true)
            ->setHelp(help: 'Le nom qui sera affiché pour ce modèle de carnet')
            ->setColumns(cols: 'col-md-6')
            ->setFormTypeOption(optionName: 'attr', optionValue: [
                'placeholder' => 'Ex: Modèle standard technicien',
                'maxlength' => 100,
                'class' => 'form-control-lg'
            ]);

        yield TextareaField::new(propertyName: 'description', label: 'Description')
            ->setRequired(isRequired: false)
            ->setHelp(help: 'Une description détaillée de ce modèle de carnet')
            ->setColumns(cols: 'col-md-6')
            ->setFormTypeOption(optionName: 'attr', optionValue: [
                'placeholder' => 'Décrivez ce modèle de carnet et son utilisation...',
                'rows' => 5,
                'class' => 'form-control border-light-subtle'
            ]);

        yield BooleanField::new(propertyName: 'isDefault', label: 'Modèle par défaut')
            ->setHelp(help: 'Cochez cette case si ce modèle doit être proposé par défaut')
            ->setColumns(cols: 'col-md-6')
            ->renderAsSwitch();

        // Panel Associations
        yield FormField::addPanel(label: 'Service associé')
            ->setCssClass(cssClass: 'panel-modern bg-light rounded p-4 mb-4')
            ->setIcon(iconCssClass: 'fas fa-building text-success');

        yield AssociationField::new(propertyName: 'service', label: 'Service')
            ->setRequired(isRequired: false)
            ->setHelp(help: 'Service auquel ce modèle de carnet est associé')
            ->setColumns(cols: 'col-md-6')
            ->setFormTypeOption(optionName: 'attr', optionValue: [
                'class' => 'form-select'
            ]);

        // Panel Thèmes
        yield FormField::addPanel(label: 'Thèmes')
            ->setCssClass(cssClass: 'panel-modern bg-light rounded p-4 mb-4')
            ->setIcon(iconCssClass: 'fas fa-list-alt text-success');

        yield AssociationField::new(propertyName: 'themes', label: 'Thèmes associés')
            ->setHelp(help: 'Sélectionnez les thèmes qui seront inclus dans ce modèle')
            ->setColumns(cols: 'col-md-12')
            ->setFormTypeOptions(options: [
                'by_reference' => false,
                'multiple' => true,
            ])
            ->setTemplatePath('admin/field/themes_selection.html.twig');

        // Panel Métiers concernés
        yield FormField::addPanel(label: 'Métiers concernés')
            ->setCssClass(cssClass: 'panel-modern bg-light rounded p-4 mb-4')
            ->setIcon(iconCssClass: 'fas fa-user-tie text-success');

        yield ChoiceField::new(propertyName: 'jobs', label: 'Métiers applicables')
            ->setChoices(choiceGenerator: [
                'Technicien' => 'TECHNICIEN',
                'Ingénieur' => 'INGENIEUR',
                'Chargé d\'affaires' => 'CHARGE_AFFAIRES',
                'Chargé d\'affaires projet' => 'CHARGE_AFFAIRES_PROJET',
                'Chargé de surveillance' => 'CHARGE_SURVEILLANCE',
            ])
            ->allowMultipleChoices()
            ->renderExpanded()
            ->setHelp(help: 'Sélectionnez un ou plusieurs métiers pour lesquels ce modèle sera disponible')
            ->setColumns(cols: 'col-md-12')
            ->setFormTypeOption(optionName: 'attr', optionValue: [
                'class' => 'jobs-selection'
            ]);
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add(propertyNameOrFilter: 'name')
            ->add(propertyNameOrFilter: 'service')
            ->add(propertyNameOrFilter: 'isDefault')
            ->add(propertyNameOrFilter: 'jobs');
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->add(pageName: Crud::PAGE_INDEX, actionNameOrObject: Action::DETAIL)
            ->update(pageName: Crud::PAGE_INDEX, actionName: Action::NEW, callable: function (Action $action) {
                return $action->setIcon(icon: 'fa fa-plus')->setLabel(label: 'Ajouter un modèle');
            })
            ->update(pageName: Crud::PAGE_INDEX, actionName: Action::EDIT, callable: function (Action $action) {
                return $action->setIcon(icon: 'fa fa-edit')->setLabel(label: 'Modifier');
            })
            ->update(pageName: Crud::PAGE_INDEX, actionName: Action::DELETE, callable: function (Action $action) {
                return $action->setIcon(icon: 'fa fa-trash')->setLabel(label: 'Supprimer');
            })
            ->update(pageName: Crud::PAGE_INDEX, actionName: Action::DETAIL, callable: function (Action $action) {
                return $action->setIcon(icon: 'fa fa-eye')->setLabel(label: 'Voir');
            })
            ->update(pageName: Crud::PAGE_EDIT, actionName: Action::SAVE_AND_RETURN, callable: function (Action $action) {
                return $action->setLabel(label: 'Enregistrer les modifications');
            })
            ->update(pageName: Crud::PAGE_NEW, actionName: Action::SAVE_AND_RETURN, callable: function (Action $action) {
                return $action->setLabel(label: 'Créer le modèle');
            })
            ->update(pageName: Crud::PAGE_EDIT, actionName: Action::SAVE_AND_CONTINUE, callable: function (Action $action) {
                return $action->setLabel(label: 'Enregistrer et continuer l\'édition');
            });
    }
}
