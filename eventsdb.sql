-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Oct 26, 2023 at 02:47 PM
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
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookingID` int(255) NOT NULL,
  `userID` int(255) NOT NULL,
  `contNum` int(255) NOT NULL,
  `reqs` varchar(255) NOT NULL,
  `eventID` int(255) NOT NULL,
  `paymentID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cardinfo`
--

CREATE TABLE `cardinfo` (
  `payment_ID` int(255) NOT NULL,
  `cardNum` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `eventinfo`
--

CREATE TABLE `eventinfo` (
  `eventID` int(255) NOT NULL,
  `userID` int(255) NOT NULL,
  `funcRoom` varchar(255) NOT NULL,
  `package` varchar(255) NOT NULL,
  `eventType` varchar(255) NOT NULL,
  `numAttendee` int(255) NOT NULL,
  `eventDate` date NOT NULL,
  `eventTimeStart` time(6) NOT NULL,
  `eventTimeEnd` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logcredentials`
--

CREATE TABLE `logcredentials` (
  `logID` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logcredentials`
--

INSERT INTO `logcredentials` (`logID`, `email`, `password`, `username`) VALUES
(3, 'aubs@gmail.com', 'aubs123', 'Aubs'),
(4, 'sela@gmail.com', 'sela1234', 'Sela'),
(5, 'aubreymae@gmail.com', 'aubreymae', 'aubrei');

-- --------------------------------------------------------

--
-- Table structure for table `paymentinfo`
--

CREATE TABLE `paymentinfo` (
  `paymentID` int(255) NOT NULL,
  `bookingID` int(255) NOT NULL,
  `total_bill` decimal(10,2) NOT NULL,
  `downpayment` decimal(10,2) NOT NULL,
  `paymentType` varchar(255) NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  `fullPayment` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `contNum` int(255) NOT NULL,
  `idType` varchar(255) NOT NULL,
  `idNum` varchar(255) NOT NULL,
  `idFront` mediumblob NOT NULL,
  `idBack` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `logID`, `fname`, `mname`, `lname`, `bday`, `gender`, `contNum`, `idType`, `idNum`, `idFront`, `idBack`) VALUES
(3, 3, 'Aubrey', 'Mae', 'Mangahas', '2003-05-26', 'Female', 2147483647, 'natID', '0987654321', 0x3339333530303032365f3333373737343137383734313234315f353734393430303932313734323537333530305f6e2e706e67, 0x4d41434153414554202831292e706e67),
(4, 4, 'Ressala ', 'Mae', 'Dangca', '2022-09-05', 'Female', 2147483647, 'sss', '246897531', 0x4d41434153414554202831292e706e67, 0x4f49502e6a7067),
(5, 5, 'Aubrey', 'Diaz', 'Mang', '2003-05-06', 'Female', 2147483647, 'natID', '210100566', 0x444349542036352053656174696e6720506c616e2e706e67, 0x444349542036352053656174696e6720506c616e2e706e67);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookingID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `eventID` (`eventID`),
  ADD KEY `paymentID` (`paymentID`);

--
-- Indexes for table `cardinfo`
--
ALTER TABLE `cardinfo`
  ADD KEY `payment_ID` (`payment_ID`);

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
-- Indexes for table `paymentinfo`
--
ALTER TABLE `paymentinfo`
  ADD PRIMARY KEY (`paymentID`),
  ADD KEY `bookingID` (`bookingID`);

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
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bookingID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `eventinfo`
--
ALTER TABLE `eventinfo`
  MODIFY `eventID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logcredentials`
--
ALTER TABLE `logcredentials`
  MODIFY `logID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `paymentinfo`
--
ALTER TABLE `paymentinfo`
  MODIFY `paymentID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`eventID`) REFERENCES `eventinfo` (`eventID`),
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`paymentID`) REFERENCES `paymentinfo` (`paymentID`);

--
-- Constraints for table `cardinfo`
--
ALTER TABLE `cardinfo`
  ADD CONSTRAINT `cardinfo_ibfk_1` FOREIGN KEY (`payment_ID`) REFERENCES `paymentinfo` (`paymentID`);

--
-- Constraints for table `eventinfo`
--
ALTER TABLE `eventinfo`
  ADD CONSTRAINT `eventinfo_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);

--
-- Constraints for table `paymentinfo`
--
ALTER TABLE `paymentinfo`
  ADD CONSTRAINT `paymentinfo_ibfk_1` FOREIGN KEY (`bookingID`) REFERENCES `booking` (`bookingID`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `logID` FOREIGN KEY (`logID`) REFERENCES `logcredentials` (`logID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
