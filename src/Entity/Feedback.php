<?php

namespace App\Entity;

use App\Repository\FeedbackRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FeedbackRepository::class)]
class Feedback
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 150)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $content = null;

    #[ORM\Column(nullable: true)]
    private ?bool $isReviewed = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $managerComment = null;

    #[ORM\ManyToOne(inversedBy: 'feedback')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $author = null;

    #[ORM\ManyToOne]
    private ?User $reviewedBy = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $reviewAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): static
    {
        $this->content = $content;

        return $this;
    }

    public function isReviewed(): ?bool
    {
        return $this->isReviewed;
    }

    public function setIsReviewed(?bool $isReviewed): static
    {
        $this->isReviewed = $isReviewed;

        return $this;
    }

    public function getManagerComment(): ?string
    {
        return $this->managerComment;
    }

    public function setManagerComment(?string $managerComment): static
    {
        $this->managerComment = $managerComment;

        return $this;
    }

    public function getAuthor(): ?User
    {
        return $this->author;
    }

    public function setAuthor(?User $author): static
    {
        $this->author = $author;

        return $this;
    }

    public function getReviewedBy(): ?User
    {
        return $this->reviewedBy;
    }

    public function setReviewedBy(?User $reviewedBy): static
    {
        $this->reviewedBy = $reviewedBy;

        return $this;
    }

    public function getReviewAt(): ?\DateTimeImmutable
    {
        return $this->reviewAt;
    }

    public function setReviewAt(\DateTimeImmutable $reviewAt): static
    {
        $this->reviewAt = $reviewAt;

        return $this;
    }
}
