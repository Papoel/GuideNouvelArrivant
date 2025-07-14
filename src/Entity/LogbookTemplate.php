<?php

namespace App\Entity;

use App\Entity\Service;
use App\Enum\JobEnum;
use Doctrine\DBAL\Types\Types;
use Symfony\Component\Uid\Uuid;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Traits\TimestampTrait;
use Doctrine\Common\Collections\Collection;
use App\Repository\LogbookTemplateRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: LogbookTemplateRepository::class)]
#[ORM\Table(name: '`logbook_templates`')]
#[ORM\HasLifecycleCallbacks]
class LogbookTemplate
{
    use TimestampTrait;

    #[ORM\Id]
    #[ORM\Column(type: 'uuid', unique: true)]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: 'doctrine.uuid_generator')]
    #[Assert\Uuid]
    /** @phpstan-ignore-next-line */
    private ?Uuid $id = null;

    #[ORM\Column(length: 100)]
    #[Assert\NotBlank(message: 'Veuillez saisir un nom.')]
    #[Assert\Length(
        min: 2,
        max: 100,
        minMessage: 'Le nom doit contenir au moins {{ limit }} caractères.',
        maxMessage: 'Le nom doit contenir au maximum {{ limit }} caractères.'
    )]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column]
    private ?bool $isDefault = null;

    /** @var array<string> */
    #[ORM\Column(type: Types::JSON)]
    private array $jobs = [];

    /**
     * @var Collection<int, Theme>
     */
    #[ORM\ManyToMany(targetEntity: Theme::class)]
    private Collection $themes;

    #[ORM\ManyToOne(targetEntity: Service::class)]
    #[ORM\JoinColumn(nullable: true)]
    private ?Service $service = null;

    public function __construct()
    {
        $this->themes = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->name ?: '';
    }

    public function getId(): ?Uuid
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function isDefault(): ?bool
    {
        return $this->isDefault;
    }

    public function setIsDefault(bool $isDefault): static
    {
        $this->isDefault = $isDefault;

        return $this;
    }

    /**
     * @return array<string>
     */
    public function getJobs(): array
    {
        return $this->jobs;
    }

    /**
     * @param array<string> $jobs
     */
    public function setJobs(array $jobs): static
    {
        $this->jobs = $jobs;
        return $this;
    }

    /**
     * Ajoute un métier au modèle
     *
     * @param JobEnum|string $job Le métier à ajouter (objet JobEnum ou chaîne)
     */
    public function addJob(JobEnum|string $job): static
    {
        $jobValue = $job instanceof JobEnum ? $job->value : $job;
        if (!in_array($jobValue, $this->jobs, true)) {
            $this->jobs[] = $jobValue;
        }
        return $this;
    }

    /**
     * Retire un métier du modèle
     *
     * @param JobEnum|string $job Le métier à retirer (objet JobEnum ou chaîne)
     */
    public function removeJob(JobEnum|string $job): static
    {
        $jobValue = $job instanceof JobEnum ? $job->value : $job;
        $key = array_search($jobValue, $this->jobs, true);
        if ($key !== false) {
            unset($this->jobs[$key]);
            $this->jobs = array_values($this->jobs);
        }

        return $this;
    }

    /**
     * Vérifie si un métier est associé au modèle
     *
     * @param JobEnum|string $job Le métier à vérifier (objet JobEnum ou chaîne)
     */
    public function hasJob(JobEnum|string $job): bool
    {
        $jobValue = $job instanceof JobEnum ? $job->value : $job;
        return in_array($jobValue, $this->jobs, true);
    }

    /**
     * Méthode utilisée pour afficher les métiers dans l'interface d'administration
     */
    public function getJobLabel(): string
    {
        if (empty($this->jobs)) {
            return 'Aucun métier associé';
        }

        $jobLabels = [];
        foreach ($this->jobs as $jobValue) {
            try {
                $job = JobEnum::from($jobValue);
                $jobLabels[] = $job->value;
            } catch (\ValueError $e) {
                // Ignorer les valeurs invalides
                $jobLabels[] = $jobValue;
            }
        }

        return implode(', ', $jobLabels);
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
        }

        return $this;
    }

    public function removeTheme(Theme $theme): static
    {
        $this->themes->removeElement($theme);

        return $this;
    }
}
