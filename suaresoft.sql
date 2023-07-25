-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2023 at 03:25 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `suaresoft`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `about` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `lastname`, `email`, `tel`, `about`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Customer6', 'Customer_6', 'customer6@gmail.com', '05768973664', 'I am a Montenegro citizen.', 9, '2023-07-18 05:15:18', '2023-07-18 05:15:18'),
(2, 'Customer8', 'Customer_8', 'customer8@gmail.com', '05483756880', 'I am a Australia citizen.', 4, '2023-07-18 05:15:18', '2023-07-18 05:15:18'),
(3, 'Customer7', 'Customer_7', 'customer7@gmail.com', '05261972989', 'I am a Iran citizen.', 10, '2023-07-18 05:15:18', '2023-07-18 05:15:18'),
(4, 'Customer2', 'Customer_2', 'customer2@gmail.com', '05345411090', 'I am a Morocco citizen.', 9, '2023-07-18 05:15:18', '2023-07-19 04:47:05'),
(5, 'Customer1', 'Customer_1', 'customer1@gmail.com', '05185800335', 'I am a Timor-Leste citizen.', 8, '2023-07-18 05:15:18', '2023-07-18 05:15:18'),
(6, 'Customer5', 'Customer_5', 'customer5@gmail.com', '05193168946', 'I am a Tuvalu citizen.', 6, '2023-07-18 05:15:18', '2023-07-18 05:15:18'),
(7, 'Customer10', 'Customer_10', 'customer10@gmail.com', '05315205693', 'I am a Ecuador citizen.', 4, '2023-07-18 05:15:18', '2023-07-18 05:15:18'),
(8, 'Customer4', 'Customer_4', 'customer4@gmail.com', '05531116083', 'I am a Wallis and Futuna citizen.', 2, '2023-07-18 05:15:18', '2023-07-18 05:15:18'),
(9, 'Customer3', 'Customer_3', 'customer3@gmail.com', '05925682188', 'I am a Niue citizen.', 6, '2023-07-18 05:15:18', '2023-07-18 05:15:18');

-- --------------------------------------------------------

--
-- Table structure for table `customer_archives`
--

CREATE TABLE `customer_archives` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_lastname` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_telephone` varchar(255) NOT NULL,
  `customer_about` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_archives`
--

INSERT INTO `customer_archives` (`id`, `user_id`, `user_name`, `user_email`, `customer_id`, `customer_name`, `customer_lastname`, `customer_email`, `customer_telephone`, `customer_about`, `action`, `created_at`, `updated_at`) VALUES
(1, 4, 'Moussa BANE', 'banemoussa2001@gmail.com', 11, 'Lois Abbott', 'Wolf', 'lodehihy@mailinator.com', '05446430000', 'Eiusmod quisquam eiu', 'create', '2023-07-18 11:34:53', '2023-07-18 11:34:53'),
(2, 4, 'Moussa BANE', 'banemoussa2001@gmail.com', 11, 'Lois Abbott', 'Wolf', 'lodehihy@mailinator.com', '05446430001', 'Eiusmod quisquam eiu', 'delete', '2023-07-18 11:35:43', '2023-07-18 11:35:43'),
(3, 9, 'User Tester', 'user.tester@gmail.com', 10, 'Customer9', 'Customer_9', 'customer9@gmail.com', '05446430002', 'I am a Honduras citizen.', 'delete', '2023-07-19 04:02:51', '2023-07-19 04:02:51'),
(4, 9, 'User Tester', 'user.tester@gmail.com', 4, 'Customer2', 'Customer_2', 'customer2@gmail.com', '05345411090', 'I am a Morocco citizen.', 'update', '2023-07-19 04:47:05', '2023-07-19 04:47:05');

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
(43, '2014_10_12_000000_create_users_table', 1),
(44, '2014_10_12_100000_create_password_resets_table', 1),
(45, '2019_08_19_000000_create_failed_jobs_table', 1),
(46, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(47, '2023_07_11_071056_create_customers_table', 1),
(48, '2023_07_18_073833_create_customer_archives_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
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
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'kullanici',
  `last_login` timestamp NULL DEFAULT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'profile.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `provider_id` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `tel`, `password`, `role`, `last_login`, `image`, `email_verified_at`, `provider_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Brandyn McDermott', 'Brandyn.McDermott58@gmail.com', '05408998275', '$2y$10$eD0A7QmLAy5U3PmzdXPKbOF0FZq8fr3ujVTuMERtiU11OS2NhyU9m', 'kullanici', '2023-07-17 09:18:57', 'profile.png', '2023-07-18 05:15:17', NULL, 'z7lEk2BLXR', '2023-07-18 05:15:18', '2023-07-18 05:15:18'),
