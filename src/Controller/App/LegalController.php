<?php

namespace App\Controller\App;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class LegalController extends AbstractController
{
    #[Route('/politique-confidentialite', name: 'app_privacy_policy')]
    public function privacyPolicy(): Response
    {
        return $this->render('pages/rgpd/politique_confidentialite.html.twig');
    }

    #[Route('/mentions-legales', name: 'app_legal_notices')]
    public function legalNotices(): Response
    {
        return $this->render('pages/rgpd/mentions_legales.html.twig');
    }
}
