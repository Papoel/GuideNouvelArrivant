# Audit RGPD - Application GuideNouvelArrivant

**Date de l'audit** : Janvier 2026  
**Version de l'application** : Symfony 7.x  
**Type d'application** : Application d'entreprise (intranet)  
**Responsable de traitement** : [À compléter - EDF]

---

## 1. Synthèse Exécutive

### 1.1 Contexte
L'application **GuideNouvelArrivant** est un outil interne destiné à accompagner l'intégration des nouveaux collaborateurs au sein de l'entreprise. Elle gère des carnets de bord, des modules de formation, et des retours d'expérience.

### 1.2 Niveau de conformité actuel

| Critère | Statut | Priorité |
|---------|--------|----------|
| Registre des traitements | ⚠️ À créer | **Haute** |
| Base légale identifiée | ⚠️ À formaliser | **Haute** |
| Droits des personnes | ⚠️ Partiellement implémenté | **Haute** |
| Sécurité des données | ✅ Bon niveau | Moyenne |
| Minimisation des données | ✅ Respectée | Basse |
| Durée de conservation | ⚠️ Non définie | **Haute** |
| Mentions légales / Politique de confidentialité | ❌ Absentes | **Critique** |
| DPO notifié | ❓ À vérifier | **Haute** |

---

## 2. Inventaire des Données Personnelles

### 2.1 Entité `User` (Utilisateurs)

| Champ | Type de donnée | Sensibilité | Finalité |
|-------|----------------|-------------|----------|
| `id` | UUID | Faible | Identifiant technique |
| `firstname` | Prénom | **Moyenne** | Identification |
| `lastname` | Nom | **Moyenne** | Identification |
| `email` | Email professionnel | **Moyenne** | Authentification, communication |
| `password` | Hash bcrypt/argon2 | **Haute** | Authentification |
| `nni` | Identifiant entreprise | **Moyenne** | Identification unique |
| `roles` | Rôles applicatifs | Faible | Gestion des accès |
| `hiringAt` | Date d'embauche | **Moyenne** | Calcul ancienneté |
| `lastLoginAt` | Dernière connexion | Faible | Audit de sécurité |
| `job` | Métier | Faible | Personnalisation du parcours |
| `speciality` | Spécialité | Faible | Personnalisation du parcours |
| `service` | Service | Faible | Organisation |
| `mentor` | Relation mentor | Faible | Suivi d'intégration |
| `createdAt` | Date création | Faible | Traçabilité |
| `updatedAt` | Date modification | Faible | Traçabilité |

**Remarques** :
- ✅ Les mots de passe sont correctement hashés (bcrypt/argon2)
- ✅ Utilisation d'UUID plutôt que d'ID auto-incrémentés (meilleure pratique)
- ⚠️ Le NNI est un identifiant professionnel sensible

### 2.2 Entité `Feedback` (Retours d'expérience)

| Champ | Type de donnée | Sensibilité | Finalité |
|-------|----------------|-------------|----------|
| `title` | Titre du REX | **Moyenne** | Capitalisation |
| `content` | Contenu détaillé | **Haute** | Capitalisation |
| `category` | Catégorie | Faible | Classification |
| `author` | Auteur (User) | **Moyenne** | Attribution |
| `managerComment` | Commentaire manager | **Moyenne** | Suivi |
| `reviewedBy` | Manager (User) | Faible | Traçabilité |

**Remarques** :
- ⚠️ Le contenu peut contenir des informations personnelles ou sensibles
- ⚠️ Les commentaires peuvent révéler des opinions/appréciations

### 2.3 Entité `Action` (Actions de formation)

| Champ | Type de donnée | Sensibilité | Finalité |
|-------|----------------|-------------|----------|
| `agentComment` | Commentaire agent | **Moyenne** | Suivi progression |
| `agentVisa` | Visa agent | Faible | Validation |
| `mentorComment` | Commentaire mentor | **Moyenne** | Évaluation |
| `mentorVisa` | Visa mentor | Faible | Validation |
| `user` | Utilisateur concerné | **Moyenne** | Attribution |

### 2.4 Entité `ResetPasswordRequest`

| Champ | Type de donnée | Sensibilité | Finalité |
|-------|----------------|-------------|----------|
| `user` | Utilisateur | **Moyenne** | Réinitialisation MDP |
| `hashedToken` | Token hashé | **Haute** | Sécurité |
| `expiresAt` | Date expiration | Faible | Sécurité |

---

## 3. Analyse des Traitements

### 3.1 Traitements identifiés

