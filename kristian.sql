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


-- Dumping database structure for kristian
CREATE DATABASE IF NOT EXISTS `kristian` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `kristian`;

-- Dumping structure for table kristian.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kristian.cache: ~0 rows (approximately)

-- Dumping structure for table kristian.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kristian.cache_locks: ~0 rows (approximately)

-- Dumping structure for table kristian.camat
CREATE TABLE IF NOT EXISTS `camat` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'aktif',
  `tanggal_menjabat` date NOT NULL,
  `tanggal_demisioner` date DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kecamatan_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `camat_nip_unique` (`nip`),
  KEY `camat_kecamatan_id_foreign` (`kecamatan_id`),
  CONSTRAINT `camat_kecamatan_id_foreign` FOREIGN KEY (`kecamatan_id`) REFERENCES `kecamatan` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kristian.camat: ~0 rows (approximately)

-- Dumping structure for table kristian.desa
CREATE TABLE IF NOT EXISTS `desa` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `kecamatan_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `desa_kode_unique` (`kode`),
  KEY `desa_kecamatan_id_foreign` (`kecamatan_id`),
  CONSTRAINT `desa_kecamatan_id_foreign` FOREIGN KEY (`kecamatan_id`) REFERENCES `kecamatan` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kristian.desa: ~12 rows (approximately)
INSERT INTO `desa` (`id`, `kode`, `nama`, `alamat`, `kecamatan_id`, `created_at`, `updated_at`) VALUES
	(1, 'DS001', 'Desa Kuala', 'Jl. Poros Kuala No. 1, Kecamatan Kuala, Kabupaten Tana Toraja', 1, '2026-04-19 02:16:33', '2026-04-19 02:16:33'),
	(2, 'DS002', 'Desa Buntu', 'Jl. Buntu No. 2, Kecamatan Kuala, Kabupaten Tana Toraja', 1, '2026-04-19 02:16:33', '2026-04-19 02:16:33'),
	(3, 'DS003', 'Desa Rante', 'Jl. Rante No. 3, Kecamatan Kuala, Kabupaten Tana Toraja', 1, '2026-04-19 02:16:33', '2026-04-19 02:16:33'),
	(4, 'DS004', 'Desa Makale', 'Jl. Makale No. 4, Kecamatan Makale, Kabupaten Tana Toraja', 2, '2026-04-19 02:16:33', '2026-04-19 02:16:33'),
	(5, 'DS005', 'Desa Rumbai', 'Jl. Rumbai No. 5, Kecamatan Makale, Kabupaten Tana Toraja', 2, '2026-04-19 02:16:33', '2026-04-19 02:16:33'),
	(6, 'DS006', 'Desa Sangalla', 'Jl. Sangalla No. 6, Kecamatan Sangalla, Kabupaten Tana Toraja', 3, '2026-04-19 02:16:33', '2026-04-19 02:16:33'),
	(7, 'DS007', 'Desa Simbuang', 'Jl. Simbuang No. 7, Kecamatan Simbuang, Kabupaten Tana Toraja', 4, '2026-04-19 02:16:33', '2026-04-19 02:16:33'),
	(8, 'DS008', 'Desa Mappa', 'Jl. Mappa No. 8, Kecamatan Mappa, Kabupaten Tana Toraja', 5, '2026-04-19 02:16:33', '2026-04-19 02:16:33'),
	(9, 'DS009', 'Desa Buntao', 'Jl. Buntao No. 9, Kecamatan Buntao, Kabupaten Tana Toraja', 6, '2026-04-19 02:16:33', '2026-04-19 02:16:33'),
	(10, 'DS010', 'Desa Malimbong', 'Jl. Malimbong No. 10, Kecamatan Malimbong, Kabupaten Tana Toraja', 7, '2026-04-19 02:16:33', '2026-04-19 02:16:33'),
	(11, 'DS011', 'Desa Pangala', 'Jl. Pangala No. 11, Kecamatan Pangala, Kabupaten Tana Toraja', 8, '2026-04-19 02:16:33', '2026-04-19 02:16:33'),
	(12, 'DS012', 'Desa Kurra', 'Jl. Kurra No. 12, Kecamatan Kurra, Kabupaten Tana Toraja', 9, '2026-04-19 02:16:33', '2026-04-19 02:16:33');

-- Dumping structure for table kristian.failed_jobs
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

-- Dumping data for table kristian.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table kristian.jobs
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

-- Dumping data for table kristian.jobs: ~0 rows (approximately)

-- Dumping structure for table kristian.job_batches
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

-- Dumping data for table kristian.job_batches: ~0 rows (approximately)

-- Dumping structure for table kristian.kecamatan
CREATE TABLE IF NOT EXISTS `kecamatan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kecamatan_kode_unique` (`kode`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kristian.kecamatan: ~9 rows (approximately)
INSERT INTO `kecamatan` (`id`, `kode`, `nama`, `created_at`, `updated_at`) VALUES
	(1, 'KC001', 'Kuala', '2026-04-19 02:16:33', '2026-04-19 02:16:33'),
	(2, 'KC002', 'Makale', '2026-04-19 02:16:33', '2026-04-19 02:16:33'),
	(3, 'KC003', 'Sangalla', '2026-04-19 02:16:33', '2026-04-19 02:16:33'),
	(4, 'KC004', 'Simbuang', '2026-04-19 02:16:33', '2026-04-19 02:16:33'),
	(5, 'KC005', 'Mappa', '2026-04-19 02:16:33', '2026-04-19 02:16:33'),
	(6, 'KC006', 'Buntao', '2026-04-19 02:16:33', '2026-04-19 02:16:33'),
	(7, 'KC007', 'Malimbong', '2026-04-19 02:16:33', '2026-04-19 02:16:33'),
	(8, 'KC008', 'Pangala', '2026-04-19 02:16:33', '2026-04-19 02:16:33'),
	(9, 'KC009', 'Kurra', '2026-04-19 02:16:33', '2026-04-19 02:16:33');

-- Dumping structure for table kristian.kegiatan
CREATE TABLE IF NOT EXISTS `kegiatan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `desa_id` bigint unsigned NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kegiatan_desa_id_foreign` (`desa_id`),
  CONSTRAINT `kegiatan_desa_id_foreign` FOREIGN KEY (`desa_id`) REFERENCES `desa` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kristian.kegiatan: ~12 rows (approximately)
INSERT INTO `kegiatan` (`id`, `desa_id`, `nama`, `jenis`, `tanggal_mulai`, `tanggal_selesai`, `deskripsi`, `alamat`, `lokasi`, `foto`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Gotong Royong Pembersihan Sungai', 'Kebersihan', '2026-04-01', '2026-04-01', 'Kegiatan gotong royong membersihkan sungai yang melintasi Desa Kuala untuk mencegah banjir dan menjaga kebersihan lingkungan.', 'Sungai Kuala, Desa Kuala, Kecamatan Kuala', 'Kuala', 'kegiatan/is1ewfSRPwd3Xlj324lrNUy4LJKbpHxsWeRS7w2W.jpg', '2026-04-19 02:16:33', '2026-04-19 02:17:13'),
	(2, 2, 'Pelatihan Keterampilan Pertanian Modern', 'Pendidikan', '2026-03-15', '2026-03-17', 'Pelatihan tentang teknik pertanian modern dan penggunaan alat-alat pertanian untuk meningkatkan hasil panen warga.', 'Balai Desa Buntu, Desa Buntu, Kecamatan Kuala', 'Buntu', NULL, '2026-04-19 02:16:33', '2026-04-19 02:16:33'),
	(3, 3, 'Posyandu Balita dan Ibu Hamil', 'Kesehatan', '2026-04-05', '2026-04-05', 'Pemeriksaan kesehatan rutin untuk balita dan ibu hamil meliputi pengukuran berat badan, tinggi badan, dan pemberian vitamin.', 'Pos Kesehatan Desa Rante, Desa Rante, Kecamatan Kuala', 'Rante', NULL, '2026-04-19 02:16:33', '2026-04-19 02:16:33'),
	(4, 4, 'Pembangunan Jalan Desa', 'Infrastruktur', '2026-02-01', '2026-03-30', 'Pembangunan jalan desa sepanjang 500 meter untuk memperlancar akses transportasi warga ke pusat desa.', 'Jalan Poros Makale, Desa Makale, Kecamatan Makale', 'Makale', NULL, '2026-04-19 02:16:33', '2026-04-19 02:16:33'),
	(5, 5, 'Kerajinan Tangan Lokal', 'Ekonomi', '2026-03-01', '2026-03-28', 'Pelatihan pembuatan kerajinan tangan dari bahan lokal seperti anyaman rotan dan bamboo untuk meningkatkan ekonomi warga.', 'Balai Budaya Desa Rumbai, Desa Rumbai, Kecamatan Makale', 'Rumbai', NULL, '2026-04-19 02:16:33', '2026-04-19 02:16:33'),
	(6, 6, 'Festival Adat Tongkonan', 'Budaya', '2026-04-10', '2026-04-12', 'Festival budaya untuk melestarikan adat istiadat Tongkonan meliputi tarian tradisional, upacara adat, dan pameran budaya.', 'Taman Budaya Sangalla, Desa Sangalla, Kecamatan Sangalla', 'Sangalla', NULL, '2026-04-19 02:16:33', '2026-04-19 02:16:33'),
	(7, 7, 'Vaksinasi Hewan Ternak', 'Kesehatan', '2026-03-20', '2026-03-22', 'Vaksinasi gratis untuk hewan ternak milik warga untuk mencegah penyakit mulut dan kuku (PMK).', 'Kantor Desa Simbuang, Desa Simbuang, Kecamatan Simbuang', 'Simbuang', NULL, '2026-04-19 02:16:33', '2026-04-19 02:16:33'),
	(8, 8, 'Penghijauan Reboisasi', 'Lingkungan', '2026-04-15', '2026-04-20', 'Penanaman 1000 pohon di area perbukitan untuk mencegah erosi dan menjaga kelestarian lingkungan.', 'Area Perbukitan Mappa, Desa Mappa, Kecamatan Mappa', 'Mappa', NULL, '2026-04-19 02:16:33', '2026-04-19 02:16:33'),
	(9, 9, 'Kelas Mengaji untuk Anak-anak', 'Pendidikan', '2026-01-15', '2026-04-15', 'Kelas mengaji rutin setiap minggu untuk anak-anak usia 7-12 tahun untuk mempelajari Al-Quran.', 'Masjid Al-Muttaqin, Desa Buntao, Kecamatan Buntao', 'Buntao', NULL, '2026-04-19 02:16:33', '2026-04-19 02:16:33'),
	(10, 10, 'Pameran Produk Unggulan Desa', 'Ekonomi', '2026-04-25', '2026-04-27', 'Pameran untuk memamerkan dan menjual produk unggulan desa seperti kopi, kakao, dan kerajinan tangan.', 'Gor Desa Malimbong, Desa Malimbong, Kecamatan Malimbong', 'Malimbong', NULL, '2026-04-19 02:16:33', '2026-04-19 02:16:33'),
	(11, 11, 'Pembersihan Sampah Pasar', 'Kebersihan', '2026-04-08', '2026-04-08', 'Kegiatan bersih-bersih pasar tradisional untuk menjaga kebersihan dan kenyamanan pengunjung pasar.', 'Pasar Tradisional Pangala, Desa Pangala, Kecamatan Pangala', 'Pangala', NULL, '2026-04-19 02:16:33', '2026-04-19 02:16:33'),
	(12, 12, 'Seminar Kewirausahaan Pemuda', 'Pendidikan', '2026-04-18', '2026-04-18', 'Seminar untuk memberikan motivasi dan pengetahuan kewirausahaan kepada pemuda desa.', 'Balai Desa Kurra, Desa Kurra, Kecamatan Kurra', 'Kurra', NULL, '2026-04-19 02:16:33', '2026-04-19 02:16:33'),
	(13, 9, 'sdf', 'sdf', '2026-03-31', '2026-04-28', 'ASD', 'A', 'asd', NULL, '2026-04-19 02:58:33', '2026-04-19 02:58:33'),
	(14, 1, 'egrf', 'dfg', '2026-04-01', '2026-05-06', 'sdf', 'fdg', 'dfg', 'kegiatan/WLypsX8Yp1mfYNrFYk7BGRLpG5VeuUD1KOSeityF.jpg', '2026-04-19 03:11:09', '2026-04-19 03:11:43');

-- Dumping structure for table kristian.kepala_desa
CREATE TABLE IF NOT EXISTS `kepala_desa` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'aktif',
  `tanggal_menjabat` date NOT NULL,
  `tanggal_demisioner` date DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desa_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kepala_desa_nik_unique` (`nik`),
  KEY `kepala_desa_desa_id_foreign` (`desa_id`),
  CONSTRAINT `kepala_desa_desa_id_foreign` FOREIGN KEY (`desa_id`) REFERENCES `desa` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kristian.kepala_desa: ~12 rows (approximately)
