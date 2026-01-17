# 📘 GNA - Guide du Nouvel Arrivant

![Version](https://img.shields.io/badge/version-1.0.5-blue.svg)
![PHP](https://img.shields.io/badge/PHP-8.4-purple.svg)
![Symfony](https://img.shields.io/badge/Symfony-7.3-black.svg)
![License](https://img.shields.io/badge/license-proprietary-red.svg)
![Dev Time](https://img.shields.io/badge/dev_time-~300_hours-orange.svg)
![Commits](https://img.shields.io/badge/commits-358-green.svg)
[![Quality Analysis](https://github.com/Papoel/GuideNouvelArrivant/actions/workflows/quality.yaml/badge.svg)](https://github.com/Papoel/GuideNouvelArrivant/actions/workflows/quality.yaml)
[![Security Audit](https://github.com/Papoel/GuideNouvelArrivant/actions/workflows/audit.yml/badge.svg)](https://github.com/Papoel/GuideNouvelArrivant/actions/workflows/audit.yml)

**GNA - Guide du Nouvel Arrivant** est une application web conçue pour faciliter l'intégration des nouveaux arrivants au sein d'une entreprise en leur proposant un livret de compagnonnage interactif. Ce livret permet aux tuteurs (mentors) de suivre, valider et commenter les actions des nouveaux membres, tout en offrant une expérience utilisateur optimisée et moderne.

---

## 📊 Statistiques du projet

| Métrique | Valeur |
|----------|--------|
| 📅 Début du projet | Juillet 2024 |
| 🔄 Commits | 358 |
| 📆 Jours de développement | 77 |
| ⏱️ Temps estimé | ~300 heures |
| 📁 Fichiers PHP | 116 |
| 🎨 Templates Twig | 61 |
| 🧪 Fichiers de tests | 58 |
| 📝 Lignes de code | ~12 700 |

---

## 📑 Table des Matières

- [Vision du Projet](#vision-du-projet)
- [Objectifs](#objectifs)
- [Fonctionnalités](#fonctionnalités)
- [Architecture Technique](#architecture-technique)
- [Installation](#installation)
- [Configuration](#configuration)
- [Tests](#tests)
- [Déploiement](#déploiement)
- [Documentation](#documentation)
- [Contributeurs](#contributeurs)

---

## Vision du Projet

Application de livret de compagnonnage moderne, intuitive et collaborative, qui sert de référence pour l'intégration des nouveaux arrivants et améliore leur expérience dès leur arrivée dans l'entreprise.

## Objectifs

- Faciliter l'intégration des nouveaux collaborateurs
- Structurer le processus d'onboarding avec un suivi précis
- Permettre aux tuteurs de suivre et valider les progrès des nouveaux arrivants
- Offrir une plateforme collaborative entre apprenants et mentors
- Capitaliser sur les retours d'expérience pour améliorer continuellement le processus
- Permettre aux Manager de suivre l'intégration des nouveaux arrivants grâce à un tableau de bord.

## Fonctionnalités

### 📱 Interface utilisateur moderne

- Design responsive avec une palette de couleurs professionnelle
- Tableaux de bord personnalisés selon les rôles (apprenant, mentor, administrateur)
- Visualisation des progrès avec des graphiques et indicateurs
- Interface optimisée pour l'impression PDF

### 👥 Gestion des utilisateurs

- Système d'authentification sécurisé (email ou NNI)
- Gestion des rôles (apprenant, mentor, administrateur)
- Réinitialisation de mot de passe par email
- Organisation hiérarchique des services avec pôles et délégués

### 📚 Livret de compagnonnage

- Structure hiérarchique : **Thèmes > Modules > Actions**
- Modèles de carnets par métier et service
- Assignation automatique ou manuelle des carnets
- Suivi des actions à accomplir par les nouveaux arrivants
- Validation et commentaires par les mentors
- Génération de rapports PDF de progression

### 💬 Capitalisation du REX

- Système de retour d'expérience (feedback) catégorisé
- Workflow de revue par les managers
- Synthèse des REX pour amélioration continue
- Filtrage par service

### 📧 Notifications automatiques

- Emails de rappel hebdomadaires aux mentors
- Planification via Symfony Scheduler
- Templates email compatibles Gmail/Outlook

## Architecture Technique

### Technologies utilisées

| Catégorie | Technologies |
|-----------|-------------|
| **Backend** | PHP 8.4, Symfony 7.3 |
| **Frontend** | Twig, Bootstrap 5, JavaScript, Stimulus |
| **Base de données** | Doctrine ORM, PostgreSQL/MySQL |
| **Sécurité** | Symfony Security Bundle |
| **Tests** | PHPUnit 12 |
| **Qualité** | PHP-CS-Fixer, PHPStan (level max) |
| **CI/CD** | GitHub Actions |
| **Emails** | Symfony Mailer, Symfony Scheduler |

### Structure du projet

```text
GuideNouvelArrivant/
├── assets/              # Fichiers frontend (JS, CSS)
├── bin/                 # Commandes Symfony
├── config/              # Configuration de l'application
├── docs/                # Documentation technique
├── migrations/          # Migrations de base de données
├── public/              # Point d'entrée web
├── src/                 # Code source PHP
│   ├── Command/         # Commandes console
│   ├── Controller/      # Contrôleurs (App, Admin, Security)
│   ├── Entity/          # Entités Doctrine
│   ├── Enum/            # Énumérations PHP
│   ├── Form/            # Types de formulaires
│   ├── Message/         # Messages asynchrones
│   ├── Repository/      # Repositories Doctrine
│   ├── Security/        # Authentification & autorisation
│   ├── Services/        # Services métier (Dashboard, Logbook, Mail, User)
│   └── Twig/            # Extensions Twig
├── templates/           # Templates Twig
├── tests/               # Tests automatiques
└── translations/        # Fichiers de traduction
```

### Modèle de données

- **User** : Utilisateurs (apprenants, mentors, administrateurs)
- **Service** : Service affecté
- **Job / Speciality** : Métiers et spécialités
- **Logbook** : Carnet de compagnonnage
- **LogbookTemplate** : Modèles de carnets par métier
- **Theme > Module > Action** : Structure hiérarchique du livret
- **Feedback** : Retours d'expérience (REX)

## Installation

### Prérequis

- PHP 8.4+
- Composer
- Symfony CLI
- MySQL

### Installation rapide

```bash
# 1. Cloner le dépôt
git clone https://github.com/Papoel/GuideNouvelArrivant.git
cd GuideNouvelArrivant

# 2. Installer les dépendances
make install

# 3. Initialiser l'environnement de développement
# (crée .env.local, démarre Docker, crée la base de données)
make init-dev

# 4. Appliquer les migrations
make db-migrate

# 5. Charger les fixtures (optionnel)
make db-fixtures

# 6. Lancer le serveur
make start
```

### Commandes Make utiles

| Commande | Description |
|----------|-------------|
| `make start` | Démarre le serveur Symfony + Docker |
| `make stop` | Arrête le serveur et les conteneurs |
| `make db-reset` | Réinitialise la base de données (drop + create + migrate + fixtures) |
| `make test` | Exécute les tests PHPUnit |
| `make phpstan` | Analyse statique du code (niveau max) |
| `make before-commit` | Vérifie la qualité du code avant un commit |
| `make help` | Affiche toutes les commandes disponibles |

## Configuration

### Base de données

```env
DATABASE_URL="mysql://user:password@127.0.0.1:3306/gna_db?serverVersion=mariadb-10.6.12&charset=utf8mb4"
```

### Emails

```env
MAILER_DSN=smtp://user:pass@smtp.example.com:port
```

### Environnement

```env
APP_ENV=dev   # ou prod
APP_DEBUG=1   # ou 0
```

## Tests

```bash
# Créer la base de test
php bin/console doctrine:database:create --env=test
php bin/console doctrine:migrations:migrate --env=test

# Exécuter les tests
php bin/phpunit

# Avec couverture de code
php bin/phpunit --coverage-html coverage
```

### Qualité de code

```bash
# PHPStan (analyse statique)
make phpstan

# PHP-CS-Fixer (style de code)
make cs-fix
```

## Déploiement

```bash
# 1. Optimiser pour la production
composer install --no-dev --optimize-autoloader

# 2. Compiler les assets (Asset Mapper)
php bin/console asset-map:compile

# 3. Vider le cache
APP_ENV=prod APP_DEBUG=0 php bin/console cache:clear

# 4. Appliquer les migrations
php bin/console doctrine:migrations:migrate --no-interaction
```

> **Note** : Ce projet utilise [Asset Mapper](https://symfony.com/doc/current/frontend/asset_mapper.html)
> pour la gestion des assets. Pas besoin de Node.js ni de build JavaScript.

## Documentation

- [Tableau de Bord du Projet](docs/BOARD.md)
- [Documentation Base de Données](docs/DATABASE.md)
- [Documentation Technique](docs/TECHNICAL.md)
- [Configuration Docker](docs/DOCKER.md)

## Contributeurs

- **[Papoel](https://github.com/Papoel)** - Créateur et mainteneur principal

## Licence

Ce projet est sous licence propriétaire. Tous droits réservés.

---

## Ressources

- [Documentation Symfony](https://symfony.com/doc/current/index.html)
- [PHPStan Documentation](https://phpstan.org/)
- [PHPUnit Documentation](https://phpunit.de/)

---

*Développé avec ❤️ par Papoel*
