-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2020 at 03:43 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dummy_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `idOrder` int(11) NOT NULL,
  `idProduk` int(11) NOT NULL,
  `idMerchant` int(11) NOT NULL,
  `namaBarang` varchar(128) NOT NULL,
  `stokBarang` int(5) NOT NULL,
  `terjualBarang` int(5) NOT NULL,
  `hargaJual` int(11) NOT NULL,
  `hargaBeli` int(11) NOT NULL,
  `qtyOrder` int(5) NOT NULL,
  `totalHarga` int(11) NOT NULL,
  `profitPertransaksi` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `dateCreated` date NOT NULL,
  `dateModified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`idOrder`, `idProduk`, `idMerchant`, `namaBarang`, `stokBarang`, `terjualBarang`, `hargaJual`, `hargaBeli`, `qtyOrder`, `totalHarga`, `profitPertransaksi`, `status`, `dateCreated`, `dateModified`) VALUES
(51, 17, 1, 'Indomie Goreng Super Pedas', 38, 2, 2500, 1500, 2, 5000, 2000, 1, '2020-01-10', '2020-01-10'),
(52, 15, 1, 'Indomie Kuah Empal Gentong', 35, 5, 3000, 1500, 5, 15000, 7500, 1, '2020-01-10', '2020-01-10'),
(55, 1, 1, 'Indomie Kuah Soto', 38, 2, 2500, 1300, 2, 5000, 2400, 1, '2020-01-09', '2020-01-10'),
(56, 9, 1, 'Indomie Kuah Soto Padang', 38, 2, 12000, 6000, 2, 24000, 12000, 1, '2020-01-07', '2020-01-10'),
(57, 17, 1, 'Indomie Goreng Super Pedas', 35, 5, 2500, 1500, 3, 7500, 3000, 1, '2020-01-11', '2020-01-11'),
(58, 14, 1, 'Indomie Goreng Cakalang', 38, 2, 3000, 1500, 2, 6000, 3000, 1, '2020-01-11', '2020-01-11'),
(59, 14, 1, 'Indomie Goreng Cakalang', 35, 5, 3000, 1500, 3, 9000, 4500, 1, '2020-01-11', '2020-01-11'),
(60, 11, 1, 'Indomie Kuah Cakalang', 38, 2, 3000, 1500, 2, 6000, 3000, 1, '2020-01-11', '2020-01-11'),
(61, 13, 1, 'Indomie Kuah Mi Celor', 36, 4, 3000, 1500, 4, 12000, 6000, 1, '2020-01-11', '2020-01-11'),
(62, 13, 1, 'Indomie Kuah Mi Celor', 35, 5, 3000, 1500, 1, 3000, 1500, 1, '2020-01-11', '2020-01-11'),
(63, 11, 1, 'Indomie Kuah Cakalang', 35, 5, 3000, 1500, 3, 9000, 4500, 1, '2020-01-11', '2020-01-11'),
(64, 9, 1, 'Indomie Kuah Soto Padang', 35, 5, 12000, 6000, 3, 36000, 18000, 1, '2020-01-11', '2020-01-11'),
(65, 10, 1, 'Indomie Goreng Rendang', 35, 5, 3000, 1500, 5, 15000, 7500, 1, '2020-01-11', '2020-01-11'),
(66, 8, 1, 'Indomie Goreng Keriting Special', 35, 5, 3000, 1500, 5, 15000, 7500, 1, '2020-01-11', '2020-01-11'),
(67, 7, 1, 'Indomie Kuah Soto Special', 35, 5, 3000, 1500, 5, 15000, 7500, 1, '2020-01-11', '2020-01-11'),
(68, 6, 1, 'Indomie Goreng Aceh', 38, 2, 3000, 1500, 2, 6000, 3000, 1, '2020-01-11', '2020-01-11'),
(69, 18, 1, 'Indomie Soto', 38, 2, 3000, 1500, 2, 6000, 3000, 1, '2020-01-13', '2020-01-13');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `idProduk` int(11) NOT NULL,
  `namaProduk` varchar(100) NOT NULL,
  `labelProduk` varchar(100) NOT NULL,
  `stokProduk` int(11) NOT NULL,
  `terjualProduk` int(11) NOT NULL,
  `hargaBeli` int(11) NOT NULL,
  `hargaJual` int(11) NOT NULL,
  `profitProduk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`idProduk`, `namaProduk`, `labelProduk`, `stokProduk`, `terjualProduk`, `hargaBeli`, `hargaJual`, `profitProduk`) VALUES
