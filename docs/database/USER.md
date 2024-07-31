# Entité User

## Description
L'entité `User` représente un utilisateur de l'application, qui peut être un nouvel arrivant, un tuteur ou un manager.

## Propriétés

- **id** : `integer`  
  Identifiant unique de l'utilisateur.

- **username** : `string` (255 caractères)  
  Nom d'utilisateur.

- **roles** : `array`  
  Rôles de l'utilisateur, tels que `ROLE_USER`, `ROLE_MANAGER`, etc.

## Relations

- **newcomerLogbooks** : `OneToOne`  
  Relation avec l'entité `Logbook` pour les nouveaux arrivants.

- **mentorLogbooks** : `OneToOne`  
  Relation avec l'entité `Logbook` pour les tuteurs.

- **themes** : `OneToMany`  
  Relation avec l'entité `Theme` pour les réponses aux thèmes.

## Exemple de Code

```php
// src/Entity/User.php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User implements UserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, unique: true)]
    private $username;

    #[ORM\Column(type: 'json')]
    private $roles = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    // Getters et Setters
}
