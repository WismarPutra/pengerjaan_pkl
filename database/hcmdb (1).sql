-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2025 at 04:08 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hcmdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `career_activities`
--

CREATE TABLE `career_activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `nama_role` varchar(255) NOT NULL,
  `unitSub` varchar(255) DEFAULT NULL,
  `regional_direktorat` varchar(255) DEFAULT NULL,
  `band_posisi` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `statusPJ` varchar(255) DEFAULT NULL,
  `tanggalKDMP` date DEFAULT NULL,
  `tanggalBand` date DEFAULT NULL,
  `tanggalTKWT` date DEFAULT NULL,
  `tanggal_akhirTKWT` date DEFAULT NULL,
  `tanggal_mutasi` date DEFAULT NULL,
  `tanggalPJ` date DEFAULT NULL,
  `tanggal_lepasPJ` date DEFAULT NULL,
  `tanggal_pensiun` date DEFAULT NULL,
  `tanggal_akhir_kontrak` date DEFAULT NULL,
  `dokumen_nota_dinas` varchar(255) DEFAULT NULL,
  `dokumen_lainnya` varchar(255) DEFAULT NULL,
  `dokumenSK` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `djm_files`
--

CREATE TABLE `djm_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `filename` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `d_j_m_s`
--

CREATE TABLE `d_j_m_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_djm` varchar(20) NOT NULL,
  `namaPosisi` varchar(255) NOT NULL,
  `regionalDirektorat` varchar(255) NOT NULL,
  `posisi` varchar(255) NOT NULL,
  `unitSub` varchar(255) NOT NULL,
  `job` varchar(255) NOT NULL,
  `atasanLangsung` varchar(255) NOT NULL,
  `position_specification` longtext NOT NULL,
  `position_objective` longtext NOT NULL,
  `responsibilities` longtext NOT NULL,
  `success_indicators` longtext NOT NULL,
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
  `id` bigint(20) UNSIGNED NOT NULL,
  `nik` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `posisi` varchar(255) NOT NULL,
  `direktorat` varchar(255) NOT NULL,
  `status_karyawan` varchar(255) NOT NULL,
  `no_ktp` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `ttl` varchar(255) NOT NULL,
  `alamat_ktp` varchar(255) NOT NULL,
  `alamat_domisili` varchar(255) NOT NULL,
  `no_npwp` varchar(255) NOT NULL,
  `agama` varchar(255) NOT NULL,
  `status_perkawinan` varchar(255) NOT NULL,
  `no_telepon` varchar(255) NOT NULL,
  `level_pendidikan` varchar(255) NOT NULL,
  `jurusan` varchar(255) NOT NULL,
  `institusi_pendidikan` varchar(255) NOT NULL,
  `tahun_lulus` varchar(255) NOT NULL,
  `payslip_file` varchar(255) DEFAULT NULL,
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
-- Table structure for table `employee_families`
--

