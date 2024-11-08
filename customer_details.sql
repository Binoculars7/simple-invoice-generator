-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2024 at 09:26 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `customer_details`
--

-- --------------------------------------------------------

--
-- Table structure for table `product_list`
--

CREATE TABLE `product_list` (
  `ID` int(11) NOT NULL,
  `PNAME` text NOT NULL,
  `PPRICE` text NOT NULL,
  `QTY` int(11) NOT NULL,
  `CID` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_lists`
--

CREATE TABLE `product_lists` (
  `ID` int(11) NOT NULL,
  `PNAME` text NOT NULL,
  `PPRICE` text NOT NULL,
  `QTY` int(255) NOT NULL,
  `CID` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_lists`
--

INSERT INTO `product_lists` (`ID`, `PNAME`, `PPRICE`, `QTY`, `CID`) VALUES
(1, 'HP Laptop', '199994', 1, '7601cid'),
(2, 'Printer', '20009', 2, '7601cid'),
(3, 'printer', '1099', 1, '5025cid'),
(4, 'laptop', '10000', 2, '848cid'),
(6, 'dsfds', '121233', 1, '5165cid'),
(7, 'dsfds', '23456', 1, '8988cid'),
(8, 'fdfd', '234545', 1, '6363cid'),
(9, 'HP Laptop', '100000', 1, '8677cid'),
(10, 'Printer', '130000', 2, '8677cid'),
(11, 'Printer', '34334', 1, '6947cid');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `ID` int(11) NOT NULL,
  `FNAME` text NOT NULL,
  `EMAIL` text NOT NULL,
  `PHONE` text NOT NULL,
  `CID` text NOT NULL,
  `DATES` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`ID`, `FNAME`, `EMAIL`, `PHONE`, `CID`, `DATES`) VALUES
(8, 'Peter', 'kkdk', '24233', '5025cid', '2024-09-07'),
(9, 'Peter', 'jdd', '243', '848cid', '2024-09-07'),
(10, 'fdsf', 'dfds', '3443', '5165cid', '2024-09-07'),
(11, 'rtfrg', 'dfdasf', '232', '8988cid', '2024-09-07'),
(12, 'sdfdsf', 'dsfds', '3545', '6363cid', '2024-09-07'),
(13, 'Emmanuel Happy', 'happy@gmail.com', '9793635352', '8677cid', '2024-09-07'),
(14, 'Moni', 'moni@gmail.com', '2343434', '6947cid', '2024-09-07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product_list`
--
ALTER TABLE `product_list`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `product_lists`
--
ALTER TABLE `product_lists`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product_list`
--
ALTER TABLE `product_list`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `product_lists`
--
ALTER TABLE `product_lists`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
