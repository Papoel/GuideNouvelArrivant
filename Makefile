
# eCommerce - Makefile
.PHONY: help install create-error-templates start stop restart build clear-cache test lint fix-cs db-create db-drop db-migration db-migrate db-fixtures db-entity db-reset security docker-up docker-down phpcs phpstan phpmd phpcpd psalm php-metrics before-commit pest import-radiogrammes docker-import-radiogrammes coverage-text coverage-html coverage-filter coverage init-dev pull fix-doc-comments backup-daily backup-daily-force backup-weekly backup-weekly-force backup-monthly backup-monthly-force backup-annual backup-annual-force backup-all backup-all-force backup-list backup-list-daily backup-list-weekly backup-list-monthly backup-list-annual backup-restore backup-restore-latest backup-restore-latest-force backup-restore-force backup-delete backup-delete-daily backup-delete-weekly backup-delete-monthly backup-delete-annual backup-delete-old backup-delete-old-30 backup-delete-daily-force backup-delete-weekly-force backup-delete-monthly-force backup-delete-annual-force backup-delete-old-force backup-help backup-status backup-check-schedule backup-cleanup backup-test

# Définition des variables
ENABLE_PSALM := 0  # Définissez à 0 pour désactiver l'analyse Psalm
ENABLE_PHPMD := 0  # Définissez à 0 pour désactiver l'analyse PHPMD

