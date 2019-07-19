-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 19, 2019 at 05:14 PM
-- Server version: 5.7.21
-- PHP Version: 7.1.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `auteur`
--

CREATE TABLE `auteur` (
  `id_auteur` int(11) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) DEFAULT NULL,
  `bio` mediumtext,
  `date_naissance` datetime DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auteur`
--

INSERT INTO `auteur` (`id_auteur`, `nom`, `prenom`, `bio`, `date_naissance`, `photo`) VALUES
(1, ''King'', ''Stephen'', ''Il publie son premier roman en 1974 et devient rapidement célèbre pour ses contributions dans le domaine de l\''horreur mais écrit également des livres relevant d\''autres genres comme le fantastique, la fantasy, la science-fiction et le roman policier. '', ''1947-09-21 00:00:00'', ''img/king.jpg''),
(2, ''Lehmann'', ''Jonathan'', ''Jonathan Lehmann était avocat d\''affaires lorsqu\''il a décidé de tout arrêter pour partir méditer en Inde. Dans \"Journal intime d\''un touriste du bonheur\", il raconte ce voyage en quête de sens.'', NULL, ''img/lehmann.jpg''),
(3, ''Tolle'', ''Eckhart'', ''Eckhart Tolle, de son vrai nom Ulrich Leonard Tolle, né le 16 février 1948 à Lünen, est un écrivain et conférencier canadien d\''origine allemande, auteur des best-sellers Le Pouvoir du moment présent et Nouvelle Terre.'', ''1948-02-16 00:00:00'', NULL),
(4, ''Rowling'', ''Joanne'', ''Joanne Rowling, également connue sous le nom de J. K. Rowling et le pseudonyme de Robert Galbraith, est une romancière et scénariste anglaise née le 31 juillet 1965 dans l’agglomération de Yate, dans le sud du Gloucestershire.'', ''1965-07-31 00:00:00'', ''img/rowling.jpg''),
(13, ''aaa'', ''aaaa'', '''', ''1900-12-12 00:00:00'', NULL),
(14, ''Verne'', ''Jules'', ''aaa'', ''2019-07-03 00:00:00'', ''img/verne.jpg'');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id_client` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nom` varchar(90) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `code_postal` varchar(5) NOT NULL,
  `ville` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id_client`, `email`, `password`, `nom`, `prenom`, `adresse`, `code_postal`, `ville`) VALUES
(1, ''amelieonline@gmail.com'', ''azerty'', ''DUVERNET'', ''Amelaye'', ''11 zzzzz'', ''13006'', ''Marseille''),
(2, ''amelie.duvernet@gmail.com'', ''pouet'', ''ONLINE'', ''Amelaye'', ''234 aaaa'', ''13000'', ''Marseille''),
(3, ''aaa'', ''aaa'', ''aaa'', ''aaaa'', ''aaaa'', ''aaaa'', ''aaaa''),
(5, ''aaaa'', ''aaaaa'', ''aaaaa'', ''aaaa'', ''aaaaa'', ''aaaaa'', ''aaaa''),
(11, ''zzz@zzz.z'', ''zzzz'', ''zzzz'', ''zzzz'', ''zzzzzzz'', ''zzzz'', ''zzzzzzz''),
(12, ''zerzer@zer.z'', ''aaaa'', ''aaaaa'', ''aaaa'', ''aaaa'', ''aaaa'', ''aaaaa''),
(13, ''aaaa@pom.pom'', ''aaaa'', ''aaaa'', ''aaaa'', ''aaa'', ''aaaa'', ''aaaa'');

-- --------------------------------------------------------

--
-- Table structure for table `collection`
--

