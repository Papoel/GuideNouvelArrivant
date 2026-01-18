<?php

declare(strict_types=1);

namespace App\Controller\User;

use App\Entity\User;
use App\Services\RGPD\UserDataExportService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/profile')]
#[IsGranted('ROLE_USER')]
class UserDataExportController extends AbstractController
{
    public function __construct(
        private readonly UserDataExportService $userDataExportService,
    ) {
    }

    #[Route('/export-data', name: 'app_user_export_data', methods: ['GET'])]
    public function exportData(): Response
    {
        /** @var User $user */
        $user = $this->getUser();

        $pdfContent = $this->userDataExportService->exportUserDataAsPdf($user);

        $filename = sprintf(
            'export_donnees_%s_%s.pdf',
            $user->getNni(),
            (new \DateTimeImmutable())->format('Y-m-d_H-i')
        );

        return new Response($pdfContent, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => sprintf('attachment; filename="%s"', $filename),
        ]);
    }
}
