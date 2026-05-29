<?php

namespace App\Controller\Admin;

use App\Controller\Admin\Job\JobCrudController;
use App\Controller\Admin\Logbook_Models\LogbookTemplateCrudController;
use App\Controller\Admin\Logbook\LogbookCrudController;
use App\Controller\Admin\Module\ModuleCrudController;
use App\Controller\Admin\Service\ServiceCrudController;
use App\Controller\Admin\Speciality\SpecialityCrudController;
use App\Controller\Admin\Theme\ThemeCrudController;
use App\Controller\Admin\User\UserCrudController;
use App\Entity\Job;
use App\Entity\Logbook;
use App\Entity\LogbookTemplate;
use App\Entity\Module;
use App\Entity\Service;
use App\Entity\Speciality;
use App\Entity\Theme;
use App\Entity\User;
use App\Repository\JobRepository;
use App\Repository\LogbookRepository;
use App\Repository\LogbookTemplateRepository;
use App\Repository\ModuleRepository;
use App\Repository\ServiceRepository;
use App\Repository\SpecialityRepository;
use App\Repository\ThemeRepository;
use App\Repository\UserRepository;
use EasyCorp\Bundle\EasyAdminBundle\Attribute\AdminDashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_ADMIN')]
#[AdminDashboard(routePath: '/admin', routeName: 'admin')]
class DashboardController extends AbstractDashboardController
{
    public function __construct(
        private readonly AdminUrlGenerator $adminUrlGenerator,
        private readonly UserRepository $userRepository,
        private readonly LogbookRepository $logbookRepository,
        private readonly ThemeRepository $ThemeRepository,
        private readonly ModuleRepository $ModuleRepository,
        private readonly ServiceRepository $ServiceRepository,
        private readonly LogbookTemplateRepository $LogbookTemplateRepository,
        private readonly JobRepository $JobRepository,
        private readonly SpecialityRepository $SpecialityRepository,
    ) {
    }

    public function configureAssets(): Assets
    {
        return Assets::new()
            ->addJsFile(pathOrAsset: 'scripts/admin/delete-confirmation.js');
    }

    public function index(): Response
    {
        $this->denyAccessUnlessGranted(
            attribute: 'ROLE_ADMIN',
            subject: "Accès à la section d'administration",
            message: 'Désolé, votre rôle ne vous donne pas accès a cette section.'
        );

        $url = $this->adminUrlGenerator
            ->setController(crudControllerFqcn: UserCrudController::class)
            ->setAction(action: 'index')
            ->generateUrl();

        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle(title: 'EDF - Compagnonnage')
            ->renderContentMaximized()
            ->setLocales(locales: ['fr' => '🇫🇷 Français']);
    }

