<?php

namespace App\Controller\App;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route(path: '/', name: 'home_index')]
    public function index(): Response
    {
        // return $this->render(view: 'app/home/homepage.html.twig');
        if ($this->isGranted('ROLE_USER')) {
            /** @var User $user */
            $user = $this->getUser();
            return $this->redirectToRoute(route: 'dashboard_index', parameters: ['nni' => $user->getNni()]);
        }
        return $this->redirectToRoute(route: 'app_login');
    }
}
