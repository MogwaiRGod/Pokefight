<?php

// controller gérant l'inscription d'un utilisateur
class SignIn extends Controller {
    // hérite de $content = [] de la class Controller

    // méthode affichant le formulaire d'inscription
    public function index() {
        $this->render('signin');
    }

    // hérite de set($data) qui ++ des données à $content
    // hérite de render($fileName) qui affiche une page contenant les clefs => valeur de $content

    // méthode essayant d'ajouter un utilisateur à la BDD
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
        // affichage de la requête réussie
        echo "Inscription enregistrée";
        // // si l'opération est un succès
        // $info['message'] = [
        //     'msg' => 'Utilisateur créé avec succès'
        // ];

        // on ajoute les infos pertinentes de l'utilisateur à la superglobale $_SESSION
        $_SESSION['idUser'] = 1; /* TEST */
        $_SESSION['userName'] = $_POST['iptUsername'];
        $_SESSION['score'] = 0; /* par défaut */

        return true;
    }

    public function checkUser() {
        $checkUser = new UserDAO;
        if ($checkUser->verify($_POST)) {
            $info['tuto'] = [
                'msg' => 'Bien le bonjour'
            ];
            $this->set($info);
            $this->render('dashboard_tpl');
        }
        else {
            // ! rediriger vers l'accueil avec message d'erreur
            echo "Cet utilisateur n'existe pas";
        }
    }
}