(2, 'Connor Torphy', 'Connor.Torphy45@gmail.com', '05680647952', '$2y$10$81r7Zr6g3Vm9LQhO6WPS.uH777E2LAdoQ4jhjWiFrKaqSQA1j29p.', 'kullanici', '2023-07-10 09:19:22', 'profile.png', '2023-07-18 05:15:17', NULL, 'YDt9RZVxQl', '2023-07-18 05:15:18', '2023-07-18 05:15:18'),
(3, 'Maybell Sipes', 'Maybell.Sipes46@gmail.com', '05316481288', '$2y$10$NmVVIbgfzCgb.33KVz3JGOClNYlbkXpuZdecH5oEVXXikgxGhyNGq', 'kullanici', '2023-07-11 09:19:33', 'profile.png', '2023-07-18 05:15:17', NULL, 'O9C9wpic2S', '2023-07-18 05:15:18', '2023-07-18 05:15:18'),
(4, 'Abraham Zieme', 'Abraham.Zieme17@gmail.com', '05862842078', '$2y$10$LyhOAo2pb1ddwKFvnvoraer.BufgUZscaYTv4h4kIC3kGIqE6pAH2', 'kullanici', '2023-07-17 09:19:46', 'profile.png', '2023-07-18 05:15:17', NULL, 'rzzGcmcOit', '2023-07-18 05:15:18', '2023-07-18 05:15:18'),
(5, 'Brycen McCullough', 'Brycen.McCullough38@gmail.com', '05332984419', '$2y$10$EL61Eu1PS23fFY2fWfU3zOweG5tEqo339SgYT5MqOaR9RpHoBL/BG', 'kullanici', '2023-07-16 09:19:59', 'profile.png', '2023-07-18 05:15:18', NULL, 'VYfhax1EFL', '2023-07-18 05:15:18', '2023-07-18 05:15:18'),
(6, 'Rashad Bartoletti', 'Rashad.Bartoletti48@gmail.com', '05284005328', '$2y$10$356I6p5RWJjTq1konM5YHu/A4V0U3k7zS9S/qem6TeUTSFA6f17Mi', 'kullanici', '2023-07-15 09:20:06', 'profile.png', '2023-07-18 05:15:18', NULL, 'vhmHw1eL0Y', '2023-07-18 05:15:18', '2023-07-18 05:15:18'),
(7, 'Maegan Mante', 'Maegan.Mante18@gmail.com', '05272507421', '$2y$10$2tvptgcTFovPvRymLFU92.DnyDoWpXWz1Q0r/ko913gHgGlFRvRB.', 'kullanici', '2023-07-09 09:20:11', 'profile.png', '2023-07-18 05:15:18', NULL, 'luILmeb4LG', '2023-07-18 05:15:18', '2023-07-18 05:15:18'),
(8, 'Carolyn Lang', 'Carolyn.Lang47@gmail.com', '05978823057', '$2y$10$ogxg/7f.ZAz8nIztBEyIdOeMivUVKRdIGAaq32hG87VXRT60sokWO', 'kullanici', '2023-07-10 09:20:17', 'profile.png', '2023-07-18 05:15:18', NULL, 'oqxTuYmr5F', '2023-07-18 05:15:18', '2023-07-18 05:15:18'),
(9, 'User Tester', 'user.tester@gmail.com', '05988059381', '$2y$10$UyFPIwOScFEMKNWVG1PCB.k5YZvYSU2TzJoEjSOlSIRdR35/rsxwO', 'kullanici', '2023-07-19 07:36:16', 'profile.png', '2023-07-18 05:15:18', NULL, 'XcNRxvCy1SCSeFUAWb5BXst5TSPPIxBp6ZaMflY0Tn6AvNhR738Ae7O6oC37', '2023-07-18 05:15:18', '2023-07-19 07:36:16'),
(10, 'Torrey Anderson', 'Torrey.Anderson37@gmail.com', '05786035119', '$2y$10$ZSBxkDbC/z0J.1BBWliFQ.nHjjyKtU2se3rwstsuIQ69py1XioRJu', 'kullanici', '2023-07-08 09:20:26', 'profile.png', '2023-07-18 05:15:18', NULL, 'NkTUpXhVNc', '2023-07-18 05:15:18', '2023-07-18 05:15:18'),
(11, 'Moussa BANE', 'banemoussa2001@gmail.com', 'Moussa BANE', '$2y$10$VkremEt8iV9wVRtxUJjTP.o2OxBtWXII8lUCNsIjOLWhXJw3FtRwK', 'admin', '2023-07-19 08:10:15', '1689680512.jpeg', NULL, NULL, NULL, '2023-07-18 05:16:46', '2023-07-19 08:10:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`),
  ADD UNIQUE KEY `customers_tel_unique` (`tel`),
  ADD KEY `customers_user_id_foreign` (`user_id`);

--
-- Indexes for table `customer_archives`
--
ALTER TABLE `customer_archives`
  ADD PRIMARY KEY (`id`);

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
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_tel_unique` (`tel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `customer_archives`
--
ALTER TABLE `customer_archives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
