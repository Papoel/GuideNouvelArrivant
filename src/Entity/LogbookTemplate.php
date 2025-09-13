<?php

namespace App\Entity;

use App\Entity\Job;
use App\Entity\Traits\TimestampTrait;
use App\Repository\LogbookTemplateRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;
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

    /** @var array<string|null> */
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
        $this->isDefault = false;
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
     * @return array<string|null>
     */
    public function getJobs(): array
    {
        return $this->jobs;
    }

    /**
     * Normalise et retourne les jobs sous forme de tableau
     * Cette méthode gère les différents formats possibles (JSON, array, string)
     *
     * @return array<string>
     */
    public function getNormalizedJobs(): array
    {
        $normalizedJobs = [];

        foreach ($this->jobs as $job) {
            // Si c'est une chaîne JSON, la décoder
            if ((str_starts_with((string)$job, '[') || str_starts_with((string)$job, '{'))) {
                try {
                    $decoded = json_decode((string)$job, true);
                    if (is_array($decoded)) {
                        foreach ($decoded as $decodedJob) {
                            if (is_string($decodedJob)) {
                                $normalizedJobs[] = $decodedJob;
                            }
                        }
                        continue;
                    }
                } catch (\Exception $e) {
                    // Ignorer les erreurs de décodage
                }
            }

            // Ajouter la valeur telle quelle si ce n'est pas du JSON
            $normalizedJobs[] = (string)$job;
        }

        return $normalizedJobs;
    }

    /**
     * @param array<string|null> $jobs
     */
    public function setJobs(array $jobs): static
    {
        // Filtrer pour garantir que seules des chaînes sont stockées
        $this->jobs = array_map('strval', $jobs);
        return $this;
    }

    /**
     * Ajoute un métier au modèle
     *
     * @param string|Job $job Le métier à ajouter (objet Job ou chaîne)
     */
    public function addJob(string|Job $job): static
    {
        $jobValue = match (true) {
            $job instanceof Job => $job->getCode(),
            default => (string)$job
        };
        if (!in_array($jobValue, $this->jobs, true)) {
            $this->jobs[] = $jobValue;
        }
        return $this;
    }

    /**
     * Retire un métier du modèle
     *
     * @param string|Job $job Le métier à retirer (objet Job ou chaîne)
     */
    public function removeJob(string|Job $job): static
    {
        $jobValue = match (true) {
            $job instanceof Job => $job->getCode(),
            default => $job
        };
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
     * @param string|Job $job Le métier à vérifier (objet Job ou chaîne)
     */
    public function hasJob(string|Job $job): bool
    {
        // Récupérer les jobs normalisés
        $normalizedJobs = $this->getNormalizedJobs();

        // Si c'est une entité Job, on vérifie à la fois le code et le nom
        if ($job instanceof Job) {
            $jobCode = $job->getCode();
            $jobName = $job->getName();

            // Vérifier si le code ou le nom du job est dans les jobs normalisés
            if (in_array($jobCode, $normalizedJobs, true) || in_array($jobName, $normalizedJobs, true)) {
                return true;
            }

            // Vérification spéciale pour "Chargé d'affaires" vs "CA"
            if ($jobCode === 'CA') {
                $searchValue = "Charg\u00e9 d'affaires";
                foreach ($normalizedJobs as $normalizedJob) {
                    if (strpos((string)$normalizedJob, $searchValue) !== false) {
                        return true;
                    }
                }
            }

            // Vérification supplémentaire pour les jobs stockés sous forme de chaîne JSON
            foreach ($this->jobs as $jobValue) {
                if ((str_starts_with((string)$jobValue, '[') || str_starts_with((string)$jobValue, '{'))) {
                    if (strpos((string)$jobValue, (string)$jobCode) !== false || strpos((string)$jobValue, (string)$jobName) !== false) {
                        return true;
                    }
                }
            }

            return false;
        }

        // Pour les autres types (string)
        return in_array($job, $normalizedJobs, true);
    }

    /**
     * Méthode utilisée pour afficher les métiers dans l'interface d'administration
     */
    public function getJobLabel(): string
    {
        if (empty($this->jobs)) {
            return 'Aucun métier associé';
        }

        return implode(', ', $this->jobs);
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
