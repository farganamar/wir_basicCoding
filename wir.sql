-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2019 at 05:43 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wir`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `status_transaction` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `user_id`, `qty`, `status_transaction`, `created_at`, `updated_at`) VALUES
(4, 1, 19, 1, 1, '2019-04-18 06:36:23', '2019-04-18 06:36:23'),
(5, 1, 19, 3, 1, '2019-04-18 06:36:44', '2019-04-18 06:36:44');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Kosmetik', 'kosmetik', NULL, NULL),
(2, 'Baju', 'baju', NULL, NULL),
(3, 'Buku', 'buku', NULL, NULL),
(4, 'Makanan', 'makanan', NULL, NULL),
(5, 'Perlengkapan Masak', 'perlengkapan-masak', NULL, NULL),
(6, 'Alat Tulis', 'alat-tulis', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(7, '2014_10_12_000000_create_users_table', 1),
(8, '2014_10_12_100000_create_password_resets_table', 1),
(9, '2019_04_11_134050_create_categories_table', 1),
(10, '2019_04_17_011830_add_social_media_login', 1),
(11, '2019_04_17_234607_create_products_table', 1),
(12, '2019_04_17_235155_create_carts_table', 1),
(14, '2019_04_18_001456_add_reward_to_user_table', 2),
(16, '2019_04_18_002240_add_deskripsi_to_product_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `price` double(8,2) NOT NULL,
  `image` longtext COLLATE utf8mb4_unicode_ci,
  `category_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deskripsi` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `qty`, `price`, `image`, `category_id`, `user_id`, `created_at`, `updated_at`, `deskripsi`) VALUES
(1, 'Celana Jeans Levis', '1', 9, 50000.00, 'images/A1_2.jpg', 2, 18, '2019-04-18 03:27:30', '2019-04-18 06:36:44', '## wajib Baca\r\n##Malas baca = Jangan Beli\r\n**Jadilah Cerdas\r\n**Baca Keterangan\r\nReady size 27 sampai 38\r\n\r\nHARAP PERHATIAN BAPAK IBU\r\nKarena sekarang lagi banyak order fashion jadi untuk ukuran silahkan dinaikkan 1 size dari yg biasa dipakai karena barangnya dari konveksi jeans juga begitu\r\n\r\nHARAP BAPAK DAN IBU PAHAMI BAHWA KAMI ADALAH DISTRIBUTOR BUKAN PRODUSEN JADI KAMI TIDAK MENJUAL 1 MERK, KAMI MENJUAL BERBAGAI MERK DARI BERBAGAI KONVEKSI(TIDAK TERIKAT DENGAN 1 KONVEKSI) JADI MERK/BRAND YANG AKAN SAYA KIRIM AKAN SESUAI STOK YANG ADA, TETAPI PRODUKNYA AKAN TETAP SAMA SEPERTI DI POTO(HANYA PERBEDAAN MERK)\r\n\r\nMat : Jeans strecth sakura\r\nVarian : Seperti yang dipoto\r\nBrand : Lee Cooper, Levis, Wlangrer dll Tergantung stok\r\nSize : 27-38\r\nTipe : Long Jeans\r\nBrand : Random\r\nSize Chart\r\n28 lingkar pinggang 76cmn\r\n29 lingkar pinggang 78cm\r\n30 lingkar pinggang 80cm\r\n31 lingkar pinggang 82cm\r\n32 lingkar pinggang 84cm\r\n33 lingkar pinggang 86cm\r\n34 lingkar pinggang 88cm\r\n35 lingkar pinggang 90cm\r\n36 lingkar pinggang 92cm\r\n37 Lingkar pinggang 95cm\r\n38 lingkar pinggang 98cm\r\nPanjang : 95cm-101cm'),
(2, 'Wardah Exclusive Lip Cream - Plum It Up - 4g', '2', 10, 20000.00, 'images/19621304_5310d6da-9848-4f82-bf8c-2b67aefbb7d5.jpg', 1, 18, '2019-04-18 03:30:42', '2019-04-18 04:16:08', 'Lip cream wardah original, untuk pilihan warna silahkan tulis di catatan');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reward` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `jabatan`, `created_at`, `updated_at`, `provider`, `provider_id`, `reward`) VALUES
(1, 'Mr. Waino McClure V', 'woreilly@hotmail.com', NULL, '$2y$10$u.dBAN3lWyxIscxd5bWkKOyhZxnMQkE6xeT7oLrosUnW0oVXaTSk6', NULL, 'merchant', NULL, NULL, NULL, NULL, NULL),
(2, 'Mae Crist', 'montana54@yahoo.com', NULL, '$2y$10$yH81mIdZ2gfg1q2JvEvkIunp0mFnNxu00L.6vK.hUFDwDF41Dj4oy', NULL, 'merchant', NULL, NULL, NULL, NULL, NULL),
(3, 'Suzanne Wintheiser', 'milford54@marquardt.net', NULL, '$2y$10$76ON4dnbAXWC15cP3evKAen0sT.B/6ek7VLw/ubgbVyvd6SGNeeR.', NULL, 'merchant', NULL, NULL, NULL, NULL, NULL),
(4, 'Dr. Kaylee Yundt', 'mbrown@heidenreich.com', NULL, '$2y$10$j4nry9JS0FvTGECtt6YH2OFI0sNvpf8389bjHQwNbE61S2VNWMLPa', NULL, 'merchant', NULL, NULL, NULL, NULL, NULL),
(5, 'Ms. Roselyn Beier', 'haley.michelle@hotmail.com', NULL, '$2y$10$KTfvjD1oj2ZMOHpnQacSRe.XzVjwYHcXxF6tBU1LgppScREfyqIee', NULL, 'merchant', NULL, NULL, NULL, NULL, NULL),
(6, 'Laila Dooley', 'jmills@durgan.org', NULL, '$2y$10$Mqu6QwKok98S32h2EGMb0.v2EdJshQlcXQ.6.vbR95Q9mtDwVow5a', NULL, 'merchant', NULL, NULL, NULL, NULL, NULL),
(7, 'Jorge Beier', 'vdaniel@wintheiser.org', NULL, '$2y$10$wid0O/icfWHcKs9eyFYxNeizn1nKdUXoGgIqrty5C2tExkApRupZi', NULL, 'customer', NULL, NULL, NULL, NULL, NULL),
(8, 'Dalton Boyer', 'idicki@gmail.com', NULL, '$2y$10$udywsUBQkzZE0VFLghGLeu.aBluLiKpmA9xKYlHCubXQsLr5iP3MC', NULL, 'customer', NULL, NULL, NULL, NULL, NULL),
(9, 'Lia Conn', 'luettgen.michel@hotmail.com', NULL, '$2y$10$RcDQV0WqE7fao0lwMfREGObHpjMi/wZYI75Af5Vd.gO/v3EQfPI7C', NULL, 'customer', NULL, NULL, NULL, NULL, NULL),
(10, 'Geovanni Jacobson', 'wwolff@ebert.com', NULL, '$2y$10$3CHh/0nxu6NC/BMmlaL66uTIqGkvc6KbPCeYmMNpqP4oaamTJkES2', NULL, 'customer', NULL, NULL, NULL, NULL, NULL),
(11, 'Heloise Turcotte', 'tokon@bode.com', NULL, '$2y$10$Ql0XSIMx5NWlMkIbYROokeKD6rqJlmGCuznqx3GKiITg1gQZkJ8Ju', NULL, 'customer', NULL, NULL, NULL, NULL, NULL),
(12, 'Vallie Stark', 'harold38@hotmail.com', NULL, '$2y$10$1A7Rix4bnTkt3PLsfv3NxuwoT1LLI5rNOJXwM8srnVd3GO62YlFqG', NULL, 'customer', NULL, NULL, NULL, NULL, NULL),
(13, 'Stefanie Cronin MD', 'mueller.cindy@mann.com', NULL, '$2y$10$iDkxcnAqjbzbb.EcBLPg4.61ytsuLn5Wq0oTE90c/QA6k20UkwRQi', NULL, 'customer', NULL, NULL, NULL, NULL, NULL),
(14, 'Ms. Lavonne Klein', 'abernathy.sherman@hotmail.com', NULL, '$2y$10$NeldlOsL3QnN40CMtVTcuO8xE9WnjHNfoY2.Zs9WuKFnZhee.WFiG', NULL, 'customer', NULL, NULL, NULL, NULL, NULL),
(15, 'Lewis Christiansen', 'mervin.schaefer@vonrueden.com', NULL, '$2y$10$Um2xH2WTwNn.7tj4qjlsZ.qg80.5jK5q4II4TqCXxa/sGmJi0M7Pa', NULL, 'customer', NULL, NULL, NULL, NULL, NULL),
(16, 'Mr. Felton Sipes DDS', 'dax63@yahoo.com', NULL, '$2y$10$p4Bm7Br6YePTCZshg3c9Wu/W/VO22Hu5QQHmkQiyghvDgGBTmOfZG', NULL, 'customer', NULL, NULL, NULL, NULL, NULL),
(17, 'Cassandra Orn', 'sjaskolski@yahoo.com', NULL, '$2y$10$1Rz6IWrCsHajBu0ZdPNchueY./MwmWG1.hn1ES/Qf.sSekvGoe0I.', NULL, 'customer', NULL, NULL, NULL, NULL, NULL),
(18, 'fargan', 'fargan@gmail.com', NULL, '$2y$12$rfBptkG07h34j7V.DzivQuJ34v.cvzo0GJuKhsnYfKuqTAiOz2ci6', 'spyDcPjdNQS4OjEbojX7GWXmWp4BRmfZJoAd1cJ76fPkoTxHc2iXl9TXrDpo', 'merchant', '2019-04-18 00:51:33', '2019-04-18 00:51:33', NULL, NULL, NULL),
(19, 'Fargan Amar', 'amar.fargan@gmail.com', NULL, '$2y$10$tgfNIxQHJnIR9XZF5ZxmauXzeGzVzQSutN3k4ZabH5Ph7O5B8Q5jq', 'Ca879ftUqczt4LvkR3rHo1yqhOZ7IxJJPrVYDjFIvpc3tcDL8cuSWAfsxDu4', 'customer', '2019-04-18 03:55:36', '2019-04-18 06:36:44', 'google', '116271503727092426603', 60),
(20, 'amar', 'fifa19indonesia@gmail.com', NULL, '$2y$10$BJAUGoT5Arpd3oSwoipg.OUSDR.WNTvxbEAemb64U8lGnbM2u658K', 'GVRCkgFFKFcAoiCUqTcg2cLqcbcaoMnrRVj9YskXCSBtJii1VkZVOXzjRvAN', 'merchant', '2019-04-18 07:38:39', '2019-04-18 07:38:39', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_product_id_foreign` (`product_id`),
  ADD KEY `carts_user_id_foreign` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
