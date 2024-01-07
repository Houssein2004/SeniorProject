-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2023 at 01:02 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `resto_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `password`) VALUES
('admin@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `cartID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `foodID` int(11) NOT NULL,
  `dealID` int(11) NOT NULL,
  `qtty` int(11) NOT NULL,
  PRIMARY KEY (`cartID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `deals`
--

CREATE TABLE IF NOT EXISTS `deals` (
  `dealID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) NOT NULL,
  `foodID` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `picture` varchar(1000) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`dealID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=165634376 ;

--
-- Dumping data for table `deals`
--

INSERT INTO `deals` (`dealID`, `name`, `foodID`, `discount`, `picture`, `startDate`, `endDate`, `description`) VALUES
(2656342, 'Christmas offers', 56558, 15, 'christmas-burger-food-menu-social-media-post-square-banner-template_123605-1548.jpg', '2023-12-01', '2023-12-31', 'Best offer for Christmas holidays: Save 50% and buy one big chicken burger!'),
(165634375, 'Christmas offers', 76558000, 20, 'christmas-pizza-menu-ads-design-template-e7fe316f79c0d92bcfa264865e54c215_screen.jpg', '2024-01-15', '2024-01-14', 'Hurry up and profit from one big pizza pepperoni for only 40$.');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `foodID` int(11) NOT NULL,
  `name` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `picture` varchar(100) NOT NULL,
  PRIMARY KEY (`foodID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`foodID`, `name`, `category`, `price`, `picture`) VALUES
(36558, 'Hamburger', 'Burger', 37, 'Hamburger-Patties-745x1024.jpg'),
(46558, 'Chocolate Cake', 'Sweets', 7, 'triple-chocolate-cake-4.jpg'),
(56558, 'Chicken Burger', 'Burger', 30, 'Chicken-Burgers-4.webp'),
(66558, 'Caffe Latte', 'Drinks', 20, '220629.webp'),
(86558, 'Cheese Burger', 'Burger', 60, 'download.jpg'),
(76558000, 'Pepperoni', 'Pizza', 56, 'pepperoni-.jpg'),
(2147483647, 'Nuggets Plate', 'Sandwiches', 43, 'Crispy Baked Chicken Nuggets[3].jpg');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `msgID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `msg` text NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `reply` text NOT NULL,
  `replyDate` date NOT NULL,
  `replyTime` time NOT NULL,
  PRIMARY KEY (`msgID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msgID`, `userID`, `msg`, `date`, `time`, `reply`, `replyDate`, `replyTime`) VALUES
(36561, 2654, 'hi', '2023-11-25', '14:43:59', '', '0000-00-00', '00:00:00'),
(46561, 2654, 'hello can I get the price list of pizza menu?\r\n', '2023-11-25', '13:47:43', 'yes sure', '2023-11-25', '14:42:20'),
(56561, 2654, 'hello again\r\n', '2023-11-25', '14:41:48', 'hello', '2023-11-25', '14:42:33');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `orderID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `foodID` varchar(2500) NOT NULL,
  `price` varchar(2500) NOT NULL,
  `qtty` varchar(2500) NOT NULL,
  `payment` varchar(100) NOT NULL,
  `cardNumber` int(11) NOT NULL,
  `cardExpiryDate` date NOT NULL,
  `city` varchar(100) NOT NULL,
  `street` varchar(1000) NOT NULL,
  `building` varchar(1000) NOT NULL,
  `discountedPrice` int(11) NOT NULL,
  `order_status` int(11) NOT NULL,
  `ordering_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `numberOfItems` int(11) NOT NULL,
  PRIMARY KEY (`orderID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `userID`, `foodID`, `price`, `qtty`, `payment`, `cardNumber`, `cardExpiryDate`, `city`, `street`, `building`, `discountedPrice`, `order_status`, `ordering_time`, `numberOfItems`) VALUES
