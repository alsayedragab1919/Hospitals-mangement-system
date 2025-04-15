-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2024 at 07:29 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$WYN.85x0zourHtdqMGB9vOSyTePIDAr0Yp8Z7jrLA6DQwDBM29h7e', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ambulances`
--

CREATE TABLE `ambulances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `car_number` varchar(255) NOT NULL,
  `car_model` varchar(255) NOT NULL,
  `car_year_made` varchar(255) NOT NULL,
  `driver_license_number` varchar(255) NOT NULL,
  `driver_phone` varchar(255) NOT NULL,
  `is_available` tinyint(1) NOT NULL DEFAULT 1,
  `car_type` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ambulance_translations`
--

CREATE TABLE `ambulance_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `driver_name` varchar(255) NOT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `ambulance_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `section_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `type` enum('غير مؤكد','مؤكد','منتهي') NOT NULL DEFAULT 'غير مؤكد',
  `appointment` datetime DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `appointment_doctor`
--

CREATE TABLE `appointment_doctor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `appointment_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `appointment_translations`
--

CREATE TABLE `appointment_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `appointment_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `conversations`
--

CREATE TABLE `conversations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_email` varchar(255) NOT NULL COMMENT 'المرسل',
  `receiver_email` varchar(255) NOT NULL COMMENT 'المستقبل',
  `last_time_message` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `conversations`
--

INSERT INTO `conversations` (`id`, `sender_email`, `receiver_email`, `last_time_message`, `created_at`, `updated_at`) VALUES
(1, 'sayed@yahoo.com', 'leanna50@example.com', NULL, '2024-12-20 12:21:31', '2024-12-20 12:21:31'),
(2, 'sayed@yahoo.com', 'thiel.adolphus@example.com', NULL, '2024-12-20 12:21:59', '2024-12-20 12:21:59'),
(3, 'sayed@yahoo.com', 'flossie.hayes@example.com', NULL, '2024-12-20 12:21:59', '2024-12-20 12:21:59'),
(4, 'sayed@yahoo.com', 'waelchi.lemuel@example.com', NULL, '2024-12-20 12:22:00', '2024-12-20 12:22:00'),
(5, 'SayedRagab@gmail.com', 'leanna50@example.com', NULL, '2024-12-20 16:27:16', '2024-12-20 16:27:16');

-- --------------------------------------------------------

--
-- Table structure for table `diagnostics`
--

CREATE TABLE `diagnostics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `review_date` datetime DEFAULT NULL,
  `diagnosis` longtext NOT NULL,
  `medicine` longtext NOT NULL,
  `invoice_id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `section_id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `email`, `email_verified_at`, `password`, `section_id`, `phone`, `status`, `created_at`, `updated_at`) VALUES
