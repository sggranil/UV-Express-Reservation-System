-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2020 at 07:19 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uv_express`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`id`, `username`, `password`) VALUES
(3, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(255) NOT NULL,
  `com_date` date NOT NULL,
  `name` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `com_number` varchar(11) NOT NULL,
  `com_inquiry` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `com_date`, `name`, `company`, `com_number`, `com_inquiry`) VALUES
(14, '2020-05-23', 'Juan Dela Cruz', 'Gordon College', '09369514447', 'Hi! I like your service. I hope you read this because I was amaze especially your new online reservation.');

-- --------------------------------------------------------

--
-- Table structure for table `pax_info`
--

CREATE TABLE `pax_info` (
  `pax_unipass` int(6) NOT NULL,
  `pax_count` int(5) NOT NULL,
  `pax_total` int(6) NOT NULL,
  `trip_code` int(10) NOT NULL,
  `pax_or` varchar(50) NOT NULL,
  `pax_des` varchar(50) NOT NULL,
  `pax_date` date NOT NULL,
  `pax_time` varchar(10) NOT NULL,
  `pax_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pax_info`
--

INSERT INTO `pax_info` (`pax_unipass`, `pax_count`, `pax_total`, `trip_code`, `pax_or`, `pax_des`, `pax_date`, `pax_time`, `pax_name`) VALUES
(988536, 1, 265, 787625, 'Sta. Cruz', 'Olongapo', '2020-06-01', '12:00', 'kjkjjjkk');

-- --------------------------------------------------------

--
-- Table structure for table `trip_info`
--

CREATE TABLE `trip_info` (
  `trip_code` int(11) NOT NULL,
  `trip_or` varchar(25) NOT NULL,
  `trip_des` varchar(25) NOT NULL,
  `trip_date` date NOT NULL,
  `trip_time` varchar(10) NOT NULL,
  `trip_price` int(10) NOT NULL,
  `trip_pax` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trip_info`
--

INSERT INTO `trip_info` (`trip_code`, `trip_or`, `trip_des`, `trip_date`, `trip_time`, `trip_price`, `trip_pax`) VALUES
(787625, 'Sta. Cruz', 'Olongapo', '2020-06-01', '12:00', 265, 14);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pax_info`
--
ALTER TABLE `pax_info`
  ADD PRIMARY KEY (`pax_unipass`),
  ADD KEY `trip_code` (`trip_code`);

--
-- Indexes for table `trip_info`
--
ALTER TABLE `trip_info`
  ADD PRIMARY KEY (`trip_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pax_info`
--
ALTER TABLE `pax_info`
  MODIFY `pax_unipass` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=988537;

--
-- AUTO_INCREMENT for table `trip_info`
--
ALTER TABLE `trip_info`
  MODIFY `trip_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=787626;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pax_info`
--
ALTER TABLE `pax_info`
  ADD CONSTRAINT `pax_info_ibfk_1` FOREIGN KEY (`trip_code`) REFERENCES `trip_info` (`trip_code`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
