-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Apr 2024 pada 12.18
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `4nauki`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id` int(10) NOT NULL,
  `tgl_pengaduan` datetime NOT NULL,
  `isi_laporan` varchar(1000) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` enum('0','proses','selesai') NOT NULL,
  `petugas_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengaduan`
--

INSERT INTO `pengaduan` (`id`, `tgl_pengaduan`, `isi_laporan`, `foto`, `status`, `petugas_id`) VALUES
(8, '2024-04-20 13:18:18', 'truk tibo', 'MOD-Bussid-Truck-Canter-Full-Variasi-Keren-Terbaru-removebg-preview.png', '0', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id` int(10) NOT NULL,
  `nik` char(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telp` int(12) NOT NULL,
  `level` enum('masyarakat','petugas','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id`, `nik`, `nama`, `username`, `password`, `telp`, `level`) VALUES
(1, '1234567', 'nauki', 'uki', '$2y$10$HyeaCGsJ3jPhNAj9HRSv5eItxi5HhbdoV2ufIEGR7P1iXULEW/VKK', 9876543, 'admin'),
(2, '234560', 'ryfa', 'fatir', '$2y$10$da.ll0kphwj0RZo1FDbbxuZ/27OqOycI5vYXfc.rTaZF4SNj9zAyW', 234567890, 'petugas'),
(3, '123467890', 'Lazuardy', 'angga', '$2y$10$gKKLN3suhSz5uWWOOn5vuODFNN//66DeQXmPrIEOJCuJJna9SRnim', 88654, 'masyarakat'),
(4, '111', '111', '111', '$2y$10$EFLr.0.lSWgzirK3xHyF6OpWLn2BQXPcMOvpW9zY/2RL6m3JCkwWe', 111, 'masyarakat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanggapan`
--

CREATE TABLE `tanggapan` (
  `id` int(10) NOT NULL,
  `tgl_tanggapan` datetime NOT NULL,
  `isi_tanggapan` varchar(1000) NOT NULL,
  `petugas_id` int(10) NOT NULL,
  `pengaduan_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tanggapan`
--

INSERT INTO `tanggapan` (`id`, `tgl_tanggapan`, `isi_tanggapan`, `petugas_id`, `pengaduan_id`) VALUES
(5, '2024-04-18 14:39:33', 'test\r\n', 1, 8),
(6, '2024-04-18 19:50:53', 'kok bisa\r\n', 2, 8),
(7, '2024-04-20 12:51:36', 'waduh', 1, 8);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKpengaduan52247` (`petugas_id`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nik` (`nik`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `nama` (`nama`);

--
-- Indeks untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKtanggapan340580` (`petugas_id`),
  ADD KEY `FKtanggapan374346` (`pengaduan_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD CONSTRAINT `FKpengaduan52247` FOREIGN KEY (`petugas_id`) REFERENCES `petugas` (`id`);

--
-- Ketidakleluasaan untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD CONSTRAINT `FKtanggapan340580` FOREIGN KEY (`petugas_id`) REFERENCES `petugas` (`id`),
  ADD CONSTRAINT `FKtanggapan374346` FOREIGN KEY (`pengaduan_id`) REFERENCES `pengaduan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
