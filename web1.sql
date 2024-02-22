-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2024 at 09:58 AM
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
-- Database: `web1`
--

-- --------------------------------------------------------

--
-- Table structure for table `daftarkegiatans`
--

CREATE TABLE `daftarkegiatans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_pelaksanaan` date NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `nama_kegiatan` varchar(191) NOT NULL,
  `jeniskegiatan_id` bigint(20) UNSIGNED NOT NULL,
  `deskripsi` varchar(191) NOT NULL,
  `ruangan` varchar(191) NOT NULL,
  `letter_file` varchar(191) NOT NULL,
  `letter_type` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `daftarkegiatans`
--

INSERT INTO `daftarkegiatans` (`id`, `tanggal_pelaksanaan`, `department_id`, `nama_kegiatan`, `jeniskegiatan_id`, `deskripsi`, `ruangan`, `letter_file`, `letter_type`, `created_at`, `updated_at`) VALUES
(13, '2024-02-01', 1, 'SUPERGAMES 1', 1, 'Merupakan kegiatan Makrab', 'Gedung 375', 'assets/letter-file/Xow5Wp06ztuc6Wl00mMPYyQnar7ZjOZ007PfWV7M.png', 'Daftar Kegiatan', '2024-02-01 01:07:58', '2024-02-04 12:15:34');

-- --------------------------------------------------------

--
-- Table structure for table `datapendaftaran`
--

CREATE TABLE `datapendaftaran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_pelaksanaan` date NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `nama_kegiatan` varchar(191) NOT NULL,
  `jeniskegiatan_id` bigint(20) UNSIGNED NOT NULL,
  `deskripsi` varchar(191) NOT NULL,
  `ruangan` varchar(191) NOT NULL,
  `letter_file` varchar(191) NOT NULL,
  `letter_type` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `datapendaftars`
--

CREATE TABLE `datapendaftars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `npm_nidn` varchar(191) NOT NULL,
  `instansi` varchar(191) NOT NULL,
  `jenisikutserta_id` varchar(191) NOT NULL,
  `audience_type` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `datapendaftars`
--

INSERT INTO `datapendaftars` (`id`, `user_id`, `npm_nidn`, `instansi`, `jenisikutserta_id`, `audience_type`, `created_at`, `updated_at`) VALUES
(1, '1', '20552011053', 'Sekolah Tinggi Teknologi Bandung', '1', 'Pendaftar', '2024-01-28 23:23:02', '2024-01-28 23:23:02');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'OXIGEN', '2024-01-20 10:54:36', '2024-01-20 10:54:36');

-- --------------------------------------------------------

--
-- Table structure for table `disposisis`
--

CREATE TABLE `disposisis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `letter_id` bigint(20) UNSIGNED NOT NULL,
  `lampiran` varchar(191) NOT NULL,
  `status` varchar(191) NOT NULL,
  `sifat` varchar(191) NOT NULL,
  `petunjuk` varchar(191) DEFAULT NULL,
  `catatan_rektor` text DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `tgl_aju_kembali` date DEFAULT NULL,
  `penerima_disposisi_2` varchar(191) DEFAULT NULL,
  `kepada` varchar(191) DEFAULT NULL,
  `kepada_2` varchar(191) DEFAULT NULL,
  `petunjuk_kpd_1` text DEFAULT NULL,
  `petunjuk_kpd_2` text DEFAULT NULL,
  `tgl_selesai_2` date DEFAULT NULL,
  `tgl_selesai_3` date DEFAULT NULL,
  `penerima_2` varchar(191) DEFAULT NULL,
  `penerima_3` varchar(191) DEFAULT NULL,
  `letter_file` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `disposisis`
--

