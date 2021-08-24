-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Agu 2021 pada 08.26
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
-- Struktur dari tabel `data_agama`
--

CREATE TABLE `data_agama` (
  `id_agama` int(11) NOT NULL,
  `agama` varchar(50) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_agama`
--

INSERT INTO `data_agama` (`id_agama`, `agama`, `create_at`) VALUES
(1, 'ISLAM', '2021-03-01 03:10:35'),
(2, 'HINDU', '2021-03-03 04:08:21'),
(3, 'BUDHA', '2021-03-03 04:23:47'),
(4, 'KONGHUCU', '2021-03-03 04:23:47'),
(5, 'KRISTEN', '2021-03-03 04:23:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_guru`
--

CREATE TABLE `data_guru` (
  `id_guru` int(11) NOT NULL,
  `nama_guru` varchar(50) DEFAULT NULL,
  `foto_guru` varchar(300) DEFAULT NULL,
  `nip` varchar(25) DEFAULT NULL,
  `tgl_lahir_guru` date DEFAULT NULL,
  `alamat_guru` varchar(200) DEFAULT NULL,
  `jenis_kelamin_guru` varchar(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_guru`
--

INSERT INTO `data_guru` (`id_guru`, `nama_guru`, `foto_guru`, `nip`, `tgl_lahir_guru`, `alamat_guru`, `jenis_kelamin_guru`, `created_at`) VALUES
(20, 'admin1', 'file_1623658580.jpg', '3242567', '2021-04-12', 'asefgcd', 'Laki-Laki', '2021-06-14 08:16:21'),
(21, 'budiman', 'file_1619584356.png', '7362674', '2021-04-14', 'qwedf', 'Laki-Laki', '2021-04-28 04:32:36'),
(23, 'reza', 'file_1622604820.png', '23567', '2021-06-21', 'tuban', 'Laki-Laki', '2021-06-02 03:33:40'),
(25, 'kaka', 'file_1629340798.jpg', '1234567', '2021-08-01', 'jakarta', 'Laki-Laki', '2021-08-19 02:39:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_jurusan`
--

CREATE TABLE `data_jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `jurusan` varchar(100) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_jurusan`
--

INSERT INTO `data_jurusan` (`id_jurusan`, `jurusan`, `create_at`) VALUES
(1, 'RPL', '2021-03-01 03:51:11'),
(2, 'TKJ', '2021-03-03 04:07:46'),
(3, 'TPM', '2021-03-03 04:21:20'),
(4, 'TITL', '2021-03-03 04:21:20'),
(5, 'TIPK', '2021-03-03 04:21:20'),
(6, 'TB', '2021-03-03 04:21:20'),
(7, 'TKR', '2021-03-03 04:21:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kelas`
--

CREATE TABLE `data_kelas` (
  `id_kelas` int(11) NOT NULL,
  `kelas` varchar(10) DEFAULT NULL,
  `id_jurusan` int(11) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_kelas`
--

INSERT INTO `data_kelas` (`id_kelas`, `kelas`, `id_jurusan`, `create_at`) VALUES
(1, 'X', NULL, '2021-04-07 07:17:59'),
(2, 'XI', NULL, '2021-03-03 04:11:53'),
(3, 'XII', NULL, '2021-03-03 04:12:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pelanggaran`
--

CREATE TABLE `data_pelanggaran` (
  `id_pelanggaran` int(11) NOT NULL,
  `nama_pelanggaran` varchar(300) DEFAULT NULL,
  `point` varchar(11) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_pelanggaran`
--

INSERT INTO `data_pelanggaran` (`id_pelanggaran`, `nama_pelanggaran`, `point`, `create_at`) VALUES
(9, 'Tidak Membawa Buku Sesuai Jadwal', '2', '2021-08-18 02:45:12'),
(10, 'Membuat Kegaduhan Dikelas Atau Disekolah', '5', '2021-08-18 02:46:00'),
(12, 'Memparkir sepedah/motor tidak pada tempatnya', '5', '2021-08-19 04:43:59'),
(13, 'Menyontek', '10', '2021-08-19 04:44:39'),
(14, 'Sepeda motor tidak standart dan tidak memakai helm', '10', '2021-08-19 04:44:54'),
(15, 'Mencoret-coret atau mengotori dinding, pintu, meja, kursi, pagar sekolah', '20', '2021-08-19 04:45:30'),
(16, 'Membawa atau bermain kartu remi dan domino di sekolah', '20', '2021-08-19 04:46:30'),
(17, 'Melindungi teman yang bersalah', '20', '2021-08-19 04:49:24'),
(18, 'Menggunakan handphone tanpa ijin guru waktu KBM', '20', '2021-08-19 04:51:57'),
(19, 'Berpacaran disekolah', '20', '2021-08-19 04:52:19'),
(20, 'Merayakan ulang tahun berlebihan', '20', '2021-08-19 04:52:48'),
(21, 'Membuat surat ijin palsu', '20', '2021-08-19 04:53:13'),
(22, 'Bermain bola di koridor dan di dalam kelas', '25', '2021-08-19 04:54:01'),
(23, 'Menyalahgunakan uang SPP atau uang sekolah', '25', '2021-08-19 04:54:48'),
(24, 'Meloncat jendela dan pagar sekolah', '25', '2021-08-19 04:55:50'),
(25, 'Membawa atau menyembunyikan petasan', '30', '2021-08-19 04:56:09'),
(26, 'Merusak sarana dan rasarana sekolah', '50', '2021-08-19 04:56:33'),
(27, 'Membawa / merokok saat masih mengenakan seragam sekolah', '50', '2021-08-19 04:56:55'),
(28, 'Mengancam/ mengintimidasi teman sekelas / teman sekolah', '75', '2021-08-19 04:57:20'),
(29, 'Berperilaku jorok atau asusila baik dalam maupun diluar sekolah', '100', '2021-08-19 04:58:14'),
(30, 'Bertindak tidak sopan/melecehkan Kepala Sekolah, Guru dan Karyawan Sekolah', '100', '2021-08-19 04:58:59'),
(31, 'Mengancam/ mengintimidasi Kepala Sekolah, Guru dan Karyawan', '100', '2021-08-19 04:59:46'),
(32, 'Mengikuti aliran/ perkumpulan / geng terlarang/ komunitas LGBT dan radikalisme', '100', '2021-08-19 05:00:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pelanggaran_berat`
--

CREATE TABLE `data_pelanggaran_berat` (
  `id_pelanggaran_berat` int(11) NOT NULL,
  `nama_pelanggaran_berat` varchar(256) DEFAULT NULL,
  `point` varchar(256) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_pelanggaran_berat`
--

INSERT INTO `data_pelanggaran_berat` (`id_pelanggaran_berat`, `nama_pelanggaran_berat`, `point`, `create_at`) VALUES
(5, 'Mencuri Disekolah Dan Diluar Sekolah', '250', '2021-08-18 02:49:37'),
(6, 'Terbukti Hamil Atau Menghamili', '250', '2021-08-18 02:50:05'),
(7, 'Terbukti Nikah', '250', '2021-08-18 02:50:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pelanggaran_kerapian`
--

CREATE TABLE `data_pelanggaran_kerapian` (
  `id_pelanggaran_kerapian` int(11) NOT NULL,
  `nama_pelanggaran_kerapian` varchar(256) DEFAULT NULL,
  `point` varchar(256) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_pelanggaran_kerapian`
--

INSERT INTO `data_pelanggaran_kerapian` (`id_pelanggaran_kerapian`, `nama_pelanggaran_kerapian`, `point`, `create_at`) VALUES
(5, 'Tidak Beseragam Sesuai Dengan Ketentuan', '10', '2021-08-18 02:47:41'),
(6, 'Seragam Yang Dicoret-corer', '10', '2021-08-18 02:48:11'),
(7, 'Celana Atau Rok Tidak Standar', '10', '2021-08-18 02:48:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_prestasi`
--

CREATE TABLE `data_prestasi` (
  `id_prestasi` int(11) NOT NULL,
  `nama_prestasi` varchar(300) DEFAULT NULL,
  `point` varchar(11) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_prestasi`
--

INSERT INTO `data_prestasi` (`id_prestasi`, `nama_prestasi`, `point`, `create_at`) VALUES
(1, 'mengikuti lomba kabupaten', '50', '2021-08-18 02:51:49'),
(3, 'Lomba Tingkat Kecamatan', '25', '2021-08-18 02:52:23'),
(4, 'Lomba Tingkat Provinsi', '75', '2021-08-18 02:52:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_siswa`
--

CREATE TABLE `data_siswa` (
  `id_siswa` int(11) NOT NULL,
  `foto_siswa` varchar(300) DEFAULT NULL,
  `nis` varchar(12) DEFAULT NULL,
  `nama_siswa` varchar(100) DEFAULT NULL,
  `tanggal_lahir_siswa` date DEFAULT NULL,
  `alamat_siswa` varchar(200) DEFAULT NULL,
  `jenis_kelamin_siswa` varchar(10) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `id_agama` int(11) DEFAULT NULL,
  `id_jurusan` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_siswa`
--

INSERT INTO `data_siswa` (`id_siswa`, `foto_siswa`, `nis`, `nama_siswa`, `tanggal_lahir_siswa`, `alamat_siswa`, `jenis_kelamin_siswa`, `id_kelas`, `id_agama`, `id_jurusan`, `create_at`) VALUES
(43, 'kosong1.png', '324523', 'vino', '2021-08-03', 'tby', 'Laki-Laki', 3, 1, 1, '2021-08-16 05:07:31'),
(44, 'kosong1.png', '086322', 'satria', '2021-08-01', 'tuban', 'Laki-Laki', 1, 1, 1, '2021-08-18 18:27:57'),
(45, 'file_1629340300.png', '0987643', 'sara aplrilia', '2021-08-01', 'Ds. Sobontoro, kec. Tambakboyo, Kab. Tuban', 'Perempuan', 1, 1, 1, '2021-08-19 02:31:40'),
(46, 'kosong1.png', '13245678', 'yudi', '2021-08-04', 'tuban', 'Laki-Laki', 1, 1, 1, '2021-08-19 03:10:14'),
(47, 'kosong1.png', '126731731878', 'yaza', '2021-08-01', 'tuban', 'Laki-Laki', 3, 5, 3, '2021-08-19 05:10:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_treatment`
--

CREATE TABLE `data_treatment` (
  `id_treatment` int(11) NOT NULL,
  `nama_treatment` varchar(300) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_treatment`
--

INSERT INTO `data_treatment` (`id_treatment`, `nama_treatment`, `create_at`) VALUES
(8, 'Teguran Lisan', '2021-08-16 05:23:42'),
(9, 'Sanksi', '2021-08-16 05:24:08'),
(10, 'Panggilan Siswa', '2021-08-16 05:24:32'),
(11, 'Surat Peringatan 1', '2021-08-16 05:24:52'),
(12, 'Surat Peringatan 2', '2021-08-16 05:25:06'),
(13, 'Panggilan Orang Tua', '2021-08-16 05:25:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_user`
--

CREATE TABLE `data_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `level` varchar(10) DEFAULT NULL,
  `id_guru` int(11) DEFAULT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_user`
--

INSERT INTO `data_user` (`id_user`, `username`, `password`, `level`, `id_guru`, `id_siswa`, `create_at`) VALUES
(21, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '1', 20, NULL, '2021-06-16 01:37:34'),
(22, 'guru', 'a1872e333d0e52644f6125da2276530f7ebe5e77', '2', 21, NULL, '2021-05-31 07:25:38'),
(24, 'mereza', 'ecc9d0b390b82b9ecaf332a4daad37ff77ecb413', '2', 23, NULL, '2021-08-18 03:28:09'),
(26, 'satria', 'e7a73b1a1bb6328e80305273219a8e048e33de8b', '3', NULL, 44, '2021-08-18 18:27:57'),
(27, 'sara', 'dea04453c249149b5fc772d9528fe61afaf7441c', '3', NULL, 45, '2021-08-19 02:31:40'),
(28, 'kaka', '513d74946327c04cb6f0b0190b460dd9821db726', '2', 25, NULL, '2021-08-19 02:39:58'),
(29, 'yudi', '4a33aa96f303c8690d291da017790ea573086954', '3', NULL, 46, '2021-08-19 03:10:15'),
(30, 'yaza', '92a5b4635f2a0b0fb5d886c8099126887280bd50', '3', NULL, 47, '2021-08-19 05:10:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_pelanggaran`
--

CREATE TABLE `riwayat_pelanggaran` (
  `id_riwayat_pelanggaran` int(11) NOT NULL,
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

INSERT INTO `riwayat_pelanggaran` (`id_riwayat_pelanggaran`, `tanggal_pelanggaran`, `keterangan_pelanggaran`, `id_siswa`, `id_guru`, `id_pelanggaran`, `id_pelanggaran_kerapian`, `id_pelanggaran_berat`, `create_at`) VALUES
(65, NULL, 'mabokan', NULL, NULL, NULL, NULL, 1, '2021-05-31 09:44:14'),
(66, NULL, 'mabokan', NULL, NULL, NULL, NULL, 1, '2021-05-31 09:54:28'),
(68, NULL, 't', NULL, NULL, NULL, NULL, 1, '2021-05-31 09:58:41'),
(69, NULL, 'ers', NULL, NULL, NULL, NULL, 1, '2021-06-01 05:07:32'),
(71, NULL, '', NULL, NULL, NULL, 4, NULL, '2021-06-01 05:09:19'),
(72, NULL, '', NULL, NULL, NULL, 3, NULL, '2021-06-01 05:13:00'),
(77, '2021-08-18', 'Rusuh Sendiri Dikelas', 43, NULL, 10, NULL, NULL, '2021-08-18 02:59:29'),
(78, '2021-08-19', 'sering sekali', 43, NULL, 10, NULL, NULL, '2021-08-18 18:05:33'),
(79, '2021-08-19', 'sering', 44, 21, 11, NULL, NULL, '2021-08-19 01:57:17'),
(80, '2021-08-19', 'Menyontek Ketika UTS', 45, NULL, 11, NULL, NULL, '2021-08-19 02:47:17'),
(81, '2021-08-19', 'Nikah Sirih', 43, 25, NULL, NULL, 7, '2021-08-19 02:54:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_treatment`
--

CREATE TABLE `riwayat_treatment` (
  `id_riwayat_treatment` int(11) NOT NULL,
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

INSERT INTO `riwayat_treatment` (`id_riwayat_treatment`, `tanggal_treatment`, `keterangan_treatment`, `id_siswa`, `id_guru`, `id_treatment`, `id_prestasi`, `create_at`) VALUES
(49, '2021-08-16', 'mendapat teguran', 43, 20, 8, NULL, '2021-08-16 06:02:45'),
(51, '2021-08-18', 'Dikarenakan Point Siswa Sudah Tinggi', 43, 23, 13, NULL, '2021-08-18 03:54:08'),
(52, '2021-08-19', 'Teguran Oleh Guru Jurusan', 45, 20, 8, NULL, '2021-08-19 02:47:47'),
(53, '2021-08-19', 'Juara 1 LKS', 43, NULL, NULL, 4, '2021-08-19 02:55:15'),
(54, '2021-08-19', 'LKS juara1', 46, NULL, NULL, 4, '2021-08-19 03:10:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_login`
--

CREATE TABLE `tb_login` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_login`
--

INSERT INTO `tb_login` (`id_admin`, `nama`, `username`, `password`) VALUES
(1, 'Somad', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_agama`
--
ALTER TABLE `data_agama`
  ADD PRIMARY KEY (`id_agama`);

--
-- Indeks untuk tabel `data_guru`
--
ALTER TABLE `data_guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indeks untuk tabel `data_jurusan`
--
ALTER TABLE `data_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `data_kelas`
--
ALTER TABLE `data_kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `id_jurusan` (`id_jurusan`);

--
-- Indeks untuk tabel `data_pelanggaran`
--
ALTER TABLE `data_pelanggaran`
  ADD PRIMARY KEY (`id_pelanggaran`);

--
-- Indeks untuk tabel `data_pelanggaran_berat`
--
ALTER TABLE `data_pelanggaran_berat`
  ADD PRIMARY KEY (`id_pelanggaran_berat`);

--
-- Indeks untuk tabel `data_pelanggaran_kerapian`
--
ALTER TABLE `data_pelanggaran_kerapian`
  ADD PRIMARY KEY (`id_pelanggaran_kerapian`);

--
-- Indeks untuk tabel `data_prestasi`
--
ALTER TABLE `data_prestasi`
  ADD PRIMARY KEY (`id_prestasi`);

--
-- Indeks untuk tabel `data_siswa`
--
ALTER TABLE `data_siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_agama` (`id_agama`);

--
-- Indeks untuk tabel `data_treatment`
--
ALTER TABLE `data_treatment`
  ADD PRIMARY KEY (`id_treatment`);

--
-- Indeks untuk tabel `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_guru` (`id_guru`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indeks untuk tabel `riwayat_pelanggaran`
--
ALTER TABLE `riwayat_pelanggaran`
  ADD PRIMARY KEY (`id_riwayat_pelanggaran`),
  ADD KEY `id_pelanggaran` (`id_pelanggaran`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_guru` (`id_guru`);

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
-- Indeks untuk tabel `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id_admin`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_agama`
--
ALTER TABLE `data_agama`
  MODIFY `id_agama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `data_guru`
--
ALTER TABLE `data_guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `data_jurusan`
--
ALTER TABLE `data_jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `data_kelas`
--
ALTER TABLE `data_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `data_pelanggaran`
--
ALTER TABLE `data_pelanggaran`
  MODIFY `id_pelanggaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `data_pelanggaran_berat`
--
ALTER TABLE `data_pelanggaran_berat`
  MODIFY `id_pelanggaran_berat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `data_pelanggaran_kerapian`
--
ALTER TABLE `data_pelanggaran_kerapian`
  MODIFY `id_pelanggaran_kerapian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `data_prestasi`
--
ALTER TABLE `data_prestasi`
  MODIFY `id_prestasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `data_siswa`
--
ALTER TABLE `data_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `data_treatment`
--
ALTER TABLE `data_treatment`
  MODIFY `id_treatment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `data_user`
--
ALTER TABLE `data_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `riwayat_pelanggaran`
--
ALTER TABLE `riwayat_pelanggaran`
  MODIFY `id_riwayat_pelanggaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT untuk tabel `riwayat_treatment`
--
ALTER TABLE `riwayat_treatment`
  MODIFY `id_riwayat_treatment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
