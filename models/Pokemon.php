<?php

class Pokemon {
    private $nom;
    private $pv /* points de vie courant */;
    private $pc /* puissance de combat = dégâts qu'il inflige en attaquant */;
    private $pvMax /* points de vie maximum */;
    private $type /* eau, feu...*/;
    private $dresseur /* Joueur */;

    function __construct($nm, $tp, $pc, $max) {
        $this->nom = $nm;
        $this->type = $tp;
        $this->pc = $pc;
        $this->pvMax = $max;
        /* le nombre de pv disponible est celui maximum à la création du pokemon */
        $this->pv = $max;
    }
}