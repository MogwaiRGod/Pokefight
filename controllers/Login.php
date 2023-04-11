<?php

// controller gérant la connexion d'un utilisateur
class Login extends Controller {
    // hérite de $content = [] de la class Controller

    // méthode vérifiant si l'utilisateur tentant de se connecter existe
    public function checkUser() : bool {
        // récupération des données de connexion
        $pseudo = $_POST['logUsername'];
        $password = $_POST['logPw'];
        
        // redirection
        return false;
    }
}