<?php

namespace App\Controller\Security;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    #[Route(path: '/connexion', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        /** @var User $user */
        $user = $this->getUser();

        if ($this->getUser()) {
            return $this->redirectToRoute(route: 'dashboard_index', parameters: ['nni' => $user->getNni()]);
        }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render(view: 'security/login.html.twig', parameters: ['last_username' => $lastUsername, 'error' => $error]);
    }

    #[Route(path: '/deconnexion', name: 'app_logout')]
    public function logout(
        UrlGeneratorInterface $urlGenerator,
        TokenStorageInterface $tokenStorage,
        SessionInterface $session
    ): RedirectResponse {
        $tokenStorage->setToken(token: null);
        $session->invalidate();

        $url = $urlGenerator->generate(name: 'home_index');

        return new RedirectResponse(url: $url, status: Response::HTTP_SEE_OTHER);
    }
}
