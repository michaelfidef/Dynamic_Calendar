-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Jun 2023 pada 07.32
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kalender`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `isi`
--

CREATE TABLE `isi` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `wkt_mulai` time NOT NULL,
  `wkt_selesai` time NOT NULL,
  `level_Kepentingan` varchar(30) NOT NULL,
  `durasi` varchar(10) NOT NULL,
  `lokasi` text NOT NULL,
  `gambar_kegiatan` varchar(50) NOT NULL,
  `day` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `isi`
--

INSERT INTO `isi` (`id`, `keterangan`, `tgl_mulai`, `tgl_selesai`, `wkt_mulai`, `wkt_selesai`, `level_Kepentingan`, `durasi`, `lokasi`, `gambar_kegiatan`, `day`) VALUES
(56, 'Goland Foto', '2023-06-28', '2023-06-30', '14:42:00', '14:44:00', 'Sangat Penting', '01', ' Duta Foto', 'images/WhatsApp Image 2023-06-06 at 21.57.42.jpeg', ''),
(62, 'dada', '2023-06-14', '2023-06-15', '09:19:00', '10:19:00', 'Penting', '01', ' disana', 'images/IMG_0284.JPG', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_login`
--

CREATE TABLE `users_login` (
  `email` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `jenis_kelamin` enum('pria','wanita') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users_login`
--

INSERT INTO `users_login` (`email`, `password`, `nama`, `jenis_kelamin`) VALUES
('kezia.trifena@ti.ukdw.ac.id', 'admin', 'kezia', 'wanita'),
('michael.fidef@ti.ukdw.ac.id', 'admin', 'fidef', 'pria'),
('michael.goland@ti.ukdw.ac.id', '8c6976e5b5', 'goland', 'pria');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `isi`
--
ALTER TABLE `isi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users_login`
--
ALTER TABLE `users_login`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `isi`
--
ALTER TABLE `isi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
