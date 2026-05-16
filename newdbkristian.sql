/*
 Navicat Premium Dump SQL

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 80043 (8.0.43)
 Source Host           : localhost:3306
 Source Schema         : kristian

 Target Server Type    : MySQL
 Target Server Version : 80043 (8.0.43)
 File Encoding         : 65001

 Date: 16/05/2026 14:21:00
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for cache
-- ----------------------------
DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of cache
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for cache_locks
-- ----------------------------
DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE `cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of cache_locks
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for camat
-- ----------------------------
DROP TABLE IF EXISTS `camat`;
CREATE TABLE `camat` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'aktif',
  `tanggal_menjabat` date NOT NULL,
  `tanggal_demisioner` date DEFAULT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kecamatan_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `camat_nip_unique` (`nip`),
  KEY `camat_kecamatan_id_foreign` (`kecamatan_id`),
  CONSTRAINT `camat_kecamatan_id_foreign` FOREIGN KEY (`kecamatan_id`) REFERENCES `kecamatan` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of camat
-- ----------------------------
BEGIN;
INSERT INTO `camat` (`id`, `nip`, `nama`, `status`, `tanggal_menjabat`, `tanggal_demisioner`, `alamat`, `foto`, `kecamatan_id`, `created_at`, `updated_at`) VALUES (1, '19771205 200701 2 012', 'ST. KHADIJAH, M.Pd', 'aktif', '2025-09-04', '2026-05-12', 'Jl. Desa Tebing Rimbah', NULL, 1, '2026-05-06 10:42:41', '2026-05-06 10:42:41');
COMMIT;

-- ----------------------------
-- Table structure for desa
-- ----------------------------
DROP TABLE IF EXISTS `desa`;
CREATE TABLE `desa` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `kode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `kecamatan_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `desa_kode_unique` (`kode`),
  KEY `desa_kecamatan_id_foreign` (`kecamatan_id`),
  CONSTRAINT `desa_kecamatan_id_foreign` FOREIGN KEY (`kecamatan_id`) REFERENCES `kecamatan` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of desa
-- ----------------------------
BEGIN;
INSERT INTO `desa` (`id`, `kode`, `nama`, `alamat`, `kecamatan_id`, `created_at`, `updated_at`) VALUES (1, 'DS001', 'Desa Kuala', 'Jl. Poros Kuala No. 1, Kecamatan Kuala, Kabupaten Tana Toraja', 1, '2026-04-19 10:16:33', '2026-04-19 10:16:33');
INSERT INTO `desa` (`id`, `kode`, `nama`, `alamat`, `kecamatan_id`, `created_at`, `updated_at`) VALUES (2, 'DS002', 'Desa Buntu', 'Jl. Buntu No. 2, Kecamatan Kuala, Kabupaten Tana Toraja', 1, '2026-04-19 10:16:33', '2026-04-19 10:16:33');
INSERT INTO `desa` (`id`, `kode`, `nama`, `alamat`, `kecamatan_id`, `created_at`, `updated_at`) VALUES (3, 'DS003', 'Desa Rante', 'Jl. Rante No. 3, Kecamatan Kuala, Kabupaten Tana Toraja', 1, '2026-04-19 10:16:33', '2026-04-19 10:16:33');
INSERT INTO `desa` (`id`, `kode`, `nama`, `alamat`, `kecamatan_id`, `created_at`, `updated_at`) VALUES (4, 'DS004', 'Desa Makale', 'Jl. Makale No. 4, Kecamatan Makale, Kabupaten Tana Toraja', 2, '2026-04-19 10:16:33', '2026-04-19 10:16:33');
INSERT INTO `desa` (`id`, `kode`, `nama`, `alamat`, `kecamatan_id`, `created_at`, `updated_at`) VALUES (5, 'DS005', 'Desa Rumbai', 'Jl. Rumbai No. 5, Kecamatan Makale, Kabupaten Tana Toraja', 2, '2026-04-19 10:16:33', '2026-04-19 10:16:33');
INSERT INTO `desa` (`id`, `kode`, `nama`, `alamat`, `kecamatan_id`, `created_at`, `updated_at`) VALUES (6, 'DS006', 'Desa Sangalla', 'Jl. Sangalla No. 6, Kecamatan Sangalla, Kabupaten Tana Toraja', 3, '2026-04-19 10:16:33', '2026-04-19 10:16:33');
INSERT INTO `desa` (`id`, `kode`, `nama`, `alamat`, `kecamatan_id`, `created_at`, `updated_at`) VALUES (7, 'DS007', 'Desa Simbuang', 'Jl. Simbuang No. 7, Kecamatan Simbuang, Kabupaten Tana Toraja', 4, '2026-04-19 10:16:33', '2026-04-19 10:16:33');
INSERT INTO `desa` (`id`, `kode`, `nama`, `alamat`, `kecamatan_id`, `created_at`, `updated_at`) VALUES (8, 'DS008', 'Desa Mappa', 'Jl. Mappa No. 8, Kecamatan Mappa, Kabupaten Tana Toraja', 5, '2026-04-19 10:16:33', '2026-04-19 10:16:33');
INSERT INTO `desa` (`id`, `kode`, `nama`, `alamat`, `kecamatan_id`, `created_at`, `updated_at`) VALUES (9, 'DS009', 'Desa Buntao', 'Jl. Buntao No. 9, Kecamatan Buntao, Kabupaten Tana Toraja', 6, '2026-04-19 10:16:33', '2026-04-19 10:16:33');
INSERT INTO `desa` (`id`, `kode`, `nama`, `alamat`, `kecamatan_id`, `created_at`, `updated_at`) VALUES (10, 'DS010', 'Desa Malimbong', 'Jl. Malimbong No. 10, Kecamatan Malimbong, Kabupaten Tana Toraja', 7, '2026-04-19 10:16:33', '2026-04-19 10:16:33');
INSERT INTO `desa` (`id`, `kode`, `nama`, `alamat`, `kecamatan_id`, `created_at`, `updated_at`) VALUES (11, 'DS011', 'Desa Pangala', 'Jl. Pangala No. 11, Kecamatan Pangala, Kabupaten Tana Toraja', 8, '2026-04-19 10:16:33', '2026-04-19 10:16:33');
INSERT INTO `desa` (`id`, `kode`, `nama`, `alamat`, `kecamatan_id`, `created_at`, `updated_at`) VALUES (12, 'DS012', 'Desa Kurra', 'Jl. Kurra No. 12, Kecamatan Kurra, Kabupaten Tana Toraja', 9, '2026-04-19 10:16:33', '2026-04-19 10:16:33');
COMMIT;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
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

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for job_batches
-- ----------------------------
DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE `job_batches` (
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

-- ----------------------------
-- Records of job_batches
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for jobs
-- ----------------------------
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
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

-- ----------------------------
-- Records of jobs
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for kecamatan
-- ----------------------------
DROP TABLE IF EXISTS `kecamatan`;
CREATE TABLE `kecamatan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `kode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kecamatan_kode_unique` (`kode`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of kecamatan
-- ----------------------------
BEGIN;
INSERT INTO `kecamatan` (`id`, `kode`, `nama`, `created_at`, `updated_at`) VALUES (1, 'KC001', 'Kuala', '2026-04-19 10:16:33', '2026-04-19 10:16:33');
INSERT INTO `kecamatan` (`id`, `kode`, `nama`, `created_at`, `updated_at`) VALUES (2, 'KC002', 'Makale', '2026-04-19 10:16:33', '2026-04-19 10:16:33');
INSERT INTO `kecamatan` (`id`, `kode`, `nama`, `created_at`, `updated_at`) VALUES (3, 'KC003', 'Sangalla', '2026-04-19 10:16:33', '2026-04-19 10:16:33');
INSERT INTO `kecamatan` (`id`, `kode`, `nama`, `created_at`, `updated_at`) VALUES (4, 'KC004', 'Simbuang', '2026-04-19 10:16:33', '2026-04-19 10:16:33');
INSERT INTO `kecamatan` (`id`, `kode`, `nama`, `created_at`, `updated_at`) VALUES (5, 'KC005', 'Mappa', '2026-04-19 10:16:33', '2026-04-19 10:16:33');
INSERT INTO `kecamatan` (`id`, `kode`, `nama`, `created_at`, `updated_at`) VALUES (6, 'KC006', 'Buntao', '2026-04-19 10:16:33', '2026-04-19 10:16:33');
INSERT INTO `kecamatan` (`id`, `kode`, `nama`, `created_at`, `updated_at`) VALUES (7, 'KC007', 'Malimbong', '2026-04-19 10:16:33', '2026-04-19 10:16:33');
INSERT INTO `kecamatan` (`id`, `kode`, `nama`, `created_at`, `updated_at`) VALUES (8, 'KC008', 'Pangala', '2026-04-19 10:16:33', '2026-04-19 10:16:33');
INSERT INTO `kecamatan` (`id`, `kode`, `nama`, `created_at`, `updated_at`) VALUES (9, 'KC009', 'Kurra', '2026-04-19 10:16:33', '2026-04-19 10:16:33');
COMMIT;

-- ----------------------------
-- Table structure for kegiatan
-- ----------------------------
DROP TABLE IF EXISTS `kegiatan`;
CREATE TABLE `kegiatan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `desa_id` bigint unsigned NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `lokasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ongoing',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kegiatan_desa_id_foreign` (`desa_id`),
  CONSTRAINT `kegiatan_desa_id_foreign` FOREIGN KEY (`desa_id`) REFERENCES `desa` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of kegiatan
-- ----------------------------
BEGIN;
INSERT INTO `kegiatan` (`id`, `desa_id`, `nama`, `jenis`, `tanggal_mulai`, `tanggal_selesai`, `deskripsi`, `alamat`, `lokasi`, `foto`, `status`, `created_at`, `updated_at`) VALUES (1, 1, 'Gotong Royong Pembersihan Sungai', 'Kebersihan', '2026-04-01', '2026-04-01', 'Kegiatan gotong royong membersihkan sungai yang melintasi Desa Kuala untuk mencegah banjir dan menjaga kebersihan lingkungan.', 'Sungai Kuala, Desa Kuala, Kecamatan Kuala', 'Kuala', 'kegiatan/is1ewfSRPwd3Xlj324lrNUy4LJKbpHxsWeRS7w2W.jpg', 'ongoing', '2026-04-19 10:16:33', '2026-04-19 10:17:13');
INSERT INTO `kegiatan` (`id`, `desa_id`, `nama`, `jenis`, `tanggal_mulai`, `tanggal_selesai`, `deskripsi`, `alamat`, `lokasi`, `foto`, `status`, `created_at`, `updated_at`) VALUES (2, 2, 'Pelatihan Keterampilan Pertanian Modern', 'Pendidikan', '2026-03-15', '2026-03-17', 'Pelatihan tentang teknik pertanian modern dan penggunaan alat-alat pertanian untuk meningkatkan hasil panen warga.', 'Balai Desa Buntu, Desa Buntu, Kecamatan Kuala', 'Buntu', NULL, 'ongoing', '2026-04-19 10:16:33', '2026-04-19 10:16:33');
INSERT INTO `kegiatan` (`id`, `desa_id`, `nama`, `jenis`, `tanggal_mulai`, `tanggal_selesai`, `deskripsi`, `alamat`, `lokasi`, `foto`, `status`, `created_at`, `updated_at`) VALUES (3, 3, 'Posyandu Balita dan Ibu Hamil', 'Kesehatan', '2026-04-05', '2026-04-05', 'Pemeriksaan kesehatan rutin untuk balita dan ibu hamil meliputi pengukuran berat badan, tinggi badan, dan pemberian vitamin.', 'Pos Kesehatan Desa Rante, Desa Rante, Kecamatan Kuala', 'Rante', NULL, 'ongoing', '2026-04-19 10:16:33', '2026-04-19 10:16:33');
INSERT INTO `kegiatan` (`id`, `desa_id`, `nama`, `jenis`, `tanggal_mulai`, `tanggal_selesai`, `deskripsi`, `alamat`, `lokasi`, `foto`, `status`, `created_at`, `updated_at`) VALUES (4, 4, 'Pembangunan Jalan Desa', 'Infrastruktur', '2026-02-01', '2026-03-30', 'Pembangunan jalan desa sepanjang 500 meter untuk memperlancar akses transportasi warga ke pusat desa.', 'Jalan Poros Makale, Desa Makale, Kecamatan Makale', 'Makale', NULL, 'ongoing', '2026-04-19 10:16:33', '2026-04-19 10:16:33');
INSERT INTO `kegiatan` (`id`, `desa_id`, `nama`, `jenis`, `tanggal_mulai`, `tanggal_selesai`, `deskripsi`, `alamat`, `lokasi`, `foto`, `status`, `created_at`, `updated_at`) VALUES (5, 5, 'Kerajinan Tangan Lokal', 'Ekonomi', '2026-03-01', '2026-03-28', 'Pelatihan pembuatan kerajinan tangan dari bahan lokal seperti anyaman rotan dan bamboo untuk meningkatkan ekonomi warga.', 'Balai Budaya Desa Rumbai, Desa Rumbai, Kecamatan Makale', 'Rumbai', NULL, 'ongoing', '2026-04-19 10:16:33', '2026-04-19 10:16:33');
INSERT INTO `kegiatan` (`id`, `desa_id`, `nama`, `jenis`, `tanggal_mulai`, `tanggal_selesai`, `deskripsi`, `alamat`, `lokasi`, `foto`, `status`, `created_at`, `updated_at`) VALUES (7, 7, 'Vaksinasi Hewan Ternak', 'Kesehatan', '2026-03-20', '2026-03-22', 'Vaksinasi gratis untuk hewan ternak milik warga untuk mencegah penyakit mulut dan kuku (PMK).', 'Kantor Desa Simbuang, Desa Simbuang, Kecamatan Simbuang', 'Simbuang', NULL, 'ongoing', '2026-04-19 10:16:33', '2026-04-19 10:16:33');
INSERT INTO `kegiatan` (`id`, `desa_id`, `nama`, `jenis`, `tanggal_mulai`, `tanggal_selesai`, `deskripsi`, `alamat`, `lokasi`, `foto`, `status`, `created_at`, `updated_at`) VALUES (8, 8, 'Penghijauan Reboisasi', 'Lingkungan', '2026-04-15', '2026-04-20', 'Penanaman 1000 pohon di area perbukitan untuk mencegah erosi dan menjaga kelestarian lingkungan.', 'Area Perbukitan Mappa, Desa Mappa, Kecamatan Mappa', 'Mappa', NULL, 'ongoing', '2026-04-19 10:16:33', '2026-04-19 10:16:33');
INSERT INTO `kegiatan` (`id`, `desa_id`, `nama`, `jenis`, `tanggal_mulai`, `tanggal_selesai`, `deskripsi`, `alamat`, `lokasi`, `foto`, `status`, `created_at`, `updated_at`) VALUES (9, 9, 'Kelas Mengaji untuk Anak-anak', 'Pendidikan', '2026-01-15', '2026-04-15', 'Kelas mengaji rutin setiap minggu untuk anak-anak usia 7-12 tahun untuk mempelajari Al-Quran.', 'Masjid Al-Muttaqin, Desa Buntao, Kecamatan Buntao', 'Buntao', NULL, 'ongoing', '2026-04-19 10:16:33', '2026-04-19 10:16:33');
INSERT INTO `kegiatan` (`id`, `desa_id`, `nama`, `jenis`, `tanggal_mulai`, `tanggal_selesai`, `deskripsi`, `alamat`, `lokasi`, `foto`, `status`, `created_at`, `updated_at`) VALUES (10, 10, 'Pameran Produk Unggulan Desa', 'Ekonomi', '2026-04-25', '2026-04-27', 'Pameran untuk memamerkan dan menjual produk unggulan desa seperti kopi, kakao, dan kerajinan tangan.', 'Gor Desa Malimbong, Desa Malimbong, Kecamatan Malimbong', 'Malimbong', NULL, 'ongoing', '2026-04-19 10:16:33', '2026-04-19 10:16:33');
INSERT INTO `kegiatan` (`id`, `desa_id`, `nama`, `jenis`, `tanggal_mulai`, `tanggal_selesai`, `deskripsi`, `alamat`, `lokasi`, `foto`, `status`, `created_at`, `updated_at`) VALUES (11, 11, 'Pembersihan Sampah Pasar', 'Kebersihan', '2026-04-08', '2026-04-08', 'Kegiatan bersih-bersih pasar tradisional untuk menjaga kebersihan dan kenyamanan pengunjung pasar.', 'Pasar Tradisional Pangala, Desa Pangala, Kecamatan Pangala', 'Pangala', NULL, 'ongoing', '2026-04-19 10:16:33', '2026-04-19 10:16:33');
INSERT INTO `kegiatan` (`id`, `desa_id`, `nama`, `jenis`, `tanggal_mulai`, `tanggal_selesai`, `deskripsi`, `alamat`, `lokasi`, `foto`, `status`, `created_at`, `updated_at`) VALUES (12, 12, 'Seminar Kewirausahaan Pemuda', 'Pendidikan', '2026-04-18', '2026-04-18', 'Seminar untuk memberikan motivasi dan pengetahuan kewirausahaan kepada pemuda desa.', 'Balai Desa Kurra, Desa Kurra, Kecamatan Kurra', 'Kurra', NULL, 'ongoing', '2026-04-19 10:16:33', '2026-04-19 10:16:33');
INSERT INTO `kegiatan` (`id`, `desa_id`, `nama`, `jenis`, `tanggal_mulai`, `tanggal_selesai`, `deskripsi`, `alamat`, `lokasi`, `foto`, `status`, `created_at`, `updated_at`) VALUES (13, 9, 'sdf', 'sdf', '2026-03-31', '2026-04-28', 'ASD', 'A', 'asd', NULL, 'ongoing', '2026-04-19 10:58:33', '2026-04-19 10:58:33');
INSERT INTO `kegiatan` (`id`, `desa_id`, `nama`, `jenis`, `tanggal_mulai`, `tanggal_selesai`, `deskripsi`, `alamat`, `lokasi`, `foto`, `status`, `created_at`, `updated_at`) VALUES (14, 1, 'egrf', 'dfg', '2026-04-01', '2026-05-06', 'sdf', 'fdg', 'dfg', 'kegiatan/WLypsX8Yp1mfYNrFYk7BGRLpG5VeuUD1KOSeityF.jpg', 'ongoing', '2026-04-19 11:11:09', '2026-04-19 11:11:43');
INSERT INTO `kegiatan` (`id`, `desa_id`, `nama`, `jenis`, `tanggal_mulai`, `tanggal_selesai`, `deskripsi`, `alamat`, `lokasi`, `foto`, `status`, `created_at`, `updated_at`) VALUES (15, 1, 'fsd', 'sdf', '2026-05-05', '2026-05-27', 'dfg', 'sdf', 'dfg', NULL, 'ongoing', '2026-05-16 05:52:07', '2026-05-16 05:52:07');
COMMIT;

-- ----------------------------
-- Table structure for kepala_desa
-- ----------------------------
DROP TABLE IF EXISTS `kepala_desa`;
CREATE TABLE `kepala_desa` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nik` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'aktif',
  `tanggal_menjabat` date NOT NULL,
  `tanggal_demisioner` date DEFAULT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desa_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kepala_desa_nik_unique` (`nik`),
  KEY `kepala_desa_desa_id_foreign` (`desa_id`),
  CONSTRAINT `kepala_desa_desa_id_foreign` FOREIGN KEY (`desa_id`) REFERENCES `desa` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of kepala_desa
-- ----------------------------
BEGIN;
INSERT INTO `kepala_desa` (`id`, `nik`, `nama`, `status`, `tanggal_menjabat`, `tanggal_demisioner`, `alamat`, `foto`, `desa_id`, `created_at`, `updated_at`) VALUES (1, '7304014501750001', 'Andi Saputra', 'aktif', '2021-08-01', NULL, 'Jl. Poros Kuala No. 1, Desa Kuala, Kecamatan Kuala', NULL, 1, '2026-04-19 10:16:33', '2026-04-19 10:16:33');
INSERT INTO `kepala_desa` (`id`, `nik`, `nama`, `status`, `tanggal_menjabat`, `tanggal_demisioner`, `alamat`, `foto`, `desa_id`, `created_at`, `updated_at`) VALUES (2, '7304015202850002', 'Muhammad Yusuf', 'aktif', '2020-07-15', NULL, 'Jl. Buntu No. 2, Desa Buntu, Kecamatan Kuala', NULL, 2, '2026-04-19 10:16:33', '2026-04-19 10:16:33');
INSERT INTO `kepala_desa` (`id`, `nik`, `nama`, `status`, `tanggal_menjabat`, `tanggal_demisioner`, `alamat`, `foto`, `desa_id`, `created_at`, `updated_at`) VALUES (3, '7304016303900003', 'Siti Aminah', 'aktif', '2022-01-10', NULL, 'Jl. Rante No. 3, Desa Rante, Kecamatan Kuala', NULL, 3, '2026-04-19 10:16:33', '2026-04-19 10:16:33');
INSERT INTO `kepala_desa` (`id`, `nik`, `nama`, `status`, `tanggal_menjabat`, `tanggal_demisioner`, `alamat`, `foto`, `desa_id`, `created_at`, `updated_at`) VALUES (4, '7304024501800004', 'Baharuddin', 'aktif', '2019-06-20', NULL, 'Jl. Makale No. 4, Desa Makale, Kecamatan Makale', NULL, 4, '2026-04-19 10:16:33', '2026-04-19 10:16:33');
INSERT INTO `kepala_desa` (`id`, `nik`, `nama`, `status`, `tanggal_menjabat`, `tanggal_demisioner`, `alamat`, `foto`, `desa_id`, `created_at`, `updated_at`) VALUES (5, '7304025102860005', 'Hasan Basri', 'aktif', '2021-03-05', NULL, 'Jl. Rumbai No. 5, Desa Rumbai, Kecamatan Makale', NULL, 5, '2026-04-19 10:16:33', '2026-04-19 10:16:33');
INSERT INTO `kepala_desa` (`id`, `nik`, `nama`, `status`, `tanggal_menjabat`, `tanggal_demisioner`, `alamat`, `foto`, `desa_id`, `created_at`, `updated_at`) VALUES (6, '7304034201750006', 'Jusuf Lolo', 'aktif', '2020-11-01', NULL, 'Jl. Sangalla No. 6, Desa Sangalla, Kecamatan Sangalla', NULL, 6, '2026-04-19 10:16:33', '2026-04-19 10:16:33');
INSERT INTO `kepala_desa` (`id`, `nik`, `nama`, `status`, `tanggal_menjabat`, `tanggal_demisioner`, `alamat`, `foto`, `desa_id`, `created_at`, `updated_at`) VALUES (7, '7304045501900007', 'Patta Roa', 'aktif', '2022-05-15', NULL, 'Jl. Simbuang No. 7, Desa Simbuang, Kecamatan Simbuang', NULL, 7, '2026-04-19 10:16:33', '2026-04-19 10:16:33');
INSERT INTO `kepala_desa` (`id`, `nik`, `nama`, `status`, `tanggal_menjabat`, `tanggal_demisioner`, `alamat`, `foto`, `desa_id`, `created_at`, `updated_at`) VALUES (8, '7304054801820008', 'Andi Materu', 'aktif', '2018-09-01', NULL, 'Jl. Mappa No. 8, Desa Mappa, Kecamatan Mappa', NULL, 8, '2026-04-19 10:16:33', '2026-04-19 10:16:33');
INSERT INTO `kepala_desa` (`id`, `nik`, `nama`, `status`, `tanggal_menjabat`, `tanggal_demisioner`, `alamat`, `foto`, `desa_id`, `created_at`, `updated_at`) VALUES (9, '7304065202840009', 'Bastian Tandi', 'demisioner', '2015-08-20', '2021-08-19', 'Jl. Buntao No. 9, Desa Buntao, Kecamatan Buntao', NULL, 9, '2026-04-19 10:16:33', '2026-04-19 10:16:33');
INSERT INTO `kepala_desa` (`id`, `nik`, `nama`, `status`, `tanggal_menjabat`, `tanggal_demisioner`, `alamat`, `foto`, `desa_id`, `created_at`, `updated_at`) VALUES (10, '7304066003910010', 'Paterick Pali', 'aktif', '2021-08-20', NULL, 'Jl. Buntao No. 9, Desa Buntao, Kecamatan Buntao', NULL, 9, '2026-04-19 10:16:33', '2026-04-19 10:16:33');
INSERT INTO `kepala_desa` (`id`, `nik`, `nama`, `status`, `tanggal_menjabat`, `tanggal_demisioner`, `alamat`, `foto`, `desa_id`, `created_at`, `updated_at`) VALUES (11, '7304074301780011', 'Semmy Langi', 'aktif', '2020-02-14', NULL, 'Jl. Malimbong No. 10, Desa Malimbong, Kecamatan Malimbong', NULL, 10, '2026-04-19 10:16:33', '2026-04-19 10:16:33');
INSERT INTO `kepala_desa` (`id`, `nik`, `nama`, `status`, `tanggal_menjabat`, `tanggal_demisioner`, `alamat`, `foto`, `desa_id`, `created_at`, `updated_at`) VALUES (12, '7304085502870012', 'Ruslan Tallung', 'aktif', '2022-07-01', NULL, 'Jl. Pangala No. 11, Desa Pangala, Kecamatan Pangala', NULL, 11, '2026-04-19 10:16:33', '2026-04-19 10:16:33');
COMMIT;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
BEGIN;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (1, '0001_01_01_000000_create_users_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (2, '0001_01_01_000001_create_cache_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (3, '0001_01_01_000002_create_jobs_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (4, '2024_01_01_000003_update_users_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (5, '2024_01_01_000004_create_kecamatan_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (6, '2024_01_01_000005_create_desa_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (7, '2024_01_01_000006_create_kepala_desa_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (8, '2024_01_01_000007_create_kegiatan_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (9, '2024_01_01_000008_create_camat_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (10, '2024_01_01_000009_add_morph_to_users_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (11, '2024_01_01_000010_add_status_to_kegiatan_table', 2);
COMMIT;

-- ----------------------------
-- Table structure for password_reset_tokens
-- ----------------------------
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_reset_tokens
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for sessions
-- ----------------------------
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
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

-- ----------------------------
-- Records of sessions
-- ----------------------------
BEGIN;
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES ('c9yJlMn2KGge90zxk91oe8wMXnoXop1j9I59Tt4p', 6, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiI4YmFFNlVqenpqY2VJMXloTjVIT1NicmpQTGZ4M1RWNEF6VjBaa21IIiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvbG9jYWxob3N0OjgwMDBcL2Rlc2FcL2tlZ2lhdGFuIiwicm91dGUiOiJkZXNhLmtlZ2lhdGFuLmluZGV4In0sImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjo2fQ==', 1778911738);
COMMIT;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','admin_desa','kecamatan','admin_camat') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `usable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usable_id` bigint unsigned DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_username_unique` (`username`),
  KEY `users_usable_type_usable_id_index` (`usable_type`,`usable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` (`id`, `username`, `role`, `usable_type`, `usable_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (1, 'kristian', 'admin', NULL, NULL, 'Admin Kristian', 'admin@kristian.id', NULL, '$2y$12$DRq7PHwtcSYmOVlXA7lXOeEvKd0DeLCcQHFU.5G.TpvQ7aoO8tJGC', NULL, '2026-04-19 10:16:33', '2026-04-19 10:16:33');
INSERT INTO `users` (`id`, `username`, `role`, `usable_type`, `usable_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (2, 'KC001', 'admin_camat', 'App\\Models\\Kecamatan', 1, 'Kuala', 'kc001@kecamatan.com', NULL, '$2y$12$6S.SaFLblIgyHELQ2GFZP.aykid09TVKnGORUOUinkjoWGt/zJwLG', NULL, '2026-04-19 10:33:23', '2026-05-16 05:56:22');
INSERT INTO `users` (`id`, `username`, `role`, `usable_type`, `usable_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (4, 'DS001', 'admin_desa', 'App\\Models\\Desa', 1, 'Desa Kuala', 'ds001@desa.com', NULL, '$2y$12$fjTKbEMsdcPFCEyHuA1X..yTlESyM.d7T0ywswE1BsMQ/5a3/Pmym', NULL, '2026-04-19 11:03:08', '2026-04-19 11:03:08');
INSERT INTO `users` (`id`, `username`, `role`, `usable_type`, `usable_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (5, 'DS002', 'admin_desa', 'App\\Models\\Desa', 2, 'Desa Buntu', 'ds002@desa.com', NULL, '$2y$12$cB7k.4oMlaUg1qdlcNT8ReJyLPeaKX3oFstJ0sxw9X/CvpUEosiwu', NULL, '2026-05-16 06:05:03', '2026-05-16 06:05:03');
INSERT INTO `users` (`id`, `username`, `role`, `usable_type`, `usable_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (6, 'DS006', 'admin_desa', 'App\\Models\\Desa', 6, 'Desa Sangalla', 'ds006@desa.com', NULL, '$2y$12$JTm1hhDXG3YQhj2U8y8WmOVgJ6Ov2JGsjgrn/sVuM5JBGbcQh1CQ6', NULL, '2026-05-16 06:05:42', '2026-05-16 06:05:42');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
