-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 09, 2021 at 02:09 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydiet`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(150) NOT NULL,
  `email` char(150) NOT NULL,
  `password` char(150) NOT NULL,
  `address` char(150) NOT NULL,
  `phone` char(150) NOT NULL,
  `role` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `role` (`role`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `address`, `phone`, `role`) VALUES
(1, 'admine1', 'admine1@mail.com', '74be16979710d4c4e7c6647856088456', 'alex', '1234567890123', 1),
(3, 'admin3', 'admin3@mail.com', 'fcea920f7412b5da7be0cf42b8c93759', 'cairo', '0123456789123', 2),
(4, 'admin1', 'amin1@mail.com', '25f9e794323b453885f5181f1b624d0b', 'alex', '01245378931245', 1),
(5, 'admin4', 'admin4@mail.com', '25f9e794323b453885f5181f1b624d0b', 'cairo', '01234521459871236', 2);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'fruits'),
(2, 'veg'),
(3, 'meat');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

DROP TABLE IF EXISTS `food`;
CREATE TABLE IF NOT EXISTS `food` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(150) NOT NULL,
  `protein` int(11) NOT NULL,
  `netcarb` int(11) NOT NULL,
  `fat` int(11) NOT NULL,
  `image` varchar(150) NOT NULL,
  `cat_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cat_id` (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `name`, `protein`, `netcarb`, `fat`, `image`, `cat_id`) VALUES
(4, 'orange', 4, 5, 3, '1617748557orange.jpg', 1),
(5, 'strawberry', 2, 3, 4, '1617748644strawberry.jpg', 1),
(6, 'tomato', 1, 1, 1, '1617807680hybrid-tomato-500x500.jpg', 2),
(8, 'fish', 2, 3, 4, '1617805994white-pomfret.jpg', 3),
(11, 'carrot', 1, 2, 3, '1617806553carrots.png', 2),
(12, 'chicken', 10, 3, 5, '1617972219clark-roast-chicken-square640-v4.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` char(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`) VALUES
(1, 'admin'),
(2, 'lower admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(150) NOT NULL,
  `email` char(150) NOT NULL,
  `password` char(150) NOT NULL,
  `address` text CHARACTER SET utf8mb4 NOT NULL,
  `phone` char(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `address`, `phone`) VALUES
(1, 'bosy', 'baqiwerowu@mailinator.com', '25f9e794323b453885f5181f1b624d0b', 'Autem saepe in est c', '14'),
(2, 'basma', 'basma@mail.com', 'e10adc3949ba59abbe56e057f20f883e', 'cairo', '14523789'),
(3, 'William Benton', 'wake@mailinator.com', 'fcea920f7412b5da7be0cf42b8c93759', 'Qui dolore commodi c', '3'),
(4, 'Daria', 'fitiwagega@mailinator.com', 'e10adc3949ba59abbe56e057f20f883e', 'Et odio distinctio', '85111111111111'),
(5, 'Karina Snyder', 'xibafedoxa@mailinator.com', '25f9e794323b453885f5181f1b624d0b', 'Sapiente in providen', '32123456789123'),
(17, 'Burke', 'gulywovem@mailinator.com', '25f9e794323b453885f5181f1b624d0b', 'Iusto sed ipsa debi', '4444444444444444444'),
(18, 'Teagan Sharpe', 'biveq@mailinator.com', 'bbb8aae57c104cda40c93843ad5e6db8', 'Inventore odit molli', '6814256398745');

-- --------------------------------------------------------

--
-- Table structure for table `usersfood`
--

DROP TABLE IF EXISTS `usersfood`;
CREATE TABLE IF NOT EXISTS `usersfood` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `food_id` (`food_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usersfood`
--

INSERT INTO `usersfood` (`id`, `user_id`, `food_id`) VALUES
(1, 1, 4),
(2, 2, 6),
(4, 2, 8),
(7, 17, 12),
(8, 17, 6),
(9, 18, 4);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_ibfk_1` FOREIGN KEY (`role`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `food_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `usersfood`
--
ALTER TABLE `usersfood`
  ADD CONSTRAINT `usersfood_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usersfood_ibfk_2` FOREIGN KEY (`food_id`) REFERENCES `food` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
