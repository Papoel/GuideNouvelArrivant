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
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

/** Service responsable de la gestion de la progression des utilisateurs.
 * Implémente l'interface UserProgressServiceInterface pour respecter le principe d'inversion de dépendance. */
readonly class UserProgressService implements UserProgressServiceInterface
{
    public function __construct(
        private LogbookRepository $logbookRepository,
        private LogbookProgressService $logbookProgressService,
        private ProgressAccessService $progressAccessService,
        private Environment $twig,
        private parameterBagInterface $parameterBag,
    ) {
    }

    public function getUserProgressDetails(User $user): array
    {
        $logbook = $this->logbookRepository->findOneBy(criteria: ['owner' => $user]);

        if (!$logbook) {
            throw new \RuntimeException(message: 'Cet utilisateur n\'a pas de carnet de compagnonnage');
        }

        $progress = $this->logbookProgressService->calculateLogbookProgress(logbook: $logbook);

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
        $progressData = $this->getUserProgressDetails(user: $user);

        // Configuration de Dompdf avec des options optimisées pour l'impression
        $options = new Options();
        $options->set(attributes: 'isHtml5ParserEnabled', value: true);
        $options->set(attributes: 'isRemoteEnabled', value: true);
        $options->set(attributes: 'defaultFont', value: 'Arial');
        $options->set('isPhpEnabled', true);
        // Important pour DomPDF : permettre les images locales
        /* @phpstan-ignore-next-line */
        $options->set(attributes: 'chroot', value: $this->parameterBag->get(name: 'kernel.project_dir') . '/public');

        $dompdf = new Dompdf(options: $options);

        // Génération du HTML avec un template dédié à l'impression PDF
        $html = $this->twig->render(
            name: 'pdf/workbook.html.twig',
            context: [
                'user' => $user,
                'logbook' => $progressData['logbook'],
                'progress' => $progressData['progress'],
                'date_generation' => new \DateTime(),
            ]
        );

        $dompdf->loadHtml(str: $html);

        // Paramétrage de la première page en portrait
        // Les pages suivantes seront configurées en paysage via CSS dans le template
        $dompdf->setPaper(size: 'A4', orientation: 'portrait');

        // Rendu du PDF
        $dompdf->render();

        // Ajout de la pagination après le rendu
        $canvas = $dompdf->getCanvas();

        // Approche simple sans police spécifique (utilise la police par défaut)
        $canvas->page_text(
            520,
            800,
            "Page {PAGE_NUM} sur {PAGE_COUNT}",
            "Arial",
            8,
            // RGG : 61, 95, 158
            // Pour DOMPDF: [61/255, 95/255, 158/255]
            [0.239, 0.373, 0.619]
        );

        // Génération du nom de fichier
        $filename = sprintf(
            'carnet-compagnonnage-%s-%s-%s.pdf',
            $user->getFirstname(),
            $user->getLastname(),
            (new \DateTime())->format(format: 'd-m-Y')
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
