-- Script SQL avec ID auto-incrémentés et mots de passe en VARCHAR(255)

-- Création du schéma
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8;
USE `mydb`;

-- Table Destination
DROP TABLE IF EXISTS `Destination`;

CREATE TABLE `Destination` (
  `idDestination` INT NOT NULL AUTO_INCREMENT,
  `nomD` VARCHAR(255) NOT NULL,
  `description` MEDIUMTEXT NOT NULL,
  `localisation` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`idDestination`),
  UNIQUE INDEX `idDestination_UNIQUE` (`idDestination`)
) ENGINE = InnoDB;

-- Table Activité
DROP TABLE IF EXISTS `Activité`;

CREATE TABLE `Activité` (
  `idActivité` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NOT NULL,
  `durée` TIME NOT NULL,
  `date` DATE NOT NULL,
  `descriptionA` MEDIUMTEXT NOT NULL,
  `Destination_idDestination` INT NOT NULL,
  PRIMARY KEY (`idActivité`, `Destination_idDestination`),
  UNIQUE INDEX `nom_UNIQUE` (`nom`),
  FOREIGN KEY (`Destination_idDestination`) REFERENCES `Destination` (`idDestination`)
    ON DELETE CASCADE
) ENGINE = InnoDB;

-- Table Utilisateur
DROP TABLE IF EXISTS `Utilisateur`;

CREATE TABLE `Utilisateur` (
  `idUtilisateur` INT NOT NULL AUTO_INCREMENT,
  `emailU` VARCHAR(255) NOT NULL,
  `passwordU` VARCHAR(255) NOT NULL, -- Taille ajustée pour mots de passe sécurisés
  `nomU` VARCHAR(45) NOT NULL,
  `prénomU` VARCHAR(45) NOT NULL,
  `dateNaissanceU` VARCHAR(45) NOT NULL,
  `adressePostalU` VARCHAR(45) NOT NULL,
  `role` ENUM('guide', 'voyageur') NOT NULL,
  `cree_a` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idUtilisateur`),
  UNIQUE INDEX `emailV_UNIQUE` (`emailU`)
) ENGINE = InnoDB;

-- Table Administrateur
DROP TABLE IF EXISTS `Administrateur`;

CREATE TABLE `Administrateur` (
  `idAdmin` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL, -- Taille ajustée pour mots de passe sécurisés
  PRIMARY KEY (`idAdmin`),
  UNIQUE INDEX `email_UNIQUE` (`email`)
) ENGINE = InnoDB;

-- Table FAQ
DROP TABLE IF EXISTS `FAQ`;

CREATE TABLE `FAQ` (
  `idFaq` INT NOT NULL AUTO_INCREMENT,
  `questionF` MEDIUMTEXT NOT NULL,
  `réponseF` MEDIUMTEXT NOT NULL,
  `dateCréationF` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idFaq`)
) ENGINE = InnoDB;

-- Table CGU
DROP TABLE IF EXISTS `CGU`;

CREATE TABLE `CGU` (
  `idCgu` INT NOT NULL AUTO_INCREMENT,
  `règles` MEDIUMTEXT NOT NULL,
  `datePublication` DATETIME NOT NULL,
  PRIMARY KEY (`idCgu`)
) ENGINE = InnoDB;

-- Table Messagerie
DROP TABLE IF EXISTS `Messagerie`;

CREATE TABLE `Messagerie` (
  `idMessagerie` INT NOT NULL AUTO_INCREMENT,
  `subject` VARCHAR(255) NOT NULL,
  `corps_texte` MEDIUMTEXT NOT NULL,
  `envoye_a` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `lu_ou_non_lu` TINYINT NULL DEFAULT 0,
  `Utilisateur_idExpediteur` INT NOT NULL,
  `Utilisateur_idRecepteur` INT NOT NULL,
  PRIMARY KEY (`idMessagerie`),
  FOREIGN KEY (`Utilisateur_idExpediteur`) REFERENCES `Utilisateur` (`idUtilisateur`)
    ON DELETE CASCADE,
  FOREIGN KEY (`Utilisateur_idRecepteur`) REFERENCES `Utilisateur` (`idUtilisateur`)
    ON DELETE CASCADE
) ENGINE = InnoDB;

-- Table Guide_activite
DROP TABLE IF EXISTS `Guide_activite`;

CREATE TABLE `Guide_activite` (
  `Utilisateur_idUtilisateur` INT NOT NULL,
  `Activité_idActivité` INT NOT NULL,
  `Activité_Destination_idDestination` INT NOT NULL,
  `prix` DECIMAL NULL,
  PRIMARY KEY (`Utilisateur_idUtilisateur`, `Activité_idActivité`, `Activité_Destination_idDestination`),
  FOREIGN KEY (`Utilisateur_idUtilisateur`) REFERENCES `Utilisateur` (`idUtilisateur`)
    ON DELETE CASCADE,
  FOREIGN KEY (`Activité_idActivité`, `Activité_Destination_idDestination`) REFERENCES `Activité` (`idActivité`, `Destination_idDestination`)
    ON DELETE CASCADE
) ENGINE = InnoDB;

-- Table Voyageur_activité
DROP TABLE IF EXISTS `Voyageur_activité`;

CREATE TABLE `Voyageur_activité` (
  `Activité_idActivité` INT NOT NULL,
  `Activité_Destination_idDestination` INT NOT NULL,
  `Utilisateur_idUtilisateur` INT NOT NULL,
  PRIMARY KEY (`Activité_idActivité`, `Activité_Destination_idDestination`, `Utilisateur_idUtilisateur`),
  FOREIGN KEY (`Activité_idActivité`, `Activité_Destination_idDestination`) REFERENCES `Activité` (`idActivité`, `Destination_idDestination`)
    ON DELETE CASCADE,
  FOREIGN KEY (`Utilisateur_idUtilisateur`) REFERENCES `Utilisateur` (`idUtilisateur`)
    ON DELETE CASCADE
) ENGINE = InnoDB;
