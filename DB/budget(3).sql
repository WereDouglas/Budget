-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2015 at 08:24 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=76 ;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `sublineID`, `name`, `number`, `line`, `created`) VALUES
(1, 3, 'Filing Cabinets', '1079100', 'B6001', '2015-09-20 20:18:43'),
(2, 3, 'Increase-Filing Cabinet', '1079200', 'B6001', '2015-09-20 20:20:32'),
(3, 9, 'Land & Building', '1001100', 'B6001', '2015-10-19 17:41:33'),
(4, 9, 'Land & Building- Remote Stn.', '1002100', 'B6001', '2015-10-19 17:42:14'),
(5, 1, 'Rental Income', '3101000', 'P1010', '2015-10-19 18:06:09'),
(6, 1, 'Parking Fees', '3102000', 'P1010', '2015-10-19 18:06:42'),
(8, 17, 'Levy', '3016000', 'P1007', '2015-10-21 01:08:40'),
(13, 11, 'Broadcasting Services', '3012000', 'P1002', '2015-10-21 01:18:10'),
(14, 14, 'Courier Licence', '3015000', 'P1005', '2015-10-21 01:19:05'),
(15, 12, 'Infrustructure Licence', '3013000', 'P1003', '2015-10-21 01:19:46'),
(16, 16, 'International traffic', '3016004', 'P1011', '2015-10-21 01:20:23'),
(17, 18, 'Major License', '3016002', 'P1008', '2015-10-21 01:21:21'),
(18, 18, 'Other  licence', '3016003', 'P1008', '2015-10-21 01:21:50'),
(19, 104, 'Deferred income', '3111002', 'P1009', '2015-10-21 01:27:06'),
(20, 15, 'Satellite Licence', '3015001', 'P1006', '2015-10-21 01:27:42'),
(21, 13, 'Internet Service', '3016001', 'P1004', '2015-10-21 01:28:22'),
(22, 13, 'Direct Cost Applied', '3301000', 'P1004', '2015-10-21 01:28:43'),
(23, 13, 'Cost of Goods Sold', '3302000', 'P1004', '2015-10-21 01:29:03'),
(24, 13, 'Inventory Adjustment Account', '3303000', 'P1004', '2015-10-21 01:29:25'),
(25, 13, 'Interim Stock Account', '3303001', 'P1004', '2015-10-21 01:29:51'),
(26, 13, 'COGS (Interim)', '3303002', 'P1004', '2015-10-21 01:30:14'),
(27, 10, 'Spectrum Fees', '3011000', 'P1001', '2015-10-21 01:32:10'),
(28, 21, 'Application Fees', '3106000', 'P1010', '2015-10-21 01:35:54'),
(29, 105, 'Realised Forex Gain / Losses', '3201000', 'P1010', '2015-10-21 01:39:53'),
(30, 105, 'Unrealised Forex Gains/Losses', '3202000', 'P1010', '2015-10-21 01:40:19'),
(31, 105, 'Gains/Losses on Sale of Assets', '3203000', 'P1010', '2015-10-21 01:40:42'),
(32, 23, 'Grants', '3108000', 'P1010', '2015-10-21 01:42:21'),
(33, 20, 'Interest Income', '3103000', 'P1010', '2015-10-21 01:43:06'),
(34, 24, 'Bad Debt Recoveries', '3104000', 'P1010', '2015-10-21 01:43:49'),
(35, 24, 'Accrued Income', '3105000', 'P1010', '2015-10-21 01:44:09'),
(36, 24, 'Customs & Eq. Clearence Fees', '3107000', 'P1010', '2015-10-21 01:44:31'),
(37, 24, 'Miscellaneous', '3111000', 'P1010', '2015-10-21 01:44:48'),
(38, 24, 'Discount Received', '3111001', 'P1010', '2015-10-21 01:45:07'),
(39, 22, 'Type Approval', '3107001', 'P1010', '2015-10-21 10:51:24'),
(40, 9, 'Building Under Construction', '1003100', 'B6001', '2015-10-21 10:54:02'),
(41, 9, 'Decrease-Building Under Constr', '1003300', 'B6001', '2015-10-21 12:20:25'),
(42, 9, 'Increase-Lift Stabilizers', '1028200', 'B6001', '2015-10-21 12:20:45'),
(43, 9, 'Decrease-Lift Stabilizers', '1028300', 'B6001', '2015-10-21 12:21:01'),
(44, 9, 'Accm Depn-Land and Building', '2601100', 'B6001', '2015-10-21 12:21:20'),
(45, 9, 'Accm Depn-Land & Build Rem Stn', '2601200', 'B6001', '2015-10-21 12:21:36'),
(46, 9, 'Accm Depn-Building Under Const', '2601300', 'B6001', '2015-10-21 12:21:54'),
(47, 8, 'Land & Building- Remote Stn.', '1002000', 'B6001', '2015-10-21 12:22:41'),
(48, 8, 'Increase- Buildings -Rem. St.', '1002200', 'B6001', '2015-10-21 12:22:58'),
(49, 8, 'Decrease- Buildings Rem. Stn.', '1002300', 'B6001', '2015-10-21 12:23:14'),
(50, 3, 'Decrease-Filing Cabinet', '1079300', 'B6001', '2015-10-21 12:24:43'),
(51, 3, 'Accm Depn-Filing Cabinets', '2602900', 'B6001', '2015-10-21 12:25:04'),
(52, 4, 'Carpets', '1080100', 'B6001', '2015-10-21 12:34:02'),
(53, 4, 'Increase-Carpets', '1080200', 'B6001', '2015-10-21 12:34:19'),
(54, 4, 'Decrease-Carpets', '1080300', 'B6001', '2015-10-21 12:34:34'),
(55, 4, 'Accm Depn-Carpets', '2603000', 'B6001', '2015-10-21 12:34:51'),
(56, 89, 'Office Chairs', '1077100', 'B6001', '2015-10-21 12:37:56'),
(57, 89, 'Increase-Office Chairs', '1077200', 'B6001', '2015-10-21 12:38:27'),
(58, 89, 'Decrease-Office Chairs', '1077300', 'B6001', '2015-10-21 12:38:50'),
(59, 89, 'Accm Depn-Office Chairs', '2602700', 'B6001', '2015-10-21 12:39:49'),
(60, 90, 'Fixtures', '1081100', 'B6001', '2015-10-21 12:42:45'),
(61, 90, 'Increase-Fixtures', '1081200', 'B6001', '2015-10-21 12:43:16'),
(62, 90, 'Decrease-Fixtures', '1081300', 'B6001', '2015-10-21 12:44:17'),
(63, 90, 'Sundry Furniture', '1083100', 'B6001', '2015-10-21 12:52:58'),
(64, 90, 'Increase-Sundry Furniture', '1083200', 'B6001', '2015-10-21 12:53:20'),
(65, 90, 'Decrease-Sundry Furniture', '1083300', 'B6001', '2015-10-21 12:53:45'),
(66, 90, 'Accm Depn-Fixtures', '2603100', 'B6001', '2015-10-21 12:54:23'),
(67, 90, 'Accm Depn-Sundry Furnitures', '2603200', 'B6001', '2015-10-21 12:54:49'),
(68, 91, 'Safes', '1078100', 'B6001', '2015-10-21 12:55:59'),
(69, 91, 'Increase-Safes', '1078200', 'B6001', '2015-10-21 12:56:12'),
(70, 91, 'Decrease Safes', '1078300', 'B6001', '2015-10-21 12:56:39'),
(71, 91, 'Accm Depn-Safes', '2602800', 'B6001', '2015-10-21 12:56:54'),
(72, 0, 'Office Desks', '1076100', 'B6001', '2015-10-21 12:58:00'),
(73, 0, 'Increase-Office Desks', '1076200', 'B6001', '2015-10-21 12:58:26'),
(74, 0, 'Decrease-Office Desks', '1076300', 'B6001', '2015-10-21 12:59:27'),
(75, 0, 'Accm Depn-Office Desks', '2602600', 'B6001', '2015-10-21 12:59:50');

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
(1, NULL, 'INCOME', '', '2015-10-21 00:27:30'),
(2, NULL, 'OPEX RECURRENT', '', '2015-10-21 00:35:23'),
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

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
(20, 1, '% of identified & mitigated  risks', 'Identify and mitigate operational risks\r\n', '2015-10-19 18:00:45'),
(21, 3, 'Enhance compliance to sector regulations', '% of  confirmed regulation breaches\r\n', '2015-10-21 00:19:31'),
(22, 3, 'Identify and address market constraints that impact on competition', '% of market constrains identified & addressed\r\n', '2015-10-21 00:19:56'),
(23, 3, 'Facilitate investment in the sector to promote human capital development', 'Value of investment in the sector on HR devt\r\n', '2015-10-21 00:20:08'),
(24, 5, 'Develop the Communications sector CERT', '% of CERT Operational capability \r\n', '2015-10-21 00:21:26'),
(25, 5, 'Ensure the delivery of appropriate broadcast content', '% of Local content quota compliance \r\n', '2015-10-21 00:21:41'),
(26, 5, 'Promote the health and safety of consumers of communication services', 'Consumer satisfaction survey score\r\n', '2015-10-21 00:21:55'),
(27, 5, 'Ensure provision of quality services across technologies & communication platform', 'QoS  complinace score\r\n', '2015-10-21 00:22:12'),
(28, 5, 'Improve availability and transparency of information to consumers', 'Consumer Satisfaction survey score\r\n', '2015-10-21 00:22:31'),
(29, 5, 'Undertake stakeholder consultation, engagement and sensitisation processes', '# of Consultations & engagement undertaken\r\n', '2015-10-21 00:23:02'),
(30, 5, 'Develop and strengthen partnerships with relevant organizations', ' % of partners committed to MOU terms\r\n', '2015-10-21 00:23:18');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `instance`
--

