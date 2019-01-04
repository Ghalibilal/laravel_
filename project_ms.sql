-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2019 at 01:59 PM
-- Server version: 10.1.36-MariaDB
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
-- Database: `project_ms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'php tutorial', NULL, NULL),
(2, 'laravel', NULL, NULL),
(3, 'writting skill', '2018-12-30 01:53:24', '2018-12-30 01:53:24'),
(4, 'codeigniter', '2018-12-30 01:54:43', '2018-12-30 01:54:43'),
(5, 'MySql', '2018-12-31 02:06:55', '2018-12-31 02:06:55');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `email`, `comment`, `post_id`, `created_at`, `updated_at`) VALUES
(3, 'php developer', 'maryambibi991@gmail.com', 'hi this is awesome', 11, '2019-01-02 08:22:06', '2019-01-02 08:22:06'),
(4, 'kaire sane', 'kairesane@gmail.com', 'kklkklkk', 1, '2019-01-02 08:31:27', '2019-01-02 08:31:27'),
(5, 'php developer', 'maryambibi991@gmail.com', 'jjnlnk', 1, '2019-01-02 08:36:16', '2019-01-02 08:36:16'),
(6, 'php developer', 'maryambibi991@gmail.com', 'jhuhnnjknj', 1, '2019-01-02 08:51:08', '2019-01-02 08:51:08'),
(7, 'php developer', 'maryambibi991@gmail.com', 'jnknjkkl', 1, '2019-01-02 08:53:17', '2019-01-02 08:53:17'),
(8, 'gghalib jan', 'hazratbilalghalib@gmail.com', 'this is my first comment', 1, '2019-01-02 08:53:43', '2019-01-02 08:53:43'),
(9, 'Hazrat Bilal', 'ghalib@gmail.com', 'awesome blog', 1, '2019-01-02 08:54:24', '2019-01-02 08:54:24'),
(10, 'Hazrat Bilal', 'hazratbilalghalib@gmail.com', 'hi this is awesome', 11, '2019-01-03 01:05:15', '2019-01-03 02:04:42');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_12_21_170623_create_posts_table', 1),
(4, '2018_12_29_165728_create_table_category', 2),
(5, '2018_12_31_065702_create_tags_table', 3),
(6, '2018_12_31_070039_create_post_tag', 4),
(7, '2019_01_02_123957_create_comments_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('hazratbilalghalib@gmail.com', '$2y$10$bnMqqZsHNQC9DpMJdp9dCeq2jMEI.yj4AlWUV3t9DZ4.0BW6Xqt0S', '2019-01-01 09:51:30'),
('maryambibi991@gmail.com', '$2y$10$QydddzagP2pk8XZW153BJu17E2LlNX3VElpeHV2kifFLYhoqj5mmW', '2019-01-01 09:51:58');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(9) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `image`, `body`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'php', 'first-post', NULL, 'this is my post to vcrdsklajf klfdsaiofj,m.  oasiodlfst is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like). iojdsak vk;ds oas;jnfk;.asdod ,', 1, '2018-12-28 08:07:39', '2018-12-28 11:17:17'),
(2, 'unique', 'second-post', NULL, 'this is my second post to achieve', 1, '2018-12-29 01:28:38', '2018-12-29 01:28:38'),
(3, 'jazz mb package', 'third-post', NULL, 'how to free jazz free mb without any code i will teach you just wait ...............', 2, '2018-12-29 01:40:45', '2018-12-29 01:40:45'),
(4, 'laravel crud', 'fouth-post', NULL, 'how to make a crud in larvel', 3, '2018-12-30 02:24:52', '2018-12-30 02:58:46'),
(5, 'echo', 't-post', NULL, 'The echo statement can be used with or without parentheses: echo or echo().\r\n\r\nDisplay Text\r\n\r\nThe following example shows how to output text with the echo command (notice that the text can contain HTML markup):', 1, '2018-12-31 02:06:29', '2018-12-31 02:06:29'),
(6, 'print', 'sec', NULL, 'this is testing service', 1, '2018-12-31 05:01:10', '2018-12-31 05:01:10'),
(8, 'print', 'sec-p', NULL, 'this is testing service', 1, '2018-12-31 05:03:35', '2018-12-31 05:03:35'),
(10, 'hip', 'hip', NULL, 'this is very book', 1, '2018-12-31 05:12:48', '2018-12-31 05:12:48'),
(11, 'hip', 'hipi', NULL, 'this is very famous', 1, '2018-12-31 05:14:40', '2019-01-02 05:22:00'),
(12, 'this is awesom', 'hi-h', NULL, '<h1>jbbj</h1>', 2, '2019-01-03 02:53:26', '2019-01-03 02:53:26'),
(13, 'array', 'post-array', NULL, '<h1>Array</h1>\r\n<p style=\"text-align: justify; padding-left: 40px;\"><span style=\"font-family: \'Open Sans\', Arial, sans-serif; text-align: justify;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span></p>', 1, '2019-01-03 03:50:19', '2019-01-03 03:50:19'),
(14, 'hacked', 'post-hacked', NULL, '<p>&lt;script&gt;alert(\'this is hacked\');&lt;/script&gt;</p>', 1, '2019-01-03 04:09:13', '2019-01-03 04:09:13'),
(16, 'online census management', 'second-postkk', '1546511398.C:\\xampp\\tmp\\php789C.tmp', '<p>hi this how we can create thew&nbsp;</p>', 1, '2019-01-03 05:29:58', '2019-01-03 05:29:58'),
(18, 'online census management', 'first-postf', '1546511502.C:\\xampp\\tmp\\phpF8A.tmpjpg', '<p>this is very nice post</p>', 1, '2019-01-03 05:31:42', '2019-01-03 05:31:42'),
(19, 'hi', 'jjj', '1546511678.png', '<p>thisijew</p>', 1, '2019-01-03 05:34:38', '2019-01-03 05:34:38'),
(20, 'unique image upload', 'sec2', '1546511757.jpg', '<p>this is nice click</p>', 1, '2019-01-03 05:35:57', '2019-01-03 05:35:57');

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

CREATE TABLE `post_tag` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_tag`
--

