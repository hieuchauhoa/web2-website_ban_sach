-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2019 at 03:36 PM
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
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `MaHD` varchar(10) NOT NULL,
  `MaKH` varchar(10) NOT NULL,
  `NgayDatHang` datetime NOT NULL,
  `DiaChi` varchar(500) NOT NULL,
  `HinhThucThanhToan` varchar(100) NOT NULL,
  `HinhThucGiaoHang` varchar(100) NOT NULL,
  `TongSoLuong` int(10) NOT NULL,
  `TongTien` int(20) NOT NULL,
  `TinhTrang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`MaHD`, `MaKH`, `NgayDatHang`, `DiaChi`, `HinhThucThanhToan`, `HinhThucGiaoHang`, `TongSoLuong`, `TongTien`, `TinhTrang`) VALUES
('HD0', 'KH0', '2017-02-11 10:33:08', '478 Cách Mạng Tháng Tám, phường 11, Quận 3, TP.HCM', '3', '1', 4, 530650, 'Đã thanh toán xong'),
('HD1', 'KH1', '2019-02-12 17:28:25', '12/33 Ngyễn Sỹ Sách , P15, Q.Tân Bình, TP HCM', '3', '1', 3, 240400, 'Đã thanh toán xong'),
('HD10', 'KH5', '2017-09-06 15:15:00', '478/15 Quang Trung,P11,Q.Gò Vấp,TP.HCM', '3', '1', 5, 382400, 'Đã thanh toán xong'),
('HD11', 'KH6', '2016-01-18 14:15:00', '20/15/18 Nguyễn Đình Chiểu ,P.3, Q.6,TP.HCM', '2', '1', 8, 2120000, 'Đã thanh toán xong'),
('HD12', 'KH7', '2017-10-10 23:09:38', '635/30/6 An Dương Vương, Q.5, P.3,TP.HCM', '1', '2', 25, 2943500, 'Chưa thanh toán xong'),
('HD13', 'KH8', '2018-07-30 03:05:00', '180/15/35 Thống Nhất, P.11, Q.Gò Vấp,TP.HCM', '2', '2', 15, 1181700, 'Chưa thanh toán xong'),
('HD14', 'KH9', '2019-04-02 04:16:00', '950 Nguyễn Kiệm , P.11, Q.Gò vấp,TP.HCM', '3', '1', 10, 696000, 'Chưa thanh toán xong'),
('HD2', 'KH2', '2018-01-03 09:23:26', '123 Trường Trinh, Q.Tân Bình, TP HCM', '3', '1', 2, 207400, 'Đã thanh toán xong'),
('HD3', 'KH3', '2019-04-26 14:18:38', '189A Cống Quỳnh, phường Nguyễn Cư Trinh, Quận 1,TP.HCM', '3', '1', 2, 311200, 'Chưa thanh toán xong'),
('HD4', 'KH4', '2019-04-25 07:44:31', '58 Nguyễn Trãi, Phường 3, Quận 5,TP.HCM', '3', '1', 5, 422900, 'Chưa thanh toán xong'),
('HD5', 'KH5', '2017-09-30 16:11:00', '478/15 Quang Trung,P11,Q.Gò Vấp,TP.HCM', '3', '1', 11, 1122100, 'Đã thanh toán xong'),
('HD6', 'KH6', '2016-11-02 03:13:18', '20/15/18 Nguyễn Đình Chiểu ,P.3, Q.6,TP.HCM', '2', '1', 20, 1559740, 'Đã thanh toán xong'),
('HD7', 'KH7', '2017-12-05 13:12:16', '635/30/6 An Dương Vương, Q.5, P.3,TP.HCM', '1', '2', 25, 3298050, 'Đã thanh toán xong'),
('HD8', 'KH8', '2019-05-12 05:10:30', '180/15/35 Thống Nhất, P.11, Q.Gò Vấp,TP.HCM', '2', '2', 15, 939350, 'Chưa thanh toán xong'),
('HD9', 'KH9', '2016-08-20 07:03:02', '950 Nguyễn Kiệm , P.11, Q.Gò vấp,TP.HCM', '3', '1', 10, 993350, 'Chưa thanh toán xong');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`MaHD`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
