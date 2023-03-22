-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2019 at 05:55 PM
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
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MaNhanVien` varchar(10) NOT NULL,
  `HoTen` varchar(100) NOT NULL,
  `TenDangNhap` varchar(100) NOT NULL,
  `MatKhau` varchar(100) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `SĐT` varchar(20) NOT NULL,
  `TrangThai` varchar(5) NOT NULL,
  `MaQuyen` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`MaNhanVien`, `HoTen`, `TenDangNhap`, `MatKhau`, `Email`, `SĐT`, `TrangThai`, `MaQuyen`) VALUES
('A0', 'Lê Việt Hoàng', 'viethoang123', '123456', 'hoanga15@gmail.com', '0987775322', '0', '1'),
('A1', 'Hoàng Minh Triết', 'triet123', '123456', 'trieta15@gmail.com', '0122375758', '0', '1'),
('A2', 'Ninh Ngọc Hiếu', 'hieu123', '123456', 'hieua15@gmail.com', '0123124344', '0', '1'),
('A3', 'Võ Văn Đại', 'dai123', '654321', 'daia15@gmail.com', '0984357345', '0', '1'),
('A4', 'Bùi Tiến Thông', 'thong123', '123456789', 'thonga15@gmail.com', '0934327223', '0', '1'),
('A5', 'admin', 'admin', 'admin', 'admin@gmail.com', '0123456789', '0', '1'),
('M0', 'Lê Đại Hành', 'hanh123', 'hanhhanh456', 'hanhaaa@gmail.com', '0128374634', '0', '2'),
('M1', 'Nguyễn Hùng Vương', 'vuong123', 'vuongnguyen444', 'vuong999@gmail.com', '0434253443', '0', '2'),
('M2', 'Trần Quốc Trung', 'trung123456', '123456', 'trungtran@gmail.com', '0165456789', '0', '2'),
('M3', 'Trần Quốc Tùng', 'tunglun123', 'tungtungtung', 'tungtrang@gmail.com', '0248390122', '0', '2'),
('M4', 'Phạm Hùng Vĩ', 'vivuive123456', 'vivuvi123', 'vipham@gmail.com', '0988343472', '0', '2'),
('M5', 'root', 'root', 'root', 'root@gmail.com', '0123456789', '0', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MaNhanVien`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
