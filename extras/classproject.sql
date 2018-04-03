-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 03, 2018 at 03:00 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `classproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`user`, `pass`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `extradetail`
--

DROP TABLE IF EXISTS `extradetail`;
CREATE TABLE IF NOT EXISTS `extradetail` (
  `regno` int(10) NOT NULL,
  `DOB` date NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `gemail` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `m10` int(5) NOT NULL,
  `m12` int(5) NOT NULL,
  `ECA` varchar(60) DEFAULT NULL,
  `Achievement` varchar(60) DEFAULT NULL,
  `hobby` varchar(300) NOT NULL,
  UNIQUE KEY `regno` (`regno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `extradetail`
--

INSERT INTO `extradetail` (`regno`, `DOB`, `fname`, `mname`, `gemail`, `address`, `m10`, `m12`, `ECA`, `Achievement`, `hobby`) VALUES
(20150213, '1997-12-25', 'Rabin Kumar Pandey', 'Soma Pandey', 'rabinkrpandey@gmail.com', '7/8-Vidyapati Road, B-zone, Durgapur-5,W.B', 90, 94, 'Social Engineering', 'Hmm', 'Painting,Gaming,Playing Guitar,Singing,Collecting items');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `regno` int(10) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `rollno` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `request` int(1) NOT NULL,
  UNIQUE KEY `regno` (`regno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`regno`, `branch`, `rollno`, `name`, `phone`, `email`, `pass`, `request`) VALUES
(20150213, 'IT', '15/IT/21', 'Sayan Pandey', 9564055284, 'sayanpandey@gmail.com', 'sayan', 1),
(20150214, 'ME', '15/ME/56', 'Superman', 1234567890, 'superman@gmail.com', 'sayan', -1),
(20150216, 'CHE', '15/CHE/88', 'Iron Man', 9696969696, 'tonyStark@gmail.com', 'sayan', 1),
(20150217, 'BT', '15/BT/85', 'Batman', 9434133858, 'batman@gmail.com', 'sayan', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
