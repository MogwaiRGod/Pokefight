<?php

// import de la fonction permettant de se connecter à la BDD
require_once ("database/database.php");

class CombatDAO extends Controller {
    // va contenir la connexion à la BDD
    private $dbCo;

    /* C : CREATE */

    // méthode permettant d'ajouter un combat à la BDD
    public function create(
        /* Pokémon du joueur 1 = le joueur connecté */
        Pokemon $pokemon1, 
        /* Pokémon du joueur 2 */
        Pokemon $pokemon2,
        /* score joueur 1 */
        int $score1, 
        /* score joueur 2 = adversaire */
        int $score2, 
        /* par défaut, l'adversaire est l'ordinateur */
        int $idJoueur2 = NULL
    ) : bool {
        /* connexion à la BDD */
        $this->dbCo = connectToDB();

        /* récupération des données à envoyer */
        $idPokemon1 = 1; // A FAIRE
        $idPokemon2 = 2; // A FAIRE

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
        }
        catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
        return true;
    }
}