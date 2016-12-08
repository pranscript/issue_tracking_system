-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2014 at 08:50 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `issues`
--

CREATE TABLE IF NOT EXISTS `issues` (
  `I_D` int(10) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(30) NOT NULL,
  `GROUP_NAME` varchar(30) NOT NULL,
  `VOTES` int(10) NOT NULL DEFAULT '0',
  `ANSWERS` int(10) NOT NULL DEFAULT '0',
  `FILES` varchar(500) NOT NULL,
  `KNOWLEDGE` int(5) NOT NULL DEFAULT '0',
  `ISSUE` varchar(200) NOT NULL,
  `DETAILED_ISSUE` varchar(5000) NOT NULL,
  `PASSWORD` varchar(30) NOT NULL,
  `STATUS` varchar(10) NOT NULL DEFAULT 'unsolved',
  `DATE` date NOT NULL,
  PRIMARY KEY (`I_D`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
