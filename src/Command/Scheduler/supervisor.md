# Mise en place de Supervisor pour Symfony Messenger (GuideNouvelArrivant)

 <style>
    .note {
        background: #e8f3ff; /* bleu très clair */
        border-left: 4px solid #3d5f9e;
        color: #1e3a8a; /* bleu plus sombre */
        padding: 0.75rem 1rem;
        border-radius: 8px;
        font-size: 0.95rem;
        line-height: 1.4;
        box-shadow: 0 2px 6px rgba(0,0,0,0.05);
    }

    .link {
        font-family: "Fira Code", Consolas, monospace; /* police lisible */
        font-size: 0.9rem;
        color: #1e3a8a; /* bleu profond */
        padding: 0.15rem 0.4rem;
        border-radius: 4px;
        border: 1px solid #cbd5e1; /* gris léger */
        white-space: nowrap;
        overflow-x: auto; /* si chemin trop long */
        max-width: 100%;
        text-decoration: none; /* garde propre si utilisé comme <a> */
        cursor: default;
    }

    .warn {
        background-color: #fff3cd;          /* Couleur de fond similaire à Bootstrap warning */
        border-left: 4px solid #ffcc00;     /* Bande colorée à gauche */
        padding: 1rem 1.25rem;              /* Plus d’espace interne pour aérer le texte */
        border-radius: 0.375rem;            /* Arrondi léger comme Tailwind */
        color: #856404;                     /* Texte sombre pour un bon contraste */
        font-weight: 500;                    /* Texte un peu plus visible */
        line-height: 1.5;                    /* Espacement entre les lignes */
        box-shadow: 0 1px 3px rgba(0,0,0,0.1); /* Légère ombre pour détacher l’alerte */
    }

    .warn b {
        font-weight: 600;                    /* Accentuation des parties importantes */
    }

    .warn code {
        background-color: rgba(27,31,35,0.05);
        padding: 0.15rem 0.3rem;
        border-radius: 4px;
        font-size: 0.875rem;
    }

