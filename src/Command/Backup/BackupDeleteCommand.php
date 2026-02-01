<?php

namespace App\Command\Backup;

use App\Repository\BackupRepository;
use App\Services\Backup\BackupService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ChoiceQuestion;

#[AsCommand(
    name: 'app:backup:delete',
    description: 'Supprimer une ou plusieurs sauvegardes',
)]
class BackupDeleteCommand extends Command
{
    public function __construct(
        private BackupService $backupService,
        private BackupRepository $backupRepository
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('id', InputArgument::OPTIONAL, 'ID de la sauvegarde à supprimer')
            ->addOption('type', 't', InputOption::VALUE_REQUIRED, 'Supprimer toutes les sauvegardes d\'un type')
            ->addOption('older-than', null, InputOption::VALUE_REQUIRED, 'Supprimer les sauvegardes plus anciennes que X jours')
            ->addOption('yes', 'y', InputOption::VALUE_NONE, 'Ne pas demander de confirmation');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $id = $input->getArgument('id');
        $type = $input->getOption('type');
        $olderThan = $input->getOption('older-than');
        $skipConfirmation = $input->getOption('yes');

        try {
            if ($id) {
                return $this->deleteById($io, (int)$id, $skipConfirmation);
            }

            if ($type) {
                return $this->deleteByType($io, $type, $skipConfirmation);
            }

            if ($olderThan) {
                return $this->deleteOlderThan($io, (int)$olderThan, $skipConfirmation);
            }

            // Mode interactif
            return $this->deleteInteractive($io, $skipConfirmation);
        } catch (\Exception $e) {
            $io->error('Erreur lors de la suppression: ' . $e->getMessage());
            return Command::FAILURE;
        }
    }

    private function deleteById(SymfonyStyle $io, int $id, bool $skipConfirmation): int
    {
        $backup = $this->backupRepository->find($id);

        if (!$backup) {
            $io->error("Sauvegarde #{$id} introuvable.");
            return Command::FAILURE;
        }

        $io->table(
            ['Propriété', 'Valeur'],
            [
                ['ID', $backup->getId()],
                ['Type', strtoupper($backup->getType())],
                ['Date', $backup->getCreatedAt()->format('d/m/Y H:i:s')],
                ['Fichier', $backup->getFilename()],
                ['Taille', $backup->getFormattedSize()],
            ]
        );

        if (!$skipConfirmation && !$io->confirm('Voulez-vous vraiment supprimer cette sauvegarde ?', false)) {
            $io->info('Suppression annulée.');
            return Command::SUCCESS;
        }

        $this->backupService->deleteBackup($backup);
        $io->success('Sauvegarde supprimée avec succès.');

        return Command::SUCCESS;
    }

    private function deleteByType(SymfonyStyle $io, string $type, bool $skipConfirmation): int
    {
        $backups = $this->backupRepository->findByType($type);

        if (empty($backups)) {
            $io->info("Aucune sauvegarde de type '{$type}' trouvée.");
            return Command::SUCCESS;
        }

        $io->warning("Vous allez supprimer " . count($backups) . " sauvegarde(s) de type '{$type}'.");

        if (!$skipConfirmation && !$io->confirm('Êtes-vous sûr ?', false)) {
            $io->info('Suppression annulée.');
            return Command::SUCCESS;
        }

        $count = 0;
        foreach ($backups as $backup) {
            $this->backupService->deleteBackup($backup);
            $count++;
        }

        $io->success("{$count} sauvegarde(s) supprimée(s).");

        return Command::SUCCESS;
    }

    private function deleteOlderThan(SymfonyStyle $io, int $days, bool $skipConfirmation): int
    {
        $date = new \DateTimeImmutable("-{$days} days");

        $backups = $this->backupRepository->createQueryBuilder('b')
            ->where('b.createdAt < :date')
            ->setParameter('date', $date)
            ->getQuery()
            ->getResult();

        if (empty($backups)) {
            $io->info("Aucune sauvegarde trouvée plus ancienne que {$days} jours.");
            return Command::SUCCESS;
        }

        $io->warning("Vous allez supprimer " . count($backups) . " sauvegarde(s) plus anciennes que {$days} jours.");

        if (!$skipConfirmation && !$io->confirm('Êtes-vous sûr ?', false)) {
            $io->info('Suppression annulée.');
            return Command::SUCCESS;
        }

        $count = 0;
        foreach ($backups as $backup) {
            $this->backupService->deleteBackup($backup);
            $count++;
        }

        $io->success("{$count} sauvegarde(s) supprimée(s).");

        return Command::SUCCESS;
    }

    private function deleteInteractive(SymfonyStyle $io, bool $skipConfirmation): int
    {
        $backups = $this->backupService->getAllBackups();

        if (empty($backups)) {
            $io->info('Aucune sauvegarde disponible.');
            return Command::SUCCESS;
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
            'Sélectionnez une sauvegarde à supprimer:',
            $choices,
            'cancel'
        );

        $answer = $io->askQuestion($question);

        if ($answer === 'Annuler') {
            $io->info('Suppression annulée.');
            return Command::SUCCESS;
        }

        $selectedIndex = array_search($answer, $choices);
        $backup = $backupMap[$selectedIndex];

        if (!$skipConfirmation && !$io->confirm('Voulez-vous vraiment supprimer cette sauvegarde ?', false)) {
            $io->info('Suppression annulée.');
            return Command::SUCCESS;
        }

        $this->backupService->deleteBackup($backup);
        $io->success('Sauvegarde supprimée avec succès.');

        return Command::SUCCESS;
    }
}
