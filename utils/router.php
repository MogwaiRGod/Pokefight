<?php

// à cause du Rewriting de l'URL, il y a par défaut un paramètre (vide) dans l'URL => $_GET a un élément
// s'il y a des paramètres dans l'URL

// récupération des composants de l'URL
$params = explode(
    '/',
    /* On a défini dans le .htaccess que, dans l'URL, les paramètres seraient nommés p ;
    on récupère donc dans $_GET (car c'est avec la méthode GET que les paramètres apparaissent dans l'URL)
    la VALEUR des paramètres */
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

} else {
    // pas de paramètre => page d'accueil
    $controller = 'Home';
}
if (isset($params[1])) {
    $method = $params[1];
} else {
    $method = 'Index';
}
if (isset($params[2])) {
    // echo 'ok';
    $args = $params[2];
} else {
    $args = '';
}

// $called est le chemin de la classe à appeler
$called = 'controllers/' . $controller . '.php';
// on importe le controller correspondant
require ($called);
// echo $called;

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