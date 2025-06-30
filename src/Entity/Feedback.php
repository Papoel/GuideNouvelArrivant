<?php

namespace App\Entity;

use App\Entity\Traits\TimestampTrait;
use App\Repository\FeedbackRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: FeedbackRepository::class)]
#[ORM\Table(name: '`feedbacks`')]
#[ORM\HasLifecycleCallbacks]
class Feedback
{
    use TimestampTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 150)]
    #[Assert\NotBlank(message: 'Veuillez saisir un titre pour votre retour d\'expérience.')]
    #[Assert\Length(
        min: 5,
        max: 150,
        minMessage: 'Le titre doit contenir au moins {{ limit }} caractères.',
        maxMessage: 'Le titre doit contenir au maximum {{ limit }} caractères.'
    )]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank(message: 'Veuillez saisir le contenu de votre retour d\'expérience.')]
    #[Assert\Length(
        min: 10,
        minMessage: 'Le contenu doit contenir au moins {{ limit }} caractères.'
    )]
    private ?string $content = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank(message: 'Veuillez sélectionner une catégorie.')]
    private ?string $category = null;

    #[ORM\Column(nullable: true)]
    private ?bool $isReviewed = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $managerComment = null;

    #[ORM\ManyToOne(inversedBy: 'feedbacks')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $author = null;

    #[ORM\ManyToOne]
    private ?User $reviewedBy = null;

    #[ORM\Column(nullable: true)]
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

    public function setReviewAt(?\DateTimeImmutable $reviewAt): static
    {
        $this->reviewAt = $reviewAt;

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(?string $category): static
    {
        $this->category = $category;

        return $this;
    }
}
