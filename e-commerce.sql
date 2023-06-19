-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2023 at 07:28 AM
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
-- Table structure for table `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `id_detail_pesanan` char(6) NOT NULL,
  `id_produk` char(6) NOT NULL,
  `id_pesanan` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` char(6) NOT NULL,
  `jenis_kategori` varchar(30) NOT NULL,
  `gambar_kategori` varchar(30) NOT NULL,
  `deskripsi_kategori` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `jenis_kategori`, `gambar_kategori`, `deskripsi_kategori`) VALUES
('KT0001', 'Album', 'SOWOZOO.jpg', 'These albums are physical products that contain a collection of songs in CD format, sometimes accomp'),
('KT0002', 'Photocard', 'pc.jpeg', 'These collectible cards are often included as special bonuses or merchandise within K-pop albums, creating a unique connection between fans and their favorite artists.'),
('KT0003', 'Lighstick', 'ls.jpg', 'Lighstick KPOP is a specially designed light-emitting stick that fans can hold and wave in synchronization with the music.'),
('KT0004', 'Keyrings', 'keyrings.png', 'Keyrings in K-pop often showcase the members of a group or highlight a specific concept or era related to the artist.'),
('KT0005', 'Poster Set', 'poster.png', 'Posters typically includes multiple posters in various sizes, showcasing different images or designs related to the artist or group.'),
('KT0006', 'Fashion', 'shirt.png', 'Combines elements of various genres, such as streetwear, high fashion, vintage, and traditional Korean attire, to create unique and eye-catching looks');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` char(6) NOT NULL,
  `metode_pembayaran` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `id_pembeli` char(6) NOT NULL,
  `nama_pembeli` varchar(30) NOT NULL,
  `username_pembeli` varchar(30) NOT NULL,
  `password_pembeli` varchar(50) NOT NULL,
  `email_pembeli` varchar(30) NOT NULL,
  `no_telp_pembeli` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembeli`
--

