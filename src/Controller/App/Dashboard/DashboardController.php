<?php

declare(strict_types=1);

namespace App\Controller\App\Dashboard;

use App\Services\Dashboard\DashboardService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_USER')]
#[Route('/dashboard/{nni}', name: 'dashboard_')]
class DashboardController extends AbstractController
{
    #[Route('/', name: 'index', methods: [Request::METHOD_GET, Request::METHOD_POST])]
    public function index(string $nni, DashboardService $dashboardService): Response
    {
        // Appel au DashboardService pour obtenir les données en fonction du NNI
        $dashboardData = $dashboardService->getDashboardData($nni);

        // Rendu du tableau de bord avec les données obtenues
        return $this->render(view: 'app/dashboard/dashboard.html.twig', parameters: $dashboardData);
    }
}
