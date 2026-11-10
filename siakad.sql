-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Nov 10, 2026 at 12:33 PM
-- Server version: 8.4.3
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siakad`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id` bigint UNSIGNED NOT NULL,
  `nidn` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan_fungsional` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id`, `nidn`, `nama`, `jabatan_fungsional`, `email`, `telepon`, `alamat`, `created_at`, `updated_at`) VALUES
(1, '0008330732', 'Paramita Waskita, S.T., M.T.', NULL, 'umay.nasyidah@example.com', '082292734043', 'Gg. Kartini No. 332, Tegal 45235, Sulteng', '2026-11-09 16:27:46', '2026-11-09 16:27:46'),
(2, '0089299801', 'Tedi Rahimah, S.Kom., M.Eng.', NULL, 'fujiati.irnanto@example.com', '085781674654', 'Jr. Bambu No. 921, Pariaman 75424, Pabar', '2026-11-09 16:27:46', '2026-11-09 16:27:46'),
(3, '0086672128', 'Vero Namaga, S.Kom., M.Kom.', NULL, 'jsudiati@example.net', '089909951533', 'Gg. Wahid No. 485, Manado 90890, Sultra', '2026-11-09 16:27:46', '2026-11-09 16:27:46'),
(4, '0071328189', 'Raharja Hidayanto, S.T., M.T.', NULL, 'bprasetyo@example.net', '080451713485', 'Jln. Lumban Tobing No. 598, Binjai 89510, Banten', '2026-11-09 16:27:46', '2026-11-09 16:27:46'),
(5, '0039468060', 'Puti Winarsih, S.T., M.T.', NULL, 'elisa.suwarno@example.org', '085705936996', 'Ds. Basudewo No. 190, Tangerang 42401, Riau', '2026-11-09 16:27:46', '2026-11-09 16:27:46'),
(6, '0090922925', 'Okta Mayasari, S.Si., M.Cs.', NULL, 'sidiq60@example.net', '087221603418', 'Ds. Wora Wari No. 389, Malang 57233, Kaltim', '2026-11-09 16:27:46', '2026-11-09 16:27:46'),
(7, '0077227127', 'Kariman Mandasari, S.Kom., M.Eng.', NULL, 'vwacana@example.net', '082750217890', 'Ds. Setia Budi No. 471, Bandar Lampung 29099, Kalsel', '2026-11-09 16:27:46', '2026-11-09 16:27:46'),
(8, '0020536829', 'Sadina Permata, S.Kom., M.Eng.', NULL, 'cengkir44@example.org', '081315531023', 'Gg. Bak Air No. 70, Mojokerto 47756, DIY', '2026-11-09 16:27:46', '2026-11-09 16:27:46'),
(9, '0098384349', 'Jessica Tarihoran, S.Kom., M.Eng.', NULL, 'estiono.wastuti@example.com', '089198779367', 'Ki. Sukabumi No. 520, Makassar 51072, NTB', '2026-11-09 16:27:46', '2026-11-09 16:27:46'),
(10, '0016206588', 'Karimah Mandala, S.Si., M.Cs.', NULL, 'nnainggolan@example.net', '086719260776', 'Dk. Halim No. 399, Palopo 64679, NTB', '2026-11-09 16:27:46', '2026-11-09 16:27:46');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `krs`
--

