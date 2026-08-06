<?php

declare(strict_types=1);

namespace App\Command\Emails;

use App\Repository\LogbookRepository;
use App\Repository\UserRepository;
use App\Services\Logbook\LogbookProgressService;
use App\Services\Mail\MentorReminderEmailService;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Twig\Environment;

#[AsCommand(
    name: 'app:test-outlook',
    description: 'Envoie un email de rappel de test avec les vraies données d\'un apprenant'
)]
class WeeklyMentorReportTest extends Command
{
    public function __construct(
        private readonly MailerInterface $mailer,
        private readonly UserRepository $userRepository,
        private readonly LogbookRepository $logbookRepository,
        private readonly LogbookProgressService $logbookProgressService,
        private readonly MentorReminderEmailService $mentorReminderEmailService,
        private readonly Environment $twig,
        #[Autowire('%kernel.project_dir%')]
        private readonly string $projectDir,
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $io->title('Test — Email rappel tuteur (données réelles)');

        // ── 1. NNI de l'apprenant ─────────────────────────────────────────────
        $nni = $io->ask(
            question: 'NNI du nouvel apprenant',
            validator: static function (?string $value): string {
                if (!$value || trim($value) === '') {
                    throw new \RuntimeException('Le NNI ne peut pas être vide.');
                }

                return strtoupper(trim($value));
            }
        );

        // ── 2. Email de réception du test ─────────────────────────────────────
        $to = $io->ask(
            question: 'Email de réception du test',
            validator: static function (?string $value): string {
                if (!$value || !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    throw new \RuntimeException(sprintf('Adresse email invalide : "%s"', $value ?? ''));
                }

                return $value;
            }
        );

        // ── 3. Recherche de l'apprenant par NNI ──────────────────────────────
        /** @var string $nni */
        $apprenant = $this->userRepository->findOneBy(['nni' => $nni]);

        if (!$apprenant) {
            $io->error(sprintf('Aucun apprenant trouvé avec le NNI "%s".', $nni));

            return Command::FAILURE;
        }

        $io->text(sprintf('✓ Apprenant identifié : <info>%s</info>', $apprenant->getFullname()));

        // ── 4. Récupération du carnet avec toutes les relations ───────────────
        $logbooks = $this->logbookRepository->findByUserWithFullRelations($apprenant);

        if (empty($logbooks)) {
            $io->error(sprintf('Aucun carnet trouvé pour l\'apprenant "%s".', $apprenant->getFullname()));

            return Command::FAILURE;
        }

        // ── 5. Calcul des modules en attente de validation ────────────────────
        $mentorsData = $this->logbookProgressService->getMentorsWithPendingValidations($logbooks);

        if (empty($mentorsData['mentors_with_pending_modules'])) {
            $io->warning([
                sprintf('Aucun module en attente de validation pour "%s".', $apprenant->getFullname()),
                'Le tuteur ne recevrait aucun email dans l\'état actuel.',
            ]);

            return Command::FAILURE;
        }

        // ── 6. Préparation des données (premier tuteur = tuteur de l'apprenant) ─
        $mentorRawData = reset($mentorsData['mentors_with_pending_modules']);
        $data = $this->mentorReminderEmailService->prepareReminderData($mentorRawData);

        // ── 7. Récapitulatif avant envoi ──────────────────────────────────────
        $io->section('Récapitulatif des données envoyées');
        $io->table(
            headers: ['Paramètre', 'Valeur'],
            rows: [
                ['Destinataire (test)', $to],
                ['Tuteur', sprintf('%s <%s>', $data['mentor_firstname'], $data['mentor_email'])],
                ['NNI tuteur', $data['mentor_nni'] ?? 'N/A'],
                ['Apprenant', $data['owner_fullname']],
                ['Modules en attente', (string) $data['pending_modules_count']],
                ['Priorité', $data['urgency_level']['text'] ?: ucfirst($data['urgency_level']['level'])],
                ['Sujet', $data['subject']],
            ]
        );

        // ── 8. Intégration du logo ────────────────────────────────────────────
        $email = (new Email())
            ->from('no-reply@gna.papoel.fr')
            ->to($to)
            ->subject('[TEST] ' . $data['subject']);

        $logoCid = null;
        $logoPath = $this->projectDir . '/public/images/logos/edf.png';
        $svgLogoPath = $this->projectDir . '/public/images/logos/edf.svg';

        if (file_exists($logoPath)) {
            $email->embedFromPath($logoPath, 'logo');
            $logoCid = 'logo';
        } elseif (file_exists($svgLogoPath)) {
            $email->embedFromPath($svgLogoPath, 'logo', 'image/svg+xml');
            $logoCid = 'logo';
        }

        // ── 9. Rendu du template Twig avec les données réelles ────────────────
        $html = $this->twig->render('emails_maizzle/weekly_mentor_report.html', [
            'subject'               => $data['subject'],
            'mentor_firstname'      => $data['mentor_firstname'],
            'mentor_email'          => $data['mentor_email'],
            'mentor_nni'            => $data['mentor_nni'],
            'owner_fullname'        => $data['owner_fullname'],
            'pending_modules_count' => $data['pending_modules_count'],
            'number_text'           => $data['number_text'],
            'modules_text'          => $data['modules_text'],
            'verb_text'             => $data['verb_text'],
            'triggeredAt'           => new \DateTimeImmutable(),
            'urgency_level'         => $data['urgency_level'],
            'logo_cid'              => $logoCid,
        ]);

        $email->html($html);

        // ── 10. Envoi ─────────────────────────────────────────────────────────
        try {
            $io->text('⏳ Envoi en cours...');
            $this->mailer->send($email);
            $io->success(sprintf('Email de test envoyé avec succès à "%s".', $to));

            return Command::SUCCESS;
        } catch (TransportExceptionInterface $e) {
            $io->error([
                sprintf('Échec de l\'envoi vers "%s".', $to),
                $e->getMessage(),
            ]);

            return Command::FAILURE;
        }
    }
}
