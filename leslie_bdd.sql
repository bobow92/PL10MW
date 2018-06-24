-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  Dim 24 juin 2018 à 23:03
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
  `content` varchar(1500) NOT NULL,
  `category` enum('Categorie1','Categorie2','Categorie3','Categorie4','Categorie5') NOT NULL,
  `id_author` int(10) UNSIGNED NOT NULL,
  `date_publication` datetime NOT NULL,
  `img_article` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id_article`, `title_article`, `content`, `category`, `id_author`, `date_publication`, `img_article`) VALUES
(44, 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec porta et velit ac interdum. Proin ultrices quam et mauris vehicula, ac mattis purus aliquam. Pellentesque hendrerit ultrices tortor. Morbi sed cursus dui, quis interdum odio. Fusce hendrerit velit purus, sed cursus mauris vulputate in. Aliquam dolor leo, suscipit eu lorem quis, consectetur condimentum dui. Nulla facilisi. Aenean in felis finibus, venenatis sem a, viverra lacus. Cras lobortis quam ac pulvinar commodo. Phasellus ut feugiat nibh. Aenean ut magna aliquet, egestas nulla sed, tincidunt leo. Aliquam pellentesque diam quis imperdiet consectetur.\r\n\r\nDonec urna tortor, vulputate non felis eget, tempor eleifend quam. Aenean aliquam est non eros venenatis fermentum. Maecenas in ex ut est aliquam commodo. Donec facilisis, magna et pharetra facilisis, mauris enim mollis metus, vitae tincidunt nulla sapien at risus. Donec quis volutpat tortor. Etiam tincidunt quis sem in euismod. Morbi sollicitudin, erat sit amet porttitor iaculis, neque orci consectetur sapien, vel scelerisque felis tortor ac lectus. Sed tempus dignissim odio nec dapibus. Suspendisse eu odio ex. Vivamus at mi et mauris sollicitudin facilisis sit amet quis elit. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed in turpis turpis.', 'Categorie1', 109, '2018-06-22 06:21:28', 'photoleslie2.png'),
(45, 'Lorem Ipsum parturient', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec porta et velit ac interdum. Proin ultrices quam et mauris vehicula, ac mattis purus aliquam. Pellentesque hendrerit ultrices tortor. Morbi sed cursus dui, quis interdum odio. Fusce hendrerit velit purus, sed cursus mauris vulputate in. Aliquam dolor leo, suscipit eu lorem quis, consectetur condimentum dui. Nulla facilisi. Aenean in felis finibus, venenatis sem a, viverra lacus. Cras lobortis quam ac pulvinar commodo. Phasellus ut feugiat nibh. Aenean ut magna aliquet, egestas nulla sed, tincidunt leo. Aliquam pellentesque diam quis imperdiet consectetur.\r\n\r\nDonec urna tortor, vulputate non felis eget, tempor eleifend quam. Aenean aliquam est non eros venenatis fermentum. Maecenas in ex ut est aliquam commodo. Donec facilisis, magna et pharetra facilisis, mauris enim mollis metus, vitae tincidunt nulla sapien at risus. Donec quis volutpat tortor. Etiam tincidunt quis sem in euismod. Morbi sollicitudin, erat sit amet porttitor iaculis, neque orci consectetur sapien, vel scelerisque felis tortor ac lectus. Sed tempus dignissim odio nec dapibus. Suspendisse eu odio ex. Vivamus at mi et mauris sollicitudin facilisis sit amet quis elit. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed in turpis turpis.', 'Categorie2', 106, '2018-06-19 19:45:23', 'cute.jpg'),
(46, 'Lorem Ipsum Parturient Naturo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec porta et velit ac interdum. Proin ultrices quam et mauris vehicula, ac mattis purus aliquam. Pellentesque hendrerit ultrices tortor. Morbi sed cursus dui, quis interdum odio. Fusce hendrerit velit purus, sed cursus mauris vulputate in. Aliquam dolor leo, suscipit eu lorem quis, consectetur condimentum dui. Nulla facilisi. Aenean in felis finibus, venenatis sem a, viverra lacus. Cras lobortis quam ac pulvinar commodo. Phasellus ut feugiat nibh. Aenean ut magna aliquet, egestas nulla sed, tincidunt leo. Aliquam pellentesque diam quis imperdiet consectetur.\r\n\r\nDonec urna tortor, vulputate non felis eget, tempor eleifend quam. Aenean aliquam est non eros venenatis fermentum. Maecenas in ex ut est aliquam commodo. Donec facilisis, magna et pharetra facilisis, mauris enim mollis metus, vitae tincidunt nulla sapien at risus. Donec quis volutpat tortor. Etiam tincidunt quis sem in euismod. Morbi sollicitudin, erat sit amet porttitor iaculis, neque orci consectetur sapien, vel scelerisque felis tortor ac lectus. Sed tempus dignissim odio nec dapibus. Suspendisse eu odio ex. Vivamus at mi et mauris sollicitudin facilisis sit amet quis elit. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed in turpis turpis.', 'Categorie3', 108, '2018-06-13 05:11:00', 'photoleslie1.png'),
(47, 'Lorem Ipsum Turpis', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec porta et velit ac interdum. Proin ultrices quam et mauris vehicula, ac mattis purus aliquam. Pellentesque hendrerit ultrices tortor. Morbi sed cursus dui, quis interdum odio. Fusce hendrerit velit purus, sed cursus mauris vulputate in. Aliquam dolor leo, suscipit eu lorem quis, consectetur condimentum dui. Nulla facilisi. Aenean in felis finibus, venenatis sem a, viverra lacus. Cras lobortis quam ac pulvinar commodo. Phasellus ut feugiat nibh. Aenean ut magna aliquet, egestas nulla sed, tincidunt leo. Aliquam pellentesque diam quis imperdiet consectetur.\r\n\r\nDonec urna tortor, vulputate non felis eget, tempor eleifend quam. Aenean aliquam est non eros venenatis fermentum. Maecenas in ex ut est aliquam commodo. Donec facilisis, magna et pharetra facilisis, mauris enim mollis metus, vitae tincidunt nulla sapien at risus. Donec quis volutpat tortor. Etiam tincidunt quis sem in euismod. Morbi sollicitudin, erat sit amet porttitor iaculis, neque orci consectetur sapien, vel scelerisque felis tortor ac lectus. Sed tempus dignissim odio nec dapibus. Suspendisse eu odio ex. Vivamus at mi et mauris sollicitudin facilisis sit amet quis elit. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed in turpis turpis.', 'Categorie4', 107, '2018-06-09 20:49:00', 'mangerbio122.jpeg'),
(48, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec porta et velit ac interdum. Proin ultrices quam et mauris vehicula, ac mattis purus aliquam. Pellentesque hendrerit ultrices tortor. Morbi sed cursus dui, quis interdum odio. Fusce hendrerit velit purus, sed cursus mauris vulputate in. Aliquam dolor leo, suscipit eu lorem quis, consectetur condimentum dui. Nulla facilisi. Aenean in felis finibus, venenatis sem a, viverra lacus. Cras lobortis quam ac pulvinar commodo. Phasellus ut feugiat nibh. Aenean ut magna aliquet, egestas nulla sed, tincidunt leo. Aliquam pellentesque diam quis imperdiet consectetur.\r\n\r\nDonec urna tortor, vulputate non felis eget, tempor eleifend quam. Aenean aliquam est non eros venenatis fermentum. Maecenas in ex ut est aliquam commodo. Donec facilisis, magna et pharetra facilisis, mauris enim mollis metus, vitae tincidunt nulla sapien at risus. Donec quis volutpat tortor. Etiam tincidunt quis sem in euismod. Morbi sollicitudin, erat sit amet porttitor iaculis, neque orci consectetur sapien, vel scelerisque felis tortor ac lectus. Sed tempus dignissim odio nec dapibus. Suspendisse eu odio ex. Vivamus at mi et mauris sollicitudin facilisis sit amet quis elit. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed in turpis turpis.', 'Categorie5', 106, '2018-05-08 06:22:28', 'photoleslie2.png');

-- --------------------------------------------------------

--
-- Structure de la table `author`
--

CREATE TABLE `author` (
  `id_author` int(255) UNSIGNED NOT NULL,
  `name` char(32) NOT NULL,
  `firstname` char(32) NOT NULL,
  `email` char(50) NOT NULL,
  `birth_date` date NOT NULL,
  `password` char(40) NOT NULL,
  `hash_validation` char(40) NOT NULL,
  `power` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `author`
--

INSERT INTO `author` (`id_author`, `name`, `firstname`, `email`, `birth_date`, `password`, `hash_validation`, `power`) VALUES
(106, 'Aubrun', 'Boris', 'boris.aubrun@free.fr', '1996-04-16', '49f9847b81cd581f124a28914aaa8764b77c54b7', '49f9847b81cd581f124a28914aaa8764b77c54b7', 1),
(107, 'Steven', 'Seagal', 'steven.seagal@fbi.us', '1985-12-10', '4068f0880b399410602d694b3cc711c8a8f4727e', '4068f0880b399410602d694b3cc711c8a8f4727e', 0),
(108, 'Vergne', 'Marlon', 'marlon.vergne@gandi.net', '1995-12-19', 'e2981b460eaa64b3d68b426a8250dc77dec79fe2', 'e2981b460eaa64b3d68b426a8250dc77dec79fe2', 0),
(109, 'Cabarrus', 'Leslie', 'leslie.cabarrus@hotmail.fr', '1985-06-19', '0a589da583cfeed1971eca6091a76bbaaf09d6f3', '0a589da583cfeed1971eca6091a76bbaaf09d6f3', 0),
(113, 'Soul', 'Goodman', 'soul.goodman@charlattant.fr', '1998-05-11', '0867322e7c4223c85b4c8d14b69ab8a6fc774dad', '0867322e7c4223c85b4c8d14b69ab8a6fc774dad', 0);

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id_comment` int(11) NOT NULL,
  `content_comment` text NOT NULL,
  `id_article` int(11) UNSIGNED NOT NULL,
  `date_publication_comment` datetime NOT NULL,
  `id_author` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id_comment`, `content_comment`, `id_article`, `date_publication_comment`, `id_author`) VALUES
(6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 44, '2018-06-23 19:48:36', 107),
(7, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 45, '2018-06-23 21:31:49', 106);

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
  MODIFY `id_article` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT pour la table `author`
--
ALTER TABLE `author`
  MODIFY `id_author` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
