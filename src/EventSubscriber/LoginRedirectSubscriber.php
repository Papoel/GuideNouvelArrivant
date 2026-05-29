<?php

declare(strict_types=1);

namespace App\EventSubscriber;

use App\Entity\User;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Http\Event\LoginSuccessEvent;

class LoginRedirectSubscriber implements EventSubscriberInterface
{
    public function __construct(
        private readonly UrlGeneratorInterface $urlGenerator
    ) {
    }

    public static function getSubscribedEvents(): array
    {
        return [
            LoginSuccessEvent::class => 'onLoginSuccess',
        ];
    }

    public function onLoginSuccess(LoginSuccessEvent $event): void
    {
        $user = $event->getUser();

        if (!$user instanceof User) {
            return;
        }

        $roles = $user->getRoles();

        // Ordre de priorité : SUPER_ADMIN/ADMIN/MANAGER > MENTOR > USER

        // Si l'utilisateur a un rôle administratif, rediriger vers le dashboard de progression
        if (
            in_array('ROLE_SUPER_ADMIN', $roles, true)
            || in_array('ROLE_ADMIN', $roles, true)
            || in_array('ROLE_MANAGER', $roles, true)
        ) {
            $targetUrl = $this->urlGenerator->generate('admin_progress_dashboard');
            $response = new RedirectResponse($targetUrl);
            $event->setResponse($response);
            return;
        }

        // Si l'utilisateur est uniquement tuteur (sans rôle admin)
        if (in_array('ROLE_MENTOR', $roles, true)) {
            $nni = $user->getNni();

            if (!$nni) {
                throw new \RuntimeException('Le tuteur n\'a pas de NNI défini.');
            }

            $targetUrl = $this->urlGenerator->generate('mentor_dashboard_index', [
                'nni' => $nni
            ]);
            $response = new RedirectResponse($targetUrl);
            $event->setResponse($response);
            return;
        }

        // ROLE_USER : redirection par défaut (home_index)
    }
}
