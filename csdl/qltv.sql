-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2016 at 01:25 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qltv`
--
CREATE DATABASE IF NOT EXISTS `qltv` DEFAULT CHARACTER SET ucs2 COLLATE ucs2_unicode_ci;
USE `qltv`;

-- --------------------------------------------------------

--
-- Table structure for table `cuonsach`
--

CREATE TABLE `cuonsach` (
  `isbn` int(11) DEFAULT NULL,
  `ma_cuonsach` int(11) NOT NULL,
  `tinhtrang` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_unicode_ci;

--
-- Dumping data for table `cuonsach`
--

INSERT INTO `cuonsach` (`isbn`, `ma_cuonsach`, `tinhtrang`) VALUES
(24, 260, 0),
(24, 261, 1),
(24, 262, 1),
(24, 263, 1),
(24, 264, 1),
(24, 265, 1),
(25, 266, 1),
(25, 267, 1),
(26, 268, 1),
(26, 269, 1),
(26, 270, 1),
(26, 271, 1),
(26, 272, 1),
(25, 273, 1),
(25, 274, 1),
(25, 275, 1),
(25, 276, 1),
(25, 277, 1),
(25, 278, 1),
(25, 279, 1),
(25, 280, 1),
(25, 281, 1),
(25, 282, 1),
(24, 283, 1),
(24, 284, 1),
(24, 285, 1),
(24, 286, 1),
(24, 287, 1),
(25, 288, 1),
(25, 289, 1),
(25, 290, 1),
(27, 291, 1),
(24, 292, 1),
(28, 293, 1),
(24, 294, 1),
(24, 295, 1),
(24, 296, 1),
(24, 297, 1),
(24, 298, 1),
(24, 299, 1),
(24, 300, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dausach`
--

