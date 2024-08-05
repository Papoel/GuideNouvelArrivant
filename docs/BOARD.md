# Tableau de Bord du Projet LivretCompagnonnage

## Vision du Projet
Créer une application de livret de compagnonnage pour faciliter l'intégration des nouveaux arrivants dans notre société. Les nouveaux arrivants auront un carnet avec des actions à réaliser, que les tuteurs pourront valider ou commenter.

## Objectifs
1. Fournir un livret structuré avec des actions pour les nouveaux arrivants.
2. Permettre aux tuteurs de valider et commenter les actions.
3. Offrir une interface utilisateur conviviale.

## Étapes du Projet

### Étape 1 : Initialisation du Projet
- [X] Créer un repository GitHub
- [X] Initialiser le projet Symfony
- [X] Configurer Docker et Docker Compose
- [X] Mettre en place la structure de base de l'application
- [X] Créer les entités de la base de données

### Étape 2 : Authentification et Gestion des Utilisateurs
- [X] Mettre en place le système d'authentification
- [ ] Créer les rôles utilisateur (nouvel arrivant, tuteur)
- [ ] Mettre en place la gestion des utilisateurs

### Étape 3 : Création du Livret de Compagnonnage
- [ ] Créer la structure du livret
- [ ] Ajouter les actions à réaliser pour les nouveaux arrivants
- [ ] Mettre en place la validation des actions par les tuteurs

### Étape 4 : Interface Utilisateur
- [ ] Concevoir le tableau de bord pour les nouveaux arrivants
- [ ] Concevoir le tableau de bord pour les tuteurs
- [ ] Ajouter des fonctionnalités pour les commentaires des tuteurs

### Étape 5 : Tests et Déploiement
- [ ] Écrire des tests unitaires et fonctionnels
- [ ] Configurer l'intégration continue
- [ ] Préparer le déploiement en production

## Avancement

| Étape                                        | Statut  | Branche              | Date de début | Date de fin prévue | Commentaires                                        |
|----------------------------------------------|---------|----------------------|---------------|--------------------|-----------------------------------------------------|
| Initialisation du Projet                     | Terminé | `init-project`       | 27/07/2024    | 27/07/2024         | Configuration de base                               |
| Authentification et Gestion des Utilisateurs | Terminé | `auth`               | 28/07/2024    | 02/08/2024         | Création de la table User                           |
| Création du Livret de Compagnonnage          | Terminé | `database`           | 30/07/2024    | 31/07/2024         | Création des tables Answer, Logbook, Service, Theme |
| Création du Livret de Compagnonnage          | À venir | `create-livret`      | 01/08/2024    | 17/08/2024         |                                                     |
| Interface Utilisateur                        | À venir | `ui-design`          | 18/08/2024    | 24/08/2024         |                                                     |
| Tests et Déploiement                         | À venir | `testing-deployment` | 25/08/2024    | 31/08/2024         |                                                     |

## Historique des Versions

| Version | Description                                     | Date       |
|---------|-------------------------------------------------|------------|
| 0.1     | Initialisation du projet                        | 27/07/2024 |
| 0.2     | Authentification et gestion des utilisateurs    | 04/08/2024 |
| 0.3     | Création du livret de compagnonnage             | 11/08/2024 |
| 0.4     | Interface utilisateur                           | 18/08/2024 |
| 0.5     | Tests et déploiement                            | 25/08/2024 |

## Contributeurs
- Papoel - Développeur principal

## Ressources
- [Documentation Symfony](https://symfony.com/doc/current/index.html)
- [Docker Documentation](https://docs.docker.com/)
- [PHPStan Documentation](https://phpstan.org/)

---

## Détails des Étapes

### Étape 1 : Initialisation du Projet

#### Tâches
- [X] Créer un repository GitHub
- [X] Initialiser un projet Symfony avec `symfony new GuideNouvelArrivant --webapp`
- [X] Configurer Docker et Docker Compose
- [X] Créer un fichier `docker-compose.yaml`
- [X] Configurer la base de données PostgreSQL
- [X] Mettre en place la structure de base de l'application

### Étape 2 : Authentification et Gestion des Utilisateurs

#### Tâches
- [X] Mettre en place le système d'authentification
- [ ] Créer les rôles utilisateur (nouvel arrivant, tuteur)
- [ ] Mettre en place la gestion des utilisateurs

### Étape 3 : Création du Livret de Compagnonnage

#### Tâches
- [ ] Créer la structure du livret
- [ ] Ajouter les actions à réaliser pour les nouveaux arrivants
- [ ] Mettre en place la validation des actions par les tuteurs
- [ ] Créer les fixtures nécessaires pour le développement

### Étape 4 : Interface Utilisateur

#### Tâches
- [ ] Concevoir le tableau de bord pour les nouveaux arrivants
- [ ] Concevoir le tableau de bord pour les tuteurs
- [ ] Ajouter des fonctionnalités pour les commentaires des tuteurs

### Étape 5 : Tests et Déploiement

#### Tâches
- [ ] Écrire des tests unitaires et fonctionnels
- [ ] Configurer l'intégration continue
- [ ] Préparer le déploiement en production

---

## Instructions pour chaque étape

Pour chaque étape, nous créerons une nouvelle branche et nous fusionnerons les changements dans la branche principale (`main`) une fois l'étape terminée.
