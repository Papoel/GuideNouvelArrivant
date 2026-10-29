<?php

declare(strict_types=1);

namespace App\Audit;

use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\HttpFoundation\Session\FlashBagAwareSessionInterface;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

/** Notifie l'utilisateur dans l'espace d'administration (/admin, /manager) quand
 * des modifications ont été tracées dans le journal d'audit pendant la requête.
 * Le flash de session est rendu en toast par php-flasher (système déjà en place).
 */
final readonly class AuditNotificationSubscriber
{
    public function __construct(
        private AuditContext $auditContext,
    ) {
    }

    #[AsEventListener(event: KernelEvents::RESPONSE, priority: -100)]
    public function onKernelResponse(ResponseEvent $event): void
    {
        $count = $this->auditContext->getFlushedCount();
        if (0 === $count) {
            return;
        }

        $request = $event->getRequest();
        $path = $request->getPathInfo();
        if (!str_starts_with($path, '/admin') && !str_starts_with($path, '/manager')) {
            return;
        }

        if (!$request->hasSession()) {
            return;
        }

        $session = $request->getSession();
        if (!$session instanceof FlashBagAwareSessionInterface) {
            return;
        }

        $session->getFlashBag()->add(
            'info',
            sprintf('%d modification(s) tracée(s) dans le journal d\'audit.', $count)
        );
    }
}
