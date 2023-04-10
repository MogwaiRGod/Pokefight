<?php

// import de la fonction permettant de se connecter à la BDD
require_once 'database/database.php';

class JoueurDAO extends Controller {
    // va contenir la connexion à la BDD
    private $dbCo;

    /* C : CREATE */

    // méthode permettant d'ajouter un utilisateur à la BDD
    public function create($data /* tableau associatif de données utilisateur */) {
        /* connexion à la BDD */
        $this->dbCo = connectToDB();

        /* récupération des données à envoyer */
        $userName = $data['iptUsername'];
        $mail = $data['iptMail'];
        // hashage du mdp avant envoi dans la BDD
        $password = hash('md5' /* algo */, $data['iptPw'] /* donnée */);

        /* vérification des données = est-ce que le nom d'utilisateur demandé est déjà attribué ? */
        // 1 : préparation de la requête de vérification
        /* /!\ la méthode prepare() sur un objet PDO RETOURNE un objet PDOStatement :
        représente une requête préparée =>
        ici $checkData est un PDOStatement */
        $checkData = $this->dbCo->prepare("
            SELECT * FROM Joueur
            WHERE (`pseudo` = :pseudo);
        ");
        // 2 : binding = association d'une valeur à un paramètre d'une requête préparée
        $checkData->bindValue(
            /* paramètre à remplacer dans la requête */
            ':pseudo', 
            /* valeur */
            $userName
        );
        // 3 : exécution
        $checkData->execute();
        // 4 : récupération des résultats
        /* fetch() : méthode de PDOStatement retournant la prochaine rangée de résultat de la requête */
        $result = $checkData->fetch(
            /* constante : mode de retour de la rangée de résultat ;
            par défaut : tableau associatif colonne => cellule */
        );

        // si le nom d'utilisateur est déjà pris
        if (isset($result['pseudo']) && $result['pseudo'] === $userName) {
            throw new Exception("Nom d'utilisateur non-disponible");
        }
        // // sinon, requête préparée pour ajouter l'utilisateur à la BDD
        else {
            /* Requête préparée */

            // préparation de la requête
            $statement = $this->dbCo->prepare("
                INSERT INTO Joueur(pseudo, mail, mot_de_passe)
                VALUES (:pseudo, :mail, :mdp);
            ");

            try {
            // binding + exécution de la requête
                $statement->execute(array(
                    ':pseudo' => $userName,
                    ':mail' => $mail,
                    ':mdp' => $password
                ));
                return true;
            }
            catch (PDOException $e) {
                echo $e->getMessage();
            } // fin try/catch
        } // fin si    
    } // fin create
} // fin UserDAO