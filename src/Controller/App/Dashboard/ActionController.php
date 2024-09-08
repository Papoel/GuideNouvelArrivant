<?php

namespace App\Controller\App\Dashboard;

use App\Entity\Action;
use App\Entity\Module;
use App\Entity\User;
use App\Form\ActionType;
use App\Repository\ActionRepository;
use App\Services\Dashboard\DashboardService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/dashboard/{nni}/action')]
#[IsGranted('ROLE_USER')]
class ActionController extends AbstractController
{
    public function __construct(
        private readonly DashboardService $dashboardService,
    ) {
    }

    #[Route('/', name: 'action_index', methods: ['GET'])]
    public function index(ActionRepository $actionRepository): Response
    {
        return $this->render(view: 'action/index.html.twig', parameters: [
            'actions' => $actionRepository->findAll(),
        ]);
    }

    #[Route('/{id}/edit', name: 'action_edit', methods: ['GET', 'POST'])]
    public function edit(string $nni, Request $request, Module $module, EntityManagerInterface $entityManager): Response
    {
        /** @var User $currentUser */
        $currentUser = $this->getUser();
        // Utilisation de assert() pour dire à PHPStan que $currentUser est une instance de User
        assert($currentUser instanceof User);
        $datas = $this->dashboardService->getDashboardData(nni: $nni, currentUser: $currentUser);
        $nni = $this->dashboardService->getNniByUser(user: $currentUser);

        // Recherche une action existante pour ce module, sinon on en crée une nouvelle
        $action = $entityManager->getRepository(Action::class)->findOneBy(['module' => $module]);

        if (!$action) {
            $action = new Action();
            $action->setModule($module);  // Associer l'action au module
        }

        // On crée le formulaire
        $form = $this->createForm(type: ActionType::class, data: $action);
        $form->handleRequest($request);

        // Si le formulaire est soumis et valide
        if ($form->isSubmitted() && $form->isValid()) {
            // On ajoute la signature numérique de l'agent
            $currentDate = new \DateTime(timezone: new \DateTimeZone(timezone: 'Europe/Paris'));
            $action->setAgentVisa(agentVisa: 'Visa numérique de '.$currentUser->getFullName().' le '.$currentDate->format(format: 'd/m/Y à H:i'));
            // On enregistre l'action
            $entityManager->persist($action);
            $entityManager->flush();

            // On redirige vers la liste des actions
            return $this->redirectToRoute(
                route: 'action_index',
                parameters: [
                    'nni' => $currentUser->getNni(),
                ],
                status: Response::HTTP_SEE_OTHER
            );
        }

        // On affiche le formulaire
        return $this->render(view: 'action/edit.html.twig', parameters: [
            'logbooks' => $datas['logbooks'],
            'modules' => $datas['modules'],
            'themes' => $datas['themes'],
            'actions' => $datas['actions'],
            'action' => $action,
            'form' => $form,
        ], response: new Response());
    }

    #[Route('/{id}', name: 'action_delete', methods: ['POST'])]
    public function delete(Request $request, Action $action, EntityManagerInterface $entityManager): Response
    {
        /** @var User $currentUser */
        $currentUser = $this->getUser();
        // Utilisation de assert() pour dire à PHPStan que $currentUser est une instance de User
        assert(assertion: $currentUser instanceof User);

        $nni = $currentUser->getNni();

        // Vérifier si le NNI est nul
        if (null === $nni) {
            throw new \LogicException(message: 'NNI ne peut pas être nul pour un utilisateur authentifié.');
        }

        $datas = $this->dashboardService->getDashboardData(nni: $nni, currentUser: $currentUser);

        if ($this->isCsrfTokenValid('delete'.$action->getId(), $request->getPayload()->getString(key: '_token'))) {
            $entityManager->remove($action);
            $entityManager->flush();
        }

        return $this->redirectToRoute(
            route: 'action_index',
            parameters: [
                'nni' => $currentUser->getNni(),
            ],
            status: Response::HTTP_SEE_OTHER
        );
    }
}
