<?php

class Potion {
    private $nom;
    private $gain;

    function __construct($nm, $gn) {
        $this->nom = $nm;
        $this->gain = $gn;
    }

    /* GET */

    public function getNom() : string {
        return $this->nom;
    }

    public function getGain() : int {
        return $this->gain;
    }
}