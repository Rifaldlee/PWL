-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Jan 2023 pada 07.38
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rifaldlee1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `rifaldlee2`
--

CREATE TABLE `rifaldlee2` (
  `id_pembeli` int(20) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `HP` varchar(200) NOT NULL,
  `jenis_barang` varchar(200) NOT NULL,
  `nama_barang` varchar(200) NOT NULL,
  `jumlah` int(50) NOT NULL,
  `harga` int(90) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `alamat` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rifaldlee2`
--

INSERT INTO `rifaldlee2` (`id_pembeli`, `nama`, `HP`, `jenis_barang`, `nama_barang`, `jumlah`, `harga`, `tgl_transaksi`, `alamat`) VALUES
(1, 'rifaldlee', '089072371246', 'laptop', 'laptop asus a416ea', 1, 9100000, '2021-11-01', 'beji'),
(2, 'newgate', '1230987465721', 'laptop', 'lenovo thinkpad', 1, 9100000, '2022-11-11', 'new world'),
(3, 'roger', '214365870982', 'keyboard', 'logitech G95', 1, 2000000, '2021-09-20', 'east blue'),
(4, 'oden', '9873634021', 'monitor', 'Lenovo Monitor L24i-30 ', 1, 1700000, '2017-11-22', 'wano'),
(5, 'rocks d xebec', '56847019239', 'hp', 'xiaomi mi 9t', 2, 2500000, '2022-11-15', 'kukusan'),
(6, 'garp', '20093814567', 'mouse', 'logitech g90', 1, 1000000, '2022-11-29', 'sawangan'),
(10, 'Sengoku', '', 'keyboard', 'Meca Air', 1, 555000, '2021-09-20', 'marine ford');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `name` varchar(70) NOT NULL,
  `username` varchar(70) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`) VALUES
(1, 'rifaldlee', 'rifaldlee', 'rifaldlee@gmail.com', 'r123');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `rifaldlee2`
--
ALTER TABLE `rifaldlee2`
  ADD PRIMARY KEY (`id_pembeli`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
