<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Repository\LogbookRepository;
use App\Repository\UserRepository;
use App\Services\Admin\ProgressTrackingService;
use App\Services\Logbook\LogbookProgressService;
use Dompdf\Dompdf;
use Dompdf\Options;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_ADMIN')]
#[Route('/admin/progress', name: 'admin_progress_')]
class ProgressController extends AbstractController
{
    public function __construct(
        private readonly ProgressTrackingService $progressTrackingService,
    ) {
    }

    /**
     * Affiche le tableau de bord global de progression.
     */
    #[Route('/', name: 'dashboard', methods: ['GET'])]
    public function dashboard(Request $request): Response
    {
        // Récupération des paramètres de recherche et de pagination
        $searchTerm = $request->query->get('search', null);
        $page = max(1, (int) $request->query->get('page', 1));
        $limit = 25; // Nombre d'éléments par page

        // Récupérer les données de progression des utilisateurs avec pagination
        $progressData = $this->progressTrackingService->getUsersProgressData($searchTerm, $page, $limit);

        // Récupérer les statistiques par thème
        $themeStats = $this->progressTrackingService->getThemeProgressData();

        return $this->render('admin/progress/dashboard.html.twig', [
            'users_data' => $progressData['users'],
            'global_stats' => $progressData['global_stats'],
            'theme_stats' => $themeStats,
            'pagination' => $progressData['pagination'],
            'search_term' => $searchTerm,
        ]);
    }

    /**
     * Affiche les détails de progression d'un utilisateur spécifique.
     */
    #[Route('/user/{id}', name: 'user_details', methods: ['GET'])]
    public function userProgressDetails(string $id,
        \App\Repository\UserRepository $userRepository,
        \App\Repository\LogbookRepository $logbookRepository,
        \App\Services\Logbook\LogbookProgressService $logbookProgressService
    ): Response {
        // Récupérer l'utilisateur par son ID
        $user = $userRepository->find($id);

        if (!$user) {
            throw $this->createNotFoundException('Utilisateur non trouvé');
        }

        // Récupérer le carnet de l'utilisateur
        $logbook = $logbookRepository->findOneBy(['owner' => $user]);

        if (!$logbook) {
            $this->addFlash('warning', 'Cet utilisateur n\'a pas de carnet de progression');

            return $this->redirectToRoute('admin_progress_dashboard');
        }

        $progress = $logbookProgressService->calculateLogbookProgress($logbook);

        return $this->render('admin/progress/user_details.html.twig', [
            'user' => $user,
            'logbook' => $logbook,
            'progress' => $progress,
        ]);
    }

    /**
     * Génère le carnet de compagnonnage en PDF pour un utilisateur.
     */
    #[Route('/generate-workbook/{id}', name: 'generate_workbook', methods: ['GET'])]
    public function generateWorkbook(
        string $id,
        UserRepository $userRepository,
        LogbookRepository $logbookRepository,
        LogbookProgressService $logbookProgressService
    ): Response {
        // Récupérer l'utilisateur par son ID
        $user = $userRepository->find($id);

        if (!$user) {
            throw $this->createNotFoundException('Utilisateur non trouvé');
        }

        // Récupérer le carnet de l'utilisateur
        $logbook = $logbookRepository->findOneBy(['owner' => $user]);

        if (!$logbook) {
            $this->addFlash('warning', 'Cet utilisateur n\'a pas de carnet de progression');
            return $this->redirectToRoute('admin_progress_dashboard');
        }

        $progress = $logbookProgressService->calculateLogbookProgress($logbook);

        // Configuration de Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        $options->set('defaultFont', 'Helvetica');

        $dompdf = new Dompdf($options);
        
        // Génération du HTML
        $html = $this->renderView('pdf/workbook.html.twig', [
            'user' => $user,
            'logbook' => $logbook,
            'progress' => $progress,
            'date_generation' => new \DateTime()
        ]);
        
        $dompdf->loadHtml($html);
        
        // Paramétrage de la première page en portrait
        // Les pages suivantes seront configurées en paysage via CSS dans le template
        $dompdf->setPaper('A4', 'portrait');
        
        // Rendu du PDF
        $dompdf->render();
        
        // Génération du nom de fichier
        $filename = sprintf('carnet-compagnonnage-%s-%s-%s.pdf', 
            $user->getFirstname(), 
            $user->getLastname(),
            (new \DateTime())->format('d-m-Y')
        );
        
        // Envoi du PDF au navigateur
        return new Response(
            $dompdf->output(),
            Response::HTTP_OK,
            [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => sprintf('attachment; filename="%s"', $filename)
            ]
        );
    }
}
