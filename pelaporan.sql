-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 14, 2024 at 06:37 AM
-- Server version: 5.7.39
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pelaporan`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id` int(11) NOT NULL,
  `nip` varchar(11) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` int(1) NOT NULL COMMENT '1 = admin,\r\n2 = kepsek,\r\n3 = guru',
  `jenis_kelamin` varchar(20) DEFAULT NULL,
  `pendidikan` varchar(50) DEFAULT NULL,
  `mapel` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id`, `nip`, `username`, `password`, `role`, `jenis_kelamin`, `pendidikan`, `mapel`, `tanggal_lahir`) VALUES
(1, 'Admin', 'admin', '12345', 1, '', NULL, NULL, NULL),
(2, '123456700', 'kepsek', '12345', 2, '', 'S2', 'null', '1980-03-11'),
(5, '1234567803', 'Yolanda', '12345', 3, 'Wanita', 'S1', 'PPKN', '1993-11-10'),
(6, '1234567804', 'Rizki', '12345', 3, 'Laki-Laki', 'S1', 'Matematika', '1991-02-12'),
(9, '123456789', 'Budi', '12345', 3, 'Laki-Laki', 'S1', 'Penjaskes', '1992-11-13'),
(10, '123456788', 'Joko', '12345', 3, 'Laki-Laki', 'S1', 'Sejarah', '1990-07-13'),
(11, '123456789', 'Widya', '12345', 3, 'Wanita', 'S1', 'Biologi', '1994-02-06'),
(12, '123456789', 'Mila', '12345', 3, 'Wanita', 'S1', 'Sosiologi', '1991-01-31'),
(13, '123456789', 'Surya', '12345', 3, 'Laki-Laki', 'S1', 'Ekonomi', '1992-12-02'),
(14, '123456789', 'Donal', '12345', 3, 'Laki-Laki', 'S1', 'Geografi', '1992-05-27'),
(15, '123456789', 'Evariani', '12345', 3, 'Wanita', 'S1', 'Bahasa Inggris', '1989-09-18'),
(16, '123456789', 'Azizah', '12345', 3, 'Wanita', 'S1', 'Bahasa Indonesia', '1990-07-20'),
(17, '123456789', 'Nuraini', '12345', 3, 'Wanita', 'S1', 'Agama', '1990-12-25'),
(18, '123456789', 'Viola', '12345', 3, 'Wanita', 'S1', 'Kimia', '1992-11-04');

-- --------------------------------------------------------

--
-- Table structure for table `kehadiran`
--

