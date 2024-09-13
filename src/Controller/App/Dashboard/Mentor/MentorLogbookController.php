<?php

declare(strict_types=1);

namespace App\Controller\App\Dashboard\Mentor;

use App\Entity\Logbook;
use App\Entity\User;
use App\Services\Mentor\MentorService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_MENTOR')]
#[Route(path: '/dashboard/mentor/{nni}/padawan/{padawanName}/carnet', name: 'mentor_logbook_')]
class MentorLogbookController extends AbstractController
{
    public function __construct(
        private readonly MentorService $mentorService
    ) {
    }

    #[Route('/{id}', name: 'details', methods: [Request::METHOD_GET])]
    public function details(Logbook $logbook): Response
    {
        // Vérifier si le carnet appartient à un apprenant du mentor connecté
        /** @var User $mentor */
        $mentor = $this->getUser();
        $mentorNni = $mentor->getNni();

        // Vérifier que le NNI du mentor n'est pas null
        if (null === $mentorNni) {
            throw $this->createAccessDeniedException(message: 'Le NNI du mentor est invalide.');
        }

        // Vérifier l'accès au carnet
        if (!$this->mentorService->isLogbookAccessibleByMentor($mentorNni, $logbook)) {
            throw $this->createAccessDeniedException(message: 'Vous n\'avez pas accès à ce carnet');
        }

        return $this->render(view: 'app/dashboard/mentor/logbook_details.html.twig', parameters: [
            'logbook' => $logbook,
        ]);
    }
}
