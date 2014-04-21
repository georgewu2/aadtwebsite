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
-- Table structure for table `inventory`
--

CREATE TABLE IF NOT EXISTS `inventory` (
  `clothing` varchar(255) NOT NULL,
  `quantity` int(16) NOT NULL,
  `dance` varchar(255) NOT NULL,
  PRIMARY KEY  (`clothing`,`dance`),
  KEY `dance` (`dance`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`clothing`, `quantity`, `dance`) VALUES
('fan', 2, 'dai'),
('fds', 1, '432'),
('ribbon', 5, 'dai'),
('hello', 10, 'hello'),
('hi', 10, 'hi'),
('shirt', 7, 'kenny'),
('shorts', 2, 'foo'),
('dai', 10, 'foo'),
('Willy''s Red T-shirt', 1, 'Replay'),
('dai', 1, 'dai'),
('grace', 2, 'peacock'),
('shirt', 10, 'yellow fan'),
('fan', 10, 'yellow fan'),
('kevin', 10, 'hi');
