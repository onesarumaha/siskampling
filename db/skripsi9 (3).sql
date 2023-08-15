-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2023 at 04:29 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi9`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_jadwal`
--

CREATE TABLE `data_jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `hari` varchar(30) NOT NULL,
  `shift` enum('Pagi','Malam') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_jadwal`
--

INSERT INTO `data_jadwal` (`id_jadwal`, `id_user`, `hari`, `shift`) VALUES
(7, 4, 'Jumat', 'Pagi'),
(9, 4, 'Minggu', 'Pagi'),
(10, 13, 'Sabtu', 'Pagi'),
(11, 14, 'Senin', 'Malam'),
(12, 16, 'Rabu', 'Pagi'),
(13, 19, 'Senin', 'Pagi'),
(14, 4, 'Selasa', 'Malam');

-- --------------------------------------------------------

--
-- Table structure for table `data_keuangan`
--

CREATE TABLE `data_keuangan` (
  `id_keuangan` int(11) NOT NULL,
  `no_transaksi` varchar(30) NOT NULL,
  `tgl` date NOT NULL,
  `jns_trans` enum('Pemasukan','Pengeluaran') NOT NULL,
  `kategori_trans` enum('Keamanan','Santunan','Kebersihan','Lainnya') NOT NULL,
  `nominal` int(30) NOT NULL,
  `status` enum('Approve','Reject','Menunggu') NOT NULL,
  `ket` text NOT NULL,
  `bukti` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_keuangan`
--

INSERT INTO `data_keuangan` (`id_keuangan`, `no_transaksi`, `tgl`, `jns_trans`, `kategori_trans`, `nominal`, `status`, `ket`, `bukti`) VALUES
(1, 'PEN47100823061020', '2023-08-10', 'Pengeluaran', 'Keamanan', 9090909, 'Approve', 'HGHGHJ', 'Kedai_Kopi_Samudera3.png'),
(2, 'PEN - 14110823061116', '2023-08-10', 'Pengeluaran', 'Keamanan', 9090909, 'Reject', 'hgfghfh', 'd3.jpg'),
(3, 'PEN - 07120823061238', '2023-08-10', 'Pengeluaran', 'Keamanan', 1111, 'Reject', 'ghgfhfh', 'e7.jpg'),
(4, 'PEM - 53130823061306', '2023-08-10', 'Pemasukan', 'Kebersihan', 2222, 'Approve', 'DSDSini', 'b3.jpg'),
(5, 'PEN - 18560823065650', '2023-08-10', 'Pengeluaran', 'Keamanan', 3434, 'Menunggu', 'sdfdsfdss', 'b4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `data_patroli`
--

CREATE TABLE `data_patroli` (
  `id_patroli` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `waktu` time NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_patroli`
--

INSERT INTO `data_patroli` (`id_patroli`, `id_user`, `tgl`, `waktu`, `ket`) VALUES
(1, 13, '2023-07-23', '20:53:09', 'jhhhj'),
(2, 16, '2023-07-23', '20:56:00', 'jfggh'),
(3, 19, '2023-08-10', '21:49:00', 'jhgfhg'),
(4, 19, '2023-08-10', '21:50:00', 'kebakaran'),
(5, 17, '2023-08-13', '22:24:00', 'dsdsds'),
(6, 19, '2023-08-13', '22:28:00', 'sasasasa'),
(7, 19, '2023-08-13', '10:35:00', 'ubah');

-- --------------------------------------------------------

--
-- Table structure for table `ganti_shift`
--

CREATE TABLE `ganti_shift` (
  `id_ganti_shift` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `nama_pemohon` int(11) NOT NULL,
  `nama_pengganti` varchar(30) NOT NULL,
  `alasan` text NOT NULL,
  `approve` enum('Ya','Tolak','Diproses') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ganti_shift`
--

INSERT INTO `ganti_shift` (`id_ganti_shift`, `tgl`, `nama_pemohon`, `nama_pengganti`, `alasan`, `approve`) VALUES
(1, '2023-08-11', 19, 'wira', 'hjhjhj', 'Ya');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tmpt_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `akses` enum('Petugas','Kepala Kelurahan','Admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `email`, `tmpt_lahir`, `tgl_lahir`, `username`, `password`, `alamat`, `akses`) VALUES
(4, 'Prayogo', '', 'Jakarta', '1994-10-02', 'yogo', '$2y$10$gVnIhokB1kcuPwYvC359q.Qmeix0qYYk6gBCvBfK1GlwyvvR0c9ri', 'Jakarta', 'Petugas'),
(5, 'Dian Putra', '', 'Medan', '1999-10-09', 'dian', '$2y$10$.0F.VxXNMSl8dFA00SGML.9sPyit057tNNnOLVQArCkyZIyYT0KfG', 'Surabaya', 'Petugas'),
(6, 'Rudi Sutomo', '', 'Medan', '1987-10-09', 'rudi', '$2y$10$IjskBoS/37a.ONMnElmZd.3655ogMRD8CoFDww4zw3M1f8/fqA2mi', 'Jakarta', 'Petugas'),
(9, 'Sulisto', '', 'Jakarta', '2023-01-01', 'sulis', '$2y$10$pAZbYYqAZih8skwts.Zgl.Y2E5PO/QPVDAuekXFocDQFQ.E15Aco.', 'Jakarta', 'Kepala Kelurahan'),
(10, 'Indrawan', '', 'Jakarta', '1999-12-09', 'indra', '$2y$10$bFReUt7YPSQ7FM2SCelq/elOBtdGkZvO8hQN7svgr2LJXANJAudxq', 'Jakarta', 'Kepala Kelurahan'),
(11, 'Panji Simarmata', '', '', '0000-00-00', 'admin', '$2y$10$RIaoEZ5e1mp/jIy3TVstKuyR/Xb6lcPd5FHQt/XHSJRj9x5r6mzO.', '', 'Admin'),
(12, 'Budiman', '', 'Cengkareng', '1994-10-09', 'budi', '$2y$10$wJPFmLVNwjC3bOPJRpLpAeHaflHbWjoHzDYtWqTBI1fGU9mcX6.5a', 'Jakarta', 'Kepala Kelurahan'),
(13, 'Abdel', '', 'Jakarta', '1986-12-09', 'abdel', '$2y$10$ZvJJzku0s4MQ4mnXfQ4OdOKqoBd4dMl60HoUcrg4dC805tZ6C4AKu', 'Jakarta', 'Petugas'),
(14, 'Indra Syahputra', '', 'Bandung', '1999-12-09', 'indra', '$2y$10$RNFjN07JExNKtW/VyV6Z.OVP.6yLpIyRbZsfkWSvRbwGmxc85nyry', 'Jakarta', 'Petugas'),
(15, 'Puja Santosa', '', 'Makassar', '1977-12-09', 'puja', '$2y$10$rZIu9eI3RTldHdfDuFosE.naDCHBdnAJItVQ/80g1xYqdOzpTcm1i', 'Jakarta', 'Petugas'),
(16, 'Yoga Dananta', '', 'Manado', '1999-02-02', 'Yoga', '$2y$10$9b6ws5rVrfp8YKNSssLpk.STliXwgr2G4eiHJ0saap8y.3bMDE5Mq', 'Jakarta', 'Petugas'),
(17, 'Perwira Putra', 'onesarumaha10@gmail.com', 'Palembang', '1998-12-31', 'wira', '$2y$10$YhYEEOd/uO0.Kf19N3o8VefLSAybAYzwrriUGncZrKEgOHivAxPI6', 'Jakarta', 'Petugas'),
(18, 'Budiono Soparto', '', '', '0000-00-00', 'lurah', '$2y$10$Z.AvHSIGhRRRujvnRo7TfeC6mvn8VQ2B6u6g6z52V1ZakUjp2OT1W', '', 'Kepala Kelurahan'),
(19, 'Pairo', 'onesarumaha@gmail.com', 'Medan', '2023-08-10', 'pairo', '$2y$10$8t/L2HDYJVnSIkj2EKPMc.sf2/wLZOWQtyZS3skaq9HvYWm0/aHZy', 'Jakarta', 'Petugas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_jadwal`
--
ALTER TABLE `data_jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `data_keuangan`
--
ALTER TABLE `data_keuangan`
  ADD PRIMARY KEY (`id_keuangan`);

--
-- Indexes for table `data_patroli`
--
ALTER TABLE `data_patroli`
  ADD PRIMARY KEY (`id_patroli`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `ganti_shift`
--
ALTER TABLE `ganti_shift`
  ADD PRIMARY KEY (`id_ganti_shift`),
  ADD KEY `nama_pemohon` (`nama_pemohon`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_jadwal`
--
ALTER TABLE `data_jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `data_keuangan`
--
ALTER TABLE `data_keuangan`
  MODIFY `id_keuangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `data_patroli`
--
ALTER TABLE `data_patroli`
  MODIFY `id_patroli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ganti_shift`
--
ALTER TABLE `ganti_shift`
  MODIFY `id_ganti_shift` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_jadwal`
--
ALTER TABLE `data_jadwal`
  ADD CONSTRAINT `data_jadwal_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `data_patroli`
--
ALTER TABLE `data_patroli`
  ADD CONSTRAINT `data_patroli_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `ganti_shift`
--
ALTER TABLE `ganti_shift`
  ADD CONSTRAINT `ganti_shift_ibfk_1` FOREIGN KEY (`nama_pemohon`) REFERENCES `users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
