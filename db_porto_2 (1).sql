-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Bulan Mei 2025 pada 10.45
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

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
-- Struktur dari tabel `abouts`
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
-- Dumping data untuk tabel `abouts`
--

INSERT INTO `abouts` (`id`, `name`, `profile`, `email`, `phone`, `photo`, `status`, `skills`, `description`, `created_ad`, `updated_at`) VALUES
(58, 'Muhammad Siddiq', 'Front End Developer', 'sidiksadar11@gmail.com', '089684758768', 'siddiq.jpeg', 1, 'Menguasai Bahasa Pemrograman Java script', 'Dengan latar belakang pendidikan dalam administrasi, saya adalah seorang fresh graduate yang dapat menghadapi tantangan dengan percaya diri. Saya memiliki keterampilan multitasking yang kuat dan kemampuan untuk mengelola jadwal dengan efisien. Saya tertarik untuk belajar lebih banyak dan mendukung operasional perusahaan', '2025-05-25 15:18:44', '2025-05-25 15:18:44'),
(59, 'asep', 'IT Developer', 'admin@gmail.com', '089684758768', 'PPKD.png', 1, 'Mengerti bahasa tumbuhan', 'Dengan latar belakang pendidikan dalam administrasi, saya adalah seorang fresh graduate yang dapat menghadapi tantangan dengan percaya diri. Saya memiliki keterampilan multitasking yang kuat dan kemampuan untuk mengelola jadwal dengan efisien. Saya tertarik untuk belajar lebih banyak dan mendukung operasional perusahaan', '2025-05-25 15:19:23', '2025-05-25 15:19:23'),
(60, 'asep', 'jasa kuras laut', 'sidiksadar11@gmail.com', '089684758768', 'siddiq.jpeg', 1, 'Menguasai Bahasa Pemrograman Java script', '         Dengan latar belakang pendidikan dalam administrasi, saya adalah seorang fresh graduate yang dapat menghadapi tantangan dengan percaya diri. Saya memiliki keterampilan multitasking yang kuat dan kemampuan untuk mengelola jadwal dengan efisien. Saya tertarik untuk belajar lebih banyak dan mendukung operasional perusahaan', '2025-05-25 15:24:42', '2025-05-25 15:24:42'),
(61, 'Hardianti', 'Web programming', 'admin@gmail.com', '089684758768', 'anime-night-sky-illustration.jpg', 1, 'Menguasai Bahasa Pemrograman Java script', '         ddddddddddddddddddd', '2025-05-26 15:39:30', '2025-05-26 15:39:30'),
(62, 'Muhammad Siddiq', 'IT Development', 'Reihanprdn9@gmail.com', '085710590044', 'WebPPKD.jpg', 1, 'memahami bahasa biawak', '         sssssssssssssss', '2025-05-27 03:59:59', '2025-05-27 03:59:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Product'),
(2, 'Branding');

-- --------------------------------------------------------

--
-- Struktur dari tabel `contacts`
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
-- Dumping data untuk tabel `contacts`
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
-- Struktur dari tabel `educations`
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id` int(11) NOT NULL,
  `name_level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id`, `name_level`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `portofolios`
--

CREATE TABLE `portofolios` (
  `id` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `name_porto` varchar(50) NOT NULL,
  `photo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `portofolios`
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
-- Struktur dari tabel `profiles`
--

CREATE TABLE `profiles` (
  `id` int(11) NOT NULL,
  `profile_name` varchar(45) DEFAULT NULL,
  `profesion` varchar(55) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `profiles`
--

INSERT INTO `profiles` (`id`, `profile_name`, `profesion`, `description`, `photo`) VALUES
(43, '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `summarys`
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

--
-- Dumping data untuk tabel `summarys`
--

INSERT INTO `summarys` (`id`, `name`, `address`, `phone`, `email`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Muhammad Siddiq', 'Jl. Tb. Simatupang', '089684758768', 'sidiksadar11@gmail.com', 1, '2025-05-27 04:09:47', '2025-05-27 04:09:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `id_level` int(11) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `id_level`, `name`, `email`, `password`, `created_at`, `update_at`) VALUES
(1, 1, 'Muhammad Siddiq', 'sidiksadar11@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2025-05-24 02:30:05', NULL),
(2, 2, 'sodik', 'sidiksadar@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2025-05-27 01:48:47', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `educations`
--
ALTER TABLE `educations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `portofolios`
--
ALTER TABLE `portofolios`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `summarys`
--
ALTER TABLE `summarys`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `level_id_to_id_level` (`id_level`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `educations`
--
ALTER TABLE `educations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `level`
--
ALTER TABLE `level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `portofolios`
--
ALTER TABLE `portofolios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `summarys`
--
ALTER TABLE `summarys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `level_id_to_id_level` FOREIGN KEY (`id_level`) REFERENCES `level` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
