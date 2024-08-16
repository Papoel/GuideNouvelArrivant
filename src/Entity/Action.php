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

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $agent_validated_at = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $agent_visa = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $mentor_comment = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $mentor_validated_at = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $mentor_visa = null;

    #[ORM\ManyToOne(inversedBy: 'actions')]
    private ?Module $module = null;

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

    public function getAgentValidatedAt(): ?\DateTimeImmutable
    {
        return $this->agent_validated_at;
    }

    public function setAgentValidatedAt(?\DateTimeImmutable $agent_validated_at): static
    {
        $this->agent_validated_at = $agent_validated_at;

        return $this;
    }

    public function getAgentVisa(): ?string
    {
        return $this->agent_visa;
    }

    public function setAgentVisa(?string $agent_visa): static
    {
        $this->agent_visa = $agent_visa;

        return $this;
    }

    public function getMentorComment(): ?string
    {
        return $this->mentor_comment;
    }

    public function setMentorComment(?string $mentor_comment): static
    {
        $this->mentor_comment = $mentor_comment;

        return $this;
    }

    public function getMentorValidatedAt(): ?\DateTimeImmutable
    {
        return $this->mentor_validated_at;
    }

    public function setMentorValidatedAt(?\DateTimeImmutable $mentor_validated_at): static
    {
        $this->mentor_validated_at = $mentor_validated_at;

        return $this;
    }

    public function getMentorVisa(): ?string
    {
        return $this->mentor_visa;
    }

    public function setMentorVisa(?string $mentor_visa): static
    {
        $this->mentor_visa = $mentor_visa;

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
