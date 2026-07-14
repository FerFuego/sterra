<?php

/**
 * Autoload of Classes
 */
spl_autoload_register(function($class) {
    include 'class-' . strtolower($class) . '.php';
});


// Posibles ubicaciones locales/remotas del .env
$paths = [
    __DIR__ . '/../.env',                         // Local dentro del proyecto
    dirname(__DIR__, 2) . '/.env',                // Otra posibilidad si estás un nivel más arriba
    $_SERVER['DOCUMENT_ROOT'] . '/.env',          // Hosting público
];

// DEBUG: Mostrar qué rutas se revisan
$debug = "Buscando .env...\n";

foreach ($paths as $path) {
    $exists = is_file($path) ? "EXISTE" : "no existe";
    $debug .= "Revisando: $path => $exists\n";

    if (is_file($path)) {
        // Cargar archivo .env
        $file = new SplFileObject($path);

        while (!$file->eof()) {
            $line = trim(str_replace('"', '', $file->fgets()));

            // Ignorar líneas vacías o comentarios
            if ($line === '' || str_starts_with($line, '#')) {
                continue;
            }

            putenv($line);
        }

        $debug .= ">>> CARGADO DESDE: $path\n";
        break; // ya cargamos uno, no seguimos
    }
}
?>