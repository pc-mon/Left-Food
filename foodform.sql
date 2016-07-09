-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 09, 2016 at 05:21 PM
-- Server version: 5.5.49-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `foodform`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('/*', '1', 2016),
('/debug/*', '1', 2016);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('/*', 2, 'جميع الصلاحيات', NULL, NULL, 1466749928, 1466749928),
('/debug/*', 2, 'صلاحيات الاخطاء', NULL, NULL, 1466749927, 1466749927),
('/gii/*', 2, 'صلاحيات المبرمج فقط', NULL, NULL, 1466749927, 1466749927),
('/regions/*', 2, 'صلاحيات المناطق', NULL, NULL, 1466749927, 1466749927),
('/site/*', 2, NULL, NULL, NULL, 1466749927, 1466749927);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(256) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` text,
  PRIMARY KEY (`id`),
  KEY `parent` (`parent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1466747591),
('m140602_111327_create_menu_table', 1466747704);

-- --------------------------------------------------------

--
-- Table structure for table `regionperm`
--

CREATE TABLE IF NOT EXISTS `regionperm` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `rid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `regionperm`
--

INSERT INTO `regionperm` (`id`, `rid`, `uid`) VALUES
(9, 1, 1),
(10, 2, 2),
(11, 1, 2),
(12, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE IF NOT EXISTS `regions` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'التسلسل',
  `title` varchar(250) NOT NULL COMMENT 'الاسم',
  `per` text NOT NULL COMMENT 'الصلاحيات',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `title`, `per`) VALUES
(1, 'sdfsdf', ''),
(2, 'sdfsf', '');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE IF NOT EXISTS `requests` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) DEFAULT NULL,
  `desc` text,
  `foods` text,
  `email` varchar(100) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `address` text,
  `region` int(5) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userid` int(11) NOT NULL DEFAULT '0',
  `finished` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `title`, `desc`, `foods`, `email`, `mobile`, `address`, `region`, `created`, `userid`, `finished`) VALUES
(1, 'ttt', 'dfsddfsdf', '', '', '', '', 0, '2016-06-21 21:44:04', 0, 0),
(4, 'sdfsdf', '', '', '', '', '', 0, '2016-06-21 22:44:18', 0, 0),
(5, 'sdfsdf', '', '', '', '', '', 0, '2016-06-21 22:45:08', 0, 0),
(17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-06-22 03:49:54', 0, 0),
(18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-06-22 03:57:32', 0, 0),
(19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-06-22 13:13:18', 0, 0),
(20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-06-22 13:25:22', 0, 0),
(21, 'ssdfsdf', 'sdfsdf', NULL, 'sdfsdf', NULL, NULL, 1, '2016-06-22 13:37:39', 0, 0),
(23, 'ssdfsdf', 'sdfsdf', NULL, 'sdfsdf', NULL, NULL, 1, '2016-06-22 13:41:23', 0, 1),
(24, 'sdfsdf', 'sdfsdf', NULL, 'dfgdfg@sdf.co', NULL, NULL, 0, '2016-06-22 13:48:36', 0, 0),
(25, 'sdfsdf', 'sdfsdf', NULL, 'dfgdfg@sdf.co', 'sdfsdf', 'sdf', 0, '2016-06-22 13:53:10', 0, 0),
(26, 'sdfsdf', 'sdfsdf', 'sdfsdf', 'dfgdfg@sdf.co', 'sdfsdf', 'sdf', 0, '2016-06-22 13:53:57', 0, 0),
(27, 'sdfsdf', 'sdfsdf', 'sdfsdf', 'sdfsf@ssfd.co', 'sdfsdf', 'sdfsdf', 2, '2016-06-22 15:17:26', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'pc-moon', 'EO4jmR2Mj-qPxYMv3Q0Ddy90vlFzBE6P', '$2y$13$qjDik1QUYcJEhQcnq0iMDuBBm0aOJMpKSw7A/5227lggoVUqBLlsW', NULL, 'pc-moon@hotmail.com', 10, 1444807292, 1444807292),
(2, 'mrmohand', 'AyOrCh3jpDmxIDRKFKM3-SLR3qIuRZ0D', '$2y$13$C/auZjpbG8d.zZS.MdFirOdHlpdeDZ1zwgD0MWjBUJJRutXIs7uE.', NULL, 'ghzalsmiledentallab@hotmail.com', 10, 1447522981, 1447522981);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
