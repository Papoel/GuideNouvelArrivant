<?php

namespace App\Entity;

use App\Repository\ModuleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ModuleRepository::class)]
#[ORM\Table(name: '`modules`')]
class Module
{
    #[ORM\Id]
    #[ORM\Column(type: 'uuid', unique: true)]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: 'doctrine.uuid_generator')]
    #[Assert\Uuid]
    private ?Uuid $id = null;

    #[ORM\Column(length: 100, nullable: true)]
    #[Assert\NotBlank(message: 'Veuillez saisir un titre.')]
    #[Assert\Length(max: 100, maxMessage: 'Le titre ne doit pas dépasser {{ limit }} caractères.')]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\ManyToOne(inversedBy: 'modules')]
    #[ORM\JoinColumn(name: 'theme_id', referencedColumnName: 'id', nullable: false)]
    private ?Theme $theme = null;

    /**
     * @var Collection<int, Action>
     */
    #[ORM\OneToMany(targetEntity: Action::class, mappedBy: 'module', cascade: ['remove'], orphanRemoval: true)]
    private Collection $actions;

    public function __construct()
    {
        $this->actions = new ArrayCollection();
    }

    public function __toString(): string
    {
        // Vérifier si le thème est défini et s'il a un titre
        $theme = $this->getTheme();
        $themeTitle = $theme ? $theme->getTitle() : '';

        // Si le titre est null, fournir une chaîne vide pour éviter les erreurs avec substr
        $firstCharactersOfTheme = substr(string: $themeTitle ?: '', offset: 0, length: 3);

        return $firstCharactersOfTheme.' | '.($this->title ?: '');
    }

    public function getId(): ?Uuid
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): static
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

    public function getTheme(): ?Theme
    {
        return $this->theme;
    }

    public function setTheme(?Theme $theme): static
    {
        $this->theme = $theme;

        return $this;
    }

    /**
     * @return Collection<int, Action>
     */
    public function getActions(): Collection
    {
        return $this->actions;
    }

    public function addAction(Action $action): static
    {
        if (!$this->actions->contains($action)) {
            $this->actions->add($action);
            $action->setModule($this);
        }

        return $this;
    }

    public function removeAction(Action $action): static
    {
        if ($this->actions->removeElement($action)) {
            // set the owning side to null (unless already changed)
            if ($action->getModule() === $this) {
                $action->setModule(null);
            }
        }

        return $this;
    }

    /**
     * Get an action by module ID.
     */
    public function getActionByModuleId(int $moduleId): ?Action
    {
        // Convertir le moduleId en chaîne pour la comparaison
        $moduleIdString = (string) $moduleId;

        foreach ($this->actions as $action) {
            // Vérifier si l'ID de l'action n'est pas null et comparer
            $actionId = $action->getId();
            if (null !== $actionId && $actionId->toString() === $moduleIdString) {
                return $action;
            }
        }

        return null;
    }
}
