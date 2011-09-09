-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 28, 2011 at 07:42 PM
-- Server version: 5.5.9
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sharkDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `discuss`
--

CREATE TABLE `discuss` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `comment` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `discuss`
--

INSERT INTO `discuss` VALUES(1, 'Kelley Wollman', 'This is a practice comment.');
INSERT INTO `discuss` VALUES(2, 'Sharky', 'Here is another.');
INSERT INTO `discuss` VALUES(3, 'Doug', 'I''m a frat boy. I hope I get eaten by a shark soon!');
INSERT INTO `discuss` VALUES(19, 'kanye', 'yoohooyoohooyoohooyoohooyoohooyoohooyoohooyoohooyoohooyoohooyoohooyoohooyoohooyoohooyoohoo');
INSERT INTO `discuss` VALUES(20, 'frrr', 'yoohooyoohooyoohooyoohooyoohooyoohooyoohooyoohooyoohooyoohooyoohooyoohooyoohooyoohooyoohooyoohooyoohooyoohooyoohooyoohooyoohooyoohooyoohooyoohooyoohooyoohooyoohooyoohooyoohooyoohooyoohooyoohooyoohooyo');
