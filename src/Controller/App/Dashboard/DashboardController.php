<?php

declare(strict_types=1);

namespace App\Controller\App\Dashboard;

use App\Entity\Feedback;
use App\Form\FeedbackType;
use App\Services\Dashboard\DashboardService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[IsGranted('ROLE_USER')]
#[Route('/dashboard/{nni}', name: 'dashboard_')]
class DashboardController extends AbstractController
{
    #[Route('/', name: 'index', methods: [Request::METHOD_GET, Request::METHOD_POST])]
    public function index(string $nni, DashboardService $dashboardService): Response
    {
        // Création du formulaire de feedback pour la sidebar
        $feedback = new Feedback();
        $feedbackForm = $this->createForm(
            type: FeedbackType::class,
            data: $feedback,
            options: [
                'action' => $this->generateUrl(route: 'my_feedbacks_new', parameters: ['nni' => $nni]),
                'method' => 'POST',
            ]
        );

        // Appel au DashboardService pour obtenir les données en fonction du NNI
        $dashboardData = $dashboardService->getDashboardData($nni);

        // Ajout du formulaire de feedback aux données du tableau de bord
        $dashboardData['feedback_form'] = $feedbackForm->createView();

        // Rendu du tableau de bord avec les données obtenues
        return $this->render(view: 'app/dashboard/dashboard.html.twig', parameters: $dashboardData);
    }
}
