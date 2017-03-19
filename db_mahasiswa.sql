-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 19, 2017 at 05:17 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mahasiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `nim` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `fakultas` varchar(20) NOT NULL,
  `program_studi` varchar(20) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `tanggal_lulus` date NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `kota` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `warga_negara` varchar(15) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `agama` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`nim`, `nama`, `fakultas`, `program_studi`, `tanggal_masuk`, `tanggal_lulus`, `alamat`, `kota`, `tanggal_lahir`, `email`, `no_telp`, `warga_negara`, `gender`, `agama`) VALUES
('11111111111111', 'sdf', 'DSA', 'adf', '2017-12-12', '0000-00-00', 'adfad', 'fadsf', '0000-00-00', 'dS@gmail.bok', '13241342', 'dsf', 'kj', 'klj;'),
('24010314120001', 'Atom', 'FSM', 'Informatika', '2017-01-18', '2019-04-19', 'Gondang barat 1 no 26 Tembalang Semarang', 'Purbalingga', '1996-02-01', 'coba@gmail.com', '028308333', 'Indonesia', 'PRIA', 'ISLAM');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nip` varchar(18) NOT NULL,
  `nama_dosen` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `topik` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `id_wali` varchar(10) NOT NULL,
  `idlab` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nip`, `nama_dosen`, `alamat`, `no_telp`, `topik`, `password`, `email`, `id_wali`, `idlab`) VALUES
('240103141200022221', 'dosen2', 'banyumanik', '111111', 'bio-energi', 'b77d7d2c9241775b5d3eed6016278199', 'dosen2@gmail.com', '001', '1'),
('240103141200022222', 'dosen1', 'ngaliyan', '0000000', 'organik', 'dosen1', 'dosen1', '002', '2');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `idpetugas` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`idpetugas`, `nama`, `email`, `password`) VALUES
(1, 'Garfianto Dwi', 'garfianto@if.undip.ac.id', 'b77d7d2c9241775b5d3eed6016278199'),
(2, 'Yasmin', 'yasmin9658@gmail.com', 'b77d7d2c9241775b5d3eed6016278199'),
(3, 'GarfiantoDwi', 'fian10@gmail.com', '19fe0f42e8391ff2a6665dcb24669bbc');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`idpetugas`),
  ADD UNIQUE KEY `idpetugas` (`idpetugas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `idpetugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
