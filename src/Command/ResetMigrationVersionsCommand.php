<?php

declare(strict_types=1);

namespace App\Command;

use Doctrine\DBAL\Connection;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:reset-migration-versions',
    description: 'Supprime toutes les versions de migration de la base de données',
)]
class ResetMigrationVersionsCommand extends Command
{
    public function __construct(
        private readonly Connection $connection
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $table = 'doctrine_migration_versions';

        try {
            $count = $this->connection->executeStatement(sql: "DELETE FROM {$table}");
            $output->writeln(messages: "<info>✅ {$count} version(s) supprimée(s) de la table {$table}.</info>");

            return Command::SUCCESS;
        } catch (\Throwable $e) {
            $output->writeln(messages: "<error>❌ Erreur : {$e->getMessage()}</error>");

            return Command::FAILURE;
        }
    }
}
