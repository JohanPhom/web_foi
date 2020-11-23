-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 27 mai 2020 à 11:24
-- Version du serveur :  10.4.8-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `webdip2019x100`
--

-- --------------------------------------------------------

--
-- Structure de la table `club`
--

DROP TABLE IF EXISTS `club`;
CREATE TABLE IF NOT EXISTS `club` (
  `ID_club` int(11) NOT NULL AUTO_INCREMENT,
  `ID_creator_user` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `nb_member` int(11) NOT NULL DEFAULT 1,
  `nb_item` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `author` varchar(45) COLLATE utf8_bin NOT NULL,
  `image` text COLLATE utf8_bin DEFAULT NULL,
  `image_title` text COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`ID_club`),
  KEY `fk_club_user1_idx` (`ID_creator_user`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `club`
--

INSERT INTO `club` (`ID_club`, `ID_creator_user`, `name`, `description`, `nb_member`, `nb_item`, `date`, `author`, `image`, `image_title`) VALUES
(2, 1, 'Game of Throne', 'Game of Thrones is roughly based on the storylines of A Song of Ice and Fire, set in the fictional Seven Kingdoms of Westeros and the continent of Essos. The series chronicles the violent dynastic struggles among the realm s noble families for the Iron Throne, while other families fight for independence from it.', 3, 13, '2020-05-15 14:11:05', 'George R. R. Martin', 'GOT.jpg', 'GOTTitle.png'),
(7, 1, 'Star Wars', 'Star Wars is a science-fiction franchise comprising movies, books, comics, video games, toys, and animated shows. It is a fictional universe created by George Lucas.', 4, 0, '2020-05-12 10:24:52', 'George Lucas', 'starwars.jpg', 'starwarsTitle.png'),
(8, 1, 'Dragon Ball Z', 'Story. Dragon Ball Z follows the adventures of the adult Goku who, along with his companions, defends the earth against an assortment of villains ranging from intergalactic space fighters and conquerors, unnaturally powerful androids and near indestructible magical creatures', 1, 6, '2020-05-15 12:45:38', 'Akira Toriyama', 'dragonball.jpg', 'dragonBallTitle.png'),
(9, 1, 'Naruto', 'Naruto is a Japanese manga series written and illustrated by Masashi Kishimoto. It tells the story of Naruto Uzumaki, a young ninja who seeks to gain recognition from his peers and also dreams of becoming the Hokage, the leader of his village.', 1, 0, '2020-05-10 16:45:45', 'Masashi Kishimoto', 'naruto.png', 'narutoTitle.png'),
(10, 1, 'One piece', 'One Piece is a manga and anime series created by Eiichiro Oda. It is the story of the Strawhat Pirates, led by captain Monkey D. Luffy, on their adventures in Grand Line. The main theme is Monkey D.', 1, 0, '2020-05-10 16:45:51', 'Eiichirō Oda', 'onepiece.jpg', 'onepieceTitle.png'),
(12, 1, 'Avengers', 'Avengers. Earth s Mightiest Heroes stand as the planet s first line of defense against the most powerful threats in the universe. The Avengers began as a group of extraordinary individuals who were assembled to defeat Loki and his Chitauri army in New York City.', 1, 0, '2020-05-10 16:45:57', 'Stan Lee', 'avengers.jpg', 'avengersTitle.png'),
(13, 1, 'Harry Potter', 'Throughout the series, Harry is described as having his father s perpetually untidy black hair, his mother s bright green eyes, and a lightning bolt-shaped scar on his forehead. He is further described as \"small and skinny for his age\" with \"a thin face\" and \"knobbly knees\", and he wears round eyeglasses.', 1, 0, '2020-05-10 16:46:07', 'J. K. Rowling', 'harrypotter.jpg', 'harrypotterTitle.png'),
(15, 1, 'Black Mirror', 'Black Mirror s is a British television anthology series created by Charlie Brooker that features speculative fiction with dark and sometimes satirical themes that examine modern society, particularly with regard to the unanticipated consequences of new technologies.', 1, 0, '2020-05-10 16:46:07', 'Charlie Brooker', 'blackmiror.jpg', 'blackmirrorTitle.png');

-- --------------------------------------------------------

--
-- Structure de la table `club_member`
--

DROP TABLE IF EXISTS `club_member`;
CREATE TABLE IF NOT EXISTS `club_member` (
  `ID_user` int(11) NOT NULL,
  `ID_club` int(11) NOT NULL,
  `moderator` tinyint(4) NOT NULL,
  PRIMARY KEY (`ID_user`,`ID_club`),
  KEY `fk_user_has_club_club1_idx` (`ID_club`),
  KEY `fk_user_has_club_user1_idx` (`ID_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `club_member`
--

INSERT INTO `club_member` (`ID_user`, `ID_club`, `moderator`) VALUES
(1, 2, 1),
(1, 7, 1),
(1, 8, 1),
(1, 9, 1),
(1, 10, 1),
(1, 12, 1),
(1, 13, 1),
(1, 15, 1),
(2, 2, -1),
(4, 2, -1),
(4, 7, -1),
(5, 7, -1),
(6, 7, -1);

-- --------------------------------------------------------

--
-- Structure de la table `forum`
--

DROP TABLE IF EXISTS `forum`;
CREATE TABLE IF NOT EXISTS `forum` (
  `ID_forum` int(11) NOT NULL AUTO_INCREMENT,
  `ID_club` int(11) NOT NULL,
  `ID_creator_user` int(11) NOT NULL,
  `number_answer` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_forum`),
  KEY `fk_forum_user1_idx` (`ID_creator_user`),
  KEY `fk_forum_club1_idx` (`ID_club`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `forum`
--

INSERT INTO `forum` (`ID_forum`, `ID_club`, `ID_creator_user`, `number_answer`) VALUES
(13, 2, 1, 2),
(21, 9, 1, 1),
(22, 9, 1, 2),
(26, 7, 1, 2),
(27, 7, 1, 5),
(30, 2, 5, 0),
(31, 8, 1, 1),
(32, 13, 1, 0),
(33, 13, 1, 0),
(34, 8, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `ID_item` int(11) NOT NULL AUTO_INCREMENT,
  `ID_creator_user` int(11) NOT NULL,
  `ID_club` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` longtext COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`ID_item`),
  KEY `fk_item_user1_idx` (`ID_creator_user`),
  KEY `fk_item_club1_idx` (`ID_club`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `item`
--

INSERT INTO `item` (`ID_item`, `ID_creator_user`, `ID_club`, `name`, `description`, `price`, `quantity`, `image`) VALUES
(23, 1, 8, 'Markos', 'ddd', 57575, 57855, 'dragon_item1.jpg'),
(24, 1, 8, 'fggrg', 'gtdgtgtg', 577, 75757, 'dragon_item2.jpg'),
(29, 1, 8, 'eiduhzedu', 'hruzkfkzebf', 15, 65, 'breakingbad.jpg'),
(30, 1, 8, 'Game of Throne', '8joihu', 55, 54, 'gmail.png'),
(31, 1, 8, 'Game of Throne', '8joihu', 55, 55, 'gmail.png'),
(32, 1, 8, 'Game of Throne', '8joihu', 55, 55, 'gmail.png'),
(33, 4, 2, 'item1', 'sss', 3, 0, 'GotItem8.jpg'),
(34, 4, 2, 'item2', 'item2', 2, 0, 'GotItem7.jpg'),
(35, 4, 2, 'gotitem3', 'item3', 2, -1, 'GotItem6.jpg'),
(36, 4, 2, 'item4', 'item4', 4, 0, 'GotItem5.jpg'),
(37, 4, 2, 'item5', 'item5', 5, 3, 'GotItem4.jpg'),
(38, 4, 2, 'item6', 'item6', 6, 2, 'GotItem3.jpg'),
(39, 4, 2, 'item7', 'item7', 7, 7, 'GotItem2.jpg'),
(40, 4, 2, 'item8', 'item8', 8, 7, 'GotItem1.jpg'),
(43, 4, 2, 'item9', 'item9', 9, 9, 'GotItem8.jpg'),
(46, 4, 2, 'item9', 'item9', 9, 8, 'GotItem8.jpg'),
(48, 4, 2, 'item9', 'item9', 9, 9, 'GotItem8.jpg'),
(52, 4, 2, 'item9', 'item9', 9, 9, 'GotItem8.jpg'),
(53, 4, 2, 'item9', 'item9', 9, 8, 'GotItem8.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `ID_message` int(11) NOT NULL AUTO_INCREMENT,
  `ID_user` int(11) NOT NULL,
  `ID_type_message` int(11) NOT NULL,
  `ID_forum` int(11) NOT NULL,
  `text_message` text COLLATE utf8_bin NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `best_answer` tinyint(1) NOT NULL DEFAULT -1,
  PRIMARY KEY (`ID_message`),
  KEY `fk_message_user1_idx` (`ID_user`),
  KEY `fk_message_type_message1_idx` (`ID_type_message`),
  KEY `fk_message_forum1_idx` (`ID_forum`)
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`ID_message`, `ID_user`, `ID_type_message`, `ID_forum`, `text_message`, `date`, `best_answer`) VALUES
(53, 1, 1, 13, 'alloo', '2020-05-25 13:37:44', -1),
(57, 1, 2, 13, 'je suis a', '2020-05-27 11:20:44', -1),
(66, 1, 1, 21, 'aaa', '2020-05-25 14:31:38', -1),
(67, 1, 1, 22, ' je me pose des question moi aussi je me pose des question moi aussi je me pose des question moi aussi je me pose des question moi aussi ', '2020-05-25 14:31:49', -1),
(68, 1, 2, 22, 'moi aussi j ai une question', '2020-05-25 14:32:00', -1),
(69, 1, 2, 22, 'je pense avoir al réposne a ta question', '2020-05-25 14:32:09', -1),
(75, 1, 1, 26, 'Walay bili', '2020-05-26 07:13:07', -1),
(76, 1, 2, 26, 'kjdkdjd', '2020-05-26 07:13:20', -1),
(77, 1, 2, 26, 'idjidjdid', '2020-05-26 07:13:29', -1),
(78, 1, 1, 27, 'j ajoute une question', '2020-05-26 07:55:36', -1),
(79, 1, 2, 27, 'et aussi une reponse', '2020-05-26 07:55:54', -1),
(80, 1, 2, 27, 'klkl', '2020-05-26 07:57:19', -1),
(81, 1, 2, 27, 'jjkj', '2020-05-26 07:58:02', -1),
(82, 1, 2, 27, 'kllk', '2020-05-26 07:58:17', -1),
(83, 1, 2, 21, 'ayo', '2020-05-26 13:11:13', -1),
(86, 5, 2, 13, 'yala', '2020-05-27 11:19:19', -1),
(87, 5, 1, 30, 'rgg', '2020-05-27 07:17:25', -1),
(88, 1, 1, 31, 'I have a question about how to become a super sayajin ?', '2020-05-27 07:26:34', -1),
(89, 1, 2, 31, 'No nee to reply i already have the answer', '2020-05-27 07:26:49', -1),
(90, 1, 1, 32, 'ddd', '2020-05-27 07:35:00', -1),
(91, 1, 1, 33, 'ddd', '2020-05-27 07:35:05', -1),
(92, 1, 2, 27, 'ah ouais', '2020-05-27 07:35:25', -1),
(93, 1, 1, 34, 'okidoki', '2020-05-27 07:35:45', -1);

-- --------------------------------------------------------

--
-- Structure de la table `question_answer`
--

DROP TABLE IF EXISTS `question_answer`;
CREATE TABLE IF NOT EXISTS `question_answer` (
  `ID_question` int(11) NOT NULL AUTO_INCREMENT,
  `ID_test` int(11) NOT NULL,
  `question` text COLLATE utf8_bin NOT NULL,
  `answer` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`ID_question`),
  KEY `fk_question_answer_test1_idx` (`ID_test`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `question_answer`
--

INSERT INTO `question_answer` (`ID_question`, `ID_test`, `question`, `answer`) VALUES
(34, 28, 'Who is the ain character ?', 'Naruto'),
(35, 28, 'Sakura is in love with naruto ? (true/false)', 'false'),
(36, 28, 'Naruto is a jinchuriki ? (true/false)', 'true'),
(37, 28, 'Kyubi has 9 tails ? (true/false)', 'true'),
(38, 28, 'Hachibi is Gaara s deamon ? (true/false)', 'false'),
(39, 28, 'Hinata is a Hyuga ? (true/false)', 'true'),
(40, 28, 'Sasuke is a Uchiha ? (true/false)', 'true'),
(41, 28, 'Jiraya killed pain ? (true/false)', 'false'),
(42, 28, 'Jiraya has been killed by pain ? (true/false)', 'true'),
(43, 28, 'Rock lee has little eyebrows ? (true/false)', 'false'),
(44, 28, 'Orochimaru is can control a dog ?', 'false'),
(66, 41, 'Name of Anakin?', 'Skywalker'),
(67, 41, 'Yoda killed Darth Vador ? true/false', 'false'),
(68, 41, 'Obi-wan is yoda s master ? true/false', 'false');

-- --------------------------------------------------------

--
-- Structure de la table `statistics`
--

DROP TABLE IF EXISTS `statistics`;
CREATE TABLE IF NOT EXISTS `statistics` (
  `ID_user` int(11) NOT NULL,
  `current_point` int(11) NOT NULL DEFAULT 0,
  `nb_question` int(11) NOT NULL,
  `nb_answer` int(11) NOT NULL,
  PRIMARY KEY (`ID_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `statistics`
--

INSERT INTO `statistics` (`ID_user`, `current_point`, `nb_question`, `nb_answer`) VALUES
(1, 13, 4, 2),
(2, 0, 0, 0),
(4, 0, 0, 0),
(5, 1, 1, 0),
(6, 0, 0, 0),
(7, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `test`
--

DROP TABLE IF EXISTS `test`;
CREATE TABLE IF NOT EXISTS `test` (
  `ID_test` int(11) NOT NULL AUTO_INCREMENT,
  `ID_club` int(11) NOT NULL,
  `nb_question` varchar(45) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`ID_test`),
  KEY `fk_test_club1_idx` (`ID_club`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `test`
--

INSERT INTO `test` (`ID_test`, `ID_club`, `nb_question`) VALUES
(28, 9, '11'),
(41, 7, '3');

-- --------------------------------------------------------

--
-- Structure de la table `test_user`
--

DROP TABLE IF EXISTS `test_user`;
CREATE TABLE IF NOT EXISTS `test_user` (
  `ID_test_user` int(11) NOT NULL AUTO_INCREMENT,
  `ID_user` int(11) NOT NULL,
  `ID_test` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `success` tinyint(4) NOT NULL,
  `good_answer` double NOT NULL,
  `nb_attempt` int(11) NOT NULL,
  PRIMARY KEY (`ID_test_user`),
  KEY `fk_test_user_user1_idx` (`ID_user`),
  KEY `fk_test_user_test1_idx` (`ID_test`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `test_user`
--

INSERT INTO `test_user` (`ID_test_user`, `ID_user`, `ID_test`, `date`, `success`, `good_answer`, `nb_attempt`) VALUES
(12, 1, 28, '2020-05-10 11:21:55', 1, 10, 1),
(22, 1, 41, '2020-05-12 08:19:33', 1, 3, 1),
(23, 4, 41, '2020-05-12 08:21:34', 1, 3, 1),
(24, 5, 41, '2020-05-12 08:23:19', 1, 3, 1),
(25, 6, 41, '2020-05-12 08:24:52', 1, 3, 1),
(26, 6, 41, '2020-05-12 08:25:36', -1, 0, 2),
(27, 1, 41, '2020-05-17 13:13:01', 1, 3, 2);

-- --------------------------------------------------------

--
-- Structure de la table `type_message`
--

DROP TABLE IF EXISTS `type_message`;
CREATE TABLE IF NOT EXISTS `type_message` (
  `ID_type_message` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_bin NOT NULL,
  `point_given` int(11) NOT NULL,
  PRIMARY KEY (`ID_type_message`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `type_message`
--

INSERT INTO `type_message` (`ID_type_message`, `name`, `point_given`) VALUES
(1, 'question', 5),
(2, 'answer', 4);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `ID_user` int(11) NOT NULL AUTO_INCREMENT,
  `ID_user_type` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_bin NOT NULL,
  `surname` varchar(70) COLLATE utf8_bin NOT NULL,
  `username` varchar(45) COLLATE utf8_bin NOT NULL,
  `password` varchar(70) COLLATE utf8_bin NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(45) COLLATE utf8_bin NOT NULL,
  `registration_date` timestamp NULL DEFAULT NULL,
  `locked` tinyint(1) NOT NULL DEFAULT 0,
  `last_log` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ID_user`),
  KEY `fk_user_user_type_idx` (`ID_user_type`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`ID_user`, `ID_user_type`, `name`, `surname`, `username`, `password`, `password_hash`, `email`, `registration_date`, `locked`, `last_log`) VALUES
(1, 1, 'jojo', 'jojo', 'jojo', 'jojo', '576fd09766356857362a7a6383d428ebf91cd377', 'johan@gmail.com', '2020-05-24 16:53:18', -1, '2020-05-27 07:25:40'),
(2, 3, 'test', 'test', 'test', 'test', 'bdbf8f6b12ce91e9ae4547e456c27b2ac0c21497', 'test@gmail', '2020-05-17 16:36:13', -1, '2020-05-24 14:58:34'),
(4, 2, 'Phomsouvandara', 'jeffrey', 'jeffrey', 'jeffrey', 'ffc013104e144214c6a8478ae9dddfeedf3bcbd5', 'jeffrey@gmail.com', '2020-05-24 16:57:04', -1, '2020-05-24 14:47:20'),
(5, 3, 'Phomsouvandara', 'Steven', 'steven', 'steven', 'a157765140fb3d258dd747da80accb59e183030a', 'steven@gmail.com', '2020-05-24 16:48:03', -1, '2020-05-27 06:58:43'),
(6, 3, 'test2', 'test2', 'test2', 'test2', 'fd2bf662bed60843805475567faf5ccd584269a3', 'test2@gmail.com', '2020-05-17 16:36:13', -1, '2020-05-24 15:00:26'),
(7, 3, 'new', 'new', '+022252', 'new', '704653ca725a4efceb8a01b63410e38b66df2707', 'new@gmail.com', '2020-05-26 07:32:28', -1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `user_has_item`
--

DROP TABLE IF EXISTS `user_has_item`;
CREATE TABLE IF NOT EXISTS `user_has_item` (
  `ID_user` int(11) NOT NULL,
  `ID_item` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`ID_user`,`ID_item`),
  KEY `fk_user_has_item_item1_idx` (`ID_item`),
  KEY `fk_user_has_item_user1_idx` (`ID_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `user_has_item`
--

INSERT INTO `user_has_item` (`ID_user`, `ID_item`, `date`) VALUES
(1, 38, '2020-05-27 07:40:10'),
(1, 46, '2020-05-27 07:36:08'),
(4, 23, '2020-05-15 11:33:39'),
(4, 24, '2020-05-15 11:33:42'),
(4, 29, '2020-05-15 11:33:44'),
(4, 31, '2020-05-15 11:33:46'),
(4, 32, '2020-05-15 11:43:49'),
(4, 33, '2020-05-15 12:11:31'),
(4, 34, '2020-05-15 12:11:33'),
(4, 37, '2020-05-15 12:11:35'),
(4, 38, '2020-05-15 12:11:37'),
(4, 39, '2020-05-15 12:11:40'),
(4, 48, '2020-05-15 12:11:43'),
(5, 36, '2020-05-27 07:24:19');

-- --------------------------------------------------------

--
-- Structure de la table `user_type`
--

DROP TABLE IF EXISTS `user_type`;
CREATE TABLE IF NOT EXISTS `user_type` (
  `ID_user_type` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`ID_user_type`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `user_type`
--

INSERT INTO `user_type` (`ID_user_type`, `name`, `description`) VALUES
(1, 'administrator', 'administrator'),
(2, 'moderator', 'moderator'),
(3, 'registered_user', 'registered_user');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `club`
--
ALTER TABLE `club`
  ADD CONSTRAINT `fk_club_user1` FOREIGN KEY (`ID_creator_user`) REFERENCES `user` (`ID_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `club_member`
--
ALTER TABLE `club_member`
  ADD CONSTRAINT `fk_user_has_club_club1` FOREIGN KEY (`ID_club`) REFERENCES `club` (`ID_club`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_has_club_user1` FOREIGN KEY (`ID_user`) REFERENCES `user` (`ID_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `forum`
--
ALTER TABLE `forum`
  ADD CONSTRAINT `fk_forum_club1` FOREIGN KEY (`ID_club`) REFERENCES `club` (`ID_club`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_forum_user1` FOREIGN KEY (`ID_creator_user`) REFERENCES `user` (`ID_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `fk_item_club1` FOREIGN KEY (`ID_club`) REFERENCES `club` (`ID_club`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_item_user1` FOREIGN KEY (`ID_creator_user`) REFERENCES `user` (`ID_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `fk_message_forum1` FOREIGN KEY (`ID_forum`) REFERENCES `forum` (`ID_forum`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_message_type_message1` FOREIGN KEY (`ID_type_message`) REFERENCES `type_message` (`ID_type_message`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_message_user1` FOREIGN KEY (`ID_user`) REFERENCES `user` (`ID_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `question_answer`
--
ALTER TABLE `question_answer`
  ADD CONSTRAINT `fk_question_answer_test1` FOREIGN KEY (`ID_test`) REFERENCES `test` (`ID_test`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `statistics`
--
ALTER TABLE `statistics`
  ADD CONSTRAINT `fk_statistics_user1` FOREIGN KEY (`ID_user`) REFERENCES `user` (`ID_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `test`
--
ALTER TABLE `test`
  ADD CONSTRAINT `fk_test_club1` FOREIGN KEY (`ID_club`) REFERENCES `club` (`ID_club`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `test_user`
--
ALTER TABLE `test_user`
  ADD CONSTRAINT `fk_test_user_test1` FOREIGN KEY (`ID_test`) REFERENCES `test` (`ID_test`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_test_user_user1` FOREIGN KEY (`ID_user`) REFERENCES `user` (`ID_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_user_type` FOREIGN KEY (`ID_user_type`) REFERENCES `user_type` (`ID_user_type`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `user_has_item`
--
ALTER TABLE `user_has_item`
  ADD CONSTRAINT `fk_user_has_item_item1` FOREIGN KEY (`ID_item`) REFERENCES `item` (`ID_item`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_has_item_user1` FOREIGN KEY (`ID_user`) REFERENCES `user` (`ID_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
