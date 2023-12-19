-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2023 at 03:05 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel-hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `speciality` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `date`, `speciality`, `user_id`, `created_at`, `updated_at`) VALUES
(2, '2023-12-15', 'Pediatría', 1, '2023-12-16 10:35:06', '2023-12-16 10:35:06'),
(9, '2023-12-20', 'Pediatría', 4, '2023-12-19 07:30:20', '2023-12-19 07:30:20'),
(10, '2023-12-20', 'Pediatría', 8, '2023-12-19 07:31:31', '2023-12-19 07:31:31'),
(11, '2023-12-14', 'Pediatría', 1, '2023-12-19 07:39:28', '2023-12-19 07:39:28'),
(12, '2023-12-20', 'Dermatología', 1, '2023-12-19 07:39:52', '2023-12-19 07:39:52'),
(13, '2023-12-20', 'Oncología', 4, '2023-12-19 08:01:41', '2023-12-19 08:01:41');

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
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
(5, '2023_12_16_022100_create_appointments_table', 2),
(6, '2023_12_16_022143_create_novelties_table', 2),
(7, '2023_12_16_023209_add_role_to_users_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `novelties`
--

CREATE TABLE `novelties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `observation` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `appointment_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `novelties`
--

INSERT INTO `novelties` (`id`, `observation`, `appointment_id`, `created_at`, `updated_at`) VALUES
(1, 'Se recetaron 500 mg de loratadina', 2, '2023-12-18 00:54:31', '2023-12-18 00:54:31');

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'David Lopez', 'davidmoya2014@gmail.com', NULL, '$2y$10$h.f3mbUw/Z.JbMPetsKzK.6CdYucj2bggJl.y.bsZyMLX30BxuTRm', NULL, '2023-12-16 08:49:33', '2023-12-16 08:49:33', 'admin'),
(2, 'Cris Lopez', 'crislopez@gmail.com', NULL, '$2y$10$PEH8OkBtPY8lVK/P3M0/ROtH94vugePmZq9xyIUhiz2FsB1sOyOv2', NULL, '2023-12-16 09:32:02', '2023-12-16 09:32:02', 'admin'),
(3, 'adadsa', 'enrique@gmail.com', NULL, '$2y$10$2TQeQYGiUl1Uq4d5YMague.7pHtrYbGkNOa.CzjhlFUaiH/Beotci', NULL, '2023-12-16 09:57:40', '2023-12-16 09:57:40', 'paciente'),
(4, 'paciente 1', 'paciente1@gmail.com', NULL, '$2y$10$S4vSpz3wSaOkQvEFJXVCaOGvYycmUnJs9TMJYbGbrdeMWN/PcbZiO', NULL, '2023-12-16 10:00:18', '2023-12-16 10:00:18', 'paciente'),
(5, 'paciente 2', 'paciente2@gmail.com', NULL, '$2y$10$PZTef7O6r6Affyx7qpHLXOuQFSkHjEZ7VzaIMDtMHxxLkNFKOZaO2', NULL, '2023-12-16 10:03:33', '2023-12-16 10:03:33', 'paciente'),
(6, 'paciente 3', 'paciente3@gmail.com', NULL, '$2y$10$JfTVb184ay/7h3ymI4zKeO05laAPemvO7stt4xFb5U8sF84WXiuay', NULL, '2023-12-16 10:05:20', '2023-12-16 10:05:20', 'paciente'),
(7, 'paciente0', 'paciente0@gmail.com', NULL, '$2y$10$m9bFpsTZYzS9kiHsb9CiA.rkpcBHeEIVKNqfa3W.DL6pys7y7aEmy', NULL, '2023-12-16 10:07:50', '2023-12-16 10:07:50', 'paciente'),
(8, 'Paciente 4', 'paciente4@gmail.com', NULL, '$2y$10$KyWdztAPhv05Jkmx5IUpAeogEg7SW1LWm/MxuFQKcqimAUDn/tIGa', NULL, '2023-12-16 10:10:17', '2023-12-16 10:10:17', 'paciente'),
(9, 'Paciente 5', 'paciente5@gmail.com', NULL, '$2y$10$lEVR0HvpnrKWnwNEitZ0n.Pcq46tPX3wZL8cn2yaG3HvRQmEUKtua', NULL, '2023-12-16 10:11:52', '2023-12-16 10:11:52', 'paciente');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointments_user_id_foreign` (`user_id`);

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
-- Indexes for table `novelties`
--
ALTER TABLE `novelties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `novelties_appointment_id_foreign` (`appointment_id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `novelties`
--
ALTER TABLE `novelties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `novelties`
--
ALTER TABLE `novelties`
  ADD CONSTRAINT `novelties_appointment_id_foreign` FOREIGN KEY (`appointment_id`) REFERENCES `appointments` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

