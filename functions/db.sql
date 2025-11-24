

-- Listage de la structure de la base pour campus_manager
CREATE DATABASE IF NOT EXISTS `campus_manager` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `campus_manager`;

-- Listage de la structure de table campus_manager. cours
CREATE TABLE IF NOT EXISTS `cours` (
  `id_cours` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(150) NOT NULL,
  `volume_horaire` int NOT NULL DEFAULT '30',
  `id_promotion` int DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_cours`),
  KEY `fk_cours_promotion` (`id_promotion`),
  CONSTRAINT `fk_cours_promotion` FOREIGN KEY (`id_promotion`) REFERENCES `promotion` (`id_promotion`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table campus_manager.cours : ~3 rows (environ)
INSERT INTO `cours` (`id_cours`, `libelle`, `volume_horaire`, `id_promotion`, `created_at`) VALUES
	(1, 'Programmation Web', 45, 1, '2025-11-13 13:01:27'),
	(2, 'Design Architectural 3D', 60, 2, '2025-11-13 13:01:27'),
	(3, 'Stratégies Social Media', 40, 3, '2025-11-13 13:01:27');

-- Listage de la structure de table campus_manager. etudiant
CREATE TABLE IF NOT EXISTS `etudiant` (
  `id_etudiant` int NOT NULL AUTO_INCREMENT,
  `nom_etudiant` varchar(80) NOT NULL,
  `prenom_etudiant` varchar(80) NOT NULL,
  `matricule_etudiant` varchar(50) NOT NULL,
  `date_naissance_etudiant` date NOT NULL,
  `id_promotion` int NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id_etudiant`),
  UNIQUE KEY `matricule_etudiant` (`matricule_etudiant`),
  KEY `fk_etudiant_promotion` (`id_promotion`),
  CONSTRAINT `fk_etudiant_promotion` FOREIGN KEY (`id_promotion`) REFERENCES `promotion` (`id_promotion`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table campus_manager.etudiant : ~4 rows (environ)
INSERT INTO `etudiant` (`id_etudiant`, `nom_etudiant`, `prenom_etudiant`, `matricule_etudiant`, `date_naissance_etudiant`, `id_promotion`, `created`, `updated`) VALUES
	(1, 'Kabeya', 'Anna', 'IG-2025-001', '2003-04-12', 1, '2025-11-13 13:01:27', NULL),
	(2, 'Mundeke', 'Ricky', 'IG-2025-002', '2002-11-05', 1, '2025-11-13 13:01:27', NULL),
	(3, 'Mbombo', 'Clarisse', 'ARCH-2024-014', '2004-01-23', 2, '2025-11-13 13:01:27', NULL),
	(4, 'Nsimba', 'Jordan', 'MKD-2024-008', '1999-09-18', 3, '2025-11-13 13:01:27', NULL);

-- Listage de la structure de table campus_manager. etudiant_cours
CREATE TABLE IF NOT EXISTS `etudiant_cours` (
  `id_etudiant` int NOT NULL,
  `id_cours` int NOT NULL,
  `inscrit_le` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_etudiant`,`id_cours`),
  KEY `fk_ec_cours` (`id_cours`),
  CONSTRAINT `fk_ec_cours` FOREIGN KEY (`id_cours`) REFERENCES `cours` (`id_cours`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_ec_etudiant` FOREIGN KEY (`id_etudiant`) REFERENCES `etudiant` (`id_etudiant`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table campus_manager.etudiant_cours : ~4 rows (environ)
INSERT INTO `etudiant_cours` (`id_etudiant`, `id_cours`, `inscrit_le`) VALUES
	(1, 1, '2025-11-13 13:01:28'),
	(2, 1, '2025-11-13 13:01:28'),
	(3, 2, '2025-11-13 13:01:28'),
	(4, 3, '2025-11-13 13:01:28');

-- Listage de la structure de table campus_manager. promotion
CREATE TABLE IF NOT EXISTS `promotion` (
  `id_promotion` int NOT NULL AUTO_INCREMENT,
  `nom_promotion` varchar(120) NOT NULL,
  `faculte` varchar(120) NOT NULL,
  `departement` varchar(120) NOT NULL,
  `description` text,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_promotion`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table campus_manager.promotion : ~3 rows (environ)
INSERT INTO `promotion` (`id_promotion`, `nom_promotion`, `faculte`, `departement`, `description`, `created_at`) VALUES
	(1, 'Informatique de gestion - G2', 'Sciences et Technologie', 'Informatique', 'Deuxième année - filière gestion des systèmes d\'information', '2025-11-13 13:01:27'),
	(2, 'Architecture - L1', 'Architecture & Urbanisme', 'Architecture', 'Licence 1 orientée design architectural', '2025-11-13 13:01:27'),
	(3, 'Marketing Digital - M1', 'Sciences Économiques', 'Marketing', 'Master 1 spécialisé en marketing digital et data', '2025-11-13 13:01:27');

-- Listage de la structure de table campus_manager. roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id_role` int NOT NULL AUTO_INCREMENT,
  `nom_role` varchar(30) NOT NULL,
  PRIMARY KEY (`id_role`),
  UNIQUE KEY `nom_role` (`nom_role`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table campus_manager.roles : ~3 rows (environ)
INSERT INTO `roles` (`id_role`, `nom_role`) VALUES
	(1, 'admin'),
	(3, 'contributeur'),
	(2, 'manager');

-- Listage de la structure de table campus_manager. users
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `nom_user` varchar(80) NOT NULL,
  `prenom_user` varchar(80) NOT NULL,
  `email_user` varchar(180) NOT NULL,
  `motpass_user` varchar(255) NOT NULL,
  `cle_user` varchar(30) DEFAULT NULL,
  `token_user` varchar(64) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_role` int NOT NULL DEFAULT '3',
  `confirmation_user` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `email_user` (`email_user`),
  KEY `fk_users_roles` (`id_role`),
  CONSTRAINT `fk_users_roles` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id_role`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table campus_manager.users : ~2 rows (environ)
INSERT INTO `users` (`id_user`, `nom_user`, `prenom_user`, `email_user`, `motpass_user`, `cle_user`, `token_user`, `created`, `id_role`, `confirmation_user`) VALUES
	(1, 'Admin', 'Principal', 'admin@campusmanager.test', '$2y$10$kyVKS14jiqyHY7Z31.cIp.GhqDITUt1UNNqzdftiD3/MJ.c6H5yZG', '154879263015487', 'c919e05f9c6f47b0b69f4f4b6d8f7461', '2025-11-13 13:01:28', 1, 1),
	(2, 'Justine', 'Manager', 'manager@campusmanager.test', '$2y$10$aLf3jXHHBAwV1n/pW5HNbezJQKppdfOon6h/i2jzz1L3CMhQrzU8i', '215478963025874', '4c51ad0600cc42d197d7d0b683487715', '2025-11-13 13:01:28', 2, 1);

-- Listage de la structure de vue campus_manager. vue_etudiants_promotions
-- Création d'une table temporaire pour palier aux erreurs de dépendances de VIEW
CREATE TABLE `vue_etudiants_promotions` (
	`id_etudiant` INT(10) NOT NULL,
	`nom_etudiant` VARCHAR(80) NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`prenom_etudiant` VARCHAR(80) NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`matricule_etudiant` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`date_naissance_etudiant` DATE NOT NULL,
	`nom_promotion` VARCHAR(120) NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`faculte` VARCHAR(120) NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`departement` VARCHAR(120) NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`created` DATETIME NOT NULL
) ENGINE=MyISAM;

-- Listage de la structure de vue campus_manager. vue_etudiants_promotions
-- Suppression de la table temporaire et création finale de la structure d'une vue
DROP TABLE IF EXISTS `vue_etudiants_promotions`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `vue_etudiants_promotions` AS select `e`.`id_etudiant` AS `id_etudiant`,`e`.`nom_etudiant` AS `nom_etudiant`,`e`.`prenom_etudiant` AS `prenom_etudiant`,`e`.`matricule_etudiant` AS `matricule_etudiant`,`e`.`date_naissance_etudiant` AS `date_naissance_etudiant`,`p`.`nom_promotion` AS `nom_promotion`,`p`.`faculte` AS `faculte`,`p`.`departement` AS `departement`,`e`.`created` AS `created` from (`etudiant` `e` join `promotion` `p` on((`p`.`id_promotion` = `e`.`id_promotion`)));

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
