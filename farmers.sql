-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2018 at 11:00 PM
-- Server version: 5.7.21-log
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `farmers`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `centers`
--

CREATE TABLE IF NOT EXISTS `centers` (
  `id_center` int(11) NOT NULL AUTO_INCREMENT,
  `centername` varchar(255) NOT NULL,
  `contactno` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `aboutme` varchar(255) DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_center`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `centers`
--

INSERT INTO `centers` (`id_center`, `centername`, `contactno`, `website`, `email`, `createdAt`, `aboutme`, `active`) VALUES
(1, 'Harabee', '0727000000', 'http://soomeurl.com/', 'prolimited@gmail.com', '2018-04-18 11:45:33', '', 1),
(2, 'Kileleshwa', '0727000000', 'http://soomeurl.com/', 'prolimited1@gmail.com', '2018-04-18 11:50:11', '', 1),
(3, 'Kawangware', '0727000000', 'http://soomeurl.com/', 'prolimited2@gmail.com', '2018-04-18 11:50:11', '', 1),
(4, 'Kibra', '0727000000', 'http://soomeurl.com/', 'prolimited3@gmail.com', '2018-04-18 11:50:11', '', 1),
(5, 'Sattelite', '0727000000', 'http://soomeurl.com/', 'prolimited4@gmail.com', '2018-04-18 11:50:11', '', 1),
(6, 'Ngong', '0727000000', 'http://soomeurl.com/', 'prolimited5@gmail.com', '2018-04-18 11:50:11', '', 1),
(8, 'Eastleigh', '0727000000', 'http://soomeurl.com/', 'prolimited7@gmail.com', '2018-04-18 11:50:11', '', 1),
(9, 'Pangani', '0727000000', 'http://soomeurl.com/', 'prolimited8@gmail.com', '2018-04-18 11:50:11', '', 1),
(11, 'Jumanji', '0709854989', 'jumamji.com', 'jumanji@gmail.com', '2018-04-19 10:11:18', 'jumamji tea center', 1),
(12, 'Trek', '0700000000', 'trek.com', 'trek@gmail.com', '2018-04-19 10:20:08', 'trek tea center', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `center_name` varchar(255) NOT NULL,
  `farmer_produce` decimal(65,4) unsigned NOT NULL DEFAULT '0.0000',
  `active` int(10) unsigned NOT NULL DEFAULT '1',
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `hash`, `email`, `center_name`, `farmer_produce`, `active`, `createdAt`) VALUES
(14, 'Mon', '$1$Kq1.Lo/.$F451YrioSf5GPqPxG4WaN1', 'jameschege@gmail.com', 'Harabee', '84941.0000', 1, '2018-04-01 12:33:28'),
(15, 'kim', '$1$485.5R2.$tsQgqMXdviLmnav7tKxxH.', 'jymeschege@gmail.com', 'Karen', '3446666.0000', 1, '2018-04-11 12:33:28'),
(16, 'Tim', '$1$2I/.hf3.$jfDX74bSaUcWubSaVjuhj1', 'tim@gmail.com', 'Rongai', '78787946.0000', 1, '2018-04-15 12:33:28'),
(17, 'James', '$1$hN5.W83.$2QB8BsWnDtI9cWPJ/tc/a/', 'chege@gmail.com', 'Harabee', '2333333.0000', 1, '2018-04-18 12:33:28'),
(18, 'jumamji', '$1$Yt0.BX4.$OyrE/j/Syx4RtqGyAW5Nn0', 'jumanji@gmail.com', 'Trek', '80000.0000', 1, '2018-04-18 14:08:30'),
(19, 'Mary', '$1$zL5.Az/.$HqDVjmwEatmpD69Qqz14K0', 'mary@gmail.com', 'Rongai', '0.0000', 1, '2018-04-18 19:34:29'),
(20, 'jane', '$1$J64.eY3.$dMDbYUgPjl2xzKBg7sO/J1', 'jane@gmail.com', 'Sattelite', '77777.0000', 1, '2018-04-18 19:35:15'),
(21, 'kigen', '$1$PA5.sm4.$M63VwFFuJAIt7mqUFLbXK0', 'kigen@gmail.com', 'Kileleshwa', '0.0000', 1, '2018-04-18 19:36:01'),
(22, 'Macharia', '$1$Vt5.4q..$.clgHt6tWoLm111t6a2Is.', 'macharia@gmail.com', '2', '0.0000', 1, '2018-04-19 15:23:09'),
(23, 'maimuna', '$1$5N2.ot1.$fC.5QrcVuowqKbMEK/kBz/', 'maimuna@gmail.com', '1', '0.0000', 1, '2018-04-19 15:24:42'),
(24, 'shiru', '$1$Ry/.Gk5.$9WNHkG9W.SH8/vBrrotdj/', 'shiru@gmail.com', 'Jumanji', '565656565.0000', 1, '2018-04-19 15:27:55');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
