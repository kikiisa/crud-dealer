-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 05, 2022 at 05:56 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud_dealer`
--

-- --------------------------------------------------------

--
-- Table structure for table `category_barang`
--

CREATE TABLE `category_barang` (
  `id` int(11) NOT NULL,
  `category` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_barang`
--

INSERT INTO `category_barang` (`id`, `category`) VALUES
(13, 'Honda Part 1'),
(14, 'Honda Part 2'),
(15, 'Honda Part 3');

-- --------------------------------------------------------

--
-- Table structure for table `tb_stock`
--

CREATE TABLE `tb_stock` (
  `id` int(11) NOT NULL,
  `kode_part` varchar(20) NOT NULL,
  `deskripsi` varchar(70) NOT NULL,
  `kode_rack` varchar(20) NOT NULL,
  `kelompok_barang` varchar(70) NOT NULL,
  `het` varchar(70) NOT NULL,
  `qty` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_stock`
--

INSERT INTO `tb_stock` (`id`, `kode_part`, `deskripsi`, `kode_rack`, `kelompok_barang`, `het`, `qty`) VALUES
(18, '03512K1ZGBX', 'Honda Part 1', '2', 'Honda Part 1', '200000', '3'),
(23, '03512K1ZGBL', 'MVC ', '2', 'Honda Part 3', '1000', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category_barang`
--
ALTER TABLE `category_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_stock`
--
ALTER TABLE `tb_stock`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category_barang`
--
ALTER TABLE `category_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_stock`
--
ALTER TABLE `tb_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
