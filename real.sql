-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 07, 2016 at 12:11 AM
-- Server version: 5.1.53
-- PHP Version: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `napsa`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `fName` varchar(200) NOT NULL,
  `lName` varchar(200) NOT NULL,
  `phone_number` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `fName`, `lName`, `phone_number`, `email`, `password`) VALUES
(1, 'Patrick', 'Sikalinda', '260972148199', 'sikalindapatrick@gmail.com', 'txd852168');

-- --------------------------------------------------------

--
-- Table structure for table `approval`
--

CREATE TABLE IF NOT EXISTS `approval` (
  `approval_id` int(11) NOT NULL AUTO_INCREMENT,
  `fName` varchar(200) NOT NULL,
  `lName` varchar(200) NOT NULL,
  `phone_number` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`approval_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `approval`
--

INSERT INTO `approval` (`approval_id`, `fName`, `lName`, `phone_number`, `email`, `password`) VALUES
(1, 'Roy', 'Munyelu', '260967779464', 'ceo@probasegroup.com', 'txd852168');

-- --------------------------------------------------------

--
-- Table structure for table `init`
--

CREATE TABLE IF NOT EXISTS `init` (
  `init_id` int(11) NOT NULL AUTO_INCREMENT,
  `fName` varchar(200) NOT NULL,
  `lName` varchar(200) NOT NULL,
  `phone_number` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`init_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `init`
--

INSERT INTO `init` (`init_id`, `fName`, `lName`, `phone_number`, `email`, `password`) VALUES
(1, 'Lucky', 'Simoi', '260972148199', 'lucky@gmail.com', 'txd852168');

-- --------------------------------------------------------

--
-- Table structure for table `init_file`
--

CREATE TABLE IF NOT EXISTS `init_file` (
  `init_file_id` int(11) NOT NULL AUTO_INCREMENT,
  `init_id` int(11) NOT NULL,
  `approval_id` int(11) NOT NULL,
  `file_name` varchar(200) NOT NULL,
  `date_initiated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `message` varchar(250) NOT NULL,
  `level` varchar(200) NOT NULL,
  PRIMARY KEY (`init_file_id`,`init_id`,`approval_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `init_file`
--

INSERT INTO `init_file` (`init_file_id`, `init_id`, `approval_id`, `file_name`, `date_initiated`, `message`, `level`) VALUES
(3, 1, 0, 'demo.json', '2016-08-04 12:10:15', '', '1'),
(4, 1, 0, 'demoerror.json', '2016-08-04 10:22:45', '', '1'),
(8, 1, 0, 'ff.json', '2016-08-04 13:12:11', '', '');
