<?php

// import de la fonction permettant de se connecter à la BDD
require_once 'database/database.php';

class JoueurDAO extends Controller {
    // va contenir la connexion à la BDD
    private $dbCo;

    /* C : CREATE */
    // méthode permettant d'ajouter un utilisateur à la BDD
    public function create($data /* tableau associatif de données utilisateur */) : bool {
        /* connexion à la BDD */
        $this->dbCo = connectToDB();

        /* récupération des données à envoyer */
        $userName = $data['iptUsername'];
        $mail = $data['iptMail'];
        // hashage du mdp avant envoi dans la BDD
        $password = hash('md5' /* algo */, $data['iptPw'] /* donnée */);

        /* vérification des données = est-ce que le nom d'utilisateur demandé est déjà attribué ? 
        est-ce que le mail est déjà utilisé ? */
        // 1 : préparation de la requête de vérification
        $checkData = $this->dbCo->prepare("
            SELECT * FROM Joueur
            WHERE (`pseudo` = :pseudo) OR (`mail` = :mail) ;
        ");

        // 2-3 : binding + exécution
        try {
            $checkData->execute([
                ':pseudo' => $userName,
                ':mail' => $mail
            ]);
        }
        catch (PDOException $e) {
            echo $e->getMessage();
        }

        // 4 : récupération des résultats
        /* fetch() : méthode de PDOStatement retournant la prochaine rangée de résultat de la requête */
        $result = $checkData->fetch(
            /* constante : mode de retour de la rangée de résultat ;
            par défaut : tableau associatif colonne => cellule */
        );

        // si le nom d'utilisateur est déjà pris
        if (isset($result['pseudo']) && $result['pseudo'] === $userName) {
            throw new Exception("Nom d'utilisateur non-disponible");
            return false;
        }
        // si le mail est déjà utilisé
        if (isset($result['mail']) && $result['mail'] === $mail) {
            throw new Exception("Mél déjà utilisé");
            return false;
        }

        // sinon, requête préparée pour ajouter l'utilisateur à la BDD
        else {
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
                return false;
            } // fin try/catch
        } // fin si    
    } // fin create

    /* R : READ */
    // fonction permettant d'afficher une plusieurs données demandées 
    // (tableau $requestedData)
    // selon une donnée donnée (le mél, le nom d'utilisateur ou l'ID)
    // $givenData est un tableau associatif "nom colonne" => donnée
    public function read($givenData, $requestedData) {
        /* connexion à la BDD */
        $this->dbCo = connectToDB();

    } // fin read

    /* U : UPDATE */
    // fonction permettant de màj une donnée de l'utilisateur sélectionné par son ID
    // selon le nom de la donnée, et la valeur de la donnée ($data)
    public function update(int $id, String $dataName, $data) : bool {
        // connexion à la BDD
        $this->dbCo = connectToDB();

        // requête pour màj une donnée de l'utilisateur dans la BDD
        $statement = "
            UPDATE `Joueur` 
            SET `$dataName` = '$data' 
            WHERE `Joueur`.`id_joueur` = :id; 
        ";
        // préparation de la requête
        $query = $this->dbCo->prepare($statement);

        // binding des valeurs
        $query->bindValue(':id', $id);
        // exécution de la requête
        try {
            $query->execute();
            return true;
        }
        catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
        return true;
    } // fin update

    /* D : DELETE */
    // méthode permettant de supprimer un utilisateur de la BDD selon son ID
    // retourne un booléen selon l'issue de l'opération
    public function delete($id) {
    } // fin delete

} // fin JoueurDAO