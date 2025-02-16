<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\DependencyInjection\ServiceLocator;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Messenger\Event\WorkerMessageHandledEvent;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Transport\Receiver\ReceiverInterface;
use Symfony\Component\Messenger\Transport\TransportFactoryInterface;
use Symfony\Component\Messenger\Transport\TransportInterface;
use Symfony\Component\Messenger\Worker;

#[AsCommand(
    name: 'app:send-email',
    description: 'Envoyer tous les emails en attente',
)]
class SendEmailCommand extends Command
{
    public function __construct(
        private readonly ReceiverInterface $asyncTransport,
        private readonly MessageBusInterface $messageBus,
        private readonly EventDispatcherInterface $dispatcher
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this->setHelp('Cette commande va traiter et envoyer tous les emails en attente.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $io->info('Debut du traitement des emails...');

        try {
            $messageCount = 0;
            $maxRetries = 3;
            $processed = false;

            while (!$processed && $maxRetries > 0) {
                try {
                    while ($envelope = $this->asyncTransport->get()) {
                        try {
                            $this->messageBus->dispatch($envelope->getMessage());
                            $this->asyncTransport->ack($envelope);
                            $messageCount++;
                            $io->writeln(sprintf('Email %d traité', $messageCount));
                        } catch (\Exception $e) {
                            $this->asyncTransport->reject($envelope);
                            throw $e;
                        }
                    }
                    $processed = true;
                } catch (\Exception $e) {
                    $maxRetries--;
                    if ($maxRetries <= 0) {
                        throw $e;
                    }
                    $io->warning(sprintf('Tentative échouée, reste %d essais...', $maxRetries));
                    sleep(1); // Attendre 1 seconde avant de réessayer
                }
            }

            if ($messageCount === 0) {
                $io->info('Aucun email à traiter.');
            } else {
                $io->success(sprintf('%d email(s) ont été traités avec succès.', $messageCount));
            }

            return Command::SUCCESS;

        } catch (\Exception $e) {
            $io->error(sprintf('Une erreur s\'est produite lors du traitement des emails: %s', $e->getMessage()));
            return Command::FAILURE;
        }
    }
}