| Traitement | Base légale suggérée | Durée conservation | Destinataires |
|------------|---------------------|-------------------|---------------|
| Gestion des comptes utilisateurs | Exécution du contrat de travail | Durée du contrat + archivage | RH, Managers |
| Suivi d'intégration (carnets) | Intérêt légitime employeur | 3 ans après fin intégration | Mentors, Managers |
| Capitalisation REX | Intérêt légitime employeur | À définir | Managers, RH |
| Envoi d'emails de rappel | Intérêt légitime employeur | Logs : 1 an | Système |
| Authentification | Exécution du contrat | Durée du compte | N/A |

### 3.2 Transferts de données

| Type de transfert | Destination | Mesures |
|-------------------|-------------|---------|
| Emails SMTP | Serveur mail interne | ⚠️ Vérifier TLS |
| Base de données | MariaDB local | ✅ Interne |

---

## 4. Analyse de Sécurité

### 4.1 Points positifs ✅

1. **Hashage des mots de passe** : Algorithme `auto` (bcrypt/argon2) avec coût adaptatif
2. **Protection CSRF** : Implémentée sur les formulaires d'authentification
3. **Session sécurisée** :
   - `cookie_secure: auto`
   - `cookie_samesite: lax`
4. **Remember Me** : Utilise le `kernel.secret` pour le hashage
5. **Logout sécurisé** :
   - `invalidate_session: true`
   - `clear_site_data: true`
6. **UUID** : Utilisation d'identifiants non prédictibles
7. **Hiérarchie des rôles** : Bien définie et granulaire
8. **Logs** : Rotation des logs en production (30 jours max)

### 4.2 Points à améliorer ⚠️

1. **APP_SECRET exposé dans .env** :
   - Le secret `616a033f08986e85118732aea7237b8a` est visible dans le fichier `.env` versionné
   - **Action** : Utiliser les secrets Symfony ou variables d'environnement serveur

2. **Absence de rate limiting** :
   - Pas de protection contre le brute force sur le login
   - **Action** : Implémenter `symfony/rate-limiter`

3. **Pas d'audit trail dédié** :
   - Les actions sensibles ne sont pas tracées de manière centralisée
   - **Action** : Implémenter un système d'audit des actions utilisateurs

4. **Headers de sécurité** :
   - Vérifier la présence de CSP, X-Frame-Options, etc.
   - **Action** : Configurer NelmioSecurityBundle ou équivalent

---

## 5. Analyse des Droits des Personnes

### 5.1 État actuel

| Droit RGPD | Implémentation | Statut |
|------------|----------------|--------|
| **Accès** (Art. 15) | Non implémenté | ❌ |
| **Rectification** (Art. 16) | Via interface admin | ⚠️ Partiel |
| **Effacement** (Art. 17) | `UserDeletionService` existe | ⚠️ Partiel |
| **Portabilité** (Art. 20) | Non implémenté | ❌ |
| **Opposition** (Art. 21) | Non applicable (contexte RH) | N/A |
| **Limitation** (Art. 18) | Non implémenté | ❌ |

### 5.2 Analyse du service de suppression

Le `UserDeletionService` propose 3 modes :
- `deleteUserOnly()` : Détache les carnets/actions puis supprime l'utilisateur
- `deleteUserAndLogbooks()` : Supprime utilisateur + carnets + thèmes
- `deleteLogbooksOnly()` : Supprime uniquement les carnets

**Points d'attention** :
- ⚠️ Pas de soft delete (suppression définitive)
- ⚠️ Pas d'anonymisation possible
- ⚠️ Pas de journalisation des suppressions

---

## 6. Conformité Documentaire

### 6.1 Documents manquants ❌

1. **Politique de confidentialité** : Aucune page dédiée
2. **Mentions légales** : Absentes
3. **Registre des traitements** : Non documenté
4. **Analyse d'impact (AIPD)** : Non réalisée (peut être requise)
5. **Procédure de gestion des violations** : Non documentée

### 6.2 Information des utilisateurs

- ⚠️ Aucune mention RGPD lors de la création de compte
- ⚠️ Aucune information sur les finalités de traitement
- ⚠️ Pas de consentement explicite collecté

---

## 7. Plan d'Actions Recommandé

### 🔴 Priorité Critique (< 1 mois)

| # | Action | Effort | Responsable |
|---|--------|--------|-------------|
| 1 | Créer une page "Politique de confidentialité" | 2j | Dev + Juridique |
| 2 | Ajouter les mentions légales | 1j | Dev + Juridique |
| 3 | Sécuriser APP_SECRET (secrets Symfony) | 0.5j | Dev |
| 4 | Notifier le DPO de l'existence de l'application | 0.5j | Chef de projet |

### 🟠 Priorité Haute (1-3 mois)

| # | Action | Effort | Responsable |
|---|--------|--------|-------------|
| 5 | Implémenter le droit d'accès (export données personnelles) | 3j | Dev |
| 6 | Implémenter le droit à la portabilité (export JSON/CSV) | 2j | Dev |
| 7 | Compléter le registre des traitements | 2j | DPO + Chef projet |
| 8 | Définir les durées de conservation | 1j | RH + Juridique |
| 9 | Implémenter le rate limiting sur login | 1j | Dev |
| 10 | Ajouter un audit trail pour les actions sensibles | 3j | Dev |

