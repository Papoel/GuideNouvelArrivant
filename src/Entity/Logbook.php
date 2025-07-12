<?php

namespace App\Entity;

use App\Repository\LogbookRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: LogbookRepository::class)]
#[ORM\Table(name: '`logbooks`')]
class Logbook
{
    #[ORM\Id]
    #[ORM\Column(type: 'uuid', unique: true)]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: 'doctrine.uuid_generator')]
    #[Assert\Uuid]
    /* @phpstan-ignore-next-line */
    private ?Uuid $id = null;

    #[ORM\Column(length: 100, nullable: true)]
    #[Assert\Length(max: 100, maxMessage: 'Le nom ne doit pas dépasser {{ limit }} caractères.')]
    private ?string $name = null;

    /** @var Collection<int, Theme> */
    #[ORM\ManyToMany(targetEntity: Theme::class, mappedBy: 'logbooks')]
    private Collection $themes;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'logbooks')]
    #[ORM\JoinColumn(nullable: true, onDelete: 'CASCADE')]
    private ?User $owner = null;

    /** @var Collection<int, Action> */
    #[ORM\OneToMany(targetEntity: Action::class, mappedBy: 'logbook', cascade: ['remove'])]
    private Collection $actions;

    public function __construct()
    {
        $this->themes = new ArrayCollection();
        $this->actions = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->owner ? 'Carnet de ' . $this->owner->getFullName() : 'Carnet sans propriétaire';
    }

    public function getId(): ?Uuid
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /** @return Collection<int, Theme> */
    public function getThemes(): Collection
    {
        return $this->themes;
    }

    public function addTheme(Theme $theme): static
    {
        if (!$this->themes->contains($theme)) {
            $this->themes->add($theme);
            $theme->addLogbook($this);
        }

        return $this;
    }

    public function removeTheme(Theme $theme): static
    {
        if ($this->themes->removeElement($theme)) {
            $theme->removeLogbook($this);
        }

        return $this;
    }

    public function getOwner(): ?User
    {
        return $this->owner;
    }

    public function setOwner(?User $owner): static
    {
        $this->owner = $owner;

        return $this;
    }

    /** @return Collection<int, Action> */
    public function getActions(): Collection
    {
        return $this->actions;
    }

    public function addAction(Action $action): static
    {
        if (!$this->actions->contains($action)) {
            $this->actions->add($action);
            $action->setLogbook($this);
        }

        return $this;
    }

    public function removeAction(Action $action): static
    {
        if ($this->actions->removeElement($action)) {
            // set the owning side to null (unless already changed)
            if ($action->getLogbook() === $this) {
                $action->setLogbook(null);
            }
        }

        return $this;
    }
}
