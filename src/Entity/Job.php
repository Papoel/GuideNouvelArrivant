<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\JobRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ORM\Entity(repositoryClass: JobRepository::class)]
#[ORM\Table(name: '`jobs`')]
#[UniqueEntity(
    fields: ['name', 'code'],
    message: 'Cette combinaison nom/code existe déjà.',
    errorPath: 'name'
)]
class Job
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    /* @phpstan-ignore-next-line */
    private ?int $id = null;

    #[ORM\Column(length: 80)]
    #[Assert\NotBlank(message: 'Le nom de la spécialité ne peut pas être vide.')]
    #[Assert\Length(
        min: 2,
        max: 80,
        minMessage: 'Le nom doit contenir au moins {{ limit }} caractères.',
        maxMessage: 'Le nom ne peut pas dépasser {{ limit }} caractères.'
    )]
    private ?string $name = null;

    #[ORM\Column(length: 40)]
    #[Assert\NotBlank(message: 'Le code ne peut pas être vide.')]
    #[Assert\Length(
        max: 5,
        maxMessage: 'Le code ne peut contenir plus de {{ limit }} caractères.'
    )]
    #[Assert\Regex(
        pattern: '/^[A-Z0-9]+$/',
        message: 'Le code doit contenir uniquement des lettres majuscules et des chiffres.'
    )]
    private ?string $code = null;

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

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): static
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Génère une représentation unique de l'entité
     * basée sur la combinaison nom et code
     */
    public function getUniqueEntity(): string
    {
        $name = strtolower($this->getName() ?? '');
        $code = strtoupper($this->getCode() ?? '');

        return $name . '-' . $code;
    }

    public function __toString(): string
    {
        return $this->name ?? '';
    }
}