INSERT INTO `instance` (`id`, `orgID`, `content`, `created`, `by`, `period`, `department`, `unit`, `initiative`, `startdate`, `enddate`, `account`, `total`) VALUES
(6, 0, '{"period":"2011\\/2012","department":"Legal Department","unit":"Licensing ","activity":"Development","output":"Development","outcome":"Development","objective":"SO1","initiative":"Review and develop the provision of universal postal services","performance":"% of national digital coverage","starts":"2015-02-09","ends":"2015-10-07","Procurement type":"GOODS","category":"DEVELOPMENT","line":"FURNITURE","subline":"CABINETS","account":"1079100","funding":"Internal","account description":"Development","unit of measure":"Number","currency":"USD","rate":"3550","price":"120","qty":"70","persons":"1","freq":"1","priceL":"426000","total":"8400","cash flow":"-","totalL":"29820000","radio":"auto","variance":"","cost generation":"","January":"","February":"3727500","March":"3727500","April":"3727500","May":"3727500","June":"3727500","July":"3727500","August":"3727500","September":"3727500","October":"3727500","November":"","December":"","Quarter1":"12425001242500","Quarter2":"124250012425001240000","Quarter3":"124250012425001240000","Quarter4":"1242500","services":"Development","activity details":"Development","Year":"Development"}', '2015-10-13 16:44:11', 'weredouglas@gmail.com', '2015/2016', 'Legal Department', 'Licensing ', 'Review and develop the provision of universal postal services', '2015-02-09', '2015-10-07', '1079100', '29820000'),
(7, 0, '{"period":"2019\\/2020","department":"HUMAN RESOURCES & ADMIN","unit":"Administration","activity":"Service Charge\\r\\n","output":"","outcome":"","objective":"SO5","initiative":"Review & Develop policies to ensure best practice of business process","performance":"% of Operation policies reviewed \\/developed","starts":"2019-07-01","ends":"2020-06-01","Procurement type":"N\\/A","category":"DEVELOPMENT","line":"FURNITURE","subline":"CABINETS","account":"1079200","funding":"External","account description":" Rental Income ","unit of measure":"Lumpsun","currency":"USD","rate":"3550","price":" 284131.73 ","qty":"1","persons":"1","freq":"1","priceL":"1008667641.4999999","total":"284131.73","cash flow":"-","totalL":"1008667641.4999999","radio":"auto","services":"Service Charge COMM HSE","activity details":"Service Charge COMM HSE","Year":"2020","variance":"","cost generation":"","January":"","February":"","March":"","April":"","May":"","June":"","July":"","August":"","September":"","October":"","November":"","December":"","Quarter1":"","Quarter2":"","Quarter3":"","Quarter4":""}', '2015-10-19 19:37:52', 'weredouglas@gmail.com', '2019/2020', 'HUMAN RESOURCES & ADMIN', 'Administration', 'Review & Develop policies to ensure best practice of business process', '2019-07-01', '2020-06-01', '1079200', '1008667641.4999999'),
(8, 0, '{"period":"2019\\/2020","department":"HUMAN RESOURCES & ADMIN","unit":"Administration","activity":"Service Charge\\r\\n","output":"","outcome":"","objective":"SO5","initiative":"Review & Develop policies to ensure best practice of business process","performance":"% of Operation policies reviewed \\/developed","starts":"2019-07-01","ends":"2020-06-01","Procurement type":"N\\/A","category":"DEVELOPMENT","line":"FURNITURE","subline":"CABINETS","account":"1079200","funding":"External","account description":" Rental Income ","unit of measure":"Lumpsun","currency":"USD","rate":"3550","price":" 284131.73 ","qty":"1","persons":"1","freq":"1","priceL":"1008667641.4999999","total":"284131.73","cash flow":"-","totalL":"1008667641.4999999","radio":"auto","services":"Service Charge COMM HSE","activity details":"Service Charge COMM HSE","Year":"2020","variance":"","cost generation":"","January":"","February":"","March":"","April":"","May":"","June":"","July":"","August":"","September":"","October":"","November":"","December":"","Quarter1":"","Quarter2":"","Quarter3":"","Quarter4":""}', '2015-10-19 19:39:28', 'weredouglas@gmail.com', '2019/2020', 'HUMAN RESOURCES & ADMIN', 'Administration', 'Review & Develop policies to ensure best practice of business process', '2019-07-01', '2020-06-01', '1079200', '1008667641.4999999'),
(9, 0, '{"period":"2019\\/2020","department":"HUMAN RESOURCES & ADMIN","unit":"Administration","activity":"Service Charge\\r\\n","output":"","outcome":"","objective":"SO5","initiative":"Review & Develop policies to ensure best practice of business process","performance":"% of Operation policies reviewed \\/developed","starts":"2019-01-15","ends":"2019-12-17","Procurement type":"N\\/A","category":"DEVELOPMENT","line":"FURNITURE","subline":"CABINETS","account":"1079200","funding":"External","account description":" Rental Income ","unit of measure":"Lumpsun","currency":"USD","rate":"3550","price":" 284131.73 ","qty":"1","persons":"1","freq":"1","priceL":"1008667641.4999999","total":"284131.73","cash flow":"-","totalL":"1008667641.4999999","radio":"auto","services":"Service Charge COMM HSE","activity details":"Service Charge COMM HSE","Year":"2020","variance":"","cost generation":"","January":"91697058.31818181","February":"91697058.31818181","March":"91697058.31818181","April":"91697058.31818181","May":"91697058.31818181","June":"91697058.31818181","July":"91697058.31818181","August":"91697058.31818181","September":"91697058.31818181","October":"91697058.31818181","November":"91697058.31818181","December":"91697058.31818181","Quarter1":"Infinity","Quarter2":"","Quarter3":"","Quarter4":""}', '2015-10-19 19:42:30', 'weredouglas@gmail.com', '2019/2020', 'HUMAN RESOURCES & ADMIN', 'Administration', 'Review & Develop policies to ensure best practice of business process', '2019-01-15', '2019-12-17', '1079200', '1008667641.4999999'),
(10, 0, '{"period":"2015\\/2016","department":"FINANCE & IT","unit":"Information Technology","activity":"x","output":"x","outcome":"x","objective":"SO5","initiative":"Promote Corporate Visibility\\r\\n","performance":"% of identified & mitigated  risks","starts":"2015-09-01","ends":"2016-08-31","Procurement type":"SERVICES","category":"INCOME","line":"REVENUE","subline":"Other  licence","account":"3016003","funding":"Internal","account description":"xxx","unit of measure":"session","currency":"USD","rate":"3550","price":"2000","qty":"1","persons":"1","freq":"12","priceL":"7100000","total":"2000","cash flow":"","totalL":"7100000","radio":"auto","services":"xxx","activity details":"xxx","Year":"2015","variance":"","cost generation":"","January":"","February":"","March":"","April":"","May":"","June":"","July":"","August":"","September":"","October":"","November":"","December":"","Quarter1":"","Quarter2":"","Quarter3":"","Quarter4":""}', '2015-10-21 13:11:03', 'mnkanika@afenet.net', '2015/2016', 'FINANCE & IT', 'Information Technology', 'Promote Corporate Visibility\n', '2015-09-01', '2016-08-31', '3016003', '7100000'),
(11, 0, '{"period":"2015\\/2016","department":"FINANCE & IT","unit":"Information Technology","activity":"x","output":"x","outcome":"x","objective":"SO5","initiative":"Promote Corporate Visibility\\r\\n","performance":"% of identified & mitigated  risks","starts":"2015-09-01","ends":"2016-08-31","Procurement type":"SERVICES","category":"INCOME","line":"REVENUE","subline":"Other  licence","account":"3016003","funding":"Internal","account description":"xxx","unit of measure":"session","currency":"USD","rate":"3550","price":"2000","qty":"1","persons":"1","freq":"12","priceL":"7100000","total":"2000","cash flow":"","totalL":"7100000","radio":"auto","services":"xxx","activity details":"xxx","Year":"2015","variance":"","cost generation":"","January":"","February":"","March":"","April":"","May":"","June":"","July":"","August":"","September":"","October":"","November":"","December":"","Quarter1":"","Quarter2":"","Quarter3":"","Quarter4":""}', '2015-10-21 13:11:07', 'mnkanika@afenet.net', '2015/2016', 'FINANCE & IT', 'Information Technology', 'Promote Corporate Visibility\n', '2015-09-01', '2016-08-31', '3016003', '7100000');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `rate`
--

