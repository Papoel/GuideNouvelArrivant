<?php

namespace App\Entity;

use App\Repository\LogbookRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LogbookRepository::class)]
class Logbook
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: Types::INTEGER)]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'logbooks')]
    private ?Service $service = null;

    #[ORM\OneToOne(inversedBy: 'logbook', cascade: ['persist', 'remove'])]
    private ?User $newcomer = null;

    /**
     * @var Collection<int, Theme>
     */
    #[ORM\ManyToMany(targetEntity: Theme::class, mappedBy: 'logbook')]
    private Collection $themes;

    #[ORM\ManyToOne(inversedBy: 'logbooks')]
    private ?User $mentor = null;

    public function __construct()
    {
        $this->themes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getService(): ?Service
    {
        return $this->service;
    }

    public function setService(?Service $service): static
    {
        $this->service = $service;

        return $this;
    }

    public function getNewcomer(): ?User
    {
        return $this->newcomer;
    }

    public function setNewcomer(?User $newcomer): static
    {
        $this->newcomer = $newcomer;

        return $this;
    }

    /**
     * @return Collection<int, Theme>
     */
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

    public function getMentor(): ?User
    {
        return $this->mentor;
    }

    public function setMentor(?User $mentor): static
    {
        $this->mentor = $mentor;

        return $this;
    }
}
