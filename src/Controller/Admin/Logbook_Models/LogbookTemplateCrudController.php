<?php

namespace App\Controller\Admin\Logbook_Models;

use App\Entity\Job;
use App\Entity\LogbookTemplate;
use App\Enum\JobEnum;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

/**
 * @template-extends AbstractCrudController<LogbookTemplate>
 */
class LogbookTemplateCrudController extends AbstractCrudController
{
    public function __construct(
        private EntityManagerInterface $entityManager
    ) {
    }

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
        if ($pageName === Crud::PAGE_INDEX) {
            yield TextField::new(propertyName: 'name', label: 'Nom du modèle');

            yield BooleanField::new(propertyName: 'isGlobal', label: 'Global')
                ->renderAsSwitch(isASwitch: false)
                ->setHelp(help: 'Modèle disponible pour tous les services');

            yield TextField::new(propertyName: 'jobLabel', label: 'Métiers concernés')
                ->formatValue(callable: function ($value, $entity) {
                    if (!$entity instanceof LogbookTemplate || empty($entity->getJobs())) {
                        return '';
                    }

                    $jobCodes = $entity->getJobs();

                    // Filtrer les valeurs nulles
                    $jobCodes = array_filter($jobCodes, fn($code) => $code !== null);

                    $badges = [];

                    // Mapping des abréviations vers les classes CSS
                    $badgeClasses = [
                        'APP' => 'badge-info',
                        'TECH' => 'badge-info',
                        'AGENT' => 'badge-info',
                        'CSI' => 'badge-danger',
                        'CA' => 'badge-success',
                        'CAP' => 'badge-warning',
                        'ING' => 'badge-primary',
                        'MPL' => 'badge-dark',
                        'MPLD' => 'badge-dark',
                    ];

                    // Utiliser JobEnum pour récupérer les noms des métiers
                    foreach ($jobCodes as $jobCode) {
                        // Essayer de trouver le JobEnum correspondant
                        $jobEnum = $this->findJobEnumByCode($jobCode);

                        if ($jobEnum) {
                            $abbreviation = $jobEnum->getAbbreviation();
                            $jobName = $jobEnum->value;
                            $badgeClass = $badgeClasses[$abbreviation] ?? 'badge-secondary';

                            $badges[] = sprintf(
                                '<span class="badge %s rounded-pill me-1 fw-light">%s</span>',
                                $badgeClass,
                                htmlspecialchars($jobName)
                            );
                        } else {
                            // Fallback si le code n'est pas trouvé dans l'enum
                            $badges[] = sprintf(
                                '<span class="badge badge-secondary rounded-pill me-1 fw-light">%s</span>',
                                htmlspecialchars((string)$jobCode)
                            );
                        }
                    }

                    return implode('', $badges);
                })
                ->onlyOnIndex();



            yield AssociationField::new(propertyName: 'service', label: 'Service associé')
                ->setCssClass(cssClass: 'text-center')
                ->formatValue(callable: function ($value, $entity) {
                    if (!$entity instanceof LogbookTemplate) {
                        return $value;
                    }

                    if ($entity->isIsGlobal()) {
                        return '<span class="badge bg-primary text-light rounded-pill">Tous les services</span>';
                    }

                    return $value ?: '<span class="badge bg-secondary rounded-pill">Non défini</span>';
                });

            yield AssociationField::new(propertyName: 'themes', label: 'Thèmes')->setCssClass(cssClass: 'text-center');

            return;
        }

