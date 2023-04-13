<?php

// import de la fonction permettant de se connecter à la BDD
require_once 'database/database.php';

// pour le CRUD de Pokemons
class PokemonDAO extends Controller {
    // va contenir la connexion à la BDD
    private $dbCo;

    /* READ */
    public function read(){

    } 

    // fonction retournant toutes les infos d'un Pokémon selon l'ID d'un utilisateur
    public function readAll($idUser) {
        /* connexion à la BDD */
        $this->dbCo = connectToDB();

        // requête à envoyer
        $statement = "
            SELECT type, nom, pv, pvMax, pc, id_pokemon
            FROM Pokemon
            WHERE `id_dresseur` = :id;
        ";

        // préparation de la requête
        $query = $this->dbCo->prepare($statement);

        // binding de la valeur
        $query->bindValue(':id', $idUser);

        // exécution
        try {
            $query->execute();
        }
        catch (PDOException $e) {
            return false;
        }
        // récupération du tableau de résultats
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        
        // on retourne le tableau de résultats demandé
        return $result;
    }
} // fin PokemonDAO