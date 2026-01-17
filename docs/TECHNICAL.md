# Documentation Technique

## Stack Technique

| Composant | Version | Description |
|-----------|---------|-------------|
| PHP | 8.4+ | Langage principal |
| Symfony | 7.3 | Framework PHP |
| Doctrine ORM | 3.x | Mapping objet-relationnel |
| MySQL/MariaDB | 10.6+ | Base de données |
| EasyAdmin | 4.x | Interface d'administration |
| PHPUnit | 12.x | Tests unitaires et fonctionnels |
| Asset Mapper | 7.3 | Gestion des assets (CSS/JS) |
| Bootstrap | 5.3 | Framework CSS |
| Stimulus | 3.x | Framework JavaScript |
| Turbo | 7.x | Navigation SPA |

## Architecture

### Structure des dossiers

```text
src/
├── Command/              # Commandes console
│   ├── Cron/             # Tâches cron
│   ├── Scheduler/        # Tâches planifiées (symfony/scheduler)
│   └── helper/           # Utilitaires pour les commandes
├── Controller/
│   ├── Admin/            # Contrôleurs EasyAdmin (CRUD)
│   ├── App/              # Contrôleurs application
│   ├── Security/         # Authentification
│   └── User/             # Gestion utilisateur
├── Entity/               # Entités Doctrine (11 entités)
├── Enum/                 # Énumérations PHP 8.1+
│   ├── JobEnum.php       # Métiers disponibles
│   ├── SpecialityEnum.php
│   └── UserRole.php      # Rôles utilisateurs
├── EventSubscriber/      # Écouteurs d'événements Symfony
├── Form/                 # Types de formulaires
├── Repository/           # Repositories Doctrine
├── Security/             # Voters et authentification
├── Services/             # Services métier
│   ├── Dashboard/        # Tableau de bord
│   ├── Logbook/          # Gestion des carnets
│   ├── Mail/             # Envoi d'emails
│   └── Admin/            # Services administration
└── Twig/                 # Extensions Twig
```

### Services principaux

| Service | Responsabilité |
|---------|---------------|
| `DashboardService` | Agrégation des données du tableau de bord |
| `DashboardDataProvider` | Récupération optimisée des données |
| `LogbookProgressService` | Calcul de la progression des carnets |
| `LogbookTemplateService` | Gestion des modèles de carnets |
| `LogbookThemeService` | Association thèmes/carnets |
| `MentorReminderService` | Envoi des rappels aux mentors |

## Modèle de données

### Hiérarchie principale

```text
User
  └── Logbook (carnet)
        └── Theme (thème)
              └── Module (module)
                    └── Action (action à valider)
```

### Validation des actions

Chaque `Action` peut être validée par :
- **L'agent** : `agentValidatedAt`, `agentComment`, `agentVisa`
- **Le mentor** : `mentorValidatedAt`, `mentorComment`, `mentorVisa`

## Sécurité

### Rôles

| Rôle | Description |
|------|-------------|
| `ROLE_USER` | Utilisateur standard (nouvel arrivant) |
| `ROLE_ADMIN` | Administrateur (mentor, MPL) |
| `ROLE_SUPER_ADMIN` | Super administrateur |

### Authentification

- Login par email + mot de passe
- Reset password via email (SymfonyCasts bundle)
- NNI unique par utilisateur

## Emails

### Configuration

```env
# Développement (MailDev)
MAILER_DSN=smtp://127.0.0.1:1025

# Production
MAILER_DSN=smtp://user:pass@smtp.example.com:587
```

### Emails automatiques

- **Rappels mentors** : Envoyés chaque mercredi à 14h via `symfony/scheduler`
- **Reset password** : Envoyé à la demande

## Tests

### Exécution

```bash
# Tous les tests
make test

# Tests avec couverture
make test-coverage

# Tests spécifiques
php bin/phpunit tests/Entity/
```

### Structure

```text
tests/
├── Abstract/           # Classes de test abstraites
├── Controller/         # Tests fonctionnels
├── Entity/             # Tests des entités
├── Enum/               # Tests des énumérations
├── Repository/         # Tests des repositories
└── Services/           # Tests des services
```

## Qualité de code

### Outils

```bash
# PHPStan (niveau max)
make phpstan

# PHP-CS-Fixer
make cs-fix

# Vérification complète avant commit
make before-commit
```

### Configuration PHPStan

Le projet utilise PHPStan niveau max avec les extensions :
- `phpstan/phpstan-symfony`
- `phpstan/phpstan-doctrine`

## Commandes utiles

| Commande | Description |
|----------|-------------|
| `make install` | Installation des dépendances |
| `make start` | Démarrer le serveur + Docker |
| `make stop` | Arrêter le serveur + Docker |
| `make db-reset` | Réinitialiser la base de données |
| `make test` | Exécuter les tests |
| `make phpstan` | Analyse statique |
| `make before-commit` | Vérification qualité |
