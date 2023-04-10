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
        1. [racine](#racine)
        2. [models](#models)
        3. [views](#views)
        4. [controllers](#controllers)
        5. [Compléments du MVC](#compléments)
            1. [DAO](#DAO)
            2. [core](#core)
        6. [autres](#autres)
            1. [config](#config)
            2. [utils](#utils)
3. [Technologies](#technologies)
4. [Fonctionnement](#fonctionnement)
5. [Utilisation (client)](#utilisation)

<br><hr><br>

# Installation
Le site fonctionne en local.

## Prérequis
1. Importer le programme dans un **container PHP et mysql** et le mettre à la racine.
2. Créer une base de données et vérifier que son nom/l'utilisateur/le mot de passe correspondent aux données dans ``/DAO/db_info.php``. Importer les structures de table (``/config``) dans la BDD (à l'aide d'une invite de commande ou d'une interface MYSQL, e.g ``MySQLWorkbench`` ou ``PHPMyAdmin``).
3. Dans le container, vérifier que ``a2enmod`` est activé. Entrer : <br>
``a2enmod rewrite``<br>
Cela permet l'utilisation du fichier ``.htaccess`` (nécessaire).

## Installation
Aucune autre démarche n'est nécessaie.<br>
Pour ouvrir le site, ouvrir un navigateur et entrer ``localhost``.


# Introduction
## Contexte du projet
Ce projet a été réalisé dans le cadre d'une formation en développement web. Il a pour but d'évaluer la mise en place d'un projet respectant une **architecture MVC**, **l'application du langage PHP et de la POO**, et d'autres compétences (création/gestion d'une BDD, fonctionnalités de signin/login etc.)

## Description du projet


# Architecture

## Organigramme
```mermaid
graph TD;
A(.htaccess)
B(index.php)
```
```mermaid
graph TD;
C[models]
C-->J(Joueur.php) 
C-->K(Pokemon.php) 
C-->L(Potion.php)
```	
```mermaid
graph TD;
D[views]
D-->M(combat.php)
D-->N(game_over.php)
D-->O(signin.php)
```	
```mermaid
graph TD;
E[controllers]
E-->P(Combat.php)
E-->Q(Joueur.php)
E-->R(Login.php)
E-->S(Pokemon.php)
E-->T(Signin.php)
```	
```mermaid
graph TD;
F[DAO]
F-->A(CombatDAO.php)
F-->B(JoueurDAO.php)
F-->C(PokemonDAO.php)
```	
```mermaid
graph TD;
G[config]
G-->A(Combat.sql)
G-->B(Joueur.sql)
G-->C(Pokemon.sql)
G-->D(Potion.sql)
```	
```mermaid
graph TD;
H[utils]
H-->A(autoload.php)
H-->B(error_handler.php)
H-->C(init.php)
H-->D(router.php)
H-->E(utils.php)
```	
```mermaid
graph TD;
I[core]
I-->A(Controller.php)
```	

## Architecture détaillée

### racine
| Fichier | Contenu |
|:--:|:--|
| .htaccess | Fichier permettant la réécriture des URL du script. Les URL seront alors sous forme ``localhost/param/param..`` au lieu de ``localhost?p=param&p2=param2...``|
| index.php | Page d'accueil = point d'entrée du site |


### models
> Voir **Pokéfight_diagrammes** pour les diagrammes de classe.<br>
| Classe | Contenu |
|:--:|:--|
| Joueur.php |  |
| Pokemon.php | |
| Potion.php | |

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
