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
        private readonly EntityManagerInterface $entityManager
    ) {
    }

    public function authenticate(Request $request): Passport
    {
        $identifier = $request->getPayload()->getString('identifier');
        $request->getSession()->set(SecurityRequestAttributes::LAST_USERNAME, $identifier);

        return new Passport(
            new UserBadge($identifier),
            new PasswordCredentials($request->getPayload()->getString('password')),
            [
                new CsrfTokenBadge('authenticate', $request->getPayload()->getString('_csrf_token')),
                new RememberMeBadge(),
            ]
        );
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
        $user = $token->getUser();

        if ($user instanceof User) {
            $userNni = $user->getNni();
        } else {
            // Gérer le cas où l'utilisateur est null ou n'est pas de la classe attendue
            throw new \LogicException(message: 'L\'utilisateur doit être une instance de '.User::class);
        }

        // Mise à jour du lastLoginAt
        $user->setLastLoginAt(new \DateTimeImmutable(timezone: new \DateTimeZone(self::TIMEZONE)));
        $this->entityManager->flush();

        if ($targetPath = $this->getTargetPath(session: $request->getSession(), firewallName: $firewallName)) {
            return new RedirectResponse(url: $targetPath);
        }

        return new RedirectResponse(url: $this->urlGenerator->generate(name: self::HOME_ROUTE, parameters: ['nni' => $userNni]));
    }

    protected function getLoginUrl(Request $request): string
    {
        return $this->urlGenerator->generate(name: self::LOGIN_ROUTE);
    }
}
