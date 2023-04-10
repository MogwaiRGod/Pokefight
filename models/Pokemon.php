<?php

class Pokemon {
    private $nom;
    private $pv /* points de vie courant */;
    private $pc /* puissance de combat = dégâts qu'il inflige en attaquant */;
    private $pvMax /* points de vie maximum */;
    private $type /* eau, feu...*/;
    private $dresseur /* Joueur : NULL par défaut*/;

    /* Méthodes magiques */

    function __construct($nm, $tp) {
        $this->nom = $nm;
        $this->type = $tp;
        $this->pc = mt_rand(70, 85); // points d'attaque aléatoires
        $this->pvMax = mt_rand(210 , 255); // on décide que le nom de points de vie est aléatoire
        /* le nombre de pv disponible est celui maximum à la création du pokemon */
        $this->pv = $this->pvMax;
    }

    // quand Pokémon est utilisé en tant que chaîne -> retourne une chaîne avec son nom et ses PV
    function __toString() {
        return $this->getNom() . " a " . $this->pv . " PV";
    }

    /* GET */

    public function getNom() : string {
        return $this->nom;
    }

    public function getPV() : int {
        return $this->pv;
    }

    public function getPVMax() : int {
        return $this->pvMax;
    }

    public function getType() : string {
        return $this->type;
    }

    public function getDresseur() {
        return $this->dresseur;
    }

    /* SET */

    public function setDresseur(Joueur $dresseur) : void {
        $this->dresseur = $dresseur;
    }

    /* LOGIQUE METIER */

    // méthode permettant de faire boire une potion au pokémon
    public function boitPotion(Potion $potion) : void {
        // affichaque d'un message annonçant l'action
        echo $this->nom . " boit une potion (" . $potion->getNom() . ") de " . $potion->getGain() . " PV<br>";
        $this->addGain($potion->getGain());
        return;
    }

    // méthode faisant perdre (ou non) des PV au pokémon
    // retourne un booléen si le pokémon est toujours en vie ou non
    public function subPV(int $points) : bool {
        if ($this->pv - $points <= 0) {
            $this->pv = 0;
            echo $this->nom . " est KO<br>";
            return false;
        }
        else {
            $this->pv -= $points;
            return true;
        }
    }

    // méthode ajoutant (ou non) des PV au pokémon
    private function addGain(int $points) : void {        
        if ($this->pv + $points >= $this->pvMax) {
            $this->pv = $this->pvMax;
        }
        else {
            $this->pv += $points;
        }
        echo $this->nom . " a " . $this->pv . " PV<br>";
        return;
    }

    // méthode retournant si le pokémon est dead ou non
    public function estVivant() : bool {
        if ($this->pv === 0) {
            return false;
        } 
        else {
            return true;
        }
    }

    // méthode retournant le nom de points de dégâts que le pokémon inflige à son adversaire
    private function deterDegats($typeAdverse /* type du pokémon adverse */) : int {
        // dégâts à retourner
        $degats = $this->pc;

        // si les deux pokémons sont de même type
        // ou si le pokémon adverse est de type plante (et que le pokémon n'est pas de type feu)
        // ou si le pokémon est de type feu et l'adversaire de type eau
        // ou si le pokémon est de type plante et l'adversaire de type feu
        if (($this->type === $typeAdverse) || ($typeAdverse === "plante" && $this->type !== "feu") || ($this->type === "feu" && $typeAdverse == "eau") || ($this->type === "plante" && $typeAdverse === "feu")) {
            // dégâts divisés par 2
            return $degats /= 2;
        }
        // sinon si le pokémon adverse est de type electrik
        // ou si le pokémon est de type electrik et l'adversaire de type feu
        elseif (($typeAdverse == "electrik") || ($this->type === "electrik" && $typeAdverse === "feu")){
            // dégâts normaux
            return $degats;
        }
        // pour le reste, les dégâts sont multipliés par 2
        else {
            return $degats *= 2;
        }
    }

    // pour que le pokémon attaque un autre pokémon
    public function attaque(Pokemon $poke) : void {
        // les dégats que va infliger le pokémon à son adversaire
        $degats = $this->deterDegats($poke->getType());

        // début du combat
        // affichage des messages
        echo $this->nom . ' attaque ' . $poke->getNom() . '<br>';
        echo $this->nom . ' inflige ' . $degats . ' dégâts à ' . $poke->getNom() . '<br>';
        // on inflige les dégâts à l'adversaire
        $poke->subPV($degats);

        return;
    }

    // méthode statique occasionnant un combat entre 2 pokémons
    public static function combat(Pokemon $poke1, Pokemon $poke2, $seuil = 40) : void {
        // tableau contenant les 2 créatures
        $combattants = [$poke1, $poke2];
        // choix aléatoire du premier combattant à attaquer
        $tour = mt_rand(0,1);

        // début du combat
        echo "Début du combat : " . $combattants[$tour]->getNom() . " VS. " . $combattants[!$tour]->getNom() . "<hr>";
        // tant que les 2 pokémons sont en vie
        while ($poke1->estVivant() && $poke2->estVivant()) {
            // ils s'attaquent l'un après l'autre
            // vérification que le pokémon dont c'est le tour a suffisamment de PV ; si non
            if ($combattants[$tour]->getPV() <= $seuil) {
                // il boit une potion
                $combattants[$tour]->boitPotion(new Potion("Cokemon", mt_rand(20, 50)));
            }
            // si oui, il attaque le pokémon
            else {
                $combattants[$tour]->attaque($combattants[!$tour]);
            }
            // on affiche à chaque fois les points de vie du pokémon brutalisé
            // s'il est KO : fin du combat
            if (!$combattants[!$tour]->estVivant()) {
                // affichage du message de fin
                echo "<hr>" . $combattants[$tour]->getNom() . " a vaincu " . $combattants[!$tour]->getNom();
                return;
            }
            echo $combattants[!$tour] . "<br><hr>";
            // on change le tour
            $tour = !$tour; 
        }
    }
}