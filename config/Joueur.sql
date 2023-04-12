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
-- Structure de la table `Joueur`
--

CREATE TABLE `Joueur` (
  `id_joueur` int UNSIGNED NOT NULL,
  `mail` varchar(100) NOT NULL,
  `score` int UNSIGNED NOT NULL DEFAULT '0',
  `mot_de_passe` varchar(100) NOT NULL,
  `pseudo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Joueur`
--

INSERT INTO `Joueur` (`id_joueur`, `mail`, `score`, `mot_de_passe`, `pseudo`) VALUES
(1, 'xavier@mel.fr', 9, '4fcb2a6a94799df0a7217cb5bf0e679e', 'XDDLPokemon'),
(2, 'xd@mel.fr', 0, '4fcb2a6a94799df0a7217cb5bf0e679e', 'Pokelol'),
(7, 'kkk@mel.fr', 0, '4fcb2a6a94799df0a7217cb5bf0e679e', 'kkkk'),
(8, 'pedro@love.fr', 0, '068b7576e162b2bf1f9754d671525cd4', 'pedrolove'),
(9, 'pedro@mel.fr', 0, '4fcb2a6a94799df0a7217cb5bf0e679e', 'elpedro');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Joueur`
--
ALTER TABLE `Joueur`
  ADD PRIMARY KEY (`id_joueur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Joueur`
--
ALTER TABLE `Joueur`
  MODIFY `id_joueur` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
