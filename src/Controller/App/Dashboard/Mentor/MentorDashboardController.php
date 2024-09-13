<?php

declare(strict_types=1);

namespace App\Controller\App\Dashboard\Mentor;

use App\Services\Mentor\MentorService;
use App\Services\User\UserValidationService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_MENTOR')]
#[Route('/dashboard/mentor/{nni}', name: 'mentor_dashboard_')]
class MentorDashboardController extends AbstractController
{
    public function __construct(private readonly MentorService $mentorService, private readonly UserValidationService $userValidationService)
    {
    }

    #[Route('/', name: 'index', methods: [Request::METHOD_GET])]
    public function index(string $nni): Response
    {
        // Valider l'accès de l'utilisateur connecté avec le service UserValidationService
        $currentUser = $this->userValidationService->getCurrentUser($nni);

        // Vérifier si NNI de l'utilisateur actuel est valide
        $currentUserNni = $currentUser->getNni();
        if (null === $currentUserNni) {
            throw new \InvalidArgumentException(message: 'Une erreur est survenue lors de la récupération de votre NNI.');
        }

        // Récupérer les logbooks des apprenants mentorés par l'utilisateur
        $apprenants = $this->mentorService->getApprenantLogbooks($currentUserNni);

        return $this->render(view: 'app/dashboard/mentor/index.html.twig', parameters: ['apprenants' => $apprenants]);
    }
}
