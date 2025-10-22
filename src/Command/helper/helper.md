# 📚 Guide d'utilisation - Commande de restauration de données

> **Commande générée par IA avec Claude Sonnet 4.5**

## 📖 Description

La commande `app:restore-data` permet de restaurer des données depuis des exports JSON générés par phpMyAdmin. Elle gère automatiquement :

- ✅ La lecture des fichiers JSON depuis le dossier `src/Command/helper/files/`
- ✅ La détection automatique des dépendances entre tables
- ✅ L'ordre optimal d'insertion (tri topologique)
- ✅ La génération de nouveaux UUIDs
- ✅ Le maintien des relations entre entités (clés étrangères)
- ✅ Un mode simulation (`--dry-run`)

---

## 🚀 Utilisation

### Syntaxe de base

```bash
php bin/console app:restore-data <fichiers...> [--dry-run]
```

### Exemples

#### 1. Restauration simple avec détection automatique

```bash
php bin/console app:restore-data modules.json
```

La commande détecte automatiquement que `modules.json` dépend de `themes.json` et charge ce dernier automatiquement.

#### 2. Restauration avec ordre explicite

```bash
php bin/console app:restore-data themes_cam.json modules_cam.json
```

Vous spécifiez explicitement les fichiers et leur ordre (utile pour des noms de fichiers personnalisés).

#### 3. Mode simulation (dry-run)

```bash
php bin/console app:restore-data modules.json --dry-run
```

Simule l'import sans persister en base de données. Parfait pour vérifier que tout fonctionne correctement.

#### 4. Restauration de plusieurs datasets

```bash
# Dataset CAM (Chargé d'Affaires)
php bin/console app:restore-data themes_cam.json modules_cam.json

# Dataset APPRENTIS
php bin/console app:restore-data themes_apprentis.json modules_apprentis.json
```

---

## 📁 Structure des fichiers JSON

### Format attendu (export phpMyAdmin)

```json
[
    {
        "type": "header",
        "version": "5.2.3",
        "comment": "Export to JSON plugin for phpMyAdmin"
    },
    {
        "type": "database",
        "name": "db_compagnonnage"
    },
    {
        "type": "table",
        "name": "themes",
        "database": "db_compagnonnage",
        "data": [
            {
                "id": "0x019a0cda1ff57588b0d65a97e2dbcac0",
                "title": "Mon thème",
                "description": null
            }
        ]
    }
]
```

### Emplacement des fichiers

Tous les fichiers JSON doivent être placés dans :

```text
src/Command/helper/files/
```

### Convention de nommage

- Pour la détection automatique : `<table>.json` (ex: `themes.json`, `modules.json`)
- Pour des noms personnalisés : `<table>_<suffixe>.json` (ex: `themes_cam.json`, `modules_apprentis.json`)

---

## 🔍 Fonctionnement interne

### 1. Détection des dépendances

La commande analyse les champs se terminant par `_id` pour détecter les dépendances :

```text
theme_id → dépend de la table "themes"
user_id  → dépend de la table "users"
```

### 2. Ordre d'insertion

Un tri topologique détermine l'ordre optimal :

```text
themes (aucune dépendance)
  ↓
modules (dépend de themes)
  ↓
actions (dépend de modules)
```

### 3. Gestion des UUIDs

- Les anciens UUIDs sont remplacés par de nouveaux (UUID v7)
- Un cache maintient les correspondances pour résoudre les relations
- Les relations sont reconstituées automatiquement

### 4. Résolution des relations

```php
// Dans modules.json
"theme_id": "0x019a0cda1ff57588b0d65a97e2dbcac0"

// La commande :
// 1. Trouve le theme dans le cache d'entités
// 2. Appelle setTheme($themeEntity) sur le module
// 3. Persist l'entité avec la relation correcte
```

---

## ⚠️ Résolution de problèmes

### Erreur : `Column 'theme_id' cannot be null`

**Cause** : Les themes parents n'ont pas été chargés avant les modules.

**Solution** : Spécifiez explicitement les fichiers dans le bon ordre :

```bash
php bin/console app:restore-data themes_cam.json modules_cam.json
```

