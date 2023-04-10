<?php

// fonction permettant de se connecter à la BDD et retournant la représentation
// (Objet PDO) de cette connexion
function connectToDB() {
    // import des données d'accès à la BDD
    require_once 'db_info.php';

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
        $dbCo->setAttribute(
            /* On active le report d'erreur de PDO */
            PDO::ATTR_ERRMODE,
            /* On demande qu'en cas d'erreur, des Exceptions PDO soient soulevées */ 
            PDO::ERRMODE_EXCEPTION
        );
    }
    /* Une PDOException est une sous-classe d'Exception. C'est une Exception spécifique
    à l'extension PDO. On l'utilise car cette Exception est soulevée à l'occurence d'une erreur
    lors de l'exécution d'une requête */
    catch (PDOException $e) {
        echo $e->getMessage();
    }

    return $dbCo;
}