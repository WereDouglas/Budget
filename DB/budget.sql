-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 25, 2015 at 09:17 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `budget`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sublineID` int(11) NOT NULL,
  `name` text NOT NULL,
  `number` varchar(50) NOT NULL,
  `line` varchar(50) NOT NULL,
  `created` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `sublineID`, `name`, `number`, `line`, `created`) VALUES
(1, 3, 'Filing Cabinets', '1079100', 'B6001', '2015-09-20 20:18:43'),
(2, 3, 'Increase-Filing Cabinet', '1079200', 'B6001', '2015-09-20 20:20:32');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orgID` int(11) DEFAULT NULL,
  `name` text NOT NULL,
  `variation` varchar(50) NOT NULL,
  `created` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `orgID`, `name`, `variation`, `created`) VALUES
(1, NULL, 'REVENUE', '+', '2015-09-20 12:17:46'),
(2, NULL, 'OPEX INCURRENT', '-', '2015-09-20 19:21:57'),
(3, NULL, 'DEVELOPMENT', '+', '2015-09-20 12:18:40');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orgID` int(11) DEFAULT NULL,
  `name` text NOT NULL,
  `details` text,
  `created` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `orgID`, `name`, `details`, `created`) VALUES
(2, NULL, 'TECHNOLOGY AND NETWORK SERVICES', 'changed', '2015-09-20 08:43:37'),
(4, NULL, 'BROADCASTING', '', '2015-09-20 08:55:37'),
(6, NULL, 'Legal Department', '', '2015-09-20 10:00:21');

-- --------------------------------------------------------

--
-- Table structure for table `initiative`
--

CREATE TABLE IF NOT EXISTS `initiative` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `objectiveID` int(11) NOT NULL,
  `values` text NOT NULL,
  `details` text NOT NULL,
  `created` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `initiative`
--

INSERT INTO `initiative` (`id`, `objectiveID`, `values`, `details`, `created`) VALUES
(1, 4, '% of coverage', 'Facilitate infrastructure roll out in un-served and underserved areas', '2015-09-20 11:09:06'),
(2, 4, '% of districts with postal services', 'Review and develop the provision of universal postal services', '2015-09-20 11:23:51'),
(3, 4, '% of national digital coverage', 'Facilitate the realisation of nationwide digital migration', '2015-09-20 11:24:54');

-- --------------------------------------------------------

--
-- Table structure for table `instance`
--

CREATE TABLE IF NOT EXISTS `instance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orgID` int(11) NOT NULL,
  `content` text NOT NULL,
  `created` varchar(50) NOT NULL,
  `by` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `instance`
--

INSERT INTO `instance` (`id`, `orgID`, `content`, `created`, `by`) VALUES
(1, 0, '{"department":"TECHNOLOGY AND NETWORK SERVICES","unit":"Broadcasting","activity":"456000","output":"budget-form","outcome":"budget-form","objective":"SO5","initiative":"Facilitate infrastructure roll out in un-served and underserved areas","performance measure":"budget-form","procurement type":"","category":"REVENUE","reporting line":"REVENUE","sub line":"Rental income  & car park","account":"1079100","account description":"budget-form","funding":"Internal","unit of measure":"budget-form","currency":"USD","rate":"34","unit price":"456000","qty":"456000","persons":"456000","freq":"456000","price (local)":"456000","total":"456000","cash flow":"456000","unit prices":"456000","start date":"","end date":"","variance":"456000","cost generation":"456000","optionsRadios":"option1","January":"456000","February":"456000","March":"456000","April":"456000","May":"456000","June":"456000","July":"456000","August":"456000","September":"456000","October":"456000","November":"456000","December":"456000","Quarter 1":"456000","Quarter 2":"456000","Quarter 3":"456000","Quarter 4":"456000","services":"456000","activity details":"Amendments","Year":"456000"}', '2015-09-23 22:48:55', 'user'),
(2, 0, '{"department":"TECHNOLOGY AND NETWORK SERVICES","unit":"Broadcasting","activity":"30000","output":"30000","outcome":"30000","objective":"SO5","initiative":"Facilitate infrastructure roll out in un-served and underserved areas","performance measure":"","Procurement type":"","category":"REVENUE","reporting line":"REVENUE","sub line":"Rental income  & car park","account":"1079100","account description":"","funding":"Internal","unit of measure":"","currency":"USD","rate":"30000","unit price":"30000","qty":"30000","persons":"30000","freq":"30000","price (local)":"30000","total":"30000","cash flow":"30000","unit prices":"456000","start date":"","end date":"","variance":"","cost generation":"","optionsRadios":"option1","January":"30000","February":"30000","March":"30000","April":"30000","May":"30000","June":"30000","July":"30000","August":"30000","September":"30000","October":"30000","November":"30000","December":"30000","Quarter 1":"30000","Quarter 2":"30000","Quarter 3":"30000","Quarter 4":"30000","services":"30000","activity details":"Amendments","Year":"30000"}', '2015-09-24 00:24:58', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `objective`
--

CREATE TABLE IF NOT EXISTS `objective` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orgID` int(11) DEFAULT NULL,
  `code` text NOT NULL,
  `title` text NOT NULL,
  `created` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `objective`
