-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 20, 2019 at 02:43 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `knowledge-management`
--

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
(3, '2014_10_12_000000_create_users_table', 1),
(4, '2014_10_12_100000_create_password_resets_table', 1),
(5, '2019_07_14_070454_create_tblknowledge_table', 1),
(6, '2019_07_14_070549_create_tblknowledge_child_table', 1),
(7, '2019_07_14_070903_create_tblknowledge_content_table', 1),
(8, '2019_07_14_070915_create_tblknowledge_info_table', 1),
(9, '2019_07_14_070929_create_tblrequest_table', 1);

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
-- Table structure for table `tblknowledge`
--

CREATE TABLE `tblknowledge` (
  `id` int(10) NOT NULL,
  `knowledge_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblknowledge`
--

INSERT INTO `tblknowledge` (`id`, `knowledge_name`, `created_at`, `updated_at`) VALUES
(1, 'Website Universitas', NULL, '2019-07-18 18:35:32'),
(4, 'Website Fakultas', '2019-07-16 06:22:58', '2019-07-16 06:22:58');

-- --------------------------------------------------------

--
-- Table structure for table `tblknowledge_child`
--

CREATE TABLE `tblknowledge_child` (
  `id` int(10) NOT NULL,
  `child_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `knowledge_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblknowledge_child`
--

INSERT INTO `tblknowledge_child` (`id`, `child_name`, `knowledge_id`, `created_at`, `updated_at`) VALUES
(1, 'Daftar', 1, NULL, NULL),
(4, 'Mahasiswa Baru Fakultas', 4, '2019-07-18 00:33:17', '2019-07-18 19:20:15');

-- --------------------------------------------------------

--
-- Table structure for table `tblknowledge_content`
--

CREATE TABLE `tblknowledge_content` (
  `id` int(10) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `info_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblknowledge_content`
--

INSERT INTO `tblknowledge_content` (`id`, `content`, `info_id`, `created_at`, `updated_at`) VALUES
(7, '<p>123123</p>\r\n<p>123</p>', 8, '2019-07-18 00:33:17', '2019-07-18 19:57:59');

-- --------------------------------------------------------

--
-- Table structure for table `tblknowledge_info`
--

CREATE TABLE `tblknowledge_info` (
  `id` int(10) NOT NULL,
  `info_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `child_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblknowledge_info`
--

INSERT INTO `tblknowledge_info` (`id`, `info_name`, `child_id`, `created_at`, `updated_at`) VALUES
(8, 'Daftar Mahasiswa1', 4, '2019-07-18 00:33:17', '2019-07-18 19:57:59');

-- --------------------------------------------------------

--
-- Table structure for table `tblrequest`
--

CREATE TABLE `tblrequest` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `knowledge_parent_id` int(11) DEFAULT NULL,
  `knowledge_parent_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `knowledge_child_id` int(11) DEFAULT NULL,
  `knowledge_child_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `info_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_request` datetime NOT NULL,
  `tgl_accept` datetime DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblrequest`
--

INSERT INTO `tblrequest` (`id`, `user_id`, `knowledge_parent_id`, `knowledge_parent_name`, `knowledge_child_id`, `knowledge_child_name`, `info_name`, `content`, `tgl_request`, `tgl_accept`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, 1, NULL, 'Daftar Sendiri', '123asd', '2019-07-16 13:50:44', NULL, '-1', '2019-07-16 06:50:44', '2019-07-18 00:19:10'),
(2, 1, 1, NULL, NULL, 'Mahasiswa Baru', 'Daftar Mahasiswa', '123123', '2019-07-16 13:51:54', NULL, '0', '2019-07-16 06:51:54', '2019-07-16 06:51:54'),
(5, 1, NULL, 'Website Keuangan', NULL, 'Pemasukan', 'Fakultas', 'fak123', '2019-07-16 13:56:41', '2019-07-18 07:37:39', '1', '2019-07-16 06:56:41', '2019-07-18 00:37:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `full_name`, `level`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$IqUTj3kCbF/X5rp8ixLMQOczoByYpymNDb8HggikPbvgzS/kWVS/O', 'Administrator', 'ADMIN', '2019-07-14 00:28:42', '2019-07-14 00:28:42'),
(2, 'user', '$2y$10$K1Nb1gIoyse27rQ4ng.YpOwf8cQcQ9L/v1KAUi2QYTMX4Pcj4gvMW', 'User 1', 'USER', '2019-07-14 00:28:42', '2019-07-14 00:28:42');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `tblknowledge`
--
ALTER TABLE `tblknowledge`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblknowledge_child`
--
ALTER TABLE `tblknowledge_child`
  ADD PRIMARY KEY (`id`),
  ADD KEY `knowledge_id` (`knowledge_id`);

--
-- Indexes for table `tblknowledge_content`
--
ALTER TABLE `tblknowledge_content`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tblknowledge_content_ibfk_1` (`info_id`);

--
-- Indexes for table `tblknowledge_info`
--
ALTER TABLE `tblknowledge_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tblknowledge_info_ibfk_1` (`child_id`);

--
-- Indexes for table `tblrequest`
--
ALTER TABLE `tblrequest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblknowledge`
--
ALTER TABLE `tblknowledge`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblknowledge_child`
--
ALTER TABLE `tblknowledge_child`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblknowledge_content`
--
ALTER TABLE `tblknowledge_content`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblknowledge_info`
--
ALTER TABLE `tblknowledge_info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblrequest`
--
ALTER TABLE `tblrequest`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblknowledge_child`
--
ALTER TABLE `tblknowledge_child`
  ADD CONSTRAINT `tblknowledge_child_ibfk_1` FOREIGN KEY (`knowledge_id`) REFERENCES `tblknowledge` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblknowledge_content`
--
ALTER TABLE `tblknowledge_content`
  ADD CONSTRAINT `tblknowledge_content_ibfk_1` FOREIGN KEY (`info_id`) REFERENCES `tblknowledge_info` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblknowledge_info`
--
ALTER TABLE `tblknowledge_info`
  ADD CONSTRAINT `tblknowledge_info_ibfk_1` FOREIGN KEY (`child_id`) REFERENCES `tblknowledge_child` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
