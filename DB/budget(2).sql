-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 19, 2015 at 05:14 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `sublineID`, `name`, `number`, `line`, `created`) VALUES
(1, 3, 'Filing Cabinets', '1079100', 'B6001', '2015-09-20 20:18:43'),
(2, 3, 'Increase-Filing Cabinet', '1079200', 'B6001', '2015-09-20 20:20:32'),
(3, 9, 'Land & Building', '1001100', 'B6001', '2015-10-19 17:41:33'),
(4, 9, 'Land & Building- Remote Stn.', '1002100', 'B6001', '2015-10-19 17:42:14'),
(5, 1, 'Rental Income', '3101000', 'P1010', '2015-10-19 18:06:09'),
(6, 1, 'Parking Fees', '3102000', 'P1010', '2015-10-19 18:06:42');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `orgID`, `name`, `details`, `created`) VALUES
(2, NULL, 'Technology and network service', 'changed', '2015-09-20 08:43:37'),
(4, NULL, 'Broadcasting', '', '2015-09-20 08:55:37'),
(6, NULL, 'Legal Department', '', '2015-09-20 10:00:21'),
(7, NULL, 'FINANCE & IT', 'FINANCE & IT', '2015-10-19 16:52:45'),
(8, NULL, 'RURAL COMMUNICATIONS DEVT FUND', '', '2015-10-19 16:53:20'),
(9, NULL, 'COMPETITION & CONSUMER AFFAIRS', '', '2015-10-19 16:53:50'),
(10, NULL, 'HUMAN RESOURCES & ADMIN', '', '2015-10-19 16:54:17'),
(11, NULL, 'INTERNAL AUDIT ', '', '2015-10-19 16:54:30'),
(12, NULL, 'EXECUTIVE DIRECTORS OFFICE', '', '2015-10-19 16:54:42');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `initiative`
--

INSERT INTO `initiative` (`id`, `objectiveID`, `values`, `details`, `created`) VALUES
(1, 4, '% of coverage', 'Facilitate infrastructure roll out in un-served and underserved areas', '2015-09-20 11:09:06'),
(2, 4, '% of districts with postal services', 'Review and develop the provision of universal postal services', '2015-09-20 11:23:51'),
(3, 4, '% of national digital coverage', 'Facilitate the realisation of nationwide digital migration', '2015-09-20 11:24:54'),
(4, 4, '% of new content developed and accessed', 'Facilitate the development and access to a wide range of relevant content', '2015-10-19 17:33:47'),
(5, 4, '# of projects initiated', 'Facilitate access to communication services by special interest groups', '2015-10-19 17:34:16'),
(6, 4, '# of innovation promoted by UCC ', 'Promote innovation and development of relevant communication services', '2015-10-19 17:34:53'),
(7, 2, '% of confirmed  interference penalised', 'Enhance enforcement of Spectrum usage or authorisation conditions', '2015-10-19 17:35:45'),
(8, 2, '% of monitoring capability up time', 'Enhance spectrum monitoring capacity of the organisation', '2015-10-19 17:36:17'),
(9, 2, 'Spectrum users satisfaction survey score', 'Review the management of spectrum to balance social, technological and economic devt', '2015-10-19 17:36:45'),
(10, 2, 'Spectrum optimisation index', 'Enhance effective spectrum utilization', '2015-10-19 17:37:16'),
(11, 3, '# of planned monitoring & analysis understaken', 'Enhance the monitoring and analysis of the markets performance', '2015-10-19 17:38:07'),
(12, 1, 'Employee satisfaction index', 'Promote Staff Development, Motivation & Retention', '2015-10-19 17:58:25'),
(13, 1, '% of Process automated', 'Review and automate the organisation processes to ensure timely service delivery', '2015-10-19 17:58:46'),
(14, 1, '% of Operation policies reviewed /developed', 'Review & Develop policies to ensure best practice of business process', '2015-10-19 17:59:08'),
(15, 1, '% of  Expenditure Variance (Actual vs Budget )', 'Provide Logistic surport for activity implementations\r\n', '2015-10-19 17:59:38'),
(16, 1, 'Knowledge & Information sharing survey score', 'Improve Knowledge & Information Management within the organization\r\n', '2015-10-19 17:59:50'),
(17, 1, 'Stakeholders visibility survey score', 'Promote Corporate Visibility\r\n', '2015-10-19 18:00:00'),
(18, 1, '% of ICT fora deciscions influenced by Uganda', 'Participate Actively in International & Regional Fora\r\n', '2015-10-19 18:00:17'),
(19, 1, '% of revenue generated vs Budget', 'Enhance Revenue Generation & Collection\r\n', '2015-10-19 18:00:33'),
(20, 1, '% of identified & mitigated  risks', 'Identify and mitigate operational risks\r\n', '2015-10-19 18:00:45');

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
  `period` varchar(50) NOT NULL,
  `department` text NOT NULL,
  `unit` text NOT NULL,
  `initiative` text NOT NULL,
  `startdate` varchar(50) NOT NULL,
  `enddate` varchar(50) NOT NULL,
  `account` varchar(50) NOT NULL,
  `total` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `instance`
