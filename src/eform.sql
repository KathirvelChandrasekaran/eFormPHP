-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2019 at 02:57 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eform`
--
CREATE DATABASE IF NOT EXISTS `eform` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `eform`;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE `login` (
  `uname` varchar(7) NOT NULL,
  `passwd` varchar(20) DEFAULT NULL,
  `name` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`uname`, `passwd`, `name`) VALUES
('19mx101', '12345', 'Ashok Raj'),
('19mx102', 'password', 'Deepak Kumar'),
('19mx103', '12345', 'Gokul Krishnan'),
('19mx207', '08may98', 'KATHIRVEL');

-- --------------------------------------------------------

--
-- Table structure for table `loginstaff`
--

DROP TABLE IF EXISTS `loginstaff`;
CREATE TABLE `loginstaff` (
  `unamestaff` varchar(9) NOT NULL,
  `passwd` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loginstaff`
--

INSERT INTO `loginstaff` (`unamestaff`, `passwd`) VALUES
('18mx01', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `studentdetails`
--

DROP TABLE IF EXISTS `studentdetails`;
CREATE TABLE `studentdetails` (
  `reg` varchar(25) NOT NULL,
  `name` varchar(25) NOT NULL,
  `degree` varchar(25) NOT NULL,
  `branch` varchar(25) NOT NULL,
  `image` longblob NOT NULL,
  `doj` date NOT NULL,
  `dob` date NOT NULL,
  `blood` varchar(5) NOT NULL,
  `religion` varchar(25) NOT NULL,
  `community` varchar(5) NOT NULL,
  `parentname` varchar(20) NOT NULL,
  `income` varchar(10) NOT NULL,
  `parentaddr` varchar(50) NOT NULL,
  `parentphone` varchar(10) NOT NULL,
  `occupation` varchar(20) NOT NULL,
  `officialaddr` varchar(50) NOT NULL,
  `phonecomm` varchar(10) NOT NULL,
  `postal` varchar(7) NOT NULL,
  `mail` varchar(25) NOT NULL,
  `commadd` varchar(50) NOT NULL,
  `studphone` varchar(10) NOT NULL,
  `mailstud` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentdetails`
--

INSERT INTO `studentdetails` (`reg`, `name`, `degree`, `branch`, `image`, `doj`, `dob`, `blood`, `religion`, `community`, `parentname`, `income`, `parentaddr`, `parentphone`, `occupation`, `officialaddr`, `phonecomm`, `postal`, `mail`, `commadd`, `studphone`, `mailstud`) VALUES
('19mx207', 'Kathirvel', 'MCA', 'MCA', 0x53637265656e73686f74202831292e706e67, '2019-08-28', '1998-05-08', 'O+ve', 'Hindhu', 'MBC', 'Chandrasekaran', '100000', 'aaa,bbb,xxx.', '9876543210', 'Worker', 'aaa,bbb,xxx.', '9876543210', '641062', 'abc@f.com', 'aaa,bbb,xxx.', '9876543210', 'abc@f.com');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

DROP TABLE IF EXISTS `test`;
CREATE TABLE `test` (
  `name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`name`) VALUES
('kathir'),
('..'),
(''),
('kathir');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`uname`);

--
-- Indexes for table `loginstaff`
--
ALTER TABLE `loginstaff`
  ADD PRIMARY KEY (`unamestaff`);

--
-- Indexes for table `studentdetails`
--
ALTER TABLE `studentdetails`
  ADD PRIMARY KEY (`reg`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