### Erreur : `Le fichier "xxx.json" n'existe pas`

**Cause** : Le fichier n'est pas dans le dossier `files/`.

**Solution** : Vérifiez que le fichier est bien dans :

```text
src/Command/helper/files/xxx.json
```

### Warning : `ID parent non trouvé`

**Cause** : La table parente n'a pas été traitée ou le fichier est manquant.

**Solution** :

1. Vérifiez que le fichier de la table parente existe
2. Ajoutez-le explicitement à la commande
3. Placez-le avant les tables dépendantes

### Erreur : `Structure JSON invalide`

**Cause** : Le format JSON n'est pas celui attendu (export phpMyAdmin).

**Solution** : Vérifiez que le JSON contient :

- Un objet `type: "header"`
- Un objet `type: "database"`
- Un objet `type: "table"` avec un champ `data`

---

## 📊 Exemples de sortie

### Mode simulation réussi

```text
Restauration des données depuis JSON
====================================

Fichier chargé : themes_cam.json (table: themes, 3 enregistrements, dépendances: aucune)
Fichier chargé : modules_cam.json (table: modules, 46 enregistrements, dépendances: themes)

Ordre d'insertion déterminé :
-----------------------------
 * themes
 * modules

Traitement de la table : themes
-------------------------------
Fichier source : themes_cam.json
Entité : App\Entity\Theme
Nombre d'enregistrements : 3
  → CA - Connaissance de la réglementation et des prescriptions
  → CA - Connaissance des outils SDIN
  → CA - Préparation et réalisation des activités

[NOTE] 3 enregistrement(s) simulé(s)

[OK] Simulation terminée. Relancez sans --dry-run pour persister les données.
```

### Mode réel réussi

```text
[OK] 3 enregistrement(s) persisté(s)
[OK] 46 enregistrement(s) persisté(s)
[OK] Toutes les données ont été restaurées avec succès !
```

---

## 🛠️ Cas d'usage

### 1. Récupération après suppression accidentelle

```bash
# Simulation pour vérifier
php bin/console app:restore-data themes.json modules.json --dry-run

# Restauration réelle
php bin/console app:restore-data themes.json modules.json
```

### 2. Migration de données entre environnements

```bash
# Export depuis production (phpMyAdmin)
# → Télécharger themes.json et modules.json

# Import en développement
php bin/console app:restore-data themes.json modules.json
```

### 3. Initialisation d'un nouveau site

```bash
# Importer toutes les données de base
php bin/console app:restore-data \
  themes_cam.json modules_cam.json \
  themes_apprentis.json modules_apprentis.json
```

---

## 📝 Notes importantes

1. **UUIDs** : Les anciens UUIDs sont **remplacés** par de nouveaux. Les relations sont maintenues mais les IDs changent.

2. **Données existantes** : La commande **n'écrase pas** les données existantes. Elle crée de nouveaux enregistrements.

3. **Transactions** : Chaque table est persistée indépendamment avec un `flush()` après traitement.

4. **Cache** : Les entités créées sont mises en cache pour résoudre les relations. Le cache est vidé à la fin de la commande.

5. **Performance** : Pour de gros volumes, la commande peut être lente. Utilisez `--dry-run` pour estimer le temps.

---

## 🔧 Maintenance

### Ajouter le support d'une nouvelle table

1. Créez l'entité Doctrine correspondante
2. Exportez les données depuis phpMyAdmin au format JSON
3. Placez le fichier dans `src/Command/helper/files/`
4. Lancez la commande

La détection automatique s'occupera du reste !

### Convention de nommage des setters

La commande attend des setters standards :

- `theme_id` → `setTheme()` (pas `setThemeId`)
- `user_id` → `setUser()` (pas `setUserId`)

Pour les champs normaux :

- `title` → `setTitle()`
- `description` → `setDescription()`

---

## 📞 Support

En cas de problème :

1. Lancez avec `--dry-run` pour identifier l'erreur
2. Vérifiez les warnings dans la sortie console
3. Consultez les logs Symfony si nécessaire
4. Vérifiez que les entités ont les bons setters

---

**Dernière mise à jour** : 22 octobre 2025
