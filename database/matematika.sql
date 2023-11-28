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


-- Dumping database structure for matematika
CREATE DATABASE IF NOT EXISTS `matematika` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `matematika`;

-- Dumping structure for table matematika.failed_jobs
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
);

-- Dumping data for table matematika.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table matematika.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ;

-- Dumping data for table matematika.migrations: ~5 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2023_10_11_104833_create_soal_table', 1),
	(7, '2014_10_12_000000_create_users_table', 2);

-- Dumping structure for table matematika.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
);

-- Dumping data for table matematika.password_resets: ~0 rows (approximately)

-- Dumping structure for table matematika.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
);

-- Dumping data for table matematika.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table matematika.soal
CREATE TABLE IF NOT EXISTS `soal` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `soal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ops_a` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ops_b` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ops_c` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ops_d` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penjelasan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table matematika.soal: ~1 rows (approximately)
INSERT INTO `soal` (`id`, `soal`, `ops_a`, `ops_b`, `ops_c`, `ops_d`, `answer`, `penjelasan`, `image`, `created_at`, `updated_at`) VALUES
	(1, '2x + y = 6, x + 2y = 6', 'x = 2 & y = 2', 'x = 3 & y = 1', 'x = 1 & y = -2', 'x = -2 & y = -2', 'A', '<p>1. Metode Eliminasi:</p>\r\n<p>Eliminasikan nilai X</p>\r\n<p>2x + y = 6 | 1 | <s>2x</s> + y = 6</p>\r\n<p>x + 2y = 6 | 2 | <span style="text-decoration: underline;"><s>2x</s> + 4y = 12&nbsp; -</span></p>\r\n<p style="padding-left: 120px;">&nbsp; &nbsp; -3y = -6</p>\r\n<p style="padding-left: 80px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; y = -6/-3</p>\r\n<p style="padding-left: 120px;">&nbsp; &nbsp; &nbsp; &nbsp;y = 2</p>\r\n<p>Eliminasi nilai Y</p>\r\n<p>2x + y = 6 | 2 | 4x + <s>2y</s> = 12</p>\r\n<p>x + 2y = 6 | 1 |&nbsp;<span style="text-decoration: underline;">x + <s>2y</s>&nbsp; &nbsp;= 6&nbsp; -</span></p>\r\n<p style="padding-left: 120px;">&nbsp; &nbsp; &nbsp; 3x = 6</p>\r\n<p style="padding-left: 80px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; x = 6/3</p>\r\n<p style="padding-left: 120px;">&nbsp; &nbsp; &nbsp; &nbsp;x = 2</p>\r\n<p>Maka nilai X dan Y adalah (2, 2)</p>\r\n<p>&nbsp;</p>\r\n<p>2. Metode Subtitusi</p>\r\n<p>2x + y = 6&nbsp;</p>\r\n<p>x + 2y = 6&nbsp; ---&gt; x = 6 - 2y</p>\r\n<p>Subtitusikan nilai X ke persamaan 1</p>\r\n<p>2x + y = 6</p>\r\n<p>2(6-2y) + y = 6</p>\r\n<p>12 - 4y + y = 6</p>\r\n<p style="padding-left: 40px;">&nbsp; &nbsp; -3y = 6 - 12</p>\r\n<p style="padding-left: 40px;">&nbsp; &nbsp; &nbsp; &nbsp;y = -6 / -3 = 2</p>\r\n<p>Subtitusikan nilai y ke persamaan x = 6 - 2y</p>\r\n<p>x = 6 - 2y</p>\r\n<p>x = 6 - 2(2)</p>\r\n<p>x = 6 - 4 = 2</p>\r\n<p>Maka nilai X dan Y adalah (2, 2)</p>\r\n<p>&nbsp;</p>\r\n<p>3. Metode Gabungan</p>\r\n<p>Eliminasikan nilai X</p>\r\n<p>2x + y = 6 | 1 | <s>2x</s> + y = 6</p>\r\n<p>x + 2y = 6 | 2 | <span style="text-decoration: underline;"><s>2x</s> + 4y = 12&nbsp; -</span></p>\r\n<p style="padding-left: 120px;">&nbsp; &nbsp; -3y = -6</p>\r\n<p style="padding-left: 80px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; y = -6/-3</p>\r\n<p style="padding-left: 120px;">&nbsp; &nbsp; &nbsp; &nbsp;y = 2</p>\r\n<p>Subtitusikan nilai Y ke salah satu persamaan&nbsp;</p>\r\n<p>2x + y = 6</p>\r\n<p>2x + 2 = 6</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp;2x = 6 - 2</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; x = 4/2</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; x = 2</p>\r\n<p>Maka nilai X dan Y adalah (2, 2)</p>\r\n<p>&nbsp;</p>', NULL, '2023-11-01 19:30:51', '2023-11-16 08:41:58');

-- Dumping structure for table matematika.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint NOT NULL DEFAULT '0',
  `skor` tinyint DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table matematika.users: ~3 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `skor`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Admin 1', 'admin@mtk.com', NULL, '$2y$10$AZHUHHEK0ClsjRfLtwWutu1B/GFiqnfd1gY7jCOkXAw83.lwCGur.', 1, NULL, NULL, '2023-11-22 09:28:50', '2023-11-22 09:28:50'),
	(2, 'User 1', 'user1@mtk.com', NULL, '$2y$10$pY0enGiYZTjX5KrZ4VvqCO3MVUmsd4B/jPxmfWqkQIue74YmcGMVG', 0, NULL, NULL, '2023-11-22 09:29:19', '2023-11-22 17:22:00'),
	(3, 'User 2', 'user2@mtk.com', NULL, '$2y$10$/CUCFhyR4DpIiX5VZMZkSuG3VzJWIhwmUvJpUtJ9rHAL7/gOd4v46', 0, NULL, NULL, '2023-11-22 09:29:45', '2023-11-22 09:29:45');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
