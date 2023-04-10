<?php

/**
 * Controller de la page d'accueil
 */

class Home extends Controller {
    // méthode qui affiche la page d'accueil
    public function index() {
        $this->render('home');
    }
}