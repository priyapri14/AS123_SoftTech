-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2020 at 07:19 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `snoop`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `sno` int(11) NOT NULL,
  `feedback` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`sno`, `feedback`) VALUES
(6, 'hjh'),
(7, 'hi\r\n'),
(8, 'hiiii\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `feedbackex`
--

CREATE TABLE `feedbackex` (
  `sno` int(5) NOT NULL,
  `feedback` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedbackex`
--

INSERT INTO `feedbackex` (`sno`, `feedback`) VALUES
(1, 'hi');

-- --------------------------------------------------------

--
-- Table structure for table `report1`
--

CREATE TABLE `report1` (
  `sno` int(11) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `vkey` int(5) DEFAULT NULL,
  `verif` int(1) NOT NULL DEFAULT 0,
  `time1` varchar(20) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report1`
--

INSERT INTO `report1` (`sno`, `uname`, `email`, `vkey`, `verif`, `time1`) VALUES
(27, 'roshan', 'roshanpenielis@gmail.com', 6509, 1, '2020-06-13 00:03:16'),
(28, 'sun', 'upleasebe@gmail.com', 4879, 1, '2020-06-13 00:12:44'),
(29, 'a', 'a@gmail.com', NULL, 0, '2020-07-24 19:01:09'),
(30, 'rp', 'rp@gmail.com', 4658, 1, '2020-07-30 11:37:22'),
(31, 'sun', 'sun@gmail.com', 5762, 1, '2020-07-30 12:29:13');

-- --------------------------------------------------------

--
-- Table structure for table `report2`
--

CREATE TABLE `report2` (
  `sno` int(5) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `state` varchar(20) NOT NULL,
  `district` varchar(20) NOT NULL,
  `medium` varchar(20) NOT NULL,
  `category` varchar(20) NOT NULL,
  `userid` varchar(20) DEFAULT NULL,
  `susid` varchar(20) DEFAULT NULL,
  `complain` varchar(100) NOT NULL,
  `time` varchar(10) NOT NULL DEFAULT current_timestamp(),
  `attempts` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report2`
--

INSERT INTO `report2` (`sno`, `uname`, `email`, `state`, `district`, `medium`, `category`, `userid`, `susid`, `complain`, `time`, `attempts`) VALUES
(28, 'rp', 'rp@gmail.com', 'Jammu and Kashmir', 'as', 'Social', 'Taking advantage of ', 'rp', 'rosh', 'sf', '2020-07-30', 1),
(29, 'rp', 'rp@gmail.com', 'Jammu and Kashmir', 'as', 'Social', 'Taking advantage of ', 'rp', 'rosh', 'sf', '2020-07-30', 2),
(30, 'rp', 'rp@gmail.com', 'Jammu and Kashmir', 'as', 'Social', 'Taking advantage of ', 'rp', 'rosh', 'sf', '2020-07-30', 3),
(31, 'rp', 'rp@gmail.com', 'Jammu and Kashmir', 'as', 'Social', 'Taking advantage of ', 'rp', 'rosh', 'sf', '2020-07-30', 4),
(32, 'rp', 'rp@gmail.com', 'Jammu and Kashmir', 'as', 'Social', 'Taking advantage of ', 'rp', 'rosh', 'sf', '2020-07-30', 5),
(33, 'sun', 'sun@gmail.com', 'Madya Pradesh', 'c', 'Social', 'Taking advantage of ', 'as', 'as', 'zx', '2020-07-30', 1),
(34, 'sun', 'sun@gmail.com', 'Madya Pradesh', 'c', 'Social', 'Taking advantage of ', 'as', 'rith', 'zx', '2020-07-30', 2),
(35, 'sun', 'sun@gmail.com', 'Madya Pradesh', 'c', 'Social', 'Taking advantage of ', 'as', 'rith', 'zx', '2020-07-30', 3),
(36, 'sun', 'sun@gmail.com', 'Madya Pradesh', 'c', 'Social', 'Taking advantage of ', 'as', 'rith', 'zx', '2020-07-30', 4),
(37, 'sun', 'sun@gmail.com', 'Madya Pradesh', 'c', 'Social', 'Taking advantage of ', 'as', 'rith', 'zx', '2020-07-30', 5),
(38, 'roshan', 'roshanpenielis@gmail.com', 'Tamil Nadu', 'cbe', 'Social', 'Cyber Stalking', 'rp', 'rosh', 'sample', '2020-07-30', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `feedbackex`
--
ALTER TABLE `feedbackex`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `report1`
--
ALTER TABLE `report1`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `report2`
--
ALTER TABLE `report2`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `feedbackex`
--
ALTER TABLE `feedbackex`
  MODIFY `sno` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `report1`
--
ALTER TABLE `report1`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `report2`
--
ALTER TABLE `report2`
  MODIFY `sno` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `remove` ON SCHEDULE EVERY 5 MINUTE STARTS '2020-06-12 23:14:51' ON COMPLETION PRESERVE ENABLE DO UPDATE report1 SET vkey=null, verif=0 WHERE 'timestamp' < DATE_SUB(NOW(),INTERVAL 5 MINUTE)$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
