-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Apr 2021 pada 06.01
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laudry`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `qty` double NOT NULL,
  `total_harga` int(11) DEFAULT NULL,
  `keterangan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail`, `id_transaksi`, `id_paket`, `qty`, `total_harga`, `keterangan`, `created_at`, `updated_at`) VALUES
(16, 21, 1, 3, 36000, 'oke', '2021-04-02 13:33:07', '2021-04-02 13:33:07'),
(17, 22, 1, 2, 24000, 'sip', '2021-04-02 13:39:33', '2021-04-02 13:39:33'),
(18, 23, 1, 2, 24000, 'sa', '2021-04-02 13:50:45', '2021-04-02 13:50:45'),
(19, 24, 1, 2, 24000, 's', '2021-04-02 13:59:45', '2021-04-02 13:59:45'),
(20, 25, 1, 2, 24000, 'sa', '2021-04-02 14:04:58', '2021-04-02 14:04:58'),
(21, 26, 6, 3, 33000, 'oke', '2021-04-02 17:21:41', '2021-04-02 17:21:41'),
(22, 27, 1, 2, 20000, 'weq', '2021-04-02 17:31:03', '2021-04-02 17:31:03'),
(23, 28, 6, 2, 18000, 'asdws', '2021-04-03 01:40:47', '2021-04-03 01:40:47'),
(24, 29, 6, 2, NULL, 'sip', '2021-04-03 02:24:56', '2021-04-03 02:24:56'),
(25, 30, 6, 2, 18000, 'ok', '2021-04-03 02:25:40', '2021-04-03 02:25:40'),
(26, 31, 1, 1, 10000, 'apage', '2021-04-05 00:53:48', '2021-04-05 00:53:48'),
(27, 32, 1, 2, 20000, 'oke', '2021-04-05 01:16:21', '2021-04-05 01:16:21'),
(28, 32, 5, 1, 7000, 'hehew', '2021-04-05 01:23:22', '2021-04-05 01:23:22'),
(29, 39, 6, 3, 27000, 'oke', '2021-04-05 17:55:42', '2021-04-05 17:55:42'),
(30, 39, 8, 2, 20000, 'sip', '2021-04-05 17:56:33', '2021-04-05 17:56:33'),
(31, 43, 6, 3, 27000, 'ok', '2021-04-06 16:40:12', '2021-04-06 16:40:12'),
(32, 43, 8, 2, 20000, 'extra pewangi', '2021-04-06 16:53:01', '2021-04-06 16:53:01'),
(33, 43, 6, 4, 36000, 'mantap', '2021-04-06 16:59:41', '2021-04-06 16:59:41'),
(34, 44, 6, 3, 27000, 'oke', '2021-04-06 17:01:55', '2021-04-06 17:01:55'),
(35, 44, 8, 3, 30000, 'sip', '2021-04-06 17:04:49', '2021-04-06 17:04:49'),
(36, 45, 8, 2, 20000, 'extra pewangi', '2021-04-07 06:55:10', '2021-04-07 06:55:10'),
(37, 45, 6, 2, 18000, 'sip', '2021-04-07 06:57:17', '2021-04-07 06:57:17'),
(38, 46, 6, 4, 36000, 'sad', '2021-04-07 07:12:19', '2021-04-07 07:12:19'),
(39, 46, 8, 2, 20000, 'ewq', '2021-04-07 07:12:24', '2021-04-07 07:12:24'),
(40, 47, 1, 3, 30000, 'sip', '2021-04-07 02:54:51', '2021-04-07 02:54:51'),
(41, 47, 4, 2, 30000, 'sip', '2021-04-07 02:56:10', '2021-04-07 02:56:10'),
(42, 48, 4, 2, 30000, 'sip', '2021-04-07 02:59:00', '2021-04-07 02:59:00'),
(43, 49, 4, 2, 30000, 'sip', '2021-04-07 03:00:21', '2021-04-07 03:00:21'),
(44, 50, 1, 1, 10000, 'das', '2021-04-07 10:08:53', '2021-04-07 10:08:53'),
(45, 53, 6, 1, 9000, 'sip', '2021-04-07 10:12:17', '2021-04-07 10:12:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `id_member` bigint(20) UNSIGNED NOT NULL,
  `nama_member` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_member` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tlp_member` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`id_member`, `nama_member`, `alamat_member`, `jenis_kelamin`, `tlp_member`, `created_at`, `updated_at`) VALUES
(2, 'Rispan', 'Bekasi', 'L', '082256349900', '2021-03-10 08:46:45', '2021-03-10 08:46:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2021_03_08_021610_create_member_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `outlet`
--

CREATE TABLE `outlet` (
  `id_outlet` int(11) NOT NULL,
  `nama_outlet` varchar(100) NOT NULL,
  `alamat_outlet` text NOT NULL,
  `tlp_outlet` varchar(15) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `outlet`
--

INSERT INTO `outlet` (`id_outlet`, `nama_outlet`, `alamat_outlet`, `tlp_outlet`, `created_at`, `updated_at`) VALUES
(1, 'Kartika Wanasari Laundry', 'Cibitung, Kartika Wanasari', '0822563499', '2021-03-09 19:32:33', '2021-03-09 19:32:33'),
(5, 'Cibitung Laundry', 'Bekasi', '083523362', '2021-03-28 08:13:49', '2021-03-28 08:13:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket`
--

