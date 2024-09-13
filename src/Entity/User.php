<?php

namespace App\Entity;

use App\Entity\Traits\TimestampTrait;
use App\Enum\JobEnum;
use App\Enum\SpecialityEnum;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`users`')]
#[ORM\HasLifecycleCallbacks]
#[ORM\UniqueConstraint(name: 'UNIQ_IDENTIFIER_EMAIL', fields: ['email'])]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    use TimestampTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: Types::INTEGER)]
    private ?int $id = null;

    #[ORM\Column(type: Types::STRING, length: 50)]
    private string $firstname;

    #[ORM\Column(type: Types::STRING, length: 50)]
    private string $lastname;

    #[ORM\Column(type: Types::STRING, length: 180)]
    private string $email;

    /**
     * @var list<string> The user roles
     */
    #[ORM\Column(type: Types::SIMPLE_ARRAY)]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column(type: Types::STRING)]
    private string $password;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $lastLoginAt = null;

    #[ORM\Column(type: Types::STRING, length: 80, nullable: true, enumType: JobEnum::class)]
    private ?JobEnum $job = null;

    #[ORM\Column(type: Types::STRING, length: 6, nullable: true)]
    private ?string $nni = null;

    #[ORM\Column(type: Types::STRING, length: 80, nullable: true, enumType: SpecialityEnum::class)]
    private ?SpecialityEnum $speciality = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $hiringAt = null;

    #[ORM\ManyToOne(targetEntity: self::class, cascade: ['persist'])]
    #[ORM\JoinColumn(onDelete: 'SET NULL')]
    private ?self $mentor = null;

    /**
     * @var Collection<int, Logbook>
     */
    #[ORM\OneToMany(targetEntity: Logbook::class, mappedBy: 'owner')]
    private Collection $logbooks;

    /**
     * @var Collection<int, Action>
     */
    #[ORM\OneToMany(targetEntity: Action::class, mappedBy: 'user')]
    private Collection $actions;

    public function __construct()
    {
        $this->roles = ['ROLE_USER'];
        $this->logbooks = new ArrayCollection();
        $this->actions = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->getFullname();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): static
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     *
     * @return list<string>
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    /**
     * @param list<string> $roles
     */
    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getLastLoginAt(): ?\DateTimeInterface
    {
        return $this->lastLoginAt;
    }

    public function setLastLoginAt(?\DateTimeInterface $lastLoginAt): static
    {
        $this->lastLoginAt = $lastLoginAt;

        return $this;
    }

    public function getFullname(): string
    {
        $firstname = ucfirst($this->firstname);
        $lastname = ucfirst($this->lastname);

        return $firstname.' '.$lastname;
    }

    public function getJob(): ?JobEnum
    {
        return $this->job;
    }

    public function setJob(JobEnum $job): static
    {
        $this->job = $job;

        return $this;
    }

    public function getJobLabel(): ?string
    {
        return $this->job?->value;
    }

    public function getNni(): ?string
    {
        return $this->nni;
    }

    public function setNni(string $nni): static
    {
        $this->nni = $nni;

        return $this;
    }

    public function getSpeciality(): ?SpecialityEnum
    {
        return $this->speciality;
    }

    public function setSpeciality(SpecialityEnum $speciality): static
    {
        $this->speciality = $speciality;

        return $this;
    }

    public function getSpecialityLabel(): ?string
    {
        return $this->speciality?->getAbbreviation();
    }

    public function getMentor(): ?self
    {
        return $this->mentor;
    }

    public function setMentor(?self $mentor): static
    {
        $this->mentor = $mentor;

        return $this;
    }

    public function getHiringAt(): ?\DateTimeImmutable
    {
        return $this->hiringAt;
    }

    public function setHiringAt(?\DateTimeImmutable $hiringAt): static
    {
        $this->hiringAt = $hiringAt;

        return $this;
    }

    public function isAdmin(): bool
    {
        return \in_array(needle: 'ROLE_ADMIN', haystack: $this->roles, strict: true);
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
            $logbook->setOwner($this);
        }

        return $this;
    }

    public function removeLogbook(Logbook $logbook): static
    {
        if ($this->logbooks->removeElement($logbook)) {
            // set the owning side to null (unless already changed)
            if ($logbook->getOwner() === $this) {
                $logbook->setOwner(null);
            }
        }

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
            $action->setUser($this);
        }

        return $this;
    }

    public function removeAction(Action $action): static
    {
        if ($this->actions->removeElement($action)) {
            // set the owning side to null (unless already changed)
            if ($action->getUser() === $this) {
                $action->setUser(null);
            }
        }

        return $this;
    }
}
