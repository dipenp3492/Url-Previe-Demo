-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 24, 2022 at 11:56 AM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `url_info`
--

DROP TABLE IF EXISTS `url_info`;
CREATE TABLE IF NOT EXISTS `url_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` text,
  `site_title` varchar(55) NOT NULL,
  `site_description` tinytext,
  `site_url` varchar(55) NOT NULL,
  `is_deleted` tinyint(2) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `url_info`
--

INSERT INTO `url_info` (`id`, `image`, `site_title`, `site_description`, `site_url`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'http://www.twigitalinfotech.com/assets/images/demo-content/revslider/background1.jpg', 'Twigital Infotech', 'Twigital Infotech is a global IT solutions provider company with an experience of several years and extensive workforce of efficient employees.', 'http://www.twigitalinfotech.com/', 0, '2022-07-24 14:06:27', '2022-07-24 14:06:27'),
(2, 'https://prostart.me/wp-content/uploads/2013/09/Pro-Start-Me_Logo.png', 'Pro Start Me - Startup as a service', 'Pro Start Me offers entrepreneurs its tech expertise to realize their big ideas. Instead of large upfront development costs, we work for equity in the end product.', 'https://prostart.me/', 0, '2022-07-24 14:06:27', '2022-07-24 14:06:27'),
(3, 'https://cloudester.com/wp-content/themes/cloudester/images/USA.svg', 'Top IT Company in New York | Cloudester Software LLC', 'Cloudester is a full-service IT company located in New York City. We offer software development, mobile app and web app development services across the USA.', 'https://cloudester.com/', 0, '2022-07-24 14:06:27', '2022-07-24 14:06:27'),
(4, 'https://www.w3schools.com/images/w3schools_logo_436_2.png', 'W3Schools Free Online Web Tutorials', 'W3Schools offers free online tutorials, references and exercises in all the major languages of the web. Covering popular subjects like HTML, CSS, JavaScript, Python, SQL, Java, and many, many more.', 'https://www.w3schools.com/', 0, '2022-07-24 14:59:10', '2022-07-24 14:59:10');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
