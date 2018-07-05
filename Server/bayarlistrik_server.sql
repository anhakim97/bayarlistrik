-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2018 at 12:00 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bayarlistrik_server`
--

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
(1, 'Ahmad', 'Jl. Pramuka No. 17', '900'),
(2, 'Deny', 'Jl. Magelang Perumanah Bale Hinggil', '1300'),
(3, 'Ridho', 'Jl. Kaliurang Km 13', '900'),
(4, 'dwi', 'Jl. Mataram No. 15 Sleman', '1300'),
(5, 'bowo', 'Jl. Cendana Putih, Ngemplak, Sleman', '450'),
(6, 'ilham', 'Jalan Kaliurang km 14.5', '450'),
(7, 'Nurul', 'Jalan Cempaka ', '1300'),
(8, 'Mining', 'Jalan kaliurang no 123', '3300'),
(9, 'Kevin', 'Jalan Prapanca', '900'),
(10, 'Prabowo', 'Jalan Tentakel', '900');

-- --------------------------------------------------------

--
-- Table structure for table `tagihan_listrik`
--

CREATE TABLE `tagihan_listrik` (
  `id_tagihan` int(50) NOT NULL,
  `id_pelanggan` int(50) NOT NULL,
  `bulan` varchar(50) NOT NULL,
  `jumlah_tagihan` int(100) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'belum dibayar',
  `tanggal_bayar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tagihan_listrik`
--

INSERT INTO `tagihan_listrik` (`id_tagihan`, `id_pelanggan`, `bulan`, `jumlah_tagihan`, `status`, `tanggal_bayar`) VALUES
(1, 1, 'Juli', 123987, 'belum dibayar', NULL),
(2, 2, 'Juli', 230000, 'belum dibayar', NULL),
(3, 3, 'Juli', 497000, 'belum dibayar', NULL),
(4, 4, 'Juli', 567876, 'belum dibayar', NULL),
(5, 5, 'Juli', 1892361, 'belum dibayar', NULL),
(6, 6, 'Juli', 30000, 'belum dibayar', NULL),
(7, 7, 'Juli', 200000, 'belum dibayar', NULL),
(8, 8, 'Juli', 2000000, 'belum dibayar', NULL),
(9, 9, 'Juli', 150000, 'belum dibayar', NULL),
(10, 10, 'Juli', 120000, 'belum dibayar', NULL);

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tagihan_listrik`
--
ALTER TABLE `tagihan_listrik`
  MODIFY `id_tagihan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tagihan_listrik`
--
ALTER TABLE `tagihan_listrik`
  ADD CONSTRAINT `id_pelanggan` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
