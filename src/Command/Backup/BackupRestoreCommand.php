<?php

namespace App\Command\Backup;

use App\Services\Backup\BackupService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ChoiceQuestion;

#[AsCommand(
    name: 'app:backup:restore',
    description: 'Restaurer une sauvegarde de la base de données',
)]
class BackupRestoreCommand extends Command
{
    public function __construct(
        private BackupService $backupService
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addOption('latest', 'l', InputOption::VALUE_NONE, 'Restaurer la sauvegarde la plus récente')
            ->addOption('yes', 'y', InputOption::VALUE_NONE, 'Ne pas demander de confirmation');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $latest = $input->getOption('latest');
        $skipConfirmation = $input->getOption('yes');

        try {
            $backup = null;

            if ($latest) {
                $backup = $this->backupService->getMostRecentBackup();

                if (!$backup) {
                    $io->error('Aucune sauvegarde disponible.');
                    return Command::FAILURE;
                }

                $io->info("Sauvegarde la plus récente: {$backup->getFilename()} ({$backup->getFormattedSize()})");
            } else {
                $backup = $this->selectBackup($io);

                if (!$backup) {
                    $io->warning('Restauration annulée.');
                    return Command::SUCCESS;
                }
            }

            // Afficher les détails
            $io->section('Détails de la sauvegarde');
            $io->table(
                ['Propriété', 'Valeur'],
                [
                    ['Type', $backup->getType()],
                    ['Fichier', $backup->getFilename()],
                    ['Date', $backup->getCreatedAt()->format('d/m/Y H:i:s')],
                    ['Taille', $backup->getFormattedSize()],
                ]
            );

            // Confirmation
            if (!$skipConfirmation) {
                $io->warning([
                    'ATTENTION: Cette opération va écraser toutes les données actuelles de la base de données!',
                    'Assurez-vous d\'avoir une sauvegarde récente avant de continuer.'
                ]);

                if (!$io->confirm('Êtes-vous sûr de vouloir continuer?', false)) {
                    $io->info('Restauration annulée.');
                    return Command::SUCCESS;
                }
            }

            // Restauration
            $io->text('Restauration en cours...');
            $this->backupService->restoreBackup($backup);

            $io->success('Base de données restaurée avec succès!');
            return Command::SUCCESS;
        } catch (\Exception $e) {
            $io->error('Erreur lors de la restauration: ' . $e->getMessage());
            return Command::FAILURE;
        }
    }

    private function selectBackup(SymfonyStyle $io): mixed
    {
        $backups = $this->backupService->getAllBackups();

        if (empty($backups)) {
            $io->error('Aucune sauvegarde disponible.');
            return null;
        }

        $choices = [];
        $backupMap = [];

        foreach ($backups as $index => $backup) {
            $label = sprintf(
                '[%s] %s - %s (%s)',
                strtoupper($backup->getType()),
                $backup->getCreatedAt()->format('d/m/Y H:i'),
                $backup->getFilename(),
                $backup->getFormattedSize()
            );
            $choices[$index] = $label;
            $backupMap[$index] = $backup;
        }

        $choices['cancel'] = 'Annuler';

        $question = new ChoiceQuestion(
            'Sélectionnez une sauvegarde à restaurer:',
            $choices,
            'cancel'
        );

        $question->setErrorMessage('Choix %s invalide.');

        $answer = $io->askQuestion($question);

        if ($answer === 'Annuler') {
            return null;
        }

        $selectedIndex = array_search($answer, $choices);
        return $backupMap[$selectedIndex] ?? null;
    }
}
