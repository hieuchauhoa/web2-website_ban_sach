-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2019 at 04:39 PM
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
-- Table structure for table `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `MaHD` varchar(10) NOT NULL,
  `MaSach` varchar(10) NOT NULL,
  `SoLuong` int(20) NOT NULL,
  `TongTienCT` int(20) NOT NULL,
  `NgayGiaoHang` date NOT NULL,
  `TinhTrangCT` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`MaHD`, `MaSach`, `SoLuong`, `TongTienCT`, `NgayGiaoHang`, `TinhTrangCT`) VALUES
('HD0', 'KNS0', 1, 169150, '2017-02-15', 'Hàng đang nhập từ kho'),
('HD0', 'KT5', 1, 159200, '2017-02-16', 'Đã giao hàng'),
('HD0', 'TN4', 1, 127500, '2017-02-17', 'Đã giao hàng'),
('HD0', 'TT0', 1, 74800, '2017-02-17', 'Đã giao hàng'),
('HD1', 'CN1', 1, 68000, '2019-02-14', 'Đã giao hàng'),
('HD1', 'CN11', 1, 94400, '2019-02-15', 'Đã giao hàng'),
('HD1', 'TN1', 1, 78000, '2019-02-15', 'Đã giao hàng'),
('HD2', 'KT0', 1, 84150, '2018-01-08', 'Đã giao hàng'),
('HD2', 'TN2', 1, 123250, '2018-01-08', 'Đã giao hàng'),
('HD3', 'LS0', 1, 160000, '0000-00-00', 'Hàng đang nhập từ kho'),
('HD3', 'LS4', 1, 151200, '2019-04-29', 'Hàng đang nhập từ kho'),
('HD4', 'NN0', 1, 74700, '2019-04-29', 'Hàng đang nhập từ kho'),
('HD4', 'TT10', 1, 56700, '2019-04-30', 'Hàng đang nhập từ kho'),
('HD4', 'VH10', 1, 148000, '2019-04-30', 'Hàng đang nhập từ kho'),
('HD4', 'VH3', 1, 67500, '2019-04-30', 'Hàng đang nhập từ kho'),
('HD4', 'VH5', 1, 76000, '2019-04-30', 'Hàng đang nhập từ kho'),
('HD5', 'VH6', 5, 596000, '2017-10-01', 'Đã giao hàng\r\n'),
('HD5', 'TT12', 3, 280500, '2017-10-02', 'Đã giao hàng'),
('HD5', 'KT11', 2, 174400, '2017-10-03', 'Đã giao hàng'),
('HD5', 'KNS7', 1, 71200, '2017-10-03', 'Đã giao hàng'),
('HD6', 'CN14', 13, 707200, '2016-11-02', 'Đã giao hàng'),
('HD6', 'CN2', 3, 219300, '2016-11-03', 'Đã giao hàng'),
('HD6', 'KT13', 2, 353600, '2016-11-03', 'Đã giao hàng'),
('HD6', 'VH9', 1, 153000, '2016-11-04', 'Đã giao hàng'),
('HD6', 'VH8', 1, 126640, '2016-11-04', 'Đã giao hàng'),
('HD7', 'CN0', 10, 1785000, '2017-12-06', 'Đã giao hàng'),
('HD7', 'CN1', 5, 340000, '2017-12-07', 'Đã giao hàng'),
('HD7', 'CN13', 3, 192000, '2017-12-08', 'Đã giao hàng'),
('HD7', 'KNS1', 4, 508800, '2017-12-06', 'Đã giao hàng'),
('HD7', 'KT0', 1, 84150, '2017-12-06', 'Đã giao hàng'),
('HD7', 'KT2', 1, 90100, '2017-12-06', 'Đã giao hàng'),
('HD7', 'NN2', 1, 298000, '2017-12-06', 'Đã giao hàng'),
('HD8', 'LS5', 2, 200000, '2019-05-13', 'Hàng đang nhập từ kho'),
('HD8', 'TT7', 5, 255000, '2019-05-13', 'Đã giao hàng'),
('HD8', 'TT8', 2, 107100, '2019-05-14', 'Hàng đang nhập từ kho'),
('HD8', 'TT15', 3, 114750, '2019-05-12', 'Đã giao hàng'),
('HD8', 'TN4', 1, 127500, '2019-05-12', 'Đã giao hàng'),
('HD8', 'VH3', 2, 135000, '2019-05-14', 'Hàng đang nhập từ kho'),
('HD9', 'KNS11', 5, 435750, '2016-08-21', 'Hàng đang nhập từ kho'),
('HD9', 'CN2', 3, 219300, '2016-08-21', 'Hàng đang nhập từ kho'),
('HD9', 'KNS0', 2, 338300, '2016-08-21', 'Đã giao hàng'),
('HD10', 'CN13', 3, 192000, '2017-09-07', 'Đã giao hàng'),
('HD10', 'KT1', 2, 190400, '2017-09-08', 'Đã giao hàng'),
('HD11', 'LS1', 2, 1200000, '2016-01-18', 'Đã giao hàng'),
('HD11', 'KT3', 2, 285600, '2016-01-19', 'Đã giao hàng'),
('HD11', 'KT5', 2, 318400, '2016-01-19', 'Đã giao hàng'),
('HD11', 'NN1', 2, 316000, '2016-01-20', 'Đã giao hàng'),
('HD12', 'TT10', 5, 283500, '2017-10-13', 'Hàng đang nhập từ kho'),
('HD12', 'VH11', 5, 480000, '2017-10-13', 'Hàng đang nhập từ kho'),
('HD12', 'NN3', 5, 990000, '2017-10-13', 'Hàng đang nhập từ kho'),
('HD12', 'LS0', 5, 800000, '2017-10-10', 'Đã giao hàng'),
('HD12', 'TN1', 5, 390000, '2017-10-12', 'Đã giao hàng'),
('HD13', 'TN5', 3, 168000, '2018-08-01', 'Đã giao hàng'),
('HD13', 'TN3', 3, 324000, '2018-08-01', 'Đã giao hàng'),
('HD13', 'TT12', 3, 280500, '2018-08-01', 'Đã giao hàng'),
('HD13', 'TT3', 3, 183600, '2018-08-02', 'Hàng đang nhập từ kho'),
('HD13', 'VH15', 3, 225600, '2018-08-02', 'Hàng đang nhập từ kho'),
('HD14', 'TT9', 5, 316000, '2019-04-04', 'Hàng đang nhập từ kho'),
('HD14', 'CN18', 5, 380000, '2019-04-03', 'Hàng đang nhập từ kho');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
