-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : mysql
-- Généré le : mer. 14 juin 2023 à 07:41
-- Version du serveur : 8.0.33
-- Version de PHP : 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `espace_admin_altameos`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int NOT NULL,
  `titre` varchar(255) NOT NULL,
  `contenu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `titre`, `contenu`) VALUES
(4, 'hello modif', 'papa caca mama<br />\r\n<br />\r\nkjjhjhkhj'),
(5, 'nachos', 'trio ballo capellaa tyssun'),
(6, 'iekolo', 'amso, public solo tutti'),
(7, 'italie', 'soleil mere terre vent');

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE `membres` (
  `id` int NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `role` enum('admin','contributeur','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id`, `pseudo`, `email`, `pass`, `role`) VALUES
(11, 'Aless666', '666@live.fr', '$2y$10$aejk53kuuPyoWoAKiOKcleSHvq0GM8WsA4WpYePq7RwG2Zo6X9Nei', 'admin'),
(12, 'Aless555', 'bomba@live.fr', '$2y$10$89igCBAjZOt2A497ccHSDuw5UVvUqtLBKPjW1Lx1TOEFFSM0nPEJS', 'admin'),
(16, 'Aless000', 'cosa@gmail.com', '$2y$10$OSBxe5c8P.Ojl2qFKew/o.nG.TJvsLeZ0tJ5QoOfKpBBhHZSpQqjC', 'contributeur'),
(17, 'kevin', 'kevintest@gmail.com', '$2y$10$NApl0qYWPOApd99sPFwATe1ut/cxnfAte8WF.4zHhqlvn8r9KT/NC', 'contributeur'),
(18, 'Math', 'math@live.fr', '$2y$10$tAUfkvKSMTcwnDPW5pg55.W7m12X.cluFI5aZEmODUk3kIIcYLG8S', 'contributeur'),
(19, 'Yello', 'tello@gmail.com', '$2y$10$M5eDP59qbkUsym1L3b6mE.mxojAMmlAE3wrw.hqS23Uy7w7XUxx7q', 'contributeur'),
(20, 'baba', 'baba@live.fr', '$2y$10$62hNwTPourCl6J2kn6VDKOvBPzmdHY6u9ay0WXkcU5gothi8frSpq', 'contributeur'),
(21, 'Aless333', 'kiki@live.fr', '$2y$10$fk0rpT2g5ug1IBz2VJJDTeFUVgGoM4kNfdo/L8XEptU/inTuTGPuO', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `podcast`
--

CREATE TABLE `podcast` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `rubrique` varchar(255) DEFAULT NULL,
  `emission` varchar(255) DEFAULT NULL,
  `interview` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `podcast`
--

INSERT INTO `podcast` (`id`, `title`, `file_path`, `rubrique`, `emission`, `interview`) VALUES
(6, 'Chill&Hill', 'uploads/648969358f6459.66112238.mp3', 'Fun', 'TF1', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English'),
(7, 'toto', 'uploads/64896c2727fa60.97984975.mp3', 'Fun', 'Soleil', 'lLorem fofor orortssq');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `podcast`
--
ALTER TABLE `podcast`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `membres`
--
ALTER TABLE `membres`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `podcast`
--
ALTER TABLE `podcast`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

CREATE TABLE albums(
  id_album int PRIMARY KEY AUTO_INCREMENT,
  Auteur varchar(50),
  contenu varchar(255),
  titre varchar(50),
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

INSERT INTO albums (id_album, Auteur, contenu, titre) VALUES 
(4, "'Claude François', 'Le lundi au soleil, c'est une chose que l'on aura jamais. A chaque fois c'est pareil.,
'Le lundi au soleil'"),(5, 'Indila', 'Ô ma douce souffrance, pour insister tu recommences. Je ne suis une personne sans importance.', 'Dernière danse')