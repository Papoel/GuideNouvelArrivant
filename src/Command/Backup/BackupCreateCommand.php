<?php

namespace App\Command\Backup;

use App\Services\Backup\BackupService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:backup:create',
    description: 'Créer une sauvegarde de la base de données',
)]
class BackupCreateCommand extends Command
{
    public function __construct(
        private BackupService $backupService
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('type', InputArgument::OPTIONAL, 'Type de sauvegarde (daily, weekly, monthly, annual)')
            ->addOption('force', '-f', InputOption::VALUE_NONE, 'Forcer la création même si non planifiée')
            ->addOption('all', '-a', InputOption::VALUE_NONE, 'Créer toutes les sauvegardes nécessaires')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $type = $input->getArgument('type');
        $force = $input->getOption('force');
        $all = $input->getOption('all');

        try {
            if ($all) {
                $this->createAllScheduledBackups($io, $force);
            } elseif ($type) {
                $this->createSingleBackup($io, $type, $force);
            } else {
                $io->error('Vous devez spécifier un type de sauvegarde ou utiliser --all');
                return Command::FAILURE;
            }

            return Command::SUCCESS;
        } catch (\Exception $e) {
            $io->error('Erreur lors de la création de la sauvegarde: ' . $e->getMessage());
            return Command::FAILURE;
        }
    }

    private function createSingleBackup(SymfonyStyle $io, string $type, bool $force): void
    {
        if (!$force && !$this->backupService->shouldCreateBackup($type)) {
            $io->warning("La sauvegarde {$type} n'est pas planifiée pour le moment. Utilisez --force pour forcer.");
            return;
        }

        $io->text("Création de la sauvegarde {$type}...");
        $backup = $this->backupService->createBackup($type);

        $io->success([
            "Sauvegarde {$type} créée avec succès!",
            "Fichier: {$backup->getFilename()}",
            "Taille: {$backup->getFormattedSize()}",
        ]);
    }

    private function createAllScheduledBackups(SymfonyStyle $io, bool $force): void
    {
        $types = ['daily', 'weekly', 'monthly', 'annual'];
        $created = [];

        foreach ($types as $type) {
            if ($force || $this->backupService->shouldCreateBackup($type)) {
                $io->text("Création de la sauvegarde {$type}...");
                $backup = $this->backupService->createBackup($type);
                $created[] = "{$type} ({$backup->getFormattedSize()})";
            }
        }

        if (empty($created)) {
            $io->info('Aucune sauvegarde planifiée pour le moment.');
        } else {
            $io->success([
                'Sauvegardes créées:',
                ...$created
            ]);
        }
    }
}
