-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jul 2022 pada 06.56
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bumira`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun_admin`
--

CREATE TABLE `akun_admin` (
  `userID` int(11) NOT NULL,
  `namaLengkap` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `akun_admin`
--

INSERT INTO `akun_admin` (`userID`, `namaLengkap`, `username`, `password`, `role`) VALUES
(1, 'admin', 'admin', 'admin', '1'),
(2, 'rizky', 'rizky', 'rizky', '2'),
(5, 'test123', 'test123', '$2y$10$A4RID/NRe/6UcUS/vGgpMe0l6VA8DszuwY.4Cprumqp', '1'),
(6, 'rizky123', 'rizky123', '$2y$10$alNmClkKJrk.8PJZcBIOne7fug3objXXfAdzPxZYz5r', '2'),
(7, '123456', '123456', '$2y$10$SNwsYszDsyl6Q5mpdPNC4OOrxKLqs4HQqCiYvIMI46U', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `tipe` varchar(100) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `gambar` blob NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `tipe`, `lokasi`, `gambar`, `deskripsi`, `tanggal`) VALUES
(1, 'RUMAH KU LAKU', 'LUXURY', 'PLUTO', '', 'test123', '2022-07-02 15:33:22'),
(2, 'RUMAH MU', 'HOT', 'uranus', 0x436170747572652e4a5047, 'wow mahal banget', '2022-07-02 15:19:49'),
(4, 'adsfawe', 'sadfeaw', 'sadfawe', 0x436170747572652e4a5047, 'sadfawe', '2022-07-02 15:19:49'),
(5, 'aaaaaa', 'sadfeaw', 'sadfawe', '', '', '2022-07-02 15:19:49'),
(6, 'aaaaaa', 'sadfeaw', 'sadfawe', '', 'aaaa', '2022-07-02 15:19:49'),
(7, 'aaaaaa', 'sadfeaw', 'sadfawe', '', 'asdwasd', '2022-07-02 15:19:49'),
(8, '12345', 'sadfeaw', 'sadfawe', '', 'asdasd', '2022-07-02 18:13:02');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun_admin`
--
ALTER TABLE `akun_admin`
  ADD PRIMARY KEY (`userID`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun_admin`
--
ALTER TABLE `akun_admin`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
