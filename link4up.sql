-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2015 at 05:57 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `link4up`
--

-- --------------------------------------------------------

--
-- Table structure for table `cat`
--

CREATE TABLE IF NOT EXISTS `cat` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` char(50) DEFAULT NULL,
  `cat_status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cat`
--

INSERT INTO `cat` (`cat_id`, `cat_name`, `cat_status`) VALUES
(1, 'Mens Knitted Apparels', 1),
(2, 'Womens Knitted Apparels', 1);

-- --------------------------------------------------------

--
-- Table structure for table `precat`
--

CREATE TABLE IF NOT EXISTS `precat` (
  `precat_id` int(11) NOT NULL AUTO_INCREMENT,
  `pre_subcat_id` int(5) NOT NULL,
  `pre_catname` char(50) DEFAULT NULL,
  `pre_catstatus` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`precat_id`),
  KEY `precat_id` (`precat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `precat`
--

INSERT INTO `precat` (`precat_id`, `pre_subcat_id`, `pre_catname`, `pre_catstatus`) VALUES
(1, 8, 'Cotton Jackets', 1),
(2, 8, 'Cotton Sweatshirts', 1),
(3, 8, 'Hooded Sweatshirts', 1),
(4, 8, 'Sweaters', 1),
(5, 8, 'Winter Jackets', 1),
(6, 8, 'Winter Wear', 1),
(7, 7, 'Casual', 1),
(8, 7, 'Corporate', 1),
(9, 7, 'Cotton', 1),
(10, 7, 'Crew Neck', 1),
(11, 7, 'Deep V Neck', 1),
(12, 7, 'Designer', 1),
(13, 7, 'Embroidered', 1),
(14, 7, 'Fancy', 1),
(15, 7, 'Fashion', 1),
(16, 7, 'Full Sleeve', 1),
(17, 7, 'Half Sleeve', 1),
(18, 7, 'Henley', 1),
(19, 7, 'Muscle Sleeve', 1),
(20, 7, 'Printed', 1),
(21, 7, 'Promotional', 1),
(22, 7, 'Raglan Sleeve', 1),
(23, 7, 'Round Neck', 1),
(24, 7, 'Scoop Neck', 1),
(25, 7, 'Short Sleeve', 1),
(26, 7, 'Sleeveless', 1),
(27, 7, 'Square Neck', 1),
(28, 7, 'Striped', 1),
(29, 7, 'Tank Tops', 1),
(30, 7, 'V-Neck', 1),
(31, 7, 'Yarn Dyed', 1),
(32, 15, 'Camisole Tops', 1),
(33, 15, 'Frocks', 1),
(34, 15, 'Gown', 1),
(35, 15, 'Halter Neck', 1),
(36, 15, 'Skirts', 1),
(37, 15, 'Sleepwear', 1),
(38, 15, 'Tops', 1),
(39, 15, 'Two Piece', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `prod_id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_precat_id` int(11) DEFAULT NULL,
  `prod_title` char(50) DEFAULT NULL,
  `prod_img` varchar(300) DEFAULT NULL,
  `prod_status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`prod_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_id`, `prod_precat_id`, `prod_title`, `prod_img`, `prod_status`) VALUES
(1, 39, 'GTP 1', 'GTP-1.jpg', 1),
(2, 39, 'GTP 2', 'GTP-2.jpg', 1),
(3, 39, 'GTP 3', 'GTP-3.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subcat`
--

CREATE TABLE IF NOT EXISTS `subcat` (
  `subcat_id` int(11) NOT NULL AUTO_INCREMENT,
  `subcat_cat_id` int(5) NOT NULL,
  `subcat_name` char(50) DEFAULT NULL,
  `subcat_status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`subcat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `subcat`
--

INSERT INTO `subcat` (`subcat_id`, `subcat_cat_id`, `subcat_name`, `subcat_status`) VALUES
(1, 1, 'Baby Boys Apparels', 1),
(2, 1, 'Boys Apparels', 1),
(3, 1, 'Mens Clothing', 1),
(4, 1, 'Mens Polo T-Shirts', 1),
(5, 1, 'Mens Sleepwear', 1),
(6, 1, 'Mens Sports Wear', 1),
(7, 1, 'Mens T-Shirts', 1),
(8, 1, 'Mens Winter Wear', 1),
(9, 2, 'Ladies Winter Wear', 1),
(10, 2, 'Ladies Wear', 1),
(11, 2, 'Ladies Sports Wear', 1),
(12, 2, 'Ladies Sleepwear', 1),
(13, 2, 'Ladies Clothing', 1),
(14, 2, 'Girls Apparels', 1),
(15, 2, 'Baby Girl Apparels', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
