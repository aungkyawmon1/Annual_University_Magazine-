-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 24, 2024 at 12:38 PM
-- Server version: 10.6.16-MariaDB-0ubuntu0.22.04.1
-- PHP Version: 8.2.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db-magazine`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_years`
--

CREATE TABLE `academic_years` (
  `academic_year_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `academic_year` varchar(255) DEFAULT NULL,
  `closure_date` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `final_closure_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `academic_years`
--

INSERT INTO `academic_years` (`academic_year_id`, `user_id`, `academic_year`, `closure_date`, `created_at`, `updated_at`, `status`, `final_closure_date`) VALUES
(1, 1, '2024-2025', '2024-04-01 19:37:00', '2024-03-29 23:11:38', '2024-03-01 23:11:40', 'ACTIVE', '2024-04-10 19:37:00');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `magazine_id` int(11) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `created_at` datetime,
  `updated_at` datetime DEFAULT current_timestamp(),
  `status` varchar(255) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `user_id`, `magazine_id`, `comment`, `created_at`, `updated_at`, `status`) VALUES
(11, 3, 2, 'Good book', '2024-04-07 03:06:20', '2024-04-07 03:06:20', '1'),
(12, 3, 3, 'This is a good article, Smith', '2024-04-22 02:49:28', '2024-04-22 02:49:28', '1'),
(14, 3, 1, 'The book is really good.', '2024-04-24 02:19:24', '2024-04-24 02:19:24', '1'),
(15, 3, 34, 'DBMS is essential in software management', '2024-04-24 06:16:03', '2024-04-24 06:16:03', '1'),
(16, 3, 45, 'Students need to learn DBMS.', '2024-04-24 08:54:43', '2024-04-24 08:54:43', '1'),
(17, 3, 46, 'Thanks for your sharing', '2024-04-24 09:21:13', '2024-04-24 09:21:13', '1');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `created_at`, `updated_at`, `status`) VALUES
(1, 'ICT', '2024-03-19 00:51:02', '2024-03-19 00:51:03', NULL),
(2, 'EcE', '2024-03-19 00:51:17', '2024-03-19 00:51:18', NULL),
(3, 'PrE', '2024-03-19 00:51:17', '2024-03-19 00:51:18', NULL),
(4, 'AME', '2024-03-19 00:51:17', '2024-03-19 00:51:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `magazine`
--

CREATE TABLE `magazine` (
  `magazine_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `academic_year_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `file_url` varchar(255) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `view_count` int(11) DEFAULT NULL,
  `is_published` tinyint(1) DEFAULT NULL,
  `created_at` datetime,
  `updated_at` datetime DEFAULT current_timestamp(),
  `status` varchar(255) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `magazine`
--

INSERT INTO `magazine` (`magazine_id`, `user_id`, `department_id`, `academic_year_id`, `title`, `description`, `file_url`, `image_url`, `view_count`, `is_published`, `created_at`, `updated_at`, `status`) VALUES
(1, 4, 1, 1, 'server side applications', 'Desciption', 'server-side.pdf', 'computer-science.jpg', 3, 1, '2024-04-19 23:59:19', '2024-04-24 09:03:02', '1'),
(2, 43, 1, 1, 'Test Title 1', 'Desciption 1', 'pdf-test.pdf', 'img1.png', 3, 1, '2024-03-19 23:59:19', '2024-04-07 03:06:27', '0'),
(3, 45, 1, 1, 'Server Side of a web apps', 'Desciption 2', 'server-side.pdf', 'computer-science.jpg', 3, 1, '2024-03-19 23:59:19', '2024-04-24 10:37:10', '0'),
(22, 46, 1, 1, 'Computer Networks', 'This book provides a comprehensive overview of computer networks and their applications.', '4.pdf', '4.png', 9, 1, '2024-04-07 10:26:08', '2024-04-07 10:26:08', '1'),
(23, 48, 2, 1, 'Digital Signal Processing', 'A guide to understanding digital signal processing principles and techniques.', '5.pdf', '5.png', 14, 1, '2024-04-07 10:26:08', '2024-04-07 10:26:08', '1'),
(24, 49, 3, 1, 'Introduction to Robotics', 'Explore the fundamentals of robotics and its various applications in different fields.', '6.pdf', '6.png', 99, 0, '2024-04-07 10:26:08', '2024-04-07 10:26:08', '0'),
(25, 51, 4, 1, 'Machine Learning Basics', 'Learn the basics of machine learning algorithms and their practical implementations.', '7.pdf', '7.png', 7, 0, '2024-04-07 10:26:08', '2024-04-07 10:26:08', '0'),
(26, 4, 1, 1, 'Web Development Essentials', 'Discover essential concepts and techniques for modern web development.', '8.pdf', '8.png', 12, 1, '2024-04-07 10:26:08', '2024-04-23 15:21:21', '0'),
(27, 43, 2, 1, 'Introduction to Microelectronics', 'An introductory guide to understanding microelectronics and semiconductor devices.', '9.pdf', '9.png', 18, 0, '2024-04-07 10:26:08', '2024-04-07 10:26:08', '0'),
(28, 45, 3, 1, 'Aircraft Design Principles', 'Explore the fundamental principles and concepts behind aircraft design and engineering.', '10.pdf', '10.png', 92, 0, '2024-04-07 10:26:08', '2024-04-07 10:26:08', '0'),
(29, 46, 4, 1, 'Data Structures and Algorithms', 'Learn about various data structures and algorithms used in computer science.', '11.pdf', '11.png', 53, 1, '2024-04-07 10:26:08', '2024-04-07 10:26:08', '1'),
(30, 48, 1, 1, 'Network Programming with Go', 'Understand the basics of network security and common security mechanisms.', '12.pdf', '12.png', 4, 1, '2024-04-07 10:26:08', '2024-04-07 10:26:08', '1'),
(31, 49, 2, 1, 'Embedded Systems Design', 'An in-depth look into embedded systems design and development.', '13.pdf', '13.png', 52, 0, '2024-04-07 10:26:08', '2024-04-07 10:26:08', '0'),
(32, 51, 3, 1, 'Welcome to Mechatronics !', 'Explore the integration of mechanical engineering, electronics, and computer science in mechatronics.', '14.pdf', '14.png', 33, 0, '2024-04-07 10:26:08', '2024-04-07 10:26:08', '0'),
(33, 49, 4, 1, 'Introduction to Deep Learning', 'Learn the basics of artificial intelligence and its applications in various domains.', '15.pdf', '15.png', 20, 0, '2024-04-07 10:26:08', '2024-04-07 10:26:08', '0'),
(34, 50, 1, 1, 'Database Management Systems', 'An overview of database management systems and relational database concepts.', '16.pdf', '16.png', 28, 1, '2024-04-07 10:26:08', '2024-04-24 08:51:06', '0'),
(35, 51, 2, 1, 'An In-Depth Guide to 3D Fundamentals', 'Introduction to the principles and techniques of computer graphics.', '17.pdf', '17.png', 11, 0, '2024-04-07 10:26:08', '2024-04-07 10:26:08', '0'),
(36, 52, 3, 1, 'Solution Manuals Of ADVANCED ENGINEERING MATHEMATICS', 'A comprehensive guide to advanced control systems and their applications.', '18.pdf', '18.png', 84, 0, '2024-04-07 10:26:08', '2024-04-07 10:26:08', '0'),
(37, 4, 1, 1, 'Machine Learning', NULL, '7.pdf', '7.png', NULL, 1, '2024-04-07 03:54:41', '2024-04-24 08:57:04', '0'),
(45, 4, 1, 1, 'DBMS', NULL, '16.pdf', 'Screenshot 2024-04-24 at 17.17.56.jpg', NULL, 1, '2024-04-24 08:43:30', '2024-04-24 08:54:15', '0'),
(46, 4, 1, 1, 'Database management', NULL, '16.pdf', 'Screenshot 2024-04-24 at 17.17.56.jpg', NULL, 1, '2024-04-24 09:19:36', '2024-04-24 09:20:39', '0');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notification_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `magazine_id` int(11) DEFAULT NULL,
  `notification_type` varchar(255) DEFAULT NULL,
  `notification_title` varchar(255) DEFAULT NULL,
  `notification_message` text DEFAULT NULL,
  `time_sent` datetime DEFAULT NULL,
  `notification_status` enum('sent','pending','scheduled') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_date`, `updated_date`) VALUES
(1, 'Admin', '2024-03-19 00:50:12', '2024-03-19 00:50:14'),
(2, 'Manager', '2024-03-19 00:50:12', '2024-03-19 00:50:14'),
(3, 'Coordinator', '2024-03-22 22:54:10', '2024-03-22 22:54:12'),
(4, 'Student', '2024-03-26 23:45:20', '2024-03-26 23:45:26'),
(5, 'Guests', '2024-03-26 23:45:33', '2024-03-26 23:45:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `department_id` int(11) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `date_of_birth` datetime DEFAULT NULL,
  `gender` enum('MALE','FEMALE','OTHER') DEFAULT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `role_id` varchar(255) DEFAULT '1',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  `status` enum('DELETED','ACTIVE','DISABLED') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `department_id`, `username`, `first_name`, `last_name`, `email`, `password`, `date_of_birth`, `gender`, `contact_number`, `address`, `role_id`, `created_at`, `updated_at`, `status`) VALUES
(1, 1, 'admin@email.com', 'Mg', 'Mg', 'test@gmail.com', '$2y$12$JR9sIFgzAcFrKD.bIrP24uwsFNXWFNEW77Oybxhbvnpz1bTDZXQLW', '2024-03-19 00:07:50', 'MALE', '094422122222', 'Myanmar', '1', '2024-03-19 00:08:08', '2024-03-19 00:08:10', 'DELETED'),
(2, 1, 'manager@email.com', 'William', 'Scarlet', 'mgmgmg@gmail.com', '$2y$12$JR9sIFgzAcFrKD.bIrP24uwsFNXWFNEW77Oybxhbvnpz1bTDZXQLW', '2024-03-14 01:06:00', 'FEMALE', '0988888', 'Yangon', '2', '2024-03-18 16:11:06', '2024-03-18 16:11:06', NULL),
(3, 1, 'coordinator@email.com', 'Smith', NULL, 'mgzawwai.soe224@gmail.com', '$2y$12$JR9sIFgzAcFrKD.bIrP24uwsFNXWFNEW77Oybxhbvnpz1bTDZXQLW', '2024-03-20 01:12:00', 'FEMALE', '09888881', 'mandalay', '3', '2024-03-18 16:12:51', '2024-03-18 16:12:51', NULL),
(4, 1, 'student@email.com', 'Ko Zaw', 'Gyi', 'mgzawwai.soe224@gmail.com', '$2y$12$JR9sIFgzAcFrKD.bIrP24uwsFNXWFNEW77Oybxhbvnpz1bTDZXQLW', '2024-03-13 01:13:00', 'FEMALE', '000', 'Taunggyi', '4', '2024-03-18 16:13:33', '2024-03-18 16:13:33', NULL),
(5, 1, 'ict-guest@email.com', 'Guest', 'One', 'guest1@gmail.com', '$2y$12$JR9sIFgzAcFrKD.bIrP24uwsFNXWFNEW77Oybxhbvnpz1bTDZXQLW', '2024-03-22 22:55:27', 'MALE', '000', 'Innlay', '5', '2024-03-22 22:55:49', '2024-03-22 22:55:52', NULL),
(43, 1, 'john.doe@example.com', 'John', 'Doe', 'john.doe@example.com', '$2y$12$JR9sIFgzAcFrKD.bIrP24uwsFNXWFNEW77Oybxhbvnpz1bTDZXQLW', '1990-01-01 00:00:00', 'MALE', '123456789', '123 Street, City', '4', '2024-04-07 00:48:24', '2024-04-07 00:48:24', 'ACTIVE'),
(44, 2, 'jane.doe@example.com', 'Jane', 'Doe', 'jane.doe@example.com', '$2y$12$JR9sIFgzAcFrKD.bIrP24uwsFNXWFNEW77Oybxhbvnpz1bTDZXQLW', '1992-03-15 00:00:00', 'FEMALE', '987654321', '456 Avenue, Town', '2', '2024-04-07 00:48:24', '2024-04-07 00:48:24', 'ACTIVE'),
(45, 3, 'alice.smith@example.com', 'Alice', 'Smith', 'alice.smith@example.com', '$2y$12$JR9sIFgzAcFrKD.bIrP24uwsFNXWFNEW77Oybxhbvnpz1bTDZXQLW', '1985-07-20 00:00:00', 'FEMALE', '555111222', '789 Road, Village', '4', '2024-04-07 00:48:24', '2024-04-07 00:48:24', 'ACTIVE'),
(46, 4, 'bob.johnson@example.com', 'Bob', 'Johnson', 'bob.johnson@example.com', '$2y$12$JR9sIFgzAcFrKD.bIrP24uwsFNXWFNEW77Oybxhbvnpz1bTDZXQLW', '1978-09-10 00:00:00', 'MALE', '999888777', '321 Lane, Suburb', '4', '2024-04-07 00:48:24', '2024-04-07 00:48:24', 'ACTIVE'),
(47, 2, 'emily.williams@example.com', 'Emily', 'Williams', 'emily.williams@example.com', '$2y$12$JR9sIFgzAcFrKD.bIrP24uwsFNXWFNEW77Oybxhbvnpz1bTDZXQLW', '1983-05-25 00:00:00', 'FEMALE', '111222333', '654 Boulevard, City', '5', '2024-04-07 00:48:24', '2024-04-07 00:48:24', 'ACTIVE'),
(48, 4, 'david.brown@example.com', 'David', 'Brown', 'david.brown@example.com', '$2y$12$JR9sIFgzAcFrKD.bIrP24uwsFNXWFNEW77Oybxhbvnpz1bTDZXQLW', '1995-12-03 00:00:00', 'MALE', '444555666', '987 Park, Town', '4', '2024-04-07 00:48:24', '2024-04-07 00:48:24', 'ACTIVE'),
(49, 3, 'mary.jones@example.com', 'Mary', 'Jones', 'mary.jones@example.com', '$2y$12$JR9sIFgzAcFrKD.bIrP24uwsFNXWFNEW77Oybxhbvnpz1bTDZXQLW', '1970-04-18 00:00:00', 'FEMALE', '777888999', '159 Place, Village', '4', '2024-04-07 00:48:24', '2024-04-07 00:48:24', 'ACTIVE'),
(50, 1, 'michael.taylor@example.com', 'Michael', 'Taylor', 'michael.taylor@example.com', '$2y$12$JR9sIFgzAcFrKD.bIrP24uwsFNXWFNEW77Oybxhbvnpz1bTDZXQLW', '1988-08-12 00:00:00', 'MALE', '222333444', '753 Drive, Suburb', '3', '2024-04-07 00:48:24', '2024-04-07 00:48:24', 'ACTIVE'),
(51, 1, 'emma.martinez@example.com', 'Emma', 'Martinez', 'emma.martinez@example.com', '$2y$12$JR9sIFgzAcFrKD.bIrP24uwsFNXWFNEW77Oybxhbvnpz1bTDZXQLW', '1997-06-30 00:00:00', 'FEMALE', '666777888', '852 Court, City', '4', '2024-04-07 00:48:24', '2024-04-07 00:48:24', 'ACTIVE'),
(52, 2, 'james.anderson@example.com', 'James', 'Anderson', 'james.anderson@example.com', '$2y$12$JR9sIFgzAcFrKD.bIrP24uwsFNXWFNEW77Oybxhbvnpz1bTDZXQLW', '1980-02-28 00:00:00', 'MALE', '000111222', '456 Garden, Town', '1', '2024-04-07 00:48:24', '2024-04-07 00:48:24', 'ACTIVE'),
(53, 3, 'guest-pre', NULL, NULL, ' ', '$2y$12$JR9sIFgzAcFrKD.bIrP24uwsFNXWFNEW77Oybxhbvnpz1bTDZXQLW', NULL, NULL, ' ', ' ', '5', '2024-04-07 03:06:59', '2024-04-07 03:06:59', NULL),
(54, 1, 'user-david', NULL, NULL, 'david@gmail.com', '$2y$12$JR9sIFgzAcFrKD.bIrP24uwsFNXWFNEW77Oybxhbvnpz1bTDZXQLW', '2024-04-07 12:08:00', 'MALE', '09112332333', 'Corner of 30th Street', '4', '2024-04-07 03:08:49', '2024-04-07 03:08:49', NULL),
(56, 1, 'user-david333', NULL, NULL, 'david666666@gmail.com', '$2y$12$JR9sIFgzAcFrKD.bIrP24uwsFNXWFNEW77Oybxhbvnpz1bTDZXQLW', '2024-04-07 12:08:00', 'MALE', '09112332333', 'Corner of 30th Street', '4', '2024-04-07 03:09:13', '2024-04-07 03:09:13', NULL),
(57, 1, 'MgMg', NULL, NULL, 'mgmg@email.com', '$2y$12$JR9sIFgzAcFrKD.bIrP24uwsFNXWFNEW77Oybxhbvnpz1bTDZXQLW', '2007-02-22 12:08:00', 'MALE', '09123123123', 'Yangon', '4', '2024-04-22 05:39:01', '2024-04-22 05:39:01', NULL),
(58, 1, 'Mr. Aye Mg', NULL, NULL, 'ayemg@email.com', '$2y$12$JR9sIFgzAcFrKD.bIrP24uwsFNXWFNEW77Oybxhbvnpz1bTDZXQLW', '2024-04-02 22:10:00', 'MALE', '09784888444', 'Madaya, Myanmar', '4', '2024-04-22 15:11:05', '2024-04-22 15:11:05', NULL),
(59, 2, 'ece-guest@email.com', NULL, NULL, 'ece-guest@email.com', '$2y$12$JR9sIFgzAcFrKD.bIrP24uwsFNXWFNEW77Oybxhbvnpz1bTDZXQLW', NULL, 'MALE', '09776544444', 'Myanmar', '5', '2024-04-24 06:40:08', '2024-04-24 06:40:08', NULL),
(60, 1, 'new-student@email.com', NULL, NULL, 'ss@email.com', '$2y$12$JR9sIFgzAcFrKD.bIrP24uwsFNXWFNEW77Oybxhbvnpz1bTDZXQLW', '2003-02-27 15:45:00', 'MALE', '09665433333', 'Yangon', '4', '2024-04-24 06:46:20', '2024-04-24 06:46:20', NULL),
(61, 2, 'ece-coordinator@email.com', NULL, NULL, 'John', '$2y$12$JR9sIFgzAcFrKD.bIrP24uwsFNXWFNEW77Oybxhbvnpz1bTDZXQLW', '2002-06-04 15:47:00', 'FEMALE', '09665443333', 'Taungyi', '3', '2024-04-24 06:47:48', '2024-04-24 06:47:48', NULL),
(62, 1, 'testaccount@email.com', NULL, NULL, 'test account', '$2y$12$JR9sIFgzAcFrKD.bIrP24uwsFNXWFNEW77Oybxhbvnpz1bTDZXQLW', '2024-04-03 16:02:00', 'MALE', '09888777711', 'Mandalay', '2', '2024-04-24 07:02:33', '2024-04-24 07:02:33', NULL),
(63, 3, 'test890@gmail.com', NULL, NULL, 'Coordinator PRE', '$2y$12$oiXbap3xYCkTGKgC34XC1Oz4HBqdJ2uivLXdp0QPxS0FirgN7KUEC', '1999-06-02 16:38:00', 'MALE', '09444413134', 'Mandalay', '3', '2024-04-24 07:39:05', '2024-04-24 07:39:05', NULL),
(64, 1, 'new-user@email.com', NULL, NULL, 'new User', '$2y$12$JXUb/9l6nMs6EXgPMAghvuPoXFtrmsXpZe9r.Zil/wlneLCNJI8n.', '2005-02-23 17:13:00', 'MALE', '09968160432', 'Corner of 30th Street', '2', '2024-04-24 08:13:58', '2024-04-24 08:13:58', NULL),
(65, 3, 'new-user88@email.com', NULL, NULL, 'New User K', '$2y$12$kzx5WvN.1Y0lLbWrBw4fPefc5jQNXby72hHHh1yReJy2I.NOBz1ey', '2007-06-05 17:38:00', 'MALE', '099681604320', 'Corner of 30th Street', '2', '2024-04-24 08:38:32', '2024-04-24 08:38:32', NULL),
(66, 1, 'ict-guest-1@email.com', NULL, NULL, ' ', '$2y$12$7a5c37z4J4FbZTsRTrobteefknYFEdKvSbk5x3ag6icSrEJgHMAmG', NULL, NULL, ' ', ' ', '5', '2024-04-24 08:56:03', '2024-04-24 08:56:03', NULL),
(67, 2, 'newusername@gmail.com', NULL, NULL, 'Coordinator New', '$2y$12$eP3skepXx0fUkVU0LhyDU.Yk9f04zsp.jtWXoWRZj.qwRHinBh4oi', '2001-06-12 18:15:00', 'FEMALE', '09968160432', 'Corner of 30th Street', '3', '2024-04-24 09:15:17', '2024-04-24 09:15:17', NULL),
(68, 2, 'ict-guest-2@email.com', NULL, NULL, ' ', '$2y$12$kKC6KdFp7MNqnqAgDiVFFeb2L4JuFnNwmxMiwKrZrJInyhSgDu7Me', NULL, NULL, ' ', ' ', '5', '2024-04-24 09:22:51', '2024-04-24 09:22:51', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_years`
--
ALTER TABLE `academic_years`
  ADD PRIMARY KEY (`academic_year_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `magazine_id` (`magazine_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `magazine`
--
ALTER TABLE `magazine`
  ADD PRIMARY KEY (`magazine_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `magazine`
--
ALTER TABLE `magazine`
  MODIFY `magazine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `academic_years`
--
ALTER TABLE `academic_years`
  ADD CONSTRAINT `academic_years_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`magazine_id`) REFERENCES `magazine` (`magazine_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
