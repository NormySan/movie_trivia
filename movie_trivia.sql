-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Värd: 127.0.0.1
-- Skapad: 13 nov 2013 kl 12:15
-- Serverversion: 5.5.32
-- PHP-version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databas: `movie_trivia`
--
CREATE DATABASE IF NOT EXISTS `movie_trivia` DEFAULT CHARACTER SET utf8 COLLATE utf8_swedish_ci;
USE `movie_trivia`;

-- --------------------------------------------------------

--
-- Tabellstruktur `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(254) COLLATE utf8_swedish_ci NOT NULL,
  `correct` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=5 ;

--
-- Dumpning av Data i tabell `answers`
--

INSERT INTO `answers` (`id`, `title`, `correct`) VALUES
(1, 'T1000 as played by Arnold Schwartzenegger', 1),
(3, 'Robert Deniro', 1),
(4, 'John Travolta', 1);

-- --------------------------------------------------------

--
-- Tabellstruktur `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(254) COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=8 ;

--
-- Dumpning av Data i tabell `categories`
--

INSERT INTO `categories` (`id`, `title`) VALUES
(1, 'Costume Drama'),
(2, 'Action'),
(3, 'Drama'),
(4, 'Comedy'),
(5, 'Horror'),
(6, 'Sci-Fi'),
(7, 'Fantasy');

-- --------------------------------------------------------

--
-- Tabellstruktur `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(254) COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=4 ;

--
-- Dumpning av Data i tabell `questions`
--

INSERT INTO `questions` (`id`, `title`) VALUES
(1, 'Which famous character said "I''ll be back".'),
(2, 'Who played the main character in Taxi Driver.'),
(3, 'Who played the male lead in Grease.');

-- --------------------------------------------------------

--
-- Tabellstruktur `questions_answers`
--

CREATE TABLE IF NOT EXISTS `questions_answers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NOT NULL,
  `answer_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=4 ;

--
-- Dumpning av Data i tabell `questions_answers`
--

INSERT INTO `questions_answers` (`id`, `question_id`, `answer_id`) VALUES
(1, 1, 1),
(2, 2, 3),
(3, 3, 4);

-- --------------------------------------------------------

--
-- Tabellstruktur `question_categories`
--

CREATE TABLE IF NOT EXISTS `question_categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=4 ;

--
-- Dumpning av Data i tabell `question_categories`
--

INSERT INTO `question_categories` (`id`, `category_id`, `question_id`) VALUES
(1, 2, 1),
(2, 3, 2),
(3, 2, 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
