-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2022 at 07:03 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `Name` varchar(70) NOT NULL,
  `Email` varchar(70) NOT NULL,
  `User_Name` varchar(70) NOT NULL,
  `Password` varchar(70) NOT NULL,
  `Dob` date NOT NULL,
  `Gender` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`Name`, `Email`, `User_Name`, `Password`, `Dob`, `Gender`) VALUES
('Sharain Anoy', 'anoy@gmail.com', 'anoy1234', 'anoy1234', '1998-12-01', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_info`
--

CREATE TABLE `doctor_info` (
  `Name` varchar(70) NOT NULL,
  `Email` varchar(70) NOT NULL,
  `Speciality` varchar(100) NOT NULL,
  `Schedule` varchar(100) NOT NULL,
  `User_Name` varchar(70) NOT NULL,
  `Password` varchar(70) NOT NULL,
  `Dob` date NOT NULL,
  `Gender` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor_info`
--

INSERT INTO `doctor_info` (`Name`, `Email`, `Speciality`, `Schedule`, `User_Name`, `Password`, `Dob`, `Gender`) VALUES
('Dr Andrew', 'andrew@gmail.com', 'Ophthalmologists', '2 PM to 5 PM', 'andrew1234', 'andrew1234', '1998-12-22', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `nurse_info`
--

CREATE TABLE `nurse_info` (
  `Name` varchar(70) NOT NULL,
  `Email` varchar(70) NOT NULL,
  `Schedule` varchar(100) NOT NULL,
  `User_Name` varchar(70) NOT NULL,
  `Password` varchar(70) NOT NULL,
  `Dob` date NOT NULL,
  `Gender` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nurse_info`
--

INSERT INTO `nurse_info` (`Name`, `Email`, `Schedule`, `User_Name`, `Password`, `Dob`, `Gender`) VALUES
('Dipu Moni', 'dipu@gmail.com', '2 PM to 5 PM', 'dipu1234', 'dipu1234', '1998-12-16', 'female');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `Name` varchar(70) NOT NULL,
  `Email` varchar(70) NOT NULL,
  `User_Name` varchar(70) NOT NULL,
  `Password` varchar(70) NOT NULL,
  `Dob` date NOT NULL,
  `Gender` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`Name`, `Email`, `User_Name`, `Password`, `Dob`, `Gender`) VALUES
('Tanvir test', 'tanvir123@gmail.com', 'tanvir123', 'tanvir123', '1998-12-29', 'male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`User_Name`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `User_Name` (`User_Name`);

--
-- Indexes for table `doctor_info`
--
ALTER TABLE `doctor_info`
  ADD PRIMARY KEY (`User_Name`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `User_Name` (`User_Name`);

--
-- Indexes for table `nurse_info`
--
ALTER TABLE `nurse_info`
  ADD PRIMARY KEY (`User_Name`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `User_Name` (`User_Name`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`User_Name`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `User_Name` (`User_Name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
