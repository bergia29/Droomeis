-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 14 jan. 2025 à 11:21
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mydb`
--

-- --------------------------------------------------------

--
-- Structure de la table `activité`
--

CREATE TABLE `activité` (
  `idActivité` int(11) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `durée` time NOT NULL,
  `date` date NOT NULL,
  `descriptionA` mediumtext NOT NULL,
  `Destination_idDestination` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `idAdmin` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `date_creation` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`idAdmin`, `email`, `password`, `nom`, `date_creation`) VALUES
(1, 'bignondjidonou@gmail.com', '$2y$10$YGcK1r1b5yBFxLDvKK/nBOwxlmChE7vNcmA34sA5pAhQAWBnPC79W', 'Charnelle', '2025-01-08 22:35:54'),
(2, 'bergiadjidonou@gmail.com', '$2y$10$DQnWImEpcfD2w9m/6VJL9eGaA58wDQrEH9C0KSAm0BAydi2Lgd5nS', 'charnelle.djidonou@eleve.isep.fr', '2025-01-10 08:05:03');

-- --------------------------------------------------------

--
-- Structure de la table `cgu`
--

CREATE TABLE `cgu` (
  `idCgu` int(11) NOT NULL,
  `règles` mediumtext NOT NULL,
  `datePublication` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `destination`
--

CREATE TABLE `destination` (
  `idDestination` int(11) NOT NULL,
  `nomD` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `localisation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `destination`
--

INSERT INTO `destination` (`idDestination`, `nomD`, `description`, `localisation`) VALUES
(1, 'Sun Siyam Iru Veli', '', 'Maldives'),
(2, 'Bali', '', 'Indonésie'),
(3, 'New York City', '', 'États-Unis'),
(4, 'Cappadoce', '', 'Turquie'),
(5, 'Pékin', '', 'Chine'),
(6, 'Santorin', '', 'Grèce'),
(7, 'Rome', 'ghv', 'Italie'),
(8, 'Le Caire', '', 'Égypte'),
(9, 'Chamomix', '', 'France'),
(10, 'Serengeti', '', 'Tanzanie'),
(11, 'El Chaltén', '', 'Argentine'),
(12, 'Kalymnos', '', 'Grèce'),
(13, 'Amalfi', 'dfghjkjnhbvc', 'Italie'),
(14, 'Wadi Rum', '', 'Jordanie'),
(15, 'Mont Fuji', '', 'Japon'),
(16, 'Kyoto', '', 'Japon'),
(17, 'Parc Kruger', '', 'Afrique du Sud'),
(18, 'Marrakech', '', 'Maroc'),
(19, 'Queensland', '', 'Australie'),
(20, 'Rome', 'Pays des Merveille', 'Italie');

-- --------------------------------------------------------

--
-- Structure de la table `faq`
--

