-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  mer. 21 août 2019 à 19:08
-- Version du serveur :  10.3.17-MariaDB
-- Version de PHP :  7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `alexcaus_shade`
--

-- --------------------------------------------------------

--
-- Structure de la table `rapport_int`
--

CREATE TABLE `rapport_int` (
  `id` int(11) NOT NULL,
  `typerap` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `gps` varchar(255) NOT NULL,
  `txt` text NOT NULL,
  `officier` varchar(255) NOT NULL,
  `pid` varchar(255) NOT NULL,
  `playerpid` varchar(255) NOT NULL,
  `plaintenum` varchar(255) NOT NULL,
  `dateinter` varchar(255) NOT NULL,
  `nonlu` varchar(1) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `rapport_int`
--
ALTER TABLE `rapport_int`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `rapport_int`
--
ALTER TABLE `rapport_int`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
