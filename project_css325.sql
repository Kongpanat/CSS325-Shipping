-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2022 at 09:53 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project css325`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `Branch_ID` int(10) UNSIGNED NOT NULL,
  `Branch_Addr` varchar(255) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Phone_no` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`Branch_ID`, `Branch_Addr`, `Email`, `Phone_no`) VALUES
(1, 'Bangkok', 'Br01@hotmail.com', '1'),
(2, 'Nawamin', 'Br02@hotmail.com', '000000002');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Customer_ID` int(6) NOT NULL,
  `Fname` varchar(30) NOT NULL,
  `Lname` varchar(30) NOT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `Phone_no` varchar(11) NOT NULL,
  `DOB` date NOT NULL,
  `Sex` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Customer_ID`, `Fname`, `Lname`, `Email`, `Phone_no`, `DOB`, `Sex`) VALUES
(-1, '', '', NULL, '', '0000-00-00', ''),
(0, 'FTest', 'LTest', 'ETest', '0Test', '2022-11-10', 'Male'),
(3, 'John', 'Deux', 'John@mail.com', '0909990000', '2022-11-10', 'Male'),
(4, 'Jane', 'Deux', 'Jane@mail.com', '0808880000', '2022-11-10', 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `Package_ID` int(10) UNSIGNED NOT NULL,
  `Delivery_fee` int(10) UNSIGNED DEFAULT NULL,
  `Shipment_Method` varchar(20) NOT NULL,
  `Note` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`Package_ID`, `Delivery_fee`, `Shipment_Method`, `Note`) VALUES
(46, NULL, 'land', '<!--text from old detail-->'),
(47, NULL, 'land', '<!--text from old detail-->'),
(48, NULL, 'land', 'P'),
(49, NULL, 'land', 'P'),
(50, NULL, 'land', 'PACKAGE');

-- --------------------------------------------------------

--
-- Table structure for table `receiver`
--

