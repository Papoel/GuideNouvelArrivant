<?php

declare(strict_types=1);

namespace App\Controller\App\Pages;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/pages/', name: 'pages_')]
class PagesController extends AbstractController
{
    #[Route('guide-technique', name: 'guide_technique')]
    public function guideTechnique(): Response
    {
        return $this->render(view: 'pages/guides/guide_technique.html.twig');
    }

    #[Route('processus-elementaire', name: 'processus_elementaire')]
    public function processusElementaire(): Response
    {
        return $this->render(view: 'pages/processus/processus_elementaire.html.twig');
    }
}