--

INSERT INTO `instance` (`id`, `orgID`, `content`, `created`, `by`, `period`, `department`, `unit`, `initiative`, `startdate`, `enddate`, `account`, `total`) VALUES
(6, 0, '{"period":"2011\\/2012","department":"Legal Department","unit":"Licensing ","activity":"Development","output":"Development","outcome":"Development","objective":"SO1","initiative":"Review and develop the provision of universal postal services","performance":"% of national digital coverage","starts":"2015-02-09","ends":"2015-10-07","Procurement type":"GOODS","category":"DEVELOPMENT","line":"FURNITURE","subline":"CABINETS","account":"1079100","funding":"Internal","account description":"Development","unit of measure":"Number","currency":"USD","rate":"3550","price":"120","qty":"70","persons":"1","freq":"1","priceL":"426000","total":"8400","cash flow":"-","totalL":"29820000","radio":"auto","variance":"","cost generation":"","January":"","February":"3727500","March":"3727500","April":"3727500","May":"3727500","June":"3727500","July":"3727500","August":"3727500","September":"3727500","October":"3727500","November":"","December":"","Quarter1":"12425001242500","Quarter2":"124250012425001240000","Quarter3":"124250012425001240000","Quarter4":"1242500","services":"Development","activity details":"Development","Year":"Development"}', '2015-10-13 16:44:11', 'weredouglas@gmail.com', '2015/2016', 'Legal Department', 'Licensing ', 'Review and develop the provision of universal postal services', '2015-02-09', '2015-10-07', '1079100', '29820000'),
(7, 0, '{"period":"2019\\/2020","department":"HUMAN RESOURCES & ADMIN","unit":"Administration","activity":"Service Charge\\r\\n","output":"","outcome":"","objective":"SO5","initiative":"Review & Develop policies to ensure best practice of business process","performance":"% of Operation policies reviewed \\/developed","starts":"2019-07-01","ends":"2020-06-01","Procurement type":"N\\/A","category":"DEVELOPMENT","line":"FURNITURE","subline":"CABINETS","account":"1079200","funding":"External","account description":" Rental Income ","unit of measure":"Lumpsun","currency":"USD","rate":"3550","price":" 284131.73 ","qty":"1","persons":"1","freq":"1","priceL":"1008667641.4999999","total":"284131.73","cash flow":"-","totalL":"1008667641.4999999","radio":"auto","services":"Service Charge COMM HSE","activity details":"Service Charge COMM HSE","Year":"2020","variance":"","cost generation":"","January":"","February":"","March":"","April":"","May":"","June":"","July":"","August":"","September":"","October":"","November":"","December":"","Quarter1":"","Quarter2":"","Quarter3":"","Quarter4":""}', '2015-10-19 19:37:52', 'weredouglas@gmail.com', '2019/2020', 'HUMAN RESOURCES & ADMIN', 'Administration', 'Review & Develop policies to ensure best practice of business process', '2019-07-01', '2020-06-01', '1079200', '1008667641.4999999'),
(8, 0, '{"period":"2019\\/2020","department":"HUMAN RESOURCES & ADMIN","unit":"Administration","activity":"Service Charge\\r\\n","output":"","outcome":"","objective":"SO5","initiative":"Review & Develop policies to ensure best practice of business process","performance":"% of Operation policies reviewed \\/developed","starts":"2019-07-01","ends":"2020-06-01","Procurement type":"N\\/A","category":"DEVELOPMENT","line":"FURNITURE","subline":"CABINETS","account":"1079200","funding":"External","account description":" Rental Income ","unit of measure":"Lumpsun","currency":"USD","rate":"3550","price":" 284131.73 ","qty":"1","persons":"1","freq":"1","priceL":"1008667641.4999999","total":"284131.73","cash flow":"-","totalL":"1008667641.4999999","radio":"auto","services":"Service Charge COMM HSE","activity details":"Service Charge COMM HSE","Year":"2020","variance":"","cost generation":"","January":"","February":"","March":"","April":"","May":"","June":"","July":"","August":"","September":"","October":"","November":"","December":"","Quarter1":"","Quarter2":"","Quarter3":"","Quarter4":""}', '2015-10-19 19:39:28', 'weredouglas@gmail.com', '2019/2020', 'HUMAN RESOURCES & ADMIN', 'Administration', 'Review & Develop policies to ensure best practice of business process', '2019-07-01', '2020-06-01', '1079200', '1008667641.4999999'),
(9, 0, '{"period":"2019\\/2020","department":"HUMAN RESOURCES & ADMIN","unit":"Administration","activity":"Service Charge\\r\\n","output":"","outcome":"","objective":"SO5","initiative":"Review & Develop policies to ensure best practice of business process","performance":"% of Operation policies reviewed \\/developed","starts":"2019-01-15","ends":"2019-12-17","Procurement type":"N\\/A","category":"DEVELOPMENT","line":"FURNITURE","subline":"CABINETS","account":"1079200","funding":"External","account description":" Rental Income ","unit of measure":"Lumpsun","currency":"USD","rate":"3550","price":" 284131.73 ","qty":"1","persons":"1","freq":"1","priceL":"1008667641.4999999","total":"284131.73","cash flow":"-","totalL":"1008667641.4999999","radio":"auto","services":"Service Charge COMM HSE","activity details":"Service Charge COMM HSE","Year":"2020","variance":"","cost generation":"","January":"91697058.31818181","February":"91697058.31818181","March":"91697058.31818181","April":"91697058.31818181","May":"91697058.31818181","June":"91697058.31818181","July":"91697058.31818181","August":"91697058.31818181","September":"91697058.31818181","October":"91697058.31818181","November":"91697058.31818181","December":"91697058.31818181","Quarter1":"Infinity","Quarter2":"","Quarter3":"","Quarter4":""}', '2015-10-19 19:42:30', 'weredouglas@gmail.com', '2019/2020', 'HUMAN RESOURCES & ADMIN', 'Administration', 'Review & Develop policies to ensure best practice of business process', '2019-01-15', '2019-12-17', '1079200', '1008667641.4999999');

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
-- Table structure for table `period`
--

