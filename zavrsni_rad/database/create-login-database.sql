-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 15, 2014 at 06:00 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `login`
--
CREATE DATABASE IF NOT EXISTS `login` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `login`;

-- --------------------------------------------------------

--
-- Table structure for table `age`
--

CREATE TABLE IF NOT EXISTS `age` (
  `species_id` int(10) NOT NULL,
  `age` varchar(50) CHARACTER SET latin1 NOT NULL,
  KEY `species_id` (`species_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `age`
--

INSERT INTO `age` (`species_id`, `age`) VALUES
(1, '8 tjedana do 6 mjeseci'),
(1, '6 do 12 mjeseci'),
(1, 'odrasli pas'),
(1, 'do 8 tjedana'),
(2, 'do 10 tjedana'),
(2, '10 tjedana do 6 mjeseci'),
(2, '6 do 12 mjeseci'),
(2, 'odrasle macka'),
(3, 'do 6 mjeseci'),
(3, 'odrasli glodavac');

-- --------------------------------------------------------

--
-- Table structure for table `pets_all`
--

CREATE TABLE IF NOT EXISTS `pets_all` (
  `pet_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing pet_id of each pet, unique index',
  `pet_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'pet''s name',
  `pet_gender` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pet_species` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pet_age` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pet_weight` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pet_note` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `pet_owner` int(11) NOT NULL,
  PRIMARY KEY (`pet_id`),
  KEY `pet_owner` (`pet_owner`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='user data' AUTO_INCREMENT=60 ;

--
-- Dumping data for table `pets_all`
--

INSERT INTO `pets_all` (`pet_id`, `pet_name`, `pet_gender`, `pet_species`, `pet_age`, `pet_weight`, `pet_note`, `pet_owner`) VALUES
(42, 'Žuja', 'F', '2', '10 tjedana do 6 mjeseci', 'perzijska', '44444444', 35),
(27, 'Gricko', 'M', '1', 'odrasli pas', '11-22 kg', 'Monika ga ne zna svezat!', 35),
(41, 'zlajo', 'M', '1', '6 do 12 mjeseci', '11-22 kg', 'Hihihihi', 35),
(57, 'Gricko', 'M', '2', 'do 10 tjedana', 'perzijska', 'hahaha', 33),
(58, 'lola', 'M', '2', '10 tjedana do 6 mjeseci', 'domaca', 'jsjsj', 33),
(59, 'Nives Celzijus', 'M', '1', '8 tjedana do 6 mjeseci', '11-22 kg', 'ssss', 33);

-- --------------------------------------------------------

--
-- Table structure for table `species`
--

CREATE TABLE IF NOT EXISTS `species` (
  `species_id` int(10) NOT NULL AUTO_INCREMENT,
  `species` varchar(10) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`species_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `species`
--

INSERT INTO `species` (`species_id`, `species`) VALUES
(1, 'Pas'),
(2, 'Macka'),
(3, 'Glodavac');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing user_id of each user, unique index',
  `user_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s name, unique',
  `user_password_hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s password in salted and hashed format',
  `user_email` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s email, unique',
  `user_active` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'user''s activation status',
  `user_activation_hash` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'user''s email verification hash string',
  `user_password_reset_hash` char(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'user''s password reset code',
  `user_password_reset_timestamp` bigint(20) DEFAULT NULL COMMENT 'timestamp of the password reset request',
  `user_rememberme_token` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'user''s remember-me cookie token',
  `user_failed_logins` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'user''s failed login attemps',
  `user_last_failed_login` int(10) DEFAULT NULL COMMENT 'unix timestamp of last failed login attempt',
  `user_registration_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_registration_ip` varchar(39) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '0.0.0.0',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`),
  UNIQUE KEY `user_email` (`user_email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='user data' AUTO_INCREMENT=40 ;

--
-- --------------------------------------------------------

--
-- Table structure for table `weight`
--

CREATE TABLE IF NOT EXISTS `weight` (
  `species_id` int(10) NOT NULL,
  `weight` varchar(50) CHARACTER SET latin1 NOT NULL,
  KEY `species_id` (`species_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `weight`
--

INSERT INTO `weight` (`species_id`, `weight`) VALUES
(1, 'do 4 kg'),
(1, '4-11 kg'),
(1, '11-22 kg'),
(1, '22-35 kg'),
(1, 'iznad 35 kg'),
(2, 'domaca'),
(2, 'perzijska'),
(2, 'sijamska'),
(3, 'zamorac'),
(3, 'hrcak'),
(3, 'zec');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `age`
--
ALTER TABLE `age`
  ADD CONSTRAINT `age_ibfk_1` FOREIGN KEY (`species_id`) REFERENCES `species` (`species_id`);

--
-- Constraints for table `weight`
--
ALTER TABLE `weight`
  ADD CONSTRAINT `weight_ibfk_1` FOREIGN KEY (`species_id`) REFERENCES `species` (`species_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
