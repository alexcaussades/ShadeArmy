-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  mar. 27 août 2019 à 23:52
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
-- Structure de la table `amende_players`
--

CREATE TABLE `amende_players` (
  `id` int(11) NOT NULL,
  `pid` varchar(255) NOT NULL,
  `somme` varchar(255) NOT NULL,
  `paid` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `amende_vhl`
--

CREATE TABLE `amende_vhl` (
  `id` int(11) NOT NULL,
  `id_vhl` varchar(255) NOT NULL,
  `somme` varchar(255) NOT NULL,
  `pid` varchar(255) NOT NULL,
  `immat` varchar(255) NOT NULL,
  `paid` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `auth`
--

CREATE TABLE `auth` (
  `id` int(11) NOT NULL,
  `login` text CHARACTER SET utf8 NOT NULL,
  `mdp` text CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `pid` varchar(255) CHARACTER SET utf8 NOT NULL,
  `creattime` datetime NOT NULL,
  `lastseen` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Structure de la table `casier_jud`
--

CREATE TABLE `casier_jud` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `txt` text NOT NULL,
  `pid` varchar(25) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `info_houses_players`
--

CREATE TABLE `info_houses_players` (
  `id` int(11) NOT NULL,
  `id_houses` varchar(255) NOT NULL,
  `pid` varchar(255) NOT NULL,
  `pseudo_houses` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `info_vehicules_players`
--

CREATE TABLE `info_vehicules_players` (
  `id` int(11) NOT NULL,
  `pid` varchar(2555) NOT NULL,
  `id_vhl` varchar(255) NOT NULL,
  `side_vhl` varchar(255) NOT NULL,
  `classname_vhl` varchar(255) NOT NULL,
  `type_vhl` varchar(255) NOT NULL,
  `immatriculation_vhl` varchar(255) NOT NULL,
  `achat_date_vhl` varchar(255) NOT NULL,
  `recherche_vhl` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `motif_users`
--

CREATE TABLE `motif_users` (
  `id` int(11) NOT NULL,
  `id_auth` varchar(15) CHARACTER SET utf8 NOT NULL,
  `motif` text CHARACTER SET utf8 NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Structure de la table `rapport_int_fav`
--

CREATE TABLE `rapport_int_fav` (
  `id` int(11) NOT NULL,
  `id_rapport` varchar(10) NOT NULL,
  `pid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `rapport_int_lue`
--

CREATE TABLE `rapport_int_lue` (
  `id` int(11) NOT NULL,
  `rapport_id` varchar(255) NOT NULL,
  `pid` varchar(255) NOT NULL,
  `active` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `rapport_int_suite`
--

CREATE TABLE `rapport_int_suite` (
  `id` int(11) NOT NULL,
  `id_rapport` varchar(255) NOT NULL,
  `pid` varchar(255) NOT NULL,
  `text_suite` text CHARACTER SET utf8 NOT NULL,
  `classer` varchar(10) DEFAULT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `wantedP`
--

CREATE TABLE `wantedP` (
  `id` int(11) NOT NULL,
  `pid` varchar(255) CHARACTER SET utf8 NOT NULL,
  `demande` varchar(255) CHARACTER SET utf8 NOT NULL,
  `raison` text CHARACTER SET utf8 NOT NULL,
  `active` varchar(255) CHARACTER SET utf8 NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `amende_players`
--
ALTER TABLE `amende_players`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `amende_vhl`
--
ALTER TABLE `amende_vhl`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `casier_jud`
--
ALTER TABLE `casier_jud`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `info_houses_players`
--
ALTER TABLE `info_houses_players`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `info_vehicules_players`
--
ALTER TABLE `info_vehicules_players`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `motif_users`
--
ALTER TABLE `motif_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_auth` (`id_auth`);

--
-- Index pour la table `rapport_int`
--
ALTER TABLE `rapport_int`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `rapport_int_fav`
--
ALTER TABLE `rapport_int_fav`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `rapport_int_lue`
--
ALTER TABLE `rapport_int_lue`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `rapport_int_suite`
--
ALTER TABLE `rapport_int_suite`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `wantedP`
--
ALTER TABLE `wantedP`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `amende_players`
--
ALTER TABLE `amende_players`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `amende_vhl`
--
ALTER TABLE `amende_vhl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `auth`
--
ALTER TABLE `auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `casier_jud`
--
ALTER TABLE `casier_jud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `info_houses_players`
--
ALTER TABLE `info_houses_players`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `info_vehicules_players`
--
ALTER TABLE `info_vehicules_players`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `motif_users`
--
ALTER TABLE `motif_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `rapport_int`
--
ALTER TABLE `rapport_int`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `rapport_int_fav`
--
ALTER TABLE `rapport_int_fav`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `rapport_int_lue`
--
ALTER TABLE `rapport_int_lue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `rapport_int_suite`
--
ALTER TABLE `rapport_int_suite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `wantedP`
--
ALTER TABLE `wantedP`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
