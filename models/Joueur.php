<?php

class Joueur {
    private $pseudo;
    private $mail;
    private $score;
    private $password;

    function __construct($psd, $ml, $pssw) {
        $this->pseudo = $psd;
        $this->mail = $ml;
        $this->password = $pssw;
        /* score à 0 par défaut à la création du joueur */
        $this->score = 0;
    }
}