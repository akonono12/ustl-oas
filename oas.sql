-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2018 at 06:21 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oas`
--
CREATE DATABASE IF NOT EXISTS `oas` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `oas`;

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--
-- Creation: Sep 07, 2018 at 06:36 PM
--

DROP TABLE IF EXISTS `applicants`;
CREATE TABLE `applicants` (
  `id` int(11) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `middle_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `applicants`:
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--
-- Creation: Sep 03, 2018 at 09:54 AM
--

DROP TABLE IF EXISTS `data`;
CREATE TABLE `data` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `data`:
--

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--
-- Creation: Sep 03, 2018 at 06:24 AM
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `first_name` text,
  `middle_name` text,
  `last_name` text,
  `office_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `employees`:
--

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `first_name`, `middle_name`, `last_name`, `office_id`) VALUES
(0, NULL, NULL, 'N/A', 0),
(1, 'Justin', 'E.', 'Mendivil', 1);

-- --------------------------------------------------------

--
-- Table structure for table `office`
--
-- Creation: Sep 02, 2018 at 07:56 AM
--

DROP TABLE IF EXISTS `office`;
CREATE TABLE `office` (
  `id` int(11) NOT NULL,
  `office_name` varchar(200) DEFAULT NULL,
  `office_head_id` int(11) DEFAULT NULL,
  `office_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `office`:
--

--
-- Dumping data for table `office`
--

INSERT INTO `office` (`id`, `office_name`, `office_head_id`, `office_order`) VALUES
(1, 'MAPA', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--
-- Creation: Sep 02, 2018 at 07:58 AM
--

DROP TABLE IF EXISTS `positions`;
CREATE TABLE `positions` (
  `id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `position_name` varchar(200) NOT NULL,
  `position_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `positions`:
--

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `position_id`, `position_name`, `position_order`) VALUES
(1, 1, 'Office Head', 1),
(2, 2, 'Employee', 2),
(3, 3, 'Student', 3);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--
-- Creation: Sep 02, 2018 at 07:11 AM
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `first_name` text,
  `middle_name` text,
  `last_name` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `students`:
--

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `first_name`, `middle_name`, `last_name`) VALUES
(0, NULL, NULL, 'N/A'),
(1, 'Bryan Christian', 'I.', 'Aguilar');

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--
-- Creation: Sep 09, 2018 at 11:36 AM
--

DROP TABLE IF EXISTS `upload`;
CREATE TABLE `upload` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `size` int(11) NOT NULL,
  `type` varchar(200) NOT NULL,
  `location` varchar(200) NOT NULL,
  `uploader_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `upload`:
--

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`id`, `name`, `size`, `type`, `location`, `uploader_id`) VALUES
(1, '6255818ca473c95ff5bb744d1d2763f8.jpg', 61133, 'image/jpeg', 'uploads/6255818ca473c95ff5bb744d1d2763f8.jpg', 0),
(2, '25533_109953222371270_7724509_n.jpg', 108616, 'image/jpeg', 'uploads/25533_109953222371270_7724509_n.jpg', 0),
(3, '28417504_1791713550881249_1648691267_o.jpg', 223999, 'image/jpeg', 'uploads/28417504_1791713550881249_1648691267_o.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--
-- Creation: Sep 11, 2018 at 08:48 PM
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `role` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `users`:
--

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `emp_id`, `student_id`, `role`) VALUES
(1, 'admin', 'admin', 0, 0, 'superadmin'),
(46, '123', '123', 0, 1, 'user'),
(47, '321', '321', 1, 0, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `office`
--
ALTER TABLE `office`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `office`
--
ALTER TABLE `office`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `upload`
--
ALTER TABLE `upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
