<?php

declare(strict_types=1);

namespace App\Controller\App;

use App\Services\RGPD\AccountDeletionService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AccountDeletionPublicController extends AbstractController
{
    public function __construct(
        private readonly AccountDeletionService $accountDeletionService,
    ) {
    }

    #[Route('/deletion-cancel/{token}', name: 'app_account_deletion_cancel_by_token', methods: ['GET'])]
    public function cancelByToken(string $token): Response
    {
        $deletionRequest = $this->accountDeletionService->cancelDeletionRequestByToken($token);

        if ($deletionRequest === null) {
            return $this->render('pages/rgpd/deletion_cancel_error.html.twig');
        }

        return $this->render('pages/rgpd/deletion_cancel_success.html.twig', [
            'deletionRequest' => $deletionRequest,
        ]);
    }
}
