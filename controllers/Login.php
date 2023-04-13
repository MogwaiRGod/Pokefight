<?php

// import de la fonction permettant de se connecter à la BDD
require_once (ROOT . "/DAO/database/database.php");

// controller gérant la paxe de connexion d'un utilisateur
class Login extends Controller {
    // connexion BDD
    private $dbCo;

    // méthode vérifiant si l'utilisateur tentant de se connecter existe
    // $data est un tableau associatif contenant les données de connexion
    private function checkUser($data) : bool {
        /* connexion à la BDD */
        $this->dbCo = connectToDB();

        // récupération des données de connexion
        $pseudo = $data['logUsername'];
        $password = $data['logPw'];

        // requête pour verifier que l'utilisateur existe
        $statement = "
            SELECT * 
            FROM Joueur
            WHERE pseudo = :username AND mot_de_passe = :mdp;
        ";

        // préparation de la requête
        $query = $this->dbCo->prepare($statement);
        $binding = [
            ":username" => $pseudo,
            ":mdp" => $password
        ];

        // binding + exécution de la requête
        try {
            return $query->execute($binding);
        }
        catch (PDOException $e){
            echo $e->getMessage();
            return false;
        }

        return true;
    }

    // fonction permettant de récupérer l'ID d'un utilisateur existant selon son nom d'utilisateur
    // retourne -1 si une erreur est survenue
    private function getId($username) : int {
        /* connexion à la BDD */
        $this->dbCo = connectToDB();

        // requête pour récupérer l'ID
        $statement = "
            SELECT id_joueur 
            FROM Joueur
            WHERE pseudo = :pseudo;
        ";

        // préparation de la requête
        $query = $this->dbCo->prepare($statement);

        // binding
        $query->bindValue(':pseudo', $username);

        // tentative d'exécution de la requête
        try {
            $query->execute();
        }
        catch (PDOException $e){
            echo $e->getMessage();
            return -1;
        }
        // récupération des résultats
        $result = $query->fetch(PDO::FETCH_ASSOC);

        return $result['id_joueur'];
    }

    // fonction permettant de récupérer le score d'un utilisateur existant selon son ID
    // retourne -1 si une erreur est survenue
    private function getScore($id) : int{
        /* connexion à la BDD */
        $this->dbCo = connectToDB();

        // requête pour récupérer l'ID
        $statement = "
            SELECT score 
            FROM Joueur
            WHERE id_joueur = :id;
        ";

        // préparation de la requête
        $query = $this->dbCo->prepare($statement);

        // binding
        $query->bindValue(':id', $id);

        // tentative d'exécution de la requête
        try {
            $query->execute();
        }
        catch (PDOException $e){
            echo $e->getMessage();
            return -1;
        }
        // récupération des résultats
        $result = $query->fetch(PDO::FETCH_ASSOC);

        return $result['score'];
    }

    // méthode permettant de logguer un utilisateur
    public function log() : bool {
        // données de connexion
        $data = $_POST;

        // si l'utilisateur existe	
        if ($this->checkUser($_POST)) {
            // on le log <=> on met les infos que l'on souhaite dans $_SESSION
            $_SESSION['userName'] = $_POST['logUsername'];
            $_SESSION['idUser'] = $this->getId($_SESSION['userName']);
            $_SESSION['score'] = $this->getScore($_SESSION['idUser']);
            
            // affichage du dashboard
            $this->render('home');
            return true;
        }
        // sinon : on envoie une erreur
        else {
            throw new PDOException("Identifiant ou mot de passe incorrect");
            return false;
        }
    }
}