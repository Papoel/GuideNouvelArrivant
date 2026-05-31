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
use Symfony\Component\Security\Http\SecurityRequestAttributes;
use Symfony\Component\Security\Http\Util\TargetPathTrait;

class MainAuthenticator extends AbstractLoginFormAuthenticator
{
    use TargetPathTrait;

    public const LOGIN_ROUTE = 'app_login';
    public const HOME_ROUTE = 'dashboard_index';
    public const TIMEZONE = 'Europe/Paris';

    public function __construct(
        private readonly UrlGeneratorInterface $urlGenerator,
        private readonly EntityManagerInterface $entityManager,
    ) {}

    public function authenticate(Request $request): Passport
    {
        $identifier = (string) $request->request->get('identifier', '');
        $password = (string) $request->request->get('password', '');
        $csrfToken = $request->request->getString('_csrf_token');

        $request->getSession()->set(SecurityRequestAttributes::LAST_USERNAME, $identifier);

        return new Passport(
            new UserBadge($identifier),
            new PasswordCredentials($password),
            [
                new CsrfTokenBadge('authenticate', $csrfToken),
                new RememberMeBadge(),
            ]
        );
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
        $user = $token->getUser();

        if (!$user instanceof User) {
            throw new \LogicException('L\'utilisateur doit être une instance de ' . User::class);
        }

        $user->setLastLoginAt(new \DateTimeImmutable('now', new \DateTimeZone(self::TIMEZONE)));
        $this->entityManager->flush();

        $roles = $token->getRoleNames();

        // ROLE_MENTOR prioritaire
        if (in_array('ROLE_MENTOR', $roles, true)) {
            $nni = $user->getNni();
            if (!$nni) {
                throw new \RuntimeException('Le tuteur n\'a pas de NNI défini.');
            }
            return new RedirectResponse($this->urlGenerator->generate('mentor_dashboard_index', ['nni' => $nni]));
        }

        // ROLE_ADMIN → EasyAdmin dashboard
        if (in_array('ROLE_SUPER_ADMIN', $roles, true) || in_array('ROLE_ADMIN', $roles, true)) {
            return new RedirectResponse($this->urlGenerator->generate('admin'));
        }

        // ROLE_MANAGER → dashboard de progression
        if (in_array('ROLE_MANAGER', $roles, true)) {
            return new RedirectResponse($this->urlGenerator->generate('admin_progress_dashboard'));
        }

        // ROLE_USER par défaut
        return new RedirectResponse($this->urlGenerator->generate('home_index'));
    }

    protected function getLoginUrl(Request $request): string
    {
        return $this->urlGenerator->generate(self::LOGIN_ROUTE);
    }
}
