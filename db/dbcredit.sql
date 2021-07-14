-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Jun 2021 pada 15.47
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbcredit`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `criteria`
--

CREATE TABLE `criteria` (
  `id` int(11) NOT NULL,
  `code` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `desc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `weight` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `criteria`
--

INSERT INTO `criteria` (`id`, `code`, `desc`, `updated_date`, `updated_by`, `weight`) VALUES
(6, 'C1', 'Penghasilan per bulan (net)', '2021-06-17 00:00:00', 'Pian', 40),
(7, 'C2', 'Status kredit', '2021-06-17 00:00:00', 'Pian', 10),
(8, 'C3', 'Tempat usaha', '2021-06-17 00:00:00', 'Pian', 25),
(9, 'C4', 'Lama usaha', '2021-06-17 00:00:00', 'Pian', 15),
(10, 'C5', 'Pemilik usaha', '2021-06-17 00:00:00', 'Pian', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `criteria_index`
--

CREATE TABLE `criteria_index` (
  `id` int(11) NOT NULL,
  `cid` int(11) DEFAULT NULL,
  `index` int(2) DEFAULT NULL,
  `desc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `criteria_index`
--

INSERT INTO `criteria_index` (`id`, `cid`, `index`, `desc`) VALUES
(47, 6, 40, '1.000.000 - 2.000.000'),
(48, 6, 60, '2.000.000 - 4.000.000'),
(49, 6, 80, '4.000.000 - 6.000.000'),
(50, 6, 100, '> 8.000.000'),
(51, 7, 100, 'Tidak Punya Kredit Lain'),
(52, 7, 50, 'Punya Kreditan Lain'),
(53, 8, 100, 'Tempat Usaha Tetap / Punya Pribadi'),
(54, 8, 50, 'Tempat Usaha Kontrak ( > 2 Tahun )'),
(55, 8, 25, 'Tempat Usaha Kontrak ( < 2 Tahun )'),
(56, 9, 75, '> 3 Tahun'),
(57, 9, 50, '> 1 Tahun'),
(58, 9, 25, '< 1 Tahun'),
(59, 10, 100, 'Pribadi / Owner'),
(60, 10, 50, 'Karyawan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `installment`
--

CREATE TABLE `installment` (
  `id` int(11) NOT NULL,
  `items_id` int(11) NOT NULL,
  `period` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `installment`
--

INSERT INTO `installment` (`id`, `items_id`, `period`) VALUES
(4, 3, '36.000 x 90 hari'),
(5, 3, '48.500 x 120 hari');

-- --------------------------------------------------------

--
-- Struktur dari tabel `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `dp` decimal(10,2) DEFAULT NULL,
  `pict` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `items`
--

INSERT INTO `items` (`id`, `kode_barang`, `name`, `price`, `dp`, `pict`) VALUES
(3, 'BRG0001', 'TV LED sharp 32 IN', '4000000.00', '500000.00', 'tv.jpg'),
(4, 'BRG0003', 'AC STNDR', '3500000.00', '200000.00', 'ac.webp'),
(5, 'BRG0006', 'Mesin Cuci Sharp', '3000000.00', '300000.00', 'mc.jpeg'),
(6, 'BRG0012', 'Kulkas', '4500000.00', '300000.00', 'kulkas.webp'),
(7, 'BRG0016', 'Freezer', '8000000.00', '1000000.00', 'frezer.png'),
(8, 'BRG00014', 'Mesin Cuci 1 Tabung', '5000000.00', '500000.00', 'mc2.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `submission`
--

CREATE TABLE `submission` (
  `id` int(11) NOT NULL,
  `sub_number` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nik` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `store_addr` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `home_addr` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `item` int(11) DEFAULT NULL,
  `item_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `installment` int(11) DEFAULT NULL,
  `installment_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dp` decimal(10,2) DEFAULT NULL,
  `ktp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `score` int(3) DEFAULT NULL,
  `insert_date` datetime DEFAULT NULL,
  `review_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `submission`
--

INSERT INTO `submission` (`id`, `sub_number`, `user_id`, `name`, `nik`, `store_addr`, `home_addr`, `phone`, `item`, `item_name`, `installment`, `installment_name`, `dp`, `ktp`, `kk`, `status`, `score`, `insert_date`, `review_date`) VALUES
(10, 'PJ.202106.00001', 9, 'achmad sopyan', '3175024524455', 'jl bumiayu', 'jl bumiraya V rt 08 rw 03 no 12 kel. durensawit kec. durensawit Jakarta Timur 13440', '6288778552464', 3, 'TV LED sharp 32 IN', 5, '48.500 x 120 hari', '500000.00', 'WhatsApp_Image_2020-12-03_at_21_13_01_(1).jpeg', 'download.jpg', 'Ditolak', 55, '2021-06-26 15:04:27', '2021-06-26 15:08:39'),
(11, 'PJ.202106.00002', 9, 'Achmad Sopyan', '31123244451', 'jl bumiraya V rt 08 rw 03 no 12 kel. durensawit kec. durensawit Jakarta Timur 13440', 'jl bumiraya V rt 08 rw 03 no 12 kel. durensawit kec. durensawit Jakarta Timur 13440', '87785526124', 3, 'TV LED sharp 32 IN', 4, '36.000 x 90 hari', '500.00', 'data.jpeg', 'data1.jpeg', 'Menunggu Persetujuan', NULL, '2021-06-26 15:39:41', NULL),
(12, 'PJ.202106.00003', 9, 'pian', '555234234', 'jl bumiraya V rt 08 rw 03 no 12 kel. durensawit kec. durensawit Jakarta Timur 13440', 'jl bumiraya V rt 08 rw 03 no 12 kel. durensawit kec. durensawit Jakarta Timur 13440', '6288778552464', 3, 'TV LED sharp 32 IN', 4, '36.000 x 90 hari', '500000.00', 'data2.jpeg', '5b72b28d16312ee65cf812da_1561373865.png', 'Menunggu Persetujuan', NULL, '2021-06-26 15:44:53', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `submission_quest`
--

CREATE TABLE `submission_quest` (
  `id` int(11) NOT NULL,
  `sid` int(11) DEFAULT NULL,
  `cid` int(11) DEFAULT NULL,
  `cidx` int(11) DEFAULT NULL,
  `cid_desc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cidx_desc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `max_score` int(11) DEFAULT NULL,
  `alias` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `weight` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `submission_quest`
--

INSERT INTO `submission_quest` (`id`, `sid`, `cid`, `cidx`, `cid_desc`, `cidx_desc`, `score`, `max_score`, `alias`, `weight`) VALUES
(26, 10, 6, 48, 'Penghasilan per bulan (net)', '2.000.000 - 4.000.000', 60, 100, NULL, 40),
(27, 10, 7, 52, 'Status kredit', 'Punya Kreditan Lain', 50, 100, NULL, 10),
(28, 10, 8, 55, 'Tempat usaha', 'Tempat Usaha Kontrak ( < 2 Tahun )', 25, 100, NULL, 25),
(29, 10, 9, 57, 'Lama usaha', '> 1 Tahun', 50, 75, NULL, 15),
(30, 10, 10, 59, 'Pemilik usaha', 'Pribadi / Owner', 100, 100, NULL, 10),
(31, 11, 6, 48, 'Penghasilan per bulan (net)', '2.000.000 - 4.000.000', 60, 100, NULL, 40),
(32, 11, 7, 51, 'Status kredit', 'Tidak Punya Kredit Lain', 100, 100, NULL, 10),
(33, 11, 8, 54, 'Tempat usaha', 'Tempat Usaha Kontrak ( > 2 Tahun )', 50, 100, NULL, 25),
(34, 11, 9, 57, 'Lama usaha', '> 1 Tahun', 50, 75, NULL, 15),
(35, 11, 10, 59, 'Pemilik usaha', 'Pribadi / Owner', 100, 100, NULL, 10),
(36, 12, 6, 48, 'Penghasilan per bulan (net)', '2.000.000 - 4.000.000', 60, 100, NULL, 40),
(37, 12, 7, 51, 'Status kredit', 'Tidak Punya Kredit Lain', 100, 100, NULL, 10),
(38, 12, 8, 54, 'Tempat usaha', 'Tempat Usaha Kontrak ( > 2 Tahun )', 50, 100, NULL, 25),
(39, 12, 9, 57, 'Lama usaha', '> 1 Tahun', 50, 75, NULL, 15),
(40, 12, 10, 60, 'Pemilik usaha', 'Karyawan', 50, 100, NULL, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthdate` datetime DEFAULT NULL,
  `gender` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `role` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `fullname`, `email`, `phone`, `address`, `birthdate`, `gender`, `password`, `created_date`, `role`, `updated_date`) VALUES
(9, 'pian', 'pian@gmail.com', '6288778552464', 'jl bumiraya V rt 08 rw 03 no 12 kel. durensawit kec. durensawit Jakarta Timur 13440', '2008-02-25 00:00:00', 'm', '827ccb0eea8a706c4c34a16891f84e7b', '2021-06-26 13:54:01', 'Konsumen', '2021-06-26 13:54:01'),
(10, 'Staff', 'staff@gmail.com', '6285888829', 'Jl Bintara', '2021-06-09 00:00:00', 'm', '827ccb0eea8a706c4c34a16891f84e7b', '2021-06-26 00:00:00', 'Staff', '2021-06-17 00:00:00'),
(11, 'Manager', 'manager@gmail.com', '6286675545', 'Jl Bintara', '2021-06-17 00:00:00', 'm', '827ccb0eea8a706c4c34a16891f84e7b', '2021-06-26 00:00:00', 'Manager', '2021-06-17 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `criteria`
--
ALTER TABLE `criteria`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `criteria_index`
--
ALTER TABLE `criteria_index`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `installment`
--
ALTER TABLE `installment`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `submission`
--
ALTER TABLE `submission`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `submission_quest`
--
ALTER TABLE `submission_quest`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `criteria`
--
ALTER TABLE `criteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `criteria_index`
--
ALTER TABLE `criteria_index`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT untuk tabel `installment`
--
ALTER TABLE `installment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `submission`
--
ALTER TABLE `submission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `submission_quest`
--
ALTER TABLE `submission_quest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
