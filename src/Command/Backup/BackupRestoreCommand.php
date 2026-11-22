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
            ->addOption('file', 'f', InputOption::VALUE_REQUIRED, 'Restaurer directement un fichier .sql.gz (même non enregistré en BDD)')
            ->addOption('yes', 'y', InputOption::VALUE_NONE, 'Ne pas demander de confirmation');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $latest = $input->getOption('latest');
        $file = $input->getOption('file');
        $skipConfirmation = $input->getOption('yes');

        try {
            // Restauration directe d'un fichier, sans enregistrement BDD
            if ($file !== null) {
                return $this->restoreFromFile($io, $file, $skipConfirmation);
            }

            // La table backup peut décrire les fichiers d'un autre
            // environnement (base restaurée depuis un dump) : on réenregistre
            // d'abord les fichiers réellement présents sur disque.
            $this->backupService->syncWithFilesystem();

            $backup = null;

            if ($latest) {
                // La plus récente *restaurable* : fichier réellement présent
                $backup = $this->backupService->getAvailableBackups()[0] ?? null;

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
            $this->synchronizeMigrations($io);

            $io->success('Base de données restaurée avec succès!');
            return Command::SUCCESS;
        } catch (\Exception $e) {
            $io->error('Erreur lors de la restauration: ' . $e->getMessage());
            return Command::FAILURE;
        }
    }

    /** Restaure un fichier .sql.gz passé en option — couvre le cas où la table
     * backup décrit des fichiers d'un autre environnement (dump importé). */
    private function restoreFromFile(SymfonyStyle $io, string $file, bool $skipConfirmation): int
    {
        if (!is_file($file) || !str_ends_with($file, '.sql.gz')) {
            $io->error('Fichier introuvable ou format invalide (attendu : .sql.gz) : ' . $file);
            return Command::FAILURE;
        }

        $io->section('Détails de la sauvegarde');
        $io->table(
            ['Propriété', 'Valeur'],
            [
                ['Fichier', $file],
                ['Taille', round(filesize($file) / 1024, 2) . ' KB'],
            ]
        );

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

        $io->text('Restauration en cours...');
        $this->backupService->restoreBackupFile($file);
        $this->synchronizeMigrations($io);

        $io->success('Base de données restaurée avec succès!');

        return Command::SUCCESS;
    }

    /** Après un restore, le schéma régresse au contenu du dump : on rejoue les
     * migrations. Celles dont l'objet survit au dump sont marquées exécutées. */
    private function synchronizeMigrations(SymfonyStyle $io): void
    {
        $io->text('Synchronisation du schéma (migrations)...');
        $marked = $this->backupService->synchronizeMigrations();

        if ($marked !== []) {
            $io->warning([
                \count($marked) . ' migration(s) marquée(s) exécutée(s) car leurs objets',
                'existaient déjà dans la base restaurée :',
                ...$marked,
            ]);
        }
    }

    private function selectBackup(SymfonyStyle $io): mixed
    {
        // Ne propose que les sauvegardes dont le fichier existe réellement —
        // les enregistrements d'un autre environnement ne sont pas restaurables.
        $backups = $this->backupService->getAvailableBackups();

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

        if ($answer === 'cancel') {
            return null;
        }

        return $backupMap[(int)$answer] ?? null;
    }
}
