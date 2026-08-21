-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.4.3 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for pos_citra
CREATE DATABASE IF NOT EXISTS `pos_citra` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `pos_citra`;

-- Dumping structure for table pos_citra.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_citra.cache: ~0 rows (approximately)

-- Dumping structure for table pos_citra.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_citra.cache_locks: ~0 rows (approximately)

-- Dumping structure for table pos_citra.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_citra.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table pos_citra.item_penjualan
CREATE TABLE IF NOT EXISTS `item_penjualan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `penjualan_id` bigint unsigned NOT NULL,
  `produk_id` bigint unsigned NOT NULL,
  `kuantitas` int NOT NULL,
  `harga_satuan` int NOT NULL,
  `subtotal` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `item_penjualan_penjualan_id_foreign` (`penjualan_id`),
  KEY `item_penjualan_produk_id_foreign` (`produk_id`),
  CONSTRAINT `item_penjualan_penjualan_id_foreign` FOREIGN KEY (`penjualan_id`) REFERENCES `penjualan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `item_penjualan_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_citra.item_penjualan: ~17 rows (approximately)
INSERT INTO `item_penjualan` (`id`, `penjualan_id`, `produk_id`, `kuantitas`, `harga_satuan`, `subtotal`, `created_at`, `updated_at`) VALUES
	(3, 3, 3, 2, 800000, 1600000, '2026-07-26 19:12:40', '2026-07-26 19:12:42'),
	(5, 3, 2, 5, 700000, 3500000, '2026-07-26 19:12:55', '2026-07-26 19:12:55'),
	(6, 4, 3, 2, 800000, 1600000, '2026-07-26 19:58:56', '2026-07-26 19:58:56'),
	(8, 6, 4, 1, 500000, 500000, '2026-07-30 21:15:57', '2026-07-30 21:15:57'),
	(9, 6, 3, 1, 600000, 600000, '2026-07-30 21:16:00', '2026-07-30 21:16:00'),
	(10, 6, 2, 1, 800000, 800000, '2026-07-30 21:16:02', '2026-07-30 21:16:02'),
	(12, 7, 4, 2, 500000, 1000000, '2026-08-02 21:13:32', '2026-08-02 21:13:32'),
	(14, 7, 3, 2, 600000, 1200000, '2026-08-02 21:13:42', '2026-08-02 21:13:42'),
	(15, 7, 2, 2, 800000, 1600000, '2026-08-02 21:13:47', '2026-08-02 21:13:47'),
	(17, 12, 2, 1, 800000, 800000, '2026-08-10 18:51:49', '2026-08-10 18:51:49'),
	(18, 12, 8, 1, 500000, 500000, '2026-08-10 18:51:57', '2026-08-10 18:51:57'),
	(19, 12, 7, 1, 300000, 300000, '2026-08-10 18:52:01', '2026-08-10 18:52:01'),
	(20, 13, 6, 1, 350000, 350000, '2026-08-10 18:54:18', '2026-08-10 18:54:18'),
	(21, 13, 3, 1, 600000, 600000, '2026-08-10 18:54:22', '2026-08-10 18:54:22'),
	(22, 13, 8, 1, 500000, 500000, '2026-08-10 18:54:24', '2026-08-10 18:54:24'),
	(25, 18, 5, 1, 400000, 400000, '2026-08-17 18:31:20', '2026-08-17 18:31:20'),
	(26, 18, 6, 1, 350000, 350000, '2026-08-17 18:31:21', '2026-08-17 18:31:21'),
	(27, 19, 5, 1, 400000, 400000, '2026-08-17 18:31:35', '2026-08-17 18:31:35'),
	(28, 19, 6, 1, 350000, 350000, '2026-08-17 18:31:36', '2026-08-17 18:31:36');

-- Dumping structure for table pos_citra.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_citra.jobs: ~0 rows (approximately)

-- Dumping structure for table pos_citra.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_citra.job_batches: ~0 rows (approximately)

-- Dumping structure for table pos_citra.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_citra.migrations: ~0 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_roles_table', 1),
	(2, '0001_01_01_000000_create_users_table', 1),
	(3, '0001_01_01_000001_create_cache_table', 1),
	(4, '0001_01_01_000002_create_jobs_table', 1),
	(5, '2026_04_20_072602_create_produk_table', 1),
	(6, '2026_04_20_073529_create_penjualan_table', 1),
	(7, '2026_04_20_074437_create_item_penjualan_table', 1);

-- Dumping structure for table pos_citra.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_citra.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table pos_citra.penjualan
CREATE TABLE IF NOT EXISTS `penjualan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `total_pembayaran` int NOT NULL,
  `metode_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('OPEN','COMPLETED') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `penjualan_user_id_foreign` (`user_id`),
  CONSTRAINT `penjualan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_citra.penjualan: ~10 rows (approximately)
