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
            echo $e->getMessage();
            return false;
        }
        // // si l'opération est un succès
        // $info['message'] = [
        //     'msg' => 'Utilisateur créé avec succès'
        // ];
        // // on va loguer l'utilisateur et le rediriger vers son dashboard

        // // on ajoute les infos pertinentes de l'utilisateur à la superglobale $_SESSION
        // $_SESSION['idUser'] = 1; /* TEST */
        // $_SESSION['userName'] = $_POST['userName'];
        // // concatène $info à $content
        // $this->set($info);
        // // on a donc envoyé $info extrait en tant que clef => valeur à dashboard_tpl
        // // càd que message est devenue une variable, plus précisément un tableau avec msg une clef
        // // => $message['msg'] -> 'Utilisateur créé avec succès'
        // $this->render('dashboard_tpl');
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