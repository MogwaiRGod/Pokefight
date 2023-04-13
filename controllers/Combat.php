<?php

/**
 * Controller de la page de combat
 */

class Combat extends Controller {
    // méthode qui affiche la page de combat
    public function index() {
        var_dump($_POST);
        $this->render('combat');
    }
}