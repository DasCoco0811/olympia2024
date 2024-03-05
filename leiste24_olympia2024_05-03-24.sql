# ************************************************************
# Sequel Ace SQL dump
# Version 20042
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: 127.0.0.1 (MySQL 8.0.36)
# Datenbank: olympia2024
# Verarbeitungszeit: 2024-03-05 13:56:43 +0000
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
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(1023) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthdate` date NOT NULL,
  `sex` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `countries_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_57A7E4D6AEBAE514` (`countries_id`),
  CONSTRAINT `FK_57A7E4D6AEBAE514` FOREIGN KEY (`countries_id`) REFERENCES `countries` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `athletes` WRITE;
/*!40000 ALTER TABLE `athletes` DISABLE KEYS */;

INSERT INTO `athletes` (`id`, `first_name`, `last_name`, `description`, `birthdate`, `sex`, `countries_id`)
VALUES
	(1,'Alex','Stone','likes to eat chicken','2000-04-02','m',20),
	(2,'Erna','Cucumber','don\'t like vegetables','2000-02-20','f',5),
	(3,'Athlete','Athletibus','roses are red','2004-11-08','m',6);

/*!40000 ALTER TABLE `athletes` ENABLE KEYS */;
UNLOCK TABLES;


# Tabellen-Dump countries
# ------------------------------------------------------------

DROP TABLE IF EXISTS `countries`;

CREATE TABLE `countries` (
  `id` int NOT NULL AUTO_INCREMENT,
  `iso_2` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `iso_3` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;

INSERT INTO `countries` (`id`, `iso_2`, `iso_3`, `name`)
VALUES
	(4,'AF','AFG','Afghanistan'),
	(5,'AL','ALB','Albania'),
	(6,'DZ','DZA','Algeria'),
	(7,'AD','AND','Andorra'),
	(8,'AO','AGO','Angola'),
	(9,'AG','ATG','Antigua and Barbuda'),
	(10,'AR','ARG','Argentina'),
	(11,'AM','ARM','Armenia'),
	(12,'AU','AUS','Australia'),
	(13,'AT','AUT','Austria'),
	(14,'AZ','AZE','Azerbaijan'),
	(15,'BS','BHS','Bahamas'),
	(16,'BH','BHR','Bahrain'),
	(17,'BD','BGD','Bangladesh'),
	(18,'BB','BRB','Barbados'),
	(19,'BY','BLR','Belarus'),
	(20,'BE','BEL','Belgium'),
	(21,'BZ','BLZ','Belize'),
	(22,'BJ','BEN','Benin'),
	(23,'BT','BTN','Bhutan'),
	(24,'BO','BOL','Bolivia'),
	(25,'BA','BIH','Bosnia and Herzegovina'),
	(26,'BW','BWA','Botswana'),
	(27,'BR','BRA','Brazil'),
	(28,'BN','BRN','Brunei'),
	(29,'BG','BGR','Bulgaria'),
	(30,'BF','BFA','Burkina Faso'),
	(31,'BI','BDI','Burundi'),
	(32,'CV','CPV','Cabo Verde'),
	(33,'KH','KHM','Cambodia'),
	(34,'CM','CMR','Cameroon'),
	(35,'CA','CAN','Canada'),
	(36,'CF','CAF','Central African Republic'),
	(37,'TD','TCD','Chad'),
	(38,'CL','CHL','Chile'),
	(39,'CN','CHN','China'),
	(40,'CO','COL','Colombia'),
	(41,'KM','COM','Comoros'),
	(42,'CG','COG','Congo (Congo-Brazzaville)'),
	(43,'CR','CRI','Costa Rica'),
	(44,'HR','HRV','Croatia'),
	(45,'CU','CUB','Cuba'),
	(46,'CY','CYP','Cyprus'),
	(47,'CZ','CZE','Czechia (Czech Republic)'),
	(48,'CD','COD','Democratic Republic of the Congo'),
	(49,'DK','DNK','Denmark'),
	(50,'DJ','DJI','Djibouti'),
	(51,'DM','DMA','Dominica'),
	(52,'DO','DOM','Dominican Republic'),
	(53,'EC','ECU','Ecuador'),
	(54,'EG','EGY','Egypt'),
	(55,'SV','SLV','El Salvador'),
	(56,'GQ','GNQ','Equatorial Guinea'),
	(57,'ER','ERI','Eritrea'),
	(58,'EE','EST','Estonia'),
	(59,'SZ','SWZ','Eswatini'),
	(60,'ET','ETH','Ethiopia'),
	(61,'FJ','FJI','Fiji'),
	(62,'FI','FIN','Finland'),
	(63,'FR','FRA','France'),
	(64,'GA','GAB','Gabon'),
	(65,'GM','GMB','Gambia'),
	(66,'GE','GEO','Georgia'),
	(67,'DE','DEU','Germany'),
	(68,'GH','GHA','Ghana'),
	(69,'GR','GRC','Greece'),
	(70,'GD','GRD','Grenada'),
	(71,'GT','GTM','Guatemala'),
	(72,'GN','GIN','Guinea'),
	(73,'GW','GNB','Guinea-Bissau'),
	(74,'GY','GUY','Guyana'),
	(75,'HT','HTI','Haiti'),
	(76,'HN','HND','Honduras'),
	(77,'HU','HUN','Hungary'),
	(78,'IS','ISL','Iceland'),
	(79,'IN','IND','India'),
	(80,'ID','IDN','Indonesia'),
	(81,'IR','IRN','Iran'),
	(82,'IQ','IRQ','Iraq'),
	(83,'IE','IRL','Ireland'),
	(84,'IL','ISR','Israel'),
	(85,'IT','ITA','Italy'),
	(86,'CI','CIV','Ivory Coast'),
	(87,'JM','JAM','Jamaica'),
	(88,'JP','JPN','Japan'),
	(89,'JO','JOR','Jordan'),
	(90,'KZ','KAZ','Kazakhstan'),
	(91,'KE','KEN','Kenya'),
	(92,'KI','KIR','Kiribati'),
	(93,'XK','XKX','Kosovo'),
	(94,'KW','KWT','Kuwait'),
	(95,'KG','KGZ','Kyrgyzstan'),
	(96,'LA','LAO','Laos'),
	(97,'LV','LVA','Latvia'),
	(98,'LB','LBN','Lebanon'),
	(99,'LS','LSO','Lesotho'),
	(100,'LR','LBR','Liberia'),
	(101,'LY','LBY','Libya'),
	(102,'LI','LIE','Liechtenstein'),
	(103,'LT','LTU','Lithuania'),
	(104,'LU','LUX','Luxembourg'),
	(105,'MG','MDG','Madagascar'),
	(106,'MW','MWI','Malawi'),
	(107,'MY','MYS','Malaysia'),
	(108,'MV','MDV','Maldives'),
	(109,'ML','MLI','Mali'),
	(110,'MT','MLT','Malta'),
	(111,'MH','MHL','Marshall Islands'),
	(112,'MR','MRT','Mauritania'),
	(113,'MU','MUS','Mauritius'),
	(114,'MX','MEX','Mexico'),
	(115,'FM','FSM','Micronesia'),
	(116,'MD','MDA','Moldova'),
	(117,'MC','MCO','Monaco'),
	(118,'MN','MNG','Mongolia'),
	(119,'ME','MNE','Montenegro'),
	(120,'MA','MAR','Morocco'),
	(121,'MZ','MOZ','Mozambique'),
	(122,'MM','MMR','Myanmar (formerly Burma)'),
	(123,'NA','NAM','Namibia'),
	(124,'NR','NRU','Nauru'),
	(125,'NP','NPL','Nepal'),
	(126,'NL','NLD','Netherlands'),
	(127,'NZ','NZL','New Zealand'),
	(128,'NI','NIC','Nicaragua'),
	(129,'NE','NER','Niger'),
	(130,'NG','NGA','Nigeria'),
	(131,'KP','PRK','North Korea'),
	(132,'MK','MKD','North Macedonia'),
	(133,'NO','NOR','Norway'),
	(134,'OM','OMN','Oman'),
	(135,'PK','PAK','Pakistan'),
	(136,'PW','PLW','Palau'),
	(137,'PS','PSE','Palestine State'),
	(138,'PA','PAN','Panama'),
	(139,'PG','PNG','Papua New Guinea'),
	(140,'PY','PRY','Paraguay'),
	(141,'PE','PER','Peru'),
	(142,'PH','PHL','Philippines'),
	(143,'PL','POL','Poland'),
	(144,'PT','PRT','Portugal'),
	(145,'QA','QAT','Qatar'),
	(146,'RO','ROU','Romania'),
	(147,'RU','RUS','Russia'),
	(148,'RW','RWA','Rwanda'),
	(149,'KN','KNA','Saint Kitts and Nevis'),
	(150,'LC','LCA','Saint Lucia'),
	(151,'VC','VCT','Saint Vincent and the Grenadines'),
	(152,'WS','WSM','Samoa'),
	(153,'SM','SMR','San Marino'),
	(154,'ST','STP','Sao Tome and Principe'),
	(155,'SA','SAU','Saudi Arabia'),
	(156,'SN','SEN','Senegal'),
	(157,'RS','SRB','Serbia'),
	(158,'SC','SYC','Seychelles'),
	(159,'SL','SLE','Sierra Leone'),
	(160,'SG','SGP','Singapore'),
	(161,'SK','SVK','Slovakia'),
	(162,'SI','SVN','Slovenia'),
	(163,'SB','SLB','Solomon Islands'),
	(164,'SO','SOM','Somalia'),
	(165,'ZA','ZAF','South Africa'),
	(166,'KR','KOR','South Korea'),
	(167,'SS','SSD','South Sudan'),
	(168,'ES','ESP','Spain'),
	(169,'LK','LKA','Sri Lanka'),
	(170,'SD','SDN','Sudan'),
	(171,'SR','SUR','Suriname'),
	(172,'SE','SWE','Sweden'),
	(173,'CH','CHE','Switzerland'),
	(174,'SY','SYR','Syria'),
	(175,'TJ','TJK','Tajikistan'),
	(176,'TZ','TZA','Tanzania'),
	(177,'TH','THA','Thailand'),
	(178,'TL','TLS','Timor-Leste'),
	(179,'TG','TGO','Togo'),
	(180,'TO','TON','Tonga'),
	(181,'TT','TTO','Trinidad and Tobago'),
	(182,'TN','TUN','Tunisia'),
	(183,'TR','TUR','Turkey'),
	(184,'TM','TKM','Turkmenistan'),
	(185,'TV','TUV','Tuvalu'),
	(186,'UG','UGA','Uganda'),
	(187,'UA','UKR','Ukraine'),
	(188,'AE','ARE','United Arab Emirates'),
	(189,'GB','GBR','United Kingdom'),
	(190,'US','USA','United States of America'),
	(191,'UY','URY','Uruguay'),
	(192,'UZ','UZB','Uzbekistan'),
	(193,'VU','VUT','Vanuatu'),
	(194,'VA','VAT','Vatican City (Holy See)'),
	(195,'VE','VEN','Venezuela'),
	(196,'VN','VNM','Vietnam'),
	(197,'YE','YEM','Yemen'),
	(198,'ZM','ZMB','Zambia'),
	(199,'ZW','ZWE','Zimbabwe');

/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
UNLOCK TABLES;


# Tabellen-Dump doctrine_migration_versions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `doctrine_migration_versions`;

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

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
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ranking` int NOT NULL,
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
  `id` bigint NOT NULL AUTO_INCREMENT,
  `body` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(511) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `id` int NOT NULL AUTO_INCREMENT,
  `athlete_id` int NOT NULL,
  `distance1` double NOT NULL,
  `distance2` double NOT NULL,
  `distance3` double NOT NULL,
  `penalty` double DEFAULT NULL,
  `disqualified` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_E954E70AFE6BCB8B` (`athlete_id`),
  CONSTRAINT `FK_E954E70AFE6BCB8B` FOREIGN KEY (`athlete_id`) REFERENCES `athletes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `times_longjump` WRITE;
