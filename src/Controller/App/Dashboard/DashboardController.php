<?php

declare(strict_types=1);

namespace App\Controller\App\Dashboard;

use App\Entity\Feedback;
use App\Entity\User;
use App\Form\FeedbackType;
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
        // Vérifier que l'utilisateur est connecté et récupérer ses informations
        $user = $this->getUser();
        if (!$user instanceof User) {
            throw $this->createAccessDeniedException('Utilisateur non connecté');
        }

        // Vérifier que le User connecté accède bien au Dashboard de son NNI
        $userNni = $user->getNni();
        if (!$userNni || $nni !== $userNni) {
            throw $this->createAccessDeniedException('Accès non autorisé');
        }

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
