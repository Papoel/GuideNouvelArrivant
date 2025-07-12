<?php

declare(strict_types=1);

namespace App\Services\Admin\Users;

use App\Entity\User;
use App\Repository\LogbookRepository;
use App\Services\Admin\interfaces\UserProgressServiceInterface;
use App\Services\Admin\Progress\ProgressAccessService;
use App\Services\Logbook\LogbookProgressService;
use Dompdf\Dompdf;
use Dompdf\Options;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

/** Service responsable de la gestion de la progression des utilisateurs.
 * Implémente l'interface UserProgressServiceInterface pour respecter le principe d'inversion de dépendance. */
class UserProgressService implements UserProgressServiceInterface
{
    public function __construct(
        private readonly LogbookRepository $logbookRepository,
        private readonly LogbookProgressService $logbookProgressService,
        private readonly ProgressAccessService $progressAccessService,
        private readonly Environment $twig
    ) {
    }

    public function getUserProgressDetails(User $user): array
    {
        $logbook = $this->logbookRepository->findOneBy(['owner' => $user]);

        if (!$logbook) {
            throw new \RuntimeException('Cet utilisateur n\'a pas de carnet de progression');
        }

        $progress = $this->logbookProgressService->calculateLogbookProgress($logbook);

        return [
            'user' => $user,
            'logbook' => $logbook,
            'progress' => $progress,
        ];
    }

    public function canAccessUserData(User $targetUser): bool
    {
        if ($this->progressAccessService->isSuperAdmin()) {
            return true;
        }

        $currentUserService = $this->progressAccessService->getCurrentUserService();
        $targetUserService = $targetUser->getService()?->getId()?->__toString();

        return $currentUserService && $currentUserService === $targetUserService;
    }

    public function generateUserWorkbookPdf(User $user): Response
    {
        $progressData = $this->getUserProgressDetails($user);

        // Configuration de Dompdf avec des options optimisées pour l'impression
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        $options->set('defaultFont', 'Helvetica');

        $dompdf = new Dompdf($options);

        // Génération du HTML avec un template dédié à l'impression PDF
        $html = $this->twig->render(
            'pdf/workbook.html.twig',
            [
            'user' => $user,
            'logbook' => $progressData['logbook'],
            'progress' => $progressData['progress'],
            'date_generation' => new \DateTime(),
            ]
        );

        $dompdf->loadHtml($html);

        // Paramétrage de la première page en portrait
        // Les pages suivantes seront configurées en paysage via CSS dans le template
        $dompdf->setPaper('A4', 'portrait');

        // Rendu du PDF
        $dompdf->render();

        // Génération du nom de fichier
        $filename = sprintf(
            'carnet-compagnonnage-%s-%s-%s.pdf',
            $user->getFirstname(),
            $user->getLastname(),
            (new \DateTime())->format('d-m-Y')
        );

        // Retourne une réponse HTTP avec le PDF
        return new Response(
            $dompdf->output(),
            Response::HTTP_OK,
            [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => sprintf('attachment; filename="%s"', $filename),
            ]
        );
    }
}
