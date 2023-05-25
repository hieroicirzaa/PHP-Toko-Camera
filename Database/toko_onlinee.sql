-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2022 at 01:14 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_onlinee`
--
CREATE DATABASE IF NOT EXISTS `toko_onlinee` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `toko_onlinee`;

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail_transaksi` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail_transaksi`, `id_transaksi`, `id_produk`, `qty`) VALUES
(1, 1, 10, 1),
(2, 2, 2, 1),
(3, 2, 8, 1),
(4, 3, 2, 2),
(5, 3, 4, 1),
(6, 3, 10, 1),
(7, 4, 5, 1),
(8, 5, 2, 1),
(9, 6, 2, 1),
(10, 7, 1, 1),
(11, 8, 2, 1),
(12, 8, 2, 1),
(13, 9, 2, 1),
(14, 10, 1, 1),
(15, 11, 2, 1),
(16, 12, 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(15) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `deskripsi`, `harga`, `foto`) VALUES
(1, 'Pentax K1000', '1976, Japan/China', 3899000, '1.  Pentax_K1000.jpg'),
(2, 'Nikon F3', '1980, Japan', 11474000, '2.  Nikon_F3.jpg'),
(3, 'Olympus Trip 300', '1996, Japan', 2579000, '3. Olympus_Trip_300.jpg'),
(4, 'Pentax Espio 80', '1992, Japan', 3899000, '4.  Pentax_Espio_80.jpg'),
(5, 'Pentax Espio 115G', '1992, Japan', 3539000, '5.  Pentax_Espio_115G.jpg'),
(6, 'Pentax Espio 145M', '2002, Japan', 3299000, '6.  Pentax_Espio_145M.jpg'),
(7, 'Olympus XA2', '1980, Japan', 2579000, '7.  Olympus_XA2.jpg'),
(8, 'Olympus Stylus, Silver', '1991, Japan', 2219000, '8.  Olympus_Stylus_Zoom_silver.jpg'),
(9, 'Olympus Stylus Zoom, Black', '1991, Japan', 2519000, '9.  Olympus_Stylus_Zoom_black.jpg'),
(10, 'Polaroid SX-70 : OneStep', '1981, USA', 1199000, '10.  Polaroid_SX-70.jpg'),
(11, 'Polaroid SX-70 : The Button', '1981, USA', 1079000, '11.  Polaroid_SX-70_Button.jpg'),
(12, 'Polaroid 600 : Supercolor', '1988, USA', 1559000, '12.  Polaroid_600.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `produk_sampai`
--

CREATE TABLE `produk_sampai` (
  `id_produk_sampai` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `tgl_sampai` date NOT NULL,
  `denda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk_sampai`
--

INSERT INTO `produk_sampai` (`id_produk_sampai`, `id_transaksi`, `tgl_sampai`, `denda`) VALUES
(1, 3, '2022-09-27', 0),
(2, 4, '2022-09-27', 0),
(3, 5, '2022-09-27', 0),
(4, 6, '2022-09-27', 0),
(5, 7, '2022-10-04', 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `tgl_sampai` date NOT NULL,
  `Status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `tgl_transaksi`, `tgl_sampai`, `Status`) VALUES
(1, 2, '2022-09-18', '2022-09-23', ''),
(2, 3, '2022-09-18', '2022-09-23', ''),
(3, 2, '2022-09-18', '2022-09-23', ''),
(4, 2, '2022-09-27', '2022-10-02', ''),
(5, 2, '2022-09-27', '2022-10-02', ''),
(6, 2, '2022-09-27', '2022-10-02', ''),
(7, 2, '2022-10-04', '2022-10-09', ''),
(8, 3, '2022-10-04', '2022-10-09', ''),
(9, 2, '2022-10-04', '2022-10-09', ''),
(10, 2, '2022-10-05', '2022-10-10', ''),
(11, 2, '2022-10-05', '2022-10-10', ''),
(12, 2, '2022-10-05', '2022-10-10', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `password`, `level`) VALUES
(1, 'M. Irza Dwi Pahlevi', 'Hieroic', '123', 'petugas'),
(2, 'Alif F H', 'alif', '123', 'pelanggan'),
(3, 'Rafano p', 'rafano', '123', 'pelanggan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail_transaksi`),
  ADD KEY `id_pembelian_produk` (`id_transaksi`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `produk_sampai`
--
ALTER TABLE `produk_sampai`
  ADD PRIMARY KEY (`id_produk_sampai`),
  ADD KEY `id_pembelian_produk` (`id_transaksi`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_petugas` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `produk_sampai`
--
ALTER TABLE `produk_sampai`
  MODIFY `id_produk_sampai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
