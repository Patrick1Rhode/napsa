-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 09, 2016 at 10:33 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `admin_napsa`
--
CREATE DATABASE `admin_napsa` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `admin_napsa`;

-- --------------------------------------------------------

--
-- Table structure for table `barrack`
--

CREATE TABLE IF NOT EXISTS `barrack` (
  `BarrackID` int(11) NOT NULL AUTO_INCREMENT,
  `BarrackName` varchar(200) DEFAULT NULL,
  `ServiceNumber` varchar(190) DEFAULT NULL,
  PRIMARY KEY (`BarrackID`),
  UNIQUE KEY `ServiceNumber` (`ServiceNumber`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `barrack`
--

INSERT INTO `barrack` (`BarrackID`, `BarrackName`, `ServiceNumber`) VALUES
(1, 'Barrack-2', '127834'),
(2, 'Barrack-1', '56789'),
(3, 'Barrack-1', '12345'),
(4, 'Barrack-3', '23456');

-- --------------------------------------------------------

--
-- Table structure for table `init_file`
--

CREATE TABLE IF NOT EXISTS `init_file` (
  `init_file_id` int(11) NOT NULL AUTO_INCREMENT,
  `ServiceNumber` int(11) NOT NULL,
  `approval_id` int(11) NOT NULL,
  `file_name` varchar(200) NOT NULL,
  `date_initiated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `message` varchar(250) NOT NULL,
  `level` varchar(200) NOT NULL,
  `confirmation_code` varchar(200) NOT NULL,
  PRIMARY KEY (`init_file_id`,`ServiceNumber`,`approval_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `init_file`
--

INSERT INTO `init_file` (`init_file_id`, `ServiceNumber`, `approval_id`, `file_name`, `date_initiated`, `message`, `level`, `confirmation_code`) VALUES
(3, 22, 0, 'demo.json', '2016-08-08 18:52:48', '', '3', ''),
(4, 22, 0, 'demoerror.json', '2016-08-08 18:31:08', '', '2', ''),
(8, 22, 0, 'test.json', '2016-08-08 19:26:04', '', '3', ''),
(10, 22, 0, 'realerrors.json', '2016-08-08 20:42:07', '', '2', ''),
(11, 22, 0, 'wowerror.json', '2016-08-08 19:52:25', '', '', '560299');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `Password` varchar(225) DEFAULT NULL,
  `ServiceNumber` int(11) DEFAULT NULL,
  KEY `ServiceNumber` (`ServiceNumber`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`Password`, `ServiceNumber`) VALUES
('8834df0adc6c7257873d19818eaf1ae767229217eb0e9b02d130bee1b4e768c450346d1978b4177b48483f531227c8b26bb223727a5eef4b902af9beaaff6665', 127834),
('8834df0adc6c7257873d19818eaf1ae767229217eb0e9b02d130bee1b4e768c450346d1978b4177b48483f531227c8b26bb223727a5eef4b902af9beaaff6665', 12345),
('8834df0adc6c7257873d19818eaf1ae767229217eb0e9b02d130bee1b4e768c450346d1978b4177b48483f531227c8b26bb223727a5eef4b902af9beaaff6665', 23456),
('173f9906396ae2f6c4867cd6ae7b992735dd3d72e35159e2ee1904b858198279b960445e71074c3ea6890db2708f15b48cac7baa4aef577831cd0e8d9a8be1bf', 56789),
('d9cc2a46b9c9c0d99b3bd35c730fa9ff3c0234f04d07a440f9b1bde6aafa8ce19ad2fc42cdf3810b8b27f790c5daed2b6feab9291f000ffc149fea661713a764', 12345),
(NULL, NULL),
('7ab9f333ef80b58756d1fa2777398c8c748fc9251b87137c0c8fd093de702a1954f6708833cd2a6ef6d7d0a199ee1d099459f234fb876199c21c2296cf7f1a75', 22),
('7ab9f333ef80b58756d1fa2777398c8c748fc9251b87137c0c8fd093de702a1954f6708833cd2a6ef6d7d0a199ee1d099459f234fb876199c21c2296cf7f1a75', 22),
('7ab9f333ef80b58756d1fa2777398c8c748fc9251b87137c0c8fd093de702a1954f6708833cd2a6ef6d7d0a199ee1d099459f234fb876199c21c2296cf7f1a75', 78),
('7ab9f333ef80b58756d1fa2777398c8c748fc9251b87137c0c8fd093de702a1954f6708833cd2a6ef6d7d0a199ee1d099459f234fb876199c21c2296cf7f1a75', 99);

-- --------------------------------------------------------

--
-- Table structure for table `officer`
--

CREATE TABLE IF NOT EXISTS `officer` (
  `ServiceNumber` int(11) NOT NULL DEFAULT '0',
  `Rank` varchar(225) DEFAULT NULL,
  `Surname` varchar(225) DEFAULT NULL,
  `OtherNames` varchar(225) DEFAULT NULL,
  `Unit` varchar(225) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `POB` varchar(100) DEFAULT NULL,
  `Nationality` varchar(100) DEFAULT NULL,
  `CountryOfBirth` varchar(100) DEFAULT NULL,
  `SpouseName` char(225) DEFAULT NULL,
  `SpouseNationality` char(200) DEFAULT NULL,
  `DateOfAttestation` date DEFAULT NULL,
  PRIMARY KEY (`ServiceNumber`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `officer`
--

INSERT INTO `officer` (`ServiceNumber`, `Rank`, `Surname`, `OtherNames`, `Unit`, `DOB`, `POB`, `Nationality`, `CountryOfBirth`, `SpouseName`, `SpouseNationality`, `DateOfAttestation`) VALUES
(22, 'approver', 'Mubanga', 'Mukaka', 'finincail', '1990-03-02', 'Ndola', 'Zambian', 'Zambia', 'Chileshe', 'Zambian', '2000-02-22'),
(78, 'init', 'Bwalya', 'George', 'none', '1990-03-02', 'Lusaka', 'Zambian', 'Zambia', 'Mary', 'Zambian', '2000-02-22'),
(99, 'init', 'Mulenga', 'Mulenga', 'none', '1990-03-02', 'Lusaka', 'Zambian', 'Zambia', 'Faith', 'Zambian', '2000-02-22'),
(12345, 'IT Manager', 'Patrick', 'Sikalinda', 'Napsa Kabwe', '1980-11-09', 'Kasama', 'Zambian', 'Zambia', 'Chansa Mwape', 'Zambian', '2000-12-08'),
(23456, 'IT Manager hq', 'Simbeye', 'Mwiza Benjamin', 'NAPSA_HQ', '1996-08-11', 'Chililabombwe', 'Zambian', 'Zambia', 'Nachamwe Chakatala', 'Zambian', '2000-12-08'),
(56789, 'IT', 'Chabala', 'Mambwe Charles', 'NAPSA_HQ', '1986-12-03', 'Lusaka', 'Zambian', 'Zambia', 'Louise Parker', 'American', '2003-06-03'),
(127834, 'IT', 'Chanda', 'Micheal', 'NAPSA_HQ', '1991-08-12', 'Kalomo', 'Zambian', 'Zambia', 'The Wife Herself', 'Zambian', '2000-12-08');

-- --------------------------------------------------------

--
-- Table structure for table `officeracadquali`
--

CREATE TABLE IF NOT EXISTS `officeracadquali` (
  `AcadQualID` int(11) NOT NULL DEFAULT '0',
  `AcaQualName` char(1) DEFAULT NULL,
  `AcaQualYear` date DEFAULT NULL,
  PRIMARY KEY (`AcadQualID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `officeracadquali`
--


-- --------------------------------------------------------

--
-- Table structure for table `officerapointmentheld`
--

CREATE TABLE IF NOT EXISTS `officerapointmentheld` (
  `AppointmentID` int(11) NOT NULL DEFAULT '0',
  `AppointmentName` char(1) DEFAULT NULL,
  `StartYear` date DEFAULT NULL,
  `EndYear` date DEFAULT NULL,
  PRIMARY KEY (`AppointmentID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `officerapointmentheld`
--


-- --------------------------------------------------------

--
-- Table structure for table `officercoursesattended`
--

CREATE TABLE IF NOT EXISTS `officercoursesattended` (
  `CourseID` int(11) NOT NULL DEFAULT '0',
  `CourseName` char(1) DEFAULT NULL,
  `CourseYear` date DEFAULT NULL,
  PRIMARY KEY (`CourseID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `officercoursesattended`
--


-- --------------------------------------------------------

--
-- Table structure for table `officerhondec`
--

CREATE TABLE IF NOT EXISTS `officerhondec` (
  `HonDecID` int(11) NOT NULL DEFAULT '0',
  `HonDecName` varchar(225) DEFAULT NULL,
  `HonDecYear` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`HonDecID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `officerhondec`
--


-- --------------------------------------------------------

--
-- Table structure for table `officerpromotion`
--

CREATE TABLE IF NOT EXISTS `officerpromotion` (
  `PromotionID` int(11) NOT NULL DEFAULT '0',
  `PromotionName` char(1) DEFAULT NULL,
  `PromotionDate` date DEFAULT NULL,
  PRIMARY KEY (`PromotionID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `officerpromotion`
--


-- --------------------------------------------------------

--
-- Table structure for table `officerschoolattended`
--

CREATE TABLE IF NOT EXISTS `officerschoolattended` (
  `SchoolID` int(11) NOT NULL DEFAULT '0',
  `SchoolName` char(1) DEFAULT NULL,
  `YearStarted` date DEFAULT NULL,
  `YearFinished` date DEFAULT NULL,
  PRIMARY KEY (`SchoolID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `officerschoolattended`
--


-- --------------------------------------------------------

--
-- Table structure for table `securitygroup`
--

CREATE TABLE IF NOT EXISTS `securitygroup` (
  `SecurityGroupID` int(11) NOT NULL DEFAULT '0',
  `SecurityGroupName` varchar(255) DEFAULT NULL,
  `SecurityGroupLevel` int(11) DEFAULT NULL,
  PRIMARY KEY (`SecurityGroupID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `securitygroup`
--

INSERT INTO `securitygroup` (`SecurityGroupID`, `SecurityGroupName`, `SecurityGroupLevel`) VALUES
(22, 'Public', 3),
(78, 'IT Support', 2),
(99, 'Public', 3),
(12345, 'Administrator', 1),
(23456, 'Public', 3),
(56789, 'IT Support', 2),
(127834, 'Administrator', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `ServiceNumber` FOREIGN KEY (`ServiceNumber`) REFERENCES `officer` (`ServiceNumber`);
