-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 10, 2019 at 10:44 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_penjualanGubukIT`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_deposit`
--

CREATE TABLE `tb_deposit` (
  `id_deposit` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `pengirim_deposit` varchar(50) NOT NULL,
  `jumlah_deposit` int(11) NOT NULL,
  `tanggal_deposit` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_deposit`
--

INSERT INTO `tb_deposit` (`id_deposit`, `id_user`, `pengirim_deposit`, `jumlah_deposit`, `tanggal_deposit`) VALUES
(1, 1, 'Muhammad Iqbal', 1000000, '2019-07-05'),
(2, 1, 'Muhammad Iqbal', 100000, '2019-07-05'),
(3, 2, 'Nabila Anisa', 1000000, '2019-07-06'),
(4, 2, 'Nabila Anisa', 50000000, '2019-07-06'),
(5, 5, 'user', 100000, '2019-07-06'),
(6, 1, 'Muhammad Iqbal', 10000000, '2019-07-06'),
(7, 5, 'user', 50000000, '2019-07-06'),
(8, 5, 'user', 1000000, '2019-07-10'),
(9, 7, 'nabila', 90000, '2019-07-10');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `gambar_produk` text,
  `stok_produk` int(11) NOT NULL,
  `deskripsi_produk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `nama_produk`, `harga_produk`, `gambar_produk`, `stok_produk`, `deskripsi_produk`) VALUES
(31, 'Kopi panas', 50000, 'ijazah.png', 5, '<p>hemm</p>'),
(32, 'cobaa ajja', 9000, 'logo.png', 986, 'Haiiiii');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_user` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah_transaksi` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `tanggal_transaksi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_user`, `id_produk`, `jumlah_transaksi`, `total_harga`, `tanggal_transaksi`) VALUES
(5, 31, 1, 50000, '2019-07-10'),
(5, 31, 3, 150000, '2019-07-10'),
(5, 32, 1, 9000, '2019-07-10'),
(7, 31, 1, 50000, '2019-07-10');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `username_user` varchar(50) NOT NULL,
  `password_user` varchar(50) NOT NULL,
  `saldo_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `username_user`, `password_user`, `saldo_user`) VALUES
(1, 'Muhammad Iqbal Rr', 'iqbalcakep', 'eedae20fc3c7a6e9c5b1102098771c70', 5100000),
(7, 'nabila', 'nabila', '652d3266220e0aacb047d3aa6f51f1b0', 50000),
(8, 'Nama Saya User', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 10000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_deposit`
--
ALTER TABLE `tb_deposit`
  ADD PRIMARY KEY (`id_deposit`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_deposit`
--
ALTER TABLE `tb_deposit`
  MODIFY `id_deposit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
