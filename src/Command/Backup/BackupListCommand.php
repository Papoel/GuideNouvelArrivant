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
    name: 'app:backup:list',
    description: 'Lister toutes les sauvegardes disponibles',
)]
class BackupListCommand extends Command
{
    public function __construct(
        private BackupService $backupService
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this->addOption('type', 't', InputOption::VALUE_REQUIRED, 'Filtrer par type (daily, weekly, monthly, annual)');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $typeFilter = $input->getOption('type');

        try {
            $backups = $this->backupService->getAllBackups($typeFilter);

            if (empty($backups)) {
                $io->info('Aucune sauvegarde trouvée.');
                return Command::SUCCESS;
            }

            $rows = [];
            foreach ($backups as $backup) {
                $rows[] = [
                    $backup->getId(),
                    strtoupper($backup->getType()),
                    $backup->getCreatedAt()->format('d/m/Y H:i:s'),
                    $backup->getFilename(),
                    $backup->getFormattedSize(),
                ];
            }

            $io->title('Sauvegardes disponibles');
            $io->table(
                ['ID', 'Type', 'Date', 'Fichier', 'Taille'],
                $rows
            );

            $io->info('Total: ' . count($backups) . ' sauvegarde(s)');

            return Command::SUCCESS;
        } catch (\Exception $e) {
            $io->error('Erreur: ' . $e->getMessage());
            return Command::FAILURE;
        }
    }
}