INSERT INTO `pembeli` (`id_pembeli`, `nama_pembeli`, `username_pembeli`, `password_pembeli`, `email_pembeli`, `no_telp_pembeli`) VALUES
('A00001', 'Lisa Jennie', 'Lisa', '$2y$10$WFG8/SqkyovkQhkjnY4XVuNZ1DRZxESfZ9TgjCKcHjq', 'jennielisa@gmail.com', '085734569876');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` char(6) NOT NULL,
  `id_pembeli` char(6) NOT NULL,
  `id_pembayaran` char(6) NOT NULL,
  `id_produk` char(6) NOT NULL,
  `tanggal_pemesanan` date NOT NULL,
  `waktu_pemesanan` time NOT NULL,
  `total_pembayaran` int(11) NOT NULL,
  `total_pemesanan` int(11) NOT NULL,
  `status_pesanan` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` char(6) NOT NULL,
  `id_kategori` char(6) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `gambar_produk` varchar(255) NOT NULL,
  `stok_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `harga_produk`, `gambar_produk`, `stok_produk`) VALUES
('PR0001', 'KT0001', 'Enhypen 2nd Mini Album - Borde', 30, 'enhypen.jpg', 50),
('PR0002', 'KT0001', 'Proof (Collector’s Edition)', 275, 'proof.png', 30),
('PR0003', 'KT0001', 'NewJeans ‘OMG’ Album ver. (Random)', 143, 'omg.png', 70),
('PR0004', 'KT0001', '1st Single Album [Play Game : AWAKE] SET', 24, 'weekly.png', 40),
('PR0005', 'KT0001', '8th MINI ALBUM [BE AWAKE] PLATFORM ver. (REACH ver.)', 13, 'roar.png', 25),
('PR0006', 'KT0001', '2022 Season\'s Greetings', 35, 'txt.png', 15),
('PR0007', 'KT0001', 'JAPAN 1st Single [FEARLESS] Limited B', 18, 'les.png', 40),
('PR0008', 'KT0001', 'Piano Sheet Music <SEVENTEEN LAND : DAY>', 20, 'SV.png', 30),
('PR0009', 'KT0001', '1st Mini Album <Absolute Zero> Deluxe ver.', 27, 'AZ.png', 10),
('PR0010', 'KT0002', '[JAY] MINI PHOTO CARD BINDER', 18, 'pc1.png', 20),
('PR0011', 'KT0002', 'PHOTO CARD SET - BAEKHoneyDay', 11, 'pc2.png', 35),
('PR0012', 'KT0002', 'Postcard Set (Purple) - BTS', 23, 'pc4.png', 33),
('PR0013', 'KT0002', '[NIGHTGARDEN] TREASURE FOLDING PHOTO PACKAGE', 20, 'pc5.png', 13),
('PR0014', 'KT0002', '[ME] JISOO PHOTO CARD FOLDER', 18, 'pc6.png', 40),
('PR0015', 'KT0002', 'ID Card Holder Set - JIN', 22, 'pc7.png', 30),
('PR0016', 'KT0002', 'Trading Card Set', 5, 'pc8.png', 45),
('PR0017', 'KT0002', 'Instant Photo Card Set (ver.1)', 16, 'pc9.png', 17),
('PR0018', 'KT0002', 'Lenticular Photo Set', 17, 'pc10.png', 25),
('PR0019', 'KT0003', 'BTS SPECIAL ARMY BOMB', 124, 'lg-bts.webp', 26),
('PR0020', 'KT0003', 'BLACKPINK - OFFICIAL LIGHT STICK VER.2 RENEWAL EDITION', 72, 'lg2.webp', 32),
('PR0021', 'KT0003', 'TXT - OFFICIAL LIGHT STICK', 74, 'txtt.webp', 34),
('PR0022', 'KT0003', 'ATEEZ - OFFICIAL LIGHT STICK VER.2', 72, 'lg4.webp', 50),
('PR0023', 'KT0003', 'SEVENTEEN - OFFICIAL LIGHT STICK VER.3', 81, 'lg5.webp', 47),
('PR0024', 'KT0003', 'THE ROSE - OFFICIAL LIGHT STICK', 88, 'lg6.webp', 36),
('PR0025', 'KT0003', 'BTS SPECIAL ARMY BOMB', 74, 'lg-ts.webp', 55),
('PR0026', 'KT0003', 'LE SSERAFIM - OFFICIAL LIGHT STICK', 81, 'lg-ls.webp', 30),
('PR0027', 'KT0003', 'LE SSERAFIM - OFFICIAL LIGHT STICK', 74, 'lg-nct.webp', 60);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view1_produk_kategori`
-- (See below for the actual view)
--
CREATE TABLE `view1_produk_kategori` (
`nama_produk` varchar(100)
,`jenis_kategori` varchar(30)
,`gambar_produk` varchar(255)
,`deskripsi_kategori` varchar(200)
);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id_wishlist` char(6) NOT NULL,
  `id_pembeli` char(6) NOT NULL,
  `id_produk` char(6) NOT NULL,
  `id_kategori` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure for view `view1_produk_kategori`
--
DROP TABLE IF EXISTS `view1_produk_kategori`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view1_produk_kategori`  AS SELECT `p`.`nama_produk` AS `nama_produk`, `k`.`jenis_kategori` AS `jenis_kategori`, `p`.`gambar_produk` AS `gambar_produk`, `k`.`deskripsi_kategori` AS `deskripsi_kategori` FROM (`produk` `p` join `kategori` `k` on(`p`.`id_kategori` = `k`.`id_kategori`)) ;

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
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id_pembeli`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `FK_produk_pesanan` (`id_produk`),
  ADD KEY `FK_pembeli_pesanan` (`id_pembeli`),
  ADD KEY `FK_pembayaran_pesanan` (`id_pembayaran`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `FK_Kategori` (`id_kategori`);

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
-- Constraints for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD CONSTRAINT `FK_Produk` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`),
  ADD CONSTRAINT `FK_pesanan` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id_pesanan`);

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `FK_pembayaran_pesanan` FOREIGN KEY (`id_pembayaran`) REFERENCES `pembayaran` (`id_pembayaran`),
  ADD CONSTRAINT `FK_pembeli_pesanan` FOREIGN KEY (`id_pembeli`) REFERENCES `pembeli` (`id_pembeli`),
  ADD CONSTRAINT `FK_produk_pesanan` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `FK_Kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `FK_kategori_wishlist` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`),
  ADD CONSTRAINT `FK_pembeli_wishlist` FOREIGN KEY (`id_pembeli`) REFERENCES `pembeli` (`id_pembeli`),
  ADD CONSTRAINT `FK_produk_wishlist` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
