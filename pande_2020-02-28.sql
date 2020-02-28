# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.28)
# Database: pande
# Generation Time: 2020-02-28 03:01:18 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(1,'2014_10_12_000000_create_users_table',1),
	(2,'2014_10_12_100000_create_password_resets_table',1),
	(3,'2020_02_03_021853_create_pasien',2),
	(4,'2020_02_03_021904_create_peminjam',2),
	(5,'2020_02_03_021917_create_tmr',2);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table pasien
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pasien`;

CREATE TABLE `pasien` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `no_rm` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pasien` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pasien_no_rm_unique` (`no_rm`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `pasien` WRITE;
/*!40000 ALTER TABLE `pasien` DISABLE KEYS */;

INSERT INTO `pasien` (`id`, `no_rm`, `nama_pasien`, `tanggal_lahir`, `created_at`, `updated_at`)
VALUES
	(1,'00.00.01','YANTI ARI NI WAYAN','01-10-1992','2020-02-03 03:16:06','2020-02-10 08:28:26'),
	(2,'00.00.02','putu A','01-10-1992','2020-02-10 08:03:58','2020-02-10 08:15:19');

/*!40000 ALTER TABLE `pasien` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table peminjam
# ------------------------------------------------------------

DROP TABLE IF EXISTS `peminjam`;

CREATE TABLE `peminjam` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `no_ktp` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_peminjam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `peminjam_nama_peminjam_unique` (`nama_peminjam`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `peminjam` WRITE;
/*!40000 ALTER TABLE `peminjam` DISABLE KEYS */;

INSERT INTO `peminjam` (`id`, `no_ktp`, `nama_peminjam`, `alamat`, `no_hp`, `created_at`, `updated_at`)
VALUES
	(1,'5102061110910002','Putu Nika Pastiama','jln kadadad','083114888752','2020-02-03 03:56:29','2020-02-03 04:00:31');

/*!40000 ALTER TABLE `peminjam` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tmr
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tmr`;

CREATE TABLE `tmr` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_pasien` int(11) NOT NULL,
  `id_peminjam` int(11) NOT NULL,
  `tanggal_pinjam` datetime NOT NULL,
  `tanggal_kembali` datetime DEFAULT NULL,
  `poli` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `tmr` WRITE;
/*!40000 ALTER TABLE `tmr` DISABLE KEYS */;

INSERT INTO `tmr` (`id`, `id_pasien`, `id_peminjam`, `tanggal_pinjam`, `tanggal_kembali`, `poli`, `keterangan`, `created_at`, `updated_at`)
VALUES
	(1,1,1,'2020-02-05 10:20:00',NULL,'jantung','cari rekam medisna','2020-02-04 08:30:40','2020-02-10 09:07:42'),
	(2,1,1,'2020-02-06 20:24:00',NULL,NULL,NULL,'2020-02-06 11:51:31','2020-02-06 11:51:31');

/*!40000 ALTER TABLE `tmr` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,'Admin','cungikawake@gmail.com','$2y$10$0SP3qcGgZBxSXV5dAe8/4uj.UCDdDwYGGER6A2U.A8yHDb9M/G4ui','2uwuiuITEdgFvTwHiqY9vV8hGwLIWVHUNcc2Oup5WtnjgkY7yb642NkBKvYz','2020-01-31 03:59:43','2020-01-31 03:59:43');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
