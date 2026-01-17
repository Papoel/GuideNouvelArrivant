# Documentation de la Base de Données

## Vue d'ensemble

Le projet utilise **MySQL/MariaDB** avec **Doctrine ORM**. Les identifiants principaux utilisent des **UUID** pour la plupart des entités (sauf Job et Speciality qui utilisent des auto-incréments).

## Schéma des Relations

```
User ←──────── Logbook ←──────── Theme ←──────── Module ←──────── Action
  │               │                 │                                 │
  │               │                 └── ManyToMany ──────────────────┘
  │               │                                                   │
  ├── ManyToOne ──┤                                                   │
  │   (mentor)    └── ManyToMany ── Theme                             │
  │                                                                   │
  ├── ManyToOne ── Job                                                │
  ├── ManyToOne ── Speciality                                         │
  ├── ManyToOne ── Service                                            │
  └── OneToMany ── Feedback                                           │
                                                                      │
LogbookTemplate ── ManyToMany ── Theme                                │
       │                                                              │
       └── JSON ── jobs[]                                             │
```

## Entités

### User (users)

Utilisateur de l'application avec authentification et relations.

| Colonne | Type | Description |
|---------|------|-------------|
| id | UUID | Identifiant unique |
| firstname | VARCHAR(50) | Prénom |
| lastname | VARCHAR(50) | Nom |
| email | VARCHAR(180) | Email (unique) |
| password | VARCHAR(255) | Mot de passe hashé |
| roles | SIMPLE_ARRAY | Rôles (ROLE_USER, ROLE_ADMIN, etc.) |
| nni | VARCHAR(6) | Numéro National d'Identification |
| last_login_at | DATETIME | Dernière connexion |
| hiring_at | DATETIME_IMMUTABLE | Date d'embauche |
| created_at | DATETIME_IMMUTABLE | Date de création |
| updated_at | DATETIME | Dernière mise à jour |
| mentor_id | UUID (FK) | Mentor assigné |
| job_id | INT (FK) | Métier |
| speciality_id | INT (FK) | Spécialité |
| service_id | UUID (FK) | Service |

### Logbook (logbooks)

Carnet de compagnonnage assigné à un utilisateur.

| Colonne | Type | Description |
|---------|------|-------------|
| id | UUID | Identifiant unique |
| name | VARCHAR(100) | Nom du carnet |
| owner_id | UUID (FK) | Propriétaire du carnet |

**Relations** : ManyToMany avec Theme, OneToMany avec Action

### LogbookTemplate (logbook_templates)

Modèle de carnet par métier.

| Colonne | Type | Description |
|---------|------|-------------|
| id | UUID | Identifiant unique |
| name | VARCHAR(100) | Nom du modèle |
| description | TEXT | Description |
| is_default | BOOLEAN | Modèle par défaut |
| jobs | JSON | Liste des métiers compatibles |
| service_id | UUID (FK) | Service associé |
| created_at | DATETIME_IMMUTABLE | Date de création |
| updated_at | DATETIME | Dernière mise à jour |

**Relations** : ManyToMany avec Theme

### Theme (themes)

Thème regroupant plusieurs modules.

| Colonne | Type | Description |
|---------|------|-------------|
| id | UUID | Identifiant unique |
| title | VARCHAR(100) | Titre du thème |
| description | TEXT | Description |

**Relations** : ManyToMany avec Logbook, OneToMany avec Module

### Module (modules)

Module contenant des actions à réaliser.

| Colonne | Type | Description |
|---------|------|-------------|
| id | UUID | Identifiant unique |
| title | VARCHAR(100) | Titre du module |
| description | TEXT | Description |
| theme_id | UUID (FK) | Thème parent |

**Relations** : ManyToOne avec Theme, OneToMany avec Action

### Action (actions)

Action à réaliser par l'utilisateur.

| Colonne | Type | Description |
|---------|------|-------------|
| id | UUID | Identifiant unique |
| description | VARCHAR(255) | Description de l'action |
| agent_comment | TEXT | Commentaire de l'agent |
| agent_validated_at | DATETIME | Date de validation agent |
| agent_visa | VARCHAR(255) | Visa de l'agent |
| mentor_comment | TEXT | Commentaire du mentor |
| mentor_validated_at | DATETIME | Date de validation mentor |
| mentor_commented_at | DATETIME | Date du commentaire mentor |
| mentor_visa | VARCHAR(255) | Visa du mentor |
| module_id | UUID (FK) | Module parent |
| user_id | UUID (FK) | Utilisateur assigné |
| logbook_id | UUID (FK) | Carnet associé |

### Service (services)

Service ou département de l'entreprise.

| Colonne | Type | Description |
|---------|------|-------------|
| id | UUID | Identifiant unique |
| name | VARCHAR(10) | Nom du service |
| description | TEXT | Description |
| chef_id | UUID (FK) | Chef du service |

**Relations** : OneToMany avec User

### Job (jobs)

Métier de l'utilisateur.

| Colonne | Type | Description |
|---------|------|-------------|
| id | INT (auto) | Identifiant unique |
| name | VARCHAR(80) | Nom du métier |
| code | VARCHAR(40) | Code (ex: TECH, CA, ING) |

### Speciality (specialities)

Spécialité technique de l'utilisateur.

| Colonne | Type | Description |
|---------|------|-------------|
| id | INT (auto) | Identifiant unique |
| name | VARCHAR(80) | Nom de la spécialité |
| code | VARCHAR(40) | Code |

### Feedback (feedbacks)

Retours d'expérience des utilisateurs.

| Colonne | Type | Description |
|---------|------|-------------|
| id | UUID | Identifiant unique |
| title | VARCHAR(150) | Titre du REX |
| content | TEXT | Contenu |
| category | VARCHAR(50) | Catégorie |
| is_reviewed | BOOLEAN | Statut de revue |
| manager_comment | TEXT | Commentaire du manager |
| author_id | UUID (FK) | Auteur |
| reviewed_by_id | UUID (FK) | Réviseur |
| review_at | DATETIME_IMMUTABLE | Date de revue |
| created_at | DATETIME_IMMUTABLE | Date de création |
| updated_at | DATETIME | Dernière mise à jour |

### ResetPasswordRequest

Gestion des demandes de réinitialisation de mot de passe (bundle SymfonyCasts).
