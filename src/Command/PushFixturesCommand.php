<?php

namespace App\Command;

use App\DataFixtures\LogbookFixtures;
use App\DataFixtures\LogbookThemeFixtures;
use App\DataFixtures\ModuleFixtures;
use App\DataFixtures\ThemeFixtures;
use App\Services\Datas\DataLoader;
use Doctrine\Common\DataFixtures\Executor\ORMExecutor;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;
use Doctrine\ORM\EntityManagerInterface;
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
    private array $defaultSkippedFixtures = [
        LogbookFixtures::class,
        LogbookThemeFixtures::class,
    ];

    public function __construct(
        private readonly EntityManagerInterface $entityManager,
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

    /*public function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $skippedFixtures = $input->getOption(name: 'skip-fixtures') ?? $this->defaultSkippedFixtures;

        try {
            // Create fixtures directly without adding through loader
            $fixtures = [
                new ThemeFixtures(),
                new ModuleFixtures(),
            ];

            // Filter out skipped fixtures
            $fixturesToLoad = array_filter(array: $fixtures, callback: static function ($fixture) use ($skippedFixtures) {
                return !in_array(needle: get_class(object: $fixture), haystack: $skippedFixtures, strict: true);
            });

            // Create executor with custom purger
            $purger = new ORMPurger();
            $purger->setPurgeMode(mode: ORMPurger::PURGE_MODE_DELETE);
            $executor = new ORMExecutor(em: $this->entityManager, purger: $purger);

            // Execute fixtures with append option (true) to not purge the database
            $executor->execute(fixtures: $fixturesToLoad, append: true);

            $io->success('Données chargées avec succès !');

            return Command::SUCCESS;
        } catch (\Exception $e) {
            $io->error('Une erreur est survenue lors du chargement des données: '.$e->getMessage());
            $io->error(message: $e->getTraceAsString());

            return Command::FAILURE;
        }
    }*/

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
            $io->error('Une erreur est survenue lors du chargement des données: '.$e->getMessage());
            $io->error(message: $e->getTraceAsString());

            return Command::FAILURE;
        }
    }
}
