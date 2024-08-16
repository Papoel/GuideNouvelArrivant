<?php

declare(strict_types=1);

namespace App\Controller\App\Dashboard;

use App\Entity\User;
use App\Services\Dashboard\DashboardService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_USER')]
class DashboardController extends AbstractController
{
    #[Route('/dashboard/{nni}', name: 'dashboard_index', methods: [Request::METHOD_GET])]
    public function index(string $nni, DashboardService $dashboardService): Response
    {
        try {
            // 1. Récupérer les données du tableau de bord via le service
            $dashboardData = $dashboardService->getDashboardData(nni: $nni, currentUser: $this->getUser() instanceof User ? $this->getUser() : null);

            // 2. Rendu du tableau de bord
            return $this->render(view: 'app/dashboard/dashboard.html.twig', parameters: $dashboardData);
        } catch (\Exception $e) {
            // 3. Gestion des exceptions et redirections
            $this->addFlash(type: 'danger', message: $e->getMessage());

            return $this->redirectToRoute(route: 'home_index');
        }
    }
}