INSERT INTO `disposisis` (`id`, `letter_id`, `lampiran`, `status`, `sifat`, `petunjuk`, `catatan_rektor`, `tgl_selesai`, `tgl_aju_kembali`, `penerima_disposisi_2`, `kepada`, `kepada_2`, `petunjuk_kpd_1`, `petunjuk_kpd_2`, `tgl_selesai_2`, `tgl_selesai_3`, `penerima_2`, `penerima_3`, `letter_file`, `created_at`, `updated_at`) VALUES
(2, 3, 'Pengadaan Acara', 'Asli', 'Segera', 'Setuju', 'Silahkan Laksanakan', '2024-02-05', '2024-02-06', 'Kabag', 'Dedi', 'Dedi', 'Uang Cair 5 Juta Rupiah', 'Silahkan Laksanakan Sebaik Baiknya', '2024-02-06', '2024-02-06', 'Rosadi', 'Rosadi', NULL, '2024-02-04 13:16:30', '2024-02-04 13:16:30');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `filters`
--

CREATE TABLE `filters` (
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `jeniskegiatan_id` bigint(20) UNSIGNED NOT NULL,
  `daftarkegiatan_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jenisikutsertas`
--

CREATE TABLE `jenisikutsertas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenisikutsertas`
--

INSERT INTO `jenisikutsertas` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'ONLINE', '2024-01-28 23:17:37', '2024-01-28 23:17:37'),
(2, 'OFFLINE', '2024-01-28 23:17:46', '2024-01-28 23:17:46');

-- --------------------------------------------------------

--
-- Table structure for table `jeniskegiatan`
--

CREATE TABLE `jeniskegiatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jeniskegiatan`
--

INSERT INTO `jeniskegiatan` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'SEMINAR', '2024-01-20 10:54:47', '2024-01-31 01:35:13'),
(4, 'WORKSHOP', '2024-02-01 01:08:21', '2024-02-01 01:08:21');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_pelaksanaan` date NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `nama_kegiatan` varchar(191) NOT NULL,
  `jeniskegiatan_id` varchar(191) NOT NULL,
  `deskripisi` varchar(191) NOT NULL,
  `ruangan` varchar(191) NOT NULL,
  `letter_file` varchar(191) NOT NULL,
  `letter_type` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `letterouts`
--

CREATE TABLE `letterouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `letter_no` varchar(191) NOT NULL,
  `letterout_date` date NOT NULL,
  `regarding` varchar(191) NOT NULL,
  `purpose` varchar(191) NOT NULL,
  `letter_file` varchar(191) NOT NULL,
  `letter_type` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `letterouts`
--

INSERT INTO `letterouts` (`id`, `letter_no`, `letterout_date`, `regarding`, `purpose`, `letter_file`, `letter_type`, `created_at`, `updated_at`) VALUES
(1, '03', '2024-02-05', 'SuperGames', 'Dedi', 'assets/letter-file/4IwFYZ97yLPH1HsVWgLya0H0lm9fw7g6o48u8tiZ.pdf', 'Surat Keluar', '2024-02-04 12:32:04', '2024-02-04 12:59:32');

-- --------------------------------------------------------

--
-- Table structure for table `letters`
--

