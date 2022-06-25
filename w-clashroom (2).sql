-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2022 at 01:58 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `w-clashroom`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_datacommentroom`
--

CREATE TABLE `tb_datacommentroom` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_dataroom` int(11) NOT NULL,
  `role` varchar(50) NOT NULL,
  `comment` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_datacommentroom`
--

INSERT INTO `tb_datacommentroom` (`id`, `id_user`, `id_dataroom`, `role`, `comment`, `foto`, `created_at`, `updated_at`) VALUES
(14, 8, 7, 'guru', 's', 'default.jpg', '2022-06-25 17:29:48', '2022-06-25 17:29:48');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dataroomguru`
--

CREATE TABLE `tb_dataroomguru` (
  `id` int(11) NOT NULL,
  `id_room` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `sub_judul` varchar(200) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_dataroomguru`
--

INSERT INTO `tb_dataroomguru` (`id`, `id_room`, `id_guru`, `judul`, `sub_judul`, `gambar`, `created_at`, `updated_at`) VALUES
(7, 7, 8, 'Matrix bab-2', 'Kerjakan Latsol di halaman 25', '1656196173_6610ca1f9b6d9c9074f4.jpg', '2022-06-25 17:29:33', '2022-06-25 17:29:33');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dataroomsiswa`
--

CREATE TABLE `tb_dataroomsiswa` (
  `id` int(11) NOT NULL,
  `id_dataroom` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_kirim` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kirim`
--

CREATE TABLE `tb_kirim` (
  `id` int(11) NOT NULL,
  `id_task` int(11) NOT NULL,
  `id_room` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `status` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`id`, `username`, `password`, `role`, `created_at`, `updated_at`) VALUES
(4, 'wildan', '$2y$10$3T2CUs3fCU2V8wMGXtNV7uQle7UmiO9pRF4vo/cLukcHGmQ.BKYS6', 'guru', '2022-06-24 22:38:44', '2022-06-24 22:38:44'),
(5, 'siswa', '$2y$10$7.P7jf6M/7RENYIKPEImluL.V59nUsZYfbOqwo8tpUE60ksR7.tpm', 'siswa', '2022-06-25 04:08:55', '2022-06-25 04:08:55'),
(6, 'siswa1', '$2y$10$seF2glNPA8Scj5Hc6b2Wre9CP.USKn7IBixtFJIfRN5kyGWmO9a0G', 'siswa', '2022-06-25 11:26:41', '2022-06-25 11:26:41'),
(7, 'siswa2', '$2y$10$UPHJt/Q.sL43LiJjMNJC7uWhzVF6l04mt1XaitmpNGsRoRR1Mb9UG', 'siswa', '2022-06-25 15:49:42', '2022-06-25 15:49:42'),
(8, 'admin', '$2y$10$894Qst8re0Q4hXza4NhhHesyIbHD3wR/r8ENTPmPPrYzmsHP6nqeu', 'admin', '2022-06-25 17:33:18', '2022-06-25 17:33:18');

-- --------------------------------------------------------

--
-- Table structure for table `tb_profile`
--

CREATE TABLE `tb_profile` (
  `id` int(11) NOT NULL,
  `id_login` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_profile`
--

INSERT INTO `tb_profile` (`id`, `id_login`, `nama`, `foto`, `alamat`, `created_at`, `updated_at`) VALUES
(7, 6, 'wildan', 'default.jpg', 'jl.simpang sulfat selatan', '2022-06-25 17:24:56', '2022-06-25 17:24:56'),
(8, 4, 'wijaya', 'default.jpg', 'jl.simpang sulfat selatan', '2022-06-25 17:29:07', '2022-06-25 17:29:07');

-- --------------------------------------------------------

--
-- Table structure for table `tb_roomguru`
--

CREATE TABLE `tb_roomguru` (
  `id_room` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `nama_pembelajaran` varchar(255) NOT NULL,
  `kelas` varchar(100) NOT NULL,
  `kode_room` varchar(100) NOT NULL,
  `jumlah_siswa` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_roomguru`
--

INSERT INTO `tb_roomguru` (`id_room`, `id_guru`, `nama_pembelajaran`, `kelas`, `kode_room`, `jumlah_siswa`, `status`, `created_at`, `updated_at`) VALUES
(7, 8, 'Matematika', 'XII RPL B', 'halomatematika', 1, 'open', '2022-06-25 17:29:19', '2022-06-25 17:30:23');

-- --------------------------------------------------------

--
-- Table structure for table `tb_roomsiswa`
--

CREATE TABLE `tb_roomsiswa` (
  `id` int(11) NOT NULL,
  `id_room` varchar(10) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_roomsiswa`
--

INSERT INTO `tb_roomsiswa` (`id`, `id_room`, `id_siswa`, `id_guru`, `status`, `created_at`, `updated_at`) VALUES
(4, '7', 7, 8, 'join', '2022-06-25 17:30:23', '2022-06-25 17:30:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_datacommentroom`
--
ALTER TABLE `tb_datacommentroom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_dataroomguru`
--
ALTER TABLE `tb_dataroomguru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_dataroomsiswa`
--
ALTER TABLE `tb_dataroomsiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kirim`
--
ALTER TABLE `tb_kirim`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_profile`
--
ALTER TABLE `tb_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_roomguru`
--
ALTER TABLE `tb_roomguru`
  ADD PRIMARY KEY (`id_room`);

--
-- Indexes for table `tb_roomsiswa`
--
ALTER TABLE `tb_roomsiswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_datacommentroom`
--
ALTER TABLE `tb_datacommentroom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_dataroomguru`
--
ALTER TABLE `tb_dataroomguru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_dataroomsiswa`
--
ALTER TABLE `tb_dataroomsiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_kirim`
--
ALTER TABLE `tb_kirim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_profile`
--
ALTER TABLE `tb_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_roomguru`
--
ALTER TABLE `tb_roomguru`
  MODIFY `id_room` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_roomsiswa`
--
ALTER TABLE `tb_roomsiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
