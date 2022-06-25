-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2022 at 11:06 AM
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
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Table structure for table `tb_dataroomsiswa`
--

CREATE TABLE `tb_dataroomsiswa` (
  `id` int(11) NOT NULL,
  `id_dataroom` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
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
(4, 'wildan', '$2y$10$3T2CUs3fCU2V8wMGXtNV7uQle7UmiO9pRF4vo/cLukcHGmQ.BKYS6', 'guru', '2022-06-24 22:38:44', '2022-06-24 22:38:44');

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
(2, 4, 'wildan fajar ms', '1656147043_b8bc3238606f85abc2e0.jpg', 'jl.simpang sulfat selatanss', '2022-06-25 03:25:59', '2022-06-25 03:50:43');

-- --------------------------------------------------------

--
-- Table structure for table `tb_roomguru`
--

CREATE TABLE `tb_roomguru` (
  `id` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `nama_pembelajaran` varchar(255) NOT NULL,
  `kode_room` varchar(10) NOT NULL,
  `jumlah_siswa` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_roomsiswa`
--

CREATE TABLE `tb_roomsiswa` (
  `id` int(11) NOT NULL,
  `id_room` varchar(10) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_roomsiswa`
--
ALTER TABLE `tb_roomsiswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_dataroomsiswa`
--
ALTER TABLE `tb_dataroomsiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_profile`
--
ALTER TABLE `tb_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_roomguru`
--
ALTER TABLE `tb_roomguru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_roomsiswa`
--
ALTER TABLE `tb_roomsiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
