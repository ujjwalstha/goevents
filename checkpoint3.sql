-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2018 at 03:30 AM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `checkpoint3`
--

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `text` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `slug`, `text`) VALUES
(1, 'Football Club', 'football-club', 'Chelsea Football Club'),
(2, 'Music', 'music', 'Rock and roll'),
(3, 'Fight Club', 'fight-club', 'Karate');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_detail`
--

CREATE TABLE `tbl_admin_detail` (
  `id` int(5) NOT NULL,
  `firstname` varchar(10) NOT NULL,
  `lastname` varchar(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin_detail`
--

INSERT INTO `tbl_admin_detail` (`id`, `firstname`, `lastname`, `username`, `password`) VALUES
(1, 'Admin', 'inistrator', 'admin@admin.com', '7c4a8d09ca3762af61e59520943dc26494f8941b');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_events`
--

CREATE TABLE `tbl_events` (
  `id` int(5) NOT NULL,
  `event_name` varchar(50) DEFAULT NULL,
  `event_type` varchar(10) DEFAULT NULL,
  `location` varchar(30) DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `event_banner` varchar(250) NOT NULL,
  `flag` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_events`
--

INSERT INTO `tbl_events` (`id`, `event_name`, `event_type`, `location`, `event_date`, `event_banner`, `flag`) VALUES
(18, 'Photography', 'social', 'Godawari', '2018-02-08', 'about-bg.jpg', 1),
(17, 'Space Research', 'science', 'NASA', '2018-01-31', 'post-bg.jpg', 1),
(15, 'Epl live telecast', 'sports', 'Huts Cafe', '2018-01-23', 'epl4.jpg', 1),
(16, 'Marshmello Concert', 'musical', 'Thamel', '2018-01-04', 'Marshmello-2016-Bellnjerry-billboard-1548-650-21.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_event_join`
--

CREATE TABLE `tbl_event_join` (
  `id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `event_id` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_event_join`
--

INSERT INTO `tbl_event_join` (`id`, `user_id`, `event_id`) VALUES
(29, 1, 17);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_event_types`
--

CREATE TABLE `tbl_event_types` (
  `typeid` int(10) NOT NULL,
  `eventtype` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_event_types`
--

INSERT INTO `tbl_event_types` (`typeid`, `eventtype`) VALUES
(1, 'sports'),
(2, 'musical'),
(3, 'cultural'),
(4, 'social'),
(5, 'science');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_detail`
--

CREATE TABLE `tbl_user_detail` (
  `id` int(10) NOT NULL,
  `firstname` varchar(15) NOT NULL,
  `lastname` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `status` varchar(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_detail`
--

INSERT INTO `tbl_user_detail` (`id`, `firstname`, `lastname`, `email`, `password`, `status`) VALUES
(1, 'Ujjwal', 'Shrestha', 'ujjwalshrestha1996@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_msg`
--

CREATE TABLE `tbl_user_msg` (
  `id` int(5) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(75) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_msg`
--

INSERT INTO `tbl_user_msg` (`id`, `name`, `email`, `subject`, `message`) VALUES
(2, 'Ujjwal', 'ujjwalshrestha1996@gmail.com', 'Hello', 'test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slug` (`slug`);

--
-- Indexes for table `tbl_admin_detail`
--
ALTER TABLE `tbl_admin_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_events`
--
ALTER TABLE `tbl_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_event_join`
--
ALTER TABLE `tbl_event_join`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_event_types`
--
ALTER TABLE `tbl_event_types`
  ADD PRIMARY KEY (`typeid`);

--
-- Indexes for table `tbl_user_detail`
--
ALTER TABLE `tbl_user_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_msg`
--
ALTER TABLE `tbl_user_msg`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_events`
--
ALTER TABLE `tbl_events`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tbl_event_join`
--
ALTER TABLE `tbl_event_join`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `tbl_event_types`
--
ALTER TABLE `tbl_event_types`
  MODIFY `typeid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_user_detail`
--
ALTER TABLE `tbl_user_detail`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_user_msg`
--
ALTER TABLE `tbl_user_msg`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
