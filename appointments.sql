-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2022 at 10:56 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appointments`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `surname` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `start` time NOT NULL,
  `ends` time NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `name`, `surname`, `address`, `phone`, `email`, `date`, `start`, `ends`, `created_at`, `updated_at`) VALUES
(1, '', '', '', 'hifif', 'harran2', '2022-08-29', '05:00:19', '05:00:19', '2022-08-29 19:25:42', '2022-08-30 00:58:52'),
(2, '', '', '', 'hifif', 'harran@harran.com', '2022-08-29', '12:15:37', '12:15:37', '2022-08-29 19:31:38', '2022-08-29 19:31:38'),
(3, '', '', '', 'hifif', 'harran@harran.com', '2021-08-26', '13:00:37', '13:00:37', '2022-08-29 19:32:43', '2022-08-29 19:32:43'),
(4, '', '', '', 'hifif', 'harran@harran.com', '2021-08-26', '13:00:37', '13:00:37', '2022-08-29 19:33:38', '2022-08-29 19:33:38'),
(5, '', '', '', 'hifif', 'harran@harran.com', '2021-08-26', '12:00:37', '13:00:37', '2022-08-29 19:35:43', '2022-08-29 19:35:43'),
(6, '', '', '', 'hifif', 'harran@harran.com', '2021-08-26', '12:00:37', '13:00:37', '2022-08-29 19:36:17', '2022-08-29 19:36:17'),
(7, '', '', '', 'hifif', 'harran@harran.com', '2021-08-26', '11:59:56', '12:59:56', '2022-08-29 20:00:16', '2022-08-29 20:00:16'),
(8, '', '', '', 'hifif', 'harran@harran.com', '2021-08-26', '13:11:11', '14:11:11', '2022-08-30 01:46:57', '2022-08-30 01:46:57'),
(9, 'mohemd', 'harran', '', 'hifif', 'harran@harran.com', '2021-08-26', '15:11:11', '16:11:11', '2022-08-30 01:50:31', '2022-08-30 01:50:31');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `token` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `token`, `created_at`, `updated_at`) VALUES
(1, 1, '39AD39BC80A2A8D7B98B5D8A366A56C950BDEB2', '2022-08-29 18:04:24', '2022-08-29 18:04:24'),
(2, 1, '4498F986C4BE05F351E147C1FEF21FF8C6ECD94', '2022-08-29 18:05:08', '2022-08-29 18:05:08'),
(3, 1, '0468', '2022-08-29 18:06:52', '2022-08-29 18:06:52'),
(5, 1, '2455BDFDFAE16CFA2501A0FEFAD3C0FFB0C42BBE', '2022-08-30 01:32:24', '2022-08-30 01:32:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(2, 'mr.harran', 'mostafa@hfarran.com', '$2y$10$/ctCKGwBXTTqF5MiUTDJQ.WQtOP3SIdFEI9gvON3xQz3LTeo2YHoK', '2022-08-29 21:30:53', '2022-08-30 02:02:11'),
(3, 'mostafa', 'mostafa@hfarran.com', '$2y$10$dsTYeqpsiaACCAMe2i1p2eZR0TjocAlpRR8nLnPQtoTnpaD10ZjK.', '2022-08-29 21:31:26', '2022-08-29 21:31:26'),
(4, 'adil harran', 'adil@sgmail.com', '$2y$10$TDXI3QlGt4SSE9.Cpc0Nqeio/f/gGMA6DSU0Ba9vDiysbG5v4KGje', '2022-08-30 02:08:06', '2022-08-30 02:08:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
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
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
