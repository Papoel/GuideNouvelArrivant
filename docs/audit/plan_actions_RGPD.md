# Plan d'Actions RGPD - GuideNouvelArrivant

**Date** : Janvier 2026  
**Basé sur** : Audit RGPD + Réponses du responsable projet

---

## Synthèse des réponses collectées

| Question | Réponse | Impact |
|----------|---------|--------|
| DPO notifié | ❌ Non | **Action urgente requise** |
| Hébergement | Hostinger (Cloud) | Vérifier localisation UE |
| CSE informé | ✅ Oui | Conforme |
| Conservation données | Après archivage physique signé | À formaliser |
| Anonymisation REX | Non (amélioration continue) | OK si durée définie |
| Export données | ✅ PDF souhaité | À implémenter |
| Type suppression | Définitive | Déjà en place |
| SSO EDF | Souhaité mais non prioritaire | Phase 2 |
| AIPD | Pertinente à réaliser | À planifier avec DPO |

---

## 🔴 Actions Critiques (Semaine 1-2)

### Action 1 : Notifier le DPO EDF

**Priorité** : CRITIQUE  
**Responsable** : Chef de projet  
**Délai** : Immédiat

**À faire** :
1. Identifier le DPO EDF de votre entité
2. Envoyer un email de déclaration avec :
   - Nom de l'application
   - Finalités du traitement
   - Catégories de données traitées
   - Base légale (exécution contrat de travail + intérêt légitime)
   - Durées de conservation prévues
   - Mesures de sécurité en place

**Modèle d'email** :
```
Objet : Déclaration d'un traitement de données personnelles - Application GuideNouvelArrivant

Madame, Monsieur le DPO,

Je souhaite porter à votre connaissance l'existence d'une application web 
interne "GuideNouvelArrivant" destinée au suivi de l'intégration des nouveaux 
collaborateurs.

Finalités du traitement :
- Gestion des parcours d'intégration (carnets de bord)
- Suivi de la progression des nouveaux arrivants
- Capitalisation des retours d'expérience

Catégories de données :
- Identité (nom, prénom, email professionnel, NNI)
- Données professionnelles (métier, spécialité, service, date d'embauche)
- Données de suivi (progression, commentaires, validations)

Base légale : Exécution du contrat de travail (Art. 6.1.b RGPD)

Durée de conservation : Jusqu'à archivage physique du carnet signé

Hébergement : Hostinger (à préciser la localisation)

Je reste à votre disposition pour tout complément d'information 
ou pour planifier une AIPD si vous le jugez nécessaire.

Cordialement,
[Votre nom]
```

---

### Action 2 : Vérifier la localisation Hostinger

**Priorité** : CRITIQUE  
**Responsable** : Dev/Admin  
**Délai** : 48h

**À vérifier** :
1. Localisation des serveurs (UE obligatoire, ou clauses contractuelles types si hors UE)
2. Certifications Hostinger (ISO 27001, etc.)
3. Contrat de sous-traitance RGPD (DPA - Data Processing Agreement)

**Actions** :
- [ ] Se connecter au panel Hostinger
- [ ] Vérifier la région du serveur
- [ ] Télécharger le DPA Hostinger
- [ ] Si hors UE : évaluer migration ou clauses contractuelles

---

### Action 3 : Sécuriser APP_SECRET

**Priorité** : CRITIQUE  
**Responsable** : Dev  
**Délai** : Immédiat  
**Effort** : 30 min

**Problème** : Le secret `616a033f08986e85118732aea7237b8a` est exposé dans `.env`

**Solution** : Utiliser les secrets Symfony

```bash
# Générer un nouveau secret
php bin/console secrets:generate-keys

# Définir le secret en production
php bin/console secrets:set APP_SECRET --env=prod
```

**Modifier `.env`** :
```env
# Remplacer
APP_SECRET=616a033f08986e85118732aea7237b8a
# Par
APP_SECRET=%env(APP_SECRET)%
```

**En production** : Définir la variable d'environnement sur Hostinger

---

### Action 4 : Créer la page Politique de Confidentialité

**Priorité** : CRITIQUE  
**Responsable** : Dev + Juridique  
**Délai** : 1 semaine  
**Effort** : 2 jours

Voir fichier : `templates/pages/privacy_policy.html.twig` (à créer)

**Contenu minimal** :
1. Identité du responsable de traitement
2. Finalités et bases légales
3. Catégories de données
4. Destinataires
5. Durées de conservation
6. Droits des personnes
7. Contact DPO
8. Droit de réclamation CNIL

---

## 🟠 Actions Prioritaires (Semaines 2-4)

### Action 5 : Implémenter l'export PDF des données personnelles

**Priorité** : HAUTE  
**Responsable** : Dev  
**Effort** : 3 jours

**Fonctionnalité** : Permettre à chaque utilisateur de télécharger ses données au format PDF

