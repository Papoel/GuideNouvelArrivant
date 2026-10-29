<?php

declare(strict_types=1);

namespace App\Security\Voter;

use App\Entity\User;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Vote;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

/** Restreint un ADMIN aux utilisateurs de son propre service.
 * Le SUPER_ADMIN conserve un accès transverse (tous services).
 *
 * @extends Voter<string, User>
 */
final class UserVoter extends Voter
{
    public const VIEW = 'USER_VIEW';
    public const EDIT = 'USER_EDIT';
    public const DELETE = 'USER_DELETE';

    private const ATTRIBUTES = [self::VIEW, self::EDIT, self::DELETE];

    protected function supports(string $attribute, mixed $subject): bool
    {
        return $subject instanceof User && in_array($attribute, self::ATTRIBUTES, true);
    }

    /** @param User $subject */
    protected function voteOnAttribute(string $attribute, mixed $subject, TokenInterface $token, ?Vote $vote = null): bool
    {
        $currentUser = $token->getUser();

        if (!$currentUser instanceof User) {
            return false;
        }

        $roles = $token->getRoleNames();

        // SUPER_ADMIN : accès transverse (tous services)
        if (in_array('ROLE_SUPER_ADMIN', $roles, true)) {
            return true;
        }

        // ADMIN : uniquement les utilisateurs de son propre service
        if (in_array('ROLE_ADMIN', $roles, true)) {
            $service = $currentUser->getService();
            $subjectService = $subject->getService();

            return null !== $service
                && null !== $subjectService
                && $subjectService->getId()?->toRfc4122() === $service->getId()?->toRfc4122();
        }

        return false;
    }
}
