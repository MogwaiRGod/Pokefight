<?php

class Potion {
    private $nom;
    private $gain;

    function __construct($nm, $gn) {
        $this->nom = $nm;
        $this->gain = $gn;
    }
}