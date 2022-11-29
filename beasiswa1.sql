-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2022 at 01:02 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beasiswa1`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kriteria`
--

CREATE TABLE `tbl_kriteria` (
  `id_kriteria` int(8) NOT NULL,
  `nama_kriteria` varchar(50) NOT NULL,
  `bobot_kriteria` int(4) NOT NULL,
  `jenis_kriteria` varchar(8) NOT NULL,
  `tgl_ubah` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kriteria`
--

INSERT INTO `tbl_kriteria` (`id_kriteria`, `nama_kriteria`, `bobot_kriteria`, `jenis_kriteria`, `tgl_ubah`) VALUES
(1, 'Rata-rata Rapot Murid Semester Sebelumnya (RRMSS)', 20, 'Benefit', '2021-04-01 05:44:53'),
(2, 'Status Anak Dalam Keluarga (SADK)', 20, 'Cost', '2021-04-23 18:18:14'),
(3, 'Penghasilan Wali (PW)', 15, 'Cost', '2021-04-23 18:18:35'),
(4, 'Tanggungan Wali (TW)', 15, 'Benefit', '2021-04-23 18:18:40'),
(5, 'Keaktifan Kegiatan Ekstrakulikuler (KKE)', 10, 'Benefit', '2021-04-23 18:18:55');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_parameter`
--

CREATE TABLE `tbl_parameter` (
  `id_kriteria` int(8) NOT NULL,
  `id_parameter` int(8) NOT NULL,
  `nilai_parameter` int(10) NOT NULL,
  `nama_parameter` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_parameter`
--

INSERT INTO `tbl_parameter` (`id_kriteria`, `id_parameter`, `nilai_parameter`, `nama_parameter`) VALUES
(1, 1, 1, '0-25 '),
(1, 2, 2, '26-50 '),
(1, 3, 3, '51-75 '),
(1, 4, 4, '76-100 '),
(2, 5, 1, 'Yatim Piatu'),
(2, 6, 2, 'Yatim'),
(2, 7, 3, 'Piatu'),
(2, 8, 4, 'Ortu Lengkap'),
(3, 9, 1, '< 1 Juta'),
(3, 10, 2, '1 Juta s/d 2 Juta'),
(3, 11, 3, '2 Juta s/d 3 Juta'),
(3, 12, 4, 'Lebih dari 3 juta'),
(4, 13, 1, '1 s/d 2 orang'),
(4, 14, 2, '3 s/d 4 orang'),
(4, 15, 3, '5 s/d 6 orang'),
(4, 16, 4, 'Lebih dari 6 orang'),
(5, 17, 1, 'Kurang Aktif'),
(5, 18, 2, 'Cukup Aktif'),
(5, 19, 3, 'Aktif'),
(5, 20, 4, 'Sangat Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penilaian`
--

CREATE TABLE `tbl_penilaian` (
  `nisn` int(15) NOT NULL,
  `id_kriteria` int(8) NOT NULL,
  `nilai_normalisasi` float(10,4) DEFAULT NULL,
  `nilai_kriteria` int(20) NOT NULL,
  `periode` char(4) DEFAULT NULL,
  `nilai_v` float(10,4) DEFAULT NULL,
  `status_penilaian` varchar(15) DEFAULT NULL,
  `tgl_daftar` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_peserta`
--

CREATE TABLE `tbl_peserta` (
  `nisn` int(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `nama_wali` varchar(50) DEFAULT NULL,
  `gaji` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_peserta`
--

INSERT INTO `tbl_peserta` (`nisn`, `nama`, `kelas`, `nama_wali`, `gaji`) VALUES
(28732506, 'Wildan Maulana Akbar AlFaqih', '10', 'Siti Zunairoh', '900000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `tbl_parameter`
--
ALTER TABLE `tbl_parameter`
  ADD PRIMARY KEY (`id_parameter`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indexes for table `tbl_penilaian`
--
ALTER TABLE `tbl_penilaian`
  ADD KEY `id_penduduk` (`nisn`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indexes for table `tbl_peserta`
--
ALTER TABLE `tbl_peserta`
  ADD PRIMARY KEY (`nisn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  MODIFY `id_kriteria` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_parameter`
--
ALTER TABLE `tbl_parameter`
  MODIFY `id_parameter` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_parameter`
--
ALTER TABLE `tbl_parameter`
  ADD CONSTRAINT `tbl_parameter_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `tbl_kriteria` (`id_kriteria`);

--
-- Constraints for table `tbl_penilaian`
--
ALTER TABLE `tbl_penilaian`
  ADD CONSTRAINT `tbl_penilaian_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `tbl_kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_penilaian_ibfk_2` FOREIGN KEY (`nisn`) REFERENCES `tbl_peserta` (`nisn`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
