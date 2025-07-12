<?php

namespace App\Controller\Admin;

use App\Controller\Admin\User\UserCrudController;
use App\Entity\Logbook;
use App\Entity\Module;
use App\Entity\Service;
use App\Entity\Theme;
use App\Entity\User;
use App\Repository\LogbookRepository;
use App\Repository\ModuleRepository;
use App\Repository\ServiceRepository;
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
            MenuItem::linkToCrud(label: 'Liste des utilisateurs', icon: 'fas fa-list', entityFqcn: User::class)->setAction(actionName: Crud::PAGE_INDEX),
            MenuItem::linkToCrud(label: 'Créer utilisateur', icon: 'fas fa-plus-circle', entityFqcn: User::class)->setAction(actionName: Crud::PAGE_NEW),
            ]
        );

        $totalLogbooks = $this->logbookRepository->count();
        yield MenuItem::section(label: 'Carnet')->setBadge(content: $totalLogbooks);
        yield MenuItem::subMenu(label: 'Carnet', icon: 'fas fa-book')->setSubItems(
            subItems: [
            MenuItem::linkToCrud(label: 'Liste des carnets', icon: 'fas fa-list', entityFqcn: Logbook::class)->setAction(actionName: Crud::PAGE_INDEX),
            MenuItem::linkToCrud(label: 'Créer un carnet', icon: 'fas fa-plus-circle', entityFqcn: Logbook::class)->setAction(actionName: Crud::PAGE_NEW),
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
    }
}