(1, 'leanna50@example.com', '2024-12-20 12:21:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 2, '+1 (234) 433-9139', 1, '2024-12-20 12:21:05', '2024-12-20 12:21:05'),
(2, 'thiel.adolphus@example.com', '2024-12-20 12:21:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 3, '828-619-6411', 1, '2024-12-20 12:21:05', '2024-12-20 12:21:05'),
(3, 'flossie.hayes@example.com', '2024-12-20 12:21:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 3, '1-747-642-2814', 1, '2024-12-20 12:21:05', '2024-12-20 12:21:05'),
(4, 'waelchi.lemuel@example.com', '2024-12-20 12:21:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, '713-374-2655', 1, '2024-12-20 12:21:05', '2024-12-20 12:21:05'),
(5, 'josiane.ritchie@example.net', '2024-12-20 12:21:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 4, '+1-541-574-1371', 1, '2024-12-20 12:21:05', '2024-12-20 12:21:05'),
(6, 'tremblay.amaya@example.net', '2024-12-20 12:21:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 7, '267.418.4495', 1, '2024-12-20 12:21:06', '2024-12-20 12:21:06'),
(7, 'myles92@example.org', '2024-12-20 12:21:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 7, '847.733.4414', 1, '2024-12-20 12:21:06', '2024-12-20 12:21:06'),
(8, 'annalise16@example.com', '2024-12-20 12:21:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 7, '+12693172388', 1, '2024-12-20 12:21:06', '2024-12-20 12:21:06'),
(9, 'urogahn@example.org', '2024-12-20 12:21:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, '1-909-688-9330', 1, '2024-12-20 12:21:06', '2024-12-20 12:21:06'),
(10, 'hermann.don@example.com', '2024-12-20 12:21:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 5, '+1-660-614-2047', 1, '2024-12-20 12:21:06', '2024-12-20 12:21:06'),
(11, 'vicenta73@example.com', '2024-12-20 12:21:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, '+14636789770', 1, '2024-12-20 12:21:06', '2024-12-20 12:21:06'),
(12, 'nikko80@example.org', '2024-12-20 12:21:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 5, '689-639-0101', 1, '2024-12-20 12:21:06', '2024-12-20 12:21:06'),
(13, 'fnitzsche@example.org', '2024-12-20 12:21:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, '1-570-679-6336', 1, '2024-12-20 12:21:06', '2024-12-20 12:21:06'),
(14, 'anibal.beahan@example.net', '2024-12-20 12:21:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 4, '(520) 298-7105', 1, '2024-12-20 12:21:06', '2024-12-20 12:21:06'),
(15, 'judd87@example.com', '2024-12-20 12:21:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 5, '1-619-627-7289', 1, '2024-12-20 12:21:06', '2024-12-20 12:21:06'),
(16, 'robyn.predovic@example.net', '2024-12-20 12:21:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 4, '352.651.5969', 1, '2024-12-20 12:21:06', '2024-12-20 12:21:06'),
(17, 'devan.witting@example.com', '2024-12-20 12:21:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 3, '(762) 330-5451', 1, '2024-12-20 12:21:06', '2024-12-20 12:21:06'),
(18, 'torrey.upton@example.net', '2024-12-20 12:21:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, '+1 (984) 243-7137', 1, '2024-12-20 12:21:06', '2024-12-20 12:21:06'),
(19, 'alene89@example.net', '2024-12-20 12:21:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 3, '+1.283.346.6416', 1, '2024-12-20 12:21:06', '2024-12-20 12:21:06'),
(20, 'cedrick84@example.net', '2024-12-20 12:21:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 2, '+1-914-753-0014', 1, '2024-12-20 12:21:06', '2024-12-20 12:21:06'),
(21, 'kaelyn.predovic@example.com', '2024-12-20 12:21:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, '+1.571.955.9316', 1, '2024-12-20 12:21:06', '2024-12-20 12:21:06'),
(22, 'lera.swaniawski@example.com', '2024-12-20 12:21:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 3, '281.590.7987', 1, '2024-12-20 12:21:06', '2024-12-20 12:21:06'),
(23, 'maye.gusikowski@example.org', '2024-12-20 12:21:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 6, '+1 (862) 692-1388', 1, '2024-12-20 12:21:06', '2024-12-20 12:21:06'),
(24, 'ziemann.mabel@example.net', '2024-12-20 12:21:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, '520-942-4778', 1, '2024-12-20 12:21:06', '2024-12-20 12:21:06'),
(25, 'lenora04@example.net', '2024-12-20 12:21:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 6, '+18643251374', 1, '2024-12-20 12:21:06', '2024-12-20 12:21:06'),
(26, 'gerlach.thurman@example.com', '2024-12-20 12:21:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 4, '+12403727939', 1, '2024-12-20 12:21:06', '2024-12-20 12:21:06'),
(27, 'annabel02@example.net', '2024-12-20 12:21:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 4, '+1-918-766-0217', 1, '2024-12-20 12:21:06', '2024-12-20 12:21:06'),
(28, 'coralie70@example.org', '2024-12-20 12:21:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, '+1.346.415.3929', 1, '2024-12-20 12:21:06', '2024-12-20 12:21:06'),
(29, 'wanda60@example.org', '2024-12-20 12:21:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, '301-286-2704', 1, '2024-12-20 12:21:06', '2024-12-20 12:21:06'),
(30, 'collins.consuelo@example.com', '2024-12-20 12:21:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, '+1-610-339-4422', 1, '2024-12-20 12:21:06', '2024-12-20 12:21:06');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_translations`
--

CREATE TABLE `doctor_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_translations`
--

INSERT INTO `doctor_translations` (`id`, `locale`, `name`, `doctor_id`) VALUES
(1, 'ar', 'In quos sit.', 1),
(2, 'ar', 'Explicabo.', 2),
(3, 'ar', 'Repudiandae.', 3),
(4, 'ar', 'Quam sed.', 4),
(5, 'ar', 'Libero.', 5),
(6, 'ar', 'Officia eius.', 6),
(7, 'ar', 'Voluptas.', 7),
(8, 'ar', 'Eligendi iusto.', 8),
(9, 'ar', 'Ea aut voluptas.', 9),
(10, 'ar', 'Nulla quos.', 10),
(11, 'ar', 'Esse autem ea.', 11),
(12, 'ar', 'Modi sed sint.', 12),
(13, 'ar', 'Maxime placeat.', 13),
(14, 'ar', 'Quis labore est.', 14),
(15, 'ar', 'Ea consectetur.', 15),
(16, 'ar', 'Ullam esse et.', 16),
(17, 'ar', 'Iure eligendi.', 17),
(18, 'ar', 'Asperiores non.', 18),
(19, 'ar', 'Amet ut tempora.', 19),
(20, 'ar', 'Voluptas.', 20),
(21, 'ar', 'Quaerat rerum.', 21),
(22, 'ar', 'Reprehenderit.', 22),
(23, 'ar', 'Enim quia non.', 23),
(24, 'ar', 'Eos voluptatem.', 24),
(25, 'ar', 'Est consequatur.', 25),
(26, 'ar', 'Cum occaecati.', 26),
(27, 'ar', 'Et eos.', 27),
(28, 'ar', 'Sit sunt minima.', 28),
(29, 'ar', 'Veniam eum nemo.', 29),
(30, 'ar', 'Quo nemo in.', 30);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fund_accounts`
--

CREATE TABLE `fund_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `invoice_id` bigint(20) UNSIGNED DEFAULT NULL,
  `receipt_id` bigint(20) UNSIGNED DEFAULT NULL,
  `Payment_id` bigint(20) UNSIGNED DEFAULT NULL,
  `Debit` decimal(8,2) DEFAULT NULL,
  `credit` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Total_before_discount` decimal(8,2) NOT NULL,
  `discount_value` decimal(8,2) NOT NULL,
  `Total_after_discount` decimal(8,2) NOT NULL,
  `tax_rate` varchar(255) NOT NULL,
  `Total_with_tax` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `group_invoices`
--

CREATE TABLE `group_invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_date` date NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `section_id` bigint(20) UNSIGNED NOT NULL,
  `Group_id` bigint(20) UNSIGNED NOT NULL,
  `price` double(8,2) NOT NULL DEFAULT 0.00,
  `discount_value` double(8,2) NOT NULL DEFAULT 0.00,
  `tax_rate` varchar(255) NOT NULL,
  `tax_value` varchar(255) NOT NULL,
  `total_with_tax` double(8,2) NOT NULL DEFAULT 0.00,
  `type` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `group_translations`
--

CREATE TABLE `group_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `Group_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `filename` varchar(255) NOT NULL,
  `imageable_id` int(11) NOT NULL,
  `imageable_type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `filename`, `imageable_id`, `imageable_type`, `created_at`, `updated_at`) VALUES
(1, '2.jpg', 17, 'App\\Models\\doctor', '2024-12-20 12:21:06', '2024-12-20 12:21:06'),
(2, '2.jpg', 7, 'App\\Models\\doctor', '2024-12-20 12:21:06', '2024-12-20 12:21:06'),
(3, '5.jpg', 17, 'App\\Models\\doctor', '2024-12-20 12:21:06', '2024-12-20 12:21:06'),
(4, '5.jpg', 24, 'App\\Models\\doctor', '2024-12-20 12:21:06', '2024-12-20 12:21:06'),
(5, '1.jpg', 26, 'App\\Models\\doctor', '2024-12-20 12:21:06', '2024-12-20 12:21:06'),
(6, '1.jpg', 26, 'App\\Models\\doctor', '2024-12-20 12:21:06', '2024-12-20 12:21:06'),
(7, '4.jpg', 13, 'App\\Models\\doctor', '2024-12-20 12:21:06', '2024-12-20 12:21:06'),
(8, 'in-quos-sit.jpeg', 1, 'App\\Models\\Doctor', '2024-12-20 12:27:52', '2024-12-20 12:27:52'),
(9, 'quam-sed.jpeg', 4, 'App\\Models\\Doctor', '2024-12-20 12:28:27', '2024-12-20 12:28:27');

-- --------------------------------------------------------

--
-- Table structure for table `insurances`
--

CREATE TABLE `insurances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `insurance_code` varchar(255) NOT NULL,
  `discount_percentage` varchar(255) NOT NULL,
  `Company_rate` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `insurance_translations`
--

CREATE TABLE `insurance_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `insurance_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_type` int(11) NOT NULL,
  `invoice_date` date NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `section_id` bigint(20) UNSIGNED NOT NULL,
  `Group_id` bigint(20) UNSIGNED DEFAULT NULL,
  `Service_id` bigint(20) UNSIGNED DEFAULT NULL,
  `price` double(8,2) NOT NULL DEFAULT 0.00,
  `discount_value` double(8,2) NOT NULL DEFAULT 0.00,
  `tax_rate` varchar(255) NOT NULL,
  `tax_value` varchar(255) NOT NULL,
  `total_with_tax` double(8,2) NOT NULL DEFAULT 0.00,
  `type` int(11) NOT NULL DEFAULT 1,
  `invoice_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laboratories`
--

CREATE TABLE `laboratories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` longtext NOT NULL,
  `invoice_id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED DEFAULT NULL,
  `description_employee` longtext DEFAULT NULL,
  `case` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laboratories_employees`
--

CREATE TABLE `laboratories_employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `conversation_id` bigint(20) UNSIGNED NOT NULL,
  `sender_email` varchar(255) NOT NULL,
  `receiver_email` varchar(255) NOT NULL,
  `read` tinyint(1) DEFAULT 0,
  `body` longtext DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `conversation_id`, `sender_email`, `receiver_email`, `read`, `body`, `type`, `created_at`, `updated_at`) VALUES
(1, 1, 'sayed@yahoo.com', 'leanna50@example.com', 0, 'السلام عليكم', NULL, '2024-12-20 12:21:31', '2024-12-20 12:21:31'),
(2, 2, 'sayed@yahoo.com', 'thiel.adolphus@example.com', 0, 'السلام عليكم', NULL, '2024-12-20 12:21:59', '2024-12-20 12:21:59'),
(3, 3, 'sayed@yahoo.com', 'flossie.hayes@example.com', 0, 'السلام عليكم', NULL, '2024-12-20 12:21:59', '2024-12-20 12:21:59'),
(4, 4, 'sayed@yahoo.com', 'waelchi.lemuel@example.com', 0, 'السلام عليكم', NULL, '2024-12-20 12:22:00', '2024-12-20 12:22:00'),
(5, 5, 'SayedRagab@gmail.com', 'leanna50@example.com', 0, 'السلام عليكم', NULL, '2024-12-20 16:27:16', '2024-12-20 16:27:16');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_04_08_191734_create_sections_table', 1),
(6, '2021_04_08_191904_create_section_translations_table', 1),
(7, '2021_04_15_210025_create_doctors_table', 1),
(8, '2021_04_15_210137_create_doctor_translations_table', 1),
(9, '2021_04_15_211104_create_images_table', 1),
(10, '2021_04_29_193347_create_appointments_table', 1),
(11, '2021_04_29_193433_create_appointment_translations_table', 1),
(12, '2021_05_04_165304_create_appointment_doctor_table', 1),
(13, '2021_05_09_171806_create__services_table', 1),
(14, '2021_05_09_171819_create__service_translations_table', 1),
(15, '2021_05_18_174244_create_groups_table', 1),
(16, '2021_05_18_174329_create_group_translations_table', 1),
(17, '2021_05_18_175227_create_pivot__service__group_table', 1),
(18, '2021_05_26_193013_create_insurances_table', 1),
(19, '2021_05_26_193054_create_insurance_translations_table', 1),
(20, '2021_05_29_112549_create_ambulances_table', 1),
(21, '2021_05_29_113133_create_ambulance_translations_table', 1),
(22, '2021_06_03_185826_create_patients_table', 1),
(23, '2021_06_03_185902_create_patient_translations_table', 1),
(24, '2021_06_04_171443_create_invoices_table', 1),
(25, '2021_06_07_205708_create_single_invoices_table', 1),
(26, '2021_06_08_133936_create_receipt_accounts_table', 1),
(27, '2021_06_08_212639_create_group_invoices_table', 1),
(28, '2021_06_09_153919_create_payment_accounts_table', 1),
(29, '2021_06_11_155640_create_patient_accounts_table', 1),
(30, '2021_06_12_155445_create_fund_accounts_table', 1),
(31, '2021_08_16_193543_create_diagnostics_table', 1),
(32, '2021_08_17_185853_create_ray_employees_table', 1),
(33, '2021_11_24_200434_create_rays_table', 1),
(34, '2022_02_23_184545_create_laboratories_employees_table', 1),
(35, '2022_02_24_220713_create_laboratories_table', 1),
(36, '2022_04_16_131346_create_notifications_table', 1),
(37, '2022_08_29_171923_create_conversations_table', 1),
(38, '2022_08_29_171947_create_messages_table', 1),
(39, '2024_12_01_051625_create_admins_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reader_status` tinyint(1) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Date_Birth` date NOT NULL,
  `Phone` varchar(255) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `Blood_Group` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `email`, `password`, `Date_Birth`, `Phone`, `Gender`, `Blood_Group`, `created_at`, `updated_at`) VALUES
(6, 'Ahmed@gmail.com', '$2y$10$lVV2v6eubrGGmmXGCDfSKurir18HELsbp7NfYr3imsp0rCwEN8/3G', '2024-12-01', '0123654789', '1', 'O+', '2024-12-20 16:01:53', '2024-12-20 16:01:53'),
(7, 'sayed@gmail.com', '$2y$10$DVKwNeb5KWe3K8Lo1FaRUeDpHiAOsTuiUA8Od.mF6Xv1loU0RoFCW', '2024-12-01', '010236789', '1', 'O+', '2024-12-20 16:09:04', '2024-12-20 16:09:04'),
(8, 'SayedRagab@gmail.com', '$2y$10$fQaz9s6ja2cLW18dNq7NDOqmH7CCIcgIeIn7Vv/KX8ZFPBljCOTAa', '2024-12-01', '23654789', '1', 'O+', '2024-12-20 16:21:09', '2024-12-20 16:21:09');

-- --------------------------------------------------------

--
-- Table structure for table `patient_accounts`
--

CREATE TABLE `patient_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` bigint(20) UNSIGNED DEFAULT NULL,
  `receipt_id` bigint(20) UNSIGNED DEFAULT NULL,
  `Payment_id` bigint(20) UNSIGNED DEFAULT NULL,
  `Debit` decimal(8,2) DEFAULT NULL,
  `credit` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient_translations`
--

CREATE TABLE `patient_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_translations`
--

INSERT INTO `patient_translations` (`id`, `locale`, `name`, `Address`, `patient_id`) VALUES
(6, 'ar', 'احمد السيد', 'المنصوره', 6),
(7, 'ar', 'sayed', 'egypty', 7),
(8, 'ar', 'SayedRagab', 'المنصوره', 8);

-- --------------------------------------------------------

--
-- Table structure for table `payment_accounts`
--

CREATE TABLE `payment_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(8,2) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rays`
--

CREATE TABLE `rays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` longtext NOT NULL,
  `invoice_id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED DEFAULT NULL,
  `description_employee` longtext DEFAULT NULL,
  `case` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ray_employees`
--

CREATE TABLE `ray_employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ray_employees`
--

INSERT INTO `ray_employees` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'محمد السيد', 'm@yahoo.com', NULL, '$2y$10$ZKTQCawL49vYK4JXLmuO6.hnJQZcvzgNAXN9Wx8MRZXW6KzgJM03i', NULL, '2024-12-20 12:21:06', '2024-12-20 12:21:06');

-- --------------------------------------------------------

--
-- Table structure for table `receipt_accounts`
--

CREATE TABLE `receipt_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(8,2) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `created_at`, `updated_at`) VALUES
(1, '2024-12-20 12:21:05', '2024-12-20 12:21:05'),
(2, '2024-12-20 12:21:05', '2024-12-20 12:21:05'),
(3, '2024-12-20 12:21:05', '2024-12-20 12:21:05'),
(4, '2024-12-20 12:21:05', '2024-12-20 12:21:05'),
(5, '2024-12-20 12:21:05', '2024-12-20 12:21:05'),
(6, '2024-12-20 12:21:05', '2024-12-20 12:21:05'),
(7, '2024-12-20 12:21:05', '2024-12-20 12:21:05');

-- --------------------------------------------------------

--
-- Table structure for table `section_translations`
--

CREATE TABLE `section_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `section_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `section_translations`
--

INSERT INTO `section_translations` (`id`, `locale`, `section_id`, `name`) VALUES
(1, 'ar', 1, 'قسم المخ والاعصاب'),
(2, 'ar', 2, 'قسم الجراحه'),
(3, 'ar', 3, 'قسم العظام'),
(4, 'ar', 4, 'قسم الاسنان'),
(5, 'ar', 5, 'قسم الرمد'),
(6, 'ar', 6, 'قسم القلب والاوعيه الدمويه'),
(7, 'ar', 7, 'قسم الانف والاذن والحنجره');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `price`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 500.00, NULL, 1, '2024-12-20 12:21:06', '2024-12-20 12:21:06');

-- --------------------------------------------------------

--
-- Table structure for table `service_group`
--

CREATE TABLE `service_group` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Group_id` bigint(20) UNSIGNED NOT NULL,
  `Service_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service_translations`
--

CREATE TABLE `service_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `Service_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_translations`
--

INSERT INTO `service_translations` (`id`, `locale`, `name`, `Service_id`) VALUES
(1, 'ar', 'كشف', 1);

-- --------------------------------------------------------

--
-- Table structure for table `single_invoices`
--

CREATE TABLE `single_invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_date` date NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `section_id` bigint(20) UNSIGNED NOT NULL,
  `Service_id` bigint(20) UNSIGNED NOT NULL,
  `price` double(8,2) NOT NULL DEFAULT 0.00,
  `discount_value` double(8,2) NOT NULL DEFAULT 0.00,
  `tax_rate` varchar(255) NOT NULL,
  `tax_value` varchar(255) NOT NULL,
  `total_with_tax` double(8,2) NOT NULL DEFAULT 0.00,
  `type` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'user', 'user@gmail.com', NULL, '$2y$10$Sp5Fvkdl5bGbYdyoh.OoAeLGswudRKJuEFSc8A6WOED5vD0vFyI7W', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `ambulances`
--
ALTER TABLE `ambulances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ambulance_translations`
--
ALTER TABLE `ambulance_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ambulance_translations_ambulance_id_locale_driver_name_unique` (`ambulance_id`,`locale`,`driver_name`),
  ADD KEY `ambulance_translations_locale_index` (`locale`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointments_doctor_id_foreign` (`doctor_id`),
  ADD KEY `appointments_section_id_foreign` (`section_id`);

--
-- Indexes for table `appointment_doctor`
--
ALTER TABLE `appointment_doctor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointment_doctor_doctor_id_foreign` (`doctor_id`),
  ADD KEY `appointment_doctor_appointment_id_foreign` (`appointment_id`);

--
-- Indexes for table `appointment_translations`
--
ALTER TABLE `appointment_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `appointment_translations_appointment_id_locale_unique` (`appointment_id`,`locale`),
  ADD KEY `appointment_translations_locale_index` (`locale`);

--
-- Indexes for table `conversations`
--
ALTER TABLE `conversations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diagnostics`
--
ALTER TABLE `diagnostics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `diagnostics_invoice_id_foreign` (`invoice_id`),
  ADD KEY `diagnostics_patient_id_foreign` (`patient_id`),
  ADD KEY `diagnostics_doctor_id_foreign` (`doctor_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `doctors_email_unique` (`email`),
  ADD KEY `doctors_section_id_foreign` (`section_id`);

--
-- Indexes for table `doctor_translations`
--
ALTER TABLE `doctor_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `doctor_translations_doctor_id_locale_unique` (`doctor_id`,`locale`),
  ADD KEY `doctor_translations_locale_index` (`locale`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fund_accounts`
--
ALTER TABLE `fund_accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fund_accounts_invoice_id_foreign` (`invoice_id`),
  ADD KEY `fund_accounts_receipt_id_foreign` (`receipt_id`),
  ADD KEY `fund_accounts_payment_id_foreign` (`Payment_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_invoices`
--
ALTER TABLE `group_invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_invoices_patient_id_foreign` (`patient_id`),
  ADD KEY `group_invoices_doctor_id_foreign` (`doctor_id`),
  ADD KEY `group_invoices_section_id_foreign` (`section_id`),
  ADD KEY `group_invoices_group_id_foreign` (`Group_id`);

--
-- Indexes for table `group_translations`
--
ALTER TABLE `group_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `group_translations_group_id_locale_name_unique` (`Group_id`,`locale`,`name`),
  ADD KEY `group_translations_locale_index` (`locale`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `insurances`
--
ALTER TABLE `insurances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `insurance_translations`
--
ALTER TABLE `insurance_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `insurance_translations_insurance_id_locale_name_unique` (`insurance_id`,`locale`,`name`),
  ADD KEY `insurance_translations_locale_index` (`locale`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoices_patient_id_foreign` (`patient_id`),
  ADD KEY `invoices_doctor_id_foreign` (`doctor_id`),
  ADD KEY `invoices_section_id_foreign` (`section_id`),
  ADD KEY `invoices_group_id_foreign` (`Group_id`),
  ADD KEY `invoices_service_id_foreign` (`Service_id`);

--
-- Indexes for table `laboratories`
--
ALTER TABLE `laboratories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `laboratories_invoice_id_foreign` (`invoice_id`),
  ADD KEY `laboratories_patient_id_foreign` (`patient_id`),
  ADD KEY `laboratories_doctor_id_foreign` (`doctor_id`),
  ADD KEY `laboratories_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `laboratories_employees`
--
ALTER TABLE `laboratories_employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `laboratories_employees_email_unique` (`email`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_conversation_id_foreign` (`conversation_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `patients_email_unique` (`email`),
  ADD UNIQUE KEY `patients_phone_unique` (`Phone`);

--
-- Indexes for table `patient_accounts`
--
ALTER TABLE `patient_accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_accounts_patient_id_foreign` (`patient_id`),
  ADD KEY `patient_accounts_invoice_id_foreign` (`invoice_id`),
  ADD KEY `patient_accounts_receipt_id_foreign` (`receipt_id`),
  ADD KEY `patient_accounts_payment_id_foreign` (`Payment_id`);

--
-- Indexes for table `patient_translations`
--
ALTER TABLE `patient_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `patient_translations_patient_id_locale_unique` (`patient_id`,`locale`),
  ADD KEY `patient_translations_locale_index` (`locale`);

--
-- Indexes for table `payment_accounts`
--
ALTER TABLE `payment_accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_accounts_patient_id_foreign` (`patient_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `rays`
--
ALTER TABLE `rays`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rays_invoice_id_foreign` (`invoice_id`),
  ADD KEY `rays_patient_id_foreign` (`patient_id`),
  ADD KEY `rays_doctor_id_foreign` (`doctor_id`),
  ADD KEY `rays_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `ray_employees`
--
ALTER TABLE `ray_employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ray_employees_email_unique` (`email`);

--
-- Indexes for table `receipt_accounts`
--
ALTER TABLE `receipt_accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `receipt_accounts_patient_id_foreign` (`patient_id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section_translations`
--
ALTER TABLE `section_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `section_translations_section_id_locale_unique` (`section_id`,`locale`),
  ADD KEY `section_translations_locale_index` (`locale`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_group`
--
ALTER TABLE `service_group`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_group_group_id_foreign` (`Group_id`),
  ADD KEY `service_group_service_id_foreign` (`Service_id`);

--
-- Indexes for table `service_translations`
--
ALTER TABLE `service_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `service_translations_service_id_locale_name_unique` (`Service_id`,`locale`,`name`),
  ADD KEY `service_translations_locale_index` (`locale`);

--
-- Indexes for table `single_invoices`
--
ALTER TABLE `single_invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `single_invoices_patient_id_foreign` (`patient_id`),
  ADD KEY `single_invoices_doctor_id_foreign` (`doctor_id`),
  ADD KEY `single_invoices_section_id_foreign` (`section_id`),
  ADD KEY `single_invoices_service_id_foreign` (`Service_id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ambulances`
--
ALTER TABLE `ambulances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ambulance_translations`
--
ALTER TABLE `ambulance_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `appointment_doctor`
--
ALTER TABLE `appointment_doctor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `appointment_translations`
--
ALTER TABLE `appointment_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `conversations`
--
ALTER TABLE `conversations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `diagnostics`
--
ALTER TABLE `diagnostics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `doctor_translations`
--
ALTER TABLE `doctor_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fund_accounts`
--
ALTER TABLE `fund_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `group_invoices`
--
ALTER TABLE `group_invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `group_translations`
--
ALTER TABLE `group_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `insurances`
--
ALTER TABLE `insurances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `insurance_translations`
--
ALTER TABLE `insurance_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laboratories`
--
ALTER TABLE `laboratories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laboratories_employees`
--
ALTER TABLE `laboratories_employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `patient_accounts`
--
ALTER TABLE `patient_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient_translations`
--
ALTER TABLE `patient_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payment_accounts`
--
ALTER TABLE `payment_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rays`
--
ALTER TABLE `rays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ray_employees`
--
ALTER TABLE `ray_employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `receipt_accounts`
--
ALTER TABLE `receipt_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `section_translations`
--
ALTER TABLE `section_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `service_group`
--
ALTER TABLE `service_group`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_translations`
--
ALTER TABLE `service_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `single_invoices`
--
ALTER TABLE `single_invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ambulance_translations`
--
ALTER TABLE `ambulance_translations`
  ADD CONSTRAINT `ambulance_translations_ambulance_id_foreign` FOREIGN KEY (`ambulance_id`) REFERENCES `ambulances` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointments_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `appointment_doctor`
--
ALTER TABLE `appointment_doctor`
  ADD CONSTRAINT `appointment_doctor_appointment_id_foreign` FOREIGN KEY (`appointment_id`) REFERENCES `appointments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointment_doctor_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `appointment_translations`
--
ALTER TABLE `appointment_translations`
  ADD CONSTRAINT `appointment_translations_appointment_id_foreign` FOREIGN KEY (`appointment_id`) REFERENCES `appointments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `diagnostics`
--
ALTER TABLE `diagnostics`
  ADD CONSTRAINT `diagnostics_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `diagnostics_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `diagnostics_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `doctor_translations`
--
ALTER TABLE `doctor_translations`
  ADD CONSTRAINT `doctor_translations_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fund_accounts`
--
ALTER TABLE `fund_accounts`
  ADD CONSTRAINT `fund_accounts_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fund_accounts_payment_id_foreign` FOREIGN KEY (`Payment_id`) REFERENCES `payment_accounts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fund_accounts_receipt_id_foreign` FOREIGN KEY (`receipt_id`) REFERENCES `receipt_accounts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `group_invoices`
--
ALTER TABLE `group_invoices`
  ADD CONSTRAINT `group_invoices_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `group_invoices_group_id_foreign` FOREIGN KEY (`Group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `group_invoices_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `group_invoices_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `group_translations`
--
ALTER TABLE `group_translations`
  ADD CONSTRAINT `group_translations_group_id_foreign` FOREIGN KEY (`Group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `insurance_translations`
--
ALTER TABLE `insurance_translations`
  ADD CONSTRAINT `insurance_translations_insurance_id_foreign` FOREIGN KEY (`insurance_id`) REFERENCES `insurances` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `invoices_group_id_foreign` FOREIGN KEY (`Group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `invoices_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `invoices_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `invoices_service_id_foreign` FOREIGN KEY (`Service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `laboratories`
--
ALTER TABLE `laboratories`
  ADD CONSTRAINT `laboratories_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `laboratories_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `laboratories_employees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `laboratories_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `laboratories_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_conversation_id_foreign` FOREIGN KEY (`conversation_id`) REFERENCES `conversations` (`id`);

--
-- Constraints for table `patient_accounts`
--
ALTER TABLE `patient_accounts`
  ADD CONSTRAINT `patient_accounts_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `patient_accounts_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `patient_accounts_payment_id_foreign` FOREIGN KEY (`Payment_id`) REFERENCES `payment_accounts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `patient_accounts_receipt_id_foreign` FOREIGN KEY (`receipt_id`) REFERENCES `receipt_accounts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `patient_translations`
--
ALTER TABLE `patient_translations`
  ADD CONSTRAINT `patient_translations_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payment_accounts`
--
ALTER TABLE `payment_accounts`
  ADD CONSTRAINT `payment_accounts_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rays`
--
ALTER TABLE `rays`
  ADD CONSTRAINT `rays_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rays_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `ray_employees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rays_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rays_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `receipt_accounts`
--
ALTER TABLE `receipt_accounts`
  ADD CONSTRAINT `receipt_accounts_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `section_translations`
--
ALTER TABLE `section_translations`
  ADD CONSTRAINT `section_translations_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `service_group`
--
ALTER TABLE `service_group`
  ADD CONSTRAINT `service_group_group_id_foreign` FOREIGN KEY (`Group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `service_group_service_id_foreign` FOREIGN KEY (`Service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `service_translations`
--
ALTER TABLE `service_translations`
  ADD CONSTRAINT `service_translations_service_id_foreign` FOREIGN KEY (`Service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `single_invoices`
--
ALTER TABLE `single_invoices`
  ADD CONSTRAINT `single_invoices_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `single_invoices_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `single_invoices_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `single_invoices_service_id_foreign` FOREIGN KEY (`Service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
