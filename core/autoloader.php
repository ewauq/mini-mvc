<?php

/**
 * Inclut automatiquement les fichiers des classes instanciées.
 */
spl_autoload_register(function($namespace)
{
    $ds = DIRECTORY_SEPARATOR;

    $namespace = str_replace(array('/', '\\'), $ds, $namespace);

    $namespace_elements = explode($ds, $namespace);

    $file_name = end($namespace_elements);

    $file = __DIR__ . $ds . '..' . $ds . 'models' . $ds . $file_name . '.php';

    if(is_readable($file)) require_once($file);
});

?>
