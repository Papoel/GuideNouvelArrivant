<?php

use Castor\Attribute\AsTask;

use Castor\Context;
use function Castor\finder;
use function Castor\io;
use function Castor\capture;
use function Castor\notify;
use function Castor\parallel;
use function Castor\run;

/* ******************** 🐳 DOCKER 🐳 ******************** */
#[AsTask(description: 'start docker containers')]
function up(): void
{
    run(command: 'docker-compose up -d');
}

#[AsTask(description: 'stop docker containers')]
function down(): void
{
    run(command: 'docker-compose down --remove-orphans');
}

/* ******************** SERVER ******************** */

#[AsTask(description: 'start symfony server')]
function serverStart(): void
{
    run(command: 'symfony server:start -d');
}

#[AsTask(description: 'stop symfony server')]
function serverStop(): void
{
    run(command: 'symfony server:stop');
}

#[AsTask(description: 'check PHP version')]
function checkPhp(): void
{
    run(command: 'symfony local:php:list');
}

#[AsTask(description: 'check Server running')]
function checkServer(): void
{
    run(command: 'symfony server:status');
}

#[AsTask(description: 'staring server and open browser')]
function simpleStart(): void
{
    serverStart();
    parallel(
        fn() => run(command: 'phpstorm .'),
        fn() => run(command: 'open https://localhost:8000')
    );

}

/* ******************** 📜 DOCTRINE 📜 ******************** */
#[AsTask(description: 'make entity')]
function entity(): void
{
    $entityName = io()->ask(question: 'Nom de l\'entité');
    run(command: sprintf('php bin/console make:entity %s', $entityName));
}

#[AsTask(description: 'Mettre à jour le schéma de la base de données')]
function updateSchema(): void
{
    run(command: 'php bin/console doctrine:schema:update --force');
}

/* ******************** 🗄 DATABASE 🗄 ******************** */
#[AsTask(description: 'create database')]
function createDb(): void
{
    run(command: 'symfony console doctrine:database:create');
}

#[AsTask(description: 'drop database')]
function dropDb(): void
{
    run(command: 'php bin/console doctrine:database:drop --force');
}

#[AsTask(description: 'create database schema')]
function migration(): void
{
    run(command: 'php bin/console make:migration');
}

#[AsTask(description: 'migrate database')]
function migrate(): void
{
    run(command: 'php bin/console doctrine:migrations:migrate -n');
}

#[AsTask(description: 'fixtures')]
function fixtures(): void
{
    if (io()->confirm(question: 'Voulez-vous charger les fixtures?')) {
        run(command: 'php bin/console doctrine:fixtures:load -n');
    }
}

# TODO: Travail en cours, tester si la commande est fonctionnelle
#[AsTask(description: 'new database')]
function resetDb(): void
{
    // 1. Drop database
    dropDb();
    // 2. Create database
    createDb();
    // 3. Verify if in folder src/Migrations contains files
    $migrations = finder()->in(dirs: 'migrations')->files();
    if (count($migrations) <= 0) {
        // 4. Create database schema
        migration();
        // 5. Migrate database
    }
    migrate();
    // 4. if I have fixtures in my project I can load them
    fixtures();
    // if all is OK, return success
    io()->success(message: 'Base de données réinitialisée');
}

/* ******************** 🐘 SYMFONY 🐘 ******************** */
#[AsTask(description: 'make controller')]
function controller(): void
{
    $controllerName = io()->ask(question: 'Nom du controller');
    run(command: sprintf('php bin/console make:controller %s', $controllerName));
}

#[AsTask(description: 'make form')]
function form(): void
{
    $formName = io()->ask(question: 'Nom du formulaire');
    run(command: sprintf('php bin/console make:form %s', $formName));
}

#[AsTask(description: 'make test')]
function createTest(): void
{
    run(command: 'php bin/console make:test');
}

/* ******************** 🔄 CACHE 🔄 ******************** */
#[AsTask(description: 'Effacer le cache')]
function cc(): void
{
    parallel(
        fn() => purge(),
        fn() => run(command: 'php bin/console cache:clear'),
    );
}

#[AsTask(description: 'Effacer le cache de production')]
function ccp(): void
{
    run(command: 'php bin/console cache:clear --env=prod');
}

// Delete file public/assets + var/cache + var/log
#[AsTask(description: 'Effacer les fichiers de cache')]
function clearCache(): void
{
    parallel(
        fn() => run(command: 'rm -rf var/cache'),
        fn() => run(command: 'rm -rf var/log'),
        fn() => run(command: 'rm -rf public/assets'),
    );
}

/* ******************** 🌐 ROUTING 🌐 ******************** */
#[AsTask(description: 'Afficher la liste des routes')]
function routes(): void
{
    run(command: 'php bin/console debug:router');
}

