<?php

declare(strict_types=1);

namespace App\Controller\App\Dashboard\Mentor;

use App\Services\Logbook\LogbookProgressService;
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
    public function __construct(
        private readonly MentorService $mentorService,
        private readonly UserValidationService $userValidationService,
        private readonly LogbookProgressService $logbookProgressService
    ) {
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

        // Progression du carnet de l'apprenant

        // Récupérer les logbooks des apprenants mentorés par l'utilisateur
        // $apprenants = $this->mentorService->getApprenantLogbooks($currentUserNni);
        $apprenants = $this->mentorService->getApprenantLogbooks($currentUserNni);

        // Calculer la progression pour chaque apprenant
        $apprenantsProgress = [];
        foreach ($apprenants as $apprenant) {
            $logbook = $apprenant->getLogbooks()->first(); // Supposons que chaque apprenant n'a qu'un seul carnet
            if ($logbook) {
                $progress = $this->logbookProgressService->calculateLogbookProgress($logbook);
                // $apprenantsProgress[$apprenant->getId()] = $progress;
                $apprenantsProgress[(string) $apprenant->getId()] = $progress;
            }
        }

        return $this->render(view: 'app/dashboard/mentor/index.html.twig', parameters: [
            'apprenants' => $apprenants,
            'apprenantsProgress' => $apprenantsProgress,
        ]);
    }
}
