<?php

/* Définition des chemins de base */

// define () : définit des constantes
// ROOT : chemin absolu qui va mener à d'éventuels répertoires/fichiers
define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));
// WEBROOT : chemin à partir du répertoire de travail (puis même chose)
define('WEBROOT', str_replace('index.php', '', $_SERVER['SCRIPT_NAME']));

/* Classe abstraite du controller */

$abstract_controller = ROOT.'core/Controller.php';
require($abstract_controller);