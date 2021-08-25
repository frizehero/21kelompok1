-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Agu 2021 pada 16.47
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mybk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_treatment`
--

CREATE TABLE `riwayat_treatment` (
  `id_riwayat_treatment` int(11) NOT NULL,
  `foto_treatment` varchar(500) DEFAULT NULL,
  `foto_prestasi` varchar(500) DEFAULT NULL,
  `tanggal_treatment` date DEFAULT NULL,
  `keterangan_treatment` text DEFAULT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `id_guru` int(11) DEFAULT NULL,
  `id_treatment` int(11) DEFAULT NULL,
  `id_prestasi` int(11) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `riwayat_treatment`
--

INSERT INTO `riwayat_treatment` (`id_riwayat_treatment`, `foto_treatment`, `foto_prestasi`, `tanggal_treatment`, `keterangan_treatment`, `id_siswa`, `id_guru`, `id_treatment`, `id_prestasi`, `create_at`) VALUES
(49, NULL, NULL, '2021-08-16', 'mendapat teguran', 43, 20, 8, NULL, '2021-08-16 06:02:45'),
(51, NULL, NULL, '2021-08-18', 'Dikarenakan Point Siswa Sudah Tinggi', 43, 23, 13, NULL, '2021-08-18 03:54:08'),
(52, NULL, NULL, '2021-08-22', '', 124, 20, 8, NULL, '2021-08-22 04:46:11'),
(53, NULL, NULL, '2021-08-22', '', 124, NULL, NULL, 3, '2021-08-22 05:21:07'),
(54, 'kosong1.png', NULL, NULL, '', 148, NULL, NULL, 3, '2021-08-18 08:09:37'),
(55, 'file_1629276474.jpg', NULL, '2021-08-18', 'hhh', 148, NULL, 9, NULL, '2021-08-18 08:47:54'),
(56, 'kosong1.png', NULL, NULL, '', 148, NULL, NULL, 1, '2021-08-18 08:52:00'),
(57, 'kosong1.png', NULL, '2021-08-18', '', 147, NULL, 12, NULL, '2021-08-18 09:46:43');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `riwayat_treatment`
--
ALTER TABLE `riwayat_treatment`
  ADD PRIMARY KEY (`id_riwayat_treatment`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_treatment` (`id_treatment`),
  ADD KEY `id_prestasi` (`id_prestasi`),
  ADD KEY `id_user` (`id_guru`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `riwayat_treatment`
--
ALTER TABLE `riwayat_treatment`
  MODIFY `id_riwayat_treatment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
