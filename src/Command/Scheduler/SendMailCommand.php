<?php

namespace App\Command\Scheduler;

use App\Message\SendReminderEmails;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Scheduler\Attribute\AsCronTask;

#[AsCommand(
    name: 'app:send-mail',
    description: 'Envoie des emails de rappel aux mentors ayant des validations en attente',
)]
#[AsCronTask(
    expression: '* 14 * * 3',
    timezone: 'Europe/Paris',
    schedule: 'task_email',
    method: 'execute',
    transports: 'async'
)] // S'exécute tous les mercredi 14h00.
class SendMailCommand extends Command
{
    public function __construct(
        private readonly MessageBusInterface $bus
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this->setHelp(help: 'Cette commande envoie des emails de rappel aux tuteurs qui ont des modules en attente de validation.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->bus->dispatch(new SendReminderEmails(triggeredAt: new \DateTimeImmutable()));
        $output->writeln('📨 Message "SendReminderEmails" dispatché vers RabbitMQ');

        return Command::SUCCESS;
    }
}
