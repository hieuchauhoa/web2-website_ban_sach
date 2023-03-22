-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2019 at 06:12 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webbansach`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `MaKH` varchar(10) NOT NULL,
  `MaSach` varchar(10) NOT NULL,
  `NoiDungCMT` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`MaKH`, `MaSach`, `NoiDungCMT`) VALUES
('KH0', 'KNS0', ''),
('KH0', 'KT5', ''),
('KH0', 'TN4', ''),
('KH0', 'TT0', ''),
('KH1', 'CN1', ''),
('KH1', 'CN11', ''),
('KH1', 'TN1', ''),
('KH2', 'KT0', ''),
('KH2', 'TN2', ''),
('KH3', 'LS0', ''),
('KH3', 'LS4', ''),
('KH4', 'NN0', ''),
('KH4', 'TT10', ''),
('KH4', 'VH10', ''),
('KH4', 'VH3', ''),
('KH4', 'VH5', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
