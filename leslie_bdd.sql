-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 15 juin 2018 à 18:01
-- Version du serveur :  10.1.30-MariaDB
-- Version de PHP :  7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `leslie_bdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id_article` int(10) UNSIGNED NOT NULL,
  `title_article` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `category` enum('Categorie 1','Categorie 2','Categorie 3','Categorie 4') NOT NULL,
  `id_author` int(10) UNSIGNED NOT NULL,
  `date_publication` datetime NOT NULL,
  `img_article` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id_article`, `title_article`, `content`, `category`, `id_author`, `date_publication`, `img_article`) VALUES
(38, 'I love Linux', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla semper ultricies urna, nec pretium purus aliquam in. Sed luctus justo eget est consectetur, molestie accumsan leo congue. Aenean elementum commodo egestas. Mauris ut fringilla nunc metus', 'Categorie 1', 2, '2018-05-09 10:30:23', 'photoleslie2.png'),
(39, 'Naturopathie', 'Food is my passion. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore', 'Categorie 2', 1, '2018-05-24 01:59:02', 'photoleslie3.png'),
(40, 'Berlin à Berlin..', 'Beer is my passion. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ', 'Categorie 3', 3, '2018-05-09 09:00:00', 'photoleslie1.png'),
(41, 'Manger Bio ? C\'est Bio pour la santé.', 'L’alimentation Paléo prône un retour à une alimentation plus saine dans laquelle on supprime. L’alimentation Paléo prône un retour à une alimentation plus saine dans laquelle on supprime,', 'Categorie 4', 4, '2018-06-13 12:32:11', 'mangerbio122.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `author`
--

CREATE TABLE `author` (
  `id_author` int(255) UNSIGNED NOT NULL,
  `name` varchar(32) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `email` char(50) NOT NULL,
  `birth_date` date NOT NULL,
  `password` char(40) NOT NULL,
  `hash_validation` char(32) NOT NULL,
  `power` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `author`
--

INSERT INTO `author` (`id_author`, `name`, `firstname`, `email`, `birth_date`, `password`, `hash_validation`, `power`) VALUES
(1, 'Berlin', 'Steven', 'steven.berlin@10mentionweb.org', '2018-05-05', 'setetstvev', '', 0),
(2, 'Aubrun', 'Boris', 'boris.aubrun@10mentionweb.org', '2018-04-16', 'dmlr', '', 1),
(3, 'Cabarrus', 'Leslie', 'leslie.cabarrus@naturo.fr', '1990-12-01', 'lc', '', 1),
(4, 'Lagaffe', 'Gaston', 'gaston.lagaffe@laposte.fr', '2018-06-21', 'gaston', '', 1);

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id_comment` int(11) NOT NULL,
  `id_author` int(11) NOT NULL,
  `content` text NOT NULL,
  `id_article` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id_comment`, `id_author`, `content`, `id_article`) VALUES
(1, 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla semper ultricies urna', 38);

-- --------------------------------------------------------

--
-- Structure de la table `newsletter`
--

CREATE TABLE `newsletter` (
  `email_pub` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id_article`),
  ADD UNIQUE KEY `title_article` (`title_article`),
  ADD KEY `id_author` (`id_author`),
  ADD KEY `id_author_2` (`id_author`);

--
-- Index pour la table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id_author`),
  ADD UNIQUE KEY `birth_date` (`birth_date`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `id_article` (`id_article`),
  ADD KEY `id_author` (`id_author`);

--
-- Index pour la table `newsletter`
--
ALTER TABLE `newsletter`
  ADD UNIQUE KEY `email_pub` (`email_pub`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id_article` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT pour la table `author`
--
ALTER TABLE `author`
  MODIFY `id_author` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `fk_author` FOREIGN KEY (`id_author`) REFERENCES `author` (`id_author`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_comment` FOREIGN KEY (`id_article`) REFERENCES `article` (`id_article`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