(6655, 2654, 'a:2:{i:0;s:5:"86558";i:1;s:5:"56558";}', 'a:2:{i:0;i:60;i:1;i:60;}', 'a:2:{i:0;s:1:"1";i:1;s:1:"2";}', 'cash on delivery', 0, '0000-00-00', 'nabatieh', 'nabatieh', 'houssein', 125, 0, '2023-11-23 18:30:16', 2),
(8655, 2654, 'a:3:{i:0;s:5:"66558";i:1;s:5:"46558";i:2;s:8:"76558000";}', 'a:3:{i:0;i:36;i:1;i:42;i:2;i:56;}', 'a:3:{i:0;s:1:"2";i:1;s:1:"6";i:2;s:1:"1";}', 'credit card', 2147483647, '2024-06-29', 'nabatieh', 'nabatieh', 'ammar', 111, 1, '2023-11-23 18:39:10', 3),
(66568, 2654, 'a:1:{i:0;s:10:"2147483647";}', 'a:1:{i:0;i:86;}', 'a:1:{i:0;s:1:"2";}', 'credit card', 2147483647, '2023-12-09', 'Nabatieh', 'nabatieh', 'houssein', 82, 2, '2023-11-30 21:01:09', 1),
(66585, 2654, 'a:2:{i:0;s:5:"36558";i:1;s:5:"66558";}', 'a:2:{i:0;i:37;i:1;i:20;}', 'a:2:{i:0;s:1:"1";i:1;s:1:"1";}', 'cash on delivery', 0, '0000-00-00', 'Nabatieh', 'nabatieh', 'houssein', 56, 0, '2023-12-22 17:11:22', 2),
(76568, 2654, 'a:2:{i:0;s:5:"86558";i:1;s:5:"66558";}', 'a:2:{i:0;i:120;i:1;i:18;}', 'a:2:{i:0;s:1:"2";i:1;s:1:"1";}', 'cash on delivery', 0, '0000-00-00', 'Nabatieh', 'nabatieh', 'houssein', 129, 0, '2023-11-30 21:02:37', 2),
(2147483647, 2654, 'a:3:{i:0;s:8:"76558000";i:1;s:5:"56558";i:2;s:5:"46558";}', 'a:3:{i:0;i:112;i:1;i:60;i:2;i:21;}', 'a:3:{i:0;s:1:"2";i:1;s:1:"2";i:2;s:1:"3";}', 'credit card', 2147483647, '2023-12-09', 'Nabatieh', 'nabatieh', 'houssein', 198, 1, '2023-11-30 20:41:55', 3);

-- --------------------------------------------------------

--
-- Table structure for table `order_deals`
--

CREATE TABLE IF NOT EXISTS `order_deals` (
  `orderID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `dealID` int(11) NOT NULL,
  `city` varchar(100) NOT NULL,
  `street` varchar(100) NOT NULL,
  `building` varchar(100) NOT NULL,
  `payment` varchar(100) NOT NULL,
  `cardNumber` int(11) NOT NULL,
  `cardExpDate` date NOT NULL,
  `qtty` int(11) NOT NULL,
  `totalPrice` int(11) NOT NULL,
  `ordering_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`orderID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_deals`
--

INSERT INTO `order_deals` (`orderID`, `userID`, `dealID`, `city`, `street`, `building`, `payment`, `cardNumber`, `cardExpDate`, `qtty`, `totalPrice`, `ordering_time`, `status`) VALUES
(16564, 2654, 2656342, 'Nabatieh', 'nabatieh', 'houssein', 'credit card', 2147483647, '2024-06-01', 3, 82, '2023-11-27 21:21:34', 1),
(36568, 2654, 165634375, 'Nabatieh', 'nabatieh', 'houssein', 'cash on delivery', 0, '0000-00-00', 2, 95, '2023-11-30 21:19:35', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `coupon_code` varchar(100) NOT NULL,
  `discount` int(11) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5656203 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `firstName`, `lastName`, `email`, `phone`, `password`, `status`, `coupon_code`, `discount`) VALUES
(2654, 'houssein', 'mahdi', 'houssein@gmail.com', 70123456, '123456', 1, 'hm10', 10),
(5656202, 'Ali', 'Mahdi', 'ali@gmail.com', 70123123, '123456', 0, '0', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
