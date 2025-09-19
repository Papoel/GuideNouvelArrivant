<?php

namespace App\Command\Scheduler;

use App\Repository\LogbookRepository;
use App\Services\Logbook\LogbookProgressService;
use App\Services\Mail\MentorReminderEmailService;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mime\Part\DataPart;
use Symfony\Component\Mime\Part\File;
use Symfony\Component\Scheduler\Attribute\AsCronTask;
use Twig\Environment;

#[AsCommand(
    name: 'app:send-mail',
    description: 'Envoie des emails de rappel aux mentors ayant des validations en attente',
)]
#[AsCronTask(
    expression: '* 14 * * 3',
    timezone: 'Europe/Paris',
    schedule: 'task_email',
    method: 'execute',
    transports: 'async'
)] // S'exécute tous les mercredi 14h00.
class SendMailCommand extends Command
{
    public function __construct(
        private readonly LogbookProgressService $logbookProgressService,
        private readonly LogbookRepository $logbookRepository,
        private readonly MentorReminderEmailService $reminderService,
        private readonly MailerInterface $mailer,
        private readonly Environment $twig,
        private readonly ParameterBagInterface $parameterBag,
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this->setHelp(help: 'Cette commande envoie des emails de rappel aux tuteurs qui ont des modules en attente de validation.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $io->title('Envoi des emails de rappel aux mentors');

        try {
            $logbooks = $this->logbookRepository->findAllWithOwnerAndMentor();
            $mentorsWithPending = $this->logbookProgressService->getMentorsWithPendingValidations($logbooks);

            $sentEmails = 0;

            // Chemin du logo
            $projectDirParameter = $this->parameterBag->get('kernel.project_dir');
            if (!is_string($projectDirParameter)) {
                throw new \RuntimeException(message: 'kernel.project_dir doit être une chaîne de caractères');
            }
            $logoPath = $projectDirParameter . '/public/images/logos/edf.png';

            $io->progressStart(max: count(value: $mentorsWithPending['mentors_with_pending_modules']));

            foreach ($mentorsWithPending['mentors_with_pending_modules'] as $mentorData) {
                $reminderData = $this->reminderService->prepareReminderData($mentorData);

                // Générer un Content-ID pour le logo
                $contentId = 'logo@gna-edf.fr';
                $reminderData['logo_cid'] = $contentId;

                // Rendre le template avec les données
                $htmlContent = $this->twig->render(name: 'mail/mentorReminderEmailTemplate.html.twig', context: $reminderData);

                // Créer l'email
                $emailSubject = $reminderData['subject'];

                $email = (new Email())
                    ->from('noreply@gna-edf.fr')
                    ->to($mentorData['mentor_email'])
                    ->addBcc('bridevproject@gmail.com')
                    ->subject($emailSubject)
                    ->html($htmlContent);

                // Intégrer le logo
                if (file_exists($logoPath)) {
                    $email->addPart((new DataPart(new File($logoPath), 'logo', 'image/png'))->asInline());

                    // Mettre à jour le template pour utiliser le Content-ID simple
                    $reminderData['logo_cid'] = 'logo';
                    $htmlContent = $this->twig->render('mail/mentorReminderEmailTemplate.html.twig', $reminderData);
                    $email->html($htmlContent);
                }

                $this->mailer->send($email);
                $sentEmails++;

                $io->progressAdvance();
            }

            $io->progressFinish();
            $io->success(sprintf('%d rappels de validation envoyé(s) par email.', $sentEmails));

            return Command::SUCCESS;
        } catch (\Exception $e) {
            $io->error('Erreur lors de l\'envoi des emails : ' . $e->getMessage());
            return Command::FAILURE;
        } catch (TransportExceptionInterface $e) {
            // Logger l'erreur
            $io->error($e->getMessage());
        }
    }
}
