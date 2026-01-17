# Configuration Docker

## Vue d'ensemble

Le projet utilise Docker Compose pour l'environnement de développement avec les services suivants :

- **MariaDB** : Base de données MySQL
- **phpMyAdmin** : Interface d'administration de la base de données
- **MailDev** : Serveur SMTP de test pour les emails

## Services

### Base de données (MariaDB)

```yaml
database:
  image: mariadb:latest
  container_name: db_compagnonnage
  ports:
    - "3306:3306"
  environment:
    MYSQL_DATABASE: db_compagnonnage
    MYSQL_ALLOW_EMPTY_PASSWORD: 'yes'
```

**Accès** : `mysql://root@127.0.0.1:3306/db_compagnonnage`

### phpMyAdmin

```yaml
phpmyadmin:
  image: phpmyadmin
  container_name: phpMyAdmin_compagnonnage
  ports:
    - "8085:80"
```

**Accès** : [http://localhost:8085](http://localhost:8085)

### MailDev

```yaml
maildev:
  image: maildev/maildev
  container_name: maildev_compagnonnage
  ports:
    - "8081:80"   # Interface web
    - "1025:25"   # SMTP
```

**Interface web** : [http://localhost:8081](http://localhost:8081)

**Configuration SMTP** : `MAILER_DSN=smtp://127.0.0.1:1025`

## Commandes

### Démarrer les conteneurs

```bash
make docker-up
# ou
docker compose up -d
```

### Arrêter les conteneurs

```bash
make docker-down
# ou
docker compose down
```

### Voir les logs

```bash
docker compose logs -f
```

### Accéder à un conteneur

```bash
docker exec -it db_compagnonnage bash
```

## Configuration .env.local

```env
# Base de données
DATABASE_URL="mysql://root@127.0.0.1:3306/db_compagnonnage?serverVersion=mariadb-10.6.12&charset=utf8mb4"

# Emails (MailDev)
MAILER_DSN=smtp://127.0.0.1:1025
```

## Initialisation rapide

```bash
# 1. Démarrer les conteneurs
make docker-up

# 2. Créer la base de données
make db-create

# 3. Appliquer les migrations
make db-migrate

# 4. Charger les fixtures (optionnel)
make db-fixtures
```

Ou en une seule commande :

```bash
make init-dev
```
