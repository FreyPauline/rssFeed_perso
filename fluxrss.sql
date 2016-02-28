-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 20 Février 2015 à 16:05
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `fluxrss`
--
CREATE DATABASE IF NOT EXISTS `fluxrss` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `fluxrss`;

-- --------------------------------------------------------

--
-- Structure de la table `flux`
--

DROP TABLE IF EXISTS `flux`;
CREATE TABLE IF NOT EXISTS `flux` (
  `id_flux` int(255) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id_flux`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Contenu de la table `flux`
--

INSERT INTO `flux` (`id_flux`, `id_utilisateur`, `nom`, `url`) VALUES
(15, 2, 'Journal du geek', 'http://feeds2.feedburner.com/LeJournalduGeek'),
(16, 2, 'Le monde', 'http://rss.lemonde.fr/c/205/f/3050/index.rss'),
(18, 2, 'Le journal du net', 'http://www.journaldunet.com/rss/'),
(19, 5, 'Le point', 'http://www.lepoint.fr/rss.xml'),
(20, 5, 'Le gorafi', 'http://www.legorafi.fr/feed/'),
(24, 2, 'Le gorafi', 'http://www.legorafi.fr/feed/');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `actif` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `email`, `pseudo`, `nom`, `prenom`, `mdp`, `actif`) VALUES
(2, 'frey_b@epitech.eu', 'frey_b', 'Frey', 'Pauline', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1),
(5, 'lyer_k@epitech.eu', 'loyer_k', 'Loyer', 'Kevin', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1),
(6, 'piquio_a@epitech.eu', 'audrey', 'Piquio', 'Audrey', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
