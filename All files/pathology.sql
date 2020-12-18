-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2020 at 04:04 PM
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
-- Database: `pathology`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `did` bigint(10) NOT NULL,
  `dname` varchar(50) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `quali` varchar(255) NOT NULL,
  `special` varchar(255) NOT NULL,
  `refcent` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`did`, `dname`, `mobile`, `quali`, `special`, `refcent`) VALUES
(35, 'Sourav Deb', 4569871230, 'B.Sc Computer Science', 'Web Development', '25.26'),
(37, 'Dr. Sourav', 7002246506, 'B.Sc Computer Science', 'Web Development', '45.50'),
(38, 'Sourav', 4561239870, 'Science', 'CSE', '19.00');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `pid` bigint(10) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `time` time NOT NULL DEFAULT current_timestamp(),
  `pname` varchar(255) NOT NULL,
  `age` int(255) NOT NULL,
  `sex` varchar(100) NOT NULL,
  `paddress` varchar(255) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `referredBy` varchar(255) NOT NULL,
  `tName` varchar(310) NOT NULL,
  `tCode` varchar(310) NOT NULL,
  `tPrice` varchar(310) NOT NULL,
  `total` bigint(255) NOT NULL,
  `discount` bigint(255) NOT NULL,
  `netTotal` bigint(255) NOT NULL,
  `advance` bigint(255) NOT NULL,
  `remainingAmt` bigint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`pid`, `date`, `time`, `pname`, `age`, `sex`, `paddress`, `mobile`, `referredBy`, `tName`, `tCode`, `tPrice`, `total`, `discount`, `netTotal`, `advance`, `remainingAmt`) VALUES
(1, '2020-12-04', '22:12:33', 'Mr. Sourav Deb', 23, 'MALE', 'Ashram Road, Silchar-7', 7002246506, 'Dr. S Deb', 'Blood', 'BLOOD008', '90', 90, 0, 90, 90, 0),
(2, '2020-12-08', '20:26:19', 'Sourav', 23, '', '', 0, '', 'abcd', 'efgh', 'ijkl', 0, 0, 0, 0, 0),
(3, '2020-12-08', '20:26:52', 'Sourav', 23, 'Male', 'Silchar', 123456789, '', 'abcd', 'efgh', 'ijkl', 400, 0, 400, 0, 400),
(4, '2020-12-08', '20:28:06', 'fbh', 56, 'Female', 'gvhgcg', 1234569870, '', 'abcd', 'efgh', 'ijkl', 400, 0, 400, 0, 400),
(5, '2020-12-08', '20:29:23', 'rhgwjhrb', 25, 'Male', 'bjhvh', 1236547890, 'Dr. Sourav', 'abcd', 'efgh', 'ijkl', 400, 0, 400, 0, 400),
(6, '2020-12-08', '20:33:43', 'Sourav', 23, 'Male', 'Silchar', 7002246506, 'Sourav Deb', 'abcd', 'efgh', 'ijkl', 1020, 40, 980, 500, 480);

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `tid` bigint(10) NOT NULL,
  `tcode` varchar(255) NOT NULL,
  `tname` varchar(255) NOT NULL,
  `vial_type` varchar(255) NOT NULL,
  `c_price` decimal(10,2) NOT NULL,
  `s_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`tid`, `tcode`, `tname`, `vial_type`, `c_price`, `s_price`) VALUES
(4, 'TSH005', 'Hello5', 'Red Vial', '400.00', '520.00'),
(5, 'TSH006', 'Hello8', 'Red Vial', '400.00', '500.00'),
(7, 'LFT005', 'Kidney', 'Grey Vial', '460.00', '600.00'),
(8, 'LFT008', 'Kidney Left', 'Red Vial', '150.00', '400.00'),
(9, 'TSH009', 'Liver', 'Purple Vial (EDTA)', '450.00', '600.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`tid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `did` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `pid` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `tid` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
