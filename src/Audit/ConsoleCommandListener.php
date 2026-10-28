<?php

declare(strict_types=1);

namespace App\Audit;

use Symfony\Component\Console\ConsoleEvents;
use Symfony\Component\Console\Event\ConsoleCommandEvent;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;

/** Renseigne l'acteur "console" pour les écritures Doctrine faites en ligne de commande
 * (commandes, scheduler, workers messenger) : c'est ce qui distingue une action
 * utilisateur d'un code silencieux dans le journal d'audit.
 */
#[AsEventListener(event: ConsoleEvents::COMMAND)]
final readonly class ConsoleCommandListener
{
    public function __construct(
        private AuditContext $auditContext,
    ) {
    }

    public function __invoke(ConsoleCommandEvent $event): void
    {
        $argv = $_SERVER['argv'] ?? [];
        $commandLine = implode(' ', $argv) ?: 'console';

        $this->auditContext->setConsoleCommand($commandLine);
    }
}
