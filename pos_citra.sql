-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
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
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_citra.cache: ~0 rows (approximately)

-- Dumping structure for table pos_citra.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_citra.cache_locks: ~0 rows (approximately)

-- Dumping structure for table pos_citra.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
  CONSTRAINT `item_penjualan_penjualan_id_foreign` FOREIGN KEY (`penjualan_id`) REFERENCES `penjualan` (`id`),
  CONSTRAINT `item_penjualan_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_citra.item_penjualan: ~7 rows (approximately)
INSERT INTO `item_penjualan` (`id`, `penjualan_id`, `produk_id`, `kuantitas`, `harga_satuan`, `subtotal`, `created_at`, `updated_at`) VALUES
	(1, 1, 9, 1, 65000, 65000, '2026-09-01 23:28:43', '2026-09-01 23:28:43'),
	(2, 1, 6, 1, 110000, 110000, '2026-09-01 23:28:46', '2026-09-01 23:28:46'),
	(3, 1, 10, 1, 80000, 80000, '2026-09-01 23:28:48', '2026-09-01 23:28:48'),
	(5, 4, 3, 1, 90000, 90000, '2026-09-08 19:49:57', '2026-09-08 19:49:57'),
	(6, 4, 7, 1, 95000, 95000, '2026-09-08 19:49:59', '2026-09-08 19:49:59'),
	(7, 5, 9, 1, 65000, 65000, '2026-09-08 20:50:19', '2026-09-08 20:50:19'),
	(8, 5, 1, 1, 150000, 150000, '2026-09-08 20:50:34', '2026-09-08 20:50:34'),
	(10, 8, 7, 1, 95000, 95000, '2026-09-10 20:02:56', '2026-09-10 20:02:56');

-- Dumping structure for table pos_citra.jenis
CREATE TABLE IF NOT EXISTS `jenis` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_citra.jenis: ~4 rows (approximately)
INSERT INTO `jenis` (`id`, `nama`, `created_at`, `updated_at`) VALUES
	(4, 'atasan', '2026-09-01 22:53:35', '2026-09-01 22:59:47'),
	(5, 'one set', '2026-09-01 22:53:51', '2026-09-01 22:53:51'),
	(6, 'bawahan', '2026-09-01 23:16:38', '2026-09-01 23:16:38'),
	(7, 'sepatu', '2026-09-08 21:03:56', '2026-09-08 21:03:56');

-- Dumping structure for table pos_citra.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_citra.job_batches: ~0 rows (approximately)

-- Dumping structure for table pos_citra.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_citra.migrations: ~9 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_roles_table', 1),
	(2, '0001_01_01_000000_create_users_table', 1),
	(3, '0001_01_01_000001_create_cache_table', 1),
	(4, '0001_01_01_000002_create_jobs_table', 1),
	(5, '2026_04_20_013206_create_jenis_table', 1),
	(6, '2026_04_20_072602_create_produk_table', 1),
	(7, '2026_04_20_073529_create_penjualan_table', 1),
	(8, '2026_04_20_074437_create_item_penjualan_table', 1),
	(9, '2026_09_09_023932_add_uang_dibayar_to_penjualan_table', 2);

-- Dumping structure for table pos_citra.penjualan
CREATE TABLE IF NOT EXISTS `penjualan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `total_pembayaran` int NOT NULL,
  `metode_pembayaran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `uang_dibayar` int DEFAULT NULL,
  `status` enum('OPEN','COMPLETED') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `penjualan_user_id_foreign` (`user_id`),
  CONSTRAINT `penjualan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_citra.penjualan: ~4 rows (approximately)
INSERT INTO `penjualan` (`id`, `user_id`, `total_pembayaran`, `metode_pembayaran`, `uang_dibayar`, `status`, `created_at`, `updated_at`) VALUES
	(1, 6, 255000, 'QRIS', NULL, 'COMPLETED', '2026-09-01 23:17:24', '2026-09-01 23:28:54'),
	(4, 6, 185000, 'CASH', 200000, 'COMPLETED', '2026-09-08 19:49:30', '2026-09-08 19:50:22'),
	(5, 6, 215000, 'CASH', 215000, 'COMPLETED', '2026-09-08 20:50:02', '2026-09-08 20:51:00'),
	(8, 6, 95000, 'CASH', NULL, 'OPEN', '2026-09-10 20:00:57', '2026-09-10 20:02:56');

-- Dumping structure for table pos_citra.produk
CREATE TABLE IF NOT EXISTS `produk` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `jenis_id` bigint unsigned NOT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_beli` int NOT NULL,
  `harga_jual` int NOT NULL,
  `stok` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `produk_user_id_foreign` (`user_id`),
  KEY `produk_jenis_id_foreign` (`jenis_id`),
  KEY `produk_nama_index` (`nama`),
  CONSTRAINT `produk_jenis_id_foreign` FOREIGN KEY (`jenis_id`) REFERENCES `jenis` (`id`) ON DELETE CASCADE,
  CONSTRAINT `produk_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_citra.produk: ~0 rows (approximately)
