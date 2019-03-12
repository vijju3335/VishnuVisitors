-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2019 at 02:25 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vishnuvisitorsgatepass`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`) VALUES
(1, 'admin', 'admin@gmail.com', 'dd94709528bb1c83d08f3088d4043f4742891f4f', 'admin'),
(4, 'guard', 'guard@gmail.com', '88bd4ca6200db92ba2aad65fe0a3de9bfb8312d6', 'guard'),
(6, 'vijay', 'vijaybabukandiboina@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'staff');

-- --------------------------------------------------------

--
-- Table structure for table `visitor_log`
--

CREATE TABLE `visitor_log` (
  `id` int(10) NOT NULL,
  `visitor_name` varchar(50) DEFAULT NULL,
  `visitor_ph` varchar(15) DEFAULT NULL,
  `pass_type` varchar(15) DEFAULT NULL,
  `visitor_image` varchar(255) DEFAULT NULL,
  `visitor_purpose` varchar(50) DEFAULT NULL,
  `visitors_count` varchar(10) DEFAULT NULL,
  `host_name` varchar(30) DEFAULT NULL,
  `host_id` varchar(20) DEFAULT NULL,
  `proof_type` varchar(15) DEFAULT NULL,
  `proof_no` varchar(40) DEFAULT NULL,
  `date` varchar(15) NOT NULL,
  `in_time` varchar(10) NOT NULL,
  `out_time` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitor_log`
--

INSERT INTO `visitor_log` (`id`, `visitor_name`, `visitor_ph`, `pass_type`, `visitor_image`, `visitor_purpose`, `visitors_count`, `host_name`, `host_id`, `proof_type`, `proof_no`, `date`, `in_time`, `out_time`) VALUES
(1, 'Siva Rama Krishna', '9494565833', 'parent', 'img.jpeg', 'Pay Fees', '2', 'Sri Ram', '15pa1a05g3', 'aadhar', '7832024588', '02-03-19', '09:50 AM', 'NA'),
(13, 'dfgh', '2222222222', 'guest', '20190309DFGH.png', 'dfghj', '2', 'dfghj', 'DFGH', 'driving licence', 'FGH', '09-03-2019', '12:01 PM', 'NA'),
(14, 's', '7777777777', 'guest', '20190309GH.png', 'fgh', '3', 'fghj', 'GH', 'aadhar', 'GH', '09-03-2019', '12:22 PM', 'NA'),
(15, 'testing', '1111111111', 'guest', '20190309TESTING.png', 'testing', '1', 'testing', 'TESTING', 'aadhar', 'TESTING', '09-03-2019', '01:47 PM', 'NA'),
(16, 'testing', '1111111111', 'guest', '20190309TESTING.png', 'testing', '1', 'testing', 'TESTING', 'aadhar', 'TESTING', '09-03-2019', '01:48 PM', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `visitor_log`
--
ALTER TABLE `visitor_log`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `visitor_log`
--
ALTER TABLE `visitor_log`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
