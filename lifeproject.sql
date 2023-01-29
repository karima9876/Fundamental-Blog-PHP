-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 02, 2020 at 02:49 PM
-- Server version: 5.7.21
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lifeproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(255) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL,
  `post` int(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `post`) VALUES
(46, 'Java', 4),
(48, 'php', 3),
(49, 'javaScriptt', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `firstname`, `lastname`, `email`, `body`, `date`, `status`) VALUES
(4, 'karima', 'moon', 'karimajaman9876@gmail.com', 'hello babu', '2020-11-11 00:25:12', 1),
(5, 'karima', 'moon', 'rifat022@gmail.com', 'hello ', '2020-11-11 00:26:07', 0),
(6, 'Ratul', 'Islam', 'ratul@gmail.com', 'how are you', '2020-11-11 00:31:37', 1),
(16, 'Ratul', 'hossain', 'rifat022@gmail.com', 'fun', '2020-11-12 21:51:25', 0);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `category` varchar(255) NOT NULL,
  `post_date` varchar(255) NOT NULL,
  `author` int(255) NOT NULL,
  `post_img` varchar(255) NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `title`, `description`, `category`, `post_date`, `author`, `post_img`) VALUES
(6, 'java', 'Hi there ! I met a important issue. In XLSFor', '48', '07 Nov, 2020', 14, '1604773811-mfFL4khzVHvADPXt6dc0tFYipgek1oat8xSljeZs.jpeg'),
(5, 'javascript', '. Weiss received his Ph.D. from UCLA and subsequently accepted anWeiss received his Ph.D. from UCLA and subsequently accepted anWeiss received his Ph.D. from UCLA and subsequently accepted anWeiss received his Ph.D. from UCLA and subsequently accepted an', '46', '04 Nov, 2020', 11, '1604773867-flower6.jpg'),
(7, 'php', '. Weiss received his Ph.D. from UCLA and subsequently accepted an\r\n\r\n\r\nAbout me..Some text will be go here. Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here. Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.', '48', '07 Nov, 2020', 14, '1604773939-flower3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `slo`
--

DROP TABLE IF EXISTS `slo`;
CREATE TABLE IF NOT EXISTS `slo` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slogan` varchar(255) NOT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slo`
--

INSERT INTO `slo` (`tid`, `title`, `slogan`) VALUES
(1, 'Roses', 'nicebb nn');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(255) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `username`, `password`, `role`) VALUES
(14, 'rafikul islam', 'ratul', 'Ratul', '12345', 1),
(16, 'nurul islam', 'ratul', 'karima', '827ccb0eea8a706c4c34a16891f84e7b', 0),
(11, 'karima', 'jaman', 'Moon', 'ssss', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
