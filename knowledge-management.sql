-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 17, 2019 at 04:55 PM
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
(5, 'Kategori 1', '2019-08-14 20:26:31', '2019-08-14 20:26:31'),
(6, 'Kategori 2', '2019-08-14 20:30:58', '2019-08-14 20:30:58'),
(7, 'Kategori 3', '2019-08-14 20:47:17', '2019-08-14 20:47:17'),
(8, 'Kategori 4 Update', '2019-08-14 20:48:12', '2019-08-14 20:49:15'),
(9, 'Kategori 5', '2019-08-17 08:59:22', '2019-08-17 08:59:22');

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
(5, 'Fungsi 1', 5, '2019-08-14 20:26:31', '2019-08-14 20:26:31'),
(6, 'Fungsi 2', 6, '2019-08-14 20:30:58', '2019-08-14 20:30:58'),
(7, 'Fungsi 2', 5, '2019-08-14 20:31:11', '2019-08-14 20:31:11'),
(8, 'Fungsi 3', 7, '2019-08-14 20:47:17', '2019-08-14 20:47:17'),
(9, 'Fungsi 4', 8, '2019-08-14 20:48:12', '2019-08-14 20:48:12'),
(10, 'Fungsi 1', 9, '2019-08-17 08:59:22', '2019-08-17 08:59:22');

-- --------------------------------------------------------

--
-- Table structure for table `tblknowledge_content`
--

