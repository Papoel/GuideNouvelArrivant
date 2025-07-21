<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Theme;
use App\Entity\Module;
use App\Entity\Logbook;
use App\Entity\Service;
use App\Entity\LogbookTemplate;
use App\Repository\UserRepository;
use App\Repository\ThemeRepository;
use App\Repository\ModuleRepository;
use App\Repository\LogbookRepository;
use App\Repository\ServiceRepository;
use App\Repository\LogbookTemplateRepository;
use Symfony\Component\HttpFoundation\Response;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use App\Controller\Admin\User\UserCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use EasyCorp\Bundle\EasyAdminBundle\Attribute\AdminDashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

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
    ) {}

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
                MenuItem::linkToCrud(label: 'Liste des utilisateurs', icon: 'fas fa-list', entityFqcn: User::class)->setAction(actionName: Crud::PAGE_INDEX),
                MenuItem::linkToCrud(label: 'Créer utilisateur', icon: 'fas fa-plus-circle', entityFqcn: User::class)->setAction(actionName: Crud::PAGE_NEW),
            ]
        );

        // Section de création de modéles de carnet
        $totalModels = $this->LogbookTemplateRepository->count();
        yield MenuItem::section(label: 'Modèles')->setBadge(content: $totalModels);
        yield MenuItem::subMenu(label: 'Modèles', icon: 'fas fa-book')->setSubItems(
            subItems: [
                MenuItem::linkToCrud(label: 'Liste des modèles', icon: 'fas fa-list', entityFqcn: LogbookTemplate::class)->setAction(actionName: Crud::PAGE_INDEX),
                MenuItem::linkToCrud(label: 'Créer un modèle', icon: 'fas fa-plus-circle', entityFqcn: LogbookTemplate::class)->setAction(actionName: Crud::PAGE_NEW),
                MenuItem::linkToRoute(label: 'Assignation en masse', icon: 'fas fa-address-book', routeName: 'admin_batch_assign_templates'),
            ]
        );

        $totalLogbooks = $this->logbookRepository->count();
        yield MenuItem::section(label: 'Carnet')->setBadge(content: $totalLogbooks);
        yield MenuItem::subMenu(label: 'Carnet', icon: 'fas fa-book')->setSubItems(
            subItems: [
                MenuItem::linkToCrud(label: 'Liste des carnets', icon: 'fas fa-list', entityFqcn: Logbook::class)->setAction(actionName: Crud::PAGE_INDEX),
            ]
        );

        $totalThemes = $this->ThemeRepository->count();
        yield MenuItem::section(label: 'Themes')->setBadge(content: $totalThemes);
        yield MenuItem::subMenu(label: 'Themes', icon: 'fas fa-box')->setSubItems(
            subItems: [
                MenuItem::linkToCrud(label: 'Liste des themes', icon: 'fas fa-list', entityFqcn: Theme::class)->setAction(actionName: Crud::PAGE_INDEX),
                MenuItem::linkToCrud(label: 'Créer themes', icon: 'fas fa-plus-circle', entityFqcn: Theme::class)->setAction(actionName: Crud::PAGE_NEW),
            ]
        );

        $totalModules = $this->ModuleRepository->count();
        yield MenuItem::section(label: 'Modules')->setBadge(content: $totalModules);
        yield MenuItem::subMenu(label: 'Modules', icon: 'fas fa-star')->setSubItems(
            subItems: [
                MenuItem::linkToCrud(label: 'Liste des modules', icon: 'fas fa-list', entityFqcn: Module::class)->setAction(actionName: Crud::PAGE_INDEX),
                MenuItem::linkToCrud(label: 'Créer modules', icon: 'fas fa-plus-circle', entityFqcn: Module::class)->setAction(actionName: Crud::PAGE_NEW),
            ]
        );

        $totalServices = $this->ServiceRepository->count();
        yield MenuItem::section(label: 'Services')->setBadge(content: $totalServices);
        yield MenuItem::subMenu(label: 'Services', icon: 'fas fa-box')->setSubItems(
            subItems: [
                MenuItem::linkToCrud(label: 'Liste des services', icon: 'fas fa-list', entityFqcn: Service::class)->setAction(actionName: Crud::PAGE_INDEX),
                MenuItem::linkToCrud(label: 'Créer services', icon: 'fas fa-plus-circle', entityFqcn: Service::class)->setAction(actionName: Crud::PAGE_NEW),
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
                MenuItem::linkToRoute(
                    label: 'Analyse de conformité',
                    icon: 'fas fa-magnifying-glass-chart',
                    routeName: 'service_analyse_processus_index'
                ),
            ]
        );
    }
}
