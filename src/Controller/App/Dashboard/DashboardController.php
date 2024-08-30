<?php

declare(strict_types=1);

namespace App\Controller\App\Dashboard;

use App\Entity\Module;
use App\Entity\User;
use App\Services\Action\ActionService;
use App\Services\Dashboard\DashboardService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_USER')]
#[Route('/dashboard/{nni}', name: 'dashboard_')]
class DashboardController extends AbstractController
{
    public function __construct(
        private readonly EntityManagerInterface $entityManager
    ) {
    }

    #[Route('/', name: 'index', methods: [Request::METHOD_GET, Request::METHOD_POST])]
    public function index(string $nni, DashboardService $dashboardService): Response
    {
        // 1. Récupérer les données du tableau de bord via le service
        $dashboardData = $dashboardService->getDashboardData(nni: $nni, currentUser: $this->getUser() instanceof User ? $this->getUser() : null);

        // 2. Rendu du tableau de bord
        return $this->render(view: 'app/dashboard/dashboard.html.twig', parameters: $dashboardData);
    }

    #[Route('/action/{module}', name: 'action', requirements: ['module' => '\d+'], methods: [Request::METHOD_GET, Request::METHOD_POST])]
    public function module(ActionService $actionService, string $nni, ?int $module = null): Response
    {
        $moduleEntity = $this->entityManager->getRepository(Module::class)->find($module);

        if (!$moduleEntity) {
            // Gérer le cas où le module n'existe pas
            $this->addFlash(type: 'danger', message: 'Erreur: le module '.$module.' n\'existe pas.');

            return $this->redirectToRoute(route: 'dashboard_index', parameters: ['nni' => $nni]);
        }

        $moduleId = $moduleEntity->getId();

        $datas = $actionService->getActionByModuleId(
            nni: $nni,
            moduleId: $moduleId
        );

        return $this->render(view: 'app/module/index.html.twig', parameters: ['actions' => $datas['actions']]);
    }
}
