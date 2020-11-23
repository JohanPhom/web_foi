-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 15 Juin 2020 à 13:14
-- Version du serveur :  5.5.62-0+deb8u1
-- Version de PHP :  7.2.25-1+0~20191128.32+debian8~1.gbp108445

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `WebDiP2019x100`
--

-- --------------------------------------------------------

--
-- Structure de la table `club`
--

CREATE TABLE `club` (
  `ID_club` int(11) NOT NULL,
  `ID_creator_user` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `nb_member` int(11) NOT NULL DEFAULT '1',
  `nb_item` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `author` varchar(45) COLLATE utf8_bin NOT NULL,
  `image` text COLLATE utf8_bin,
  `image_title` text COLLATE utf8_bin,
  `promote` int(11) NOT NULL DEFAULT '30'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `club`
--

INSERT INTO `club` (`ID_club`, `ID_creator_user`, `name`, `description`, `nb_member`, `nb_item`, `date_created`, `author`, `image`, `image_title`, `promote`) VALUES
(7, 1, 'Star Wars', 'Star Wars is a science-fiction franchise comprising movies, books, comics, video games, toys, and animated shows. It is a fictional universe created by George Lucas.', 4, 0, '2020-06-15 10:39:17', 'George Lucas', 'starwars.jpg', 'starwarsTitle.png', 30),
(8, 1, 'Dragon Ball Z', 'Story. Dragon Ball Z follows the adventures of the adult Goku who, along with his companions, defends the earth against an assortment of villains ranging from intergalactic space fighters and conquerors, unnaturally powerful androids and near indestructible magical creatures', 1, 5, '2020-06-14 22:26:44', 'Akira Toriyama', 'dragonball.jpg', 'dragonBallTitle.png', 30),
(9, 1, 'Naruto', 'Naruto is a Japanese manga series written and illustrated by Masashi Kishimoto. It tells the story of Naruto Uzumaki, a young ninja who seeks to gain recognition from his peers and also dreams of becoming the Hokage, the leader of his village.', 2, 0, '2020-06-14 22:26:21', 'Masashi Kishimoto', 'naruto.png', 'narutoTitle.png', 30),
(10, 1, 'One piece', 'One Piece is a manga and anime series created by Eiichiro Oda. It is the story of the Strawhat Pirates, led by captain Monkey D. Luffy, on their adventures in Grand Line. The main theme is Monkey D.', 1, 0, '2020-06-14 22:24:46', 'Eiichirō Oda', 'onepiece.jpg', 'onepieceTitle.png', 30),
(12, 1, 'Avengers', 'Avengers. Earth s Mightiest Heroes stand as the planet s first line of defense against the most powerful threats in the universe. The Avengers began as a group of extraordinary individuals who were assembled to defeat Loki and his Chitauri army in New York City.', 4, 0, '2020-06-14 22:26:21', 'Stan Lee', 'avengers.jpg', 'avengersTitle.png', 30),
(13, 1, 'Harry Potter', 'Throughout the series, Harry is described as having his father s perpetually untidy black hair, his mother s bright green eyes, and a lightning bolt-shaped scar on his forehead. He is further described as "small and skinny for his age" with "a thin face" and "knobbly knees", and he wears round eyeglasses.', 1, 0, '2020-06-14 22:26:21', 'J. K. Rowling', 'harrypotter.jpg', 'harrypotterTitle.png', 30),
(15, 1, 'Black Mirror', 'Black Mirror s is a British television anthology series created by Charlie Brooker that features speculative fiction with dark and sometimes satirical themes that examine modern society, particularly with regard to the unanticipated consequences of new technologies.', 1, 0, '2020-06-14 22:26:21', 'Charlie Brooker', 'blackmiror.jpg', 'blackmirrorTitle.png', 30),
(24, 1, 'Game of throne', 'Game of Thrones is roughly based on the storylines of A Song of Ice and Fire, set in the fictional Seven Kingdoms of Westeros and the continent of Essos. The series chronicles the violent dynastic struggles among the realm s noble families for the Iron Throne, while other families fight for independence from it.', 2, 7, '2020-06-15 10:47:40', 'George R. R. Martin', 'GOT.jpg', 'GOTTitle.png', 3);

-- --------------------------------------------------------

--
-- Structure de la table `club_member`
--

CREATE TABLE `club_member` (
  `ID_user` int(11) NOT NULL,
  `ID_club` int(11) NOT NULL,
  `moderator` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `club_member`
--

INSERT INTO `club_member` (`ID_user`, `ID_club`, `moderator`) VALUES
(1, 7, 1),
(1, 8, 1),
(1, 9, 1),
(1, 10, 1),
(1, 12, 1),
(1, 13, 1),
(1, 15, 1),
(1, 24, 1),
(4, 7, -1),
(4, 9, -1),
(5, 7, -1),
(96, 7, -1),
(96, 24, -1);

-- --------------------------------------------------------

--
-- Structure de la table `forum`
--

CREATE TABLE `forum` (
  `ID_forum` int(11) NOT NULL,
  `ID_club` int(11) NOT NULL,
  `ID_creator_user` int(11) NOT NULL,
  `number_answer` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `forum`
--

INSERT INTO `forum` (`ID_forum`, `ID_club`, `ID_creator_user`, `number_answer`) VALUES
(37, 7, 4, 3),
(39, 9, 4, 2),
(40, 9, 1, 1),
(50, 24, 96, 2);

-- --------------------------------------------------------

--
-- Structure de la table `item`
--

CREATE TABLE `item` (
  `ID_item` int(11) NOT NULL,
  `ID_creator_user` int(11) NOT NULL,
  `ID_club` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` longtext COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `item`
--

INSERT INTO `item` (`ID_item`, `ID_creator_user`, `ID_club`, `name`, `description`, `price`, `quantity`, `image`) VALUES
(23, 1, 8, 'Markos', 'ddd', 57575, 57855, 'dragon_item1.jpg'),
(24, 1, 8, 'fggrg', 'gtdgtgtg', 577, 75757, 'dragon_item2.jpg'),
(30, 1, 8, 'Game of Throne', '8joihu', 55, 54, 'gmail.png'),
(31, 1, 8, 'Game of Throne', '8joihu', 55, 55, 'gmail.png'),
(32, 1, 8, 'Game of Throne', '8joihu', 55, 55, 'gmail.png'),
(56, 1, 24, 'Item1', 'item1 ', 3, 10, 'GotItem6.jpg'),
(57, 1, 24, 'Item2', 'item2 ', 3, 10, 'GotItem1.jpg'),
(58, 1, 24, 'item3', 'item3 ', 5, 5, 'GotItem2.jpg'),
(59, 1, 24, 'item4', 'item4 ', 8, 6, 'GotItem3.jpg'),
(60, 1, 24, 'item 6', 'item 6 ', 5, 8, 'GotItem4.jpg'),
(61, 1, 24, 'item 8', 'item 8 ', 4, 6, 'GotItem8.jpg'),
(62, 1, 24, 'goodie', 'goodie ', 3, 15, 'GotItem7.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `ID_message` int(11) NOT NULL,
  `ID_user` int(11) NOT NULL,
  `ID_type_message` int(11) NOT NULL,
  `ID_forum` int(11) NOT NULL,
  `text_message` text COLLATE utf8_bin NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `best_answer` tinyint(1) NOT NULL DEFAULT '-1',
  `path_image` text COLLATE utf8_bin NOT NULL,
  `terms` int(11) NOT NULL DEFAULT '-1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `message`
--

INSERT INTO `message` (`ID_message`, `ID_user`, `ID_type_message`, `ID_forum`, `text_message`, `date`, `best_answer`, `path_image`, `terms`) VALUES
(118, 4, 1, 37, 'Who is the best jedi to you ?', '2020-06-14 16:27:28', 1, '', -1),
(119, 1, 2, 37, 'I would say that it s Luke Skywalker', '2020-06-14 16:26:58', -1, '', -1),
(120, 1, 2, 37, 'But i m not sure about that', '2020-06-14 18:27:14', -1, 'starwarsTitle.png', 1),
(121, 1, 2, 37, 'This is the best answer', '2020-06-14 16:27:28', 1, '', -1),
(124, 4, 1, 39, 'How many item do we have to buy to become moderator of the club ?', '2020-06-14 16:45:06', -1, '', -1),
(125, 1, 1, 40, 'I do have a question about Naruto. Do you think this is from a real story ?', '2020-06-14 22:04:56', -1, '', -1),
(126, 1, 2, 40, 'You need to have at least 10 items, i just updated the value', '2020-06-14 22:04:56', -1, '', -1),
(127, 1, 2, 39, 'You must have at least 3 items', '2020-06-14 16:45:06', -1, '', -1),
(128, 1, 2, 39, 'But i might change this number', '2020-06-14 18:45:16', -1, '', -1),
(140, 96, 1, 50, 'I have a question regarding the items, how do we buy them ?', '2020-06-15 10:49:27', -1, '', -1),
(141, 1, 2, 50, 'You can buy them by earning some points asking question and answering to other s questions', '2020-06-15 10:49:27', -1, '', -1),
(142, 96, 2, 50, 'Ok thank you for your answer', '2020-06-15 10:49:12', -1, 'valid.png', 1);

-- --------------------------------------------------------

--
-- Structure de la table `question_answer`
--

CREATE TABLE `question_answer` (
  `ID_question` int(11) NOT NULL,
  `ID_test` int(11) NOT NULL,
  `question` text COLLATE utf8_bin NOT NULL,
  `answer` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `question_answer`
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
(76, 48, 'in which episode Luke lost his hand ? (just number)', '5'),
(77, 48, 'Lord sith are always 3 ? (true/false)', 'false'),
(78, 48, 'What command by Emperor Palpatine brought down the Jedi? (number)', '66'),
(79, 48, 'Which ice planet is featured in The Empire Strikes Back?', 'Hoth'),
(80, 48, 'Who killed Mace Windu? You have to write "Darth ..."', 'Darth sidious'),
(81, 48, 'Write correctly the sentense : "May the ..."', 'may the force be with you'),
(82, 48, 'Finn s number is : FN-2175 (true/false)', 'false'),
(83, 48, 'Luke killed the emperor (true/false)', 'false'),
(84, 48, 'Luke did cremation to his fathers s body ? (true/false)', 'true'),
(85, 49, 'Iron man s name is Tony Stark ? (true/false)', 'true'),
(86, 49, '	 Thor is human (true/false)', 'false'),
(87, 49, 'Hulk is green (true/false)', 'true'),
(88, 49, 'How many gardian of the galaxy are they ?', '5'),
(89, 49, 'How many infinity stones are they ?', '6'),
(90, 49, 'The Thor s hamer is called mjolnir or excalibur ?', 'mjolnir'),
(91, 49, 'What is the relation between Thor and Loki ? (singular)', 'brother'),
(92, 49, 'Who created the avengers ? (name surname)', 'Nick Fury'),
(93, 49, 'Iron man has killed Ultron ? (true/false)', 'false'),
(94, 49, 'What do the avengers eat at the end of the first movie ?', 'Shawama'),
(96, 51, 'enter 1', '1'),
(97, 51, 'enter 2', '2'),
(98, 51, 'enter 3', '3');

-- --------------------------------------------------------

--
-- Structure de la table `setting`
--

CREATE TABLE `setting` (
  `pagination` int(11) NOT NULL DEFAULT '7',
  `cookie_duration` int(11) NOT NULL DEFAULT '2',
  `valid_email` int(11) NOT NULL DEFAULT '7',
  `log_time` int(11) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `setting`
--

INSERT INTO `setting` (`pagination`, `cookie_duration`, `valid_email`, `log_time`) VALUES
(3, 2, 7, 10);

-- --------------------------------------------------------

--
-- Structure de la table `statistics`
--

CREATE TABLE `statistics` (
  `ID_user` int(11) NOT NULL,
  `current_point` int(11) NOT NULL DEFAULT '0',
  `nb_question` int(11) NOT NULL,
  `nb_answer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `statistics`
--

INSERT INTO `statistics` (`ID_user`, `current_point`, `nb_question`, `nb_answer`) VALUES
(1, 42, 2, 8),
(4, 19, 3, 1),
(5, 0, 0, 0),
(6, 11, 7, 2),
(96, 9, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `test`
--

CREATE TABLE `test` (
  `ID_test` int(11) NOT NULL,
  `ID_club` int(11) NOT NULL,
  `nb_question` varchar(45) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `test`
--

INSERT INTO `test` (`ID_test`, `ID_club`, `nb_question`) VALUES
(28, 9, '11'),
(48, 7, '10'),
(49, 12, '10'),
(51, 24, '3');

-- --------------------------------------------------------

--
-- Structure de la table `test_user`
--

CREATE TABLE `test_user` (
  `ID_test_user` int(11) NOT NULL,
  `ID_user` int(11) NOT NULL,
  `ID_test` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `success` tinyint(4) NOT NULL,
  `good_answer` double NOT NULL,
  `nb_attempt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `test_user`
--

INSERT INTO `test_user` (`ID_test_user`, `ID_user`, `ID_test`, `date`, `success`, `good_answer`, `nb_attempt`) VALUES
(12, 1, 28, '2020-05-10 11:21:55', 1, 10, 1),
(38, 4, 28, '2020-06-14 18:29:29', 1, 11, 1),
(40, 6, 49, '2020-06-14 22:29:55', -1, 0, 1),
(41, 6, 49, '2020-06-14 22:30:02', -1, 0, 2),
(42, 6, 49, '2020-06-14 22:30:51', -1, 4, 3),
(43, 96, 48, '2020-06-15 10:39:17', 1, 7, 1),
(44, 96, 51, '2020-06-15 10:47:34', -1, 0, 1),
(45, 96, 51, '2020-06-15 10:47:40', 1, 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `type_message`
--

CREATE TABLE `type_message` (
  `ID_type_message` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_bin NOT NULL,
  `point_given` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `type_message`
--

INSERT INTO `type_message` (`ID_type_message`, `name`, `point_given`) VALUES
(1, 'question', 5),
(2, 'answer', 4);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `ID_user` int(11) NOT NULL,
  `ID_user_type` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_bin NOT NULL,
  `surname` varchar(70) COLLATE utf8_bin NOT NULL,
  `username` varchar(45) COLLATE utf8_bin NOT NULL,
  `password` varchar(70) COLLATE utf8_bin NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(45) COLLATE utf8_bin NOT NULL,
  `genre` varchar(11) COLLATE utf8_bin NOT NULL,
  `phone` text COLLATE utf8_bin NOT NULL,
  `registration_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `locked` tinyint(1) NOT NULL DEFAULT '0',
  `last_log` timestamp NULL DEFAULT NULL,
  `code` varchar(11) COLLATE utf8_bin NOT NULL,
  `date_code` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`ID_user`, `ID_user_type`, `name`, `surname`, `username`, `password`, `password_hash`, `email`, `genre`, `phone`, `registration_date`, `locked`, `last_log`, `code`, `date_code`) VALUES
(1, 1, 'jojo', 'jojo', 'jojo', 'jojo', '576fd09766356857362a7a6383d428ebf91cd377', 'johan@gmail.com', '0', '123456', '2020-05-24 16:53:18', -1, '2020-06-15 10:56:46', '0', NULL),
(4, 2, 'Phomsouvandara', 'jeffrey', 'jeffrey', 'jeffrey', 'ffc013104e144214c6a8478ae9dddfeedf3bcbd5', 'jeffrey@gmail.com', '0', '', '2020-05-24 16:57:04', -1, '2020-06-15 10:29:04', '0', NULL),
(5, 3, 'Phomsouvandara', 'Steven', 'steven', 'steven', 'a157765140fb3d258dd747da80accb59e183030a', 'steven@gmail.com', '0', '', '2020-05-24 16:48:03', -1, '2020-06-13 12:17:06', '0', NULL),
(6, 3, 'test2', 'test2', 'test2', 'test2', 'fd2bf662bed60843805475567faf5ccd584269a3', 'test2@gmail.com', '0', '', '2020-05-17 16:36:13', -1, '2020-06-14 22:17:29', '0', NULL),
(96, 3, 'web', 'web', 'web', 'web', 'fd31e14c8bf3e706d4551614c062b6abcc6a9bb0', 'jphomsouv@foi.hr', 'male', '0604', '2020-06-15 10:18:01', -1, '2020-06-15 10:46:31', '0', '2020-06-15 17:18:01');

-- --------------------------------------------------------

--
-- Structure de la table `user_has_item`
--

CREATE TABLE `user_has_item` (
  `ID_user` int(11) NOT NULL,
  `ID_item` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `user_has_item`
--

INSERT INTO `user_has_item` (`ID_user`, `ID_item`, `date`) VALUES
(4, 23, '2020-05-15 11:33:39'),
(4, 24, '2020-05-15 11:33:42'),
(4, 31, '2020-05-15 11:33:46'),
(4, 32, '2020-05-15 11:43:49');

-- --------------------------------------------------------

--
-- Structure de la table `user_type`
--

CREATE TABLE `user_type` (
  `ID_user_type` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `user_type`
--

INSERT INTO `user_type` (`ID_user_type`, `name`, `description`) VALUES
(1, 'administrator', 'administrator'),
(2, 'moderator', 'moderator'),
(3, 'registered_user', 'registered_user'),
(4, 'unregistered', 'Unregistered user');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `club`
--
ALTER TABLE `club`
  ADD PRIMARY KEY (`ID_club`),
  ADD KEY `fk_club_user1_idx` (`ID_creator_user`);

--
-- Index pour la table `club_member`
--
ALTER TABLE `club_member`
  ADD PRIMARY KEY (`ID_user`,`ID_club`),
  ADD KEY `fk_user_has_club_club1_idx` (`ID_club`),
  ADD KEY `fk_user_has_club_user1_idx` (`ID_user`);

--
-- Index pour la table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`ID_forum`),
  ADD KEY `fk_forum_user1_idx` (`ID_creator_user`),
  ADD KEY `fk_forum_club1_idx` (`ID_club`);

--
-- Index pour la table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`ID_item`),
  ADD KEY `fk_item_user1_idx` (`ID_creator_user`),
  ADD KEY `fk_item_club1_idx` (`ID_club`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`ID_message`),
  ADD KEY `fk_message_user1_idx` (`ID_user`),
  ADD KEY `fk_message_type_message1_idx` (`ID_type_message`),
  ADD KEY `fk_message_forum1_idx` (`ID_forum`);

--
-- Index pour la table `question_answer`
--
ALTER TABLE `question_answer`
  ADD PRIMARY KEY (`ID_question`),
  ADD KEY `fk_question_answer_test1_idx` (`ID_test`);

--
-- Index pour la table `statistics`
--
ALTER TABLE `statistics`
  ADD PRIMARY KEY (`ID_user`);

--
-- Index pour la table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`ID_test`),
  ADD KEY `fk_test_club1_idx` (`ID_club`);

--
-- Index pour la table `test_user`
--
ALTER TABLE `test_user`
  ADD PRIMARY KEY (`ID_test_user`),
  ADD KEY `fk_test_user_user1_idx` (`ID_user`),
  ADD KEY `fk_test_user_test1_idx` (`ID_test`);

--
-- Index pour la table `type_message`
--
ALTER TABLE `type_message`
  ADD PRIMARY KEY (`ID_type_message`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_user`),
  ADD KEY `fk_user_user_type_idx` (`ID_user_type`);

--
-- Index pour la table `user_has_item`
--
ALTER TABLE `user_has_item`
  ADD PRIMARY KEY (`ID_user`,`ID_item`),
  ADD KEY `fk_user_has_item_item1_idx` (`ID_item`),
  ADD KEY `fk_user_has_item_user1_idx` (`ID_user`);

--
-- Index pour la table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`ID_user_type`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `club`
--
ALTER TABLE `club`
  MODIFY `ID_club` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT pour la table `forum`
--
ALTER TABLE `forum`
  MODIFY `ID_forum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT pour la table `item`
--
ALTER TABLE `item`
  MODIFY `ID_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `ID_message` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;
--
-- AUTO_INCREMENT pour la table `question_answer`
--
ALTER TABLE `question_answer`
  MODIFY `ID_question` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;
--
-- AUTO_INCREMENT pour la table `test`
--
ALTER TABLE `test`
  MODIFY `ID_test` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT pour la table `test_user`
--
ALTER TABLE `test_user`
  MODIFY `ID_test_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT pour la table `type_message`
--
ALTER TABLE `type_message`
  MODIFY `ID_type_message` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `ID_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
--
-- AUTO_INCREMENT pour la table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `ID_user_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Contraintes pour les tables exportées
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
