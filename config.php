<?php

namespace App\Config;

ini_set('error_reporting', E_ALL);

return array(

    /**
     * Le nom ou l'adresse du serveur web.
     */
    'host' => 'localhost',

    /**
     * Le nom de la base de données à utiliser.
     */
    'database' => 'test',

    /**
     * Le nom d'utilisateur MySQL.
     */
    'user' => 'root',

    /**
     * Le mot de passe utilisateur MySQL.
     */
    'password' => '',

    /**
     * Le port d'accès à MySQL, par défaut le port est 3306.
     */
    'port' => '3306',

    /**
     * Le temps d'attente en secondes avant que MySQL ne renvoie un timeout.
     */
    'timeout' => 30,

    /**
     * Le chemin de base de l'application, où se trouve le fichier index.php.
     * Ne pas inclure le dernier / dans le chemin complet.
     */
    'base_app' => 'http://localhost/projects/php/mini-mvc'

);

?>
