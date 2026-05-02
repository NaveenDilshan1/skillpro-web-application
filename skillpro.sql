-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2025 at 07:54 PM
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
-- Database: `skillpro`
--

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `certificate_number` varchar(50) NOT NULL,
  `issued_date` date NOT NULL,
  `expiry_date` date DEFAULT NULL,
  `grade` varchar(5) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_name` varchar(150) NOT NULL,
  `course_code` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `credits` int(11) DEFAULT 3,
  `duration_weeks` int(11) DEFAULT 4,
  `status` varchar(20) DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

CREATE TABLE `enrollments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `course` varchar(255) DEFAULT NULL,
  `enrollment_date` date NOT NULL,
  `status` varchar(20) DEFAULT 'active',
  `grade` varchar(5) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enrollments`
--

INSERT INTO `enrollments` (`id`, `name`, `email`, `phone`, `course`, `enrollment_date`, `status`, `grade`, `created_at`, `updated_at`) VALUES
(1, 'Naveen Dilshan', 'naveen@gmail.com', '0765986325', 'Web Development', '0000-00-00', 'active', NULL, '2025-10-04 08:30:41', '2025-10-04 08:30:41'),
(2, 'Naveen Dilshan', 'naveen@gmail.com', '0762345777', 'Digital Marketing', '0000-00-00', 'active', NULL, '2025-10-04 21:13:32', '2025-10-04 21:13:32'),
(3, 'Naveen Dilshan', 'naveen@gmail.com', '0765986325', 'Web Development', '0000-00-00', 'active', NULL, '2025-10-05 13:18:58', '2025-10-05 13:18:58');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `hotline` varchar(20) NOT NULL,
  `message` text NOT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('new','read','replied') DEFAULT 'new'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `hotline`, `message`, `submitted_at`, `status`) VALUES
(1, 'Naveen Dilshan', 'naveen@gmail.com', '12345678', 'aadsfsa', '2025-10-04 09:11:45', 'new'),
(2, 'Naveen Dilshan', 'naveen@gmail.com', '12345678', 'aadsfsa', '2025-10-04 09:11:45', 'new'),
(3, 'Naveen Dilshan', 'naveen@gmail.com', '12345678', 'scsca', '2025-10-04 09:11:59', 'new'),
(4, 'Naveen Dilshan', 'naveen@gmail.com', '12345678', 'scsca', '2025-10-04 09:49:50', 'new'),
(5, 'Naveen Dilshan', 'naveen@gmail.com', '0762387925', 'very good', '2025-10-04 21:12:25', 'new'),
(6, 'sugat', 'sugat@gmail.com', '0762387925', 'good', '2025-10-05 13:11:49', 'new');

-- --------------------------------------------------------

--
-- Table structure for table `installment_plans`
--

CREATE TABLE `installment_plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `installment_count` int(11) NOT NULL DEFAULT 1,
  `installment_amount` decimal(10,2) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `status` varchar(20) DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `transaction_id` varchar(50) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `student_email` varchar(100) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `payment_status` enum('pending','completed','failed','refunded') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `role` enum('admin','instructor','student') NOT NULL DEFAULT 'student',
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `date_of_birth` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `education_level` varchar(50) DEFAULT NULL,
  `guardian_name` varchar(100) DEFAULT NULL,
  `specialization` varchar(100) DEFAULT NULL,
  `experience` varchar(50) DEFAULT NULL,
  `qualifications` text DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `phone`, `password_hash`, `first_name`, `last_name`, `role`, `status`, `date_of_birth`, `address`, `education_level`, `guardian_name`, `specialization`, `experience`, `qualifications`, `department`, `position`, `created_at`, `updated_at`) VALUES
(1, 'student10', 'kasun@gmail.com', '0771234567', '$2y$10$cWzMqQ4tbf8YBdKuEjNk/OKFRTrJDlY4HK1.DE.C0ZBGJsDASrVk2', 'kasun', 'mel', 'student', 'active', '2025-10-22', 'scvrtyjujthrgefwd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-10-04 10:43:33', '2025-10-04 10:43:33'),
(2, 'instructor5', 'sumana@gmail.com', '0763458698', '$2y$10$es.TNrUxGYNWprON2S7W5OrMvDZdGelQt/Gs2tsdeWxFVuhWBIFIW', 'sumana', 'meta', 'instructor', 'active', '2025-10-29', 'hdggcdhicowiilkj', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-10-04 10:46:11', '2025-10-04 10:46:11'),
(3, 'student', 'naveen@gmail.com', '0785623596', '$2y$10$9M4zB02gCkEtlpNiH/V/qu7xkzqJjvYpGjgnqRaApCOruF32YZ78W', 'Naveen', 'Dilshan', 'student', 'active', '0000-00-00', '07 Samagi mawatha akurugoda matara', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-10-04 10:48:02', '2025-10-04 10:48:02'),
(4, 'admin2', 'kavindu@gmail.com', '0765986325', '$2y$10$uyTURoYRsKWgLHQE.mXbP.M.XDLm3DbtyaPeWMQ72xQ/sS6b7sJPe', 'kavindu', 'harsha', 'admin', 'active', '2025-10-16', '07 Samagi mawatha akurugoda matara', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-10-04 17:25:08', '2025-10-04 17:25:08'),
(5, 'student11', 'sadaru@gmail.com', '0785623596', '$2y$10$x7YxB2DFp/iMRz5gnxXdGOOzKhIu9am6OjPnqS0wYVzJAwZ2fHcna', 'sadaru', 'Dilshan', 'student', 'active', '2025-10-29', 'colombo 2.borella.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-10-04 21:23:16', '2025-10-04 21:23:16'),
(6, 'student12', 'sugat@gmail.com', '0765986325', '$2y$10$XSrYjc1y9S.IF2p84sSIwu4Z.Vu7YoPbu5yw7ys9S/KT0j78jn2Se', 'sugat', 'malan', 'student', 'active', '2025-10-04', '07 Samagi mawatha akurugoda matara', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-10-05 11:37:59', '2025-10-05 11:37:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_certificate_number` (`certificate_number`),
  ADD KEY `idx_cert_status` (`status`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_course_code` (`course_code`),
  ADD KEY `idx_course_name` (`course_name`);

--
-- Indexes for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `installment_plans`
--
ALTER TABLE `installment_plans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_installment_status` (`status`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transaction_id` (`transaction_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `enrollments`
--
ALTER TABLE `enrollments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `installment_plans`
--
ALTER TABLE `installment_plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
