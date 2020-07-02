-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2018 at 06:19 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `account`
--

-- --------------------------------------------------------

--
-- Table structure for table `apoint`
--

CREATE TABLE `apoint` (
  `ID` int(40) NOT NULL,
  `UserId` int(40) NOT NULL,
  `DoctorId` int(40) NOT NULL,
  `Date` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `apointmentregister`
--

CREATE TABLE `apointmentregister` (
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `appoinmentsregister`
--

CREATE TABLE `appoinmentsregister` (
  `ID` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `DoctorId` int(11) NOT NULL,
  `Date` datetime NOT NULL,
  `Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appoinmentsregister`
--

INSERT INTO `appoinmentsregister` (`ID`, `UserId`, `DoctorId`, `Date`, `Time`) VALUES
(99, 3, 9, '2018-07-26 03:00:00', '00:00:00'),
(100, 3, 9, '2018-07-26 10:00:00', '00:00:00'),
(101, 3, 9, '2018-07-26 11:00:00', '00:00:00'),
(102, 3, 9, '2018-07-26 12:00:00', '00:00:00'),
(103, 3, 9, '2018-07-26 04:00:00', '00:00:00'),
(104, 3, 9, '2018-07-26 02:00:00', '00:00:00'),
(105, 3, 9, '2018-07-26 03:00:00', '00:00:00'),
(106, 3, 1, '2018-07-26 09:00:00', '00:00:00'),
(107, 3, 1, '2018-07-26 09:00:00', '00:00:00'),
(108, 3, 1, '2018-07-26 02:00:00', '00:00:00'),
(109, 3, 1, '1970-01-01 00:00:00', '00:00:00'),
(110, 3, 1, '1970-01-01 00:00:00', '00:00:00'),
(111, 3, 8, '2018-07-26 11:00:00', '00:00:00'),
(112, 3, 8, '2018-07-27 11:00:00', '00:00:00'),
(113, 3, 8, '2018-07-27 11:00:00', '00:00:00'),
(114, 3, 8, '2018-07-27 02:00:00', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `doctorcategory`
--

CREATE TABLE `doctorcategory` (
  `ID` int(11) NOT NULL,
  `Category` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctorcategory`
--

INSERT INTO `doctorcategory` (`ID`, `Category`) VALUES
(1, 'General Consaltant'),
(2, 'Dentist'),
(3, 'Dermetology'),
(4, 'Eyes,Ear,Nose'),
(5, 'Gastrology'),
(19, 'Neorology'),
(21, 'Heart Specialist');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `ID` int(11) NOT NULL,
  `Name` varchar(32) NOT NULL,
  `Category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`ID`, `Name`, `Category`) VALUES
(1, 'Dr Suresh(MD)', 1),
(2, 'Dr Bikash(MBBS)', 2),
(5, 'ram', 1),
(6, 'Subash', 2),
(8, 'Dr. Sudeep (Neorologist)', 19),
(9, 'Sujan', 5),
(11, 'prabhas', 2),
(12, 'roshan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(20) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Phone` int(20) NOT NULL,
  `Message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `Name`, `Email`, `Phone`, `Message`) VALUES
(1, '', 'thaparokerx@gmail.co', 2147483647, 'sdfsdfsafd'),
(2, '', 'thaparokerx@gmail.co', 2147483647, 'sdfsdfsafd'),
(3, '', 'thapasujreshn2000@gm', 2147483647, 'I am very sick');

-- --------------------------------------------------------

--
-- Table structure for table `tea`
--

CREATE TABLE `tea` (
  `ID` int(20) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Category` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tea`
--

INSERT INTO `tea` (`ID`, `Name`, `Category`) VALUES
(1, 'fdsfsf', 7),
(2, 'Suresh', 1),
(3, 'sdfasfdsa', 999),
(4, 'fdsfsf', 7);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Userid` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Userid`, `username`, `email`, `password`) VALUES
(1, 'a', 'admin@admin.com', '456'),
(2, 'b', 'kcpramila@gmail.com', '4'),
(3, 'bikash', 'admin@admin.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appoinmentsregister`
--
ALTER TABLE `appoinmentsregister`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `doctorcategory`
--
ALTER TABLE `doctorcategory`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Category` (`Category`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tea`
--
ALTER TABLE `tea`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `Userid` (`Userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appoinmentsregister`
--
ALTER TABLE `appoinmentsregister`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `doctorcategory`
--
ALTER TABLE `doctorcategory`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tea`
--
ALTER TABLE `tea`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_ibfk_1` FOREIGN KEY (`Category`) REFERENCES `doctorcategory` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
