-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 23, 2024 at 03:03 PM
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
  `pendidikan` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `hp` varchar(15) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id`, `nip`, `username`, `password`, `role`, `pendidikan`, `alamat`, `hp`, `tanggal_lahir`) VALUES
(1, 'Admin', 'admin', '12345', 1, NULL, NULL, NULL, NULL),
(2, '123456700', 'kepsek', '12345', 2, 'S2', 'Depok', '082111111111', '1980-03-11'),
(3, '1234567801', 'guru', '12345', 3, 'S1', 'Meruya Selatan', '081111111111', '1990-09-01'),
(4, '1234567802', 'joko', '12345', 3, 'S1', 'Kramat Raya', '082212121212', '1993-12-13'),
(5, '1234567803', 'Yolanda Astuti', '12345', 3, 'S1', 'Tanah Abang', '081919111111', '1993-11-10'),
(6, '1234567804', 'Rizki Firdaus', '12345', 3, 'S1', 'Menteng', '081987679765', '1991-02-12');

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
(1, 1, '2024-06-19', 'Hadir'),
(2, 2, '2024-06-19', 'Izin'),
(3, 3, '2024-06-19', 'Sakit'),
(4, 4, '2024-06-19', 'Tanpa Keterangan'),
(6, 3, '2024-06-21', 'Hadir'),
(7, 4, '2024-06-21', 'Hadir'),
(9, 5, '2024-06-21', 'Hadir'),
(10, 5, '2024-06-23', 'Izin'),
(11, 3, '2024-06-23', 'Hadir'),
(12, 4, '2024-06-23', 'Sakit');

-- --------------------------------------------------------

--
-- Table structure for table `pelaporan`
--

CREATE TABLE `pelaporan` (
  `pelaporan_id` int(11) NOT NULL,
  `guru_id` int(11) NOT NULL,
  `periode_laporan` date NOT NULL,
  `penilaian` varchar(30) NOT NULL,
  `deskripsi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pelaporan`
--

INSERT INTO `pelaporan` (`pelaporan_id`, `guru_id`, `periode_laporan`, `penilaian`, `deskripsi`) VALUES
(1, 3, '2024-06-19', 'Baik', 'Bagus'),
(2, 4, '2024-06-19', 'Baik', 'Tingkatkan');

-- --------------------------------------------------------

--
-- Table structure for table `pembelajaran`
--

CREATE TABLE `pembelajaran` (
  `pembelajaran_id` varchar(15) NOT NULL,
  `mapel` varchar(50) NOT NULL,
  `jam_pelajaran` varchar(11) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pembelajaran`
--

INSERT INTO `pembelajaran` (`pembelajaran_id`, `mapel`, `jam_pelajaran`, `deskripsi`) VALUES
('MPSJH2', 'Sejarah', '08:15', 'Belajar Sejarah Indonesia Lanjutan'),
('MPTK01', 'Matematika', '10:15', 'Matematika');

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
  ADD PRIMARY KEY (`kehadiran_id`);

--
-- Indexes for table `pelaporan`
--
ALTER TABLE `pelaporan`
  ADD PRIMARY KEY (`pelaporan_id`);

--
-- Indexes for table `pembelajaran`
--
ALTER TABLE `pembelajaran`
  ADD PRIMARY KEY (`pembelajaran_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kehadiran`
--
ALTER TABLE `kehadiran`
  MODIFY `kehadiran_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pelaporan`
--
ALTER TABLE `pelaporan`
  MODIFY `pelaporan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
