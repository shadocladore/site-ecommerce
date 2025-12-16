-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 24 déc. 2022 à 08:00
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `boutique`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `nom` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`nom`, `password`, `photo`, `id`) VALUES
('admin ', 'admin', '1659279404.png', 1);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` mediumint(9) NOT NULL,
  `nom_categorie` varchar(30) DEFAULT NULL,
  `photo_categorie` varchar(60) NOT NULL,
  `date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `nom_categorie`, `photo_categorie`, `date`) VALUES
(1, 'Laptop', '1659036860.jpg', '28-07-2022'),
(2, 'Smartphone', '1659037271.jpg', '28-07-2022'),
(3, 'Desktop', '1659037389.jpeg', '28-07-2022'),
(5, 'Televiseur', '1659037442.jpg', '2022-07-29'),
(6, 'Camera', '1659062169.jpg', '2022-07-29'),
(8, 'Imprimante', '1669670265.png', '28-11-2022'),
(9, 'Montre', '1669670287.jpg', '28-11-2022');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id_client` mediumint(9) NOT NULL,
  `nom` varchar(220) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `email` varchar(220) DEFAULT NULL,
  `adresse` varchar(220) DEFAULT NULL,
  `photo_client` varchar(50) NOT NULL,
  `password` varchar(220) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_client`, `nom`, `telephone`, `email`, `adresse`, `photo_client`, `password`) VALUES
(1, 'Tchando Cladore', '653 02 56 00 ', 'shadocladore@gmail.com', 'Village(Ngodi bakoko)', '1669669820.jpg', 'admin'),
(2, 'Tchouko', '690 89 00 00', 'tchoukobrayand@gmail.com', 'France, rue 24 manguier', '1658671280.jpg', 'tchouko'),
(3, 'Tchiengue', '675 00 98 03', 'Tchiengue@gmail.com', 'yaounde(nkolmesseng)', '1658951948.jpg', 'tchiengue'),
(4, 'Louis', '659 67 99 00', 'louis@gmail.com', 'bagangtÃ©(village)', '1658671454.jpg', 'louis'),
(5, 'Mambo', '696 00 66 91', 'mambo@gmail.com', 'yaounde(nkolmesseng)', '1658671533.jpg', 'mambo'),
(6, 'Fowa', '680 09 65 99', 'paolafowa@gmail.com', 'Bonaberi', '1658671682.jpg', 'fowa'),
(7, 'Kameni', '659 67 99 00', 'kameni@gmail.com', 'Ngodi bakoko', 'nelly.jpg', 'kameni'),
(8, 'Tchapi', '690 89 00 96', 'tchapikevin@gmail.com', 'Village(Ngodi bakoko)', '', 'tchapi'),
(10, 'Kamdem', '696 00 66 91', 'Kamdem@gmail.com', 'France, rue 24 manguier', '1659261845.jpg', 'kamdem'),
(11, 'Siewe', '670 85 00 09', 'siewe@gmail.com', 'yaounde(nkolmesseng)', '1659261997.jpg', 'siewe'),
(12, 'Ngassam', '+23765867184', 'ngassam@gmail.com', 'Nkouloulou', '1659262141.jpg', 'ngassam'),
(13, 'Wouapi', '0653025600', 'wouapi@gmail.com', 'Akwa vita', '1659262246.jpg', 'wouapi');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id_commande` int(10) UNSIGNED NOT NULL,
  `id_produit` int(10) NOT NULL,
  `id_client` int(11) NOT NULL DEFAULT 0,
  `quantite_produit` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `montant_total` double NOT NULL DEFAULT 0,
  `date_commande` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id_commande`, `id_produit`, `id_client`, `quantite_produit`, `montant_total`, `date_commande`) VALUES
(1, 4, 6, 1, 95000, '23-07-2022'),
(2, 7, 6, 1, 40000, '23-07-2022'),
(5, 7, 1, 2, 80000, '24-07-2022'),
(6, 13, 1, 6, 604200, '25-07-2022'),
(7, 9, 7, 4, 346000, '25-07-2022'),
(8, 11, 7, 1, 95000, '25-07-2022'),
(9, 4, 5, 2, 190000, '26-07-2022'),
(10, 5, 5, 6, 1068000, '26-07-2022'),
(11, 6, 5, 10, 697000, '26-07-2022'),
(12, 12, 4, 2, 356000, '26-07-2022'),
(13, 13, 4, 1, 100700, '26-07-2022'),
(14, 4, 8, 1, 95000, '27-07-2022'),
(15, 8, 8, 3, 225000, '27-07-2022'),
(16, 11, 8, 3, 285000, '27-07-2022'),
(17, 8, 9, 1, 75000, '27-07-2022'),
(18, 9, 9, 1, 86500, '27-07-2022'),
(19, 8, 1, 2, 150000, '27-07-2022'),
(20, 14, 1, 8, 400000, '27-07-2022'),
(21, 15, 3, 6, 72000, '27-07-2022'),
(22, 16, 3, 1, 76500, '27-07-2022'),
(23, 6, 1, 2, 69700, '28-07-2022'),
(24, 15, 1, 1, 12000, '28-07-2022'),
(25, 16, 1, 1, 87500, '28-07-2022'),
(26, 5, 4, 1, 178000, '28-07-2022'),
(27, 12, 4, 1, 178000, '28-07-2022'),
(28, 7, 4, 1, 40000, '28-07-2022'),
(29, 3, 4, 4, 120000, '28-07-2022'),
(30, 9, 4, 1, 86500, '28-07-2022'),
(31, 3, 6, 1, 30000, '28-07-2022'),
(32, 11, 6, 3, 285000, '28-07-2022'),
(33, 5, 9, 5, 890000, '28-07-2022'),
(34, 1, 9, 1, 128000, '28-07-2022'),
(35, 9, 1, 5, 432500, '28-07-2022'),
(36, 8, 14, 3, 225000, '31-07-2022'),
(38, 8, 5, 2, 150000, '28-07-2022'),
(40, 23, 1, 14, 765000, '29-07-2022'),
(42, 23, 6, 10, 765000, '29-07-2022'),
(59, 12, 2, 1, 178000, '29-07-2022'),
(60, 11, 2, 1, 95000, '29-07-2022'),
(61, 20, 3, 1, 67000, '29-07-2022'),
(66, 26, 6, 1, 120000, '30-07-2022'),
(91, 24, 3, 1, 765000, '31-07-2022'),
(92, 22, 3, 3, 360000, '31-07-2022'),
(93, 20, 3, 1, 67000, '31-07-2022'),
(94, 20, 1, 2, 134000, '28-11-2022'),
(95, 8, 1, 1, 75000, '28-11-2022'),
(96, 6, 1, 1, 69700, '28-11-2022'),
(97, 3, 1, 1, 30000, '29-11-2022'),
(98, 28, 1, 1, 76000, '29-11-2022'),
(99, 24, 1, 4, 3060000, '29-11-2022'),
(100, 27, 1, 1, 30000, '29-11-2022'),
(101, 23, 1, 4, 3060000, '29-11-2022'),
(102, 4, 1, 1, 95000, '29-11-2022'),
(103, 4, 1, 1, 95000, '29-11-2022'),
(104, 23, 1, 1, 765000, '29-11-2022'),
(105, 4, 1, 1, 95000, '29-11-2022'),
(106, 23, 1, 1, 765000, '29-11-2022'),
(107, 4, 1, 1, 95000, '29-11-2022'),
(108, 23, 1, 1, 765000, '29-11-2022'),
(109, 4, 1, 1, 95000, '29-11-2022'),
(110, 23, 1, 1, 765000, '29-11-2022'),
(111, 4, 1, 1, 95000, '29-11-2022'),
(112, 23, 1, 1, 765000, '29-11-2022'),
(113, 6, 12, 1, 69700, '30-11-2022'),
(114, 6, 12, 1, 69700, '30-11-2022'),
(115, 28, 12, 1, 76000, '30-11-2022'),
(116, 6, 12, 1, 69700, '30-11-2022'),
(117, 28, 12, 1, 76000, '30-11-2022'),
(118, 8, 12, 1, 75000, '30-11-2022'),
(119, 28, 12, 1, 76000, '30-11-2022'),
(120, 4, 6, 1, 95000, '30-11-2022'),
(121, 4, 6, 1, 95000, '30-11-2022'),
(122, 4, 6, 1, 95000, '30-11-2022'),
(123, 25, 1, 1, 765000, '01-12-2022'),
(124, 29, 1, 1, 8650, '03-12-2022'),
(125, 4, 1, 2, 190000, '03-12-2022'),
(126, 28, 12, 1, 76000, '03-12-2022'),
(127, 5, 12, 1, 178000, '03-12-2022'),
(128, 23, 1, 1, 765000, '04-12-2022'),
(129, 28, 1, 1, 76000, '04-12-2022'),
(130, 28, 1, 1, 76000, '04-12-2022'),
(131, 29, 1, 5, 43250, '04-12-2022'),
(132, 9, 1, 4, 346000, '04-12-2022'),
(133, 5, 1, 1, 178000, '04-12-2022'),
(134, 20, 1, 1, 67000, '04-12-2022'),
(135, 4, 1, 1, 95000, '04-12-2022'),
(136, 4, 1, 1, 95000, '04-12-2022'),
(137, 4, 1, 1, 95000, '04-12-2022'),
(138, 5, 1, 1, 178000, '04-12-2022'),
(139, 4, 1, 1, 95000, '04-12-2022'),
(140, 5, 1, 1, 178000, '04-12-2022'),
(141, 28, 1, 1, 76000, '05-12-2022'),
(142, 8, 1, 1, 75000, '05-12-2022'),
(143, 16, 1, 1, 87500, '05-12-2022'),
(144, 16, 1, 10, 875000, '09-12-2022'),
(145, 24, 1, 10, 7650000, '09-12-2022'),
(146, 23, 1, 1, 765000, '09-12-2022'),
(147, 24, 1, 1, 765000, '13-12-2022'),
(148, 24, 1, 1, 765000, '13-12-2022'),
(149, 24, 1, 1, 765000, '15-12-2022'),
(150, 6, 1, 1, 69700, '15-12-2022'),
(151, 30, 1, 1, 120000, '16-12-2022'),
(152, 28, 1, 1, 76000, '16-12-2022'),
(153, 29, 1, 1, 8650, '16-12-2022'),
(154, 13, 1, 1, 100700, '16-12-2022'),
(155, 29, 1, 1, 8650, '21-12-2022'),
(156, 65, 1, 1, 120000, '21-12-2022'),
(157, 57, 1, 1, 30000, '21-12-2022'),
(158, 57, 1, 2, 60000, '21-12-2022'),
(159, 4, 1, 1, 95000, '21-12-2022'),
(160, 63, 1, 1, 120000, '21-12-2022'),
(161, 34, 1, 3, 201000, '21-12-2022'),
(162, 9, 1, 9, 778500, '21-12-2022'),
(163, 62, 1, 1, 120000, '23-12-2022'),
(164, 4, 1, 1, 95000, '23-12-2022'),
(165, 62, 1, 1, 120000, '23-12-2022'),
(166, 4, 1, 1, 95000, '23-12-2022'),
(167, 62, 1, 1, 120000, '23-12-2022'),
(168, 4, 1, 1, 95000, '23-12-2022'),
(169, 62, 1, 1, 120000, '23-12-2022'),
(170, 4, 1, 1, 95000, '23-12-2022'),
(171, 62, 1, 1, 120000, '23-12-2022'),
(172, 4, 1, 1, 95000, '23-12-2022'),
(173, 62, 1, 1, 120000, '23-12-2022'),
(174, 4, 1, 1, 95000, '23-12-2022'),
(175, 6, 1, 1, 69700, '23-12-2022'),
(176, 9, 1, 1, 86500, '23-12-2022'),
(177, 9, 1, 1, 86500, '23-12-2022'),
(178, 62, 1, 3, 360000, '23-12-2022'),
(179, 64, 1, 1, 120000, '24-12-2022');

-- --------------------------------------------------------

--
-- Structure de la table `pannier`
--

CREATE TABLE `pannier` (
  `id_commande` int(10) NOT NULL,
  `id_produit` int(10) NOT NULL,
  `id_client` int(11) NOT NULL DEFAULT 0,
  `quantite_produit` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `montant_total` double NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `pannier`
--

INSERT INTO `pannier` (`id_commande`, `id_produit`, `id_client`, `quantite_produit`, `montant_total`) VALUES
(32, 4, 6, 1, 95000),
(69, 64, 1, 1, 120000),
(70, 65, 1, 1, 120000);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id_produit` mediumint(9) NOT NULL,
  `nom_produit` varchar(220) DEFAULT NULL,
  `monnaie` varchar(30) DEFAULT 'FCFA',
  `prix` int(11) DEFAULT 0,
  `description` text DEFAULT NULL,
  `quantite` int(11) NOT NULL,
  `photo` varchar(220) DEFAULT 'image.jpg',
  `nom_categorie` varchar(250) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id_produit`, `nom_produit`, `monnaie`, `prix`, `description`, `quantite`, `photo`, `nom_categorie`, `date`) VALUES
