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

L'objectif est de concevoir une application de livret de compagnonnage moderne, intuitive et collaborative, qui serve de référence pour l'intégration des nouveaux arrivants et améliore leur expérience dès leur arrivée dans l'entreprise.

---

## 🎯 Objectifs

1. Fournir un livret structuré avec des actions adaptées aux besoins des nouveaux arrivants.
2. Permettre aux tuteurs de suivre le progrès, valider ou commenter les actions des compagnons.
3. Offrir une interface utilisateur moderne, simple et conviviale.
4. Garantir une intégration fluide dans l’écosystème existant grâce à des technologies robustes.

---

## ⚙️ Fonctionnalités

- 📋 **Livret d'intégration** : Liste d'actions spécifiques à réaliser par les nouveaux arrivants.
- ✅ **Validation des actions** : Les tuteurs peuvent valider ou commenter les actions directement dans l'application.
- 📊 **Suivi des progrès** : Affichage des statistiques et des avancées des compagnons.
- 🛠️ **Administration simplifiée** : Gestion facile des livrables, des utilisateurs et des rôles.

---

## 🚀 Installation

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
