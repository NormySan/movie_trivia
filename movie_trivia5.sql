-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 09, 2014 at 10:18 
-- Server version: 5.5.31
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `movie_trivia`
--
CREATE DATABASE IF NOT EXISTS `movie_trivia` DEFAULT CHARACTER SET utf8 COLLATE utf8_swedish_ci;
USE `movie_trivia`;

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

DROP TABLE IF EXISTS `answers`;
CREATE TABLE IF NOT EXISTS `answers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NOT NULL,
  `title` varchar(254) COLLATE utf8_swedish_ci NOT NULL,
  `correct` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `question_id`, `title`, `correct`) VALUES
(1, 1, 'T1000 as played by Arnold Schwartzenegger', 1),
(2, 2, 'Will Smith', 0),
(3, 2, 'Robert Deniro', 1),
(4, 3, 'John Travolta', 1),
(5, 1, 'Sonny the robot in I, Robot.', 0),
(6, 2, 'Johnny Depp', 0),
(7, 3, 'Tom Cruise', 0),
(8, 1, 'Robbie Williams', 0),
(10, 2, 'Mikael Persbrant', 0),
(14, 1, 'Benjamin Berglund', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(254) COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`) VALUES
(1, 'Costume Drama'),
(2, 'Action'),
(3, 'Drama'),
(4, 'Comedy'),
(5, 'Horror'),
(6, 'Sci-Fi'),
(7, 'Fantasy'),
(8, 'Anime');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `title` varchar(254) COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `category_id`, `title`) VALUES
(1, 2, 'Which famous character said "I''ll be back".'),
(2, 3, 'Who played the main character in Taxi Driver.'),
(3, 2, 'Who played the male lead in Grease.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) COLLATE utf8_swedish_ci DEFAULT NULL,
  `password` varchar(25) COLLATE utf8_swedish_ci NOT NULL,
  `highscore` int(10) NOT NULL,
  `userlevel` int(1) DEFAULT NULL,
  `lastlogin` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=104 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `password`, `highscore`, `userlevel`, `lastlogin`) VALUES