CREATE TABLE `receiver` (
  `Receiver_ID` int(11) UNSIGNED NOT NULL,
  `Customer_ID` int(6) NOT NULL,
  `Fname` varchar(30) NOT NULL,
  `LName` varchar(30) NOT NULL,
  `Phone_no` varchar(11) DEFAULT NULL,
  `Receiving_Addr` varchar(255) NOT NULL,
  `Postal_code` int(6) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receiver`
--

INSERT INTO `receiver` (`Receiver_ID`, `Customer_ID`, `Fname`, `LName`, `Phone_no`, `Receiving_Addr`, `Postal_code`) VALUES
(37, 4, 'Jane', 'Deux', '0808880000', '<!--text from old detail-->', 20000),
(38, 4, 'Jane', 'Deux', '0808880000', '<!--text from old detail-->', 20000),
(39, -1, 'Joe', 'Deux', '0707770000', 'ADD', 20000),
(40, -1, 'Joe', 'Deux', '0707770000', 'ADD', 20000),
(41, 3, 'John', 'Deux', '0909990000', 'ADD', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `sender`
--

CREATE TABLE `sender` (
  `Sender_ID` int(10) UNSIGNED NOT NULL,
  `Customer_ID` int(6) NOT NULL,
  `Package_ID` int(10) UNSIGNED NOT NULL,
  `Sending_Addr` varchar(255) NOT NULL,
  `Postal_code` int(6) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sender`
--

INSERT INTO `sender` (`Sender_ID`, `Customer_ID`, `Package_ID`, `Sending_Addr`, `Postal_code`) VALUES
(40, 3, 46, '<!--text from old detail-->', 10000),
(41, 3, 47, '<!--text from old detail-->', 10000),
(42, 3, 48, 'ADD', 10000),
(43, 3, 49, 'ADD', 10000),
(44, 4, 50, 'ADD', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `sending`
--

CREATE TABLE `sending` (
  `Sending_ID` int(10) UNSIGNED NOT NULL,
  `Sender_ID` int(10) UNSIGNED NOT NULL,
  `Receiver_ID` int(10) UNSIGNED NOT NULL,
  `SendBranch_ID` int(10) UNSIGNED NOT NULL,
  `Sending_Type` varchar(15) NOT NULL,
  `Pickup_Time` datetime DEFAULT NULL,
  `Delivered_Time` datetime DEFAULT NULL,
  `Status` varchar(10) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sending`
--

INSERT INTO `sending` (`Sending_ID`, `Sender_ID`, `Receiver_ID`, `SendBranch_ID`, `Sending_Type`, `Pickup_Time`, `Delivered_Time`, `Status`) VALUES
(4, 40, 37, 2, 'normal', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Pending'),
(5, 41, 38, 1, 'urgent', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Pending'),
(6, 42, 39, 2, 'normal', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Pending'),
(7, 43, 40, 2, 'normal', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Pending'),
(8, 44, 41, 2, 'urgent', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `Staff_ID` int(10) UNSIGNED NOT NULL,
  `Branch_ID` int(10) UNSIGNED NOT NULL,
  `Fname` varchar(30) NOT NULL,
  `Lname` varchar(30) NOT NULL,
  `Staff_Addr` varchar(255) NOT NULL,
  `DOB` date NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Phone_no` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`Staff_ID`, `Branch_ID`, `Fname`, `Lname`, `Staff_Addr`, `DOB`, `Email`, `Password`, `Phone_no`) VALUES
(13, 1, 'FTest', 'LTest', 'ADDTest		', '2022-11-08', 'ETest', 'PTest', '0Test'),
(14, 2, 'FTest2', 'LTest2', 'ADDTest2', '2022-11-09', 'ETest2', '1234', '0Test2'),
(15, 2, 'Firstname', 'Lastname', 'Address			', '2022-11-09', 'Email@mail.com', 'password', '0999999999');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`Branch_ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Customer_ID`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`Package_ID`);

--
-- Indexes for table `receiver`
--
ALTER TABLE `receiver`
  ADD PRIMARY KEY (`Receiver_ID`),
  ADD KEY `Customer_ID` (`Customer_ID`);

--
-- Indexes for table `sender`
--
ALTER TABLE `sender`
  ADD PRIMARY KEY (`Sender_ID`),
  ADD KEY `Customer_ID` (`Customer_ID`,`Package_ID`),
  ADD KEY `Package_ID` (`Package_ID`);

--
-- Indexes for table `sending`
--
ALTER TABLE `sending`
  ADD PRIMARY KEY (`Sending_ID`),
  ADD KEY `Sender_ID` (`Sender_ID`,`Receiver_ID`,`SendBranch_ID`),
  ADD KEY `Receiver_ID` (`Receiver_ID`),
  ADD KEY `SendBranch_ID` (`SendBranch_ID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`Staff_ID`),
  ADD KEY `Branch_ID` (`Branch_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `Branch_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Customer_ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `Package_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `receiver`
--
ALTER TABLE `receiver`
  MODIFY `Receiver_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `sender`
--
ALTER TABLE `sender`
  MODIFY `Sender_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `sending`
--
ALTER TABLE `sending`
  MODIFY `Sending_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `Staff_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sender`
--
ALTER TABLE `sender`
  ADD CONSTRAINT `sender_ibfk_2` FOREIGN KEY (`Package_ID`) REFERENCES `package` (`Package_ID`);

--
-- Constraints for table `sending`
--
ALTER TABLE `sending`
  ADD CONSTRAINT `sending_ibfk_1` FOREIGN KEY (`Receiver_ID`) REFERENCES `receiver` (`Receiver_ID`),
  ADD CONSTRAINT `sending_ibfk_2` FOREIGN KEY (`Sender_ID`) REFERENCES `sender` (`Sender_ID`),
  ADD CONSTRAINT `sending_ibfk_4` FOREIGN KEY (`SendBranch_ID`) REFERENCES `branch` (`Branch_ID`);

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`Branch_ID`) REFERENCES `branch` (`Branch_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
