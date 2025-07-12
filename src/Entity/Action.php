<?php

namespace App\Entity;

use App\Repository\ActionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ActionRepository::class)]
#[ORM\Table(name: '`actions`')]
class Action
{
    #[ORM\Id]
    #[ORM\Column(type: 'uuid', unique: true)]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: 'doctrine.uuid_generator')]
    #[Assert\Uuid]
    /** @phpstan-ignore-next-line */
    private ?Uuid $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $agentComment = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTime $agentValidatedAt = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $agentVisa = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $mentorComment = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTime $mentorValidatedAt = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTime $mentorCommentedAt = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $mentorVisa = null;

    #[ORM\ManyToOne(inversedBy: 'actions')]
    #[ORM\JoinColumn(name: 'module_id', referencedColumnName: 'id')]
    private ?Module $module = null;

    #[ORM\ManyToOne(inversedBy: 'actions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\ManyToOne(inversedBy: 'actions')]
    private ?Logbook $logbook = null;

    public function __toString(): string
    {
        return 'Action #' . ($this->id ? $this->id->__toString() : '');
    }

    public function getId(): ?Uuid
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getAgentComment(): ?string
    {
        return $this->agentComment;
    }

    public function setAgentComment(?string $agentComment): static
    {
        $this->agentComment = $agentComment;

        return $this;
    }

    public function getAgentValidatedAt(): ?\DateTime
    {
        return $this->agentValidatedAt;
    }

    public function setAgentValidatedAt(?\DateTime $agentValidatedAt): static
    {
        $this->agentValidatedAt = $agentValidatedAt;

        return $this;
    }

    public function getAgentVisa(): ?string
    {
        return $this->agentVisa;
    }

    public function setAgentVisa(?string $agentVisa): static
    {
        $this->agentVisa = $agentVisa;

        return $this;
    }

    public function getMentorComment(): ?string
    {
        return $this->mentorComment;
    }

    public function setMentorComment(?string $mentorComment): static
    {
        $this->mentorComment = $mentorComment;

        return $this;
    }

    public function getMentorValidatedAt(): ?\DateTime
    {
        return $this->mentorValidatedAt;
    }

    public function setMentorValidatedAt(?\DateTime $mentorValidatedAt): static
    {
        $this->mentorValidatedAt = $mentorValidatedAt;

        return $this;
    }

    public function getMentorCommentedAt(): ?\DateTime
    {
        return $this->mentorCommentedAt;
    }

    public function setMentorCommentedAt(?\DateTime $mentorCommentedAt): static
    {
        $this->mentorCommentedAt = $mentorCommentedAt;

        return $this;
    }

    public function getMentorVisa(): ?string
    {
        return $this->mentorVisa;
    }

    public function setMentorVisa(?string $mentorVisa): static
    {
        $this->mentorVisa = $mentorVisa;

        return $this;
    }

    public function getModule(): ?Module
    {
        return $this->module;
    }

    public function setModule(?Module $module): static
    {
        $this->module = $module;

        return $this;
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

    public function getLogbook(): ?Logbook
    {
        return $this->logbook;
    }

    public function setLogbook(?Logbook $logbook): static
    {
        $this->logbook = $logbook;

        return $this;
    }
}
