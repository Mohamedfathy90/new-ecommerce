-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2023 at 02:12 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new-ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','vendor','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `image`, `phone`, `email`, `role`, `status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', '/storage/profile_images/admin/img_1686956910.jpg', '88888888888', 'admin@gmail.com', 'admin', 'active', NULL, '$2y$10$fKmLD8bT.9v.Zrybd2U6p.vfNqk.NOr/jUuyUAuWrBUuWyxzZ7VOa', 'NpbD2OFtaN6cWeSEtaHaViAqO1zx8W17ju3MtCe7PvOz3cl7zPjVZlDCmXgU', '2023-06-07 14:25:22', '2023-06-16 21:08:30'),
(2, 'Vendor', 'vendor', NULL, NULL, 'vendor@gmail.com', 'vendor', 'active', NULL, '$2y$10$QmV1BHpBIK0M2PecvrCrpO1YxlrLcS4C4Zj2YaSc/bDqCLqmC0OQi', NULL, '2023-06-07 14:25:22', '2023-06-07 14:25:22'),
(3, 'User', 'user', NULL, NULL, 'user@gmail.com', 'user', 'active', NULL, '$2y$10$9PVYLQ1wagylezeQwW6JpuQuAwszFQ2lUPYQ5mEwaKn6hq0MxSVhO', NULL, '2023-06-07 14:25:22', '2023-06-16 20:43:37'),
(4, 'test', 'test', '/storage/profile_images/user/img_1686960629.JPG', '8888888888', 'test@gmail.com', 'user', 'active', NULL, '$2y$10$8mI/AJFdZUXAsQKxR7lSMO02qeCBAgam7XQ6RjTI1./jJjqtqojHa', 'UcaFAroEOYMuT4oG5RT7HJL9KloHeS7ZLjVshrTe8iuOkrWYBoZ9g6rUbLqd', '2023-06-15 09:30:46', '2023-06-16 22:10:29');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
