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
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `username` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `admin` int(1) unsigned NOT NULL,
  `first` varchar(255) NOT NULL,
  `last` varchar(255) NOT NULL,
  `class` int(10) unsigned NOT NULL,
  `dorm` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cell` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `hash`, `admin`, `first`, `last`, `class`, `dorm`, `email`, `cell`) VALUES
(37, 'a', '$1$TY7gyqYU$pYrZTnBIJuxHD4K4.oxEH1', 1, 'Willy', 'Hoang', 2014, 'Quincy House', 'willyhoang0@gmail.com', '310-818-6819'),
(42, 'f', '$1$OXF3OHll$LbR5YgxfqBXXUcB.VsNsr.', 1, 'Erika', 'Lee', 0, 'Kirkland House', 'elee@college.harvard.edu', '555-555-5555'),
(48, 'gqi', '$1$W20/s4z/$wN5rEbsatCHDiciMn9sjM0', 1, 'Grace', 'Qi', 2013, 'Pforzheimer House', 'graceqi92@gmail.com', '9095432012'),
(43, 'b', '$1$nLFkiqww$08LmvKJERpH2UzcrpRcwK1', 1, 'Grace', 'Xiong', 0, 'Mather House', 'gxiong@gmail.com', '555-555-5555'),
(44, 'veeshee14', '$1$PlEZMJDI$hP5KThOWCJhclgXi4WCWJ.', 0, 'Victoria', 'Shih', 2014, 'Pforzheimer House', 'vshih@college.harvard.edu', '203-313-7347'),
(45, 'gq', '$1$6H8DjF5o$rCi8dErHZxZaAWh1zZTtM/', 1, 'Grace', 'Qi', 0, 'Pforzheimer House', 'graceqi92@gmail.com', '9095432012'),
(1, 'aadt', '$1$U.V36sUq$RYBKwSc0EWX0VhLx/pj6Z.', 1, 'admin', '', 0, '', '', ''),
(47, 'paul', '$1$eqAFukGV$8LKjAc53KXT9RiW3/ef9..', 0, 'Paul', 'Bowden', 0, 'Winthrop House', 'pbowden@college.harvard.edu', '555-555-5555'),
(50, 'board', '$1$4zWR7J1S$YhQtPvQguvB4Uuj4zzI3B0', 1, 'Board Ex.', 'Qi', 2013, 'Pforzheimer House', 'graceqi92@gmail.com', '9095432012'),
(51, 'member', '$1$mSj4UxH1$BHMfx0JlnMjy3JMFanru11', 0, 'Member Ex.', 'Qi', 2013, 'Pforzheimer House', 'graceqi92@gmail.com', '9095432012'),
(52, 'choreographer', '$1$QA8dOyQl$.VFpR8z/qmSz9gNfc/wGt1', 0, 'Choreographer Ex.', 'Qi', 2013, 'Pforzheimer House', 'graceqi92@gmail.com', '9095432012');