CREATE TABLE `krs` (
  `id` bigint UNSIGNED NOT NULL,
  `mahasiswa_id` bigint UNSIGNED NOT NULL,
  `tahun_akademik` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` enum('Ganjil','Genap') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('draft','diajukan','disetujui','ditolak') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `krs`
--

INSERT INTO `krs` (`id`, `mahasiswa_id`, `tahun_akademik`, `semester`, `status`, `created_at`, `updated_at`) VALUES
(11, 51, '2024', 'Ganjil', 'disetujui', '2026-11-10 03:31:11', '2026-11-10 03:31:11'),
(13, 52, '2024', 'Genap', 'disetujui', '2026-11-10 05:01:33', '2026-11-10 05:01:33'),
(14, 58, '2024', 'Ganjil', 'disetujui', '2026-11-10 11:09:04', '2026-11-10 11:09:04'),
(15, 60, '2024', 'Ganjil', 'ditolak', '2026-11-10 11:15:15', '2026-11-10 11:15:15'),
(16, 56, '2024', 'Ganjil', 'diajukan', '2026-11-10 11:17:30', '2026-11-10 11:17:30'),
(17, 53, '2025/2026', 'Ganjil', 'draft', '2026-11-10 11:22:33', '2026-11-10 11:22:33'),
(18, 54, '2025/2026', 'Ganjil', 'draft', '2026-11-10 11:22:33', '2026-11-10 11:22:33'),
(19, 55, '2025/2026', 'Ganjil', 'draft', '2026-11-10 11:22:33', '2026-11-10 11:22:33'),
(20, 57, '2025/2026', 'Ganjil', 'draft', '2026-11-10 11:22:33', '2026-11-10 11:22:33'),
(21, 59, '2025/2026', 'Ganjil', 'draft', '2026-11-10 11:22:33', '2026-11-10 11:22:33'),
(22, 61, '2025/2026', 'Ganjil', 'draft', '2026-11-10 11:22:33', '2026-11-10 11:22:33'),
(23, 62, '2025/2026', 'Ganjil', 'draft', '2026-11-10 11:22:33', '2026-11-10 11:22:33');

-- --------------------------------------------------------

--
-- Table structure for table `krs_detail`
--

CREATE TABLE `krs_detail` (
  `id` bigint UNSIGNED NOT NULL,
  `krs_id` bigint UNSIGNED NOT NULL,
  `mata_kuliah_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `krs_detail`
--

INSERT INTO `krs_detail` (`id`, `krs_id`, `mata_kuliah_id`, `created_at`, `updated_at`) VALUES
(51, 13, 4, '2026-11-10 05:01:33', '2026-11-10 05:01:33'),
(52, 13, 5, '2026-11-10 05:01:33', '2026-11-10 05:01:33'),
(53, 13, 6, '2026-11-10 05:01:33', '2026-11-10 05:01:33'),
(54, 14, 2, '2026-11-10 11:09:04', '2026-11-10 11:09:04'),
(55, 14, 3, '2026-11-10 11:09:04', '2026-11-10 11:09:04'),
(56, 15, 3, '2026-11-10 11:15:15', '2026-11-10 11:15:15'),
(57, 15, 4, '2026-11-10 11:15:15', '2026-11-10 11:15:15'),
(58, 15, 6, '2026-11-10 11:15:15', '2026-11-10 11:15:15'),
(59, 16, 2, '2026-11-10 11:17:30', '2026-11-10 11:17:30'),
(60, 16, 3, '2026-11-10 11:17:30', '2026-11-10 11:17:30'),
(61, 16, 4, '2026-11-10 11:17:30', '2026-11-10 11:17:30'),
(62, 16, 5, '2026-11-10 11:17:30', '2026-11-10 11:17:30');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` bigint UNSIGNED NOT NULL,
  `nim` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `angkatan` smallint UNSIGNED NOT NULL,
  `program_studi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'D3 Teknik Informatika',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nim`, `nama`, `jenis_kelamin`, `email`, `angkatan`, `program_studi`, `created_at`, `updated_at`) VALUES
(51, '32024160877', 'Faith Skom Mkom', 'L', 'faithendrian99@gmail.com', 2024, 'D3 Teknik Informatika', '2026-11-10 03:11:12', '2026-11-10 03:11:12'),
(52, '12345666', 'pak aji', 'L', 'faithendrian29@gmail.com', 2022, 'D3 Teknik Informatika', '2026-11-10 03:11:50', '2026-11-10 03:11:50'),
(53, '3202416053', 'Felesia Elita Quinn', 'P', 'EL@gmail.com', 2024, 'D3 Teknik Informatika', '2026-11-10 03:32:41', '2026-11-10 03:32:41'),
(54, '255096', 'Gina Kurniawan', 'P', '255096@mhs.example.com', 2025, 'D3 Teknik Informatika', '2026-11-10 03:44:44', '2026-11-10 03:44:44'),
(55, '233003', 'Baktiono Marbun', 'L', '233003@mhs.example.com', 2023, 'D3 Teknik Informatika', '2026-11-10 03:44:44', '2026-11-10 03:44:44'),
(56, '248853', 'Alambana Sudiati', 'L', '248853@mhs.example.com', 2024, 'D3 Teknik Informatika', '2026-11-10 03:44:44', '2026-11-10 03:44:44'),
(57, '220278', 'Kartika Laksmiwati', 'P', '220278@mhs.example.com', 2022, 'D3 Teknik Informatika', '2026-11-10 03:44:44', '2026-11-10 03:44:44'),
(58, '240044', 'Yosef Rahayu', 'L', '240044@mhs.example.com', 2024, 'D3 Teknik Informatika', '2026-11-10 03:44:44', '2026-11-10 03:44:44'),
(59, '220819', 'Cakrajiya Maheswara', 'L', '220819@mhs.example.com', 2022, 'D3 Teknik Informatika', '2026-11-10 03:44:44', '2026-11-10 03:44:44'),
(60, '224144', 'Gandi Samosir', 'L', '224144@mhs.example.com', 2022, 'D3 Teknik Informatika', '2026-11-10 03:44:44', '2026-11-10 03:44:44'),
(61, '254965', 'Diana Maulana', 'P', '254965@mhs.example.com', 2025, 'D3 Teknik Informatika', '2026-11-10 03:44:44', '2026-11-10 03:44:44'),
(62, '3131313121', 'tes', 'L', 'faithendriae3rfn9@gmail.com', 2024, 'D3 Teknik Informatika', '2026-11-10 11:18:00', '2026-11-10 11:18:00');

-- --------------------------------------------------------

--
-- Table structure for table `mata_kuliah`
--

CREATE TABLE `mata_kuliah` (
  `id` bigint UNSIGNED NOT NULL,
  `kode_mk` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_mk` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sks` tinyint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mata_kuliah`
--

INSERT INTO `mata_kuliah` (`id`, `kode_mk`, `nama_mk`, `sks`, `created_at`, `updated_at`) VALUES
(2, 'T1102', 'Algoritma dan Pemrograman', 3, '2026-11-09 16:27:47', '2026-11-09 16:27:47'),
(3, 'T1103', 'Matematika Diskrit', 3, '2026-11-09 16:27:47', '2026-11-09 16:27:47'),
(4, 'T1201', 'Basis Data', 3, '2026-11-09 16:27:47', '2026-11-09 16:27:47'),
(5, 'T1202', 'Desain Web', 3, '2026-11-09 16:27:47', '2026-11-09 16:27:47'),
(6, 'T1203', 'Pemrograman Web', 3, '2026-11-09 16:27:47', '2026-11-09 16:27:47'),
(7, 'T1204', 'Jaringan Komputer', 3, '2026-11-09 16:27:47', '2026-11-09 16:27:47'),
(8, 'T1301', 'Rekayasa Perangkat Lunak', 3, '2026-11-09 16:27:47', '2026-11-09 16:27:47'),
(9, 'T1302', 'Pemrograman Berorientasi Objek', 3, '2026-11-09 16:27:47', '2026-11-09 16:27:47'),
(10, 'T1303', 'Sistem Operasi', 2, '2026-11-09 16:27:47', '2026-11-09 16:27:47');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_10_26_205048_create_dosen_table', 1),
(5, '2026_10_26_205120_create_mahasiswa_table_php_artisan', 1),
(6, '2026_10_26_205345_create_mata_kuliah_table', 1),
(7, '2026_10_26_212130_create_krs_table', 1),
(8, '2026_10_26_212139_create_krs_detail_table', 1),
(9, '2026_10_27_005614_add_jabatan_fungsional_to_dosen_table', 1),
(10, '2026_10_29_231913_add_last_login_at_to_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('FAXrzFTMRKRLiW9fETQRk7IgpEi5EDyEwMu3UwKK', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/157.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiYWJKbU4yMjhkV2ZiZ040Y01UZ2kyMHBFMnpZelNPMlByQkp2VE9HRyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDk6Imh0dHA6Ly9vdmVycG93ZXItaGFyZHdvb2Qtd2ltcC5uZ3Jvay1mcmVlLmRldi9rcnMiO3M6NToicm91dGUiO3M6OToia3JzLmluZGV4Ijt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2NDoiZDE5OTAwYzcxYWYwZDk1NjU5MzA3ZDkyMmY1YzhhMWUyYmVlNDU1N2ZiOGU4YTY4NjQ3NDY3NTgxZjUwZjJmMyI7fQ==', 1794309795),
('GNF4NtTkwMr9MCnLSkPp2SqTlSkaMzzUQlrXkvcO', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiM0hDT21XVDdNQ0hwZ1dGTGZ4S0Y0dXE2VlpSbTl4OFVrQ0VrQkhpeCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjI6e3M6MzoidXJsIjtzOjQ5OiJodHRwOi8vb3ZlcnBvd2VyLWhhcmR3b29kLXdpbXAubmdyb2stZnJlZS5kZXYva3JzIjtzOjU6InJvdXRlIjtzOjk6Imtycy5pbmRleCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjQ6ImQxOTkwMGM3MWFmMGQ5NTY1OTMwN2Q5MjJmNWM4YTFlMmJlZTQ1NTdmYjhlOGE2ODY0NzQ2NzU4MWY1MGYyZjMiO30=', 1794286895),
('l5dQngSW992zUwHnr3W0ZN5GCMOM48CL8Ih51PlJ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMWIxd0E5TVBxWHlKUWFRek9GMWNZdllZTFZldnRJbmo2cWRBTnZRSyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7czo1OiJyb3V0ZSI7czo1OiJsb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1794282973);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','dosen','mahasiswa') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'mahasiswa',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_login_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`, `last_login_at`) VALUES
(1, 'Administrator SIAKAD', 'admin@siakad.test', NULL, '$2y$12$MZsjsgquS6TS6W/F9npRJu9tCYXs.Nmk3.r32pnoFrNm55KXCLpty', 'admin', NULL, '2026-11-09 16:27:44', '2026-11-10 11:18:27', '2026-11-10 11:18:27'),
(2, 'Dosen Uji', 'dosen@siakad.test', NULL, '$2y$12$lHwzV7mstD7KEsEdgz6ULefMBa0fPYnNCL017vQDImTybQjn..hbC', 'dosen', NULL, '2026-11-09 16:27:47', '2026-11-09 16:27:47', NULL),
(3, 'Mahasiswa Uji', 'mahasiswa@siakad.test', NULL, '$2y$12$.0QP3QFGa1ciiXyFP5bXLe4h4uZ7OtRoZv.NDVRVDeGmNVZwmHqiK', 'mahasiswa', NULL, '2026-11-09 16:27:47', '2026-11-09 16:27:47', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dosen_nidn_unique` (`nidn`),
  ADD UNIQUE KEY `dosen_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `krs`
--
ALTER TABLE `krs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `krs_mahasiswa_id_tahun_akademik_semester_unique` (`mahasiswa_id`,`tahun_akademik`,`semester`);

--
-- Indexes for table `krs_detail`
--
ALTER TABLE `krs_detail`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `krs_detail_krs_id_mata_kuliah_id_unique` (`krs_id`,`mata_kuliah_id`),
  ADD KEY `krs_detail_mata_kuliah_id_foreign` (`mata_kuliah_id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mahasiswa_nim_unique` (`nim`),
  ADD UNIQUE KEY `mahasiswa_email_unique` (`email`);

--
-- Indexes for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mata_kuliah_kode_mk_unique` (`kode_mk`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `krs`
--
ALTER TABLE `krs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `krs_detail`
--
ALTER TABLE `krs_detail`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `krs`
--
ALTER TABLE `krs`
  ADD CONSTRAINT `krs_mahasiswa_id_foreign` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswa` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `krs_detail`
--
ALTER TABLE `krs_detail`
  ADD CONSTRAINT `krs_detail_krs_id_foreign` FOREIGN KEY (`krs_id`) REFERENCES `krs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `krs_detail_mata_kuliah_id_foreign` FOREIGN KEY (`mata_kuliah_id`) REFERENCES `mata_kuliah` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
