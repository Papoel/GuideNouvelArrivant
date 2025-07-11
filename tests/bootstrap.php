<?php

use Symfony\Component\Dotenv\Dotenv;

require dirname(__DIR__).'/vendor/autoload.php';

// Supprime le cache de test avant de lancer les tests
if (isset($_SERVER['APP_ENV']) && $_SERVER['APP_ENV'] === 'test') {
    $cacheDir = dirname(__DIR__).'/var/cache/test';
    if (is_dir($cacheDir)) {
        // Utilisation d'une commande shell pour une suppression récursive robuste
        passthru(sprintf('rm -rf %s', escapeshellarg($cacheDir)));
    }
}

if (method_exists(Dotenv::class, 'bootEnv')) {
    (new Dotenv())->bootEnv(dirname(__DIR__).'/.env');
}

if ($_SERVER['APP_DEBUG']) {
    umask(0000);
}
