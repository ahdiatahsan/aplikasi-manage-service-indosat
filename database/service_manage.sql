-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 28 Des 2019 pada 22.24
-- Versi Server: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `service_manage`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_bln`
--

CREATE TABLE `laporan_bln` (
  `id_data` int(8) NOT NULL,
  `user_post` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_datang` varchar(5) NOT NULL,
  `jam_plng` varchar(5) NOT NULL,
  `k_l` varchar(1) NOT NULL,
  `tidak_hadir` varchar(10) NOT NULL,
  `nama_site` varchar(50) NOT NULL,
  `desk_kerja` varchar(50) NOT NULL,
  `jam_mulai` varchar(5) NOT NULL,
  `jam_selesai` varchar(5) NOT NULL,
  `_prev` varchar(1) DEFAULT NULL,
  `_cur` varchar(1) DEFAULT NULL,
  `_admn` varchar(1) DEFAULT NULL,
  `_monitor` varchar(1) DEFAULT NULL,
  `_pdinas` varchar(1) DEFAULT NULL,
  `_lmbr` varchar(1) DEFAULT NULL,
  `lembur_mulai` varchar(5) DEFAULT NULL,
  `lembur_selesai` varchar(5) DEFAULT NULL,
  `nama_site2` varchar(50) DEFAULT NULL,
  `desk_lembur` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `laporan_bln`
--

