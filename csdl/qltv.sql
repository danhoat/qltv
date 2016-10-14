-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2016 at 07:29 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `dausach`
--

CREATE TABLE `dausach` (
  `isbn` int(11) UNSIGNED NOT NULL,
  `ma_tuasach` int(11) NOT NULL,
  `ngonngu` varchar(15) COLLATE ucs2_unicode_ci NOT NULL,
  `bia` varchar(15) COLLATE ucs2_unicode_ci NOT NULL,
  `trangthai` varchar(1) COLLATE ucs2_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_unicode_ci;

--
-- Dumping data for table `dausach`
--

INSERT INTO `dausach` (`isbn`, `ma_tuasach`, `ngonngu`, `bia`, `trangthai`) VALUES
(1, 1, '1', '', '1'),
(2, 4, '2', '', '1'),
(3, 4, '6', '', '1'),
(4, 1, '4', '', '1');

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
(1, 'Test tá»±a sÃ¡ch 1', 'Nguyá»…n Gia Dáº§n', 'SÃ¡ch viáº¿t vá» cuá»™c Ä‘á»i Nguyá»…n Gia Dáº§n'),
(2, 'Tá»±a sÃ¡ch 2', 'Nguyá»…n Há»¯u Phá»“n', 'Ná»™i dung cuá»‘n sÃ¡ch á»Ÿ Ä‘Ã¢y.'),
(3, 'Test', 'Nguyá»…n VÄƒn Nam', 'Ná»™i dung cuá»‘n sÃ¡ch á»Ÿ Ä‘Ã¢y'),
(4, 'Cuá»‘n theo chiá»u giÃ³', 'Secret maria', 'Ná»™i dung '),
(5, 'KhÃ´ng nÃªn Ä‘i Äƒn má»™t mÃ¬nh', 'Nguyá»…n BÃ¡ ThÃ nh', 'SÃ¡ch viáº¿t vá» triáº¿t lÃ½ vÃ  ká»¹ nÄƒng sá»‘ng.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dausach`
--
ALTER TABLE `dausach`
  ADD PRIMARY KEY (`isbn`);

--
-- Indexes for table `tuasach`
--
ALTER TABLE `tuasach`
  ADD PRIMARY KEY (`ma_tuasach`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dausach`
--
ALTER TABLE `dausach`
  MODIFY `isbn` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tuasach`
--
ALTER TABLE `tuasach`
  MODIFY `ma_tuasach` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
