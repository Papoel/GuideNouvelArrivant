<?php

namespace App\Command\Backup;

use App\Services\Backup\BackupService;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:backup:sync',
    description: 'Réconcilie la table backup avec les fichiers présents dans var/backups',
)]
class BackupSyncCommand extends Command
{
    public function __construct(
        private BackupService $backupService
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $result = $this->backupService->syncWithFilesystem();

        if ($result['registered'] > 0) {
            $io->success($result['registered'] . ' fichier(s) orphelin(s) enregistré(s) en base.');
        } else {
            $io->info('Aucun fichier orphelin à enregistrer.');
        }

        if ($result['missing'] !== []) {
            $io->warning([
                \count($result['missing']) . ' enregistrement(s) pointent vers un fichier absent',
                '(probablement créés dans un autre environnement) :',
            ]);
            $io->listing(array_map(
                static fn ($backup): string => $backup->getFilename() . ' — ' . $backup->getFilePath(),
                $result['missing'],
            ));
            $io->note('Ces enregistrements sont conservés mais ne seront pas proposés à la restauration.');
        }

        return Command::SUCCESS;
    }
}