.ok {
    background: #e9f7ef;
    border-left: 4px solid #28a745;
    padding: 0.75rem 1rem;
        border-radius: 6px;
    }

    .bash {
        margin-bottom: 1rem;
        background: #1e1e2e;
        color: #e5e5e5;
        font-family: "Fira Code", Consolas, monospace;
        font-size: 0.9rem;
        line-height: 1.3;   /* réduit la hauteur */
        padding: 0.75rem;   /* moins de marge interne */
        border-radius: 8px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.25);
        overflow-x: auto;
        white-space: pre-wrap;
    }

    .bash::before {
        content: "bash";
        display: block;
        font-size: 10px;
        color: #9ca3af;
        margin-bottom: 1px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .bash code {
        margin: 2px 0; /* réduit l’espace entre les lignes */
    }

    .bash code::before {
        content: "$ ";
        color: #22c55e;
    }

    code, pre {
        font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
    }

    pre {
        background: #f6f8fa;
        padding: 12px;
        border-radius: 6px;
        overflow-x: auto;
    }

    h1, h2, h3 {
        color:rgb(138, 142, 151);
    }

    .small {
        font-size: 0.9rem;
        color: #6c757d;
    }
 </style>

 Ce tutoriel vous guide pas à pas – même si vous n’avez jamais utilisé Supervisor – pour garantir que vos workers Symfony Messenger restent toujours actifs (redémarrage automatique en cas de crash, d’arrêt volontaire, ou après un déploiement).

 Il s’appuie sur la documentation officielle Symfony: [Supervisor Configuration](https://symfony.com/doc/current/messenger.html#supervisor-configuration).

 ---

## 🧭 Objectif

- Assurer que les commandes `messenger:consume` tournent en continu en production.
- Relancer automatiquement les workers en cas d’échec ou lors d’un déploiement.
- Gérer proprement l’arrêt (graceful shutdown) pour ne pas perdre de messages.

 ---

## ✅ Pré-requis

- Un serveur Linux (Debian/Ubuntu recommandé).
- PHP CLI installé (ex: `php -v`).
- Votre application Symfony déployée (ex: `/var/www/GuideNouvelArrivant/current`).
- Accès `sudo` pour installer/configurer des services.

 <div class="note">
    <b>Note projet:</b> Dans <span class="link">config/packages/messenger.yaml</span>, le transport principal est <code>async</code> et un transport de secours <code>failed</code> est configuré. Les e-mails et notifications sont routés vers <code>async</code>.<br>
    Votre projet utilise aussi le composant Scheduler de Symfony: vous pouvez consommer un transport <code>scheduler</code> si votre configuration l’exige.
 </div>

 ---

## 1) Identifier les transports à consommer

 Ouvrez `config/packages/messenger.yaml` et repérez les transports à consommer:

 ```yaml
 # extrait typique du projet
 framework:
   messenger:
     failure_transport: failed
     transports:
       async:
         dsn: '%env(MESSENGER_TRANSPORT_DSN)%'
         options:
           use_notify: true
           check_delayed_interval: 60000
         retry_strategy:
           max_retries: 3
           multiplier: 2
       failed: 'doctrine://default?queue_name=failed'
     routing:
       Symfony\Component\Mailer\Messenger\SendEmailMessage: async
       Symfony\Component\Notifier\Message\ChatMessage: async
       Symfony\Component\Notifier\Message\SmsMessage: async
 ```

- Transports à consommer en continu: généralement `async`.
- Transport `failed`: file d’échecs (DLQ), à traiter ponctuellement via `messenger:failed:*`.
- Si vous utilisez Symfony Scheduler via Messenger, vous pouvez aussi consommer `scheduler`:
  - Soit dans la même commande: `messenger:consume async scheduler`
  - Soit via un « program » séparé dans Supervisor (voir plus bas)

 ---

## 2) Installer Supervisor (Debian/Ubuntu)

<div class="bash">
    <code>sudo apt-get update</code>
    <code>sudo apt-get install -y supervisor</code>
</div>

 Vérifier/activer le service:

<div class="bash">
    <code>sudo systemctl status supervisor</code>
    <code>sudo systemctl enable --now supervisor</code>
</div>

 ---

## 3) Créer la configuration Supervisor

 Les configurations résident habituellement dans `/etc/supervisor/conf.d/`.

 Créez le fichier `/etc/supervisor/conf.d/messenger-worker.conf` avec un contenu conforme aux recommandations Symfony:

 ```ini
 ; /etc/supervisor/conf.d/messenger-worker.conf

 [program:messenger-consume]
 ; Utilisez le chemin absolu de php si nécessaire (/usr/bin/php)
 command=php /var/www/GuideNouvelArrivant/current/bin/console messenger:consume async --time-limit=3600
 user=www-data
 numprocs=2
 startsecs=0
 autostart=true
 autorestart=true
 startretries=10
 process_name=%(program_name)s_%(process_num)02d

 ; Journalisation (optionnel mais fortement recommandé)
 stdout_logfile=/var/log/supervisor/messenger-consume.log
 stdout_logfile_maxbytes=10MB
 stdout_logfile_backups=5
 redirect_stderr=true
 ```

- `command`: adaptez le chemin vers votre `bin/console` et les transports (ex: `async scheduler`).
- `--time-limit=3600`: recycle le process toutes les 1h (bon pour la stabilité mémoire).
- `user`: exécutez sous l’utilisateur adéquat (`www-data`, `ubuntu`, etc.).
- `numprocs=2`: lance 2 workers identiques pour paralléliser le traitement.
- `startretries=10`: augmentez si vos services (DB/Redis) mettent plus de temps à démarrer lors des déploiements, pour éviter l’état FATAL.

 <div class="warn">
    <b>Important:</b> Pendant un déploiement, la base de données ou un service peut être indisponible, provoquant un échec de démarrage du worker. <b>Augmentez</b> <code>startretries</code> pour couvrir l’indisponibilité maximale attendue; sinon, Supervisor peut passer le program en état <b>FATAL</b> et ne plus redémarrer.
 </div>

### Variante A — Consommer plusieurs transports dans un seul program

 ```ini
 command=/usr/bin/php /var/www/GuideNouvelArrivant/current/bin/console messenger:consume async scheduler --time-limit=3600
 ```

### Variante B — Deux programs séparés (isoler async et scheduler)

 ```ini
 ; /etc/supervisor/conf.d/messenger-async.conf
 [program:messenger-async]
 command=/usr/bin/php /var/www/GuideNouvelArrivant/current/bin/console messenger:consume async --time-limit=3600
 user=www-data
 numprocs=2
 startsecs=0
 autostart=true
 autorestart=true
 startretries=10
 process_name=%(program_name)s_%(process_num)02d
 stdout_logfile=/var/log/supervisor/messenger-async.log
 redirect_stderr=true

 ; /etc/supervisor/conf.d/messenger-scheduler.conf
 [program:messenger-scheduler]
 command=/usr/bin/php /var/www/GuideNouvelArrivant/current/bin/console messenger:consume scheduler --time-limit=3600
 user=www-data
 numprocs=1
 startsecs=0
 autostart=true
 autorestart=true
 startretries=10
 process_name=%(program_name)s_%(process_num)02d
 stdout_logfile=/var/log/supervisor/messenger-scheduler.log
 redirect_stderr=true
 ```

 <div class="note">
 <b>Attention (Scheduler de test):</b> Votre handler <code>SendDailyValidationRecallHandler</code> contient une tâche de test toutes les minutes. <b>Désactivez-la en production</b> (commentaire lignes 37–39) pour éviter un envoi intempestif.
 </div>

 ---

## 4) Activer/Relancer via supervisorctl

 Après création/modification des fichiers de conf:

 ```bash
 sudo supervisorctl reread   # relit les nouvelles configurations
 sudo supervisorctl update   # applique les changements et démarre/relance les programs
 sudo supervisorctl start messenger-consume:*     # lance tous les process du program
 # (ou)
 sudo supervisorctl start messenger-async:*
 sudo supervisorctl start messenger-scheduler:*
 ```

 Commandes quotidiennes utiles:

 ```bash
 sudo supervisorctl status
 sudo supervisorctl stop messenger-consume:*
 sudo supervisorctl start messenger-consume:*
 sudo supervisorctl restart messenger-consume:*
 sudo supervisorctl tail -f messenger-consume_00   # suivre les logs du process 00
 ```

 ---

## 5) Arrêt propre (Graceful shutdown)

 Si l’extension PHP [PCNTL](https://www.php.net/manual/book.pcntl.php) est disponible (généralement avec `php-cli`), les workers traitent les signaux POSIX pour terminer proprement après le message en cours.

 Vous pouvez configurer les signaux dans `config/packages/messenger.yaml`:

 ```yaml
 framework:
   messenger:
     stop_worker_on_signals:
       - SIGTERM
       - SIGINT
       - SIGUSR1
 ```

- Pour demander l’arrêt propre via Symfony (et laisser Supervisor relancer):

 ```bash
 php bin/console messenger:stop-workers
 ```

 ---

## 6) Cas Redis: nom de consommateur unique par worker

 Si vous utilisez le transport Redis, chaque worker doit avoir un nom de consommateur unique pour éviter le traitement multiple du même message.

 Dans Supervisor:

 ```ini
 [program:messenger-consume]
 ...
 environment=MESSENGER_CONSUMER_NAME="%(program_name)s_%(process_num)02d"
 ```

 Dans `config/packages/messenger.yaml`:

 ```yaml
 framework:
   messenger:
     transports:
       async:
         dsn: '%env(MESSENGER_TRANSPORT_DSN)%'
         options:
           consumer: '%env(MESSENGER_CONSUMER_NAME)%'
 ```

 ---

## 7) Bonnes pratiques de déploiement

- **Redémarrer les workers après un déploiement** pour charger le nouveau code:

 <div class="bash">
    <code>sudo supervisorctl restart messenger-consume:*</code>
</div>

- **Surveiller <code>startretries</code>**: ajustez pour couvrir la fenêtre d’indisponibilité maximale (DB/Redis).
- **Journaliser**: activez les logs Supervisor et surveillez-les en production.
- **Limiter le temps/mémoire**: ajoutez si nécessaire `--memory-limit=256M` à la commande `messenger:consume`.

 ---

## 8) Dépannage (Troubleshooting)

- **php introuvable**: utilisez le chemin absolu (ex: `/usr/bin/php`).
- **Permissions**: assurez-vous que l’utilisateur `user=` a accès au projet, aux logs, à PHP, etc.
- **Variables d’environnement**: si besoin, passez-les via `environment=`:

<div class="bash">
    <code>environment=APP_ENV="prod",APP_DEBUG="0"</code>
</div>

- **Transports indisponibles**: vérifiez `MESSENGER_TRANSPORT_DSN` et l’accessibilité (DB/Redis/AMQP/SQS…).
- **État FATAL**: augmentez `startretries` et utilisez `reread` + `update` après corrections.
- **Messages en échec** (DLQ):

<div class="bash">
    <code>php bin/console messenger:failed:show</code>
    <code>php bin/console messenger:failed:retry --force</code>
</div>

 ---

## 9) Checklist rapide

- [ ] `async` (et éventuellement `scheduler`) identifiés et testés localement.
- [ ] Supervisor installé et service actif.
- [ ] Fichier `.conf` créé dans `/etc/supervisor/conf.d/`.
- [ ] Chemins, utilisateur `user=`, et logs configurés.
- [ ] `supervisorctl reread && update` exécutés.
- [ ] `status` OK et logs sans erreurs.
- [ ] Déploiement: `restart` effectué après mise à jour du code.

 ---

## 10) Références

- Symfony – Supervisor Configuration: <https://symfony.com/doc/current/messenger.html#supervisor-configuration>
- Supervisor (officiel): <http://supervisord.org/>

 <div class="ok small">
 Ce guide est adapté au projet <b>GuideNouvelArrivant</b> (transports: <code>async</code>, <code>failed</code>, et éventuellement <code>scheduler</code>). Adaptez les chemins, l’utilisateur système et le nombre de processus à votre environnement serveur.
 </div>
