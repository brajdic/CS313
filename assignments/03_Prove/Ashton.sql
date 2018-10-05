-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 30, 2017 at 03:20 AM
-- Server version: 10.2.3-MariaDB
-- PHP Version: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `Ashton`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `usrId` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `quantity` int(30) NOT NULL DEFAULT 1,
  PRIMARY KEY (`quantity`),
  UNIQUE KEY `quantity` (`quantity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `categoryID` int(11) NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(30) NOT NULL,
  PRIMARY KEY (`categoryID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryID`, `categoryName`) VALUES
(1, 'Tops'),
(2, 'Bottoms'),
(3, 'Dresses'),
(4, 'Shoes'),
(5, 'Accessories');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `productID` int(11) NOT NULL AUTO_INCREMENT,
  `categoryID` int(11) NOT NULL,
  `listPrice` float NOT NULL,
  `salePrice` float NOT NULL,
  `onSale` tinyint(1) NOT NULL DEFAULT 0,
  `productSize` enum('small','medium','large') NOT NULL DEFAULT 'small',
  `productName` varchar(60) NOT NULL,
  `productCode` varchar(30) NOT NULL,
  `fullImagePath` varchar(120) NOT NULL,
  `smallImagePath` varchar(120) NOT NULL,
  PRIMARY KEY (`productID`),
  KEY `categoryID` (`categoryID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `categoryID`, `listPrice`, `salePrice`, `onSale`, `productSize`, `productName`, `productCode`, `fullImagePath`, `smallImagePath`) VALUES
(1, 1, 50, 25, 1, 'small', 'Cabel Knit Sweater', 'SWTR1', '<img src="/images/sweater2.png">', '<img src="/images/sweater.png">'),
(2, 1, 24.99, 14.99, 0, 'small', 'Fitted Croptop', 'CRPT1', '<img src="/images/croptop2.png">', '<img src="/images/croptop.png">'),
(3, 3, 60, 30, 1, 'small', 'Dress with cape', 'DRS1', '<img src="/images/dress2.png">', '<img src="/images/dress.png">'),
(4, 5, 12.99, 5.99, 0, 'small', 'Macrame Bracelet', 'BRCLT1', '<img src="/images/bracelet2.png">', '<img src="/images/bracelet.png">'),
(5, 4, 34.99, 20.99, 0, 'small', 'Sneakers', 'SNKS1', '<img src="/images/sneaks2.png">', '<img src="/images/sneaks.png">'),
(6, 4, 50.99, 25.99, 0, 'small', 'Platform Sandals', 'SHOE1', '<img src="/images/shoes2.png">', '<img src="/images/shoes.png">'),
(7, 5, 20.99, 15.99, 0, 'small', 'Ashton''s Bands', 'SNNI1', '<img src="/images/sunnies2.png">', '<img src="/images/sunnies.png">'),
(8, 2, 70.99, 50.99, 0, 'small', 'Maxi Skirt', 'MXKSIR1', '<img src="/images/maxiskirt2.png">', '<img src="/images/maxiskirt.png">');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `usrId` int(11) NOT NULL AUTO_INCREMENT,
  `usrFirstName` varchar(64) NOT NULL,
  `usrLastName` varchar(64) NOT NULL,
  `usrEmail` varchar(64) NOT NULL,
  `usrPasswd` varchar(128) NOT NULL,
  `usrPhone` int(20) NOT NULL,
  `usrZip` int(10) NOT NULL,
  `usrState` varchar(10) NOT NULL,
  `usrCity` varchar(30) NOT NULL,
  `usrAddress` varchar(64) NOT NULL,
  `usrName` varchar(64) NOT NULL,
  `usrType` enum('admin','user') NOT NULL DEFAULT 'user',
  PRIMARY KEY (`usrId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usrId`, `usrFirstName`, `usrLastName`, `usrEmail`, `usrPasswd`, `usrPhone`, `usrZip`, `usrState`, `usrCity`, `usrAddress`, `usrName`, `usrType`) VALUES
(1, 'system', 'system', 'admin@fbi.gov', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', 1111111111, 123521, 'na', 'na', 'na', 'sysadmin', 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
