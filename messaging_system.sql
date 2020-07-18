-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jul 18, 2020 at 08:53 PM
-- Server version: 5.7.28
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `messaging_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

DROP TABLE IF EXISTS `companies`;
CREATE TABLE IF NOT EXISTS `companies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `phone` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'no type',
  `company` varchar(255) NOT NULL DEFAULT 'No Company',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `password`, `phone`, `type`, `company`) VALUES
(1, 'admin', 'admin@admin.admin', 'admin', '7777777', 'no type', 'Admin Company'),
(2, 'Hamza', 'hamza@hamza.hamza', '123', '123456', 'no type', 'HM Company'),
(3, 'Ahmed', 'ahmed@ahmed.ahmed', '123456', '5555', 'no type', 'Ahmed copany');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_id` int(11) NOT NULL DEFAULT '0',
  `send_from` varchar(255) NOT NULL DEFAULT 'me@me.me',
  `send_to` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `read_by` varchar(255) DEFAULT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  `attachments` varchar(255) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `contact_id`, `send_from`, `send_to`, `title`, `content`, `read_by`, `parent`, `attachments`, `created_date`) VALUES
(1, 2, 'admin@admin.admin', '1', 'Testing', 'This is Testing This is Testing This is Testing This is Testing This is Testing This is Testing This is Testing This is Testing This is Testing This is Testing This is Testing This is Testing This is Testing This is Testing This is Testing', NULL, 0, NULL, '2020-07-18 20:29:42'),
(2, 1, 'admin@admin.admin', '2', 'Sending email', 'TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST', NULL, 0, NULL, '2020-07-18 20:39:16'),
(3, 3, 'ahmed@ahmed.ahmed', '2', 'TestingTest', 'This is a Test Message This is a Test Message This is a Test Message This is a Test Message This is a Test Message This is a Test Message This is a Test Message', NULL, 0, NULL, '2020-07-18 20:50:01'),
(4, 3, 'ahmed@ahmed.ahmed', '3', 'Sending email', 'Sending email Test Sending email Test Sending email Test Sending email Test Sending email Test Sending email Test Sending email Test Sending email Test', NULL, 0, NULL, '2020-07-18 20:50:29'),
(6, 1, 'admin@admin.admin', '2', 'TEST Test TEST', 'TEST Test TEST TEST Test TEST TEST Test TEST TEST Test TEST TEST Test TEST TEST Test TEST TEST Test TEST TEST Test TEST TEST Test TEST TEST Test TEST TEST Test TEST', NULL, 0, NULL, '2020-07-18 20:52:24');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
