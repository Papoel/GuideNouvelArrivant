# Entité Theme

## Description
L'entité `Theme` représente un thème ou une tâche à compléter dans le carnet de compagnonnage.

## Propriétés

- **id** : `integer`  
  Identifiant unique du thème.

- **title** : `string` (255 caractères)  
  Titre du thème.

- **description** : `text`  
  Description détaillée du thème.

- **validated** : `boolean` (nullable)  
  Indique si le thème a été validé par le tuteur.

- **remark** : `text` (nullable)  
  Remarques ou commentaires du tuteur.

## Relations

- **logbook** : `ManyToOne`  
  Relation avec l'entité `Logbook`.

- **answers** : `OneToMany`  
  Relation avec l'entité `Answer`. Un thème peut avoir plusieurs réponses.

## Exemple de Code

```php
// src/Entity/Theme.php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass: ThemeRepository::class)]
class Theme
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Logbook::class, inversedBy: 'themes')]
    #[ORM\JoinColumn(nullable: false)]
    private $logbook;

    #[ORM\Column(type: 'string', length: 255)]
    private $title;

    #[ORM\Column(type: 'text')]
    private $description;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $validated;

    #[ORM\Column(type: 'text', nullable: true)]
    private $remark;

    #[ORM\OneToMany(targetEntity: Answer::class, mappedBy: 'theme')]
    private $answers;

    public function __construct()
    {
        $this->answers = new ArrayCollection();
    }

    // Getters et Setters
}
