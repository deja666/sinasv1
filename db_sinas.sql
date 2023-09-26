-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 26, 2023 at 06:13 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_mazer`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `nama_customer` varchar(255) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` enum('Laki-Laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `nomorCIF` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `nama_customer`, `nip`, `tgl_lahir`, `jk`, `alamat`, `nomorCIF`) VALUES
(2, 'Hadi', 'VSZPBY9913HY991FIG', '2002-01-01', 'Laki-Laki', 'Bandung', 49515729),
(4, 'Dendi', 'Y1X2R9ASZKUUW4VBNX', '2023-09-24', 'Perempuan', 'test123', 89815581),
(5, 'Jojon', 'FBIMF3YZWKTNL07WMB', '2023-09-25', 'Laki-Laki', 'Bandung', 49107860);

-- --------------------------------------------------------

--
-- Table structure for table `tabungan`
--

CREATE TABLE `tabungan` (
  `id_tabungan` int(11) NOT NULL,
  `nama_tabungan` varchar(255) NOT NULL,
  `nomor_rek` varchar(20) NOT NULL,
  `nomorCIF` int(11) DEFAULT NULL,
  `tgl_pembukaan` date NOT NULL,
  `tgl_penutupan` date DEFAULT NULL,
  `saldo_terakhir` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabungan`
--

INSERT INTO `tabungan` (`id_tabungan`, `nama_tabungan`, `nomor_rek`, `nomorCIF`, `tgl_pembukaan`, `tgl_penutupan`, `saldo_terakhir`) VALUES
(1, 'hadi', '7607475848', 49515729, '2023-09-01', '2024-02-22', '0.00'),
(2, 'Bandung Garcep', '3182024270', 49515729, '2023-09-01', NULL, '89000.00'),
(3, 'Kosan Sudirman', '2187588175', 89815581, '2023-09-01', NULL, '90000.00'),
(4, 'Tabungan Carding', '5079616081', 49107860, '2023-09-01', NULL, '85000.00');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `nomor_rek` varchar(20) NOT NULL,
  `nominal` decimal(10,2) NOT NULL,
  `jenis` enum('Setoran Tunai','Penarikan Tunai','Transfer Dana','Transfer Antar Bank','dll') NOT NULL,
  `debet_kredit` enum('Debet','Kredit') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `tgl_transaksi`, `nomor_rek`, `nominal`, `jenis`, `debet_kredit`) VALUES
(1, '2023-02-22', '3182024270', '2000.00', 'Transfer Antar Bank', 'Debet'),
(2, '2023-02-22', '3182024270', '3000.00', 'Setoran Tunai', 'Kredit');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `role` varchar(150) NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `password`, `role`) VALUES
(1, 'Muhammad Surya', 'admin', '$2a$12$SlqQVhFc7jeA/mCv.f2G8uPjWIljH/VkDg9y59K91U9pKjuCSiEiy\n', 'superadmin'),
(9, 'Muhammad Wisnu Anggana', 'hadi\r\n', '$2a$12$SlqQVhFc7jeA/mCv.f2G8uPjWIljH/VkDg9y59K91U9pKjuCSiEiy\n', 'admin'),
(10, 'hadi', 'hadi', '$2a$12$SlqQVhFc7jeA/mCv.f2G8uPjWIljH/VkDg9y59K91U9pKjuCSiEiy', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`),
  ADD UNIQUE KEY `nip` (`nip`),
  ADD UNIQUE KEY `nomorCIF` (`nomorCIF`);

--
-- Indexes for table `tabungan`
--
ALTER TABLE `tabungan`
  ADD PRIMARY KEY (`id_tabungan`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tabungan`
--
ALTER TABLE `tabungan`
  MODIFY `id_tabungan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
