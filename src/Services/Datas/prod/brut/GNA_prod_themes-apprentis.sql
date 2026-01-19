-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 22 oct. 2025 à 16:39
-- Version du serveur : 11.8.3-MariaDB-log
-- Version de PHP : 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `u917117533_db_gna`
--

-- --------------------------------------------------------

--
-- Structure de la table `themes`
--

CREATE TABLE `themes` (
  `id` binary(16) NOT NULL COMMENT '(DC2Type:uuid)',
  `title` varchar(100) NOT NULL,
  `description` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `themes`
--

INSERT INTO `themes` (`id`, `title`, `description`) VALUES
(0x0199570dc2647a7fb6db88c86c7cbaad, 'APPRENTIS - Ecole et projet', NULL),
(0x0199570e09f675208381dd760c6f698f, 'APPRENTIS - Fonctionnement & culture sûreté', NULL),
(0x0199570e4228731ea323ea52f4c4464f, 'APPRENTIS - Fonctionnement du site', NULL),
(0x0199570e97df7c95929a97cf811246f7, 'APPRENTIS - Apprentissage transverse', NULL),
(0x0199570eff037041842184e204e37ca1, 'APPRENTIS - Savoir-faire', NULL),
(0x0199570f41187233a029582f191fbd0c, 'APPRENTIS - Savoir-être', NULL),
(0x0199570f84907fb481a31a3cc699c766, 'APPRENTIS - Fondamentaux professionnel du nucléaire', NULL),
(0x0199570fc2d973f697cfe1786b5722fd, 'APPRENTIS - Sécurité', NULL),
(0x019957100acf7d5dad0f24f65856637d, 'APPRENTIS - Règlementation du travail', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `themes`
--
ALTER TABLE `themes`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
