<?php

declare(strict_types=1);

namespace App\Audit;

use App\Entity\AuditLog;
use App\Entity\User;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

/** Fournit le contexte d'acteur pour le journal d'audit :
 * - HTTP : l'utilisateur connecté (type `user`)
 * - CLI  : la commande en cours (type `console`), renseignée par ConsoleCommandListener
 * - Fallback : `anonymous` (HTTP sans utilisateur) ou `console` (CLI).
 */
final class AuditContext
{
    private ?string $consoleCommand = null;
    private int $flushedCount = 0;

    public function __construct(
        private readonly TokenStorageInterface $tokenStorage,
        private readonly RequestStack $requestStack,
    ) {
    }

    public function setConsoleCommand(string $commandLine): void
    {
        $this->consoleCommand = $commandLine;
    }

    /** Nombre d'entrées d'audit écrites durant la requête courante. */
    public function addFlushedCount(int $count = 1): void
    {
        $this->flushedCount += $count;
    }

    public function getFlushedCount(): int
    {
        return $this->flushedCount;
    }

    /** @return array{type: string, id: ?string, label: ?string} */
    public function actor(): array
    {
        if (null !== $this->consoleCommand) {
            return ['type' => AuditLog::ACTOR_CONSOLE, 'id' => null, 'label' => $this->consoleCommand];
        }

        $user = $this->tokenStorage->getToken()?->getUser();
        if ($user instanceof User) {
            return [
                'type' => AuditLog::ACTOR_USER,
                'id' => $user->getId()?->toRfc4122(),
                'label' => $user->getFullname() . ($user->getNni() ? ' (' . $user->getNni() . ')' : ''),
            ];
        }

        if ('cli' === \PHP_SAPI) {
            return ['type' => AuditLog::ACTOR_CONSOLE, 'id' => null, 'label' => 'cli'];
        }

        return ['type' => AuditLog::ACTOR_ANONYMOUS, 'id' => null, 'label' => null];
    }

    /** @return array{route?: mixed, ip?: ?string} */
    public function context(): array
    {
        $request = $this->requestStack->getCurrentRequest();

        return null === $request ? [] : [
            'route' => $request->attributes->get('_route'),
            'ip' => $request->getClientIp(),
        ];
    }
}
