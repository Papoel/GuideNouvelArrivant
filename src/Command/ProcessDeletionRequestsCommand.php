<?php

declare(strict_types=1);

namespace App\Command;

use App\Services\RGPD\AccountDeletionService;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:process-deletion-requests',
    description: 'Traite les demandes de suppression de compte expirées (délai de 48h dépassé)',
)]
class ProcessDeletionRequestsCommand extends Command
{
    public function __construct(
        private readonly AccountDeletionService $accountDeletionService,
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $io->title('Traitement des demandes de suppression de compte');

        try {
            $processedCount = $this->accountDeletionService->processExpiredRequests();

            if ($processedCount === 0) {
                $io->success('Aucune demande de suppression à traiter.');
            } else {
                $io->success(sprintf('%d compte(s) supprimé(s) avec succès.', $processedCount));
            }

            return Command::SUCCESS;
        } catch (\Exception $e) {
            $io->error('Erreur lors du traitement des demandes : ' . $e->getMessage());

            return Command::FAILURE;
        }
    }
}
