<?php

namespace App\Entity;

use App\Repository\ServiceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ServiceRepository::class)]
class Service
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: Types::INTEGER)]
    private ?int $id = null;

    #[ORM\Column(type: Types::STRING, length: 3)]
    private string $name;

    /**
     * @var Collection<int, Logbook>
     */
    #[ORM\OneToMany(targetEntity: Logbook::class, mappedBy: 'service')]
    private Collection $logbooks;

    public function __construct()
    {
        $this->logbooks = new ArrayCollection();
    }

    public function getId(): ?int
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

    /**
     * @return Collection<int, Logbook>
     */
    public function getLogbooks(): Collection
    {
        return $this->logbooks;
    }

    public function addLogbook(Logbook $logbook): static
    {
        if (!$this->logbooks->contains($logbook)) {
            $this->logbooks->add($logbook);
            $logbook->setService($this);
        }

        return $this;
    }

    public function removeLogbook(Logbook $logbook): static
    {
        if ($this->logbooks->removeElement($logbook)) {
            // set the owning side to null (unless already changed)
            if ($logbook->getService() === $this) {
                $logbook->setService(null);
            }
        }

        return $this;
    }
}
