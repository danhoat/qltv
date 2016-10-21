-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2016 at 07:41 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

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
-- Table structure for table `cuonsach`
--

CREATE TABLE `cuonsach` (
  `isbn` int(11) DEFAULT NULL,
  `ma_cuonsach` int(11) NOT NULL,
  `tinhtrang` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dausach`
--

CREATE TABLE `dausach` (
  `isbn` int(11) NOT NULL,
  `ma_tuasach` int(11) NOT NULL,
  `ngonngu` varchar(15) COLLATE ucs2_unicode_ci NOT NULL,
  `bia` varchar(255) COLLATE ucs2_unicode_ci NOT NULL,
  `trangthai` varchar(1) COLLATE ucs2_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `docgia`
--

CREATE TABLE `docgia` (
  `ma_docgia` int(11) NOT NULL,
  `hoten` varchar(255) COLLATE ucs2_unicode_ci NOT NULL,
  `ngaysinh` date NOT NULL,
  `massv` int(11) NOT NULL,
  `diachi` varchar(200) COLLATE ucs2_unicode_ci NOT NULL,
  `han_sd` date NOT NULL,
  `dienthoai` varchar(15) COLLATE ucs2_unicode_ci NOT NULL,
  `ngay_dk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `muon`
--

CREATE TABLE `muon` (
  `ma_cuonsach` int(11) NOT NULL,
  `ma_docgia` int(11) NOT NULL,
  `ngaygio_muon` datetime NOT NULL,
  `ngay_hethan` datetime NOT NULL,
  `ma_muon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tuasach`
--

CREATE TABLE `tuasach` (
  `ma_tuasach` int(11) NOT NULL,
  `tuasach` varchar(255) COLLATE ucs2_unicode_ci NOT NULL,
  `tacgia` varchar(255) COLLATE ucs2_unicode_ci NOT NULL,
  `tomtat` text COLLATE ucs2_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cuonsach`
--
ALTER TABLE `cuonsach`
  ADD PRIMARY KEY (`ma_cuonsach`),
  ADD KEY `isbn` (`isbn`);

--
-- Indexes for table `dausach`
--
ALTER TABLE `dausach`
  ADD PRIMARY KEY (`isbn`),
  ADD KEY `ma_tuasach` (`ma_tuasach`);

--
-- Indexes for table `docgia`
--
ALTER TABLE `docgia`
  ADD PRIMARY KEY (`ma_docgia`);

--
-- Indexes for table `muon`
--
ALTER TABLE `muon`
  ADD PRIMARY KEY (`ma_muon`),
  ADD KEY `ma_docgia` (`ma_docgia`),
  ADD KEY `ma_cuonsach` (`ma_cuonsach`),
  ADD KEY `ma_docgia_2` (`ma_docgia`);

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
  MODIFY `ma_cuonsach` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dausach`
--
ALTER TABLE `dausach`
  MODIFY `isbn` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `docgia`
--
ALTER TABLE `docgia`
  MODIFY `ma_docgia` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `muon`
--
ALTER TABLE `muon`
  MODIFY `ma_muon` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tuasach`
--
ALTER TABLE `tuasach`
  MODIFY `ma_tuasach` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cuonsach`
--
ALTER TABLE `cuonsach`
  ADD CONSTRAINT `cuonsach_ibfk_1` FOREIGN KEY (`isbn`) REFERENCES `dausach` (`isbn`);

--
-- Constraints for table `dausach`
--
ALTER TABLE `dausach`
  ADD CONSTRAINT `dausach_ibfk_1` FOREIGN KEY (`ma_tuasach`) REFERENCES `tuasach` (`ma_tuasach`) ON DELETE NO ACTION;

--
-- Constraints for table `muon`
--
ALTER TABLE `muon`
  ADD CONSTRAINT `muon_ibfk_1` FOREIGN KEY (`ma_docgia`) REFERENCES `docgia` (`ma_docgia`) ON DELETE NO ACTION,
  ADD CONSTRAINT `muon_ibfk_2` FOREIGN KEY (`ma_cuonsach`) REFERENCES `cuonsach` (`ma_cuonsach`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
