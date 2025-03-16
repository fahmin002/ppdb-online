-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 16, 2025 at 05:21 PM
-- Server version: 10.11.8-MariaDB-0ubuntu0.24.04.1
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppdb-online`
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

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id_siswa` int(11) NOT NULL,
  `no_pendaftaran` varchar(20) DEFAULT NULL,
  `tgl_pendaftaran` date DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  `nisn` varchar(20) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `nama_panggilan` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenkel` enum('L','P') NOT NULL,
  `password` varchar(255) NOT NULL,
  `jalur_masuk` int(11) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `nik` varchar(16) DEFAULT NULL,
  `id_agama` int(11) DEFAULT NULL,
  `no_telepon` varchar(15) DEFAULT NULL,
  `tinggi` decimal(5,2) DEFAULT NULL,
  `berat` decimal(5,2) DEFAULT NULL,
  `jml_saudara` int(11) DEFAULT NULL,
  `anak_ke` int(11) DEFAULT NULL,
  `nik_ayah` varchar(16) DEFAULT NULL,
  `nama_ayah` varchar(100) DEFAULT NULL,
  `pendidikan_ayah` varchar(50) DEFAULT NULL,
  `pekerjaan_ayah` varchar(50) DEFAULT NULL,
  `penghasilan_ayah` decimal(10,2) DEFAULT NULL,
  `no_telepon_ayah` varchar(15) DEFAULT NULL,
  `nik_ibu` varchar(16) DEFAULT NULL,
  `nama_ibu` varchar(100) DEFAULT NULL,
  `pendidikan_ibu` varchar(50) DEFAULT NULL,
  `pekerjaan_ibu` varchar(50) DEFAULT NULL,
  `penghasilan_ibu` decimal(10,2) DEFAULT NULL,
  `no_telepon_ibu` varchar(15) DEFAULT NULL,
  `id_provinsi` int(11) DEFAULT NULL,
  `id_kabupaten` int(11) DEFAULT NULL,
  `id_kecamatan` int(11) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `nama_sekolah_asal` varchar(100) DEFAULT NULL,
  `tahun_lulus` year(4) DEFAULT NULL,
  `no_ijazah` varchar(50) DEFAULT NULL,
  `no_skhun` varchar(50) DEFAULT NULL,
  `status_pendaftaran` enum('baru','diterima','ditolak') DEFAULT NULL,
  `status_ppdb` enum('pending','verified','rejected') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_siswa`, `no_pendaftaran`, `tgl_pendaftaran`, `tahun`, `nisn`, `nama_lengkap`, `nama_panggilan`, `tempat_lahir`, `tgl_lahir`, `jenkel`, `password`, `jalur_masuk`, `foto`, `nik`, `id_agama`, `no_telepon`, `tinggi`, `berat`, `jml_saudara`, `anak_ke`, `nik_ayah`, `nama_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `penghasilan_ayah`, `no_telepon_ayah`, `nik_ibu`, `nama_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `penghasilan_ibu`, `no_telepon_ibu`, `id_provinsi`, `id_kabupaten`, `id_kecamatan`, `alamat`, `nama_sekolah_asal`, `tahun_lulus`, `no_ijazah`, `no_skhun`, `status_pendaftaran`, `status_ppdb`) VALUES
(16, NULL, NULL, NULL, '78836413741', 'Fahmi Nabil', 'fahminbl', 'Jakarta', '0000-00-00', 'P', '123', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'PPDB20250316165759', '2025-03-16', '2025', '8927891628712', 'Agus', 'egus', 'Kebumen', '0000-00-00', 'P', '123', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD UNIQUE KEY `nsin` (`nisn`),
  ADD UNIQUE KEY `no_pendaftaran` (`no_pendaftaran`),
  ADD UNIQUE KEY `nik` (`nik`);

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

--
-- AUTO_INCREMENT for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