INSERT INTO `rate` (`id`, `orgID`, `currency`, `rate`, `created`) VALUES
(2, NULL, 'USD', '3550', '2015-09-20 20:54:33'),
(3, NULL, 'EURO', '4040', '2015-10-19 17:30:25'),
(4, NULL, 'GBP', '5030', '2015-10-17 13:25:20'),
(5, NULL, 'UGX', '1', '2015-10-19 17:30:11'),
(6, NULL, 'Ksh', '40', '2015-10-21 14:36:11');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=106 ;

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
(17, 1, 'One Percent Levy on Gross Annual Revenue', '', '2015-10-21 01:05:01'),
(18, 1, 'Other  licence', '', '2015-10-19 17:03:46'),
(20, 2, 'Interest income', '', '2015-10-21 00:33:29'),
(21, 2, 'Application fee', '', '2015-10-21 00:33:36'),
(22, 2, 'Type approval', '', '2015-10-21 00:33:46'),
(23, 2, 'IDA Grants', '', '2015-10-21 00:33:53'),
(24, 2, 'Miscellaneous income', '', '2015-10-21 00:34:01'),
(26, 4, 'Commissioner''s Retainer', '', '2015-10-21 00:36:36'),
(27, 4, 'Foreign Travel', '', '2015-10-21 00:36:44'),
(28, 4, 'Local Travel', '', '2015-10-21 00:36:51'),
(29, 4, 'Printing and Stationery', '', '2015-10-21 00:37:00'),
(30, 4, 'Newspaper, Periodical & Magazines', '', '2015-10-21 00:37:12'),
(31, 4, 'Office Cleaning', '', '2015-10-21 00:37:21'),
(32, 4, 'Communications', '', '2015-10-21 00:37:28'),
(33, 4, 'Conference Expenses', '', '2015-10-21 00:37:36'),
(34, 4, 'Advertisement & Business Promo', '', '2015-10-21 00:37:42'),
(35, 4, 'Insurance', '', '2015-10-21 00:37:49'),
(36, 4, 'Security', '', '2015-10-21 00:37:57'),
(37, 4, 'Water', '', '2015-10-21 00:38:04'),
(38, 4, 'Electricity', '', '2015-10-21 00:38:11'),
(39, 4, 'Donations', '', '2015-10-21 00:38:21'),
(40, 4, 'Office Refreshments', '', '2015-10-21 00:38:27'),
(41, 4, 'Entertainment', '', '2015-10-21 00:40:25'),
(42, 4, 'Meetings', '', '2015-10-21 00:40:35'),
(43, 4, 'Audit  expenses / Investigations', '', '2015-10-21 00:40:41'),
(44, 4, 'Rent field offices', '', '2015-10-21 00:40:49'),
(45, 4, 'Film Industry propmotion', '', '2015-10-21 00:40:56'),
(46, 4, 'Legal Fees', '', '2015-10-21 00:41:05'),
(47, 4, 'Consultancy fees', '', '2015-10-21 00:41:14'),
(48, 4, 'Subscriptions ', '', '2015-10-21 00:41:21'),
(49, 4, 'Research and Development', '', '2015-10-21 00:41:28'),
(50, 4, 'Bad  debt provision', '', '2015-10-21 00:41:36'),
(51, 5, 'Building maintenance ', '', '2015-10-21 00:42:21'),
(52, 5, 'Vehicle Running & maintenance', '', '2015-10-21 00:42:29'),
(53, 5, 'Plant & Equipment maintenance', '', '2015-10-21 00:42:36'),
(54, 5, 'Ground/Property rates', '', '2015-10-21 00:42:44'),
(55, 5, 'Legal Fees', '', '2015-10-21 00:42:50'),
(56, 5, 'Consultancy fees', '', '2015-10-21 00:42:57'),
(57, 18, 'Local Travel', '', '2015-10-21 00:43:31'),
(58, 18, 'Conference Expenses', '', '2015-10-21 00:43:39'),
(59, 18, 'Advertisement & Business Promo', '', '2015-10-21 00:43:47'),
(60, 18, 'Research and Development', '', '2015-10-21 00:43:58'),
(61, 18, 'Foreign Travel', '', '2015-10-21 00:44:05'),
(62, 18, 'Printing and Stationery', '', '2015-10-21 00:44:12'),
(63, 18, 'Legal Fees', '', '2015-10-21 00:44:19'),
(64, 18, 'Consultancy fees', '', '2015-10-21 00:44:25'),
(65, 18, 'Audit  expenses / Investigations', '', '2015-10-21 00:44:31'),
(66, 18, 'Vehicle Running & maintenance', '', '2015-10-21 00:44:36'),
(67, 6, 'Loan Interest', '', '2015-10-21 00:46:56'),
(68, 6, 'Bank & LC charges', '', '2015-10-21 00:47:03'),
(69, 3, 'Gratuity', '', '2015-10-21 00:48:02'),
(70, 3, 'Social Security Contribution', '', '2015-10-21 00:48:09'),
(71, 3, 'Hired Labour', '', '2015-10-21 00:48:15'),
(72, 3, 'Staff welfare costs', '', '2015-10-21 00:48:22'),
(73, 3, 'Uniforms', '', '2015-10-21 00:48:27'),
(74, 3, 'Overtime', '', '2015-10-21 00:48:35'),
(75, 3, 'Provident fund', '', '2015-10-21 00:48:43'),
(76, 3, 'Leave Pay', '', '2015-10-21 00:48:50'),
(77, 10, 'AIRCONDITIONER', '', '2015-10-21 00:51:03'),
(78, 10, 'GENERATOR', '', '2015-10-21 00:51:09'),
(79, 10, 'COMPUTER', '', '2015-10-21 00:51:18'),
(80, 10, 'CONFERENCE EQUIPMENT', '', '2015-10-21 00:51:38'),
(81, 10, 'FAX', '', '2015-10-21 00:51:44'),
(82, 10, 'PHOTOCOPIER', '', '2015-10-21 00:51:49'),
(83, 10, 'PRINTER', '', '2015-10-21 00:51:56'),
(84, 10, 'UPS', '', '2015-10-21 00:52:05'),
(85, 10, 'TECH/EQ/SP', '', '2015-10-21 00:52:17'),
(86, 10, 'TEL/EQUIP', '', '2015-10-21 00:52:24'),
(87, 10, 'SUNDRY/EQ', '', '2015-10-21 00:52:31'),
(88, 10, 'OTHER/EQ', '', '2015-10-21 00:52:38'),
(89, 7, 'CHAIR', '', '2015-10-21 00:53:38'),
(90, 7, 'FIXTURE', '', '2015-10-21 00:53:45'),
(91, 7, 'SAFES', '', '2015-10-21 00:53:51'),
(92, 7, 'TABLES', '', '2015-10-21 00:54:00'),
(93, 7, 'SUNDRY/FURNITURE', '', '2015-10-21 00:54:14'),
(94, 8, 'LOOSE/TOOL', '', '2015-10-21 00:55:04'),
(95, 13, 'LAND - REMOTE STATIONS', '', '2015-10-21 00:56:19'),
(96, 13, 'LAND ', '', '2015-10-21 00:56:30'),
(97, 14, 'INVESTMENT PROPERTY', '', '2015-10-21 00:57:05'),
(98, 15, 'Software', '', '2015-10-21 00:57:53'),
(99, 16, 'Grants expense', '', '2015-10-21 00:58:47'),
(100, 16, 'ICT Subsidies', '', '2015-10-21 00:58:56'),
(101, 16, 'IDA Grants', '', '2015-10-21 00:59:04'),
(102, 17, 'Staff Training', '', '2015-10-21 00:59:52'),
(103, 17, 'Consultancy fees', '', '2015-10-21 00:59:57'),
(104, 1, 'Realised revenue from deferred levy', '', '2015-10-21 01:26:29'),
(105, 2, 'Exchange gains or loss', '', '2015-10-21 01:38:31');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`id`, `departmentID`, `name`, `details`, `created`) VALUES
(10, 2, 'Spectrum Management', 'Spectrum Management', '2015-09-20 09:59:28'),
(11, 2, 'Postal regulation', '', '2015-09-20 09:59:40'),
(12, 2, 'Telecoms & Broadcasting', '', '2015-09-20 09:59:50'),
(13, 6, 'Legal Affairs', '', '2015-09-20 10:00:54'),
(14, 6, 'Licensing  ', 'Licensing  ', '2015-10-21 00:05:41'),
(15, 6, 'Procurement', '', '2015-09-20 10:01:17'),
(16, 10, 'Human Resources', '', '2015-10-19 17:52:41'),
(17, 10, 'Administration', '', '2015-10-19 17:52:48'),
(18, 10, 'Information Services', '', '2015-10-19 17:52:56'),
(19, 12, 'Communications', '', '2015-10-19 17:53:19'),
(20, 12, 'International Relations', '', '2015-10-19 17:53:25'),
(21, 12, 'Research & Development', '', '2015-10-19 17:53:31'),
(23, 4, 'Broadcasting', 'Broadcasting', '2015-10-21 00:03:39'),
(24, 7, 'Finance & Accounting', '', '2015-10-21 00:06:25'),
(25, 7, 'Information Technology', '', '2015-10-21 00:06:42'),
(26, 8, 'Rural Communication Development Fund', '', '2015-10-21 00:07:56'),
(27, 9, 'Economic Regulation', '', '2015-10-21 00:08:25'),
(28, 9, 'Consumer Affairs', '', '2015-10-21 00:08:40'),
(29, 9, 'Regionla Offices', '', '2015-10-21 00:08:55');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `name`, `department`, `contact`, `password`, `role`, `active`, `created`, `image`) VALUES
(1, 'weredouglas@gmail.com', 'Douglas', 'TECHNOLOGY AND NETWORK SERVICES', '0782481746', 'W84/lVGdLPc5JvqSUOVlTxHFdf79nutqd1QU081rDrC/QIbvw886JSLxHTPnTRIA+XEsG3t8c76d6XfzXiCC/w==', 'Super', 'true', '2015-10-15', ''),
(2, 'mary@budget.com', 'Mary', 'Legal Department', '0712345913', 'iThw58wDWJJyBa4+/pErPwrn5vpZApC/nmpP26K809dXlMlRic0eJDPknYC42X3pFq1Dz10eT0rkuKJdu8dUcQ==', 'Administrator', 'false', '2015-10-12', 'Train_Sudan_towards_Wau.jpg'),
(3, 'douglas@novariss.com', 'Doug', 'BROADCASTING', '0772341678', 's5MFPTic4VV/Q/Q5nzbco9ZV0t+QeGoXgL7iBxUM1vuwjKSQxPTuuzzhW+RjfnmZ4SwKSE3zUSS1sV1hwDMW6Q==', 'Administrator', 'false', '2015-10-15', 'hamilton.jpg'),
(4, 'mnkanika@afenet.net', 'Michael Nkanika', 'FINANCE & IT', '000256775961273', 'TYcKLRvjPvbWbfIKmvklnU1Il6yp/yVMa9ZweQTTAUsbpjgg80A9KIieiRVCo/PaVTL7XuW2+glyEIrTYrde5g==', 'Administrator', 'false', '2015-10-21', 'me.jpg'),
(5, 'gkkakala@gmail.com', 'Godfrey Kakala', 'INTERNAL AUDIT ', '0772524288', 'xn/Ku3CiLN79YDZf35jJficppme0JeHe/bYqJTLdqQHRynE8MrKmV3OZrCEIvLQhBo0nb5QTJEJH2ICS+RSzmA==', 'Administrator', 'false', '2015-10-21', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
