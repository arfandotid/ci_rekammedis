-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 10, 2019 at 02:23 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rekam_medis`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `nip` char(16) NOT NULL,
  `namaDokter` varchar(128) NOT NULL,
  `spesialis` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `noTelp` varchar(20) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`nip`, `namaDokter`, `spesialis`, `email`, `noTelp`, `alamat`) VALUES
('1231', 'Asyiel', 'Kesehatans', 'asyil@admin.coma', '01823712832', 'Pintu Ledengs');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `idObat` int(11) NOT NULL,
  `namaObat` varchar(128) NOT NULL,
  `harga` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`idObat`, `namaObat`, `harga`, `keterangan`) VALUES
(1, 'Mixaghrip', 2500, 'Obat serba guna'),
(3, 'Panadol', 1000, 'Obat Pusing Kepala');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `idPasien` int(11) NOT NULL,
  `namaPasien` varchar(128) NOT NULL,
  `jenisKelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `email` varchar(128) NOT NULL,
  `noTelp` varchar(20) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`idPasien`, `namaPasien`, `jenisKelamin`, `email`, `noTelp`, `alamat`) VALUES
(1, 'Jenal', 'Laki-laki', 'jenal@gmail.com', '08197236817', 'Ciampea'),
(3, 'Ikri', 'Laki-laki', 'ikri@gmail.com', '081927311231', 'Pancasan Timur'),
(4, 'Ikbal', 'Laki-laki', 'ikbal@gmail.com', '0182837123123', 'Warung Borong');

-- --------------------------------------------------------

--
-- Table structure for table `poliklinik`
--

CREATE TABLE `poliklinik` (
  `idPoliklinik` int(11) NOT NULL,
  `namaPoliklinik` varchar(128) NOT NULL,
  `gedung` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `poliklinik`
--

INSERT INTO `poliklinik` (`idPoliklinik`, `namaPoliklinik`, `gedung`) VALUES
(2, 'Mawar', 'baru'),
(3, 'Melati', 'Gedung 1'),
(4, 'Dahlia', 'Lama');

-- --------------------------------------------------------

--
-- Table structure for table `rekam_medis`
--

CREATE TABLE `rekam_medis` (
  `idRekamMedis` char(15) NOT NULL,
  `pasienId` int(11) NOT NULL,
  `dokterNip` char(16) NOT NULL,
  `poliklinikId` int(11) NOT NULL,
  `keluhan` text NOT NULL,
  `diagnosa` text NOT NULL,
  `tglPeriksa` date NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rekam_medis`
--

INSERT INTO `rekam_medis` (`idRekamMedis`, `pasienId`, `dokterNip`, `poliklinikId`, `keluhan`, `diagnosa`, `tglPeriksa`, `userId`) VALUES
('RM19120600001', 4, '1231', 3, 'zxa', 'asda', '2019-12-06', 4);

-- --------------------------------------------------------

--
-- Table structure for table `rm_obat`
--

CREATE TABLE `rm_obat` (
  `idRekamMedis` char(15) NOT NULL,
  `idObat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rm_obat`
--

INSERT INTO `rm_obat` (`idRekamMedis`, `idObat`) VALUES
('RM19120600001', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `fullName` varchar(128) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role` tinyint(4) NOT NULL,
  `active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`idUser`, `fullName`, `username`, `password`, `role`, `active`) VALUES
(1, 'Super Admin', 'admin', '$2y$10$jdB.GCHaKG1VLIn01RUhaeNZ7M/J9V4af9jwy9iKDytYTgdJkdrs6', 1, 1),
(4, 'Arfan', 'arfan', '$2y$10$uIJJAiZ3eFhKOYoLxJ9wEeF26UjJNPuEJGXgLQf.uzyfLjanDUify', 2, 1),
(5, 'Dobleh', 'dobleh', '$2y$10$v14nXZ8Pop5N6Ia0lw3use0TtN/FRCquBOoivmh41aWHpXfRHf2Fe', 2, 1),
(6, 'Jamal', 'jamal', '$2y$10$5MT8mlGxNT3MTDZXyDFS1u9AW7dqLxYkkVyDBEumJzJvaQmjLY6nq', 1, 0),
(7, 'Kabur', 'kabur', '$2y$10$ht5DQXFcgNJNtEL3cAryieqcRa78VlMJZbqgTnV2lGWFYHJtxkGDq', 2, 1),
(8, 'Arif', 'arif', '$2y$10$BPPtML/Irn2S/SpbkwfDHeToo1hu9VirjoCPn0AQZZWTSm0KsNiVm', 2, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`idObat`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`idPasien`);

--
-- Indexes for table `poliklinik`
--
ALTER TABLE `poliklinik`
  ADD PRIMARY KEY (`idPoliklinik`);

--
-- Indexes for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD PRIMARY KEY (`idRekamMedis`),
  ADD KEY `userId` (`userId`),
  ADD KEY `pasienId` (`pasienId`,`dokterNip`,`poliklinikId`),
  ADD KEY `rekam_medis_ibfk_2` (`dokterNip`),
  ADD KEY `rekam_medis_ibfk_3` (`poliklinikId`);

--
-- Indexes for table `rm_obat`
--
ALTER TABLE `rm_obat`
  ADD KEY `idRekamMedis` (`idRekamMedis`),
  ADD KEY `rm_obat_ibfk_2` (`idObat`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `idObat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `idPasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `poliklinik`
--
ALTER TABLE `poliklinik`
  MODIFY `idPoliklinik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD CONSTRAINT `rekam_medis_ibfk_1` FOREIGN KEY (`pasienId`) REFERENCES `pasien` (`idPasien`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rekam_medis_ibfk_2` FOREIGN KEY (`dokterNip`) REFERENCES `dokter` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rekam_medis_ibfk_3` FOREIGN KEY (`poliklinikId`) REFERENCES `poliklinik` (`idPoliklinik`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rekam_medis_ibfk_4` FOREIGN KEY (`userId`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rm_obat`
--
ALTER TABLE `rm_obat`
  ADD CONSTRAINT `rm_obat_ibfk_1` FOREIGN KEY (`idRekamMedis`) REFERENCES `rekam_medis` (`idRekamMedis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rm_obat_ibfk_2` FOREIGN KEY (`idObat`) REFERENCES `obat` (`idObat`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
