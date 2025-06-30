# 📘 GNU - Guide du Nouvel Arrivant

**GNU - Guide du Nouvel Arrivant** est une application conçue pour faciliter l'intégration des nouveaux arrivants au sein de la société en leur proposant un livret de compagnonnage interactif. Ce livret permet aux tuteurs de suivre, valider et commenter les actions des nouveaux membres, tout en offrant une expérience utilisateur optimisée.

---

## 📑 Table des Matières

- [✨ Vision du Projet](#-vision-du-projet)
- [🎯 Objectifs](#-objectifs)
- [⚙️ Fonctionnalités](#️-fonctionnalités)
- [🚀 Installation](#-installation)
- [📄 Documentation](#-documentation)
- [👥 Contributeurs](#-contributeurs)
- [🔗 Ressources](#-ressources)

---

## ✨ Vision du Projet

# Guide Nouvel Arrivant

![Version](https://img.shields.io/badge/version-1.0.0-blue.svg)
![PHP](https://img.shields.io/badge/PHP-8.2-purple.svg)
![Symfony](https://img.shields.io/badge/Symfony-7.1-black.svg)
![License](https://img.shields.io/badge/license-proprietary-red.svg)
![CI/CD](https://github.com/Papoel/GuideNouvelArrivant/workflows/Quality%20Analysis/badge.svg)

Application de livret de compagnonnage moderne, intuitive et collaborative, qui sert de référence pour l'intégration des nouveaux arrivants et améliore leur expérience dès leur arrivée dans l'entreprise.

## 📑 Table des matières

- [Présentation](#-présentation)
- [Fonctionnalités](#-fonctionnalités)
- [Architecture technique](#-architecture-technique)
- [Installation](#-installation)
- [Configuration](#-configuration)
- [Utilisation](#-utilisation)
- [Tests](#-tests)
- [Déploiement](#-déploiement)
- [Maintenance](#-maintenance)
- [Contribution](#-contribution)
- [Licence](#-licence)

## 🌟 Présentation

L'application **Guide Nouvel Arrivant** est une plateforme de gestion du compagnonnage conçue pour faciliter l'intégration des nouveaux collaborateurs. Elle permet de structurer le parcours d'apprentissage, de suivre la progression et de valider les compétences acquises.

### 🎯 Objectifs

1. Fournir un livret structuré avec des actions adaptées aux besoins des nouveaux arrivants
2. Permettre aux tuteurs de suivre le progrès, valider ou commenter les actions des compagnons
3. Offrir une interface utilisateur moderne, simple et conviviale
4. Garantir une intégration fluide dans l'écosystème existant grâce à des technologies robustes

## ⚙️ Fonctionnalités

### Pour les nouveaux arrivants

- 📋 **Livret d'intégration personnalisé** : Accès à un carnet de compagnonnage adapté à leur profil
- ✍️ **Suivi des actions** : Possibilité de documenter les actions réalisées
- 📊 **Visualisation des progrès** : Tableau de bord avec indicateurs de progression
- 🖨️ **Export PDF** : Génération d'un document PDF du carnet de compagnonnage

### Pour les tuteurs/mentors

- ✅ **Validation des actions** : Interface pour valider ou commenter les actions des compagnons
- 📝 **Commentaires** : Possibilité d'ajouter des commentaires et recommandations
- 👁️ **Vue d'ensemble** : Visualisation de la progression de tous les compagnons suivis

### Pour les administrateurs

- 👥 **Gestion des utilisateurs** : Création, modification et suppression des comptes
- 📚 **Gestion des thèmes et modules** : Configuration des contenus du livret
- 📈 **Statistiques globales** : Tableau de bord de progression de l'ensemble des utilisateurs
- 🔄 **Administration simplifiée** : Interface intuitive basée sur EasyAdmin

## 🏗️ Architecture technique

### Technologies utilisées

- **Backend** : PHP 8.2, Symfony 7.1
- **Base de données** : Doctrine ORM avec support PostgreSQL/MySQL
- **Frontend** : Twig, Bootstrap, JavaScript
- **Authentification** : Symfony Security Bundle
- **Administration** : EasyAdmin Bundle
- **Notifications** : Flasher Bundle
- **PDF** : DomPDF

### Structure du projet

```text
├── assets/            # Ressources frontend (JS, CSS)
├── bin/               # Exécutables (console)
├── config/            # Configuration de l'application
├── migrations/        # Migrations de base de données
├── public/            # Fichiers publics
├── src/               # Code source de l'application
│   ├── Command/       # Commandes console
│   ├── Controller/    # Contrôleurs
│   ├── DataFixtures/  # Fixtures pour les données de test
│   ├── Entity/        # Entités Doctrine
│   ├── Enum/          # Énumérations PHP
│   ├── EventSubscriber/ # Abonnés aux événements
│   ├── Form/          # Formulaires
│   ├── Repository/    # Repositories Doctrine
│   ├── Security/      # Classes liées à la sécurité
│   ├── Services/      # Services métier
│   └── Twig/          # Extensions Twig
├── templates/         # Templates Twig
├── tests/             # Tests automatisés
└── translations/      # Fichiers de traduction
```

### Modèle de données

- **User** : Utilisateurs de l'application (compagnons, tuteurs, administrateurs)
- **Logbook** : Carnets de compagnonnage associés aux utilisateurs
- **Theme** : Thèmes regroupant des modules
- **Module** : Modules contenant des actions à réaliser
- **Action** : Actions à accomplir par les compagnons

## 🚀 Installation

### Prérequis

- PHP 8.2 ou supérieur
- Composer
- Symfony CLI
- Node.js et npm
- Base de données (PostgreSQL ou MySQL)

### Étapes d'installation

1. Cloner le dépôt

```bash
git clone https://github.com/Papoel/GuideNouvelArrivant.git
cd GuideNouvelArrivant
```

1. Installer les dépendances PHP

```bash
composer install
```

1. Installer les dépendances JavaScript

```bash
npm install
npm run build
```

1. Configurer les variables d'environnement

```bash
cp .env .env.local
# Modifier .env.local avec vos paramètres
```

1. Créer la base de données et exécuter les migrations

```bash
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
```

1. Charger les données initiales (optionnel)

```bash
php bin/console doctrine:fixtures:load --group=AppFixtures
```

1. Démarrer le serveur de développement

```bash
symfony server:start
```

## ⚙️ Configuration

### Configuration de la base de données

Modifier le fichier `.env.local` pour configurer la connexion à la base de données :

```env
DATABASE_URL=postgresql://user:password@127.0.0.1:5432/guide_nouvel_arrivant
```

### Configuration de l'envoi d'emails

Pour la réinitialisation de mot de passe et les notifications :

```env
MAILER_DSN=smtp://user:pass@smtp.example.com:port
```

### Configuration de l'environnement

- Développement : `APP_ENV=dev`
- Production : `APP_ENV=prod`

## 🖥️ Utilisation

### Accès à l'application

- **URL** : [`http://localhost:8000`](http://localhost:8000) (en développement)
- **Administration** : [`http://localhost:8000/admin`](http://localhost:8000/admin)
- **Compagnon** : [`http://localhost:8000/dashboard`](http://localhost:8000/dashboard)

### Comptes par défaut (avec les fixtures)

- **Administrateur** : <admin@example.com> / password
- **Tuteur** : <mentor@example.com> / password
- **Compagnon** : <user@example.com> / password

### Fonctionnalités principales

1. **Connexion et inscription**
   - Les utilisateurs peuvent se connecter avec leur email et mot de passe
   - Fonctionnalité de réinitialisation de mot de passe

2. **Tableau de bord**
   - Vue d'ensemble des carnets de compagnonnage
   - Statistiques de progression

3. **Gestion des actions**
   - Validation des actions par les compagnons
   - Commentaires et validation par les tuteurs

4. **Export PDF**
   - Génération d'un document PDF du carnet de compagnonnage

## 🧪 Tests

### Exécution des tests

```bash
php bin/console doctrine:database:create --env=test
php bin/console doctrine:migrations:migrate --env=test
php bin/phpunit
```

### Types de tests

- **Tests unitaires** : Testent les composants individuels
- **Tests fonctionnels** : Testent les fonctionnalités complètes

## 📦 Déploiement

### Préparation pour la production

1. Optimiser l'autoloader

```bash
composer install --no-dev --optimize-autoloader
```

1. Compiler les assets

```bash
npm run build
```

1. Vider le cache

```bash
APP_ENV=prod APP_DEBUG=0 php bin/console cache:clear
```

### Vérifications de sécurité

```bash
php bin/console security:check
```

## 🔧 Maintenance

### Mise à jour de l'application

```bash
git pull
composer install
npm install
npm run build
php bin/console doctrine:migrations:migrate
php bin/console cache:clear
```

### Commandes utiles

- **Vérification de la qualité du code** : `composer app:code-quality`
- **Réinitialisation de la base de données** : `composer db-reset`
- **Exécution des tests** : `composer app:tests`

## 👥 Contribution

### Processus de contribution

1. Forker le projet
2. Créer une branche pour votre fonctionnalité (`git checkout -b feature/amazing-feature`)
3. Commiter vos changements (`git commit -m 'Add some amazing feature'`)
4. Pousser la branche (`git push origin feature/amazing-feature`)
5. Ouvrir une Pull Request

### Standards de code

- Suivre les standards PSR-12
- Documenter le code avec des commentaires PHPDoc
- Écrire des tests pour les nouvelles fonctionnalités

## 📄 Licence

Ce projet est sous licence propriétaire. Tous droits réservés.

### Prérequis

- PHP >= 8.1
- Composer
- Symfony CLI
- Docker (facultatif, pour l'environnement de développement)

### Étapes

1. Clonez le dépôt :

   ```bash
   git clone https://github.com/votre-repo.git
   cd votre-repo
   ```

2. Installez les dépendances :

   ```bash
   composer install
   ```

3. Configurez l'environnement :
   Copiez le fichier `.env` :

   ```bash
   cp .env .env.local
   ```

   Mettez à jour les variables (base de données, etc.).
4. Appliquez les migrations de la base de données :

   ```bash
   php bin/console doctrine:migrations:migrate
   ```

5. Lancez le serveur local :

   ```bash
   symfony serve
   ```

Pour utiliser Docker, référez-vous à la documentation spécifique dans [docs/DOCKER.md](docs/DOCKER.md).

---

## 📄 Documentation

- **[Tableau de Bord du Projet](docs/BOARD.md)** : Suivez l'avancement des fonctionnalités et des tâches.
- **[Documentation de la Base de Données](docs/DATABASE.md)** : Structure et diagrammes des tables utilisées.
- **[Documentation Technique](docs/TECHNICAL.md)** : Guide pour contributeurs et développeurs.

---

## 👥 Contributeurs

- **Papoel** - Développeur principal et mainteneur du projet.

---

## 🔗 Ressources

- [Documentation Symfony](https://symfony.com/doc/current/index.html)
- [Docker Documentation](https://docs.docker.com/)
- [PHPStan Documentation](https://phpstan.org/)
- [Composer Documentation](https://getcomposer.org/doc/)

---

Merci de contribuer à ce projet ! 🚀 N'hésitez pas à ouvrir des issues ou des pull requests pour proposer des améliorations ou signaler des problèmes.
