-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 18, 2019 at 06:25 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `voting.ttuitsu.com`
--

-- --------------------------------------------------------

--
-- Table structure for table `cast_votings`
--

CREATE TABLE `cast_votings` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `added_by`, `created_at`, `updated_at`) VALUES
(1, 'Computer Science', 'Israel Nkum', '2018-12-25 14:07:06', '2019-01-22 09:33:29'),
(2, 'Hospitality', 'Israel Nkum', '2018-12-27 12:15:53', '2018-12-27 12:15:53'),
(3, 'Takoradi Technical Uni.', 'Israel Nkum', '2018-12-27 12:16:20', '2019-03-13 07:01:35'),
(4, 'UCC', 'Israel Nkum', '2019-03-09 17:16:05', '2019-03-09 17:16:05'),
(5, 'Applied Arts', 'Israel Nkum', '2019-03-18 09:37:10', '2019-03-18 09:37:10'),
(6, 'K Poly', 'Israel Nkum', '2019-03-18 09:57:01', '2019-03-18 09:57:01');

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` int(11) NOT NULL,
  `added_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `name`, `department_id`, `added_by`, `created_at`, `updated_at`) VALUES
(1, 'HND LEVEL 100', 1, 'Tracy Success', '2019-03-15 19:38:54', '2019-03-15 19:38:54'),
(2, 'HND LEVEL 200', 1, 'Tracy Success', '2019-03-15 20:55:46', '2019-03-15 21:43:15'),
(3, 'HND LEVEL 300', 1, 'Tracy Success', '2019-03-15 20:56:04', '2019-03-15 20:56:04'),
(4, 'LEVEL 100', 5, 'Israel Nkum', '2019-03-18 09:53:34', '2019-03-18 09:53:34'),
(5, 'LEVEL 200', 5, 'YM', '2019-03-18 09:54:18', '2019-03-18 09:54:18');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(5, '2018_12_01_234347_create_nominees_table', 1),
(6, '2018_12_01_234447_create_cast_votings_table', 1),
(9, '2018_12_05_203726_create_departments_table', 1),
(11, '2018_12_01_234218_create_votings_table', 1),
(14, '2018_12_01_234552_create_results_table', 2),
(18, '2019_01_07_193108_create_nominee_tokens_table', 3),
(22, '2014_10_12_000000_create_users_table', 4),
(23, '2018_12_01_234320_create_positions_table', 5),
(24, '2018_12_04_120825_create_levels_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `nominees`
--

CREATE TABLE `nominees` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `other_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home_town` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `index_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cgpa` decimal(8,2) NOT NULL,
  `voting_id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `position_held` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `candidate` int(11) NOT NULL DEFAULT '0',
  `position_number` int(11) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '''''',
  `added_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `nominees`
--

INSERT INTO `nominees` (`id`, `first_name`, `last_name`, `other_name`, `date_of_birth`, `home_town`, `region`, `home_address`, `telephone`, `email`, `level_id`, `department_id`, `index_number`, `cgpa`, `voting_id`, `position_id`, `position_held`, `candidate`, `position_number`, `image`, `added_by`, `created_at`, `updated_at`) VALUES
(1, 'Desmond', 'Nyamador', NULL, '1994-04-11', 'Akatsi', 'Volta', 'A589/15', '0550639191', 'lvarrattidesmond1@gmail.com', 1, 1, '07162786', '3.42', 1, 4, 'Secretary', 1, 1, '07162786.jpeg', '07162786', '2019-02-05 03:15:27', '2019-02-22 11:01:52'),
(2, 'Stephen', 'Ephraim', 'Assefuah', '1997-12-03', 'Tarkwa', 'Western', 'KW 22A', '0553997876', 'sephraim2020@gmail.com', 1, 1, '07162765', '3.08', 1, 3, 'None', 1, 5, '07162765.jpg', '07162765', '2019-02-05 06:00:29', '2019-02-22 11:01:29'),
(3, 'Israel', 'Nkum', 'Appiah', '1996-07-25', 'Tarkwa', 'Western', 'Box 25, Tarkwa', '0249051415', 'israelnkum1@gmail.com', 1, 1, '07162734', '4.53', 1, 1, 'Vice President', 1, 2, '07162734.jpg', '07162734', '2019-02-05 18:04:48', '2019-02-22 11:01:48'),
(4, 'Joel', 'Nkum', 'Appiah', '1996-25-07', 'home_town', 'region', 'home_address', 'telephone', 'email', 1, 1, '07162666', '3.14', 1, 1, 'President', 1, 1, '07162666.jpg', '07162666', NULL, '2019-02-22 15:01:19');

-- --------------------------------------------------------

--
-- Table structure for table `nominee_tokens`
--

CREATE TABLE `nominee_tokens` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` int(11) NOT NULL,
  `voting_id` int(11) NOT NULL,
  `token_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `generated_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `done` int(11) NOT NULL DEFAULT '0',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(199) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nominee_tokens`
--

INSERT INTO `nominee_tokens` (`id`, `name`, `username`, `department_id`, `voting_id`, `token_number`, `generated_by`, `done`, `password`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, '07162766', '07162766', 1, 1, '9ACLGIJQ', 'Israel Nkum', 0, '$2y$10$Zmci1JxUOfWx3i.gRICvCeO/D26VvuM5IV9LGB8NIuZdA9F7J3HSq', '2019-02-05 02:37:49', '2019-02-05 02:37:49', NULL),
(2, '07162812', '07162812', 1, 1, 'Y8KOKC0E', 'Israel Nkum', 0, '$2y$10$U4Z0XZ.Pqa9vp0tBqEw.5e3SBYWUm6QP5YJsiKZLO1DfYqIn9l3/K', '2019-02-05 02:39:55', '2019-02-05 02:39:55', NULL),
(3, '07162786', '07162786', 1, 1, 'XVE7ND1G', 'Israel Nkum', 0, '$2y$10$w6.aohfWjP6rSKrl9RYkaOecaiezAyk24VmIY0N.XTIXgcpCnFGyy', '2019-02-05 02:41:26', '2019-02-05 03:15:27', 'SDBXjhrUe9vAeGZL1CqAUZAqPgTCrMGAfXwCFaK3AAW38ZfYMxoVxgRZDnXd'),
(4, '07162810', '07162810', 1, 1, '41UO6Z2C', 'Israel Nkum', 0, '$2y$10$vWgKY/vljR5tyed5EBN0a.Ay9JraK18Y1d/0.4Cv66HYk3jZKEuy6', '2019-02-05 02:42:05', '2019-02-05 02:42:05', NULL),
(5, '07170609', '07170609', 1, 1, '1DR9X00H', 'Israel Nkum', 0, '$2y$10$T9OxaKCoVJho.b/D0XIvYeQEX1u4/vDOMszEt/foOIGvoJpEuz3x6', '2019-02-05 02:43:09', '2019-02-05 02:43:09', NULL),
(6, '07162765', '07162765', 1, 1, '8T170UQX', 'Israel Nkum', 1, '$2y$10$oo1Y2336bCWqroCpsP3R2.m2mRTqiwNIoDLWzXv47EAZoxvQ.sKky', '2019-02-05 02:46:50', '2019-02-05 06:00:29', 'U4CZVwdqvvBNbylXMpjNHnbhXTGcqljaKpjT6ltbAGwPSO81s7yuTmzKnnLs'),
(7, '07162734', '07162734', 1, 1, 'N7HZGL4Y', 'Israel Nkum', 1, '$2y$10$Wc1bxiOiwbN3pKGU6vIJFe4.htFx6bqmGvmBvxIx5dKu.7phWvyyy', '2019-02-05 03:19:35', '2019-02-05 18:04:48', NULL),
(8, '07162737', '07162737', 1, 1, 'LENBZRDC', 'Israel Nkum', 0, '$2y$10$ckE2lsSNuxjv/zJirVAlw.WcmyIjB9QGu.thrH.UQwhv.WZhv54RC', '2019-02-05 18:12:28', '2019-02-05 18:12:28', NULL),
(9, '0718000601', '0718000601', 1, 1, 'G3AIU80W', 'Israel Nkum', 0, '$2y$10$kMUJFHe888aSdbxIi09qxOZ5Tb0skxMtrIauJAPFgYrLLEfZosz0y', '2019-02-05 18:14:20', '2019-02-05 18:14:20', NULL),
(10, '04652364', '04652364', 2, 2, '35XQ09M9', 'Tracy Sarah', 0, '$2y$10$EEal19im3notbF3OnTTqs.f2sWwfSdHkzqHQz2t7BXDg9Gpd92.0e', '2019-03-12 11:07:02', '2019-03-12 11:07:02', NULL),
(11, '071662235', '071662235', 5, 5, '9T79G83R', 'YM', 0, '$2y$10$mBVm4AZCm5u0rRATe53CdOpBkfqZvDZNI9dBWsoQRzOzdh1qJu2wK', '2019-03-18 10:04:42', '2019-03-18 10:04:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` int(10) UNSIGNED NOT NULL,
  `position_number` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `position_number`, `department_id`, `name`, `added_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'President', 'Tracy Success', '2019-03-15 19:34:48', '2019-03-15 19:34:48'),
(2, 2, 1, 'Vice President', 'Israel Nkum', '2019-03-15 20:04:05', '2019-03-15 20:04:05'),
(3, 3, 1, 'Secreatry', 'Tracy Success', '2019-03-15 20:04:25', '2019-03-15 20:04:25'),
(4, 4, 1, 'Treasure', 'Tracy Success', '2019-03-15 20:04:31', '2019-03-15 20:04:31'),
(5, 5, 1, 'Organizer', 'Tracy Success', '2019-03-15 20:04:46', '2019-03-15 20:04:46'),
(6, 6, 1, 'Ass. Organizer', 'Tracy Success', '2019-03-15 20:05:17', '2019-03-15 20:05:17'),
(7, 7, 1, 'Interest and Innovations Cord.', 'Tracy Success', '2019-03-15 20:05:30', '2019-03-15 20:05:30'),
(8, 8, 5, 'President 1', 'YM', '2019-03-18 10:13:33', '2019-03-18 10:13:33');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(10) UNSIGNED NOT NULL,
  `voting_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `nominee_id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `vote_count` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `voting_id`, `department_id`, `nominee_id`, `position_id`, `vote_count`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, 13, 61, '2019-02-22 11:01:29', '2019-03-17 19:41:45'),
(2, 1, 1, 3, 10, 4, '2019-02-22 11:01:48', '2019-03-17 13:26:57'),
(3, 1, 1, 1, 9, 63, '2019-02-22 11:01:52', '2019-03-17 19:41:45'),
(4, 1, 1, 4, 9, 63, '2019-02-22 15:01:19', '2019-03-17 19:41:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `department_id` int(11) NOT NULL,
  `voting_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_id` int(11) DEFAULT NULL,
  `gender` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated` int(11) NOT NULL DEFAULT '0',
  `voted` int(11) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `department_id`, `voting_id`, `level_id`, `gender`, `name`, `username`, `email`, `password`, `role`, `updated`, `voted`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, '1', NULL, 'MALE', 'Israel Nkum', 'israelnkum', 'israelnkum@gmail.com', '$2y$10$3X5iSUsCmWWyKaMCLwh8Oua57/iEyUG7h31ZvtW0QiJBb6kmNbl0W', 'Super Admin', 1, 0, 'PgRNLkGC8Oo8mVwRL2nTxpIgE941efy0FoeCvYtlvcF7nP10qoWYIEt3NszV', '2019-03-15 16:46:17', '2019-03-15 16:47:57'),
(2, 1, '1', NULL, NULL, 'Tracy Success', NULL, 'tracys@gmail.com', '$2y$10$knsbeLilzS5imHWdhYYfnOodXQD/93HDh/Xo2plE9PNtty78.Acd2', 'Admin', 1, 0, '3p5hwdjpdDrC7PcwmdzZX9MYGarFs147zKH61OuSwVH42fwwi9D54elZZ3hz', '2019-03-15 16:51:10', '2019-03-15 18:36:20'),
(608, 1, '1', 1, 'MALE', '0718000001', '0718000001', NULL, '$2y$10$/3xlNpUWv7upZStC4a/t/eIY6VDu7oRLsAtaVQUpUD2Q.vzf9nOlm', 'Voter', 0, 1, NULL, '2019-03-15 22:18:09', '2019-03-15 22:18:09'),
(609, 1, '1', 1, 'MALE', '0718000002', '0718000002', NULL, '$2y$10$3KdQzw3s5tXWbffvXK0Qce9lVAUCwphK2t2C2FP8NEwFKR8PxCjPO', 'Voter', 0, 1, NULL, '2019-03-15 22:18:09', '2019-03-15 22:18:09'),
(610, 1, '1', 1, 'MALE', '0718000003', '0718000003', NULL, '$2y$10$fn.V0Y11shv2vhA8NVRq.ekfu6dCGKQ9bAOIsdR.x12H.cIdCUDFa', 'Voter', 0, 1, NULL, '2019-03-15 22:18:09', '2019-03-15 22:18:09'),
(611, 1, '1', 1, 'MALE', '0718000004', '0718000004', NULL, '$2y$10$AGDMYmGgc9mq8xJi1kwBQuEeebjssH00q3nVIUbvqH8FD9lwvnMLO', 'Voter', 0, 1, NULL, '2019-03-15 22:18:09', '2019-03-15 22:18:09'),
(612, 1, '1', 1, 'MALE', '0718000005', '0718000005', NULL, '$2y$10$Kx/ui6QCIqe.6b7THuA5K.vssFiG2LA6LOu.PrQSZDY8.wYQKEiJe', 'Voter', 0, 1, NULL, '2019-03-15 22:18:09', '2019-03-15 22:18:09'),
(613, 1, '1', 1, 'MALE', '0718000006', '0718000006', NULL, '$2y$10$Q0AnUx5D5OgZrKs5PZNz0OZV9jpj3Z9Aoo15WMvoVX/U/bE5VzqUq', 'Voter', 0, 0, NULL, '2019-03-15 22:18:09', '2019-03-15 22:18:09'),
(614, 1, '1', 1, 'MALE', '0718000007', '0718000007', NULL, '$2y$10$iTZn4QQsPG8obo15jbV6yu0oSORkjA7JXCuYXoNuB2i8/RCTG/VQ.', 'Voter', 0, 0, NULL, '2019-03-15 22:18:09', '2019-03-15 22:18:09'),
(615, 1, '1', 1, 'MALE', '0718000008', '0718000008', NULL, '$2y$10$.CrL6cSfAY3kPGUq9Cs3x.yWvhXePyq3gx/e5v6pMJpMfjJA4mF7W', 'Voter', 0, 0, NULL, '2019-03-15 22:18:09', '2019-03-15 22:18:09'),
(616, 1, '1', 1, 'MALE', '0718000009', '0718000009', NULL, '$2y$10$ib9EdmWNAcpRn67ktLunsOVWYIpbpPxO7NyjOV2zO7dIEHcjsnMVK', 'Voter', 0, 0, NULL, '2019-03-15 22:18:09', '2019-03-15 22:18:09'),
(617, 1, '1', 1, 'MALE', '0718000010', '0718000010', NULL, '$2y$10$kqmZgbgNrm3SElPdKdlvYe1Zvthu7qNwtWAgrNxQUTt5Bm7fD2kYW', 'Voter', 0, 0, NULL, '2019-03-15 22:18:09', '2019-03-15 22:18:09'),
(618, 1, '1', 1, 'MALE', '0718000011', '0718000011', NULL, '$2y$10$8I9JHWOyC3RaXS7kC5ENHucOlDbsBvTRV7TfsjV7oWnYSY0iyRrpW', 'Voter', 0, 0, NULL, '2019-03-15 22:18:09', '2019-03-15 22:18:09'),
(619, 1, '1', 1, 'MALE', '0718000012', '0718000012', NULL, '$2y$10$fEb5LHQdIVd8YpKGiaqQUOuUvZbgfyoTA8xQVAIuSIcFM4zIT1TOG', 'Voter', 0, 0, NULL, '2019-03-15 22:18:09', '2019-03-15 22:18:09'),
(620, 1, '1', 1, 'MALE', '0718000013', '0718000013', NULL, '$2y$10$nLro61r4a.Wv6umMNeTgfu5WBnch8MAw3/LJLH5SI89w/71Xw1O3S', 'Voter', 0, 0, NULL, '2019-03-15 22:18:10', '2019-03-15 22:18:10'),
(621, 1, '1', 1, 'MALE', '0718000014', '0718000014', NULL, '$2y$10$nXyQ67CnnD.KKY88CQdWe.0HT19fERQv1HFPz9aKvfMOiXgc6cr.e', 'Voter', 0, 0, NULL, '2019-03-15 22:18:10', '2019-03-15 22:18:10'),
(622, 1, '1', 1, 'MALE', '0718000015', '0718000015', NULL, '$2y$10$5yHuL0tz3jf4Tnbxf5pl9O5Vy8uMrebeQUMw53./UApTL9jiefxKu', 'Voter', 0, 0, NULL, '2019-03-15 22:18:10', '2019-03-15 22:18:10'),
(623, 1, '1', 1, 'MALE', '0718000016', '0718000016', NULL, '$2y$10$XM2RWVcPIzML7kEfGVOZZOPgps8.gIlEYFn3dLyjkPYM329DYU5v6', 'Voter', 0, 0, NULL, '2019-03-15 22:18:10', '2019-03-15 22:18:10'),
(624, 1, '1', 1, 'MALE', '0718000017', '0718000017', NULL, '$2y$10$uRR.Esd8htQHjiH6REfjXe4ZLLqvLyO8Ser.MIVfYfr6voqEXyLVq', 'Voter', 0, 0, NULL, '2019-03-15 22:18:10', '2019-03-15 22:18:10'),
(625, 1, '1', 1, 'FEMALE', '0718000018', '0718000018', NULL, '$2y$10$Mmndm55Q4PvoPIw0YF7NJ.Otyw3r2AJ.eu6p3nP6.UTKQSOfh41sG', 'Voter', 0, 0, NULL, '2019-03-15 22:18:10', '2019-03-15 22:18:10'),
(626, 1, '1', 1, 'MALE', '0718000019', '0718000019', NULL, '$2y$10$2JLU.uPxBUKicpD7PJzYUO.yvpzFfHd4pRtvGnvd63PiRr9sTOKai', 'Voter', 0, 0, NULL, '2019-03-15 22:18:10', '2019-03-15 22:18:10'),
(627, 1, '1', 1, 'MALE', '0718000020', '0718000020', NULL, '$2y$10$IBl8M3fTdGv4q63O9S6EreuvkMAYVtwW1MA5xTR9pJsoFgzNjO0ni', 'Voter', 0, 0, NULL, '2019-03-15 22:18:10', '2019-03-15 22:18:10'),
(628, 1, '1', 1, 'FEMALE', '0718000021', '0718000021', NULL, '$2y$10$9zgoWucCPrgkDLmmS0nkQOhTiyanLLC8MdASRY4PV68zxsjrk3ZlW', 'Voter', 0, 0, NULL, '2019-03-15 22:18:10', '2019-03-15 22:18:10'),
(629, 1, '1', 1, 'MALE', '0718000022', '0718000022', NULL, '$2y$10$7Aajksb.p6jLfuzWzAb3OegbPKv0Lxz4zQ/HSf9h/TGwL8g6W4yge', 'Voter', 0, 0, NULL, '2019-03-15 22:18:10', '2019-03-15 22:18:10'),
(630, 1, '1', 1, 'MALE', '0718000023', '0718000023', NULL, '$2y$10$VROrZ6.LXwdVuJGpeXc2fecrBYD1Xt3LcIIpuThe9LY6VRY/41LFq', 'Voter', 0, 0, NULL, '2019-03-15 22:18:10', '2019-03-15 22:18:10'),
(631, 1, '1', 1, 'MALE', '0718000024', '0718000024', NULL, '$2y$10$Jq/bR5MPCYOkm4vUKiavOueHlLaONyKTForbpq4pr3yGt4cpBlG/C', 'Voter', 0, 0, NULL, '2019-03-15 22:18:10', '2019-03-15 22:18:10'),
(632, 1, '1', 1, 'MALE', '0718000025', '0718000025', NULL, '$2y$10$QJ9DqOl8wqgKGs1JxdCVF.Jc8gUSK37Ek2c3PhJh8VogAo3OUOLDm', 'Voter', 0, 0, NULL, '2019-03-15 22:18:10', '2019-03-15 22:18:10'),
(633, 1, '1', 1, 'MALE', '0718000026', '0718000026', NULL, '$2y$10$wr9IXRVHN2cHg2xft3c/W..Vt9fAHtKhPf0w6HXtpZAO6pjNMPc1.', 'Voter', 0, 0, NULL, '2019-03-15 22:18:10', '2019-03-15 22:18:10'),
(634, 1, '1', 1, 'MALE', '0718000027', '0718000027', NULL, '$2y$10$oQx8YIpNo3vtKHt/ZoWoiegFkCwL2Tu9rEsngj9CGjUz0yTclueDy', 'Voter', 0, 0, NULL, '2019-03-15 22:18:10', '2019-03-15 22:18:10'),
(635, 1, '1', 1, 'MALE', '0718000028', '0718000028', NULL, '$2y$10$MlCsN6Qt7InIJmIyoNeQL.61ja0cukbKpek6lE43YjNESar8V8ilO', 'Voter', 0, 0, NULL, '2019-03-15 22:18:10', '2019-03-15 22:18:10'),
(636, 1, '1', 1, 'MALE', '0718000029', '0718000029', NULL, '$2y$10$Rr8ytNIfgYNY1SD1u/CbeuX9n1ab1rExQGjHmQP90nMu1Z8fdugsq', 'Voter', 0, 0, NULL, '2019-03-15 22:18:10', '2019-03-15 22:18:10'),
(637, 1, '1', 1, 'MALE', '0718000030', '0718000030', NULL, '$2y$10$0BE/QJyKPQJqEkm8QK93ZeZqlcxvShDkmm5UU0qPAQHQqNUI.cRxy', 'Voter', 0, 0, NULL, '2019-03-15 22:18:11', '2019-03-15 22:18:11'),
(638, 1, '1', 1, 'MALE', '0718000031', '0718000031', NULL, '$2y$10$WYE/q4cVxlR3PxhT7k4PiON6RqvZuYlJWT2XeReq3HpxAig2lR95e', 'Voter', 0, 0, NULL, '2019-03-15 22:18:11', '2019-03-15 22:18:11'),
(639, 1, '1', 1, 'MALE', '0718000032', '0718000032', NULL, '$2y$10$asVVlOjb8QWn.hpaHrNKZusl/ljeGhrjXkCmOUfBMw40NDjND1bGe', 'Voter', 0, 0, NULL, '2019-03-15 22:18:11', '2019-03-15 22:18:11'),
(640, 1, '1', 1, 'MALE', '0718000033', '0718000033', NULL, '$2y$10$YUbS8WsIMZOY9Tkueik4g.Qvnq4TUaxejYBBOqlrRGnDcai50OjJO', 'Voter', 0, 0, NULL, '2019-03-15 22:18:11', '2019-03-15 22:18:11'),
(641, 1, '1', 1, 'MALE', '0718000034', '0718000034', NULL, '$2y$10$zEJXqjPzAl1FXseU0yR4DOsgMZ0mtOoszpxVe346gWMQ4EdXyvvki', 'Voter', 0, 0, NULL, '2019-03-15 22:18:11', '2019-03-15 22:18:11'),
(642, 1, '1', 1, 'MALE', '0718000035', '0718000035', NULL, '$2y$10$Hbs5wgooMsuRzCW/q1CJhejOE55l6a4vaFjujKZAjHfIxpj7Fw2pa', 'Voter', 0, 0, NULL, '2019-03-15 22:18:11', '2019-03-15 22:18:11'),
(643, 1, '1', 1, 'MALE', '0718000036', '0718000036', NULL, '$2y$10$QYhIuNBRNCzRAdBKrcta6.8wos3hM3HKjaI5DzKDbSehX3SxMndjG', 'Voter', 0, 0, NULL, '2019-03-15 22:18:11', '2019-03-15 22:18:11'),
(644, 1, '1', 1, 'MALE', '0718000037', '0718000037', NULL, '$2y$10$DNaLvju0XX4G.dzUdTnz2eXDw9lHfdVllwPrsXC1obujEKAVRh6C2', 'Voter', 0, 0, NULL, '2019-03-15 22:18:11', '2019-03-15 22:18:11'),
(645, 1, '1', 1, 'MALE', '0718000038', '0718000038', NULL, '$2y$10$r.tasy5g2hqiS1Axm4fLIOVEUenxh2QMJCT1QqDbQzvJmEY3HVcxy', 'Voter', 0, 0, NULL, '2019-03-15 22:18:11', '2019-03-15 22:18:11'),
(646, 1, '1', 1, 'MALE', '0718000039', '0718000039', NULL, '$2y$10$E0V2Hv28Csh4khsBC2glt.9su3y3Bbux6czi5Tx5CS0zzZlUHtZkW', 'Voter', 0, 0, NULL, '2019-03-15 22:18:11', '2019-03-15 22:18:11'),
(647, 1, '1', 1, 'MALE', '0718000040', '0718000040', NULL, '$2y$10$W/LuEAKY8IUNYf09PU4OU.Cvlvg6e/l1BaqKmCV5A5bOh8wHXeSBC', 'Voter', 0, 0, NULL, '2019-03-15 22:18:11', '2019-03-15 22:18:11'),
(648, 1, '1', 1, 'MALE', '0718000041', '0718000041', NULL, '$2y$10$VUQKrXTBgbBep.pD2G.l9upgwiZNrzW1SWnLN66cnHfl2dAg41iYS', 'Voter', 0, 0, NULL, '2019-03-15 22:18:11', '2019-03-15 22:18:11'),
(649, 1, '1', 1, 'FEMALE', '0718000042', '0718000042', NULL, '$2y$10$cSr1fmgL.AMj8F6m2btOfuZZeKUTeZrDEwNm/Yzg79kOkVA0VH2Im', 'Voter', 0, 0, NULL, '2019-03-15 22:18:11', '2019-03-15 22:18:11'),
(650, 1, '1', 1, 'MALE', '0718000043', '0718000043', NULL, '$2y$10$g30zcOndebof1fXZjp/zee5FvBsVMpP99igCMsCfjoQiwOfS5hvzO', 'Voter', 0, 0, NULL, '2019-03-15 22:18:11', '2019-03-15 22:18:11'),
(651, 1, '1', 1, 'MALE', '0718000044', '0718000044', NULL, '$2y$10$HTv.XmeZykqydwOzwPVm/e/YaGa7r6w890/EOpT75f9GGig0sbrjq', 'Voter', 0, 0, NULL, '2019-03-15 22:18:11', '2019-03-15 22:18:11'),
(652, 1, '1', 1, 'MALE', '0718000045', '0718000045', NULL, '$2y$10$8b.lNxUO6ZrhubTofASOB.by8ZUXDJceKJhOSFpGqkN.OK8oEu20a', 'Voter', 0, 0, NULL, '2019-03-15 22:18:11', '2019-03-15 22:18:11'),
(653, 1, '1', 1, 'MALE', '0718000046', '0718000046', NULL, '$2y$10$gKDWkvVAHGqE0kcyhLYXYeG0fvueWIAjDmXkdMjjpwes5YPW8CZAi', 'Voter', 0, 0, NULL, '2019-03-15 22:18:12', '2019-03-15 22:18:12'),
(654, 1, '1', 1, 'FEMALE', '0718000047', '0718000047', NULL, '$2y$10$nBIEmNdMV/nAk0Wr0TSO9OIOAHLJagDSdVjyvP9ZQvD13bEBxUnTO', 'Voter', 0, 0, NULL, '2019-03-15 22:18:12', '2019-03-15 22:18:12'),
(655, 1, '1', 1, 'MALE', '0718000048', '0718000048', NULL, '$2y$10$TNZWj1Ncb.EA9I6.980uJOlogGotOspXt.MsE8n87H2Wpjza..0aq', 'Voter', 0, 0, NULL, '2019-03-15 22:18:12', '2019-03-15 22:18:12'),
(656, 1, '1', 1, 'MALE', '0718000049', '0718000049', NULL, '$2y$10$2oCSPgu/0mPz3ToLaxWQSOYlEoY3XEUKceYnnIlMExN3HJXCZSuf2', 'Voter', 0, 0, NULL, '2019-03-15 22:18:12', '2019-03-15 22:18:12'),
(657, 1, '1', 1, 'MALE', '0718000050', '0718000050', NULL, '$2y$10$O1kCLpGZsX6DWjUafSwoQOA4j/6gnpTEwSMWB6zkTXffiGsCzjB.e', 'Voter', 0, 0, NULL, '2019-03-15 22:18:12', '2019-03-15 22:18:12'),
(658, 1, '1', 1, 'MALE', '0718000051', '0718000051', NULL, '$2y$10$X/RIPLZxQE1Ey5blPx5Kp.Y/2C2eQUzG/AfJfzcb4qEHOtz2Izjq6', 'Voter', 0, 0, NULL, '2019-03-15 22:18:12', '2019-03-15 22:18:12'),
(659, 1, '1', 1, 'MALE', '0718000053', '0718000053', NULL, '$2y$10$xxq4YQuKmhLN32YFjOxmmecrHEUvJGD/W6EdJlzWF7j6CN8tEVbRq', 'Voter', 0, 0, NULL, '2019-03-15 22:18:12', '2019-03-15 22:18:12'),
(660, 1, '1', 1, 'MALE', '0718000054', '0718000054', NULL, '$2y$10$03np2rAtkZgwRIzMd1UkrujpTxAesGOUb7OItFZzi8mYJgecJtxIW', 'Voter', 0, 0, NULL, '2019-03-15 22:18:12', '2019-03-15 22:18:12'),
(661, 1, '1', 1, 'MALE', '0718000055', '0718000055', NULL, '$2y$10$RJg6WPcEMxVBDVY0CZW6RuLvLdnR/ebuqp9Db/6G7BwYfogqUfgoK', 'Voter', 0, 0, NULL, '2019-03-15 22:18:12', '2019-03-15 22:18:12'),
(662, 1, '1', 1, 'MALE', '0718000056', '0718000056', NULL, '$2y$10$qnZXoTiIgHQQf1Kg8TdKu.s6olVOyjMOynZMcoNRQb6CS6659zyj.', 'Voter', 0, 0, NULL, '2019-03-15 22:18:12', '2019-03-15 22:18:12'),
(663, 1, '1', 1, 'MALE', '0718000057', '0718000057', NULL, '$2y$10$bf6KX73bMgBDcQyqrhpO5eIwWnQf/bXmYIdiL/ZKs37ScrhzC3Mdy', 'Voter', 0, 0, NULL, '2019-03-15 22:18:12', '2019-03-15 22:18:12'),
(664, 1, '1', 1, 'MALE', '0718000058', '0718000058', NULL, '$2y$10$fbTWD63TdeQowNIVJFbn3eKfWG.hZ8VsoSFPN58Al5nHR3Jcbf0GS', 'Voter', 0, 0, NULL, '2019-03-15 22:18:12', '2019-03-15 22:18:12'),
(665, 1, '1', 1, 'MALE', '0718000059', '0718000059', NULL, '$2y$10$TPk2EDNGkA.nqx8hV8hTVOqnLumMchhaCFQS59L0gMpleQ1OuJdl6', 'Voter', 0, 0, NULL, '2019-03-15 22:18:12', '2019-03-15 22:18:12'),
(666, 1, '1', 1, 'MALE', '0718000060', '0718000060', NULL, '$2y$10$x1AsljGUfW6MzgriPG7QZ.U6mxfqffZecVOdhjshNeITk1CWI7WQy', 'Voter', 0, 0, NULL, '2019-03-15 22:18:12', '2019-03-15 22:18:12'),
(667, 1, '1', 1, 'MALE', '0718000061', '0718000061', NULL, '$2y$10$8u2b2WTHxz/6YVoDxmcsdeuqkenMOY0enofDiFziAnrA.2LZEVEc2', 'Voter', 0, 0, NULL, '2019-03-15 22:18:12', '2019-03-15 22:18:12'),
(668, 1, '1', 1, 'MALE', '0718000062', '0718000062', NULL, '$2y$10$rskTWSXDANIcpyJ2xw8aRevdcQJ7y1DV5qD/7pawBuwXn2GyrVI.q', 'Voter', 0, 0, NULL, '2019-03-15 22:18:12', '2019-03-15 22:18:12'),
(669, 1, '1', 1, 'FEMALE', '0718000063', '0718000063', NULL, '$2y$10$RokYWuokButP2vYw78a.Z.ZNN9O9UwI/0bl4.XulbFwkRwen2bC5C', 'Voter', 0, 0, NULL, '2019-03-15 22:18:12', '2019-03-15 22:18:12'),
(670, 1, '1', 1, 'MALE', '0718000064', '0718000064', NULL, '$2y$10$8fKXaAXMUtMtLjvvgyUxdesAKeMGFn8OlgeI8ym5glYBna//c4h9.', 'Voter', 0, 0, NULL, '2019-03-15 22:18:13', '2019-03-15 22:18:13'),
(671, 1, '1', 1, 'MALE', '0718000065', '0718000065', NULL, '$2y$10$fiOEzWL9GDgnrRIDFWJqL.iIFLMbpibU6RYYPJJVtlUyI1TZaCR2q', 'Voter', 0, 0, NULL, '2019-03-15 22:18:13', '2019-03-15 22:18:13'),
(672, 1, '1', 1, 'MALE', '0718000066', '0718000066', NULL, '$2y$10$ml0d8BN2ixvnvPqgSBUqNuN/LTgcIr.syy8NM7MMvjVI7f9bPmK7G', 'Voter', 0, 0, NULL, '2019-03-15 22:18:13', '2019-03-15 22:18:13'),
(673, 1, '1', 1, 'FEMALE', '0718000067', '0718000067', NULL, '$2y$10$Awpgx.L84I0iAih96mFBiO6Yl6OaXIH/4TNiSAxyv6p6F1U5TrzfS', 'Voter', 0, 0, NULL, '2019-03-15 22:18:13', '2019-03-15 22:18:13'),
(674, 1, '1', 1, 'MALE', '0718000068', '0718000068', NULL, '$2y$10$jmobPtMvR0kCy82DtRHXFuQA4Ll1zt56Csxhd3IyHWwBCWRT3RgIW', 'Voter', 0, 0, NULL, '2019-03-15 22:18:13', '2019-03-15 22:18:13'),
(675, 1, '1', 1, 'FEMALE', '0718000069', '0718000069', NULL, '$2y$10$zkPGQhB9V7ZJecdMUIZ/oeLvC7omXU6HTOaV1QdDTGY2QlRl.XagW', 'Voter', 0, 0, NULL, '2019-03-15 22:18:13', '2019-03-15 22:18:13'),
(676, 1, '1', 1, 'MALE', '0718000070', '0718000070', NULL, '$2y$10$xpLH1tORU/qRrTgAaubWOuVaYaCkT6KfRNZCtM34R.ta4WDEqrB/G', 'Voter', 0, 0, NULL, '2019-03-15 22:18:13', '2019-03-15 22:18:13'),
(677, 1, '1', 1, 'MALE', '0718000071', '0718000071', NULL, '$2y$10$V6rfUbI/tpRGbjyE4A3yK.BjNZCyB23ArS4dc7QBEzbuDfVSKkMZy', 'Voter', 0, 0, NULL, '2019-03-15 22:18:13', '2019-03-15 22:18:13'),
(678, 1, '1', 1, 'MALE', '0718000072', '0718000072', NULL, '$2y$10$aWVsAw3hvCoiyKY3IluB9efCnvo/1iSPMgtPOMS1PkX2q5V42BrYy', 'Voter', 0, 0, NULL, '2019-03-15 22:18:13', '2019-03-15 22:18:13'),
(679, 1, '1', 1, 'MALE', '0718000073', '0718000073', NULL, '$2y$10$vWF.Nza9LRr8ycth8DIzVOxduwBR37DtjY/4JxatsbiaAGEe2Pxxm', 'Voter', 0, 0, NULL, '2019-03-15 22:18:13', '2019-03-15 22:18:13'),
(680, 1, '1', 1, 'MALE', '0718000074', '0718000074', NULL, '$2y$10$wwurqLGsg7G10tf.gk47x.N/9e/CvlRrTESc2k4SAG7d3p22PZ456', 'Voter', 0, 0, NULL, '2019-03-15 22:18:13', '2019-03-15 22:18:13'),
(681, 1, '1', 1, 'FEMALE', '0718000075', '0718000075', NULL, '$2y$10$k5EdGhPvDgNjt0/EqoY4.eI00.OwcIA/duSkx7s2W2WOAbFqIjEtm', 'Voter', 0, 0, NULL, '2019-03-15 22:18:13', '2019-03-15 22:18:13'),
(682, 1, '1', 1, 'MALE', '0718000076', '0718000076', NULL, '$2y$10$lg69KXMQmDd.DAHPTwbOquB8p9HRgb6tVda0aj6uQ37O8saVCfJ56', 'Voter', 0, 0, NULL, '2019-03-15 22:18:13', '2019-03-15 22:18:13'),
(683, 1, '1', 1, 'MALE', '0718000077', '0718000077', NULL, '$2y$10$Sxiion0/BnVDTxICkzvyAegCQDOk9cw6fyVLPMtOjkEAa3eNVyhxq', 'Voter', 0, 0, NULL, '2019-03-15 22:18:13', '2019-03-15 22:18:13'),
(684, 1, '1', 1, 'FEMALE', '0718000078', '0718000078', NULL, '$2y$10$2vUIhttuNpx31gFTwp4wzuOKXxm63wDq6p4WDcPUhl72ImrSYTJ0m', 'Voter', 0, 0, NULL, '2019-03-15 22:18:13', '2019-03-15 22:18:13'),
(685, 1, '1', 1, 'MALE', '0718000079', '0718000079', NULL, '$2y$10$9/4xY/LXbzvVvTLMXx0.3.UzLPlwHespcAUxNG3gO.dFTRe6B./uy', 'Voter', 0, 0, NULL, '2019-03-15 22:18:13', '2019-03-15 22:18:13'),
(686, 1, '1', 1, 'MALE', '0718000080', '0718000080', NULL, '$2y$10$F9GSzlw.mXIcJR27d4eB3.9HaB10eTWSNGDaWa.Vabu4AWikKEy02', 'Voter', 0, 0, NULL, '2019-03-15 22:18:13', '2019-03-15 22:18:13'),
(687, 1, '1', 1, 'MALE', '0718000081', '0718000081', NULL, '$2y$10$qWqrJLdmbD92JpTpMInXSOzJnzI/29XVpPPWbpXLnyhyCOmbrT59K', 'Voter', 0, 0, NULL, '2019-03-15 22:18:14', '2019-03-15 22:18:14'),
(688, 1, '1', 1, 'MALE', '0718000082', '0718000082', NULL, '$2y$10$HR8Bdf0kvN/tRiMpVjDox.8Wbr2ZGO6tdsZ7Vf.hsrHOLosyHB/7y', 'Voter', 0, 0, NULL, '2019-03-15 22:18:14', '2019-03-15 22:18:14'),
(689, 1, '1', 1, 'MALE', '0718000083', '0718000083', NULL, '$2y$10$HnIMB.coiAz6f.95k9koeudlOL7uVMVdz/9GFYTnrw0VHxJSPDpMC', 'Voter', 0, 0, NULL, '2019-03-15 22:18:14', '2019-03-15 22:18:14'),
(690, 1, '1', 1, 'MALE', '0718000084', '0718000084', NULL, '$2y$10$cDkK7fIjbx4JxkTtv4vP6OJPsqOaICSvtJhhNY9mmQhdsP3QBidtG', 'Voter', 0, 0, NULL, '2019-03-15 22:18:14', '2019-03-15 22:18:14'),
(691, 1, '1', 1, 'MALE', '0718000085', '0718000085', NULL, '$2y$10$3Kfrq.dKbPxJnsMS5NAlRuGhXPzEW5v4HqWFCQOPSTAbmFkz95gdO', 'Voter', 0, 0, NULL, '2019-03-15 22:18:14', '2019-03-15 22:18:14'),
(692, 1, '1', 1, 'MALE', '0718000086', '0718000086', NULL, '$2y$10$SaVTakyccJ.lnL58U6jpmOG.SkSVV9E.KcPSr74E9VPgbMThE7se.', 'Voter', 0, 0, NULL, '2019-03-15 22:18:14', '2019-03-15 22:18:14'),
(693, 1, '1', 1, 'MALE', '0718000087', '0718000087', NULL, '$2y$10$FYFixL9/BH25b942.JyJI.S/b2aAC2Y7g.9Cirbww/hn.G162XljC', 'Voter', 0, 0, NULL, '2019-03-15 22:18:14', '2019-03-15 22:18:14'),
(694, 1, '1', 1, 'MALE', '0718000088', '0718000088', NULL, '$2y$10$9S8p9nR2KdnksrOxDJE4/ezlfIW1eh8B3erGVjvmz2erbee1mq6Tm', 'Voter', 0, 0, NULL, '2019-03-15 22:18:14', '2019-03-15 22:18:14'),
(695, 1, '1', 1, 'FEMALE', '0718000089', '0718000089', NULL, '$2y$10$atp8UobVbjfd4BA0JM.da.2FwAdyfZJtMZlaNl9O8/6NQl9OeCEL2', 'Voter', 0, 0, NULL, '2019-03-15 22:18:14', '2019-03-15 22:18:14'),
(696, 1, '1', 1, 'MALE', '0718000090', '0718000090', NULL, '$2y$10$AgFJuXTIw2Sms4uxtTeGXO4ro8x5FYlufcmISQXTfnFW2bFC3.TXy', 'Voter', 0, 0, NULL, '2019-03-15 22:18:14', '2019-03-15 22:18:14'),
(697, 1, '1', 1, 'MALE', '0718000091', '0718000091', NULL, '$2y$10$DP/Jywv2bJH52Df8Vza0uuexCUv6fB0Wtd.ZKJG5tcNZrraWwuX2u', 'Voter', 0, 0, NULL, '2019-03-15 22:18:14', '2019-03-15 22:18:14'),
(698, 1, '1', 1, 'MALE', '0718000092', '0718000092', NULL, '$2y$10$eCIx6XLXYrlxVpWo.N2CzOUYXv0wQ4TcA1x1gUAoOmWuzEig/zf.S', 'Voter', 0, 0, NULL, '2019-03-15 22:18:14', '2019-03-15 22:18:14'),
(699, 1, '1', 1, 'MALE', '0718000093', '0718000093', NULL, '$2y$10$i/qGqPeHaK5DcbuYSWse3eAd.Lu9ULyBToTdEunvcpItbOgiyfLda', 'Voter', 0, 0, NULL, '2019-03-15 22:18:14', '2019-03-15 22:18:14'),
(700, 1, '1', 1, 'MALE', '0718000094', '0718000094', NULL, '$2y$10$frIe0STJpLTsUGMtQJnexuauWh6tbThT3JVWJDYaJsfg0GzNMh8Je', 'Voter', 0, 0, NULL, '2019-03-15 22:18:14', '2019-03-15 22:18:14'),
(701, 1, '1', 1, 'FEMALE', '0718000095', '0718000095', NULL, '$2y$10$2GAdxvhkdyNi/IMOP0PVgu3QPvK7/ZxFT9BME4.OQBYmMbLmStVga', 'Voter', 0, 0, NULL, '2019-03-15 22:18:14', '2019-03-15 22:18:14'),
(702, 1, '1', 1, 'MALE', '0718000096', '0718000096', NULL, '$2y$10$mdzUTykVGPrxCVQu.sqvP.SWbgn519OMfXNUplP0kn4tfAeqYGOq2', 'Voter', 0, 0, NULL, '2019-03-15 22:18:14', '2019-03-15 22:18:14'),
(703, 1, '1', 1, 'MALE', '0718000097', '0718000097', NULL, '$2y$10$cEn02taBsnks5zjjozE8puJDNIo5KyWwTY84r1WOnnhCL9z9Vl3Ka', 'Voter', 0, 0, NULL, '2019-03-15 22:18:15', '2019-03-15 22:18:15'),
(704, 1, '1', 1, 'MALE', '0718000098', '0718000098', NULL, '$2y$10$FURftrYUpK4Spn0dSPLIfOY5NTRL3DMoJj5IYzi7/Jc5VDlsucxWq', 'Voter', 0, 0, NULL, '2019-03-15 22:18:15', '2019-03-15 22:18:15'),
(705, 1, '1', 1, 'FEMALE', '0718000099', '0718000099', NULL, '$2y$10$YpStGzL.ZSIZytPs7fzEJuIaANmafl6jrBXNyrVCabKi2LCK2k2IG', 'Voter', 0, 0, NULL, '2019-03-15 22:18:15', '2019-03-15 22:18:15'),
(706, 1, '1', 1, 'MALE', '0718000100', '0718000100', NULL, '$2y$10$xJkMjcavvz31oBHTW4c4gecGtbBv/4OZSVfmN2sVA1JmmRIps9wga', 'Voter', 0, 0, NULL, '2019-03-15 22:18:15', '2019-03-15 22:18:15'),
(707, 1, '1', 1, 'MALE', '0718000101', '0718000101', NULL, '$2y$10$lpj1Ii98nSsLHI7AL0jFd.dKhEnSEyFRlbcUPtUYhbSE/kXkxbTGq', 'Voter', 0, 0, NULL, '2019-03-15 22:18:15', '2019-03-15 22:18:15'),
(708, 1, '1', 1, 'MALE', '0718000102', '0718000102', NULL, '$2y$10$ksTRTysA0q9/sPe6WEL5AOqJ/1YarKcjuTVZWOB36kLWMQD9sKYKu', 'Voter', 0, 0, NULL, '2019-03-15 22:18:15', '2019-03-15 22:18:15'),
(709, 1, '1', 1, 'MALE', '0718000103', '0718000103', NULL, '$2y$10$3jSQtXYonIBAWan853Gqs.40uyQyBiPCeqAk7SF0guci10v6oAaQO', 'Voter', 0, 0, NULL, '2019-03-15 22:18:15', '2019-03-15 22:18:15'),
(710, 1, '1', 1, 'MALE', '0718000104', '0718000104', NULL, '$2y$10$KrEemN8OJC0kKNMxHkVlLubMzDDBw7QipTUqQ2RLZPR4TeAyNrae.', 'Voter', 0, 0, NULL, '2019-03-15 22:18:15', '2019-03-15 22:18:15'),
(711, 1, '1', 1, 'MALE', '0718000105', '0718000105', NULL, '$2y$10$z3Veb3kLPp5IIeyGLU5Zm.Q9BzZddjSH.jTvEpci6B4Mp3K47UET6', 'Voter', 0, 0, NULL, '2019-03-15 22:18:15', '2019-03-15 22:18:15'),
(712, 1, '1', 1, 'MALE', '0718000106', '0718000106', NULL, '$2y$10$9TJM.wQnfHxIwY99lQLvsuVe8tv/hS1Dj/V1ANgnUHKhALejvNrSW', 'Voter', 0, 0, NULL, '2019-03-15 22:18:15', '2019-03-15 22:18:15'),
(713, 1, '1', 1, 'MALE', '0718000107', '0718000107', NULL, '$2y$10$JuIm6X80bLgWJ1eTZbfe2Op.JHc3TD/KBE.1FcnU6Py.FxrOGyOwO', 'Voter', 0, 0, NULL, '2019-03-15 22:18:15', '2019-03-15 22:18:15'),
(714, 1, '1', 1, 'MALE', '0718000108', '0718000108', NULL, '$2y$10$MqZhaOrQtvGdtSpwIeEHK.h5IGG0.r6nWz58xhlV2qI/YUW8v9Tv2', 'Voter', 0, 0, NULL, '2019-03-15 22:18:15', '2019-03-15 22:18:15'),
(715, 1, '1', 1, 'MALE', '0718000109', '0718000109', NULL, '$2y$10$ZmX8Ajp7qLG.H5IJOztFm.5YMAijFAiolHPjQnyFQR5UVdRDsR0yK', 'Voter', 0, 0, NULL, '2019-03-15 22:18:15', '2019-03-15 22:18:15'),
(716, 1, '1', 1, 'MALE', '0718000110', '0718000110', NULL, '$2y$10$Pm.Uy8UYAV12/y3MWjnrcOzUw7TnUQ8agFZ8fKjkJSrZljHQhIPKC', 'Voter', 0, 0, NULL, '2019-03-15 22:18:15', '2019-03-15 22:18:15'),
(717, 1, '1', 1, 'MALE', '0718000111', '0718000111', NULL, '$2y$10$Ppyf4wMfpoTj8QJw7EGTkeC4ssFdEuwamt6YiudYcvHJ.bm3fb6Fe', 'Voter', 0, 0, NULL, '2019-03-15 22:18:15', '2019-03-15 22:18:15'),
(718, 1, '1', 1, 'MALE', '0718000112', '0718000112', NULL, '$2y$10$h/38taj1BS8I77MJZd7xnuSaeJf0jz/E0EoPNWqbt3jaQ5geqVExe', 'Voter', 0, 0, NULL, '2019-03-15 22:18:15', '2019-03-15 22:18:15'),
(719, 1, '1', 1, 'MALE', '0718000113', '0718000113', NULL, '$2y$10$J4WnJP4.9Z1d62LlVzCvPOUJjcqF8LhBYcz96pRG6sEOp3vLMya6e', 'Voter', 0, 0, NULL, '2019-03-15 22:18:16', '2019-03-15 22:18:16'),
(720, 1, '1', 1, 'MALE', '0718000114', '0718000114', NULL, '$2y$10$VE8VYb9ni6ucsxWMIBhPl.sU9/fTLFBVP.iJ8beQZFfooMb.6.Hdy', 'Voter', 0, 0, NULL, '2019-03-15 22:18:16', '2019-03-15 22:18:16'),
(721, 1, '1', 1, 'MALE', '0718000116', '0718000116', NULL, '$2y$10$Brazsh5sdINPuXzfJCEcT.6M1HMcK4j1dbaYPE0cl05KE4274FvTG', 'Voter', 0, 0, NULL, '2019-03-15 22:18:16', '2019-03-15 22:18:16'),
(722, 1, '1', 1, 'MALE', '0718000117', '0718000117', NULL, '$2y$10$M9WsJMhZFFu.xRPJgLE32eYXCEhMaZjS7PDfvjZtBTR3VckEMMNsS', 'Voter', 0, 0, NULL, '2019-03-15 22:18:16', '2019-03-15 22:18:16'),
(723, 1, '1', 1, 'FEMALE', '0718000118', '0718000118', NULL, '$2y$10$93Bv1yfPAhX22nTzQqDXL.IP9XxtDmlZ7zEoarXFjhtAJqTglM5bC', 'Voter', 0, 0, NULL, '2019-03-15 22:18:16', '2019-03-15 22:18:16'),
(724, 1, '1', 1, 'MALE', '0718000119', '0718000119', NULL, '$2y$10$mmzPvISeUZTOmPKCCLVksutRUnT1hKu4ttpku6bJhKUonfCGZaKGu', 'Voter', 0, 0, NULL, '2019-03-15 22:18:16', '2019-03-15 22:18:16'),
(725, 1, '1', 1, 'MALE', '0718000120', '0718000120', NULL, '$2y$10$zVDayk8DKylB1yu0RfBene2EOLnDAb44dJ.jrE1AEXMdmE8LrlT4K', 'Voter', 0, 0, NULL, '2019-03-15 22:18:16', '2019-03-15 22:18:16'),
(726, 1, '1', 1, 'MALE', '0718000121', '0718000121', NULL, '$2y$10$0q08HbMARl/tbFsDMWGP6uc6pu8yNw4V0kF/BEj74DTw4jiirJMmm', 'Voter', 0, 0, NULL, '2019-03-15 22:18:16', '2019-03-15 22:18:16'),
(727, 1, '1', 1, 'MALE', '0718000122', '0718000122', NULL, '$2y$10$HUl8CwS..TLAe3qkJNV99./Wap6SvGcogdbXEuyZCwpqsQIoEZkya', 'Voter', 0, 0, NULL, '2019-03-15 22:18:16', '2019-03-15 22:18:16'),
(728, 1, '1', 1, 'FEMALE', '0718000123', '0718000123', NULL, '$2y$10$g/1fhGeMeLDQHuH.6FFr.uK//TVMUg8r8FskRTrmFgIRDZfWxRnb2', 'Voter', 0, 0, NULL, '2019-03-15 22:18:16', '2019-03-15 22:18:16'),
(729, 1, '1', 1, 'MALE', '0718000124', '0718000124', NULL, '$2y$10$HEd68N29f6NqApJAjlKfCO3RuXHvPYTwvQIzcq3rEQjEqOVd2Q.Jy', 'Voter', 0, 0, NULL, '2019-03-15 22:18:16', '2019-03-15 22:18:16'),
(730, 1, '1', 1, 'MALE', '0718000125', '0718000125', NULL, '$2y$10$wbNJ/6q4FYKqBmuBCQV25uVUJIiN6x30cnCSdH2QAUbmGfEQhLhLK', 'Voter', 0, 0, NULL, '2019-03-15 22:18:16', '2019-03-15 22:18:16'),
(731, 1, '1', 1, 'MALE', '0718000126', '0718000126', NULL, '$2y$10$A7pwWHQbmEPeMuuvoe7AOeHe5.JtKJ3lCgvHJlCpL5WVIuGCPPTae', 'Voter', 0, 0, NULL, '2019-03-15 22:18:16', '2019-03-15 22:18:16'),
(732, 1, '1', 1, 'FEMALE', '0718000127', '0718000127', NULL, '$2y$10$ouOVyja5o76H3I3M/XIBrukmUhqoP7G7e0Hj7S2oiG.38jl3hvUta', 'Voter', 0, 0, NULL, '2019-03-15 22:18:16', '2019-03-15 22:18:16'),
(733, 1, '1', 1, 'MALE', '0718000128', '0718000128', NULL, '$2y$10$S96IU55fhoSLW8fAi5tN9u4N9RqAa4/gsErTZJEB4AGPni/VpOA.W', 'Voter', 0, 0, NULL, '2019-03-15 22:18:16', '2019-03-15 22:18:16'),
(734, 1, '1', 1, 'FEMALE', '0718000129', '0718000129', NULL, '$2y$10$twHVtSJUuSyNmd3PSZsq5unY/XezIu2rjVpd4Daj3.cG8js3h8r.q', 'Voter', 0, 0, NULL, '2019-03-15 22:18:16', '2019-03-15 22:18:16'),
(735, 1, '1', 1, 'MALE', '0718000130', '0718000130', NULL, '$2y$10$bcmJmAMdm3fbKqsEgvs/2OSfT940T.VbgDLeOX8Non/h0vDzIKqZa', 'Voter', 0, 0, NULL, '2019-03-15 22:18:16', '2019-03-15 22:18:16'),
(736, 1, '1', 1, 'MALE', '0718000131', '0718000131', NULL, '$2y$10$/h9Eqy0e3rHtC1.XUPkJUOCY1f6Q23o6V8e5IuNc2Zg9NNE0QkdJW', 'Voter', 0, 0, NULL, '2019-03-15 22:18:17', '2019-03-15 22:18:17'),
(737, 1, '1', 1, 'MALE', '0718000132', '0718000132', NULL, '$2y$10$4/4SOOj8D56pGi3jXwf3J.k/VxYI9WCyq9fdAKP/tEdysuv3ioPGG', 'Voter', 0, 0, NULL, '2019-03-15 22:18:17', '2019-03-15 22:18:17'),
(738, 1, '1', 1, 'MALE', '0718000133', '0718000133', NULL, '$2y$10$mtVnBHIJK3CWDUK1HHCI9OvsenzKskCGmswSOxhFOfkDxc7ttcjWu', 'Voter', 0, 0, NULL, '2019-03-15 22:18:17', '2019-03-15 22:18:17'),
(739, 1, '1', 1, 'MALE', '0718000134', '0718000134', NULL, '$2y$10$qJvErvTcuuLXyxDFGxim5OMqdBolrloQ3o0bONvKXGKltbvYQVPPO', 'Voter', 0, 0, NULL, '2019-03-15 22:18:17', '2019-03-15 22:18:17'),
(740, 1, '1', 1, 'MALE', '0718000135', '0718000135', NULL, '$2y$10$qDQgpOO9ONgyEsb02a7gnegE1qQtbw4xd4LNzvqnyz0veQ8wNDufG', 'Voter', 0, 0, NULL, '2019-03-15 22:18:17', '2019-03-15 22:18:17'),
(741, 1, '1', 1, 'MALE', '0718000136', '0718000136', NULL, '$2y$10$losqWNyimPb2057rANElkOwnxaAoBsbF4RMFqBpf8P61ubDYjHJ2y', 'Voter', 0, 0, NULL, '2019-03-15 22:18:17', '2019-03-15 22:18:17'),
(742, 1, '1', 1, 'FEMALE', '0718000137', '0718000137', NULL, '$2y$10$9e6iULmDeJh6FQX/dSWYJOZw9431bj5JWKdvx/JXFncsYuIgTBsZi', 'Voter', 0, 0, NULL, '2019-03-15 22:18:17', '2019-03-15 22:18:17'),
(743, 1, '1', 1, 'FEMALE', '0718000138', '0718000138', NULL, '$2y$10$K33mpH9yH6.Vn5LUqY93zuzaZOBjMmt8eZHVSHxoKacMI7rEaTwB2', 'Voter', 0, 0, NULL, '2019-03-15 22:18:17', '2019-03-15 22:18:17'),
(744, 1, '1', 1, 'MALE', '0718000139', '0718000139', NULL, '$2y$10$d.pUfffv44OOCFkgF/E.3OmIiAOMvGQdZkMFJMWkADl7U2g22uNya', 'Voter', 0, 0, NULL, '2019-03-15 22:18:17', '2019-03-15 22:18:17'),
(745, 1, '1', 1, 'MALE', '0718000140', '0718000140', NULL, '$2y$10$BMsoZvQXPAk1c14gH5kb.efdmhSrPqGBU8JVGG8/8b6H3CY8u.NSK', 'Voter', 0, 0, NULL, '2019-03-15 22:18:17', '2019-03-15 22:18:17'),
(746, 1, '1', 1, 'MALE', '0718000141', '0718000141', NULL, '$2y$10$BKvzMhPOjAvSjL3KXq9ZMOlBWRUW/MGWiKNqNewApA2r00eRvxP4e', 'Voter', 0, 0, NULL, '2019-03-15 22:18:17', '2019-03-15 22:18:17'),
(747, 1, '1', 1, 'FEMALE', '0718000142', '0718000142', NULL, '$2y$10$e9UXlW64RuQ9.a4vcg1MF.0KWhKqwPk5KW9jTui/fI.XuFQegQCA2', 'Voter', 0, 0, NULL, '2019-03-15 22:18:17', '2019-03-15 22:18:17'),
(748, 1, '1', 1, 'MALE', '0718000143', '0718000143', NULL, '$2y$10$a1.MARnbv2TO91MgFacGgOgK5iUQDrxAweA.Os.djrT2o6ItaJo42', 'Voter', 0, 0, NULL, '2019-03-15 22:18:17', '2019-03-15 22:18:17'),
(749, 1, '1', 1, 'MALE', '0718000144', '0718000144', NULL, '$2y$10$xlW9x7DBpMriXk6erlu7Cee9o9F6ICmAbV/HAk51MCJP2fbPO0LzW', 'Voter', 0, 0, NULL, '2019-03-15 22:18:17', '2019-03-15 22:18:17'),
(750, 1, '1', 1, 'MALE', '0718000145', '0718000145', NULL, '$2y$10$vBo2oa1QjXiuAJWwsmHUoOvXBip9eWY3vKJ8jY6YTbdqdW2ei4eq6', 'Voter', 0, 0, NULL, '2019-03-15 22:18:17', '2019-03-15 22:18:17'),
(751, 1, '1', 1, 'MALE', '0718000146', '0718000146', NULL, '$2y$10$WnTA3qyO5pTNUWdABVcUzuL08PRbk0c9M1IFznnjwdwOi4/gQmZ/K', 'Voter', 0, 0, NULL, '2019-03-15 22:18:17', '2019-03-15 22:18:17'),
(752, 1, '1', 1, 'MALE', '0718000147', '0718000147', NULL, '$2y$10$1ljxJ2PyLQxSnzJlm70ghOFvZACI8VhbyhOaK4lSeoaaeoWCyEvga', 'Voter', 0, 0, NULL, '2019-03-15 22:18:18', '2019-03-15 22:18:18'),
(753, 1, '1', 1, 'MALE', '0718000148', '0718000148', NULL, '$2y$10$IWsBnH7niV8KXPluWzzwne6hjUk/YPp430fu8MUDAK88X0dHyHRXy', 'Voter', 0, 0, NULL, '2019-03-15 22:18:18', '2019-03-15 22:18:18'),
(754, 1, '1', 1, 'MALE', '0718000149', '0718000149', NULL, '$2y$10$pdSWcq4gxn8iggWLehcujeq.8pKLZU.weyvsgDy72sJbNuX7vc/V2', 'Voter', 0, 0, NULL, '2019-03-15 22:18:18', '2019-03-15 22:18:18'),
(755, 1, '1', 1, 'MALE', '0718000150', '0718000150', NULL, '$2y$10$UHUBOs1jxxfZ3spWEk09/OkycyiXpoQUxqKSItxqK5FFNR6LiRT1m', 'Voter', 0, 0, NULL, '2019-03-15 22:18:18', '2019-03-15 22:18:18'),
(756, 1, '1', 1, 'MALE', '0718000151', '0718000151', NULL, '$2y$10$e.7e/KFAgFFS0vfjlIuqkuR7kzSsR3Bt6rj7x4ehmjrfsw/HLUuO6', 'Voter', 0, 0, NULL, '2019-03-15 22:18:18', '2019-03-15 22:18:18'),
(757, 1, '1', 1, 'MALE', '0718000152', '0718000152', NULL, '$2y$10$B/j07vLsY7UjPSJ7hGdfGOgjg.X4h1j.Q0ZEbW9vpG1vdlLU9DyPW', 'Voter', 0, 0, NULL, '2019-03-15 22:18:18', '2019-03-15 22:18:18'),
(758, 1, '1', 1, 'MALE', '0718000153', '0718000153', NULL, '$2y$10$X/AeecTa3YrK1qRw4VCQUu4AM0EiniybFM6NTL//0IAQD2GPLew/S', 'Voter', 0, 0, NULL, '2019-03-15 22:18:18', '2019-03-15 22:18:18'),
(759, 1, '1', 1, 'MALE', '0718000154', '0718000154', NULL, '$2y$10$3vde7/ybCFLEJbT./0XzSu3c4qdaWARJo3DoxG46Ai0BBcV6HqjH6', 'Voter', 0, 0, NULL, '2019-03-15 22:18:18', '2019-03-15 22:18:18'),
(760, 1, '1', 1, 'MALE', '0718000155', '0718000155', NULL, '$2y$10$jvmnk3XRTYYbcwDWolFDtOJwiNuoxWbBYAKKi3k.85FwXOUgAWwoq', 'Voter', 0, 0, NULL, '2019-03-15 22:18:18', '2019-03-15 22:18:18'),
(761, 1, '1', 1, 'MALE', '0718000156', '0718000156', NULL, '$2y$10$g0aISUiBhmPJ0T5/3ldhE.I6oCqrkoi.hq5v0s3GFPNnY1L9uvEQ.', 'Voter', 0, 0, NULL, '2019-03-15 22:18:18', '2019-03-15 22:18:18'),
(762, 1, '1', 1, 'MALE', '0718000157', '0718000157', NULL, '$2y$10$.XK2DSS8o.a2kRpbb.mDc.3nf2BCV15zgi3bGBfoXK87/T8TV7rri', 'Voter', 0, 0, NULL, '2019-03-15 22:18:18', '2019-03-15 22:18:18'),
(763, 1, '1', 1, 'MALE', '0718000158', '0718000158', NULL, '$2y$10$tuaU9JAiqscDbe7fy0WvbOaq6QVOr.KMBTR81Cz5VyA/ghk4ooYU2', 'Voter', 0, 0, NULL, '2019-03-15 22:18:18', '2019-03-15 22:18:18'),
(764, 1, '1', 1, 'MALE', '0718000159', '0718000159', NULL, '$2y$10$rOXP722bewvL.czePZS3gez0PNbE9lI/FlBCAgYyu0.S.xxUkHbxy', 'Voter', 0, 0, NULL, '2019-03-15 22:18:18', '2019-03-15 22:18:18'),
(765, 1, '1', 1, 'FEMALE', '0718000160', '0718000160', NULL, '$2y$10$FzmlvvcguLmHj5TWC8g2le21x/11465Cv/TkUlB308JXJYyDkay8a', 'Voter', 0, 0, NULL, '2019-03-15 22:18:18', '2019-03-15 22:18:18'),
(766, 1, '1', 1, 'MALE', '0718000162', '0718000162', NULL, '$2y$10$0W3gTMfYpB93GujwnpIUbudQlAAQNo6xfvPeLKARmu.AGtoBkIPCK', 'Voter', 0, 0, NULL, '2019-03-15 22:18:18', '2019-03-15 22:18:18'),
(767, 1, '1', 1, 'MALE', '0718000163', '0718000163', NULL, '$2y$10$93WWesYKBb1jCGiJJw04gektM95hIpgFJ7O7A0hjGiJl8k22zUBxy', 'Voter', 0, 0, NULL, '2019-03-15 22:18:18', '2019-03-15 22:18:18'),
(768, 1, '1', 1, 'FEMALE', '0718000164', '0718000164', NULL, '$2y$10$hIiT2azfnSFXDxDr3IcH5.hRGdkFW/q67hPXEEt1dPn99Fun0HfF.', 'Voter', 0, 0, NULL, '2019-03-15 22:18:18', '2019-03-15 22:18:18'),
(769, 1, '1', 1, 'MALE', '0718000165', '0718000165', NULL, '$2y$10$m8zmM2g7WqGK9GZIeWk7QOVHU4f5m4hENb4J8NaFJxPqyJ8VnA2YS', 'Voter', 0, 0, NULL, '2019-03-15 22:18:19', '2019-03-15 22:18:19'),
(770, 1, '1', 1, 'MALE', '0718000166', '0718000166', NULL, '$2y$10$.NjiulmViswOWlxs3aUgSeFFhmykdGUhBrpYPhgQXvMOUk9ZLRKKa', 'Voter', 0, 0, NULL, '2019-03-15 22:18:19', '2019-03-15 22:18:19'),
(771, 1, '1', 1, 'MALE', '0718000167', '0718000167', NULL, '$2y$10$ZKN8YOviXA8DgmITK6c6A.OuTSvyHXhq5pFT6eVS3kDwDyi.ct8Hy', 'Voter', 0, 0, NULL, '2019-03-15 22:18:19', '2019-03-15 22:18:19'),
(772, 1, '1', 1, 'MALE', '0718000168', '0718000168', NULL, '$2y$10$05szlsVP72//F1spxkT8B.1vYWyLNYmsS6jYM.UIVSUO8N2MhadK6', 'Voter', 0, 0, NULL, '2019-03-15 22:18:19', '2019-03-15 22:18:19'),
(773, 1, '1', 1, 'MALE', '0718000169', '0718000169', NULL, '$2y$10$qW2kqEi/M9cw5LEygeEMi.ItL/44mEDRyy2TnAPTdpt2gfBYC2bR6', 'Voter', 0, 0, NULL, '2019-03-15 22:18:19', '2019-03-15 22:18:19'),
(774, 1, '1', 1, 'MALE', '0718000170', '0718000170', NULL, '$2y$10$b3aF0t7ZtYjOk/JDLc6UHOGrbeyirMfAlYt2so2s3GUKpiY1yJrGC', 'Voter', 0, 0, NULL, '2019-03-15 22:18:19', '2019-03-15 22:18:19'),
(775, 1, '1', 1, 'FEMALE', '0718000171', '0718000171', NULL, '$2y$10$65AzZmpfqut2ygVYQR078OS0p9RqUbFNYozjCpYH2.b0aoYgf0Ae.', 'Voter', 0, 0, NULL, '2019-03-15 22:18:19', '2019-03-15 22:18:19'),
(776, 1, '1', 1, '', '0718000172', '0718000172', NULL, '$2y$10$ky7I7EMy030QDyfwL6A1Tup/BiogMHmHFjH46MWSGs0t7OPlw5QWC', 'Voter', 0, 0, NULL, '2019-03-15 22:18:19', '2019-03-15 22:18:19'),
(777, 1, '1', 1, '', '0718000173', '0718000173', NULL, '$2y$10$wIcnegdluZyMEUTU0gTkMuXISe4ntbQ7DIdfcszrwbqgluI1CBgn6', 'Voter', 0, 0, NULL, '2019-03-15 22:18:19', '2019-03-15 22:18:19'),
(778, 1, '1', 1, 'MALE', '0718000174', '0718000174', NULL, '$2y$10$2tzC6dPzZI9nQhFkTTYGlukIOpNRmhlA0cVpKGR0SJs59wNvQdwKW', 'Voter', 0, 0, NULL, '2019-03-15 22:18:19', '2019-03-15 22:18:19'),
(779, 1, '1', 1, 'MALE', '0718000175', '0718000175', NULL, '$2y$10$C4WscuQz.S7uhtiGp9.yROZPL2JPpZi7V/xpfr/HeY15HpD.ETwra', 'Voter', 0, 0, NULL, '2019-03-15 22:18:19', '2019-03-15 22:18:19'),
(780, 1, '1', 1, 'MALE', '0718000176', '0718000176', NULL, '$2y$10$LKqF4GvelOtmnQ6mM24ti.L/VNlXb87z0ojhiTYA9.cy8eY/l7OZe', 'Voter', 0, 0, NULL, '2019-03-15 22:18:19', '2019-03-15 22:18:19'),
(781, 1, '1', 1, 'MALE', '0718000177', '0718000177', NULL, '$2y$10$NgT67GgvI47B.g6WnboX8OiwZcZN6kltnJ7u06HR3rq7BPQklUPZG', 'Voter', 0, 0, NULL, '2019-03-15 22:18:19', '2019-03-15 22:18:19'),
(782, 1, '1', 1, 'MALE', '0718000178', '0718000178', NULL, '$2y$10$yJiJOI/QGDx4zUf6a5/cTOvOV5nr9sXQgpU0nEwNo75xRG8Y5jQqW', 'Voter', 0, 0, NULL, '2019-03-15 22:18:19', '2019-03-15 22:18:19'),
(783, 1, '1', 1, 'MALE', '0718000179', '0718000179', NULL, '$2y$10$xM6/xUch9yjLVxC3P0ENHO4QYUf/oyVfFUDUjVJf2FgsZ06GiH3C.', 'Voter', 0, 0, NULL, '2019-03-15 22:18:19', '2019-03-15 22:18:19'),
(784, 1, '1', 1, 'MALE', '0718000180', '0718000180', NULL, '$2y$10$LaT2hYBYF7nhfuuA.VpWYenxT.BYYH5mNMK1dEh2j.dH36RdNx2hC', 'Voter', 0, 0, NULL, '2019-03-15 22:18:19', '2019-03-15 22:18:19'),
(785, 1, '1', 1, 'MALE', '0718000181', '0718000181', NULL, '$2y$10$ggYPwLyGNi3aIiWSan.Jme7F8ecq5wiEctQqJuKXBG3KN961uylOK', 'Voter', 0, 0, NULL, '2019-03-15 22:18:20', '2019-03-15 22:18:20'),
(786, 1, '1', 1, 'MALE', '0718000182', '0718000182', NULL, '$2y$10$NpvnZfJygCZLwasi0eJXa.egbq6GelY4OBWxEyCzYmgSHJmN860NK', 'Voter', 0, 0, NULL, '2019-03-15 22:18:20', '2019-03-15 22:18:20'),
(787, 1, '1', 1, 'MALE', '0718000183', '0718000183', NULL, '$2y$10$4U7lt3Mm6PTlUyo74IbM7uzNN7UEs3sGlgoBccbTxFbY3l.tRvBoO', 'Voter', 0, 0, NULL, '2019-03-15 22:18:20', '2019-03-15 22:18:20'),
(788, 1, '1', 1, 'FEMALE', '0718000184', '0718000184', NULL, '$2y$10$pkTrPtVoVoa.KINMWSfYcu9S5vmDE5oO9tJiL9mfqvLZJ.lozFoES', 'Voter', 0, 0, NULL, '2019-03-15 22:18:20', '2019-03-15 22:18:20'),
(789, 1, '1', 1, 'MALE', '0718000185', '0718000185', NULL, '$2y$10$ebe5xTBYac2Dick76OGo2OVEWa.pEEgZxoxh94ISsygjCRZ4JoqGi', 'Voter', 0, 0, NULL, '2019-03-15 22:18:20', '2019-03-15 22:18:20'),
(790, 1, '1', 1, 'MALE', '0718000186', '0718000186', NULL, '$2y$10$ls6gW/VisTEiS4CwwjSsUuKytaLAX5VFhHtT9E3ti/f.wJw2BN7hG', 'Voter', 0, 0, NULL, '2019-03-15 22:18:20', '2019-03-15 22:18:20'),
(791, 1, '1', 1, 'MALE', '0718000187', '0718000187', NULL, '$2y$10$nNqvlPuywmqMy/7h014xZ.Ts7uUJDYSDPpDktWztNdGmiJNtt9exS', 'Voter', 0, 0, NULL, '2019-03-15 22:18:20', '2019-03-15 22:18:20'),
(792, 1, '1', 1, 'MALE', '0718000188', '0718000188', NULL, '$2y$10$UWGC3hMskm0TKoy1VNWOJu3YsIEmdEBDjR5AfX2spwJ1nVrHSc3Ee', 'Voter', 0, 0, NULL, '2019-03-15 22:18:20', '2019-03-15 22:18:20'),
(793, 1, '1', 1, '', '0718000189', '0718000189', NULL, '$2y$10$oUpfx55uXw709xmD4.J82OwnzL3CNeICc74d1A2mLDRhMCilvryjm', 'Voter', 0, 0, NULL, '2019-03-15 22:18:20', '2019-03-15 22:18:20'),
(794, 1, '1', 1, 'MALE', '0718000190', '0718000190', NULL, '$2y$10$f0E5hhYmhT3jk4j5CbRcLO2xrfmevNworwr8bDJnVqb4C7Ho7CSs2', 'Voter', 0, 0, NULL, '2019-03-15 22:18:20', '2019-03-15 22:18:20'),
(795, 1, '1', 1, 'FEMALE', '0718000191', '0718000191', NULL, '$2y$10$qIxs7xNWf5g7sPwhExdqBuVcwVYp4ocZIXT8x17taOxgBI9fY331G', 'Voter', 0, 0, NULL, '2019-03-15 22:18:20', '2019-03-15 22:18:20'),
(796, 1, '1', 1, 'MALE', '0718000192', '0718000192', NULL, '$2y$10$5daMg2W8MdxNdUCKiDRUsuSfSsZl01UNTYAmAt4s9ZVfjWmecaKTi', 'Voter', 0, 0, NULL, '2019-03-15 22:18:20', '2019-03-15 22:18:20'),
(797, 1, '1', 1, 'MALE', '0718000193', '0718000193', NULL, '$2y$10$XWlihl0OZpE2gc2dtKjuwOn6Y/g7hVS5SVGsqLcbjX05xi.RrbMY2', 'Voter', 0, 0, NULL, '2019-03-15 22:18:20', '2019-03-15 22:18:20'),
(798, 1, '1', 1, 'MALE', '0718000194', '0718000194', NULL, '$2y$10$Q6NfLrsHrblhnHaAKo012.fu6mp7PaXR40anQ/043VQobW5lE1rye', 'Voter', 0, 0, NULL, '2019-03-15 22:18:20', '2019-03-15 22:18:20'),
(799, 1, '1', 1, 'MALE', '0718000195', '0718000195', NULL, '$2y$10$VtD4DvtUv6BgkMPg.BbtFuj2Rhia/mDyko03heGTUomOhCuWDdW0W', 'Voter', 0, 0, NULL, '2019-03-15 22:18:20', '2019-03-15 22:18:20'),
(800, 1, '1', 1, 'MALE', '0718000196', '0718000196', NULL, '$2y$10$hmENkUhraGTi8ha5/uTF0uvZyFIE3yOAzw9U0XYcXWzsblAaErbli', 'Voter', 0, 0, NULL, '2019-03-15 22:18:20', '2019-03-15 22:18:20'),
(801, 1, '1', 1, 'MALE', '0718000197', '0718000197', NULL, '$2y$10$YKodpftnd6i4ZGxoswsa..W476kz/B./j/ZvIBuEYytEr9xihQIJ6', 'Voter', 0, 0, NULL, '2019-03-15 22:18:20', '2019-03-15 22:18:20'),
(802, 1, '1', 1, 'MALE', '0718000198', '0718000198', NULL, '$2y$10$tAV.1RB4boEua.rxk.r.AuiVUgq8CcXu6imvTURZVlue.OwK9Z5lq', 'Voter', 0, 0, NULL, '2019-03-15 22:18:21', '2019-03-15 22:18:21'),
(803, 1, '1', 1, 'MALE', '0718000199', '0718000199', NULL, '$2y$10$b0RAnjC.X06E1wK4Yjp5Dur9jW9LZZjQmfX8W3tFkFTh9RlF7P7qW', 'Voter', 0, 0, NULL, '2019-03-15 22:18:21', '2019-03-15 22:18:21'),
(804, 1, '1', 1, 'MALE', '0718000200', '0718000200', NULL, '$2y$10$7P4poVP.WQJZ1mQ9vofwSupGDM5nUBNj3wjYVLrdm0UqsSJ2SE/je', 'Voter', 0, 0, NULL, '2019-03-15 22:18:21', '2019-03-15 22:18:21'),
(805, 1, '1', 1, 'MALE', '0718000201', '0718000201', NULL, '$2y$10$GVjWsu18ictywKdKjNPA/O.1YmruPldl0V/3Nkmepd3rJ03wvhDJC', 'Voter', 0, 0, NULL, '2019-03-15 22:18:21', '2019-03-15 22:18:21'),
(806, 1, '1', 1, 'MALE', '0718000202', '0718000202', NULL, '$2y$10$gAcdC6KhvhbziGDQpeymkeEMVLG0q1H2FuGQ1kVIKPZb7ixpmXoPi', 'Voter', 0, 0, NULL, '2019-03-15 22:18:21', '2019-03-15 22:18:21'),
(807, 1, '1', 1, 'MALE', '0718000203', '0718000203', NULL, '$2y$10$x5gGoMmJVJ7OQTLn9zhkq.ouSt7r.BrI6Urtx8w/tdfl4GlGUAizi', 'Voter', 0, 0, NULL, '2019-03-15 22:18:21', '2019-03-15 22:18:21'),
(808, 1, '1', 1, 'MALE', '0718000204', '0718000204', NULL, '$2y$10$bkzN52E5cnM0tyaSovQ5cO2Gh8.4gyQyZ2aL.dBwaL67rxvwlgiwy', 'Voter', 0, 0, NULL, '2019-03-15 22:18:21', '2019-03-15 22:18:21'),
(809, 1, '1', 1, 'MALE', '0718000205', '0718000205', NULL, '$2y$10$HFdz24x9dqto.7tywMYlcepS4rDZTK3/wWODjyfhkdhki6EYFop4m', 'Voter', 0, 0, NULL, '2019-03-15 22:18:21', '2019-03-15 22:18:21'),
(810, 1, '1', 1, 'MALE', '0718000206', '0718000206', NULL, '$2y$10$FF9de6LwBKrBhh8s6WPBieVpkcekl2BaYO.yviAL6vDKNenA6Z6La', 'Voter', 0, 0, NULL, '2019-03-15 22:18:21', '2019-03-15 22:18:21'),
(811, 1, '1', 1, 'FEMALE', '0718000207', '0718000207', NULL, '$2y$10$c6xpwviSDy1T1tNDImJNkeMzvIHyG2zJT1vlEuLo4Biik9X2y8VPO', 'Voter', 0, 0, NULL, '2019-03-15 22:18:21', '2019-03-15 22:18:21'),
(812, 1, '1', 1, 'MALE', '0718000208', '0718000208', NULL, '$2y$10$kA3JP7186sWoDFSBXCs0kOXxcxGeNghFjK3mEximqMjiJIJDngAAm', 'Voter', 0, 0, NULL, '2019-03-15 22:18:21', '2019-03-15 22:18:21'),
(813, 1, '1', 1, 'FEMALE', '0718000209', '0718000209', NULL, '$2y$10$0e3quZFr0if.RqdceqYCG.sb6PrJsSU1Ofj6G/yZnD5RZKQ0snC9S', 'Voter', 0, 0, NULL, '2019-03-15 22:18:21', '2019-03-15 22:18:21'),
(814, 1, '1', 1, 'MALE', '0718000210', '0718000210', NULL, '$2y$10$mxQzlnC4G64bZV0YqZcwf.sFzETtf1PC3Wb8PUwBDuxXbqf2KYEOW', 'Voter', 0, 0, NULL, '2019-03-15 22:18:21', '2019-03-15 22:18:21'),
(815, 1, '1', 1, 'MALE', '0718000211', '0718000211', NULL, '$2y$10$w8Fd9FB4lcJxlbtpW1V95eVhpxrHu/QyQwOlzp8.SB0QFoYSurz42', 'Voter', 0, 0, NULL, '2019-03-15 22:18:21', '2019-03-15 22:18:21'),
(816, 1, '1', 1, 'MALE', '0718000212', '0718000212', NULL, '$2y$10$t2P7Ua3qicehLKFI6yIaTuoeh6S0zMLVSHRYQgoT.C/prO8zxtiFC', 'Voter', 0, 0, NULL, '2019-03-15 22:18:21', '2019-03-15 22:18:21'),
(817, 1, '1', 1, 'MALE', '0718000213', '0718000213', NULL, '$2y$10$iBT0yxfIEYmXy.SKBJJ4Q.bYO6Ei.nneIEjEWOl1M.DmPNJzsl6WO', 'Voter', 0, 0, NULL, '2019-03-15 22:18:21', '2019-03-15 22:18:21'),
(818, 1, '1', 1, 'MALE', '0718000214', '0718000214', NULL, '$2y$10$29XG7luBjBcx3kXxYAMFE.prjb8jKEx1wgssG1oPXz2VSWf.2Xum2', 'Voter', 0, 0, NULL, '2019-03-15 22:18:22', '2019-03-15 22:18:22'),
(819, 1, '1', 1, 'MALE', '0718000215', '0718000215', NULL, '$2y$10$fvOdizqCt6z8e7dGWtxbfukL4ZzCqq9Dw7693JZx45rn18kBj0T/i', 'Voter', 0, 0, NULL, '2019-03-15 22:18:22', '2019-03-15 22:18:22'),
(820, 1, '1', 1, 'MALE', '0718000216', '0718000216', NULL, '$2y$10$X1fna2VMWg/jFWy/KdaZUe4fs35LyxB3vKDXC8az3sUAjpOJXBtU6', 'Voter', 0, 0, NULL, '2019-03-15 22:18:22', '2019-03-15 22:18:22'),
(821, 1, '1', 1, 'MALE', '0718000217', '0718000217', NULL, '$2y$10$h85m/NJ/NITHVXh7W/7.dO2hcbE60h2L8rEcE1M5ApZ7drIpxR1Ge', 'Voter', 0, 0, NULL, '2019-03-15 22:18:22', '2019-03-15 22:18:22'),
(822, 1, '1', 1, 'MALE', '0718000218', '0718000218', NULL, '$2y$10$xTWobzpbKrnfYugnjEvVW..YNvw7cKixIi9msJzq78vT.cbeLR3kC', 'Voter', 0, 0, NULL, '2019-03-15 22:18:22', '2019-03-15 22:18:22'),
(823, 1, '1', 1, 'MALE', '0718000219', '0718000219', NULL, '$2y$10$6HbSVTcq2QFug7JjRxzCO.xZi2/fzopnZ9EdxSX1R6dtZJRn4hOR2', 'Voter', 0, 0, NULL, '2019-03-15 22:18:22', '2019-03-15 22:18:22'),
(824, 1, '1', 1, 'MALE', '0718000220', '0718000220', NULL, '$2y$10$DlAbduchFk9isUDMxEGT5OErdTV5XT//voZ9JXhzzxiIkC7ZjbeHq', 'Voter', 0, 0, NULL, '2019-03-15 22:18:22', '2019-03-15 22:18:22'),
(825, 1, '1', 1, 'MALE', '0718000221', '0718000221', NULL, '$2y$10$0upjOe0Tu52pOjKg43qEWuE8haimUsEgmskmUQMVthPRKL5pGmKW6', 'Voter', 0, 0, NULL, '2019-03-15 22:18:22', '2019-03-15 22:18:22'),
(826, 1, '1', 1, 'MALE', '0718000222', '0718000222', NULL, '$2y$10$ar.bHO5Xmb4UHyg2N2k5geB5y2aYxWmUg1YnirIXvwBXyWqP9/Kcu', 'Voter', 0, 0, NULL, '2019-03-15 22:18:22', '2019-03-15 22:18:22'),
(827, 1, '1', 1, 'MALE', '0718000223', '0718000223', NULL, '$2y$10$XxzD26s69z7z9/yqiOSTteQIFPsXLXKa/oeyJ5thbMFNDqNHgcsS2', 'Voter', 0, 0, NULL, '2019-03-15 22:18:22', '2019-03-15 22:18:22'),
(828, 1, '1', 1, 'FEMALE', '0718000224', '0718000224', NULL, '$2y$10$Bm/4EphMcbstzVhq4H8R9OR.6uqFmZwQEoZ/GvU/FslrCOWAu9Ari', 'Voter', 0, 0, NULL, '2019-03-15 22:18:22', '2019-03-15 22:18:22'),
(829, 1, '1', 1, 'MALE', '0718000225', '0718000225', NULL, '$2y$10$opx7t80LFHDzed2hUB7m/uU4Uw752EQ8XZpExZ3xNNReeUcdNUdhG', 'Voter', 0, 0, NULL, '2019-03-15 22:18:22', '2019-03-15 22:18:22'),
(830, 1, '1', 1, 'FEMALE', '0718000226', '0718000226', NULL, '$2y$10$Czrt7DwPMEkdhVCXNA1jU.vVJyXKHdJDT.5KBjH8JUbQ3.rkxYWpW', 'Voter', 0, 0, NULL, '2019-03-15 22:18:22', '2019-03-15 22:18:22'),
(831, 1, '1', 1, 'MALE', '0718000227', '0718000227', NULL, '$2y$10$Jdy51rJPOgM1P1Nrj4pU.OtxLRZ.OfkexXwz/DeVuKcdnj1.yfcT6', 'Voter', 0, 0, NULL, '2019-03-15 22:18:22', '2019-03-15 22:18:22'),
(832, 1, '1', 1, 'MALE', '0718000228', '0718000228', NULL, '$2y$10$yzBHv7E3RV/MBHafbdZcHuHgKTE3Grjc0xj564qK.5w3Kf82aCiJW', 'Voter', 0, 0, NULL, '2019-03-15 22:18:22', '2019-03-15 22:18:22'),
(833, 1, '1', 1, 'FEMALE', '0718000229', '0718000229', NULL, '$2y$10$/rgKEk7/waRBEvwGK4ExNOUgeAZePj72xY4Y9o8HtpfTDWKpP8YzG', 'Voter', 0, 0, NULL, '2019-03-15 22:18:23', '2019-03-15 22:18:23'),
(834, 1, '1', 1, 'MALE', '0718000230', '0718000230', NULL, '$2y$10$uwqNN/UHsps2ljqeAfDNPek9lYoTeyIJKU5mlbxWF6dm62cAv.Lr6', 'Voter', 0, 0, NULL, '2019-03-15 22:18:23', '2019-03-15 22:18:23'),
(835, 1, '1', 1, 'MALE', '0718000231', '0718000231', NULL, '$2y$10$aQnxsbJEyiaJG432AGOQI.4ZoUEULoXnIpeuSkKD0kBTrJpvaWaIm', 'Voter', 0, 0, NULL, '2019-03-15 22:18:23', '2019-03-15 22:18:23'),
(836, 1, '1', 1, 'MALE', '0718000232', '0718000232', NULL, '$2y$10$M.dS41aos61KRL9gyz1zTeMfRyeYpauufyDx6c7JFHyjwF80o0FWm', 'Voter', 0, 0, NULL, '2019-03-15 22:18:23', '2019-03-15 22:18:23'),
(837, 1, '1', 1, 'MALE', '0718000233', '0718000233', NULL, '$2y$10$qm.FYYSZPq07LAggGpKzkORwgs0GdDaijNnxST04TnDDOB5AukzXu', 'Voter', 0, 0, NULL, '2019-03-15 22:18:23', '2019-03-15 22:18:23'),
(838, 1, '1', 1, 'MALE', '0718000234', '0718000234', NULL, '$2y$10$L9vwCiIXyTMvWTa.2uhbEOXMtZc7dAB9CbqxA1zMq4EovUqV7kfdG', 'Voter', 0, 0, NULL, '2019-03-15 22:18:23', '2019-03-15 22:18:23'),
(839, 1, '1', 1, 'MALE', '0718000235', '0718000235', NULL, '$2y$10$1PJlsNLXgysRsF0No3JTeuCL/o/5.t7aTUGzIlQb10OXobA8DfmI.', 'Voter', 0, 0, NULL, '2019-03-15 22:18:23', '2019-03-15 22:18:23'),
(840, 1, '1', 1, 'MALE', '0718000236', '0718000236', NULL, '$2y$10$UWnYdWy0gOE7Yu2N/8YQmeHrjKS7tReKVi5n1fDJH8TPGgcC4oMx2', 'Voter', 0, 0, NULL, '2019-03-15 22:18:23', '2019-03-15 22:18:23'),
(841, 1, '1', 1, 'FEMALE', '0718000237', '0718000237', NULL, '$2y$10$nrvi8QxXROhMqKeNSLYY2OZ7w30PdYp0FkzoyIU8ekioWs5a3DXWu', 'Voter', 0, 0, NULL, '2019-03-15 22:18:23', '2019-03-15 22:18:23'),
(842, 1, '1', 1, 'MALE', '0718000238', '0718000238', NULL, '$2y$10$6ye3ePmv.gU67V0ZlRcQ4eFlntZM/jtTyFfwEZSsIqsRbd2Qd5TBq', 'Voter', 0, 0, NULL, '2019-03-15 22:18:23', '2019-03-15 22:18:23'),
(843, 1, '1', 1, 'MALE', '0718000239', '0718000239', NULL, '$2y$10$2Ueg8n/RTnc2KYtGTPmGXOr8SAX0/HYgTgmlNDczU429pwKr1NNAq', 'Voter', 0, 0, NULL, '2019-03-15 22:18:23', '2019-03-15 22:18:23'),
(844, 1, '1', 1, 'MALE', '0718000240', '0718000240', NULL, '$2y$10$MI9vhEsM9klsT2g9X0tO/eWRVNL25qhmYZ7fg9fUGV/Fp.VAgU1YO', 'Voter', 0, 0, NULL, '2019-03-15 22:18:23', '2019-03-15 22:18:23'),
(845, 1, '1', 1, 'MALE', '0718000241', '0718000241', NULL, '$2y$10$hdmYcasSquHmU3c0dn.hsekSjpqQYjGDQ5TX9wQ7qbUFqsiEInWnq', 'Voter', 0, 0, NULL, '2019-03-15 22:18:23', '2019-03-15 22:18:23'),
(846, 1, '1', 1, 'FEMALE', '0718000242', '0718000242', NULL, '$2y$10$ggsZsRlfvFGtRIiihKgzI.XnwdRq2.XS0peWdu2U4DXXVF8KtDrQO', 'Voter', 0, 0, NULL, '2019-03-15 22:18:23', '2019-03-15 22:18:23'),
(847, 1, '1', 1, 'MALE', '0718000243', '0718000243', NULL, '$2y$10$eQftnfkNXe7mWT8L5BC1HOEYE/9SjUzvmp5LIUBoBBlmxIWvajxdS', 'Voter', 0, 0, NULL, '2019-03-15 22:18:23', '2019-03-15 22:18:23'),
(848, 1, '1', 1, 'MALE', '0718000244', '0718000244', NULL, '$2y$10$QKfNva92pn7YCua.VErb7ezugj5V0UrLUJGDviJwH2bmP7Wt.ZFIy', 'Voter', 0, 0, NULL, '2019-03-15 22:18:23', '2019-03-15 22:18:23'),
(849, 1, '1', 1, 'FEMALE', '0718000245', '0718000245', NULL, '$2y$10$rfGJoi/LDp6LOtpnyl3/..rTaCT.QHAqv3v.qfmij6VuJO.JU8YCy', 'Voter', 0, 0, NULL, '2019-03-15 22:18:24', '2019-03-15 22:18:24'),
(850, 1, '1', 1, 'MALE', '0718000246', '0718000246', NULL, '$2y$10$p0j9q6ZeMdygCvFwyhCL4OMbTdiVd4qZbelUWAY71U5/sckiJ1Lry', 'Voter', 0, 0, NULL, '2019-03-15 22:18:24', '2019-03-15 22:18:24'),
(851, 1, '1', 1, 'MALE', '0718000247', '0718000247', NULL, '$2y$10$O.BgT1YZ57nHBa7JJNhvMOcyXH1N8SUtRmNtQcNGC/v.vusETIkSm', 'Voter', 0, 0, NULL, '2019-03-15 22:18:24', '2019-03-15 22:18:24'),
(852, 1, '1', 1, 'MALE', '0718000249', '0718000249', NULL, '$2y$10$yqd3krGiNP33m2Te6ZJkpOtAv5xVb4mtQStTipOFgOvx/edZaB4LW', 'Voter', 0, 0, NULL, '2019-03-15 22:18:24', '2019-03-15 22:18:24'),
(853, 1, '1', 1, 'MALE', '0718000250', '0718000250', NULL, '$2y$10$hhN9P0Dqm7g9NrcJC6a0KeUlcQd8gMXtjsyhWCIw7PczbkIHxy7li', 'Voter', 0, 0, NULL, '2019-03-15 22:18:24', '2019-03-15 22:18:24'),
(854, 1, '1', 1, 'MALE', '0718000251', '0718000251', NULL, '$2y$10$DlP/yJ4tndQU6P01Q69FvOYfNMQ8KihZACZMPAKOxrftTOLI..a/K', 'Voter', 0, 0, NULL, '2019-03-15 22:18:24', '2019-03-15 22:18:24'),
(855, 1, '1', 1, 'MALE', '0718000252', '0718000252', NULL, '$2y$10$gJJ0ww.06SmPbySV1Ny2lOzWKX3g6FUrma8qZKx1L2D/Svy7qHPFm', 'Voter', 0, 0, NULL, '2019-03-15 22:18:24', '2019-03-15 22:18:24'),
(856, 1, '1', 1, 'MALE', '0718000253', '0718000253', NULL, '$2y$10$LKlRGOYX4OMLFz9ZtbYn2ekS5EZ1DNsXXK8b2H0rrpoQQItYZtNmq', 'Voter', 0, 0, NULL, '2019-03-15 22:18:24', '2019-03-15 22:18:24'),
(857, 1, '1', 1, 'MALE', '0718000254', '0718000254', NULL, '$2y$10$hvdbeWEkkNe/iGfuJ2dikO4rMfD4gsWamTS2Pdt3nEqb2hUcWARXC', 'Voter', 0, 0, NULL, '2019-03-15 22:18:24', '2019-03-15 22:18:24'),
(858, 1, '1', 1, 'MALE', '0718000255', '0718000255', NULL, '$2y$10$PsPWqE4YNGWi1/AT2S2Tn.K8oBr7Zl4IL5DBX8Ib89Aprqxvb.JD.', 'Voter', 0, 0, NULL, '2019-03-15 22:18:24', '2019-03-15 22:18:24'),
(859, 1, '1', 1, 'MALE', '0718000256', '0718000256', NULL, '$2y$10$VmomURntDXgnK8kAnlF8CuvdTsDvU4nZl5GKene5ffNxXPDpFVcxK', 'Voter', 0, 0, NULL, '2019-03-15 22:18:24', '2019-03-15 22:18:24'),
(860, 1, '1', 1, 'MALE', '0718000257', '0718000257', NULL, '$2y$10$RHE1.7G8r7cUD9OirBVvzu6mtqQ/Jvz/SAAWIKYejYqU4BDkcFd5y', 'Voter', 0, 0, NULL, '2019-03-15 22:18:24', '2019-03-15 22:18:24'),
(861, 1, '1', 1, 'MALE', '0718000258', '0718000258', NULL, '$2y$10$ikOryVpPHH57NTgRiWc3LurOaSXB9VmhlTSFEds9R1jF1prmwHts2', 'Voter', 0, 0, NULL, '2019-03-15 22:18:24', '2019-03-15 22:18:24'),
(862, 1, '1', 1, 'MALE', '0718000259', '0718000259', NULL, '$2y$10$9JYQ9jgPnAwVqX2fqxJSLuVFB7XHA1eJ2CdVkxuCC2S2rwQvHiUV6', 'Voter', 0, 0, NULL, '2019-03-15 22:18:24', '2019-03-15 22:18:24'),
(863, 1, '1', 1, 'MALE', '0718000260', '0718000260', NULL, '$2y$10$7s4tAR/OiaTDPKKZj5DrQ.83fK7K.m6TRn2zyIN4cXLf2qzoTow.K', 'Voter', 0, 0, NULL, '2019-03-15 22:18:24', '2019-03-15 22:18:24'),
(864, 1, '1', 1, 'MALE', '0718000261', '0718000261', NULL, '$2y$10$WgO9LMoUMAS7su4oLmAfaOxw8sd/H5wDX4w0WKxeIe/EBJKikvmCq', 'Voter', 0, 0, NULL, '2019-03-15 22:18:24', '2019-03-15 22:18:24'),
(865, 1, '1', 1, 'MALE', '0718000262', '0718000262', NULL, '$2y$10$fcllB1VlQbU9hsdhQlcuo.kneIzZSG.SMF7iGtz6XbpJCBpddpfa2', 'Voter', 0, 0, NULL, '2019-03-15 22:18:25', '2019-03-15 22:18:25'),
(866, 1, '1', 1, 'FEMALE', '0718000263', '0718000263', NULL, '$2y$10$F3WeBEe7R0RXJug97pKiGOrvA0vTW9uDVK5rLcvIYKJmWm/bpPSju', 'Voter', 0, 0, NULL, '2019-03-15 22:18:25', '2019-03-15 22:18:25'),
(867, 1, '1', 1, 'FEMALE', '0718000264', '0718000264', NULL, '$2y$10$UI5vhXc/5esK/IlZq.Xo1eF01xMTXyYguKMxmenYIZIoSlAcce8na', 'Voter', 0, 0, NULL, '2019-03-15 22:18:25', '2019-03-15 22:18:25');
INSERT INTO `users` (`id`, `department_id`, `voting_id`, `level_id`, `gender`, `name`, `username`, `email`, `password`, `role`, `updated`, `voted`, `remember_token`, `created_at`, `updated_at`) VALUES
(868, 1, '1', 1, 'MALE', '0718000265', '0718000265', NULL, '$2y$10$auWBM4u3kELYDHJX8JZVcenTg1ZlNVUZCbLO4YsbpKZjzhPQOmqrG', 'Voter', 0, 0, NULL, '2019-03-15 22:18:25', '2019-03-15 22:18:25'),
(869, 1, '1', 1, 'MALE', '0718000266', '0718000266', NULL, '$2y$10$ASJJvIW8Pq4bqgJLsquC0uEILz09wNwOHkpkuuQH9BXlfkDCePVla', 'Voter', 0, 0, NULL, '2019-03-15 22:18:25', '2019-03-15 22:18:25'),
(870, 1, '1', 1, 'MALE', '0718000267', '0718000267', NULL, '$2y$10$sMnvlJ7rZTxbcHDN8yj//O9dVQ4gw0Wb/1ADmJeznW1jeHltNMVoq', 'Voter', 0, 0, NULL, '2019-03-15 22:18:25', '2019-03-15 22:18:25'),
(871, 1, '1', 1, 'MALE', '0718000268', '0718000268', NULL, '$2y$10$IyhqgLeEMOLOBG4LMHffK.CYrXdCBTP4TfMcECEw/jkjtbTl88d3.', 'Voter', 0, 0, NULL, '2019-03-15 22:18:25', '2019-03-15 22:18:25'),
(872, 1, '1', 1, 'FEMALE', '0718000269', '0718000269', NULL, '$2y$10$oqqqLCq18BpoXB/yBhBtpesSZk.81JJGOmxix/LF4a9mo6.yElM02', 'Voter', 0, 0, NULL, '2019-03-15 22:18:25', '2019-03-15 22:18:25'),
(873, 1, '1', 1, 'MALE', '0718000270', '0718000270', NULL, '$2y$10$KrekI72C3N4eBK8OD8FzQ.GWLBWJKs6bm92iCLBIoae9fEftq5WCa', 'Voter', 0, 0, NULL, '2019-03-15 22:18:25', '2019-03-15 22:18:25'),
(874, 1, '1', 1, 'MALE', '0718000271', '0718000271', NULL, '$2y$10$8OWzX79B3fVmqgN3Db9v8OXD9wOR/TN53FV5.1NQJmBcNiPiM0d76', 'Voter', 0, 0, NULL, '2019-03-15 22:18:25', '2019-03-15 22:18:25'),
(875, 1, '1', 1, 'FEMALE', '0718000272', '0718000272', NULL, '$2y$10$wZ7TuXgKrjR3t8s9IhddZOjsYAfsjfpFRUyflpUYsNI.1N2ykLtLC', 'Voter', 0, 0, NULL, '2019-03-15 22:18:25', '2019-03-15 22:18:25'),
(876, 1, '1', 1, 'MALE', '0718000273', '0718000273', NULL, '$2y$10$FRRYNEfBgf3CSUUhH5aZ8.UHej/Wi/llau/gQeU7YA3xNuCRp56iO', 'Voter', 0, 0, NULL, '2019-03-15 22:18:25', '2019-03-15 22:18:25'),
(877, 1, '1', 1, 'MALE', '0718000274', '0718000274', NULL, '$2y$10$V7zTKN7clsOE6hboi3OGfOuOvhA/OqFVtMN7co2oKniZppjRC0Pfq', 'Voter', 0, 0, NULL, '2019-03-15 22:18:25', '2019-03-15 22:18:25'),
(878, 1, '1', 1, 'MALE', '0718000275', '0718000275', NULL, '$2y$10$rwHzhyIP75w0rh1hyAjHJOgW21MrT1kB7axAQkcVCPoWbg4OFcvFC', 'Voter', 0, 0, NULL, '2019-03-15 22:18:25', '2019-03-15 22:18:25'),
(879, 1, '1', 1, 'MALE', '0718000276', '0718000276', NULL, '$2y$10$rSR4QkIUY87kE7KWePL4s.kJzelvc7Ekq9fpNW4vPU0POOfaFwhk.', 'Voter', 0, 0, NULL, '2019-03-15 22:18:25', '2019-03-15 22:18:25'),
(880, 1, '1', 1, 'MALE', '0718000277', '0718000277', NULL, '$2y$10$1d54.IaTIyY0dWNn43svJeiYzuomlYyWl/aG.udE8MDkpTdIfbXJ2', 'Voter', 0, 0, NULL, '2019-03-15 22:18:25', '2019-03-15 22:18:25'),
(881, 1, '1', 1, 'MALE', '0718000278', '0718000278', NULL, '$2y$10$VI.lFNtM2FytWfGbPXr2Ie.yaZgmQ8Ybk.cww4/DXkBfMEyUD5j8K', 'Voter', 0, 0, NULL, '2019-03-15 22:18:26', '2019-03-15 22:18:26'),
(882, 1, '1', 1, 'MALE', '0718000279', '0718000279', NULL, '$2y$10$Ad9vqKxyi/YEjQr8pH87RuBNefZCaca/LNY9.9GW/mhC1/3NVxk0m', 'Voter', 0, 0, NULL, '2019-03-15 22:18:26', '2019-03-15 22:18:26'),
(883, 1, '1', 1, 'MALE', '0718000280', '0718000280', NULL, '$2y$10$zQFJ.rohoA5zhJAwJ0lbK./y5lsXn5J9gOjvbWY0CKg4WENOPESGa', 'Voter', 0, 0, NULL, '2019-03-15 22:18:26', '2019-03-15 22:18:26'),
(884, 1, '1', 1, 'MALE', '0718000281', '0718000281', NULL, '$2y$10$43fn0G5xfK1N0DcirFBxHe3wfBxxhBOC0OsvdqbfdZmYgOBni7VVe', 'Voter', 0, 0, NULL, '2019-03-15 22:18:26', '2019-03-15 22:18:26'),
(885, 1, '1', 1, 'MALE', '0718000282', '0718000282', NULL, '$2y$10$lserJlZus5Yb2aDWk0D5rOcEhKeumyVgu/dMpDiNOLSiqH5s1gHAu', 'Voter', 0, 0, NULL, '2019-03-15 22:18:26', '2019-03-15 22:18:26'),
(886, 1, '1', 1, 'MALE', '0718000283', '0718000283', NULL, '$2y$10$Ha9cMxFwPfDgsYebmumOgOVO/Xswyerse/hHyYf0qUGPcFC0qX4nC', 'Voter', 0, 0, NULL, '2019-03-15 22:18:26', '2019-03-15 22:18:26'),
(887, 1, '1', 1, 'MALE', '0718000284', '0718000284', NULL, '$2y$10$j8Q4AJ/kntA2InGb2TYJtu9QbnjNPdBoTkRNBs67R/HgFGxUjW6vq', 'Voter', 0, 0, NULL, '2019-03-15 22:18:26', '2019-03-15 22:18:26'),
(888, 1, '1', 2, 'MALE', '07170501', '07170501', NULL, '$2y$10$7HbkgbdC9lfGldoUR1p8ne3QrXUqcK3ugiM3DfHRKAYb0M3RJtb.G', 'Voter', 0, 0, NULL, '2019-03-15 22:19:02', '2019-03-15 22:19:02'),
(889, 1, '1', 2, 'MALE', '07170503', '07170503', NULL, '$2y$10$iJgXhCAiwwTjbPqBISAeaux9qTaNxVYGoUJ0w4OqSfaE.OO7fVLh2', 'Voter', 0, 0, NULL, '2019-03-15 22:19:02', '2019-03-15 22:19:02'),
(890, 1, '1', 2, 'MALE', '07170504', '07170504', NULL, '$2y$10$RL9GZBhz4mweSp5AM5na6uLONJPtaBgMxu0WQbSTiE7cyKOdukbLe', 'Voter', 0, 0, NULL, '2019-03-15 22:19:02', '2019-03-15 22:19:02'),
(891, 1, '1', 2, 'MALE', '07170505', '07170505', NULL, '$2y$10$T9AtmuMdNZmFwyeJOn9wEOT3TMCBc5rb2miDFdus3uswH8xjZVAc6', 'Voter', 0, 0, NULL, '2019-03-15 22:19:02', '2019-03-15 22:19:02'),
(892, 1, '1', 2, 'MALE', '07170506', '07170506', NULL, '$2y$10$07Kr9Lor4H4tn/mi/xAc..NXuahOI2maJkB6loKFbNHTJy/DEOgzK', 'Voter', 0, 0, NULL, '2019-03-15 22:19:02', '2019-03-15 22:19:02'),
(893, 1, '1', 2, 'MALE', '07170507', '07170507', NULL, '$2y$10$xwL0nR7aIw49JVDFAxbQeOo98unIRsvbYKTbO.XPDzvSputahQONe', 'Voter', 0, 0, NULL, '2019-03-15 22:19:02', '2019-03-15 22:19:02'),
(894, 1, '1', 2, 'MALE', '07170508', '07170508', NULL, '$2y$10$sIorxtyhMDWEptLZdPYNRehAmXA3UG7svWu7L6PfRf5e.QkGpRd6K', 'Voter', 0, 0, NULL, '2019-03-15 22:19:02', '2019-03-15 22:19:02'),
(895, 1, '1', 2, 'MALE', '07170509', '07170509', NULL, '$2y$10$D9ZdnZhK/vG5TH7mUqb07e/xTkPD8qKxlRYA/ymJChbDYlQfxDBCu', 'Voter', 0, 0, NULL, '2019-03-15 22:19:02', '2019-03-15 22:19:02'),
(896, 1, '1', 2, 'MALE', '07170510', '07170510', NULL, '$2y$10$lWg1F8WUxgQD8K2pKyUamuULhgGSoFqjtHjUILV52XDGxKMyYt9Wa', 'Voter', 0, 0, NULL, '2019-03-15 22:19:02', '2019-03-15 22:19:02'),
(897, 1, '1', 2, 'MALE', '07170511', '07170511', NULL, '$2y$10$L.6nGnWMg0bNHmXLYQv27eDXBckzZwhOBx.nIYfa1L4/WZoyo4Lja', 'Voter', 0, 0, NULL, '2019-03-15 22:19:03', '2019-03-15 22:19:03'),
(898, 1, '1', 2, 'MALE', '07170512', '07170512', NULL, '$2y$10$X/8OYBOwksP2ZbDmuEWql.qX6xI4qY1nlvLjGiCQ0SzxBrv3yGpgC', 'Voter', 0, 0, NULL, '2019-03-15 22:19:03', '2019-03-15 22:19:03'),
(899, 1, '1', 2, 'MALE', '07170513', '07170513', NULL, '$2y$10$bEKE8XrDxOAkqORC1gTF9uxUMMZqo1S4B6m.Yt/CtJy4xx/ELRSFa', 'Voter', 0, 0, NULL, '2019-03-15 22:19:03', '2019-03-15 22:19:03'),
(900, 1, '1', 2, 'MALE', '07170514', '07170514', NULL, '$2y$10$8DWHczFo1RCOcCLpDn1jrOlpIyZLKbtEw3lMjCqXqNGlBhJCCV7Du', 'Voter', 0, 0, NULL, '2019-03-15 22:19:03', '2019-03-15 22:19:03'),
(901, 1, '1', 2, 'MALE', '07170515', '07170515', NULL, '$2y$10$3CaFCHyVMBvyQ2yJhm75KupAnRNikFBfG19ix8mJtDvSTr.g23qU2', 'Voter', 0, 0, NULL, '2019-03-15 22:19:03', '2019-03-15 22:19:03'),
(902, 1, '1', 2, 'MALE', '07170516', '07170516', NULL, '$2y$10$sNRmCSgayg6I3Nq6hc57helhQe/Pl8sHsHhAoM6PXanbF.ueszR3C', 'Voter', 0, 0, NULL, '2019-03-15 22:19:03', '2019-03-15 22:19:03'),
(903, 1, '1', 2, 'MALE', '07170517', '07170517', NULL, '$2y$10$GA/JYyF0rRKBHgeIi7d3t.MHQghv62GX4.CxsjYdxqxsTkd.2ag9O', 'Voter', 0, 0, NULL, '2019-03-15 22:19:03', '2019-03-15 22:19:03'),
(904, 1, '1', 2, 'MALE', '07170518', '07170518', NULL, '$2y$10$HP7.niiiDlRKnPKj4DCf/.BrCaAUcwMeOBNcHwfNarVLxIvbKkheK', 'Voter', 0, 0, NULL, '2019-03-15 22:19:03', '2019-03-15 22:19:03'),
(905, 1, '1', 2, 'MALE', '07170519', '07170519', NULL, '$2y$10$ZneLMdm6xNedTFlNA5MnQuyj8Zm.OKvIwoiHN7pKxBtpOfowj.QwG', 'Voter', 0, 0, NULL, '2019-03-15 22:19:03', '2019-03-15 22:19:03'),
(906, 1, '1', 2, 'MALE', '07170520', '07170520', NULL, '$2y$10$Dtyjhgc/IstW6L0Win.zwu6.UOsuI9eNtdI4l0L675S320eeQH6.6', 'Voter', 0, 0, NULL, '2019-03-15 22:19:03', '2019-03-15 22:19:03'),
(907, 1, '1', 2, 'MALE', '07170521', '07170521', NULL, '$2y$10$iNA4Na16ljC6EA9kWGdhSuw2KRw4C/lnTM0Gjh6GlXeyv.CI0qF/K', 'Voter', 0, 0, NULL, '2019-03-15 22:19:03', '2019-03-15 22:19:03'),
(908, 1, '1', 2, 'MALE', '07170522', '07170522', NULL, '$2y$10$qUOs172dsVE5Q6h.m9NScOQh292fm2JOK1ge8.ltvIZt7uOvmeptG', 'Voter', 0, 0, NULL, '2019-03-15 22:19:03', '2019-03-15 22:19:03'),
(909, 1, '1', 2, 'MALE', '07170523', '07170523', NULL, '$2y$10$XjGAbIoNsxCVdBVLNDqdLO9lgX5aKBSwkMRZpxfa8EzouZVkkT/OS', 'Voter', 0, 0, NULL, '2019-03-15 22:19:03', '2019-03-15 22:19:03'),
(910, 1, '1', 2, 'FEMALE', '07170524', '07170524', NULL, '$2y$10$bHZs7JfapMqg4j9emrf0guILZaf.SmHhrbiJWaRQEeUTjgWcqVPem', 'Voter', 0, 0, NULL, '2019-03-15 22:19:03', '2019-03-15 22:19:03'),
(911, 1, '1', 2, 'MALE', '07170525', '07170525', NULL, '$2y$10$KKKHPuxEl.1uYOFoap4GVOWJmSqkuaVEKWxXg4XRo0h3f62f4AhbK', 'Voter', 0, 0, NULL, '2019-03-15 22:19:03', '2019-03-15 22:19:03'),
(912, 1, '1', 2, 'MALE', '07170526', '07170526', NULL, '$2y$10$uQ.6daCyehc7rnR3qp/AteJzpYPTjKXpKpuN79KMeoX/mKOhfh4Ta', 'Voter', 0, 0, NULL, '2019-03-15 22:19:03', '2019-03-15 22:19:03'),
(913, 1, '1', 2, 'MALE', '07170527', '07170527', NULL, '$2y$10$urjBMqjsWzcf0fULeQcyv.ntNZ0lAr.yh5FbtwzzcKWCJ97ABTqBe', 'Voter', 0, 0, NULL, '2019-03-15 22:19:04', '2019-03-15 22:19:04'),
(914, 1, '1', 2, 'MALE', '07170528', '07170528', NULL, '$2y$10$hr4AiOgoEn5XidVRpjWApeY5FC1lsSuNODza.PMcgIYo6qwaCoWEW', 'Voter', 0, 0, NULL, '2019-03-15 22:19:04', '2019-03-15 22:19:04'),
(915, 1, '1', 2, 'MALE', '07170529', '07170529', NULL, '$2y$10$bDXNwXkgQPxThUJ4b43a9ODfk4wnEpp527xggWgJywGHsqoufxj6S', 'Voter', 0, 0, NULL, '2019-03-15 22:19:04', '2019-03-15 22:19:04'),
(916, 1, '1', 2, 'MALE', '07170530', '07170530', NULL, '$2y$10$cdRqI.rUqoI3DsIcFoFeIeT.0kFT25cDFbAduWHv1fvImBJI1sgcW', 'Voter', 0, 0, NULL, '2019-03-15 22:19:04', '2019-03-15 22:19:04'),
(917, 1, '1', 2, 'MALE', '07170531', '07170531', NULL, '$2y$10$Gl15OzAnRIBUY2zQq.04IuCA/PdXwJHX5FkKk5GXyuyw8YzgmobLK', 'Voter', 0, 0, NULL, '2019-03-15 22:19:04', '2019-03-15 22:19:04'),
(918, 1, '1', 2, 'MALE', '07170532', '07170532', NULL, '$2y$10$vJIclGYW/AyxzQlDqdb9q.2ddXuXmrHnOo9uvD6FA74KwkDAmQX86', 'Voter', 0, 0, NULL, '2019-03-15 22:19:04', '2019-03-15 22:19:04'),
(919, 1, '1', 2, 'MALE', '07170533', '07170533', NULL, '$2y$10$QD29V/RkGlypQbh/vz61Xuu8VqMPv.l.PNGNzD70MHDIQYVFnd4l6', 'Voter', 0, 0, NULL, '2019-03-15 22:19:04', '2019-03-15 22:19:04'),
(920, 1, '1', 2, 'MALE', '07170534', '07170534', NULL, '$2y$10$lf/gmTb9uYd.MJw5GY242.qC4E96XSz2oRIH35g/RQAc0ISM57j7i', 'Voter', 0, 0, NULL, '2019-03-15 22:19:04', '2019-03-15 22:19:04'),
(921, 1, '1', 2, 'MALE', '07170535', '07170535', NULL, '$2y$10$4nIxKXcMCxnU7hH2XP/SaeyTXUxsKxW8GKV5dnLCQFC1NtBPjo4iO', 'Voter', 0, 0, NULL, '2019-03-15 22:19:04', '2019-03-15 22:19:04'),
(922, 1, '1', 2, 'MALE', '07170536', '07170536', NULL, '$2y$10$RtQ7KhbTek5.ZdyQ49lS6uCbtJFxKCJZHu.E.f84ip9smVlrr.HcK', 'Voter', 0, 0, NULL, '2019-03-15 22:19:04', '2019-03-15 22:19:04'),
(923, 1, '1', 2, 'MALE', '07170537', '07170537', NULL, '$2y$10$Jm6NP5kOPArx0DdG78gSeO3A1v2uXtIcSCLiQmjkOgOiiN6g5PgVK', 'Voter', 0, 0, NULL, '2019-03-15 22:19:04', '2019-03-15 22:19:04'),
(924, 1, '1', 2, 'MALE', '07170538', '07170538', NULL, '$2y$10$Bnilmcj8KpSDff7nBlCG5uBN6.sBbJFLEK/cbrnI/yHrq5C.OrRC2', 'Voter', 0, 0, NULL, '2019-03-15 22:19:04', '2019-03-15 22:19:04'),
(925, 1, '1', 2, 'MALE', '07170539', '07170539', NULL, '$2y$10$ympdQxRZlhY7Q2WRmdlFDuVm5IOZnuMPvZ05VWhAZ5NJFCuYCaA/2', 'Voter', 0, 0, NULL, '2019-03-15 22:19:04', '2019-03-15 22:19:04'),
(926, 1, '1', 2, 'MALE', '07170540', '07170540', NULL, '$2y$10$WKp8x9ZB7Yvymb0cnfmDVueyZuABCUWB5p8TXZNEZxO3jvJ49sVHO', 'Voter', 0, 0, NULL, '2019-03-15 22:19:04', '2019-03-15 22:19:04'),
(927, 1, '1', 2, 'MALE', '07170541', '07170541', NULL, '$2y$10$VPTIYEoBc3NiHMU2uwqF6ufVB3b67.BoiHyAe.g2Fgz6yvYL1XqSS', 'Voter', 0, 0, NULL, '2019-03-15 22:19:04', '2019-03-15 22:19:04'),
(928, 1, '1', 2, 'MALE', '07170542', '07170542', NULL, '$2y$10$kLoDyXLR.b2L.Fl5KucSaeOzna/1rFYIGG6qW7yNAadMDVxTjFn/6', 'Voter', 0, 0, NULL, '2019-03-15 22:19:04', '2019-03-15 22:19:04'),
(929, 1, '1', 2, 'MALE', '07170543', '07170543', NULL, '$2y$10$4ggiVEK.aG2N7YiUR6/ZVeK8n7YOs0ZFY8P7/O6eIcvATR.tzcyXG', 'Voter', 0, 0, NULL, '2019-03-15 22:19:05', '2019-03-15 22:19:05'),
(930, 1, '1', 2, 'MALE', '07170544', '07170544', NULL, '$2y$10$58e4MRnrdUZ9BvPnI3wqbOIZKR29XQ6dPBpGNU6TMCDWUCa4GTnM6', 'Voter', 0, 0, NULL, '2019-03-15 22:19:05', '2019-03-15 22:19:05'),
(931, 1, '1', 2, 'MALE', '07170545', '07170545', NULL, '$2y$10$8MGJgAaBGBg1H4nMPg4ZROs8pUXqcpzmQtE8yZAs076hPR1lB/LeC', 'Voter', 0, 0, NULL, '2019-03-15 22:19:05', '2019-03-15 22:19:05'),
(932, 1, '1', 2, 'MALE', '07170546', '07170546', NULL, '$2y$10$6CWV4RlXFocDXoJMhbaExeVH9XKGZyVXK13OzboBa5e.P8Rxjyzkm', 'Voter', 0, 0, NULL, '2019-03-15 22:19:05', '2019-03-15 22:19:05'),
(933, 1, '1', 2, 'MALE', '07170547', '07170547', NULL, '$2y$10$O0nB2myIoM/cZNo5x9jC1e1GrS0mciPyEtWcsyztEsc3JxuPvtNjy', 'Voter', 0, 0, NULL, '2019-03-15 22:19:05', '2019-03-15 22:19:05'),
(934, 1, '1', 2, 'MALE', '07170548', '07170548', NULL, '$2y$10$PilXc/VRNohbkFA4sXGvHeEFpaV3vwYqnqyZv1hXmW6/bLA2SG14C', 'Voter', 0, 0, NULL, '2019-03-15 22:19:05', '2019-03-15 22:19:05'),
(935, 1, '1', 2, 'FEMALE', '07170549', '07170549', NULL, '$2y$10$Zw2/KAMcPlQj7uU11zsEEusLvzAxLVmnSB1V/pQP3r2KpthO2dIvW', 'Voter', 0, 0, NULL, '2019-03-15 22:19:05', '2019-03-15 22:19:05'),
(936, 1, '1', 2, 'MALE', '07170550', '07170550', NULL, '$2y$10$nEgiD973PbLCXEwpLuFLMu6BgfkSmFBd/O.laL4/O15gZy6YVnFDK', 'Voter', 0, 0, NULL, '2019-03-15 22:19:05', '2019-03-15 22:19:05'),
(937, 1, '1', 2, 'MALE', '07170551', '07170551', NULL, '$2y$10$CxqFkATUMtPGkYNJUz.zy.JJ.OOcbGFvaHj.nN6loZxbrAlq7T7HC', 'Voter', 0, 0, NULL, '2019-03-15 22:19:05', '2019-03-15 22:19:05'),
(938, 1, '1', 2, 'MALE', '07170552', '07170552', NULL, '$2y$10$FiOM.y5Av48MGPgfF2gfVO7ejGQ1ufZEehSDLA1/Yl1QKY95IZJrm', 'Voter', 0, 0, NULL, '2019-03-15 22:19:05', '2019-03-15 22:19:05'),
(939, 1, '1', 2, 'MALE', '07170553', '07170553', NULL, '$2y$10$Nj8h7oz9NALwNqgInWztc.R8PKJJCWVq4X.J5XYpJSfOjnMVYQc6e', 'Voter', 0, 0, NULL, '2019-03-15 22:19:05', '2019-03-15 22:19:05'),
(940, 1, '1', 2, 'FEMALE', '07170554', '07170554', NULL, '$2y$10$ikzKs5YyU44D1SNgem7GhuRNgomxnHjSOAfoxRfSLPYX7NFuuKQsu', 'Voter', 0, 0, NULL, '2019-03-15 22:19:05', '2019-03-15 22:19:05'),
(941, 1, '1', 2, 'MALE', '07170555', '07170555', NULL, '$2y$10$KIN823JisnDLRsv36/dQ/e4FPOsfxHsX..6nQK7gKkCa4leNlEU2.', 'Voter', 0, 0, NULL, '2019-03-15 22:19:05', '2019-03-15 22:19:05'),
(942, 1, '1', 2, 'MALE', '07170556', '07170556', NULL, '$2y$10$CJizOwILFYReeZGhf3BG/.vzc/D3WNknd/j/IuMkoIJfmViP0JaoW', 'Voter', 0, 0, NULL, '2019-03-15 22:19:05', '2019-03-15 22:19:05'),
(943, 1, '1', 2, 'MALE', '07170558', '07170558', NULL, '$2y$10$vukoOwPkqiY2tgOHBAIZSuOijQ36vuCTmJzPuT9ePANcKTrkjKN4q', 'Voter', 0, 0, NULL, '2019-03-15 22:19:05', '2019-03-15 22:19:05'),
(944, 1, '1', 2, 'MALE', '07170559', '07170559', NULL, '$2y$10$h.cHDPUg7NRlC/Y9RkzA/egJavbULG.qofVY.fVWYcqVS.39ZhSdG', 'Voter', 0, 0, NULL, '2019-03-15 22:19:05', '2019-03-15 22:19:05'),
(945, 1, '1', 2, 'MALE', '07170560', '07170560', NULL, '$2y$10$tn8v3FKwOscOjm.Itp6BuuO7iXId84aNQ29nmSJdjzUCuw1eJT0WW', 'Voter', 0, 0, NULL, '2019-03-15 22:19:05', '2019-03-15 22:19:05'),
(946, 1, '1', 2, 'MALE', '07170562', '07170562', NULL, '$2y$10$E6LoLKfmpEelWKS0ILHYxe1edY4TDUeZxi8Dd.oCmEI/ujpQA0I5G', 'Voter', 0, 0, NULL, '2019-03-15 22:19:06', '2019-03-15 22:19:06'),
(947, 1, '1', 2, 'MALE', '07170563', '07170563', NULL, '$2y$10$ibYMHDPF6YK7h46XeKu79OqNN85Pnt1zBOzslju/q5KVfhV/fi7Pq', 'Voter', 0, 0, NULL, '2019-03-15 22:19:06', '2019-03-15 22:19:06'),
(948, 1, '1', 2, 'MALE', '07170564', '07170564', NULL, '$2y$10$4PCS4Q.knhIbODLfzppXxe6P5M/FxOG7tckydz7GsN9/FD7HrtHo2', 'Voter', 0, 0, NULL, '2019-03-15 22:19:06', '2019-03-15 22:19:06'),
(949, 1, '1', 2, 'FEMALE', '07170565', '07170565', NULL, '$2y$10$N6lKdVSce9nJITacintBEu/rEIP6eGiFAdPE3Ic3omPgETglioZZ2', 'Voter', 0, 0, NULL, '2019-03-15 22:19:06', '2019-03-15 22:19:06'),
(950, 1, '1', 2, 'MALE', '07170566', '07170566', NULL, '$2y$10$CgtB.8/4Ut4HcOKykwg.Ae2kmh1uN4b7k/x0ub5KrPVNaASPqneLu', 'Voter', 0, 0, NULL, '2019-03-15 22:19:06', '2019-03-15 22:19:06'),
(951, 1, '1', 2, 'MALE', '07170567', '07170567', NULL, '$2y$10$EAVajrxb3rwfY1tGh3M7Mu1C//p6dhtCaXxvni3Cp7ukcvP5LQORW', 'Voter', 0, 0, NULL, '2019-03-15 22:19:06', '2019-03-15 22:19:06'),
(952, 1, '1', 2, 'FEMALE', '07170568', '07170568', NULL, '$2y$10$0RyqpfZvQ.FiRp2dbgfo..ktC4UijDwrN6JRXf9ViE9gAabbhHcqW', 'Voter', 0, 0, NULL, '2019-03-15 22:19:06', '2019-03-15 22:19:06'),
(953, 1, '1', 2, 'MALE', '07170569', '07170569', NULL, '$2y$10$JRGAi6SkEFmAwL4jkKaUJuRhqgTR14nOpCvGhleJtK.4LCPMJwY3i', 'Voter', 0, 0, NULL, '2019-03-15 22:19:06', '2019-03-15 22:19:06'),
(954, 1, '1', 2, 'MALE', '07170571', '07170571', NULL, '$2y$10$QZsBVxwdTU4s2nGGKynmyOV7zkzQLgyVGD58.adn87DDWurm4bHzS', 'Voter', 0, 0, NULL, '2019-03-15 22:19:06', '2019-03-15 22:19:06'),
(955, 1, '1', 2, 'MALE', '07170572', '07170572', NULL, '$2y$10$MMhRs4deI/n66c8aK7o4/ewE0SfcCOVoKYEP6JB8OyVh6/75EgxGG', 'Voter', 0, 0, NULL, '2019-03-15 22:19:06', '2019-03-15 22:19:06'),
(956, 1, '1', 2, 'MALE', '07170573', '07170573', NULL, '$2y$10$TekNM8YlnkFus6IjEx2a2e1FVEMmZDAsDps4.xXnv5eSeMfGJCAvW', 'Voter', 0, 0, NULL, '2019-03-15 22:19:06', '2019-03-15 22:19:06'),
(957, 1, '1', 2, 'MALE', '07170574', '07170574', NULL, '$2y$10$n4kaeBzelUFOI/6e3FiBhOU7RnZawDrT0Tx5sRaSVz2aWgoX6M.va', 'Voter', 0, 0, NULL, '2019-03-15 22:19:06', '2019-03-15 22:19:06'),
(958, 1, '1', 2, 'FEMALE', '07170575', '07170575', NULL, '$2y$10$0E9lZUNXYmNsuHFKOw5JUOE3CmgbdZNnxvgpB1j22jCanBe1f3WlO', 'Voter', 0, 0, NULL, '2019-03-15 22:19:06', '2019-03-15 22:19:06'),
(959, 1, '1', 2, 'MALE', '07170576', '07170576', NULL, '$2y$10$pkm9L4GAP58S9hChV5ds.esX60tKZ39y/B/yNzlRfoCBi6tKgmkv2', 'Voter', 0, 0, NULL, '2019-03-15 22:19:06', '2019-03-15 22:19:06'),
(960, 1, '1', 2, 'MALE', '07170577', '07170577', NULL, '$2y$10$ILqlpBoGcOe/PgT7q7IkPOr8lgLX6z6kFTRXyNPhu3pXURxDp.JXa', 'Voter', 0, 0, NULL, '2019-03-15 22:19:06', '2019-03-15 22:19:06'),
(961, 1, '1', 2, 'MALE', '07170578', '07170578', NULL, '$2y$10$nFTr416rMjDGBYIyHXqleu7.Cp8FpcvDG/1wpa/aHAUgGsYKiWNXK', 'Voter', 0, 0, NULL, '2019-03-15 22:19:06', '2019-03-15 22:19:06'),
(962, 1, '1', 2, 'MALE', '07170579', '07170579', NULL, '$2y$10$w.VGh4yy90WO1GKKWYLEEuB8Cr00RqQagvf1HDsERkVBVtdHleNXK', 'Voter', 0, 0, NULL, '2019-03-15 22:19:07', '2019-03-15 22:19:07'),
(963, 1, '1', 2, 'MALE', '07170580', '07170580', NULL, '$2y$10$MYxSj7lVVpwqPZodmxE4IubGFj.07Bu75RCG7HrMCUURvG.RSP1iy', 'Voter', 0, 0, NULL, '2019-03-15 22:19:07', '2019-03-15 22:19:07'),
(964, 1, '1', 2, 'MALE', '07170581', '07170581', NULL, '$2y$10$YlVkd30s0vfkc7mPjrHG8.hcAUpgbJyiAsQUKhRFqKiMSXqQMLxgm', 'Voter', 0, 0, NULL, '2019-03-15 22:19:07', '2019-03-15 22:19:07'),
(965, 1, '1', 2, 'MALE', '07170582', '07170582', NULL, '$2y$10$q186E/isHvjgEjtDtnP93.C1DP5mfPhyu5WtXJklTJ4GuhQBMPQiK', 'Voter', 0, 0, NULL, '2019-03-15 22:19:07', '2019-03-15 22:19:07'),
(966, 1, '1', 2, 'MALE', '07170583', '07170583', NULL, '$2y$10$BkrQ7smZwTNqQngxC5eEteR78LWy1lj8oFTKYMD27lbL9IpOEswjW', 'Voter', 0, 0, NULL, '2019-03-15 22:19:07', '2019-03-15 22:19:07'),
(967, 1, '1', 2, 'MALE', '07170584', '07170584', NULL, '$2y$10$XEKA9EhIsQVkBAyLWyYRWusFYgZOxXzXNDkqFieLRKdA3Ki9EVxAW', 'Voter', 0, 0, NULL, '2019-03-15 22:19:07', '2019-03-15 22:19:07'),
(968, 1, '1', 2, 'MALE', '07170586', '07170586', NULL, '$2y$10$G9F.zaMEsamqhH/ooxYcc.UNeD.6GnCZYc5mftszLK7FL5ssbcIam', 'Voter', 0, 0, NULL, '2019-03-15 22:19:07', '2019-03-15 22:19:07'),
(969, 1, '1', 2, 'MALE', '07170587', '07170587', NULL, '$2y$10$HulVfZiIwmi3ecumH0x4EeqCoOcf6HwrUffvZ4L6Agh7Aii46hTNm', 'Voter', 0, 0, NULL, '2019-03-15 22:19:07', '2019-03-15 22:19:07'),
(970, 1, '1', 2, 'MALE', '07170588', '07170588', NULL, '$2y$10$Ncv4AwU2q4L42.o/LGhlyuML0ylypJihGAwg8s4H2tloL5PGnI6jG', 'Voter', 0, 0, NULL, '2019-03-15 22:19:07', '2019-03-15 22:19:07'),
(971, 1, '1', 2, 'MALE', '07170589', '07170589', NULL, '$2y$10$0IIym806xhXKJNelKMMTl.xm17hatUXQdojzTjEIF1ydIISddgr1W', 'Voter', 0, 0, NULL, '2019-03-15 22:19:07', '2019-03-15 22:19:07'),
(972, 1, '1', 2, 'MALE', '07170590', '07170590', NULL, '$2y$10$C1w5qtYgUJ7KCTGzypk3z.QcOcWW.757z63qr3kAtG/4KbEixhjLW', 'Voter', 0, 0, NULL, '2019-03-15 22:19:07', '2019-03-15 22:19:07'),
(973, 1, '1', 2, 'MALE', '07170591', '07170591', NULL, '$2y$10$uXXXxFd9USQfEDJebR/mZejU1Wg9L.e8S9GddDo2rO45cthNy.8yS', 'Voter', 0, 0, NULL, '2019-03-15 22:19:07', '2019-03-15 22:19:07'),
(974, 1, '1', 2, 'MALE', '07170594', '07170594', NULL, '$2y$10$7f8QIY4laOJVZdHv.Q.NkOgTmAazNeyXzA3EHGgAq3kK5A6ssxjqm', 'Voter', 0, 0, NULL, '2019-03-15 22:19:07', '2019-03-15 22:19:07'),
(975, 1, '1', 2, 'MALE', '07170595', '07170595', NULL, '$2y$10$QzX/ow9MW2WJbC4NyH9QKuKFSQvsIwM1q0lly7P8tPfCswB8a5WFS', 'Voter', 0, 0, NULL, '2019-03-15 22:19:07', '2019-03-15 22:19:07'),
(976, 1, '1', 2, 'MALE', '07170596', '07170596', NULL, '$2y$10$ohsXySLaDGstPeEdrgw5yuqCIlp02IVINcYJ7wUzXQKNxRxk.6Dn6', 'Voter', 0, 0, NULL, '2019-03-15 22:19:07', '2019-03-15 22:19:07'),
(977, 1, '1', 2, 'MALE', '07170597', '07170597', NULL, '$2y$10$ZwoqbkNmooXFkwXzdI.9euHX.c4J95s6jrKVfoZlnughylvwMChiy', 'Voter', 0, 0, NULL, '2019-03-15 22:19:07', '2019-03-15 22:19:07'),
(978, 1, '1', 2, 'MALE', '07170598', '07170598', NULL, '$2y$10$iSfO2MmG28qf22oydBwQTOGS5pNSYLjAUx6D5cPNe3U2Vc0w757ze', 'Voter', 0, 0, NULL, '2019-03-15 22:19:07', '2019-03-15 22:19:07'),
(979, 1, '1', 2, 'MALE', '07170599', '07170599', NULL, '$2y$10$ujfaWEbcALMfN/Q.HvwLc.BZgiP6ehxJbrmCHTYL3bHou/1zWaHQS', 'Voter', 0, 0, NULL, '2019-03-15 22:19:08', '2019-03-15 22:19:08'),
(980, 1, '1', 2, 'MALE', '07170600', '07170600', NULL, '$2y$10$mh/x0yfIIYKByl4CFgF57eRAp1OEHeS7P9pXXF4MWTGYPGU1y5XNa', 'Voter', 0, 0, NULL, '2019-03-15 22:19:08', '2019-03-15 22:19:08'),
(981, 1, '1', 2, 'MALE', '07170601', '07170601', NULL, '$2y$10$8.gPECNVzyyiCclInlfm2ue7cTx2v/54gBfC5u9WV/JPMZgqpCMhm', 'Voter', 0, 0, NULL, '2019-03-15 22:19:08', '2019-03-15 22:19:08'),
(982, 1, '1', 2, 'MALE', '07170602', '07170602', NULL, '$2y$10$hfegToYpC9yvIi3jutxU9OHuiaA0GVcQCjpNKzjQ6dvgaFZb6nnjq', 'Voter', 0, 0, NULL, '2019-03-15 22:19:08', '2019-03-15 22:19:08'),
(983, 1, '1', 2, 'MALE', '07170603', '07170603', NULL, '$2y$10$J/3A2sJjdVBLWzQvXYj3BO2I7NfiF2lSul9Urkq96VjMHGND7BjD.', 'Voter', 0, 0, NULL, '2019-03-15 22:19:08', '2019-03-15 22:19:08'),
(984, 1, '1', 2, 'FEMALE', '07170605', '07170605', NULL, '$2y$10$YavFu9aWoPcUvuyGiXFHY.ooMxHBHPlTcub1r1RZcg6EdqfZe9ik2', 'Voter', 0, 0, NULL, '2019-03-15 22:19:08', '2019-03-15 22:19:08'),
(985, 1, '1', 2, 'MALE', '07170606', '07170606', NULL, '$2y$10$/U9beMVjkgFTSVObG1ROPOGVeh0y1eYVZYt5.jQTwer/nvUG1L9F6', 'Voter', 0, 0, NULL, '2019-03-15 22:19:08', '2019-03-15 22:19:08'),
(986, 1, '1', 2, 'MALE', '07170609', '07170609', NULL, '$2y$10$LJ3ZfgBhBcOiRNkHUbAJe.0xPekDppyQUEPy9q8SImO8R2p/DGSMC', 'Voter', 0, 0, NULL, '2019-03-15 22:19:08', '2019-03-15 22:19:08'),
(987, 1, '1', 2, 'MALE', '07170611', '07170611', NULL, '$2y$10$EdmMjf6RVESu7BbYs9/eP.YBmQ.zsJYEDzxZcTGzKQjjfh1u.DYQm', 'Voter', 0, 0, NULL, '2019-03-15 22:19:08', '2019-03-15 22:19:08'),
(988, 1, '1', 2, 'MALE', '07170612', '07170612', NULL, '$2y$10$saHxtBDXmllvoYUBnliJyORVla6NTChgnePyr5ZdaK7/g5l1LQBAS', 'Voter', 0, 0, NULL, '2019-03-15 22:19:08', '2019-03-15 22:19:08'),
(989, 1, '1', 2, 'MALE', '07170613', '07170613', NULL, '$2y$10$AqcjkW5VGijtZUey0jGcbuikq/pFeIfSpt83u3NrNbKsBF.B7CAEG', 'Voter', 0, 0, NULL, '2019-03-15 22:19:08', '2019-03-15 22:19:08'),
(990, 1, '1', 2, 'MALE', '07170614', '07170614', NULL, '$2y$10$k8UhPHt1UwAP2l05mLhTVe9gfdlf2HXlo3WFxTatLkL3HgS3yA8UC', 'Voter', 0, 0, NULL, '2019-03-15 22:19:08', '2019-03-15 22:19:08'),
(991, 1, '1', 2, 'MALE', '07170615', '07170615', NULL, '$2y$10$1NNG95bGn2klOurOknX88OVRbRXPRZ8bKacsr0MvFstk4Ycvs6bBq', 'Voter', 0, 0, NULL, '2019-03-15 22:19:08', '2019-03-15 22:19:08'),
(992, 1, '1', 2, 'MALE', '07170616', '07170616', NULL, '$2y$10$Tx.XzOGZ6hzZHFpNxXRsW.OkV4jy2VArT6cidnCqm3GXjwBw6po9C', 'Voter', 0, 0, NULL, '2019-03-15 22:19:08', '2019-03-15 22:19:08'),
(993, 1, '1', 2, 'MALE', '07170617', '07170617', NULL, '$2y$10$hj0aL/Ft/x0Ul4b9AoDeIeMycA7XCP19S4B6f09C8BCdRPtIY0jo2', 'Voter', 0, 0, NULL, '2019-03-15 22:19:08', '2019-03-15 22:19:08'),
(994, 1, '1', 2, 'MALE', '07170618', '07170618', NULL, '$2y$10$yNK0dWEGjKtjp/JNgFshe.vfrX1udK6G9VVHqrl30fLP..JlMcsWy', 'Voter', 0, 0, NULL, '2019-03-15 22:19:08', '2019-03-15 22:19:08'),
(995, 1, '1', 2, 'MALE', '07170619', '07170619', NULL, '$2y$10$SzUkcs6k6N8hGRgNUUeWu.GLXmVYo7r9C9OH63b7IYgTc9Ndb4xtW', 'Voter', 0, 0, NULL, '2019-03-15 22:19:09', '2019-03-15 22:19:09'),
(996, 1, '1', 2, 'MALE', '07170620', '07170620', NULL, '$2y$10$ZIBlMPBjHYx8BJkx1BO77e3y98TGgbzwkqIaI8S.ydOKQCsdn1yPG', 'Voter', 0, 0, NULL, '2019-03-15 22:19:09', '2019-03-15 22:19:09'),
(997, 1, '1', 2, 'MALE', '07170621', '07170621', NULL, '$2y$10$rMJ/B0wo7SCP3rn0q5/X5.mOyoPPFnAD4clDeR6UzOXeR1WZyaDV6', 'Voter', 0, 0, NULL, '2019-03-15 22:19:09', '2019-03-15 22:19:09'),
(998, 1, '1', 2, 'MALE', '07170622', '07170622', NULL, '$2y$10$4YbOhrQTQT9uHvh7mRThW.rAgoTHUKSYi.B47tGgrjqw4SlXwE8jm', 'Voter', 0, 0, NULL, '2019-03-15 22:19:09', '2019-03-15 22:19:09'),
(999, 1, '1', 2, 'MALE', '07170623', '07170623', NULL, '$2y$10$rdtzQA2eR4vVo6HPV3jMueRSeE9elwugQ3GHkdrSgzh5qQZnOke3W', 'Voter', 0, 0, NULL, '2019-03-15 22:19:09', '2019-03-15 22:19:09'),
(1000, 1, '1', 2, 'MALE', '07170625', '07170625', NULL, '$2y$10$DFIP3ZLCMN7Q/IQ4hJoNI.sjyD3TRXG.Qm5VwOM0LLuk7d3pPkoSu', 'Voter', 0, 0, NULL, '2019-03-15 22:19:09', '2019-03-15 22:19:09'),
(1001, 1, '1', 2, 'MALE', '07170626', '07170626', NULL, '$2y$10$l3JxJxISKY.MX5xDt.2Q2OJ5yuq354pAKk1mIQPMreXBwBxkp/24O', 'Voter', 0, 0, NULL, '2019-03-15 22:19:09', '2019-03-15 22:19:09'),
(1002, 1, '1', 2, 'MALE', '07170627', '07170627', NULL, '$2y$10$JEciA8Lfwo2koDuPmbI5yu2dt319siuEQCyiUeyvhr4SBV328vqFy', 'Voter', 0, 0, NULL, '2019-03-15 22:19:09', '2019-03-15 22:19:09'),
(1003, 1, '1', 2, 'MALE', '07170629', '07170629', NULL, '$2y$10$o4KEyZjk3l8zQf.H154UouCaQds.s2iV.Oq/JabDPl7cN2YctTmTa', 'Voter', 0, 0, NULL, '2019-03-15 22:19:09', '2019-03-15 22:19:09'),
(1004, 1, '1', 2, 'MALE', '07170630', '07170630', NULL, '$2y$10$fb2SlBrNtWn2HBRpQpIhYuo/Etvb5GMpbdZUaRikU.hGRZvu7lfvi', 'Voter', 0, 0, NULL, '2019-03-15 22:19:09', '2019-03-15 22:19:09'),
(1005, 1, '1', 2, 'MALE', '07170632', '07170632', NULL, '$2y$10$4JCHpacRF1i0Qfncg5rf/O6cvkHbx7B3f.lV3BgYloHJQNlcvquaC', 'Voter', 0, 0, NULL, '2019-03-15 22:19:09', '2019-03-15 22:19:09'),
(1006, 1, '1', 2, 'MALE', '07170633', '07170633', NULL, '$2y$10$cFLQRjRIkV1k7s7IpGWn0eg5/TXZ8d3gL/q78lVuzMe3cH8YT19JK', 'Voter', 0, 0, NULL, '2019-03-15 22:19:09', '2019-03-15 22:19:09'),
(1007, 1, '1', 2, 'MALE', '07170635', '07170635', NULL, '$2y$10$tH74OEDMKWTvfOracuFCEO/J9Z81xYGBpcyFf.siYyoH4dnDsWGcu', 'Voter', 0, 0, NULL, '2019-03-15 22:19:09', '2019-03-15 22:19:09'),
(1008, 1, '1', 2, 'MALE', '07170637', '07170637', NULL, '$2y$10$XVb2AYbf5UkCiiavkebKYOfvsC04NFPWT8DqMX1BKyv.e4Fl8dkM2', 'Voter', 0, 0, NULL, '2019-03-15 22:19:09', '2019-03-15 22:19:09'),
(1009, 1, '1', 2, 'MALE', '07170638', '07170638', NULL, '$2y$10$d/QsaB/eVewusmDojTzj1.3.QBpXvmkGCb0kJ034yPOUxyhZuyjt2', 'Voter', 0, 0, NULL, '2019-03-15 22:19:09', '2019-03-15 22:19:09'),
(1010, 1, '1', 2, 'MALE', '07170640', '07170640', NULL, '$2y$10$eyOaxo5qhZqa8loUzi8THOTqqoD6nARKKbY1DOtIDEZeCopabSRFu', 'Voter', 0, 0, NULL, '2019-03-15 22:19:09', '2019-03-15 22:19:09'),
(1011, 1, '1', 2, 'FEMALE', '07170641', '07170641', NULL, '$2y$10$Xl9T2D7EjoT5aokEToM/yu3d9Is5XlpooiKKE8RH7vENcOY8qT.2K', 'Voter', 0, 0, NULL, '2019-03-15 22:19:09', '2019-03-15 22:19:09'),
(1012, 1, '1', 2, 'MALE', '07170642', '07170642', NULL, '$2y$10$EParg5NOusOY6iCdPtedOOUk7LgTRxWvnTjTmYNUOSSCIgvu4GgiO', 'Voter', 0, 0, NULL, '2019-03-15 22:19:10', '2019-03-15 22:19:10'),
(1013, 1, '1', 2, 'MALE', '07170643', '07170643', NULL, '$2y$10$sgwR08bgiBbZP2TL/UOm.uvpHT3geDcs8wVUl3.l07mG3JFpv7M.W', 'Voter', 0, 0, NULL, '2019-03-15 22:19:10', '2019-03-15 22:19:10'),
(1014, 1, '1', 2, 'MALE', '07170644', '07170644', NULL, '$2y$10$IsWyNQnxU2jlUUN7jHn7/eLV8oqqP4nSnowdiqKt.tOrL0xsAHnoW', 'Voter', 0, 0, NULL, '2019-03-15 22:19:10', '2019-03-15 22:19:10'),
(1015, 1, '1', 2, 'MALE', '07170645', '07170645', NULL, '$2y$10$PDCxzWlSKZZtqA4PBWCn2uaUMrkVtn5KBuC4Kl4rbGGTWInOzEdLG', 'Voter', 0, 0, NULL, '2019-03-15 22:19:10', '2019-03-15 22:19:10'),
(1016, 1, '1', 2, 'MALE', '07170646', '07170646', NULL, '$2y$10$6zqA7T/U/yrl223C5xqBg.bNe2A.icuKSqExWaouox4Cb3WJajMM2', 'Voter', 0, 0, NULL, '2019-03-15 22:19:10', '2019-03-15 22:19:10'),
(1017, 1, '1', 2, 'MALE', '07170647', '07170647', NULL, '$2y$10$PY6GeCAa4rler.SMCR5/4ejLLh4nzJh4dQi2ZVP6WcA74EBqpu9l2', 'Voter', 0, 0, NULL, '2019-03-15 22:19:10', '2019-03-15 22:19:10'),
(1018, 1, '1', 2, 'FEMALE', '07170648', '07170648', NULL, '$2y$10$G7L0XmlTTSSqeWZf3FU1Bu8DwNSoIUA7NXaLTd38x6V7cLzZUG4xG', 'Voter', 0, 0, NULL, '2019-03-15 22:19:10', '2019-03-15 22:19:10'),
(1019, 1, '1', 2, 'MALE', '07170649', '07170649', NULL, '$2y$10$tnCyrV2mZVoEu5Q4OraTZOYWWAtzlDgRuCJoGZoJcQ/ZExRvf8NRS', 'Voter', 0, 0, NULL, '2019-03-15 22:19:10', '2019-03-15 22:19:10'),
(1020, 1, '1', 2, 'FEMALE', '07170650', '07170650', NULL, '$2y$10$vSxuIa4ptxZNkWwixZcBkeUusKVGVT1oRcH1zyojoGKQJNZX4jqt.', 'Voter', 0, 0, NULL, '2019-03-15 22:19:10', '2019-03-15 22:19:10'),
(1021, 1, '1', 2, 'MALE', '07170651', '07170651', NULL, '$2y$10$PPDzVBKWJjxxUvVNOKr15ehnN6sgpI6zJOF.BPMeicDTXRFygebRm', 'Voter', 0, 0, NULL, '2019-03-15 22:19:10', '2019-03-15 22:19:10'),
(1022, 1, '1', 2, 'MALE', '07170652', '07170652', NULL, '$2y$10$j5dxI70iEqt5KYoVccUhfOStdGr2RaiIGty7Jl91a9yCPlTLmJbTC', 'Voter', 0, 0, NULL, '2019-03-15 22:19:10', '2019-03-15 22:19:10'),
(1023, 1, '1', 2, 'MALE', '07170654', '07170654', NULL, '$2y$10$qSTkgwkbkZvsfaaFj3.zlOSHg8Rmq2TGOxzbfZDkjdgDbcAHkHE3G', 'Voter', 0, 0, NULL, '2019-03-15 22:19:10', '2019-03-15 22:19:10'),
(1024, 1, '1', 2, 'MALE', '07170655', '07170655', NULL, '$2y$10$mcCS1UJCEF19MRIVuSEq9Osd1JqCK0Xf5gDy44j49UC1KFnzyep3q', 'Voter', 0, 0, NULL, '2019-03-15 22:19:10', '2019-03-15 22:19:10'),
(1025, 1, '1', 2, 'FEMALE', '07170656', '07170656', NULL, '$2y$10$5KVAvsEgOMeL8.uB9gnrMOvk1PmffWYylhBmpb7OjKW9FGUHAuJy.', 'Voter', 0, 0, NULL, '2019-03-15 22:19:10', '2019-03-15 22:19:10'),
(1026, 1, '1', 2, 'MALE', '07170657', '07170657', NULL, '$2y$10$jv8Lu/KdiHYFF4H0UoNg8uQNp5MaU6j3sy1Ek0XnL78Fqlp1pr0Ym', 'Voter', 0, 0, NULL, '2019-03-15 22:19:10', '2019-03-15 22:19:10'),
(1027, 1, '1', 2, 'MALE', '07170658', '07170658', NULL, '$2y$10$Q9t.FmOBmm9YJwzG67Pz5ezDInC4S7HHYwCN3bFWxhcJkvwCutLtS', 'Voter', 0, 0, NULL, '2019-03-15 22:19:10', '2019-03-15 22:19:10'),
(1028, 1, '1', 2, 'MALE', '07170659', '07170659', NULL, '$2y$10$5VCZsdj0DS6qsl6ApsP7S.woInvPaVnR5RXg3DXRyn04.yHzbwg4K', 'Voter', 0, 0, NULL, '2019-03-15 22:19:11', '2019-03-15 22:19:11'),
(1029, 1, '1', 2, 'MALE', '07170660', '07170660', NULL, '$2y$10$D1Ck4AV/2JUUF.u9W0LqS.o4/3TonY78NFJccXalRvVrFCPHR7xSO', 'Voter', 0, 0, NULL, '2019-03-15 22:19:11', '2019-03-15 22:19:11'),
(1030, 1, '1', 2, 'MALE', '07170661', '07170661', NULL, '$2y$10$YynEiCEtbcPRhtfpMsLrRe7uQsxCCraiFLlpsnLGEqt07.OFHkscK', 'Voter', 0, 0, NULL, '2019-03-15 22:19:11', '2019-03-15 22:19:11'),
(1031, 1, '1', 2, 'MALE', '07170662', '07170662', NULL, '$2y$10$ny51JMDvRasqEMBgN/OUMea1BVmUvAjTXt3Lu2B/PAisoJC1JP7ba', 'Voter', 0, 0, NULL, '2019-03-15 22:19:11', '2019-03-15 22:19:11'),
(1032, 1, '1', 2, 'MALE', '07170663', '07170663', NULL, '$2y$10$TULMJNRflPounjCEs8MQFuPWbI/2s7nPnOel8WHxY5ZyDiULGq0GS', 'Voter', 0, 0, NULL, '2019-03-15 22:19:11', '2019-03-15 22:19:11'),
(1033, 1, '1', 2, 'MALE', '07170664', '07170664', NULL, '$2y$10$C.6nZmNOKpEMKddypFr/HerlGD/71vZeXs2T8pVlZTH/NrFCWIFlS', 'Voter', 0, 0, NULL, '2019-03-15 22:19:11', '2019-03-15 22:19:11'),
(1034, 1, '1', 2, 'MALE', '07170665', '07170665', NULL, '$2y$10$fj0P.fHEkIg3a4ojecjBPe0B.IJH.s/AAUCt1BULmCNX69JbbuMvG', 'Voter', 0, 0, NULL, '2019-03-15 22:19:11', '2019-03-15 22:19:11'),
(1035, 1, '1', 2, 'MALE', '07170666', '07170666', NULL, '$2y$10$HxcYUjrj.Rh/0SSbxLxPrONavvg8VwARoJ/xOWuECfzY70VFnNe1e', 'Voter', 0, 0, NULL, '2019-03-15 22:19:11', '2019-03-15 22:19:11'),
(1036, 1, '1', 2, 'MALE', '07170667', '07170667', NULL, '$2y$10$w5iqcIhcEfQJiY3mEy7ztePmewQH4Md0GjpUUhFi0oVdN/GPfcuAu', 'Voter', 0, 0, NULL, '2019-03-15 22:19:11', '2019-03-15 22:19:11'),
(1037, 1, '1', 2, 'FEMALE', '07170668', '07170668', NULL, '$2y$10$pzQvxvmEAzntRNSP6eKoI.QpT1HrVJwuXFWWfeWxMWJFRRFbLI2v2', 'Voter', 0, 0, NULL, '2019-03-15 22:19:11', '2019-03-15 22:19:11'),
(1038, 1, '1', 2, 'MALE', '07170669', '07170669', NULL, '$2y$10$molu3vQxAQLG.o7GS2ln7ewsPQt4lDCAAuYn.rZL6qbbbsyamqSOC', 'Voter', 0, 0, NULL, '2019-03-15 22:19:11', '2019-03-15 22:19:11'),
(1039, 1, '1', 2, 'MALE', '07170670', '07170670', NULL, '$2y$10$SOnoUp05c5BKr2cceM/qJeQFLQq7Z.JcNywaGw9NwChZC8D5Xl3Zq', 'Voter', 0, 0, NULL, '2019-03-15 22:19:11', '2019-03-15 22:19:11'),
(1040, 1, '1', 2, 'MALE', '07170671', '07170671', NULL, '$2y$10$Nh9x3YYqz4CLAu3BgLSy3eMkmT8fxDZPOifLLWpiOt7VZQbPy8YW6', 'Voter', 0, 0, NULL, '2019-03-15 22:19:11', '2019-03-15 22:19:11'),
(1041, 1, '1', 2, 'MALE', '07170672', '07170672', NULL, '$2y$10$9T48XNSsoNMsgAQxyAxKre8k3i.pCjAE9h.KfWzenSKDlc062Hm5y', 'Voter', 0, 0, NULL, '2019-03-15 22:19:11', '2019-03-15 22:19:11'),
(1042, 1, '1', 2, 'MALE', '07170673', '07170673', NULL, '$2y$10$feDovHsc6X9ja0yp4ONBL.w0wddaxe5z7RmH6KUpIfkWOo4v7R1Ya', 'Voter', 0, 0, NULL, '2019-03-15 22:19:11', '2019-03-15 22:19:11'),
(1043, 1, '1', 2, 'MALE', '07170674', '07170674', NULL, '$2y$10$fZQxWLaXZ4okc92VZ9EIzuIM.IW9Qj9NqkRpqfdyzFMcPKsp8eK6y', 'Voter', 0, 0, NULL, '2019-03-15 22:19:11', '2019-03-15 22:19:11'),
(1044, 1, '1', 2, 'MALE', '07170675', '07170675', NULL, '$2y$10$xGYjrbeo3BFVlVxLFOgbyuL.G.YqqE90cxmiuC6cBF5eVAzlJvRFS', 'Voter', 0, 0, NULL, '2019-03-15 22:19:11', '2019-03-15 22:19:11'),
(1045, 1, '1', 2, 'MALE', '07170676', '07170676', NULL, '$2y$10$T7PVExs8bqudt2hZ3ceCy.Q2cEp.IDHhOlecF.bO/b/jY0jfz8R0G', 'Voter', 0, 0, NULL, '2019-03-15 22:19:12', '2019-03-15 22:19:12'),
(1046, 1, '1', 2, 'MALE', '07170677', '07170677', NULL, '$2y$10$FiLaeWwJ5xI42t3DGBSjY.ZLzF6U370xw8H9hPdPFg0w1Y8FCxFeu', 'Voter', 0, 0, NULL, '2019-03-15 22:19:12', '2019-03-15 22:19:12'),
(1047, 1, '1', 2, 'MALE', '07170678', '07170678', NULL, '$2y$10$nWfmXBiFt3ScdshqjF7fceTTI89Wh3ry22iujjY6q/dIwGlb220Jq', 'Voter', 0, 0, NULL, '2019-03-15 22:19:12', '2019-03-15 22:19:12'),
(1048, 1, '1', 2, 'MALE', '07170679', '07170679', NULL, '$2y$10$N0VHv5KCOCC9rWOxsiUAg.ISxJOtA/FRF0wMxYiMLRDSU88I.gFyS', 'Voter', 0, 0, NULL, '2019-03-15 22:19:12', '2019-03-15 22:19:12'),
(1049, 1, '1', 2, 'MALE', '07170680', '07170680', NULL, '$2y$10$FuPieOa0i9Uw3ETnhKzegeDZeGQdlfDn1vKgQZAucuG839GkXK2Q.', 'Voter', 0, 0, NULL, '2019-03-15 22:19:12', '2019-03-15 22:19:12'),
(1050, 1, '1', 2, 'MALE', '07170681', '07170681', NULL, '$2y$10$DPHeOGCmp8ZXtZb1sPUw8uK4RYg.31wMnImOaA2PK4Ag//yLr/jrW', 'Voter', 0, 0, NULL, '2019-03-15 22:19:12', '2019-03-15 22:19:12'),
(1051, 1, '1', 2, 'FEMALE', '07170682', '07170682', NULL, '$2y$10$GPXP68UVepSmh4on8NGNWOr9IgkoYqq1Vdf/qiqwsyGEBE.Jai/Yu', 'Voter', 0, 0, NULL, '2019-03-15 22:19:12', '2019-03-15 22:19:12'),
(1052, 1, '1', 2, 'MALE', '07170683', '07170683', NULL, '$2y$10$kx1jkW7mdUeTLE11/cDv.e9eQ0zlSDZ75TUzukUPdEKQAiqEGz9Sa', 'Voter', 0, 0, NULL, '2019-03-15 22:19:12', '2019-03-15 22:19:12'),
(1053, 1, '1', 2, 'MALE', '07170684', '07170684', NULL, '$2y$10$gjr6TeTjiEOOh3YkyU9Ul.f3ebNBDmVfrVvaepT8tEgW9o29W8.EO', 'Voter', 0, 0, NULL, '2019-03-15 22:19:12', '2019-03-15 22:19:12'),
(1054, 1, '1', 2, 'MALE', '07170685', '07170685', NULL, '$2y$10$Hj9bdwQp8nR6y5y/QxNQz.ZQhdJj6lFJQ70EYESff/QcKX0AQBws6', 'Voter', 0, 0, NULL, '2019-03-15 22:19:12', '2019-03-15 22:19:12'),
(1055, 1, '1', 2, 'MALE', '07170686', '07170686', NULL, '$2y$10$vDmwkGKXnkRULqtPTvZotuEbTzC3AwoWwvn62doAW/uHSC4T7l7s.', 'Voter', 0, 0, NULL, '2019-03-15 22:19:12', '2019-03-15 22:19:12'),
(1056, 1, '1', 2, 'MALE', '07170687', '07170687', NULL, '$2y$10$/USCNKGz3cc9wSRWc1mCLeNK/j71UyCudeE2R5pNBekLLSMC8nyGu', 'Voter', 0, 0, NULL, '2019-03-15 22:19:12', '2019-03-15 22:19:12'),
(1057, 1, '1', 2, 'FEMALE', '07170688', '07170688', NULL, '$2y$10$w.kUohWOZLUijvl0N2Wpwe.ZO2Hzj2RcSn4AIVa.qEqi5gOIYwOci', 'Voter', 0, 0, NULL, '2019-03-15 22:19:12', '2019-03-15 22:19:12'),
(1058, 1, '1', 2, 'MALE', '07170689', '07170689', NULL, '$2y$10$iP/xje4Lz0QNEapRnUUEg.015hImivZs7r67K52E7oiWaTb.pOGqi', 'Voter', 0, 0, NULL, '2019-03-15 22:19:12', '2019-03-15 22:19:12'),
(1059, 1, '1', 2, 'FEMALE', '07170690', '07170690', NULL, '$2y$10$RKdd881wLS3Bld7A9p3gw.Es96.4m.zx6lJ/4epnrdwRGKxEwgejO', 'Voter', 0, 0, NULL, '2019-03-15 22:19:12', '2019-03-15 22:19:12'),
(1060, 1, '1', 2, 'FEMALE', '07170691', '07170691', NULL, '$2y$10$jUQTTLudyDUHKguiR3ZNuOzYlhuXpRmQuFhM57unIROJWc6njeDrq', 'Voter', 0, 0, NULL, '2019-03-15 22:19:12', '2019-03-15 22:19:12'),
(1061, 1, '1', 2, 'MALE', '07170692', '07170692', NULL, '$2y$10$oKmcLCdeilqiXfKGrAFyAOjXOnUxzAKnG.z0Ld32URi1LmKd6YJQm', 'Voter', 0, 0, NULL, '2019-03-15 22:19:13', '2019-03-15 22:19:13'),
(1062, 1, '1', 2, 'MALE', '07170694', '07170694', NULL, '$2y$10$b406Zcpch29XKL2KmsQC0uOw86CBwBSvWOrRfoMu6TKWWQ5ZFNmvS', 'Voter', 0, 0, NULL, '2019-03-15 22:19:13', '2019-03-15 22:19:13'),
(1063, 1, '1', 2, 'FEMALE', '07170695', '07170695', NULL, '$2y$10$lYJZxW3AFturG5FBNbQrV.nKSeVMVFuGWaO65P6AaGcvLVBGadOvS', 'Voter', 0, 0, NULL, '2019-03-15 22:19:13', '2019-03-15 22:19:13'),
(1064, 1, '1', 2, 'MALE', '07170696', '07170696', NULL, '$2y$10$lM//lG4VDyRQVI31md5mZ.osk6eVXreSRUS86xtgPMI0vQFKkVXxa', 'Voter', 0, 0, NULL, '2019-03-15 22:19:13', '2019-03-15 22:19:13'),
(1065, 1, '1', 2, 'MALE', '07170697', '07170697', NULL, '$2y$10$N/Nkd4EPYwclFy4YI/0KKOCT4.w.x.vp9ZuOpjGGaMe/mj1FRqrxK', 'Voter', 0, 0, NULL, '2019-03-15 22:19:13', '2019-03-15 22:19:13'),
(1066, 1, '1', 2, 'MALE', '07170698', '07170698', NULL, '$2y$10$bfs5epKSK.wfR5I2Rskp5Og7XG58trxLCB2XDGkGtQmHPkmU0/wtG', 'Voter', 0, 0, NULL, '2019-03-15 22:19:13', '2019-03-15 22:19:13'),
(1067, 1, '1', 2, 'MALE', '07170699', '07170699', NULL, '$2y$10$iE2fQNESz3Yp98gZNxdIGuKJdPe2wMSXepy33blbBwsEdFy2l2i/S', 'Voter', 0, 0, NULL, '2019-03-15 22:19:13', '2019-03-15 22:19:13'),
(1068, 1, '1', 2, 'MALE', '07170700', '07170700', NULL, '$2y$10$CB3W8Ln51daEoCG.JNzuu.6aYobt1rnzaUpNnQmqodEil5IxEjbiS', 'Voter', 0, 0, NULL, '2019-03-15 22:19:13', '2019-03-15 22:19:13'),
(1069, 1, '1', 2, 'MALE', '07170701', '07170701', NULL, '$2y$10$4RcxhN8/tB1pia1xPeq8E.tErITBVh/OSAFk7cltwr6XwgMs79mPq', 'Voter', 0, 0, NULL, '2019-03-15 22:19:13', '2019-03-15 22:19:13'),
(1070, 1, '1', 2, 'MALE', '07170702', '07170702', NULL, '$2y$10$xUajqARmYT2CWvaYMyRiQOH3TA5Twwd5p1sZt5qZGAjvQZyS1u41S', 'Voter', 0, 0, NULL, '2019-03-15 22:19:13', '2019-03-15 22:19:13'),
(1071, 1, '1', 2, 'MALE', '07170703', '07170703', NULL, '$2y$10$J.WYlevCci14PBk/21WELODCzyoJleBC0K97bPIhHV7EtIiFzxV6C', 'Voter', 0, 0, NULL, '2019-03-15 22:19:13', '2019-03-15 22:19:13'),
(1072, 1, '1', 2, 'MALE', '07170704', '07170704', NULL, '$2y$10$paLHq0bMcrUmGqc6OTBn9epzaj3AEMcA7Bvt/GOXm0ELWJ/jgXV1K', 'Voter', 0, 0, NULL, '2019-03-15 22:19:13', '2019-03-15 22:19:13'),
(1073, 1, '1', 2, 'MALE', '07170705', '07170705', NULL, '$2y$10$aKXt0xHMEAeXfJFRa1ETvuB/QNIhuoAJTyrER0mZZ.h3gC4MQGIEO', 'Voter', 0, 0, NULL, '2019-03-15 22:19:13', '2019-03-15 22:19:13'),
(1074, 1, '1', 2, 'MALE', '07170706', '07170706', NULL, '$2y$10$dPQiPg.BemqR3z//WQCw/ehT4tZO4KGYkWcgo9MDcIrDqgHrN0chy', 'Voter', 0, 0, NULL, '2019-03-15 22:19:13', '2019-03-15 22:19:13'),
(1075, 1, '1', 2, 'MALE', '07170707', '07170707', NULL, '$2y$10$IGNf84Y49k5d9G/dewVBlOErOqZ1H29qV1LfEg4Cnk6nNqgiP.je6', 'Voter', 0, 0, NULL, '2019-03-15 22:19:13', '2019-03-15 22:19:13'),
(1076, 1, '1', 2, 'MALE', '07170708', '07170708', NULL, '$2y$10$H5MM3yvJngYSdLmmKIJt8OV/ubrIQvOOUhdISRzkJIVZWbECLMJhm', 'Voter', 0, 0, NULL, '2019-03-15 22:19:13', '2019-03-15 22:19:13'),
(1077, 1, '1', 2, 'MALE', '07170709', '07170709', NULL, '$2y$10$FYBSG6wJ9TOt1bMvFW4GR.3kL6jatavXGalPZgBxwuEQTLIsXDgpC', 'Voter', 0, 0, NULL, '2019-03-15 22:19:14', '2019-03-15 22:19:14'),
(1078, 1, '1', 2, 'MALE', '07170710', '07170710', NULL, '$2y$10$6q36Y5JimqeGqZcyqSzxkO1KUpbqrCQTmN2tsGVJzYQk3oL6CEyXK', 'Voter', 0, 0, NULL, '2019-03-15 22:19:14', '2019-03-15 22:19:14'),
(1079, 1, '1', 2, 'MALE', '07170711', '07170711', NULL, '$2y$10$tQAhcvtzaSYUqmWvXAwOk.9QYdOPPWP9zQEerADdy8YQKhQECJtQu', 'Voter', 0, 0, NULL, '2019-03-15 22:19:14', '2019-03-15 22:19:14'),
(1080, 1, '1', 2, 'MALE', '07170712', '07170712', NULL, '$2y$10$0Ostyr2mnx0R0foOkhtJdeGonrI8HlSttuzBD0Ky5FDodiEyh8Epy', 'Voter', 0, 0, NULL, '2019-03-15 22:19:14', '2019-03-15 22:19:14'),
(1081, 1, '1', 2, 'MALE', '07170713', '07170713', NULL, '$2y$10$NxvEiJz4Mk6E4fUhHbSpa.AV6.MPm4.GvThEqlMWXN3hBoKLjhPG.', 'Voter', 0, 0, NULL, '2019-03-15 22:19:14', '2019-03-15 22:19:14'),
(1082, 1, '1', 2, 'MALE', '07170714', '07170714', NULL, '$2y$10$JdlqSyc.c.D0/P.GJbpgieZrl5wHBUSFj7CD4581qRcpAPTVT01xW', 'Voter', 0, 0, NULL, '2019-03-15 22:19:14', '2019-03-15 22:19:14'),
(1083, 1, '1', 2, 'MALE', '07170715', '07170715', NULL, '$2y$10$VGwxCFjOgEGIN/Mq6ALHT.8MyBXUq3n5tRN.xiiBPtlp8hIoj5m0C', 'Voter', 0, 0, NULL, '2019-03-15 22:19:14', '2019-03-15 22:19:14'),
(1084, 1, '1', 2, 'MALE', '07170716', '07170716', NULL, '$2y$10$t1gftUvIrzIhqmB7GcSf/.drDpgTDg8GvKXwbz.vvDLn1ol3kP.Sy', 'Voter', 0, 0, NULL, '2019-03-15 22:19:14', '2019-03-15 22:19:14'),
(1085, 1, '1', 2, 'MALE', '07170717', '07170717', NULL, '$2y$10$EWaXAxYJJOyT.rh8GJA3JuDqd9EI9xKfpKRo6kllnE5vxvrvPXfMe', 'Voter', 0, 0, NULL, '2019-03-15 22:19:14', '2019-03-15 22:19:14'),
(1086, 1, '1', 2, 'MALE', '07170718', '07170718', NULL, '$2y$10$kdJZWK3CX5XbvYrNDIvcSuu78Ct9cXtf3E4Z6whxVqKdoiqPzA6RO', 'Voter', 0, 0, NULL, '2019-03-15 22:19:14', '2019-03-15 22:19:14'),
(1087, 1, '1', 2, 'MALE', '07170719', '07170719', NULL, '$2y$10$eoQ0U49kOa8fb1vtCdFK3elcMr6rtixzSruytROUGEnN8xj/htb.u', 'Voter', 0, 0, NULL, '2019-03-15 22:19:14', '2019-03-15 22:19:14'),
(1088, 1, '1', 2, 'MALE', '07170720', '07170720', NULL, '$2y$10$N9ScXrSB7ujPzuZ6PmlxTekT/j.yyU5S3HG2JNvOUK/mJ4wQdojKS', 'Voter', 0, 0, NULL, '2019-03-15 22:19:14', '2019-03-15 22:19:14'),
(1089, 1, '1', 2, 'MALE', '07170721', '07170721', NULL, '$2y$10$TZ.FdaBcN2EmBFXjlpzIcO571fgEeCIYBP.vpOdWM53Q7vNxDhYYe', 'Voter', 0, 0, NULL, '2019-03-15 22:19:14', '2019-03-15 22:19:14'),
(1090, 1, '1', 2, 'MALE', '07170722', '07170722', NULL, '$2y$10$zFmxOdC9sJWAime4QoqjTOR1SKgkIqb6qRqOfZvhMSLY7D5YMy2em', 'Voter', 0, 0, NULL, '2019-03-15 22:19:14', '2019-03-15 22:19:14'),
(1091, 1, '1', 2, 'MALE', '07170723', '07170723', NULL, '$2y$10$/pFAebWSdSZftRx/uMcc8eD9ipWbUKQ1hakFlXHPaZDAZis4O09C2', 'Voter', 0, 0, NULL, '2019-03-15 22:19:14', '2019-03-15 22:19:14'),
(1092, 1, '1', 3, 'MALE', '07152709', '07152709', NULL, '$2y$10$PQrkuFs0MoCXp0AAGQHp3OIF.NjY1XYd3qKz5oDNmPzFXt5FOl/Pa', 'Voter', 0, 0, NULL, '2019-03-15 22:19:42', '2019-03-15 22:19:42'),
(1093, 1, '1', 3, 'MALE', '07152718', '07152718', NULL, '$2y$10$VydM8EIwr84zvVE0VwqZaO3RkJ6joZitFuQNFE8NwPnOX0imWBAwO', 'Voter', 0, 0, NULL, '2019-03-15 22:19:42', '2019-03-15 22:19:42'),
(1094, 1, '1', 3, 'MALE', '07162701', '07162701', NULL, '$2y$10$do7UjzC/1iHejOXnIWPH/uAnaBVwNR9WcSJQ724j/H3TAJO.jAwSG', 'Voter', 0, 0, NULL, '2019-03-15 22:19:42', '2019-03-15 22:19:42'),
(1095, 1, '1', 3, 'MALE', '07162702', '07162702', NULL, '$2y$10$kydyX9KLLtXwAgzybf0.Du54rlzMa/h2D2dIcg1q5WYNJsBN.B.7y', 'Voter', 0, 0, NULL, '2019-03-15 22:19:42', '2019-03-15 22:19:42'),
(1096, 1, '1', 3, 'MALE', '07162703', '07162703', NULL, '$2y$10$MvYPU7mHFtv/TAgEqtzLnugKQtE4BDOOfQE7UHgN65EGH9bRSXVmG', 'Voter', 0, 0, NULL, '2019-03-15 22:19:42', '2019-03-15 22:19:42'),
(1097, 1, '1', 3, 'MALE', '07162704', '07162704', NULL, '$2y$10$ZXZYKLJVVaborULJQEPfse1gpAPI4g1Tht0M.fmGGwqcnklKP67Xy', 'Voter', 0, 0, NULL, '2019-03-15 22:19:42', '2019-03-15 22:19:42'),
(1098, 1, '1', 3, 'MALE', '07162705', '07162705', NULL, '$2y$10$zjsG13uVgjQAmA0ws9NXNeFbrCGNllMLPA07nQFa57hgoyJGLswpG', 'Voter', 0, 0, NULL, '2019-03-15 22:19:42', '2019-03-15 22:19:42'),
(1099, 1, '1', 3, 'MALE', '07162706', '07162706', NULL, '$2y$10$V99iWgP3hFibmNraX2pjnORM702k8gj4GDqZtiATBBKhayo03glfe', 'Voter', 0, 0, NULL, '2019-03-15 22:19:42', '2019-03-15 22:19:42'),
(1100, 1, '1', 3, 'MALE', '07162707', '07162707', NULL, '$2y$10$msY4othLZCnqQvNCziYg2.yoIZihrZ0YKsGGNmsGF7uyg2d/RxAXe', 'Voter', 0, 0, NULL, '2019-03-15 22:19:42', '2019-03-15 22:19:42'),
(1101, 1, '1', 3, 'MALE', '07162708', '07162708', NULL, '$2y$10$xM99cs/A4gblVNBuVJAXpO1qlYYxY04vpwcP9CMou4522xA6THl36', 'Voter', 0, 0, NULL, '2019-03-15 22:19:42', '2019-03-15 22:19:42'),
(1102, 1, '1', 3, 'MALE', '07162709', '07162709', NULL, '$2y$10$scymlPqjmTX2CMQD9lx.E.2IHxFOZ0xniGXVCwEKgvpXBlGMqTCxO', 'Voter', 0, 0, NULL, '2019-03-15 22:19:42', '2019-03-15 22:19:42'),
(1103, 1, '1', 3, 'MALE', '07162710', '07162710', NULL, '$2y$10$viswUrlSgxRxIHgvGMwKdub4Bn3Z6riLkrzl//iyqvnTpLM8J9vC6', 'Voter', 0, 0, NULL, '2019-03-15 22:19:42', '2019-03-15 22:19:42'),
(1104, 1, '1', 3, 'MALE', '07162711', '07162711', NULL, '$2y$10$BmXss0W0CZV52dQF79JQiOdzM98O4FqLUIiPBM1I5OQadSJxNvrvq', 'Voter', 0, 0, NULL, '2019-03-15 22:19:42', '2019-03-15 22:19:42'),
(1105, 1, '1', 3, 'MALE', '07162712', '07162712', NULL, '$2y$10$UmSqoNJKXIxHu6ue2lVqv.HGAeeKDCv7oZd6VZnK2cq1TzYdZYW8y', 'Voter', 0, 0, NULL, '2019-03-15 22:19:42', '2019-03-15 22:19:42'),
(1106, 1, '1', 3, 'FEMALE', '07162713', '07162713', NULL, '$2y$10$mkOhilVmHNTDtSMGJnodNuhyw1bPWbhVe5ulDfTTxInzPH6ueNZMy', 'Voter', 0, 0, NULL, '2019-03-15 22:19:42', '2019-03-15 22:19:42'),
(1107, 1, '1', 3, 'MALE', '07162715', '07162715', NULL, '$2y$10$7Uy3pOnlIBdRuvzsRwOOFeySqdnsP/4DS5LB8ADlwuhTUXCYGwEti', 'Voter', 0, 0, NULL, '2019-03-15 22:19:43', '2019-03-15 22:19:43'),
(1108, 1, '1', 3, 'MALE', '07162716', '07162716', NULL, '$2y$10$tTXOOJ9KLxgfK5gXbHl9eOwAOY.m7L0HcU/Hgs.r.Q1h.mLOft05.', 'Voter', 0, 0, NULL, '2019-03-15 22:19:43', '2019-03-15 22:19:43'),
(1109, 1, '1', 3, 'FEMALE', '07162717', '07162717', NULL, '$2y$10$ftwEXeE9M1M4mn1oOcZUyOLb0USiLRZ4.lG0q9mhhhb5MzLmLEgZ2', 'Voter', 0, 0, NULL, '2019-03-15 22:19:43', '2019-03-15 22:19:43'),
(1110, 1, '1', 3, 'MALE', '07162718', '07162718', NULL, '$2y$10$bHtZAY1tq1jLgiWqFWKSneFMxkg7Ih94BswbVvAqJnY7HnEI7Xune', 'Voter', 0, 0, NULL, '2019-03-15 22:19:43', '2019-03-15 22:19:43'),
(1111, 1, '1', 3, 'MALE', '07162719', '07162719', NULL, '$2y$10$9l.jb73/pLrsTzQGS.0lV.QX1XMhqL9iS379VBDzqwRHYXylKKK4u', 'Voter', 0, 0, NULL, '2019-03-15 22:19:43', '2019-03-15 22:19:43'),
(1112, 1, '1', 3, 'MALE', '07162720', '07162720', NULL, '$2y$10$SEkgfrZPG6DV73g.EyNSfu9fwGaysmyfZ32A8KEkTdFGI2Y7oRJOC', 'Voter', 0, 0, NULL, '2019-03-15 22:19:43', '2019-03-15 22:19:43'),
(1113, 1, '1', 3, 'MALE', '07162721', '07162721', NULL, '$2y$10$FPS.pBPirf4gQmhnyMeZLuLewjI4WBNfyMqGLXZILZlBycGcjPg7q', 'Voter', 0, 0, NULL, '2019-03-15 22:19:43', '2019-03-15 22:19:43'),
(1114, 1, '1', 3, 'MALE', '07162722', '07162722', NULL, '$2y$10$LiJ/4yG7J6R0DYEsn6vWquS6HtpPLPBEJ1Hy6LBxaka5rDhWYH39a', 'Voter', 0, 0, NULL, '2019-03-15 22:19:43', '2019-03-15 22:19:43'),
(1115, 1, '1', 3, 'MALE', '07162723', '07162723', NULL, '$2y$10$k5ETR62Ouuvzi8ZKgZGba.4b2makWzCdGVGfgYojdNmueu.1RyVTO', 'Voter', 0, 0, NULL, '2019-03-15 22:19:43', '2019-03-15 22:19:43'),
(1116, 1, '1', 3, 'FEMALE', '07162724', '07162724', NULL, '$2y$10$uD54DDY0wOCnoCcUGlJLkeI0yM92cv6mzX/P/S67fY4Z.pqsDBvJ6', 'Voter', 0, 0, NULL, '2019-03-15 22:19:43', '2019-03-15 22:19:43'),
(1117, 1, '1', 3, 'MALE', '07162725', '07162725', NULL, '$2y$10$mtiL3YHLkyf97naBdXAUGOpePZNeONKDrZgexf98J4nPcbySPBQmW', 'Voter', 0, 0, NULL, '2019-03-15 22:19:43', '2019-03-15 22:19:43'),
(1118, 1, '1', 3, 'MALE', '07162726', '07162726', NULL, '$2y$10$fd1IpQpeMuOy72QO7dJAIuSam4APMo9iVE2uBTiPrZajOpL3Qjx12', 'Voter', 0, 0, NULL, '2019-03-15 22:19:43', '2019-03-15 22:19:43'),
(1119, 1, '1', 3, 'MALE', '07162727', '07162727', NULL, '$2y$10$uVUEKuROdlSbgmQJ5TbdpezdcBUTbNzHzWieSrx6TRC6GLSLM8OSe', 'Voter', 0, 0, NULL, '2019-03-15 22:19:43', '2019-03-15 22:19:43'),
(1120, 1, '1', 3, 'MALE', '07162728', '07162728', NULL, '$2y$10$DaiU4kWFNeXUlvF.meZqgeXo8TR.d/NfBowiCxa4wP8IyTARbdMNC', 'Voter', 0, 0, NULL, '2019-03-15 22:19:43', '2019-03-15 22:19:43'),
(1121, 1, '1', 3, 'MALE', '07162729', '07162729', NULL, '$2y$10$Eb/F2nx4yHsvwRGjY1S0ZOUq1QbfFyp.Yde.926pF0L9xS8qyvMIq', 'Voter', 0, 0, NULL, '2019-03-15 22:19:43', '2019-03-15 22:19:43'),
(1122, 1, '1', 3, 'MALE', '07162730', '07162730', NULL, '$2y$10$lCw1dMMiq6Gq31dkclUy5uOtz3tpusLpsnBFjls1MNY0ySHQBrQuO', 'Voter', 0, 0, NULL, '2019-03-15 22:19:43', '2019-03-15 22:19:43'),
(1123, 1, '1', 3, 'MALE', '07162731', '07162731', NULL, '$2y$10$vrRi9Y5bJofF/jlwNe7KL.h7PHGBOj.mw6Oe5H3cbc9DC0AU6p0QG', 'Voter', 0, 0, NULL, '2019-03-15 22:19:43', '2019-03-15 22:19:43'),
(1124, 1, '1', 3, 'MALE', '07162732', '07162732', NULL, '$2y$10$fl2Cb2i9ND4euhaW4OHk0uiQboRKCcOAPfncjbYnwkFRBdAf8.yDS', 'Voter', 0, 0, NULL, '2019-03-15 22:19:44', '2019-03-15 22:19:44'),
(1125, 1, '1', 3, 'FEMALE', '07162733', '07162733', NULL, '$2y$10$RaSkJFjqiaA.4nG5OhC/V.ROsY/xgvxEpt4Z7ETr8LOQ6nElVUvca', 'Voter', 0, 0, NULL, '2019-03-15 22:19:44', '2019-03-15 22:19:44'),
(1126, 1, '1,2', 3, 'MALE', '07162734', '07162734', NULL, '$2y$10$fvt0jkqXYRzHOuptitQA2ekqrylAFT8Vh2Z.wd3wb6QygzmL8vH5q', 'Voter', 0, 1, 'QC9nQlQYm517ZFYS3W8F0DWrcBqv8GpImOjO8EChHYwySavhH5HGwJMs0fEU', '2019-03-15 22:19:44', '2019-03-17 18:51:46'),
(1127, 1, '1', 3, 'MALE', '07162735', '07162735', NULL, '$2y$10$xzaIEH7oSGJ9JbV5wU5qfueatOKjFiaC8Q2cXJJYJ3KxQi5Zj7dqO', 'Voter', 0, 0, NULL, '2019-03-15 22:19:44', '2019-03-15 22:19:44'),
(1128, 1, '1', 3, 'MALE', '07162736', '07162736', NULL, '$2y$10$hg15P9zMV07QCsXNgN.tpO0RERP7eG.NO6qjv7n9kGn.9NlS/otmS', 'Voter', 0, 0, NULL, '2019-03-15 22:19:44', '2019-03-15 22:19:44'),
(1129, 1, '1', 3, 'MALE', '07162737', '07162737', NULL, '$2y$10$5lyOU6TYe2shMCox59lK8uUWUoyrMjDVnotnYQyoz5uD5TUfgxxxS', 'Voter', 0, 0, NULL, '2019-03-15 22:19:44', '2019-03-15 22:19:44'),
(1130, 1, '1', 3, 'MALE', '07162738', '07162738', NULL, '$2y$10$7XBcjIj/DmgHeuhyfcj6QuQV76ZSZ8vAVTe2xtEoeFrHLNNS5Q2L6', 'Voter', 0, 0, NULL, '2019-03-15 22:19:44', '2019-03-15 22:19:44'),
(1131, 1, '1', 3, 'MALE', '07162739', '07162739', NULL, '$2y$10$pHLNxo58s5DjGr2RQReqheV24Pb4Ua1mfsxZ4aXsgMEi4OtlplxV6', 'Voter', 0, 0, NULL, '2019-03-15 22:19:44', '2019-03-15 22:19:44'),
(1132, 1, '1', 3, 'FEMALE', '07162740', '07162740', NULL, '$2y$10$pUCxHRS0uuKGIfmmhp1fLeFIiXND61iuYLrg9F/4O0vwS.qSgPgiO', 'Voter', 0, 0, NULL, '2019-03-15 22:19:44', '2019-03-15 22:19:44'),
(1133, 1, '1', 3, 'FEMALE', '07162741', '07162741', NULL, '$2y$10$izYi5y7gIHZHs7yl8rR9leTg45Sl8I0wwWnr/IKdie2wGTxpBcPCe', 'Voter', 0, 0, NULL, '2019-03-15 22:19:44', '2019-03-15 22:19:44'),
(1134, 1, '1', 3, 'MALE', '07162742', '07162742', NULL, '$2y$10$rcTeCIh8F.HvdqudlFvtY.YraB6dvjdbnIiX5jWiwdMTfsPBmc4Y2', 'Voter', 0, 0, NULL, '2019-03-15 22:19:44', '2019-03-15 22:19:44');
INSERT INTO `users` (`id`, `department_id`, `voting_id`, `level_id`, `gender`, `name`, `username`, `email`, `password`, `role`, `updated`, `voted`, `remember_token`, `created_at`, `updated_at`) VALUES
(1135, 1, '1', 3, 'MALE', '07162743', '07162743', NULL, '$2y$10$LkJTDWcZ4Fsm6gkijkgI2ONJ6LiB7Z3V2hqfotxHAAcjyux7hs1fi', 'Voter', 0, 0, NULL, '2019-03-15 22:19:44', '2019-03-15 22:19:44'),
(1136, 1, '1', 3, 'MALE', '07162744', '07162744', NULL, '$2y$10$e4M6ZWDOtWmFDRg04p/R3uygRfgoHcMduGQYB9y9dDfF3NAfHs9OO', 'Voter', 0, 0, NULL, '2019-03-15 22:19:44', '2019-03-15 22:19:44'),
(1137, 1, '1', 3, 'MALE', '07162745', '07162745', NULL, '$2y$10$dX38Ugo9YtzHF.FaQoKDje74t4w9dhewE5d2HQETK6sQbiK2mR8.a', 'Voter', 0, 0, NULL, '2019-03-15 22:19:44', '2019-03-15 22:19:44'),
(1138, 1, '1', 3, 'MALE', '07162746', '07162746', NULL, '$2y$10$MAtHIRuIYXHJ3FZ9RPvBK.M1nQhmQP.PtHML17FCQzgakFUC.S/Aa', 'Voter', 0, 0, NULL, '2019-03-15 22:19:44', '2019-03-15 22:19:44'),
(1139, 1, '1', 3, 'MALE', '07162747', '07162747', NULL, '$2y$10$gRQKRkYW9dLWxtI72CQnUOMGkbB/YEa52FsD2GaFUNIEo8b9wC796', 'Voter', 0, 0, NULL, '2019-03-15 22:19:44', '2019-03-15 22:19:44'),
(1140, 1, '1', 3, 'MALE', '07162748', '07162748', NULL, '$2y$10$TR5piHAPywKtKIXTN8M5j.W8WFYzKb8jFpAoi5PI3NAfZnDNmHVNy', 'Voter', 0, 0, NULL, '2019-03-15 22:19:44', '2019-03-15 22:19:44'),
(1141, 1, '1', 3, 'MALE', '07162749', '07162749', NULL, '$2y$10$UCNnOQEKHa9/kTnkIetQe.b2h6cigfk.YP.X8RqxF5.I18XEjXFqe', 'Voter', 0, 0, NULL, '2019-03-15 22:19:45', '2019-03-15 22:19:45'),
(1142, 1, '1', 3, 'MALE', '07162750', '07162750', NULL, '$2y$10$RFK.nnSGc.p6Z4KiZeud6.QHOdcYMCbRwWWxfiia.jiIbp7QsaowS', 'Voter', 0, 0, NULL, '2019-03-15 22:19:45', '2019-03-15 22:19:45'),
(1143, 1, '1', 3, 'MALE', '07162751', '07162751', NULL, '$2y$10$ZPGryOuA3ZsPJdnZzIhDw.Vv.x1By0Zo08FfB3MRSsR75e2Y06wLC', 'Voter', 0, 0, NULL, '2019-03-15 22:19:45', '2019-03-15 22:19:45'),
(1144, 1, '1', 3, 'MALE', '07162752', '07162752', NULL, '$2y$10$GEE8zP..cGD7C/4TAnK.b.l7wLcDtS7H0UmubJMxNIBIk5O5xUgmm', 'Voter', 0, 0, NULL, '2019-03-15 22:19:45', '2019-03-15 22:19:45'),
(1145, 1, '1', 3, 'MALE', '07162753', '07162753', NULL, '$2y$10$B5mq9x0HVvtks/u.E3HBZuWt8LmX5VFaJAt.gVoVV5S4UuFs4OSEa', 'Voter', 0, 0, NULL, '2019-03-15 22:19:45', '2019-03-15 22:19:45'),
(1146, 1, '1', 3, 'MALE', '07162754', '07162754', NULL, '$2y$10$0zfYwv6U1jhWI/RGlVuxGe8VpJKM3kSkfPTxrnJKOu/fYSRaoV/BK', 'Voter', 0, 0, NULL, '2019-03-15 22:19:45', '2019-03-15 22:19:45'),
(1147, 1, '1', 3, 'MALE', '07162755', '07162755', NULL, '$2y$10$WxAZlR1QINyOomKRL.APnO3skdFYOQfHrLoTu/NonXQ4FtQLn2tPK', 'Voter', 0, 0, NULL, '2019-03-15 22:19:45', '2019-03-15 22:19:45'),
(1148, 1, '1', 3, 'MALE', '07162756', '07162756', NULL, '$2y$10$CgDHvyMRDRFr0zHLwPeoDeaNP8YFMtus5mnebbsP2P8b0UY7EoISq', 'Voter', 0, 0, NULL, '2019-03-15 22:19:45', '2019-03-15 22:19:45'),
(1149, 1, '1', 3, 'MALE', '07162757', '07162757', NULL, '$2y$10$jDogHvboT4AvnTzJdTcJleSEn6okISgoyIm464ivZ7vdShOIKip3O', 'Voter', 0, 0, NULL, '2019-03-15 22:19:45', '2019-03-15 22:19:45'),
(1150, 1, '1', 3, 'MALE', '07162758', '07162758', NULL, '$2y$10$s5HS19I0TXs51VXcFX.INeUMDb3EHihyIL2W57fNDoq5SANx4CmWC', 'Voter', 0, 0, NULL, '2019-03-15 22:19:45', '2019-03-15 22:19:45'),
(1151, 1, '1', 3, 'MALE', '07162759', '07162759', NULL, '$2y$10$RrZhN2kwBlkprFIFLBXt2emM3UFbz25rYCERZ1ZP2kGSEVUu6sNDO', 'Voter', 0, 0, NULL, '2019-03-15 22:19:45', '2019-03-15 22:19:45'),
(1152, 1, '1', 3, 'MALE', '07162760', '07162760', NULL, '$2y$10$ADoUEx9Hup9RwvxBlhIdkOlPRszDrKN3AMpM6NXtdZxK0ZFQDLyvu', 'Voter', 0, 0, NULL, '2019-03-15 22:19:45', '2019-03-15 22:19:45'),
(1153, 1, '1', 3, 'MALE', '07162761', '07162761', NULL, '$2y$10$hX.1P4F0nrDlkJP3TyTDZejffbTqDw0PbFQtpZldfU5rXDeurT.mS', 'Voter', 0, 0, NULL, '2019-03-15 22:19:45', '2019-03-15 22:19:45'),
(1154, 1, '1', 3, 'MALE', '07162762', '07162762', NULL, '$2y$10$Xf8bxqRC.Z0/QzLIWuhlbOr2OqghYRvsLS7sEbitcImV3wMuVQMEy', 'Voter', 0, 0, NULL, '2019-03-15 22:19:45', '2019-03-15 22:19:45'),
(1155, 1, '1', 3, 'MALE', '07162763', '07162763', NULL, '$2y$10$N8tWOl4gs96ki9YWs/hKG.pJg1hvWAV3xGuMK0Q9maKXFxPwPk9ZS', 'Voter', 0, 0, NULL, '2019-03-15 22:19:45', '2019-03-15 22:19:45'),
(1156, 1, '1', 3, 'MALE', '07162764', '07162764', NULL, '$2y$10$dEMgJswpT0ANPasuLPzPY.FH2rBDL0fOlzM8gIHKaaVnLnV9WQCtW', 'Voter', 0, 0, NULL, '2019-03-15 22:19:46', '2019-03-15 22:19:46'),
(1157, 1, '1', 3, 'MALE', '07162765', '07162765', NULL, '$2y$10$DH/jgrrFr.YS9iixZnpRWuNluayWlxUWCABXT04ng8pBxs/9wdXf.', 'Voter', 0, 0, NULL, '2019-03-15 22:19:46', '2019-03-15 22:19:46'),
(1158, 1, '1', 3, 'FEMALE', '07162766', '07162766', NULL, '$2y$10$z.jmNrVCqzdbEexF9SXF/eXRlhDyy2Wb3dOeIq.pP65MinMDQcLbe', 'Voter', 0, 0, NULL, '2019-03-15 22:19:46', '2019-03-15 22:19:46'),
(1159, 1, '1', 3, 'MALE', '07162767', '07162767', NULL, '$2y$10$6ieKNnWSyu155GaaBFykPOkiexXviM6gXBsACVuHMTDughdCXa8zW', 'Voter', 0, 0, NULL, '2019-03-15 22:19:46', '2019-03-15 22:19:46'),
(1160, 1, '1', 3, 'MALE', '07162768', '07162768', NULL, '$2y$10$10FPd9ae7SEypwrrbsXjlelYtsOzPMirmS.9GRkFPJTh8V8CRMj6y', 'Voter', 0, 0, NULL, '2019-03-15 22:19:46', '2019-03-15 22:19:46'),
(1161, 1, '1', 3, 'MALE', '07162769', '07162769', NULL, '$2y$10$ieGToLL.sZMtkLqqlCrBF.IAslNscBFX0ECFDw8bodgzeH6ccMWgi', 'Voter', 0, 0, NULL, '2019-03-15 22:19:46', '2019-03-15 22:19:46'),
(1162, 1, '1', 3, 'MALE', '07162770', '07162770', NULL, '$2y$10$88jPf83OAcanqkmU9wohgeVJT4hpSfKS02M1HBNs50cljto.vdGIq', 'Voter', 0, 0, NULL, '2019-03-15 22:19:46', '2019-03-15 22:19:46'),
(1163, 1, '1', 3, 'MALE', '07162771', '07162771', NULL, '$2y$10$fexOfQPD2Wmi5ShgAesRXOZsCSIkNwjUN0xeiWpQSkXj/YgLuUWF.', 'Voter', 0, 0, NULL, '2019-03-15 22:19:46', '2019-03-15 22:19:46'),
(1164, 1, '1', 3, 'MALE', '07162772', '07162772', NULL, '$2y$10$zRLRcelZ3ePP5KNzXCMb..Tn3anZf7lvsy1OREjuT9Braqz6pscsS', 'Voter', 0, 0, NULL, '2019-03-15 22:19:46', '2019-03-15 22:19:46'),
(1165, 1, '1', 3, 'MALE', '07162773', '07162773', NULL, '$2y$10$FbFcHH0z73Oy2JvT66.poOi8.wvp.YkXJyT0y2QO4gpL/okhmxm0a', 'Voter', 0, 0, NULL, '2019-03-15 22:19:46', '2019-03-15 22:19:46'),
(1166, 1, '1', 3, 'MALE', '07162774', '07162774', NULL, '$2y$10$NvKSwat83Xb8VJMMRhpjX.bf1rAm0wC/7rXcTh41KGqM5tFnkGSsq', 'Voter', 0, 0, NULL, '2019-03-15 22:19:46', '2019-03-15 22:19:46'),
(1167, 1, '1', 3, 'MALE', '07162775', '07162775', NULL, '$2y$10$JHmkghSl6X0Oj6/fxwOfPe0tJ8I7NDA74xQb/Ymv6o1VJtBpOphem', 'Voter', 0, 0, NULL, '2019-03-15 22:19:46', '2019-03-15 22:19:46'),
(1168, 1, '1', 3, 'MALE', '07162776', '07162776', NULL, '$2y$10$cHMFw6slvt4v7JE4IDQpYOgQ2qVq41jGfZBP/57dafcoTzhW3LUZW', 'Voter', 0, 0, NULL, '2019-03-15 22:19:46', '2019-03-15 22:19:46'),
(1169, 1, '1', 3, 'MALE', '07162777', '07162777', NULL, '$2y$10$SPumelc8C6bgsKC./K9pP.s6GqPVPUJT6il4hs26GrNifxoZ9zP8S', 'Voter', 0, 0, NULL, '2019-03-15 22:19:46', '2019-03-15 22:19:46'),
(1170, 1, '1', 3, 'MALE', '07162778', '07162778', NULL, '$2y$10$/VtczUGfWR4U05VqooP0yOVC7EpXVdIpezsSGgOpZowhi10P5OwWG', 'Voter', 0, 0, NULL, '2019-03-15 22:19:46', '2019-03-15 22:19:46'),
(1171, 1, '1', 3, 'MALE', '07162779', '07162779', NULL, '$2y$10$lQEqaVwyrEARJHFufLKqEORXSbOHif2b1P5fpkAV8Y.ZcQ7RkQEBu', 'Voter', 0, 0, NULL, '2019-03-15 22:19:46', '2019-03-15 22:19:46'),
(1172, 1, '1', 3, 'MALE', '07162781', '07162781', NULL, '$2y$10$vmWXJr/zvvhU1Xe/k36wOOS0L0Qr7soLF3f1GUQW1ObTA1mSyC2K2', 'Voter', 0, 0, NULL, '2019-03-15 22:19:47', '2019-03-15 22:19:47'),
(1173, 1, '1', 3, 'MALE', '07162782', '07162782', NULL, '$2y$10$1oVwgc.bXwFrg84PRbkhkO/Ceos3JQ5Q8IsNn/ZGbyI1mO96e/3CC', 'Voter', 0, 0, NULL, '2019-03-15 22:19:47', '2019-03-15 22:19:47'),
(1174, 1, '1', 3, 'MALE', '07162783', '07162783', NULL, '$2y$10$EsgyH8t85ceytfYFU85MKez2xQyTCOekPcn93RsgoNsOgt.Q2Kuja', 'Voter', 0, 0, NULL, '2019-03-15 22:19:47', '2019-03-15 22:19:47'),
(1175, 1, '1', 3, 'MALE', '07162784', '07162784', NULL, '$2y$10$cge7IqGQZg4/Lqbk2J2lAe8OWYjyC6CwT2Kkajl/7CVZhQLLXJ.We', 'Voter', 0, 0, NULL, '2019-03-15 22:19:47', '2019-03-15 22:19:47'),
(1176, 1, '1', 3, 'MALE', '07162785', '07162785', NULL, '$2y$10$HBaV/e27noNEhif5YU4EPepbRu8CtJkq9UDrbfbXwzEnP4lAsSODa', 'Voter', 0, 0, NULL, '2019-03-15 22:19:47', '2019-03-15 22:19:47'),
(1177, 1, '1', 3, 'MALE', '07162786', '07162786', NULL, '$2y$10$v/b8ZXxYJRCPwK5TnQzUveysJwQxG4yY8Cbr/Wz80hiwVj2x98d8u', 'Voter', 0, 0, NULL, '2019-03-15 22:19:47', '2019-03-15 22:19:47'),
(1178, 1, '1', 3, 'MALE', '07162787', '07162787', NULL, '$2y$10$mBrQVKd2X4PEC9oN8Oxvou0e.kF5Q5F8N..IEgzyKlu3ynIpKjT7K', 'Voter', 0, 0, NULL, '2019-03-15 22:19:47', '2019-03-15 22:19:47'),
(1179, 1, '1', 3, 'MALE', '07162788', '07162788', NULL, '$2y$10$5n4Uni/RFdRjHCmovkiHxO/8Lw7plaplGaWUJgXxWJZOv22Ixzdpi', 'Voter', 0, 0, NULL, '2019-03-15 22:19:47', '2019-03-15 22:19:47'),
(1180, 1, '1', 3, 'MALE', '07162789', '07162789', NULL, '$2y$10$6wJ61LOgJLXEZFXLIws3TuEgsvEXuF.1Z.UL7tkXqE6n4fDxUDTTS', 'Voter', 0, 0, NULL, '2019-03-15 22:19:47', '2019-03-15 22:19:47'),
(1181, 1, '1', 3, 'FEMALE', '07162790', '07162790', NULL, '$2y$10$NijlJiNe9HFxto.eVIj4MeZAG/S.GOTY8QFRfj7xu9.PXxFKyBc9S', 'Voter', 0, 0, NULL, '2019-03-15 22:19:47', '2019-03-15 22:19:47'),
(1182, 1, '1', 3, 'MALE', '07162791', '07162791', NULL, '$2y$10$ZmvR2cw5VviCtArhc0gLV.fJEMteDUfQ.wGN2gJd4cdDIGIXZ6Squ', 'Voter', 0, 0, NULL, '2019-03-15 22:19:47', '2019-03-15 22:19:47'),
(1183, 1, '1', 3, 'MALE', '07162792', '07162792', NULL, '$2y$10$MsPYNjU6CurEdsid0X1U1.fONKX6bkLnp7UGGpef4uI2oAUCdU7NW', 'Voter', 0, 0, NULL, '2019-03-15 22:19:47', '2019-03-15 22:19:47'),
(1184, 1, '1', 3, 'MALE', '07162793', '07162793', NULL, '$2y$10$wrkUXKLftRhkPPk9ixnW..jqRJkUaobdzCFv.8D7l3OgHdjXvELnS', 'Voter', 0, 0, NULL, '2019-03-15 22:19:47', '2019-03-15 22:19:47'),
(1185, 1, '1', 3, 'MALE', '07162794', '07162794', NULL, '$2y$10$u60Pt9A3rTJGRZFbGSwCuO6T.0a6QidgjRuUZvRtiHAeUWvNyscDO', 'Voter', 0, 0, NULL, '2019-03-15 22:19:47', '2019-03-15 22:19:47'),
(1186, 1, '1', 3, 'MALE', '07162795', '07162795', NULL, '$2y$10$W5.EE5cIp3aHlOkhA1St8.AorbkQEGnC5d6Bnwkc7rPTRWqIp8eKS', 'Voter', 0, 0, NULL, '2019-03-15 22:19:47', '2019-03-15 22:19:47'),
(1187, 1, '1', 3, 'MALE', '07162796', '07162796', NULL, '$2y$10$2hIVmnlZtNmYMLLpNTRe6.BpvGnMEnHFvKSPzqeToT.3KdYDXVyay', 'Voter', 0, 0, NULL, '2019-03-15 22:19:48', '2019-03-15 22:19:48'),
(1188, 1, '1', 3, 'MALE', '07162797', '07162797', NULL, '$2y$10$VhM2iJoQUIWSei9fapdrVuAFgzqxCKhTA.85mjxk0jLsLyo1aoJHm', 'Voter', 0, 0, NULL, '2019-03-15 22:19:48', '2019-03-15 22:19:48'),
(1189, 1, '1', 3, 'FEMALE', '07162798', '07162798', NULL, '$2y$10$aRAFIYZD0kV9WIRpdCdp4uYexqEYVqH69nIV3.ML9cqqS7qOGgmVq', 'Voter', 0, 0, NULL, '2019-03-15 22:19:48', '2019-03-15 22:19:48'),
(1190, 1, '1', 3, 'MALE', '07162799', '07162799', NULL, '$2y$10$Ong7gNY6u1dBJd5PLTbfuOAulouRYIQnXe9/oYH5VG3yeBhU3JsuC', 'Voter', 0, 0, NULL, '2019-03-15 22:19:48', '2019-03-15 22:19:48'),
(1191, 1, '1', 3, 'MALE', '07162800', '07162800', NULL, '$2y$10$GUnwuNGkFCz0P2BlLTFRoeGlkt3vzbqG6aYxRPuRKBulPIGXhWl5u', 'Voter', 0, 0, NULL, '2019-03-15 22:19:48', '2019-03-15 22:19:48'),
(1192, 1, '1', 3, 'MALE', '07162801', '07162801', NULL, '$2y$10$p.B..SY1uVA4qqvyz6FUsu1UUdmi3M3B..fZH.TlntplPwaPb3u.m', 'Voter', 0, 0, NULL, '2019-03-15 22:19:48', '2019-03-15 22:19:48'),
(1193, 1, '1', 3, 'FEMALE', '07162802', '07162802', NULL, '$2y$10$Q.iV2DONYvesoih5jH8qdeTyfe9WEAutINsOvSw9RLOWiIqLCkHte', 'Voter', 0, 0, NULL, '2019-03-15 22:19:48', '2019-03-15 22:19:48'),
(1194, 1, '1', 3, 'MALE', '07162803', '07162803', NULL, '$2y$10$ZLa6o5Z4wzj2cC/mjQ4uI.kHnJGXqQhrX8vuPyxrcLlpBryrxPHTy', 'Voter', 0, 0, NULL, '2019-03-15 22:19:48', '2019-03-15 22:19:48'),
(1195, 1, '1', 3, 'MALE', '07162804', '07162804', NULL, '$2y$10$Hoq.dTlCFajA8qiciROVqu7MNmlfgTx7/lGSB.HS7ZFhWdjbChkRq', 'Voter', 0, 0, NULL, '2019-03-15 22:19:48', '2019-03-15 22:19:48'),
(1196, 1, '1', 3, 'MALE', '07162805', '07162805', NULL, '$2y$10$bPzDjg5Vo26Q0YtQ8msMA.dwINTY/Bh.xA2r2blRO33mWdDYqHvm.', 'Voter', 0, 0, NULL, '2019-03-15 22:19:48', '2019-03-15 22:19:48'),
(1197, 1, '1', 3, 'MALE', '07162806', '07162806', NULL, '$2y$10$8tfn/11Wh1gk0mmLL/5iDOYzLdHiZoog/VN6dOypHKWqyA2xHoorq', 'Voter', 0, 0, NULL, '2019-03-15 22:19:48', '2019-03-15 22:19:48'),
(1198, 1, '1', 3, 'MALE', '07162807', '07162807', NULL, '$2y$10$kpvwEzLSdJSG0ATXz.OE0eeakzotm3PoSfiJiz4NLvsoC8clwOkMW', 'Voter', 0, 0, NULL, '2019-03-15 22:19:48', '2019-03-15 22:19:48'),
(1199, 1, '1', 3, 'MALE', '07162808', '07162808', NULL, '$2y$10$oXOWVT83blx9RkXGo5MTuOzu9nvG1Tou6i0zvVnDszyz485xQ1XcG', 'Voter', 0, 0, NULL, '2019-03-15 22:19:48', '2019-03-15 22:19:48'),
(1200, 1, '1', 3, 'MALE', '07162809', '07162809', NULL, '$2y$10$qMh2Lu5mm6xod0NKDZuXu.Gd1QiVCcXmPkX7QTH2PfiqPbvFD9HOO', 'Voter', 0, 0, NULL, '2019-03-15 22:19:48', '2019-03-15 22:19:48'),
(1201, 1, '1', 3, 'MALE', '07162810', '07162810', NULL, '$2y$10$btuXdYQ5.7SLZ7tXumEe6eaZW9rnP7mhzg.gYNCLo1uFfpekTdZN6', 'Voter', 0, 0, NULL, '2019-03-15 22:19:48', '2019-03-15 22:19:48'),
(1202, 1, '1', 3, 'MALE', '07162811', '07162811', NULL, '$2y$10$jvUgPDwvR15pGoW7Kv16zOsHeIvZ3iwMxQHMHdgkDjPAYAh1QgSJ2', 'Voter', 0, 0, NULL, '2019-03-15 22:19:48', '2019-03-15 22:19:48'),
(1203, 1, '1', 3, 'MALE', '07162812', '07162812', NULL, '$2y$10$RURcdcpeQ9HuX8/.AmC3PuSliLtWeuKnMPQLzsRqqrW5Ns7.rwAtW', 'Voter', 0, 0, NULL, '2019-03-15 22:19:48', '2019-03-15 22:19:48'),
(1204, 1, '1', 3, 'MALE', '07162814', '07162814', NULL, '$2y$10$zeOhB102Lu6nnGZXPyqrW.G.Qkqn/fTx0fwU1AmyQB7T3h8SnwofC', 'Voter', 0, 0, NULL, '2019-03-15 22:19:49', '2019-03-15 22:19:49'),
(1205, 1, '1', 3, 'MALE', '07162815', '07162815', NULL, '$2y$10$8sYA2LB6B9HR5dWN4k6QA.rgNsPfP0E65b0RX9MtS.uWSzAZb3LWy', 'Voter', 0, 0, NULL, '2019-03-15 22:19:49', '2019-03-15 22:19:49'),
(1206, 1, '1', 3, 'MALE', '07162816', '07162816', NULL, '$2y$10$ujgTAs2J36zqiz9gbdVLce2iO5AKYCFz4T2jWMANJAnk.QG5iOBQq', 'Voter', 0, 0, NULL, '2019-03-15 22:19:49', '2019-03-15 22:19:49'),
(1207, 1, '1', 3, 'MALE', '07162817', '07162817', NULL, '$2y$10$slK7ErOCmfpw.vRN75dhZONzUr8Z32vOALmnnjObXZLxlE6ObpTH.', 'Voter', 0, 0, NULL, '2019-03-15 22:19:49', '2019-03-15 22:19:49'),
(1208, 1, '1', 3, 'MALE', '07162819', '07162819', NULL, '$2y$10$Mkr7yZkDJ025swIf.ch2M.94DerWm56cHjNKgPrty91wcfN4ORkTa', 'Voter', 0, 0, NULL, '2019-03-15 22:19:49', '2019-03-15 22:19:49'),
(1209, 1, '1', 3, 'MALE', '07162820', '07162820', NULL, '$2y$10$JZ9PNN.MHQ64fYUZUqmoBOw7j7YORMXMDTGL7yFxDgoKLmEw0VsLe', 'Voter', 0, 0, NULL, '2019-03-15 22:19:49', '2019-03-15 22:19:49'),
(1210, 1, '1', 3, 'MALE', '07162821', '07162821', NULL, '$2y$10$fFhdtcaymFR.969prO.CYOz3rVFcCIImJ3D/NYRet1GuYXt74Lpd2', 'Voter', 0, 0, NULL, '2019-03-15 22:19:49', '2019-03-15 22:19:49'),
(1211, 1, '1', 3, 'FEMALE', '07162822', '07162822', NULL, '$2y$10$49YT2cDCuAOvdIHDIZUUpO1HFhsC3i7K3Y3vfobEYfojQ.7LbR8Fe', 'Voter', 0, 0, NULL, '2019-03-15 22:19:49', '2019-03-15 22:19:49'),
(1212, 1, '1', 3, 'FEMALE', '07162823', '07162823', NULL, '$2y$10$usWNewkeY0TjNuqqeaI0qOMZVla0FnEUbmn/LIB5uWzAyl2a.WjPi', 'Voter', 0, 0, NULL, '2019-03-15 22:19:49', '2019-03-15 22:19:49'),
(1213, 5, '5', NULL, NULL, 'YM', NULL, 'ym@gmail.com', '$2y$10$xuyYq942Mj6KZlLJ9.eoresh5oCrOY5scuLDvSfqxCpOXXT5Te5Tq', 'Admin', 1, 0, NULL, '2019-03-18 09:39:20', '2019-03-18 09:41:33'),
(1214, 5, '5', 4, 'MALE', '071627341', '071627341', NULL, '$2y$10$v1ylQ9xsYodDmoUDx9UQsehxjj.37EHEAKRG9FNplc8CtUPh1txrC', 'Voter', 0, 0, NULL, '2019-03-18 09:59:31', '2019-03-18 09:59:31');

-- --------------------------------------------------------

--
-- Table structure for table `votings`
--

CREATE TABLE `votings` (
  `id` int(10) UNSIGNED NOT NULL,
  `department_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `voting_date_start_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ending_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `added_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `votings`
--

INSERT INTO `votings` (`id`, `department_id`, `name`, `voting_date_start_time`, `ending_time`, `status`, `added_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'ITSU Executive Voting', '2019-03-18 08:15 AM', '10:50 PM', 0, 'Israel Nkum', '2019-01-07 12:13:52', '2019-03-15 08:15:07'),
(2, 2, 'Hospitality Executive Voting', '2019-03-18 08:14 AM', '07:14 PM', 0, 'Israel Nkum', '2019-01-07 12:14:41', '2019-03-12 11:48:26'),
(3, 3, 'Stats Executive Voting', '2019-01-08 12:15 PM', '06:00 PM', 0, 'Israel Nkum', '2019-01-07 12:15:55', '2019-01-07 12:15:55'),
(4, 1, 'HOD', '2019-03-14 06:28 PM', '06:28 PM', 0, 'Tracy Sarah', '2019-03-14 18:28:20', '2019-03-14 18:28:20'),
(5, 5, 'Applied Arts Executive Voting', '2019-03-30 06:00 AM', '05:00 PM', 0, 'Israel Nkum', '2019-03-18 09:38:46', '2019-03-18 09:38:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cast_votings`
--
ALTER TABLE `cast_votings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nominees`
--
ALTER TABLE `nominees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nominees_email_unique` (`email`);

--
-- Indexes for table `nominee_tokens`
--
ALTER TABLE `nominee_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `votings`
--
ALTER TABLE `votings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cast_votings`
--
ALTER TABLE `cast_votings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `nominees`
--
ALTER TABLE `nominees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nominee_tokens`
--
ALTER TABLE `nominee_tokens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1215;

--
-- AUTO_INCREMENT for table `votings`
--
ALTER TABLE `votings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
