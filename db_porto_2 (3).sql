-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2025 at 03:19 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_porto_2`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `profile` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `skills` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `created_ad` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `name`, `profile`, `email`, `phone`, `photo`, `status`, `skills`, `description`, `created_ad`, `updated_at`) VALUES
(58, 'Muhammad Siddiq', 'Front End Developer', 'sidiksadar11@gmail.com', '089684758768', 'siddiq.jpeg', 1, 'Menguasai Bahasa Pemrograman Java script', 'Dengan latar belakang pendidikan dalam administrasi, saya adalah seorang fresh graduate yang dapat menghadapi tantangan dengan percaya diri. Saya memiliki keterampilan multitasking yang kuat dan kemampuan untuk mengelola jadwal dengan efisien. Saya tertarik untuk belajar lebih banyak dan mendukung operasional perusahaan', '2025-05-25 15:18:44', '2025-05-25 15:18:44'),
(59, 'asep', 'IT Developer', 'admin@gmail.com', '089684758768', 'PPKD.png', 1, 'Mengerti bahasa tumbuhan', 'Dengan latar belakang pendidikan dalam administrasi, saya adalah seorang fresh graduate yang dapat menghadapi tantangan dengan percaya diri. Saya memiliki keterampilan multitasking yang kuat dan kemampuan untuk mengelola jadwal dengan efisien. Saya tertarik untuk belajar lebih banyak dan mendukung operasional perusahaan', '2025-05-25 15:19:23', '2025-05-25 15:19:23'),
(60, 'asep', 'jasa kuras laut', 'sidiksadar11@gmail.com', '089684758768', 'siddiq.jpeg', 1, 'Menguasai Bahasa Pemrograman Java script', '         Dengan latar belakang pendidikan dalam administrasi, saya adalah seorang fresh graduate yang dapat menghadapi tantangan dengan percaya diri. Saya memiliki keterampilan multitasking yang kuat dan kemampuan untuk mengelola jadwal dengan efisien. Saya tertarik untuk belajar lebih banyak dan mendukung operasional perusahaan', '2025-05-25 15:24:42', '2025-05-25 15:24:42'),
(61, 'Hardianti', 'Web programming', 'admin@gmail.com', '089684758768', 'anime-night-sky-illustration.jpg', 1, 'Menguasai Bahasa Pemrograman Java script', '         ddddddddddddddddddd', '2025-05-26 15:39:30', '2025-05-26 15:39:30');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=dec8 COLLATE=dec8_bin;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Muhammad Siddiq', 'sidiksadar11@gmail.com', 'keluh kesah', 'iiiiiiiiiiiiiiiiiii', '2025-05-26 10:45:05', '2025-05-26 10:45:05'),
(2, 'Muhammad Siddiq', 'admin@gmail.com', 'keluh kesah', 'kkkkkkkkkkkkkkkkkkkk', '2025-05-26 10:45:16', '2025-05-26 10:45:16'),
(3, 'Muhammad Siddiq', 'admin@gmail.com', 'keluh kesah', 'kkkkkkkkkkkkkkkkkkkk', '2025-05-26 11:39:36', '2025-05-26 11:39:36'),
(4, 'Muhammad Siddiq', 'admin@gmail.com', 'keluh kesah', 'kkkkkkkkkkkkkkkkkkkk', '2025-05-26 11:40:26', '2025-05-26 11:40:26'),
(5, 'Muhammad Siddiq', 'admin@gmail.com', 'keluh kesah', 'kkkkkkkkkkkkkkkkkkkk', '2025-05-26 11:54:46', '2025-05-26 11:54:46'),
(6, 'Muhammad Siddiq', 'admin@gmail.com', 'keluh kesah', 'kkkkkkkkkkkkkkkkkkkk', '2025-05-26 11:59:53', '2025-05-26 11:59:53'),
(7, 'Muhammad Siddiq', 'admin@gmail.com', 'keluh kesah', 'kkkkkkkkkkkkkkkkkkkk', '2025-05-26 12:08:57', '2025-05-26 12:08:57'),
(8, 'Muhammad Siddiq', 'admin@gmail.com', 'keluh kesah', 'kkkkkkkkkkkkkkkkkkkk', '2025-05-26 15:39:40', '2025-05-26 15:39:40');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id` int(11) NOT NULL,
  `name_level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `name_level`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(11) NOT NULL,
  `profile_name` varchar(45) DEFAULT NULL,
  `profesion` varchar(55) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `profile_name`, `profesion`, `description`, `photo`) VALUES
(43, 'juhuhuhu', '', 'jjjhhhhihii', '');

-- --------------------------------------------------------

--
-- Table structure for table `summarys`
--

CREATE TABLE `summarys` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=dec8 COLLATE=dec8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `level_id` int(11) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `level_id`, `name`, `email`, `password`, `created_at`, `update_at`) VALUES
(24, NULL, 'Muhammad Siddiq', 'sidiksadar11@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2025-05-24 02:30:05', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `summarys`
--
ALTER TABLE `summarys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `level_id_to_id_level` (`level_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `summarys`
--
ALTER TABLE `summarys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `level_id_to_id_level` FOREIGN KEY (`level_id`) REFERENCES `level` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