CREATE TABLE `employee_families` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `pendidikan` varchar(255) DEFAULT NULL,
  `status_anak` varchar(255) DEFAULT NULL,
  `urutan_anak` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `q1` tinyint(4) NOT NULL,
  `q2` tinyint(4) NOT NULL,
  `q3` tinyint(4) NOT NULL,
  `q4` tinyint(4) NOT NULL,
  `q5` tinyint(4) NOT NULL,
  `saran` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kehadiran`
--

CREATE TABLE `kehadiran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `q1` tinyint(4) NOT NULL,
  `q2` tinyint(4) NOT NULL,
  `q3` tinyint(4) NOT NULL,
  `q4` tinyint(4) NOT NULL,
  `q5` tinyint(4) NOT NULL,
  `saran` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
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
(20, '2025_08_26_094314_add_dokumen_to_career_activities_table', 13),
(21, '2025_08_27_141312_recruitment', 14),
(22, '2025_08_28_145501_alter_recruitment_make_pendidikan_nullable', 15),
(23, '2025_08_28_160440_add_created_by_to_recruitment_table', 16),
(24, '2025_09_02_204427_create_employee_families_table', 17),
(25, '2025_08_14_143630_create_career_activities_table', 18);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `is_medical` tinyint(1) NOT NULL DEFAULT 0,
  `employment_status` varchar(255) DEFAULT NULL,
  `directorate` varchar(255) DEFAULT NULL,
  `vacancy_count` int(11) NOT NULL DEFAULT 1,
  `progress` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recruitment`
--

CREATE TABLE `recruitment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `namaPosisi` varchar(255) NOT NULL,
  `regionalDirektorat` varchar(255) NOT NULL,
  `unitSub` varchar(255) NOT NULL,
  `band_posisi` varchar(255) NOT NULL,
  `status_kepegawaian` varchar(255) NOT NULL,
  `lokasi_pekerjaan` varchar(255) NOT NULL,
  `medis_non_medis` varchar(255) NOT NULL,
  `jumlah_lowongan` varchar(255) NOT NULL,
  `target_tanggal` date NOT NULL,
  `hiring_manager` varchar(255) NOT NULL,
  `nde` varchar(255) NOT NULL,
  `pendidikan_terakhir` varchar(255) DEFAULT NULL,
  `jurusan_relevan` varchar(255) DEFAULT NULL,
  `pengalaman_minimum` varchar(255) DEFAULT NULL,
  `domisili_preferensi` varchar(255) DEFAULT NULL,
  `jenis_kelamin` varchar(255) DEFAULT NULL,
  `batasan_usia` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_by_role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('DaCBTbKZDDyRjDsqYiTARU44jjhTaL8aASpc5Is3', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibFM0TVpCNWFGTEk3QkNUSk9aWXpYNHVaalFMcU9ZdDdVVUxXVFNVRSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly9sb2NhbGhvc3QveWFrZXNIQ00tbWFpbi9wdWJsaWMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7Tjt9', 1756863217),
('tnbawyaIq4kNA9RXmWceoNUQ93Hi3E0OJdpgavil', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUXpuQXUzamdQcXI3MTRBcXpObmJuUHFqbXI4N1NDamV1cVQwSlczVSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTY6Imh0dHA6Ly9sb2NhbGhvc3QveWFrZXNIQ00tbWFpbi9wdWJsaWMvcmVjcnVpdG1lbnQvY3JlYXRlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO047fQ==', 1756824079);

-- --------------------------------------------------------

--
-- Table structure for table `trainings`
--

CREATE TABLE `trainings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `id_training` varchar(255) NOT NULL,
  `nama_training` varchar(255) NOT NULL,
  `deskripsi_training` varchar(255) NOT NULL,
  `tipe_training` varchar(255) NOT NULL,
  `sertifikat_partisipasi` varchar(255) NOT NULL,
  `sertifikat_pelatihan` varchar(255) NOT NULL,
  `penyelenggara` varchar(255) NOT NULL,
  `durasi` varchar(255) NOT NULL,
  `tanggal_mulai` datetime NOT NULL,
  `tanggal_selesai` datetime NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `metode_pelatihan` varchar(255) NOT NULL,
  `partisipan` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `biaya` varchar(255) NOT NULL,
  `total_biaya` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trainings`
--

INSERT INTO `trainings` (`id`, `created_at`, `updated_at`, `id_training`, `nama_training`, `deskripsi_training`, `tipe_training`, `sertifikat_partisipasi`, `sertifikat_pelatihan`, `penyelenggara`, `durasi`, `tanggal_mulai`, `tanggal_selesai`, `lokasi`, `metode_pelatihan`, `partisipan`, `status`, `biaya`, `total_biaya`) VALUES
(2, '2025-07-30 03:00:02', '2025-07-30 03:00:02', 'TR12345', 'Digital Literacy', 'This is the description of training digital literacy 29 May 2025', 'Internal', 'Ada', 'Ada', 'Learning Centre', '2 Days', '2025-07-30 10:00:00', '2025-07-31 10:00:00', 'Gedung ABC Jl. Merah Putih No.30 Bandung', 'Online', 30, 'Scheduled', 'Rp. 1.300.000', 'Rp. 39.000.000');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `active` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
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
-- Indexes for table `employee_families`
--
ALTER TABLE `employee_families`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_families_employee_id_foreign` (`employee_id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `career_activities`
--
ALTER TABLE `career_activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_families`
--
ALTER TABLE `employee_families`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `career_activities`
--
ALTER TABLE `career_activities`
  ADD CONSTRAINT `career_activities_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employee_families`
--
ALTER TABLE `employee_families`
  ADD CONSTRAINT `employee_families_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
