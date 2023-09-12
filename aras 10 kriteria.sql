-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Bulan Mei 2023 pada 09.09
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aras10`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_alternatif`
--

CREATE TABLE `tb_alternatif` (
  `id` int(6) NOT NULL,
  `kode` varchar(30) DEFAULT NULL,
  `alternatif` varchar(30) DEFAULT NULL,
  `k1` double DEFAULT NULL,
  `k2` double DEFAULT NULL,
  `k3` double DEFAULT NULL,
  `k4` double DEFAULT NULL,
  `k5` double DEFAULT NULL,
  `k6` double NOT NULL,
  `k7` double NOT NULL,
  `k8` double NOT NULL,
  `k9` double NOT NULL,
  `k10` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_alternatif`
--

INSERT INTO `tb_alternatif` (`id`, `kode`, `alternatif`, `k1`, `k2`, `k3`, `k4`, `k5`, `k6`, `k7`, `k8`, `k9`, `k10`) VALUES
(1, 'A1', 'Bigbos Store Profesional Curly', 0.5, 1, 0.7, 0.7, 0.8, 0.5, 1, 0.7, 0.7, 0.8),
(2, 'A2', 'Sayota Curly HC 80', 0.8, 0.7, 1, 0.5, 1, 0.8, 0.7, 1, 0.5, 1),
(3, 'A3', 'Wigo W-811 Curling Iron', 1, 0.3, 0.4, 0.7, 1, 1, 0.3, 0.4, 0.7, 1),
(4, 'A4', 'Wand Interchangeable 3 Parts', 0.2, 1, 0.5, 0.9, 0.7, 0.2, 1, 0.5, 0.9, 0.7),
(5, 'A5', 'Nova Curly Hair Profesional HC', 1, 0.7, 0.4, 0.7, 1, 1, 0.7, 0.4, 0.7, 1),
(80, 'A6', 'Bigbos Store Profesional Curly', 0.5, 1, 0.7, 0.7, 0.8, 0.5, 1, 0.7, 0.7, 0.8),
(81, 'A7', 'Sayota Curly HC 80', 0.8, 0.7, 1, 0.5, 1, 0.8, 0.7, 1, 0.5, 1),
(82, 'A8', 'Wigo W-811 Curling Iron', 1, 0.3, 0.4, 0.7, 1, 1, 0.3, 0.4, 0.7, 1),
(83, 'A9', 'Wand Interchangeable 3 Parts', 0.2, 1, 0.5, 0.9, 0.7, 0.2, 1, 0.5, 0.9, 0.7),
(84, 'A10', 'Nova Curly Hair Profesional HC', 1, 0.7, 0.4, 0.7, 1, 1, 0.7, 0.4, 0.7, 1),
(89, 'A0', '-', 1, 1, 1, 0.9, 1, 1, 1, 1, 0.5, 0.7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kriteria`
--

CREATE TABLE `tb_kriteria` (
  `id` int(6) NOT NULL,
  `kode` varchar(30) DEFAULT NULL,
  `kriteria` varchar(30) DEFAULT NULL,
  `atribut` varchar(30) DEFAULT NULL,
  `bobot` float DEFAULT NULL,
  `satuan` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kriteria`
--

INSERT INTO `tb_kriteria` (`id`, `kode`, `kriteria`, `atribut`, `bobot`, `satuan`) VALUES
(1, 'K1', 'Bahan Pembuatan', 'benefit', 0.3, '-'),
(2, 'K2', 'Pengaturan Suhu', 'benefit', 0.2, '°C'),
(3, 'K3', 'Garansi', 'benefit', 0.2, 'Tahun/Bulan'),
(4, 'K4', 'Harga', 'benefit', 0.2, 'Rp.'),
(5, 'K5', 'Ukuran', 'benefit', 0.2, 'P x L x T'),
(6, 'K6', 'Bahan Pembuatan', 'benefit', 0.3, '-'),
(7, 'K7', 'Pengaturan Suhu', 'benefit', 0.2, '°C'),
(8, 'K8', 'Garansi', 'benefit', 0.2, 'Tahun/Bulan'),
(9, 'K9', 'Harga', 'cost', 0.15, 'Rp.'),
(10, 'K10', 'Ukuran', 'cost', 0.15, 'P x L x T');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_normalisasi`
--

CREATE TABLE `tb_normalisasi` (
  `id` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `k1` double NOT NULL,
  `k2` double NOT NULL,
  `k3` double NOT NULL,
  `k4` double NOT NULL,
  `k5` double NOT NULL,
  `k6` double NOT NULL,
  `k7` double NOT NULL,
  `k8` double NOT NULL,
  `k9` double NOT NULL,
  `k10` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_normalisasi`
--

INSERT INTO `tb_normalisasi` (`id`, `kode`, `k1`, `k2`, `k3`, `k4`, `k5`, `k6`, `k7`, `k8`, `k9`, `k10`) VALUES
(1, 'A1', 0.5, 1, 0.7, 0.778, 0.8, 0.5, 1, 1, 1.286, 1.286),
(2, 'A2', 0.8, 0.7, 1, 0.556, 1, 0.8, 0.7, 1, 1.8, 1.8),
(3, 'A3', 1, 0.3, 0.4, 0.778, 1, 1, 0.3, 1, 1.286, 1.286),
(4, 'A4', 0.2, 1, 0.5, 1, 0.7, 0.2, 1, 1, 1, 1),
(5, 'A5', 1, 0.7, 0.4, 0.778, 1, 1, 0.7, 1, 1.286, 1.286),
(6, 'A6', 0.5, 1, 0.7, 0.778, 0.8, 0.5, 1, 1, 1.286, 1.286),
(7, 'A7', 0.8, 0.7, 1, 0.556, 1, 0.8, 0.7, 1, 1.8, 1.8),
(8, 'A8', 1, 0.3, 0.4, 0.778, 1, 1, 0.3, 1, 1.286, 1.286),
(9, 'A9', 0.2, 1, 0.5, 1, 0.7, 0.2, 1, 1, 1, 1),
(10, 'A10', 1, 0.7, 0.4, 0.778, 1, 1, 0.7, 1, 1.286, 1.286),
(11, 'A0', 1, 1, 1, 1, 1, 1, 1, 1, 1.8, 1.8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_normalisasi_bobot`
--

CREATE TABLE `tb_normalisasi_bobot` (
  `id` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `k1` double NOT NULL,
  `k2` double NOT NULL,
  `k3` double NOT NULL,
  `k4` double NOT NULL,
  `k5` double NOT NULL,
  `k6` double NOT NULL,
  `k7` double NOT NULL,
  `k8` double NOT NULL,
  `k9` double NOT NULL,
  `k10` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_normalisasi_bobot`
--

INSERT INTO `tb_normalisasi_bobot` (`id`, `kode`, `k1`, `k2`, `k3`, `k4`, `k5`, `k6`, `k7`, `k8`, `k9`, `k10`) VALUES
(1, 'A1', 0.15, 0.2, 0.14, 0.156, 0.16, 0.15, 0.2, 0.2, 0.193, 0.193),
(2, 'A2', 0.24, 0.14, 0.2, 0.111, 0.2, 0.24, 0.14, 0.2, 0.27, 0.27),
(3, 'A3', 0.3, 0.06, 0.08, 0.156, 0.2, 0.3, 0.06, 0.2, 0.193, 0.193),
(4, 'A4', 0.06, 0.2, 0.1, 0.2, 0.14, 0.06, 0.2, 0.2, 0.15, 0.15),
(5, 'A5', 0.3, 0.14, 0.08, 0.156, 0.2, 0.3, 0.14, 0.2, 0.193, 0.193),
(6, 'A6', 0.15, 0.2, 0.14, 0.156, 0.16, 0.15, 0.2, 0.2, 0.193, 0.193),
(7, 'A7', 0.24, 0.14, 0.2, 0.111, 0.2, 0.24, 0.14, 0.2, 0.27, 0.27),
(8, 'A8', 0.3, 0.06, 0.08, 0.156, 0.2, 0.3, 0.06, 0.2, 0.193, 0.193),
(9, 'A9', 0.06, 0.2, 0.1, 0.2, 0.14, 0.06, 0.2, 0.2, 0.15, 0.15),
(10, 'A10', 0.3, 0.14, 0.08, 0.156, 0.2, 0.3, 0.14, 0.2, 0.193, 0.193),
(11, 'A0', 0.3, 0.2, 0.2, 0.2, 0.2, 0.3, 0.2, 0.2, 0.27, 0.27);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rank`
--

CREATE TABLE `tb_rank` (
  `id` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `si` double NOT NULL,
  `ki` double NOT NULL,
  `rank` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_rank`
--

INSERT INTO `tb_rank` (`id`, `kode`, `si`, `ki`, `rank`) VALUES
(1, 'A1', 1.742, 0.744, 5),
(2, 'A2', 2.011, 0.859, 1),
(3, 'A3', 1.742, 0.744, 5),
(4, 'A4', 1.46, 0.624, 9),
(5, 'A5', 1.902, 0.813, 3),
(6, 'A6', 1.742, 0.744, 5),
(7, 'A7', 2.011, 0.859, 1),
(8, 'A8', 1.742, 0.744, 5),
(9, 'A9', 1.46, 0.624, 9),
(10, 'A10', 1.902, 0.813, 3),
(11, 'A0', 2.34, 0, 11);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_alternatif`
--
ALTER TABLE `tb_alternatif`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_normalisasi`
--
ALTER TABLE `tb_normalisasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_normalisasi_bobot`
--
ALTER TABLE `tb_normalisasi_bobot`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_rank`
--
ALTER TABLE `tb_rank`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_alternatif`
--
ALTER TABLE `tb_alternatif`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT untuk tabel `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_normalisasi`
--
ALTER TABLE `tb_normalisasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_normalisasi_bobot`
--
ALTER TABLE `tb_normalisasi_bobot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_rank`
--
ALTER TABLE `tb_rank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
