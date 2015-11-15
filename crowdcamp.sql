-- phpMyAdmin SQL Dump
-- version 4.0.10.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 15, 2015 at 09:40 AM
-- Server version: 5.1.73
-- PHP Version: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `crowdcamp`
--

-- --------------------------------------------------------

--
-- Table structure for table `dataset`
--

CREATE TABLE IF NOT EXISTS `dataset` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `data` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `blog` varchar(50) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `name` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=101 ;

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE IF NOT EXISTS `task` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `dataset_id` int(11) NOT NULL,
  `assignment_id` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `worker_id` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `summary` text COLLATE latin1_general_ci NOT NULL,
  `first` varchar(50) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `second` varchar(50) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `third` varchar(50) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `fourth` varchar(50) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `bad` int(11) NOT NULL DEFAULT '0',
  `time_finished` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=310 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
