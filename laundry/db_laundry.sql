-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jun 2022 pada 09.00
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_laundry`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `passcode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `user`, `passcode`) VALUES
(2, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pakaian`
--

CREATE TABLE `tb_pakaian` (
  `id_pakaian` int(11) NOT NULL,
  `jenis_layanan` varchar(50) NOT NULL,
  `harga_layanan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pakaian`
--

INSERT INTO `tb_pakaian` (`id_pakaian`, `jenis_layanan`, `harga_layanan`) VALUES
(2, 'cuci setrika', 6000),
(3, 'cuci setrika kilat (sehari jadi)', 7000),
(4, 'cuci kering (tanpa setrika)', 5000),
(5, 'setrika saja', 3000),
(6, 'bed cover', 10000),
(7, 'gordyn/gorden', 5000),
(10, 'Sepatu', 2500),
(11, 'Selimut', 4000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `telp_pelanggan` varchar(13) NOT NULL,
  `alamat_pelanggan` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id_pelanggan`, `nama_pelanggan`, `telp_pelanggan`, `alamat_pelanggan`, `password`) VALUES
(1, 'Irfan', '0852352552', 'Jambur', 'irfan16'),
(2, 'Rustam', '081263809547', 'Campalagian', ''),
(4, 'Noviar Iriyansah', '0815423563', 'Majene', ''),
(6, 'Jono', '08143564', 'Simungun', 'tatarang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_pakaian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `tgl_masuk_transaksi` date NOT NULL,
  `berat_transaksi` double NOT NULL,
  `tgl_selesai_transaksi` date NOT NULL,
  `status_transaksi` varchar(50) NOT NULL,
  `status_cucian` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_pakaian`, `id_pelanggan`, `tgl_masuk_transaksi`, `berat_transaksi`, `tgl_selesai_transaksi`, `status_transaksi`, `status_cucian`) VALUES
(1, 6, 1, '2022-04-21', 5, '2022-06-02', 'Belum', 'Selesai'),
(9, 7, 6, '2022-06-15', 1, '2022-06-15', 'Selesai', 'Selesai'),
(10, 11, 1, '2022-06-16', 2, '0000-00-00', 'BELUM', 'BELUM');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_pakaian`
--
ALTER TABLE `tb_pakaian`
  ADD PRIMARY KEY (`id_pakaian`);

--
-- Indeks untuk tabel `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_pakaian` (`id_pakaian`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_pakaian`
--
ALTER TABLE `tb_pakaian`
  MODIFY `id_pakaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
