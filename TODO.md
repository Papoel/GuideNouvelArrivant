# TODO

## Initialisation du Projet
- [x] Créer un repository GitHub
- [x] Initialiser le projet Symfony
- [x] Configurer Docker et Docker Compose
- [x] Mettre en place la structure de base de l'application
- [x] Créer les entités de la base de données

## Authentification et Gestion des Utilisateurs
- [x] Mettre en place le système d'authentification
- [x] Créer les rôles utilisateur (nouvel arrivant, tuteur)
- [x] Mettre en place la gestion des utilisateurs
    - [x] Ajouter la propriété `NNI` à l'entité User
    - [x] Ajouter la propriété `Job` à l'entité User
    - [x] Ajouter la propriété `Speciality` à l'entité User

## Création du Livret de Compagnonnage
- [x] Créer la structure du livret
- [x] Ajouter les actions à réaliser pour les nouveaux arrivants
- [x] Mettre en place la validation des actions par les tuteurs
- [x] Créer les fixtures nécessaires pour le développement

## Interface Utilisateur
### Tableau de Bord Nouveaux Arrivants
- [x] Concevoir le tableau de bord pour les nouveaux arrivants
    - [x] Afficher les actions à réaliser
    - [x] Permettre de marquer les actions comme complétées
    - [x] Interface pour ajouter des commentaires

### Tableau de Bord Tuteurs
- [x] Concevoir le tableau de bord pour les tuteurs
    - [x] Afficher les actions des nouveaux arrivants
    - [x] Valider les actions complétées
    - [x] Dévalider une action complétée
    - [x] Ajouter des commentaires sur les actions

## Tests et Déploiement
- [ ] Écrire des tests unitaires pour les fonctionnalités de base
- [ ] Écrire des tests fonctionnels pour le flux utilisateur
- [ ] Configurer l'intégration continue
- [ ] Préparer le déploiement en production

## Documentation
- [ ] Mettre à jour la documentation de la base de données
- [ ] Ajouter la documentation utilisateur pour les nouveaux arrivants et les tuteurs
- [ ] Documenter les étapes d'installation et de configuration du projet

## Corrections et Améliorations
- [ ] Vérifier les entités pour les propriétés manquantes ou incorrectes
- [x] Ajouter la propriété NNI dans l'entité User
- [ ] Vérifier les contraintes de la base de données (ex. colonnes nullable)
- [ ] Améliorer les messages d'erreur pour une meilleure expérience utilisateur
- [ ] Lorsque je supprime un thème dans un carnet, il faut supprimer également les actions liées (commentaires agent et tuteur)

## Divers
- [ ] Réviser le code pour le rendre plus propre et maintenable
- [ ] Optimiser les performances de l'application
- [ ] Effectuer des revues de code régulières