        if ($pageName === Crud::PAGE_DETAIL) {
            yield FormField::addPanel(label: 'Informations générales')
                ->setCssClass(cssClass: 'panel panel-info')
                ->setIcon(iconCssClass: 'fas fa-info-circle');

            yield TextField::new(propertyName: 'name', label: 'Nom du modèle')
                ->setCssClass(cssClass: 'fw-bold fs-5');
            yield TextareaField::new(propertyName: 'description', label: 'Description')
                ->renderAsHtml();
            yield BooleanField::new(propertyName: 'isDefault', label: 'Modèle par défaut')
                ->renderAsSwitch(isASwitch: false)
                ->setHelp(help: 'Si activé, ce modèle est proposé par défaut');
            yield BooleanField::new(propertyName: 'isGlobal', label: 'Modèle global')
                ->renderAsSwitch(isASwitch: false)
                ->setHelp(help: 'Si activé, ce modèle est disponible pour tous les services');

            yield FormField::addPanel(label: 'Service et Métiers')
                ->setCssClass(cssClass: 'panel panel-secondary mt-3')
                ->setIcon(iconCssClass: 'fas fa-building');

            yield AssociationField::new(propertyName: 'service', label: 'Service associé')
                ->setTemplatePath('admin/field/service_detail.html.twig')
                ->formatValue(callable: function ($value, $entity) {
                    if (!$entity instanceof LogbookTemplate) {
                        return $value;
                    }

                    if ($entity->isIsGlobal()) {
                        return '<span class="badge bg-primary fs-6 px-3 py-2">Tous les services (Modèle global)</span>';
                    }

                    return $value;
                });

            yield TextField::new(propertyName: 'jobLabel', label: 'Métiers concernés')
                ->formatValue(callable: function ($value, $entity) {
                    if (!$entity instanceof LogbookTemplate || empty($entity->getJobs())) {
                        return '<span class="badge bg-secondary">Aucun métier défini</span>';
                    }

                    $badges = [];
                    $classes = [
                        'TECH' => 'bg-info-subtle text-info-emphasis',
                        'APP' => 'bg-primary-subtle text-primary-emphasis',
                        'ING' => 'bg-primary-subtle text-primary-emphasis',
                        'CA' => 'bg-success-subtle text-success-emphasis',
                        'CAP' => 'bg-warning-subtle text-warning-emphasis',
                        'CSI' => 'bg-danger-subtle text-danger-emphasis',
                        'MPL' => 'bg-dark text-white',
                    ];

                    $jobCodes = $entity->getJobs();
                    $jobRepository = $this->entityManager->getRepository(Job::class);
                    $jobs = $jobRepository->findBy(['code' => $jobCodes]);

                    if (empty($jobs)) {
                        foreach ($jobCodes as $jobCode) {
                            $badgeClass = $classes[$jobCode] ?? 'bg-secondary';
                            $badges[] = sprintf(
                                '<span class="badge %s rounded-pill me-2 py-1 px-2">%s</span>',
                                $badgeClass,
                                htmlspecialchars(string: (string)$jobCode)
                            );
                        }
                    } else {
                        foreach ($jobs as $job) {
                            $jobCode = $job->getCode();
                            $jobName = $job->getName();
                            $badgeClass = $classes[$jobCode] ?? 'bg-secondary';

                            $badges[] = sprintf(
                                '<span class="badge %s rounded-pill me-2 py-1 px-2">%s</span>',
                                $badgeClass,
                                htmlspecialchars(string: (string)$jobName)
                            );
                        }
                    }

                    return implode('', $badges);
                })
                ->setTextAlign('left');

            yield FormField::addPanel(label: 'Thèmes associés')
                ->setCssClass(cssClass: 'panel panel-success mt-3')
                ->setIcon(iconCssClass: 'fas fa-list-ul');

            yield AssociationField::new(propertyName: 'themes', label: 'Thèmes')
                ->setTemplatePath('admin/field/themes_detail.html.twig');

            return;
        }

        yield FormField::addPanel(label: 'Informations générales')
            ->setCssClass(cssClass: 'panel-modern bg-light rounded p-4 mb-4')
            ->setIcon(iconCssClass: 'fas fa-info-circle text-success');

        yield TextField::new(propertyName: 'name', label: 'Nom du modèle')
            ->setRequired(isRequired: true)
            ->setHelp(help: 'Service + Nom du modèle')
            ->setColumns(cols: 'col-md-6')
            ->setFormTypeOption(optionName: 'attr', optionValue: [
                'placeholder' => 'Ex: MRC - Modèle standard technicien',
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

        yield FormField::addPanel(label: 'Service associé')
            ->setCssClass(cssClass: 'panel-modern bg-light rounded p-4 mb-4')
            ->setIcon(iconCssClass: 'fas fa-building text-success');

        yield AssociationField::new(propertyName: 'service', label: 'Service')
            ->setRequired(isRequired: false)
            ->setHelp(help: 'Service auquel ce modèle de carnet est associé (laissez vide si le modèle est global)')
            ->setColumns(cols: 'col-md-6')
            ->setFormTypeOption(optionName: 'attr', optionValue: [
                'class' => 'form-select',
                'data-service-field' => 'true'
            ]);

        yield BooleanField::new(propertyName: 'isGlobal', label: 'Modèle global (tous les services)')
            ->setHelp(help: 'Cochez cette case si ce modèle doit être disponible pour tous les services (ex: managers)')
            ->setColumns(cols: 'col-md-6')
            ->renderAsSwitch()
            ->setFormTypeOption(optionName: 'attr', optionValue: [
                'data-toggle-service' => 'true'
            ]);

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

        yield FormField::addPanel(label: 'Métiers concernés')
            ->setCssClass(cssClass: 'panel-modern bg-light rounded p-4 mb-4')
            ->setIcon(iconCssClass: 'fas fa-user-tie text-success');

        yield ChoiceField::new(propertyName: 'jobs', label: 'Métiers applicables')
            ->setChoices(function () {
                $jobRepository = $this->entityManager->getRepository(Job::class);
                $jobs = $jobRepository->findBy([], ['name' => 'ASC']);

                $choices = [];
                foreach ($jobs as $job) {
                    $choices[$job->getName()] = $job->getCode();
                }

                return $choices;
            })
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
            ->add(propertyNameOrFilter: 'isGlobal')
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

    /**
     * Trouve un JobEnum à partir de son code (abréviation)
     */
    private function findJobEnumByCode(string $code): ?JobEnum
    {
        foreach (JobEnum::cases() as $jobEnum) {
            if ($jobEnum->getAbbreviation() === $code) {
                return $jobEnum;
            }
        }
        return null;
    }
}
