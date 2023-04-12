<?php

// récupération des composants de l'URL
$params = explode(
    '/',
    /* On a défini dans le .htaccess que, dans l'URL, les paramètres seraient nommés p ;
    on récupère donc dans $_GET (car c'est avec la méthode GET que les paramètres apparaissent dans l'URL)
    la VALEUR des paramètres avec 'p'*/
    $_GET['p']
);

/**
 * param[0] : controller
 * param[1] : méthode
 * param[2]++ : arguments
 */ 

// on évalue les paramètres extraits de l'URL pour définir la route demandée
// s'il y a un paramètre dans l'URL -> on définit le controller correspondant
if ($params[0]) {
    $controller = $params[0];

} 
else {
    // pas de paramètre => page d'accueil
    $controller = 'Home';
}

// s'il y a un deuxième paramètre -> définit la méthode du controller
if (isset($params[1])) {
    $method = $params[1];
} 
// sinon : index par défaut
else {
    $method = 'index';
}

// dernier paramètre : arguments de la méthode appelée
if (isset($params[2])) {
    $args = $params[2];
} 
// pas d'arguments par défaut
else {
    $args = '';
}

// $called est le chemin de la classe à appeler
$called = 'controllers/' . $controller . '.php';
// on importe le controller correspondant
require ($called);

// si une méthode a été entrée dans l'URL => 
// vérification qu'elle existe
if (method_exists(/* classe */ $controller,/* méthode à vérifier */ $method)){
    // instanciation du controller appelé dans l'URL
    $newController = new $controller();
    // invocation de sa méthode appelée dans l'URL
    if (isset($args)) {
        // si des arguments on été entrés dans l'URL
        $newController->$method($args);
    }
    else {
        $newController->$method();
    }
}
else {
    echo 'Erreur 404 : méthode non-existante';
}