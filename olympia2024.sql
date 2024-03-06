-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 06. Mrz 2024 um 23:16
-- Server-Version: 10.4.32-MariaDB
-- PHP-Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `olympia2024`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `athletes`
--

CREATE TABLE `athletes` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `description` varchar(1023) DEFAULT NULL,
  `birthdate` date NOT NULL,
  `sex` varchar(1) NOT NULL,
  `countries_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `athletes`
--

INSERT INTO `athletes` (`id`, `first_name`, `last_name`, `description`, `birthdate`, `sex`, `countries_id`) VALUES
(1, 'Alex', 'Stone', 'Belgiums rising star...', '2000-04-02', 'm', 189),
(2, 'Erna', 'Cucumber', 'Awesome athelte, but don\'t like vegetables :(', '2000-02-20', 'f', 12),
(3, 'Kalle', 'Kralle', 'Really sharp but talented guy!', '2004-11-08', 'm', 6),
(5, 'Lars', 'Lampenfisch', 'His name sounds funny but his jumps are even funnier', '2001-03-10', 'm', 6),
(6, 'Muffin', 'Bernard', 'How the fuck could this name be accepted at the registry office', '1989-03-17', 'm', 67),
(7, 'Jacky', 'Senkel', 'She has the fastes shoes in the world!', '2000-06-01', 'f', 83),
(8, 'Lady', 'Gaga', 'Just jump!', '1999-05-02', 'f', 190),
(9, 'Kanye', 'West', 'Our most stupid athlete here', '1990-02-02', 'm', 190),
(10, 'Sarah', 'Wuffelknecht', 'Old but fast!!!!', '1970-03-31', 'f', 67),
(11, 'Tom', 'Trommel', 'This boy sounds fire', '1999-04-01', 'm', 98),
(12, 'Kahpi', 'Barra', 'Capybara :o', '2002-05-28', 'f', 79),
(13, 'Connor', 'Nagetier', 'aka. Connor Naggi', '2004-12-31', 'm', 77),
(14, 'Anna-Fischi', 'Arrrrrrrr', 'She\'s a pirate :o!', '2001-06-01', 'f', 80),
(15, 'Björn', 'Hurensohn', 'Maybe Kanye West isn\'t the most stupid guy here...', '2020-02-01', 'm', 174),
(16, 'Latten', 'Sepp', 'Woop woop', '2000-03-31', 'm', 158),
(17, 'Lisa', 'Antarctica', 'Cold Lady', '1999-03-01', 'f', 151),
(18, 'Candice', 'McMuffin', 'Can this muffin fit inside ur mouth?', '1988-02-09', 'f', 35);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `iso_2` varchar(2) NOT NULL,
  `iso_3` varchar(3) DEFAULT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `countries`
--

INSERT INTO `countries` (`id`, `iso_2`, `iso_3`, `name`) VALUES
(4, 'AF', 'AFG', 'Afghanistan'),
(5, 'AL', 'ALB', 'Albania'),
(6, 'DZ', 'DZA', 'Algeria'),
(7, 'AD', 'AND', 'Andorra'),
(8, 'AO', 'AGO', 'Angola'),
(9, 'AG', 'ATG', 'Antigua and Barbuda'),
(10, 'AR', 'ARG', 'Argentina'),
(11, 'AM', 'ARM', 'Armenia'),
(12, 'AU', 'AUS', 'Australia'),
(13, 'AT', 'AUT', 'Austria'),
(14, 'AZ', 'AZE', 'Azerbaijan'),
(15, 'BS', 'BHS', 'Bahamas'),
(16, 'BH', 'BHR', 'Bahrain'),
(17, 'BD', 'BGD', 'Bangladesh'),
(18, 'BB', 'BRB', 'Barbados'),
(19, 'BY', 'BLR', 'Belarus'),
(20, 'BE', 'BEL', 'Belgium'),
(21, 'BZ', 'BLZ', 'Belize'),
(22, 'BJ', 'BEN', 'Benin'),
(23, 'BT', 'BTN', 'Bhutan'),
(24, 'BO', 'BOL', 'Bolivia'),
(25, 'BA', 'BIH', 'Bosnia and Herzegovina'),
(26, 'BW', 'BWA', 'Botswana'),
(27, 'BR', 'BRA', 'Brazil'),
(28, 'BN', 'BRN', 'Brunei'),
(29, 'BG', 'BGR', 'Bulgaria'),
(30, 'BF', 'BFA', 'Burkina Faso'),
(31, 'BI', 'BDI', 'Burundi'),
(32, 'CV', 'CPV', 'Cabo Verde'),
(33, 'KH', 'KHM', 'Cambodia'),
(34, 'CM', 'CMR', 'Cameroon'),
(35, 'CA', 'CAN', 'Canada'),
(36, 'CF', 'CAF', 'Central African Republic'),
(37, 'TD', 'TCD', 'Chad'),
(38, 'CL', 'CHL', 'Chile'),
(39, 'CN', 'CHN', 'China'),
(40, 'CO', 'COL', 'Colombia'),
(41, 'KM', 'COM', 'Comoros'),
(42, 'CG', 'COG', 'Congo (Congo-Brazzaville)'),
(43, 'CR', 'CRI', 'Costa Rica'),
(44, 'HR', 'HRV', 'Croatia'),
(45, 'CU', 'CUB', 'Cuba'),
(46, 'CY', 'CYP', 'Cyprus'),
(47, 'CZ', 'CZE', 'Czechia (Czech Republic)'),
(48, 'CD', 'COD', 'Democratic Republic of the Congo'),
(49, 'DK', 'DNK', 'Denmark'),
(50, 'DJ', 'DJI', 'Djibouti'),
(51, 'DM', 'DMA', 'Dominica'),
(52, 'DO', 'DOM', 'Dominican Republic'),
(53, 'EC', 'ECU', 'Ecuador'),
(54, 'EG', 'EGY', 'Egypt'),
(55, 'SV', 'SLV', 'El Salvador'),
(56, 'GQ', 'GNQ', 'Equatorial Guinea'),
(57, 'ER', 'ERI', 'Eritrea'),
(58, 'EE', 'EST', 'Estonia'),
(59, 'SZ', 'SWZ', 'Eswatini'),
(60, 'ET', 'ETH', 'Ethiopia'),
(61, 'FJ', 'FJI', 'Fiji'),
(62, 'FI', 'FIN', 'Finland'),
(63, 'FR', 'FRA', 'France'),
(64, 'GA', 'GAB', 'Gabon'),
(65, 'GM', 'GMB', 'Gambia'),
(66, 'GE', 'GEO', 'Georgia'),
(67, 'DE', 'DEU', 'Germany'),
(68, 'GH', 'GHA', 'Ghana'),
(69, 'GR', 'GRC', 'Greece'),
(70, 'GD', 'GRD', 'Grenada'),
(71, 'GT', 'GTM', 'Guatemala'),
(72, 'GN', 'GIN', 'Guinea'),
(73, 'GW', 'GNB', 'Guinea-Bissau'),
(74, 'GY', 'GUY', 'Guyana'),
(75, 'HT', 'HTI', 'Haiti'),
(76, 'HN', 'HND', 'Honduras'),
(77, 'HU', 'HUN', 'Hungary'),
(78, 'IS', 'ISL', 'Iceland'),
(79, 'IN', 'IND', 'India'),
(80, 'ID', 'IDN', 'Indonesia'),
(81, 'IR', 'IRN', 'Iran'),
(82, 'IQ', 'IRQ', 'Iraq'),
(83, 'IE', 'IRL', 'Ireland'),
(84, 'IL', 'ISR', 'Israel'),
(85, 'IT', 'ITA', 'Italy'),
(86, 'CI', 'CIV', 'Ivory Coast'),
(87, 'JM', 'JAM', 'Jamaica'),
(88, 'JP', 'JPN', 'Japan'),
(89, 'JO', 'JOR', 'Jordan'),
(90, 'KZ', 'KAZ', 'Kazakhstan'),
(91, 'KE', 'KEN', 'Kenya'),
(92, 'KI', 'KIR', 'Kiribati'),
(93, 'XK', 'XKX', 'Kosovo'),
(94, 'KW', 'KWT', 'Kuwait'),
(95, 'KG', 'KGZ', 'Kyrgyzstan'),
(96, 'LA', 'LAO', 'Laos'),
(97, 'LV', 'LVA', 'Latvia'),
(98, 'LB', 'LBN', 'Lebanon'),
(99, 'LS', 'LSO', 'Lesotho'),
(100, 'LR', 'LBR', 'Liberia'),
(101, 'LY', 'LBY', 'Libya'),
(102, 'LI', 'LIE', 'Liechtenstein'),
(103, 'LT', 'LTU', 'Lithuania'),
(104, 'LU', 'LUX', 'Luxembourg'),
(105, 'MG', 'MDG', 'Madagascar'),
(106, 'MW', 'MWI', 'Malawi'),
(107, 'MY', 'MYS', 'Malaysia'),
(108, 'MV', 'MDV', 'Maldives'),
(109, 'ML', 'MLI', 'Mali'),
(110, 'MT', 'MLT', 'Malta'),
(111, 'MH', 'MHL', 'Marshall Islands'),
(112, 'MR', 'MRT', 'Mauritania'),
(113, 'MU', 'MUS', 'Mauritius'),
(114, 'MX', 'MEX', 'Mexico'),
(115, 'FM', 'FSM', 'Micronesia'),
(116, 'MD', 'MDA', 'Moldova'),
(117, 'MC', 'MCO', 'Monaco'),
(118, 'MN', 'MNG', 'Mongolia'),
(119, 'ME', 'MNE', 'Montenegro'),
(120, 'MA', 'MAR', 'Morocco'),
(121, 'MZ', 'MOZ', 'Mozambique'),
(122, 'MM', 'MMR', 'Myanmar (formerly Burma)'),
(123, 'NA', 'NAM', 'Namibia'),
(124, 'NR', 'NRU', 'Nauru'),
(125, 'NP', 'NPL', 'Nepal'),
(126, 'NL', 'NLD', 'Netherlands'),
(127, 'NZ', 'NZL', 'New Zealand'),
(128, 'NI', 'NIC', 'Nicaragua'),
(129, 'NE', 'NER', 'Niger'),
(130, 'NG', 'NGA', 'Nigeria'),
(131, 'KP', 'PRK', 'North Korea'),
(132, 'MK', 'MKD', 'North Macedonia'),
(133, 'NO', 'NOR', 'Norway'),
(134, 'OM', 'OMN', 'Oman'),
(135, 'PK', 'PAK', 'Pakistan'),
(136, 'PW', 'PLW', 'Palau'),
(137, 'PS', 'PSE', 'Palestine State'),
(138, 'PA', 'PAN', 'Panama'),
(139, 'PG', 'PNG', 'Papua New Guinea'),
(140, 'PY', 'PRY', 'Paraguay'),
(141, 'PE', 'PER', 'Peru'),
(142, 'PH', 'PHL', 'Philippines'),
(143, 'PL', 'POL', 'Poland'),
(144, 'PT', 'PRT', 'Portugal'),
(145, 'QA', 'QAT', 'Qatar'),
(146, 'RO', 'ROU', 'Romania'),
(147, 'RU', 'RUS', 'Russia'),
(148, 'RW', 'RWA', 'Rwanda'),
(149, 'KN', 'KNA', 'Saint Kitts and Nevis'),
(150, 'LC', 'LCA', 'Saint Lucia'),
(151, 'VC', 'VCT', 'Saint Vincent and the Grenadines'),
(152, 'WS', 'WSM', 'Samoa'),
(153, 'SM', 'SMR', 'San Marino'),
(154, 'ST', 'STP', 'Sao Tome and Principe'),
(155, 'SA', 'SAU', 'Saudi Arabia'),
(156, 'SN', 'SEN', 'Senegal'),
(157, 'RS', 'SRB', 'Serbia'),
(158, 'SC', 'SYC', 'Seychelles'),
(159, 'SL', 'SLE', 'Sierra Leone'),
(160, 'SG', 'SGP', 'Singapore'),
(161, 'SK', 'SVK', 'Slovakia'),
(162, 'SI', 'SVN', 'Slovenia'),
(163, 'SB', 'SLB', 'Solomon Islands'),
(164, 'SO', 'SOM', 'Somalia'),
(165, 'ZA', 'ZAF', 'South Africa'),
(166, 'KR', 'KOR', 'South Korea'),
(167, 'SS', 'SSD', 'South Sudan'),
(168, 'ES', 'ESP', 'Spain'),
(169, 'LK', 'LKA', 'Sri Lanka'),
(170, 'SD', 'SDN', 'Sudan'),
(171, 'SR', 'SUR', 'Suriname'),
(172, 'SE', 'SWE', 'Sweden'),
(173, 'CH', 'CHE', 'Switzerland'),
(174, 'SY', 'SYR', 'Syria'),
(175, 'TJ', 'TJK', 'Tajikistan'),
(176, 'TZ', 'TZA', 'Tanzania'),
(177, 'TH', 'THA', 'Thailand'),
(178, 'TL', 'TLS', 'Timor-Leste'),
(179, 'TG', 'TGO', 'Togo'),
(180, 'TO', 'TON', 'Tonga'),
(181, 'TT', 'TTO', 'Trinidad and Tobago'),
(182, 'TN', 'TUN', 'Tunisia'),
(183, 'TR', 'TUR', 'Turkey'),
(184, 'TM', 'TKM', 'Turkmenistan'),
(185, 'TV', 'TUV', 'Tuvalu'),
(186, 'UG', 'UGA', 'Uganda'),
(187, 'UA', 'UKR', 'Ukraine'),
(188, 'AE', 'ARE', 'United Arab Emirates'),
(189, 'GB', 'GBR', 'United Kingdom'),
(190, 'US', 'USA', 'United States of America'),
(191, 'UY', 'URY', 'Uruguay'),
(192, 'UZ', 'UZB', 'Uzbekistan'),
(193, 'VU', 'VUT', 'Vanuatu'),
(194, 'VA', 'VAT', 'Vatican City (Holy See)'),
(195, 'VE', 'VEN', 'Venezuela'),
(196, 'VN', 'VNM', 'Vietnam'),
(197, 'YE', 'YEM', 'Yemen'),
(198, 'ZM', 'ZMB', 'Zambia'),
(199, 'ZW', 'ZWE', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20231018114357', '2023-10-18 11:44:38', 13),
('DoctrineMigrations\\Version20231018115602', '2023-10-18 11:56:09', 44),
('DoctrineMigrations\\Version20231018120231', '2023-10-18 12:02:35', 19),
('DoctrineMigrations\\Version20231018122803', '2023-10-18 12:28:08', 76),
('DoctrineMigrations\\Version20231018123825', '2023-10-18 12:38:32', 54),
('DoctrineMigrations\\Version20231018124126', '2023-10-18 12:41:30', 26),
('DoctrineMigrations\\Version20231018124634', '2023-10-18 12:46:40', 111),
('DoctrineMigrations\\Version20231018124748', '2023-10-18 12:47:53', 21),
('DoctrineMigrations\\Version20231018130542', '2023-10-18 13:05:47', 25),
('DoctrineMigrations\\Version20231018131542', '2023-10-18 13:15:59', 27),
('DoctrineMigrations\\Version20231019070257', '2023-10-19 07:03:03', 100),
('DoctrineMigrations\\Version20231019080502', '2023-10-19 08:05:07', 31),
('DoctrineMigrations\\Version20231019081927', '2023-10-19 08:19:32', 93),
('DoctrineMigrations\\Version20231019122535', '2023-10-19 12:25:41', 58),
('DoctrineMigrations\\Version20231019143657', '2023-10-19 14:37:04', 60),
('DoctrineMigrations\\Version20231106104255', '2023-11-06 10:43:35', 88),
('DoctrineMigrations\\Version20231207105431', '2023-12-07 10:54:46', 29),
('DoctrineMigrations\\Version20231207105810', '2023-12-07 10:58:22', 37),
('DoctrineMigrations\\Version20231207110934', '2023-12-07 11:09:39', 74),
('DoctrineMigrations\\Version20231207111420', '2023-12-07 11:14:24', 48),
('DoctrineMigrations\\Version20240111142445', '2024-01-11 14:25:07', 47),
('DoctrineMigrations\\Version20240111144334', '2024-01-11 14:43:57', 51),
('DoctrineMigrations\\Version20240111150141', '2024-01-11 15:02:24', 39),
('DoctrineMigrations\\Version20240111150757', '2024-01-11 15:08:09', 41),
('DoctrineMigrations\\Version20240111151533', '2024-01-11 15:15:54', 54),
('DoctrineMigrations\\Version20240112105705', '2024-01-12 10:57:18', 44);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `medals`
--

CREATE TABLE `medals` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `ranking` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `medals`
--

INSERT INTO `medals` (`id`, `name`, `ranking`) VALUES
(1, 'gold', 1),
(2, 'silver', 2),
(3, 'bronze', 3);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `sports`
--

CREATE TABLE `sports` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(511) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `sports`
--

INSERT INTO `sports` (`id`, `name`, `description`) VALUES
(1, 'sprint', NULL),
(2, 'swimming', NULL),
(3, 'showjumping', NULL),
(4, 'longjump', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `times_longjump`
--

CREATE TABLE `times_longjump` (
  `id` int(11) NOT NULL,
  `athlete_id` int(11) NOT NULL,
  `distance1` double NOT NULL,
  `distance2` double NOT NULL,
  `distance3` double NOT NULL,
  `penalty` double DEFAULT NULL,
  `disqualified` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `times_longjump`
--

INSERT INTO `times_longjump` (`id`, `athlete_id`, `distance1`, `distance2`, `distance3`, `penalty`, `disqualified`) VALUES
(1, 3, 2.42, 2.23, 2.43, 4, 0),
(3, 1, 1.53, 1.67, 2.42, NULL, 0),
(4, 16, 2.32, 1.99, 2.45, NULL, 0),
(5, 15, 1.42, 1.42, 1.42, NULL, 1),
(6, 14, 2.64, 2.14, 2.31, NULL, 0),
(7, 12, 2.11, 1.95, 2.53, NULL, 0),
(8, 11, 1.31, 1.55, 1.73, NULL, 0),
(9, 8, 1.56, 1.32, 1.64, NULL, 0),
(10, 2, 3.42, 0, 0, NULL, 1),
(11, 7, 1.97, 1.99, 1.98, NULL, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `times_showjumping`
--

CREATE TABLE `times_showjumping` (
  `id` int(11) NOT NULL,
  `athlete_id` int(11) NOT NULL,
  `time` double NOT NULL,
  `penalty` double DEFAULT NULL,
  `disqualified` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `times_showjumping`
--

INSERT INTO `times_showjumping` (`id`, `athlete_id`, `time`, `penalty`, `disqualified`) VALUES
(2, 18, 178.532, 0, 0),
(3, 17, 193.214, 0, 0),
(4, 16, 186.21, 20, 0),
(5, 14, 183.21, 10, 0),
(6, 13, 150.21, 5, 0),
(7, 11, 190.534, 0, 0),
(8, 5, 182.569, 50, 0),
(9, 8, 184.423, 20, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `times_sprint`
--

CREATE TABLE `times_sprint` (
  `id` int(11) NOT NULL,
  `athlete_id` int(11) NOT NULL,
  `time` double NOT NULL,
  `penalty` double DEFAULT NULL,
  `disqualified` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `times_sprint`
--

INSERT INTO `times_sprint` (`id`, `athlete_id`, `time`, `penalty`, `disqualified`) VALUES
(1, 2, 199.96, 10, 0),
(2, 1, 312.33, 3, 0),
(3, 3, 246.45, 4, 0),
(4, 5, 124.13, NULL, 0),
(5, 6, 342.32, NULL, 0),
(6, 7, 145.76, NULL, 0),
(7, 8, 221.86, NULL, 0),
(8, 9, 215.44, NULL, 0),
(9, 10, 221.11, NULL, 0),
(10, 11, 179.54, NULL, 0),
(11, 12, 180.95, NULL, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `times_swimming`
--

CREATE TABLE `times_swimming` (
  `id` int(11) NOT NULL,
  `athlete_id` int(11) NOT NULL,
  `time` double NOT NULL,
  `disqualified` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `times_swimming`
--

INSERT INTO `times_swimming` (`id`, `athlete_id`, `time`, `disqualified`) VALUES
(1, 15, 180.456, 1),
(2, 1, 234.222, 0),
(3, 2, 761.137, 0),
(5, 5, 234.996, 0),
(6, 13, 280.121, 0),
(7, 9, 230.744, 0),
(8, 6, 211.877, 0),
(9, 10, 198.954, 0),
(10, 17, 174.321, 0),
(11, 18, 184.215, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`roles`)),
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`) VALUES
(2, 'admin@admin.comm', '[\"ROLE_ADMIN\"]', '$2y$13$ccmuwGR1XSSr7iBnyXo/P.LKh0U6sQfQC9SdJqEQL9UqLOXFOR.wS'),
(3, 'referee1@test.com', '[\"ROLE_USER\"]', '$2y$13$84JeAfPz8yP6NmU83xnB5uqU.ENCzASXk7mE1KUx5XxfG6zzmU5bG'),
(4, 'passwort', '[\"ROLE_USER\"]', '$2y$13$7rqR4wuVjH5x8tvKunv5GeljAAnSFvzRkU0OpgpBT63nE5PuN2gny'),
(5, 'blabber', '[\"ROLE_USER\"]', 'blabber');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `athletes`
--
ALTER TABLE `athletes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_57A7E4D6AEBAE514` (`countries_id`);

