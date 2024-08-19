<?php

namespace App\Controller\Admin;

use App\Controller\Admin\User\UserCrudController;
use App\Entity\Action;
use App\Entity\Logbook;
use App\Entity\Module;
use App\Entity\Theme;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_ADMIN')]
class DashboardController extends AbstractDashboardController
{
    public function __construct(
        private readonly AdminUrlGenerator $adminUrlGenerator,
    ) {
    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $this->denyAccessUnlessGranted(
            attribute: 'ROLE_ADMIN',
            subject: "Accès à la section d'administration",
            message: 'Désolé, votre rôle ne vous donne pas accès a cette section.'
        );

        $url = $this->adminUrlGenerator
            ->setController(crudControllerFqcn: UserCrudController::class)
            ->setAction('index')
            ->generateUrl();

        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle(title: 'GuideNouvelArrivant')
            ->renderContentMaximized()
            ->setLocales(locales: ['fr' => '🇫🇷 Français'])
        ;
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::section(label: 'Utilisateurs');
        yield MenuItem::subMenu(label: 'Utilisateurs', icon: 'fas fa-users')->setSubItems(subItems: [
            MenuItem::linkToCrud(label: 'Liste des utilisateurs', icon: 'fas fa-list', entityFqcn: User::class)->setAction(actionName: Crud::PAGE_INDEX),
            MenuItem::linkToCrud(label: 'Créer utilisateur', icon: 'fas fa-plus-circle', entityFqcn: User::class)->setAction(actionName: Crud::PAGE_NEW),
            MenuItem::linkToCrud(label: 'Voir utilisateur', icon: 'fas fa-eye', entityFqcn: User::class)->setAction(actionName: Crud::PAGE_DETAIL),
        ]);

        yield MenuItem::section(label: 'Modules');
        yield MenuItem::subMenu(label: 'Modules', icon: 'fas fa-star')->setSubItems(subItems: [
            MenuItem::linkToCrud(label: 'Liste des modules', icon: 'fas fa-list', entityFqcn: Module::class)->setAction(actionName: Crud::PAGE_INDEX),
            MenuItem::linkToCrud(label: 'Créer modules', icon: 'fas fa-plus-circle', entityFqcn: Module::class)->setAction(actionName: Crud::PAGE_NEW),
            MenuItem::linkToCrud(label: 'Voir modules', icon: 'fas fa-eye', entityFqcn: Module::class)->setAction(actionName: Crud::PAGE_DETAIL),
        ]);

        yield MenuItem::section(label: 'Carnet');
        yield MenuItem::subMenu(label: 'Carnet', icon: 'fas fa-book')->setSubItems(subItems: [
            MenuItem::linkToCrud(label: 'Liste des carnets', icon: 'fas fa-list', entityFqcn: Logbook::class)->setAction(actionName: Crud::PAGE_INDEX),
            MenuItem::linkToCrud(label: 'Créer un carnet', icon: 'fas fa-plus-circle', entityFqcn: Logbook::class)->setAction(actionName: Crud::PAGE_NEW),
            MenuItem::linkToCrud(label: 'Voir carnet', icon: 'fas fa-eye', entityFqcn: Logbook::class)->setAction(actionName: Crud::PAGE_DETAIL),
        ]);

        yield MenuItem::section(label: 'Actions');
        yield MenuItem::subMenu(label: 'Action', icon: 'fas fa-newspaper')->setSubItems(subItems: [
            MenuItem::linkToCrud(label: 'Liste des actions', icon: 'fas fa-list', entityFqcn: Action::class)->setAction(actionName: Crud::PAGE_INDEX),
            MenuItem::linkToCrud(label: 'Créer action', icon: 'fas fa-plus-circle', entityFqcn: Action::class)->setAction(actionName: Crud::PAGE_NEW),
            MenuItem::linkToCrud(label: 'Voir action', icon: 'fas fa-eye', entityFqcn: Action::class)->setAction(actionName: Crud::PAGE_DETAIL),
        ]);

        yield MenuItem::section(label: 'Themes');
        yield MenuItem::subMenu(label: 'Themes', icon: 'fas fa-box')->setSubItems(subItems: [
            MenuItem::linkToCrud(label: 'Liste des themes', icon: 'fas fa-list', entityFqcn: Theme::class)->setAction(actionName: Crud::PAGE_INDEX),
            MenuItem::linkToCrud(label: 'Créer themes', icon: 'fas fa-plus-circle', entityFqcn: Theme::class)->setAction(actionName: Crud::PAGE_NEW),
            MenuItem::linkToCrud(label: 'Voir themes', icon: 'fas fa-eye', entityFqcn: Theme::class)->setAction(actionName: Crud::PAGE_DETAIL),
        ]);

        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
