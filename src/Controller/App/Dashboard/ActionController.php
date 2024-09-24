<?php

namespace App\Controller\App\Dashboard;

use App\Entity\Action;
use App\Entity\Logbook;
use App\Entity\Module;
use App\Form\UserActionType;
use App\Repository\ActionRepository;
use App\Services\Action\ActionService;
use App\Services\Dashboard\DashboardService;
use Doctrine\ORM\EntityManagerInterface;
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
    ) {
    }

    #[Route('/', name: 'action_index', methods: ['GET'])]
    public function index(ActionRepository $actionRepository): Response
    {
        return $this->render(view: 'action/index.html.twig', parameters: [
            'actions' => $actionRepository->findAll(),
        ]);
    }

    #[Route('/{moduleId}/carnet/{logbookId}/edit', name: 'action_edit', methods: ['GET', 'POST'])]
    public function edit(string $nni, Request $request, int $moduleId, int $logbookId, EntityManagerInterface $entityManager): Response
    {
        // Récupérer le module par son ID
        $module = $entityManager->getRepository(Module::class)->find($moduleId);
        if (!$module) {
            throw $this->createNotFoundException('Une erreur est survenue lors de la récupération du module');
        }

        // Récupérer le logbook par son ID
        $logbook = $entityManager->getRepository(Logbook::class)->find($logbookId);
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
        return $this->render(view: 'action/edit.html.twig', parameters: [
            'form' => $form,
            'action' => $action,
            'logbook' => $logbook,
        ]);
    }

    #[Route('/{id}', name: 'action_delete', methods: ['POST'])]
    public function delete(string $nni, Request $request, Action $action, EntityManagerInterface $entityManager): Response
    {
        $datas = $this->dashboardService->getDashboardData($nni);

        if ($this->isCsrfTokenValid(id: 'delete'.$action->getId(), token: $request->getPayload()->getString(key: '_token'))) {
            $entityManager->remove($action);
            $entityManager->flush();
        }

        return $this->redirectToRoute(
            route: 'action_index',
            parameters: [
                'nni' => $datas['user']->getNni(),
            ],
            status: Response::HTTP_SEE_OTHER
        );
    }
}
