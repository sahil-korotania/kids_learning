-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2024 at 08:19 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kids_learning`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(11) NOT NULL,
  `learning_type` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `video` longtext NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `learning_type`, `title`, `description`, `video`, `status`, `created_at`) VALUES
(1, '2', 'Jumping game', 'Jumping game for kids.\r\npe games and activities for kids | Primary school and elementary school\r\nphysical Education Games and activities for Primary school and elementary school.', 'i0YiDOuJ2mc', 'Active', '2024-08-12 09:53:59'),
(3, '2', 'Rhythm Grid Jumping ', 'Kristin Lukow - music teacher', 'qLZkXVF0H6s', 'Active', '2024-08-12 10:32:59');

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `name`, `email`, `password`, `status`, `created_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '123', 'Active', '2024-08-12 06:26:00');

-- --------------------------------------------------------

--
-- Table structure for table `child_progress`
--

CREATE TABLE `child_progress` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `child_name` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `learning_type` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `percentage` varchar(20) NOT NULL,
  `date_of_progress` varchar(20) NOT NULL,
  `attachment` longtext NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `child_progress`
--

INSERT INTO `child_progress` (`id`, `user`, `child_name`, `age`, `learning_type`, `description`, `percentage`, `date_of_progress`, `attachment`, `status`, `created_at`) VALUES
(3, 'user1@gmail.com', 'Ch 1', 2, 2, 'DEmo', '70', '2024-08-12', '472906127classes-5.jpg', 'Active', '2024-08-13 06:53:16');

-- --------------------------------------------------------

--
-- Table structure for table `learning_type`
--

CREATE TABLE `learning_type` (
  `id` int(11) NOT NULL,
  `learning_type_name` varchar(255) NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `learning_type`
--

INSERT INTO `learning_type` (`id`, `learning_type_name`, `status`, `created_at`) VALUES
(2, 'Learning One', 'Active', '2024-08-12 07:59:43'),
(3, 'Learning 2', 'Active', '2024-08-12 07:34:26'),
(4, '2', 'Active', '2024-08-12 09:50:21');

-- --------------------------------------------------------

--
-- Table structure for table `suggestion`
--

CREATE TABLE `suggestion` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `suggestion` longtext NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suggestion`
--

INSERT INTO `suggestion` (`id`, `user`, `suggestion`, `status`, `created_at`) VALUES
(1, 'user1@gmail.com', 'This is demo testing Suggestion Box', 'Active', '2024-08-13 07:24:44'),
(3, 'user1@gmail.com', 'test this suggestion box', 'Active', '2024-08-13 07:53:38'),
(4, 'user1@gmail.com', 'Testing suggestion', 'Active', '2024-08-13 07:51:53');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` bigint(10) NOT NULL,
  `address` longtext NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `contact`, `address`, `status`, `created_at`) VALUES
(1, 'User 1', 'user1@gmail.com', '202cb962ac59075b964b07152d234b70', 9988776655, 'Jalandhar, Punjab', 'Active', '2024-08-12 09:32:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `child_progress`
--
ALTER TABLE `child_progress`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `learning_type`
--
ALTER TABLE `learning_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suggestion`
--
ALTER TABLE `suggestion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `child_progress`
--
ALTER TABLE `child_progress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `learning_type`
--
ALTER TABLE `learning_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `suggestion`
--
ALTER TABLE `suggestion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
