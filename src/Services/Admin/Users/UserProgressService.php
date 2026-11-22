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
        private ParameterBagInterface $parameterBag,
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

        $projectDir = $this->parameterBag->get(name: 'kernel.project_dir');
        if (!is_string($projectDir)) {
            throw new \InvalidArgumentException('kernel.project_dir must be a string');
        }

        // Configuration de Dompdf avec des options optimisées pour l'impression
        $options = new Options();
        $options->set(attributes: 'isHtml5ParserEnabled', value: true);
        $options->set(attributes: 'isRemoteEnabled', value: true);
        $options->set(attributes: 'defaultFont', value: 'Arial');
        $options->set('isPhpEnabled', true);
        // Important pour DomPDF : permettre les images locales
        $options->set(attributes: 'chroot', value: $projectDir . '/public');

        // Génération du HTML avec un template dédié à l'impression PDF
        $context = [
            'user' => $user,
            'logbook' => $progressData['logbook'],
            'progress' => $progressData['progress'],
            'date_generation' => new \DateTime(),
            // Chemin absolu requis par Dompdf (les chemins relatifs au chroot
            // ne se résolvent pas pour les balises <img>).
            'logo_path' => $projectDir . '/public/images/logos/edf.png',
        ];

        // Premier passage : le total de pages n'est connu qu'une fois le
        // document mis en page — il est injecté pour « Page X sur Y ».
        $countPass = new Dompdf(options: $options);
        $countPass->loadHtml(str: $this->twig->render(name: 'pdf/workbook.html.twig', context: $context));
        $countPass->setPaper(size: 'A4', orientation: 'portrait');
        $countPass->render();
        $context['total_pages'] = $countPass->getCanvas()->get_page_count();

        $dompdf = new Dompdf(options: $options);
        $dompdf->loadHtml(str: $this->twig->render(name: 'pdf/workbook.html.twig', context: $context));
        $dompdf->setPaper(size: 'A4', orientation: 'portrait');
        $dompdf->render();

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
