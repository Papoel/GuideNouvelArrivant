<?php

namespace App\Controller\App\Dashboard;

use App\Entity\Action;
use App\Entity\Logbook;
use App\Entity\Module;
use App\Form\UserActionType;
use App\Repository\ActionRepository;
use App\Repository\LogbookRepository;
use App\Repository\ModuleRepository;
use App\Services\Action\ActionService;
use App\Services\Dashboard\DashboardService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/dashboard/{nni}/module')]
#[IsGranted('ROLE_USER')]
class ActionController extends AbstractController
{
    public function __construct(
        private readonly DashboardService $dashboardService,
        private readonly ActionService $actionService,
        private readonly ModuleRepository $moduleRepository,
        private readonly LogbookRepository $logbookRepository,
        private readonly ActionRepository $actionRepository,
    ) {
    }

    #[Route('/{moduleId}/carnet/{logbookId}/edit', name: 'action_edit', methods: ['GET', 'POST'])]
    public function edit(string $nni, Request $request, string $moduleId, string $logbookId): Response
    {
        // Récupérer le module par son ID
        $module = $this->moduleRepository->find($moduleId);
        if (!$module) {
            throw $this->createNotFoundException('Une erreur est survenue lors de la récupération du module');
        }

        // Récupérer le logbook par son ID
        $logbook = $this->logbookRepository->find($logbookId);
        if (!$logbook) {
            throw $this->createNotFoundException('Une erreur est survenue lors de la récupération du carnet');
        }

        // Obtenir les données du tableau de bord
        $datas = $this->dashboardService->getDashboardData($nni);

        // Trouver ou créer une action pour ce module
        $action = $this->actionService->findOrCreateAction($module);

        // Créer le formulaire
        $form = $this->createForm(type: UserActionType::class, data: $action);
        $form->handleRequest($request);

        // Si le formulaire est soumis et valide
        if ($form->isSubmitted() && $form->isValid()) {
            $this->actionService->saveAction($action, $datas['user']->getFullName(), $logbookId);

            // Redirige vers la liste des actions
            return $this->redirectToRoute(route: 'dashboard_index', parameters: ['nni' => $datas['user']->getNni()]);
        }

        // Render de la vue
        return $this->render(
            view: 'action/edit.html.twig',
            parameters: [
            'form' => $form,
            'action' => $action,
            'module' => $module,
            'logbook' => $logbook,
            ]
        );
    }

    #[Route('/{id}', name: 'action_delete', methods: ['POST'])]
    public function delete(string $nni, Request $request, Action $action): Response
    {
        $datas = $this->dashboardService->getDashboardData($nni);
        $user = $datas['user'];

        if ($this->isCsrfTokenValid('delete' . $action->getId(), $request->getPayload()->getString('_token'))) {
            $this->actionRepository->remove($action, true);
        }

        return $this->redirectToRoute(
            'action_index',
            ['nni' => $user->getNni()],
            Response::HTTP_SEE_OTHER
        );
    }

    #[Route('/{id}/comment-clear', name: 'action_clear', methods: ['GET'])]
    public function clearComment(Action $action): Response
    {
        $user = $action->getUser();
        $module = $action->getModule();
        $logbook = $action->getLogbook();

        if (!$user || !$module || !$logbook) {
            throw new \RuntimeException('Action incomplète : utilisateur, module ou carnet manquant.');
        }

        $this->actionRepository->remove($action, true);

        $this->addFlash('success', 'Le commentaire a été supprimé avec succès.');

        return $this->redirectToRoute(
            route: 'action_edit',
            parameters: [
            'id' => $action->getId(),
            'nni' => $user->getNni(),
            'moduleId' => $module->getId(),
            'logbookId' => $logbook->getId(),
            ]
        );
    }
}
