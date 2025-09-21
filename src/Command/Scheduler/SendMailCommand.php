<?php

namespace App\Command\Scheduler;

use App\Message\SendReminderEmails;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Scheduler\Attribute\AsCronTask;
use App\Message\MessageHandler\SendReminderEmailsHandler;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

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
        // private readonly MessageBusInterface $bus // RabbitMQ
        private readonly SendReminderEmailsHandler $handler,
        private readonly ParameterBagInterface $parameterBag
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this->setHelp(help: 'Cette commande envoie des emails de rappel aux tuteurs qui ont des modules en attente de validation.');
    }

    // Rabbit MQ quand il sera opérationnel !!
    /* protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->bus->dispatch(new SendReminderEmails(triggeredAt: new \DateTimeImmutable()));
        $output->writeln('📨 Message "SendReminderEmails" dispatché vers RabbitMQ');

        return Command::SUCCESS;
    } */

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $executionStart = new \DateTimeImmutable();
        $output->writeln('🚀 Début du traitement des emails de rappel...');

        try {
            $message = new SendReminderEmails(triggeredAt: $executionStart);
            $result = $this->handler->__invoke($message);

            $this->createSuccessLog($result, $executionStart);

            $output->writeln(sprintf(
                '✅ Emails de rappel envoyés avec succès - %d emails envoyés pour %d modules en attente',
                $result['emails_sent'],
                $result['total_pending_modules']
            ));

            return Command::SUCCESS;
        } catch (\Exception $e) {
            $this->createErrorLog($e, $executionStart);

            $output->writeln('❌ Erreur durant le traitement des emails de rappel');
            $output->writeln('Détails: ' . $e->getMessage());

            return Command::FAILURE;
        }
    }

    private function createSuccessLog(array $result, \DateTimeImmutable $executionStart): void
    {
        $executionEnd = new \DateTimeImmutable();
        $logDir = $this->getLogDirectory();
        $logFile = $logDir . '/' . $executionStart->format('Y-m-d_H-i-s') . '-mail-success.log';

        $logData = [
            'execution_date' => $executionStart->format('c'),
            'execution_duration' => $executionEnd->getTimestamp() - $executionStart->getTimestamp(),
            'status' => 'SUCCESS',
            'summary' => [
                'emails_sent' => $result['emails_sent'],
                'total_pending_modules' => $result['total_pending_modules'],
                'mentors_contacted' => count($result['sent_emails'])
            ],
            'emails_details' => $result['sent_emails']
        ];

        $this->writeLog($logFile, $logData);
    }

    private function createErrorLog(\Exception $exception, \DateTimeImmutable $executionStart): void
    {
        $executionEnd = new \DateTimeImmutable();
        $logDir = $this->getLogDirectory();
        $logFile = $logDir . '/' . $executionStart->format('Y-m-d_H-i-s') . '-mail-error.log';

        $logData = [
            'execution_date' => $executionStart->format('c'),
            'execution_duration' => $executionEnd->getTimestamp() - $executionStart->getTimestamp(),
            'status' => 'ERROR',
            'error' => [
                'message' => $exception->getMessage(),
                'file' => $exception->getFile(),
                'line' => $exception->getLine(),
                'trace' => $exception->getTraceAsString()
            ]
        ];

        $this->writeLog($logFile, $logData);
    }

    private function getLogDirectory(): string
    {
        $projectDir = $this->parameterBag->get('kernel.project_dir');
        if (!is_string($projectDir)) {
            throw new \InvalidArgumentException('kernel.project_dir must be a string');
        }

        $logDir = $projectDir . '/var/log/emails';
        if (!is_dir($logDir)) {
            mkdir($logDir, 0755, true);
        }

        return $logDir;
    }

    private function writeLog(string $logFile, array $logData): void
    {
        $jsonLog = json_encode($logData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        file_put_contents($logFile, $jsonLog);
    }
}
