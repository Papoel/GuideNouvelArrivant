<?php

namespace App\Security;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Authenticator\AbstractLoginFormAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\CsrfTokenBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\RememberMeBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Credentials\PasswordCredentials;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Http\Event\LoginSuccessEvent;
use Symfony\Component\Security\Http\SecurityRequestAttributes;
use Symfony\Component\Security\Http\Util\TargetPathTrait;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;

class MainAuthenticator extends AbstractLoginFormAuthenticator
{
    use TargetPathTrait;

    public const LOGIN_ROUTE = 'app_login';
    public const HOME_ROUTE = 'dashboard_index';
    public const TIMEZONE = 'Europe/Paris';

    private ?Passport $lastPassport = null;

    public function __construct(
        private readonly UrlGeneratorInterface $urlGenerator,
        private readonly EntityManagerInterface $entityManager,
        private readonly EventDispatcherInterface $eventDispatcher
    ) {}

    public function authenticate(Request $request): Passport
    {
        // Symfony 8 : utiliser request->request pour les données POST
        $identifier = (string) $request->request->get('identifier', '');
        $password = (string) $request->request->get('password', '');
        $csrfToken = $request->request->getString('_csrf_token');

        $request->getSession()->set(SecurityRequestAttributes::LAST_USERNAME, $identifier);

        $this->lastPassport = new Passport(
            new UserBadge($identifier),
            new PasswordCredentials($password),
            [
                new CsrfTokenBadge('authenticate', $csrfToken),
                new RememberMeBadge(),
            ]
        );

        return $this->lastPassport;
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
        $user = $token->getUser();

        if (!$user instanceof User) {
            throw new \LogicException('L\'utilisateur doit être une instance de ' . User::class);
        }

        // Mise à jour du lastLoginAt
        $user->setLastLoginAt(new \DateTimeImmutable(timezone: new \DateTimeZone(self::TIMEZONE)));
        $this->entityManager->flush();

        // Créer un nouveau passport pour l'événement (sans réutiliser les credentials)
        $eventPassport = new Passport(
            new UserBadge($user->getUserIdentifier(), function () use ($user) {
                return $user;
            }),
            new PasswordCredentials('') // Credentials vides car déjà authentifié
        );

        $event = new LoginSuccessEvent($this, $eventPassport, $token, $request, null, $firewallName);
        $this->eventDispatcher->dispatch($event);

        // Si le subscriber a défini une réponse, l'utiliser
        if ($event->getResponse() !== null) {
            return $event->getResponse();
        }

        // Sinon, utiliser la redirection par défaut
        if ($targetPath = $this->getTargetPath($request->getSession(), $firewallName)) {
            return new RedirectResponse($targetPath);
        }

        // Redirection par défaut vers le dashboard utilisateur
        return new RedirectResponse($this->urlGenerator->generate(self::HOME_ROUTE, ['nni' => $user->getNni()]));
    }

    protected function getLoginUrl(Request $request): string
    {
        return $this->urlGenerator->generate(self::LOGIN_ROUTE);
    }
}
