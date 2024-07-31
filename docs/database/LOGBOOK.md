# Entité Logbook

## Description
L'entité `Logbook` représente un carnet de compagnonnage spécifique à un service pour un nouvel arrivant.

## Propriétés

- **id** : `integer`  
  Identifiant unique du carnet de compagnonnage.

- **service** : `Service`  
  Service auquel ce carnet est associé.

- **newcomer** : `User`  
  Utilisateur (nouvel arrivant) associé à ce carnet.

- **mentor** : `User`  
  Utilisateur (tuteur) associé à ce carnet.

## Relations

- **service** : `ManyToOne`  
  Relation avec l'entité `Service`.

- **newcomer** : `OneToOne`  
  Relation avec l'entité `User`.

- **mentor** : `OneToOne`  
  Relation avec l'entité `User`.

- **themes** : `OneToMany`  
  Relation avec l'entité `Theme`. Un carnet peut avoir plusieurs thèmes.

## Exemple de Code

```php
// src/Entity/Logbook.php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass: LogbookRepository::class)]
class Logbook
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Service::class, inversedBy: 'logbooks')]
    #[ORM\JoinColumn(nullable: false)]
    private $service;

    #[ORM\OneToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $newcomer;

    #[ORM\OneToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $mentor;

    #[ORM\OneToMany(targetEntity: Theme::class, mappedBy: 'logbook')]
    private $themes;

    public function __construct()
    {
        $this->themes = new ArrayCollection();
    }

    // Getters et Setters
}
