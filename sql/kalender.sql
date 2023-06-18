-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Jun 2023 pada 18.41
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
  `durasi` int(11) NOT NULL,
  `lokasi` text NOT NULL,
  `gambar_kegiatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `isi`
--

INSERT INTO `isi` (`id`, `keterangan`, `tgl_mulai`, `tgl_selesai`, `wkt_mulai`, `wkt_selesai`, `level_Kepentingan`, `durasi`, `lokasi`, `gambar_kegiatan`) VALUES
(62, 'Makrab FTI', '2023-06-14', '2023-06-14', '09:19:00', '10:25:00', 'Penting', 106, 'pantai watu kodok', 'images/IMG_0284.JPG'),
(67, 'Membantu Kakek', '2023-06-20', '2023-06-20', '07:30:00', '09:15:00', 'Biasa', 145, 'Condong catur', 'images/istockphoto-1469731249-1024x1024.jpg'),
(68, 'Makrab OKA', '2023-06-23', '2023-06-24', '18:35:00', '18:30:00', 'Sangat Penting', 2355, 'Tawangmangu  ', 'images/IMG_0295.JPG'),
(77, 'UAS PrakProgweb', '2023-06-20', '2023-06-20', '15:00:00', '16:05:00', 'Sangat Penting', 105, 'ukdw', 'images/');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
