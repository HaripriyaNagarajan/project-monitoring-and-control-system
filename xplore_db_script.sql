-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2019 at 05:44 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xplore`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `Client_Id` varchar(100) NOT NULL,
  `Client_Name` varchar(100) NOT NULL,
  `Mobile` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Project_Name` varchar(100) NOT NULL,
  `Company_Name` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `flag` int(11) NOT NULL,
  `flag_allocate` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `Client_Id`, `Client_Name`, `Mobile`, `Email`, `Project_Name`, `Company_Name`, `Address`, `flag`, `flag_allocate`) VALUES
(11, 'CL_11', 'Client1', '9078908900', 'clinet1@gmail.com', 'Project_1', 'Cmp1', 'coimbatre', 0, '1'),
(12, 'CL_12', 'Client2', '5689008990', 'client2Gmail.com', 'project2', 'cmp2', 'chennai', 1, '1'),
(13, 'CL_13', 'Client3', '898978909', 'client3@gmail.com', 'projectt3', 'cmpy3', 'madurai', 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `Employee_Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Mobile` int(11) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Technical_Skills` varchar(100) NOT NULL,
  `Experience` varchar(100) NOT NULL,
  `flag` int(11) NOT NULL,
  `Employee_Id` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `Employee_Name`, `Email`, `Mobile`, `Address`, `Technical_Skills`, `Experience`, `flag`, `Employee_Id`, `Password`) VALUES
(11, 'emp1', 'emp1Gmail.com', 907867890, 'chennai', 'dotnet', '3', 1, 'Emp_11', 'emp'),
(12, 'emp2', 'emp@gmail.com', 2147483647, 'erode', 'php', '3', 1, 'Emp_12', 'emp'),
(13, 'emp3', 'emo3@gmail.com', 2147483647, 'cbe', 'dotnet', '3', 0, 'Emp_13', 'emp');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `Project_Id` varchar(100) NOT NULL,
  `Project_Name` varchar(100) NOT NULL,
  `Client_Name` varchar(100) NOT NULL,
  `Technology` varchar(100) NOT NULL,
  `Duration` int(100) NOT NULL,
  `Budget` int(11) NOT NULL,
  `flag` int(11) NOT NULL,
  `flag_allocate` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `Project_Id`, `Project_Name`, `Client_Name`, `Technology`, `Duration`, `Budget`, `flag`, `flag_allocate`) VALUES
(11, 'Project_11', 'Project_1', '', 'dotnet', 100, 10000, 0, '1'),
(12, 'Project_12', 'project2', '', 'php', 500, 4000, 1, '1'),
(13, 'Project_13', 'projectt3', '', 'php', 10, 5000, 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `project_schedule`
--

CREATE TABLE `project_schedule` (
  `id` int(11) NOT NULL,
  `Employee_Name` varchar(100) NOT NULL,
  `Project_Name` varchar(100) NOT NULL,
  `Technology` varchar(100) NOT NULL,
  `Activity` varchar(100) NOT NULL,
  `Duration` varchar(100) NOT NULL,
  `Project_Schedule_Id` varchar(100) NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_schedule`
--

INSERT INTO `project_schedule` (`id`, `Employee_Name`, `Project_Name`, `Technology`, `Activity`, `Duration`, `Project_Schedule_Id`, `flag`) VALUES
(11, 'emp1', 'Project_1', 'dotnet', 'code', '100', 'Project_Schedule_11', 0),
(12, 'emp2', 'project2', 'php', 'code', '500', 'Project_Schedule_12', 1),
(13, 'emp2', 'projectt3', 'php', 'test', '10', 'Project_Schedule_13', 0);

-- --------------------------------------------------------

--
-- Table structure for table `project_work`
--

CREATE TABLE `project_work` (
  `id` int(11) NOT NULL,
  `Project_Name` varchar(100) NOT NULL,
  `Technology` varchar(100) NOT NULL,
  `Activity` varchar(100) NOT NULL,
  `Total_Duration` int(100) NOT NULL,
  `Work_Duration` int(100) NOT NULL,
  `Work_Status` varchar(100) NOT NULL,
  `Employee_Name` varchar(100) NOT NULL,
  `Project_Status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_work`
--

INSERT INTO `project_work` (`id`, `Project_Name`, `Technology`, `Activity`, `Total_Duration`, `Work_Duration`, `Work_Status`, `Employee_Name`, `Project_Status`) VALUES
(11, 'Project_1', 'dotnet', 'code', 100, 90, 'code 1 stage', 'emp1', 'In-Progress'),
(12, 'Project_1', 'dotnet', 'code', 100, 15, 'progress', 'emp1', 'In-Progress'),
(13, 'project2', 'php', 'code', 500, 450, 'done', 'emp2', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `Id` int(11) NOT NULL,
  `Username` varchar(10) NOT NULL,
  `Password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`Id`, `Username`, `Password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `uname` varchar(100) NOT NULL,
  `upwd` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`uname`, `upwd`) VALUES
('admin', 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