### 🟡 Priorité Moyenne (3-6 mois)

| # | Action | Effort | Responsable |
|---|--------|--------|-------------|
| 11 | Implémenter l'anonymisation des données | 2j | Dev |
| 12 | Créer une procédure de purge automatique | 2j | Dev |
| 13 | Configurer les headers de sécurité (CSP, etc.) | 1j | Dev |
| 14 | Réaliser une AIPD si nécessaire | 5j | DPO |
| 15 | Former les utilisateurs aux bonnes pratiques | 1j | RH |

### 🟢 Priorité Basse (6-12 mois)

| # | Action | Effort | Responsable |
|---|--------|--------|-------------|
| 16 | Implémenter le soft delete | 2j | Dev |
| 17 | Ajouter des tests de sécurité automatisés | 3j | Dev |
| 18 | Mettre en place une revue annuelle RGPD | 1j | DPO |

---

## 8. Questions à Clarifier

Pour affiner les recommandations et assurer une conformité optimale, merci de répondre aux questions suivantes :

### 8.1 Contexte organisationnel

1. **Qui est le DPO (Délégué à la Protection des Données) de l'entreprise ?**
   - L'application a-t-elle été déclarée au DPO ?

2. **Quel est le périmètre géographique des utilisateurs ?**
   - France uniquement ?
   - UE ?
   - International (transferts hors UE) ?

3. **L'application est-elle hébergée en interne ou en cloud ?**
   - Si cloud : quel prestataire ? Localisation des serveurs ?

### 8.2 Base légale

4. **Existe-t-il une note de service ou un accord d'entreprise** encadrant l'utilisation de cet outil ?

5. **Les représentants du personnel (CSE)** ont-ils été informés de l'existence de cet outil de suivi ?

### 8.3 Durées de conservation

6. **Combien de temps souhaitez-vous conserver les données** des utilisateurs après :
   - Fin de la période d'intégration ?
   - Départ de l'entreprise ?

7. **Les retours d'expérience (Feedback)** doivent-ils être anonymisés après un certain temps ?

### 8.4 Fonctionnalités à implémenter

8. **Souhaitez-vous un bandeau de consentement aux cookies** ?
   - Note : Pour une application intranet sans cookies tiers, ce n'est généralement pas obligatoire

9. **Les utilisateurs doivent-ils pouvoir télécharger leurs données** (droit à la portabilité) ?
   - Si oui, quel format préférez-vous ? (PDF, JSON, CSV)

10. **Faut-il implémenter une procédure de désactivation de compte** plutôt que de suppression (soft delete) ?

### 8.5 Sécurité

11. **Existe-t-il une politique de mots de passe entreprise** à respecter ?
    - Longueur minimale ?
    - Complexité requise ?
    - Expiration ?

12. **L'authentification doit-elle être intégrée à un SSO d'entreprise** (LDAP, SAML, OAuth) ?

13. **Des audits de sécurité (pentest)** sont-ils prévus ?

---

## 9. Annexes

### 9.1 Cartographie des données

```
┌─────────────────────────────────────────────────────────────────┐
│                         USER                                     │
│  - Identité (nom, prénom, email, NNI)                           │
│  - Authentification (password, lastLoginAt)                      │
│  - Profil professionnel (job, speciality, service, hiringAt)    │
│  - Relations (mentor)                                            │
└───────────────────────┬─────────────────────────────────────────┘
                        │
          ┌─────────────┼─────────────┐
          │             │             │
          ▼             ▼             ▼
    ┌──────────┐  ┌──────────┐  ┌──────────┐
    │ LOGBOOK  │  │ FEEDBACK │  │  ACTION  │
    │ (Carnet) │  │  (REX)   │  │(Modules) │
    └──────────┘  └──────────┘  └──────────┘
```

### 9.2 Flux de données

```
[Utilisateur] ──login──► [Application] ──auth──► [Session]
                              │
                              ├──► [Base de données MariaDB]
                              │
                              └──► [Serveur SMTP] ──► [Emails]
```

### 9.3 Références réglementaires

- **RGPD** : Règlement (UE) 2016/679
- **Loi Informatique et Libertés** : Loi n° 78-17 modifiée
- **CNIL** : Recommandations pour les outils RH
- **Code du travail** : Art. L1222-4 (information des salariés)

---

## 10. Historique du document

| Version | Date | Auteur | Modifications |
|---------|------|--------|---------------|
| 1.0 | Janvier 2026 | Audit automatisé | Création initiale |

---

**Document généré automatiquement - À valider par le DPO et le service juridique**
