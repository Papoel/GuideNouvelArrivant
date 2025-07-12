<?php

declare(strict_types=1);

namespace App\Command;

use Doctrine\DBAL\Connection;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:check-migration',
    description: 'Vérifie si la table doctrine_migration_versions est vide, sinon insère la version spécifiée.'
)]
class CheckMigrationCommand extends Command
{
    public function __construct(
        private Connection $connection,
        private string $migrationDir
    ) {
        parent::__construct('app:check-migration');
    }

    protected function configure()
    {
        $this->setDescription('Insère la dernière version de migration dans doctrine_migration_versions si la table est vide.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $count = (int) $this->connection->fetchOne('SELECT COUNT(*) FROM doctrine_migration_versions');

        if ($count > 0) {
            $output->writeln(messages: '<comment>La table doctrine_migration_versions n\'est pas vide, aucune insertion effectuée.</comment>');

            return Command::SUCCESS;
        }

        // Récupérer les fichiers de migration dans le dossier (Version*.php)
        $files = glob($this->migrationDir . '/Version*.php');

        if (empty($files)) {
            $output->writeln(messages: '<error>Aucun fichier de migration trouvé dans le dossier.</error>');

            return Command::FAILURE;
        }

        // Trier par ordre alphabétique (normalement par timestamp croissant)
        sort(array: $files);

        // Prendre le dernier fichier (dernier timestamp)
        $lastFile = array_pop(array: $files);

        // Extraire la version (nom du fichier sans extension)
        $version = pathinfo(path: $lastFile, flags: PATHINFO_FILENAME);

        // Insérer dans la table doctrine_migration_versions
        $now = (new \DateTime())->format(format: 'Y-m-d H:i:s');
        $this->connection->insert(
            table: 'doctrine_migration_versions',
            data: [
            'version' => $version,
            'executed_at' => $now,
            'execution_time' => 777,
            ]
        );

        $output->writeln(sprintf('<info>La table était vide, migration "%s" insérée avec succès.</info>', $version));

        return Command::SUCCESS;
    }
}
