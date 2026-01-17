# Tableau de Bord du Projet GuideNouvelArrivant

## Vision du Projet

Application de carnet de compagnonnage numérique pour faciliter l'intégration des nouveaux arrivants. Les nouveaux arrivants disposent d'un carnet structuré avec des actions à réaliser, validées et commentées par leurs mentors.

## Objectifs

1. Fournir un carnet structuré (Thèmes → Modules → Actions) pour les nouveaux arrivants
2. Permettre aux mentors de valider et commenter les actions
3. Offrir un tableau de bord avec suivi de progression
4. Gérer les modèles de carnets par métier (LogbookTemplate)
5. Capitaliser les retours d'expérience (Feedback/REX)

## État du Projet

### Fonctionnalités Implémentées

- [x] Authentification et gestion des rôles (ROLE_USER, ROLE_ADMIN, ROLE_SUPER_ADMIN)
- [x] Gestion des utilisateurs avec mentor assigné
- [x] Structure hiérarchique : Logbook → Theme → Module → Action
- [x] Modèles de carnets (LogbookTemplate) par métier
- [x] Validation des actions par l'agent et le mentor
- [x] Tableau de bord avec progression des carnets
- [x] Interface d'administration (EasyAdmin)
- [x] Génération PDF des carnets
- [x] Système de retours d'expérience (Feedback)
- [x] Emails automatiques de rappel (Scheduler)
- [x] Gestion des services et spécialités

### Fonctionnalités En Cours

- [ ] Amélioration des rapports statistiques
- [ ] Export des données

## Stack Technique

| Composant | Version |
|-----------|---------|
| PHP | 8.4+ |
| Symfony | 7.3 |
| MySQL/MariaDB | 10.6+ |
| PHPUnit | 12.x |
| EasyAdmin | 4.x |
| Asset Mapper | Symfony 7.3 |

## Architecture

```
src/
├── Command/           # Commandes console (import, cron, scheduler)
├── Controller/        # Contrôleurs (Admin, App, Security)
├── Entity/            # Entités Doctrine (11 entités)
├── Enum/              # Énumérations (JobEnum, SpecialityEnum, UserRole)
├── EventSubscriber/   # Écouteurs d'événements
├── Form/              # Formulaires
├── Repository/        # Repositories Doctrine
├── Security/          # Authentification et autorisation
├── Services/          # Services métier (Dashboard, Logbook, Mail, etc.)
└── Twig/              # Extensions Twig
```

## Contributeurs

- **Papoel** - Développeur principal

## Ressources

- [Documentation Symfony](https://symfony.com/doc/current/index.html)
- [EasyAdmin Documentation](https://symfony.com/bundles/EasyAdminBundle/current/index.html)
- [PHPStan Documentation](https://phpstan.org/)
- [Asset Mapper](https://symfony.com/doc/current/frontend/asset_mapper.html)
