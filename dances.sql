-- phpMyAdmin SQL Dump
-- version 3.1.3.2
-- http://www.phpmyadmin.net
--
-- Host: mysql.hcs.harvard.edu
-- Generation Time: Dec 08, 2011 at 07:58 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.4-2ubuntu5.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `aadt`
--

-- --------------------------------------------------------

--
-- Table structure for table `dances`
--

CREATE TABLE IF NOT EXISTS `dances` (
  `id` int(10) unsigned NOT NULL,
  `dance` varchar(255) NOT NULL,
  `choreo` int(1) unsigned NOT NULL,
  PRIMARY KEY  (`id`,`dance`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dances`
--

INSERT INTO `dances` (`id`, `dance`, `choreo`) VALUES
(44, 'Mongolian', 1),
(51, 'Sword', 0),
(42, 'Mongolian', 1),
(43, 'Sword', 1),
(43, 'Company', 1),
(52, 'Company', 1),
(1, 'Company', 1),
(43, 'Replay', 1),
(1, 'Sword', 1),
(1, 'Mongolian', 1),
(47, 'Company', 1),
(42, 'Replay', 0),
(47, 'Replay', 0),
(47, 'Sword', 1),
(37, 'Replay', 0);
