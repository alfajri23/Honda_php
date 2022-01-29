-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Jan 2022 pada 10.46
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_saleshonda`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `gambar`
--

CREATE TABLE `gambar` (
  `id` int(11) NOT NULL,
  `header1` varchar(255) DEFAULT NULL,
  `header2` varchar(255) DEFAULT NULL,
  `konten1` varchar(255) DEFAULT NULL,
  `konten2` varchar(255) DEFAULT NULL,
  `konten4` varchar(255) DEFAULT NULL,
  `konten5` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gambar`
--

INSERT INTO `gambar` (`id`, `header1`, `header2`, `konten1`, `konten2`, `konten4`, `konten5`) VALUES
(1, '../assets/img/produk/buku bob.jpg', '../assets/img/produk/buku bob.jpg', '../assets/img/gambar/Group 8.png', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `honda`
--

CREATE TABLE `honda` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `spek` varchar(255) DEFAULT NULL,
  `jenis` varchar(255) NOT NULL,
  `gambar1` varchar(255) DEFAULT NULL,
  `gambar2` varchar(255) DEFAULT NULL,
  `gambar3` varchar(255) DEFAULT NULL,
  `gambar4` varchar(255) DEFAULT NULL,
  `gambar5` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `honda`
--

INSERT INTO `honda` (`id`, `nama`, `harga`, `spek`, `jenis`, `gambar1`, `gambar2`, `gambar3`, `gambar4`, `gambar5`) VALUES
(1, 'BeAT - CBS', 20000000, '<p>hallo</p>', 'matic', '../assets/img/produk/buku bob.jpg', '../assets/img/produk/earth.jpg', '../assets/img/produk/buku bob.jpg', 'beat-cbs-techno_blue_black.png', NULL),
(3, 'BeAT - Street', 18810000, '        Tipe Mesin (4 – Langkah, SOHC, eSP), Volume Langkah (109.5cc), Sistem Suplai Bahan Bakar (Injeksi PGM-FI), Kapasitas Tangki Bahan Bakar (4,2 L), Kapasitas Minyak Pelumas (0,65 Liter)\r\n    ', 'matic', '../assets/img/produk/budimark.png', 'BeAT-street-black.png', NULL, NULL, NULL),
(4, 'BeAT - CBS ISS Deluxe', 18890000, 'Tipe Mesin (4 – Langkah, SOHC, eSP), Volume Langkah (109.5cc), Sistem Suplai Bahan Bakar (Injeksi PGM-FI), Kapasitas Tangki Bahan Bakar (4.2 Liter), Kapasitas Minyak Pelumas (0.65 Liter)', 'matic', 'beat-cbs_iss-deluxe_black.png', 'beat-cbs_iss-deluxe_blue.png', 'beat-cbs_iss-deluxe_brown.png', 'beat-cbs_iss-deluxe_silver.png', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `testimoni`
--

CREATE TABLE `testimoni` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `ket` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `testimoni`
--

INSERT INTO `testimoni` (`id`, `nama`, `gambar`, `ket`, `tanggal`) VALUES
(1, 'bapack', '../assets/img/testimoni/makinmahir.jpg', 'alhamdulillah genio nya mantap', '0000-00-00'),
(2, 'bapak2', 'testi2.jpeg', 'alhamdulillah mantap', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `nama` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`nama`, `password`, `id`) VALUES
('admin', 'admin', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `honda`
--
ALTER TABLE `honda`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `honda`
--
ALTER TABLE `honda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
