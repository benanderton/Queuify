-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 02, 2012 at 10:39 PM
-- Server version: 5.5.24
-- PHP Version: 5.3.10-1ubuntu3.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `queuify`
--

-- --------------------------------------------------------

--
-- Table structure for table `tracks`
--

CREATE TABLE IF NOT EXISTS `tracks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `artist` varchar(1000) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `album` varchar(1000) NOT NULL,
  `spotifyid` varchar(250) NOT NULL,
  `release_date` int(11) NOT NULL,
  `played` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tracks`
--

INSERT INTO `tracks` (`id`, `artist`, `title`, `album`, `spotifyid`, `release_date`, `played`) VALUES
(1, 'Eurythmics', 'Sweet Dreams (Are Made Of This)', 'The Best Of The 80''s', 'spotify:track:2CVqF1sLhwut4NiZxzNUnC', 2007, 1),
(2, 'Bonnie Tyler', 'Holding Out For A Hero', 'The Best Of The 80''s', 'spotify:track:0JIujrQsYJuNKSj5f4PgAm', 2007, 1),
(3, 'Cyndi Lauper', 'Girls Just Want To Have Fun', 'The Best Of The 80''s', 'spotify:track:7sMGwiS4vOMcz86ZY3vKYM', 2007, 1),
(4, 'Whitney Houston', 'I Wanna Dance With Somebody', '100 Hits of the 80''s - Volume 2', 'spotify:track:7Bc0S4rnNF06apWGfK2S3G', 2011, 1),
(5, 'Kenny Loggins', 'Footloose', 'The Best Of The 80''s', 'spotify:track:1Ppwc43WYFEBXw2n1ePhDY', 2007, 1),
(6, 'Corona', 'The Rhythm Of The Night', 'Disco 90''s', 'spotify:track:3L9RIFcNF9IDGPRE96EO7N', 2009, 1),
(7, 'Wiz Khalifa', 'Get Your S**t', 'Rolling Papers', 'spotify:track:5SS4Hy4rZfltd3EoqJqBAh', 2011, 1),
(8, 'RUN-DMC', 'Walk This Way', 'The Best Of The 80''s', 'spotify:track:3OtAuvm8i0M5ibKJpPTB1O', 2007, 1),
(9, 'Prodigy', 'Smack My Bitch Up', 'Fat Of The Land', 'spotify:track:2lBpN5CZ3zLyVIPejUhN6Y', 1997, 1),
(10, 'Prodigy', 'Narayan', 'Fat Of The Land', 'spotify:track:0eQwLLutkGb8G9BvutEOrb', 1997, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
