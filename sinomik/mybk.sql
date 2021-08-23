-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2021 at 05:20 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

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
-- Table structure for table `data_agama`
--

CREATE TABLE `data_agama` (
  `id_agama` int(11) NOT NULL,
  `agama` varchar(50) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_agama`
--

INSERT INTO `data_agama` (`id_agama`, `agama`, `create_at`) VALUES
(1, 'ISLAM', '2021-03-01 03:10:35'),
(2, 'HINDU', '2021-03-03 04:08:21'),
(3, 'BUDHA', '2021-03-03 04:23:47'),
(4, 'KONGHUCU', '2021-03-03 04:23:47'),
(5, 'KRISTEN', '2021-03-03 04:23:47');

-- --------------------------------------------------------

--
-- Table structure for table `data_guru`
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
-- Dumping data for table `data_guru`
--

INSERT INTO `data_guru` (`id_guru`, `nama_guru`, `foto_guru`, `nip`, `tgl_lahir_guru`, `alamat_guru`, `jenis_kelamin_guru`, `created_at`) VALUES
(20, 'admin1', 'file_1623658580.jpg', '3242567', '2021-04-12', 'asefgcd', 'Laki-Laki', '2021-06-14 08:16:21'),
(21, 'budiman', 'file_1619584356.png', '7362674', '2021-04-14', 'qwedf', 'Laki-Laki', '2021-04-28 04:32:36'),
(23, 'reza', 'file_1622604820.png', '23567', '2021-06-21', 'tuban', 'Laki-Laki', '2021-06-02 03:33:40');

-- --------------------------------------------------------

--
-- Table structure for table `data_jurusan`
--

CREATE TABLE `data_jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `jurusan` varchar(100) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_jurusan`
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
-- Table structure for table `data_kelas`
--

CREATE TABLE `data_kelas` (
  `id_kelas` int(11) NOT NULL,
  `kelas` varchar(10) DEFAULT NULL,
  `id_jurusan` int(11) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_kelas`
--

INSERT INTO `data_kelas` (`id_kelas`, `kelas`, `id_jurusan`, `create_at`) VALUES
(1, 'X', NULL, '2021-04-07 07:17:59'),
(2, 'XI', NULL, '2021-03-03 04:11:53'),
(3, 'XII', NULL, '2021-03-03 04:12:00'),
(8, 'XI TKJ1', NULL, '2021-08-23 01:46:09');

-- --------------------------------------------------------

--
-- Table structure for table `data_pelanggaran`
--

CREATE TABLE `data_pelanggaran` (
  `id_pelanggaran` int(11) NOT NULL,
  `nama_pelanggaran` varchar(300) DEFAULT NULL,
  `point` varchar(11) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_pelanggaran`
--

INSERT INTO `data_pelanggaran` (`id_pelanggaran`, `nama_pelanggaran`, `point`, `create_at`) VALUES
(9, 'Tidak Membawa Buku Sesuai Jadwal', '2', '2021-08-18 02:45:12'),
(10, 'Membuat Kegaduhan Dikelas Atau Disekolah', '5', '2021-08-18 02:46:00'),
(11, 'Menyontek', '10', '2021-08-18 02:46:22');

-- --------------------------------------------------------

--
-- Table structure for table `data_pelanggaran_berat`
--

CREATE TABLE `data_pelanggaran_berat` (
  `id_pelanggaran_berat` int(11) NOT NULL,
  `nama_pelanggaran_berat` varchar(256) DEFAULT NULL,
  `point` varchar(256) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_pelanggaran_berat`
--

INSERT INTO `data_pelanggaran_berat` (`id_pelanggaran_berat`, `nama_pelanggaran_berat`, `point`, `create_at`) VALUES
(5, 'Mencuri Disekolah Dan Diluar Sekolah', '250', '2021-08-18 02:49:37'),
(6, 'Terbukti Hamil Atau Menghamili', '250', '2021-08-18 02:50:05'),
(7, 'Terbukti Nikah', '250', '2021-08-18 02:50:25');

-- --------------------------------------------------------

--
-- Table structure for table `data_pelanggaran_kerapian`
--

CREATE TABLE `data_pelanggaran_kerapian` (
  `id_pelanggaran_kerapian` int(11) NOT NULL,
  `nama_pelanggaran_kerapian` varchar(256) DEFAULT NULL,
  `point` varchar(256) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_pelanggaran_kerapian`
--

INSERT INTO `data_pelanggaran_kerapian` (`id_pelanggaran_kerapian`, `nama_pelanggaran_kerapian`, `point`, `create_at`) VALUES
(5, 'Tidak Beseragam Sesuai Dengan Ketentuan', '10', '2021-08-18 02:47:41'),
(6, 'Seragam Yang Dicoret-corer', '10', '2021-08-18 02:48:11'),
(7, 'Celana Atau Rok Tidak Standar', '10', '2021-08-18 02:48:39');

-- --------------------------------------------------------

--
-- Table structure for table `data_prestasi`
--

CREATE TABLE `data_prestasi` (
  `id_prestasi` int(11) NOT NULL,
  `nama_prestasi` varchar(300) DEFAULT NULL,
  `point` varchar(11) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_prestasi`
--

INSERT INTO `data_prestasi` (`id_prestasi`, `nama_prestasi`, `point`, `create_at`) VALUES
(1, 'mengikuti lomba kabupaten', '50', '2021-08-18 02:51:49'),
(3, 'Lomba Tingkat Kecamatan', '25', '2021-08-18 02:52:23'),
(4, 'Lomba Tingkat Provinsi', '75', '2021-08-18 02:52:47');

-- --------------------------------------------------------

--
-- Table structure for table `data_siswa`
--

CREATE TABLE `data_siswa` (
  `id_siswa` int(11) NOT NULL,
  `foto_siswa` varchar(300) DEFAULT NULL,
  `nis` varchar(20) DEFAULT NULL,
  `nama_siswa` varchar(100) DEFAULT NULL,
  `tanggal_lahir_siswa` date DEFAULT NULL,
  `alamat_siswa` varchar(200) DEFAULT NULL,
  `jenis_kelamin_siswa` varchar(10) DEFAULT NULL,
  `kelas` varchar(20) DEFAULT NULL,
  `agama` varchar(20) DEFAULT NULL,
  `jurusan` varchar(20) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_siswa`
--

INSERT INTO `data_siswa` (`id_siswa`, `foto_siswa`, `nis`, `nama_siswa`, `tanggal_lahir_siswa`, `alamat_siswa`, `jenis_kelamin_siswa`, `kelas`, `agama`, `jurusan`, `create_at`) VALUES
(145, 'kosong1.png', '293468714672', 'Ahmad Barjo', '2001-12-31', 'tambakboyo', 'Laki-Laki', 'X', 'Islam', 'TKJ 1', '2021-08-23 02:04:33'),
(146, 'kosong1.png', '98275r823161', 'vino bin asmodeus', '2002-01-01', 'tambakboyo', 'Perempuan', 'XI', 'hindu', 'RPL', '2021-08-23 02:04:33'),
(147, 'kosong1.png', '245254254', 'wiluyo', '2002-01-02', 'tambakboyo', 'Laki-Laki', 'X', 'hindu', 'RPL', '2021-08-23 02:04:33'),
(148, 'kosong1.png', '236772625225', 'sugeng rino', '2002-01-03', 'tambakboyo', 'Laki-Laki', 'XII', 'hindu', 'TPm2', '2021-08-23 02:04:33'),
(149, 'kosong1.png', '967362437589', 'bandu prayitno', '2002-01-04', 'tambakboyo', 'Laki-Laki', 'X', 'hindu', 'TKR2', '2021-08-23 02:04:33');

-- --------------------------------------------------------

--
-- Table structure for table `data_treatment`
--

CREATE TABLE `data_treatment` (
  `id_treatment` int(11) NOT NULL,
  `nama_treatment` varchar(300) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_treatment`
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
-- Table structure for table `data_user`
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
-- Dumping data for table `data_user`
--

INSERT INTO `data_user` (`id_user`, `username`, `password`, `level`, `id_guru`, `id_siswa`, `create_at`) VALUES
(21, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '1', 20, NULL, '2021-06-16 01:37:34'),
(22, 'guru', 'a1872e333d0e52644f6125da2276530f7ebe5e77', '2', 21, NULL, '2021-05-31 07:25:38'),
(82, 'fw', '8def4372cd160453bb0cf48b1211fe06f9e74f9b', '3', NULL, 145, '2021-08-23 02:04:33'),
(83, 'er', '78991a547c4f0765c224e8cdc0b7b67b21fe21da', '3', NULL, 146, '2021-08-23 02:04:33'),
(84, 'ef', 'f822051471957b7bbebb8ab088fe9bd6d14f4261', '3', NULL, 147, '2021-08-23 02:04:33'),
(85, 'gf', '8eff122bd434b4b3641b6f41d64956af2106169b', '3', NULL, 148, '2021-08-23 02:04:33'),
(86, 'fe', 'ad45205a471752ff1e17b788c3e52521e319899e', '3', NULL, 149, '2021-08-23 02:04:33');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_pelanggaran`
--

CREATE TABLE `riwayat_pelanggaran` (
  `id_riwayat_pelanggaran` int(11) NOT NULL,
  `tanggal_pelanggaran` date DEFAULT NULL,
  `keterangan_pelanggaran` text DEFAULT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `id_pelanggaran` int(11) DEFAULT NULL,
  `id_pelanggaran_kerapian` int(11) DEFAULT NULL,
  `id_pelanggaran_berat` int(11) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_treatment`
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
-- Dumping data for table `riwayat_treatment`
--

INSERT INTO `riwayat_treatment` (`id_riwayat_treatment`, `tanggal_treatment`, `keterangan_treatment`, `id_siswa`, `id_guru`, `id_treatment`, `id_prestasi`, `create_at`) VALUES
(49, '2021-08-16', 'mendapat teguran', 43, 20, 8, NULL, '2021-08-16 06:02:45'),
(51, '2021-08-18', 'Dikarenakan Point Siswa Sudah Tinggi', 43, 23, 13, NULL, '2021-08-18 03:54:08'),
(52, '2021-08-22', '', 124, 20, 8, NULL, '2021-08-22 04:46:11'),
(53, '2021-08-22', '', 124, NULL, NULL, 3, '2021-08-22 05:21:07');

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`id_admin`, `nama`, `username`, `password`) VALUES
(1, 'Somad', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_agama`
--
ALTER TABLE `data_agama`
  ADD PRIMARY KEY (`id_agama`);

--
-- Indexes for table `data_guru`
--
ALTER TABLE `data_guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `data_jurusan`
--
ALTER TABLE `data_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `data_kelas`
--
ALTER TABLE `data_kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `id_jurusan` (`id_jurusan`);

--
-- Indexes for table `data_pelanggaran`
--
ALTER TABLE `data_pelanggaran`
  ADD PRIMARY KEY (`id_pelanggaran`);

--
-- Indexes for table `data_pelanggaran_berat`
--
ALTER TABLE `data_pelanggaran_berat`
  ADD PRIMARY KEY (`id_pelanggaran_berat`);

--
-- Indexes for table `data_pelanggaran_kerapian`
--
ALTER TABLE `data_pelanggaran_kerapian`
  ADD PRIMARY KEY (`id_pelanggaran_kerapian`);

--
-- Indexes for table `data_prestasi`
--
ALTER TABLE `data_prestasi`
  ADD PRIMARY KEY (`id_prestasi`);

--
-- Indexes for table `data_siswa`
--
ALTER TABLE `data_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `data_treatment`
--
ALTER TABLE `data_treatment`
  ADD PRIMARY KEY (`id_treatment`);

--
-- Indexes for table `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_guru` (`id_guru`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `riwayat_pelanggaran`
--
ALTER TABLE `riwayat_pelanggaran`
  ADD PRIMARY KEY (`id_riwayat_pelanggaran`),
  ADD KEY `id_pelanggaran` (`id_pelanggaran`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `riwayat_treatment`
--
ALTER TABLE `riwayat_treatment`
  ADD PRIMARY KEY (`id_riwayat_treatment`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_treatment` (`id_treatment`),
  ADD KEY `id_prestasi` (`id_prestasi`),
  ADD KEY `id_user` (`id_guru`);

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id_admin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_agama`
--
ALTER TABLE `data_agama`
  MODIFY `id_agama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `data_guru`
--
ALTER TABLE `data_guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `data_jurusan`
--
ALTER TABLE `data_jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `data_kelas`
--
ALTER TABLE `data_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `data_pelanggaran`
--
ALTER TABLE `data_pelanggaran`
  MODIFY `id_pelanggaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `data_pelanggaran_berat`
--
ALTER TABLE `data_pelanggaran_berat`
  MODIFY `id_pelanggaran_berat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `data_pelanggaran_kerapian`
--
ALTER TABLE `data_pelanggaran_kerapian`
  MODIFY `id_pelanggaran_kerapian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `data_prestasi`
--
ALTER TABLE `data_prestasi`
  MODIFY `id_prestasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `data_siswa`
--
ALTER TABLE `data_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `data_treatment`
--
ALTER TABLE `data_treatment`
  MODIFY `id_treatment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `data_user`
--
ALTER TABLE `data_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `riwayat_pelanggaran`
--
ALTER TABLE `riwayat_pelanggaran`
  MODIFY `id_riwayat_pelanggaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `riwayat_treatment`
--
ALTER TABLE `riwayat_treatment`
  MODIFY `id_riwayat_treatment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