INSERT INTO `kepala_desa` (`id`, `nik`, `nama`, `status`, `tanggal_menjabat`, `tanggal_demisioner`, `alamat`, `foto`, `desa_id`, `created_at`, `updated_at`) VALUES
	(1, '7304014501750001', 'Andi Saputra', 'aktif', '2021-08-01', NULL, 'Jl. Poros Kuala No. 1, Desa Kuala, Kecamatan Kuala', NULL, 1, '2026-04-19 02:16:33', '2026-04-19 02:16:33'),
	(2, '7304015202850002', 'Muhammad Yusuf', 'aktif', '2020-07-15', NULL, 'Jl. Buntu No. 2, Desa Buntu, Kecamatan Kuala', NULL, 2, '2026-04-19 02:16:33', '2026-04-19 02:16:33'),
	(3, '7304016303900003', 'Siti Aminah', 'aktif', '2022-01-10', NULL, 'Jl. Rante No. 3, Desa Rante, Kecamatan Kuala', NULL, 3, '2026-04-19 02:16:33', '2026-04-19 02:16:33'),
	(4, '7304024501800004', 'Baharuddin', 'aktif', '2019-06-20', NULL, 'Jl. Makale No. 4, Desa Makale, Kecamatan Makale', NULL, 4, '2026-04-19 02:16:33', '2026-04-19 02:16:33'),
	(5, '7304025102860005', 'Hasan Basri', 'aktif', '2021-03-05', NULL, 'Jl. Rumbai No. 5, Desa Rumbai, Kecamatan Makale', NULL, 5, '2026-04-19 02:16:33', '2026-04-19 02:16:33'),
	(6, '7304034201750006', 'Jusuf Lolo', 'aktif', '2020-11-01', NULL, 'Jl. Sangalla No. 6, Desa Sangalla, Kecamatan Sangalla', NULL, 6, '2026-04-19 02:16:33', '2026-04-19 02:16:33'),
	(7, '7304045501900007', 'Patta Roa', 'aktif', '2022-05-15', NULL, 'Jl. Simbuang No. 7, Desa Simbuang, Kecamatan Simbuang', NULL, 7, '2026-04-19 02:16:33', '2026-04-19 02:16:33'),
	(8, '7304054801820008', 'Andi Materu', 'aktif', '2018-09-01', NULL, 'Jl. Mappa No. 8, Desa Mappa, Kecamatan Mappa', NULL, 8, '2026-04-19 02:16:33', '2026-04-19 02:16:33'),
	(9, '7304065202840009', 'Bastian Tandi', 'demisioner', '2015-08-20', '2021-08-19', 'Jl. Buntao No. 9, Desa Buntao, Kecamatan Buntao', NULL, 9, '2026-04-19 02:16:33', '2026-04-19 02:16:33'),
	(10, '7304066003910010', 'Paterick Pali', 'aktif', '2021-08-20', NULL, 'Jl. Buntao No. 9, Desa Buntao, Kecamatan Buntao', NULL, 9, '2026-04-19 02:16:33', '2026-04-19 02:16:33'),
	(11, '7304074301780011', 'Semmy Langi', 'aktif', '2020-02-14', NULL, 'Jl. Malimbong No. 10, Desa Malimbong, Kecamatan Malimbong', NULL, 10, '2026-04-19 02:16:33', '2026-04-19 02:16:33'),
	(12, '7304085502870012', 'Ruslan Tallung', 'aktif', '2022-07-01', NULL, 'Jl. Pangala No. 11, Desa Pangala, Kecamatan Pangala', NULL, 11, '2026-04-19 02:16:33', '2026-04-19 02:16:33');

