-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Dec 03, 2023 at 03:20 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eventsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cardinfo`
--

CREATE TABLE `cardinfo` (
  `paymentID` int(255) NOT NULL,
  `cardNum` varchar(255) NOT NULL,
  `cvv` int(3) NOT NULL,
  `expDate` varchar(10) NOT NULL,
  `payment_purpose` enum('dp','fp') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cashinfo`
--

CREATE TABLE `cashinfo` (
  `paymentID` int(255) NOT NULL,
  `receiptNum` varchar(255) NOT NULL,
  `receiptImg` mediumblob NOT NULL,
  `payment_purpose` enum('dp','fp') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `eventinfo`
--

CREATE TABLE `eventinfo` (
  `eventID` int(255) NOT NULL,
  `userID` int(255) NOT NULL,
  `serviceID` int(255) NOT NULL,
  `funcRoom` varchar(255) NOT NULL,
  `package` varchar(255) NOT NULL,
  `eventType` varchar(255) NOT NULL,
  `numAttendee` int(255) NOT NULL,
  `eventDate` date NOT NULL,
  `eventTimeStart` time(6) NOT NULL,
  `eventTimeEnd` time(6) NOT NULL,
  `overTime` decimal(5,2) DEFAULT NULL,
  `request` varchar(255) NOT NULL,
  `date_booked` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logcredentials`
--

CREATE TABLE `logcredentials` (
  `logID` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `date_joined` datetime NOT NULL DEFAULT current_timestamp(),
  `reset_token_hash` int(255) NOT NULL,
  `reset_token_expires_at` datetime NOT NULL,
  `role` enum('user','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logcredentials`
--

INSERT INTO `logcredentials` (`logID`, `email`, `password`, `username`, `date_joined`, `reset_token_hash`, `reset_token_expires_at`, `role`) VALUES
(1, 'micasa.cosc75g2@gmail.com', 'micasaCOSC75', 'MiCasa_Admin', '2023-11-27 15:28:35', 0, '0000-00-00 00:00:00', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `onlineinfo`
--

CREATE TABLE `onlineinfo` (
  `paymentID` int(255) NOT NULL,
  `referenceNum` varchar(255) NOT NULL,
  `payment_purpose` enum('dp','fp') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paymentinfo`
--

CREATE TABLE `paymentinfo` (
  `paymentID` int(255) NOT NULL,
  `eventID` int(255) NOT NULL,
  `total_bill` decimal(10,2) NOT NULL,
  `downpayment` decimal(10,2) NOT NULL,
  `paymentType` varchar(255) NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  `fullPaymentType` varchar(255) NOT NULL,
  `paymentStatus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pricinginfo`
--

CREATE TABLE `pricinginfo` (
  `serviceID` int(255) NOT NULL,
  `Category` varchar(255) NOT NULL,
  `Package` varchar(255) NOT NULL,
  `Ballroom` varchar(255) NOT NULL,
  `BasePrice` decimal(11,2) NOT NULL,
  `OTFee` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pricinginfo`
--

INSERT INTO `pricinginfo` (`serviceID`, `Category`, `Package`, `Ballroom`, `BasePrice`, `OTFee`) VALUES
(1, 'Wedding', 'ip', 'sb', 50000.00, 2000.00),
(2, 'Wedding ', 'ip', 'gb', 56000.00, 4000.00),
(3, 'Wedding ', 'cp', 'pb', 150000.00, 6000.00),
(4, 'Wedding ', 'cp', 'db', 162000.00, 8000.00),
(5, 'Wedding', 'dp', 'db', 200000.00, 8000.00),
(6, 'Birthday', 'kp', 'sb', 90000.00, 2000.00),
(7, 'Birthday', 'kp', 'gb', 96000.00, 4000.00),
(8, 'Birthday', 'dep', 'pb', 175000.00, 6000.00),
(9, 'Birthday', 'dep', 'db', 187000.00, 8000.00),
(10, 'Birthday', 'bp', 'sb', 100000.00, 2000.00),
(11, 'Birthday', 'bp', 'gb', 106000.00, 4000.00),
(12, 'All Occasions ', 'pA', 'sb', 40000.00, 2000.00),
(13, 'All Occasions ', 'pA', 'gb', 46000.00, 4000.00),
(14, 'All Occasions ', 'pB', 'gb', 75000.00, 4000.00),
(15, 'All Occasions ', 'pB', 'pb', 84000.00, 6000.00),
(16, 'All Occasions ', 'pB', 'db', 96000.00, 8000.00),
(17, 'Function Room', 'frm', 'sb', 20000.00, 2000.00),
(18, 'Function Room', 'frm', 'gb', 40000.00, 4000.00),
(19, 'Function Room', 'frm', 'pb', 60000.00, 6000.00),
(20, 'Function Room', 'frm', 'db', 80000.00, 8000.00);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(255) NOT NULL,
  `logID` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `bday` date NOT NULL,
  `gender` varchar(255) NOT NULL,
  `contNum` varchar(13) NOT NULL,
  `idType` varchar(255) NOT NULL,
  `idNum` varchar(255) NOT NULL,
  `idFront` mediumblob NOT NULL,
  `idBack` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cardinfo`
--
ALTER TABLE `cardinfo`
  ADD KEY `payment_ID` (`paymentID`);

--
-- Indexes for table `eventinfo`
--
ALTER TABLE `eventinfo`
  ADD PRIMARY KEY (`eventID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `logcredentials`
--
ALTER TABLE `logcredentials`
  ADD PRIMARY KEY (`logID`);

--
-- Indexes for table `onlineinfo`
--
ALTER TABLE `onlineinfo`
  ADD KEY `paymentID` (`paymentID`);

--
-- Indexes for table `paymentinfo`
--
ALTER TABLE `paymentinfo`
  ADD PRIMARY KEY (`paymentID`),
  ADD KEY `eventID` (`eventID`);

--
-- Indexes for table `pricinginfo`
--
ALTER TABLE `pricinginfo`
  ADD PRIMARY KEY (`serviceID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `logID` (`logID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eventinfo`
--
ALTER TABLE `eventinfo`
  MODIFY `eventID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logcredentials`
--
ALTER TABLE `logcredentials`
  MODIFY `logID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `paymentinfo`
--
ALTER TABLE `paymentinfo`
  MODIFY `paymentID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(255) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cardinfo`
--
ALTER TABLE `cardinfo`
  ADD CONSTRAINT `cardinfo_ibfk_1` FOREIGN KEY (`paymentID`) REFERENCES `paymentinfo` (`paymentID`);

--
-- Constraints for table `eventinfo`
--
ALTER TABLE `eventinfo`
  ADD CONSTRAINT `eventinfo_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);

--
-- Constraints for table `onlineinfo`
--
ALTER TABLE `onlineinfo`
  ADD CONSTRAINT `onlineinfo_ibfk_1` FOREIGN KEY (`paymentID`) REFERENCES `paymentinfo` (`paymentID`);

--
-- Constraints for table `paymentinfo`
--
ALTER TABLE `paymentinfo`
  ADD CONSTRAINT `paymentinfo_ibfk_1` FOREIGN KEY (`eventID`) REFERENCES `eventinfo` (`eventID`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `logID` FOREIGN KEY (`logID`) REFERENCES `logcredentials` (`logID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
