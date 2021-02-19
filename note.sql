-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Ven 19 Février 2021 à 13:12
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `note`
--

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

CREATE TABLE `classe` (
  `idClasse` int(11) NOT NULL,
  `classe` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `classe`
--

INSERT INTO `classe` (`idClasse`, `classe`) VALUES
(1, 'Seconde'),
(2, 'Premiere'),
(3, 'Terminale'),
(4, 'Seconde 1');

-- --------------------------------------------------------

--
-- Structure de la table `eleve`
--

CREATE TABLE `eleve` (
  `idEleve` int(11) NOT NULL,
  `numMatricule` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `idClasse` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `eleve`
--

INSERT INTO `eleve` (`idEleve`, `numMatricule`, `nom`, `adresse`, `idClasse`) VALUES
(3, 1, 'Ben', 'Paris 93', 1),
(4, 3, 'Kara Denvers', 'los santos', 2),
(9, 4, 'Clarc kent', 'smallville', 3),
(10, 5, 'Oliver', 'starling city', 1),
(11, 6, 'Barry Allen', 'centrale city', 3),
(12, 7, 'jamse bond', 'washintong', 2),
(13, 8, 'Kate', 'Gotham', 1),
(14, 2, 'Josephine Arc', 'France', 2),
(15, 9, 'Diana', 'Amazonia', 3);

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

CREATE TABLE `matiere` (
  `idMatiere` int(11) NOT NULL,
  `nomMat` varchar(20) NOT NULL,
  `coefficient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `matiere`
--

INSERT INTO `matiere` (`idMatiere`, `nomMat`, `coefficient`) VALUES
(1, 'Mathematiques', 5),
(2, 'Physiques-Chimie', 5),
(3, 'Malagasy', 3),
(4, 'Francais', 2),
(5, 'Anglais', 1),
(6, 'SVT', 2),
(7, 'Histo-Geo', 2),
(8, 'Philosophie', 2);

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE `note` (
  `idMatiere` int(11) NOT NULL,
  `numMatricule` int(11) NOT NULL,
  `note` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `note`
--

INSERT INTO `note` (`idMatiere`, `numMatricule`, `note`) VALUES
(1, 1, 9),
(1, 3, 7),
(1, 5, 9),
(1, 6, 16),
(1, 7, 9),
(1, 8, 19),
(2, 1, 16),
(2, 3, 18),
(2, 5, 16),
(2, 6, 14),
(2, 7, 14),
(2, 8, 16),
(3, 1, 14),
(3, 3, 13),
(3, 5, 14),
(3, 6, 15),
(3, 7, 8),
(3, 8, 10),
(4, 1, 10),
(4, 3, 15),
(4, 5, 10),
(4, 6, 12),
(4, 7, 13),
(4, 8, 20),
(5, 1, 14),
(5, 3, 7),
(5, 5, 10),
(5, 6, 18),
(5, 7, 11),
(5, 8, 1),
(6, 1, 15),
(6, 3, 17),
(6, 5, 7),
(6, 6, 10),
(6, 7, 16),
(6, 8, 17),
(7, 1, 17),
(7, 3, 14),
(7, 5, 17),
(7, 6, 13),
(7, 7, 5),
(7, 8, 14),
(8, 1, 2),
(8, 3, 7),
(8, 5, 7),
(8, 6, 8),
(8, 7, 12),
(8, 8, 7);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`idClasse`);

--
-- Index pour la table `eleve`
--
ALTER TABLE `eleve`
  ADD PRIMARY KEY (`idEleve`),
  ADD KEY `idClasse` (`idClasse`),
  ADD KEY `numMatricule` (`numMatricule`);

--
-- Index pour la table `matiere`
--
ALTER TABLE `matiere`
  ADD PRIMARY KEY (`idMatiere`);

--
-- Index pour la table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`idMatiere`,`numMatricule`),
  ADD KEY `numMatricule` (`numMatricule`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `classe`
--
ALTER TABLE `classe`
  MODIFY `idClasse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `eleve`
--
ALTER TABLE `eleve`
  MODIFY `idEleve` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `matiere`
--
ALTER TABLE `matiere`
  MODIFY `idMatiere` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `eleve`
--
ALTER TABLE `eleve`
  ADD CONSTRAINT `eleve_ibfk_1` FOREIGN KEY (`idClasse`) REFERENCES `classe` (`idClasse`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `note_ibfk_1` FOREIGN KEY (`numMatricule`) REFERENCES `eleve` (`numMatricule`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `note_ibfk_2` FOREIGN KEY (`idMatiere`) REFERENCES `matiere` (`idMatiere`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
