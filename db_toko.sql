-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Des 2023 pada 13.21
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_toko`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `arsip_barang`
--

CREATE TABLE `arsip_barang` (
  `id_arsip` int(11) NOT NULL,
  `nama_barang` text NOT NULL,
  `nama_bulan` int(11) NOT NULL,
  `stok` varchar(10) NOT NULL,
  `id_barang` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `arsip_barang`
--

INSERT INTO `arsip_barang` (`id_arsip`, `nama_barang`, `nama_bulan`, `stok`, `id_barang`) VALUES
(10, 'Proclozoam', 2, '3042', 'BR001'),
(11, 'Proclozoam', 3, '2403', 'BR001'),
(12, 'Proclozoam', 4, '1718', 'BR001'),
(13, 'Proclozoam', 5, '1033', 'BR001'),
(14, 'Proclozoam', 6, '1643', 'BR001'),
(15, 'Proclozoam', 7, '1225', 'BR001'),
(16, 'Proclozoam', 8, '455', 'BR001'),
(22, 'Proclozoam', 9, '341', 'BR001'),
(24, 'Proclozoam', 10, '541', 'BR001'),
(25, 'Proclozoam', 11, '259', 'BR001'),
(26, 'Proclozoam', 12, '51', 'BR001'),
(27, 'Hansaplast', 12, '445', 'BR002'),
(32, 'Hansaplast', 10, '1232', 'BR002'),
(33, 'Hansaplast', 11, '423', 'BR002'),
(34, 'Hansaplast', 9, '224', 'BR002'),
(36, 'Rizodal 2 Mg', 12, '72', 'BR003'),
(37, 'Alganax 1 Mg', 12, '136', 'BR004'),
(38, 'Dores 5 Mg', 12, '792', 'BR005');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_barang` text NOT NULL,
  `merk` varchar(255) NOT NULL,
  `harga_beli` varchar(255) NOT NULL,
  `harga_jual` varchar(255) NOT NULL,
  `satuan_barang` varchar(255) NOT NULL,
  `stok` text NOT NULL,
  `tgl_input` varchar(255) NOT NULL,
  `tgl_update` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `id_barang`, `id_kategori`, `nama_barang`, `merk`, `harga_beli`, `harga_jual`, `satuan_barang`, `stok`, `tgl_input`, `tgl_update`) VALUES
(44, 'BR001', 19, 'Proclozoam 10 Mg', '-', '2000', '2500', 'PCS', '51', '6 December 2023, 12:56', '9 December 2023, 19:19'),
(48, 'BR002', 19, 'Hansaplast', '-', '500', '1000', 'PCS', '445', '7 December 2023, 20:43', '9 December 2023, 18:57'),
(51, 'BR003', 19, 'Rizodal 2 Mg', '-', '3000', '4000', 'PCS', '72', '9 December 2023, 18:55', NULL),
(52, 'BR004', 19, 'Alganax 1 Mg', '-', '1000', '2000', 'PCS', '136', '9 December 2023, 19:03', NULL),
(53, 'BR005', 19, 'Dores 5 Mg', '-', '1500', '3000', 'PCS', '792', '9 December 2023, 19:12', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `tgl_input` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `tgl_input`) VALUES
(18, 'Obat Cair', '27 November 2023, 13:58'),
(19, 'Obat Tablet', '27 November 2023, 13:58'),
(20, 'Obat Minyak', '27 November 2023, 13:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` char(32) NOT NULL,
  `id_member` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id_login`, `user`, `pass`, `id_member`) VALUES
(1, 'rovy', '202cb962ac59075b964b07152d234b70', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `id_member` int(11) NOT NULL,
  `nm_member` varchar(255) NOT NULL,
  `alamat_member` text NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gambar` text NOT NULL,
  `NIK` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`id_member`, `nm_member`, `alamat_member`, `telepon`, `email`, `gambar`, `NIK`) VALUES
