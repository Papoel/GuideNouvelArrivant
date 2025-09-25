<?php

declare(strict_types=1);

namespace App\Services\Mail;

use App\Repository\LogbookRepository;
use App\Services\Logbook\LogbookProgressService;
use Psr\Log\LoggerInterface;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mime\Part\DataPart;
use Symfony\Component\Mime\Part\File;
use Twig\Environment;

class WeeklyReminderEmailService
{
    public function __construct(
        private readonly LogbookProgressService $logbookProgressService,
        private readonly LogbookRepository $logbookRepository,
        private readonly MailerInterface $mailer,
        private readonly Environment $twig,
    ) {
    }

    public function send(\DateTimeImmutable $triggeredAt): void
    {
        $logbooks = $this->logbookRepository->findAllWithOwnerAndMentor();
        $mentors = $this->logbookProgressService->getMentorsWithPendingValidations($logbooks);

        foreach ($mentors['mentors_with_pending_modules'] as $mentorData) {
            $subject = 'Modules en attente de validation';

            // Déterminer le texte selon le nombre de modules
            $pendingModulesCount = $mentorData['pending_modules_count'];
            $numberText = $this->getNumberInFrench($pendingModulesCount);
            $modulesText = $pendingModulesCount > 1 ? 'modules' : 'module';
            $verbText = $pendingModulesCount > 1 ? 'sont' : 'est';

            // Définir le niveau d'urgence en fonction du nombre de modules
            $urgencyLevel = ['text' => '', 'class' => ''];
            if ($pendingModulesCount > 5) {
                $urgencyLevel = ['text' => 'Urgent', 'class' => 'urgent'];
            } elseif ($pendingModulesCount > 2) {
                $urgencyLevel = ['text' => 'Important', 'class' => 'important'];
            } else {
                $urgencyLevel = ['text' => 'Normal', 'class' => 'normal'];
            }

            // Création de l'email
            $email = (new Email())
                ->from('no-reply@gna.papoel.fr')
                ->to($mentorData['mentor_email'])
                ->subject($subject);

            // Recherche et intégration du logo
            $logoPath = __DIR__ . '/../../../public/images/logos/edf.png';
            $svgLogoPath = __DIR__ . '/../../../public/images/logos/edf.svg';
            $logo_cid = null;

            if (file_exists($logoPath)) {
                // Utiliser le logo PNG s'il existe
                $email->embedFromPath($logoPath, 'logo'); // Retourne l'objet Email, pas le CID
                $logo_cid = 'logo'; // Le CID est le nom utilisé comme second paramètre
            } elseif (file_exists($svgLogoPath)) {
                // Utiliser le logo SVG comme fallback
                $email->embedFromPath($svgLogoPath, 'logo', 'image/svg+xml');
                $logo_cid = 'logo'; // Même CID pour la cohérence
            }

            // Rendu du template avec le CID du logo
            $html = $this->twig->render(name: 'mail/mentorReminderEmailTemplate.html.twig', context: [
                'subject' => $subject,
                'mentor_firstname' => $mentorData['mentor_firstname'],
                'mentor_email' => $mentorData['mentor_email'],
                'mentor_nni' => $mentorData['mentor_nni'],
                'owner_fullname' => $mentorData['owner_fullname'],
                'pending_modules_count' => $pendingModulesCount,
                'number_text' => $numberText,
                'modules_text' => $modulesText,
                'verb_text' => $verbText,
                'triggeredAt' => $triggeredAt,
                'urgency_level' => $urgencyLevel,
                'logo_cid' => $logo_cid,
            ]);

            // Ajouter le contenu HTML à l'email
            $email->html($html);

            try {
                $this->mailer->send(message: $email);
            } catch (TransportExceptionInterface $e) {
                // Log de l'erreur à implémenter si nécessaire
            }
        }
    }

    /**
     * Convertit un nombre en français textuel
     */
    private function getNumberInFrench(int $number): string
    {
        return match ($number) {
            1 => 'un',
            2 => 'deux',
            3 => 'trois',
            4 => 'quatre',
            5 => 'cinq',
            6 => 'six',
            7 => 'sept',
            8 => 'huit',
            9 => 'neuf',
            10 => 'dix',
            default => (string) $number,
        };
    }
}
