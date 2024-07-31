# Documentation de la Base de Données

## Table: USER

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
