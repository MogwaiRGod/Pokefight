<?php

/** 
 * Script des tests
 */
include 'utils/init.php';
// tests méthodes de base pokemon
$poke = new Pokemon("Triopikeau", "eau");
// echo $poke->getNom() . "<br>";
// echo $poke->getPV() . "<br>";
// echo $poke->getPVMax() . "<br>";
// echo $poke->getType() . "<br>";
// echo $poke;

// tests méthodes de base joueurs
$xavier = new Joueur("XavierDupontDeLigonnèsPokemon", "XDDL@mail.com", "triangledesbermudes44");
// echo $xavier->getPseudo() . "<br>";
// echo $xavier->getMail() . "<br>";
// echo $xavier->getScore() . "<br>";
// $xavier->setPseudo("Roudoudou") . "<br>";
// $xavier->setMail("XDDL@yahoo.com") . "<br>";
// $xavier->setPassword("magiemagie") . "<br>";
// var_dump($xavier);

$poke->setDresseur($xavier);
// echo "<hr>";
// var_dump($poke);
// print_r($poke->getDresseur());
// echo "<hr>";

$crackeball = new Potion("Crackeball", 20);
// var_dump($crackeball);


// test de potion sur le pokémon
$poke->subPV(60);

// $poke->boitPotion($crackeball);
echo "<hr>";
// var_dump($poke);

// if($poke->estVivant()) {
//     echo $poke->getNom() . " est vivant<br>";
// } 
// else {
//     echo $poke->getNom() . " est dead<br>";
// }

// test combat
$adversaire = new Pokemon("Chartor", "feu");
// var_dump($poke);
// var_dump($adversaire);
Pokemon::combat($poke, $adversaire);