<?php

namespace App\Command;

use App\Services\Datas\DataLoader;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:push-prod-fixtures',
    description: 'Charge les fixtures Theme et Module en production',
)]
class PushFixturesCommand extends Command
{
    public function __construct(
        private readonly DataLoader $dataLoader,
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this->addOption(
            name: 'skip-fixtures',
            mode: InputOption::VALUE_OPTIONAL | InputOption::VALUE_IS_ARRAY,
            description: 'Fixtures à ne pas charger',
        );
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        try {
            $io->info('Chargement des thèmes...');
            $themes = $this->dataLoader->loadThemes();

            $io->info('Chargement des modules...');
            $this->dataLoader->loadModules($themes);

            $io->success('Données chargées avec succès !');

            return Command::SUCCESS;
        } catch (\Exception $e) {
            $io->error('Une erreur est survenue lors du chargement des données: ' . $e->getMessage());
            $io->error(message: $e->getTraceAsString());

            return Command::FAILURE;
        }
    }
}
