-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2025 at 08:04 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `lampiran`
--

CREATE TABLE `lampiran` (
  `id_lampiran` int(11) NOT NULL,
  `id_pendaftar` int(11) NOT NULL,
  `jenis_lampiran` varchar(100) NOT NULL,
  `file_lampiran` varchar(255) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lampiran`
--

INSERT INTO `lampiran` (`id_lampiran`, `id_pendaftar`, `jenis_lampiran`, `file_lampiran`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 1, 'Kartu Keluarga', '1742016887_3f88e77a37ac2c27aecf.pdf', 'bubi', '2025-03-14 19:49:03', '2025-03-15 05:34:47'),
(2, 1, 'Kartu Keluarga', '1742016398_e1189b8809892f267af0.pdf', 'bbbbb', '2025-03-14 19:49:03', '2025-03-15 05:26:39'),
(3, 2, 'Ijazah', 'ijazah-2.pdf', 'Scan warna', '2025-03-14 19:49:03', '2025-03-14 19:49:03'),
(4, 2, 'Kartu Keluarga', '1741984455_1ea71924bac72566ee71.pdf', 'bbbbb', '2025-03-14 20:34:16', '2025-03-14 20:34:16'),
(6, 2, 'Kartu Keluarga', '1742017240_0725f87b8fe330c1392a.pdf', 'hahah\r\n', '2025-03-15 05:40:40', '2025-03-15 05:40:40');

-- --------------------------------------------------------

--
-- Table structure for table `penghasilan`
--

CREATE TABLE `penghasilan` (
  `id` int(11) NOT NULL,
  `penghasilan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penghasilan`
--

INSERT INTO `penghasilan` (`id`, `penghasilan`) VALUES
(1, 'Lebih dari Rp.1.000.000'),
(2, 'Kurang dari Rp.200.000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_agama`
--

CREATE TABLE `tbl_agama` (
  `id` int(11) NOT NULL,
  `agama` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_agama`
--

INSERT INTO `tbl_agama` (`id`, `agama`, `created_at`, `updated_at`) VALUES
(1, 'Islam', '2025-03-14 03:02:48', '2025-03-14 10:34:56'),
(2, 'Hinduu', '2025-03-13 20:25:53', '2025-03-13 21:03:49');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pekerjaan`
--

CREATE TABLE `tbl_pekerjaan` (
  `id_pekerjaan` int(255) NOT NULL,
  `pekerjaan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pekerjaan`
--

INSERT INTO `tbl_pekerjaan` (`id_pekerjaan`, `pekerjaan`, `created_at`, `updated_at`) VALUES
(1, 'PMS', '2025-03-14 00:48:21', '2025-03-14 10:33:39'),
(2, 'Swasta', '2025-03-14 00:48:21', '2025-03-14 00:48:46'),
(3, 'TNI/POLRI', '2025-03-14 00:48:21', '2025-03-14 00:48:46'),
(4, 'Wiraswasta', '2025-03-14 00:48:21', '2025-03-14 00:48:46'),
(6, 'Pelaut', '2025-03-13 18:53:08', '2025-03-13 19:09:15'),
(8, 'PAS', '2025-03-13 19:34:31', '2025-03-14 09:26:11'),
(9, 'buruh', '2025-03-14 09:35:12', '2025-03-14 09:35:12'),
(10, 'Managor', '2025-03-14 09:35:23', '2025-03-14 09:47:02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pendidikan`
--

CREATE TABLE `tbl_pendidikan` (
  `id` int(11) NOT NULL,
  `pendidikan` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pendidikan`
--

INSERT INTO `tbl_pendidikan` (`id`, `pendidikan`, `created_at`, `updated_at`) VALUES
(1, 'S1', '2025-03-14 02:17:31', '2025-03-14 10:28:58'),
(2, 'SMP', '2025-03-14 02:17:31', '2025-03-14 02:17:31'),
(3, 'SMA', '2025-03-14 02:17:47', '2025-03-14 02:17:47'),
(4, 'D3', '2025-03-14 02:17:47', '2025-03-14 02:17:47'),
(5, 'SLTA', '2025-03-13 19:43:17', '2025-03-13 19:43:17'),
(6, 'S3', '2025-03-13 19:43:29', '2025-03-13 19:56:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penghasilan`
--

CREATE TABLE `tbl_penghasilan` (
  `id` int(11) NOT NULL,
  `penghasilan` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_penghasilan`
--

INSERT INTO `tbl_penghasilan` (`id`, `penghasilan`, `created_at`, `updated_at`) VALUES
(2, 'Lebih dari Rp.500.000', '2025-03-14 04:09:52', '2025-03-14 00:27:59'),
(4, 'Kurang dari Rp.500.000', '2025-03-14 09:51:53', '2025-03-14 09:51:53');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `email`, `password`, `foto`) VALUES
(1, 'atmin', 'atmin@gmail.com', 'atmin123', '1741980967_6c27b45a2182d05edc0f.png'),
(4, 'Antum', 'Antum@gmail.com', '$2y$10$nuRrYg8CXs7MzJlnbm3na.eoAWGpX0qI41RLVj0M/Ku8i2it7.vOG', '1741977650_dd869a9c3685e35052bf.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lampiran`
--
ALTER TABLE `lampiran`
  ADD PRIMARY KEY (`id_lampiran`);

--
-- Indexes for table `penghasilan`
--
ALTER TABLE `penghasilan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_agama`
--
ALTER TABLE `tbl_agama`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pekerjaan`
--
ALTER TABLE `tbl_pekerjaan`
  ADD PRIMARY KEY (`id_pekerjaan`);

--
-- Indexes for table `tbl_pendidikan`
--
ALTER TABLE `tbl_pendidikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_penghasilan`
--
ALTER TABLE `tbl_penghasilan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lampiran`
--
ALTER TABLE `lampiran`
  MODIFY `id_lampiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `penghasilan`
--
ALTER TABLE `penghasilan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_agama`
--
ALTER TABLE `tbl_agama`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_pekerjaan`
--
ALTER TABLE `tbl_pekerjaan`
  MODIFY `id_pekerjaan` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_pendidikan`
--
ALTER TABLE `tbl_pendidikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_penghasilan`
--
ALTER TABLE `tbl_penghasilan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
