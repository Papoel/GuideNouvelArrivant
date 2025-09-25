<?php

declare(strict_types=1);

namespace App\Command\Scheduler;

use App\Message\WeeklyReminderEmailMessage;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Messenger\MessageBusInterface;

#[AsCommand(
    name: 'app:reminder-email',
    description: 'Planifie l\'envoie hebdomadaire des emails de rappels aux tuteurs'
)]
class SendEmailReminderCommand extends Command
{
    public function __construct(private readonly MessageBusInterface $bus)
    {
        parent::__construct();
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln(messages: '🚀  Dispatch du rappel hebdomadaire...');

        $this->bus->dispatch(new WeeklyReminderEmailMessage(new \DateTimeImmutable()));
        $output->writeln(messages: '✅ Message placé dans la queue async.');

        return Command::SUCCESS;
    }
}
