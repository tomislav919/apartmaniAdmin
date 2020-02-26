-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2020 at 09:52 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

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
  `backgroundColor` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `borderColor` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `apartments`
--

INSERT INTO `apartments` (`id`, `name`, `size`, `backgroundColor`, `borderColor`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Apartment 1', 3, '#007BFF', '#007BFF', NULL, NULL, NULL),
(2, 'Apartment 2', 4, '#FF3333', '#FF3333', NULL, NULL, NULL),
(3, 'Apartment 3', 5, '#330000', '#330000', NULL, NULL, NULL),
(4, 'Studio', 3, '#006633', '#006633', NULL, NULL, NULL),
(5, 'Apartment 5', 3, '#9933FF', '#9933FF', NULL, NULL, NULL);

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
(1, 'Calendar 1', NULL, NULL, NULL);

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
  `textColor` varchar(255) CHARACTER SET utf8 NOT NULL,
  `backgroundColor` varchar(255) NOT NULL,
  `borderColor` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `calendar_id`, `apartment_id`, `title`, `description`, `start`, `end`, `allDay`, `textColor`, `backgroundColor`, `borderColor`, `remember_token`, `created_at`, `updated_at`) VALUES
(125, 1, 1, 'Reservation example', NULL, '2020-02-01T00:00:00.000Z', '2020-02-09T00:00:00.000Z', 'true', 'rgb(255, 255, 255)', 'rgb(132, 27, 45)', 'rgb(132, 27, 45)', NULL, '2020-02-26 08:41:30', '2020-02-26 08:41:33'),
(126, 1, 1, 'Reservation example with note', 'This is a custom note that goes with the reservation', '2020-02-08T00:00:00.000Z', '2020-02-16T00:00:00.000Z', 'true', 'rgb(255, 255, 255)', 'rgb(6, 85, 53)', 'rgb(6, 85, 53)', NULL, '2020-02-26 08:41:40', '2020-02-26 08:45:36'),
(127, 1, 1, 'Reservation example 3', NULL, '2020-02-15T00:00:00.000Z', '2020-02-19T00:00:00.000Z', 'true', 'rgb(255, 255, 255)', 'rgb(229, 43, 80)', 'rgb(229, 43, 80)', NULL, '2020-02-26 08:41:48', '2020-02-26 08:41:50'),
(128, 1, 1, 'Reservation example 4', NULL, '2020-02-22T00:00:00.000Z', '2020-02-28T00:00:00.000Z', 'true', 'rgb(255, 255, 255)', 'rgb(19, 51, 55)', 'rgb(19, 51, 55)', NULL, '2020-02-26 08:41:57', '2020-02-26 08:42:01'),
(129, 1, 2, 'Reservation example', NULL, '2020-02-01T00:00:00.000Z', '2020-02-16T00:00:00.000Z', 'true', 'rgb(255, 255, 255)', 'rgb(6, 85, 53)', 'rgb(6, 85, 53)', NULL, '2020-02-26 08:42:15', '2020-02-26 08:42:22'),
(130, 1, 2, 'Reservation example with note', 'This reservation is fully paid for in advance', '2020-02-22T00:00:00.000Z', '2020-03-02T00:00:00.000Z', 'true', 'rgb(255, 255, 255)', 'rgb(127, 229, 240)', 'rgb(127, 229, 240)', NULL, '2020-02-26 08:42:36', '2020-02-26 08:42:57'),
(131, 1, 3, 'Reservation example', NULL, '2020-02-15T00:00:00.000Z', '2020-02-23T00:00:00.000Z', 'true', 'rgb(255, 255, 255)', 'rgb(159, 43, 104)', 'rgb(159, 43, 104)', NULL, '2020-02-26 08:43:08', '2020-02-26 08:43:09'),
(132, 1, 3, 'Reservation example 2', NULL, '2020-02-08T00:00:00.000Z', '2020-02-16T00:00:00.000Z', 'true', 'rgb(255, 255, 255)', 'rgb(105, 105, 105)', 'rgb(105, 105, 105)', NULL, '2020-02-26 08:43:16', '2020-02-26 08:43:19'),
(133, 1, 4, 'Reservation example', NULL, '2020-02-29T00:00:00.000Z', '2020-03-03T00:00:00.000Z', 'true', 'rgb(255, 255, 255)', 'rgb(255, 126, 0)', 'rgb(255, 126, 0)', NULL, '2020-02-26 08:44:01', '2020-02-26 08:44:03'),
(134, 1, 4, 'Reservation example 2', NULL, '2020-02-15T00:00:00.000Z', '2020-02-17T00:00:00.000Z', 'true', 'rgb(255, 255, 255)', 'rgb(128, 0, 128)', 'rgb(128, 0, 128)', NULL, '2020-02-26 08:44:11', '2020-02-26 08:44:12'),
(135, 1, 4, 'Reservation example 3', NULL, '2020-02-01T00:00:00.000Z', '2020-02-05T00:00:00.000Z', 'true', 'rgb(255, 255, 255)', 'rgb(176, 224, 230)', 'rgb(176, 224, 230)', NULL, '2020-02-26 08:44:18', '2020-02-26 08:44:20'),
(136, 1, 5, 'Reservation example', NULL, '2020-02-11T00:00:00.000Z', '2020-02-19T00:00:00.000Z', 'true', 'rgb(255, 255, 255)', 'rgb(220, 237, 193)', 'rgb(220, 237, 193)', NULL, '2020-02-26 08:44:33', '2020-02-26 08:44:34'),
(137, 1, 5, 'Reservation example 2', NULL, '2020-02-18T00:00:00.000Z', '2020-02-29T00:00:00.000Z', 'true', 'rgb(255, 255, 255)', 'rgb(114, 160, 193)', 'rgb(114, 160, 193)', NULL, '2020-02-26 08:44:41', '2020-02-26 08:44:43');

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
(1, 'Administrator', '', '12345678', NULL, NULL, NULL, NULL, NULL);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `calendars`
--
ALTER TABLE `calendars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

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
