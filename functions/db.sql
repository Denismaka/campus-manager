-- --------------------------------------------------------
-- Schéma de référence pour l'application Campus Manager
-- Compatible MySQL 8+
-- --------------------------------------------------------

DROP DATABASE IF EXISTS `campus_manager`;
CREATE DATABASE `campus_manager` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `campus_manager`;

-- --------------------------------------------------------
-- Table : roles
-- --------------------------------------------------------
CREATE TABLE `roles` (
  `id_role` INT NOT NULL AUTO_INCREMENT,
  `nom_role` VARCHAR(30) NOT NULL UNIQUE,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `roles` (`nom_role`) VALUES
 ('admin'),
 ('manager'),
 ('contributeur');

-- --------------------------------------------------------
-- Table : promotion
-- --------------------------------------------------------
CREATE TABLE `promotion` (
  `id_promotion` INT NOT NULL AUTO_INCREMENT,
  `nom_promotion` VARCHAR(120) NOT NULL,
  `faculte` VARCHAR(120) NOT NULL,
  `departement` VARCHAR(120) NOT NULL,
  `description` TEXT NULL,
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_promotion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `promotion` (`nom_promotion`, `faculte`, `departement`, `description`) VALUES
 ('Informatique de gestion - G2', 'Sciences et Technologie', 'Informatique', 'Deuxième année - filière gestion des systèmes d\'information'),
 ('Architecture - L1', 'Architecture & Urbanisme', 'Architecture', 'Licence 1 orientée design architectural'),
 ('Marketing Digital - M1', 'Sciences Économiques', 'Marketing', 'Master 1 spécialisé en marketing digital et data');

-- --------------------------------------------------------
-- Table : etudiant
-- --------------------------------------------------------
CREATE TABLE `etudiant` (
  `id_etudiant` INT NOT NULL AUTO_INCREMENT,
  `nom_etudiant` VARCHAR(80) NOT NULL,
  `prenom_etudiant` VARCHAR(80) NOT NULL,
  `matricule_etudiant` VARCHAR(50) NOT NULL UNIQUE,
  `date_naissance_etudiant` DATE NOT NULL,
  `id_promotion` INT NOT NULL,
  `created` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id_etudiant`),
  CONSTRAINT `fk_etudiant_promotion` FOREIGN KEY (`id_promotion`) REFERENCES `promotion` (`id_promotion`) ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `etudiant` (`nom_etudiant`, `prenom_etudiant`, `matricule_etudiant`, `date_naissance_etudiant`, `id_promotion`) VALUES
 ('Kabeya', 'Anna', 'IG-2025-001', '2003-04-12', 1),
 ('Mundeke', 'Ricky', 'IG-2025-002', '2002-11-05', 1),
 ('Mbombo', 'Clarisse', 'ARCH-2024-014', '2004-01-23', 2),
 ('Nsimba', 'Jordan', 'MKD-2024-008', '1999-09-18', 3);

-- --------------------------------------------------------
-- Table : cours (facultatif pour évolutions futures)
-- --------------------------------------------------------
CREATE TABLE `cours` (
  `id_cours` INT NOT NULL AUTO_INCREMENT,
  `libelle` VARCHAR(150) NOT NULL,
  `volume_horaire` INT NOT NULL DEFAULT 30,
  `id_promotion` INT NULL,
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_cours`),
  CONSTRAINT `fk_cours_promotion` FOREIGN KEY (`id_promotion`) REFERENCES `promotion` (`id_promotion`) ON UPDATE CASCADE ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `cours` (`libelle`, `volume_horaire`, `id_promotion`) VALUES
 ('Programmation Web', 45, 1),
 ('Design Architectural 3D', 60, 2),
 ('Stratégies Social Media', 40, 3);

-- --------------------------------------------------------
-- Table : etudiant_cours (relation N-N)
-- --------------------------------------------------------
CREATE TABLE `etudiant_cours` (
  `id_etudiant` INT NOT NULL,
  `id_cours` INT NOT NULL,
  `inscrit_le` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_etudiant`, `id_cours`),
  CONSTRAINT `fk_ec_etudiant` FOREIGN KEY (`id_etudiant`) REFERENCES `etudiant` (`id_etudiant`) ON UPDATE CASCADE ON DELETE CASCADE,
  CONSTRAINT `fk_ec_cours` FOREIGN KEY (`id_cours`) REFERENCES `cours` (`id_cours`) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `etudiant_cours` (`id_etudiant`, `id_cours`) VALUES
 (1, 1),
 (2, 1),
 (3, 2),
 (4, 3);

-- --------------------------------------------------------
-- Table : users
-- --------------------------------------------------------
CREATE TABLE `users` (
  `id_user` INT NOT NULL AUTO_INCREMENT,
  `nom_user` VARCHAR(80) NOT NULL,
  `prenom_user` VARCHAR(80) NOT NULL,
  `email_user` VARCHAR(180) NOT NULL UNIQUE,
  `motpass_user` VARCHAR(255) NOT NULL,
  `cle_user` VARCHAR(30) DEFAULT NULL,
  `token_user` VARCHAR(64) DEFAULT NULL,
  `created` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_role` INT NOT NULL DEFAULT 3,
  `confirmation_user` TINYINT(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_user`),
  CONSTRAINT `fk_users_roles` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id_role`) ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`nom_user`, `prenom_user`, `email_user`, `motpass_user`, `cle_user`, `token_user`, `id_role`, `confirmation_user`) VALUES
 ('Admin', 'Principal', 'admin@campusmanager.test', '$2y$10$kyVKS14jiqyHY7Z31.cIp.GhqDITUt1UNNqzdftiD3/MJ.c6H5yZG', '154879263015487', 'c919e05f9c6f47b0b69f4f4b6d8f7461', 1, 1),
 ('Justine', 'Manager', 'manager@campusmanager.test', '$2y$10$aLf3jXHHBAwV1n/pW5HNbezJQKppdfOon6h/i2jzz1L3CMhQrzU8i', '215478963025874', '4c51ad0600cc42d197d7d0b683487715', 2, 1);

-- --------------------------------------------------------
-- Vues ou données dérivées (exemple)
-- --------------------------------------------------------
CREATE OR REPLACE VIEW `vue_etudiants_promotions` AS
SELECT e.id_etudiant,
       e.nom_etudiant,
       e.prenom_etudiant,
       e.matricule_etudiant,
       e.date_naissance_etudiant,
       p.nom_promotion,
       p.faculte,
       p.departement,
       e.created
FROM etudiant e
JOIN promotion p ON p.id_promotion = e.id_promotion;

-- Fin du script