-- Dumping structure for table kristian.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kristian.migrations: ~0 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2024_01_01_000003_update_users_table', 1),
	(5, '2024_01_01_000004_create_kecamatan_table', 1),
	(6, '2024_01_01_000005_create_desa_table', 1),
	(7, '2024_01_01_000006_create_kepala_desa_table', 1),
	(8, '2024_01_01_000007_create_kegiatan_table', 1),
	(9, '2024_01_01_000008_create_camat_table', 1),
	(10, '2024_01_01_000009_add_morph_to_users_table', 1);

-- Dumping structure for table kristian.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kristian.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table kristian.sessions
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

-- Dumping data for table kristian.sessions: ~0 rows (approximately)

-- Dumping structure for table kristian.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','admin_desa','kecamatan','admin_camat') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `usable_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usable_id` bigint unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_username_unique` (`username`),
  KEY `users_usable_type_usable_id_index` (`usable_type`,`usable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kristian.users: ~2 rows (approximately)
INSERT INTO `users` (`id`, `username`, `role`, `usable_type`, `usable_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'kristian', 'admin', NULL, NULL, 'Admin Kristian', 'admin@kristian.id', NULL, '$2y$12$DRq7PHwtcSYmOVlXA7lXOeEvKd0DeLCcQHFU.5G.TpvQ7aoO8tJGC', NULL, '2026-04-19 02:16:33', '2026-04-19 02:16:33'),
	(2, 'KC001', 'admin_camat', 'App\\Models\\Kecamatan', 1, 'Kuala', 'kc001@kecamatan.com', NULL, '$2y$12$9yf1oTVEfk.NLKo6nxgF.OaiG0LnJPmxDTgkeWMMJgLpIvM7yE6AW', NULL, '2026-04-19 02:33:23', '2026-04-19 02:33:23'),
	(4, 'DS001', 'admin_desa', 'App\\Models\\Desa', 1, 'Desa Kuala', 'ds001@desa.com', NULL, '$2y$12$fjTKbEMsdcPFCEyHuA1X..yTlESyM.d7T0ywswE1BsMQ/5a3/Pmym', NULL, '2026-04-19 03:03:08', '2026-04-19 03:03:08');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
