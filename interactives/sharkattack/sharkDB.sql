-- phpMyAdmin SQL Dump
-- version 3.2.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 02, 2011 at 11:49 AM
-- Server version: 5.1.44
-- PHP Version: 5.3.2

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
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `a_title` varchar(5) NOT NULL,
  `a_text` varchar(140) NOT NULL,
  `a_points` int(11) NOT NULL,
  `question_id` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` VALUES(1, 'A. ', 'Play dead and hope it leaves you alone.', 0, '1');
INSERT INTO `answers` VALUES(2, 'B.', 'Keep your eye on the shark as you swim cautiously for the shore.', 1, '1');
INSERT INTO `answers` VALUES(3, 'C.', 'Flail your arms wildly and scream for help.', 0, '1');
INSERT INTO `answers` VALUES(4, 'A.', 'Take a deep breath, relax and let the salt water wash out the wound.', 0, '2');
INSERT INTO `answers` VALUES(5, 'B.', 'Pass out from relief and hope that someone finds you soon.', 0, '2');
INSERT INTO `answers` VALUES(6, 'C.', 'Get the *$!%^ out of the water and find a way to stop the bleeding. ', 1, '2');
INSERT INTO `answers` VALUES(7, 'A.', 'Claw at its eyes and gills until it backs off long enough for you to exit the water.', 1, '3');
INSERT INTO `answers` VALUES(8, 'B.', 'Play dead.', 0, '3');
INSERT INTO `answers` VALUES(9, 'C.', 'Grab onto its top fin and squeeze until it lets you go.', 0, '3');
INSERT INTO `answers` VALUES(10, 'A.', 'Aggressively attack the shark before he attacks you.', 0, '4');
INSERT INTO `answers` VALUES(11, 'B.', 'Stay extremely still and pray that the shark thinks you are part of the reef.', 0, '4');
INSERT INTO `answers` VALUES(12, 'C.', 'Calmly reposition yourself to a place where the shark might not feel threatened that you are blocking its path to safety.', 1, '4');
INSERT INTO `answers` VALUES(13, 'A.', 'You do not want to be left out, so you join them but decide to stay only in the shallow area.', 0, '5');
INSERT INTO `answers` VALUES(14, 'B.', 'You decline and explain to your friends that sharks pose a higher threat during this time. How about Monopoly instead?', 1, '5');
INSERT INTO `answers` VALUES(15, 'C.', 'Being drunk as well, you rip your clothes off and race your friends into the ocean.', 0, '5');

-- --------------------------------------------------------

--
-- Table structure for table `discuss`
--

CREATE TABLE `discuss` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `comment` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `discuss`
--

INSERT INTO `discuss` VALUES(1, 'Kelley Wollman', 'This is a practice comment.');
INSERT INTO `discuss` VALUES(2, 'Sharky', 'Here is another.');
INSERT INTO `discuss` VALUES(3, 'Doug', 'I''m a frat boy. I hope I get eaten by a shark soon!');
INSERT INTO `discuss` VALUES(40, 'Rodarte', 'I like tuna.');
INSERT INTO `discuss` VALUES(49, 'asdads', 'asdasd');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(75) NOT NULL,
  `q_text` varchar(350) NOT NULL,
  `q_answerA` varchar(10) NOT NULL,
  `q_answerB` varchar(15) NOT NULL,
  `q_answerC` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` VALUES(1, 'Scenario #1: ', 'Your fishing boat capsizes off the coast of Florida. The chum from your fish haul has attracted a hungry shark that has just bumped into you, testing your edibility. What do you do?', '1', '2', '3');
INSERT INTO `questions` VALUES(2, 'Scenario #2:', 'A great white has just taken a nibble off your left calf and you are bleeding profusely. Thankfully, the shark realized you were not a seal and has swum away. What is your next move?', '4', '5', '6');
INSERT INTO `questions` VALUES(3, 'Scenario #3:', 'You are swimming off the coast of Australia and a shark begins to attack you! It has your arm in its massive jaws. How do you react?', '7', '8', '9');
INSERT INTO `questions` VALUES(4, 'Scenario #4:', 'You are diving near a reef and notice a shark not too far away. You take note that you are currently between the shark and open water, perhaps creating a situation where the shark feels threatened by your presence. What should you do?', '10', '11', '12');
INSERT INTO `questions` VALUES(5, 'Scenario #5:', 'You are drinking with your friends at the beach. Your friends decide that they want to go swimming very close to nightfall. They ask you to join them. What do you do?', '13', '14', '15');
