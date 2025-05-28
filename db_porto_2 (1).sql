-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Bulan Mei 2025 pada 04.37
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
(65, 'Muhammad Reihan Perdana', 'Frontend ', 'Reihanprdn9@gmail.com', '085710590044', 'jokowi.jpg', 1, 'memahami bahasa biawak', '         vvvvvvvvvvvvvvvvvvvvvvvvvv', '2025-05-28 01:51:48', '2025-05-28 01:51:48'),
(66, 'Muhammad Reihan Perdana', 'IT Development', 'Reihanprdn9@gmail.com', '085710590044', '836519_08305325082013_jokowi_metal.jpg', 1, 'memahami bahasa biawak', 'jakarta', '2025-05-28 02:21:26', '2025-05-28 02:21:26');

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

--
-- Dumping data untuk tabel `educations`
--

INSERT INTO `educations` (`id`, `major`, `year`, `university`, `description`, `status`, `created_at`, `updated_at`) VALUES
(5, 'Teknik informatika', '2025', 'Universitas indraprasta PGRI', '', 1, '2025-05-27 23:49:20', '2025-05-28 01:17:10'),
(6, 'Teknik informatika', '2025', 'Universitas indraprasta PGRI', 'saya suka dengan tantangan', 1, '2025-05-28 01:23:04', NULL),
(7, 'Teknik informatika', '2025', 'Universitas indraprasta PGRI', '<ul><li>saya anak baik</li><li>saya suka makan</li></ul>', 1, '2025-05-28 02:10:15', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `experiences`
--

CREATE TABLE `experiences` (
  `id` int(11) NOT NULL,
  `year` year(4) NOT NULL,
  `position` varchar(50) NOT NULL,
  `company` varchar(50) NOT NULL,
  `activity` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `experiences`
--

INSERT INTO `experiences` (`id`, `year`, `position`, `company`, `activity`, `status`, `created_at`, `updated_at`) VALUES
(9, '2025', 'Penjaga Lampu lilin', 'PT. Mencari cinta', 'menjaga lilin waktu sedang ngepet', 1, '2025-05-28 01:26:54', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `levels`
--

CREATE TABLE `levels` (
  `id` int(11) NOT NULL,
  `name_level` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `levels`
--

INSERT INTO `levels` (`id`, `name_level`) VALUES
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
-- Dumping data untuk tabel `summarys`
--

INSERT INTO `summarys` (`id`, `description`, `name`, `address`, `phone`, `email`, `status`, `created_at`, `updated_at`) VALUES
(13, 'saya suka dengan tantangan baru', 'Muhammad Reihan Perdana', 'Jl.Warakas II GGIIB NO5B RT005 RW02 KEL.WARAKAS KEC.TANJUNG PRIOK', 'Reihanprdn9@gmail.com', 'Reihanprdn9@gmail.com', 1, '2025-05-28 02:05:24', '2025-05-28 02:05:07');

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
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `id_level`, `name`, `email`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'siddiq', 'admin@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2025-05-21 01:40:52', '2025-05-27 16:20:19', 0),
(7, 2, 'Test', 'test@gmail.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '2025-05-22 08:34:08', '2025-05-27 04:38:24', 0);

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
-- Indeks untuk tabel `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `levels`
--
ALTER TABLE `levels`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