(1, 'Rovy Saputra Nugeraha ', 'Tanjungpinang Timur', '081261461477', 'rovysaputra10@gmail.com', 'Rovy Saputra Nugeraha_Blue.png', '2101020012');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nota`
--

CREATE TABLE `nota` (
  `id_nota` int(11) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `id_member` int(11) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `tanggal_input` varchar(255) NOT NULL,
  `periode` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `id_member` int(11) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `tanggal_input` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `toko`
--

CREATE TABLE `toko` (
  `id_toko` int(11) NOT NULL,
  `nama_toko` varchar(255) NOT NULL,
  `alamat_toko` text NOT NULL,
  `tlp` varchar(255) NOT NULL,
  `nama_pemilik` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `toko`
--

INSERT INTO `toko` (`id_toko`, `nama_toko`, `alamat_toko`, `tlp`, `nama_pemilik`) VALUES
(1, 'Apotik Bahari Farma', 'Jl.RSAL Tanjungpinang Barat', '0821', 'Pak Beni');

-- --------------------------------------------------------

--
-- Struktur dari tabel `uji_arsip_barang`
--

CREATE TABLE `uji_arsip_barang` (
  `id_arsip` int(11) NOT NULL,
  `nama_barang` text NOT NULL,
  `nama_bulan` int(11) NOT NULL,
  `stok` varchar(10) NOT NULL,
  `id_barang` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `uji_arsip_barang`
--

INSERT INTO `uji_arsip_barang` (`id_arsip`, `nama_barang`, `nama_bulan`, `stok`, `id_barang`) VALUES
(1, 'Proclozoam 10 Mg', 1, '2704', 'BR001'),
(2, 'Proclozoam 10 Mg', 2, '3042', 'BR001'),
(3, 'Proclozoam 10 Mg', 3, '2403', 'BR001'),
(4, 'Proclozoam 10 Mg', 4, '1718', 'BR001'),
(5, 'Proclozoam 10 Mg', 5, '1033', 'BR001'),
(6, 'Proclozoam 10 Mg', 6, '1643', 'BR001'),
(7, 'Proclozoam 10 Mg', 7, '1225', 'BR001'),
(8, 'Proclozoam 10 Mg', 8, '455', 'BR001'),
(9, 'Proclozoam 10 Mg', 9, '341', 'BR001'),
(10, 'Rizodal 2 Mg', 1, '2058', 'BR003'),
(11, 'Rizodal 2 Mg', 2, '2260', 'BR003'),
(12, 'Rizodal 2 Mg', 3, '1465', 'BR003'),
(13, 'Rizodal 2 Mg', 4, '1005', 'BR003'),
(14, 'Rizodal 2 Mg', 5, '1280', 'BR003'),
(15, 'Rizodal 2 Mg', 6, '1065', 'BR003'),
(16, 'Rizodal 2 Mg', 7, '810', 'BR003'),
(17, 'Rizodal 2 Mg', 8, '312', 'BR003'),
(18, 'Rizodal 2 Mg', 9, '72', 'BR003'),
(20, 'Alganax 1 Mg', 1, '1393', 'BR004'),
(21, 'Alganax 1 Mg', 2, '1481', 'BR004'),
(22, 'Alganax 1 Mg', 3, '1319', 'BR004'),
(23, 'Alganax 1 Mg', 4, '769', 'BR004'),
(24, 'Alganax 1 Mg', 5, '861', 'BR004'),
(25, 'Alganax 1 Mg', 6, '633', 'BR004'),
(26, 'Alganax 1 Mg', 7, '440', 'BR004'),
(27, 'Alganax 1 Mg', 8, '406', 'BR004'),
(28, 'Alganax 1 Mg', 9, '174', 'BR004'),
(29, 'Dores 5 Mg', 1, '3229', 'BR005'),
(30, 'Dores 5 Mg', 2, '2156', 'BR005'),
(31, 'Dores 5 Mg', 3, '1749', 'BR005'),
(32, 'Dores 5 Mg', 4, '1223', 'BR005'),
(33, 'Dores 5 Mg', 5, '837', 'BR005'),
(34, 'Dores 5 Mg', 6, '672', 'BR005'),
(35, 'Dores 5 Mg', 7, '452', 'BR005'),
(36, 'Dores 5 Mg', 8, '700', 'BR005'),
(37, 'Dores 5 Mg', 9, '792', 'BR005');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `arsip_barang`
--
ALTER TABLE `arsip_barang`
  ADD PRIMARY KEY (`id_arsip`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indeks untuk tabel `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`id_nota`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indeks untuk tabel `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id_toko`);

--
-- Indeks untuk tabel `uji_arsip_barang`
--
ALTER TABLE `uji_arsip_barang`
  ADD PRIMARY KEY (`id_arsip`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `arsip_barang`
--
ALTER TABLE `arsip_barang`
  MODIFY `id_arsip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `nota`
--
ALTER TABLE `nota`
  MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `toko`
--
ALTER TABLE `toko`
  MODIFY `id_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `uji_arsip_barang`
--
ALTER TABLE `uji_arsip_barang`
  MODIFY `id_arsip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
