-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 26, 2022 at 05:58 PM
-- Server version: 8.0.27
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spring`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company`
--

DROP TABLE IF EXISTS `tbl_company`;
CREATE TABLE IF NOT EXISTS `tbl_company` (
  `Comp_ID` int NOT NULL AUTO_INCREMENT,
  `Comp_Name` varchar(200) NOT NULL,
  `Comp_Addr` varchar(200) NOT NULL,
  PRIMARY KEY (`Comp_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbl_company`
--

INSERT INTO `tbl_company` (`Comp_ID`, `Comp_Name`, `Comp_Addr`) VALUES
(1, 'Jamil Parvez', 'Chicago, Il'),
(2, 'Company 1', 'New York'),
(3, 'Random Company', 'Virginia');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

DROP TABLE IF EXISTS `tbl_employee`;
CREATE TABLE IF NOT EXISTS `tbl_employee` (
  `Emp_ID` int NOT NULL AUTO_INCREMENT,
  `Emp_Name` varchar(50) NOT NULL,
  `Emp_Post` varchar(50) NOT NULL,
  `Emp_Comp` varchar(200) NOT NULL,
  `Emp_Email` varchar(50) NOT NULL,
  `Emp_Phone` varchar(50) NOT NULL,
  PRIMARY KEY (`Emp_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`Emp_ID`, `Emp_Name`, `Emp_Post`, `Emp_Comp`, `Emp_Email`, `Emp_Phone`) VALUES
(1, 'Jamil Parvez', 'Full Stack Developer', 'JP', 'jamilparvez.work@gmail.com', '3122390989'),
(2, 'Ryan Leimbach', 'Senior Developer', 'DG Tech', 'ryanleimbach@gmail.com', '3125783678'),
(3, 'Jamil', 'Developer', '', 'jamil@gmail.com', '123456789'),
(4, 'Jamil P', 'Programmer', 'Jamil Parvez', 'hijamil@gmail.com', '21212121212'),
(5, 'Jamil Par', 'Full Stack', 'Company 1', 'jamil@hotmail.com', '232323323'),
(6, 'Jamil', 'Dev', 'Company 1', 'jam@outlook.com', '323232332');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