/* ******************** 🔧 DEBUGGING 🔧 ******************** */
#[AsTask(description: 'Logs')]
function showLogs(): void
{
    run(command: 'tail -f var/log/dev.log');
}

/* ******************** 🧪 TESTING with PEST 🧪 ******************** */
function pest(string $command): void
{
    run(command: sprintf('./vendor/bin/pest %s', $command));
}

#[AsTask(description: 'Exécuter les tests')]
function testSimply(): void
{
    pest(command: '');
}

#[AsTask(description: 'Exécuter les tests et arrêter à la première erreur')]
function testCrash(): void
{
    pest(command: '--bail');
}

/* ******************** 🧪 TESTING with PHPUNIT 🧪 ******************** */
#[AsTask(description: 'Recréer la base de données de test')]
function resetDbTest(): void
{
    run(command: 'symfony console doctrine:database:drop --force --env=test || true');
    run(command: 'symfony console doctrine:database:create --env=test');
    run(command: 'symfony console doctrine:migrations:migrate -n --env=test');
    run(command: 'symfony console doctrine:fixtures:load -n --env=test');
}

#[AsTask(description: 'Nettoyer la base de données de test sans fixtures')]
function cdb(): void
{
    run(command: 'symfony console doctrine:database:drop --force --env=test || true');
    run(command: 'symfony console doctrine:database:create --env=test');
    run(command: 'symfony console doctrine:database:create --env=test');
    run(command: 'symfony console doctrine:migrations:migrate -n --env=test');
}

#[AsTask(description: 'Exécuter les tests avec PHPUnit')]
function phpunit(): void
{
    //resetDbTest();
    run(command: 'XDEBUG_MODE=coverage php bin/phpunit');
}

#[AsTask(description: 'Exécuter les tests avec PHPUnit et arrêter à la première erreur')]
function phpunitCrash(): void
{
    run(command: 'php bin/phpunit --stop-on-failure');
}

#[AsTask(description: 'Vérifier la couverture de test d\'un fichier')]
function cover(): void
{
    $file = io()->ask(question: 'Nom du chemin complet du fichier a tester');
    run(command: sprintf('php -dxdebug.mode=coverage vendor/bin/phpunit --coverage-text tests/%s', $file));
}

/* ******************** ⭐️ WIP ⭐️ ******************** */
#[AsTask(description: 'Exécuter les tests et vérifier la couverture de code')]
function pests(): void
{
    pest(command: '--coverage --min=80');
}

#[AsTask(description: 'Exécuter les tests et vérifier la couverture de code')]
function phpunitCoverage(): void
{
    run(command: 'XDEBUG_MODE=coverage php bin/phpunit --coverage-html var/coverage/');
}
/* ******************** ⭐️ WIP ⭐️ ******************** */

#[AsTask(description: 'Créer un rapport de couverture des tests')]
function testsCoverage(): void
{
    if (file_exists(filename: 'tests/Pest.php')) {
        pest(command: '--coverage --coverage-html var/coverage/');
    } else {
        phpunitCoverage();
    }

}

/* ******************** 🌐 ASSETS 🌐 ******************** */
#[AsTask(description: 'Installer les dépendances front-end')]
function yarn(): void
{
    run(command: 'yarn install');
}

#[AsTask(description: 'Compiler les assets')]
function yarnBuild(): void
{
    run(command: 'yarn build');
}

/* ******************** 🎨 ASSETS MAPPER 🎨 ******************** */
#[AsTask(description: 'Asset Mapper: Importer une librairie')]
function mapperImport(): void
{
    $library = io()->ask(question: 'Nom de la librairie');
    run(command: sprintf('php bin/console importmap:require %s', $library));
}

#[AsTask(description: 'Asset Mapper: Debug')]
function mapperDebug(): void
{
    run(command: 'php bin/console debug:asset-map');
}

#[AsTask(description: 'Asset Mapper: Compiler le fichier de mapping')]
function mapperCompile(): void
{
    run(command: 'php bin/console asset-map:compile');
}

#[AsTask(description: 'Asset Mapper: Installer les dépendances')]
function mapperInstall(): void
{
    run(command: 'php bin/console importmap:install');
}

#[AsTask(description: 'Asset Mapper: Voir la configuration de Asset mapper')]
function mapperConfig(): void
{
    run(command: 'php bin/console config:dump framework asset_mapper');
}

/* ******************** 🚀 DEPLOYMENT 🚀 ******************** */
#[AsTask(description: 'Déploiement en production')]
function deployProd(): void
{
    run(command: 'git push origin main');
    run(command: 'ssh agent@domain.com "cd /path/to/project && git pull origin main && composer install && php bin/console cache:clear --env=prod"');
}