CREATE TABLE `collection` (
  `id_collection` int(11) NOT NULL,
  `nom` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `collection`
--

INSERT INTO `collection` (`id_collection`, `nom`) VALUES
(1, ''Gallimard''),
(2, ''J\''ai lu''),
(3, ''Points''),
(4, ''Livre de poche'');

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

CREATE TABLE `commande` (
  `id_commande` int(11) NOT NULL,
  `id_panier` int(11) NOT NULL,
  `date_commande` datetime NOT NULL,
  `statut` varchar(45) NOT NULL,
  `frais_de_port` decimal(2,2) NOT NULL,
  `livraison` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `format`
--

CREATE TABLE `format` (
  `id_format` int(11) NOT NULL,
  `nom` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `format`
--

INSERT INTO `format` (`id_format`, `nom`) VALUES
(1, ''Poche''),
(2, ''Broché'');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `id_genre` int(11) NOT NULL,
  `nom` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`id_genre`, `nom`) VALUES
(1, ''Fantasy''),
(2, ''Développement personnel'');

-- --------------------------------------------------------

--
-- Table structure for table `langue`
--

CREATE TABLE `langue` (
  `id_langue` int(11) NOT NULL,
  `nom` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `langue`
--

INSERT INTO `langue` (`id_langue`, `nom`) VALUES
(1, ''Français'');

-- --------------------------------------------------------

--
-- Table structure for table `ligne_panier`
--

CREATE TABLE `ligne_panier` (
  `id_lignepanier` int(11) NOT NULL,
  `id_livre` int(11) NOT NULL,
  `quantite` int(11) NOT NULL DEFAULT ''1'',
  `id_panier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `livre`
--

CREATE TABLE `livre` (
  `id_livre` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `prix` decimal(5,2) NOT NULL,
  `note` int(11) NOT NULL DEFAULT ''0'',
  `nb_pages` int(11) DEFAULT NULL,
  `annee` int(11) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `id_auteur` int(11) NOT NULL,
  `id_collection` int(11) NOT NULL,
  `id_genre` int(11) NOT NULL,
  `id_langue` int(11) NOT NULL,
  `id_format` int(11) NOT NULL,
  `resume` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `livre`
--

INSERT INTO `livre` (`id_livre`, `titre`, `prix`, `note`, `nb_pages`, `annee`, `photo`, `id_auteur`, `id_collection`, `id_genre`, `id_langue`, `id_format`, `resume`) VALUES
(7, ''La ligne verte'', ''7.90'', 4, 505, 1996, ''img/ligneverte.jpg'', 1, 4, 1, 1, 1, ''Résumé de la ligne verte''),
(8, ''Carrie'', ''7.20'', 4, 226, 1974, ''img/carrie.jpg'', 1, 4, 1, 1, 1, ''''),
(9, ''Harry Potter à l\''école des sorciers'', ''21.00'', 5, 336, 1999, ''img/harrypotter.jpg'', 4, 1, 1, 1, 2, ''''),
(10, ''Journal intime d\''un touriste du bonheur'', ''16.90'', 3, 288, 2018, ''img/journal.jpg'', 2, 3, 2, 1, 2, ''''),
(11, ''Le pouvoir du moment présent '', ''7.20'', 3, 256, 2010, ''img/pouvoir.jpg'', 3, 2, 2, 1, 1, ''''),
(22, ''Rose Madder'', ''12.00'', 4, 123, 1990, ''img/rosemadder.jpg'', 1, 4, 1, 1, 1, ''Quatorze ans. C\''est le nombre d\''années de torture que Rosie McClendon Daniels a vécu. Quatorze ans enfermée chez elle à se faire battre, mordre et terroriser par son bourreau de mari, dont les violences lui ont même causé une fausse couche il y a neuf ans. Après toutes ces années avec Norman Daniels, Rosie prend tout à coup conscience que cela ne peut plus durer et quitte le domicile conjugal sur un coup de tête en emportant seulement avec elle la carte bancaire de son mari.''),
(23, ''Harry Potter et la coupe de feu'', ''23.00'', 5, 500, 2004, NULL, 4, 1, 1, 1, 1, ''C\''est chouette''),
(24, ''Harry Potter et le prince de Sang-Mêlé'', ''40.00'', 4, 700, 2005, NULL, 4, 1, 1, 1, 1, ''''),
(28, ''Jessie'', ''34.00'', 3, 234, 1990, NULL, 1, 4, 1, 1, 1, ''Good !''),
(29, ''Jessie'', ''34.00'', 3, 234, 1990, ''img/jessie.jpg'', 1, 1, 1, 1, 1, ''Good !''),
(30, ''20000 Lieues sous les mers'', ''20.00'', 4, 345, 1900, NULL, 14, 1, 1, 1, 2, ''Mais c\''est bien !'');

-- --------------------------------------------------------

--
-- Table structure for table `panier`
--

CREATE TABLE `panier` (
  `id_panier` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `date_creation` datetime NOT NULL,
  `date_modification` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auteur`
--
ALTER TABLE `auteur`
  ADD PRIMARY KEY (`id_auteur`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `collection`
--
ALTER TABLE `collection`
  ADD PRIMARY KEY (`id_collection`);

--
-- Indexes for table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_commande`),
  ADD KEY `fk_commande_panier1_idx` (`id_panier`);

--
-- Indexes for table `format`
--
ALTER TABLE `format`
  ADD PRIMARY KEY (`id_format`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id_genre`);

--
-- Indexes for table `langue`
--
ALTER TABLE `langue`
  ADD PRIMARY KEY (`id_langue`);

--
-- Indexes for table `ligne_panier`
--
ALTER TABLE `ligne_panier`
  ADD PRIMARY KEY (`id_lignepanier`),
  ADD KEY `fk_ligne_panier_panier1_idx` (`id_panier`),
  ADD KEY `fk_ligne_panier_livre1_idx` (`id_livre`);

--
-- Indexes for table `livre`
--
ALTER TABLE `livre`
  ADD PRIMARY KEY (`id_livre`),
  ADD KEY `fk_livre_collection_idx` (`id_collection`),
  ADD KEY `fk_livre_genre1_idx` (`id_genre`),
  ADD KEY `fk_livre_format1_idx` (`id_format`),
  ADD KEY `fk_livre_langue1_idx` (`id_langue`),
  ADD KEY `fk_livre_auteur1_idx` (`id_auteur`);

--
-- Indexes for table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id_panier`),
  ADD KEY `fk_panier_client1_idx` (`id_client`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auteur`
--
ALTER TABLE `auteur`
  MODIFY `id_auteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `collection`
--
ALTER TABLE `collection`
  MODIFY `id_collection` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_commande` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `id_genre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `livre`
--
ALTER TABLE `livre`
  MODIFY `id_livre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `fk_commande_panier1` FOREIGN KEY (`id_panier`) REFERENCES `panier` (`id_panier`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ligne_panier`
--
ALTER TABLE `ligne_panier`
  ADD CONSTRAINT `fk_ligne_panier_livre1` FOREIGN KEY (`id_livre`) REFERENCES `livre` (`id_livre`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ligne_panier_panier1` FOREIGN KEY (`id_panier`) REFERENCES `panier` (`id_panier`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `livre`
--
ALTER TABLE `livre`
  ADD CONSTRAINT `fk_livre_auteur1` FOREIGN KEY (`id_auteur`) REFERENCES `auteur` (`id_auteur`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_livre_collection` FOREIGN KEY (`id_collection`) REFERENCES `collection` (`id_collection`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_livre_format1` FOREIGN KEY (`id_format`) REFERENCES `format` (`id_format`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_livre_genre1` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id_genre`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_livre_langue1` FOREIGN KEY (`id_langue`) REFERENCES `langue` (`id_langue`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `fk_panier_client1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`) ON DELETE NO ACTION ON UPDATE NO ACTION;