CREATE TABLE `tblknowledge_content` (
  `id` int(10) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `info_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblknowledge_content`
--

INSERT INTO `tblknowledge_content` (`id`, `content`, `info_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '<p>Test1</p>\r\n<p>Test1</p>\r\n<p>Test1</p>\r\n<p>Test1</p>\r\n<p>Test1</p>', 9, 1, '2019-08-14 20:26:31', '2019-08-14 20:26:31'),
(2, '<p>Test</p>\r\n<p>Test</p>\r\n<p>Test</p>\r\n<p>Test</p>', 10, 2, '2019-08-14 20:30:58', '2019-08-14 20:30:58'),
(3, '<p>Test</p>\r\n<p>Test</p>\r\n<p>Test</p>\r\n<p>Test</p>', 11, 2, '2019-08-14 20:31:05', '2019-08-14 20:31:05'),
(4, '<p>Test</p>\r\n<p>Test</p>\r\n<p>Test</p>\r\n<p>Test</p>', 12, 2, '2019-08-14 20:31:11', '2019-08-14 20:31:11'),
(5, '<p>Test</p>\r\n<p>Test</p>\r\n<p>Test</p>\r\n<p>Test</p>', 13, 1, '2019-08-14 20:47:17', '2019-08-14 20:47:17'),
(6, '<p>Test</p>\r\n<p>Test</p>\r\n<p>Test</p>', 14, 1, '2019-08-14 20:48:12', '2019-08-14 20:48:12'),
(7, '<div style=\"text-align: center;\"><img src=\"https://upload.wikimedia.org/wikipedia/id/e/e7/Uesaunggul.jpg\"></div><div style=\"text-align: left;\"><span style=\"font-weight: bold;\">asdasdasd</span></div><div style=\"text-align: left;\"><span style=\"font-style: italic;\">asdasdasd</span></div><div style=\"text-align: left;\"><span style=\"text-decoration: underline;\">asdasdasd</span></div><div style=\"text-align: left;\"><span style=\"text-decoration: line-through;\">asdasdasd</span></div><div style=\"text-align: left;\"><span style=\"text-decoration: line-through;\"><sub>a</sub>a</span></div><div style=\"text-align: left;\"><span style=\"text-decoration: line-through;\">a<sup>a</sup></span></div><div style=\"text-align: left;\"><sup><span style=\"font-family: Arial Black;\">as</span></sup></div><div style=\"text-align: left;\"><sup><span style=\"font-family: Arial Black;\"><font size=\"7\">asd</font></span></sup></div><div style=\"text-align: left;\"><h1><sup><span style=\"font-family: Arial Black;\"><font size=\"7\">asdasd</font></span></sup></h1><div><span style=\"color: rgb(255, 204, 102);\">asd</span></div><div><span style=\"color: rgb(255, 204, 102);\"><span style=\"background-color: rgb(255, 153, 102);\">asdasdasd</span></span></div><div><span style=\"color: rgb(255, 204, 102);\"><span style=\"background-color: rgb(255, 153, 102);\"><span style=\"color: rgb(0, 0, 0);\"><br></span></span></span></div><div><ul><li><span style=\"color: rgb(255, 204, 102);\"><span style=\"background-color: rgb(255, 153, 102);\"><span style=\"color: rgb(0, 0, 0);\">asdasd</span></span></span></li><li><span style=\" color: rgb(255, 204, 102);\"><span style=\" background-color: rgb(255, 153, 102);\"><span style=\" color: rgb(0, 0, 0);\">as</span></span></span></li></ul><div><ol><li>asdasd</li><li>asdasd</li></ol></div></div></div>', 15, 1, '2019-08-17 08:59:22', '2019-08-17 08:59:22');

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
(9, 'Informasi 1', 5, '2019-08-14 20:26:31', '2019-08-14 20:26:31'),
(10, 'Informasi 2', 6, '2019-08-14 20:30:58', '2019-08-14 20:30:58'),
(11, 'Informasi 1.1', 5, '2019-08-14 20:31:05', '2019-08-14 20:31:05'),
(12, 'Informasi 2', 7, '2019-08-14 20:31:11', '2019-08-14 20:31:11'),
(13, 'Informasi 3', 8, '2019-08-14 20:47:17', '2019-08-14 20:47:17'),
(14, 'Informasi 4', 9, '2019-08-14 20:48:12', '2019-08-14 20:48:12'),
(15, 'Informasi 1', 10, '2019-08-17 08:59:22', '2019-08-17 08:59:22');

-- --------------------------------------------------------

--
-- Table structure for table `tbllog`
--

CREATE TABLE `tbllog` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `activity` varchar(150) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbllog`
--

INSERT INTO `tbllog` (`id`, `user_id`, `activity`, `date`) VALUES
(1, 1, 'Add Knowledge', '2019-08-15 03:48:23'),
(2, 1, 'Delete Category', '2019-08-15 03:48:45'),
(3, 1, 'Edit Knowledge', '2019-08-15 03:49:15'),
(4, 1, 'Add Knowledge', '2019-08-17 15:59:22');

-- --------------------------------------------------------

--
-- Table structure for table `tblrequest`
--

CREATE TABLE `tblrequest` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `knowledge_parent_id` int(10) DEFAULT NULL,
  `knowledge_parent_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `knowledge_child_id` int(10) DEFAULT NULL,
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
(6, 2, NULL, 'Kategori 2', NULL, 'Fungsi 2', 'Informasi 2', '<p>Test</p>\r\n<p>Test</p>\r\n<p>Test</p>\r\n<p>Test</p>', '2019-08-15 03:29:50', '2019-08-15 03:30:58', '1', '2019-08-14 20:29:50', '2019-08-14 20:30:58'),
(7, 2, 5, NULL, 5, NULL, 'Informasi 1.1', '<p>Test</p>\r\n<p>Test</p>\r\n<p>Test</p>\r\n<p>Test</p>', '2019-08-15 03:30:10', '2019-08-15 03:31:05', '1', '2019-08-14 20:30:10', '2019-08-14 20:31:05'),
(8, 2, 5, NULL, NULL, 'Fungsi 2', 'Informasi 2', '<p>Test</p>\r\n<p>Test</p>\r\n<p>Test</p>\r\n<p>Test</p>', '2019-08-15 03:30:32', '2019-08-15 03:31:11', '1', '2019-08-14 20:30:32', '2019-08-14 20:31:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
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
-- Indexes for table `tbllog`
--
ALTER TABLE `tbllog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblrequest`
--
ALTER TABLE `tblrequest`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tblrequest_ibfk_1` (`user_id`),
  ADD KEY `tblrequest_ibfk_2` (`knowledge_child_id`),
  ADD KEY `knowledge_parent_id` (`knowledge_parent_id`);

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblknowledge_child`
--
ALTER TABLE `tblknowledge_child`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblknowledge_content`
--
ALTER TABLE `tblknowledge_content`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblknowledge_info`
--
ALTER TABLE `tblknowledge_info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbllog`
--
ALTER TABLE `tbllog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblrequest`
--
ALTER TABLE `tblrequest`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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

--
-- Constraints for table `tblrequest`
--
ALTER TABLE `tblrequest`
  ADD CONSTRAINT `tblrequest_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tblrequest_ibfk_2` FOREIGN KEY (`knowledge_child_id`) REFERENCES `tblknowledge_child` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tblrequest_ibfk_3` FOREIGN KEY (`knowledge_parent_id`) REFERENCES `tblknowledge` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
