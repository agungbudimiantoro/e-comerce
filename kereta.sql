-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2021 at 04:18 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kereta`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id_admin` int(11) NOT NULL,
  `nm_admin` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(15) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nm_admin`, `username`, `password`, `level`, `foto`) VALUES
(53, 'admin', 'admin', '$2y$10$firRdMKUa4OtALm..qswk.8wpXeJ7/GqCE/HRIn.s4Tj4TkufgOVy', 'Admin', 'keladiHias_7536.jpg'),
(54, 'pimpinan', 'pimpinan', '$2y$10$Rt0M0DOyjkf8fXSO.p4X1eWfqRERf12rUrvF7MFJeWUI5UD1c4D12', 'Pimpinan', 'aglonema_17696.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `gerbong`
--

CREATE TABLE IF NOT EXISTS `gerbong` (
`id_gerbong` int(11) NOT NULL,
  `no_gerbong` varchar(10) NOT NULL,
  `jml_kursi` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gerbong`
--

INSERT INTO `gerbong` (`id_gerbong`, `no_gerbong`, `jml_kursi`) VALUES
(1, '1', 40),
(2, '2', 40),
(3, '3', 40),
(4, '4', 40),
(5, '5', 40);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE IF NOT EXISTS `jadwal` (
`id_jadwal` int(11) NOT NULL,
  `tanggal_ber` date NOT NULL,
  `waktu_ber` time NOT NULL,
  `id_kereta` varchar(10) NOT NULL,
  `kota_asal` varchar(20) NOT NULL,
  `kota_tujuan` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `tanggal_ber`, `waktu_ber`, `id_kereta`, `kota_asal`, `kota_tujuan`) VALUES
(1, '2021-01-28', '21:03:00', '3', 'Lubuklinggau', 'Palembang'),
(3, '2021-01-26', '20:54:00', '1', 'Palembang', 'Lubuklinggau'),
(4, '2021-01-14', '21:00:00', '3', 'Lubuklinggau', 'Palembang'),
(5, '2021-01-28', '22:05:00', '1', 'Lubuklinggau', 'Palembang'),
(6, '2021-01-28', '14:45:00', '1', 'Lubuklinggau', 'Palembang');

-- --------------------------------------------------------

--
-- Table structure for table `kereta`
--

CREATE TABLE IF NOT EXISTS `kereta` (
`id_kereta` int(13) NOT NULL,
  `nm_kereta` varchar(25) NOT NULL,
  `kelas` varchar(25) NOT NULL,
  `harga` int(25) NOT NULL,
  `jml_gerbong` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kereta`
--

INSERT INTO `kereta` (`id_kereta`, `nm_kereta`, `kelas`, `harga`, `jml_gerbong`) VALUES
(1, 'Selero', 'Ekonomi', 32000, 4),
(2, 'Kolin', 'Ekonomi', 35000, 3),
(3, 'Avengers', 'Eksekutif', 100000, 5);

-- --------------------------------------------------------

--
-- Table structure for table `kursi`
--

CREATE TABLE IF NOT EXISTS `kursi` (
`id_kursi` int(11) NOT NULL,
  `no_kursi` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kursi`
--

INSERT INTO `kursi` (`id_kursi`, `no_kursi`) VALUES
(3, '1'),
(4, '2'),
(5, '3'),
(6, '4'),
(7, '5'),
(8, '6'),
(9, '7'),
(10, '8'),
(11, '9'),
(12, '10'),
(13, '11'),
(14, '12'),
(15, '13'),
(16, '14'),
(17, '15'),
(18, '16'),
(19, '17'),
(20, '18'),
(21, '19'),
(22, '20'),
(23, '21'),
(24, '22'),
(25, '23'),
(26, '24'),
(27, '25'),
(28, '26'),
(29, '27'),
(30, '28'),
(31, '29'),
(32, '30'),
(33, '31'),
(34, '32'),
(35, '33'),
(36, '34'),
(37, '35'),
(38, '36'),
(39, '37'),
(40, '38'),
(41, '39'),
(42, '40');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE IF NOT EXISTS `penjualan` (
`id_penjualan` int(10) NOT NULL,
  `id_jadwal` varchar(10) NOT NULL,
  `total` int(15) NOT NULL,
  `id_kereta` varchar(25) NOT NULL,
  `id_gerbong` varchar(25) NOT NULL,
  `id_kursi` varchar(25) NOT NULL,
  `nik` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_jadwal`, `total`, `id_kereta`, `id_gerbong`, `id_kursi`, `nik`) VALUES
(2, '1', 100000, '3', '1', '2', '1673012502050002'),
(3, '1', 100000, '3', '1', '4', '1673012502050002'),
(4, '1', 100000, '3', '1', '5', '1673012502050002');

-- --------------------------------------------------------

--
-- Table structure for table `penumpang`
--

CREATE TABLE IF NOT EXISTS `penumpang` (
  `nik` varchar(16) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `no_tlpn` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penumpang`
--

INSERT INTO `penumpang` (`nik`, `nama`, `jk`, `alamat`, `no_tlpn`) VALUES
('1673012502050002', 'asdasd', 'Laki-laki', 'wqeqweqw', '213132312312'),
('1673080911990004', 'asdasd', 'Laki-laki', 'wqeqweqw', '123312132');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `gerbong`
--
ALTER TABLE `gerbong`
 ADD PRIMARY KEY (`id_gerbong`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
 ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `kereta`
--
ALTER TABLE `kereta`
 ADD PRIMARY KEY (`id_kereta`);

--
-- Indexes for table `kursi`
--
ALTER TABLE `kursi`
 ADD PRIMARY KEY (`id_kursi`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
 ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `penumpang`
--
ALTER TABLE `penumpang`
 ADD PRIMARY KEY (`nik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `gerbong`
--
ALTER TABLE `gerbong`
MODIFY `id_gerbong` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `kereta`
--
ALTER TABLE `kereta`
MODIFY `id_kereta` int(13) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `kursi`
--
ALTER TABLE `kursi`
MODIFY `id_kursi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
MODIFY `id_penjualan` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
