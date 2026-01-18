<?php

declare(strict_types=1);

namespace App\Controller\User;

use App\Entity\User;
use App\Services\RGPD\AccountDeletionService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/profile')]
#[IsGranted('ROLE_USER')]
class AccountDeletionController extends AbstractController
{
    public function __construct(
        private readonly AccountDeletionService $accountDeletionService,
    ) {
    }

    #[Route('/delete-account', name: 'app_account_deletion_request', methods: ['GET', 'POST'])]
    public function requestDeletion(Request $request): Response
    {
        /** @var User $user */
        $user = $this->getUser();

        $pendingRequest = $this->accountDeletionService->getPendingRequestForUser($user);

        if ($request->isMethod('POST')) {
            if ($pendingRequest !== null) {
                $this->addFlash('warning', 'Une demande de suppression est déjà en cours.');

                return $this->redirectToRoute('app_account_deletion_request');
            }

            $submittedToken = $request->getPayload()->getString('_token');
            if (!$this->isCsrfTokenValid('delete-account', $submittedToken)) {
                $this->addFlash('danger', 'Token CSRF invalide.');

                return $this->redirectToRoute('app_account_deletion_request');
            }

            try {
                $this->accountDeletionService->createDeletionRequest($user, $user);
                $this->addFlash('success', 'Votre demande de suppression a été enregistrée. Vous avez 48 heures pour annuler cette demande.');

                return $this->redirectToRoute('dashboard_index', [
                    'nni' => $user->getNni(),
                ]);
            } catch (\RuntimeException $e) {
                $this->addFlash('danger', $e->getMessage());
            }

            return $this->redirectToRoute('app_account_deletion_request');
        }

        return $this->render('pages/rgpd/account_deletion_request.html.twig', [
            'pendingRequest' => $pendingRequest,
        ]);
    }

    #[Route('/delete-account/cancel', name: 'app_account_deletion_cancel', methods: ['GET', 'POST'])]
    public function cancelDeletion(Request $request): Response
    {
        /** @var User $user */
        $user = $this->getUser();

        $pendingRequest = $this->accountDeletionService->getPendingRequestForUser($user);

        if ($pendingRequest === null) {
            $this->addFlash('warning', 'Aucune demande de suppression en cours.');

            return $this->redirectToRoute('dashboard_index', [
                'nni' => $user->getNni(),
            ]);
        }

        if ($request->isMethod('GET')) {
            return $this->render('pages/rgpd/account_deletion_cancel_confirm.html.twig', [
                'pendingRequest' => $pendingRequest,
            ]);
        }

        $submittedToken = $request->getPayload()->getString('_token');
        if (!$this->isCsrfTokenValid('cancel-deletion', $submittedToken)) {
            $this->addFlash('danger', 'Token CSRF invalide.');

            return $this->redirectToRoute('app_account_deletion_cancel');
        }

        try {
            $this->accountDeletionService->cancelDeletionRequest($pendingRequest);
            $this->addFlash('success', 'Votre demande de suppression a été annulée. Votre compte est conservé.');
        } catch (\RuntimeException $e) {
            $this->addFlash('danger', $e->getMessage());
        }

        return $this->redirectToRoute('dashboard_index', [
            'nni' => $user->getNni(),
        ]);
    }
}
