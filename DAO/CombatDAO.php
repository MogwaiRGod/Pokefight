<?php

// import de la fonction permettant de se connecter à la BDD
require_once 'database/database.php';

class CombatDAO extends Controller {
    // va contenir la connexion à la BDD
    private $dbCo;

    /* C : CREATE */

    // méthode permettant d'ajouter un combat à la BDD
    public function create(Pokemon $pokemon1, Pokemon $pokemon2, int $score1, int $score2, int $idJoueur2 = NULL) : bool {
        /* connexion à la BDD */
        $this->dbCo = connectToDB();

        /* récupération des données à envoyer */
        $idPokemon1 = 1; // test
        $idPokemon2 = 2; // test

        $binding = array(
            ':id1' => $idPokemon1,
            ':id2' => $idPokemon2,
            ':score1' => $score1,
            ':score2' => $score2,
            ':id_joueur1' => $_SESSION['idUser']
        );

        if (!isset($idJoueur2)){
            $statement = "
                INSERT INTO Combat(id_joueur1, id_pokemon1, id_pokemon2, score_joueur1, score_joueur2)
                VALUES (:id_joueur1, :id1, :id2, :score1, :score2);
            ";
        }
        else {
            $statement = "
            INSERT INTO Combat(id_joueur1,id_pokemon1, id_pokemon2, score_joueur1, score_joueur2, id_joueur2)
            VALUES (:id_joueur1, :id1, :id2, :score1, :score2, :id_joueur2);
            ";
            $binding[":id_joueur2"] = $idJoueur2;
        }

        // préparation de la requête
        $query = $this->dbCo->prepare($statement);

        // binding + exécution de la requête
        try {
            $query->execute($binding);
            return true;
        }
        catch (PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
}