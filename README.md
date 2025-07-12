# 📘 GNU - Guide du Nouvel Arrivant

![Version](https://img.shields.io/badge/version-1.0.5-blue.svg)
![PHP](https://img.shields.io/badge/PHP-8.3-purple.svg)
![Symfony](https://img.shields.io/badge/Symfony-7.3-black.svg)
![License](https://img.shields.io/badge/license-proprietary-red.svg)
[![Quality Analysis](https://github.com/Papoel/GuideNouvelArrivant/actions/workflows/quality.yaml/badge.svg)](https://github.com/Papoel/GuideNouvelArrivant/actions/workflows/quality.yaml) [![Security Audit](https://github.com/Papoel/GuideNouvelArrivant/actions/workflows/audit.yml/badge.svg)](https://github.com/Papoel/GuideNouvelArrivant/actions/workflows/audit.yml)

**GNU - Guide du Nouvel Arrivant** est une application web conçue pour faciliter l'intégration des nouveaux arrivants au sein d'une entreprise en leur proposant un livret de compagnonnage interactif. Ce livret permet aux tuteurs (mentors) de suivre, valider et commenter les actions des nouveaux membres, tout en offrant une expérience utilisateur optimisée et moderne.

---

## 📑 Table des Matières

- [✨ Vision du Projet](#-vision-du-projet)
- [🎯 Objectifs](#-objectifs)
- [⚙️ Fonctionnalités](#️-fonctionnalités)
- [🏗️ Architecture Technique](#️-architecture-technique)
- [🚀 Installation](#-installation)
- [🖥️ Configuration](#️-configuration)
- [🧪 Tests](#-tests)
- [📊 Capitalisation du REX](#-capitalisation-du-rex)
- [📄 Documentation](#-documentation)
- [👥 Contributeurs](#-contributeurs)

---

## ✨ Vision du Projet

Application de livret de compagnonnage moderne, intuitive et collaborative, qui sert de référence pour l'intégration des nouveaux arrivants et améliore leur expérience dès leur arrivée dans l'entreprise.

## 🎯 Objectifs

Le projet GNA vise à :

- Faciliter l'intégration des nouveaux collaborateurs
- Structurer le processus d'onboarding avec un suivi précis
- Permettre aux tuteurs de suivre et valider les progrès des nouveaux arrivants
- Offrir une plateforme collaborative entre apprenants et mentors
- Capitaliser sur les retours d'expérience pour améliorer continuellement le processus

## ⚙️ Fonctionnalités

### Interface utilisateur moderne

- Design responsive avec une palette de couleurs professionnelle
- Tableaux de bord personnalisés selon les rôles (apprenant, mentor, administrateur)
- Visualisation des progrès avec des graphiques et indicateurs
- Interface optimisée pour l'impression PDF

### Gestion des utilisateurs

- Système d'authentification sécurisé
- Gestion des rôles (apprenant, mentor, administrateur)
- Profils utilisateurs détaillés
- Organisation hiérarchique des services avec pôles et délégués

### Livret de compagnonnage

- Structure hiérarchique : Thèmes > Modules > Actions
- Suivi des actions à accomplir par les nouveaux arrivants
- Validation et commentaires par les mentors
- Génération de rapports de progression

### Capitalisation du REX

- Système de retour d'expérience (feedback)
- Catégorisation des retours pour analyse
- Workflow de revue par les managers
- Synthèse des REX pour amélioration continue

## 🏗️ Architecture Technique

### Technologies utilisées

- **Backend** : PHP 8.3, Symfony 7.3
- **Frontend** : Twig, Bootstrap, JavaScript
- **Base de données** : Doctrine ORM
- **Sécurité** : Symfony Security Bundle
- **Tests** : PHPUnit
- **Qualité de code** : PHP-CS-Fixer, PHPStan

### Structure du projet

```text
GuideNouvelArrivant/
├── assets/           # Fichiers frontend (JS, CSS)
├── bin/             # Commandes Symfony
├── config/          # Configuration de l'application
├── migrations/       # Migrations de base de données
├── public/          # Point d'entrée web
├── src/             # Code source PHP
│   ├── Command/      # Commandes personnalisées
│   ├── Controller/   # Contrôleurs de l'application
│   ├── Entity/       # Entités Doctrine
│   ├── Form/         # Formulaires
│   ├── Repository/   # Repositories Doctrine
│   ├── Security/     # Classes liées à la sécurité
│   ├── Services/     # Services métier
│   └── Twig/         # Extensions Twig
├── templates/       # Templates Twig
├── tests/           # Tests automatiques
└── translations/    # Fichiers de traduction
```

### Modèle de données

Le modèle de données s'articule autour des entités principales suivantes :

- **User** : Utilisateurs du système (apprenants, mentors, administrateurs)
- **Service** : Structure organisationnelle avec gestion de pôles et délégués
- **Logbook** : Carnet de compagnonnage associé à un utilisateur
- **Theme** : Thèmes regroupant des modules
- **Module** : Modules contenant des actions à réaliser
- **Action** : Actions à accomplir par les compagnons
- **Feedback** : Retours d'expérience (REX) des utilisateurs

## 🚀 Installation

### Prérequis

- PHP 8.3 ou supérieur
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
```

1. Configurer l'environnement

```bash
cp .env .env.local
# Modifier les variables d'environnement dans .env.local
```

1. Créer la base de données

```bash
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
```

1. Charger les fixtures (données de démo)

```bash
php bin/console doctrine:fixtures:load
```

1. Lancer le serveur de développement

```bash
symfony server:start
```

## 🖥️ Configuration

### Configuration de la base de données

Modifier le fichier `.env.local` pour configurer la connexion à la base de données :

```env
DATABASE_URL="mysql://user:password@127.0.0.1:3306/gna_db"
```

### Configuration des emails

Pour configurer l'envoi d'emails :

```env
MAILER_DSN=smtp://user:pass@smtp.example.com:port
```

## 🧪 Tests

Le projet utilise PHPUnit pour les tests. Pour exécuter les tests :

```bash
php bin/phpunit
```

Pour exécuter les tests avec couverture de code :

```bash
php bin/phpunit --coverage-html coverage
```

## 📊 Capitalisation du REX

La fonctionnalité "Capitalisation du REX" (Retour d'Expérience) permet :

- Aux utilisateurs de soumettre des retours d'expérience catégorisés
- Aux managers de consulter, traiter et commenter ces retours
- De générer des synthèses pour l'amélioration continue

Le workflow est le suivant :
1. Soumission d'un REX par un utilisateur
2. Revue et commentaire par un manager
3. Synthèse et analyse des REX

## 📄 Documentation

La documentation complète du projet est disponible dans le répertoire `docs/`.

## 👥 Contributeurs

- [Papoel](https://github.com/Papoel) - Créateur et mainteneur principal



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
