<?php

// http://requiremind.com/a-most-simple-php-mvc-beginners-tutorial/
// http://www.phptherightway.com/
// https://blog.pascal-martin.fr/post/php-53-namespace-2-espaces-de-noms.html

namespace App;

// Récupération de la configuration de l'application.
$conf = require('config.php');

require 'core/debugger.php';
require 'core/autoloader.php';

use App\Core\Debugger;
use App\Models\Database;

$db = new Database($conf);

//-----------------------------------------------

$results = $db->query("SELECT * FROM fakedata");

//-----------------------------------------------

require_once('views/DOMTop.php');

// Appel du debugger
Debugger::show();

// content ici

print("<pre>");
print_r($results);
print("</pre>");

require_once('views/DOMBottom.php');

?>
