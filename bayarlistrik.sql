-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2018 at 09:28 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bayarlistrik`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `agen`
--

CREATE TABLE `agen` (
  `id_agen` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `saldo` int(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agen`
--

INSERT INTO `agen` (`id_agen`, `nama`, `email`, `username`, `password`, `saldo`) VALUES
(1, 'agen', 'agen@agen.com', 'agen', 'agen', 1300000),
(2, 'agen1', 'agen1@gmail.com', 'agen1', 'agen1', 0),
(3, 'as', 'sa@ss.ss', 'sss', 'ss', 500000),
(4, 'aa', 'kk@kks.s', 'lkklas', 'klj', 0),
(5, 'aa', 'aa@gmail.com', 'aa', 'aa', 0),
(6, 'aa', 'anhakim@gmail.com', 'anhakim', 'anhakim', 0),
(7, 'nama', 'email@gmail.com', 'email', 'email', 0);

-- --------------------------------------------------------

--
-- Table structure for table `deposit`
--

CREATE TABLE `deposit` (
  `id_deposit` int(50) NOT NULL,
  `id_agen` int(50) NOT NULL,
  `tgl_requert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nominal` int(100) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'sedang diproses'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deposit`
--

INSERT INTO `deposit` (`id_deposit`, `id_agen`, `tgl_requert`, `nominal`, `bank`, `status`) VALUES
(17, 1, '2018-05-27 01:01:33', 50000, 'Mandiri (8123098120938 An. Bayar Listrik)', 'sukses'),
(18, 1, '2018-05-27 01:01:39', 1000000, 'Mandiri (8123098120938 An. Bayar Listrik)', 'sukses'),
(19, 1, '2018-05-29 02:50:14', 50000, 'Mandiri (8123098120938 An. Bayar Listrik)', 'sedang diproses');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(50) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `daya_listrik` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat`, `daya_listrik`) VALUES
(1, 'pelanggan 1', 'alamat pelanggan 1', '900');

-- --------------------------------------------------------

--
-- Table structure for table `tagihan_listrik`
--

CREATE TABLE `tagihan_listrik` (
  `id_tagihan` int(50) NOT NULL,
  `id_pelanggan` int(50) NOT NULL,
  `bulan` varchar(50) NOT NULL,
  `jumlah_tagihan` int(100) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'belum dibayar'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tagihan_listrik`
--

INSERT INTO `tagihan_listrik` (`id_tagihan`, `id_pelanggan`, `bulan`, `jumlah_tagihan`, `status`) VALUES
(1, 1, 'mei', 123987, 'belum dibayar');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_tagihan` int(11) NOT NULL,
  `id_agen` int(11) NOT NULL,
  `tanggal_bayar` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `agen`
--
ALTER TABLE `agen`
  ADD PRIMARY KEY (`id_agen`);

--
-- Indexes for table `deposit`
--
ALTER TABLE `deposit`
  ADD PRIMARY KEY (`id_deposit`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `tagihan_listrik`
--
ALTER TABLE `tagihan_listrik`
  ADD PRIMARY KEY (`id_tagihan`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD KEY `id_agen` (`id_agen`),
  ADD KEY `id_tagihan` (`id_tagihan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `agen`
--
ALTER TABLE `agen`
  MODIFY `id_agen` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `deposit`
--
ALTER TABLE `deposit`
  MODIFY `id_deposit` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tagihan_listrik`
--
ALTER TABLE `tagihan_listrik`
  MODIFY `id_tagihan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tagihan_listrik`
--
ALTER TABLE `tagihan_listrik`
  ADD CONSTRAINT `id_pelanggan` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `id_agen` FOREIGN KEY (`id_agen`) REFERENCES `agen` (`id_agen`),
  ADD CONSTRAINT `id_tagihan` FOREIGN KEY (`id_tagihan`) REFERENCES `tagihan_listrik` (`id_tagihan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
