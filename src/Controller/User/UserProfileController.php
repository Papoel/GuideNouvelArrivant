<?php

namespace App\Controller\User;

use App\Entity\User;
use App\Form\UserProfileType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/profile')]
#[IsGranted('ROLE_USER')]
class UserProfileController extends AbstractController
{
    public function __construct(
        private readonly EntityManagerInterface $entityManager
    ) {
    }

    #[Route('/settings', name: 'app_user_profile_settings')]
    public function settings(Request $request): Response
    {
        /** @var User $user */
        $user = $this->getUser();
        $form = $this->createForm(type: UserProfileType::class, data: $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->flush();
            $this->addFlash(type: 'success', message: 'Vos informations ont été mises à jour avec succès.');

            return $this->redirectToRoute(
                route: 'dashboard_index',
                parameters: [
                    'nni' => $user->getNni(),
                ]
            );
        }

        return $this->render(
            view: 'app/profile/settings.html.twig',
            parameters: [
                'user' => $user,
                'form' => $form->createView(),
            ]
        );
    }
}
