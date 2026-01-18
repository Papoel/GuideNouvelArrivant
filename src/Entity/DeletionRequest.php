<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\DeletionRequestRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DeletionRequestRepository::class)]
#[ORM\Table(name: 'deletion_request')]
class DeletionRequest
{
    public const STATUS_PENDING = 'pending';
    public const STATUS_CANCELLED = 'cancelled';
    public const STATUS_PROCESSED = 'processed';

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    /** @phpstan-ignore property.unusedType (ID is assigned by Doctrine) */
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    private ?User $user = null;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(nullable: true, onDelete: 'SET NULL')]
    private ?User $requestedBy = null;

    #[ORM\Column(type: Types::DATETIME_IMMUTABLE)]
    private ?\DateTimeImmutable $requestedAt = null;

    #[ORM\Column(type: Types::DATETIME_IMMUTABLE)]
    private ?\DateTimeImmutable $scheduledDeletionAt = null;

    #[ORM\Column(length: 20)]
    private string $status = self::STATUS_PENDING;

    #[ORM\Column(type: Types::DATETIME_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $cancelledAt = null;

    #[ORM\Column(type: Types::DATETIME_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $processedAt = null;

    #[ORM\Column(length: 64)]
    private ?string $cancellationToken = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $userInfo = null;

    public function __construct()
    {
        $this->requestedAt = new \DateTimeImmutable();
        $this->scheduledDeletionAt = $this->requestedAt->modify('+48 hours');
        $this->cancellationToken = bin2hex(random_bytes(32));
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getRequestedBy(): ?User
    {
        return $this->requestedBy;
    }

    public function setRequestedBy(?User $requestedBy): static
    {
        $this->requestedBy = $requestedBy;

        return $this;
    }

    public function getRequestedAt(): ?\DateTimeImmutable
    {
        return $this->requestedAt;
    }

    public function setRequestedAt(\DateTimeImmutable $requestedAt): static
    {
        $this->requestedAt = $requestedAt;

        return $this;
    }

    public function getScheduledDeletionAt(): ?\DateTimeImmutable
    {
        return $this->scheduledDeletionAt;
    }

    public function setScheduledDeletionAt(\DateTimeImmutable $scheduledDeletionAt): static
    {
        $this->scheduledDeletionAt = $scheduledDeletionAt;

        return $this;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getCancelledAt(): ?\DateTimeImmutable
    {
        return $this->cancelledAt;
    }

    public function setCancelledAt(?\DateTimeImmutable $cancelledAt): static
    {
        $this->cancelledAt = $cancelledAt;

        return $this;
    }

    public function getProcessedAt(): ?\DateTimeImmutable
    {
        return $this->processedAt;
    }

    public function setProcessedAt(?\DateTimeImmutable $processedAt): static
    {
        $this->processedAt = $processedAt;

        return $this;
    }

    public function getCancellationToken(): ?string
    {
        return $this->cancellationToken;
    }

    public function setCancellationToken(string $cancellationToken): static
    {
        $this->cancellationToken = $cancellationToken;

        return $this;
    }

    public function getUserInfo(): ?string
    {
        return $this->userInfo;
    }

    public function setUserInfo(?string $userInfo): static
    {
        $this->userInfo = $userInfo;

        return $this;
    }

    public function isPending(): bool
    {
        return $this->status === self::STATUS_PENDING;
    }

    public function isCancelled(): bool
    {
        return $this->status === self::STATUS_CANCELLED;
    }

    public function isProcessed(): bool
    {
        return $this->status === self::STATUS_PROCESSED;
    }

    public function canBeCancelled(): bool
    {
        return $this->isPending() && $this->scheduledDeletionAt > new \DateTimeImmutable();
    }

    public function isReadyForDeletion(): bool
    {
        return $this->isPending() && $this->scheduledDeletionAt <= new \DateTimeImmutable();
    }

    public function cancel(): static
    {
        $this->status = self::STATUS_CANCELLED;
        $this->cancelledAt = new \DateTimeImmutable();

        return $this;
    }

    public function markAsProcessed(): static
    {
        $this->status = self::STATUS_PROCESSED;
        $this->processedAt = new \DateTimeImmutable();

        return $this;
    }

    public function getRemainingTime(): ?\DateInterval
    {
        if (!$this->isPending()) {
            return null;
        }

        $now = new \DateTimeImmutable();
        if ($this->scheduledDeletionAt <= $now) {
            return null;
        }

        return $now->diff($this->scheduledDeletionAt);
    }
}
