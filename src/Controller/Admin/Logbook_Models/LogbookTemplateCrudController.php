<?php

namespace App\Controller\Admin\Logbook_Models;

use App\Entity\LogbookTemplate;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

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
            ->setPageTitle(pageName: Crud::PAGE_EDIT, title: 'Modifier un modèle de carnet');
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('name');
        yield AssociationField::new('themes')->setCssClass('text-center');
        yield AssociationField::new('service', 'Service')->setRequired(false);
        yield TextField::new('jobLabel', 'Métiers')
            ->onlyOnIndex()
            ->formatValue(function ($value, $entity) {
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
                        htmlspecialchars((string) $jobLabel)
                    );
                }

                return implode('', $badges);
            });

        // Utilisation d'un ChoiceField simple pour les métiers
        if ($pageName === Crud::PAGE_NEW || $pageName === Crud::PAGE_EDIT) {
            yield ChoiceField::new('jobs', 'Métiers')
                ->setChoices([
                    'Technicien' => 'TECHNICIEN',
                    'Ingénieur' => 'INGENIEUR',
                    'Chargé d\'affaires' => 'CHARGE_AFFAIRES',
                    'Chargé d\'affaires projet' => 'CHARGE_AFFAIRES_PROJET',
                    'Chargé de surveillance' => 'CHARGE_SURVEILLANCE',
                ])
                ->allowMultipleChoices()
                ->renderExpanded()
                ->setColumns('col-md-6 col-sm-12');
        }
    }
}
