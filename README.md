Pokéfight!
===

Elevez et envoyez à la mort vos Pokémons gratuitement !
---
> Site-web de jeu (solo ou duo) permettant d'envoyer en combats illégaux ses Pokémons et de se faire un maximum de points

### Auteur
Diane (MogwaiRGod)

# Table des matières
0. [Installation](#installation)
    1. [Prérequis](#prérequis)
    2. [Installation](#installation)
1. [Introduction](#introduction)
    1. [Contexte du projet](#contexte)
    2. [Description du projet](#description)
2. [Architecture](#architecture)
    1. [Organigramme](#organigramme)
    2. [Architecture détaillée](#architecture)
        0. [racine](#racine)
        1. [models](#models)
        2. [views](#views)
        3. [controllers](#controllers)
        4. [Compléments du MVC](#compléments)
            1. [DAO](#DAO)
            2. [core](#core)
        5. [autres](#autres)
            2. [config](#config)
            3. [utils](#utils)
3. [Technologies](#technologies)
4. [Fonctionnement](#fonctionnement)
5. [Utilisation (client)](#utilisation)

<br><hr><br>

# Installation
## Prérequis
## Installation

# Introduction
## Contexte du projet
## Description du projet

# Architecture
## Organigramme
```mermaid
graph TD
A(.htaccess)
B(index.php)
```
```mermaid
graph TD
C[models]
C-->J(Joueur.php) 
C-->K(Pokemon.php) 
C-->L(Potion.php)
```	
```mermaid
graph TD
D[views]
D-->M(combat.php)
D-->N(game_over.php)
D-->O(signin.php)
```	
```mermaid
graph TD
E[controllers]
E-->P(Combat.php)
E-->Q(Joueur.php)
E-->R(Login.php)
E-->S(Pokemon.php)
E-->T(Signin.php)
```	
```mermaid
graph TD
F[DAO]
F-->A(CombatDAO.php)
F-->B(JoueurDAO.php)
F-->C(PokemonDAO.php)
```	
```mermaid
graph TD
G[config]
G-->A(Combat.sql)
G-->B(Joueur.sql)
G-->C(Pokemon.sql)
G-->D(Potion.sql)
```	
```mermaid
graph TD
H[utils]
H-->A(autoload.php)
H-->B(error_handler.php)
H-->C(init.php)
H-->D(router.php)
H-->E(utils.php)
```	
```mermaid
graph TD
I[core]
I-->A(Controller.php)
```	

## Architecture détaillée
### racine
### models
Voir **Pokéfight_diagrammes** pour les diagrammes de classe.<br>
### views
### controllers
### Compléments du MVC
#### DAO
#### core
### autres
#### config
#### utils

# Technologies

# Fonctionnement

# Utilisation (client)
