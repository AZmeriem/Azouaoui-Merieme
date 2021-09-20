-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : Dim 27 juin 2021 à 09:04
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
-- Base de données : `dev3`
--

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `telephone1` varchar(255) NOT NULL,
  `telephone2` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `emailPersonnel` varchar(255) NOT NULL,
  `emailProfessionnel` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `nom`, `prenom`, `photo`, `telephone1`, `telephone2`, `adresse`, `emailPersonnel`, `emailProfessionnel`, `genre`) VALUES
(93, 'Zarhali', 'zahra', 'IMG.CV.jpg', '0626172829', '06787655677', 'Oued eddahab errachidia', 'merieme-az@hotmail.com', 'merieme-az@hotmail.com', 'female'),
(95, 'Azouaoui', 'Merieme', 'IMG.CV.jpg', '0636282987', '0636282987', 'TAZA', 'merieme-az@hotmail.com', 'merieme-az@uae.etu.com', 'female'),
(97, 'Amini', 'Amine', 'Homme.jpg', '0611111111', '0622222222', 'TAZA', 'Amini@gmail.com', 'Amine-Amini@outlook.com', 'male'),
(98, 'Ahmedi', 'Anas', 'Homme.jpg', '0612121212', '066666666', 'ERRACHIDIA', 'Ahmedi@gmail.com', 'Anas-ahmedi@outlook.com', 'male');

-- --------------------------------------------------------

--
-- Structure de la table `contactgroup`
--

CREATE TABLE `contactgroup` (
  `id` int(11) NOT NULL,
  `idGroup` int(11) NOT NULL,
  `idContact` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contactgroup`
--

INSERT INTO `contactgroup` (`id`, `idGroup`, `idContact`) VALUES
(15, 30, 93),
(16, 30, 95),
(17, 31, 93),
(18, 31, 95),
(19, 31, 97);

-- --------------------------------------------------------

--
-- Structure de la table `groups`
--

CREATE TABLE `groups` (
  `idg` int(6) NOT NULL,
  `nomg` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `groups`
--

INSERT INTO `groups` (`idg`, `nomg`, `icon`) VALUES
(30, 'famille', 'group.jpg'),
(31, 'ecole', 'group1.png');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contactgroup`
--
ALTER TABLE `contactgroup`
  ADD PRIMARY KEY (`id`),
  ADD KEY `c1` (`idContact`),
  ADD KEY `c2` (`idGroup`);

--
-- Index pour la table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`idg`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT pour la table `contactgroup`
--
ALTER TABLE `contactgroup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `groups`
--
ALTER TABLE `groups`
  MODIFY `idg` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `contactgroup`
--
ALTER TABLE `contactgroup`
  ADD CONSTRAINT `c1` FOREIGN KEY (`idContact`) REFERENCES `contact` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `c2` FOREIGN KEY (`idGroup`) REFERENCES `groups` (`idg`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
