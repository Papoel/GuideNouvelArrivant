<?php

namespace App\Command\Cron;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:cron-check',
    description: 'Commande de vérification du bon fonctionnement des tâches cron'
)]
class CronCheckCommand extends Command
{
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $timezone = 'Europe/Paris';
        $timestamp = new \DateTime('now', new \DateTimeZone($timezone));
        $logMessage = sprintf(
            '[%s] Cron check éxécuté avec succès - PID: %s',
            $timestamp->format('d-m-Y H:i:s'),
            getmypid()
        );

        // Log dans un fichier spécifique pour le suivi
        $logFile = __DIR__ . '/../../../var/log/cron_check.log';
        file_put_contents($logFile, $logMessage . PHP_EOL, FILE_APPEND | LOCK_EX);

        $output->writeln($logMessage);
        $output->writeln('Cron verification complété avec succès');

        return Command::SUCCESS;
    }
}
