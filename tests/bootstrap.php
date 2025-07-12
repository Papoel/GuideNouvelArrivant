<?php

use Symfony\Component\Dotenv\Dotenv;

require dirname(path: __DIR__).'/vendor/autoload.php';

// Supprime le cache de test avant de lancer les tests
if ($_SERVER['APP_ENV'] === 'test') {
    $cacheDir = dirname(path: __DIR__).'/var/cache/test';
    if (is_dir($cacheDir)) {
        // Utilisation d'une commande shell pour une suppression récursive robuste
        passthru(command: sprintf('rm -rf %s', escapeshellarg(arg: $cacheDir)));
    }
}

// Désactiver les avertissements de dépréciation liés à LazyGhost et aux contraintes de validation
// Utiliser une configuration plus précise pour ignorer les dépréciations dans des contextes spécifiques
$_SERVER['SYMFONY_DEPRECATIONS_HELPER'] = 'max[self]=0&ignoreFile=vendor/symfony/var-exporter/LazyGhostTrait.php&ignoreFile=vendor/symfony/var-exporter/ProxyHelper.php&ignoreFile=vendor/symfony/validator/Constraints/Length.php&ignoreFile=vendor/symfony/validator/Constraints/NotBlank.php&ignoredClass[]=App\\Tests\\Controller\\Admin\\DashboardControllerTest';

if (method_exists(object_or_class: Dotenv::class, method: 'bootEnv')) {
    (new Dotenv())->bootEnv(path: dirname(path: __DIR__).'/.env');
}

if ($_SERVER['APP_DEBUG']) {
    umask(mask: 0000);
}
