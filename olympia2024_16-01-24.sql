# ************************************************************
# Sequel Ace SQL dump
# Version 20042
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: 127.0.0.1 (MySQL 5.7.34)
# Datenbank: olympia2024
# Verarbeitungszeit: 2024-01-16 10:17:48 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Tabellen-Dump athletes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `athletes`;

CREATE TABLE `athletes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(1023) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthdate` date NOT NULL,
  `sex` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `countries_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_57A7E4D6AEBAE514` (`countries_id`),
  CONSTRAINT `FK_57A7E4D6AEBAE514` FOREIGN KEY (`countries_id`) REFERENCES `countries` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `athletes` WRITE;
/*!40000 ALTER TABLE `athletes` DISABLE KEYS */;

INSERT INTO `athletes` (`id`, `first_name`, `last_name`, `description`, `birthdate`, `sex`, `countries_id`)
VALUES
	(1,'Alex','Stone','likes to eat chicken','2000-04-02','m',1),
	(2,'Erna','Cucumber','don\'t like vegetables','2000-02-20','f',2),
	(3,'Athlete','Athletibus','roses are red','2004-11-08','m',3);

/*!40000 ALTER TABLE `athletes` ENABLE KEYS */;
UNLOCK TABLES;


# Tabellen-Dump countries
# ------------------------------------------------------------

DROP TABLE IF EXISTS `countries`;

CREATE TABLE `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iso_2` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iso_3` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;

INSERT INTO `countries` (`id`, `iso_2`, `iso_3`, `name`)
VALUES
	(1,'DE','GER','Germany'),
	(2,'EN','ENG','England'),
	(3,'US','USA','Amerika');

/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
UNLOCK TABLES;


# Tabellen-Dump doctrine_migration_versions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `doctrine_migration_versions`;

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `doctrine_migration_versions` WRITE;
/*!40000 ALTER TABLE `doctrine_migration_versions` DISABLE KEYS */;

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`)
VALUES
	('DoctrineMigrations\\Version20231018114357','2023-10-18 11:44:38',13),
	('DoctrineMigrations\\Version20231018115602','2023-10-18 11:56:09',44),
	('DoctrineMigrations\\Version20231018120231','2023-10-18 12:02:35',19),
	('DoctrineMigrations\\Version20231018122803','2023-10-18 12:28:08',76),
	('DoctrineMigrations\\Version20231018123825','2023-10-18 12:38:32',54),
	('DoctrineMigrations\\Version20231018124126','2023-10-18 12:41:30',26),
	('DoctrineMigrations\\Version20231018124634','2023-10-18 12:46:40',111),
	('DoctrineMigrations\\Version20231018124748','2023-10-18 12:47:53',21),
	('DoctrineMigrations\\Version20231018130542','2023-10-18 13:05:47',25),
	('DoctrineMigrations\\Version20231018131542','2023-10-18 13:15:59',27),
	('DoctrineMigrations\\Version20231019070257','2023-10-19 07:03:03',100),
	('DoctrineMigrations\\Version20231019080502','2023-10-19 08:05:07',31),
	('DoctrineMigrations\\Version20231019081927','2023-10-19 08:19:32',93),
	('DoctrineMigrations\\Version20231019122535','2023-10-19 12:25:41',58),
	('DoctrineMigrations\\Version20231019143657','2023-10-19 14:37:04',60),
	('DoctrineMigrations\\Version20231106104255','2023-11-06 10:43:35',88),
	('DoctrineMigrations\\Version20231207105431','2023-12-07 10:54:46',29),
	('DoctrineMigrations\\Version20231207105810','2023-12-07 10:58:22',37),
	('DoctrineMigrations\\Version20231207110934','2023-12-07 11:09:39',74),
	('DoctrineMigrations\\Version20231207111420','2023-12-07 11:14:24',48),
	('DoctrineMigrations\\Version20240111142445','2024-01-11 14:25:07',47),
	('DoctrineMigrations\\Version20240111144334','2024-01-11 14:43:57',51),
	('DoctrineMigrations\\Version20240111150141','2024-01-11 15:02:24',39),
	('DoctrineMigrations\\Version20240111150757','2024-01-11 15:08:09',41),
	('DoctrineMigrations\\Version20240111151533','2024-01-11 15:15:54',54),
	('DoctrineMigrations\\Version20240112105705','2024-01-12 10:57:18',44);

/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;
UNLOCK TABLES;


# Tabellen-Dump medals
# ------------------------------------------------------------

DROP TABLE IF EXISTS `medals`;

CREATE TABLE `medals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ranking` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `medals` WRITE;
/*!40000 ALTER TABLE `medals` DISABLE KEYS */;

INSERT INTO `medals` (`id`, `name`, `ranking`)
VALUES
	(1,'gold',1),
	(2,'silver',2),
	(3,'bronze',3);

/*!40000 ALTER TABLE `medals` ENABLE KEYS */;
UNLOCK TABLES;


