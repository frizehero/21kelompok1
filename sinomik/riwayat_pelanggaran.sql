-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Agu 2021 pada 16.46
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
-- Struktur dari tabel `riwayat_pelanggaran`
--

CREATE TABLE `riwayat_pelanggaran` (
  `id_riwayat_pelanggaran` int(11) NOT NULL,
  `foto_pelanggaran` varchar(500) DEFAULT NULL,
  `tanggal_pelanggaran` date DEFAULT NULL,
  `keterangan_pelanggaran` text DEFAULT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `id_guru` int(11) DEFAULT NULL,
  `id_pelanggaran` int(11) DEFAULT NULL,
  `id_pelanggaran_kerapian` int(11) DEFAULT NULL,
  `id_pelanggaran_berat` int(11) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `riwayat_pelanggaran`
--

INSERT INTO `riwayat_pelanggaran` (`id_riwayat_pelanggaran`, `foto_pelanggaran`, `tanggal_pelanggaran`, `keterangan_pelanggaran`, `id_siswa`, `id_guru`, `id_pelanggaran`, `id_pelanggaran_kerapian`, `id_pelanggaran_berat`, `create_at`) VALUES
(78, 'file_1629275175.jpg', '2021-08-18', '', 148, NULL, 10, NULL, NULL, '2021-08-18 08:26:15'),
(79, 'file_1629278092.PNG', '2021-08-18', 'bb', 149, NULL, NULL, NULL, 7, '2021-08-18 09:14:52'),
(80, 'file_1629278266.jpg', '2021-08-18', '', 149, NULL, NULL, 7, NULL, '2021-08-18 09:17:46'),
(81, 'file_1629279887.jpg', '2021-08-18', '', 147, NULL, NULL, 5, NULL, '2021-08-18 09:44:48');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `riwayat_pelanggaran`
--
ALTER TABLE `riwayat_pelanggaran`
  ADD PRIMARY KEY (`id_riwayat_pelanggaran`),
  ADD KEY `id_pelanggaran` (`id_pelanggaran`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_guru` (`id_guru`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `riwayat_pelanggaran`
--
ALTER TABLE `riwayat_pelanggaran`
  MODIFY `id_riwayat_pelanggaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
