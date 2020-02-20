-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2020 at 09:23 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `calendar`
--

-- --------------------------------------------------------

--
-- Table structure for table `apartments`
--

CREATE TABLE `apartments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `size` int(11) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `apartments`
--

INSERT INTO `apartments` (`id`, `name`, `size`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Apartman 1', 3, NULL, NULL, NULL),
(2, 'Apartman 2', 3, NULL, NULL, NULL),
(3, 'Apartman 3', 3, NULL, NULL, NULL),
(4, 'Apartman 4', 3, NULL, NULL, NULL),
(5, 'Apartman 5', 3, NULL, NULL, NULL),
(6, 'Apartman 6', 5, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `calendars`
--

CREATE TABLE `calendars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `calendars`
--

INSERT INTO `calendars` (`id`, `name`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Apartman 1', NULL, NULL, NULL),
(2, 'Apartment 2', NULL, '2020-02-12 17:44:14', '2020-02-12 17:44:14'),
(3, '2', NULL, '2020-02-12 17:44:14', '2020-02-12 17:44:14');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `calendar_id` bigint(20) UNSIGNED NOT NULL,
  `apartment_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `start` varchar(255) NOT NULL,
  `end` varchar(255) DEFAULT NULL,
  `allDay` varchar(255) DEFAULT NULL,
  `backgroundColor` varchar(255) NOT NULL,
  `borderColor` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `calendar_id`, `apartment_id`, `title`, `description`, `start`, `end`, `allDay`, `backgroundColor`, `borderColor`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, 1, 1, 'Sleep tight', NULL, '2020-03-09T23:00:00.000Z', NULL, NULL, 'rgb(220, 53, 69)', 'rgb(220, 53, 69)', NULL, '2020-02-13 15:09:38', '2020-02-13 15:09:38'),
(39, 1, 1, 'Liam', NULL, '2020-02-05T23:00:00.000Z', '2020-02-13T23:00:00.000Z', NULL, 'rgb(255, 0, 0)', 'rgb(255, 0, 0)', NULL, '2020-02-17 09:10:10', '2020-02-17 09:29:13'),
(40, 1, 1, 'Olivia', NULL, '2020-02-12T23:00:00.000Z', '2020-02-18T23:00:00.000Z', NULL, 'rgb(165, 42, 42)', 'rgb(165, 42, 42)', NULL, '2020-02-17 09:10:33', '2020-02-17 09:11:38'),
(41, 1, 1, 'William', NULL, '2020-02-17T23:00:00.000Z', '2020-02-20T23:00:00.000Z', NULL, 'rgb(218, 24, 132)', 'rgb(218, 24, 132)', NULL, '2020-02-17 09:10:45', '2020-02-17 09:10:47'),
(42, 1, 1, 'Isabella', NULL, '2020-02-19T23:00:00.000Z', '2020-02-26T23:00:00.000Z', NULL, 'rgb(27, 24, 17)', 'rgb(27, 24, 17)', NULL, '2020-02-17 09:10:59', '2020-02-17 09:11:02'),
(43, 1, 1, 'Benjamin', NULL, '2020-02-27T23:00:00.000Z', '2020-03-02T23:00:00.000Z', NULL, 'rgb(218, 24, 132)', 'rgb(218, 24, 132)', NULL, '2020-02-17 09:11:14', '2020-02-17 09:11:18'),
(44, 1, 2, 'Elijah', NULL, '2020-02-05T23:00:00.000Z', '2020-02-09T23:00:00.000Z', NULL, 'rgb(61, 12, 2)', 'rgb(61, 12, 2)', NULL, '2020-02-17 09:11:57', '2020-02-18 06:14:16'),
(45, 1, 2, 'Lucas', NULL, '2020-02-09T23:00:00.000Z', '2020-02-29T23:00:00.000Z', NULL, 'rgb(19, 51, 55)', 'rgb(19, 51, 55)', NULL, '2020-02-17 09:12:09', '2020-02-17 09:12:13'),
(46, 1, 3, 'Mason', NULL, '2020-01-26T00:00:00.000Z', '2020-02-02T00:00:00.000Z', NULL, 'rgb(247, 52, 122)', 'rgb(247, 52, 122)', NULL, '2020-02-17 09:15:44', '2020-02-20 06:32:29'),
(47, 1, 3, 'Charlotte', NULL, '2020-02-02T00:00:00.000Z', '2020-02-07T00:00:00.000Z', NULL, 'rgb(247, 52, 122)', 'rgb(247, 52, 122)', NULL, '2020-02-17 09:15:59', '2020-02-20 06:32:10'),
(48, 1, 3, 'Sophia', NULL, '2020-02-08T00:00:00.000Z', '2020-02-15T00:00:00.000Z', NULL, 'rgb(61, 12, 2)', 'rgb(61, 12, 2)', NULL, '2020-02-17 09:16:08', '2020-02-20 06:31:39'),
(49, 1, 4, 'Mia', NULL, '2020-02-09T00:00:00.000Z', '2020-02-17T00:00:00.000Z', NULL, 'rgb(0, 128, 128)', 'rgb(0, 128, 128)', NULL, '2020-02-17 09:16:25', '2020-02-20 07:16:24'),
(50, 1, 4, 'Ava', NULL, '2020-02-16T00:00:00.000Z', '2020-02-21T00:00:00.000Z', NULL, 'rgb(145, 92, 131)', 'rgb(145, 92, 131)', NULL, '2020-02-17 09:16:41', '2020-02-20 07:50:20'),
(51, 1, 5, 'Emma', NULL, '2020-02-03T00:00:00.000Z', '2020-02-07T00:00:00.000Z', NULL, 'rgb(255, 0, 0)', 'rgb(255, 0, 0)', NULL, '2020-02-17 09:16:54', '2020-02-20 08:12:20'),
(52, 1, 6, 'Evelyn', NULL, '2020-02-09T23:00:00.000Z', '2020-02-14T23:00:00.000Z', NULL, 'rgb(218, 24, 132)', 'rgb(218, 24, 132)', NULL, '2020-02-17 09:17:12', '2020-02-17 09:17:15'),
(53, 1, 6, 'Harper', NULL, '2020-02-16T23:00:00.000Z', '2020-02-18T23:00:00.000Z', NULL, 'rgb(255, 128, 237)', 'rgb(255, 128, 237)', NULL, '2020-02-17 09:17:22', '2020-02-17 09:17:24'),
(55, 1, 1, 'Liam', NULL, '2020-02-02T23:00:00.000Z', '2020-02-06T23:00:00.000Z', NULL, 'rgb(159, 43, 104)', 'rgb(159, 43, 104)', NULL, '2020-02-17 09:27:25', '2020-02-17 09:27:27'),
(86, 1, 2, 'sdfgsdfg', NULL, '2020-02-02T00:00:00.000Z', '2020-02-04T00:00:00.000Z', NULL, 'rgb(132, 27, 45)', 'rgb(132, 27, 45)', NULL, '2020-02-18 07:25:49', '2020-02-18 10:25:40'),
(99, 1, 2, 'jočlćlšććć', NULL, '2020-01-29T00:00:00.000Z', '2020-02-01T00:00:00.000Z', NULL, 'rgb(247, 52, 122)', 'rgb(247, 52, 122)', NULL, '2020-02-18 09:48:36', '2020-02-19 11:32:32'),
(130, 1, 2, 'asdfggg', NULL, '2020-01-28T00:00:00.000Z', '2020-01-30T00:00:00.000Z', NULL, 'rgb(60, 141, 188)', 'rgb(60, 141, 188)', NULL, '2020-02-18 10:55:35', '2020-02-20 05:53:02'),
(131, 1, 2, 'asdfgff', NULL, '2020-02-04T00:00:00.000Z', '', NULL, 'rgb(60, 141, 188)', 'rgb(60, 141, 188)', NULL, '2020-02-18 10:55:41', '2020-02-19 12:21:22'),
(136, 1, 2, 'dfghdgfh', NULL, '2020-02-05T00:00:00.000Z', '2020-02-08T00:00:00.000Z', NULL, 'rgb(60, 141, 188)', 'rgb(60, 141, 188)', NULL, '2020-02-18 11:08:06', '2020-02-19 12:21:19'),
(137, 1, 2, 'fghkfhjkfhjukm,', NULL, '2020-02-28T00:00:00.000Z', NULL, NULL, 'rgb(59, 60, 54)', 'rgb(59, 60, 54)', NULL, '2020-02-18 11:08:30', '2020-02-18 11:08:30'),
(138, 1, 2, 'hjkl.kl.', NULL, '2020-02-17T00:00:00.000Z', '2020-02-20T00:00:00.000Z', NULL, 'rgb(229, 43, 80)', 'rgb(229, 43, 80)', NULL, '2020-02-19 11:05:16', '2020-02-19 12:23:19'),
(139, 1, 2, 'dfghdgfhj', NULL, '2020-01-27T00:00:00.000Z', NULL, NULL, 'rgb(60, 141, 188)', 'rgb(60, 141, 188)', NULL, '2020-02-19 11:32:50', '2020-02-19 11:32:50'),
(140, 1, 2, 'sdfghfgh', NULL, '2020-03-03T00:00:00.000Z', NULL, NULL, 'rgb(60, 141, 188)', 'rgb(60, 141, 188)', NULL, '2020-02-19 11:32:59', '2020-02-19 11:32:59'),
(141, 1, 2, 'sfgdbfgbndfgnb', NULL, '2020-01-26T00:00:00.000Z', NULL, NULL, 'rgb(132, 27, 45)', 'rgb(132, 27, 45)', NULL, '2020-02-19 11:33:23', '2020-02-19 11:33:23'),
(142, 1, 2, 'aysdfgg', NULL, '2020-03-02T00:00:00.000Z', NULL, NULL, 'rgb(250, 235, 215)', 'rgb(250, 235, 215)', NULL, '2020-02-19 11:33:39', '2020-02-19 11:33:39'),
(143, 1, 3, 'ertzrz', NULL, '2020-02-17T00:00:00.000Z', '2020-02-20T00:00:00.000Z', NULL, 'rgb(59, 122, 87)', 'rgb(59, 122, 87)', NULL, '2020-02-20 06:26:03', '2020-02-20 06:31:35'),
(144, 1, 3, 'sdrfth', NULL, '2020-02-19T00:00:00.000Z', '2020-02-25T00:00:00.000Z', NULL, 'rgb(61, 12, 2)', 'rgb(61, 12, 2)', NULL, '2020-02-20 06:31:31', '2020-02-20 06:32:43'),
(145, 1, 4, 'edtzzj', NULL, '2020-01-24T00:00:00.000Z', '2020-02-09T00:00:00.000Z', NULL, 'rgb(255, 192, 203)', 'rgb(255, 192, 203)', NULL, '2020-02-20 06:47:28', '2020-02-20 07:50:25'),
(146, 1, 5, 'sdfsdfgh', NULL, '2020-01-27T00:00:00.000Z', '2020-02-04T00:00:00.000Z', NULL, 'rgb(255, 128, 237)', 'rgb(255, 128, 237)', NULL, '2020-02-20 08:16:41', '2020-02-20 08:17:00'),
(147, 1, 5, 'sdfgb', NULL, '2020-02-06T00:00:00.000Z', '2020-02-09T00:00:00.000Z', NULL, 'rgb(60, 141, 188)', 'rgb(60, 141, 188)', NULL, '2020-02-20 08:16:47', '2020-02-20 08:16:54'),
(148, 1, 5, '254reztretzh', NULL, '2020-02-10T00:00:00.000Z', NULL, NULL, 'rgb(60, 141, 188)', 'rgb(60, 141, 188)', NULL, '2020-02-20 08:20:13', '2020-02-20 08:20:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `userImage` varchar(255) DEFAULT NULL,
  `api_key` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `userImage`, `api_key`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', '', '12345678!Babe', NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apartments`
--
ALTER TABLE `apartments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calendars`
--
ALTER TABLE `calendars`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `calendars_name_unique` (`name`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `events_calendar_id_foreign` (`calendar_id`),
  ADD KEY `events_apartment_id_foreign` (`apartment_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_api_key_unique` (`api_key`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apartments`
--
ALTER TABLE `apartments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `calendars`
--
ALTER TABLE `calendars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_apartment_id_foreign` FOREIGN KEY (`apartment_id`) REFERENCES `apartments` (`id`),
  ADD CONSTRAINT `events_calendar_id_foreign` FOREIGN KEY (`calendar_id`) REFERENCES `calendars` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