CREATE TABLE `letters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `letter_no` varchar(191) NOT NULL,
  `letter_date` date NOT NULL,
  `date_received` date NOT NULL,
  `agenda_no` varchar(191) NOT NULL,
  `regarding` varchar(191) NOT NULL,
  `disposisi` varchar(191) NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `letter_file` varchar(191) NOT NULL,
  `letter_type` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `letters`
--

INSERT INTO `letters` (`id`, `letter_no`, `letter_date`, `date_received`, `agenda_no`, `regarding`, `disposisi`, `department_id`, `sender_id`, `letter_file`, `letter_type`, `created_at`, `updated_at`) VALUES
(3, '03', '2024-02-03', '2024-02-08', '01', 'SUPERGAMES 1', 'Kabag', 1, 1, 'assets/letter-file/5d17ypzMEAi5nkmxvEENBsGP3jTarsrIqkvpzrkZ.pdf', 'Surat Masuk', '2024-02-04 13:15:26', '2024-02-04 13:15:26');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(10, '2024_01_18_123740_create_daftarkegiatan', 2),
(56, '2014_10_12_000000_create_users_table', 3),
(57, '2014_10_12_100000_create_password_resets_table', 3),
(58, '2019_08_19_000000_create_failed_jobs_table', 3),
(59, '2019_12_14_000001_create_personal_access_tokens_table', 3),
(60, '2021_12_29_043513_create_departments_table', 3),
(61, '2021_12_29_065240_create_senders_table', 3),
(62, '2021_12_30_055748_create_letters_table', 3),
(63, '2022_08_06_154039_create_outletters_table', 3),
(64, '2022_08_09_050203_create_disposisis_table', 3),
(65, '2024_01_18_124044_create_daftarkegiatan', 3),
(66, '2024_01_19_101030_kegiatan', 3),
(68, '2024_01_20_202603_daftarkegiatans', 4),
(69, '2024_01_22_194935_datapendaftaran', 5),
(70, '2024_01_23_104837_datapendaftar', 6),
(71, '2024_01_23_104949_filterkegiatan', 6),
(72, '2024_01_23_110313_jenisikutserta', 6),
(73, '2024_01_25_095229_datapendaftars', 7),
(74, '2024_01_29_061416_jenisikutsertas', 8),
(75, '2024_01_31_082022_prodis', 9),
(76, '2024_01_31_083722_prodi', 10);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'TEKNIK INFORMATIKA', '2024-01-31 01:39:36', '2024-01-31 01:39:48'),
(2, 'TEKNIK INDUSTRI', '2024-01-31 01:39:59', '2024-01-31 01:39:59'),
(3, 'DESAIN KOMUNIKASI VISUAL', '2024-01-31 01:40:09', '2024-01-31 01:40:09');

-- --------------------------------------------------------

--
-- Table structure for table `senders`
--

CREATE TABLE `senders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `senders`
--

INSERT INTO `senders` (`id`, `name`, `address`, `phone`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Dedi', 'Jl.Manokwari No.18, Antapani Kidul, Antapani, Bandung.', '085659483661', 'dedir8361@gmail.com', '2024-01-21 10:14:29', '2024-01-21 10:14:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `profile` varchar(191) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `profile`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Dedi Rosadi', 'dedir8361@gmail.com', NULL, '$2y$10$vk5uKWfsCvRDFIrdN5bZy./uAjMGzH7Z/vifWdcTV.iuc8OT9UMYa', 'assets/profile-images/iaaY247IxmuXtliwWQBnw1xQK7MhssmrPSoTEe17.png', NULL, '2024-01-19 05:15:26', '2024-02-05 00:57:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftarkegiatans`
--
ALTER TABLE `daftarkegiatans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datapendaftaran`
--
ALTER TABLE `datapendaftaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datapendaftars`
--
ALTER TABLE `datapendaftars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `disposisis`
--
ALTER TABLE `disposisis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jenisikutsertas`
--
ALTER TABLE `jenisikutsertas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jeniskegiatan`
--
ALTER TABLE `jeniskegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `letterouts`
--
ALTER TABLE `letterouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `letters`
--
ALTER TABLE `letters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `senders`
--
ALTER TABLE `senders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daftarkegiatans`
--
ALTER TABLE `daftarkegiatans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `datapendaftaran`
--
ALTER TABLE `datapendaftaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `datapendaftars`
--
ALTER TABLE `datapendaftars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `disposisis`
--
ALTER TABLE `disposisis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenisikutsertas`
--
ALTER TABLE `jenisikutsertas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jeniskegiatan`
--
ALTER TABLE `jeniskegiatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `letterouts`
--
ALTER TABLE `letterouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `letters`
--
ALTER TABLE `letters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `senders`
--
ALTER TABLE `senders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
