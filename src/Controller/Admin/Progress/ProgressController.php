<?php

declare(strict_types=1);

namespace App\Controller\Admin\Progress;

use App\Entity\User;
use App\Repository\FeedbackRepository;
use App\Repository\UserRepository;
use App\Services\Admin\interfaces\FeedbackServiceInterface;
use App\Services\Admin\interfaces\ProgressTrackingServiceInterface;
use App\Services\Admin\interfaces\UserProgressServiceInterface;
use App\Services\Admin\Progress\ProgressAccessService;
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
        private readonly ProgressTrackingServiceInterface $progressTrackingService,
        private readonly ProgressAccessService $progressAccessService,
        private readonly UserProgressServiceInterface $userProgressService,
        private readonly FeedbackServiceInterface $feedbackService
    ) {
    }

    /** Affiche le tableau de bord global de progression. */
    #[Route('/', name: 'dashboard', methods: ['GET'])]
    public function dashboard(Request $request): Response
    {
        // TODO:
        // - Améliorer design admin/progress/feedbacks/service/
        // Récupérer les paramètres de recherche et pagination
        $rawSearchTerm = $request->query->get(key: 'q');
        $searchTerm = is_string(value: $rawSearchTerm) ? $rawSearchTerm : null;

        $page = max(1, (int) $request->query->get(key: 'page', default: 1));

        // Récupérer les données de progression des utilisateurs avec la méthode optimisée
        // Cette méthode inclut déjà les statistiques globales dans global_stats
        $data = $this->progressTrackingService->getUsersProgressData(searchTerm: $searchTerm, page: $page);

        // Renommer la clé 'users' en 'users_data' pour correspondre au template
        $data['users_data'] = $data['users'];
        unset($data['users']);

        // Récupérer les statistiques par thème (nécessaires pour le template)
        $data['theme_stats'] = $this->progressTrackingService->getThemeProgressData();

        // Récupérer les statistiques des feedbacks
        $currentUser = $this->progressAccessService->getCurrentUser();
        $currentUserService = $currentUser ? $currentUser->getService() : null;

        // Ajouter un indicateur si l'utilisateur n'a pas de service assigné
        $data['user_has_no_service'] = ($currentUser && null === $currentUserService);

        // Préparer les critères de filtrage pour les feedbacks
        $criteria = [];
        if (!$this->progressAccessService->isSuperAdmin() && $currentUserService) {
            // Utiliser le nom du service au lieu de l'ID pour assurer la compatibilité avec le repository
            $criteria['serviceName'] = $currentUserService->getName();
        }

        // Récupérer les statistiques des feedbacks via le service dédié
        $feedbackStats = $this->feedbackService->getFeedbackStatistics($criteria);

        // Mettre à jour les statistiques des feedbacks dans global_stats
        // Conserver les autres statistiques déjà présentes
        $data['global_stats']['total_feedbacks'] = $feedbackStats['total'];
        $data['global_stats']['pending_feedbacks'] = $feedbackStats['pending'];
        $data['global_stats']['reviewed_feedbacks'] = $feedbackStats['reviewed'];

        // Ajouter l'indicateur is_super_admin pour le template
        $data['is_super_admin'] = $this->progressAccessService->isSuperAdmin();

        // Rendu du template avec les données
        return $this->render('admin/progress/dashboard.html.twig', $data);
    }

    /** Affiche les détails de progression d'un utilisateur spécifique. */
    #[Route('/user/{id}', name: 'user_details', methods: ['GET'])]
    public function userProgressDetails(string $id, UserRepository $userRepository): Response
    {
        // Récupérer l'utilisateur par son ID
        $user = $userRepository->find($id);

        if (!$user) {
            throw $this->createNotFoundException('Utilisateur non trouvé');
        }

        // Vérifier que l'utilisateur connecté a le droit de voir cet utilisateur
        if (!$this->userProgressService->canAccessUserData($user)) {
            $this->addFlash('warning', 'Vous n\'avez pas accès aux informations de cet utilisateur.');

            return $this->redirectToRoute('admin_progress_dashboard');
        }

        try {
            // Récupérer les détails de progression de l'utilisateur via le service dédié
            $progressData = $this->userProgressService->getUserProgressDetails($user);

            return $this->render('admin/progress/user_details.html.twig', $progressData);
        } catch (\RuntimeException $e) {
            $this->addFlash('warning', $e->getMessage());

            return $this->redirectToRoute('admin_progress_dashboard');
        }
    }

    /** Affiche et gère les retours d'expérience (feedbacks). */
    #[Route('/feedbacks', name: 'feedbacks', methods: ['GET', 'POST'])]
    public function feedbacks(Request $request): Response
    {
        // Récupération des paramètres de recherche et de pagination
        $rawSearchTerm = $request->query->get('search', null);
        $searchTerm = is_string($rawSearchTerm) ? $rawSearchTerm : null;
        $status = $request->query->get('status', 'all');

        // Récupérer le service actuel de l'utilisateur
        $currentUser = $this->progressAccessService->getCurrentUser();
        $userService = $currentUser ? $currentUser->getService() : null;

        $page = max(1, (int) $request->query->get('page', 1));
        $limit = 10; // Nombre d'éléments par page

        // Préparation des critères de filtrage
        $criteria = [];
        if ('pending' === $status) {
            $criteria['isReviewed'] = false;
        } elseif ('reviewed' === $status) {
            $criteria['isReviewed'] = true;
        }

        // Ajouter la restriction par service si l'utilisateur n'est pas SUPER_ADMIN
        if (!$this->progressAccessService->isSuperAdmin()) {
            $currentUser = $this->progressAccessService->getCurrentUser();
            if (!$currentUser || !$currentUser->getService()) {
                $this->addFlash('warning', 'Vous n\'avez pas accès à cette section car vous n\'êtes pas rattaché à un service.');

                return $this->redirectToRoute('admin_progress_dashboard');
            }
            // Utiliser le nom du service au lieu de l'ID pour assurer la compatibilité avec le repository
            $criteria['serviceName'] = $currentUser->getService()->getName();
        }

        // Récupération des feedbacks avec pagination via le service dédié
        $feedbacks = $this->feedbackService->getFeedbacksWithPagination($criteria, $searchTerm, $page, $limit);

        // Statistiques des feedbacks via le service dédié
        $stats = $this->feedbackService->getFeedbackStatistics($criteria);

        return $this->render(
            'admin/progress/feedbacks.html.twig',
            [
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
                'is_super_admin' => $this->progressAccessService->isSuperAdmin(),
                'user_service' => $userService,
            ]
        );
    }

    /** Affiche et traite un feedback spécifique. */
    #[Route('/feedback/{id}', name: 'feedback_detail', methods: ['GET', 'POST'])]
    public function feedbackDetail(string $id, Request $request, FeedbackRepository $feedbackRepository): Response
    {
        $feedback = $feedbackRepository->find($id);

        if (!$feedback) {
            throw $this->createNotFoundException('Feedback non trouvé');
        }

        // Vérifier que l'utilisateur connecté a le droit de voir ce feedback
        if (!$this->progressAccessService->isSuperAdmin()) {
            $currentUser = $this->progressAccessService->getCurrentUser();
            $currentUserServiceName = $currentUser?->getService()?->getName();
            $feedbackUserServiceName = $feedback->getAuthor()?->getService()?->getName();

            if (!$currentUserServiceName || $currentUserServiceName !== $feedbackUserServiceName) {
                $this->addFlash('warning', 'Vous n\'avez pas accès à ce feedback.');

                return $this->redirectToRoute('admin_progress_feedbacks');
            }
        }

        // Traitement du formulaire de commentaire manager ou de l'action de remise en attente
        if ($request->isMethod('POST')) {
            $action = $request->request->get('action');

            if ('mark_pending' === $action) {
                // Remise en attente du feedback via le service dédié
                $this->feedbackService->markAsPending($feedback);

                $this->addFlash('success', "Le retour d'expérience a été remis en attente.");

                return $this->redirectToRoute('admin_progress_feedbacks');
            } else {
                // Traitement normal du feedback via le service dédié
                $rawComment = $request->request->get('managerComment');
                $comment = is_scalar($rawComment) ? (string) $rawComment : null;
                $user = $this->getUser();

                $this->feedbackService->markAsReviewed($feedback, $comment, $user instanceof User ? $user : null);

                $this->addFlash('success', "Le retour d'expérience a été traité avec succès.");

                return $this->redirectToRoute('admin_progress_feedbacks');
            }
        }

        return $this->render(
            'admin/progress/feedback_detail.html.twig',
            [
                'feedback' => $feedback,
            ]
        );
    }

    /** Affiche les retours d'expérience par service. */
    #[Route('/feedbacks/service/{name}', name: 'service_feedbacks', methods: ['GET'])]
    public function serviceFeedbacks(string $name, Request $request): Response
    {
        // Débug : afficher les informations de service
        $currentUser = $this->progressAccessService->getCurrentUser();
        $currentUserService = $currentUser ? $currentUser->getService() : null;
        // S'assurer que le nom du service ne retourne jamais null
        $currentServiceName = $currentUserService ? ($currentUserService->getName() ?? 'Aucun service') : 'Aucun service';

        // Vérifier que l'utilisateur a les droits nécessaires
        if (!$this->progressAccessService->isSuperAdmin()) {
            // Si l'utilisateur n'est pas super admin, il ne peut voir que les retours de son propre service
            // Comparaison insensible à la casse pour éviter les problèmes de formatage.
            if (!$currentUserService || strtolower(string: $currentServiceName) !== strtolower(string: $name)) {
                $this->addFlash(type: 'warning', message: 'Vous n\'avez pas accès aux retours d\'expérience de ce service.');

                return $this->redirectToRoute(route: 'admin_progress_feedbacks');
            }
        }

        // Récupérer les paramètres de pagination
        $page = max(1, (int) $request->query->get('page', 1));
        $limit = 25;
        $offset = ($page - 1) * $limit;

        // Récupérer les retours d'expérience du service
        $feedbacks = $this->feedbackService->getFeedbacksByServiceName($name, $limit, $offset);

        // Compter le nombre total de retours d'expérience pour ce service
        // Utiliser le même nom que dans le critère du repository
        $stats = $this->feedbackService->getFeedbackStatistics(['serviceName' => $name]);
        $totalItems = $stats['total'];
        $totalPages = (int) ceil($totalItems / $limit);

        return $this->render(
            'admin/progress/service_feedbacks.html.twig',
            [
                'feedbacks' => $feedbacks,
                'service_name' => $name,
                'pagination' => [
                    'currentPage' => $page,
                    'totalPages' => $totalPages,
                    'totalItems' => $totalItems,
                    'itemsPerPage' => $limit,
                ],
                'is_super_admin' => $this->progressAccessService->isSuperAdmin(),
            ]
        );
    }

    /** Génère un PDF du carnet de compagnonnage de l'utilisateur. */
    #[Route('/user/{id}/workbook/pdf', name: 'generate_workbook', methods: ['GET'])]
    public function generateWorkbook(string $id, UserRepository $userRepository): Response
    {
        // Récupérer l'utilisateur par son ID
        $user = $userRepository->find($id);

        if (!$user) {
            throw $this->createNotFoundException('Utilisateur non trouvé');
        }

        // Vérifier que l'utilisateur connecté a le droit de voir cet utilisateur
        if (!$this->userProgressService->canAccessUserData($user)) {
            $this->addFlash('warning', 'Vous n\'avez pas accès aux informations de cet utilisateur.');

            return $this->redirectToRoute('admin_progress_dashboard');
        }

        try {
            // Génération du PDF via le service dédié
            return $this->userProgressService->generateUserWorkbookPdf($user);
        } catch (\RuntimeException $e) {
            $this->addFlash('warning', $e->getMessage());

            return $this->redirectToRoute('admin_progress_dashboard');
        }
    }
}