INSERT INTO `penjualan` (`id`, `user_id`, `total_pembayaran`, `metode_pembayaran`, `status`, `created_at`, `updated_at`) VALUES
	(1, 1, 200000, 'CASH', 'COMPLETED', '2026-07-22 21:49:04', '2026-07-22 21:49:23'),
	(2, 1, 50000, 'QRIS', 'COMPLETED', '2026-07-22 21:49:31', '2026-07-22 21:49:43'),
	(3, 1, 5100000, 'CASH', 'COMPLETED', '2026-07-26 19:12:37', '2026-07-26 19:13:13'),
	(4, 1, 1600000, 'QRIS', 'COMPLETED', '2026-07-26 19:58:51', '2026-07-26 19:59:04'),
	(6, 1, 1900000, 'QRIS', 'COMPLETED', '2026-07-30 21:15:54', '2026-07-30 21:16:08'),
	(7, 7, 3800000, 'QRIS', 'COMPLETED', '2026-08-02 20:52:58', '2026-08-02 21:13:55'),
	(12, 1, 1600000, 'QRIS', 'COMPLETED', '2026-08-10 18:18:41', '2026-08-10 18:52:09'),
	(13, 8, 1450000, 'CASH', 'COMPLETED', '2026-08-10 18:54:14', '2026-08-10 18:54:29'),
	(18, 1, 750000, 'QRIS', 'COMPLETED', '2026-08-17 18:31:18', '2026-08-17 18:31:28'),
	(19, 1, 750000, 'CASH', 'OPEN', '2026-08-17 18:31:34', '2026-08-17 18:31:36');

-- Dumping structure for table pos_citra.produk
CREATE TABLE IF NOT EXISTS `produk` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_beli` int NOT NULL,
  `harga_jual` int NOT NULL,
  `stok` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `produk_nama_index` (`nama`),
  KEY `produk_user_id_foreign` (`user_id`),
  CONSTRAINT `produk_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_citra.produk: ~7 rows (approximately)
INSERT INTO `produk` (`id`, `user_id`, `foto`, `nama`, `harga_beli`, `harga_jual`, `stok`, `created_at`, `updated_at`) VALUES
	(2, 1, 'products/Z8WLHk6rXCx538dyR8nfavUG3eztqo0zgIcBKws1.jpg', 'Bunga Tulip', 500000, 800000, 26, '2026-07-26 19:10:39', '2026-08-10 18:51:49'),
	(3, 1, 'products/tBqNomoQYcNWEyyWoCW8oqTRYV1uowczb58kJ4yj.jpg', 'Bunga Mawar', 400000, 600000, 19, '2026-07-26 19:12:02', '2026-08-10 18:54:22'),
	(4, 7, 'products/bHAAMuAqPiPYK1jexdY8JGLxBsqYemepBvhzNGPi.jpg', 'Bunga Matahari', 300000, 500000, 37, '2026-07-26 23:10:34', '2026-08-02 21:13:32'),
	(5, 1, 'products/tGGWGiCtmWfWGN0WGvLbw0vvA6mZhC8NKqHiWyVn.jpg', 'Bunga Dahlia', 300000, 400000, 23, '2026-08-02 21:18:05', '2026-08-17 18:31:35'),
	(6, 1, 'products/UzciL91nvQFT2KJVyvlfl6aOrCcd99DnaBgP0D7p.jpg', 'Bunga Daisy', 200000, 350000, 27, '2026-08-02 21:20:36', '2026-08-17 18:31:36'),
	(7, 1, 'products/plmUvavkvuKWjtOgaHlXBrEAZimeauwG6ldQLWjv.jpg', 'Bunga Lavender', 200000, 300000, 24, '2026-08-10 18:49:11', '2026-08-10 18:52:01'),
	(8, 1, 'products/FdfhqfHqXjYKkF8FFo15pmv1HswGbK4qj4ztPuoV.jpg', 'Bunga Sakura', 300000, 500000, 28, '2026-08-10 18:49:49', '2026-08-10 18:54:24');