CREATE TABLE `faq` (
  `idFaq` int(11) NOT NULL,
  `questionF` mediumtext NOT NULL,
  `réponseF` mediumtext NOT NULL,
  `dateCréationF` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `guide_activite`
--

CREATE TABLE `guide_activite` (
  `Utilisateur_idUtilisateur` int(11) NOT NULL,
  `Activité_idActivité` int(11) NOT NULL,
  `Activité_Destination_idDestination` int(11) NOT NULL,
  `prix` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `messagerie`
--

CREATE TABLE `messagerie` (
  `idMessagerie` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `corps_texte` mediumtext NOT NULL,
  `envoye_a` timestamp NULL DEFAULT current_timestamp(),
  `lu_ou_non_lu` tinyint(4) DEFAULT 0,
  `Utilisateur_idExpediteur` int(11) NOT NULL,
  `Utilisateur_idRecepteur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `messagerie`
--

INSERT INTO `messagerie` (`idMessagerie`, `subject`, `corps_texte`, `envoye_a`, `lu_ou_non_lu`, `Utilisateur_idExpediteur`, `Utilisateur_idRecepteur`) VALUES
(1, 'naznznt(jk(', '\'n(jtyj-y', '2025-01-13 14:16:07', 0, 17, 10),
(2, 'ér fj', 'rkfhbnjtg', '2025-01-13 14:21:06', 0, 17, 17);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `emailU` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `expiration` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `password_resets`
--

INSERT INTO `password_resets` (`emailU`, `token`, `created_at`, `expiration`) VALUES
('charnelle.djidonou@eleve.isep.fr', 'f11d5d53bb90bec86d7303826b4b2309a452bc94d38db4c5dabb1b6ea907ee56', '2024-12-17 21:44:54', '2024-12-17 23:44:54'),
('charnelle.djidonou@eleve.isep.fr', 'be1b5af132a56c49efc793d6e1d4d08479c6709d0b1657438339bced63a987db', '2024-12-17 21:44:56', '2024-12-17 23:44:56'),
('charnelle.djidonou@eleve.isep.fr', '61165e27582359c19f7b8db422432d7ae62958e510fd3fae146483bd9c9560ab', '2024-12-19 19:44:43', '2024-12-19 21:44:43'),
('charnelle.djidonou@eleve.isep.fr', '5ff507dde722033736bd6f6f546cf87ec7de895f7c0b73e8d8ea449133ba23e5', '2024-12-19 19:54:13', '2024-12-19 21:54:13'),
('charnelle.djidonou@eleve.isep.fr', '13744f31f6abe4e19c84b6de54db7848b999b4f2917950f692ddfb88c479818b', '2024-12-20 13:38:29', '2024-12-20 15:38:29'),
('charnelle.djidonou@eleve.isep.fr', 'c0adb46d9976f8093e8f44e7dfdca8afc62dba0978b8f43265387ee0ef6e072f', '2025-01-06 13:02:33', '2025-01-06 15:02:33'),
('charnelle.djidonou@eleve.isep.fr', 'ba325d150e01593307f485f066049a5de0286846d904e0b43e46cb5daa00bf51', '2025-01-06 13:37:46', '2025-01-06 15:37:46'),
('charnelle.djidonou@eleve.isep.fr', '494040685b9016b1aa4b61cd0e5637a2659ac6d8146b12db98547802a0557a14', '2025-01-07 09:39:03', '2025-01-07 11:39:03'),
('charnelle.djidonou@eleve.isep.fr', '2bdb05869b433c26739f827e4e1a5d79630d4ea2c75b0f4630a207a75eea6735', '2025-01-07 11:04:03', '2025-01-07 13:04:03'),
('charnelle.djidonou@eleve.isep.fr', '44528acac45470bc6e3bb4a23d2e42d957254f427e284683e0b23aec296716ad', '2025-01-07 11:06:08', '2025-01-07 13:06:08'),
('charnelle.djidonou@eleve.isep.fr', '54eb3513ea583c07956e01c3d0dfbd0f57b360322d09e748ab44ca77023f9b96', '2025-01-07 11:10:48', '2025-01-07 13:10:48'),
('charnelle.djidonou@eleve.isep.fr', '71e726fb22518be1800214589a12d6f02ef0727ac6a84dec5548a1416ace310e', '2025-01-07 13:09:42', '2025-01-07 15:09:42'),
('charnelle.djidonou@eleve.isep.fr', '043dd2c714b59c6b10f6795b7b64701bb32c03ce30ef193ba4c9801f4ba47524', '2025-01-08 21:40:44', '2025-01-08 23:40:44');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idUtilisateur` int(11) NOT NULL,
  `emailU` varchar(255) NOT NULL,
  `passwordU` varchar(255) NOT NULL,
  `nomU` varchar(45) NOT NULL,
  `prénomU` varchar(45) NOT NULL,
  `dateNaissanceU` varchar(45) NOT NULL,
  `adressePostalU` varchar(45) NOT NULL,
  `role` enum('guide','voyageur') NOT NULL,
  `cree_a` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `emailU`, `passwordU`, `nomU`, `prénomU`, `dateNaissanceU`, `adressePostalU`, `role`, `cree_a`) VALUES
(9, 'navalingame.cindia.91@gmail.com', '$2y$10$1gQGM7bwHrGBx3obuf.yhutvobUmLLSbqVNocRVqfccvYzKAGq7l.', 'Navalingame', 'Cindia', '2003-04-16', '24 rue des commandements', 'voyageur', '2024-12-20 12:52:25'),
(10, 'hongdao.zhang@eleve.isep.fr', '$2y$10$zYMba9CDMc1uWBuuejVX6.UMhKuRMCcTQj3dFa/PwzPplb5cD6pTm', 'ZHANG', 'HONGDAO', '2024-12-05', 'paris 75018', 'voyageur', '2024-12-20 12:55:54'),
(12, 'hedi.yazid@isep.fr', '$2y$10$GO0Rv/zLaYC2fE2j1Oau2.xYf7slvrLX9pg33cehkMzdFq7bSyiSC', 'YAZID', 'Hedi', '2008-07-18', 'paris 75019', 'voyageur', '2024-12-20 13:36:19'),
(14, 'bignondjidonou@gmail.com', '$2y$10$zpi4kXoWDzv1UvNitkBaQ.kvm9m2L9yzgbExZgBbsC80KLhHp.g4G', 'YAZID', 'Hedi', '2025-01-04', 'paris 75019', 'voyageur', '2025-01-06 12:09:41'),
(17, 'charnelle.djidonou@eleve.isep.fr', '$2y$10$KHgST0ctOpm3VznMVcofWeMjGZ0spoQZ8TTBVxUJQVeCZfg9gJVUO', 'DJIDONOU', 'Charnelle Bergia Bignon', '2004-03-29', '4 Rue Rambuteau 75003 Paris', 'guide', '2025-01-09 23:48:15');

-- --------------------------------------------------------

--
-- Structure de la table `voyageur_activité`
--

CREATE TABLE `voyageur_activité` (
  `Activité_idActivité` int(11) NOT NULL,
  `Activité_Destination_idDestination` int(11) NOT NULL,
  `Utilisateur_idUtilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `activité`
--
ALTER TABLE `activité`
  ADD PRIMARY KEY (`idActivité`,`Destination_idDestination`),
  ADD UNIQUE KEY `nom_UNIQUE` (`nom`),
  ADD KEY `Destination_idDestination` (`Destination_idDestination`);

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`idAdmin`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- Index pour la table `cgu`
--
ALTER TABLE `cgu`
  ADD PRIMARY KEY (`idCgu`);

--
-- Index pour la table `destination`
--
ALTER TABLE `destination`
  ADD PRIMARY KEY (`idDestination`),
  ADD UNIQUE KEY `idDestination_UNIQUE` (`idDestination`);

--
-- Index pour la table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`idFaq`);

--
-- Index pour la table `guide_activite`
--
ALTER TABLE `guide_activite`
  ADD PRIMARY KEY (`Utilisateur_idUtilisateur`,`Activité_idActivité`,`Activité_Destination_idDestination`),
  ADD KEY `Activité_idActivité` (`Activité_idActivité`,`Activité_Destination_idDestination`);

--
-- Index pour la table `messagerie`
--
ALTER TABLE `messagerie`
  ADD PRIMARY KEY (`idMessagerie`),
  ADD KEY `Utilisateur_idExpediteur` (`Utilisateur_idExpediteur`),
  ADD KEY `Utilisateur_idRecepteur` (`Utilisateur_idRecepteur`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idUtilisateur`),
  ADD UNIQUE KEY `emailV_UNIQUE` (`emailU`);

--
-- Index pour la table `voyageur_activité`
--
ALTER TABLE `voyageur_activité`
  ADD PRIMARY KEY (`Activité_idActivité`,`Activité_Destination_idDestination`,`Utilisateur_idUtilisateur`),
  ADD KEY `Utilisateur_idUtilisateur` (`Utilisateur_idUtilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `activité`
--
ALTER TABLE `activité`
  MODIFY `idActivité` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `cgu`
--
ALTER TABLE `cgu`
  MODIFY `idCgu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `destination`
--
ALTER TABLE `destination`
  MODIFY `idDestination` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `faq`
--
ALTER TABLE `faq`
  MODIFY `idFaq` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `messagerie`
--
ALTER TABLE `messagerie`
  MODIFY `idMessagerie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `activité`
--
ALTER TABLE `activité`
  ADD CONSTRAINT `activité_ibfk_1` FOREIGN KEY (`Destination_idDestination`) REFERENCES `destination` (`idDestination`) ON DELETE CASCADE;

--
-- Contraintes pour la table `guide_activite`
--
ALTER TABLE `guide_activite`
  ADD CONSTRAINT `guide_activite_ibfk_1` FOREIGN KEY (`Utilisateur_idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`) ON DELETE CASCADE,
  ADD CONSTRAINT `guide_activite_ibfk_2` FOREIGN KEY (`Activité_idActivité`,`Activité_Destination_idDestination`) REFERENCES `activité` (`idActivité`, `Destination_idDestination`) ON DELETE CASCADE;

--
-- Contraintes pour la table `messagerie`
--
ALTER TABLE `messagerie`
  ADD CONSTRAINT `messagerie_ibfk_1` FOREIGN KEY (`Utilisateur_idExpediteur`) REFERENCES `utilisateur` (`idUtilisateur`) ON DELETE CASCADE,
  ADD CONSTRAINT `messagerie_ibfk_2` FOREIGN KEY (`Utilisateur_idRecepteur`) REFERENCES `utilisateur` (`idUtilisateur`) ON DELETE CASCADE;

--
-- Contraintes pour la table `voyageur_activité`
--
ALTER TABLE `voyageur_activité`
  ADD CONSTRAINT `voyageur_activité_ibfk_1` FOREIGN KEY (`Activité_idActivité`,`Activité_Destination_idDestination`) REFERENCES `activité` (`idActivité`, `Destination_idDestination`) ON DELETE CASCADE,
  ADD CONSTRAINT `voyageur_activité_ibfk_2` FOREIGN KEY (`Utilisateur_idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
