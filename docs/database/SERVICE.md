# Entité Service

## Description
L'entité `Service` représente une spécialité au sein de l'entreprise, tel que "Chaudronnerie", "Mécanique", etc.

## Propriétés

- **id** : `integer`  
  Identifiant unique du service.

- **name** : `string` (255 caractères)  
  Nom du service.

## Relations

- **logbooks** : `OneToMany`  
  Relation avec l'entité `Logbook`. Un service peut avoir plusieurs carnets de compagnonnage associés.

## Exemple de Code

```php
// src/Entity/Service.php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass: ServiceRepository::class)]
class Service
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\OneToMany(targetEntity: Logbook::class, mappedBy: 'service')]
    private $logbooks;

    public function __construct()
    {
        $this->logbooks = new ArrayCollection();
    }

    // Getters et Setters
}