--

INSERT INTO `objective` (`id`, `orgID`, `code`, `title`, `created`) VALUES
(1, NULL, 'SO5', ' SO5:To improve operational performance towards institutional excellence', '2015-09-20 10:28:31'),
(2, NULL, 'SO2', 'SO2: Optimize utilization of spectrum', '2015-09-20 10:29:12'),
(3, NULL, 'SO3', 'SO3: Foster fair competition within the communications sector through appropriate regulation', '2015-09-20 10:29:39'),
(4, NULL, 'SO1', 'SO1: Enhance nationwide reach and usage of relevant communication services through informed regulatory interventions', '2015-09-20 10:30:27'),
(5, NULL, 'SO4', 'SO4: To safeguard consumers of Communication services', '2015-09-20 10:30:55');

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE IF NOT EXISTS `rate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orgID` int(11) DEFAULT NULL,
  `currency` varchar(50) NOT NULL,
  `rate` varchar(50) NOT NULL,
  `created` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `rate`
--

INSERT INTO `rate` (`id`, `orgID`, `currency`, `rate`, `created`) VALUES
(2, NULL, 'USD', '3550', '2015-09-20 20:54:33');

-- --------------------------------------------------------

--
-- Table structure for table `reporting`
--

CREATE TABLE IF NOT EXISTS `reporting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoryID` int(11) NOT NULL,
  `name` text NOT NULL,
  `created` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `reporting`
--

INSERT INTO `reporting` (`id`, `categoryID`, `name`, `created`) VALUES
(1, 1, 'REVENUE', '2015-09-20 13:15:27'),
(2, 1, 'OTHER REVENUE', '2015-09-20 13:15:43'),
(3, 2, 'Personal costs', '2015-09-20 19:15:35'),
(4, 2, 'ADMINISTRATIVE COSTS', '2015-09-20 13:16:45'),
(5, 2, 'ESTABLISHMENT COSTS', '2015-09-20 19:20:56'),
(6, 2, 'FINANCE COST', '2015-09-20 19:21:20'),
(7, 3, 'FURNITURE', '2015-09-20 19:22:41'),
(8, 3, 'LOOSE TOOLS', '2015-09-20 19:23:48'),
(9, 2, 'CORPORATION TAX', '2015-09-20 19:24:20');

-- --------------------------------------------------------

--
-- Table structure for table `subline`
--

CREATE TABLE IF NOT EXISTS `subline` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reportingID` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `created` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `subline`
--

INSERT INTO `subline` (`id`, `reportingID`, `name`, `description`, `created`) VALUES
(1, 2, 'Rental income  & car park', 'Rental income  & car park', '2015-09-20 19:28:21'),
(2, 9, 'Corporation tax provision ', '', '2015-09-20 19:30:32'),
(3, 7, 'CABINETS', '', '2015-09-20 19:39:05'),
(4, 7, 'CARPET', '', '2015-09-20 19:33:40'),
(5, 3, 'Salary', '', '2015-09-20 19:39:45'),
(6, 3, 'Acting Allowance', '', '2015-09-20 19:39:55');

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE IF NOT EXISTS `unit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `departmentID` int(11) NOT NULL,
  `name` text NOT NULL,
  `details` text,
  `created` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`id`, `departmentID`, `name`, `details`, `created`) VALUES
(4, 4, 'Broadcasting', 'Broadcasting', '2015-09-20 09:36:54'),
(6, 4, 'Broadcasted', 'Broadcasted', '2015-09-20 09:38:16'),
(10, 2, 'Spectrum Management', 'Spectrum Management', '2015-09-20 09:59:28'),
(11, 2, 'Postal regulation', '', '2015-09-20 09:59:40'),
(12, 2, 'Telecoms & Broadcasting', '', '2015-09-20 09:59:50'),
(13, 6, 'Legal Affairs', '', '2015-09-20 10:00:54'),
(14, 6, 'Licensing ', '', '2015-09-20 10:22:39'),
(15, 6, 'Procurement', '', '2015-09-20 10:01:17');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