CREATE TABLE `paket` (
  `id_paket` int(11) NOT NULL,
  `id_outlet` int(11) NOT NULL,
  `jenis_paket` enum('Kiloan','Selimut','Bed Cover','Kaos','Lain') NOT NULL,
  `nama_paket` varchar(100) NOT NULL,
  `harga_paket` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `paket`
--

INSERT INTO `paket` (`id_paket`, `id_outlet`, `jenis_paket`, `nama_paket`, `harga_paket`, `created_at`, `updated_at`) VALUES
(1, 1, 'Kiloan', 'Paket Hemat', 10000, '2021-03-09 19:38:09', '2021-03-09 19:38:09'),
(4, 1, 'Bed Cover', 'Paket Oce', 15000, '2021-03-26 07:16:52', '2021-03-26 07:16:52'),
(5, 1, 'Bed Cover', 'Paket Keluarga', 7000, '2021-03-27 15:56:23', '2021-03-27 15:56:23'),
(6, 5, 'Selimut', 'Paket Serba Murah', 9000, '2021-03-28 08:15:52', '2021-03-28 08:15:52'),
(8, 5, 'Bed Cover', 'oke oce', 10000, '2021-04-05 06:38:04', '2021-04-05 06:38:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_outlet` int(11) DEFAULT NULL,
  `kode_invoice` varchar(100) DEFAULT NULL,
  `id_member` int(11) DEFAULT NULL,
  `tgl_transaksi` datetime DEFAULT NULL,
  `batas_waktu` datetime DEFAULT NULL,
  `tgl_bayar` datetime DEFAULT NULL,
  `biaya_tambahan` int(11) DEFAULT NULL,
  `diskon_transaksi` double DEFAULT NULL,
  `pajak_transaksi` int(11) DEFAULT NULL,
  `total_bayar` int(11) DEFAULT NULL,
  `status_transaksi` enum('Baru','Proses','Selesai','Diambil') DEFAULT NULL,
  `pembayaran` enum('Dibayar','Belum Dibayar') DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_outlet`, `kode_invoice`, `id_member`, `tgl_transaksi`, `batas_waktu`, `tgl_bayar`, `biaya_tambahan`, `diskon_transaksi`, `pajak_transaksi`, `total_bayar`, `status_transaksi`, `pembayaran`, `id_user`, `created_at`, `updated_at`) VALUES
(21, 1, 'INV/20210402/BC71B19XM', 2, '2021-04-02 20:32:45', '2021-04-02 20:32:00', '2021-04-03 00:31:27', NULL, NULL, NULL, NULL, 'Selesai', 'Dibayar', 3, '2021-04-02 13:32:45', '2021-04-02 13:32:45'),
(22, 1, 'INV/20210402/KDNW77HF4', 2, '2021-04-02 20:39:21', '2021-04-02 20:39:00', '2021-04-06 20:41:45', NULL, NULL, NULL, NULL, 'Proses', 'Dibayar', 3, '2021-04-02 13:39:21', '2021-04-02 13:39:21'),
(23, 1, 'INV/20210402/QW211R6RT', 2, '2021-04-02 20:50:39', '2021-04-02 20:50:00', '2021-04-03 00:31:36', NULL, NULL, NULL, NULL, 'Baru', 'Dibayar', 3, '2021-04-02 13:50:39', '2021-04-02 13:50:39'),
(25, 1, 'INV/20210402/YA2RU200Z', 2, '2021-04-02 21:04:52', '2021-04-02 21:04:00', '2021-04-03 00:31:41', NULL, NULL, NULL, NULL, 'Proses', 'Dibayar', 3, '2021-04-02 14:04:52', '2021-04-02 14:04:52'),
(26, 5, 'INV/20210403/8EZB1SO38', 2, '2021-04-03 00:21:31', '2021-04-03 00:21:00', '2021-04-03 00:22:15', NULL, NULL, NULL, NULL, 'Diambil', 'Dibayar', 3, '2021-04-02 17:21:31', '2021-04-02 17:21:31'),
(27, 1, 'INV/20210403/4R9R8TNGE', 2, '2021-04-03 00:29:54', '2021-04-03 00:29:00', '2021-04-03 00:31:43', NULL, NULL, NULL, NULL, 'Proses', 'Dibayar', 3, '2021-04-02 17:29:54', '2021-04-02 17:29:54'),
(31, 1, 'INV/20210405/3T1QJ34CD', 3, '2021-04-05 07:53:13', '2021-04-07 07:53:00', '2021-04-05 07:54:00', NULL, NULL, NULL, NULL, 'Selesai', 'Dibayar', 3, '2021-04-05 00:53:13', '2021-04-05 00:53:13'),
(32, 1, 'INV/20210405/VH767US8J', 2, '2021-04-05 08:11:08', '2021-04-05 08:11:00', NULL, NULL, NULL, NULL, NULL, 'Selesai', 'Dibayar', 3, '2021-04-05 01:11:08', '2021-04-05 01:11:08'),
(46, 5, 'INV/20210407/AH6ZQPZPA', 2, '2021-04-07 14:12:05', '2021-04-07 14:12:00', NULL, 10000, 20, 2800, 55040, 'Baru', 'Belum Dibayar', 3, NULL, NULL),
(47, 1, 'INV/20210407/9ZEE13MKJ', 2, NULL, '2021-04-07 16:48:00', NULL, NULL, NULL, NULL, NULL, 'Baru', 'Dibayar', 3, '2021-04-07 02:48:48', '2021-04-07 02:48:48'),
(48, 1, 'INV/20210407/HPAIFQ0HB', 2, NULL, '2021-04-07 16:58:00', '2021-04-07 17:07:54', NULL, NULL, NULL, NULL, 'Baru', 'Dibayar', 3, '2021-04-07 02:58:51', '2021-04-07 02:58:51'),
(49, 1, 'INV/20210407/LFHSKQHP2', 2, '2021-04-07 10:00:14', '2021-04-07 17:00:00', '2021-04-07 17:07:13', NULL, NULL, NULL, NULL, 'Selesai', 'Dibayar', 3, '2021-04-07 03:00:14', '2021-04-07 03:00:14'),
(50, 1, 'INV/20210407/NRZLV7LJJ', 2, '2021-04-07 17:08:45', '2021-04-07 17:08:00', NULL, NULL, NULL, NULL, NULL, 'Baru', 'Belum Dibayar', 3, '2021-04-07 10:08:45', '2021-04-07 10:08:45'),
(53, 5, 'INV/20210407/7QAU8K86G', 2, '2021-04-07 17:11:25', '2021-04-07 17:11:00', NULL, NULL, NULL, NULL, NULL, 'Baru', 'Belum Dibayar', 3, '2021-04-07 10:11:25', '2021-04-07 10:11:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_outlet` int(11) DEFAULT NULL,
  `role` enum('admin','kasir','owner') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `id_outlet`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Rispan', 'rispan', 'admin@gmail.com', NULL, '$2y$10$9cz1Bgua9E3xr2cPtDSUb.Kn1gK.De3ZE0PqgbNHoS7sJKcRWHEc2', 1, 'admin', NULL, '2021-03-08 05:58:40', '2021-03-08 05:58:40'),
(4, 'Herlaya', 'rispan566', 'rispanher@gmail.com', NULL, '$2y$10$9cz1Bgua9E3xr2cPtDSUb.Kn1gK.De3ZE0PqgbNHoS7sJKcRWHEc2', 1, 'kasir', NULL, '2021-03-13 08:33:43', '2021-03-13 08:33:43'),
(5, 'Rizfan', 'rizfan', 'rispans@gmail.com', NULL, '$2y$10$hm./ybhtFGdgXPakM8z8ien..PmLYoR2EZcLxUWmWEF2tzklCK74W', 5, 'kasir', NULL, '2021-03-28 08:14:46', '2021-03-28 08:14:46'),
(8, 'Rizfan', 'rispanher', 'rispan@gmail.com', NULL, '$2y$10$xzFb0PjftumJ50ax02caBOMmMLsWwlkGePfqg7VBWlJlucMcuO7fm', 0, 'admin', NULL, '2021-04-05 06:02:46', '2021-04-05 06:02:46');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `outlet`
--
ALTER TABLE `outlet`
  ADD PRIMARY KEY (`id_outlet`);

--
-- Indeks untuk tabel `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `member`
--
ALTER TABLE `member`
  MODIFY `id_member` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `outlet`
--
ALTER TABLE `outlet`
  MODIFY `id_outlet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `paket`
--
ALTER TABLE `paket`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