-- Dumping structure for table pos_citra.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_citra.roles: ~2 rows (approximately)
INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'admin', '2026-07-22 19:04:22', '2026-07-22 19:04:22'),
	(2, 'kasir', '2026-07-22 19:04:22', '2026-07-22 19:04:22');

-- Dumping structure for table pos_citra.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_citra.sessions: ~1 rows (approximately)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('3EdYxuRIfkaumHOnpqiFs3N7i7tRbn88q4X70Pxj', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicDBWazZTN0M0TGo2QTVCcE1vdXhLeXZHc1VYeUJRVjdmMnJFYnhjZSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO3M6NToicm91dGUiO3M6OToiZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1787197023),
	('e6c8szNufjpU6VSjvZWQqEp9C7pD3Cwvxw0uUHXd', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNm1lSTVmN2RTYm9KdnJ5ODhOR1hzYzFsU3NnMkZIaENhZXQ2N2NMcSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7czo1OiJyb3V0ZSI7czo1OiJsb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1787199377),
	('Js6BRgrwpGK8I8HVWFoEIq5441NhUMajpHKIWrmr', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiaEdJcDNCWmRIaUdpY0EyR2xROUJyVU1aMklNNVdZSU1EbElVTjl0aSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyODoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL3Byb2R1ayI7fXM6OToiX3ByZXZpb3VzIjthOjI6e3M6MzoidXJsIjtzOjI3OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvbG9naW4iO3M6NToicm91dGUiO3M6NToibG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1787209057),
	('uTbMuAcEIIoQo7Azj07HBpUwD1Hc3DMJHRWcAoGY', 7, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMWswZE5SdkFxVU1sSlJXUWtuRXNBUjRyekVzYkdlbjBhRE9FMTZjYSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9kdWsiO3M6NToicm91dGUiO3M6MTI6InByb2R1ay5pbmRleCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjc7fQ==', 1787208625);

-- Dumping structure for table pos_citra.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `role_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`),
  FULLTEXT KEY `users_name_email_fulltext` (`name`,`email`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_citra.users: ~4 rows (approximately)
INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Madelyn Emard', 'rolfson.litzy@example.com', '2026-07-22 19:04:22', '$2y$12$TSyRQx40oqgCp9dJv4PysOEpAF4f/ekQ254t/SWwsWH8vMlWPpA6i', 'uK4HMvFv4uIeZ0YTniLw0ugW1xc1LN6k1WHKfUY9T2ecapC7djy0T48yYifV', '2026-07-22 19:04:22', '2026-07-22 19:04:22'),
	(3, 2, 'Prof. Lamont Goldner V', 'rbergnaum@example.org', '2026-07-22 19:04:22', '$2y$12$TSyRQx40oqgCp9dJv4PysOEpAF4f/ekQ254t/SWwsWH8vMlWPpA6i', 'igEjFG4lCv', '2026-07-22 19:04:22', '2026-07-22 19:04:22'),
	(7, 1, 'citra', 'citra@gmail.com', NULL, '$2y$12$C6dtb0e4rAYyTnR8airinOYwNNeMEkWdShDd2wT1NHALeC881xm/S', NULL, '2026-07-26 20:02:25', '2026-07-26 20:02:25'),
	(8, 2, 'ctra', 'ctra@gmail.com', NULL, '$2y$12$3dJDaeO/G/0Xql7MW8OEvOy3wwcAz9PRJHgrm1AQNQFikosxiwEEC', NULL, '2026-07-30 20:03:33', '2026-08-02 21:01:17');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
