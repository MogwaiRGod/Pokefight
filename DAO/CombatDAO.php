<?php

// import de la fonction permettant de se connecter à la BDD
require_once 'database/database.php';

class CombatDAO extends Controller {
    // va contenir la connexion à la BDD
    private $dbCo;

    /* C : CREATE */

    public function create(Pokemon $pokemon1, Pokemon $pokemon2, int $idJoueur2 = NULL) : bool {
        /* connexion à la BDD */
        $this->dbCo = connectToDB();
    }

}