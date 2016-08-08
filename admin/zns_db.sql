-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2014 at 01:30 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `zns_db`
--

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
('af0b14e8f9e94416e0c6808f4b45f241286b6518f08cc5cd5de19b01520b30d2c3b4c0406c41bcd5175c2a61f8521d625a85af815b8721f7ad5228eaf6506dca', 12345),
('8834df0adc6c7257873d19818eaf1ae767229217eb0e9b02d130bee1b4e768c450346d1978b4177b48483f531227c8b26bb223727a5eef4b902af9beaaff6665', 23456),
('173f9906396ae2f6c4867cd6ae7b992735dd3d72e35159e2ee1904b858198279b960445e71074c3ea6890db2708f15b48cac7baa4aef577831cd0e8d9a8be1bf', 56789);

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
(12345, 'General', 'Mwelwa', 'Chipo', 'ZNS Kabwe', '1980-11-09', 'Kasama', 'Zambian', 'Zambia', 'Chansa Mwape', 'Zambian', '2000-12-08'),
(23456, 'Lance Corporal', 'Simbeye', 'Mwiza Benjamin', 'ZNS_HQ', '1996-08-11', 'Chililabombwe', 'Zambian', 'Zambia', 'Nachamwe Chakatala', 'Zambian', '2000-12-08'),
(56789, 'General', 'Chabala', 'Mambwe Charles', 'ZNS_HQ', '1986-12-03', 'Lusaka', 'Zambian', 'Zambia', 'Louise Parker', 'American', '2003-06-03'),
(127834, 'Major', 'Chanda', 'Micheal', 'ZNS_HQ', '1991-08-12', 'Kalomo', 'Zambian', 'Zambia', 'The Wife Herself', 'Zambian', '2000-12-08');

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
