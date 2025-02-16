<?php

declare(strict_types=1);

// Chemin vers le fichier console de Symfony
$console = __DIR__ . '/bin/console';

// Commande à exécuter
$command = 'php ' . $console . ' messenger:consume async';

exec(command: $command);