#[AsTask(description: 'Déploiement en pré-production')]
function deployPreProd(): void
{
    run(command: 'git push origin develop');
    run(command: 'ssh agent@domain.com "cd /path/to/project && git pull origin develop && composer install && php bin/console cache:clear"');
}

/* ******************** 📝 QUALITÉ DU CODE 📝 ******************** */
// Fonction pour exécuter une commande PHPQA
/*function executePhpqaCommand(string $command): void
{
    // Récupérer le répertoire courant
    $currentDirectory = capture(command: 'pwd');

    // Définir les variables pour la commande Docker
    $dockerRunCommand = 'docker run --init --rm -v ';
    $phpQaImage = 'jakzal/phpqa:php8.3';
    $projectVolume = $dockerRunCommand . $currentDirectory . ':/project';
    $workingDirectory = '-w /project ';
    $phpQaRunCommand = $projectVolume . ' ' . $workingDirectory . $phpQaImage;

    // Concaténer les commandes Docker et la commande spécifique PHPQA
    $fullCommand = $phpQaRunCommand . ' ' . $command;

    // Exécuter la commande
    run(command: $fullCommand);
}*/

function executePhpqaCommand(string $command): void
{
    // Récupérer le répertoire courant
    $currentDirectory = getcwd();

    // Définir les variables pour la commande Docker
    $dockerRunCommand = 'docker run --init --rm';
    $phpQaImage = 'jakzal/phpqa:php8.3';
    $projectVolume = '-v ' . $currentDirectory . ':/project';
    $workingDirectory = '-w /project';
    $userMapping = '--user $(id -u):$(id -g)';

    // Concaténer les commandes Docker et la commande spécifique PHPQA
    $fullCommand = implode(' ', [
        $dockerRunCommand,
        $projectVolume,
        $workingDirectory,
        $userMapping,
        $phpQaImage,
        $command
    ]);
    // Exécuter la commande
    run($fullCommand, context: new Context(allowFailure: true));
}

function executeSymfonyLintCommand(string $command): void
{
    run(command: sprintf('php bin/console lint:%s', $command));
}

#[AsTask(description: 'Qualité du code: PHP-CS-Fixer')]
function qaCsFixer(): void
{
    // PHPQA_RUN = $(DOCKER_RUN) --init --rm -v $(PWD):/project -w /project jakzal/phpqa:php8.2 php-cs-fixer fix ./src --rules=@Symfony --verbose --dry-run
    // Définir la commande PHP-CS-Fixer
    $phpCsFixerCommand = 'php-cs-fixer fix ./src --rules=@Symfony --verbose';

    // Exécuter la commande
    executePhpqaCommand($phpCsFixerCommand);
}

#[AsTask(description: 'Qualité du code: PHPStan')]
function qaPhpstan(): void
{
    // Définir la commande PHPStan
    $phpStanCommand = 'phpstan analyse --configuration=phpstan.neon';

    // Exécuter la commande
    executePhpqaCommand($phpStanCommand);
}

#[AsTask(description: 'Qualité du code: PHPCPD')]
function qaPhpcpd(): void
{
    // Définir la commande PHPCPD
    $phpCpdCommand = 'phpcpd ./src';

    // Exécuter la commande
    executePhpqaCommand($phpCpdCommand);
}

/** BUG : Problème dépréciation */
/*#[AsTask(description: 'Qualité du code: PHPMD')]
function qaPhpMetrics(): void
{
    // Définir la commande de rapport PHP Metrics
    // $phpMetricsCommand = 'phpmetrics --report-html=var/metrics/application ./src';
    $phpMetricsCommand = 'phpmetrics --report-html=myreport.html var/metrics/application ./src';

    // Exécuter la commande
    executePhpqaCommand($phpMetricsCommand);
}*/

#[AsTask(description: 'Vérifier la syntaxe des fichiers TWIG')]
function qaTwigLint(): void
{
    // Définir la commande Twig Lint
    $twigLintCommand = 'twig templates';

    // Exécuter la commande
    executeSymfonyLintCommand($twigLintCommand);
}

#[AsTask(description: 'Vérifier la syntaxe des fichiers YAML')]
function qaYamlLint(): void
{
    // Définir la commande YAML Lint
    $yamlLintCommand = 'yaml config';

    // Exécuter la commande
    executeSymfonyLintCommand($yamlLintCommand);
}

#[AsTask(description: 'Vérifier la configuration du container')]
function qaContainerLint(): void
{
    // Définir la commande Container Lint
    $containerLintCommand = 'container';

    // Exécuter la commande
    executeSymfonyLintCommand($containerLintCommand);
}

