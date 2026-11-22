<?php

declare(strict_types=1);

namespace App\Command;

use App\Services\Admin\Logbooks\LogbookArchivePurgeService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * Purge les archives de carnets arrivées à expiration (conservation : 5 ans)
 * et envoie l'avertissement J-30 pour celles proches de l'échéance.
 *
 * À planifier en cron quotidien, comme les autres tâches du projet :
 *   0 4 * * * php bin/console app:archives:purge-expired
 *
 * La commande est idempotente : relancée, elle ne renvoie aucun mail.
 */
class PurgeExpiredArchivesCommand extends Command
{
    public const CMD_NAME = 'app:archives:purge-expired';

    public function __construct(
        private readonly LogbookArchivePurgeService $purgeService,
    ) {
        parent::__construct(name: self::CMD_NAME);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle(input: $input, output: $output);

        $this->purgeService->purge();

        $io->success('Purge des archives expirées effectuée.');

        return Command::SUCCESS;
    }
}