INSERT INTO `laporan_bln` (`id_data`, `user_post`, `tanggal`, `jam_datang`, `jam_plng`, `k_l`, `tidak_hadir`, `nama_site`, `desk_kerja`, `jam_mulai`, `jam_selesai`, `_prev`, `_cur`, `_admn`, `_monitor`, `_pdinas`, `_lmbr`, `lembur_mulai`, `lembur_selesai`, `nama_site2`, `desk_lembur`) VALUES
(2, 'Ahdiat Ahsan', '2017-10-04', '08:00', '19:00', 'K', ' ', 'Palu', 'Standby', '08:00', '19:00', '', '', '', '', '', '', '', '', '', ''),
(3, 'Ahdiat Ahsan', '2017-10-12', '08:00', '19:00', 'K', ' ', 'Palu', 'Standby', '08:00', '19:00', '', '', '', '', '', '', '', '', '', ''),
(4, 'Ahdiat', '2017-10-07', '08:00', '16:00', 'K', '', 'Palu', 'Standby', '08:00', '16:00', '', '', '', '', '', '', '', '', '', ''),
(5, 'Khaliq Akkas', '2017-10-01', '08:00', '17:00', 'K', '', 'BSC Palu', 'Maintanance', '08:00', '17:00', '1', '', '', '', '', '', '', '', '', ''),
(6, 'Khaliq Akkas', '2017-10-02', '08:00', '17:00', 'K', ' ', 'Masomba', 'Troubleshooting', '08:00', '17:00', '', '1', '', '', '', '', '', '', '', ''),
(8, 'Ahdiat Ahsan', '2017-10-04', '08:00', '19:00', 'K', ' ', 'Palu', 'Standby', '08:00', '19:00', '', '', '', '', '', '', '', '', '', ''),
(9, 'Ahdiat Ahsan', '2017-10-12', '08:00', '19:00', 'K', ' ', 'Palu', 'Standby', '08:00', '19:00', '', '', '', '', '', '', '', '', '', ''),
(11, 'Ahdiat Ahsan', '2017-10-04', '08:00', '19:00', 'K', ' ', 'Palu', 'Standby', '08:00', '19:00', '', '', '', '', '', '', '', '', '', ''),
(12, 'Ahdiat Ahsan', '2017-10-12', '08:00', '19:00', 'K', ' ', 'Palu', 'Standby', '08:00', '19:00', '', '', '', '', '', '', '', '', '', ''),
(14, 'Ahdiat Ahsan', '2017-10-04', '08:00', '19:00', 'K', ' ', 'Palu', 'Standby', '08:00', '19:00', '', '', '', '', '', '', '', '', '', ''),
(15, 'Ahdiat Ahsan', '2017-10-12', '08:00', '19:00', 'K', ' ', 'Palu', 'Standby', '08:00', '19:00', '', '', '', '', '', '', '', '', '', ''),
(17, 'Ahdiat Ahsan', '2017-10-04', '08:00', '19:00', 'K', ' ', 'Palu', 'Standby', '08:00', '19:00', '', '', '', '', '', '', '', '', '', ''),
(18, 'Ahdiat Ahsan', '2017-10-12', '08:00', '19:00', 'K', ' ', 'Palu', 'Standby', '08:00', '19:00', '', '', '', '', '', '', '', '', '', ''),
(20, 'Ahdiat Ahsan', '2017-10-04', '08:00', '19:00', 'K', ' ', 'Palu', 'Standby', '08:00', '19:00', '', '', '', '', '', '', '', '', '', ''),
(21, 'Ahdiat Ahsan', '2017-10-12', '08:00', '19:00', 'K', ' ', 'Palu', 'Standby', '08:00', '19:00', '', '', '', '', '', '', '', '', '', ''),
(22, 'Ahdiat Ahsan', '2017-10-04', '08:00', '19:00', 'K', ' ', 'Palu', 'Standby', '08:00', '19:00', '', '', '', '', '', '', '', '', '', ''),
(23, 'Ahdiat Ahsan', '2017-10-12', '08:00', '19:00', 'K', ' ', 'Palu', 'Standby', '08:00', '19:00', '', '', '', '', '', '', '', '', '', ''),
(24, 'Ahdiat Ahsan', '2017-10-04', '08:00', '19:00', 'K', ' ', 'Palu', 'Standby', '08:00', '19:00', '', '', '', '', '', '', '', '', '', ''),
(25, 'Ahdiat Ahsan', '2017-10-12', '08:00', '19:00', 'K', ' ', 'Palu', 'Standby', '08:00', '19:00', '', '', '', '', '', '', '', '', '', ''),
(26, 'Ahdiat Ahsan', '2017-10-04', '08:00', '19:00', 'K', ' ', 'Palu', 'Standby', '08:00', '19:00', '', '', '', '', '', '', '', '', '', ''),
(27, 'Ahdiat Ahsan', '2017-10-12', '08:00', '19:00', 'K', ' ', 'Palu', 'Standby', '08:00', '19:00', '', '', '', '', '', '', '', '', '', ''),
(28, 'Ahdiat Ahsan', '2017-10-04', '08:00', '19:00', 'K', ' ', 'Palu', 'Standby', '08:00', '19:00', '', '', '', '', '', '', '', '', '', ''),
(29, 'Ahdiat Ahsan', '2017-10-12', '08:00', '19:00', 'K', ' ', 'Palu', 'Standby', '08:00', '19:00', '', '', '', '', '', '', '', '', '', ''),
(30, 'Ahdiat Ahsan', '2017-10-12', '08:00', '19:00', 'K', ' ', 'Palu', 'Standby', '08:00', '19:00', '', '', '', '', '', '', '', '', '', ''),
(31, 'Ahdiat Ahsan', '2017-10-04', '08:00', '19:00', 'K', ' ', 'Palu', 'Standby', '08:00', '19:00', '', '', '', '', '', '', '', '', '', ''),
(32, 'Ahdiat Ahsan', '2017-10-12', '08:00', '19:00', 'K', ' ', 'Palu', 'Standby', '08:00', '19:00', '', '', '', '', '', '', '', '', '', ''),
(33, 'Ahdiat Ahsan', '2017-10-04', '08:00', '19:00', 'K', ' ', 'Palu', 'Standby', '08:00', '19:00', '', '', '', '', '', '', '', '', '', ''),
(34, 'Ahdiat Ahsan', '2017-10-12', '08:00', '19:00', 'K', ' ', 'Palu', 'Standby', '08:00', '19:00', '', '', '', '', '', '', '', '', '', ''),
(35, 'Ahdiat Ahsan', '2017-10-12', '08:00', '19:00', 'K', ' ', 'Palu', 'Standby', '08:00', '19:00', '', '', '', '', '', '', '', '', '', ''),
(36, 'Ahdiat Ahsan', '2017-10-04', '08:00', '19:00', 'K', ' ', 'Palu', 'Standby', '08:00', '19:00', '', '', '', '', '', '', '', '', '', ''),
(37, 'Ahdiat Ahsan', '2017-10-12', '08:00', '19:00', 'K', ' ', 'Palu', 'Standby', '08:00', '19:00', '', '', '', '', '', '', '', '', '', ''),
(38, 'Ahdiat Ahsan', '2017-10-12', '08:00', '19:00', 'K', ' ', 'Palu', 'Standby', '08:00', '19:00', '', '', '', '', '', '', '', '', '', ''),
(39, 'Ahdiat Ahsan', '2017-10-04', '08:00', '19:00', 'K', ' ', 'Palu', 'Standby', '08:00', '19:00', '', '', '', '', '', '', '', '', '', ''),
(40, 'Ahdiat Ahsan', '2018-02-28', '08:01', '13:00', 'K', ' ', 'Palu', 'Maintenance', '10:00', '11:00', '1', '', '', '', '', '', '', '', '', ''),
(41, 'Ahdiat Ahsan', '2019-04-08', '01:01', '02:00', 'K', ' ', 'asdasd', 'asdasd', '01:30', '01:35', '1', '1', '', '1', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(2) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nik` int(11) NOT NULL,
  `lokasi` varchar(15) NOT NULL,
  `devisi` varchar(15) NOT NULL,
  `spoc` varchar(30) NOT NULL,
  `nik_spoc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `nik`, `lokasi`, `devisi`, `spoc`, `nik_spoc`) VALUES
(1, 'Ahdiat Ahsan', '1111', 2147483647, 'Palu', 'TO', 'abcd', 24422123),
(2, 'Ahdiat', '1111', 1111, 'Palu', 'ghgh', 'fgfhgf', 5442342),
(3, 'Khaliq Akkas', '12345', 816430009, 'Palu', 'TO', 'Agustian', 9876),
(4, 'aaa', '1234', 123, 'makassar', 'a', 'aaa', 1234),
(5, 'Fauzan', '123123', 19191919, 'Makassar', 'Kuda', 'sadasd', 3123123);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `laporan_bln`
--
ALTER TABLE `laporan_bln`
  ADD PRIMARY KEY (`id_data`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`) USING BTREE,
  ADD KEY `username` (`username`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `laporan_bln`
--
ALTER TABLE `laporan_bln`
  MODIFY `id_data` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
