-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Agu 2022 pada 21.39
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
-- Database: `e_recruitment`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `lamaran`
--

CREATE TABLE `lamaran` (
  `id` int(11) NOT NULL,
  `id_pelamar` int(11) NOT NULL,
  `id_lowongan` int(11) NOT NULL,
  `status_lamaran` enum('Tes','Proses','Lulus','Tidak Lulus') NOT NULL,
  `nilai_tes` float DEFAULT NULL,
  `tgl_tes` datetime DEFAULT NULL,
  `tgl_lamaran` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lamaran`
--

INSERT INTO `lamaran` (`id`, `id_pelamar`, `id_lowongan`, `status_lamaran`, `nilai_tes`, `tgl_tes`, `tgl_lamaran`) VALUES
(2, 1, 1, 'Tes', NULL, NULL, '2022-08-01 18:27:40'),
(3, 2, 2, 'Lulus', 100, '2022-08-01 00:00:00', '2022-08-02 17:26:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lowongan`
--

CREATE TABLE `lowongan` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `status_aktif` tinyint(1) NOT NULL,
  `tgl_dibuat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lowongan`
--

INSERT INTO `lowongan` (`id`, `judul`, `deskripsi`, `status_aktif`, `tgl_dibuat`) VALUES
(1, 'Operator', '<ul><li>Usia 19 - 27 tahun</li><li>TB minimal 170</li><li>BB minimal 60</li><li>Lulusan SMK jurusan Teknik Mesin, Listrik (Elektrikal & Mechanical), Otomotif / SMA jurusan IPA</li><li>Memiliki kesehatan mata yang baik</li><li>Bersedia bekerja shift</li><li>Diutamakan yang berdomisili di Tangerang</li></ul>', 1, '2022-07-27 20:45:07'),
(2, 'Supervisor', '<ul><li>Pria/wanita, usia maksimal 26 tahun</li><li>Fresh graduate atau pengalaman maks. 3 tahun</li><li>Familiar dan memiliki kemampuan programming</li><li>Mampu bekerja di dalam tim</li><li>Good communication skill</li><li>Good analytical thinking</li><li>Pendidikan S1 jurusan Teknik Komputer dan Informatika, Teknik Komputer, Teknik Infomatika</li><li>IPK minimal 2,87</li></ul>', 1, '2022-07-27 20:46:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelamar`
--

CREATE TABLE `pelamar` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `jenjang_pendidikan` enum('SD','SMP','SMA/SMK','D3','S1') NOT NULL,
  `cv` varchar(255) NOT NULL,
  `tgl_dibuat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelamar`
--

INSERT INTO `pelamar` (`id`, `id_user`, `nama_lengkap`, `jenis_kelamin`, `jenjang_pendidikan`, `cv`, `tgl_dibuat`) VALUES
(1, 19, 'Sandiaga', 'Laki-Laki', 'SMA/SMK', '3ec870f81b146368aa3201cd62c22b11.pdf', '2022-08-07 15:41:32'),
(2, 20, 'Aziz', 'Laki-Laki', 'D3', 'c5bfeec5cd52b152aab4ec3eb7934867.pdf', '2022-07-31 22:19:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `soal`
--

CREATE TABLE `soal` (
  `id` int(11) NOT NULL,
  `nomor` int(10) NOT NULL,
  `soal` varchar(255) NOT NULL,
  `a` varchar(255) NOT NULL,
  `b` varchar(255) NOT NULL,
  `c` varchar(255) NOT NULL,
  `jawaban` varchar(10) NOT NULL,
  `tgl_dibuat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `soal`
--

INSERT INTO `soal` (`id`, `nomor`, `soal`, `a`, `b`, `c`, `jawaban`, `tgl_dibuat`) VALUES
(4, 1, 'Kapan Indonesia Merdeka?', 'Indonesia tidak pernah merdeka', '17 Agustus 1945', '2 Mei 1998', 'b', '2022-07-05'),
(5, 2, 'Bagaimana Cara memakan bubur?', 'Diaduk searah jarum jam', 'Diaduk menyilang', 'Ditelen', 'c', '2019-07-07'),
(6, 3, 'Kenapa dinamakan ikan?', 'Warnanya kuning', 'Karena dina lapar', 'Karena dina suka', 'b', '2019-07-07'),
(8, 4, 'Makanan Yang biking bingung', 'Semangka', 'Pepaya', 'Apel', 'c', '2019-07-07'),
(9, 5, 'AKLIMATISASI = …', 'adaptasi', 'depresi', 'regresi', 'a', '0000-00-00');

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
(19, 'sandiaga', '12345', 1),
(20, 'aziz', 'aziz123', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `lamaran`
--
ALTER TABLE `lamaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lowongan`
--
ALTER TABLE `lowongan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pelamar`
--
ALTER TABLE `pelamar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `lamaran`
--
ALTER TABLE `lamaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `lowongan`
--
ALTER TABLE `lowongan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pelamar`
--
ALTER TABLE `pelamar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `soal`
--
ALTER TABLE `soal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
