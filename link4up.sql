-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 12, 2015 at 07:25 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `link4up`
--
CREATE DATABASE IF NOT EXISTS `link4up` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `link4up`;

-- --------------------------------------------------------

--
-- Table structure for table `cat`
--

CREATE TABLE IF NOT EXISTS `cat` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` char(50) DEFAULT NULL,
  `cat_status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `cat`
--

INSERT INTO `cat` (`cat_id`, `cat_name`, `cat_status`) VALUES
(1, 'Mens Knitted Apparels', 1),
(2, 'Womens Knitted Apparels', 1),
(3, 'Mens Leather Apparels', 1),
(4, 'Mens Woven Apparels', 1),
(5, 'Home Furnishing', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=128 ;

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
(39, 15, 'Two Piece', 1),
(40, 6, 'Golf T-Shirts', 1),
(41, 6, 'Jogging Suits', 1),
(42, 6, 'Sports Jacket', 1),
(43, 6, 'Sports Shorts', 1),
(44, 6, 'Sports T-Shirts', 1),
(45, 6, 'Sports Uniform', 1),
(46, 11, 'Sports Wear', 1),
(47, 5, 'Night Suits', 1),
(48, 5, 'Nightwear Apparel', 1),
(49, 5, 'Pajamas', 1),
(50, 5, 'Sleepwear Suits', 1),
(51, 4, 'Cotton', 1),
(52, 4, 'Full Sleeve', 1),
(53, 4, 'Half Sleeve', 1),
(54, 4, 'Knitted', 1),
(55, 4, 'Polo Shirts', 1),
(56, 3, 'Bermudas', 1),
(57, 3, 'Boxer Briefs', 1),
(58, 3, 'Boxer Shorts', 1),
(59, 3, 'Pullovers', 1),
(60, 3, 'Shorts', 1),
(61, 3, 'Undergarments', 1),
(62, 2, 'Fancy T-Shirts', 1),
(63, 2, 'Fashion T-Shirts', 1),
(64, 2, 'Full Sleeve Polo T-Shirts', 1),
(65, 2, 'Half Sleeve Polo T-Shirts', 1),
(66, 2, 'Henley neck T-Shirts', 1),
(67, 2, 'Hooded Full Sleeve T-Shirts', 1),
(68, 2, 'Hooded Half sleeve T-Shirts', 1),
(69, 2, 'Hooded Sleeveless T-Shirts', 1),
(70, 2, 'Jackets', 1),
(71, 2, 'Nightwear', 1),
(72, 2, 'Pajamas', 1),
(73, 2, 'Printed T-Shirts', 1),
(74, 2, 'Round Neck T-Shirts', 1),
(75, 2, 'Short Sleeve T-Shirts', 1),
(76, 2, 'Shorts', 1),
(77, 2, 'Sleeveless T-Shirts', 1),
(78, 2, 'Sportswear', 1),
(79, 2, 'Sweatshirts', 1),
(80, 2, 'Tank Tops', 1),
(81, 2, 'V Neck T-Shirts', 1),
(82, 1, 'Nightwear', 1),
(83, 1, 'Rompers', 1),
(84, 1, 'Tank Tops', 1),
(85, 1, 'Tops', 1),
(86, 1, 'Two Piece', 1),
(87, 9, 'Cotton Jackets', 1),
(88, 9, 'Hooded Sweatshirts', 1),
(89, 9, 'Sleeveless Hooded Sweatshirts', 1),
(90, 9, 'Sweaters', 1),
(91, 9, 'Winter Jackets', 1),
(92, 9, 'Winter Wear', 1),
(93, 10, '3by4 Sleeve Tops', 1),
(94, 10, 'Camisoles', 1),
(95, 10, 'Cap Sleeve Tops', 1),
(96, 10, 'Casual Tops', 1),
(97, 10, 'Crew Neck Tops', 1),
(98, 10, 'Deep V Neck Tops', 1),
(99, 10, 'Designer Tops', 1),
(100, 10, 'Embroidered Tops', 1),
(101, 10, 'Fancy Tops', 1),
(102, 10, 'Fashion Tops', 1),
(103, 10, 'Full Sleeve Tops', 1),
(104, 10, 'Gowns', 1),
(105, 10, 'Half Sleeve Tops', 1),
(106, 10, 'Henley Tops', 1),
(107, 10, 'Knitted T-Shirts', 1),
(108, 10, 'Polo Full Sleeve', 1),
(109, 10, 'Polo Half Sleeves', 1),
(110, 10, 'Printed Tops', 1),
(111, 10, 'Raglan Sleeve', 1),
(112, 10, 'Round Neck Tops', 1),
(113, 10, 'Scoop Neck Tops', 1),
(114, 10, 'Short Sleeve Tops', 1),
(115, 10, 'Short Tops', 1),
(116, 10, 'Sleeveless Tops', 1),
(117, 10, 'Square Neck Tops', 1),
(118, 10, 'Striped Tops', 1),
(119, 10, 'Tank Tops', 1),
(120, 10, 'V Neck Tops', 1),
(121, 22, 'Bed Sheets', 1),
(122, 22, 'Bed Spreads', 1),
(123, 22, 'Curtains', 1),
(124, 22, 'Cushion Covers', 1),
(125, 22, 'Hammocks', 1),
(126, 22, 'Pillow Covers', 1),
(127, 23, 'Bath Robes', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `prod_id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_cat_id` int(11) DEFAULT NULL,
  `prod_subcat_id` int(11) DEFAULT NULL,
  `prod_precat_id` int(11) DEFAULT NULL,
  `prod_title` char(50) DEFAULT NULL,
  `prod_img` varchar(300) DEFAULT NULL,
  `prod_status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`prod_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_id`, `prod_cat_id`, `prod_subcat_id`, `prod_precat_id`, `prod_title`, `prod_img`, `prod_status`) VALUES
(3, 1, 1, 82, NULL, 'BBN-1.jpg', 1),
(4, 1, 1, 82, NULL, 'BBN-2.jpg', 1),
(5, 1, 1, 82, NULL, 'BBN-3.jpg', 1),
(6, 1, 1, 83, NULL, 'BBR-1.jpg', 1),
(7, 1, 1, 83, NULL, 'BBR-2.jpg', 1),
(8, 1, 1, 83, NULL, 'BBR-3.jpg', 1),
(10, 5, 22, 121, NULL, 'BST-1.jpg', 1),
(11, 5, 22, 121, NULL, 'BST-2.jpg', 1),
(12, 5, 22, 121, NULL, 'BST-3.jpg', 1),
(13, 5, 22, 122, NULL, 'BS-1.jpg', 1),
(14, 5, 22, 122, NULL, 'BS-2.jpg', 1),
(15, 5, 22, 122, NULL, 'BST-3.jpg', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

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
(15, 2, 'Baby Girl Apparels', 1),
(17, 3, 'Bikers Jackets', 1),
(18, 3, 'Jackets', 1),
(19, 3, 'Pants', 1),
(22, 5, 'Bed Linen', 1),
(23, 5, 'Fabrics', 1),
(24, 5, 'Kitchen Linen', 1),
(25, 5, 'Table Linen', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