#[AsTask(description: 'Vérifier les occurrences de dump() dans les fichiers TWIG')]
function checkDumpInTwigFiles(): void
{
    $templatesDirectory = 'templates';

    // Vérifier si le répertoire templates existe
    if (!is_dir($templatesDirectory)) {
        io()->error("Le dossier 'templates' n'existe pas. Assurez-vous qu'il est présent.");
        return;
    }

    // Exécuter la commande grep pour rechercher les occurrences de dump() dans les fichiers TWIG
    $command = "grep -r -n '{{ dump(' {$templatesDirectory} 2>&1";

    // Capturer la sortie de la commande
    $output = shell_exec($command);

    // Vérifier s'il y a des occurrences de dump()
    if ($output !== null && trim($output) !== '') {
        io()->warning("Des occurrences de {{ dump() }} ont été trouvées dans les fichiers suivants :");
        io()->writeln($output);
    } else {
        io()->success("Aucune occurrence de {{ dump() }} n'a été trouvée dans les fichiers du dossier 'templates'.");
    }
}


#[AsTask(description: 'Qualité du code: Tous les outils')]
function beforeCommit(): void
{
    run(command: 'composer validate');

    parallel(
        fn() => qaCsFixer(),
        fn() => qaPhpstan(),
        fn() => qaPhpcpd(),
        fn() => qaTwigLint(),
        fn() => qaYamlLint(),
        fn() => qaContainerLint(),
        fn() => checkDumpInTwigFiles(),
    );

    // Exécuter testSimply(); si le dossier tests contient plus d'un fichier
    $tests = finder()->in(dirs: 'tests')->files();
    // Si le fichier tests/Pest.php existe, on exécute les tests avec Pest
    if (file_exists(filename: 'tests/Pest.php')) {
        if (count($tests) > 1)
            testSimply();
    } else {
        phpunit();
    }


    /** BUG : Problème de dépréciation */
    /*if (io()->confirm(question: 'Voulez-vous exécuter les metrics ?', default: false)) {
        parallel(
            fn() => qaPhpMetrics(),
            fn() => testsCoverage(),
        );
    }*/

    // Success message
    io()->success('Tous les outils de qualité du code ont été exécutés avec succès, vous pouvez maintenant commiter vos modifications.');

    notifyCodeQuality('Code qualité: OK - C\'est le moment de commiter vos modifications');
}

#[AsTask(description: 'Notification de vérification de la qualité du code')]
function notifyCodeQuality(string $message): void
{
    notify($message);
}

// Création du fichier phpstan.neon:
#[AsTask(description: 'Créer le fichier phpstan.neon')]
function createPhpStanNeon(): void
{
    // Si le fichier phpstan.neon existe déjà, on ne le recrée pas
    if (file_exists(filename: 'phpstan.neon')) {
        io()->warning('Le fichier phpstan.neon existe déjà.');
        return;
    }

    // Créer le contenu du fichier phpstan.neon
$content = "cat <<EOL > phpstan.neon
parameters:
  level: max
  paths:
    - src
  excludePaths:
    - src/DataFixtures
    - src/Command
    - src/Service
  checkMissingIterableValueType: true
  reportUnmatchedIgnoredErrors: false
  editorUrl: 'phpstorm://open?file=%%file%%&line=%%line%%'
  editorUrlTitle: '%%relFile%%:%%line%%'
";

    // Exécuter la commande
    run(command: $content);

    // Message de succès
    io()->success('Le fichier phpstan.neon a été créé avec succès.');
}


// Les commandes à exécuter pour démarrer le projet
/* ******************** 🚀 START 🚀 ******************** */
#[AsTask(description: 'Démarrer le projet')]
function start(): void
{
    parallel(
        fn() => up(),
        fn() => simpleStart(),
        fn() => createPhpStanNeon(),
    );

    notify(message: 'Projet démarré avec succès');
}

/* ******************** 🛑 STOP 🛑 ******************** */
#[AsTask(description: 'Arrêter le projet')]
function stop(): void
{
    parallel(
        fn() => down(),
        fn() => serverStop()
    );

    notify(message: 'Projet arrêté avec succès');
}

//  Commande utiles
/* ******************** 🛠 UTILS 🛠 ******************** */
#[AsTask(description: 'Ouvrir la couverture de test')]
function openCoverage(): void
{
    run(command: 'open var/metrics/tests/coverage/index.html');
}

// Effacer les dossiers var/cache et var/log
#[AsTask(description: 'Effacer les dossiers var/cache et var/log')]
function purge(): void
{
    parallel(
        fn() => run(command: 'rm -rf var/cache'),
        fn() => run(command: 'rm -rf var/log')
    );
}
