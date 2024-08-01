# Documentation de la Base de Données

## Ordre de Création des Entités

Pour faciliter la création des entités avec le Maker Bundle de Symfony et éviter les problèmes de dépendances circulaires, veuillez suivre l'ordre ci-dessous :

1. **User** : Crée l'entité `User` car elle est utilisée dans plusieurs autres entités.
2. **Service** : Crée l'entité `Service`, qui est une entité parent pour `Logbook`.
3. **Logbook** : Crée l'entité `Logbook`, qui dépend des entités `Service` et `User`.
4. **Theme** : Crée l'entité `Theme`, qui dépend de l'entité `Logbook`.
5. **Answer** : Crée l'entité `Answer`, qui dépend des entités `Theme` et `User`.

## Table: [USER](database/USER.md)

Cette table stocke les informations des utilisateurs pour l'authentification et la gestion des rôles dans l'application.

### Structure de la Table

| Colonne    | Type               | Description                                    | Contraintes               |
|------------|--------------------|------------------------------------------------|---------------------------|
| id         | SERIAL             | Identifiant unique de l'utilisateur            | PRIMARY KEY               |
| firstname  | VARCHAR(100)       | Prénom de l'utilisateur                        | NOT NULL                  |
| lastname   | VARCHAR(100)       | Nom de famille de l'utilisateur                | NOT NULL                  |
| email      | VARCHAR(100)       | Adresse e-mail de l'utilisateur                | UNIQUE, NOT NULL          |
| password   | VARCHAR(255)       | Mot de passe haché de l'utilisateur            | NOT NULL                  |
| roles      | ARRAY              | Rôles de l'utilisateur (sous forme de tableau) | NOT NULL, DEFAULT '[]'    |
| created_at | DATETIME_IMMUTABLE | Date de création du compte                     | DEFAULT CURRENT_TIMESTAMP |
| updated_at | DATETIME_MUTABLE   | Date de la dernière mise à jour du compte      | DEFAULT CURRENT_TIMESTAMP |
| last_login | DATETIME_MUTABLE   | Date de la dernière connexion de l'utilisateur | NULLABLE                  |

## Table: [SERVICE](database/SERVICE.md)

Cette table représente un service ou un département au sein de l'entreprise.

### Structure de la Table

| Colonne    | Type               | Description                                    | Contraintes               |
|------------|--------------------|------------------------------------------------|---------------------------|
| id         | SERIAL             | Identifiant unique du service                  | PRIMARY KEY               |
| name       | VARCHAR(255)       | Nom du service                                 | NOT NULL                  |

## Table: [LOGBOOK](database/LOGBOOK.md)

Cette table représente un carnet de compagnonnage pour un service spécifique, un nouvel arrivant et un tuteur.

### Structure de la Table

| Colonne      | Type    | Description                                    | Contraintes               | Relation  |
|--------------|---------|------------------------------------------------|---------------------------|-----------|
| id           | SERIAL  | Identifiant unique du carnet de compagnonnage  | PRIMARY KEY               |           |
| service_id   | INTEGER | Identifiant du service associé                 | FOREIGN KEY (service)     | ManyToOne |
| newcomer_id  | INTEGER | Identifiant du nouvel arrivant                 | FOREIGN KEY (user)        | OneToOne  |
| mentor_id    | INTEGER | Identifiant du tuteur                          | FOREIGN KEY (user)        | OneToOne  |

## Table: [THEME](database/THEME.md)

Cette table représente un thème ou une tâche à compléter dans le carnet de compagnonnage.

### Structure de la Table

| Colonne     | Type         | Description                            | Contraintes           | Relation   |
|-------------|--------------|----------------------------------------|-----------------------|------------|
| id          | SERIAL       | Identifiant unique du thème            | PRIMARY KEY           |            |
| title       | VARCHAR(255) | Titre du thème                         | NOT NULL              |            |
| description | TEXT         | Description détaillée du thème         | NOT NULL              |            |
| validated   | BOOLEAN      | Indique si le thème a été validé       | NULLABLE              |            |
| remark      | TEXT         | Remarques du tuteur                    | NULLABLE              |            |
| logbook_id  | INTEGER      | Identifiant du carnet de compagnonnage | FOREIGN KEY (logbook) | ManyToMany |

## Table: [ANSWER](database/ANSWER.md)

Cette table représente une réponse d'un nouvel arrivant à un thème spécifique dans le carnet de compagnonnage.

### Structure de la Table

| Colonne      | Type     | Description                                    | Contraintes               | Relation   |
|--------------|----------|------------------------------------------------|---------------------------|------------|
| id           | SERIAL   | Identifiant unique de la réponse               | PRIMARY KEY               |            |
| content      | TEXT     | Contenu de la réponse                          | NULLABLE                  |            |
| created_at   | DATETIME | Date de création de la réponse                 | DEFAULT CURRENT_TIMESTAMP |            |
| theme_id     | INTEGER  | Identifiant du thème associé                   | FOREIGN KEY (theme)       | ManyToOne  |
| newcomer_id  | INTEGER  | Identifiant du nouvel arrivant                 | FOREIGN KEY (user)        | ManyToOne  |
