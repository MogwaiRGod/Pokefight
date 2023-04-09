-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : db
-- Généré le : dim. 09 avr. 2023 à 20:57
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
-- Structure de la table `Combat`
--

CREATE TABLE `Combat` (
  `id_combat` int UNSIGNED NOT NULL,
  `id_pokemon1` int UNSIGNED NOT NULL,
  `id_pokemon2` int UNSIGNED NOT NULL,
  `id_joueur1` int UNSIGNED NOT NULL,
  `id_joueur2` int UNSIGNED NOT NULL,
  `score_joueur1` int UNSIGNED NOT NULL,
  `score_joueur2` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Combat`
--
ALTER TABLE `Combat`
  ADD PRIMARY KEY (`id_combat`),
  ADD KEY `fk_joueur1` (`id_joueur1`),
  ADD KEY `fk_joueur2` (`id_joueur2`),
  ADD KEY `fk_poke1` (`id_pokemon1`),
  ADD KEY `fk_poke2` (`id_pokemon2`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Combat`
--
ALTER TABLE `Combat`
  MODIFY `id_combat` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Combat`
--
ALTER TABLE `Combat`
  ADD CONSTRAINT `fk_joueur1` FOREIGN KEY (`id_joueur1`) REFERENCES `Joueur` (`id_joueur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_joueur2` FOREIGN KEY (`id_joueur2`) REFERENCES `Joueur` (`id_joueur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_poke1` FOREIGN KEY (`id_pokemon1`) REFERENCES `Pokemon` (`id_pokemon`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_poke2` FOREIGN KEY (`id_pokemon2`) REFERENCES `Pokemon` (`id_pokemon`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
