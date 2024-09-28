-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2024 at 07:32 PM
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
-- Database: `car_rental`
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

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('customer@gmail.com|127.0.0.1', 'i:1;', 1727541787),
('customer@gmail.com|127.0.0.1:timer', 'i:1727541786;', 1727541786),
('customer2@gmail.com|127.0.0.1', 'i:1;', 1727456819),
('customer2@gmail.com|127.0.0.1:timer', 'i:1727456819;', 1727456819);

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
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `car_type` varchar(255) NOT NULL,
  `daily_rent_price` decimal(8,2) NOT NULL,
  `availability` tinyint(1) NOT NULL DEFAULT 1,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `name`, `brand`, `model`, `year`, `car_type`, `daily_rent_price`, `availability`, `image`, `created_at`, `updated_at`) VALUES
(3, 'Prius', 'Toyota', 'Prius Hybrid', 2020, 'Hybrid', 15500.00, 1, 'storage/uploads/car/015-2023-Toyota-Prius-Limited-in-motion.jpg', '2024-09-27 10:20:29', '2024-09-27 10:20:29'),
(4, 'Camry', 'Toyota', 'Camry Hybrid', 2021, 'Hybrid', 16500.00, 0, 'storage/uploads/car/840_560.jpg', '2024-09-27 10:26:42', '2024-09-27 10:52:51'),
(5, 'Altima', 'Nissan', 'Altima S', 2019, 'Sedan', 15800.00, 0, 'storage/uploads/car/b10e3bf7a24e46139816c27c7aaaf8d6_c0x0-768x431.png', '2024-09-27 10:28:12', '2024-09-28 10:41:25'),
(6, 'Fusion', 'Ford', 'Fusion SE', 2021, 'Sedan', 16000.00, 1, 'storage/uploads/car/56465465465465456jhgj.jpg', '2024-09-27 10:29:37', '2024-09-27 10:29:37'),
(7, 'Accord', 'Honda', 'Accord Hybrid', 2020, 'Hybrid', 14500.00, 1, 'storage/uploads/car/fg46g54df6g4654g.jpg', '2024-09-27 10:31:59', '2024-09-27 10:31:59'),
(8, 'Octavia', 'Skoda', 'Octavia SE', 2019, 'Sedan', 14500.00, 1, 'storage/uploads/car/4535435i5oi3oiu5.jpg', '2024-09-27 10:34:36', '2024-09-27 10:34:36'),
(9, 'Corolla', 'Toyota', 'Corolla LE', 2021, 'Sedan', 13500.00, 0, 'storage/uploads/car/Toyota-Corolla-LE-2021.jpg', '2024-09-27 10:36:39', '2024-09-27 10:53:32'),
(10, 'C-Class', 'Mercedes-Benz', 'C200', 2021, 'Sedan', 15000.00, 1, 'storage/uploads/car/GUR5232.jpg', '2024-09-27 10:38:33', '2024-09-28 10:13:08');

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
(7, '0001_01_01_000000_create_users_table', 1),
(8, '0001_01_01_000001_create_cache_table', 1),
(9, '0001_01_01_000002_create_jobs_table', 1),
(10, '2024_09_23_135148_create_cars_table', 1),
(11, '2024_09_23_135211_create_rentals_table', 1),
(12, '2024_09_25_050617_add_status_to_rentals_table', 1);

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
-- Table structure for table `rentals`
--

CREATE TABLE `rentals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `car_id` bigint(20) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `total_cost` decimal(8,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('Ongoing','Completed','Canceled') NOT NULL DEFAULT 'Ongoing'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rentals`
--

