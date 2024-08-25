-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 08 Agu 2024 pada 13.34
-- Versi server: 8.0.30
-- Versi PHP: 8.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pariwisata_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket`
--

CREATE TABLE `paket` (
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `paket`
--

INSERT INTO `paket` (`title`, `image`, `deskripsi`) VALUES
('Paket Murmer', '1.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce at neque non ex pharetra sollicitudin at non enim.'),
('Paket Hemat', '2.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce at neque non ex pharetra sollicitudin at non enim.'),
('Paket Premium', '3.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce at neque non ex pharetra sollicitudin at non enim.'),
('Paket Eksklusif', '4.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce at neque non ex pharetra sollicitudin at non enim.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int NOT NULL,
  `nama_pemesan` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `tanggal_pesanan` date NOT NULL,
  `jumlah_hari` int NOT NULL,
  `penginapan` enum('Y','N') NOT NULL,
  `transportasi` enum('Y','N') NOT NULL,
  `service` enum('Y','N') NOT NULL,
  `jumlah_peserta` int NOT NULL,
  `harga_paket` decimal(10,2) NOT NULL,
  `jumlah_tagihan` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id`, `nama_pemesan`, `no_hp`, `tanggal_pesanan`, `jumlah_hari`, `penginapan`, `transportasi`, `service`, `jumlah_peserta`, `harga_paket`, `jumlah_tagihan`) VALUES
(1, 'Wahyu', '081258797689', '2035-04-09', 3, 'Y', 'Y', 'Y', 2, 2700000.00, 16200000.00);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`username`, `password`) VALUES
('admin', '$2y$10$jdE.fojXEsKfrK0rNGk2xei0zN7jhNvdJKIRNjkyzccIScNUUH1c2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `videos`
--

CREATE TABLE `videos` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `videos`
--

INSERT INTO `videos` (`id`, `title`, `video`) VALUES
(1, 'Liburan ke Wisata Nateh', 'https://www.youtube.com/embed/SAYDHv71Ess?si=P9cT-8G1THGfXMGM'),
(2, 'Liburan ke Wisata Nateh', 'https://www.youtube.com/embed/SAYDHv71Ess?si=P9cT-8G1THGfXMGM');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
