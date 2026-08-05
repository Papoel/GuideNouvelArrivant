<?php

declare(strict_types=1);

namespace App\Command\Emails;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

#[AsCommand(
    name: 'app:test-outlook',
    description: 'Envoie un email de test (design Maizzle) à l\'adresse spécifiée'
)]
class WeeklyMentorReportTest extends Command
{
    public function __construct(
        private readonly MailerInterface $mailer,
        #[Autowire('%kernel.project_dir%')]
        private readonly string $projectDir,
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this->addArgument(
            name: 'email',
            mode: InputArgument::OPTIONAL,
            description: 'Adresse email de destination pour le test'
        );
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $to = $input->getArgument('email');

        if (!$to) {
            $to = $io->ask(
                question: 'Adresse email de destination',
                validator: static function (?string $value): string {
                    if (!$value || !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                        throw new \RuntimeException(sprintf('Adresse email invalide : "%s"', $value ?? ''));
                    }

                    return $value;
                }
            );
        } elseif (!filter_var($to, FILTER_VALIDATE_EMAIL)) {
            $io->error(sprintf('Adresse email invalide : "%s"', $to));

            return Command::FAILURE;
        }

        // Lecture du HTML compilé par Maizzle
        $htmlPath = $this->projectDir . '/templates/emails_maizzle/weekly_mentor_report.html';

        if (!file_exists($htmlPath)) {
            $io->error([
                'Template Maizzle introuvable.',
                sprintf('Chemin attendu : %s', $htmlPath),
                'Lancez d\'abord : cd maizzle && npm run build',
            ]);

            return Command::FAILURE;
        }

        $html = file_get_contents($htmlPath);

        if ($html === false) {
            $io->error('Impossible de lire le fichier HTML du template.');

            return Command::FAILURE;
        }

        $io->section('Envoi de l\'email de test (design Maizzle)');
        $io->table(
            headers: ['Paramètre', 'Valeur'],
            rows: [
                ['Destinataire', $to],
                ['Expéditeur', 'no-reply@gna.papoel.fr'],
                ['Sujet', '[TEST] Rapport hebdomadaire Tuteur — Design Maizzle'],
                ['Template', 'templates/emails_maizzle/weekly_mentor_report.html'],
            ]
        );

        $email = (new Email())
            ->from('no-reply@gna.papoel.fr')
            ->to($to)
            ->subject('[TEST] Rapport hebdomadaire Tuteur — Design Maizzle')
            ->html($html);

        try {
            $io->text('⏳ Envoi en cours...');
            $this->mailer->send($email);
            $io->success(sprintf('Email envoyé avec succès à "%s".', $to));

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