(1, 'Indomie', 'Kuah Soto', 38, 2, 1300, 2500, 1200),
(2, 'Indomie', 'Goreng Classic', 40, 0, 1500, 3000, 1500),
(3, 'Indomie', 'Kuah Ayam Bawang', 40, 0, 1300, 2500, 1200),
(4, 'Indomie', 'Kuah Kari Ayam', 40, 0, 1500, 3000, 1500),
(5, 'Indomie', 'Goreng Special Jumbo', 40, 0, 2500, 5000, 2500),
(6, 'Indomie', 'Goreng Aceh', 38, 2, 1500, 3000, 1500),
(7, 'Indomie', 'Kuah Soto Special', 35, 5, 1500, 3000, 1500),
(8, 'Indomie', 'Goreng Keriting Special', 35, 5, 1500, 3000, 1500),
(9, 'Indomie', 'Kuah Soto Padang', 35, 5, 6000, 12000, 6000),
(10, 'Indomie', 'Goreng Rendang', 35, 5, 1500, 3000, 1500),
(11, 'Indomie', 'Kuah Cakalang', 35, 5, 1500, 3000, 1500),
(13, 'Indomie', 'Kuah Mi Celor', 35, 5, 1500, 3000, 1500),
(14, 'Indomie', 'Goreng Cakalang', 35, 5, 1500, 3000, 1500),
(15, 'Indomie', 'Kuah Empal Gentong', 35, 5, 1500, 3000, 1500),
(17, 'Indomie', 'Goreng Super Pedas', 35, 5, 1500, 2500, 1000),
(18, 'Indomie', 'Soto', 38, 2, 1500, 3000, 1500);

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `idMerchant` int(11) NOT NULL,
  `namaMerchant` varchar(25) NOT NULL,
  `emailMerchant` varchar(35) NOT NULL,
  `saldoMerchant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`idMerchant`, `namaMerchant`, `emailMerchant`, `saldoMerchant`) VALUES
(1, '525 Mart', '525mart@gmail.com', 500);

-- --------------------------------------------------------

--
-- Table structure for table `tanggal`
--

CREATE TABLE `tanggal` (
  `idTanggal` int(11) NOT NULL,
  `tanggal` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tanggal`
--

INSERT INTO `tanggal` (`idTanggal`, `tanggal`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13),
(14, 14),
(15, 15),
(16, 16),
(17, 17),
(18, 18),
(19, 19),
(20, 20),
(21, 21),
(22, 22),
(23, 23),
(24, 24),
(25, 25),
(26, 26),
(27, 27),
(28, 28),
(29, 29),
(30, 30),
(31, 31);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `idTransaksi` int(11) NOT NULL,
  `idMerchant` int(11) NOT NULL,
  `jenisTransaksi` varchar(100) NOT NULL,
  `tanggalTransaksi` date NOT NULL,
  `pengeluaran` int(11) NOT NULL,
  `pemasukan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`idOrder`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`idProduk`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`idMerchant`);

--
-- Indexes for table `tanggal`
--
ALTER TABLE `tanggal`
  ADD PRIMARY KEY (`idTanggal`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`idTransaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `idOrder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `idProduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `idMerchant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tanggal`
--
ALTER TABLE `tanggal`
  MODIFY `idTanggal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `idTransaksi` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
