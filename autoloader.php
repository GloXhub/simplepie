<?php
spl_autoload_register(function ($class) {
    // Namespace prefix à gérer
    $prefix = 'SimplePie\\';

    // Base directory relative où se trouve SimplePie
    $base_dir = __DIR__ . '/src/';

    // Vérifier si la classe commence par le préfixe
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        // Non, ignorer
        return;
    }

    // Obtenir la partie relative de la classe
    $relative_class = substr($class, $len);

    // Construire le chemin vers le fichier
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    // Inclure si le fichier existe
    if (file_exists($file)) {
        require $file;
    }
});
