<?php

declare(strict_types=1);

namespace App\Twig;

use App\Entity\User;
use App\Services\RGPD\AccountDeletionService;
use Symfony\Bundle\SecurityBundle\Security;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class AccountDeletionExtension extends AbstractExtension
{
    public function __construct(
        private readonly AccountDeletionService $accountDeletionService,
        private readonly Security $security,
    ) {
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('has_pending_deletion_request', [$this, 'hasPendingDeletionRequest']),
        ];
    }

    public function hasPendingDeletionRequest(): bool
    {
        $user = $this->security->getUser();

        if (!$user instanceof User) {
            return false;
        }

        return $this->accountDeletionService->getPendingRequestForUser($user) !== null;
    }
}
