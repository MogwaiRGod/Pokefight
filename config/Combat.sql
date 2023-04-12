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
-- Structure de la table `Combat`
--

CREATE TABLE `Combat` (
  `id_combat` int UNSIGNED NOT NULL,
  `id_pokemon1` int UNSIGNED NOT NULL,
  `id_pokemon2` int UNSIGNED NOT NULL,
  `id_joueur1` int UNSIGNED NOT NULL,
  `id_joueur2` int UNSIGNED DEFAULT NULL COMMENT 'Peut être NULL car peut s''agit de l''ordinateur',
  `score_joueur1` int UNSIGNED NOT NULL,
  `score_joueur2` int UNSIGNED NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Combat`
--

INSERT INTO `Combat` (`id_combat`, `id_pokemon1`, `id_pokemon2`, `id_joueur1`, `id_joueur2`, `score_joueur1`, `score_joueur2`, `date`) VALUES
(15, 1, 2, 1, NULL, 3, 0, '2023-04-12 09:03:32'),
(16, 1, 2, 1, NULL, 3, 0, '2023-04-12 09:03:33'),
(17, 1, 2, 1, NULL, 3, 0, '2023-04-12 09:12:14'),
(18, 1, 2, 1, NULL, 3, 0, '2023-04-12 09:12:16'),
(19, 1, 2, 1, NULL, 3, 0, '2023-04-12 09:15:55'),
(20, 1, 2, 1, NULL, 3, 0, '2023-04-12 09:17:29'),
(21, 1, 2, 1, NULL, 3, 0, '2023-04-12 09:19:05'),
(22, 1, 2, 1, NULL, 3, 0, '2023-04-12 09:19:13'),
(23, 1, 2, 1, NULL, 3, 0, '2023-04-12 09:20:18'),
(24, 1, 2, 1, NULL, 3, 0, '2023-04-12 09:20:32'),
(25, 1, 2, 1, NULL, 3, 0, '2023-04-12 09:21:09'),
(26, 1, 2, 1, NULL, 3, 0, '2023-04-12 09:21:20'),
(27, 1, 2, 1, NULL, 3, 0, '2023-04-12 09:21:37'),
(28, 1, 2, 1, NULL, 3, 0, '2023-04-12 09:21:57'),
(29, 1, 2, 1, NULL, 3, 0, '2023-04-12 09:22:32'),
(30, 1, 2, 1, NULL, 3, 0, '2023-04-12 09:22:57'),
(31, 1, 2, 1, NULL, 3, 0, '2023-04-12 09:23:09'),
(32, 1, 2, 1, NULL, 3, 0, '2023-04-12 09:25:14'),
(33, 1, 2, 1, NULL, 3, 0, '2023-04-12 09:30:04'),
(34, 1, 2, 1, NULL, 3, 0, '2023-04-12 09:30:54'),
(35, 1, 2, 1, NULL, 3, 0, '2023-04-12 09:42:19'),
(36, 1, 2, 1, NULL, 3, 0, '2023-04-12 09:42:20'),
(37, 1, 2, 1, NULL, 3, 0, '2023-04-12 09:42:57'),
(38, 1, 2, 1, NULL, 3, 0, '2023-04-12 09:44:10'),
(39, 1, 2, 1, NULL, 3, 0, '2023-04-12 09:46:38'),
(40, 1, 2, 1, NULL, 3, 0, '2023-04-12 09:46:55'),
(41, 1, 2, 1, NULL, 3, 0, '2023-04-12 09:48:38'),
(42, 1, 2, 1, NULL, 3, 0, '2023-04-12 09:48:49'),
(43, 1, 2, 1, NULL, 3, 0, '2023-04-12 09:49:01'),
(44, 1, 2, 1, NULL, 3, 0, '2023-04-12 09:49:24'),
(45, 1, 2, 1, NULL, 3, 0, '2023-04-12 09:49:48'),
(46, 1, 2, 1, NULL, 3, 0, '2023-04-12 10:27:31'),
(47, 1, 2, 1, NULL, 3, 0, '2023-04-12 10:30:36'),
(48, 1, 2, 1, NULL, 3, 0, '2023-04-12 10:31:03'),
(49, 1, 2, 1, NULL, 3, 0, '2023-04-12 10:31:28'),
(50, 1, 2, 1, NULL, 3, 0, '2023-04-12 10:31:38'),
(51, 1, 2, 1, NULL, 3, 0, '2023-04-12 10:32:35'),
(52, 1, 2, 1, NULL, 3, 0, '2023-04-12 10:32:44'),
(53, 1, 2, 1, NULL, 3, 0, '2023-04-12 10:32:55');

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
  MODIFY `id_combat` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

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