INSERT INTO `post_tag` (`id`, `post_id`, `tag_id`) VALUES
(10, 11, 5),
(11, 11, 6),
(13, 6, 5),
(14, 1, 5),
(15, 1, 6),
(16, 12, 5),
(17, 13, 6),
(18, 14, 5),
(19, 14, 6),
(21, 16, 6),
(22, 18, 5),
(23, 19, 6),
(24, 20, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(5, 'writting skill', '2019-01-02 05:20:52', '2019-01-02 05:20:52'),
(6, 'sohail ahmed', '2019-01-02 05:21:06', '2019-01-02 05:21:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Hazrat Bilal', 'hazratbilalghalib@gmail.com', NULL, '$2y$10$M8Qpdy0Ef34cjn6efUyF3.Vb1cvsYf.wWJlGKwspP6KnbH.FG.Hjq', 'pxQYYpv4KFptkc0yoaIL8UXYrvVoT32tkX2yuo6nxLNSENIIZA5eDuiADTbL', '2018-12-28 07:57:05', '2018-12-28 07:57:05'),
(2, 'kaire sane', 'maryambibi991@gmail.com', NULL, '$2y$10$RmuiFYCdFjVosPRMvxvKl.F1H3GI5RUxct18fEhrauGhQ6UG7Yi0y', 'JnTqZCgJlRFD8YTkgF6fcBg9sTJkRVuOczfs4fs3m1phrvpjKhoVR8cbTmrY', '2018-12-28 11:30:04', '2018-12-28 11:30:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_post_id_foreign` (`post_id`);

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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Indexes for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `tag_id` (`tag_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `post_tag`
--
ALTER TABLE `post_tag`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD CONSTRAINT `post_tag_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `post_tag_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
