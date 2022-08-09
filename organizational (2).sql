-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2022 at 05:27 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `organizational`
--

-- --------------------------------------------------------

--
-- Table structure for table `departmentdetails`
--

CREATE TABLE `departmentdetails` (
  `depid` int(11) NOT NULL,
  `depname` varchar(255) DEFAULT NULL,
  `dephod` int(11) DEFAULT NULL,
  `totalstaf` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departmentdetails`
--

INSERT INTO `departmentdetails` (`depid`, `depname`, `dephod`, `totalstaf`) VALUES
(1, 'computerscience', 103, 100),
(2, 'biotech', 102, 100),
(3, 'e&e', 101, 100),
(4, 'InformationScience', 103, 100);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `empid` int(11) NOT NULL,
  `empname` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `contactnum` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`empid`, `empname`, `dob`, `designation`, `contactnum`, `email`) VALUES
(101, 'ABC', '1991-02-07', 'assistant professor', 935665641, 'ab@gmail.com'),
(102, 'BCD', '1993-07-13', 'assistant professor', 636359774, 'bcd@gmail.com'),
(103, 'EDR', '1986-04-09', 'professor', 8975746, 'er@gmail.com'),
(104, 'ASD', '1993-10-22', 'professor', 963, 'asd@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `stid` int(11) NOT NULL,
  `stname` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `dep` int(11) DEFAULT NULL,
  `contactno` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stid`, `stname`, `dob`, `dep`, `contactno`, `email`) VALUES
(1001, 'asdas', '2022-08-27', 4, 8945222, 'der@gmail.com'),
(1002, 'tilak', '2022-08-21', 0, 2147483647, 'tilak@gmail.com'),
(1002, 'tilak', '2022-08-21', 0, 2147483647, 'tilak@gmail.com'),
(1003, 'shashank', '2021-01-30', 4, 2147483647, 'sha@gmail.com'),
(1004, 'tilak', '2022-08-14', 1, 2147483647, 'tilak@gmail.com'),
(1005, 'ab', '2022-08-06', 1, 2147483647, 'as@gmail.com'),
(1006, 'shashank', '2022-08-01', 2, 2147483647, '4nm19is150@nmamit.in'),
(1007, 'abcd', '2022-08-21', 8, 12389, 'asd@gmail.com'),
(1008, 'aa', '2022-08-20', 9, 8966, 'asd@gmail.com'),
(1009, 'ram', '2021-09-15', 1, 2147483647, 'ram@gmail.com'),
(1010, 'abc', '2022-08-20', 4, 2147483647, 'abc@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(1, 'abhi', 'abhidixitsagar@gmail.com', '202cb962ac59075b964b07152d234b70', 'admin'),
(1023, 'aa', 'asd@gmail.com', '699c8f0489033dcb85f2efbcd2148993', 'student'),
(1024, 'ram', 'ram@gmail.com', '9001587b0fed20a2cb33e43a51bb3f83', 'student'),
(1025, 'abc', 'abc@gmail.com', '3f009d72559f51e7e454b16e5d0687a1', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `worksfor`
--

CREATE TABLE `worksfor` (
  `empid` int(11) NOT NULL,
  `depid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departmentdetails`
--
ALTER TABLE `departmentdetails`
  ADD PRIMARY KEY (`depid`),
  ADD KEY `dephod` (`dephod`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`empid`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `worksfor`
--
ALTER TABLE `worksfor`
  ADD PRIMARY KEY (`empid`,`depid`),
  ADD KEY `depid` (`depid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1026;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `departmentdetails`
--
ALTER TABLE `departmentdetails`
  ADD CONSTRAINT `departmentdetails_ibfk_1` FOREIGN KEY (`dephod`) REFERENCES `employee` (`empid`);

--
-- Constraints for table `worksfor`
--
ALTER TABLE `worksfor`
  ADD CONSTRAINT `worksfor_ibfk_1` FOREIGN KEY (`empid`) REFERENCES `employee` (`empid`),
  ADD CONSTRAINT `worksfor_ibfk_2` FOREIGN KEY (`depid`) REFERENCES `departmentdetails` (`depid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
