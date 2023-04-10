<?php

class Joueur {
    private $pseudo;
    private $mail;
    private $score;
    private $password;

    /* Méthodes magiques */

    function __construct($psd, $ml, $pssw) {
        $this->pseudo = $psd;
        $this->mail = $ml;
        $this->password = $pssw;
        /* score à 0 par défaut à la création du joueur */
        $this->score = 0;
    }

    // quand Joueur est utilisé en tant que chaîne -> retourne le pseudo
    public function __toString() {
        return $this->getPseudo();
    }

    /* GET */

    public function getPseudo() : string {
        return $this->pseudo;
    }

    public function getMail() : string {
        return $this->mail;
    }

    public function getScore() : int {
        return $this->score;
    }

    /* SET */

    public function setPseudo(string $newPseudo) : void {
        $this->pseudo = $newPseudo;
    }

    public function setMail(string $newMail) : void {
        $this->mail = $newMail;
    }

    public function setPassword(string $newPw) : void {
        $this->password = $newPw;
    }

}