INSERT INTO `rentals` (`id`, `user_id`, `car_id`, `start_date`, `end_date`, `total_cost`, `created_at`, `updated_at`, `status`) VALUES
(14, 5, 3, '2024-09-27', '2024-09-29', 31000.00, '2024-09-27 11:05:06', '2024-09-27 11:32:40', 'Completed'),
(15, 5, 6, '2024-09-27', '2024-09-30', 48000.00, '2024-09-27 11:05:41', '2024-09-28 11:08:39', 'Completed'),
(16, 4, 8, '2024-09-27', '2024-09-28', 14500.00, '2024-09-27 11:06:23', '2024-09-27 11:06:41', 'Canceled'),
(17, 4, 3, '2024-09-27', '2024-09-28', 15500.00, '2024-09-27 11:06:38', '2024-09-28 11:01:23', 'Completed'),
(18, 6, 10, '2024-09-27', '2024-10-02', 74000.00, '2024-09-27 11:35:03', '2024-09-28 10:40:45', 'Completed'),
(19, 4, 8, '2024-09-28', '2024-09-30', 29000.00, '2024-09-28 10:00:23', '2024-09-28 10:02:00', 'Completed'),
(20, 4, 7, '2024-09-28', '2024-09-30', 29000.00, '2024-09-28 11:10:55', '2024-09-28 11:10:59', 'Canceled'),
(21, 4, 10, '2024-09-28', '2024-09-30', 30000.00, '2024-09-28 11:30:12', '2024-09-28 11:30:18', 'Canceled');

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
('14bgA8Zf69a5XtSckftktS9KY1kZPDnV0skjsDF8', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidTVKbTF3UmJGQzY3bUpvUjU1TTNtOURLUHhWNEU0R1Z4Y214dWNsZSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fX0=', 1727544627);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'customer',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(3, 'Admin 1', 'admin@gmail.com', '$2y$12$4s1TIrUIMo9tL7tPJbVQX.FN7ddcYL6FLBbJokCvL3EZTwwPhUPry', 'admin', '2024-09-27 03:02:16', '2024-09-27 13:46:23'),
(4, 'Mr X', 'customer1@gmail.com', '$2y$12$4LV0X2MNJcNcykQWMxgpo.yYiNsF1VASFzmjv.ohO9CK/JRNIy/Ym', 'customer', '2024-09-27 10:54:50', '2024-09-27 10:54:50'),
(5, 'John Doe', 'jhon@doe.com', '$2y$12$A6BB9Yb2Bs63Q6hPtMPm.uOPm/hqY/afWHmUPB.sJTtTbl1pB5xw2', 'customer', '2024-09-27 11:02:15', '2024-09-27 11:02:15'),
(6, 'Mr Customer', 'customer2@gmail.com', '$2y$12$9IF.uG4jvvnHVPpeZv5YT.OjqGPAN6u2z/PXf8vckFLEdwqTLY9/a', 'customer', '2024-09-27 11:34:36', '2024-09-27 11:34:36'),
(7, 'Mr Rahim', 'customer5@gmail.com', '$2y$12$ZMKXVUtTjFLw7i28ziYxEukeBna8spLYIU0byGPR/6ap45HJdrUWO', 'customer', '2024-09-28 09:52:59', '2024-09-28 09:52:59'),
(8, 'Jahid Hasan', 'jahid@gmail.com', '$2y$12$pyYL8SRVquqi4.iErlUdluTDJAMwO7u5eh3hYZSN89IyUnDi9ulai', 'customer', '2024-09-28 09:55:50', '2024-09-28 09:55:50'),
(9, 'Rakibul Islam', 'rakibul@gmail.com', '$2y$12$0P5BGlPdfohheQ0UwFl2y.ETVoA7H8FIdtJUquzE5H8fN41/E29DS', 'customer', '2024-09-28 09:56:59', '2024-09-28 09:56:59'),
(10, 'Text', 'test@gmail.com', '$2y$12$4mK2vgOMkXaoD88RaG7yOeDlQ8Kl94aT7J7xD1eE7yeLMBc1wSWc2', 'customer', '2024-09-28 09:58:27', '2024-09-28 09:58:27');

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
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `rentals`
--
ALTER TABLE `rentals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rentals_user_id_foreign` (`user_id`),
  ADD KEY `rentals_car_id_foreign` (`car_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `rentals`
--
ALTER TABLE `rentals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rentals`
--
ALTER TABLE `rentals`
  ADD CONSTRAINT `rentals_car_id_foreign` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rentals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
