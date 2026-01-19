-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 22 oct. 2025 à 16:42
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
-- Structure de la table `modules`
--

CREATE TABLE `modules` (
  `id` binary(16) NOT NULL COMMENT '(DC2Type:uuid)',
  `theme_id` binary(16) NOT NULL COMMENT '(DC2Type:uuid)',
  `title` varchar(100) DEFAULT NULL,
  `description` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `modules`
--

INSERT INTO `modules` (`id`, `theme_id`, `title`, `description`) VALUES
(0x01995711971f7b60a3d3a2e054e09a1d, 0x0199570f84907fb481a31a3cc699c766, 'APP - T1 - Connaitre les règles vitales et les appliquer', NULL),
(0x0199571237f7764db02ad092f7b0a89d, 0x0199570f84907fb481a31a3cc699c766, 'APP - T1 - Connaitre les règles sécuritaires et les appliquer', NULL),
(0x01995712f9417f18899d87093e773a5c, 0x0199570fc2d973f697cfe1786b5722fd, 'APP - T1 - Identifier le port des EPI adaptés et savoir comment les récupérer', NULL),
(0x0199571349c97c0ba7c3692ae724a856, 0x019957100acf7d5dad0f24f65856637d, 'APP - T1 - Respect des horaires de travail', NULL),
(0x0199571630d97855a982ff95e75727e4, 0x0199570e09f675208381dd760c6f698f, 'APP - T1 à T4 - Savoir décrire le fonctionnement de la centrale de manière générale', NULL),
(0x01995716a19f7e60b0cb314c7e6b7cb0, 0x0199570e09f675208381dd760c6f698f, 'APP - T1 à T4 - Connaitre les fonctions de sûreté', NULL),
(0x01995717012b78e8ab2f304290fbf4e4, 0x0199570e97df7c95929a97cf811246f7, 'APP - T1 à T4 - Savoir se repérer sur l\'installation', NULL),
(0x0199571850cd7ea0aa3484b9c7120059, 0x0199570dc2647a7fb6db88c86c7cbaad, 'APP - T4 à T8 - Expliquer son projet d\'étude', NULL),
(0x01995718d8c574e58f70bc6a8cb15676, 0x0199570f41187233a029582f191fbd0c, 'APP - T1 à T8 - Respect des règles et consignes', NULL),
(0x01995719251078c5807a56a9c3ff2d56, 0x0199570f41187233a029582f191fbd0c, 'APP - T1 à T8 - Communication efficace', NULL),
(0x019957196da07288ad6163e779758284, 0x0199570f41187233a029582f191fbd0c, 'APP - T1 à T8 - Rigueur / traçabilité', NULL),
(0x01995719c2807e72a6f0503735ab7467, 0x0199570f41187233a029582f191fbd0c, 'APP - T1 à T8 - Curiosité', NULL),
(0x01995719fbcb7be6b465f3053b55f744, 0x0199570f41187233a029582f191fbd0c, 'APP - T1 à T8 - Ponctualité', NULL),
(0x0199571a7e2a7d77b79668d327a3a874, 0x0199570f41187233a029582f191fbd0c, 'APP - T1 à T8 - Travail en équipe', NULL),
(0x0199571ac8f4721fa9a4aa1ea69a064c, 0x0199570f41187233a029582f191fbd0c, 'APP - T1 à T8 - Adopter une attitude vigilance partagée', NULL),
(0x0199571b0e957652b5aa87d276f3ed5f, 0x0199570f41187233a029582f191fbd0c, 'APP - T1 à T8 - Autonomie progressive', NULL),
(0x0199571d07ff7b75b8470c55ea54f60b, 0x0199570dc2647a7fb6db88c86c7cbaad, 'APP - T1 à T8 - Bilan', '<div>Faire le bilan de la période passée à l\'école (sacraliser à minima 1h après chaque période d’école et reprendre ou faire reprendre les points en retrait)</div>'),
(0x0199572024e7781a9f7ca06aca9157e8, 0x0199570fc2d973f697cfe1786b5722fd, 'APP - T1 à T8 - Habilitations & autorisations', NULL),
(0x0199573a928074a5ae7e24e414dd9558, 0x0199570e09f675208381dd760c6f698f, 'APP - T2 à T4 - Connaitre les systèmes de sauvegarde', NULL),
(0x0199573b06f87743832a50cbc2b5387c, 0x0199570e4228731ea323ea52f4c4464f, 'APP - T2 à T4 - Connait l\'organisation et les responsabilités de l\'équipe et du service', NULL),
(0x0199573d0bbe72bf9609ab2113a77b24, 0x0199570eff037041842184e204e37ca1, 'APP - T2 à T4 - Lire un schéma mécanique', NULL),
(0x0199573d4ba97162a927aef3fa76b604, 0x0199570eff037041842184e204e37ca1, 'APP - T2 à T4 - Lire un plan en mécanique', NULL),
(0x01995743170574f08a7f39f57b8f6105, 0x0199570e09f675208381dd760c6f698f, 'APP - T2 à T6 - Connaitre les évènements majeurs dans le monde nucléaire', NULL),
(0x01995743f07f7f1eab8c9073e45288e6, 0x0199570e4228731ea323ea52f4c4464f, 'APP - T2 à T6 - Connait l\'organisation et les responsabilités des services du site', NULL),
(0x019957448802757ca6bb84f8ef233d1c, 0x0199570e4228731ea323ea52f4c4464f, 'APP - T2 à T4 - Connaitre les types d\'arrêts de tranche', NULL),
(0x0199574587017f4db4844f6303976ce5, 0x0199570dc2647a7fb6db88c86c7cbaad, 'APP - T4 à T8 - Moments d\'échanges', '<div>Echanger avec tuteur et MPL et MPLD sur son rapport&nbsp;et soutenir à l\'oral son projet plusieurs fois en amont&nbsp;</div>'),
(0x01995746628272de9ea78c0363a3d3a3, 0x0199570e09f675208381dd760c6f698f, 'APP - T5 à T8 - Expliquer la défense en profondeur', NULL),
(0x0199574773f67f45be8ce1898a0fc0a2, 0x0199570e09f675208381dd760c6f698f, 'APP - T2 à T8 - Expliquer le rôle du système sur lequel il intervient', NULL),
(0x019957480a7e7720bf1160151939101c, 0x0199570e09f675208381dd760c6f698f, 'APP - T5 à T8 - Expliquer le rôle des RGE', NULL),
(0x0199574878fa78d988c12212b96c4486, 0x0199570e09f675208381dd760c6f698f, 'APP - T5 à T8 - Expliquer les EIP et la qualification des matériels', NULL),
(0x0199574963c67df1af6747d03a5a80e3, 0x0199570e97df7c95929a97cf811246f7, 'APP - T3 à T6 - S\'approprier un dossier d\'intervention', NULL),
(0x0199574bb5ce74c8a03c27aa1b5d75fe, 0x0199570e97df7c95929a97cf811246f7, 'APP - T3 à T6 - Rechercher un document dans l\'ECM', NULL),
(0x0199574bea0b75ce86fcf64bf76d1126, 0x0199570e97df7c95929a97cf811246f7, 'APP - T3 à T6 - Rechercher un OT dans l\'EAM ou WebDRT', NULL),
(0x0199574c460776c6bd05157749798aa6, 0x0199570e97df7c95929a97cf811246f7, 'APP - T3 à T6 - Rechercher les exigences d\'un matériel dans l\'EAM ou WebDRT', NULL),
(0x0199574c798071a19aca0a3a415d2e61, 0x0199570e97df7c95929a97cf811246f7, 'APP - T7 à T8 - Constituer un dossier d\'intervention simple', NULL),
(0x0199574ca0707311bcf07a4fe5953672, 0x0199570e97df7c95929a97cf811246f7, 'APP - T3 à T8 - Rédiger un compte-rendu d\'intervention', NULL),
(0x0199574d60117bf889359441bccbaa81, 0x0199570eff037041842184e204e37ca1, 'APP - T2 à T8 - Savoir prendre des cotes', '<div>Métrologie en générale</div>'),
(0x0199574d947b759c8ae1928cf824e89b, 0x0199570eff037041842184e204e37ca1, 'APP - T2 à T8 - Régler une clé dynamométrique', NULL),
(0x0199574dbf897d8893cef99bde291934, 0x0199570eff037041842184e204e37ca1, 'APP - T2 à T8 - Réaliser un serrage au couple', NULL),
(0x0199574df77c7482b48532ab36f8669b, 0x0199570eff037041842184e204e37ca1, 'APP - T4 à T8 - Faire un lignage horizontal moteur pompe', NULL),
(0x0199574e36df7f9c8ec839bb49095cee, 0x0199570eff037041842184e204e37ca1, 'APP - T2 à T8 - Procéder à un graissage ou lubrification', NULL),
(0x0199574e613b75cc9d8af00441fb3113, 0x0199570eff037041842184e204e37ca1, 'APP - T2 à T8 - Remplacer un joint', NULL),
(0x0199574ea77374c1be88ce94e737abbe, 0x0199570eff037041842184e204e37ca1, 'APP - T2 à T8 - Remplacer une courroie', NULL),
(0x0199574f13bd725299f1839e16825ae4, 0x0199570f84907fb481a31a3cc699c766, 'APP - T3 à T6 - Connaitre les pratiques de performance humaine et les appliquer', NULL),
(0x0199574f7fdd7e9e9a5b8fbd0a12a2a0, 0x0199570f84907fb481a31a3cc699c766, 'APP - T3 à T6 - Connaitre les règles de tenue de chantier', '<div>Dont risque incendie et gestion des produits chimiques</div>'),
(0x0199575005667b9a8f97f25b34e33b31, 0x0199570f84907fb481a31a3cc699c766, 'APP - T5 à T8 - Connaitre la gestion des anomalie (DT/FC)', NULL),
(0x01995750edf074fcb6a06afe5f7051eb, 0x0199570f84907fb481a31a3cc699c766, 'APP - T3 à T6 - Connaitre la notion de requalification', NULL),
(0x019957512e1f7a33b5cc19fddb4dc349, 0x0199570f84907fb481a31a3cc699c766, 'APP - T3 à T6 - Connaitre la notion de FME et mettre en œuvre les parades', NULL),
(0x0199575170fd77609926682967df879c, 0x0199570f84907fb481a31a3cc699c766, 'APP - T5 à T8 - Connaitre les règles d\'Assurance-Qualité', NULL),
(0x01995751cd57795486a3d75a7173abbf, 0x0199570f84907fb481a31a3cc699c766, 'APP - T5 à T8 - Connaitre la notion de contrôle technique', NULL),
(0x01995752062272cca9ebc92daf7ea98c, 0x0199570f84907fb481a31a3cc699c766, 'APP - T7 à T8 - Animer un Pré-job briefing', NULL),
(0x01995752439b7d6692d21cdb8abb6aeb, 0x0199570f84907fb481a31a3cc699c766, 'APP - T7 à T8 - Réaliser une Analyse 1N d\'un dossier simple', NULL),
(0x0199575360dd790fa0110634569d2229, 0x0199570fc2d973f697cfe1786b5722fd, 'APP - T1 à T2 - Connaitre les règles d\'accès en zone contrôlée', NULL),
(0x01995753bb307d1cb86b6aeb166dbb87, 0x0199570fc2d973f697cfe1786b5722fd, 'APP - T3 à T6 - Régime de travail', NULL),
(0x0199575416347a96b43b8b8abb09b76c, 0x0199570fc2d973f697cfe1786b5722fd, 'APP - T5 à T8 - Contrôler un échafaudage avant de l\'utiliser', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_2EB743D759027487` (`theme_id`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `modules`
--
ALTER TABLE `modules`
  ADD CONSTRAINT `FK_2EB743D759027487` FOREIGN KEY (`theme_id`) REFERENCES `themes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
