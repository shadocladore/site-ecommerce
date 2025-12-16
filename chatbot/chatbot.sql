-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 26 déc. 2022 à 02:14
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
-- Base de données : `chatbot`
--

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

CREATE TABLE `questions` (
  `id` int(30) NOT NULL,
  `question` text DEFAULT NULL,
  `reponse_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `questions`
--

INSERT INTO `questions` (`id`, `question`, `reponse_id`) VALUES
(1, 'salut', 1),
(2, 'Bien et vous', 2),
(3, 'comment acheter un produit ?', 3),
(4, 'merci', 4);

-- --------------------------------------------------------

--
-- Structure de la table `reponses`
--

CREATE TABLE `reponses` (
  `id` int(30) NOT NULL,
  `reponse_message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reponses`
--

INSERT INTO `reponses` (`id`, `reponse_message`) VALUES
(1, 'Comment allez-vous ?'),
(2, 'Bien.Quel aide pourrais-je vous apportez concernant notre site ?'),
(3, 'Et bien c\'est simple:<br/>1-Sélectionnez l\'article qui vous interresse.<br/>2- vous serez vers une page qui vous demandera\r\nd\'entrer le nombre d\'articles souhaités, faites-le et taper sur ajouter au pannier.<br/>3-Puis taper sur le bouton vert commander.<br/>\r\n4-Vous patienter le traitement de votre commande et en enfin vous taper sur le bouton orange Valider.'),
(4, 'De rien je vous en prie.');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
