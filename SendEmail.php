<?php

declare(strict_types=1);

// chemin vers le fichier console
$console = __DIR__ . '/bin/console';

// Commande à exécuter
$command = 'php ' . $console . ' messenger:consume async';

// Exécuter la commande
exec($command);
