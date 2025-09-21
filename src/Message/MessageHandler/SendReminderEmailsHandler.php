<?php

declare(strict_types=1);

namespace App\Message\MessageHandler;

use Twig\Environment;
use Symfony\Component\Mime\Email;
use App\Message\SendReminderEmails;
use App\Repository\LogbookRepository;
use Symfony\Component\Mime\Part\File;
use Symfony\Component\Mime\Part\DataPart;
use Symfony\Component\Mailer\MailerInterface;
use App\Services\Logbook\LogbookProgressService;
use App\Services\Mail\MentorReminderEmailService;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

#[AsMessageHandler]
final class SendReminderEmailsHandler
{
    public function __construct(
        private readonly LogbookProgressService $logbookProgressService,
        private readonly LogbookRepository $logbookRepository,
        private readonly MentorReminderEmailService $reminderService,
        private readonly MailerInterface $mailer,
        private readonly Environment $twig,
        private readonly ParameterBagInterface $parameterBag,
    ) {
    }


    /**
     * @return array<string, mixed>
     */
    public function __invoke(SendReminderEmails $message): array
    {
        $logbooks = $this->logbookRepository->findAllWithOwnerAndMentor();
        $mentorsWithPending = $this->logbookProgressService->getMentorsWithPendingValidations($logbooks);

        $projectDir = $this->parameterBag->get('kernel.project_dir');
        if (!is_string($projectDir)) {
            throw new \InvalidArgumentException('kernel.project_dir must be a string');
        }
        $logoPath = $projectDir . '/public/images/logos/edf.png';

        $sentEmails = [];
        $totalPendingModules = 0;

        foreach ($mentorsWithPending['mentors_with_pending_modules'] as $mentorData) {
            // Extraire les informations détaillées du mentor et des modules
            $reminderData = $this->reminderService->prepareReminderData($mentorData);

            // Compter les modules en attente pour ce mentor
            $pendingModulesCount = $reminderData['pending_modules_count'];
            $totalPendingModules += $pendingModulesCount;

            $contentId = 'logo@gna-edf.fr';
            $reminderData['logo_cid'] = $contentId;

            $htmlContent = $this->twig->render('mail/mentorReminderEmailTemplate.html.twig', $reminderData);

            $email = (new Email())
                ->from('noreply@gna-edf.fr')
                ->to($mentorData['mentor_email'])
                ->addBcc('bridevproject@gmail.com')
                ->subject($reminderData['subject'])
                ->html($htmlContent);

            if (file_exists($logoPath)) {
                $email->addPart((new DataPart(new File($logoPath), 'logo', 'image/png'))->asInline());

                $reminderData['logo_cid'] = 'logo';
                $htmlContent = $this->twig->render('mail/mentorReminderEmailTemplate.html.twig', $reminderData);
                $email->html($htmlContent);
            }

            try {
                $this->mailer->send($email);

                // Enregistrer les détails de l'email envoyé
                $sentEmails[] = [
                    'tuteur_email' => $mentorData['mentor_email'],
                    'tuteur_nom' => $mentorData['mentor_firstname'],
                    'tuteur_nni' => $mentorData['mentor_nni'] ?? 'N/A',
                    'modules_en_attente' => $pendingModulesCount,
                    'apprenant' => $mentorData['owner_fullname'],
                ];
            } catch (\Exception $e) {
                // En cas d'erreur d'envoi, on relance l'exception pour qu'elle soit gérée par la commande
                throw new \RuntimeException(
                    sprintf('Erreur lors de l\'envoi de l\'email à %s: %s', $mentorData['mentor_email'], $e->getMessage()),
                    0,
                    $e
                );
            }
        }

        return [
            'emails_sent' => count($sentEmails),
            'total_pending_modules' => $totalPendingModules,
            'sent_emails' => $sentEmails,
            'execution_summary' => [
                'total_mentors_processed' => count($mentorsWithPending['mentors_with_pending_modules']),
                'total_logbooks_analyzed' => count($logbooks)
            ]
        ];
    }
}