**Données à exporter** :
- Informations personnelles (nom, prénom, email, NNI)
- Informations professionnelles (métier, spécialité, service)
- Historique des carnets et validations
- Feedbacks soumis
- Dates de création/modification

**Implémentation suggérée** :
1. Créer un service `UserDataExportService`
2. Utiliser DomPDF (déjà installé) pour générer le PDF
3. Ajouter un bouton "Exporter mes données" dans le profil utilisateur
4. Route : `GET /profile/export-data`

---

### Action 6 : Définir et documenter les durées de conservation

**Priorité** : HAUTE  
**Responsable** : Chef projet + RH  
**Effort** : 1 jour

**Proposition** :

| Donnée | Durée | Déclencheur suppression |
|--------|-------|------------------------|
| Compte utilisateur actif | Durée du contrat | Départ entreprise |
| Carnet de bord | Jusqu'à archivage physique signé | Confirmation archivage |
| Feedbacks | 5 ans | Date de création |
| Logs de connexion | 1 an | Date du log |
| Tokens reset password | 1 heure | Création |

---

### Action 7 : Ajouter les mentions légales

**Priorité** : HAUTE  
**Responsable** : Dev  
**Effort** : 0.5 jour

**Route** : `/mentions-legales`

**Contenu** :
- Éditeur (EDF - entité précise)
- Hébergeur (Hostinger + adresse)
- Directeur de publication
- Contact

---

### Action 8 : Implémenter le rate limiting

**Priorité** : HAUTE  
**Responsable** : Dev  
**Effort** : 1 jour

**Protection contre** : Brute force sur le formulaire de login

```bash
composer require symfony/rate-limiter
```

**Configuration** : Voir section implémentation ci-dessous

---

## 🟡 Actions Moyennes (Mois 2-3)

### Action 9 : Créer un audit trail

**Priorité** : MOYENNE  
**Effort** : 3 jours

**Objectif** : Tracer les actions sensibles (connexions, modifications, suppressions)

**Événements à logger** :
- Connexion/déconnexion
- Modification de profil
- Validation de module
- Suppression de compte
- Export de données

---

### Action 10 : Procédure de purge automatique

**Priorité** : MOYENNE  
**Effort** : 2 jours

**Objectif** : Supprimer automatiquement les données selon les durées définies

**Commande Symfony** : `app:purge-expired-data`

---

### Action 11 : Préparer l'intégration SSO

**Priorité** : MOYENNE (Phase 2)  
**Effort** : 5 jours

**Documentation à préparer** :
- Spécifications techniques pour la DSI
- Protocole souhaité (SAML2, OAuth2/OIDC)
- Mapping des attributs utilisateur

---

### Action 12 : Réaliser l'AIPD

**Priorité** : MOYENNE  
**Responsable** : Chef projet + DPO  
**Effort** : 3-5 jours

**Modèle CNIL** : https://www.cnil.fr/fr/outil-pia-telechargez-et-installez-le-logiciel-de-la-cnil

**Sections** :
1. Description du traitement
2. Évaluation de la nécessité et proportionnalité
3. Mesures de protection des droits
4. Analyse des risques
5. Plan d'action

---

## 🟢 Actions à planifier (Mois 3-6)

### Action 13 : Formation utilisateurs

Sensibiliser les utilisateurs aux bonnes pratiques RGPD

### Action 14 : Revue annuelle

Planifier une revue annuelle de conformité RGPD

### Action 15 : Tests de sécurité

Prévoir un audit de sécurité / pentest

---

## Checklist de suivi

### Semaine 1
- [ ] Contacter le DPO EDF
- [ ] Vérifier localisation Hostinger
- [ ] Sécuriser APP_SECRET
- [ ] Commencer la politique de confidentialité

### Semaine 2
- [ ] Finaliser politique de confidentialité
- [ ] Ajouter mentions légales
- [ ] Commencer export PDF

### Semaine 3-4
- [ ] Finaliser export PDF
- [ ] Documenter durées de conservation
- [ ] Implémenter rate limiting

### Mois 2
- [ ] Audit trail
- [ ] Procédure de purge
- [ ] Contacter DPO pour AIPD

---

## Ressources utiles

- **CNIL** : https://www.cnil.fr/fr/rgpd-par-ou-commencer
- **Registre des traitements** : https://www.cnil.fr/fr/RGDP-le-registre-des-activites-de-traitement
- **AIPD** : https://www.cnil.fr/fr/ce-quil-faut-savoir-sur-lanalyse-dimpact-relative-la-protection-des-donnees-aipd
- **Modèle politique confidentialité** : https://www.cnil.fr/fr/modele-de-mentions-rgpd

---

## Contacts suggérés

| Rôle | Action |
|------|--------|
| DPO EDF | Déclaration + AIPD |
| DSI EDF | Intégration SSO |
| RH | Validation durées conservation |
| Juridique | Validation mentions légales |