# Tabellen-Dump messenger_messages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `messenger_messages`;

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  KEY `IDX_75EA56E016BA31DB` (`delivered_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Tabellen-Dump sports
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sports`;

CREATE TABLE `sports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(511) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `sports` WRITE;
/*!40000 ALTER TABLE `sports` DISABLE KEYS */;

INSERT INTO `sports` (`id`, `name`, `description`)
VALUES
	(1,'sprint',NULL),
	(2,'swimming',NULL),
	(3,'showjumping',NULL),
	(4,'longjump',NULL);

/*!40000 ALTER TABLE `sports` ENABLE KEYS */;
UNLOCK TABLES;


# Tabellen-Dump times_longjump
# ------------------------------------------------------------

DROP TABLE IF EXISTS `times_longjump`;

CREATE TABLE `times_longjump` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `athlete_id` int(11) NOT NULL,
  `distance` double NOT NULL,
  `penalty` double DEFAULT NULL,
  `disqualified` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_E954E70AFE6BCB8B` (`athlete_id`),
  CONSTRAINT `FK_E954E70AFE6BCB8B` FOREIGN KEY (`athlete_id`) REFERENCES `athletes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `times_longjump` WRITE;
/*!40000 ALTER TABLE `times_longjump` DISABLE KEYS */;

INSERT INTO `times_longjump` (`id`, `athlete_id`, `distance`, `penalty`, `disqualified`)
VALUES
	(1,3,12,4,1);

/*!40000 ALTER TABLE `times_longjump` ENABLE KEYS */;
UNLOCK TABLES;


# Tabellen-Dump times_showjumping
# ------------------------------------------------------------

DROP TABLE IF EXISTS `times_showjumping`;

CREATE TABLE `times_showjumping` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `athlete_id` int(11) NOT NULL,
  `time` double NOT NULL,
  `penalty` double DEFAULT NULL,
  `disqualified` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_5453E08AFE6BCB8B` (`athlete_id`),
  CONSTRAINT `FK_5453E08AFE6BCB8B` FOREIGN KEY (`athlete_id`) REFERENCES `athletes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `times_showjumping` WRITE;
/*!40000 ALTER TABLE `times_showjumping` DISABLE KEYS */;

INSERT INTO `times_showjumping` (`id`, `athlete_id`, `time`, `penalty`, `disqualified`)
VALUES
	(1,2,400,100,1);

/*!40000 ALTER TABLE `times_showjumping` ENABLE KEYS */;
UNLOCK TABLES;


# Tabellen-Dump times_sprint
# ------------------------------------------------------------

DROP TABLE IF EXISTS `times_sprint`;

CREATE TABLE `times_sprint` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `athlete_id` int(11) NOT NULL,
  `time` double NOT NULL,
  `penalty` double DEFAULT NULL,
  `disqualified` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_ECED644BFE6BCB8B` (`athlete_id`),
  CONSTRAINT `FK_ECED644BFE6BCB8B` FOREIGN KEY (`athlete_id`) REFERENCES `athletes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `times_sprint` WRITE;
/*!40000 ALTER TABLE `times_sprint` DISABLE KEYS */;

INSERT INTO `times_sprint` (`id`, `athlete_id`, `time`, `penalty`, `disqualified`)
VALUES
	(1,2,100,10,1),
	(2,1,312,3,1),
	(3,3,346,4,0);

/*!40000 ALTER TABLE `times_sprint` ENABLE KEYS */;
UNLOCK TABLES;


# Tabellen-Dump times_swimming
# ------------------------------------------------------------

DROP TABLE IF EXISTS `times_swimming`;

CREATE TABLE `times_swimming` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `athlete_id` int(11) NOT NULL,
  `time` double NOT NULL,
  `penalty` double DEFAULT NULL,
  `disqualified` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_6F5E8A94FE6BCB8B` (`athlete_id`),
  CONSTRAINT `FK_6F5E8A94FE6BCB8B` FOREIGN KEY (`athlete_id`) REFERENCES `athletes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `times_swimming` WRITE;
/*!40000 ALTER TABLE `times_swimming` DISABLE KEYS */;

INSERT INTO `times_swimming` (`id`, `athlete_id`, `time`, `penalty`, `disqualified`)
VALUES
	(1,1,400,123,1);

/*!40000 ALTER TABLE `times_swimming` ENABLE KEYS */;
UNLOCK TABLES;


# Tabellen-Dump user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;

INSERT INTO `user` (`id`, `email`, `roles`, `password`)
VALUES
	(2,'admin@admin.comm','[\"ROLE_ADMIN\"]','$2y$13$ccmuwGR1XSSr7iBnyXo/P.LKh0U6sQfQC9SdJqEQL9UqLOXFOR.wS'),
	(3,'referee1@test.com','[\"ROLE_USER\"]','$2y$13$84JeAfPz8yP6NmU83xnB5uqU.ENCzASXk7mE1KUx5XxfG6zzmU5bG');

/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
