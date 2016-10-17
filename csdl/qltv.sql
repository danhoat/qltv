-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2016 at 05:14 PM
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
(24, 311, 0),
(24, 312, 0),
(24, 313, 0),
(24, 314, 1),
(24, 315, 1),
(24, 316, 1),
(24, 317, 1),
(24, 318, 1),
(24, 319, 1),
(24, 320, 1),
(24, 321, 1),
(24, 322, 1),
(24, 323, 1),
(24, 324, 1),
(24, 325, 1),
(24, 326, 1),
(24, 327, 1),
(24, 328, 1),
(24, 329, 1),
(24, 330, 1),
(24, 331, 1),
(24, 332, 1),
(24, 333, 0),
(24, 334, 1),
(24, 335, 1),
(24, 336, 1),
(24, 337, 1),
(24, 338, 1),
(24, 339, 1),
(24, 340, 1),
(24, 341, 1),
(24, 342, 1),
(24, 343, 1),
(24, 344, 1),
(24, 345, 1),
(24, 346, 1),
(24, 347, 1),
(24, 348, 1),
(24, 349, 1),
(24, 350, 1),
(24, 351, 1),
(24, 352, 1),
(24, 353, 1),
(24, 354, 1),
(24, 355, 1),
(24, 356, 1),
(24, 357, 1),
(24, 358, 1),
(24, 359, 1),
(24, 360, 1),
(24, 361, 1),
(24, 362, 1),
(24, 363, 1),
(24, 364, 1),
(24, 365, 1),
(24, 366, 1),
(24, 367, 1),
(24, 368, 1),
(24, 369, 1),
(24, 370, 1),
(24, 371, 1),
(24, 372, 1),
(24, 373, 1),
(24, 374, 1),
(24, 375, 1),
(24, 376, 1),
(24, 377, 1),
(24, 378, 1),
(24, 379, 1),
(24, 380, 1),
(24, 381, 1),
(24, 382, 1),
(24, 383, 1),
(24, 384, 1),
(24, 385, 1),
(24, 386, 1),
(24, 387, 1),
(24, 388, 1),
(24, 389, 1),
(24, 390, 1),
(24, 391, 1),
(24, 392, 1),
(24, 393, 1),
(24, 394, 1),
(24, 395, 1),
(24, 396, 1),
(24, 397, 1),
(24, 398, 1),
(24, 399, 1),
(24, 400, 1),
(24, 401, 1),
(24, 402, 1),
(24, 403, 1),
(24, 404, 1),
(24, 405, 1),
(24, 406, 1),
(24, 407, 1),
(24, 408, 1),
(24, 409, 1),
(24, 410, 1),
(30, 411, 1),
(31, 412, 1),
(31, 413, 1),
(31, 414, 1),
(31, 415, 1),
(31, 416, 1),
(31, 417, 1),
(31, 418, 1),
(31, 419, 1),
(31, 420, 1),
(31, 421, 1),
(32, 422, 1),
(33, 423, 0),
(33, 424, 1),
(33, 425, 1),
(33, 426, 1),
(33, 427, 1),
(33, 428, 1),
(34, 429, 1),
(34, 430, 1),
(34, 431, 1),
(34, 432, 1),
(34, 433, 1),
(34, 434, 1),
(34, 435, 1),
(35, 436, 1),
(35, 437, 1),
(36, 438, 0),
(36, 439, 0),
(36, 440, 0),
(36, 441, 1),
(36, 442, 1),
(37, 443, 0),
(37, 444, 1),
(37, 445, 1),
(37, 446, 1),
(37, 447, 1),
(24, 448, 1);

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
(25, 4, '3', 'Cuá»‘n theo chiá»u giÃ³ - PhÃ¡p', '1'),
(29, 6, '1', 'Má»™t ngÃ y mua háº¡ - tiáº¿ng viá»‡t', '1'),
(30, 4, '2', 'Cuá»‘n sÃ¡ch chiá»u giÃ³ anh', '1'),
(31, 4, '5', 'Cuá»‘n theo chiá»u giÃ³ - Trung Quá»‘c', '1'),
(32, 4, '7', 'Cuá»‘n theo chiá»u giÃ³ - HQ', '1'),
(33, 6, '2', 'Má»™t ngÃ y mÃ¹a háº¡ - Viá»‡t', '1'),
(34, 5, '5', 'KhÃ´ng nÃªn di Äƒn má»™t mÃ¬nh - TQ', '1'),
(35, 6, '6', 'Má»™t ngÃ y mÃ¹a háº¡ - Nháº­t', '1'),
(36, 6, '4', 'Má»™t ngÃ y mÃ¹a háº¡ - Äá»©c', '1'),
(37, 4, '4', 'Cuá»‘n  theo chiá»u giÃ³ - Äá»©c', '1');

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
(83, '', 'Nguyá»…n Gia Dáº§n', '', '', '2000-06-20'),
(84, '', 'Tráº§n Tuáº¥n Kháº£i', '', '', '2000-06-20'),
(85, '', 'Nguyá»…n VÄƒn Anh', '', '', '2000-06-20'),
(86, '', 'Tráº§n VÃ¢n SÆ¡n', '', '', '2000-06-20'),
(87, '', 'VÅ© Ngá»c Háº£i', '', '', '2000-06-20'),
(88, '', 'aaa', '', '', '2000-06-20');

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
(66, '', 10, '', '2016-10-28'),
(67, '8888', 1, '09888888', '2016-10-28'),
(83, '227 Nguyá»…n VÄƒn Cá»« Quáº­n 5 TP Há»“ ChÃ­ Minh', 5, '0988030208', '2016-10-17'),
(84, '', 1, '098803030303', '2016-10-17'),
(85, '', 1, '', '2016-10-17'),
(86, '8888', 11, '0988080808', '2016-10-28'),
(87, '', 1, '0988030208', '2016-10-17'),
(88, 'aaa', 1, 'aa', '2016-10-29'),
(333, '333', 33, '33', '2016-10-15');