(1, 'admin', 'admin', 123456654, 1, '0000-00-00 00:00:00'),
(2, 'loura', 'loura', 118423, 2, '2014-01-09 08:54:32'),
(3, 'loura', 'loura', 31690, 2, '2014-01-09 08:58:33'),
(4, 'arica', 'arica', 122614, 2, '2014-01-09 08:58:33'),
(5, 'lavonia', 'lavonia', 12675, 2, '2014-01-09 08:58:33'),
(6, 'christopher', 'christopher', 117418, 2, '2014-01-09 08:58:33'),
(7, 'shay', 'shay', 24693, 2, '2014-01-09 08:58:33'),
(8, 'shavonne', 'shavonne', 62897, 2, '2014-01-09 08:58:33'),
(9, 'maria', 'maria', 140964, 2, '2014-01-09 08:58:33'),
(10, 'reynaldo', 'reynaldo', 105400, 2, '2014-01-09 08:58:33'),
(11, 'berenice', 'berenice', 30407, 2, '2014-01-09 08:58:33'),
(12, 'cris', 'cris', 64677, 2, '2014-01-09 08:58:33'),
(13, 'digna', 'digna', 139896, 2, '2014-01-09 08:58:33'),
(14, 'elenora', 'elenora', 102839, 2, '2014-01-09 08:58:33'),
(15, 'shakita', 'shakita', 19869, 2, '2014-01-09 08:58:33'),
(16, 'bernie', 'bernie', 29724, 2, '2014-01-09 08:58:33'),
(17, 'keesha', 'keesha', 16952, 2, '2014-01-09 08:58:33'),
(18, 'evette', 'evette', 148857, 2, '2014-01-09 08:58:33'),
(19, 'loriann', 'loriann', 32536, 2, '2014-01-09 08:58:33'),
(20, 'shawanda', 'shawanda', 107220, 2, '2014-01-09 08:58:33'),
(21, 'myriam', 'myriam', 110963, 2, '2014-01-09 08:58:33'),
(22, 'fae', 'fae', 46385, 2, '2014-01-09 08:58:33'),
(23, 'rosalba', 'rosalba', 131948, 2, '2014-01-09 08:58:33'),
(24, 'anton', 'anton', 19180, 2, '2014-01-09 08:58:33'),
(25, 'rodrick', 'rodrick', 30497, 2, '2014-01-09 08:58:33'),
(26, 'kyla', 'kyla', 148759, 2, '2014-01-09 08:58:33'),
(27, 'raul', 'raul', 93413, 2, '2014-01-09 08:58:33'),
(28, 'belle', 'belle', 62856, 2, '2014-01-09 08:58:33'),
(29, 'trudi', 'trudi', 126151, 2, '2014-01-09 08:58:33'),
(30, 'myrtis', 'myrtis', 121774, 2, '2014-01-09 08:58:33'),
(31, 'julienne', 'julienne', 49477, 2, '2014-01-09 08:58:33'),
(32, 'marcelle', 'marcelle', 47275, 2, '2014-01-09 08:58:33'),
(33, 'eduardo', 'eduardo', 95126, 2, '2014-01-09 08:58:33'),
(34, 'carlton', 'carlton', 71168, 2, '2014-01-09 08:58:33'),
(35, 'natosha', 'natosha', 19889, 2, '2014-01-09 08:58:33'),
(36, 'basilia', 'basilia', 97801, 2, '2014-01-09 08:58:33'),
(37, 'morris', 'morris', 38585, 2, '2014-01-09 08:58:33'),
(38, 'rosario', 'rosario', 34582, 2, '2014-01-09 08:58:33'),
(39, 'evonne', 'evonne', 10697, 2, '2014-01-09 08:58:33'),
(40, 'cheree', 'cheree', 29549, 2, '2014-01-09 08:58:33'),
(41, 'stephnie', 'stephnie', 129983, 2, '2014-01-09 08:58:33'),
(42, 'petronila', 'petronila', 31104, 2, '2014-01-09 08:58:33'),
(43, 'hailey', 'hailey', 84226, 2, '2014-01-09 08:58:33'),
(44, 'keli', 'keli', 119878, 2, '2014-01-09 08:58:33'),
(45, 'abel', 'abel', 123944, 2, '2014-01-09 08:58:33'),
(46, 'danilo', 'danilo', 94096, 2, '2014-01-09 08:58:33'),
(47, 'dwana', 'dwana', 139603, 2, '2014-01-09 08:58:33'),
(48, 'marjo', 'marjo', 130897, 2, '2014-01-09 08:58:33'),
(49, 'ie', 'ie', 92952, 2, '2014-01-09 08:58:33'),
(50, 'ardith', 'ardith', 22139, 2, '2014-01-09 08:58:33'),
(51, 'margherita', 'margherita', 88116, 2, '2014-01-09 08:58:33'),
(52, 'tamica', 'tamica', 53915, 2, '2014-01-09 08:58:33'),
(53, 'janiece', 'janiece', 58524, 2, '2014-01-09 08:58:33'),
(54, 'gale', 'gale', 70063, 2, '2014-01-09 08:58:33'),
(55, 'delia', 'delia', 63095, 2, '2014-01-09 08:58:33'),
(56, 'evette', 'evette', 79021, 2, '2014-01-09 08:58:33'),
(57, 'sunday', 'sunday', 68822, 2, '2014-01-09 08:58:33'),
(58, 'emmaline', 'emmaline', 146509, 2, '2014-01-09 08:58:33'),
(59, 'maudie', 'maudie', 131878, 2, '2014-01-09 08:58:33'),
(60, 'donya', 'donya', 44972, 2, '2014-01-09 08:58:33'),
(61, 'modesto', 'modesto', 118282, 2, '2014-01-09 08:58:33'),
(62, 'carl', 'carl', 31355, 2, '2014-01-09 08:58:33'),
(63, 'hilde', 'hilde', 82248, 2, '2014-01-09 08:58:33'),
(64, 'golden', 'golden', 63407, 2, '2014-01-09 08:58:33'),
(65, 'felice', 'felice', 92523, 2, '2014-01-09 08:58:33'),
(66, 'darci', 'darci', 92137, 2, '2014-01-09 08:58:33'),
(67, 'temple', 'temple', 11208, 2, '2014-01-09 08:58:33'),
(68, 'ping', 'ping', 121109, 2, '2014-01-09 08:58:33'),
(69, 'ula', 'ula', 116719, 2, '2014-01-09 08:58:33'),
(70, 'sabina', 'sabina', 11905, 2, '2014-01-09 08:58:33'),
(71, 'aliza', 'aliza', 140658, 2, '2014-01-09 08:58:33'),
(72, 'breann', 'breann', 96702, 2, '2014-01-09 08:58:33'),
(73, 'terina', 'terina', 33010, 2, '2014-01-09 08:58:33'),
(74, 'keenan', 'keenan', 74884, 2, '2014-01-09 08:58:33'),
(75, 'madge', 'madge', 66579, 2, '2014-01-09 08:58:33'),
(76, 'kary', 'kary', 146955, 2, '2014-01-09 08:58:33'),
(77, 'pennie', 'pennie', 18979, 2, '2014-01-09 08:58:33'),
(78, 'kathlene', 'kathlene', 56181, 2, '2014-01-09 08:58:33'),
(79, 'golda', 'golda', 127851, 2, '2014-01-09 08:58:33'),
(80, 'rayford', 'rayford', 101932, 2, '2014-01-09 08:58:33'),
(81, 'tiara', 'tiara', 68321, 2, '2014-01-09 08:58:33'),
(82, 'leandra', 'leandra', 65967, 2, '2014-01-09 08:58:33'),
(83, 'tiny', 'tiny', 145847, 2, '2014-01-09 08:58:33'),
(84, 'angelia', 'angelia', 116845, 2, '2014-01-09 08:58:33'),
(85, 'latasha', 'latasha', 126031, 2, '2014-01-09 08:58:33'),
(86, 'moshe', 'moshe', 58941, 2, '2014-01-09 08:58:33'),
(87, 'carlena', 'carlena', 45866, 2, '2014-01-09 08:58:33'),
(88, 'weldon', 'weldon', 44852, 2, '2014-01-09 08:58:33'),
(89, 'al', 'al', 55449, 2, '2014-01-09 08:58:33'),
(90, 'myrtis', 'myrtis', 27744, 2, '2014-01-09 08:58:33'),
(91, 'trinidad', 'trinidad', 79825, 2, '2014-01-09 08:58:33'),
(92, 'ivory', 'ivory', 23730, 2, '2014-01-09 08:58:33'),
(93, 'keiko', 'keiko', 49099, 2, '2014-01-09 08:58:33'),
(94, 'hector', 'hector', 12073, 2, '2014-01-09 08:58:33'),
(95, 'imogene', 'imogene', 77138, 2, '2014-01-09 08:58:33'),
(96, 'danyelle', 'danyelle', 131623, 2, '2014-01-09 08:58:33'),
(97, 'shalanda', 'shalanda', 94210, 2, '2014-01-09 08:58:33'),
(98, 'lurline', 'lurline', 78347, 2, '2014-01-09 08:58:33'),
(99, 'twyla', 'twyla', 102731, 2, '2014-01-09 08:58:33'),
(100, 'janetta', 'janetta', 60929, 2, '2014-01-09 08:58:33'),
(101, 'angelique', 'angelique', 80252, 2, '2014-01-09 08:58:33'),
(102, 'rueben', 'rueben', 93389, 2, '2014-01-09 08:58:33'),
(103, 'larae', 'larae', 147631, 2, '2014-01-09 08:58:33');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
