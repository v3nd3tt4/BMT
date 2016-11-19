-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2016 at 03:32 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bmt`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `agama` varchar(255) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `ayah` varchar(255) NOT NULL,
  `ibu` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `pekerjaan`, `ayah`, `ibu`, `alamat`, `no_hp`) VALUES
('02-LT-100030', 'Suwaji', 'Jawa Timur', '1960-01-01', 'pria', 'islam', 'Karyawan', 'Karto', 'Supar', 'Banjar Agung', 2147483647),
('12-LT-100280', 'purwaningsih', 'Bandar Lampung', '1992-10-27', 'wanita', 'islam', 'ibu rumah tangga', 'mr. x', 'mrs. x', 'way galih', 2147483647),
('ang-001', 'arief', 'Bandar Lampung', '2016-12-27', 'pria', 'islam', 'programmer', 'a', 'b', 'gdgd\r\n', 128283),
('ang-002', 'vendetta', 'Bandar Lampung', '1992-10-27', 'pria', 'islam', 'programmer', 'herman', 'ibu', 'Jl. P. Antasari Gg. Sadar No. 16 Kelurahan Kedamaian Kecamatan Tanjung Karang Timur Kota Bandar Lampung', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` varchar(255) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `presentase` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `presentase`, `kategori`) VALUES
('SiDik', 'Simpanan Pendidikan', '0', 'simpanan'),
('SiFitria', 'Simpanan Idul Fitri Ceria', '0', 'simpanan'),
('SiGraha', 'Simpanan Gotong Royong Usaha', '12', 'simpanan'),
('SiMapan', 'Simpanan Masa Depan', '0', 'simpanan'),
('SiMapan1', 'Simpanan Masa Depan (1 Bulan)', '0.6', ''),
('SiMapan10', 'Simpanan Masa Depan (10 Bulan)', '8', ''),
('SiMapan11', 'Simpanan Masa Depan (11 Bulan)', '8.8', ''),
('SiMapan2', 'Simpanan Masa Depan (2 Bulan)', '1.2', ''),
('SiMapan3', 'Simpanan Masa Depan (3 Bulan)', '1.8', ''),
('SiMapan4', 'Simpanan Masa Depan 4 Bulan)', '2.4', ''),
('SiMapan5', 'Simpanan Masa Depan (5 Bulan)', '3', ''),
('SiMapan6', 'Simpanan Masa Depan (6 Bulan)', '4.2', ''),
('SiMapan7', 'Simpanan Masa Depan (7 Bulan)', '4.9', ''),
('SiMapan8', 'Simpanan Masa Depan (8 Bulan)', '5.6', ''),
('SiMapan9', 'Simpanan Masa Depan (9 Bulan)', '6.3', ''),
('SiQura', 'Simpanan Qurban dan Aqiqah', '0', 'simpanan'),
('SiRela', 'Simpanan Suka Rela', '0', 'simpanan'),
('SiTara', 'Simpanan Target Rencana', '0', 'simpanan'),
('SiUji', 'Simpanan Umroh dan Haji', '0', 'simpanan');

-- --------------------------------------------------------

--
-- Table structure for table `register_pembiayaan`
--

CREATE TABLE `register_pembiayaan` (
  `id` int(11) NOT NULL,
  `no_anggota` varchar(255) NOT NULL,
  `jenis_pembiayaan` varchar(255) NOT NULL,
  `pokok_pembiayaan` int(11) NOT NULL,
  `fee` int(11) NOT NULL,
  `tempo` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register_pembiayaan`
--

INSERT INTO `register_pembiayaan` (`id`, `no_anggota`, `jenis_pembiayaan`, `pokok_pembiayaan`, `fee`, `tempo`, `tanggal`) VALUES
(1, '02-LT-100030', 'hawalah', 10000000, 100000, 10, '2016-04-26');

-- --------------------------------------------------------

--
-- Table structure for table `register_simpanan`
--

CREATE TABLE `register_simpanan` (
  `id_register` int(11) NOT NULL,
  `id_produk` varchar(255) NOT NULL,
  `no_anggota` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register_simpanan`
--

INSERT INTO `register_simpanan` (`id_register`, `id_produk`, `no_anggota`, `keterangan`) VALUES
(1, 'SiFitria', '02-LT-100030', '');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_pembiayaan`
--

CREATE TABLE `transaksi_pembiayaan` (
  `id` int(11) NOT NULL,
  `id_register_pembiayaan` varchar(255) NOT NULL,
  `nominal` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `petugas` varchar(255) NOT NULL,
  `angsuran_ke` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_pembiayaan`
--

INSERT INTO `transaksi_pembiayaan` (`id`, `id_register_pembiayaan`, `nominal`, `tanggal`, `petugas`, `angsuran_ke`) VALUES
(1, '1', 1010000, '2016-04-26', 'vendetta', 1),
(2, '1', 1010000, '2016-04-26', 'vendetta', 2),
(3, '1', 1010000, '2016-05-22', 'vendetta', 3);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_simpanan`
--

CREATE TABLE `transaksi_simpanan` (
  `id` int(11) NOT NULL,
  `id_register_simpanan` varchar(255) NOT NULL,
  `nominal` int(11) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `petugas` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_simpanan`
--

INSERT INTO `transaksi_simpanan` (`id`, `id_register_simpanan`, `nominal`, `tanggal_transaksi`, `petugas`, `keterangan`) VALUES
(1, '1', 50000, '2016-04-26', 'vendetta', 'setor'),
(2, '1', 25000, '2016-04-26', 'vendetta', 'tarik');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `nama`, `password`, `level`) VALUES
('vendetta', 'okta pilopa', '29f407c056a49df82ff273a37a82999f', 'master'),
('andra', 'andra ikhsanudin', '7b0fd9454251fd5781ea54f2c25dbc58', 'master'),
('yeyen', 'yeyen kumala sari', 'e10adc3949ba59abbe56e057f20f883e', 'admin'),
('oot', 'Marwoto Irsada', 'd3877117cb6ea400bf2a8f1df2f10cb1', 'master');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `register_pembiayaan`
--
ALTER TABLE `register_pembiayaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register_simpanan`
--
ALTER TABLE `register_simpanan`
  ADD PRIMARY KEY (`id_register`);

--
-- Indexes for table `transaksi_pembiayaan`
--
ALTER TABLE `transaksi_pembiayaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi_simpanan`
--
ALTER TABLE `transaksi_simpanan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `register_pembiayaan`
--
ALTER TABLE `register_pembiayaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `register_simpanan`
--
ALTER TABLE `register_simpanan`
  MODIFY `id_register` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `transaksi_pembiayaan`
--
ALTER TABLE `transaksi_pembiayaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `transaksi_simpanan`
--
ALTER TABLE `transaksi_simpanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
