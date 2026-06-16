-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2026 at 11:29 AM
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
-- Database: `nayepankh_volunteer_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `full_name`, `email`, `password`, `created_at`) VALUES
(4, 'NayePankh Admin', 'admin@nayepankh.org', '$2y$10$4IufcOIDdXeD0aHQbdmG5OlnxbWmTjredCc94Nc738dkbGeT2j7Xi', '2026-06-15 12:51:35');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `event_date` date NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `required_volunteers` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `title`, `description`, `event_date`, `location`, `required_volunteers`, `created_at`) VALUES
(1, 'beach event drive', 'Join us to clean Kochi Beach', '2026-06-26', 'kochi beach', 20, '2026-06-16 06:59:49'),
(2, 'kozhikode beach', 'cleaning', '2026-06-30', 'kozhikode', 25, '2026-06-16 09:11:10');

-- --------------------------------------------------------

--
-- Table structure for table `event_registrations`
--

CREATE TABLE `event_registrations` (
  `registration_id` int(11) NOT NULL,
  `volunteer_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `registered_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event_registrations`
--

INSERT INTO `event_registrations` (`registration_id`, `volunteer_id`, `event_id`, `registered_at`) VALUES
(1, 2, 1, '2026-06-16 07:06:56'),
(2, 4, 1, '2026-06-16 07:22:54'),
(3, 6, 1, '2026-06-16 08:39:51'),
(4, 7, 2, '2026-06-16 09:15:15');

-- --------------------------------------------------------

--
-- Table structure for table `volunteers`
--

CREATE TABLE `volunteers` (
  `volunteer_id` int(11) NOT NULL,
  `volunteer_code` varchar(20) DEFAULT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `gender` enum('Male','Female','Other') DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `address` text DEFAULT NULL,
  `skills` varchar(255) DEFAULT NULL,
  `availability` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `profile_photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('Pending','Approved','Inactive') DEFAULT 'Pending',
  `profile_picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `volunteers`
--

INSERT INTO `volunteers` (`volunteer_id`, `volunteer_code`, `full_name`, `email`, `phone`, `gender`, `dob`, `address`, `skills`, `availability`, `password`, `profile_photo`, `created_at`, `status`, `profile_picture`) VALUES
(1, 'NPF2026-9850', 'Adithya Manoj', 'adithya36manoj@gmail.com', '9895709303', 'Female', '2019-02-15', 'purathur house', 'Healthcare', 'Weekdays', '$2y$10$hsUeE0sVgvm14qWEAyzaf.VMfinBI2v.YzbWybk6dTG9zZR/zRX2G', NULL, '2026-06-15 12:05:14', 'Inactive', NULL),
(2, 'NPF2026-7992', 'subhini manoj', 'subhinimanoj5@gmail.com', '9995659846', 'Female', '2026-06-11', 'purathur house', 'Healthcare, Environment, Social Media', 'Weekends', '$2y$10$62gKCNu1S1YMFypW9mrBNOdMBDHZCbjbgFYDI2YZvT7L7n6nPG0le', NULL, '2026-06-15 12:20:44', 'Inactive', 'profile_1781537820.png'),
(3, 'NPF2026-9394', 'ardra manoj', 'ardramanoj5@gmail.com', '9885659845', 'Female', '2022-06-10', 'ernjalakuda', 'Education, Community Outreach', NULL, '$2y$10$t4rBsjredx7/O2uZ/Yms..NZTmmvVO09j8hOFopFBBgjjvPN2TOK6', NULL, '2026-06-16 06:40:17', 'Approved', 'profile_1781592068.png'),
(4, 'NPF2026-2742', 'vishnu I.T', 'vishnuit6603@gmail.com', '7907702345', 'Male', '2003-03-27', 'pragati house', 'Education, Healthcare, Event Management', 'Weekends', '$2y$10$76SFoJcsOJXc4MCazjIt5OVb1SCxrdEs0YU84lB1pXtT6mCtltEdm', NULL, '2026-06-16 07:18:54', 'Approved', 'profile_1781594360.png'),
(5, 'NPF2026-5455', 'manoj kumar', 'manoj6603@gmail.com', '5678987654', 'Male', '2026-06-05', 'purath', 'Environment, Fundraising', 'Flexible', '$2y$10$U3zwaMgPjf9w5pRjI0tffeR5YM1a38g3D.pZEDTu/ydYUBa48VOLO', NULL, '2026-06-16 08:21:47', 'Approved', NULL),
(6, 'NPF2026-2282', 'sharfeena', 'sharfudeen1232@gmail.com', '5678654321', 'Female', '2026-06-07', 'thriveni house', 'Social Media, Community Outreach', 'Weekends', '$2y$10$DyNXeP5ll/.hpULIKOqgduliaE4d.z2lnjSnRQfrELZYzqwckjqci', NULL, '2026-06-16 08:31:34', 'Approved', NULL),
(7, 'NPF2026-1900', 'raseena', 'raseenas@gmail.com', '6754321234', 'Female', '2018-11-21', 'chautra house', 'Education, Environment, Event Management', 'Weekends', '$2y$10$xuLdEwAj3ihv6G.V8ZwxaOrOy7Zoyu9crHML3bmRYvNi3zIsBAv.i', NULL, '2026-06-16 09:14:11', 'Approved', 'profile_1781601269.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `event_registrations`
--
ALTER TABLE `event_registrations`
  ADD PRIMARY KEY (`registration_id`),
  ADD KEY `volunteer_id` (`volunteer_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `volunteers`
--
ALTER TABLE `volunteers`
  ADD PRIMARY KEY (`volunteer_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `volunteer_code` (`volunteer_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `event_registrations`
--
ALTER TABLE `event_registrations`
  MODIFY `registration_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `volunteers`
--
ALTER TABLE `volunteers`
  MODIFY `volunteer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event_registrations`
--
ALTER TABLE `event_registrations`
  ADD CONSTRAINT `event_registrations_ibfk_1` FOREIGN KEY (`volunteer_id`) REFERENCES `volunteers` (`volunteer_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `event_registrations_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
