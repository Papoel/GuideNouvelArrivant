# Entité Answer

## Description
L'entité `Answer` représente une réponse d'un nouvel arrivant à un thème du carnet de compagnonnage.

## Propriétés

- **id** : `integer`  
  Identifiant unique de la réponse.

- **content** : `text`  
  Contenu de la réponse.

- **createdAt** : `datetime`  
  Date et heure de la création de la réponse.

## Relations

- **theme** : `ManyToOne`  
  Relation avec l'entité `Theme`.

- **newcomer** : `ManyToOne`  
  Relation avec l'entité `User`.

## Exemple de Code

```php
// src/Entity/Answer.php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnswerRepository::class)]
class Answer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'text')]
    private $content;

    #[ORM\Column(type: 'datetime')]
    private $createdAt;

    #[ORM\ManyToOne(targetEntity: Theme::class, inversedBy: 'answers')]
    #[ORM\JoinColumn(nullable: false)]
    private $theme;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $newcomer;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
    }

    // Getters et Setters
}
