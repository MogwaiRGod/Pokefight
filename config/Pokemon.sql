-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : db
-- Généré le : mer. 12 avr. 2023 à 11:29
-- Version du serveur : 8.0.32
-- Version de PHP : 8.1.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tutoseu`
--

-- --------------------------------------------------------

--
-- Structure de la table `Pokemon`
--

CREATE TABLE `Pokemon` (
  `id_pokemon` int UNSIGNED NOT NULL,
  `id_dresseur` int UNSIGNED DEFAULT NULL COMMENT 'Peut ne pas encore avoir de dresseur OU appartenir à l''ordinateur',
  `nom` varchar(50) NOT NULL,
  `pv` int UNSIGNED NOT NULL COMMENT 'points de vie actuels',
  `pc` int UNSIGNED NOT NULL COMMENT 'puissance de combat',
  `pvMax` int UNSIGNED NOT NULL,
  `type` set('Eau','Feu','Electrik','Plante') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'eau, feu...'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Pokemon`
--

INSERT INTO `Pokemon` (`id_pokemon`, `id_dresseur`, `nom`, `pv`, `pc`, `pvMax`, `type`) VALUES
(1, 8, 'Goupix', 161, 72, 161, 'Feu'),
(2, 8, 'Gruikui', 92, 70, 160, 'Feu'),
(3, 8, 'Lovdisc', 34, 50, 190, 'Eau'),
(4, 8, 'Triopikeau', 200, 73, 210, 'Eau');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Pokemon`
--
ALTER TABLE `Pokemon`
  ADD PRIMARY KEY (`id_pokemon`),
  ADD KEY `Pokemon_fk` (`id_dresseur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Pokemon`
--
ALTER TABLE `Pokemon`
  MODIFY `id_pokemon` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Pokemon`
--
ALTER TABLE `Pokemon`
  ADD CONSTRAINT `Pokemon_fk` FOREIGN KEY (`id_dresseur`) REFERENCES `Joueur` (`id_joueur`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
