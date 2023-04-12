<?php

// fonction permettant de se connecter à la BDD et retournant la représentation
// (Objet PDO) de cette connexion
function connectToDB() {
    // import des données d'accès à la BDD
    require_once ROOT . 'DAO/database/db_info.php';

    // tentative de connexion
    try {
        /* Objet PDO : instancie (représente) une co vers une BDD */
        $dbCo = new PDO(
            /* DSN = Data Source Name = chaîne contenant toutes les informations
            nécessaires pour se connecter à la BDD */
            "mysql:host=$host;dbname=$dbName",
            $user,
            $pass
        );
        var_dump($dbCo);
        $dbCo->setAttribute(
            /* On active le report d'erreur de PDO */
            PDO::ATTR_ERRMODE,
            /* On demande qu'en cas d'erreur, des Exceptions PDO soient soulevées */ 
            PDO::ERRMODE_EXCEPTION
        );
    }
    catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $dbCo;
}