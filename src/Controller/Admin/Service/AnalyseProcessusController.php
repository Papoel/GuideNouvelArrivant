<?php

declare(strict_types=1);

namespace App\Controller\Admin\Service;

use App\Repository\LogbookRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/service/analyse-processus', name: 'service_analyse_processus_')]
class AnalyseProcessusController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function analyseProcessus(LogbookRepository $logbookRepository): Response
    {
        $checkConformity = $logbookRepository->checkConformity();

        return $this->render(view: 'admin/service/analyse_processus.html.twig', parameters: [
            'check_conformity' => $checkConformity
        ]);
    }
}
