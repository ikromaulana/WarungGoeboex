-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Agu 2023 pada 11.15
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbrestoran`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dbcustomer`
--

CREATE TABLE `dbcustomer` (
  `id_customer` int(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dbmenu`
--

CREATE TABLE `dbmenu` (
  `id` int(11) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `harga_menu` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dbmenu`
--

INSERT INTO `dbmenu` (`id`, `nama_menu`, `harga_menu`, `gambar`) VALUES
(16, 'Sayur Daun Ubi Gulai', 15000, 'asset/sayur-daun-ubi-gulai.jpeg'),
(17, 'Sambal Hati', 12000, 'asset/sambal-hati.jpeg'),
(18, 'Mie Tiaw Goreng Telur', 25000, 'asset/mie-tiaw-goreng-telur.jpeg'),
(19, 'Ayam Rendang', 35000, 'asset/ayam-rendang.jpeg'),
(20, 'Kari Kambing', 25000, 'asset/kari-kambing.jpeg'),
(21, 'Kerupuk Jangek', 15000, 'asset/kerupuk-jangek.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dbtransaksi`
--

CREATE TABLE `dbtransaksi` (
  `id` int(5) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `harga_menu` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dbcustomer`
--
ALTER TABLE `dbcustomer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indeks untuk tabel `dbmenu`
--
ALTER TABLE `dbmenu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dbtransaksi`
--
ALTER TABLE `dbtransaksi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dbcustomer`
--
ALTER TABLE `dbcustomer`
  MODIFY `id_customer` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `dbmenu`
--
ALTER TABLE `dbmenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `dbtransaksi`
--
ALTER TABLE `dbtransaksi`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
