<?php

// fonction permettant de se connecter à la BDD et retournant la représentation
// (Objet PDO) de cette connexion OU faux si elle a échoué
function connectToDB() {
    // import des infos BDD
    include_once(ROOT . "/DAO/database/db_info.php");

    /* nom de l'hôte de la BDD */
    $host = "db";
    /* votre nom d'utilisateur */
    $user = "myuser";
    /* votre mdp */
    $pass = "monpassword";
    /* nom de la BDD */
    $dbName = "tutoseu";

    // tentative de connexion
    try {
        /* Objet PDO : instancie (représente) une co vers une BDD */
        $dbCo = new PDO(
            "mysql:host=" . $host . ";dbname=" . "$dbName",
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
    catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
    // on retourne la connexion    
    return $dbCo;

}