<?php

namespace App\Entity;

use App\Repository\ActionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ActionRepository::class)]
class Action
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $agentComment = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $agentValidatedAt = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $agentVisa = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $mentorComment = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $mentorValidatedAt = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $mentorVisa = null;

    #[ORM\ManyToOne(inversedBy: 'actions')]
    #[ORM\JoinColumn(name: 'module_id', referencedColumnName: 'id')]
    private ?Module $module = null;

    public function __toString(): string
    {
        return 'Action #'.$this->id;
    }

    public function getId(): ?int
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

    public function getAgentValidatedAt(): ?\DateTimeImmutable
    {
        return $this->agentValidatedAt;
    }

    public function setAgentValidatedAt(?\DateTimeImmutable $agentValidatedAt): static
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

    public function getMentorValidatedAt(): ?\DateTimeImmutable
    {
        return $this->mentorValidatedAt;
    }

    public function setMentorValidatedAt(?\DateTimeImmutable $mentorValidatedAt): static
    {
        $this->mentorValidatedAt = $mentorValidatedAt;

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
}
