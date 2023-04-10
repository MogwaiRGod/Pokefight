<?php

// va être appelée à chaque fois que le script de base rencontre une classe non-déclarée
spl_autoload_register(function($class /* nom de la classe non-déclarée */) {
    // tous les répertoires contenant des classes
    $sources = array(
        "controllers/$class.php",
        "DAO/$class.php", 
        "models/$class.php", 
        "core/$class.php"
    );

    // on boucle dans les répertoires
    foreach ($sources as $source) {
        // si on trouve le chemin de la classe correspondante
        if (file_exists($source)) {
            // import de la classe
            require_once $source;
        } 
    } 
});