<?php

/**
 * Classe abstraite parente de tous les controllers
 */

abstract class Controller {
    /* contenu à envoyer à la page */
    protected $content = [];

    /* SET */

    // méthode permettant d'ajouter des données au contenu à envoyer
    // data : tableau associatif
    public function set($data) : void {
        // array_merge() : concatène des tableaux
        $this->content = array_merge($this->content, $data);
    }

    /* LOGIQUE METIER */

    // méthode permettant d'afficher une page du répertoire views, selon le nom du fichier entré en argument
    public function render($fileName) : void {
        /* extract($tableau_associatif) : extrait les clefs du tableau associatif et les déclare sous forme de variables
        dans le script */
        // extrait les clefs du contenu à envoyer et en instancie les variables
        extract($this->content);
        // import du fichier dont le nom est entré en argument
        require(ROOT . 'views/' . $fileName . '.php');
    }
}