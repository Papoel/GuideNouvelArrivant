<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Services\Admin\ProgressTrackingService;
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
}
