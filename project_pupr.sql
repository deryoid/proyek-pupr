-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 04 Agu 2021 pada 14.34
-- Versi server: 5.7.24
-- Versi PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_pupr`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggaran_masuk`
--

CREATE TABLE `anggaran_masuk` (
  `id_am` int(11) NOT NULL,
  `asal_anggaran` varchar(150) NOT NULL,
  `nominal_masuk` varchar(150) NOT NULL,
  `tanggal_masuk` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `anggaran_masuk`
--

INSERT INTO `anggaran_masuk` (`id_am`, `asal_anggaran`, `nominal_masuk`, `tanggal_masuk`) VALUES
(1, 'PAGU', '15000000', '2021-08-04'),
(2, 'Perorangan', '40000000000', '2021-08-04'),
(3, 'APBU', '5000000000', '2021-08-04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id_perusahaan` int(11) NOT NULL,
  `nama_perusahaan` varchar(255) NOT NULL,
  `bidang_perusahaan` varchar(200) NOT NULL,
  `alamat_perusahaan` varchar(220) NOT NULL,
  `tahun_berdiri` date NOT NULL,
  `nama_pimpinan` varchar(120) NOT NULL,
  `no_telp` varchar(70) NOT NULL,
  `email` varchar(100) NOT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `perusahaan`
--

INSERT INTO `perusahaan` (`id_perusahaan`, `nama_perusahaan`, `bidang_perusahaan`, `alamat_perusahaan`, `tahun_berdiri`, `nama_pimpinan`, `no_telp`, `email`, `file`) VALUES
(3, 'Perumahan Dwi Wahyuni', 'Properti', 'Pemurus Luar', '2020-08-11', 'Emen Suhai', '0', 'no@email.com', ''),
(4, 'PT. Perumahan Gerhana', 'Properti', 'Jln. Handil Bakti', '2020-08-21', 'H. Syahrani', '0511728888', 'pt.gerhana@gmail.com', '43073.zip'),
(6, 'PT Tunas Grafika', 'Percetakan dan Grafik', 'Jln Ks Tubun no 50 ', '2008-01-01', 'Hj. Ananda', '082139932777', 'tunasgrafika12@gmail.com', '1609.zip'),
(7, 'Yayasan Sari Mulia', 'Pendidikan Akademis', 'Jl. Pramuka Komp. Dharma Budi No.1', '1996-09-16', 'Dr. Syahrani , M.Kep', '05117366622', 'unv.sarimulia@sarimulia.ac.id', '68916.zip'),
(8, 'Yayasan Indah Batola', 'Pendidikan Akademis', 'Jl. Pati no 57, Barito Kuala', '2008-10-21', 'Drs. H. Gusti Badaruddin Umais', '05117233322', 'indah.batolastikes@gmail.com', '43007.zip'),
(9, 'CV. Andaria Building', 'Konsultan', 'Banjarmasin', '2015-07-08', 'H. Sayuti', '05116377728', 'andria@gmail.com', '69817.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `proyek`
--

CREATE TABLE `proyek` (
  `id_proyek` int(11) NOT NULL,
  `kode_proyek` varchar(77) NOT NULL,
  `nama_proyek` varchar(150) NOT NULL,
  `id_perusahaan` int(11) NOT NULL,
  `alamat_proyek` text NOT NULL,
  `estimasi` varchar(200) NOT NULL,
  `status_proyek` varchar(100) NOT NULL,
  `status_jalan` varchar(40) DEFAULT NULL,
  `ket_tunda` varchar(255) DEFAULT NULL,
  `tgl_mulai` date DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `id_am` int(11) DEFAULT NULL,
  `biaya_akhir` varchar(250) DEFAULT NULL,
  `progres` varchar(25) DEFAULT NULL,
  `tgl_progres` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `proyek`
--

INSERT INTO `proyek` (`id_proyek`, `kode_proyek`, `nama_proyek`, `id_perusahaan`, `alamat_proyek`, `estimasi`, `status_proyek`, `status_jalan`, `ket_tunda`, `tgl_mulai`, `tgl_selesai`, `id_am`, `biaya_akhir`, `progres`, `tgl_progres`) VALUES
(1, 'K1', 'Pembangunan Jembatan', 8, 'Jembatan Batola', '5 Tahun ', 'Di Tanggapi', 'Proyek Selesai', NULL, '2021-07-09', '2021-08-04', 1, NULL, '100', '04 Agustus 2021'),
(2, 'PR5523', 'Pembangunan Jembatan', 9, 'Sungai Danau', '3 Tahun', 'Di Tunda', 'Di Jalankan', '<p>Tidak Sesuai</p>', '2021-07-11', NULL, 1, NULL, '25', NULL),
(3, '12333', 'Pembangunan Jembatan', 4, 'bjm', '3 Tahun', 'Di Tanggapi', 'Di Jalankan', NULL, '2021-08-04', NULL, 2, NULL, '5', '04 Agustus 2021');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `role`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Super Admin'),
(2, 'kepala', '870f669e4bbbfa8a6fde65549826d1c4', 'Kepala'),
(3, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'User');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggaran_masuk`
--
ALTER TABLE `anggaran_masuk`
  ADD PRIMARY KEY (`id_am`);

--
-- Indeks untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id_perusahaan`);

--
-- Indeks untuk tabel `proyek`
--
ALTER TABLE `proyek`
  ADD PRIMARY KEY (`id_proyek`),
  ADD KEY `id_perusahaan` (`id_perusahaan`),
  ADD KEY `id_am` (`id_am`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggaran_masuk`
--
ALTER TABLE `anggaran_masuk`
  MODIFY `id_am` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id_perusahaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `proyek`
--
ALTER TABLE `proyek`
  MODIFY `id_proyek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