/*!40000 ALTER TABLE `times_longjump` DISABLE KEYS */;

INSERT INTO `times_longjump` (`id`, `athlete_id`, `distance1`, `distance2`, `distance3`, `penalty`, `disqualified`)
VALUES
	(1,3,12,0,0,4,1),
	(2,2,123.13,23525.13,1425241.14124,NULL,0);

/*!40000 ALTER TABLE `times_longjump` ENABLE KEYS */;
UNLOCK TABLES;


# Tabellen-Dump times_showjumping
# ------------------------------------------------------------

DROP TABLE IF EXISTS `times_showjumping`;

CREATE TABLE `times_showjumping` (
  `id` int NOT NULL AUTO_INCREMENT,
  `athlete_id` int NOT NULL,
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
  `id` int NOT NULL AUTO_INCREMENT,
  `athlete_id` int NOT NULL,
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
  `id` int NOT NULL AUTO_INCREMENT,
  `athlete_id` int NOT NULL,
  `time` double NOT NULL,
  `disqualified` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_6F5E8A94FE6BCB8B` (`athlete_id`),
  CONSTRAINT `FK_6F5E8A94FE6BCB8B` FOREIGN KEY (`athlete_id`) REFERENCES `athletes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `times_swimming` WRITE;
/*!40000 ALTER TABLE `times_swimming` DISABLE KEYS */;

INSERT INTO `times_swimming` (`id`, `athlete_id`, `time`, `disqualified`)
VALUES
	(1,1,400,1),
	(2,1,234.453442324,1),
	(3,2,761.13144220096,1);

/*!40000 ALTER TABLE `times_swimming` ENABLE KEYS */;
UNLOCK TABLES;


# Tabellen-Dump user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;

INSERT INTO `user` (`id`, `email`, `roles`, `password`)
VALUES
	(2,'admin@admin.comm','[\"ROLE_ADMIN\"]','$2y$13$ccmuwGR1XSSr7iBnyXo/P.LKh0U6sQfQC9SdJqEQL9UqLOXFOR.wS'),
	(3,'referee1@test.com','[\"ROLE_USER\"]','$2y$13$84JeAfPz8yP6NmU83xnB5uqU.ENCzASXk7mE1KUx5XxfG6zzmU5bG'),
	(4,'passwort','[\"ROLE_USER\"]','$2y$13$7rqR4wuVjH5x8tvKunv5GeljAAnSFvzRkU0OpgpBT63nE5PuN2gny'),
	(5,'blabber','[\"ROLE_USER\"]','blabber');

/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
