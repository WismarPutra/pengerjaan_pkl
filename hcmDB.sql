-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Aug 29, 2025 at 08:40 AM
-- Server version: 8.0.40
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hcmDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `career_activities`
--

CREATE TABLE `career_activities` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_id` bigint UNSIGNED NOT NULL,
  `nama_role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unitSub` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regional_direktorat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `band_posisi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `statusPJ` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggalKDMP` varchar(7) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggalBand` varchar(7) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggalTKWT` varchar(7) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_akhirTKWT` varchar(7) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_mutasi` varchar(7) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggalPJ` varchar(7) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lepasPJ` varchar(7) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_pensiun` varchar(7) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_akhir_kontrak` varchar(7) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `dokumenSK` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dokumen_nota_dinas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dokumen_lainnya` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `career_activities`
--

INSERT INTO `career_activities` (`id`, `employee_id`, `nama_role`, `unitSub`, `regional_direktorat`, `band_posisi`, `deskripsi`, `statusPJ`, `tanggalKDMP`, `tanggalBand`, `tanggalTKWT`, `tanggal_akhirTKWT`, `tanggal_mutasi`, `tanggalPJ`, `tanggal_lepasPJ`, `tanggal_pensiun`, `tanggal_akhir_kontrak`, `created_at`, `updated_at`, `dokumenSK`, `dokumen_nota_dinas`, `dokumen_lainnya`) VALUES
(1, 1, 'Nama Role Sekarang', 'claclacla', 'blablabla', 'band level V', 'Deskripsi singkat aktivitas karir', 'dladladla', '2023-03', '2025-08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-26 03:41:55', '2025-08-26 03:41:55', 'dokumen_sk/eYkzsKsQ7ZHgkTblTCkzu8Zw6zAS0rg8AfU6EHXH.pdf', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `djm_files`
--

CREATE TABLE `djm_files` (
  `id` bigint UNSIGNED NOT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `d_j_m_s`
--

CREATE TABLE `d_j_m_s` (
  `id` bigint UNSIGNED NOT NULL,
  `kode_djm` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namaPosisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regionalDirektorat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `posisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unitSub` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `atasanLangsung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position_specification` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `position_objective` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `responsibilities` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `success_indicators` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `d_j_m_s`
--

INSERT INTO `d_j_m_s` (`id`, `kode_djm`, `namaPosisi`, `regionalDirektorat`, `posisi`, `unitSub`, `job`, `atasanLangsung`, `position_specification`, `position_objective`, `responsibilities`, `success_indicators`, `created_at`, `updated_at`) VALUES
(5, '43113606448', 'Officer Application & Database Development', 'Direktorat Layanan Kesehatan', 'VII - V', 'Digital Healthcare / CEDX', 'Digital & ICT/1.2 Information Technology', 'OSM Digital Healthcare', '- Kualifikasi minimal setara S1 Teknik Komputer / Teknik Informatika / Sistem Informasi.\r\n- Memahami Rekayasa Perangkat Lunak dan quality assurance.\r\n- Memiliki kemampuan programming (BE, FE) dan database.\r\n- Memahami berbagai framework dan bahasa pemrograman.\r\n- Memahami konsep scrum, agile, container dan devops.\r\n- Memiliki semangat dan dedikasi tinggi.\r\n- Mampu bekerja secara tim dan memahami bahasa Inggris dengan baik.', 'Bertanggung jawab melakukan pengembangan aplikasi dan database berdasarkan kebutuhan, analisis dan desain pada pengembangan system dan aplikasi layanan utama, pendukung dan operasional.', '- Mendukung initiating dan perencanaan pengembangan dalam menentukan backlog, waktu, dan deliverable pengembangan;\r\n- Mendukung analisis dan desain pengembangan system, aplikasi, dan database;\r\n- Melakukan pengembangan aplikasi dan database sesuai dengan analisis dan desain serta sesuai kaidah dan kebijakan keamanan siber;\r\n- Melakukan testing fungsi dan UAT terhadap aplikasi dan database dengan pedoman testing plan;\r\n- Melakukan perbaikan aplikasi dan database sesuai dengan hasil testing dan VAPT;\r\n- Mendukung pembuatan dokumen teknis dan pengembangan aplikasi dan data;\r\n- Melakukan evaluasi dan enhance pengembangan dan perbaikan terhadap aplikasi dan database.', '- Dokumen Project Charter dan Project Plan\r\n- Dokumen Analisis dan desain pengembangan\r\n- Aplikasi dan database\r\n- Dokumen Test Plan dan Test Report\r\n- Dokumen penyelesaian VAPT\r\n- Dokumen teknis dan dokumen pengembangan\r\n- Dokumen MoM evaluasi.', '2025-08-04 03:51:11', '2025-08-08 07:55:48');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint UNSIGNED NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `posisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direktorat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_karyawan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_ktp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ttl` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_ktp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_domisili` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_npwp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_perkawinan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_pendidikan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institusi_pendidikan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_lulus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payslip_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `nik`, `name`, `tanggal_lahir`, `email`, `posisi`, `direktorat`, `status_karyawan`, `no_ktp`, `jenis_kelamin`, `ttl`, `alamat_ktp`, `alamat_domisili`, `no_npwp`, `agama`, `status_perkawinan`, `no_telepon`, `level_pendidikan`, `jurusan`, `institusi_pendidikan`, `tahun_lulus`, `payslip_file`, `created_at`, `updated_at`) VALUES
(1, '879002', 'Satria Hadi', '1987-08-08', '879002@mail.com', 'Health Care Staffs', 'Health Care', 'Karyawan Tetap', '327491820490001', 'Pria', 'Blitar, 18 September 1987', 'Puri 11 Blok Y-00 Jl. Boulevard Residential, RT.004/RW.001, Pd. Pucung, Karang Tengah, Tangerang Selatan, Banten\r\n', 'Puri 11 Blok Y-00 Jl. Boulevard Residential, RT.004/RW.001, Pd. Pucung, Karang Tengah, Tangerang Selatan, Banten\r\n', '12.345.678.9-012.000\r\n', 'Islam', 'Kawin', '+62821 8471 0490\r\n', 'S1', 'Public Health', 'Universitas Indonesia', '2010', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` bigint UNSIGNED NOT NULL,
  `q1` tinyint NOT NULL,
  `q2` tinyint NOT NULL,
  `q3` tinyint NOT NULL,
  `q4` tinyint NOT NULL,
  `q5` tinyint NOT NULL,
  `saran` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kehadiran`
--

CREATE TABLE `kehadiran` (
  `id` bigint UNSIGNED NOT NULL,
  `q1` tinyint NOT NULL,
  `q2` tinyint NOT NULL,
  `q3` tinyint NOT NULL,
  `q4` tinyint NOT NULL,
  `q5` tinyint NOT NULL,
  `saran` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_07_03_035938_add_fields_to_users_table', 2),
(5, '2025_07_03_040804_remove_id_from_users_table', 3),
(6, '2025_07_03_040824_remove_name_from_users_table', 3),
(7, '2025_07_03_041912_remove_name_from_users_table', 4),
(8, '2025_07_04_064025_create_d_j_m_s_table', 5),
(9, '2025_07_08_073132_create_employees_table', 5),
(10, '2025_07_17_035846_create_feedback_table', 6),
(11, '2025_07_21_013850_create_trainings_table', 6),
(12, '2025_07_21_022529_create_d_j_m_s_table', 7),
(13, '2025_07_22_025444_add_timestamps_to_d_j_m_s_table', 8),
(14, '2025_07_24_034146_modify_trainings_table', 9),
(15, '2025_07_25_110247_create_kehadiran_table', 10),
(16, '2025_08_01_142700_create_djm_files_table', 10),
(17, '2025_08_08_022614_create_position_table', 11),
(19, '2025_08_14_143630_create_career_activities_table', 12),
(20, '2025_08_26_094314_add_dokumen_to_career_activities_table', 13),
(21, '2025_08_27_141312_recruitment', 14),
(22, '2025_08_28_145501_alter_recruitment_make_pendidikan_nullable', 15),
(23, '2025_08_28_160440_add_created_by_to_recruitment_table', 16);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_medical` tinyint(1) NOT NULL DEFAULT '0',
  `employment_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `directorate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vacancy_count` int NOT NULL DEFAULT '1',
  `progress` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recruitment`
--

CREATE TABLE `recruitment` (
  `id` bigint UNSIGNED NOT NULL,
  `namaPosisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regionalDirektorat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unitSub` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `band_posisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_kepegawaian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi_pekerjaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medis_non_medis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_lowongan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target_tanggal` date NOT NULL,
  `hiring_manager` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nde` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan_terakhir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jurusan_relevan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pengalaman_minimum` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `domisili_preferensi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `batasan_usia` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `created_by_role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('gtef3f3ArxDPEZjrqFCHZQY9R2qSEgpoZLLakofh', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiTlFCS1VJNVpDNDdRR3RlM1RLUVlDanhsSFZkNVpqZmtkeUZXM05QaSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtOO3M6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6MjY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9ob21lIjt9fQ==', 1751622939),
('Nq7szBM6iT6rwBybUwqa19U7zrCM73myx3w2GsE4', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiYW9tQXJJVTBPTHFiSEl0NHFMTDVYQzNiR3dWSmp6c3dWU2hCNHRUdiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtOO3M6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6MjY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9ob21lIjt9fQ==', 1751858124);

-- --------------------------------------------------------

--
-- Table structure for table `trainings`
--

CREATE TABLE `trainings` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id_training` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_training` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_training` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe_training` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sertifikat_partisipasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sertifikat_pelatihan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penyelenggara` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `durasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_mulai` datetime NOT NULL,
  `tanggal_selesai` datetime NOT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `metode_pelatihan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `partisipan` int NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `biaya` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_biaya` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trainings`
--

INSERT INTO `trainings` (`id`, `created_at`, `updated_at`, `id_training`, `nama_training`, `deskripsi_training`, `tipe_training`, `sertifikat_partisipasi`, `sertifikat_pelatihan`, `penyelenggara`, `durasi`, `tanggal_mulai`, `tanggal_selesai`, `lokasi`, `metode_pelatihan`, `partisipan`, `status`, `biaya`, `total_biaya`) VALUES
(2, '2025-07-30 03:00:02', '2025-07-30 03:00:02', 'TR12345', 'Digital Literacy', 'This is the description of training digital literacy 29 May 2025', 'Internal', 'Ada', 'Ada', 'Learning Centre', '2 Days', '2025-07-30 10:00:00', '2025-07-31 10:00:00', 'Gedung ABC Jl. Merah Putih No.30 Bandung', 'Online', 30, 'Scheduled', 'Rp. 1.300.000', 'Rp. 39.000.000');

-- --------------------------------------------------------

--
-- Table structure for table `training_history`
--

CREATE TABLE `training_history` (
  `id` bigint NOT NULL,
  `nama_training` text NOT NULL,
  `nama_pelaksana` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_akhir` date NOT NULL,
  `status` text NOT NULL,
  `sertifikat` text NOT NULL,
  `actions` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `training_history`
--

INSERT INTO `training_history` (`id`, `nama_training`, `nama_pelaksana`, `tanggal_mulai`, `tanggal_akhir`, `status`, `sertifikat`, `actions`) VALUES
(1, 'Effective Communication Skills', 'Learning Centre', '2025-06-29', '2025-06-29', 'selesai', '', ''),
(1, 'Effective Communication Skills', 'Learning Centre', '2025-06-29', '2025-06-29', 'selesai', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `username`, `password`, `role`, `active`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
('admin@example.com', 'adminAdmin', '$2y$12$KGwuzZuegB1lxs.BhNrEFOEHO.2udKSafz5z7rFpACqVtX2aJLzqS', 'admin', '1', NULL, NULL, '2025-08-05 09:08:13', '2025-08-05 09:08:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `career_activities`
--
ALTER TABLE `career_activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `career_activities_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `djm_files`
--
ALTER TABLE `djm_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `d_j_m_s`
--
ALTER TABLE `d_j_m_s`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `d_j_m_s_regionaldirektorat_unique` (`regionalDirektorat`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_nik_unique` (`nik`),
  ADD UNIQUE KEY `employees_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recruitment`
--
ALTER TABLE `recruitment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `trainings`
--
ALTER TABLE `trainings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `career_activities`
--
ALTER TABLE `career_activities`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `djm_files`
--
ALTER TABLE `djm_files`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `d_j_m_s`
--
ALTER TABLE `d_j_m_s`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kehadiran`
--
ALTER TABLE `kehadiran`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recruitment`
--
ALTER TABLE `recruitment`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `trainings`
--
ALTER TABLE `trainings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `career_activities`
--
ALTER TABLE `career_activities`
  ADD CONSTRAINT `career_activities_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
