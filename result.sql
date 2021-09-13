-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2021 at 02:23 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `result`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `name`) VALUES
(1, 'shoyebjio3398@gmail.com', 'sk##3398', 'Sk Shoyeb ');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `roll_no` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `subject1` varchar(50) NOT NULL,
  `subject2` varchar(50) NOT NULL,
  `subject3` varchar(50) NOT NULL,
  `subject4` varchar(50) NOT NULL,
  `subject5` varchar(50) NOT NULL,
  `marks1` int(11) NOT NULL,
  `marks2` int(11) NOT NULL,
  `marks3` int(11) NOT NULL,
  `marks4` int(11) NOT NULL,
  `marks5` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `gname`, `address`, `image`, `roll_no`, `dob`, `subject1`, `subject2`, `subject3`, `subject4`, `subject5`, `marks1`, `marks2`, `marks3`, `marks4`, `marks5`) VALUES
(5, 'sk shoyeb', 'Sk Hasib', 'Puratan Chawk, Ghora Sahid, Burdwan', '52367870.jpg', '2021HS01', '2001-12-16', 'Bengali', 'English', 'Computer Application', 'Geography', 'Math', 82, 82, 92, 92, 60),
(6, 'Subhojit Memer', 'Unknown', 'Salt Lake, Kolkata', '241370602_591852325531125_7736977529655037849_n.jpg', '2021HS02', '2001-01-13', 'Bengali', 'English', 'Geography', 'Computer Application', 'Math', 80, 80, 100, 100, 92),
(7, 'Neel Banerjee', 'Lal Banerjee', 'Colorful para, Sehera Bazar, Burdwan', '124453800_689327068679066_5085098445256475737_n.jpg', '2021HS03', '2001-12-16', 'Bengali', 'English', 'Computer Application', 'Math', 'Dance', 72, 85, 95, 95, 100),
(8, 'Sumit Kumar Das', 'Unknown', 'Guskara, Burdwan', '73597446.jpg', '2021HS04', '2001-02-14', 'Bengali', 'English', 'Computer Application', 'Math', 'Dance', 80, 90, 94, 94, 100),
(9, 'Chandra Sekhar', 'Surya Sekhar', 'Golshi, Burdwan', 'chandra.jpg', '2021HS05', '2001-05-13', 'Bengali', 'English', 'Geography', 'Computer Application', 'Math', 80, 85, 90, 90, 70);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_marks` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `total_marks`) VALUES
(1, 'Bengali', 110),
(2, 'English', 100),
(3, 'Geography', 100),
(4, 'History', 100),
(6, 'Computer Application', 100),
(7, 'Math', 100),
(8, 'Physical Science', 100),
(9, 'Biology', 100),
(10, 'Chemestry', 100),
(11, 'Nutrition', 100),
(13, 'Dance', 100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
