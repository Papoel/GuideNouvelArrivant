# Rapport d'Audit RGAA 4.1

## Application : Guide du Nouvel Arrivant (GNA)

**Date de l'audit :** 17 janvier 2026 (mise à jour)  
**Version du référentiel :** RGAA 4.1  
**Auditeur :** Audit automatisé  
**Révision :** 2 - Après corrections initiales

---

## Sommaire

1. [Synthèse](#1-synthèse)
2. [Contexte et périmètre](#2-contexte-et-périmètre)
3. [Corrections appliquées](#3-corrections-appliquées)
4. [Résultats par thématique](#4-résultats-par-thématique)
5. [Non-conformités restantes](#5-non-conformités-restantes)
6. [Recommandations prioritaires](#6-recommandations-prioritaires)
7. [Plan d'action](#7-plan-daction)

---

## 1. Synthèse

### Score global estimé : **72%** de conformité (+7 points)

| Thématique | Conforme | Non conforme | Non applicable |
|------------|----------|--------------|----------------|
| Images | ✅ | 0 | 0 |
| Cadres | ✅ | 0 | 0 |
| Couleurs | ⚠️ Partiel | 2 | 0 |
| Multimédia | N/A | 0 | ✅ |
| Tableaux | ⚠️ Partiel | 2 | 0 |
| Liens | ⚠️ Partiel | 2 | 0 |
| Scripts | ⚠️ Partiel | 2 | 0 |
| Éléments obligatoires | ⚠️ Partiel | 2 | 0 |
| Structuration | ⚠️ Partiel | 2 | 0 |
| Présentation | ⚠️ Partiel | 2 | 0 |
| Formulaires | ⚠️ Partiel | 3 | 0 |
| Navigation | ❌ | 4 | 0 |
| Consultation | ⚠️ Partiel | 2 | 0 |

---

## 2. Contexte et périmètre

### 2.1 Description de l'application

L'application **Guide du Nouvel Arrivant (GNA)** est une plateforme web Symfony destinée à accompagner l'intégration des nouveaux collaborateurs EDF. Elle comprend :

- ~~Une page d'accueil publique (`homepage.html.twig`)~~ → **Supprimée**
- Un système d'authentification (`login.html.twig`)
- Un tableau de bord utilisateur (`dashboard.html.twig`)
- Une interface d'administration (EasyAdmin)
- Des fonctionnalités de gestion de carnets de compagnonnage
- Un système de feedback (REX)

### 2.2 Technologies utilisées

- **Framework** : Symfony 7.x
- **Frontend** : Bootstrap 5, Twig, JavaScript vanilla
- **CSS** : CSS personnalisé, Bootstrap Icons
- **Base de données** : MySQL/PostgreSQL

### 2.3 Pages auditées

| Page | URL | Priorité |
|------|-----|----------|
| Page d'accueil | `/` | Haute |
| Connexion | `/login` | Haute |
| Tableau de bord | `/dashboard/{nni}` | Haute |
| Profil utilisateur | `/profile/settings` | Moyenne |
| Guide technique | `/pages/guide-technique` | Moyenne |
| Administration | `/admin` | Moyenne |

---

## 3. Corrections appliquées

### ✅ Corrections validées lors de cette révision

| Fichier | Correction | Critère RGAA |
|---------|------------|--------------|
| `_dashboardHeader.html.twig` | Ajout de `alt="Logo EDF"` sur l'image du header | 1.1 ✅ |
| `_dashboardHeader.html.twig` | Ajout de `aria-label="Toggle sidebar"` sur le bouton sidebar | 7.1 ✅ |
| `_dashboardHeader.html.twig` | Suppression du lien `href="#"` "Besoin d'aide ?" (commenté) | 6.1 ✅ |
| `login.html.twig` | Ajout de `aria-label="Toggle password visibility"` | 7.1 ✅ |
| `dashboard.html.twig` | Suppression du bouton "back-to-top" avec `href="#"` | 6.1, 6.2 ✅ |
| `homepage.html.twig` | Page supprimée de l'application | N/A ✅ |

### ⚠️ Nouveaux problèmes détectés

| Fichier | Problème | Critère RGAA |
|---------|----------|--------------|
| `_dashboardHeader.html.twig:11` | `role="Hide/Show sidebar"` n'est pas un rôle ARIA valide | 7.1 |
| `_dashboardHeader.html.twig:21` | Typo `dropdown-tooggle` au lieu de `dropdown-toggle` | N/A (bug) |

---

## 4. Résultats par thématique

### 4.1 Images (Thématique 1)

#### ✅ Conformités

- Toutes les images ont un attribut `alt` défini
- Les logos EDF ont des alternatives textuelles appropriées (`alt="Logo EDF"`, `alt="EDF Logo"`)
- La page homepage avec les images problématiques a été supprimée

#### ❌ Non-conformités

**Aucune non-conformité détectée** ✅

---

### 4.2 Couleurs (Thématique 3)

#### ✅ Conformités

- Utilisation de classes Bootstrap avec contrastes acceptables
- Variables CSS définies pour les couleurs principales

#### ❌ Non-conformités

| Critère | Fichier | Description |
|---------|---------|-------------|
| 3.2 | `app.css` | Contraste insuffisant pour `.text-muted` (#899bbd sur fond blanc) - Ratio estimé : 3.5:1 (minimum requis : 4.5:1) |
| 3.2 | `login.css` | Couleur `--login-text-muted: #94a3b8` peut avoir un contraste insuffisant |
| 3.3 | `theme.css` | Couleur de focus sur `.accordion-button:focus` avec `box-shadow: none` - Indicateur visuel insuffisant |

**Impact** : Difficultés de lecture pour les personnes malvoyantes ou daltoniens.

---

### 4.3 Tableaux (Thématique 5)

#### ⚠️ Conformités partielles

- Tableaux de données présents dans l'interface admin
- Utilisation de `<table>` sémantique

#### ❌ Non-conformités

| Critère | Fichier | Description |
|---------|---------|-------------|
| 5.1 | Multiples fichiers | Tableaux de données sans `<caption>` ni titre associé |
| 5.6 | `mentor/index.html.twig` | Tableaux complexes sans en-têtes `<th scope="col/row">` appropriés |

---

### 4.4 Liens (Thématique 6)

#### ✅ Conformités

- La plupart des liens ont des intitulés explicites
- Utilisation d'icônes avec texte associé
- ~~Lien "back-to-top" supprimé~~ ✅
- ~~Lien "Besoin d'aide ?" commenté~~ ✅

#### ❌ Non-conformités restantes

| Critère | Fichier | Ligne | Description |
|---------|---------|-------|-------------|
| 6.1 | `login.html.twig` | 108 | Lien "Demandez un accès" avec `href="#"` |
| 6.1 | `guide_technique.html.twig` | 34 | Lien "RDU: D454220027677" avec `href="#"` |

**Impact** : Navigation confuse pour les utilisateurs de technologies d'assistance.

---

### 4.5 Scripts (Thématique 7)

#### ✅ Conformités

- Utilisation d'`aria-expanded` sur les boutons de collapse
- Attributs `aria-controls` présents sur les éléments interactifs
- ~~Bouton toggle password avec `aria-label`~~ ✅
- ~~Bouton toggle sidebar avec `aria-label`~~ ✅

#### ❌ Non-conformités restantes

| Critère | Fichier | Description |
|---------|---------|-------------|
| 7.1 | `_dashboardHeader.html.twig` | Attribut `role="Hide/Show sidebar"` invalide (doit être `role="button"`) |
| 7.4 | Multiples fichiers | Changements de contexte sans avertissement (modals) |

---

### 4.6 Éléments obligatoires (Thématique 8)

#### ✅ Conformités

- `<!DOCTYPE html>` présent dans `base.html.twig`
- Attribut `lang="fr"` défini sur `<html>`
- Encodage UTF-8 déclaré
- Viewport meta tag présent

#### ❌ Non-conformités

| Critère | Fichier | Description |
|---------|---------|-------------|
| 8.6 | `base.html.twig` | Titre de page générique : `EDF - {% block title %}{% endblock %}` |
| 8.9 | Multiples fichiers | Balises utilisées à des fins de présentation (`<i>` pour icônes sans contexte) |

---

### 4.7 Structuration de l'information (Thématique 9)

#### ✅ Conformités

- Utilisation de `<header>`, `<main>`, `<footer>`, `<nav>`, `<aside>`
- Hiérarchie des titres généralement respectée

#### ❌ Non-conformités

| Critère | Fichier | Description |
|---------|---------|-------------|
| 9.1 | `homepage.html.twig` | Saut de niveau de titre (h1 → h3 sans h2 intermédiaire) |
| 9.2 | `_dashboardUserIndex.html.twig` | Structure de document non linéaire |
| 9.3 | `_dashboardAside.html.twig` | Listes de navigation sans `<ul>` dans certains cas |

---

### 4.8 Présentation de l'information (Thématique 10)

#### ✅ Conformités

- Site responsive avec media queries
- Utilisation de classes Bootstrap pour la mise en page

#### ❌ Non-conformités

| Critère | Fichier | Description |
|---------|---------|-------------|
| 10.7 | `app.css` | Focus invisible sur certains éléments : `.btn-close:focus { box-shadow: none; }` |
| 10.8 | `theme.css` | `.accordion-button:focus { box-shadow: none; }` - Suppression du focus visible |

**Impact** : Navigation au clavier difficile pour les utilisateurs.

---

### 4.9 Formulaires (Thématique 11)

#### ✅ Conformités

- Utilisation de `form_label()` et `form_widget()` Twig
- Labels associés aux champs via Symfony Form
- Messages d'erreur affichés avec `form_errors()`

#### ❌ Non-conformités restantes

| Critère | Fichier | Ligne | Description |
|---------|---------|-------|-------------|
| 11.1 | `login.html.twig` | 59-68 | Champ input sans label visible par défaut (label positionné en CSS) |
| 11.2 | `login.html.twig` | 88 | Checkbox "Se souvenir de moi" - Label non explicitement associé avec `for` |
| 11.13 | Multiples fichiers | Champs obligatoires sans indication visuelle systématique (astérisque) |

---

### 4.10 Navigation (Thématique 12)

#### ❌ Non-conformités majeures

| Critère | Fichier | Description |
|---------|---------|-------------|
| 12.1 | `base.html.twig` | **Absence de liens d'évitement (skip links)** |
| 12.7 | Multiples fichiers | Absence de fil d'Ariane cohérent sur toutes les pages |
| 12.8 | Multiples fichiers | Ordre de tabulation non optimisé |
| 12.11 | Multiples fichiers | Contenus additionnels (modals) difficiles à fermer au clavier |

**Impact critique** : Les utilisateurs naviguant au clavier ne peuvent pas accéder rapidement au contenu principal.

---

### 4.11 Consultation (Thématique 13)

#### ⚠️ Conformités partielles

- Pas de limite de temps sur la plupart des fonctionnalités
- Messages flash avec possibilité de fermeture

#### ❌ Non-conformités

| Critère | Fichier | Description |
|---------|---------|-------------|
| 13.1 | Multiples fichiers | Rafraîchissement automatique dans certains scripts sans contrôle utilisateur |
| 13.8 | `login.css`, `app.css` | Animations sans respect de `prefers-reduced-motion` |

---

## 5. Non-conformités restantes

### 5.1 Résumé des non-conformités critiques

| Priorité | Description | Impact |
|----------|-------------|--------|
| 🔴 Critique | Absence de liens d'évitement | Bloquant pour navigation clavier |
| 🔴 Critique | Focus invisible sur certains éléments | Bloquant pour navigation clavier |
| ~~🟠 Majeur~~ | ~~Images sans alternative textuelle~~ | ~~Inaccessible aux lecteurs d'écran~~ ✅ Corrigé |
| 🟠 Majeur | Contrastes insuffisants | Difficultés de lecture |
| 🟡 Mineur | Titres non hiérarchisés | Compréhension réduite |

### 5.2 Fichiers les plus impactés

1. **`base.html.twig`** - Template de base sans skip links
2. **`login.html.twig`** - Formulaire avec quelques problèmes d'accessibilité
3. ~~**`_dashboardHeader.html.twig`** - Image sans alt, boutons sans labels~~ ✅ Corrigé (reste le rôle ARIA invalide)
4. **`app.css` / `theme.css`** - Styles supprimant les indicateurs de focus

---

## 6. Recommandations prioritaires

### 6.1 Priorité 1 - Bloquant (à corriger immédiatement)

#### 1. Ajouter des liens d'évitement

**Fichier :** `templates/base.html.twig`

```html
<body class="{% block body_class %}default{% endblock %}">
    <!-- Liens d'évitement à ajouter -->
    <nav class="skip-links" aria-label="Accès rapide">
        <a href="#main-content" class="skip-link">Aller au contenu principal</a>
        <a href="#main-navigation" class="skip-link">Aller à la navigation</a>
    </nav>
    {% block body %}{% endblock %}
</body>
```

**CSS à ajouter :**

```css
.skip-links {
    position: absolute;
    top: 0;
    left: 0;
    z-index: 9999;
}

.skip-link {
    position: absolute;
    left: -9999px;
    top: auto;
    width: 1px;
    height: 1px;
    overflow: hidden;
    background: #fff;
    color: #000;
    padding: 1rem;
    text-decoration: none;
    font-weight: bold;
}

.skip-link:focus {
    position: static;
    width: auto;
    height: auto;
}
```

#### 2. Restaurer les indicateurs de focus

**Fichier :** `assets/styles/theme.css`

```css
/* AVANT */
.accordion-button:focus {
    outline: 0;
    box-shadow: none;
}

/* APRÈS */
.accordion-button:focus {
    outline: 2px solid #4154f1;
    outline-offset: 2px;
}
```

**Fichier :** `assets/styles/app.css`

```css
/* AVANT */
.btn-close:focus {
    outline: none;
    box-shadow: 0 0 0 0.2rem rgba(217, 83, 79, 0.5);
}

/* APRÈS - Garder un indicateur visible */
.btn-close:focus {
    outline: 2px solid #0d6efd;
    outline-offset: 2px;
    box-shadow: none;
}
```

### 6.2 Priorité 2 - Majeur (à corriger sous 2 semaines)

#### 3. Corriger les alternatives textuelles des images

**Fichier :** `templates/app/dashboard/_dashboardHeader.html.twig`

```twig
<!-- AVANT -->
<img src="{{ asset('images/logos/edf.png') }}" alt="">

<!-- APRÈS -->
<img src="{{ asset('images/logos/edf.png') }}" alt="Logo EDF - Retour au tableau de bord">
```

**Fichier :** `templates/app/home/homepage.html.twig`

```twig
<!-- AVANT -->
<img src="{{ asset('images/hero-illustration.svg') }}" alt="Illustration" class="img-fluid floating">

<!-- APRÈS -->
<img src="{{ asset('images/hero-illustration.svg') }}" alt="Illustration montrant le parcours d'intégration d'un nouvel arrivant" class="img-fluid floating">
```

#### 4. Améliorer les contrastes

**Fichier :** `assets/styles/app.css`

```css
/* Améliorer le contraste pour les textes atténués */
.text-muted {
    color: #5a6778 !important; /* Ratio > 4.5:1 */
}
```

#### 5. Ajouter aria-label aux boutons sans texte

**Fichier :** `templates/app/dashboard/_dashboardHeader.html.twig`

```twig
<!-- AVANT -->
<i id="sidebar-toggle" class="bi bi-list toggle-sidebar-btn"></i>

<!-- APRÈS -->
<button id="sidebar-toggle" 
        class="toggle-sidebar-btn" 
        aria-label="Ouvrir/fermer le menu latéral"
        aria-expanded="false">
    <i class="bi bi-list" aria-hidden="true"></i>
</button>
```

### 6.3 Priorité 3 - Mineur (à corriger sous 1 mois)

#### 6. Respecter la préférence de mouvement réduit

**Fichier :** `assets/styles/login.css`

```css
@media (prefers-reduced-motion: reduce) {
    *,
    *::before,
    *::after {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
    }
    
    .background {
        animation: none;
    }
    
    .background span {
        animation: none;
    }
}
```

#### 7. Ajouter des captions aux tableaux

```twig
<table class="table">
    <caption class="visually-hidden">Liste des collaborateurs et leur progression</caption>
    <thead>
        <tr>
            <th scope="col">Nom</th>
            <th scope="col">Progression</th>
        </tr>
    </thead>
    ...
</table>
```

---

## 7. Plan d'action

### Phase 1 : Corrections critiques (Semaine 1)

| Action | Fichier | Responsable | Statut |
|--------|---------|-------------|--------|
| Ajouter skip links | `base.html.twig` | Dev Front | ⬜ À faire |
| Restaurer focus visible | `theme.css`, `app.css` | Dev Front | ⬜ À faire |
| Corriger alt images header | `_dashboardHeader.html.twig` | Dev Front | ✅ Fait |
| Corriger aria-label toggle password | `login.html.twig` | Dev Front | ✅ Fait |
| Corriger aria-label toggle sidebar | `_dashboardHeader.html.twig` | Dev Front | ✅ Fait |
| Corriger role ARIA invalide | `_dashboardHeader.html.twig` | Dev Front | ⬜ À faire |
| Corriger typo dropdown-tooggle | `_dashboardHeader.html.twig` | Dev Front | ⬜ À faire |

### Phase 2 : Corrections majeures (Semaines 2-3)

| Action | Fichier | Responsable | Statut |
|--------|---------|-------------|--------|
| Améliorer contrastes | CSS global | Dev Front | ⬜ À faire |
| Ajouter aria-labels | Templates interactifs | Dev Front | ⬜ À faire |
| Corriger formulaire login | `login.html.twig` | Dev Front | ⬜ À faire |

### Phase 3 : Corrections mineures (Semaine 4)

| Action | Fichier | Responsable | Statut |
|--------|---------|-------------|--------|
| prefers-reduced-motion | CSS animations | Dev Front | ⬜ À faire |
| Captions tableaux | Templates admin | Dev Front | ⬜ À faire |
| Hiérarchie titres | Templates pages | Dev Front | ⬜ À faire |

---

## Annexes

### A. Outils de test recommandés

- **WAVE** : Extension navigateur pour audit rapide
- **axe DevTools** : Tests automatisés détaillés
- **Lighthouse** : Audit Performance + Accessibilité
- **NVDA/VoiceOver** : Tests avec lecteurs d'écran
- **Contrast Checker** : Vérification des ratios de contraste

### B. Ressources

- [RGAA 4.1 - Critères et tests](https://accessibilite.numerique.gouv.fr/methode/criteres-et-tests/)
- [WCAG 2.1 Guidelines](https://www.w3.org/TR/WCAG21/)
- [MDN Web Accessibility](https://developer.mozilla.org/fr/docs/Web/Accessibility)

### C. Glossaire

| Terme | Définition |
|-------|------------|
| **RGAA** | Référentiel Général d'Amélioration de l'Accessibilité |
| **WCAG** | Web Content Accessibility Guidelines |
| **Skip link** | Lien d'évitement permettant d'accéder directement au contenu |
| **Focus visible** | Indicateur visuel montrant l'élément actuellement sélectionné |
| **Screen reader** | Lecteur d'écran (NVDA, VoiceOver, JAWS) |

---

**Document généré le :** 17 janvier 2026  
**Prochaine révision prévue :** Après implémentation des corrections Phase 1
