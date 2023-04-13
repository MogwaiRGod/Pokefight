<?php

require_once ROOT . "utils/fonctions.php";

// controller de la page gérant l'inscription d'un utilisateur
class SignIn extends Controller {

    // hérite de render($fileName) qui affiche une page contenant les clefs => valeur de $content

    // méthode affichant le formulaire d'inscription
    public function index() {
        $this->render('signin');
    }

    // méthode permettant d'ajouter un utilisateur à la BDD
    // et affichant un message selon si l'opération a été un succès ou non
    public function addJoueur() {
        // crée un objet UserDAO
        $newJoueur = new JoueurDAO;

        /* on demande à ajouter un utilisateur selon les données dans $_POST
        càd les données du formulaire envoyé */
        try {
            $newJoueur->create($_POST);
        }
        catch(Exception $e) {
            // affichage de l'erreur le cas échéant
            echo $e->getMessage();
            return false;
        }

        // on ajoute les infos pertinentes de l'utilisateur à la superglobale $_SESSION
        $idUser = $newJoueur->read(['pseudo' => $_POST['iptUsername']], 'id_joueur');
        $_SESSION['idUser'] = $idUser;
        $_SESSION['userName'] = $_POST['iptUsername'];
        $_SESSION['score'] = 0; /* 0 par défaut */

        // ? affichage d'un message court attestant de la réussite de l'opération ?

        // redirection vers l'accueil (dashboard)
        $this->render('home');

        unset($newJoueur);

        return true;
    }
}