INSERT INTO `produk` (`id`, `user_id`, `jenis_id`, `foto`, `nama`, `harga_beli`, `harga_jual`, `stok`, `created_at`, `updated_at`) VALUES
	(1, 6, 5, 'products/EMtqHEKbwo1gmNDWVPRhMAgtJEyMgDSi8PZBRznc.jpg', 'Navy Button-Up & Baggy Jeans', 100000, 150000, 49, '2026-09-01 23:02:43', '2026-09-08 20:50:34'),
	(2, 6, 4, 'products/pW8QaEuzN973jmOoqUxz7AfKh2mkJYHKbYRUY5wv.jpg', 'crochet sweater', 50000, 70000, 50, '2026-09-01 23:07:53', '2026-09-01 23:07:53'),
	(3, 6, 5, 'products/LosmeUab2uHY38cJaauSaobkuieXSupN0FjWW4Qj.jpg', 'Blue Abaya', 70000, 90000, 59, '2026-09-01 23:09:11', '2026-09-08 19:49:57'),
	(4, 6, 4, 'products/TM6J7M39Cx3mxmw5Lax6n7iffiJX4A1w2utQ0eH9.jpg', 'Batik', 50000, 65000, 60, '2026-09-01 23:13:39', '2026-09-06 22:03:15'),
	(5, 6, 4, 'products/qps3ISwvjfavxLQkJetQANxO8UGCOTXtVlslNdrY.png', 'Crop top', 30000, 45000, 50, '2026-09-01 23:15:20', '2026-09-06 21:56:46'),
	(6, 6, 6, 'products/lfpJyUk0jphg55EJqTwbNeSnhgqm8whEi2Jtud8O.png', 'Jeans', 98000, 110000, 74, '2026-09-01 23:17:17', '2026-09-06 21:58:18'),
	(7, 6, 6, 'products/WAfQSK2ILnE8k5sChV0bo08wxaKcUtnfFP24UqN9.jpg', 'Cargo', 80000, 95000, 52, '2026-09-01 23:18:06', '2026-09-10 20:02:56'),
	(8, 6, 4, 'products/QXn7t97fyiC7j68ueyswrn9HGbfZMbTgwocxBA1K.jpg', 'Sweater', 40000, 50000, 45, '2026-09-01 23:19:42', '2026-09-01 23:19:42'),
	(9, 6, 4, 'products/msTwEh0JqDZw7tqaw6AYYOjuIR9HU8MFAb2zkb2Y.jpg', 'Polo crop', 50000, 65000, 46, '2026-09-01 23:25:44', '2026-09-08 20:50:19'),
	(10, 6, 5, 'products/YBM0Z5cxQScs6SclNJAPTAE9D3hWOCE4LpkTZZrn.jpg', 'Long frock', 60000, 80000, 87, '2026-09-01 23:28:20', '2026-09-01 23:28:48'),
	(11, 6, 7, 'products/pa21BfxgalYiXMaJK5Labxc4GyPUXz03dWSkTcEB.jpg', 'chunky Mary Jane', 60000, 75000, 55, '2026-09-08 21:04:35', '2026-09-10 19:54:49'),
	(12, 6, 7, 'products/Yi5LEQlvugqkKWTC6JK9xYZ32dXsX1VsamuhKURT.jpg', 'low heel', 60000, 75000, 60, '2026-09-08 21:05:31', '2026-09-08 21:05:31'),
	(13, 6, 7, 'products/gGOjCeeWkfKUkB1KKflWAGJQsMzS51uYEqtw4MQz.jpg', 'Mary Jane Puma coklat', 60000, 85000, 45, '2026-09-08 21:11:28', '2026-09-08 21:11:28'),
	(14, 6, 7, 'products/74a1jO93vBTaGV5MKfCEyFtq6u8J3qahT3aPXgJk.jpg', 'platform ankle boots', 85000, 100000, 67, '2026-09-08 21:12:34', '2026-09-08 21:12:34');

-- Dumping structure for table pos_citra.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_citra.roles: ~0 rows (approximately)
INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'admin', '2026-09-01 19:59:59', '2026-09-01 19:59:59'),
	(2, 'kasir', '2026-09-01 19:59:59', '2026-09-01 19:59:59');

-- Dumping structure for table pos_citra.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_citra.sessions: ~0 rows (approximately)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('0AJqR7gxUZ7IvHElGolQ8uinbcbTSgw3x48qbLU4', 6, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUG1SS1lJNTlLU0hXT0NpemxEUXpNSFBNc1NJemF3Y3FWRXlSa3VQaSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9qZW5pcyI7czo1OiJyb3V0ZSI7czoxMToiamVuaXMuaW5kZXgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo2O30=', 1789098042),
	('lgD9D05UFkQmKNe7JCNQyNJctCe2sY4MJWSEjbjf', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiYXd6Y21sZG1neEp0aDBBNWR3YXVTd2lmYW5xWVk2WEQ0OWtJSzhTMCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozODoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL3Blbmp1YWxhbi9jcmVhdGUiO31zOjk6Il9wcmV2aW91cyI7YToyOntzOjM6InVybCI7czoyNzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2xvZ2luIjtzOjU6InJvdXRlIjtzOjU6ImxvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1789094949);

-- Dumping structure for table pos_citra.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `role_id` bigint unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`),
  FULLTEXT KEY `users_name_email_fulltext` (`name`,`email`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_citra.users: ~2 rows (approximately)
INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(6, 1, 'citra', 'citra@gmail.com', NULL, '$2y$12$quwgJrU0idjQil78fmJlE.3QbB9VPZCWO1fkI1OrPDWcSlnuUuNm6', NULL, '2026-09-01 20:32:36', '2026-09-01 20:32:36'),
	(7, 2, 'ibannn', 'ibannn@gmail.com', NULL, '$2y$12$5/ga8d7wgXZwT4d8xhHktut6V2H5BegvHEY6OIS7E.p0/4v5UBqB.', NULL, '2026-09-01 22:52:34', '2026-09-01 22:52:34');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
