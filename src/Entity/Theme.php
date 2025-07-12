<?php

namespace App\Entity;

use App\Repository\ThemeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ThemeRepository::class)]
#[ORM\Table(name: '`themes`')]
class Theme
{
    #[ORM\Id]
    #[ORM\Column(type: 'uuid', unique: true)]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: 'doctrine.uuid_generator')]
    #[Assert\Uuid]
    /* @phpstan-ignore-next-line */
    private ?Uuid $id = null;

    #[ORM\Column(type: Types::STRING, length: 100)]
    #[Assert\NotBlank(message: 'Veuillez saisir un titre.')]
    #[Assert\Length(max: 100, maxMessage: 'Le titre ne doit pas dépasser {{ limit }} caractères.')]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    /** @var Collection<int, Logbook> */
    #[ORM\ManyToMany(targetEntity: Logbook::class, inversedBy: 'themes', cascade: ['persist'])]
    private Collection $logbooks;

    /** @var Collection<int, Module> */
    #[ORM\OneToMany(targetEntity: Module::class, mappedBy: 'theme', cascade: ['remove'])]
    private Collection $modules;

    public function __construct()
    {
        $this->logbooks = new ArrayCollection();
        $this->modules = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->title ?: '';
    }

    public function getId(): ?Uuid
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    /** @return Collection<int, Logbook> */
    public function getLogbooks(): Collection
    {
        return $this->logbooks;
    }

    public function addLogbook(Logbook $logbook): self
    {
        if (!$this->logbooks->contains($logbook)) {
            $this->logbooks[] = $logbook;
            $logbook->addTheme($this); // Associe également le thème au logbook
        }

        return $this;
    }

    public function removeLogbook(Logbook $logbook): self
    {
        if ($this->logbooks->removeElement($logbook)) {
            $logbook->removeTheme($this); // Retire l'association du thème au logbook
        }

        return $this;
    }

    /** @return Collection<int, Module> */
    public function getModules(): Collection
    {
        return $this->modules;
    }

    public function addModule(Module $module): static
    {
        if (!$this->modules->contains($module)) {
            $this->modules->add($module);
            $module->setTheme($this);
        }

        return $this;
    }

    public function removeModule(Module $module): static
    {
        // set the owning side to null (unless already changed)
        if ($this->modules->removeElement($module) && $module->getTheme() === $this) {
            $module->setTheme(null);
        }

        return $this;
    }
}