CREATE TABLE IF NOT EXISTS `period` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` varchar(50) NOT NULL,
  `start` varchar(50) NOT NULL,
  `end` varchar(50) NOT NULL,
  `details` text NOT NULL,
  `created` varchar(50) NOT NULL,
  `by` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `period`
--

INSERT INTO `period` (`id`, `year`, `start`, `end`, `details`, `created`, `by`) VALUES
(1, '2015/2016', '2014-12-29', '2015-10-13', 'Finance managment and cash', '2015-10-19 17:45:34', 'weredouglas@gmail.com'),
(2, '2017/2018', '2011-09-27', '2012-10-07', 'mechanical year', '2015-10-19 17:45:53', 'weredouglas@gmail.com'),
(4, '2014/2015', '2015-10-04', '2016-09-08', 'New finance details', '2015-10-19 17:45:13', 'weredouglas@gmail.com'),
(5, '2018/2019', '2015-10-07', '2015-10-14', '', '2015-10-19 17:46:20', 'weredouglas@gmail.com'),
(6, '2019/2020', '2019-05-22', '2020-04-29', '', '2015-10-19 17:55:58', 'weredouglas@gmail.com');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `rate`
--

INSERT INTO `rate` (`id`, `orgID`, `currency`, `rate`, `created`) VALUES
(2, NULL, 'USD', '3550', '2015-09-20 20:54:33'),
(3, NULL, 'EURO', '4040', '2015-10-19 17:30:25'),
(4, NULL, 'GBP', '5030', '2015-10-17 13:25:20'),
(5, NULL, 'UGX', '1', '2015-10-19 17:30:11');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

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
(9, 2, 'CORPORATION TAX', '2015-09-20 19:24:20'),
(10, 3, 'PLANT & EQUIP', '2015-10-19 16:56:17'),
(11, 3, 'MOTOR VEHICLES', '2015-10-19 16:56:42'),
(12, 3, 'BUILDINGS', '2015-10-19 16:57:15'),
(13, 3, 'LAND', '2015-10-19 16:57:23'),
(14, 3, 'INVESTMENT PROPERTY', '2015-10-19 16:57:41'),
(15, 3, 'SOFTWARE', '2015-10-19 16:57:50'),
(16, 3, 'SUBSIDIES', '2015-10-19 16:58:02'),
(17, 3, 'Staff Development', '2015-10-19 16:58:17'),
(18, 2, 'REGULATORY', '2015-10-19 17:00:59');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `status` text,
  `created` varchar(20) DEFAULT NULL,
  `actions` text NOT NULL,
  `views` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `status`, `created`, `actions`, `views`) VALUES
(1, 'Administrator', 'true', '2015-10-15', 'Create edit delete', 'department objective '),
(2, 'Manager', 'true', NULL, '', ''),
(3, 'Super', 'true', '2015-10-15', 'create edit update delete cancel ', 'period management rates objective budget');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `subline`
--

INSERT INTO `subline` (`id`, `reportingID`, `name`, `description`, `created`) VALUES
(1, 2, 'Rental income  & car park', 'Rental income  & car park', '2015-09-20 19:28:21'),
(2, 9, 'Corporation tax provision ', '', '2015-09-20 19:30:32'),
(3, 7, 'CABINETS', '', '2015-09-20 19:39:05'),
(4, 7, 'CARPET', '', '2015-09-20 19:33:40'),
(5, 3, 'Salary', '', '2015-09-20 19:39:45'),
(6, 3, 'Acting Allowance', '', '2015-09-20 19:39:55'),
(7, 11, 'Motor Vehicles', 'Motor Vehicles', '2015-10-19 16:59:05'),
(8, 12, 'BUILDINGS-REMOTE STATIONS', '', '2015-10-19 16:59:48'),
(9, 12, 'BUILDINGS', '', '2015-10-19 17:00:01'),
(10, 1, 'Spectrum fees', '', '2015-10-19 17:01:45'),
(11, 1, 'Broadcasting services', '', '2015-10-19 17:01:54'),
(12, 1, 'Infrastructure Licence', '', '2015-10-19 17:02:27'),
(13, 1, 'Service Licence', '', '2015-10-19 17:02:47'),
(14, 1, 'Courier Licence', '', '2015-10-19 17:02:55'),
(15, 1, 'Satellite services', '', '2015-10-19 17:03:06'),
(16, 1, 'International Traffic', '', '2015-10-19 17:03:21'),
(17, 1, '1% Levy on Gross Annual Revenue', '', '2015-10-19 17:03:38'),
(18, 1, 'Other  licence', '', '2015-10-19 17:03:46'),
(19, 1, 'Realised revenue from deferred levy ', '', '2015-10-19 17:03:55');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

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
(15, 6, 'Procurement', '', '2015-09-20 10:01:17'),
(16, 10, 'Human Resources', '', '2015-10-19 17:52:41'),
(17, 10, 'Administration', '', '2015-10-19 17:52:48'),
(18, 10, 'Information Services', '', '2015-10-19 17:52:56'),
(19, 12, 'Communications', '', '2015-10-19 17:53:19'),
(20, 12, 'International Relations', '', '2015-10-19 17:53:25'),
(21, 12, 'Research & Development', '', '2015-10-19 17:53:31');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `name` text NOT NULL,
  `department` text NOT NULL,
  `contact` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` text NOT NULL,
  `active` text NOT NULL,
  `created` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `name`, `department`, `contact`, `password`, `role`, `active`, `created`, `image`) VALUES
(1, 'weredouglas@gmail.com', 'Douglas', 'TECHNOLOGY AND NETWORK SERVICES', '0782481746', 'W84/lVGdLPc5JvqSUOVlTxHFdf79nutqd1QU081rDrC/QIbvw886JSLxHTPnTRIA+XEsG3t8c76d6XfzXiCC/w==', 'Super', 'true', '2015-10-15', ''),
(2, 'mary@budget.com', 'Mary', 'Legal Department', '0712345913', 'iThw58wDWJJyBa4+/pErPwrn5vpZApC/nmpP26K809dXlMlRic0eJDPknYC42X3pFq1Dz10eT0rkuKJdu8dUcQ==', 'Administrator', 'false', '2015-10-12', 'Train_Sudan_towards_Wau.jpg'),
(3, 'douglas@novariss.com', 'Doug', 'BROADCASTING', '0772341678', 's5MFPTic4VV/Q/Q5nzbco9ZV0t+QeGoXgL7iBxUM1vuwjKSQxPTuuzzhW+RjfnmZ4SwKSE3zUSS1sV1hwDMW6Q==', 'Administrator', 'false', '2015-10-15', 'hamilton.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
