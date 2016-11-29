-- phpMyAdmin SQL Dump
-- version 4.0.10.17
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 22, 2016 at 09:29 AM
-- Server version: 5.5.52-log
-- PHP Version: 5.6.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `house-rent`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE IF NOT EXISTS `ads` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rent` int(11) NOT NULL,
  `no-of-beds` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_11_22_133925_Ads', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) DEFAULT NULL,
  `token` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `status`, `token`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'moti', 'motisbm@gmail.com', '$2y$10$8VgCZlTyhZ4Hck3/NNkPk.H2EOQBls9zMVK6kehacSlgnJoGEJp.W', 1, 48767, 'RcxaKE9hrevYSmLcGJ2ehrANIo4cd2rBuoMHKJMrxtBUIDES4mZexvpz7ZpY', '2016-11-22 15:26:48', '2016-11-22 15:27:46');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
