-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 10, 2022 at 11:51 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cekterminal`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_06_13_031101_create_terminals_table', 1),
(6, '2022_06_13_032357_create_pendataanbis_table', 1),
(7, '2022_06_19_131233_create_pelabuhans_table', 1),
(8, '2022_07_10_070111_create_pendataanpelabuhans_table', 1);

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
-- Table structure for table `pelabuhans`
--

CREATE TABLE `pelabuhans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pelabuhan_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `berangkatordatang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jmltrip_berangkat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `e_pnp_berangkat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `e_r2_berangkat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `e_r4_berangkat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `e_bus_berangkat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `e_truk_berangkat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jmltrip_datang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `e_pnp_datang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `e_r2_datang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `e_r4_datang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `e_bus_datang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `e_truk_datang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelabuhans`
--

INSERT INTO `pelabuhans` (`id`, `pelabuhan_id`, `tanggal`, `berangkatordatang`, `jmltrip_berangkat`, `e_pnp_berangkat`, `e_r2_berangkat`, `e_r4_berangkat`, `e_bus_berangkat`, `e_truk_berangkat`, `jmltrip_datang`, `e_pnp_datang`, `e_r2_datang`, `e_r4_datang`, `e_bus_datang`, `e_truk_datang`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-07-01', 'berangkat', '12', '1', '1', '2', '2', '3', '0', '0', '0', '0', '0', '0', '2022-07-10 01:16:12', '2022-07-10 01:16:12');

-- --------------------------------------------------------

--
-- Table structure for table `pendataanbis`
--

CREATE TABLE `pendataanbis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `terminal_id` bigint(20) UNSIGNED NOT NULL,
  `jml_bis_akap` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jml_pnpg_akap` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jml_bis_akdp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jml_pnpg_akdp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `akaporakdp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datangorberangkat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pendataanpelabuhans`
--

CREATE TABLE `pendataanpelabuhans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_pelabuhan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pendataanpelabuhans`
--

INSERT INTO `pendataanpelabuhans` (`id`, `nama_pelabuhan`, `created_at`, `updated_at`) VALUES
(1, 'Tanjung api-api', '2022-07-10 01:10:29', '2022-07-10 01:10:29'),
(2, 'Muntok', '2022-07-10 01:10:33', '2022-07-10 01:10:33'),
(3, 'Tanjung RU', '2022-07-10 01:10:51', '2022-07-10 01:10:51'),
(4, 'Sadai', '2022-07-10 01:10:59', '2022-07-10 01:10:59'),
(5, '35 Ilir', '2022-07-10 01:11:07', '2022-07-10 01:11:07');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `terminals`
--

CREATE TABLE `terminals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_terminal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `pelabuhans`
--
ALTER TABLE `pelabuhans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendataanbis`
--
ALTER TABLE `pendataanbis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendataanpelabuhans`
--
ALTER TABLE `pendataanpelabuhans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `terminals`
--
ALTER TABLE `terminals`
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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pelabuhans`
--
ALTER TABLE `pelabuhans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pendataanbis`
--
ALTER TABLE `pendataanbis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pendataanpelabuhans`
--
ALTER TABLE `pendataanpelabuhans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `terminals`
--
ALTER TABLE `terminals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