    public function configureMenuItems(): iterable
    {
        $currentUser = $this->getUser();
        /* Go to home page */
        // Vérifie que l'utilisateur est connecté
        if ($currentUser instanceof User) {
            /* Go to home page */
            yield MenuItem::linkToRoute(
                label: 'Accéder au site',
                icon: 'fas fa-home',
                routeName: 'dashboard_index',
                routeParameters: ['nni' => $currentUser->getNni()]
            );
        } else {
            // Si l'utilisateur n'est pas connecté, redirige sans le paramètre 'nni'
            yield MenuItem::linkToRoute(
                label: 'Accéder au site',
                icon: 'fas fa-home',
                routeName: 'app_login'
            );
        }

        $totalUsers = $this->userRepository->count();
        yield MenuItem::section(label: 'Utilisateurs')->setBadge(content: $totalUsers);
        yield MenuItem::subMenu(label: 'Utilisateurs', icon: 'fas fa-users')->setSubItems(
            subItems: [
                MenuItem::linkTo(UserCrudController::class, 'Liste des utilisateurs', 'fas fa-list')->setAction(actionName: Crud::PAGE_INDEX),
                MenuItem::linkTo(UserCrudController::class, 'Créer utilisateur', 'fas fa-plus-circle')->setAction(actionName: Crud::PAGE_NEW),
            ]
        );

        // Section de création de modéles de carnet
        $totalModels = $this->LogbookTemplateRepository->count();
        yield MenuItem::section(label: 'Modèles')->setBadge(content: $totalModels);
        yield MenuItem::subMenu(label: 'Modèles', icon: 'fas fa-book')->setSubItems(
            subItems: [
                MenuItem::linkTo(LogbookTemplateCrudController::class, 'Liste des modèles', 'fas fa-list')->setAction(actionName: Crud::PAGE_INDEX),
                MenuItem::linkTo(LogbookTemplateCrudController::class, 'Créer un modèle', 'fas fa-plus-circle')->setAction(actionName: Crud::PAGE_NEW),
                MenuItem::linkToRoute(label: 'Assignation en masse', icon: 'fas fa-address-book', routeName: 'admin_batch_assign_templates'),
            ]
        );

        $totalLogbooks = $this->logbookRepository->count();
        yield MenuItem::section(label: 'Carnet')->setBadge(content: $totalLogbooks);
        yield MenuItem::subMenu(label: 'Carnet', icon: 'fas fa-book')->setSubItems(
            subItems: [
                MenuItem::linkTo(LogbookCrudController::class, 'Liste des carnets', 'fas fa-list')->setAction(actionName: Crud::PAGE_INDEX),
            ]
        );

        $totalThemes = $this->ThemeRepository->count();
        yield MenuItem::section(label: 'Themes')->setBadge(content: $totalThemes);
        yield MenuItem::subMenu(label: 'Themes', icon: 'fas fa-box')->setSubItems(
            subItems: [
                MenuItem::linkTo(ThemeCrudController::class, 'Liste des themes', 'fas fa-list')->setAction(actionName: Crud::PAGE_INDEX),
                MenuItem::linkTo(ThemeCrudController::class, 'Créer themes', 'fas fa-plus-circle')->setAction(actionName: Crud::PAGE_NEW),
            ]
        );

        $totalModules = $this->ModuleRepository->count();
        yield MenuItem::section(label: 'Modules')->setBadge(content: $totalModules);
        yield MenuItem::subMenu(label: 'Modules', icon: 'fas fa-star')->setSubItems(
            subItems: [
                MenuItem::linkTo(ModuleCrudController::class, 'Liste des modules', 'fas fa-list')->setAction(actionName: Crud::PAGE_INDEX),
                MenuItem::linkTo(ModuleCrudController::class, 'Créer modules', 'fas fa-plus-circle')->setAction(actionName: Crud::PAGE_NEW),
            ]
        );

        $totalServices = $this->ServiceRepository->count();
        yield MenuItem::section(label: 'Services')->setBadge(content: $totalServices);
        yield MenuItem::subMenu(label: 'Services', icon: 'fas fa-box')->setSubItems(
            subItems: [
                MenuItem::linkTo(ServiceCrudController::class, 'Liste des services', 'fas fa-list')->setAction(actionName: Crud::PAGE_INDEX),
                MenuItem::linkTo(ServiceCrudController::class, 'Créer services', 'fas fa-plus-circle')->setAction(actionName: Crud::PAGE_NEW),
            ]
        );

        // Job et Spécialité
        $totalJobs = $this->JobRepository->count();
        $totalSpecialities = $this->SpecialityRepository->count();
        yield MenuItem::section(label: 'Métier & Spécialité')
            ->setBadge(content: sprintf('%d | %d', $totalJobs, $totalSpecialities));
        yield MenuItem::subMenu(label: 'Métier & Spé', icon: 'fas fa-user-tie')->setSubItems(
            subItems: [
                MenuItem::linkTo(JobCrudController::class, 'Liste des métiers', icon: 'fas fa-list')->setAction(actionName: Crud::PAGE_INDEX),
                MenuItem::linkTo(JobCrudController::class, 'Créer métier', icon: 'fas fa-plus-circle')->setAction(actionName: Crud::PAGE_NEW),
                MenuItem::linkTo(SpecialityCrudController::class, 'Liste des spécialités', icon: 'fas fa-list')->setAction(actionName: Crud::PAGE_INDEX),
                MenuItem::linkTo(SpecialityCrudController::class, 'Créer spécialité', icon: 'fas fa-plus-circle')->setAction(actionName: Crud::PAGE_NEW),
            ]
        );

        // Section Tableau de bord de progression
        yield MenuItem::section(label: 'Suivi', icon: 'fas fa-chart-line');
        yield MenuItem::linkToRoute(
            label: 'Tableau de bord de progression',
            icon: 'fas fa-chart-pie',
            routeName: 'admin_progress_dashboard'
        );

        yield MenuItem::section(label: 'Guides', icon: 'fas fa-folder-open');
        yield MenuItem::subMenu(label: 'Guides', icon: 'fas fa-folder-open')->setSubItems(
            subItems: [
                MenuItem::linkToRoute(
                    label: 'Processus MCH-03',
                    icon: 'fas fa-microchip',
                    routeName: 'pages_processus_elementaire'
                ),
                MenuItem::linkToRoute(
                    label: 'Guide',
                    icon: 'fas fa-microchip',
                    routeName: 'pages_guide_technique'
                ),
                // Analyse de conformité des carnets de compagnonnage AnalyseProcessusController::index
                // TODO: Vérifier pourquoi tous les noms ne remonte pas (ex: Connexion avec agent MRC manque des informations et agent)
                // MenuItem::linkToRoute(
                //     label: 'Analyse de conformité',
                //     icon: 'fas fa-magnifying-glass-chart',
                //     routeName: 'service_analyse_processus_index'
                // ),
            ]
        );
    }
}
