-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : sam. 18 jan. 2025 à 12:02
-- Version du serveur : 8.0.40-0ubuntu0.22.04.1
-- Version de PHP : 8.1.2-1ubuntu2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `grimpe_un_arbre`
--

-- --------------------------------------------------------

--
-- Structure de la table `comptes`
--

CREATE TABLE `comptes` (
  `identifiant` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `mot_de_passe` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `niveau` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'Indéfini',
  `arbres_grimpes` int NOT NULL DEFAULT '0',
  `date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `comptes`
--

INSERT INTO `comptes` (`identifiant`, `mot_de_passe`, `niveau`, `arbres_grimpes`, `date_creation`) VALUES
('admin', 'Motdep4sse', 'Indéfini', 0, '2025-01-16 21:02:31'),
('eribri', 'Test12345', 'Indéfini', 0, '2025-01-16 21:02:31'),
('faubom', 'Sécur1té', 'Indéfini', 0, '2025-01-16 21:02:31');

-- --------------------------------------------------------

--
-- Structure de la table `publications`
--

CREATE TABLE `publications` (
  `titre` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `auteur` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id` int NOT NULL,
  `contenu` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `publications`
--

INSERT INTO `publications` (`titre`, `auteur`, `date_creation`, `id`, `contenu`) VALUES
('Premier post !', 'admin', '2025-01-16 21:00:37', 1, 'Bonjour les amis, ceci est un premier post afin de tester le site. En espérant que ça marche.'),
('Second post', 'admin', '2025-01-16 21:01:43', 2, 'Ceci est une second post un peu plus tardif afin de vérifier si l\'affichage des publications se fait correctement (normalement c\'est du plus récent au plus ancien).'),
('Troisième post', 'eribri', '2025-01-17 08:29:19', 3, 'Bonjour tout le monde.');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comptes`
--
ALTER TABLE `comptes`
  ADD UNIQUE KEY `identifiant` (`identifiant`);

--
-- Index pour la table `publications`
--
ALTER TABLE `publications`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `publications`
--
ALTER TABLE `publications`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