--
-- Indizes für die Tabelle `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indizes für die Tabelle `medals`
--
ALTER TABLE `medals`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Indizes für die Tabelle `sports`
--
ALTER TABLE `sports`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `times_longjump`
--
ALTER TABLE `times_longjump`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_E954E70AFE6BCB8B` (`athlete_id`);

--
-- Indizes für die Tabelle `times_showjumping`
--
ALTER TABLE `times_showjumping`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_5453E08AFE6BCB8B` (`athlete_id`);

--
-- Indizes für die Tabelle `times_sprint`
--
ALTER TABLE `times_sprint`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_ECED644BFE6BCB8B` (`athlete_id`);

--
-- Indizes für die Tabelle `times_swimming`
--
ALTER TABLE `times_swimming`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_6F5E8A94FE6BCB8B` (`athlete_id`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `athletes`
--
ALTER TABLE `athletes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT für Tabelle `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;

--
-- AUTO_INCREMENT für Tabelle `medals`
--
ALTER TABLE `medals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `sports`
--
ALTER TABLE `sports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `times_longjump`
--
ALTER TABLE `times_longjump`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT für Tabelle `times_showjumping`
--
ALTER TABLE `times_showjumping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT für Tabelle `times_sprint`
--
ALTER TABLE `times_sprint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT für Tabelle `times_swimming`
--
ALTER TABLE `times_swimming`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `athletes`
--
ALTER TABLE `athletes`
  ADD CONSTRAINT `FK_57A7E4D6AEBAE514` FOREIGN KEY (`countries_id`) REFERENCES `countries` (`id`);

--
-- Constraints der Tabelle `times_longjump`
--
ALTER TABLE `times_longjump`
  ADD CONSTRAINT `FK_E954E70AFE6BCB8B` FOREIGN KEY (`athlete_id`) REFERENCES `athletes` (`id`);

--
-- Constraints der Tabelle `times_showjumping`
--
ALTER TABLE `times_showjumping`
  ADD CONSTRAINT `FK_5453E08AFE6BCB8B` FOREIGN KEY (`athlete_id`) REFERENCES `athletes` (`id`);

--
-- Constraints der Tabelle `times_sprint`
--
ALTER TABLE `times_sprint`
  ADD CONSTRAINT `FK_ECED644BFE6BCB8B` FOREIGN KEY (`athlete_id`) REFERENCES `athletes` (`id`);

--
-- Constraints der Tabelle `times_swimming`
--
ALTER TABLE `times_swimming`
  ADD CONSTRAINT `FK_6F5E8A94FE6BCB8B` FOREIGN KEY (`athlete_id`) REFERENCES `athletes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
