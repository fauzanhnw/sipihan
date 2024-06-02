-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2023 at 02:39 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipihan`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kode_barang` varchar(30) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `lokasi` varchar(30) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `stok` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kode_barang`, `nama_barang`, `lokasi`, `foto`, `stok`) VALUES
('brg02', 'SD Card 64 GB', 'TA 11.4', 'SDcard64gb.jpg', 10),
('brg04', 'Clip On', 'RTF 3.2', 'CLIPON.jpg', 8),
('brg05', 'LAN to USB', 'TA 11.4', 'usbtolan.jpg', 10),
('brg06', 'Mic dan Stand', 'RTF 4.4', 'MIC+STAND.jpg', 10),
('brg07', 'Meja Lipat', 'RTF 4.4', 'mejalipat.jpg', 12),
('brg08', 'Kursi Beroda', 'RTF 4.4', 'KURSIBERRODA.jpg', 10);

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `no_form` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `kelas` varchar(30) NOT NULL,
  `jumlah` int(50) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `kode_barang` varchar(30) NOT NULL,
  `hari` varchar(30) NOT NULL,
  `tanggal_peminjaman` date NOT NULL,
  `status_pengajuan` enum('Pending','Terima','Tolak','Sudah Dikembalikan') CHARACTER SET utf8mb4 COLLATE utf8mb4_estonian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengajuan`
--

INSERT INTO `pengajuan` (`no_form`, `username`, `nama`, `kelas`, `jumlah`, `keterangan`, `kode_barang`, `hari`, `tanggal_peminjaman`, `status_pengajuan`) VALUES
(88, '4342201046', 'Fauzan Hidayat', 'TRPL 1B PAGI', 2, 'Tugas', 'brg04', 'Rabu', '2023-01-11', 'Tolak');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nim` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `kelas` varchar(30) NOT NULL,
  `level` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `nim`, `nama`, `kelas`, `level`) VALUES
('4342201043', '4342201043', '4342201043', 'Zahra Zen Marbun', 'TRPL 1B PAGI', 'mahasiswa'),
('4342201044', '4342201044', '4342201044', 'Hifzah', ' TRPL 1B', 'mahasiswa'),
('4342201045', '123', '4342201045', 'Alfaturrahman', 'TRPL 1B', 'mahasiswa'),
('4342201046', '4342201046', '4342201046', 'Fauzan Hidayat', 'TRPL 1B PAGI', 'mahasiswa'),
('4342201047', '4342201047', '4342201047', 'Neha Nabillah Putri Hasibuan', 'TRPL 1B PAGI', 'mahasiswa'),
('4342201048', '4342201048', '4342201048', 'Ravi Syael', 'TRPL 1B', 'mahasiswa'),
('admin', 'admin', '', '', '', 'laboran'),
('user', 'user', '', '', '', 'mahasiswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`no_form`),
  ADD KEY `kode_barang` (`kode_barang`),
  ADD KEY `kelas` (`kelas`),
  ADD KEY `username` (`username`,`kelas`),
  ADD KEY `nama` (`nama`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`),
  ADD KEY `nama` (`nama`),
  ADD KEY `kelas` (`kelas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `no_form` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD CONSTRAINT `pengajuan_ibfk_2` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`kode_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengajuan_ibfk_4` FOREIGN KEY (`username`) REFERENCES `user` (`username`),
  ADD CONSTRAINT `pengajuan_ibfk_5` FOREIGN KEY (`nama`) REFERENCES `user` (`nama`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
