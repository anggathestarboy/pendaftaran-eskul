-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 03, 2025 at 01:29 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `upk`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id_admin` int NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id_admin`, `username`, `password`, `nama`) VALUES
(1, 'admin', 'aksata', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `eskul`
--

CREATE TABLE `eskul` (
  `id_eskul` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nama_eskul` varchar(100) NOT NULL,
  `hari` varchar(50) NOT NULL,
  `jam` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `eskul`
--

INSERT INTO `eskul` (`id_eskul`, `nama_eskul`, `hari`, `jam`) VALUES
('E001', 'ECC', 'Jum\'at', '13:00:00'),
('E002', 'Futsal', 'Senin', '16:00:00'),
('E003', 'Basket', 'Senin', '16:00:00'),
('E004', 'Silat', 'Selasa', '15:30:00'),
('E005', 'Catur', 'Sabtu', '09:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id_pendaftaran` int NOT NULL,
  `nisn` varchar(16) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `kelas` varchar(100) NOT NULL,
  `id_eskul` varchar(100) NOT NULL,
  `tgl_pendaftaran` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id_pendaftaran`, `nisn`, `nama_siswa`, `kelas`, `id_eskul`, `tgl_pendaftaran`) VALUES
(1, '1234567890123456', 'Anggara', 'X RPL 1', 'E001', '2025-06-01 10:33:19'),
(2, '1234567890123456', 'Anggara', 'X RPL 1', 'E002', '2025-06-01 14:23:29'),
(6, '987654321098766', 'Jauharil Fathoni', 'X RPL 1', 'E005', '2025-06-03 13:21:28'),
(7, '9875610267182456', 'Afreza Rochmad Pratama', 'X RPL 1', 'E004', '2025-06-03 13:22:43'),
(8, '0823271890156163', 'Dita Ayu', 'X RPL 1', 'E003', '2025-06-03 13:23:22'),
(9, '002371649183567', 'Rohmatul Umma', 'X RPL 1', 'E002', '2025-06-03 13:23:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `eskul`
--
ALTER TABLE `eskul`
  ADD PRIMARY KEY (`id_eskul`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`),
  ADD KEY `id_eskul` (`id_eskul`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id_pendaftaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `pendaftaran_ibfk_1` FOREIGN KEY (`id_eskul`) REFERENCES `eskul` (`id_eskul`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