-- --------------------------------------------------------

--
-- Table structure for table `quatrinhmuon`
--

CREATE TABLE `quatrinhmuon` (
  `isbn` int(11) NOT NULL,
  `ma_cuonsach` int(11) NOT NULL,
  `ngaygio_muon` int(11) NOT NULL,
  `ma_docgia` int(11) NOT NULL,
  `ngay_hethan` datetime NOT NULL,
  `ngaygio_tra` int(11) NOT NULL,
  `ghichu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_unicode_ci;

--
-- Dumping data for table `quatrinhmuon`
--

INSERT INTO `quatrinhmuon` (`isbn`, `ma_cuonsach`, `ngaygio_muon`, `ma_docgia`, `ngay_hethan`, `ngaygio_tra`, `ghichu`) VALUES
(37, 443, 2016, 83, '2016-10-31 16:07:26', 0, 0);

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
(65, 48),
(66, 666),
(68, 61),
(69, 61),
(70, 61),
(71, 61),
(72, 61),
(73, 61),
(75, 61),
(76, 61),
(77, 61);

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
(4, 'Cuá»‘n theo chiá»u giÃ³', 'Secret maria', ' Ná»™i dung cá»§a tá»±a sÃ¡ch á»Ÿ Ä‘Ã¢y 9999'),
(5, 'KhÃ´ng nÃªn Ä‘i Äƒn má»™t mÃ¬nh', 'Nguyá»…n BÃ¡ ThÃ nh', 'SÃ¡ch viáº¿t vá» triáº¿t lÃ½ vÃ  ká»¹ nÄƒng sá»‘ng.'),
(6, 'Má»™t ngÃ y mÃ¹a ha', 'Nguyá»…n VÄƒn QuÃ¡', 'Chuyá»‡n ká»ƒ vá» Ä‘á»i sá»‘ng nÃ´ng thÃ´n'),
(9, 'Sau Khung ThÃ nh', 'Há»“ng SÆ¡n', 'TÃ³m táº¯t ná»™i dung sau khung thÃ nh á»Ÿ Ä‘Ã¢y.');

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
-- Indexes for table `muon`
--
ALTER TABLE `muon`
  ADD PRIMARY KEY (`isbn`,`ma_cuonsach`);

--
-- Indexes for table `nguoilon`
--
ALTER TABLE `nguoilon`
  ADD PRIMARY KEY (`ma_docgia`);

--
-- Indexes for table `quatrinhmuon`
--
ALTER TABLE `quatrinhmuon`
  ADD PRIMARY KEY (`isbn`,`ma_cuonsach`,`ngaygio_muon`);

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
  MODIFY `ma_cuonsach` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=449;
--
-- AUTO_INCREMENT for table `dausach`
--
ALTER TABLE `dausach`
  MODIFY `isbn` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `docgia`
--
ALTER TABLE `docgia`
  MODIFY `ma_docgia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
--
-- AUTO_INCREMENT for table `tuasach`
--
ALTER TABLE `tuasach`
  MODIFY `ma_tuasach` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
