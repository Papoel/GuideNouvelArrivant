<?php

declare(strict_types=1);

namespace App\Tests\Security\Voter;

use App\Entity\Service;
use App\Entity\User;
use App\Security\Voter\UserVoter;
use App\Tests\Utils\UserTestHelper;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\AllowMockObjectsWithoutExpectations;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\VoterInterface;
use Symfony\Component\Uid\Uuid;

#[AllowMockObjectsWithoutExpectations]
class UserVoterTest extends TestCase
{
    private UserVoter $voter;

    protected function setUp(): void
    {
        $this->voter = new UserVoter();
    }

    private function service(): Service
    {
        $service = new Service();
        $service->setName('TST' . random_int(100, 999));

        // L'ID UUID est généré à la persistance : on l'injecte par réflexion pour le test
        $reflection = new \ReflectionProperty(Service::class, 'id');
        $reflection->setValue($service, Uuid::v7());

        return $service;
    }

    private function user(?Service $service = null, array $roles = ['ROLE_USER']): User
    {
        $user = UserTestHelper::createUser();
        $user->setService($service);
        $user->setRoles($roles);

        return $user;
    }

    /** @return TokenInterface&MockObject */
    private function token(User $user, array $roles): TokenInterface
    {
        $token = $this->createMock(TokenInterface::class);
        $token->method('getUser')->willReturn($user);
        $token->method('getRoleNames')->willReturn($roles);

        return $token;
    }

    #[Test]
    public function superAdminCanAccessUserOfAnyService(): void
    {
        $otherService = $this->service();
        $target = $this->user($otherService);
        $superAdmin = $this->user(null, ['ROLE_SUPER_ADMIN']);

        $result = $this->voter->vote(
            $this->token($superAdmin, ['ROLE_SUPER_ADMIN', 'ROLE_ADMIN', 'ROLE_MANAGER', 'ROLE_USER']),
            $target,
            [UserVoter::VIEW, UserVoter::EDIT, UserVoter::DELETE]
        );

        self::assertSame(VoterInterface::ACCESS_GRANTED, $result);
    }

    #[Test]
    public function adminCanAccessUserOfOwnService(): void
    {
        $service = $this->service();
        $admin = $this->user($service, ['ROLE_ADMIN']);
        $target = $this->user($service);

        $result = $this->voter->vote(
            $this->token($admin, ['ROLE_ADMIN', 'ROLE_USER']),
            $target,
            [UserVoter::EDIT]
        );

        self::assertSame(VoterInterface::ACCESS_GRANTED, $result);
    }

    #[Test]
    public function adminCannotAccessUserOfOtherService(): void
    {
        $admin = $this->user($this->service(), ['ROLE_ADMIN']);
        $target = $this->user($this->service());

        $result = $this->voter->vote(
            $this->token($admin, ['ROLE_ADMIN', 'ROLE_USER']),
            $target,
            [UserVoter::EDIT]
        );

        self::assertSame(VoterInterface::ACCESS_DENIED, $result);
    }

    #[Test]
    public function adminWithoutServiceCannotAccessAnyUser(): void
    {
        $admin = $this->user(null, ['ROLE_ADMIN']);
        $target = $this->user($this->service());

        $result = $this->voter->vote(
            $this->token($admin, ['ROLE_ADMIN', 'ROLE_USER']),
            $target,
            [UserVoter::VIEW]
        );

        self::assertSame(VoterInterface::ACCESS_DENIED, $result);
    }

    #[Test]
    public function adminCannotAccessUserWithoutService(): void
    {
        $admin = $this->user($this->service(), ['ROLE_ADMIN']);
        $target = $this->user(null);

        $result = $this->voter->vote(
            $this->token($admin, ['ROLE_ADMIN', 'ROLE_USER']),
            $target,
            [UserVoter::VIEW]
        );

        self::assertSame(VoterInterface::ACCESS_DENIED, $result);
    }

    #[Test]
    public function nonAdminUserCannotAccessOtherUsers(): void
    {
        $service = $this->service();
        $mentor = $this->user($service, ['ROLE_MENTOR']);
        $target = $this->user($service);

        $result = $this->voter->vote(
            $this->token($mentor, ['ROLE_MENTOR', 'ROLE_USER']),
            $target,
            [UserVoter::VIEW]
        );

        self::assertSame(VoterInterface::ACCESS_DENIED, $result);
    }

    #[Test]
    public function voterAbstainsOnUnsupportedSubjectOrAttribute(): void
    {
        $admin = $this->user($this->service(), ['ROLE_ADMIN']);
        $token = $this->token($admin, ['ROLE_ADMIN', 'ROLE_USER']);

        self::assertSame(
            VoterInterface::ACCESS_ABSTAIN,
            $this->voter->vote($token, new Service(), [UserVoter::VIEW])
        );

        self::assertSame(
            VoterInterface::ACCESS_ABSTAIN,
            $this->voter->vote($token, $this->user(), ['UNKNOWN_ATTRIBUTE'])
        );
    }
}
