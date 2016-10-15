-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2016 at 07:02 AM
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

DROP TABLE IF EXISTS `cuonsach`;
CREATE TABLE `cuonsach` (
  `isbn` int(11) DEFAULT NULL,
  `ma_cuonsach` int(11) NOT NULL,
  `tinhtrang` varchar(255) COLLATE ucs2_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_unicode_ci;

--
-- Dumping data for table `cuonsach`
--

INSERT INTO `cuonsach` (`isbn`, `ma_cuonsach`, `tinhtrang`) VALUES
(24, 260, '1'),
(24, 261, '1'),
(24, 262, '1'),
(24, 263, '1'),
(24, 264, '1'),
(24, 265, '1'),
(25, 266, '1'),
(25, 267, '1'),
(26, 268, '1'),
(26, 269, '1'),
(26, 270, '1'),
(26, 271, '1'),
(26, 272, '1'),
(25, 273, '1'),
(25, 274, '1'),
(25, 275, '1'),
(25, 276, '1'),
(25, 277, '1'),
(25, 278, '1'),
(25, 279, '1'),
(25, 280, '1'),
(25, 281, '1'),
(25, 282, '1'),
(24, 283, '1'),
(24, 284, '1'),
(24, 285, '1'),
(24, 286, '1'),
(24, 287, '1'),
(25, 288, '1'),
(25, 289, '1'),
(25, 290, '1');

-- --------------------------------------------------------

--
-- Table structure for table `dausach`
--

DROP TABLE IF EXISTS `dausach`;
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
(24, 4, '1', '', '1'),
(25, 4, '3', 'Cuá»‘n theo chiá»u giÃ³ - PhÃ¡p', '1'),
(26, 5, '7', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `docgia`
--

DROP TABLE IF EXISTS `docgia`;
CREATE TABLE `docgia` (
  `ma_docgia` int(11) NOT NULL,
  `ho` varchar(155) COLLATE ucs2_unicode_ci NOT NULL,
  `hoten` varchar(255) COLLATE ucs2_unicode_ci NOT NULL,
  `tenlot` varchar(155) COLLATE ucs2_unicode_ci NOT NULL,
  `ten` varchar(155) COLLATE ucs2_unicode_ci NOT NULL,
  `ngaysinh` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_unicode_ci;

--
-- Dumping data for table `docgia`
--

INSERT INTO `docgia` (`ma_docgia`, `ho`, `hoten`, `tenlot`, `ten`, `ngaysinh`) VALUES
(16, '', 'Nguyá»…n TÄƒng Tuáº¥n', '', '', '2016-10-13 00:00:00'),
(22, '', 'ttt', '', '', '2016-10-13 00:00:00'),
(23, '', '666', '', '', '2016-10-13 00:00:00'),
(25, '', '7777', '', '', '2016-10-13 00:00:00'),
(27, '', '666', '', '', '2016-10-13 00:00:00'),
(28, '', 'nguyá»…n Gia Dáº§n', '', '', '2016-10-13 00:00:00'),
(29, '', 'nguyá»…n Gia Dáº§n', '', '', '2016-10-13 00:00:00'),
(30, '', 'Nguyá»…n VÄ©nh Trá»ng', '', '', '2016-10-13 00:00:00'),
(31, '', '777', '', '', '2016-10-13 00:00:00'),
(32, '', '999', '', '', '2016-10-13 00:00:00'),
(33, '', 'Nguyá»…n VÃ¢n KhÃ¡nh', '', '', '2016-10-13 00:00:00'),
(34, '', 'nguyá»…n VÄƒn Tráº» Em', '', '', '2016-10-13 00:00:00'),
(35, '', 'Tráº» em 1', '', '', '2016-10-13 00:00:00'),
(36, '', 'Äá»™c giáº£ tráº» em 2', '', '', '2016-10-13 00:00:00'),
(37, '', '999', '', '', '2016-10-13 00:00:00'),
(38, '', '99', '', '', '2016-10-13 00:00:00'),
(39, '', '999', '', '', '2016-10-13 00:00:00'),
(40, '', '888', '', '', '2016-10-13 00:00:00'),
(41, '', 'Tre em ok', '', '', '2016-10-13 00:00:00'),
(42, '', 'tre em ', '', '', '2016-10-13 00:00:00'),
(43, '', 'tre em ', '', '', '2016-10-13 00:00:00'),
(44, '', '9999', '', '', '2016-10-13 00:00:00'),
(45, '', 'Tráº» em nÃ¨', '', '', '2016-10-13 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `nguoilon`
--

DROP TABLE IF EXISTS `nguoilon`;
CREATE TABLE `nguoilon` (
  `ma_docgia` int(255) NOT NULL,
  `diachi` varchar(255) COLLATE ucs2_unicode_ci NOT NULL,
  `quan` int(5) NOT NULL,
  `dienthoai` varchar(166) COLLATE ucs2_unicode_ci NOT NULL,
  `han_sd` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_unicode_ci;

--
-- Dumping data for table `nguoilon`
--

INSERT INTO `nguoilon` (`ma_docgia`, `diachi`, `quan`, `dienthoai`, `han_sd`) VALUES
(1, 'Trần Mai Anh', 1, '0988585858', '2016-12-16 00:00:00'),
(32, '', 1, '{dienthoai}', '2016-12-16 00:00:00'),
(33, '', 1, '0988939495', '2016-12-16 00:00:00'),
(333, '333', 33, '33', '2016-10-15 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `treem`
--

DROP TABLE IF EXISTS `treem`;
CREATE TABLE `treem` (
  `ma_docgia` int(11) NOT NULL,
  `ma_docgia_nguoilon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_unicode_ci;

--
-- Dumping data for table `treem`
--

INSERT INTO `treem` (`ma_docgia`, `ma_docgia_nguoilon`) VALUES
(45, 28),
(66, 666);

-- --------------------------------------------------------

--
-- Table structure for table `tuasach`
--

DROP TABLE IF EXISTS `tuasach`;
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
  MODIFY `ma_cuonsach` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=291;
--
-- AUTO_INCREMENT for table `dausach`
--
ALTER TABLE `dausach`
  MODIFY `isbn` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `docgia`
--
ALTER TABLE `docgia`
  MODIFY `ma_docgia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `tuasach`
--
ALTER TABLE `tuasach`
  MODIFY `ma_tuasach` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