# Colors
GREEN = \033[0;32m
YELLOW = \033[0;33m
RED = \033[0;31m
NC = \033[0m

# Variables
SYMFONY = symfony
CONSOLE = $(SYMFONY) console
BIN = php bin/console
COMPOSER = composer
PHP = php
NPM = npm
DOCKER_COMPOSE = docker compose
DOCKER_RUN = docker run
PHPQA = jakzal/phpqa:php8.4
PHPQA_RUN = $(DOCKER_RUN) --init --rm -v $(PWD):/project -w /project $(PHPQA)
PEST = ./vendor/bin/pest

# Default target
.DEFAULT_GOAL = help

## —— 📚 Help ——————————————————————————————————————————————
help: ## Affiche cette aide
	@grep -E '(^[a-zA-Z0-9_-]+:.*?##.*$$)|(^##)' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}{printf "\033[32m%-30s\033[0m %s\n", $$1, $$2}' | sed -e 's/\[32m##/[33m/'

## —— 🔧 Installation ——————————————————————————————————————
install: ## Installe les dépendances du projet
	@echo "$(GREEN)Installation des dépendances...$(NC)"
	$(COMPOSER) install
	@if [ -f package.json ]; then \
		echo "$(GREEN)Installation des dépendances Node.js...$(NC)"; \
		$(NPM) install; \
	fi

.PHONY: create-error-templates

create-error-templates:
	@echo "📁 Création des templates d'erreur personnalisés..."
	@mkdir -p templates/bundles/TwigBundle/Exception
	@mkdir -p templates/partials/error

	@echo "{% block content %}" > templates/bundles/TwigBundle/Exception/error.html.twig
	@echo "    {% include('partials/error/_errors.html.twig') %}" >> templates/bundles/TwigBundle/Exception/error.html.twig
	@echo "{% endblock %}" >> templates/bundles/TwigBundle/Exception/error.html.twig

	@printf "%s\n" "\
    <!DOCTYPE html>\
    <html lang=\"fr\">\
        <head>\
            <meta charset=\"UTF-8\">\
            <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\
            <title>Erreur {{ exception.statusCode }} - {{ commerce_name }}</title>\
            <style>\
                * {-webkit-box-sizing: border-box; box-sizing: border-box;}\
                body {padding: 0; margin: 0;}\
                #error {position: relative; height: 100vh; background: #030005;}\
                #error .error-wrapper {position: absolute; left: 50%; top: 50%; transform: translate(-50%, -50%);}\
                .error-wrapper {max-width: 767px; width: 100%; line-height: 1.4; text-align: center;}\
                .error-wrapper .error-key {position: relative; height: 180px; margin-bottom: 20px; z-index: -1;}\
                .error-wrapper .error-key h1 {font-family: 'Montserrat', sans-serif; position: absolute; left: 50%; top: 50%; transform: translate(-50%, -50%); font-size: 224px; font-weight: 900; margin: 0 0 0 -12px; color: #030005; text-transform: uppercase; text-shadow: -1px -1px 0px #edf2f2, 1px 1px 0px #ff005a; letter-spacing: -20px;}\
                .error-wrapper .error-key h2 {font-family: 'Montserrat', sans-serif; position: absolute; left: 0; right: 0; top: 110px; font-size: 14px; font-weight: 400; color: #fff; text-transform: uppercase; text-shadow: 0px 2px 0px #8400ff; letter-spacing: 8px; margin: 0;}\
                .error-wrapper a {font-family: 'Montserrat', sans-serif; display: inline-block; text-transform: uppercase; color: #ff005a; text-decoration: none; border: 2px solid; background: transparent; padding: 10px 40px; font-size: 14px; font-weight: 700; transition: 0.2s all;}\
                .error-wrapper a:hover {color: #edf2f2;}\
                @media only screen and (max-width: 767px) {.error-wrapper .error-key h2 {font-size: 24px;}}\
                @media only screen and (max-width: 480px) {.error-wrapper .error-key h1 {font-size: 182px;}}\
            </style>\
        </head>\
        <body>\
            <div id=\"error\">\
                <div class=\"error-wrapper\">\
                    <div class=\"error-key\">\
                        <h1>{{ exception.statusCode }}</h1>\
                        <h2 class=\"h6\">{{ exception.statusText|trans }}</h2>\
                    </div>\
                    <a href=\"{{ path('app_home') }}\">Retour à l'accueil</a>\
                </div>\
            </div>\
        </body>\
    </html>\
    " > templates/partials/error/_errors.html.twig

	@echo "✅ Templates créés avec contenu."



## —— 🌱 Initialisation de l'environnement ————————————————————
init-dev: ## Initialise l'environnement de développement (fichier .env.local et base de données)
	@echo "$(GREEN)Initialisation de l'environnement de développement...$(NC)"
	@echo "$(YELLOW)Création du fichier .env.local...$(NC)"
	@if [ ! -f .env.local ]; then \
		cp .env .env.local; \
		sed -i '' -e 's/postgresql:\/\/app:!ChangeMe!@127.0.0.1:5432\/app?serverVersion=16\&charset=utf8/mysql:\/\/user:password@127.0.0.1:3306\/ecommerce?serverVersion=mariadb-10.6.12\&charset=utf8mb4/g' .env.local; \
		sed -i '' -e 's/MAILER_DSN=null:\/\/null/MAILER_DSN=smtp:\/\/127.0.0.1:1025/g' .env.local; \
		echo "$(GREEN)✓ Fichier .env.local créé avec succès.$(NC)"; \
	else \
		echo "$(YELLOW)⚠ Le fichier .env.local existe déjà. Création ignorée.$(NC)"; \
	fi
	@echo "$(YELLOW)Démarrage des conteneurs Docker...$(NC)"
	$(DOCKER_COMPOSE) -f compose.yaml up -d
	@echo "$(YELLOW)Attente du démarrage de la base de données (5 secondes)...$(NC)"
	sleep 5
	@echo "$(YELLOW)Création de la base de données...$(NC)"
	$(CONSOLE) doctrine:database:create --if-not-exists
	@echo "$(GREEN)✓ Environnement de développement initialisé avec succès!$(NC)"
	@echo "$(GREEN)✓ Base de données: ecommerce$(NC)"
	@echo "$(GREEN)✓ Accès phpMyAdmin: http://localhost:8085 (bootstrap theme)$(NC)"
	@echo "$(GREEN)✓ Serveur de mail: http://localhost:8081$(NC)"

## —— 🚀 Serveur de développement ——————————————————————————
start: ## Démarre le serveur de développement Symfony
	$(SYMFONY) serve -d
	$(MAKE) docker-up

stop: ## Arrête le serveur de développement Symfony
	$(SYMFONY) server:stop
	$(MAKE) docker-down

restart: stop start ## Redémarre le serveur de développement Symfony

## —— 🏗️ Compilation des assets ———————————————————————————
build: ## Compile les assets (si Webpack Encore est installé)
	@if [ -f package.json ] && grep -q "encore" package.json; then \
		$(NPM) run build; \
	else \
		echo "$(YELLOW)Webpack Encore n'est pas installé.$(NC)"; \
	fi

## —— 🧹 Cache & Logs ——————————————————————————————————————
clear-cache: ## Vide le cache
	$(CONSOLE) cache:clear

cc: clear-cache ## Alias pour clear-cache

## —— ✅ Tests & Qualité ———————————————————————————————————
test: ## Exécute les tests
	$(MAKE) db-test
	@if [ -d "tests" ]; then \
		$(PHP) bin/phpunit --testdox; \
	else \
		echo "$(YELLOW)Aucun test trouvé.$(NC)"; \
	fi

coverage-text: ## Affiche un rapport de couverture de code en mode texte
	@echo "$(GREEN)Génération du rapport de couverture en mode texte...$(NC)"
	$(PHP) bin/phpunit --coverage-text

coverage-html: ## Génère un rapport de couverture de code HTML détaillé
	@echo "$(GREEN)Génération du rapport de couverture HTML...$(NC)"
	$(PHP) bin/phpunit --coverage-html var/coverage
	@echo "$(GREEN)Rapport généré dans var/coverage/index.html$(NC)"

coverage-filter: ## Génère un rapport de couverture pour une classe spécifique (utiliser avec FILTER=NomClasse)
	@if [ -z "$(FILTER)" ]; then \
		echo "$(YELLOW)Veuillez spécifier une classe avec FILTER=NomClasse$(NC)"; \
	else \
		echo "$(GREEN)Génération du rapport de couverture pour $(FILTER)...$(NC)"; \
		$(PHP) bin/phpunit --coverage-text --filter=$(FILTER); \
	fi

coverage: coverage-text coverage-html ## Génère les rapports de couverture en texte et HTML

pest: ## Exécute les tests avec Pest
	@if [ -f "$(PEST)" ]; then \
		$(PEST) --colors=always; \
	else \
		echo "$(YELLOW)Pest n'est pas installé. Installation...$(NC)"; \
		$(COMPOSER) remove phpunit/phpunit; \
		$(COMPOSER) require pestphp/pest --dev --with-all-dependencies; \
		$(PEST) --init; \
		echo "$(GREEN)Pest a été installé. Vous pouvez maintenant écrire vos tests.$(NC)"; \
	fi

## —— 🔍 Analyse de qualité (PHPQA) ——————————————————————————
phpcs: ## Vérifie le style du code avec PHP_CodeSniffer
	@echo "$(GREEN)Vérification du style du code avec PHP_CodeSniffer...$(NC)"
	$(PHPQA_RUN) phpcs src

phpcbf: ## Corrige le style du code avec PHP_CodeSniffer
	@echo "$(GREEN)Correction du style du code avec PHP_CodeSniffer...$(NC)"
	$(PHPQA_RUN) phpcbf --standard=phpcs.xml src

fix-doc-comments: ## Corrige le format des commentaires de documentation sur une seule ligne
	@echo "$(GREEN)Correction des commentaires de documentation...$(NC)"
	@find src -name "*.php" -type f -exec sed -i '' -E 's|/\*\*\n[[:space:]]*\*[[:space:]]*(.*?)\n[[:space:]]*\*/|/** \1 */|g' {} \;

phpstan: ## Analyse statique du code avec PHPStan
	@echo "$(GREEN)Analyse statique du code avec PHPStan...$(NC)"
	$(PHPQA_RUN) phpstan analyse -l max src

phpmd: ## Détecte les problèmes potentiels avec PHP Mess Detector
	@echo "$(GREEN)Détection des problèmes potentiels avec PHP Mess Detector...$(NC)"
	$(PHPQA_RUN) phpmd src text cleancode,codesize,controversial,design,naming,unusedcode --ignore-violations-on-exit

phpcpd: ## Détecte le code dupliqué avec PHP Copy/Paste Detector
	@echo "$(GREEN)Détection du code dupliqué avec PHP Copy/Paste Detector...$(NC)"
	$(PHPQA_RUN) phpcpd src

psalm: ## Exécute Psalm pour l'analyse statique du code
	@echo "$(GREEN)Analyse statique du code (Psalm)...$(NC)"
	@if [ ! -f psalm.xml ]; then \
		echo "$(YELLOW)Initialisation de Psalm...$(NC)"; \
		$(PHPQA_RUN) psalm --init src 3; \
	fi
	@$(PHPQA_RUN) psalm --show-info=false

php-metrics: ## Génère des métriques de qualité de code avec PHP Metrics
	@echo "$(GREEN)Génération des métriques de qualité de code avec PHP Metrics...$(NC)"
	$(PHPQA_RUN) phpmetrics --report-html=var/phpmetrics src

lint: phpcs phpstan ## Exécute les vérifications de qualité de code principales

fix-cs: phpcbf fix-doc-comments ## Corrige les problèmes de style de code

qa-all: phpcs phpstan phpmd phpcpd psalm php-metrics ## Exécute toutes les analyses de qualité

## —— 🚀 Pre-commit ——————————————————————————————————————————
before-commit: ## Exécute toutes les vérifications avant de commit
	@echo "$(GREEN)🔍 Exécution des vérifications pré-commit...$(NC)"
	@echo "$(YELLOW)Préparation du fichier TODO...$(NC)"
#	@echo "# TODO avant de commit\n\nCe fichier a été généré automatiquement par \`make before-commit\` le $(shell date +%d-%m-%Y) à $(shell date +%Hh%M).\n\n## Liste des problèmes à corriger\n" > TODO-BEFORE-COMMIT.md

	@echo "$(YELLOW)Vérification des dépendances vulnérables...$(NC)"
	@$(COMPOSER) audit

	@echo "$(YELLOW)Vérification des failles de sécurité...$(NC)"
	@$(PHPQA_RUN) local-php-security-checker

	@echo "$(YELLOW)Vérification de la syntaxe des fichiers PHP...$(NC)"
	@$(PHPQA_RUN) parallel-lint --exclude vendor --exclude var .

	@echo "$(YELLOW)Correction automatique du style de code...$(NC)"
	@$(PHPQA_RUN) phpcbf --standard=phpcs.xml src || true

	@echo "$(YELLOW)Vérification du style de code...$(NC)"
	@$(PHPQA_RUN) phpcs --standard=phpcs.xml src > phpcs-output.tmp 2>&1 || true
#	@if grep -q "ERROR\|WARNING" phpcs-output.tmp; then \
#		echo "### Problèmes de style de code (PSR-12)\n" >> TODO-BEFORE-COMMIT.md; \
#		grep -E "ERROR|WARNING" phpcs-output.tmp | sed 's/^/- [ ] /' >> TODO-BEFORE-COMMIT.md; \
#		echo "\n" >> TODO-BEFORE-COMMIT.md; \
#	fi
	@rm phpcs-output.tmp

	@echo "$(YELLOW)Analyse statique du code (PHPStan niveau max)...$(NC)"
	@$(PHPQA_RUN) phpstan analyse -l max src > phpstan-output.tmp 2>&1 || true
#	@if grep -q "ERROR\|Line" phpstan-output.tmp; then \
#		echo "### Problèmes détectés par PHPStan\n" >> TODO-BEFORE-COMMIT.md; \
#		current_file=""; \
#		while IFS= read -r line; do \
#			if [[ $$line == *"Line   "* ]]; then \
#				current_file=$$(echo "$$line" | awk '{print $$2}'); \
#				echo "\n#### [$$current_file](src/$$current_file)\n" >> TODO-BEFORE-COMMIT.md; \
#			elif [[ $$line =~ ^[[:space:]]*([0-9]+)[[:space:]]+(.*) ]]; then \
#				line_num=$${BASH_REMATCH[1]}; \
#				message=$${BASH_REMATCH[2]}; \
#				echo "- [ ] [**Ligne $$line_num**](src/$$current_file#L$$line_num): $$message" >> TODO-BEFORE-COMMIT.md; \
#				if grep -A 2 "$$line_num " phpstan-output.tmp | grep -q "never read, only written"; then \
#					echo "  💡 [Documentation](https://phpstan.org/developing-extensions/always-read-written-properties)" >> TODO-BEFORE-COMMIT.md; \
#				fi; \
#				echo "" >> TODO-BEFORE-COMMIT.md; \
#			fi; \
#		done < phpstan-output.tmp; \
#	fi
	@cat phpstan-output.tmp
	@rm phpstan-output.tmp

ifeq ($(ENABLE_PSALM),1)
	@echo "$(YELLOW)Analyse statique du code avec Psalm...$(NC)"
	@if [ ! -f psalm.xml ]; then \
		echo "$(YELLOW)Initialisation de Psalm...$(NC)"; \
		$(PHPQA_RUN) psalm --init src 3; \
	fi
	@$(PHPQA_RUN) psalm --show-info=false > psalm-output.tmp 2>&1 || true
#	@if grep -q "ERROR" psalm-output.tmp; then \
#		echo "### Problèmes détectés par Psalm\n" >> TODO-BEFORE-COMMIT.md; \
#		grep -E "ERROR:" psalm-output.tmp | sed 's/^/- [ ] /' >> TODO-BEFORE-COMMIT.md; \
#		echo "\n" >> TODO-BEFORE-COMMIT.md; \
#	fi
	@cat psalm-output.tmp
	@rm psalm-output.tmp
else
	@echo "$(RED)Analyse Psalm désactivée (PSALM désactivé)$(NC)"
endif

ifeq ($(ENABLE_PHPMD),1)
	@echo "$(YELLOW)Vérification des problèmes potentiels (PHPMD)...$(NC)"
	@$(PHPQA_RUN) phpmd src text cleancode,codesize,controversial,design,naming,unusedcode --ignore-violations-on-exit > phpmd-output.tmp 2>&1 || true
#	@if [ -s phpmd-output.tmp ]; then \
#		echo "### Problèmes détectés par PHPMD\n" >> TODO-BEFORE-COMMIT.md; \
#		grep "/project/src/" phpmd-output.tmp | sed -E 's|/project/src/([^:]+):([0-9]+)[[:space:]]+([^[:space:]]+)[[:space:]]+(.+)|- [ ] [**\1:\2**](src/\1#L\2): \3 - \4|' >> TODO-BEFORE-COMMIT.md; \
#	fi
	@cat phpmd-output.tmp
	@rm phpmd-output.tmp

	@echo "$(YELLOW)Détection du code dupliqué...$(NC)"
	@$(PHPQA_RUN) phpcpd src > phpcpd-output.tmp 2>&1 || true
#	@if grep -q "Found" phpcpd-output.tmp; then \
#		echo "### Code dupliqué détecté par PHPCPD\n" >> TODO-BEFORE-COMMIT.md; \
#		echo "- [ ] **Duplication entre fichiers** :\n" >> TODO-BEFORE-COMMIT.md; \
#		echo "  \`\`\`" >> TODO-BEFORE-COMMIT.md; \
#		grep "Found" phpcpd-output.tmp >> TODO-BEFORE-COMMIT.md; \
#		echo "" >> TODO-BEFORE-COMMIT.md; \
#		cat phpcpd-output.tmp | grep "  - " | sed -E 's|  - /project/src/([^:]+):([0-9]+)-([0-9]+) \(([0-9]+) lines\)|  - [src/\1:\2-\3 (\4 lines)](src/\1#L\2-L\3)|' >> TODO-BEFORE-COMMIT.md; \
#		echo "  \`\`\`" >> TODO-BEFORE-COMMIT.md; \
#		echo "\n" >> TODO-BEFORE-COMMIT.md; \
#	fi
	@cat phpcpd-output.tmp
	@rm phpcpd-output.tmp
else
	@echo "$(RED)Détection du code dupliqué désactivée (PHPMD désactivé)$(NC)"
endif

	@echo "$(YELLOW)Vérification des tests unitaires...$(NC)"
	@if [ -d "tests" ]; then \
		if [ -f "$(PEST)" ]; then \
			echo "$(YELLOW)Exécution des tests avec Pest...$(NC)"; \
			$(PEST) --colors=always || true; \
		else \
			echo "$(YELLOW)Exécution des tests avec PHPUnit...$(NC)"; \
			$(PHP) bin/phpunit --testdox || true; \
		fi; \
	else \
		echo "$(YELLOW)Aucun test trouvé.$(NC)"; \
	fi

	@echo "$(YELLOW)Vérification des fichiers Twig...$(NC)"
	$(CONSOLE) lint:twig templates || true

	@echo "$(YELLOW)Vérification des fichiers YAML...$(NC)"
	$(CONSOLE) lint:yaml config || true

	@echo "$(YELLOW)Vérification des fichiers de conteneur...$(NC)"
	$(CONSOLE) lint:container || true

	@echo "$(GREEN)✅ Toutes les vérifications sont terminées !$(NC)"
#	@echo "$(GREEN)📝   Un fichier TODO-BEFORE-COMMIT.md a été généré avec la liste des problèmes à corriger.$(NC)"
	@echo "$(GREEN)👉   Vous pouvez maintenant corriger ces problèmes avant de commit et push votre code.$(NC)"

## —— 🗃️ Base de données ————————————————————————————————————
db-create: ## Crée la base de données
	$(CONSOLE) doctrine:database:create --if-not-exists

db-drop: ## Supprime la base de données
	$(CONSOLE) doctrine:database:drop --force --if-exists

db-migration: ## Génère une migration
	$(CONSOLE) make:migration

db-migrate: ## Exécute les migrations
	$(CONSOLE) doctrine:migrations:migrate --no-interaction

db-fixtures: ## Charge les fixtures
	@if $(CONSOLE) list | grep -q "doctrine:fixtures:load"; then \
		if [ -d "src/DataFixtures" ] && [ "$$(find src/DataFixtures -name "*Fixture*.php" | wc -l)" -gt 0 ]; then \
			echo "$(GREEN)🌱 Chargement des fixtures...$(NC)"; \
			$(CONSOLE) doctrine:fixtures:load --no-interaction; \
		else \
			echo "$(YELLOW)⚠️ Aucune fixture trouvée dans src/DataFixtures, étape ignorée.$(NC)"; \
		fi; \
	else \
		echo "$(YELLOW)⚠️ Le bundle DoctrineFixturesBundle n'est pas installé, étape ignorée.$(NC)"; \
	fi

db-entity: ## Génère les entités
	$(CONSOLE) make:entity

db-reset: db-drop db-create db-migrate db-fixtures ## Réinitialise la base de données

db-test: ## Crée la base de données pour les tests
	@echo "$(YELLOW)🌱 Suppression de la base de données pour les tests...$(NC)"
	$(CONSOLE) doctrine:database:drop --force --if-exists --env=test
	@echo "$(YELLOW)🌱 Crée la base de données pour les tests...$(NC)"
	$(CONSOLE) doctrine:database:create --if-not-exists --env=test
	@echo "$(YELLOW)🌱 Exécution des migrations pour les tests...$(NC)"
	$(CONSOLE) doctrine:migrations:migrate --no-interaction --env=test

table-count: ## Affiche le nombre d'enregistrements dans une table
	@echo "$(GREEN)📊 Comptage des enregistrements dans une table...$(NC)"
	@TABLES=$$(docker exec database mysql -u root -proot ecommerce -e "SHOW TABLES;" | grep -v "Tables_in_" | sort); \
	if [ -z "$$TABLES" ]; then \
		echo "$(RED)❌ Aucune table trouvée dans la base de données.$(NC)"; \
		exit 1; \
	fi; \
	echo "$(YELLOW)Quelles tables voulez-vous compter ?$(NC)"; \
	INDEX=0; \
	for TABLE in $$TABLES; do \
		echo "[$${INDEX}] $${TABLE}"; \
		INDEX=$$((INDEX+1)); \
	done; \
	read -p "> " CHOICE; \
	INDEX=0; \
	for TABLE in $$TABLES; do \
		if [ "$$INDEX" = "$$CHOICE" ]; then \
			COUNT=$$(docker exec database mysql -u root -proot ecommerce -e "SELECT COUNT(*) FROM $${TABLE};" | grep -v "COUNT"); \
			echo "$(GREEN)> $${COUNT} enregistrements dans la table \"$${TABLE}\"$(NC)"; \
			break; \
		fi; \
		INDEX=$$((INDEX+1)); \
	done

## —— 🔒 Sécurité ———————————————————————————————————————————
security: ## Vérifie les vulnérabilités de sécurité
	$(COMPOSER) audit
	$(PHPQA_RUN) local-php-security-checker

## —— 📦 Dépendances ——————————————————————————————————————
check-deps: ## Vérifie les dépendances obsolètes
	$(COMPOSER) outdated

update-deps: ## Met à jour les dépendances
	$(COMPOSER) update

## —— 🐳 Docker ——————————————————————————————————————————
docker-up: ## Démarre les conteneurs Docker
	@echo "$(GREEN)Démarrage des conteneurs Docker...$(NC)"
	$(DOCKER_COMPOSE) -f compose.yaml up -d

docker-down: ## Arrête les conteneurs Docker
	@echo "$(GREEN)Arrêt des conteneurs Docker...$(NC)"
	$(DOCKER_COMPOSE) down --remove-orphans

docker-logs: ## Affiche les logs des conteneurs Docker
	@echo "$(GREEN)Affichage des logs Docker...$(NC)"
	$(DOCKER_COMPOSE) -f compose.yaml logs -f

docker-ps: ## Liste les conteneurs Docker en cours d'exécution
	@echo "$(GREEN)Liste des conteneurs Docker...$(NC)"
	$(DOCKER_COMPOSE) -f compose.yaml ps

docker-exec-php: ## Exécute un shell dans le conteneur PHP
	@echo "$(GREEN)Connexion au conteneur FrankenPHP...$(NC)"
	$(DOCKER_COMPOSE) -f compose.yaml exec frankenphp sh

docker-exec-db: ## Exécute un shell dans le conteneur MySQL
	@echo "$(GREEN)Connexion au conteneur MySQL...$(NC)"
	$(DOCKER_COMPOSE) -f compose.yaml exec database bash

docker-build: ## Reconstruit les images Docker
	@echo "$(GREEN)Reconstruction des images Docker...$(NC)"
	$(DOCKER_COMPOSE) -f compose.yaml build

docker-restart: docker-down docker-up ## Redémarre les conteneurs Docker

docker-env: ## Copie le fichier .env.docker vers .env.local pour utiliser la configuration Docker
	@echo "$(GREEN)Configuration de l'environnement Docker...$(NC)"
	cp .env.docker .env.local
	@echo "$(GREEN)Fichier .env.local créé avec la configuration Docker.$(NC)"

docker-status-frankenphp: ## Vérifie si FrankenPHP fonctionne correctement
	@echo "$(GREEN)Vérification du statut de FrankenPHP...$(NC)"
	@if [ "$$($(DOCKER_COMPOSE) -f compose.yaml ps -q frankenphp 2>/dev/null)" ]; then \
		if [ "$$(docker inspect -f {{.State.Running}} $$($(DOCKER_COMPOSE) -f compose.yaml ps -q frankenphp))" = "true" ]; then \
			echo "$(GREEN)✅ FrankenPHP est en cours d'exécution$(NC)"; \
			echo "$(GREEN)📊 Informations sur le conteneur:$(NC)"; \
			docker inspect $$($(DOCKER_COMPOSE) -f compose.yaml ps -q frankenphp) | grep -E '"IPAddress"|"Status"|"StartedAt"|"Image"|"Name"' | sed 's/,//g' | sed 's/"//g' | sed 's/^ *//g'; \
			echo "$(GREEN)🌐 Accès à l'application:$(NC)"; \
			echo "   - HTTP: http://localhost:8080"; \
			echo "$(GREEN)📋 Logs récents:$(NC)"; \
			$(DOCKER_COMPOSE) -f compose.yaml logs --tail=10 frankenphp; \
			echo "$(GREEN)💻 Pour voir tous les logs: make docker-logs$(NC)"; \
		else \
			echo "$(RED)❌ FrankenPHP est arrêté$(NC)"; \
		fi; \
	else \
		echo "$(RED)❌ Le conteneur FrankenPHP n'existe pas$(NC)"; \
		echo "$(YELLOW)Démarrez les conteneurs avec: make docker-up$(NC)"; \
	fi

docker-logs-frankenphp: ## Affiche les logs de FrankenPHP
	@echo "$(GREEN)Affichage des logs de FrankenPHP...$(NC)"
	$(DOCKER_COMPOSE) -f compose.yaml logs -f frankenphp

docker-symfony-debug: ## Affiche les informations de débogage Symfony dans FrankenPHP
	@echo "$(GREEN)Affichage des informations de débogage Symfony...$(NC)"
	$(DOCKER_COMPOSE) -f compose.yaml exec frankenphp bin/console debug:router
	@echo "\n$(GREEN)Informations sur le cache:$(NC)"
	$(DOCKER_COMPOSE) -f compose.yaml exec frankenphp bin/console cache:pool:list
	@echo "\n$(GREEN)Informations sur le serveur:$(NC)"
	$(DOCKER_COMPOSE) -f compose.yaml exec frankenphp php -i | grep -E 'PHP Version|memory_limit|display_errors|error_reporting|date.timezone|opcache'

## —— 🧰 Outils utiles ——————————————————————————————————————
validate-schema: ## Valide le schéma de la base de données
	$(CONSOLE) doctrine:schema:validate

routes: ## Liste toutes les routes de l'application
	$(CONSOLE) debug:router

services: ## Liste tous les services de l'application
	$(CONSOLE) debug:container

translations: ## Liste toutes les traductions de l'application (nécessite symfony/translation)
	@if $(CONSOLE) list | grep -q "debug:translation"; then \
		$(CONSOLE) debug:translation fr; \
	else \
		echo "$(YELLOW)La commande debug:translation n'est pas disponible. Installez symfony/translation-bundle avec:$(NC)"; \
		echo "$(GREEN)composer require symfony/translation$(NC)"; \
	fi

pull: ## Bascule sur Main, met à jour le dépôt et optionnellement supprime une branche
	@bash -c ' \
		GREEN="\033[0;32m"; YELLOW="\033[0;33m"; RED="\033[0;31m"; NC="\033[0m"; \
		echo "$$GREEN Bascule sur Main et mise à jour du dépôt... $$NC"; \
		git rev-parse --verify main &>/dev/null || { echo "$$RED Erreur: La branche main nexiste pas!$$NC"; exit 1; }; \
		current_branch=$$(git rev-parse --abbrev-ref HEAD); \
		if [ "$$current_branch" = "main" ]; then \
			echo "$$YELLOW Déjà sur la branche main$$NC"; \
			git pull; \
		else \
			read -p "$$GREEN Une branche est à supprimer ? [O/n] $$NC" answer; \
			answer=$${answer:-O}; \
			if [ "$${answer,,}" = "o" ]; then \
				read -p "$$GREEN Nom de la branche à supprimer : $$NC" branch; \
				if [ -n "$$branch" ]; then \
					read -p "$$YELLOW Êtes-vous sûr de vouloir supprimer la branche \"$$branch\" ? [o/N] $$NC" confirm; \
					if [ "$${confirm,,}" = "o" ]; then \
						git switch main && git pull && git branch -D "$$branch" || echo "$$RED Erreur lors de la suppression de la branche$$NC"; \
					else \
						git switch main && git pull; \
					fi; \
				else \
					echo "$$YELLOW Aucun nom de branche fourni, annulation de la suppression$$NC"; \
					git switch main && git pull; \
				fi; \
			else \
				git switch main && git pull; \
			fi; \
		fi'

## —— 🗄️  Backup ————————————————————————————————————————————————————————————————

## Création de sauvegardes
backup-daily: ## Créer une sauvegarde quotidienne (si planifiée)
	$(BIN) app:backup:create daily

backup-daily-force: ## Forcer une sauvegarde quotidienne
	$(BIN) app:backup:create daily --force

backup-weekly: ## Créer une sauvegarde hebdomadaire (si planifiée)
	$(BIN) app:backup:create weekly

backup-weekly-force: ## Forcer une sauvegarde hebdomadaire
	$(BIN) app:backup:create weekly --force

backup-monthly: ## Créer une sauvegarde mensuelle (si planifiée)
	$(BIN) app:backup:create monthly

backup-monthly-force: ## Forcer une sauvegarde mensuelle
	$(BIN) app:backup:create monthly --force

backup-annual: ## Créer une sauvegarde annuelle (si planifiée)
	$(BIN) app:backup:create annual

backup-annual-force: ## Forcer une sauvegarde annuelle
	$(BIN) app:backup:create annual --force

backup-all: ## Créer toutes les sauvegardes planifiées selon le calendrier
	$(BIN) app:backup:create --all

backup-all-force: ## Forcer la création de toutes les sauvegardes (ignore le calendrier)
	$(BIN) app:backup:create --all --force

## Consultation des sauvegardes
backup-list: ## Afficher toutes les sauvegardes disponibles
	$(BIN) app:backup:list

backup-list-daily: ## Afficher uniquement les sauvegardes quotidiennes
	$(BIN) app:backup:list --type=daily

backup-list-weekly: ## Afficher uniquement les sauvegardes hebdomadaires
	$(BIN) app:backup:list --type=weekly

backup-list-monthly: ## Afficher uniquement les sauvegardes mensuelles
	$(BIN) app:backup:list --type=monthly

backup-list-annual: ## Afficher uniquement les sauvegardes annuelles
	$(BIN) app:backup:list --type=annual

## Restauration de sauvegardes
backup-restore: ## Restaurer une sauvegarde (mode interactif avec choix)
	$(BIN) app:backup:restore

backup-restore-latest: ## Restaurer la dernière sauvegarde (avec confirmation)
	$(BIN) app:backup:restore --latest

backup-restore-latest-force: ## ⚠️  DANGER: Restaurer la dernière sauvegarde SANS confirmation
	@echo "⚠️  ATTENTION: Cette action va écraser la base de données actuelle!"
	@echo "⚠️  Appuyez sur Ctrl+C pour annuler ou Entrée pour continuer..."
	@read confirm
	$(BIN) app:backup:restore --latest --yes

backup-restore-force: ## ⚠️  DANGER: Restaurer une sauvegarde SANS confirmation (mode interactif)
	@echo "⚠️  ATTENTION: Cette action va écraser la base de données actuelle!"
	@echo "⚠️  Appuyez sur Ctrl+C pour annuler ou Entrée pour continuer..."
	@read confirm
	$(BIN) app:backup:restore --yes

## Suppression de sauvegardes
backup-delete: ## Supprimer une sauvegarde (mode interactif avec choix)
	$(BIN) app:backup:delete

backup-delete-daily: ## Supprimer toutes les sauvegardes quotidiennes (avec confirmation)
	$(BIN) app:backup:delete --type=daily

backup-delete-weekly: ## Supprimer toutes les sauvegardes hebdomadaires (avec confirmation)
	$(BIN) app:backup:delete --type=weekly

backup-delete-monthly: ## Supprimer toutes les sauvegardes mensuelles (avec confirmation)
	$(BIN) app:backup:delete --type=monthly

backup-delete-annual: ## Supprimer toutes les sauvegardes annuelles (avec confirmation)
	$(BIN) app:backup:delete --type=annual

backup-delete-old: ## Supprimer les sauvegardes de plus de 90 jours (avec confirmation)
	$(BIN) app:backup:delete --older-than=90

backup-delete-old-30: ## Supprimer les sauvegardes de plus de 30 jours (avec confirmation)
	$(BIN) app:backup:delete --older-than=30

backup-delete-daily-force: ## ⚠️  Supprimer toutes les sauvegardes quotidiennes SANS confirmation
	$(BIN) app:backup:delete --type=daily --yes

backup-delete-weekly-force: ## ⚠️  Supprimer toutes les sauvegardes hebdomadaires SANS confirmation
	$(BIN) app:backup:delete --type=weekly --yes

backup-delete-monthly-force: ## ⚠️  Supprimer toutes les sauvegardes mensuelles SANS confirmation
	$(BIN) app:backup:delete --type=monthly --yes

backup-delete-annual-force: ## ⚠️  Supprimer toutes les sauvegardes annuelles SANS confirmation
	$(BIN) app:backup:delete --type=annual --yes

backup-delete-old-force: ## ⚠️  Supprimer les sauvegardes de plus de 90 jours SANS confirmation
	$(BIN) app:backup:delete --older-than=90 --yes

## Commandes d'aide et de statut
backup-help: ## Afficher l'aide complète sur les commandes de sauvegarde
	@echo ""
	@echo "📦 SYSTÈME DE SAUVEGARDE DE BASE DE DONNÉES"
	@echo "============================================="
	@echo ""
	@echo "📁 CRÉATION:"
	@echo "  make backup-daily              - Sauvegarde quotidienne (si planifiée)"
	@echo "  make backup-daily-force        - Force une sauvegarde quotidienne"
	@echo "  make backup-weekly             - Sauvegarde hebdomadaire (si planifiée)"
	@echo "  make backup-monthly            - Sauvegarde mensuelle (si planifiée)"
	@echo "  make backup-annual             - Sauvegarde annuelle (si planifiée)"
	@echo "  make backup-all                - Toutes les sauvegardes planifiées"
	@echo "  make backup-all-force          - Force toutes les sauvegardes"
	@echo ""
	@echo "📋 CONSULTATION:"
	@echo "  make backup-list               - Liste toutes les sauvegardes"
	@echo "  make backup-list-daily         - Liste les sauvegardes quotidiennes"
	@echo "  make backup-list-weekly        - Liste les sauvegardes hebdomadaires"
	@echo "  make backup-list-monthly       - Liste les sauvegardes mensuelles"
	@echo "  make backup-list-annual        - Liste les sauvegardes annuelles"
	@echo ""
	@echo "🔄 RESTAURATION:"
	@echo "  make backup-restore            - Restaurer (choix interactif)"
	@echo "  make backup-restore-latest     - Restaurer la plus récente (avec confirmation)"
	@echo "  make backup-restore-latest-force - ⚠️  Restaurer sans confirmation"
	@echo ""
	@echo "🗑️  SUPPRESSION:"
	@echo "  make backup-delete             - Supprimer (choix interactif)"
	@echo "  make backup-delete-daily       - Supprimer toutes les quotidiennes"
	@echo "  make backup-delete-old         - Supprimer sauvegardes > 90 jours"
	@echo "  make backup-delete-old-30      - Supprimer sauvegardes > 30 jours"
	@echo ""
	@echo "⚠️  Les commandes avec -force ignorent les confirmations!"
	@echo ""

backup-status: ## Afficher le statut des sauvegardes (nombre par type)
	@echo ""
	@echo "📊 STATUT DES SAUVEGARDES"
	@echo "========================="
	@echo ""
	@echo "Quotidiennes (daily):"
	@$(BIN) app:backup:list --type=daily | grep -c "│" || echo "  0 sauvegarde"
	@echo ""
	@echo "Hebdomadaires (weekly):"
	@$(BIN) app:backup:list --type=weekly | grep -c "│" || echo "  0 sauvegarde"
	@echo ""
	@echo "Mensuelles (monthly):"
	@$(BIN) app:backup:list --type=monthly | grep -c "│" || echo "  0 sauvegarde"
	@echo ""
	@echo "Annuelles (annual):"
	@$(BIN) app:backup:list --type=annual | grep -c "│" || echo "  0 sauvegarde"
	@echo ""

## Commandes de maintenance
backup-check-schedule: ## Vérifier quelles sauvegardes doivent être effectuées
	@echo "🔍 Vérification du calendrier de sauvegarde..."
	@$(BIN) app:backup:create --all --dry-run 2>/dev/null || echo "Note: ajoutez --dry-run à la commande pour cette fonctionnalité"

backup-cleanup: ## Nettoyer les anciennes sauvegardes (>90 jours)
	@echo "🧹 Nettoyage des sauvegardes de plus de 90 jours..."
	$(BIN) app:backup:delete --older-than=90

## Test et développement
backup-test: ## Créer une sauvegarde de test et l'afficher
	@echo "🧪 Test du système de sauvegarde..."
	$(BIN) app:backup:create daily --force
	@echo ""
	@echo "✅ Sauvegarde créée, voici la liste:"
	$(BIN) app:backup:list
	@echo ""
	@echo "💡 Pour restaurer: make backup-restore-latest"

## —— 📜 Autres ————————————————————————————————————————————
show-wip: ## Affiche les add effectués sur la branche | # git log main..emails --name-status --pretty=format:"Commit %h - %s%nAuthor: %an%nDate: %ad" --date=short
	@echo "$(GREEN)Affichage des commits WIP...$(NC)"
	@BRANCH_NAME=$$(git rev-parse --abbrev-ref HEAD) && \
	git log main..$$BRANCH_NAME --name-status --pretty=format:"Commit %h - %s%nAuthor: %an%nDate: %ad" --date=short