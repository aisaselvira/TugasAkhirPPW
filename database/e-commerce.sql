-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2023 at 06:28 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `id_pembeli` char(6) NOT NULL,
  `username_pembeli` varchar(30) NOT NULL,
  `password_pembeli` varchar(50) NOT NULL,
  `email_pembeli` varchar(20) NOT NULL,
  `no_telp_pembeli` int(11) NOT NULL,
  `alamat_pembeli` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembeli`
--

INSERT INTO `pembeli` (`id_pembeli`, `username_pembeli`, `password_pembeli`, `email_pembeli`, `no_telp_pembeli`, `alamat_pembeli`) VALUES
('A00001', 'Jennie Rubyjane', '$2y$10$/UjGYbisTPJhr', '081625789348', 0, 'Gentan, Surakarta');

-- --------------------------------------------------------
--
-- Table structure for table `bom_produk`
--

-- CREATE TABLE `bom_produk` (
--   `id_bom` varchar(100) NOT NULL,
--   `id_pesanan` varchar(100) NOT NULL,
--   `id_produk` varchar(100) NOT NULL,
--   `nama_produk` varchar(200) NOT NULL,
--   `kebutuhan` varchar(200) NOT NULL
-- ) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --
-- -- Dumping data for table `bom_produk`
-- --

-- INSERT INTO `bom_produk` (`id_bom`, `id_pesanan`, `id_produk`, `nama_produk`, `kebutuhan`) VALUES
-- ('B0001', 'M0002', 'P0001', 'Roti Sobek', '2'),
-- ('B0001', 'M0001', 'P0001', 'Roti Sobek', '4'),
-- ('B0001', 'M0004', 'P0001', 'Roti Sobek', '3'),
-- ('B0002', 'M0001', 'P0002', 'Maryam', '4'),
-- ('B0002', 'M0004', 'P0002', 'Maryam', '3'),
-- ('B0002', 'M0003', 'P0002', 'Maryam', '2'),
-- ('B0003', 'M0002', 'P0003', 'Kue tart coklat', '2'),
-- ('B0003', 'M0003', 'P0003', 'Kue tart coklat', '5'),
-- ('B0003', 'M0005', 'P0003', 'Kue tart coklat', '5');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` char(6) NOT NULL,
  `id_pembeli` char(6) NOT NULL,
  `id_pembayaran` char(6) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `qty` varchar(200) NOT NULL,
  `satuan` varchar(200) NOT NULL,
  `harga` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan`
--

-- INSERT INTO `pesanan` (`id_pesanan`, `id_pembeli`, `id_pembayaran`, `id_produk`, `tanggal_pemesanan`, `waktu_pemesanan`, `total_pembayaran`, `total_pemesanan`, `status_pesanan`) VALUES
-- ('B00001', 'A00111', 'P00001', 'PR0001', '2022-02-14', '08:30:47', 200000, 'Sudah Bayar');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `wishlist` (
  `id_wishlist` char(6) NOT NULL,
  `id_pembeli` char(6) NOT NULL,
  `id_produk` char(6) NOT NULL,
  `id_kategori` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id_wishlist`),
  ADD KEY `FK_pembeli_wishlist` (`id_pembeli`),
  ADD KEY `FK_produk_wishlist` (`id_produk`),
  ADD KEY `FK_kategori_wishlist` (`id_kategori`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `FK_kategori_wishlist` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`),
  ADD CONSTRAINT `FK_pembeli_wishlist` FOREIGN KEY (`id_pembeli`) REFERENCES `pembeli` (`id_pembeli`),
  ADD CONSTRAINT `FK_produk_wishlist` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);
COMMIT;

--
-- Dumping data for table `keranjang`
--

-- INSERT INTO `keranjang` (`id_keranjang`, `id_pembeli`, `id_produk`, `nama_produk`, `qty`, `harga`) VALUES
-- (16, 'C0003', 'P0002', 'Maryam', 5, 15000),
-- (17, 'C0003', 'P0003', 'Kue tart coklat', 2, 100000);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` char(6) NOT NULL,
  `id_kategori` char(6) NOT NULL,
  `nama_produk` varchar(30) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `gambar_produk` varchar(255) NOT NULL,
  `stok_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `FK_Kategori` (`id_kategori`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `FK_Kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);
COMMIT;

--
-- Dumping data for table `produk`
--

-- INSERT INTO `produk` (`id_produk`, `nama`, `image`, `deskripsi`, `harga`) VALUES
-- ('P0001', 'Roti Sobek', '5f1d915d27dc3.jpg', '																								Roti Enak Sobek Sobek aww\r\n																					', 10000),
-- ('P0002', 'Maryam', '5f1d9154715a4.jpg', '				Roti araym\r\n						', 15000),
-- ('P0003', 'Kue tart coklat', '5f1d924614831.jpg', 'Kuetar dengan varian rasa coklat enak dan lumer rasanya\r\n			', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `id_detail_pesanan` char(6) NOT NULL,
  `id_produk` char(6) NOT NULL,
  `id_pesanan` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD PRIMARY KEY (`id_detail_pesanan`,`id_produk`,`id_pesanan`),
  ADD KEY `FK_Produk` (`id_produk`),
  ADD KEY `FK_pesanan` (`id_pesanan`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD CONSTRAINT `FK_Produk` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`),
  ADD CONSTRAINT `FK_pesanan` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id_pesanan`);
COMMIT;

--
-- Dumping data for table `produksi`
--

-- INSERT INTO `produksi` (`id_order`, `invoice`, `id_pembeli`, `id_produk`, `nama_produk`, `qty`, `harga`, `status`, `tanggal`, `provinsi`, `kota`, `alamat`, `id_pos`, `terima`, `tolak`, `cek`) VALUES
-- (8, 'INV0001', 'C0002', 'P0003', 'Kue tart coklat', 1, 100000, 'Pesanan Baru', '2020-07-27', 'Jawa Timur', 'Surabaya', 'Jl.Tanah Merah Indah 1', '60129', '2', '1', 1),
-- (9, 'INV0002', 'C0002', 'P0001', 'Roti Sobek', 3, 10000, 'Pesanan Baru', '2020-07-27', 'Jawa Barat', 'Bandung', 'Jl.Jati Nangor Blok C, 10', '30712', '0', '0', 1),
-- (10, 'INV0003', 'C0003', 'P0002', 'Maryam', 2, 15000, '0', '2020-07-27', 'Jawa Tengah', 'Yogyakarta', 'Jl.Malioboro, Blok A 10D', '30123', '1', '0', 0),
-- (11, 'INV0003', 'C0003', 'P0003', 'Kue tart coklat', 1, 100000, '0', '2020-07-27', 'Jawa Tengah', 'Yogyakarta', 'Jl.Malioboro, Blok A 10D', '30123', '1', '0', 0),
-- (12, 'INV0003', 'C0003', 'P0001', 'Roti Sobek', 1, 10000, '0', '2020-07-27', 'Jawa Tengah', 'Yogyakarta', 'Jl.Malioboro, Blok A 10D', '30123', '1', '0', 0),
-- (13, 'INV0004', 'C0004', 'P0002', 'Maryam', 1, 15000, 'Pesanan Baru', '2020-07-26', 'Jawa Timur', 'Sidoarjo', 'Jl.KH Syukur Blok C 18 A', '50987', '0', '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` char(6) NOT NULL,
  `jenis_kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);
COMMIT;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` char(6) NOT NULL,
  `metode_pembayaran` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);
COMMIT;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
