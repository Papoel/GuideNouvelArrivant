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

    public function __invoke(SendReminderEmails $message): void
    {
        $logbooks = $this->logbookRepository->findAllWithOwnerAndMentor();
        $mentorsWithPending = $this->logbookProgressService->getMentorsWithPendingValidations($logbooks);

        $projectDir = $this->parameterBag->get('kernel.project_dir');
        if (!is_string($projectDir)) {
            throw new \InvalidArgumentException('kernel.project_dir must be a string');
        }
        $logoPath = $projectDir . '/public/images/logos/edf.png';

        foreach ($mentorsWithPending['mentors_with_pending_modules'] as $mentorData) {
            $reminderData = $this->reminderService->prepareReminderData($mentorData);

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

            $this->mailer->send($email);
        }
    }
}