(1, 'Laptop Dell Studio XPS', 'FCFA', 128000, 'Dell\nintroduces a new line of powerful desktop PC, the Studio XPS 9100 with 6-core Core i7 processor.', 20, 'Dell_Corei7.jpg', 'Laptop', '2022-04-19'),
(2, 'xiaomi-redmi-note-11-version-globale_1', 'FCFA', 76000, 'Infinix Hot11 est un telephone android de dernieres generations coutant pas tres chers et presentant des caracteristiques\r\nmeilleures.Infinix Hot11 est un telephone android de dernieres generations coutant pas tres chers et presentant des caracteristiques\r\nmeilleures...', 10, '1669670202.jpg', 'smartphone', '2022-11-28'),
(3, 'Laptop Dell pentium5', 'FCFA', 30000, 'Laptop Dell pentuim de bonnes qualites presentant 3 autres petits baffles et plusieurs sorties usbmarque iphone 11 est...', 28, '1669670120.png', 'Laptop', '2022-11-28'),
(4, 'samsung-Smartphone-android-model-galaxy-A21s-64-4Go-300x300', 'FCFA', 95000, 'Le telephone portable de marque iphone 11 est un mobile de dernieres generations doter des caracteristiques tres puissantes.Astuce : centrer une image\r\nPour centrer une image, on la place dans\r\nun paragraphe (ou une div) dont le\r\ncontenu est aligner au centre\r\np.align-center {\r\ntext-align: center.', -12, '1669670095.png', 'smartphone', '2022-11-28'),
(5, 'Television-Numerique-Smart-INNOVA-60-pouces-model-60A127-noir', 'FCFA', 178000, 'Cet ecran plat est une television de taille 50 pouces ressortant une image de tres bonne qualite.\r\nAstuce:centrer une image\r\nPour centrer une image, on la place dans un paragraphe (ou une div) dont le contenu est aligner au centre\r\np.align-center {\r\ntext-align: center.', 16, '1669670055.jpg', 'Televiseur', '2022-11-28'),
(6, 'Desktop Dell pentium 7', 'FCFA', 69700, 'Dell\nintroduces a new line of powerful desktop PC, the Studio XPS 9100 with 6-core Core i7 processor.Astuce : centrer une image\nPour centrer une image, on la place dans\nun paragraphe (ou une div) dont le\ncontenu est aligner au centre\np.align-center {\ntext-align: center.', 14, 'Desktop_Dell_pentium_7.jpg', 'Desktop', '2022-04-19'),
(7, 'Telephone Android Itel A56', 'FCFA', 40000, 'Itel A56 nouvelle sortie avec des caracteristiques suivantes: memoire interne 16Go; Ram 1Go; Camera 10Mpx; Batterie 3000MA.sorties usb.11 est un mobile de dernieres generations doter des caracteristiques portable de marque iphone 11 est un mobile de dernieres generations doter des caracteristiques tres puissantes', 20, 'itelA56.jpg', 'smartphone', '2022-04-19'),
(8, 'Laptop Toshiba Studio 4Point5', 'FCFA', 75000, 'Toshiba\nintroduces a new line of powerful desktop PC, the Studio XPS 9100 with 6-core Core i7 processor.ne image\nPour centrer une image, on la place dans\nun paragraphe ', 11, 'Toshiba_Corei3.jpg', 'Laptop', '2022-04-24'),
(9, 'Phone Android Tecno Camon 13', 'FCFA', 86500, 'Smarphone Tecno Camon 13 est un telephone android de dernieres generations coutant pas tres chers et presentant des caracteristiques\r\nmeilleures.Infinix Hot11 est un telephone android.', -5, '1669669990.png', 'smartphone', '2022-11-28'),
(11, 'Laptop Futsiti Dual core', 'FCFA', 95000, 'Laptop Futsiti Dual core est un mobile de dernieres generations doter des caracteristiques tres puissantes.Astuce : centrer une image\nPour centrer une image, on la place dans\nun paragraphe (ou une div) dont le\ncontenu est aligner au center.', 10, 'Laptop_Futsiti_Dual_core.jpg', 'Laptop', '2022-04-19'),
(12, 'ecran plat LG 32pouces', 'FCFA', 178000, 'Cet ecran plat est une television de taille 50 pouces ressortant une image de tres bonne qualite.\r\nAstuce:centrer une image\r\nPour centrer une image, on la place dans un paragraphe (ou une div) dont le contenu est aligner au centre\r\np.align-center text-align center.', 20, '1669669966.jpg', 'Televiseur', '2022-11-28'),
(13, 'Desktop Compac Quad core', 'FCFA', 100700, 'Desktop Compac Quad core introduces a new line of powerful desktop PC, the Studio XPS 9100 with 6-core Core i7 processor.Astuce : centrer une image\nPour centrer une image, on la place dans\nun paragraphe (ou une div) dont le\ncontenu est aligner au centre\np.align-center.', 11, 'Desktop_Compac_Quad_core.jpg', 'Desktop', '2022-04-19'),
(16, 'HP Pavilion Power 580-015na Gaming PC', 'EURO', 87500, 'Choose the performance and storage you need. Boot up in seconds with to 128 GB SSD.\r\nDitch the dull grey box, this desktop comes infused with style. A new angular bezel and bold green and black design give your workspace just the right amount of attitude.Up to 3 times faster performance - GeForce GTX 10-series graphics cards are powered by Pascal to deliver twice the performance of previous-generation graphics cards.', 23, '1658949556.jpg', 'Desktop', '2022-07-28'),
(20, 'CamÃ©ra Dom MotorisÃ©e 24px', 'FCFA', 67000, 'Camera Dom motorisÃ© tres puissant.', 5, '1659056619.jpg', 'Camera', '2022-07-29'),
(22, 'Lenovo Pavilion Power 580-015na Gaming PC', 'FCFA', 120000, 'Lenovo introduces a new line of powerful laptop PC, the Studio XPS 9100 with 6-core Core i7 processor.Astuce : centrer une image Pour centrer une image, on la place dans un paragraphe (ou une div) dont le contenu est aligner au centre\r\np.align-center text-align: center.', 20, '1659044670.jpg', 'Laptop', '2022-07-28'),
(23, 'ACER Aspire GX-781 Gaming PC', 'FCFA', 765000, 'GTX 1050 graphics card lets you play huge games in great resolutions&nbsp;<br />\r\n<br />\r\n- Latest generation Core&trade; i5 processor can handle demanding media software&nbsp;\r\n- Superfast SSD storage lets you load programs in no time&nbsp;\r\nThe Acer&nbsp <strong>Aspire&nbsp;GX-781 Gaming PC&nbsp;</strong>is part of our Gaming range, which offers the most powerful PCs available today. It has outstanding graphics and processing performance to suit the most demanding gamer.\r\n', 4, '1659045281.jpg', 'Desktop', '2022-07-28'),
(24, 'large-amazon-fire-hd-8-tablet-alexa-2017-16-gb-black', 'FCFA', 765000, 'The next generation of our best-reviewed Fire tablet, with up to 12 hours of battery life, a vibrant 8\" HD display, a 1.3 GHz quad-core processor, 1.5 GB of RAM, and Dolby Audio. More durable than the latest iPad.16 or 32 GB of internal storage and a microSD slot for up to 256 GB of expandable storage.', -7, '1669669941.png', 'Smartphone', '2022-11-28'),
(25, 'Imprimante Lazer 3H-354DSE4', 'FCFA', 765000, '- Multi-task with ease thanks to IntelÂ® i5 processor \r\n\r\n- Prepare for battle with NVIDIA GeForce GTX graphics card \r\n\r\n- VR ready for the next-generation of immersive gaming and entertainment\r\n\r\n- Tool-less upgrade helps you personalise your system to your own demands Part of our Gaming range, which features the most powerful PCs available today, the Lenovo Legion Y520 Gaming PC has superior graphics and processing performance to suit the most demanding gamer.\r\n\r\n', 9, '1669670470.png', 'Imprimante', '2022-11-28'),
(27, 'smartwatch_oraimo_watch_2_pro-', 'FCFA', 30000, 'smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-vvvvvvvvsmartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-', 19, '1669670376.jpg', 'Montre', '2022-11-28'),
(28, 'Imprimante Lazer Noir sur blanc impression recto 3H-354DSE4', 'FCFA', 76000, 'Imprimante Lazer Noir sur blanc impression recto 3H-354DSE4Imprimante Lazer Noir sur blanc impression recto 3H-354DSE4Imprimante Lazer Noir sur blanc impression recto 3H-354DSE4Imprimante Lazer Noir sur blanc impression recto 3H-354DSE4Imprimante Lazer Noir sur blanc impression recto 3H-354DSE4Imprimante Lazer Noir sur blanc impression recto 3H-354DSE4Imprimante Lazer Noir sur blanc impression recto 3H-354DSE4Imprimante Lazer Noir sur blanc impression recto 3H-354DSE4Imprimante Lazer Noir sur blanc impression recto 3H-354DSE4', 1, '1669670688.png', 'Imprimante', '2022-11-28'),
(29, 'smart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_edition', 'La monnaie', 8650, 'smart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_edition', 17, '1669670821.jpg', 'Montre', '2022-11-28'),
(30, 'Laptop Dell 126G0 - 2G0 Ram - ', 'FCFA', 120000, 'Laptop Dell 126G0 - 2G0 Ram - vvvvvLaptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - ', 23, '1669709716.png', 'Laptop', '2022-11-29'),
(31, 'camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004', 'FCFA', 65000, 'camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004 camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004', 19, '1669741634.png', 'Camera', '2022-11-29'),
(32, 'CamÃ©ra Dom MotorisÃ©e 24px', 'FCFA', 67000, 'Camera Dom motorisÃ© tres puissant.', 5, '1659056619.jpg', 'Camera', '2022-07-29'),
(33, 'camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_002', 'FCFA', 67000, 'Camera Dom motorisÃ© tres puissant.', 5, 'camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_002.png', 'Camera', '2022-07-29'),
(34, 'CamÃ©ra Dom MotorisÃ©e 24px', 'FCFA', 67000, 'Camera Dom motorisÃ© tres puissant.', 2, '1671557014.png', 'Camera', '2022-12-20'),
(35, 'CamÃ©ra Dom MotorisÃ©e 24px', 'FCFA', 67000, 'Camera Dom motorisÃ© tres puissant.', 5, '1659056619.jpg', 'Camera', '2022-07-29'),
(36, 'Television-numerique-smart-STAR-SAT-50-Noir-Full-HD-AC-D_002', 'FCFA', 178000, 'Cet ecran plat est une television de taille 50 pouces ressortant une image de tres bonne qualite.\r\nAstuce:centrer une image\r\nPour centrer une image, on la place dans un paragraphe (ou une div) dont le contenu est aligner au centre\r\np.align-center {\r\ntext-align: center.', 16, 'Television-numerique-smart-STAR-SAT-50-Noir-Full-HD-AC-D_002.png', 'Televiseur', '2022-11-28'),
(37, 'Television-Numerique-Smart-INNOVA-60-pouces-model-60A127_004', 'FCFA', 178000, 'Cet ecran plat est une television de taille 50 pouces ressortant une image de tres bonne qualite.\r\nAstuce:centrer une image\r\nPour centrer une image, on la place dans un paragraphe (ou une div) dont le contenu est aligner au centre\r\np.align-center {\r\ntext-align: center.', 16, '1671556993.jpg', 'Televiseur', '2022-12-20'),
(38, 'Telesision tv-led-innova-32s2-an-Smart-INNOVA-60-pouces-model-60A127_005', 'FCFA', 178000, 'Cet ecran plat est une television de taille 50 pouces ressortant une image de tres bonne qualite.\r\nAstuce:centrer une image\r\nPour centrer une image, on la place dans un paragraphe (ou une div) dont le contenu est aligner au centre\r\np.align-center {\r\ntext-align: center.', 16, '1671556973.jpg', 'Televiseur', '2022-12-20'),
(50, 'Television-numerique-smart-STAR-SAT-50-Noir-Full-HD-AC-D_002', 'FCFA', 178000, 'Cet ecran plat est une television de taille 50 pouces ressortant une image de tres bonne qualite.\r\nAstuce:centrer une image\r\nPour centrer une image, on la place dans un paragraphe (ou une div) dont le contenu est aligner au centre\r\np.align-center {\r\ntext-align: center.', 16, 'Television-numerique-smart-STAR-SAT-50-Noir-Full-HD-AC-D_002.png', 'Televiseur', '2022-11-28'),
(51, 'Television-Numerique-Smart-INNOVA-60-pouces-model-60A127_004', 'FCFA', 178000, 'Cet ecran plat est une television de taille 50 pouces ressortant une image de tres bonne qualite.\r\nAstuce:centrer une image\r\nPour centrer une image, on la place dans un paragraphe (ou une div) dont le contenu est aligner au centre\r\np.align-center {\r\ntext-align: center.', 16, '1671556944.jpg', 'Televiseur', '2022-12-20'),
(52, 'Telesision tv-led-innova-32s2-an-Smart-INNOVA-60-pouces-model-60A127_005', 'FCFA', 178000, 'Cet ecran plat est une television de taille 50 pouces ressortant une image de tres bonne qualite.\r\nAstuce:centrer une image\r\nPour centrer une image, on la place dans un paragraphe (ou une div) dont le contenu est aligner au centre\r\np.align-center {\r\ntext-align: center.', 16, '1671556916.jpg', 'Televiseur', '2022-12-20'),
(53, 'Imprimante Lazer 3H-354DSE4', 'FCFA', 765000, '- Multi-task with ease thanks to IntelÂ® i5 processor \r\n\r\n- Prepare for battle with NVIDIA GeForce GTX graphics card \r\n\r\n- VR ready for the next-generation of immersive gaming and entertainment\r\n\r\n- Tool-less upgrade helps you personalise your system to your own demands Part of our Gaming range, which features the most powerful PCs available today, the Lenovo Legion Y520 Gaming PC has superior graphics and processing performance to suit the most demanding gamer.\r\n\r\n', 9, '1671557281.png', 'Imprimante', '2022-12-20'),
(54, 'Imprimante Lazer 3H-354DSE4', 'FCFA', 765000, '- Multi-task with ease thanks to IntelÂ® i5 processor \r\n\r\n- Prepare for battle with NVIDIA GeForce GTX graphics card \r\n\r\n- VR ready for the next-generation of immersive gaming and entertainment\r\n\r\n- Tool-less upgrade helps you personalise your system to your own demands Part of our Gaming range, which features the most powerful PCs available today, the Lenovo Legion Y520 Gaming PC has superior graphics and processing performance to suit the most demanding gamer.\r\n\r\n', 9, '1671557253.png', 'Imprimante', '2022-12-20'),
(55, 'Imprimante Lazer 3H-354DSE4', 'FCFA', 765000, '- Multi-task with ease thanks to IntelÂ® i5 processor \r\n\r\n- Prepare for battle with NVIDIA GeForce GTX graphics card \r\n\r\n- VR ready for the next-generation of immersive gaming and entertainment\r\n\r\n- Tool-less upgrade helps you personalise your system to your own demands Part of our Gaming range, which features the most powerful PCs available today, the Lenovo Legion Y520 Gaming PC has superior graphics and processing performance to suit the most demanding gamer.\r\n\r\n', 9, '1669670470.png', 'Imprimante', '2022-11-28'),
(56, 'Imprimante Lazer 3H-354DSE4', 'FCFA', 765000, '- Multi-task with ease thanks to IntelÂ® i5 processor \r\n\r\n- Prepare for battle with NVIDIA GeForce GTX graphics card \r\n\r\n- VR ready for the next-generation of immersive gaming and entertainment\r\n\r\n- Tool-less upgrade helps you personalise your system to your own demands Part of our Gaming range, which features the most powerful PCs available today, the Lenovo Legion Y520 Gaming PC has superior graphics and processing performance to suit the most demanding gamer.\r\n\r\n', 9, '1671557236.png', 'Imprimante', '2022-12-20'),
(57, 'smartwatch_oraimo_watch_2_pro-', 'FCFA', 30000, 'smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-vvvvvvvvsmartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-', 16, '1669670376.jpg', 'Montre', '2022-11-28'),
(58, 'smart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_edition', 'La monnaie', 8650, 'smart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_edition', 18, '1671557603.jpg', 'Montre', '2022-12-20'),
(59, 'smartwatch_oraimo_watch_2_pro-', 'FCFA', 30000, 'smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-vvvvvvvvsmartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-', 19, '1669670376.jpg', 'Montre', '2022-11-28'),
(60, 'smart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_edition', 'La monnaie', 8650, 'smart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_edition', 18, '1669670821.jpg', 'Montre', '2022-11-28'),
(61, 'Ordinateur-portable-PC-laptop-HP-15.6-pouces-300x300', 'FCFA', 120000, 'Laptop Dell 126G0 - 2G0 Ram - vvvvvLaptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - ', 23, '1671558054.jpg', 'Laptop', '2022-12-20'),
(62, 'Ordinateur-portable-PC-laptop-HP-15.6-pouces-300x300', 'FCFA', 120000, 'Laptop Dell 126G0 - 2G0 Ram - vvvvvLaptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - ', 14, 'Ordinateur-portable-PC-laptop-HP-15.6-pouces-300x300.png', 'Laptop', '2022-11-29'),
(63, 'Ordinateur-portable-PC-laptop-HP-15.6-pouces-300x300', 'FCFA', 120000, 'Laptop Dell 126G0 - 2G0 Ram - vvvvvLaptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - ', 22, '1671558022.jpg', 'Laptop', '2022-12-20'),
(64, 'Ordinateur-portable-PC-laptop-HP-15.6-pouces-300x300', 'FCFA', 120000, 'Laptop Dell 126G0 - 2G0 Ram - vvvvvLaptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - ', 22, '1671557999.jpg', 'Laptop', '2022-12-20'),
(65, 'Ordinateur-portable-PC-laptop-HP-15.6-pouces-300x300', 'FCFA', 120000, 'Laptop Dell 126G0 - 2G0 Ram - vvvvvLaptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - ', 22, '1671558082.jpg', 'Laptop', '2022-12-20'),
(66, 'Laptop Dell Studio XPS', 'FCFA', 128000, 'Dell\nintroduces a new line of powerful desktop PC, the Studio XPS 9100 with 6-core Core i7 processor.', 20, 'Dell_Corei7.jpg', 'Laptop', '2022-04-19'),
(67, 'Lenovo Pavilion Power 580-015na Gaming PC', 'FCFA', 120000, 'Lenovo introduces a new line of powerful laptop PC, the Studio XPS 9100 with 6-core Core i7 processor.Astuce : centrer une image Pour centrer une image, on la place dans un paragraphe (ou une div) dont le contenu est aligner au centre\r\np.align-center text-align: center.', 20, '1659044670.jpg', 'Laptop', '2022-07-28'),
(68, 'ACER Aspire GX-781 Gaming PC', 'FCFA', 765000, 'GTX 1050 graphics card lets you play huge games in great resolutions&nbsp;<br />\r\n<br />\r\n- Latest generation Core&trade; i5 processor can handle demanding media software&nbsp;\r\n- Superfast SSD storage lets you load programs in no time&nbsp;\r\nThe Acer&nbsp <strong>Aspire&nbsp;GX-781 Gaming PC&nbsp;</strong>is part of our Gaming range, which offers the most powerful PCs available today. It has outstanding graphics and processing performance to suit the most demanding gamer.\r\n', 4, '1659045281.jpg', 'Desktop', '2022-07-28'),
(69, 'large-amazon-fire-hd-8-tablet-alexa-2017-16-gb-black', 'FCFA', 765000, 'The next generation of our best-reviewed Fire tablet, with up to 12 hours of battery life, a vibrant 8\" HD display, a 1.3 GHz quad-core processor, 1.5 GB of RAM, and Dolby Audio. More durable than the latest iPad.16 or 32 GB of internal storage and a microSD slot for up to 256 GB of expandable storage.', -7, '1669669941.png', 'Smartphone', '2022-11-28'),
(70, 'xiaomi-redmi-note-11-version-globale_1', 'FCFA', 76000, 'Infinix Hot11 est un telephone android de dernieres generations coutant pas tres chers et presentant des caracteristiques\r\nmeilleures.Infinix Hot11 est un telephone android de dernieres generations coutant pas tres chers et presentant des caracteristiques\r\nmeilleures...', 10, '1669670202.jpg', 'smartphone', '2022-11-28'),
(71, 'xiaomi-redmi-note-11-version-globale_1', 'FCFA', 76000, 'Infinix Hot11 est un telephone android de dernieres generations coutant pas tres chers et presentant des caracteristiques\r\nmeilleures.Infinix Hot11 est un telephone android de dernieres generations coutant pas tres chers et presentant des caracteristiques\r\nmeilleures...', 10, '1669670202.jpg', 'smartphone', '2022-11-28'),
(72, 'Laptop Dell pentium5', 'FCFA', 30000, 'Laptop Dell pentuim de bonnes qualites presentant 3 autres petits baffles et plusieurs sorties usbmarque iphone 11 est...', 28, '1669670120.png', 'Laptop', '2022-11-28'),
(73, 'samsung-Smartphone-android-model-galaxy-A21s-64-4Go-300x300', 'FCFA', 95000, 'Le telephone portable de marque iphone 11 est un mobile de dernieres generations doter des caracteristiques tres puissantes.Astuce : centrer une image\r\nPour centrer une image, on la place dans\r\nun paragraphe (ou une div) dont le\r\ncontenu est aligner au centre\r\np.align-center {\r\ntext-align: center.', -12, '1669670095.png', 'smartphone', '2022-11-28'),
(74, 'Laptop Dell pentium5', 'FCFA', 30000, 'Laptop Dell pentuim de bonnes qualites presentant 3 autres petits baffles et plusieurs sorties usbmarque iphone 11 est...', 28, '1669670120.png', 'Laptop', '2022-11-28'),
(75, 'samsung-Smartphone-android-model-galaxy-A21s-64-4Go-300x300', 'FCFA', 95000, 'Le telephone portable de marque iphone 11 est un mobile de dernieres generations doter des caracteristiques tres puissantes.Astuce : centrer une image\r\nPour centrer une image, on la place dans\r\nun paragraphe (ou une div) dont le\r\ncontenu est aligner au centre\r\np.align-center {\r\ntext-align: center.', -12, '1669670095.png', 'smartphone', '2022-11-28'),
(76, 'Television-Numerique-Smart-INNOVA-60-pouces-model-60A127-noir', 'FCFA', 178000, 'Cet ecran plat est une television de taille 50 pouces ressortant une image de tres bonne qualite.\r\nAstuce:centrer une image\r\nPour centrer une image, on la place dans un paragraphe (ou une div) dont le contenu est aligner au centre\r\np.align-center {\r\ntext-align: center.', 16, '1669670055.jpg', 'Televiseur', '2022-11-28'),
(77, 'Desktop Dell pentium 7', 'FCFA', 69700, 'Dell\nintroduces a new line of powerful desktop PC, the Studio XPS 9100 with 6-core Core i7 processor.Astuce : centrer une image\nPour centrer une image, on la place dans\nun paragraphe (ou une div) dont le\ncontenu est aligner au centre\np.align-center {\ntext-align: center.', 14, 'Desktop_Dell_pentium_7.jpg', 'Desktop', '2022-04-19'),
(78, 'Lenovo Pavilion Power 580-015na Gaming PC', 'FCFA', 120000, 'Lenovo introduces a new line of powerful laptop PC, the Studio XPS 9100 with 6-core Core i7 processor.Astuce : centrer une image Pour centrer une image, on la place dans un paragraphe (ou une div) dont le contenu est aligner au centre\r\np.align-center text-align: center.', 20, '1659044670.jpg', 'Laptop', '2022-07-28'),
(79, 'xiaomi-redmi-note-11-version-globale_1', 'FCFA', 76000, 'Infinix Hot11 est un telephone android de dernieres generations coutant pas tres chers et presentant des caracteristiques\r\nmeilleures.Infinix Hot11 est un telephone android de dernieres generations coutant pas tres chers et presentant des caracteristiques\r\nmeilleures...', 10, '1669670202.jpg', 'smartphone', '2022-11-28'),
(80, 'Laptop Dell pentium5', 'FCFA', 30000, 'Laptop Dell pentuim de bonnes qualites presentant 3 autres petits baffles et plusieurs sorties usbmarque iphone 11 est...', 28, '1669670120.png', 'Laptop', '2022-11-28'),
(81, 'samsung-Smartphone-android-model-galaxy-A21s-64-4Go-300x300', 'FCFA', 95000, 'Le telephone portable de marque iphone 11 est un mobile de dernieres generations doter des caracteristiques tres puissantes.Astuce : centrer une image\r\nPour centrer une image, on la place dans\r\nun paragraphe (ou une div) dont le\r\ncontenu est aligner au centre\r\np.align-center {\r\ntext-align: center.', -12, '1669670095.png', 'smartphone', '2022-11-28'),
(82, 'xiaomi-redmi-note-11-version-globale_1', 'FCFA', 76000, 'Infinix Hot11 est un telephone android de dernieres generations coutant pas tres chers et presentant des caracteristiques\r\nmeilleures.Infinix Hot11 est un telephone android de dernieres generations coutant pas tres chers et presentant des caracteristiques\r\nmeilleures...', 10, '1669670202.jpg', 'smartphone', '2022-11-28'),
(83, 'Laptop Dell pentium5', 'FCFA', 30000, 'Laptop Dell pentuim de bonnes qualites presentant 3 autres petits baffles et plusieurs sorties usbmarque iphone 11 est...', 28, '1669670120.png', 'Laptop', '2022-11-28'),
(84, 'samsung-Smartphone-android-model-galaxy-A21s-64-4Go-300x300', 'FCFA', 95000, 'Le telephone portable de marque iphone 11 est un mobile de dernieres generations doter des caracteristiques tres puissantes.Astuce : centrer une image\r\nPour centrer une image, on la place dans\r\nun paragraphe (ou une div) dont le\r\ncontenu est aligner au centre\r\np.align-center {\r\ntext-align: center.', -12, '1669670095.png', 'smartphone', '2022-11-28'),
(85, 'ACER Aspire GX-781 Gaming PC', 'FCFA', 765000, 'GTX 1050 graphics card lets you play huge games in great resolutions&nbsp;<br />\r\n<br />\r\n- Latest generation Core&trade; i5 processor can handle demanding media software&nbsp;\r\n- Superfast SSD storage lets you load programs in no time&nbsp;\r\nThe Acer&nbsp <strong>Aspire&nbsp;GX-781 Gaming PC&nbsp;</strong>is part of our Gaming range, which offers the most powerful PCs available today. It has outstanding graphics and processing performance to suit the most demanding gamer.\r\n', 4, '1659045281.jpg', 'Desktop', '2022-07-28'),
(86, 'large-amazon-fire-hd-8-tablet-alexa-2017-16-gb-black', 'FCFA', 765000, 'The next generation of our best-reviewed Fire tablet, with up to 12 hours of battery life, a vibrant 8\" HD display, a 1.3 GHz quad-core processor, 1.5 GB of RAM, and Dolby Audio. More durable than the latest iPad.16 or 32 GB of internal storage and a microSD slot for up to 256 GB of expandable storage.', -7, '1669669941.png', 'Smartphone', '2022-11-28'),
(87, 'xiaomi-redmi-note-11-version-globale_1', 'FCFA', 76000, 'Infinix Hot11 est un telephone android de dernieres generations coutant pas tres chers et presentant des caracteristiques\r\nmeilleures.Infinix Hot11 est un telephone android de dernieres generations coutant pas tres chers et presentant des caracteristiques\r\nmeilleures...', 10, '1669670202.jpg', 'smartphone', '2022-11-28'),
(88, 'Laptop Dell pentium5', 'FCFA', 30000, 'Laptop Dell pentuim de bonnes qualites presentant 3 autres petits baffles et plusieurs sorties usbmarque iphone 11 est...', 28, '1669670120.png', 'Laptop', '2022-11-28'),
(89, 'samsung-Smartphone-android-model-galaxy-A21s-64-4Go-300x300', 'FCFA', 95000, 'Le telephone portable de marque iphone 11 est un mobile de dernieres generations doter des caracteristiques tres puissantes.Astuce : centrer une image\r\nPour centrer une image, on la place dans\r\nun paragraphe (ou une div) dont le\r\ncontenu est aligner au centre\r\np.align-center {\r\ntext-align: center.', -12, '1669670095.png', 'smartphone', '2022-11-28'),
(90, 'Telephone Android Itel A56', 'FCFA', 40000, 'Itel A56 nouvelle sortie avec des caracteristiques suivantes: memoire interne 16Go; Ram 1Go; Camera 10Mpx; Batterie 3000MA.sorties usb.11 est un mobile de dernieres generations doter des caracteristiques portable de marque iphone 11 est un mobile de dernieres generations doter des caracteristiques tres puissantes', 20, 'itelA56.jpg', 'smartphone', '2022-04-19'),
(91, 'Laptop Toshiba Studio 4Point5', 'FCFA', 75000, 'Toshiba\nintroduces a new line of powerful desktop PC, the Studio XPS 9100 with 6-core Core i7 processor.ne image\nPour centrer une image, on la place dans\nun paragraphe ', 11, 'Toshiba_Corei3.jpg', 'Laptop', '2022-04-24'),
(92, 'Phone Android Tecno Camon 13', 'FCFA', 86500, 'Smarphone Tecno Camon 13 est un telephone android de dernieres generations coutant pas tres chers et presentant des caracteristiques\r\nmeilleures.Infinix Hot11 est un telephone android.', -5, '1669669990.png', 'smartphone', '2022-11-28'),
(93, 'Laptop Futsiti Dual core', 'FCFA', 95000, 'Laptop Futsiti Dual core est un mobile de dernieres generations doter des caracteristiques tres puissantes.Astuce : centrer une image\nPour centrer une image, on la place dans\nun paragraphe (ou une div) dont le\ncontenu est aligner au center.', 10, 'Laptop_Futsiti_Dual_core.jpg', 'Laptop', '2022-04-19'),
(94, 'ecran plat LG 32pouces', 'FCFA', 178000, 'Cet ecran plat est une television de taille 50 pouces ressortant une image de tres bonne qualite.\r\nAstuce:centrer une image\r\nPour centrer une image, on la place dans un paragraphe (ou une div) dont le contenu est aligner au centre\r\np.align-center text-align center.', 20, '1669669966.jpg', 'Televiseur', '2022-11-28'),
(95, 'Desktop Compac Quad core', 'FCFA', 100700, 'Desktop Compac Quad core introduces a new line of powerful desktop PC, the Studio XPS 9100 with 6-core Core i7 processor.Astuce : centrer une image\nPour centrer une image, on la place dans\nun paragraphe (ou une div) dont le\ncontenu est aligner au centre\np.align-center.', 11, 'Desktop_Compac_Quad_core.jpg', 'Desktop', '2022-04-19'),
(96, 'HP Pavilion Power 580-015na Gaming PC', 'EURO', 87500, 'Choose the performance and storage you need. Boot up in seconds with to 128 GB SSD.\r\nDitch the dull grey box, this desktop comes infused with style. A new angular bezel and bold green and black design give your workspace just the right amount of attitude.Up to 3 times faster performance - GeForce GTX 10-series graphics cards are powered by Pascal to deliver twice the performance of previous-generation graphics cards.', 23, '1658949556.jpg', 'Desktop', '2022-07-28'),
(97, 'CamÃ©ra Dom MotorisÃ©e 24px', 'FCFA', 67000, 'Camera Dom motorisÃ© tres puissant.', 5, '1659056619.jpg', 'Camera', '2022-07-29'),
(98, 'Lenovo Pavilion Power 580-015na Gaming PC', 'FCFA', 120000, 'Lenovo introduces a new line of powerful laptop PC, the Studio XPS 9100 with 6-core Core i7 processor.Astuce : centrer une image Pour centrer une image, on la place dans un paragraphe (ou une div) dont le contenu est aligner au centre\r\np.align-center text-align: center.', 20, '1659044670.jpg', 'Laptop', '2022-07-28'),
(99, 'ACER Aspire GX-781 Gaming PC', 'FCFA', 765000, 'GTX 1050 graphics card lets you play huge games in great resolutions&nbsp;<br />\r\n<br />\r\n- Latest generation Core&trade; i5 processor can handle demanding media software&nbsp;\r\n- Superfast SSD storage lets you load programs in no time&nbsp;\r\nThe Acer&nbsp <strong>Aspire&nbsp;GX-781 Gaming PC&nbsp;</strong>is part of our Gaming range, which offers the most powerful PCs available today. It has outstanding graphics and processing performance to suit the most demanding gamer.\r\n', 4, '1659045281.jpg', 'Desktop', '2022-07-28'),
(100, 'large-amazon-fire-hd-8-tablet-alexa-2017-16-gb-black', 'FCFA', 765000, 'The next generation of our best-reviewed Fire tablet, with up to 12 hours of battery life, a vibrant 8\" HD display, a 1.3 GHz quad-core processor, 1.5 GB of RAM, and Dolby Audio. More durable than the latest iPad.16 or 32 GB of internal storage and a microSD slot for up to 256 GB of expandable storage.', -7, '1669669941.png', 'Smartphone', '2022-11-28'),
(101, 'Imprimante Lazer 3H-354DSE4', 'FCFA', 765000, '- Multi-task with ease thanks to IntelÂ® i5 processor \r\n\r\n- Prepare for battle with NVIDIA GeForce GTX graphics card \r\n\r\n- VR ready for the next-generation of immersive gaming and entertainment\r\n\r\n- Tool-less upgrade helps you personalise your system to your own demands Part of our Gaming range, which features the most powerful PCs available today, the Lenovo Legion Y520 Gaming PC has superior graphics and processing performance to suit the most demanding gamer.\r\n\r\n', 9, '1669670470.png', 'Imprimante', '2022-11-28'),
(102, 'Lenovo Pavilion Power 580-015na Gaming PC', 'FCFA', 120000, 'Lenovo introduces a new line of powerful laptop PC, the Studio XPS 9100 with 6-core Core i7 processor.Astuce : centrer une image Pour centrer une image, on la place dans un paragraphe (ou une div) dont le contenu est aligner au centre\r\np.align-center text-align: center.', 20, '1659044670.jpg', 'Laptop', '2022-07-28'),
(103, 'ACER Aspire GX-781 Gaming PC', 'FCFA', 765000, 'GTX 1050 graphics card lets you play huge games in great resolutions&nbsp;<br />\r\n<br />\r\n- Latest generation Core&trade; i5 processor can handle demanding media software&nbsp;\r\n- Superfast SSD storage lets you load programs in no time&nbsp;\r\nThe Acer&nbsp <strong>Aspire&nbsp;GX-781 Gaming PC&nbsp;</strong>is part of our Gaming range, which offers the most powerful PCs available today. It has outstanding graphics and processing performance to suit the most demanding gamer.\r\n', 4, '1659045281.jpg', 'Desktop', '2022-07-28'),
(104, 'large-amazon-fire-hd-8-tablet-alexa-2017-16-gb-black', 'FCFA', 765000, 'The next generation of our best-reviewed Fire tablet, with up to 12 hours of battery life, a vibrant 8\" HD display, a 1.3 GHz quad-core processor, 1.5 GB of RAM, and Dolby Audio. More durable than the latest iPad.16 or 32 GB of internal storage and a microSD slot for up to 256 GB of expandable storage.', -7, '1669669941.png', 'Smartphone', '2022-11-28'),
(105, 'smartwatch_oraimo_watch_2_pro-', 'FCFA', 30000, 'smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-vvvvvvvvsmartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-', 19, '1669670376.jpg', 'Montre', '2022-11-28'),
(106, 'Lenovo Pavilion Power 580-015na Gaming PC', 'FCFA', 120000, 'Lenovo introduces a new line of powerful laptop PC, the Studio XPS 9100 with 6-core Core i7 processor.Astuce : centrer une image Pour centrer une image, on la place dans un paragraphe (ou une div) dont le contenu est aligner au centre\r\np.align-center text-align: center.', 20, '1659044670.jpg', 'Laptop', '2022-07-28'),
(107, 'ACER Aspire GX-781 Gaming PC', 'FCFA', 765000, 'GTX 1050 graphics card lets you play huge games in great resolutions&nbsp;<br />\r\n<br />\r\n- Latest generation Core&trade; i5 processor can handle demanding media software&nbsp;\r\n- Superfast SSD storage lets you load programs in no time&nbsp;\r\nThe Acer&nbsp <strong>Aspire&nbsp;GX-781 Gaming PC&nbsp;</strong>is part of our Gaming range, which offers the most powerful PCs available today. It has outstanding graphics and processing performance to suit the most demanding gamer.\r\n', 4, '1659045281.jpg', 'Desktop', '2022-07-28'),
(108, 'large-amazon-fire-hd-8-tablet-alexa-2017-16-gb-black', 'FCFA', 765000, 'The next generation of our best-reviewed Fire tablet, with up to 12 hours of battery life, a vibrant 8\" HD display, a 1.3 GHz quad-core processor, 1.5 GB of RAM, and Dolby Audio. More durable than the latest iPad.16 or 32 GB of internal storage and a microSD slot for up to 256 GB of expandable storage.', -7, '1669669941.png', 'Smartphone', '2022-11-28'),
(109, 'Imprimante Lazer Noir sur blanc impression recto 3H-354DSE4', 'FCFA', 76000, 'Imprimante Lazer Noir sur blanc impression recto 3H-354DSE4Imprimante Lazer Noir sur blanc impression recto 3H-354DSE4Imprimante Lazer Noir sur blanc impression recto 3H-354DSE4Imprimante Lazer Noir sur blanc impression recto 3H-354DSE4Imprimante Lazer Noir sur blanc impression recto 3H-354DSE4Imprimante Lazer Noir sur blanc impression recto 3H-354DSE4Imprimante Lazer Noir sur blanc impression recto 3H-354DSE4Imprimante Lazer Noir sur blanc impression recto 3H-354DSE4Imprimante Lazer Noir sur blanc impression recto 3H-354DSE4', 1, '1669670688.png', 'Imprimante', '2022-11-28'),
(110, 'smart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_edition', 'La monnaie', 8650, 'smart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_edition', 17, '1669670821.jpg', 'Montre', '2022-11-28'),
(111, 'Laptop Dell 126G0 - 2G0 Ram - ', 'FCFA', 120000, 'Laptop Dell 126G0 - 2G0 Ram - vvvvvLaptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - ', 23, '1669709716.png', 'Laptop', '2022-11-29'),
(112, 'camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004', 'FCFA', 65000, 'camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004 camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004', 19, '1669741634.png', 'Camera', '2022-11-29'),
(113, 'CamÃ©ra Dom MotorisÃ©e 24px', 'FCFA', 67000, 'Camera Dom motorisÃ© tres puissant.', 5, '1659056619.jpg', 'Camera', '2022-07-29'),
(114, 'camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004', 'FCFA', 65000, 'camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004 camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004', 19, '1669741634.png', 'Camera', '2022-11-29'),
(115, 'CamÃ©ra -Numerique-Smart-INNOVA-60-pouces-model-60A127_004', 'FCFA', 67000, 'Camera Dom motorisÃ© tres puissant.', 5, '1659056619.jpg', 'Camera', '2022-07-29'),
(116, 'camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004', 'FCFA', 65000, 'camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004 camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004', 19, '1669741634.png', 'Camera', '2022-11-29'),
(117, 'CamÃ©ra Dom MotorisÃ©e 24px', 'FCFA', 67000, 'Camera Dom motorisÃ© tres puissant.', 5, '1659056619.jpg', 'Camera', '2022-07-29'),
(118, 'camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004', 'FCFA', 65000, 'camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004 camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004', 19, '1669741634.png', 'Camera', '2022-11-29'),
(119, 'CamÃ©ra Dom MotorisÃ©e 24px', 'FCFA', 67000, 'Camera Dom motorisÃ© tres puissant.', 5, '1659056619.jpg', 'Camera', '2022-07-29'),
(120, 'camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_002', 'FCFA', 67000, 'Camera Dom motorisÃ© tres puissant.', 5, 'camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_002.png', 'Camera', '2022-07-29'),
(121, 'CamÃ©ra -Numerique-Smart-INNOVA-60-pouces-model-60A127_004', 'FCFA', 67000, 'Camera Dom motorisÃ© tres puissant.', 2, '1671557014.png', 'Camera', '2022-12-20'),
(122, 'CamÃ©ra Dom MotorisÃ©e 24px', 'FCFA', 67000, 'Camera Dom motorisÃ© tres puissant.', 5, '1659056619.jpg', 'Camera', '2022-07-29'),
(123, 'Television-numerique-smart-STAR-SAT-50-Noir-Full-HD-AC-D_002', 'FCFA', 178000, 'Cet ecran plat est une television de taille 50 pouces ressortant une image de tres bonne qualite.\r\nAstuce:centrer une image\r\nPour centrer une image, on la place dans un paragraphe (ou une div) dont le contenu est aligner au centre\r\np.align-center {\r\ntext-align: center.', 16, 'Television-numerique-smart-STAR-SAT-50-Noir-Full-HD-AC-D_002.png', 'Televiseur', '2022-11-28'),
(124, 'Television-Numerique-Smart-INNOVA-60-pouces-model-60A127_004', 'FCFA', 178000, 'Cet ecran plat est une television de taille 50 pouces ressortant une image de tres bonne qualite.\r\nAstuce:centrer une image\r\nPour centrer une image, on la place dans un paragraphe (ou une div) dont le contenu est aligner au centre\r\np.align-center {\r\ntext-align: center.', 16, '1671556993.jpg', 'Televiseur', '2022-12-20'),
(125, 'Imprimante Lazer 3H-354DSE4', 'FCFA', 765000, '- Multi-task with ease thanks to IntelÂ® i5 processor \r\n\r\n- Prepare for battle with NVIDIA GeForce GTX graphics card \r\n\r\n- VR ready for the next-generation of immersive gaming and entertainment\r\n\r\n- Tool-less upgrade helps you personalise your system to your own demands Part of our Gaming range, which features the most powerful PCs available today, the Lenovo Legion Y520 Gaming PC has superior graphics and processing performance to suit the most demanding gamer.\r\n\r\n', 9, '1671557236.png', 'Imprimante', '2022-12-20'),
(126, 'Imprimante Lazer 3H-354DSE4', 'FCFA', 765000, '- Multi-task with ease thanks to IntelÂ® i5 processor \r\n\r\n- Prepare for battle with NVIDIA GeForce GTX graphics card \r\n\r\n- VR ready for the next-generation of immersive gaming and entertainment\r\n\r\n- Tool-less upgrade helps you personalise your system to your own demands Part of our Gaming range, which features the most powerful PCs available today, the Lenovo Legion Y520 Gaming PC has superior graphics and processing performance to suit the most demanding gamer.\r\n\r\n', 9, '1671557236.png', 'Imprimante', '2022-12-20'),
(127, 'Imprimante Lazer 3H-354DSE4', 'FCFA', 765000, '- Multi-task with ease thanks to IntelÂ® i5 processor \r\n\r\n- Prepare for battle with NVIDIA GeForce GTX graphics card \r\n\r\n- VR ready for the next-generation of immersive gaming and entertainment\r\n\r\n- Tool-less upgrade helps you personalise your system to your own demands Part of our Gaming range, which features the most powerful PCs available today, the Lenovo Legion Y520 Gaming PC has superior graphics and processing performance to suit the most demanding gamer.\r\n\r\n', 9, '1671557236.png', 'Imprimante', '2022-12-20'),
(128, 'Telesision tv-led-innova-32s2-an-Smart-INNOVA-60-pouces-model-60A127_005', 'FCFA', 178000, 'Cet ecran plat est une television de taille 50 pouces ressortant une image de tres bonne qualite.\r\nAstuce:centrer une image\r\nPour centrer une image, on la place dans un paragraphe (ou une div) dont le contenu est aligner au centre\r\np.align-center {\r\ntext-align: center.', 16, '1671556973.jpg', 'Televiseur', '2022-12-20'),
(129, 'Television-numerique-smart-STAR-SAT-50-Noir-Full-HD-AC-D_002', 'FCFA', 178000, 'Cet ecran plat est une television de taille 50 pouces ressortant une image de tres bonne qualite.\r\nAstuce:centrer une image\r\nPour centrer une image, on la place dans un paragraphe (ou une div) dont le contenu est aligner au centre\r\np.align-center {\r\ntext-align: center.', 16, 'Television-numerique-smart-STAR-SAT-50-Noir-Full-HD-AC-D_002.png', 'Televiseur', '2022-11-28'),
(130, 'Television-Numerique-Smart-INNOVA-60-pouces-model-60A127_004', 'FCFA', 178000, 'Cet ecran plat est une television de taille 50 pouces ressortant une image de tres bonne qualite.\r\nAstuce:centrer une image\r\nPour centrer une image, on la place dans un paragraphe (ou une div) dont le contenu est aligner au centre\r\np.align-center {\r\ntext-align: center.', 16, '1671556944.jpg', 'Televiseur', '2022-12-20'),
(131, 'Telesision tv-led-innova-32s2-an-Smart-INNOVA-60-pouces-model-60A127_005', 'FCFA', 178000, 'Cet ecran plat est une television de taille 50 pouces ressortant une image de tres bonne qualite.\r\nAstuce:centrer une image\r\nPour centrer une image, on la place dans un paragraphe (ou une div) dont le contenu est aligner au centre\r\np.align-center {\r\ntext-align: center.', 16, '1671556916.jpg', 'Televiseur', '2022-12-20'),
(132, 'Imprimante Lazer 3H-354DSE4', 'FCFA', 765000, '- Multi-task with ease thanks to IntelÂ® i5 processor \r\n\r\n- Prepare for battle with NVIDIA GeForce GTX graphics card \r\n\r\n- VR ready for the next-generation of immersive gaming and entertainment\r\n\r\n- Tool-less upgrade helps you personalise your system to your own demands Part of our Gaming range, which features the most powerful PCs available today, the Lenovo Legion Y520 Gaming PC has superior graphics and processing performance to suit the most demanding gamer.\r\n\r\n', 9, '1671557281.png', 'Imprimante', '2022-12-20'),
(133, 'Imprimante Lazer 3H-354DSE4', 'FCFA', 765000, '- Multi-task with ease thanks to IntelÂ® i5 processor \r\n\r\n- Prepare for battle with NVIDIA GeForce GTX graphics card \r\n\r\n- VR ready for the next-generation of immersive gaming and entertainment\r\n\r\n- Tool-less upgrade helps you personalise your system to your own demands Part of our Gaming range, which features the most powerful PCs available today, the Lenovo Legion Y520 Gaming PC has superior graphics and processing performance to suit the most demanding gamer.\r\n\r\n', 9, '1671557253.png', 'Imprimante', '2022-12-20'),
(134, 'Imprimante Lazer 3H-354DSE4', 'FCFA', 765000, '- Multi-task with ease thanks to IntelÂ® i5 processor \r\n\r\n- Prepare for battle with NVIDIA GeForce GTX graphics card \r\n\r\n- VR ready for the next-generation of immersive gaming and entertainment\r\n\r\n- Tool-less upgrade helps you personalise your system to your own demands Part of our Gaming range, which features the most powerful PCs available today, the Lenovo Legion Y520 Gaming PC has superior graphics and processing performance to suit the most demanding gamer.\r\n\r\n', 9, '1671557236.png', 'Imprimante', '2022-12-20'),
(135, 'Imprimante Lazer 3H-354DSE4', 'FCFA', 765000, '- Multi-task with ease thanks to IntelÂ® i5 processor \r\n\r\n- Prepare for battle with NVIDIA GeForce GTX graphics card \r\n\r\n- VR ready for the next-generation of immersive gaming and entertainment\r\n\r\n- Tool-less upgrade helps you personalise your system to your own demands Part of our Gaming range, which features the most powerful PCs available today, the Lenovo Legion Y520 Gaming PC has superior graphics and processing performance to suit the most demanding gamer.\r\n\r\n', 9, '1671557236.png', 'Imprimante', '2022-12-20'),
(136, 'Imprimante Lazer 3H-354DSE4', 'FCFA', 765000, '- Multi-task with ease thanks to IntelÂ® i5 processor \r\n\r\n- Prepare for battle with NVIDIA GeForce GTX graphics card \r\n\r\n- VR ready for the next-generation of immersive gaming and entertainment\r\n\r\n- Tool-less upgrade helps you personalise your system to your own demands Part of our Gaming range, which features the most powerful PCs available today, the Lenovo Legion Y520 Gaming PC has superior graphics and processing performance to suit the most demanding gamer.\r\n\r\n', 9, '1671557281.png', 'Imprimante', '2022-12-20');
INSERT INTO `produit` (`id_produit`, `nom_produit`, `monnaie`, `prix`, `description`, `quantite`, `photo`, `nom_categorie`, `date`) VALUES
(137, 'Imprimante Lazer 3H-354DSE4', 'FCFA', 765000, '- Multi-task with ease thanks to IntelÂ® i5 processor \r\n\r\n- Prepare for battle with NVIDIA GeForce GTX graphics card \r\n\r\n- VR ready for the next-generation of immersive gaming and entertainment\r\n\r\n- Tool-less upgrade helps you personalise your system to your own demands Part of our Gaming range, which features the most powerful PCs available today, the Lenovo Legion Y520 Gaming PC has superior graphics and processing performance to suit the most demanding gamer.\r\n\r\n', 9, '1671557253.png', 'Imprimante', '2022-12-20'),
(138, 'Imprimante Lazer 3H-354DSE4', 'FCFA', 765000, '- Multi-task with ease thanks to IntelÂ® i5 processor \r\n\r\n- Prepare for battle with NVIDIA GeForce GTX graphics card \r\n\r\n- VR ready for the next-generation of immersive gaming and entertainment\r\n\r\n- Tool-less upgrade helps you personalise your system to your own demands Part of our Gaming range, which features the most powerful PCs available today, the Lenovo Legion Y520 Gaming PC has superior graphics and processing performance to suit the most demanding gamer.\r\n\r\n', 9, '1671557236.png', 'Imprimante', '2022-12-20'),
(139, 'smartwatch_oraimo_watch_2_pro-', 'FCFA', 30000, 'smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-vvvvvvvvsmartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-', 19, '1669670376.jpg', 'Montre', '2022-11-28'),
(140, 'smart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_edition', 'La monnaie', 8650, 'smart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_edition', 18, '1669670821.jpg', 'Montre', '2022-11-28'),
(141, 'smartwatch_oraimo_watch_2_pro-', 'FCFA', 30000, 'smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-vvvvvvvvsmartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-', 19, '1669670376.jpg', 'Montre', '2022-11-28'),
(142, 'smart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_edition', 'La monnaie', 8650, 'smart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_edition', 18, '1669670821.jpg', 'Montre', '2022-11-28'),
(143, 'Imprimante Lazer 3H-354DSE4', 'FCFA', 765000, '- Multi-task with ease thanks to IntelÂ® i5 processor \r\n\r\n- Prepare for battle with NVIDIA GeForce GTX graphics card \r\n\r\n- VR ready for the next-generation of immersive gaming and entertainment\r\n\r\n- Tool-less upgrade helps you personalise your system to your own demands Part of our Gaming range, which features the most powerful PCs available today, the Lenovo Legion Y520 Gaming PC has superior graphics and processing performance to suit the most demanding gamer.\r\n\r\n', 9, '1669670470.png', 'Imprimante', '2022-11-28'),
(144, 'Imprimante Lazer 3H-354DSE4', 'FCFA', 765000, '- Multi-task with ease thanks to IntelÂ® i5 processor \r\n\r\n- Prepare for battle with NVIDIA GeForce GTX graphics card \r\n\r\n- VR ready for the next-generation of immersive gaming and entertainment\r\n\r\n- Tool-less upgrade helps you personalise your system to your own demands Part of our Gaming range, which features the most powerful PCs available today, the Lenovo Legion Y520 Gaming PC has superior graphics and processing performance to suit the most demanding gamer.\r\n\r\n', 9, '1671557236.png', 'Imprimante', '2022-12-20'),
(145, 'smartwatch_oraimo_watch_2_pro-', 'FCFA', 30000, 'smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-vvvvvvvvsmartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-', 16, '1669670376.jpg', 'Montre', '2022-11-28'),
(146, 'smart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_edition', 'La monnaie', 8650, 'smart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_edition', 18, '1671557603.jpg', 'Montre', '2022-12-20'),
(147, 'smartwatch_oraimo_watch_2_pro-', 'FCFA', 30000, 'smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-vvvvvvvvsmartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-', 19, '1669670376.jpg', 'Montre', '2022-11-28'),
(148, 'Ordinateur-portable-PC-laptop-HP-15.6-pouces-300x300', 'FCFA', 120000, 'Laptop Dell 126G0 - 2G0 Ram - vvvvvLaptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - ', 22, '1671557999.jpg', 'Laptop', '2022-12-20'),
(149, 'Ordinateur-portable-PC-laptop-HP-15.6-pouces-300x300', 'FCFA', 120000, 'Laptop Dell 126G0 - 2G0 Ram - vvvvvLaptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - ', 22, '1671558082.jpg', 'Laptop', '2022-12-20'),
(150, 'Laptop Dell Studio XPS', 'FCFA', 128000, 'Dell\nintroduces a new line of powerful desktop PC, the Studio XPS 9100 with 6-core Core i7 processor.', 20, 'Dell_Corei7.jpg', 'Laptop', '2022-04-19'),
(151, 'Lenovo Pavilion Power 580-015na Gaming PC', 'FCFA', 120000, 'Lenovo introduces a new line of powerful laptop PC, the Studio XPS 9100 with 6-core Core i7 processor.Astuce : centrer une image Pour centrer une image, on la place dans un paragraphe (ou une div) dont le contenu est aligner au centre\r\np.align-center text-align: center.', 20, '1659044670.jpg', 'Laptop', '2022-07-28'),
(152, 'ACER Aspire GX-781 Gaming PC', 'FCFA', 765000, 'GTX 1050 graphics card lets you play huge games in great resolutions&nbsp;<br />\r\n<br />\r\n- Latest generation Core&trade; i5 processor can handle demanding media software&nbsp;\r\n- Superfast SSD storage lets you load programs in no time&nbsp;\r\nThe Acer&nbsp <strong>Aspire&nbsp;GX-781 Gaming PC&nbsp;</strong>is part of our Gaming range, which offers the most powerful PCs available today. It has outstanding graphics and processing performance to suit the most demanding gamer.\r\n', 4, '1659045281.jpg', 'Desktop', '2022-07-28'),
(153, 'large-amazon-fire-hd-8-tablet-alexa-2017-16-gb-black', 'FCFA', 765000, 'The next generation of our best-reviewed Fire tablet, with up to 12 hours of battery life, a vibrant 8\" HD display, a 1.3 GHz quad-core processor, 1.5 GB of RAM, and Dolby Audio. More durable than the latest iPad.16 or 32 GB of internal storage and a microSD slot for up to 256 GB of expandable storage.', -7, '1669669941.png', 'Smartphone', '2022-11-28'),
(154, 'xiaomi-redmi-note-11-version-globale_1', 'FCFA', 76000, 'Infinix Hot11 est un telephone android de dernieres generations coutant pas tres chers et presentant des caracteristiques\r\nmeilleures.Infinix Hot11 est un telephone android de dernieres generations coutant pas tres chers et presentant des caracteristiques\r\nmeilleures...', 10, '1669670202.jpg', 'smartphone', '2022-11-28'),
(155, 'xiaomi-redmi-note-11-version-globale_1', 'FCFA', 76000, 'Infinix Hot11 est un telephone android de dernieres generations coutant pas tres chers et presentant des caracteristiques\r\nmeilleures.Infinix Hot11 est un telephone android de dernieres generations coutant pas tres chers et presentant des caracteristiques\r\nmeilleures...', 10, '1669670202.jpg', 'smartphone', '2022-11-28'),
(156, 'Laptop Dell pentium5', 'FCFA', 30000, 'Laptop Dell pentuim de bonnes qualites presentant 3 autres petits baffles et plusieurs sorties usbmarque iphone 11 est...', 28, '1669670120.png', 'Laptop', '2022-11-28'),
(157, 'samsung-Smartphone-android-model-galaxy-A21s-64-4Go-300x300', 'FCFA', 95000, 'Le telephone portable de marque iphone 11 est un mobile de dernieres generations doter des caracteristiques tres puissantes.Astuce : centrer une image\r\nPour centrer une image, on la place dans\r\nun paragraphe (ou une div) dont le\r\ncontenu est aligner au centre\r\np.align-center {\r\ntext-align: center.', -12, '1669670095.png', 'smartphone', '2022-11-28'),
(158, 'Laptop Dell pentium5', 'FCFA', 30000, 'Laptop Dell pentuim de bonnes qualites presentant 3 autres petits baffles et plusieurs sorties usbmarque iphone 11 est...', 28, '1669670120.png', 'Laptop', '2022-11-28'),
(159, 'samsung-Smartphone-android-model-galaxy-A21s-64-4Go-300x300', 'FCFA', 95000, 'Le telephone portable de marque iphone 11 est un mobile de dernieres generations doter des caracteristiques tres puissantes.Astuce : centrer une image\r\nPour centrer une image, on la place dans\r\nun paragraphe (ou une div) dont le\r\ncontenu est aligner au centre\r\np.align-center {\r\ntext-align: center.', -12, '1669670095.png', 'smartphone', '2022-11-28'),
(160, 'Television-Numerique-Smart-INNOVA-60-pouces-model-60A127-noir', 'FCFA', 178000, 'Cet ecran plat est une television de taille 50 pouces ressortant une image de tres bonne qualite.\r\nAstuce:centrer une image\r\nPour centrer une image, on la place dans un paragraphe (ou une div) dont le contenu est aligner au centre\r\np.align-center {\r\ntext-align: center.', 16, '1669670055.jpg', 'Televiseur', '2022-11-28'),
(161, 'Desktop Dell pentium 7', 'FCFA', 69700, 'Dell\nintroduces a new line of powerful desktop PC, the Studio XPS 9100 with 6-core Core i7 processor.Astuce : centrer une image\nPour centrer une image, on la place dans\nun paragraphe (ou une div) dont le\ncontenu est aligner au centre\np.align-center {\ntext-align: center.', 14, 'Desktop_Dell_pentium_7.jpg', 'Desktop', '2022-04-19'),
(162, 'Lenovo Pavilion Power 580-015na Gaming PC', 'FCFA', 120000, 'Lenovo introduces a new line of powerful laptop PC, the Studio XPS 9100 with 6-core Core i7 processor.Astuce : centrer une image Pour centrer une image, on la place dans un paragraphe (ou une div) dont le contenu est aligner au centre\r\np.align-center text-align: center.', 20, '1659044670.jpg', 'Laptop', '2022-07-28'),
(163, 'xiaomi-redmi-note-11-version-globale_1', 'FCFA', 76000, 'Infinix Hot11 est un telephone android de dernieres generations coutant pas tres chers et presentant des caracteristiques\r\nmeilleures.Infinix Hot11 est un telephone android de dernieres generations coutant pas tres chers et presentant des caracteristiques\r\nmeilleures...', 10, '1669670202.jpg', 'smartphone', '2022-11-28'),
(164, 'Laptop Dell pentium5', 'FCFA', 30000, 'Laptop Dell pentuim de bonnes qualites presentant 3 autres petits baffles et plusieurs sorties usbmarque iphone 11 est...', 28, '1669670120.png', 'Laptop', '2022-11-28'),
(165, 'samsung-Smartphone-android-model-galaxy-A21s-64-4Go-300x300', 'FCFA', 95000, 'Le telephone portable de marque iphone 11 est un mobile de dernieres generations doter des caracteristiques tres puissantes.Astuce : centrer une image\r\nPour centrer une image, on la place dans\r\nun paragraphe (ou une div) dont le\r\ncontenu est aligner au centre\r\np.align-center {\r\ntext-align: center.', -12, '1669670095.png', 'smartphone', '2022-11-28'),
(166, 'xiaomi-redmi-note-11-version-globale_1', 'FCFA', 76000, 'Infinix Hot11 est un telephone android de dernieres generations coutant pas tres chers et presentant des caracteristiques\r\nmeilleures.Infinix Hot11 est un telephone android de dernieres generations coutant pas tres chers et presentant des caracteristiques\r\nmeilleures...', 10, '1669670202.jpg', 'smartphone', '2022-11-28'),
(167, 'Laptop Dell pentium5', 'FCFA', 30000, 'Laptop Dell pentuim de bonnes qualites presentant 3 autres petits baffles et plusieurs sorties usbmarque iphone 11 est...', 28, '1669670120.png', 'Laptop', '2022-11-28'),
(168, 'samsung-Smartphone-android-model-galaxy-A21s-64-4Go-300x300', 'FCFA', 95000, 'Le telephone portable de marque iphone 11 est un mobile de dernieres generations doter des caracteristiques tres puissantes.Astuce : centrer une image\r\nPour centrer une image, on la place dans\r\nun paragraphe (ou une div) dont le\r\ncontenu est aligner au centre\r\np.align-center {\r\ntext-align: center.', -12, '1669670095.png', 'smartphone', '2022-11-28'),
(169, 'ACER Aspire GX-781 Gaming PC', 'FCFA', 765000, 'GTX 1050 graphics card lets you play huge games in great resolutions&nbsp;<br />\r\n<br />\r\n- Latest generation Core&trade; i5 processor can handle demanding media software&nbsp;\r\n- Superfast SSD storage lets you load programs in no time&nbsp;\r\nThe Acer&nbsp <strong>Aspire&nbsp;GX-781 Gaming PC&nbsp;</strong>is part of our Gaming range, which offers the most powerful PCs available today. It has outstanding graphics and processing performance to suit the most demanding gamer.\r\n', 4, '1659045281.jpg', 'Desktop', '2022-07-28'),
(170, 'large-amazon-fire-hd-8-tablet-alexa-2017-16-gb-black', 'FCFA', 765000, 'The next generation of our best-reviewed Fire tablet, with up to 12 hours of battery life, a vibrant 8\" HD display, a 1.3 GHz quad-core processor, 1.5 GB of RAM, and Dolby Audio. More durable than the latest iPad.16 or 32 GB of internal storage and a microSD slot for up to 256 GB of expandable storage.', -7, '1669669941.png', 'Smartphone', '2022-11-28'),
(171, 'xiaomi-redmi-note-11-version-globale_1', 'FCFA', 76000, 'Infinix Hot11 est un telephone android de dernieres generations coutant pas tres chers et presentant des caracteristiques\r\nmeilleures.Infinix Hot11 est un telephone android de dernieres generations coutant pas tres chers et presentant des caracteristiques\r\nmeilleures...', 10, '1669670202.jpg', 'smartphone', '2022-11-28'),
(172, 'Laptop Dell pentium5', 'FCFA', 30000, 'Laptop Dell pentuim de bonnes qualites presentant 3 autres petits baffles et plusieurs sorties usbmarque iphone 11 est...', 28, '1669670120.png', 'Laptop', '2022-11-28'),
(173, 'samsung-Smartphone-android-model-galaxy-A21s-64-4Go-300x300', 'FCFA', 95000, 'Le telephone portable de marque iphone 11 est un mobile de dernieres generations doter des caracteristiques tres puissantes.Astuce : centrer une image\r\nPour centrer une image, on la place dans\r\nun paragraphe (ou une div) dont le\r\ncontenu est aligner au centre\r\np.align-center {\r\ntext-align: center.', -12, '1669670095.png', 'smartphone', '2022-11-28'),
(174, 'Telephone Android Itel A56', 'FCFA', 40000, 'Itel A56 nouvelle sortie avec des caracteristiques suivantes: memoire interne 16Go; Ram 1Go; Camera 10Mpx; Batterie 3000MA.sorties usb.11 est un mobile de dernieres generations doter des caracteristiques portable de marque iphone 11 est un mobile de dernieres generations doter des caracteristiques tres puissantes', 20, 'itelA56.jpg', 'smartphone', '2022-04-19'),
(175, 'Laptop Toshiba Studio 4Point5', 'FCFA', 75000, 'Toshiba\nintroduces a new line of powerful desktop PC, the Studio XPS 9100 with 6-core Core i7 processor.ne image\nPour centrer une image, on la place dans\nun paragraphe ', 11, 'Toshiba_Corei3.jpg', 'Laptop', '2022-04-24'),
(176, 'Phone Android Tecno Camon 13', 'FCFA', 86500, 'Smarphone Tecno Camon 13 est un telephone android de dernieres generations coutant pas tres chers et presentant des caracteristiques\r\nmeilleures.Infinix Hot11 est un telephone android.', -5, '1669669990.png', 'smartphone', '2022-11-28'),
(177, 'Laptop Futsiti Dual core', 'FCFA', 95000, 'Laptop Futsiti Dual core est un mobile de dernieres generations doter des caracteristiques tres puissantes.Astuce : centrer une image\nPour centrer une image, on la place dans\nun paragraphe (ou une div) dont le\ncontenu est aligner au center.', 10, 'Laptop_Futsiti_Dual_core.jpg', 'Laptop', '2022-04-19'),
(178, 'ecran plat LG 32pouces', 'FCFA', 178000, 'Cet ecran plat est une television de taille 50 pouces ressortant une image de tres bonne qualite.\r\nAstuce:centrer une image\r\nPour centrer une image, on la place dans un paragraphe (ou une div) dont le contenu est aligner au centre\r\np.align-center text-align center.', 20, '1669669966.jpg', 'Televiseur', '2022-11-28'),
(179, 'Desktop Compac Quad core', 'FCFA', 100700, 'Desktop Compac Quad core introduces a new line of powerful desktop PC, the Studio XPS 9100 with 6-core Core i7 processor.Astuce : centrer une image\nPour centrer une image, on la place dans\nun paragraphe (ou une div) dont le\ncontenu est aligner au centre\np.align-center.', 11, 'Desktop_Compac_Quad_core.jpg', 'Desktop', '2022-04-19'),
(180, 'HP Pavilion Power 580-015na Gaming PC', 'EURO', 87500, 'Choose the performance and storage you need. Boot up in seconds with to 128 GB SSD.\r\nDitch the dull grey box, this desktop comes infused with style. A new angular bezel and bold green and black design give your workspace just the right amount of attitude.Up to 3 times faster performance - GeForce GTX 10-series graphics cards are powered by Pascal to deliver twice the performance of previous-generation graphics cards.', 23, '1658949556.jpg', 'Desktop', '2022-07-28'),
(181, 'CamÃ©ra Dom MotorisÃ©e 24px', 'FCFA', 67000, 'Camera Dom motorisÃ© tres puissant.', 5, '1659056619.jpg', 'Camera', '2022-07-29'),
(182, 'Lenovo Pavilion Power 580-015na Gaming PC', 'FCFA', 120000, 'Lenovo introduces a new line of powerful laptop PC, the Studio XPS 9100 with 6-core Core i7 processor.Astuce : centrer une image Pour centrer une image, on la place dans un paragraphe (ou une div) dont le contenu est aligner au centre\r\np.align-center text-align: center.', 20, '1659044670.jpg', 'Laptop', '2022-07-28'),
(183, 'ACER Aspire GX-781 Gaming PC', 'FCFA', 765000, 'GTX 1050 graphics card lets you play huge games in great resolutions&nbsp;<br />\r\n<br />\r\n- Latest generation Core&trade; i5 processor can handle demanding media software&nbsp;\r\n- Superfast SSD storage lets you load programs in no time&nbsp;\r\nThe Acer&nbsp <strong>Aspire&nbsp;GX-781 Gaming PC&nbsp;</strong>is part of our Gaming range, which offers the most powerful PCs available today. It has outstanding graphics and processing performance to suit the most demanding gamer.\r\n', 4, '1659045281.jpg', 'Desktop', '2022-07-28'),
(184, 'large-amazon-fire-hd-8-tablet-alexa-2017-16-gb-black', 'FCFA', 765000, 'The next generation of our best-reviewed Fire tablet, with up to 12 hours of battery life, a vibrant 8\" HD display, a 1.3 GHz quad-core processor, 1.5 GB of RAM, and Dolby Audio. More durable than the latest iPad.16 or 32 GB of internal storage and a microSD slot for up to 256 GB of expandable storage.', -7, '1669669941.png', 'Smartphone', '2022-11-28'),
(185, 'Imprimante Lazer 3H-354DSE4', 'FCFA', 765000, '- Multi-task with ease thanks to IntelÂ® i5 processor \r\n\r\n- Prepare for battle with NVIDIA GeForce GTX graphics card \r\n\r\n- VR ready for the next-generation of immersive gaming and entertainment\r\n\r\n- Tool-less upgrade helps you personalise your system to your own demands Part of our Gaming range, which features the most powerful PCs available today, the Lenovo Legion Y520 Gaming PC has superior graphics and processing performance to suit the most demanding gamer.\r\n\r\n', 9, '1669670470.png', 'Imprimante', '2022-11-28'),
(186, 'Lenovo Pavilion Power 580-015na Gaming PC', 'FCFA', 120000, 'Lenovo introduces a new line of powerful laptop PC, the Studio XPS 9100 with 6-core Core i7 processor.Astuce : centrer une image Pour centrer une image, on la place dans un paragraphe (ou une div) dont le contenu est aligner au centre\r\np.align-center text-align: center.', 20, '1659044670.jpg', 'Laptop', '2022-07-28'),
(187, 'ACER Aspire GX-781 Gaming PC', 'FCFA', 765000, 'GTX 1050 graphics card lets you play huge games in great resolutions&nbsp;<br />\r\n<br />\r\n- Latest generation Core&trade; i5 processor can handle demanding media software&nbsp;\r\n- Superfast SSD storage lets you load programs in no time&nbsp;\r\nThe Acer&nbsp <strong>Aspire&nbsp;GX-781 Gaming PC&nbsp;</strong>is part of our Gaming range, which offers the most powerful PCs available today. It has outstanding graphics and processing performance to suit the most demanding gamer.\r\n', 4, '1659045281.jpg', 'Desktop', '2022-07-28'),
(188, 'large-amazon-fire-hd-8-tablet-alexa-2017-16-gb-black', 'FCFA', 765000, 'The next generation of our best-reviewed Fire tablet, with up to 12 hours of battery life, a vibrant 8\" HD display, a 1.3 GHz quad-core processor, 1.5 GB of RAM, and Dolby Audio. More durable than the latest iPad.16 or 32 GB of internal storage and a microSD slot for up to 256 GB of expandable storage.', -7, '1669669941.png', 'Smartphone', '2022-11-28'),
(189, 'smartwatch_oraimo_watch_2_pro-', 'FCFA', 30000, 'smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-vvvvvvvvsmartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-', 19, '1669670376.jpg', 'Montre', '2022-11-28'),
(190, 'Lenovo Pavilion Power 580-015na Gaming PC', 'FCFA', 120000, 'Lenovo introduces a new line of powerful laptop PC, the Studio XPS 9100 with 6-core Core i7 processor.Astuce : centrer une image Pour centrer une image, on la place dans un paragraphe (ou une div) dont le contenu est aligner au centre\r\np.align-center text-align: center.', 20, '1659044670.jpg', 'Laptop', '2022-07-28'),
(191, 'ACER Aspire GX-781 Gaming PC', 'FCFA', 765000, 'GTX 1050 graphics card lets you play huge games in great resolutions&nbsp;<br />\r\n<br />\r\n- Latest generation Core&trade; i5 processor can handle demanding media software&nbsp;\r\n- Superfast SSD storage lets you load programs in no time&nbsp;\r\nThe Acer&nbsp <strong>Aspire&nbsp;GX-781 Gaming PC&nbsp;</strong>is part of our Gaming range, which offers the most powerful PCs available today. It has outstanding graphics and processing performance to suit the most demanding gamer.\r\n', 4, '1659045281.jpg', 'Desktop', '2022-07-28'),
(192, 'large-amazon-fire-hd-8-tablet-alexa-2017-16-gb-black', 'FCFA', 765000, 'The next generation of our best-reviewed Fire tablet, with up to 12 hours of battery life, a vibrant 8\" HD display, a 1.3 GHz quad-core processor, 1.5 GB of RAM, and Dolby Audio. More durable than the latest iPad.16 or 32 GB of internal storage and a microSD slot for up to 256 GB of expandable storage.', -7, '1669669941.png', 'Smartphone', '2022-11-28'),
(193, 'Imprimante Lazer Noir sur blanc impression recto 3H-354DSE4', 'FCFA', 76000, 'Imprimante Lazer Noir sur blanc impression recto 3H-354DSE4Imprimante Lazer Noir sur blanc impression recto 3H-354DSE4Imprimante Lazer Noir sur blanc impression recto 3H-354DSE4Imprimante Lazer Noir sur blanc impression recto 3H-354DSE4Imprimante Lazer Noir sur blanc impression recto 3H-354DSE4Imprimante Lazer Noir sur blanc impression recto 3H-354DSE4Imprimante Lazer Noir sur blanc impression recto 3H-354DSE4Imprimante Lazer Noir sur blanc impression recto 3H-354DSE4Imprimante Lazer Noir sur blanc impression recto 3H-354DSE4', 1, '1669670688.png', 'Imprimante', '2022-11-28'),
(194, 'smart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_edition', 'La monnaie', 8650, 'smart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_edition', 17, '1669670821.jpg', 'Montre', '2022-11-28'),
(195, 'Laptop Dell 126G0 - 2G0 Ram - ', 'FCFA', 120000, 'Laptop Dell 126G0 - 2G0 Ram - vvvvvLaptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - ', 23, '1669709716.png', 'Laptop', '2022-11-29'),
(196, 'camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004', 'FCFA', 65000, 'camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004 camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004', 19, '1669741634.png', 'Camera', '2022-11-29'),
(197, 'CamÃ©ra Dom MotorisÃ©e 24px', 'FCFA', 67000, 'Camera Dom motorisÃ© tres puissant.', 5, '1659056619.jpg', 'Camera', '2022-07-29'),
(198, 'camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004', 'FCFA', 65000, 'camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004 camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004', 19, '1669741634.png', 'Camera', '2022-11-29'),
(199, 'CamÃ©ra -Numerique-Smart-INNOVA-60-pouces-model-60A127_004', 'FCFA', 67000, 'Camera Dom motorisÃ© tres puissant.', 5, '1659056619.jpg', 'Camera', '2022-07-29'),
(200, 'camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004', 'FCFA', 65000, 'camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004 camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004', 19, '1669741634.png', 'Camera', '2022-11-29'),
(201, 'CamÃ©ra Dom MotorisÃ©e 24px', 'FCFA', 67000, 'Camera Dom motorisÃ© tres puissant.', 5, '1659056619.jpg', 'Camera', '2022-07-29'),
(202, 'camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004', 'FCFA', 65000, 'camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004 camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_004', 19, '1669741634.png', 'Camera', '2022-11-29'),
(203, 'CamÃ©ra Dom MotorisÃ©e 24px', 'FCFA', 67000, 'Camera Dom motorisÃ© tres puissant.', 5, '1659056619.jpg', 'Camera', '2022-07-29'),
(204, 'camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_002', 'FCFA', 67000, 'Camera Dom motorisÃ© tres puissant.', 5, 'camera-et-dvr-de-marque-multistar-avec-8-port-se-capacit_002.png', 'Camera', '2022-07-29'),
(205, 'CamÃ©ra -Numerique-Smart-INNOVA-60-pouces-model-60A127_004', 'FCFA', 67000, 'Camera Dom motorisÃ© tres puissant.', 2, '1671557014.png', 'Camera', '2022-12-20'),
(206, 'CamÃ©ra Dom MotorisÃ©e 24px', 'FCFA', 67000, 'Camera Dom motorisÃ© tres puissant.', 5, '1659056619.jpg', 'Camera', '2022-07-29'),
(207, 'Television-numerique-smart-STAR-SAT-50-Noir-Full-HD-AC-D_002', 'FCFA', 178000, 'Cet ecran plat est une television de taille 50 pouces ressortant une image de tres bonne qualite.\r\nAstuce:centrer une image\r\nPour centrer une image, on la place dans un paragraphe (ou une div) dont le contenu est aligner au centre\r\np.align-center {\r\ntext-align: center.', 16, 'Television-numerique-smart-STAR-SAT-50-Noir-Full-HD-AC-D_002.png', 'Televiseur', '2022-11-28'),
(208, 'Television-Numerique-Smart-INNOVA-60-pouces-model-60A127_004', 'FCFA', 178000, 'Cet ecran plat est une television de taille 50 pouces ressortant une image de tres bonne qualite.\r\nAstuce:centrer une image\r\nPour centrer une image, on la place dans un paragraphe (ou une div) dont le contenu est aligner au centre\r\np.align-center {\r\ntext-align: center.', 16, '1671556993.jpg', 'Televiseur', '2022-12-20'),
(209, 'Imprimante Lazer 3H-354DSE4', 'FCFA', 765000, '- Multi-task with ease thanks to IntelÂ® i5 processor \r\n\r\n- Prepare for battle with NVIDIA GeForce GTX graphics card \r\n\r\n- VR ready for the next-generation of immersive gaming and entertainment\r\n\r\n- Tool-less upgrade helps you personalise your system to your own demands Part of our Gaming range, which features the most powerful PCs available today, the Lenovo Legion Y520 Gaming PC has superior graphics and processing performance to suit the most demanding gamer.\r\n\r\n', 9, '1671557236.png', 'Imprimante', '2022-12-20'),
(210, 'Imprimante Lazer 3H-354DSE4', 'FCFA', 765000, '- Multi-task with ease thanks to IntelÂ® i5 processor \r\n\r\n- Prepare for battle with NVIDIA GeForce GTX graphics card \r\n\r\n- VR ready for the next-generation of immersive gaming and entertainment\r\n\r\n- Tool-less upgrade helps you personalise your system to your own demands Part of our Gaming range, which features the most powerful PCs available today, the Lenovo Legion Y520 Gaming PC has superior graphics and processing performance to suit the most demanding gamer.\r\n\r\n', 9, '1671557236.png', 'Imprimante', '2022-12-20'),
(211, 'Imprimante Lazer 3H-354DSE4', 'FCFA', 765000, '- Multi-task with ease thanks to IntelÂ® i5 processor \r\n\r\n- Prepare for battle with NVIDIA GeForce GTX graphics card \r\n\r\n- VR ready for the next-generation of immersive gaming and entertainment\r\n\r\n- Tool-less upgrade helps you personalise your system to your own demands Part of our Gaming range, which features the most powerful PCs available today, the Lenovo Legion Y520 Gaming PC has superior graphics and processing performance to suit the most demanding gamer.\r\n\r\n', 9, '1671557236.png', 'Imprimante', '2022-12-20'),
(212, 'Telesision tv-led-innova-32s2-an-Smart-INNOVA-60-pouces-model-60A127_005', 'FCFA', 178000, 'Cet ecran plat est une television de taille 50 pouces ressortant une image de tres bonne qualite.\r\nAstuce:centrer une image\r\nPour centrer une image, on la place dans un paragraphe (ou une div) dont le contenu est aligner au centre\r\np.align-center {\r\ntext-align: center.', 16, '1671556973.jpg', 'Televiseur', '2022-12-20'),
(213, 'Television-numerique-smart-STAR-SAT-50-Noir-Full-HD-AC-D_002', 'FCFA', 178000, 'Cet ecran plat est une television de taille 50 pouces ressortant une image de tres bonne qualite.\r\nAstuce:centrer une image\r\nPour centrer une image, on la place dans un paragraphe (ou une div) dont le contenu est aligner au centre\r\np.align-center {\r\ntext-align: center.', 16, 'Television-numerique-smart-STAR-SAT-50-Noir-Full-HD-AC-D_002.png', 'Televiseur', '2022-11-28'),
(214, 'Television-Numerique-Smart-INNOVA-60-pouces-model-60A127_004', 'FCFA', 178000, 'Cet ecran plat est une television de taille 50 pouces ressortant une image de tres bonne qualite.\r\nAstuce:centrer une image\r\nPour centrer une image, on la place dans un paragraphe (ou une div) dont le contenu est aligner au centre\r\np.align-center {\r\ntext-align: center.', 16, '1671556944.jpg', 'Televiseur', '2022-12-20'),
(215, 'Telesision tv-led-innova-32s2-an-Smart-INNOVA-60-pouces-model-60A127_005', 'FCFA', 178000, 'Cet ecran plat est une television de taille 50 pouces ressortant une image de tres bonne qualite.\r\nAstuce:centrer une image\r\nPour centrer une image, on la place dans un paragraphe (ou une div) dont le contenu est aligner au centre\r\np.align-center {\r\ntext-align: center.', 16, '1671556916.jpg', 'Televiseur', '2022-12-20'),
(216, 'Imprimante Lazer 3H-354DSE4', 'FCFA', 765000, '- Multi-task with ease thanks to IntelÂ® i5 processor \r\n\r\n- Prepare for battle with NVIDIA GeForce GTX graphics card \r\n\r\n- VR ready for the next-generation of immersive gaming and entertainment\r\n\r\n- Tool-less upgrade helps you personalise your system to your own demands Part of our Gaming range, which features the most powerful PCs available today, the Lenovo Legion Y520 Gaming PC has superior graphics and processing performance to suit the most demanding gamer.\r\n\r\n', 9, '1671557281.png', 'Imprimante', '2022-12-20'),
(217, 'Imprimante Lazer 3H-354DSE4', 'FCFA', 765000, '- Multi-task with ease thanks to IntelÂ® i5 processor \r\n\r\n- Prepare for battle with NVIDIA GeForce GTX graphics card \r\n\r\n- VR ready for the next-generation of immersive gaming and entertainment\r\n\r\n- Tool-less upgrade helps you personalise your system to your own demands Part of our Gaming range, which features the most powerful PCs available today, the Lenovo Legion Y520 Gaming PC has superior graphics and processing performance to suit the most demanding gamer.\r\n\r\n', 9, '1671557253.png', 'Imprimante', '2022-12-20'),
(218, 'Imprimante Lazer 3H-354DSE4', 'FCFA', 765000, '- Multi-task with ease thanks to IntelÂ® i5 processor \r\n\r\n- Prepare for battle with NVIDIA GeForce GTX graphics card \r\n\r\n- VR ready for the next-generation of immersive gaming and entertainment\r\n\r\n- Tool-less upgrade helps you personalise your system to your own demands Part of our Gaming range, which features the most powerful PCs available today, the Lenovo Legion Y520 Gaming PC has superior graphics and processing performance to suit the most demanding gamer.\r\n\r\n', 9, '1671557236.png', 'Imprimante', '2022-12-20'),
(219, 'Imprimante Lazer 3H-354DSE4', 'FCFA', 765000, '- Multi-task with ease thanks to IntelÂ® i5 processor \r\n\r\n- Prepare for battle with NVIDIA GeForce GTX graphics card \r\n\r\n- VR ready for the next-generation of immersive gaming and entertainment\r\n\r\n- Tool-less upgrade helps you personalise your system to your own demands Part of our Gaming range, which features the most powerful PCs available today, the Lenovo Legion Y520 Gaming PC has superior graphics and processing performance to suit the most demanding gamer.\r\n\r\n', 9, '1671557236.png', 'Imprimante', '2022-12-20'),
(220, 'Imprimante Lazer 3H-354DSE4', 'FCFA', 765000, '- Multi-task with ease thanks to IntelÂ® i5 processor \r\n\r\n- Prepare for battle with NVIDIA GeForce GTX graphics card \r\n\r\n- VR ready for the next-generation of immersive gaming and entertainment\r\n\r\n- Tool-less upgrade helps you personalise your system to your own demands Part of our Gaming range, which features the most powerful PCs available today, the Lenovo Legion Y520 Gaming PC has superior graphics and processing performance to suit the most demanding gamer.\r\n\r\n', 9, '1671557281.png', 'Imprimante', '2022-12-20'),
(221, 'Imprimante Lazer 3H-354DSE4', 'FCFA', 765000, '- Multi-task with ease thanks to IntelÂ® i5 processor \r\n\r\n- Prepare for battle with NVIDIA GeForce GTX graphics card \r\n\r\n- VR ready for the next-generation of immersive gaming and entertainment\r\n\r\n- Tool-less upgrade helps you personalise your system to your own demands Part of our Gaming range, which features the most powerful PCs available today, the Lenovo Legion Y520 Gaming PC has superior graphics and processing performance to suit the most demanding gamer.\r\n\r\n', 9, '1671557253.png', 'Imprimante', '2022-12-20'),
(222, 'Imprimante Lazer 3H-354DSE4', 'FCFA', 765000, '- Multi-task with ease thanks to IntelÂ® i5 processor \r\n\r\n- Prepare for battle with NVIDIA GeForce GTX graphics card \r\n\r\n- VR ready for the next-generation of immersive gaming and entertainment\r\n\r\n- Tool-less upgrade helps you personalise your system to your own demands Part of our Gaming range, which features the most powerful PCs available today, the Lenovo Legion Y520 Gaming PC has superior graphics and processing performance to suit the most demanding gamer.\r\n\r\n', 9, '1671557236.png', 'Imprimante', '2022-12-20'),
(223, 'smartwatch_oraimo_watch_2_pro-', 'FCFA', 30000, 'smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-vvvvvvvvsmartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-', 19, '1669670376.jpg', 'Montre', '2022-11-28'),
(224, 'smart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_edition', 'La monnaie', 8650, 'smart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_edition', 18, '1669670821.jpg', 'Montre', '2022-11-28'),
(225, 'smartwatch_oraimo_watch_2_pro-', 'FCFA', 30000, 'smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-vvvvvvvvsmartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-', 19, '1669670376.jpg', 'Montre', '2022-11-28'),
(226, 'smart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_edition', 'La monnaie', 8650, 'smart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_edition', 18, '1669670821.jpg', 'Montre', '2022-11-28'),
(227, 'Imprimante Lazer 3H-354DSE4', 'FCFA', 765000, '- Multi-task with ease thanks to IntelÂ® i5 processor \r\n\r\n- Prepare for battle with NVIDIA GeForce GTX graphics card \r\n\r\n- VR ready for the next-generation of immersive gaming and entertainment\r\n\r\n- Tool-less upgrade helps you personalise your system to your own demands Part of our Gaming range, which features the most powerful PCs available today, the Lenovo Legion Y520 Gaming PC has superior graphics and processing performance to suit the most demanding gamer.\r\n\r\n', 9, '1669670470.png', 'Imprimante', '2022-11-28'),
(228, 'Imprimante Lazer 3H-354DSE4', 'FCFA', 765000, '- Multi-task with ease thanks to IntelÂ® i5 processor \r\n\r\n- Prepare for battle with NVIDIA GeForce GTX graphics card \r\n\r\n- VR ready for the next-generation of immersive gaming and entertainment\r\n\r\n- Tool-less upgrade helps you personalise your system to your own demands Part of our Gaming range, which features the most powerful PCs available today, the Lenovo Legion Y520 Gaming PC has superior graphics and processing performance to suit the most demanding gamer.\r\n\r\n', 9, '1671557236.png', 'Imprimante', '2022-12-20'),
(229, 'smartwatch_oraimo_watch_2_pro-', 'FCFA', 30000, 'smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-vvvvvvvvsmartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-', 16, '1669670376.jpg', 'Montre', '2022-11-28'),
(230, 'smart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_edition', 'La monnaie', 8650, 'smart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_edition', 18, '1671557603.jpg', 'Montre', '2022-12-20'),
(231, 'smartwatch_oraimo_watch_2_pro-', 'FCFA', 30000, 'smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-vvvvvvvvsmartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-', 19, '1669670376.jpg', 'Montre', '2022-11-28'),
(232, 'Ordinateur-portable-PC-laptop-HP-15.6-pouces-300x300', 'FCFA', 120000, 'Laptop Dell 126G0 - 2G0 Ram - vvvvvLaptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - ', 22, '1671557999.jpg', 'Laptop', '2022-12-20'),
(233, 'Ordinateur-portable-PC-laptop-HP-15.6-pouces-300x300', 'FCFA', 120000, 'Laptop Dell 126G0 - 2G0 Ram - vvvvvLaptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - ', 22, '1671558082.jpg', 'Laptop', '2022-12-20'),
(234, 'Ordinateur-portable-PC-laptop-HP-15.6-pouces-300x300', 'FCFA', 120000, 'Laptop Dell 126G0 - 2G0 Ram - vvvvvLaptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - ', 22, '1671557999.jpg', 'Laptop', '2022-12-20'),
(235, 'Ordinateur-portable-PC-laptop-HP-15.6-pouces-300x300', 'FCFA', 120000, 'Laptop Dell 126G0 - 2G0 Ram - vvvvvLaptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - ', 22, '1671558082.jpg', 'Laptop', '2022-12-20'),
(236, 'smart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_edition', 'La monnaie', 8650, 'smart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_edition', 18, '1669670821.jpg', 'Montre', '2022-11-28'),
(237, 'Ordinateur-portable-PC-laptop-HP-15.6-pouces-300x300', 'FCFA', 120000, 'Laptop Dell 126G0 - 2G0 Ram - vvvvvLaptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - ', 23, '1671558054.jpg', 'Laptop', '2022-12-20'),
(238, 'Ordinateur-portable-PC-laptop-HP-15.6-pouces-300x300', 'FCFA', 120000, 'Laptop Dell 126G0 - 2G0 Ram - vvvvvLaptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - ', 14, 'Ordinateur-portable-PC-laptop-HP-15.6-pouces-300x300.png', 'Laptop', '2022-11-29'),
(239, 'smartwatch_oraimo_watch_2_pro-', 'FCFA', 30000, 'smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-vvvvvvvvsmartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-smartwatch_oraimo_watch_2_pro-', 19, '1669670376.jpg', 'Montre', '2022-11-28'),
(240, 'smart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_edition', 'La monnaie', 8650, 'smart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_editionsmart_watch_huawei_watch_gt_3_-_prix_en_fcfa_-_elite_edition', 18, '1669670821.jpg', 'Montre', '2022-11-28'),
(241, 'Ordinateur-portable-PC-laptop-HP-15.6-pouces-300x300', 'FCFA', 120000, 'Laptop Dell 126G0 - 2G0 Ram - vvvvvLaptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - ', 22, '1671558022.jpg', 'Laptop', '2022-12-20'),
(242, 'Ordinateur-portable-PC-laptop-HP-15.6-pouces-300x300', 'FCFA', 120000, 'Laptop Dell 126G0 - 2G0 Ram - vvvvvLaptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - ', 22, '1671557999.jpg', 'Laptop', '2022-12-20'),
(243, 'Ordinateur-portable-PC-laptop-HP-15.6-pouces-300x300', 'FCFA', 120000, 'Laptop Dell 126G0 - 2G0 Ram - vvvvvLaptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - Laptop Dell 126G0 - 2G0 Ram - ', 22, '1671558082.jpg', 'Laptop', '2022-12-20');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_commande`);

--
-- Index pour la table `pannier`
--
ALTER TABLE `pannier`
  ADD PRIMARY KEY (`id_commande`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id_produit`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categorie` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_commande` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT pour la table `pannier`
--
ALTER TABLE `pannier`
  MODIFY `id_commande` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id_produit` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=244;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
