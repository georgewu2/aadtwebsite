-- phpMyAdmin SQL Dump
-- version 3.1.3.2
-- http://www.phpmyadmin.net
--
-- Host: mysql.hcs.harvard.edu
-- Generation Time: Dec 08, 2011 at 07:57 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.4-2ubuntu5.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `aadt`
--

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `type` varchar(255) NOT NULL,
  `date` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` varchar(999) NOT NULL,
  `video` varchar(255) NOT NULL,
  PRIMARY KEY  (`date`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`type`, `date`, `title`, `text`, `video`) VALUES
('Home', 1323079915, 'a', 'a', ''),
('Mongolian', 1323312971, 'Hello', 'Hi Mongolian', ''),
('All', 1323324554, 'Blah', 'blarghhhh', ''),
('Home', 1323134409, 'HI KENNY!', 'HI KENNY!!!!!', ''),
('Home', 1323140647, 'Blah', 'blah', ''),
('Replay', 1323210066, 'Watch this!', 'And PRACTICE! (Keep in mind that it is mirrored)', 'http://www.youtube.com/v/eLbtWm_cgSw'),
('Replay', 1323210111, 'Leg Waving', 'with Grace X. ', 'http://www.youtube.com/v/exq5dfsPim8'),
('', 1323320160, 'HI', '', ''),
('Home', 1323332310, 'GO!', ':D', 'http://www.youtube.com/v/Q-xmDvbIoRc'),
('Replay', 1323210003, 'ZOMG RINO NAKASONE', 'is a goddessss!', 'https://www.youtube.com/v/YjfxnInQQDI&feature=player_embedded'),
('Home', 1323047185, 'Welcome to Our Website', 'Blah Blah Blah', '');
