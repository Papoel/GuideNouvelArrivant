# Tutoriel — Notifications Telegram avec Dependabot

## Étape 1 — Créer le bot Telegram

Dans Telegram, ouvrez une conversation avec @BotFather.

Envoyez `/newbot`, choisissez un nom et un username (se terminant par `...bot`).

BotFather renvoie un token du type `123456789:AAEx...`. C'est votre `TELEGRAM_BOT_TOKEN`.

---

## Étape 2 — Récupérer le TELEGRAM_CHAT_ID

Envoyez n'importe quel message à votre nouveau bot (sinon il ne peut pas vous écrire).

Ouvrez dans un navigateur :

```
https://api.telegram.org/bot<VOTRE_TOKEN>/getUpdates
```

Cherchez `"chat":{"id":123456789,...}`. Ce nombre est votre `TELEGRAM_CHAT_ID`.

> Cliquez sur votre lien de messagerie `t.me/yourbot` pour ouvrir Telegram, envoyez-vous un message puis ensuite raffraichissez le navigateur, vous-y verrez quelque chose comme :

```json
{
  {
  "ok": true,
  "result": [
    {
      "update_id": 630866052,
      "message": {
        "message_id": 1,
        "from": {
          "id": 2645825482,
          "is_bot": false,
          "first_name": "Myster",
          "last_name": "Paps",
          "language_code": "fr"
        },
        "chat": {
          "id": 2645825482,
          ...
        }
      }
    }
  ]
}
```

> Dans cet exemple, votre `TELEGRAM_CHAT_ID` est `2645825482`.

---

## Étape 3 — Enregistrer les secrets (au bon endroit)

Dans votre dépôt GitHub :

Settings → Secrets and variables → **Dependabot** (⚠️ pas "Actions").

Créez deux secrets via "New repository secret" :

- `TELEGRAM_BOT_TOKEN` = le token de BotFather
- `TELEGRAM_CHAT_ID` = l'id récupéré

---

## Étape 4 — Pousser les fichiers

- `.github/dependabot.yml` (déjà créé ✅)
- `.github/workflows/dependabot-telegram.yml` (avec la correction ci-dessus)

Commitez et poussez sur la branche par défaut.

---

## Étape 5 — Tester

Onglet **Insights** → **Dependency graph** → **Dependabot** → **Check for updates** pour forcer un scan.

Dès qu'une PR Dependabot s'ouvre, l'onglet **Actions** montre le workflow et vous recevez le message Telegram.

Test rapide hors GitHub (vérifie token + chat_id) :

```bash
curl -s -X POST \
  "https://api.telegram.org/bot<TOKEN>/sendMessage" \
  --data-urlencode "chat_id=<CHAT_ID>" \
  --data-urlencode "text=Test ✅"
```

---

## Limites à garder en tête

Seules les PRs de mise à jour de version déclenchent ce workflow. Les alertes de sécurité Dependabot (CVE) n'ouvrent pas forcément de PR immédiate ; pour les suivre, il faudrait un workflow distinct basé sur l'API GitHub Security Advisories.

Réutilisabilité multi-projets : ce workflow Telegram est copiable tel quel dans tous vos repos (contrairement à `dependabot.yml`). Il suffit de recréer les 2 secrets Dependabot dans chaque dépôt.

---

## Récapitulatif

- **Workflow Telegram** : prêt, mais à corriger (injection + encodage) — nécessite le mode Code.
- **Point critique** : créer les secrets dans *Dependabot secrets*, pas *Actions secrets*.
- **Tutoriel** : bot via @BotFather → chat_id via `getUpdates` → secrets → push → test.
