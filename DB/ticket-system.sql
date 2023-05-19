-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2023 at 09:51 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ticket-system`
--

-- --------------------------------------------------------

--
-- Table structure for table `reply-ticket`
--

CREATE TABLE `reply-ticket` (
  `id` int(11) UNSIGNED NOT NULL,
  `reply` text NOT NULL,
  `file` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `ticket_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reply-ticket`
--

INSERT INTO `reply-ticket` (`id`, `reply`, `file`, `created_at`, `ticket_id`) VALUES
(7, 'why ??', '64667ef2d7cf3.pdf', '2023-05-18 19:39:30', 18),
(8, 'On hold', '', '2023-05-18 19:41:20', 18),
(9, 'Closed', '', '2023-05-18 19:41:33', 19);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(150) NOT NULL,
  `category` enum('New Installation','Support','Bug','Questions','Talon Chapman') NOT NULL,
  `status` enum('In Progress','Closed','On Hold') NOT NULL DEFAULT 'In Progress',
  `description` text NOT NULL,
  `files` varchar(250) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `name`, `email`, `subject`, `category`, `status`, `description`, `files`, `ticket_id`, `created_at`) VALUES
(18, 'ibra', 'ib@gm.com', 'support', 'Support', 'On Hold', 'support', '64667ec765e22.pdf', 541323383, '2023-05-18 19:41:20'),
(19, 'ahmed', 'ahmed@gmail.com', 'question??', 'Questions', 'Closed', 'question??', '64667f250a010.pdf', 896899335, '2023-05-18 19:41:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `address`, `phone`, `role`, `created_at`) VALUES
(1, 'ibra', 'ib@gm.com', '$2y$10$zxrTdJ9nU1IjnZZaI4Rqbukhuykcz/An3CJjMZ40rI6XM2zmamwMy', '31 tarek', '123525', 'user', '2023-05-17 08:01:51'),
(2, 'ibrahim', 'ib@gmail.com', '$2y$10$6JNg13VkfCeh692s.NzaSOnA3KPMQcWXHXqLh6RNWuUCJZ.EfXUTm', '31 tarek nn', '1238856', 'admin', '2023-05-17 08:18:50'),
(8, 'ahmed', 'ahmed@gmail.com', '$2y$10$HU6Xa75yJwBcr516VJ1/muYlVEQ3M77qrg7rIaOg6i7O.zIyqroae', '15 sidi gaber', '01014', 'user', '2023-05-18 18:31:01'),
(9, 'Mo', 'mo@gmail.com', '$2y$10$qH179b81QUCBhZ7FltaXje5YCdpmfjg84YQZDlgpRVhN5rxQMI0q6', '18 sidi', '321456', 'user', '2023-05-18 19:42:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reply-ticket`
--
ALTER TABLE `reply-ticket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tiket-replies` (`ticket_id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
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
-- AUTO_INCREMENT for table `reply-ticket`
--
ALTER TABLE `reply-ticket`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reply-ticket`
--
ALTER TABLE `reply-ticket`
  ADD CONSTRAINT `tiket-replies` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
