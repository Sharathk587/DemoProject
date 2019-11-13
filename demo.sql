-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Nov 13, 2019 at 12:48 PM
-- Server version: 10.3.12-MariaDB
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_post`
--
CREATE DATABASE IF NOT EXISTS `blog_post` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `blog_post`;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_name` varchar(255) NOT NULL,
  `post_message` varchar(255) NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `post_name`, `post_message`, `post_tags`, `created_on`) VALUES
(8, 'sadfs', 'asdfsd', 'asdfsdfg', '2019-11-07 11:19:46');
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
--
-- Database: `training`
--
CREATE DATABASE IF NOT EXISTS `training` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `training`;

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

DROP TABLE IF EXISTS `userdata`;
CREATE TABLE IF NOT EXISTS `userdata` (
  `userid` varchar(225) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(225) NOT NULL,
  `logintime` time(6) NOT NULL,
  `logouttime` time(6) DEFAULT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`userid`, `id`, `username`, `logintime`, `logouttime`, `date`) VALUES
('1', 1, 'sharath', '09:48:49.000000', '09:48:53.000000', '2019-11-13'),
('1', 2, 'sharath', '09:49:05.000000', '09:49:40.000000', '2019-11-13'),
('123', 3, 'chethan', '09:50:26.000000', '09:51:59.000000', '2019-11-13'),
('123', 4, 'manoj', '09:52:04.000000', '10:56:29.000000', '2019-11-13'),
('1', 5, 'sharath', '13:14:34.000000', '13:16:13.000000', '2019-11-13'),
('123', 6, 'manoj', '13:16:23.000000', '13:19:01.000000', '2019-11-13'),
('1', 7, 'sharath', '13:35:21.000000', NULL, '2019-11-13');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

DROP TABLE IF EXISTS `user_details`;
CREATE TABLE IF NOT EXISTS `user_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `phone` varchar(225) NOT NULL,
  `role` varchar(45) NOT NULL,
  `email` varchar(225) DEFAULT NULL,
  `password` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `userid`, `username`, `phone`, `role`, `email`, `password`) VALUES
(1, '1', 'sharath', '8971469881', 'user', 'sharathk587@gmail.com', 'MTIzNDU='),
(5, '123', 'chethan', '9880162565', 'user', 'chethan187@gmail.com', 'MTIzNDU='),
(3, '111', 'manu', '9886456782', 'user', 'manu@gmail.com', 'MTIzNDU='),
(4, '123', 'manoj', '9611234690', 'admin', '', 'MTIzNDU=');

-- --------------------------------------------------------

--
-- Table structure for table `work_details`
--

DROP TABLE IF EXISTS `work_details`;
CREATE TABLE IF NOT EXISTS `work_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(255) NOT NULL,
  `username` varchar(225) NOT NULL,
  `project` varchar(255) NOT NULL,
  `bugs` varchar(255) NOT NULL,
  `fixes` varchar(255) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `work_details`
--

INSERT INTO `work_details` (`id`, `userid`, `username`, `project`, `bugs`, `fixes`, `comments`, `date`) VALUES
(1, '1', 'sharath', 'java', '4', '3', 'working on it....', '2019-11-13'),
(2, '123', 'chethan', 'Chatbot', '4', '2', 'working on bugs......', '2019-11-13'),
(3, '1', 'sharath', 'java', '4', '', 'abc', '2019-11-13');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
