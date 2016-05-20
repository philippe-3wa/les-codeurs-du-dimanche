-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 20 Mai 2016 à 10:31
-- Version du serveur: 5.5.47-0ubuntu0.14.04.1
-- Version de PHP: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `contenu` varchar(1023) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `auteur` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `auteur` (`auteur`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`id`, `titre`, `contenu`, `date`, `auteur`) VALUES
(1, 'Article 1', 'je suis le contenu du premier article.', '2016-05-19 09:43:46', 9),
(2, 'Article 2', 'je suis le contenu du 2eme article.', '2016-05-19 09:44:19', 9);

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `contenu` varchar(1023) NOT NULL,
  `auteur` int(11) unsigned NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_article` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_article` (`id_article`),
  KEY `auteur` (`auteur`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `contenu`, `auteur`, `date`, `id_article`) VALUES
(1, 'test commentaire sur article 2', 9, '2016-05-19 13:01:01', 2),
(2, 'test 2eme commentaire sur article 2', 9, '2016-05-20 07:15:10', 2),
(3, '3eme commentaire sur article 2', 9, '2016-05-20 07:20:54', 2);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(15) NOT NULL,
  `email` varchar(63) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `role` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `login`, `email`, `password`, `date`, `role`) VALUES
(9, 'admin', 'admin@admin.com', 'jesuisadmin', '2016-05-19 09:15:45', 1),
(10, 'test@test.fr', 'test@test.fr', 'test@test.fr', '2016-05-19 14:49:44', 0);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`auteur`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `commentaires_ibfk_2` FOREIGN KEY (`auteur`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commentaires_ibfk_1` FOREIGN KEY (`id_article`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