CREATE TABLE `dausach` (
  `isbn` int(11) UNSIGNED NOT NULL,
  `ma_tuasach` int(11) NOT NULL,
  `ngonngu` varchar(15) COLLATE ucs2_unicode_ci NOT NULL,
  `bia` varchar(255) COLLATE ucs2_unicode_ci NOT NULL,
  `trangthai` varchar(1) COLLATE ucs2_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_unicode_ci;

--
-- Dumping data for table `dausach`
--

INSERT INTO `dausach` (`isbn`, `ma_tuasach`, `ngonngu`, `bia`, `trangthai`) VALUES
(24, 4, '1', 'Cuá»‘n theo chiá»u giÃ³ - Tiáº¿ng Viáº¿t', '1'),
(25, 4, '3', 'Cuá»‘n theo chiá»u giÃ³ - PhÃ¡p', '1');

-- --------------------------------------------------------

--
-- Table structure for table `docgia`
--

CREATE TABLE `docgia` (
  `ma_docgia` int(11) NOT NULL,
  `ho` varchar(155) COLLATE ucs2_unicode_ci NOT NULL,
  `hoten` varchar(255) COLLATE ucs2_unicode_ci NOT NULL,
  `tenlot` varchar(155) COLLATE ucs2_unicode_ci NOT NULL,
  `ten` varchar(155) COLLATE ucs2_unicode_ci NOT NULL,
  `ngaysinh` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_unicode_ci;

--
-- Dumping data for table `docgia`
--

INSERT INTO `docgia` (`ma_docgia`, `ho`, `hoten`, `tenlot`, `ten`, `ngaysinh`) VALUES
(47, '', 'Test tráº» em', '', '', '2016-10-13'),
(48, '', 'Nguyá»…n ANh', '', '', '2016-10-13'),
(61, '', 'Tráº§n VÄƒn Tiáº¿n', '', '', '2000-06-20'),
(64, '', 'Tráº» Em', '', '', '2000-06-20');

-- --------------------------------------------------------

--
-- Table structure for table `muon`
--

CREATE TABLE `muon` (
  `isbn` int(11) NOT NULL,
  `ma_cuonsach` int(11) NOT NULL,
  `ma_docgia` int(11) NOT NULL,
  `ngaygio_muon` datetime NOT NULL,
  `ngay_hethan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_unicode_ci;

--
-- Dumping data for table `muon`
--

INSERT INTO `muon` (`isbn`, `ma_cuonsach`, `ma_docgia`, `ngaygio_muon`, `ngay_hethan`) VALUES
(24, 260, 48, '2016-10-16 11:41:23', '2016-10-30 10:41:23'),
(24, 260, 48, '2016-10-16 12:09:06', '2016-10-30 11:09:06'),
(24, 261, 48, '2016-10-16 12:25:32', '2016-10-30 11:25:32'),
(24, 260, 48, '2016-10-16 13:13:41', '2016-10-30 12:13:41'),
(24, 260, 48, '2016-10-16 13:13:51', '2016-10-30 12:13:51'),
(24, 260, 48, '2016-10-16 13:14:22', '2016-10-30 12:14:22'),
(24, 260, 61, '2016-10-16 13:15:04', '2016-10-30 12:15:04'),
(24, 260, 61, '2016-10-16 13:16:58', '2016-10-30 12:16:58'),
(24, 260, 61, '2016-10-16 13:17:35', '2016-10-30 12:17:35');

-- --------------------------------------------------------

--
-- Table structure for table `nguoilon`
--

CREATE TABLE `nguoilon` (
  `ma_docgia` int(255) NOT NULL,
  `diachi` varchar(255) COLLATE ucs2_unicode_ci NOT NULL,
  `quan` int(5) NOT NULL,
  `dienthoai` varchar(166) COLLATE ucs2_unicode_ci NOT NULL,
  `han_sd` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_unicode_ci;

--
-- Dumping data for table `nguoilon`
--

INSERT INTO `nguoilon` (`ma_docgia`, `diachi`, `quan`, `dienthoai`, `han_sd`) VALUES
(1, 'Trần Mai Anh', 1, '0988585858', '2016-12-16'),
(32, '', 1, '{dienthoai}', '2016-12-16'),
(33, '', 1, '0988939495', '2016-12-16'),
(46, '', 12, '9999', '2016-12-16'),
(47, '', 12, '9999', '2016-10-16'),
(48, '', 5, '', '2016-12-16'),
(49, '227 Nguyá»…n VÄƒn Cá»«', 11, '', '2016-12-16'),
(50, 'test', 11, 'test', '2016-12-16'),
(51, '666', 1, '', '0000-00-00'),
(52, '666', 1, '', '0000-00-00'),
(53, '666', 1, '', '0000-00-00'),
(54, '666', 1, '', '0000-00-00'),
(55, '666', 1, '', '0000-00-00'),
(56, '666', 1, '', '0000-00-00'),
(57, '666', 1, '', '0000-00-00'),
(58, '666', 1, '', '0000-00-00'),
(59, '666', 1, '', '0000-00-00'),
(60, 'Tetst', 1, '098880000', '2016-10-29'),
(61, '99 Nguyá»…n VÄƒn Cá»«', 1, '0988030208', '2016-10-29'),
(333, '333', 33, '33', '2016-10-15');

-- --------------------------------------------------------

--
-- Table structure for table `treem`
--

CREATE TABLE `treem` (
  `ma_docgia` int(11) NOT NULL,
  `ma_docgia_nguoilon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_unicode_ci;

--
-- Dumping data for table `treem`
--

INSERT INTO `treem` (`ma_docgia`, `ma_docgia_nguoilon`) VALUES
(45, 28),
(63, 47),
(64, 61),
(66, 666);

-- --------------------------------------------------------

--
-- Table structure for table `tuasach`
--

CREATE TABLE `tuasach` (
  `ma_tuasach` int(11) UNSIGNED NOT NULL,
  `tuasach` varchar(255) COLLATE ucs2_unicode_ci NOT NULL,
  `tacgia` varchar(255) COLLATE ucs2_unicode_ci NOT NULL,
  `tomtat` text COLLATE ucs2_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_unicode_ci;

--
-- Dumping data for table `tuasach`
--

INSERT INTO `tuasach` (`ma_tuasach`, `tuasach`, `tacgia`, `tomtat`) VALUES
(4, 'Cuá»‘n theo chiá»u giÃ³', 'Secret maria', '    Ná»™i dung '),
(5, 'KhÃ´ng nÃªn Ä‘i Äƒn má»™t mÃ¬nh', 'Nguyá»…n BÃ¡ ThÃ nh', 'SÃ¡ch viáº¿t vá» triáº¿t lÃ½ vÃ  ká»¹ nÄƒng sá»‘ng.'),
(6, 'Má»™t ngÃ y mÃ¹a ha', 'Nguyá»…n VÄƒn QuÃ¡', 'Chuyá»‡n ká»ƒ vá» Ä‘á»i sá»‘ng nÃ´ng thÃ´n'),
(9, 'Sau Khung ThÃ nh', 'Há»“ng SÆ¡n', 'Ná»™i dung tÃ³m táº¯t');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cuonsach`
--
ALTER TABLE `cuonsach`
  ADD PRIMARY KEY (`ma_cuonsach`);

--
-- Indexes for table `dausach`
--
ALTER TABLE `dausach`
  ADD PRIMARY KEY (`isbn`);

--
-- Indexes for table `docgia`
--
ALTER TABLE `docgia`
  ADD PRIMARY KEY (`ma_docgia`);

--
-- Indexes for table `nguoilon`
--
ALTER TABLE `nguoilon`
  ADD PRIMARY KEY (`ma_docgia`);

--
-- Indexes for table `treem`
--
ALTER TABLE `treem`
  ADD PRIMARY KEY (`ma_docgia`);

--
-- Indexes for table `tuasach`
--
ALTER TABLE `tuasach`
  ADD PRIMARY KEY (`ma_tuasach`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cuonsach`
--
ALTER TABLE `cuonsach`
  MODIFY `ma_cuonsach` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=301;
--
-- AUTO_INCREMENT for table `dausach`
--
ALTER TABLE `dausach`
  MODIFY `isbn` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `docgia`
--
ALTER TABLE `docgia`
  MODIFY `ma_docgia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `tuasach`
--
ALTER TABLE `tuasach`
  MODIFY `ma_tuasach` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