CREATE TABLE `kehadiran` (
  `kehadiran_id` int(11) NOT NULL,
  `guru_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kehadiran`
--

INSERT INTO `kehadiran` (`kehadiran_id`, `guru_id`, `tanggal`, `status`) VALUES
(18, 10, '2024-07-13', 'Hadir'),
(19, 6, '2024-07-13', 'Hadir'),
(20, 9, '2024-07-13', 'Hadir'),
(21, 5, '2024-07-13', 'Hadir'),
(22, 11, '2024-07-13', 'Hadir'),
(23, 12, '2024-07-13', 'Hadir'),
(24, 18, '2024-07-13', 'Hadir'),
(25, 13, '2024-07-13', 'Hadir'),
(26, 14, '2024-07-13', 'Hadir'),
(27, 17, '2024-07-13', 'Hadir'),
(28, 15, '2024-07-13', 'Hadir'),
(29, 16, '2024-07-13', 'Hadir'),
(35, 23, '2024-07-13', 'Sakit'),
(36, 24, '2024-07-13', 'Hadir'),
(37, 10, '2024-07-14', 'Hadir');

-- --------------------------------------------------------

--
-- Table structure for table `pelaporan`
--

CREATE TABLE `pelaporan` (
  `pelaporan_id` int(11) NOT NULL,
  `guru_id` int(11) NOT NULL,
  `pelajaran_id` int(11) NOT NULL,
  `periode_laporan` date NOT NULL,
  `descripsion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pelaporan`
--

INSERT INTO `pelaporan` (`pelaporan_id`, `guru_id`, `pelajaran_id`, `periode_laporan`, `descripsion`) VALUES
(29, 6, 14, '2024-07-14', 'Baik');

-- --------------------------------------------------------

--
-- Table structure for table `pembelajaran`
--

CREATE TABLE `pembelajaran` (
  `id_pembelajaran` int(11) NOT NULL,
  `pembelajaran_id` varchar(15) NOT NULL,
  `mapel` varchar(50) NOT NULL,
  `jam_pelajaran` varchar(11) DEFAULT NULL,
  `hari` varchar(20) DEFAULT NULL,
  `deskripsi` text,
  `guru_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pembelajaran`
--

INSERT INTO `pembelajaran` (`id_pembelajaran`, `pembelajaran_id`, `mapel`, `jam_pelajaran`, `hari`, `deskripsi`, `guru_id`) VALUES
(8, 'MPSJH2', 'Sejarah', '08:15', 'Selasa', 'Belajar Sejarah Indonesia kelas X', 4),
(9, 'MPSJH2', 'Sejarah', '11:15', 'Senin', 'Belajar Sejarah Indonesia kelas XI', 4),
(11, 'MPSPKN', 'PPKN', '08:15', 'Selasa', 'Belajar PPKN kelas X', 5),
(12, 'MPSPKN', 'PPKN', '13:15', 'Selasa', 'Belajar PPKN kelas XI', 5),
(13, 'MPSPKN', 'PPKN', '11:15', 'Kamis', 'Belajar PPKN kelas XII', 5),
(14, 'MPSMTK', 'Matematika', '08:15', 'Kamis', 'Belajar Matematika kelas X', 6),
(15, 'MPSMTK', 'Matematika', '11:15', 'Selasa', 'Belajar Matematika kelas XI', 6),
(16, 'MPSMTK', 'Matematika', '13:15', 'Senin', 'Belajar Matematika kelas XII', 6),
(19, 'MPSSJR', 'Sejarah', '08:15', 'Rabu', 'Belajar Sejarah Indonesia kelas X', 10),
(20, 'MPSSJR', 'Sejarah', '11:15', 'Selasa', 'Belajar Sejarah Indonesia kelas XI', 10),
(21, 'MPSSJR', 'Sejarah', '13:15', 'Rabu', 'Belajar Sejarah Indonesia kelas XII', 10),
(22, 'MPSPJS', 'Penjaskes', '08:15', 'Selasa', 'Belajar Penjaskes kelas X', 9),
(23, 'MPSPJS', 'Penjaskes', '10:15', 'Selasa', 'Belajar Penjaskes kelas XI', 9),
(24, 'MPSPJS', 'Penjaskes', '13:15', 'Kamis', 'Belajar Penjaskes kelas XII', 9),
(25, 'MPSBIO', 'Biologi', '10:15', 'Senin', 'Belajar Biologi kelas X', 11),
(26, 'MPSBIO', 'Biologi', '13:15', 'Senin', 'Belajar Biologi kelas XI', 11),
(27, 'MPSBIO', 'Biologi', '13:15', 'Rabu', 'Belajar Biologi kelas XI', 11),
(28, 'MPSSOS', 'Sosiologi', '10:15', 'Kamis', 'Belajar Sosiologi kelas X', 12),
(29, 'MPSSOS', 'Sosiologi', '14:14', 'Selasa', 'Belajar Sosiologi kelas XI', 12),
(30, 'MPSSOS', 'Sosiologi', '14:15', 'Kamis', 'Belajar Sosiologi kelas XII', 12),
(31, 'MPSKMA', 'Kimia', '08:15', 'Selasa', 'Belajar Kimia kelas X', 18),
(32, 'MPSKMA', 'Kimia', '11:15', 'Kamis', 'Belajar Kimia kelas XI', 18),
(33, 'MPSKMA', 'Kimia', '10:15', 'Selasa', 'Belajar Kimia kelas XII', 18);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD PRIMARY KEY (`kehadiran_id`),
  ADD KEY `guru_id` (`guru_id`);

--
-- Indexes for table `pelaporan`
--
ALTER TABLE `pelaporan`
  ADD PRIMARY KEY (`pelaporan_id`),
  ADD KEY `pelajaran_id` (`pelajaran_id`),
  ADD KEY `pelaporan_ibfk_1` (`guru_id`);

--
-- Indexes for table `pembelajaran`
--
ALTER TABLE `pembelajaran`
  ADD PRIMARY KEY (`id_pembelajaran`),
  ADD KEY `pembelajaran_ibfk_1` (`guru_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `kehadiran`
--
ALTER TABLE `kehadiran`
  MODIFY `kehadiran_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `pelaporan`
--
ALTER TABLE `pelaporan`
  MODIFY `pelaporan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `pembelajaran`
--
ALTER TABLE `pembelajaran`
  MODIFY `id_pembelajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
