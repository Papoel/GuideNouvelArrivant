<?php

namespace App\Entity;

use App\Entity\Traits\TimestampTrait;
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

    #[ORM\OneToOne(mappedBy: 'newcomer', cascade: ['persist', 'remove'])]
    private ?Logbook $logbook = null;

    /**
     * @var Collection<int, Answer>
     */
    #[ORM\OneToMany(targetEntity: Answer::class, mappedBy: 'newcomer')]
    private Collection $answers;

    /**
     * @var Collection<int, Logbook>
     */
    #[ORM\OneToMany(targetEntity: Logbook::class, mappedBy: 'mentor')]
    private Collection $logbooks;

    public function __construct()
    {
        $this->answers = new ArrayCollection();
        $this->logbooks = new ArrayCollection();
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

    public function getLogbook(): ?Logbook
    {
        return $this->logbook;
    }

    public function setLogbook(?Logbook $logbook): static
    {
        // unset the owning side of the relation if necessary
        if (null === $logbook && null !== $this->logbook) {
            $this->logbook->setNewcomer(null);
        }

        // set the owning side of the relation if necessary
        if (null !== $logbook && $logbook->getNewcomer() !== $this) {
            $logbook->setNewcomer($this);
        }

        $this->logbook = $logbook;

        return $this;
    }

    /**
     * @return Collection<int, Answer>
     */
    public function getAnswers(): Collection
    {
        return $this->answers;
    }

    public function addAnswer(Answer $answer): static
    {
        if (!$this->answers->contains($answer)) {
            $this->answers->add($answer);
            $answer->setNewcomer($this);
        }

        return $this;
    }

    public function removeAnswer(Answer $answer): static
    {
        if ($this->answers->removeElement($answer)) {
            // set the owning side to null (unless already changed)
            if ($answer->getNewcomer() === $this) {
                $answer->setNewcomer(null);
            }
        }

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
            $logbook->setMentor($this);
        }

        return $this;
    }

    public function removeLogbook(Logbook $logbook): static
    {
        if ($this->logbooks->removeElement($logbook)) {
            // set the owning side to null (unless already changed)
            if ($logbook->getMentor() === $this) {
                $logbook->setMentor(null);
            }
        }

        return $this;
    }
}
