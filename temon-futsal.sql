-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jul 2021 pada 14.09
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `temon-futsal`
--
CREATE DATABASE IF NOT EXISTS `temon-futsal` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `temon-futsal`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_lapangan`
--

CREATE TABLE `t_lapangan` (
  `id_lapangan` int(11) NOT NULL,
  `lapangan` varchar(50) NOT NULL,
  `jenis_lapangan` enum('Rumput','Matras') NOT NULL,
  `weekday_siang` int(11) NOT NULL,
  `weekday_malam` int(11) NOT NULL,
  `weekend` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_lapangan`
--

INSERT INTO `t_lapangan` (`id_lapangan`, `lapangan`, `jenis_lapangan`, `weekday_siang`, `weekday_malam`, `weekend`) VALUES
(1, 'Lapangan 1', 'Rumput', 75000, 100000, 120000),
(2, 'Lapangan 2', 'Matras', 100000, 130000, 130000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pelanggan`
--

CREATE TABLE `t_pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `pelanggan` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_hp` varchar(14) DEFAULT NULL,
  `tgl_bergabung` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_pelanggan`
--

INSERT INTO `t_pelanggan` (`id_pelanggan`, `pelanggan`, `jenis_kelamin`, `email`, `no_hp`, `tgl_bergabung`) VALUES
(11, 'andy', 'Laki-Laki', 'andy_aja@gmail.com', '085155354467', '2021-07-11'),
(12, 'subki', 'Laki-Laki', 'subjah@gmail.com', '089621234455', '2021-07-11'),
(14, 'sandio', 'Laki-Laki', 'sandi@gmail.com', '08515535678', '2021-07-12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pemesanan`
--

CREATE TABLE `t_pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `lapangan` varchar(20) NOT NULL,
  `tanggal_jam` datetime NOT NULL,
  `durasi` int(11) NOT NULL,
  `status` varchar(30) NOT NULL,
  `bukti_bayar` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_pemesanan`
--

INSERT INTO `t_pemesanan` (`id_pemesanan`, `id_pelanggan`, `lapangan`, `tanggal_jam`, `durasi`, `status`, `bukti_bayar`, `harga`) VALUES
(3, 11, 'Lapangan 1', '2021-07-12 08:00:00', 2, 'pending', '', 240000),
(7, 12, 'Lapangan 2', '2021-07-12 17:00:00', 1, 'success', 'bayar1.jpg', 130000),
(8, 11, 'Lapangan 2', '2021-07-12 20:00:00', 2, 'success', 'IMG-20210531-WA0027.jpg', 260000),
(9, 11, 'Lapangan 2', '2021-07-13 10:00:00', 1, 'success', 'bayar1.jpg', 130000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_user`
--

CREATE TABLE `t_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_user`
--

INSERT INTO `t_user` (`id_user`, `username`, `password`, `role`) VALUES
(1, 'admin', 'admin', 2),
(15, 'andy', '12345', 1),
(16, 'subki', '12345', 1),
(18, 'sandi', 'okydoky', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `t_lapangan`
--
ALTER TABLE `t_lapangan`
  ADD PRIMARY KEY (`id_lapangan`);

--
-- Indeks untuk tabel `t_pelanggan`
--
ALTER TABLE `t_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `t_pemesanan`
--
ALTER TABLE `t_pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indeks untuk tabel `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `t_lapangan`
--
ALTER TABLE `t_lapangan`
  MODIFY `id_lapangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `t_pelanggan`
--
ALTER TABLE `t_pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `t_pemesanan`
--
ALTER TABLE `t_pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
