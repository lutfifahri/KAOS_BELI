-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Feb 2023 pada 01.56
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
-- Database: `laravelkolboreka`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sticker_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(2, 'Baju', 'public/category/k8lefyo69RYaJWqcQvdyKYJ5hewiLjLhZdUXh2KR.png', '2023-02-16 00:51:47', '2023-02-16 00:53:14'),
(3, 'Celana', 'public/category/a76IOAnvFPUapMowPL953YLjzcf7lwgeEQ0ZRM4J.png', '2023-02-16 00:52:05', '2023-02-16 00:53:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2023_02_02_155922_create_printings_table', 1),
(3, '2023_02_02_160011_create_stickers_table', 1),
(4, '2023_02_02_160100_create_products_table', 1),
(5, '2023_02_02_160111_create_transactions_table', 1),
(6, '2023_02_02_160125_create_transaction_details_table', 1),
(7, '2023_02_02_160227_create_users_table', 1),
(8, '2023_02_02_162203_create_categories_table', 1),
(9, '2023_02_03_000537_create_carts_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `printings`
--

CREATE TABLE `printings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `printings`
--

INSERT INTO `printings` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Hendra Cakrajiya Saptono S.E.', '2023-02-16 00:40:49', '2023-02-16 00:40:49'),
(2, 'Ghani Balidin Nababan', '2023-02-16 00:40:49', '2023-02-16 00:40:49'),
(3, 'Bagus Natsir S.Pd', '2023-02-16 00:40:50', '2023-02-16 00:40:50'),
(4, 'Jail Maheswara S.Gz', '2023-02-16 00:40:50', '2023-02-16 00:40:50'),
(5, 'Lala Astuti', '2023-02-16 00:40:50', '2023-02-16 00:40:50'),
(6, 'Adinata Maman Budiyanto S.IP', '2023-02-16 00:40:50', '2023-02-16 00:40:50'),
(7, 'Harja Saefullah', '2023-02-16 00:40:50', '2023-02-16 00:40:50'),
(8, 'Ikin Pradipta', '2023-02-16 00:40:50', '2023-02-16 00:40:50'),
(9, 'Wage Praba Nainggolan', '2023-02-16 00:40:50', '2023-02-16 00:40:50'),
(10, 'Patricia Wastuti M.Farm', '2023-02-16 00:40:50', '2023-02-16 00:40:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `printing_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `price` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `printing_id`, `category_id`, `price`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 65226, '2023-02-16 00:52:38', '2023-02-16 00:52:38'),
(2, 7, 3, 92461, '2023-02-16 00:52:38', '2023-02-16 00:52:38'),
(3, 1, 2, 73910, '2023-02-16 00:52:38', '2023-02-16 00:52:38'),
(4, 9, 3, 30646, '2023-02-16 00:52:38', '2023-02-16 00:52:38'),
(5, 3, 2, 85905, '2023-02-16 00:52:38', '2023-02-16 00:52:38'),
(6, 9, 2, 67287, '2023-02-16 00:52:38', '2023-02-16 00:52:38'),
(7, 8, 3, 90752, '2023-02-16 00:52:38', '2023-02-16 00:52:38'),
(8, 2, 2, 89503, '2023-02-16 00:52:38', '2023-02-16 00:52:38'),
(9, 5, 2, 88549, '2023-02-16 00:52:38', '2023-02-16 00:52:38'),
(10, 2, 3, 65526, '2023-02-16 00:52:38', '2023-02-16 00:52:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stickers`
--

CREATE TABLE `stickers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double DEFAULT NULL,
  `bank` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `stickers`
--

INSERT INTO `stickers` (`id`, `name`, `image`, `price`, `bank`, `account_number`, `created_at`, `updated_at`) VALUES
(1, 'Putri Anggraini S.T.', NULL, 66253, NULL, NULL, '2023-02-16 00:40:51', '2023-02-16 00:40:51'),
(2, 'Dartono Setiawan', NULL, 94352, NULL, NULL, '2023-02-16 00:40:51', '2023-02-16 00:40:51'),
(3, 'Budi Prabowo S.Pd', NULL, 23495, NULL, NULL, '2023-02-16 00:40:51', '2023-02-16 00:40:51'),
(4, 'Teddy Tarihoran', NULL, 80149, NULL, NULL, '2023-02-16 00:40:51', '2023-02-16 00:40:51'),
(5, 'Pranawa Dongoran', NULL, 48387, NULL, NULL, '2023-02-16 00:40:51', '2023-02-16 00:40:51'),
(6, 'Zizi Lili Nuraini', NULL, 96069, NULL, NULL, '2023-02-16 00:40:51', '2023-02-16 00:40:51'),
(7, 'Eka Farida', NULL, 32864, NULL, NULL, '2023-02-16 00:40:51', '2023-02-16 00:40:51'),
(8, 'Bakiman Firmansyah S.Psi', NULL, 89943, NULL, NULL, '2023-02-16 00:40:51', '2023-02-16 00:40:51'),
(9, 'Malika Pudjiastuti', NULL, 55999, NULL, NULL, '2023-02-16 00:40:51', '2023-02-16 00:40:51'),
(10, 'Bagas Mahendra', NULL, 83540, NULL, NULL, '2023-02-16 00:40:51', '2023-02-16 00:40:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transactions`
--

INSERT INTO `transactions` (`id`, `number`, `name`, `email`, `phone`, `city`, `address`, `created_at`, `updated_at`) VALUES
(1, '8376288', 'Kamaria Lala Palastri M.Pd', 'agustina.sabrina@laksita.info', '0318 5143 5015', 'Magelang', 'Dk. Perintis Kemerdekaan No. 858', '2023-02-16 00:52:39', '2023-02-16 00:52:39'),
(2, '5321963', 'Raina Ulya Laksmiwati S.IP', 'ellis95@hidayat.or.id', '0896 367 730', 'Pontianak', 'Ki. Raden Saleh No. 411', '2023-02-16 00:52:39', '2023-02-16 00:52:39'),
(3, '8850872', 'Sakura Genta Nurdiyanti', 'kacung97@puspasari.mil.id', '(+62) 649 3439 640', 'Balikpapan', 'Kpg. Gardujati No. 937', '2023-02-16 00:52:40', '2023-02-16 00:52:40'),
(4, '7339004', 'Vicky Farah Pudjiastuti', 'zelaya.hassanah@wibowo.asia', '(+62) 687 0360 910', 'Administrasi Jakarta Selatan', 'Jr. Raya Ujungberung No. 691', '2023-02-16 00:52:40', '2023-02-16 00:52:40'),
(5, '6295133', 'Putri Suartini', 'rajasa.galuh@gmail.com', '(+62) 28 6721 318', 'Bandar Lampung', 'Ki. Batako No. 965', '2023-02-16 00:52:40', '2023-02-16 00:52:40'),
(6, '688941', 'Kani Suartini', 'thutapea@yahoo.com', '(+62) 386 9237 2894', 'Solok', 'Ds. Sampangan No. 528', '2023-02-16 00:52:40', '2023-02-16 00:52:40'),
(7, '4861274', 'Lasmanto Budiyanto S.E.', 'zwastuti@farida.ac.id', '0807 5125 414', 'Medan', 'Ds. Kebangkitan Nasional No. 687', '2023-02-16 00:52:40', '2023-02-16 00:52:40'),
(8, '8634309', 'Ira Kartika Laksmiwati', 'hjailani@winarsih.co.id', '0426 0092 6215', 'Prabumulih', 'Kpg. Veteran No. 237', '2023-02-16 00:52:41', '2023-02-16 00:52:41'),
(9, '6521212', 'Nadine Purnawati S.Sos', 'jaswadi96@firmansyah.tv', '(+62) 310 4184 9700', 'Surabaya', 'Kpg. Padma No. 878', '2023-02-16 00:52:41', '2023-02-16 00:52:41'),
(10, '9098904', 'Rini Widya Laksita', 'suartini.rahmat@rahayu.tv', '(+62) 569 2437 697', 'Jayapura', 'Psr. Gajah Mada No. 638', '2023-02-16 00:52:41', '2023-02-16 00:52:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction_details`
--

CREATE TABLE `transaction_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sticker_id` bigint(20) UNSIGNED DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_product` double DEFAULT NULL,
  `price_sticker` double DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transaction_details`
--

INSERT INTO `transaction_details` (`id`, `transaction_id`, `product_id`, `sticker_id`, `image`, `price_product`, `price_sticker`, `qty`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 2, NULL, 85905, 94352, 3, '2023-02-16 00:52:39', '2023-02-16 00:52:39'),
(2, 1, 4, 5, NULL, 30646, 48387, 4, '2023-02-16 00:52:39', '2023-02-16 00:52:39'),
(3, 1, 4, 1, NULL, 30646, 66253, 1, '2023-02-16 00:52:39', '2023-02-16 00:52:39'),
(4, 1, 4, 9, NULL, 30646, 55999, 2, '2023-02-16 00:52:39', '2023-02-16 00:52:39'),
(5, 2, 10, 3, NULL, 65526, 23495, 1, '2023-02-16 00:52:40', '2023-02-16 00:52:40'),
(6, 2, 8, 7, NULL, 89503, 32864, 4, '2023-02-16 00:52:40', '2023-02-16 00:52:40'),
(7, 3, 6, 10, NULL, 67287, 83540, 2, '2023-02-16 00:52:40', '2023-02-16 00:52:40'),
(8, 4, 7, 6, NULL, 90752, 96069, 1, '2023-02-16 00:52:40', '2023-02-16 00:52:40'),
(9, 4, 9, 7, NULL, 88549, 32864, 3, '2023-02-16 00:52:40', '2023-02-16 00:52:40'),
(10, 4, 5, 8, NULL, 85905, 89943, 4, '2023-02-16 00:52:40', '2023-02-16 00:52:40'),
(11, 5, 2, 3, NULL, 92461, 23495, 3, '2023-02-16 00:52:40', '2023-02-16 00:52:40'),
(12, 5, 3, 1, NULL, 73910, 66253, 3, '2023-02-16 00:52:40', '2023-02-16 00:52:40'),
(13, 6, 9, 6, NULL, 88549, 96069, 1, '2023-02-16 00:52:40', '2023-02-16 00:52:40'),
(14, 6, 1, 6, NULL, 65226, 96069, 1, '2023-02-16 00:52:40', '2023-02-16 00:52:40'),
(15, 6, 1, 10, NULL, 65226, 83540, 5, '2023-02-16 00:52:40', '2023-02-16 00:52:40'),
(16, 7, 5, 8, NULL, 85905, 89943, 5, '2023-02-16 00:52:40', '2023-02-16 00:52:40'),
(17, 7, 6, 5, NULL, 67287, 48387, 3, '2023-02-16 00:52:40', '2023-02-16 00:52:40'),
(18, 7, 8, 1, NULL, 89503, 66253, 1, '2023-02-16 00:52:40', '2023-02-16 00:52:40'),
(19, 8, 1, 2, NULL, 65226, 94352, 1, '2023-02-16 00:52:41', '2023-02-16 00:52:41'),
(20, 8, 7, 9, NULL, 90752, 55999, 1, '2023-02-16 00:52:41', '2023-02-16 00:52:41'),
(21, 9, 6, 2, NULL, 67287, 94352, 1, '2023-02-16 00:52:41', '2023-02-16 00:52:41'),
(22, 10, 2, 6, NULL, 92461, 96069, 3, '2023-02-16 00:52:41', '2023-02-16 00:52:41'),
(23, 10, 9, 7, NULL, 88549, 32864, 5, '2023-02-16 00:52:41', '2023-02-16 00:52:41'),
(24, 10, 5, 5, NULL, 85905, 48387, 2, '2023-02-16 00:52:41', '2023-02-16 00:52:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', '$2y$10$btpp80rJXzfEvzsCy6ca7.J9ZuJVsOYVEtca9iPADwxdktQCcbgvi', '2023-02-16 00:48:54', '2023-02-16 00:48:54');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `printings`
--
ALTER TABLE `printings`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `stickers`
--
ALTER TABLE `stickers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `printings`
--
ALTER TABLE `printings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `stickers`
--
ALTER TABLE `stickers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `transaction_details`
--
ALTER TABLE `transaction_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
