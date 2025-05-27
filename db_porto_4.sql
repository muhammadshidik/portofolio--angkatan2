-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2025 at 07:10 PM
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
-- Database: `db_porto_4`
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
(61, 'Hardianti', 'Web programming', 'admin@gmail.com', '089684758768', 'anime-night-sky-illustration.jpg', 1, 'Menguasai Bahasa Pemrograman Java script', '         ddddddddddddddddddd', '2025-05-26 15:39:30', '2025-05-26 15:39:30'),
(62, 'Muhammad Siddiq', 'IT Development', 'Reihanprdn9@gmail.com', '085710590044', 'WebPPKD.jpg', 1, 'memahami bahasa biawak', '         sssssssssssssss', '2025-05-27 03:59:59', '2025-05-27 03:59:59');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Product'),
(2, 'Branding');

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
-- Table structure for table `educations`
--

CREATE TABLE `educations` (
  `id` int(11) NOT NULL,
  `major` varchar(25) NOT NULL,
  `year` year(4) NOT NULL,
  `university` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `educations`
--

INSERT INTO `educations` (`id`, `major`, `year`, `university`, `description`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Teknik Informatika', '2025', '', 'Halo! Saya adalah seorang profesional di bidang Teknologi Informasi dengan spesialisasi sebagai Web Developer. Saya memiliki ketertarikan yang tinggi terhadap dunia pemrograman, pengembangan web, dan teknologi digital yang terus berkembang.  Dengan latar belakang pendidikan dan pengalaman di bidang IT, saya terbiasa mengerjakan berbagai proyek pengembangan website, baik untuk kebutuhan personal, bisnis, maupun sistem informasi internal perusahaan. Saya menguasai beberapa teknologi web seperti:  Front-End: HTML, CSS, JavaScript, Bootstrap  Back-End: PHP, MySQL, dan dasar-dasar framework seperti Laravel  Tools: Git, VS Code, XAMPP  Saya memiliki kemampuan analisis yang baik, senang memecahkan masalah teknis, serta terus mengikuti perkembangan teknologi agar dapat memberikan solusi yang relevan dan efisien.  Bagi saya, menjadi Web Developer bukan hanya tentang menulis kode, tetapi juga menciptakan pengalaman digital yang fungsional, aman, dan user-friendly.', 1, '2025-05-27 12:58:38', NULL),
(4, 'IT Support', '2025', 'Universitas Indraprasta PGRI', 'Halo! Saya adalah seorang profesional di bidang Teknologi Informasi dengan spesialisasi sebagai Web Developer. Saya memiliki ketertarikan yang tinggi terhadap dunia pemrograman, pengembangan web, dan teknologi digital yang terus berkembang.  Dengan latar belakang pendidikan dan pengalaman di bidang IT, saya terbiasa mengerjakan berbagai proyek pengembangan website, baik untuk kebutuhan personal, bisnis, maupun sistem informasi internal perusahaan. Saya menguasai beberapa teknologi web seperti:  Front-End: HTML, CSS, JavaScript, Bootstrap  Back-End: PHP, MySQL, dan dasar-dasar framework seperti Laravel  Tools: Git, VS Code, XAMPP  Saya memiliki kemampuan analisis yang baik, senang memecahkan masalah teknis, serta terus mengikuti perkembangan teknologi agar dapat memberikan solusi yang relevan dan efisien.  Bagi saya, menjadi Web Developer bukan hanya tentang menulis kode, tetapi juga menciptakan pengalaman digital yang fungsional, aman, dan user-friendly.', 1, '2025-05-27 16:57:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` int(11) NOT NULL,
  `name_level` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `name_level`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `portofolios`
--

CREATE TABLE `portofolios` (
  `id` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `name_porto` varchar(50) NOT NULL,
  `photo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `portofolios`
--

INSERT INTO `portofolios` (`id`, `id_category`, `name_porto`, `photo`) VALUES
(1, 1, 'indomie', ''),
(2, 1, 'mie sedap', ''),
(3, 2, 'mie ayam', ''),
(4, 2, 'ayam gaplok', ''),
(5, 1, 'nasi goreng', ''),
(6, 1, 'bubur ayam', ''),
(7, 2, 'bebek carok', ''),
(8, 2, 'mie gacoan', '');

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
(43, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `summarys`
--

CREATE TABLE `summarys` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=dec8 COLLATE=dec8_bin;

--
-- Dumping data for table `summarys`
--

INSERT INTO `summarys` (`id`, `description`, `name`, `address`, `phone`, `email`, `status`, `created_at`, `updated_at`) VALUES
(3, '', 'Muhammad Siddiq', 'Jl. Tb. Simatupang', '089684758768', 'sidiksadar11@gmail.com', 1, '2025-05-27 04:09:47', '2025-05-27 04:09:47'),
(4, 'description', 'Muhammad Siddiq', 'Jl. Karet Pasar Baru Barat, Karet Tengsin, Kecamatan Tanah Abang, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10250', '089684758768', 'sidiksadar11@gmail.com', 1, '2025-05-27 16:08:00', '2025-05-27 16:08:00'),
(5, 'description', 'Muhammad Siddiq', 'Jl. Karet Pasar Baru Barat, Karet Tengsin, Kecamatan Tanah Abang, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10250', '089684758768', 'sidiksadar11@gmail.com', 1, '2025-05-27 16:10:58', '2025-05-27 16:10:58'),
(6, 'Halo! Saya adalah seorang profesional di bidang Teknologi Informasi dengan spesialisasi sebagai Web Developer. Saya memiliki ketertarikan yang tinggi terhadap dunia pemrograman, pengembangan web, dan teknologi digital yang terus berkembang.  Dengan latar belakang pendidikan dan pengalaman di bidang IT, saya terbiasa mengerjakan berbagai proyek pengembangan website, baik untuk kebutuhan personal, bisnis, maupun sistem informasi internal perusahaan. Saya menguasai beberapa teknologi web seperti:  Front-End: HTML, CSS, JavaScript, Bootstrap  Back-End: PHP, MySQL, dan dasar-dasar framework seperti Laravel  Tools: Git, VS Code, XAMPP  Saya memiliki kemampuan analisis yang baik, senang memecahkan masalah teknis, serta terus mengikuti perkembangan teknologi agar dapat memberikan solusi yang relevan dan efisien.  Bagi saya, menjadi Web Developer bukan hanya tentang menulis kode, tetapi juga menciptakan pengalaman digital yang fungsional, aman, dan user-friendly.', 'Muhammad Siddiq', 'Jl. Karet Pasar Baru Barat, Karet Tengsin, Kecamatan Tanah Abang, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10250', '089684758768', 'sidiksadar11@gmail.com', 1, '2025-05-27 16:12:09', '2025-05-27 16:12:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `id_level` int(11) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_level`, `name`, `email`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'siddiq', 'admin@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2025-05-21 01:40:52', '2025-05-27 16:20:19', 0),
(7, 2, 'Test', 'test@gmail.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '2025-05-22 08:34:08', '2025-05-27 04:38:24', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `educations`
--
ALTER TABLE `educations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portofolios`
--
ALTER TABLE `portofolios`
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
  ADD KEY `level_id_to_id_level` (`id_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `educations`
--
ALTER TABLE `educations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `portofolios`
--
ALTER TABLE `portofolios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `summarys`
--
ALTER TABLE `summarys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
