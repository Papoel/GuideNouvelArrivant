<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Entity\User;
use App\Repository\FeedbackRepository;
use App\Repository\LogbookRepository;
use App\Repository\UserRepository;
use App\Services\Admin\ProgressTrackingService;
use App\Services\Logbook\LogbookProgressService;
use Doctrine\ORM\EntityManagerInterface;
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
        $rawSearchTerm = $request->query->get('search', null);
        $searchTerm = is_string($rawSearchTerm) ? $rawSearchTerm : null;

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
    public function userProgressDetails(
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

        return $this->render('admin/progress/user_details.html.twig', [
            'user' => $user,
            'logbook' => $logbook,
            'progress' => $progress,
        ]);
    }

    /**
     * Affiche et gère les retours d'expérience (feedbacks).
     */
    #[Route('/feedbacks', name: 'feedbacks', methods: ['GET', 'POST'])]
    public function feedbacks(Request $request, FeedbackRepository $feedbackRepository): Response
    {
        // Récupération des paramètres de recherche et de pagination
        $rawSearchTerm = $request->query->get('search', null);
        $searchTerm = is_string($rawSearchTerm) ? $rawSearchTerm : null;
        $status = $request->query->get('status', 'all');

        $page = max(1, (int) $request->query->get('page', 1));
        $limit = 10; // Nombre d'éléments par page

        // Préparation des critères de filtrage
        $criteria = [];
        if ('pending' === $status) {
            $criteria['isReviewed'] = false;
        } elseif ('reviewed' === $status) {
            $criteria['isReviewed'] = true;
        }

        // Récupération des feedbacks avec pagination
        $feedbacks = $feedbackRepository->findByCriteriaPaginated($criteria, $searchTerm, $page, $limit);

        // Statistiques des feedbacks
        $stats = [
            'total' => $feedbackRepository->count([]),
            'pending' => $feedbackRepository->count(['isReviewed' => false]),
            'reviewed' => $feedbackRepository->count(['isReviewed' => true]),
        ];

        return $this->render('admin/progress/feedbacks.html.twig', [
            'feedbacks' => $feedbacks['items'],
            'pagination' => [
                'currentPage' => $page,
                'totalPages' => $feedbacks['totalPages'],
                'totalItems' => $feedbacks['totalItems'],
                'itemsPerPage' => $limit,
            ],
            'stats' => $stats,
            'search_term' => $searchTerm,
            'current_status' => $status,
        ]);
    }

    /**
     * Affiche et traite un feedback spécifique.
     */
    #[Route('/feedback/{id}', name: 'feedback_detail', methods: ['GET', 'POST'])]
    public function feedbackDetail(int $id, Request $request, FeedbackRepository $feedbackRepository, EntityManagerInterface $entityManager): Response
    {
        $feedback = $feedbackRepository->find($id);

        if (!$feedback) {
            throw $this->createNotFoundException('Feedback non trouvé');
        }

        // Traitement du formulaire de commentaire manager ou de l'action de remise en attente
        if ($request->isMethod('POST')) {
            $action = $request->request->get('action');

            if ('mark_pending' === $action) {
                // Remise en attente du feedback
                $feedback->setIsReviewed(false);
                $feedback->setReviewedBy(null);
                $feedback->setReviewAt(null);

                $entityManager->flush();

                $this->addFlash('success', "Le retour d'expérience a été remis en attente.");

                return $this->redirectToRoute('admin_progress_feedbacks');
            } else {
                // Traitement normal du feedback
                // $comment = $request->request->get('managerComment');
                $rawComment = $request->request->get('managerComment');
                $comment = is_scalar($rawComment) ? (string) $rawComment : null;

                $feedback->setManagerComment($comment);
                $feedback->setIsReviewed(true);
                $user = $this->getUser();
                $feedback->setReviewedBy($user instanceof User ? $user : null);
                $feedback->setReviewAt(new \DateTimeImmutable());

                $entityManager->flush();

                $this->addFlash('success', "Le retour d'expérience a été traité avec succès.");

                return $this->redirectToRoute('admin_progress_feedbacks');
            }
        }

        return $this->render('admin/progress/feedback_detail.html.twig', [
            'feedback' => $feedback,
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
            'date_generation' => new \DateTime(),
        ]);

        $dompdf->loadHtml($html);

        // Paramétrage de la première page en portrait
        // Les pages suivantes seront configurées en paysage via CSS dans le template
        $dompdf->setPaper('A4', 'portrait');

        // Rendu du PDF
        $dompdf->render();

        // Génération du nom de fichier
        $filename = sprintf(
            'carnet-compagnonnage-%s-%s-%s.pdf',
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
                'Content-Disposition' => sprintf('attachment; filename="%s"', $filename),
            ]
        );
    }
}
