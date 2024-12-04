-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2024 at 05:06 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studyoverseas_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE DATABASE IF NOT EXISTS `studyoverseas_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE studyoverseas_db;

CREATE TABLE `appointment` (
  `Appointment_id` varchar(4) NOT NULL,
  `Emp_id` varchar(4) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `Type` tinyint(1) NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `Interest_course` varchar(800) NOT NULL,
  `Interest_country` varchar(800) NOT NULL,
  `Interest_intake` varchar(800) NOT NULL,
  `Customer_id` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `interested_program` varchar(255) NOT NULL,
  `interested_country` varchar(255) NOT NULL,
  `highest_qualification` varchar(255) NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time` varchar(20) NOT NULL,
  `other_info` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `name`, `email`, `phone`, `interested_program`, `interested_country`, `highest_qualification`, `appointment_date`, `appointment_time`, `other_info`, `created_at`) VALUES
(1, 'kasun', 'kasunniluminda@gmail.com', '111111', 'gh', 'gh', 'gh', '2024-10-29', '11:00 AM - 12:00 PM', 'ghg', '2024-10-09 17:50:21'),
(2, 'fd', 'kasunniluminda@gmail.com', 'sds', 'sdd', 'sds', 'sds', '2024-10-31', '11:00 AM - 12:00 PM', '', '2024-10-09 18:06:15'),
(3, 'kasun', 'kasunniluminda@gmail.com', '11111', 'fdfdf', 'dsdsd', 'sdsdsd', '2024-10-12', '09:00 AM - 10:00 AM', 'sdsds', '2024-10-11 01:04:14');

-- --------------------------------------------------------

--
-- Table structure for table `contact_inquiries`
--

CREATE TABLE `contact_inquiries` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `inquiry_type` enum('complaints','suggestions','inquiry') NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_inquiries`
--

INSERT INTO `contact_inquiries` (`id`, `full_name`, `email`, `phone`, `subject`, `inquiry_type`, `message`, `created_at`) VALUES
(4, 'dfdf', 'kasunniluminda@gmail.com', '4545', 'tyt', 'complaints', 'ty', '2024-10-09 00:44:46'),
(5, 'dfdf', 'kasunniluminda@gmail.com', '4545', 'tyt', 'complaints', 'ty', '2024-10-09 00:44:46'),
(6, 'asa', 'kasunniluminda@gmail.com', 'sdsd', 'gnh', 'complaints', 'vbvb', '2024-10-09 00:45:35'),
(7, 'asda', 'kasunniluminda@gmail.com', '45454', 'sdsd', 'inquiry', 'sdsds', '2024-10-09 00:51:14'),
(8, 'asda', 'kasunniluminda@gmail.com', '45454', 'sdsd', 'inquiry', 'sdsds', '2024-10-09 00:51:14'),
(9, 'sds', 'kasunniluminda@gmail.com', 'asas', 'as', 'suggestions', 'asa', '2024-10-09 00:51:52'),
(10, 'kasun ', 'kasunniluminda@gmail.com', '4545454', 'hgh', 'complaints', 'ghghgg', '2024-10-09 01:09:21'),
(11, 'kasun ', 'kasunniluminda@gmail.com', '121212', 'kas', 'suggestions', 'asasas', '2024-10-09 01:12:14'),
(12, 'kasun ', 'kasunniluminda@gmail.com', '121212', 'kas', 'suggestions', 'asasas', '2024-10-09 01:13:54'),
(13, 'df', 'kasunniluminda@gmail.com', 'fgf', 'fgf', 'complaints', 'fgfg', '2024-10-09 01:17:41'),
(14, 'asa', 'kasunniluminda@gmail.com', '121', '1212', 'complaints', '12', '2024-10-09 01:24:01'),
(15, 'asa', 'kasunniluminda@gmail.com', '121', '1212', 'complaints', '12', '2024-10-09 01:24:22'),
(16, 'df', 'kasunniluminda@gmail.com', '123456', 'hjhj', 'complaints', 'hjhjh', '2024-10-09 01:28:38'),
(17, 'kasunniluminda@gmail.com ', 'kasunniluminda@gmail.com', 'sdsd', 'sds', 'suggestions', 'sds', '2024-10-09 01:30:37'),
(18, 'kasunniluminda@gmail.com ', 'kasunniluminda@gmail.com', 'sdsd', 'sds', 'suggestions', 'sds', '2024-10-09 01:30:54'),
(19, 'kasun ', 'kasunniluminda@gmail.com', '1212121', 'hjhjhjh', 'complaints', 'hjhjhj', '2024-10-09 01:33:58'),
(20, 'kasunniluminda@gmail.com ', 'kasunniluminda@gmail.com', 'sdsdsds', 'sdsd', 'complaints', 'sdsd', '2024-10-09 01:34:54'),
(21, 'kasun ', 'kasunniluminda@gmail.com', 'sdsds', 'sdsd', 'complaints', 'sdsdsd', '2024-10-09 01:36:11'),
(22, 'ere', 'kasunniluminda@gmail.com', '123456789', 'gggggggggg', 'suggestions', 'ggggggggggg', '2024-10-09 01:37:11'),
(23, 'kasunniluminda@gmail.com', 'kasunniluminda@gmail.com', 'ghg', 'ghg', 'complaints', 'ghg', '2024-10-09 01:39:05'),
(24, 'kasunniluminda@gmail.com ', 'kasunniluminda@gmail.com', '4242', '4', 'complaints', '121', '2024-10-09 01:39:46'),
(25, 'kasun Niluminda ', 'kasunniluminda@gmail.com', '0718596857', 'aaaaaaaaa', 'suggestions', 'aaaaaaaaaaaa', '2024-10-09 15:57:12'),
(26, 'abc', 'kasunniluminda@gmail.com', '071854121', 'abc sub', 'suggestions', 'abc body', '2024-10-09 16:07:50'),
(27, 'kasun ', 'kasunniluminda@gmail.com', '071954124', 'asas', 'inquiry', 'assasa', '2024-10-09 16:13:41'),
(28, 'kasunniluminda@gmail.com ', 'kasunniluminda@gmail.com', '454584', 'sdsds', 'suggestions', 'dsdsdds', '2024-10-09 16:17:33'),
(29, 'kasun', 'kasunniluminda@gmail.com', '1212121', 'test', 'complaints', 'sdsds', '2024-10-11 01:05:27');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `iso_code` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `name`, `iso_code`) VALUES
(1, 'Sri Lanka', 'lk'),
(2, 'India', 'in'),
(5, 'Japan', 'jp');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `Course_id` varchar(4) NOT NULL,
  `Course_name` varchar(700) NOT NULL,
  `Country` varchar(45) NOT NULL,
  `Course_description` varchar(1000) NOT NULL,
  `Course_requirements` varchar(1000) NOT NULL,
  `University` varchar(800) NOT NULL,
  `Intake` varchar(800) NOT NULL,
  `Scholarship` varchar(45) DEFAULT NULL,
  `English_language_requirement` varchar(1000) NOT NULL,
  `Course_fee` varchar(45) NOT NULL,
  `Years` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dashboard`
--

CREATE TABLE `dashboard` (
  `Dash_id` varchar(4) NOT NULL,
  `Dash_name` varchar(45) NOT NULL,
  `created_date` date NOT NULL,
  `report_id` varchar(4) NOT NULL,
  `Noti_id` varchar(4) NOT NULL,
  `Appointment_id` varchar(4) NOT NULL,
  `bill_id` varchar(4) NOT NULL,
  `Rs_id` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `Emp_id` varchar(4) NOT NULL,
  `Fname` varchar(100) NOT NULL,
  `Lname` varchar(100) NOT NULL,
  `Gender` tinyint(4) NOT NULL,
  `Age` int(11) NOT NULL,
  `Contact_no` varchar(15) NOT NULL,
  `Emp_email` varchar(100) NOT NULL,
  `Emp_password` varchar(45) NOT NULL,
  `Qualification` varchar(7000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`Emp_id`, `Fname`, `Lname`, `Gender`, `Age`, `Contact_no`, `Emp_email`, `Emp_password`, `Qualification`) VALUES
('1', '[value-2]', '[value-3]', 0, 0, '[value-6]', '[value-7]', '[value-8]', '[value-9]'),
('2', '[value-2]', '[value-3]', 0, 0, '[value-6]', '[value-7]', '[value-8]', '[value-9]'),
('3', '[value-2]', '[value-3]', 0, 0, '[value-6]', '[value-7]', '[value-8]', '[value-9]');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `Fb_id` varchar(4) NOT NULL,
  `Feedback` varchar(7000) NOT NULL,
  `Rate` varchar(45) NOT NULL,
  `Fname` varchar(100) DEFAULT NULL,
  `Lname` varchar(100) DEFAULT NULL,
  `Customer_id` varchar(4) NOT NULL,
  `Email` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_department`
--

CREATE TABLE `job_department` (
  `Job_id` varchar(4) NOT NULL,
  `Emp_id` varchar(4) NOT NULL,
  `Job_department` varchar(45) NOT NULL,
  `Description` varchar(1000) NOT NULL,
  `Salary_Range` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leave`
--

CREATE TABLE `leave` (
  `Le_id` varchar(4) NOT NULL,
  `Emp_id` varchar(4) NOT NULL,
  `Date` date NOT NULL,
  `Reason` varchar(7000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `Msg_id` varchar(4) NOT NULL,
  `Rs_id` varchar(4) NOT NULL,
  `Emp_id` varchar(4) NOT NULL,
  `Msg_name` varchar(7000) NOT NULL,
  `Msg_type` tinyint(4) NOT NULL,
  `Msg_description` varchar(4000) NOT NULL,
  `Date_sent` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `Noti_id` varchar(4) NOT NULL,
  `Notification` varchar(45) NOT NULL,
  `Noti_type` varchar(45) NOT NULL,
  `Noti_time` time NOT NULL,
  `Noti_date` date NOT NULL,
  `Status` tinytext NOT NULL,
  `Appointment_id` varchar(4) NOT NULL,
  `Fb_id` varchar(4) NOT NULL,
  `Msg_id` varchar(4) NOT NULL,
  `Customer_id` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `Payment_id` varchar(4) NOT NULL,
  `Rs_id` varchar(4) NOT NULL,
  `Payment_name` varchar(7000) NOT NULL,
  `Payment_category` tinyint(4) NOT NULL,
  `Payment_status` tinyint(4) NOT NULL,
  `Payment_amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payroll`
--

CREATE TABLE `payroll` (
  `Payroll_id` varchar(4) NOT NULL,
  `Emp_id` varchar(4) NOT NULL,
  `Salary_id` varchar(4) NOT NULL,
  `Le_id` varchar(4) NOT NULL,
  `Qr_id` varchar(4) NOT NULL,
  `Report_id` varchar(4) NOT NULL,
  `Job_id` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prospective_customer`
--

CREATE TABLE `prospective_customer` (
  `Customer_id` varchar(4) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Phone_number` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `qr`
--

CREATE TABLE `qr` (
  `Qr_id` varchar(4) NOT NULL,
  `Emp_id` varchar(4) NOT NULL,
  `Qr_day` date NOT NULL,
  `Qr_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `registered_students`
--

CREATE TABLE `registered_students` (
  `Rs_id` varchar(4) NOT NULL,
  `Emp_id` varchar(4) NOT NULL,
  `Job_id` varchar(4) NOT NULL,
  `Fname` varchar(200) NOT NULL,
  `Lname` varchar(45) NOT NULL,
  `Age` int(2) NOT NULL,
  `Passport_no` varchar(45) NOT NULL,
  `Passp_issuedate` date NOT NULL,
  `Passp_exdate` date NOT NULL,
  `Mobile_no` varchar(15) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `New_email` varchar(100) NOT NULL,
  `Address` varchar(300) NOT NULL,
  `Sponsorship` tinyint(4) NOT NULL,
  `Portal_password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `Report_id` varchar(4) NOT NULL,
  `Bill_id` varchar(4) NOT NULL,
  `Payment_id` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `Salary_id` varchar(4) NOT NULL,
  `Emp_id` varchar(4) NOT NULL,
  `Job_id` varchar(4) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Bonus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `show_fund`
--

CREATE TABLE `show_fund` (
  `Sfund_id` varchar(4) NOT NULL,
  `Course_id` varchar(4) NOT NULL,
  `Rs_id` varchar(4) NOT NULL,
  `Traveling_expenses` varchar(45) NOT NULL,
  `Living_expenses` varchar(45) NOT NULL,
  `Dependents` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_academic_qualification`
--

CREATE TABLE `student_academic_qualification` (
  `Aq_id` varchar(4) NOT NULL,
  `Rs_id` varchar(4) NOT NULL,
  `Aq_name` varchar(800) NOT NULL,
  `Aq_awardingbody` varchar(600) NOT NULL,
  `Aq_start_date` date NOT NULL,
  `Aq_end_date` date NOT NULL,
  `Aq_grade` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_application`
--

CREATE TABLE `student_application` (
  `Appl_id` varchar(4) NOT NULL,
  `Course_id` varchar(4) NOT NULL,
  `Rs_id` varchar(4) NOT NULL,
  `Emp_id` varchar(4) NOT NULL,
  `Job_id` varchar(4) NOT NULL,
  `Appl_name` varchar(7000) NOT NULL,
  `Appl_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_documents`
--

CREATE TABLE `student_documents` (
  `Studdoc_id` varchar(4) NOT NULL,
  `Emp_id` varchar(4) NOT NULL,
  `Rs_id` varchar(4) NOT NULL,
  `Doc_name` varchar(5000) NOT NULL,
  `Doc_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_work_experiences`
--

CREATE TABLE `student_work_experiences` (
  `Pex_id` varchar(4) NOT NULL,
  `Rs_id` varchar(4) NOT NULL,
  `Pex_name` varchar(3000) NOT NULL,
  `Pex_employer` varchar(5000) NOT NULL,
  `Pex_start_date` date NOT NULL,
  `Pex_end_date` date DEFAULT NULL,
  `Pex_responsibilities` varchar(7000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(45) DEFAULT 'student',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `otp` varchar(6) DEFAULT NULL,
  `otp_created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `role`, `created_at`, `otp`, `otp_created_at`) VALUES
(1, 'kasun', 'niluminda', 'kasunniluminda@gmail.com', '$2y$10$sB79pCvuj1xYzwO8D1U5YOq6dtsLEp.B6esXP/YA5S5CFPzkZVzte', 'admin', '2024-09-21 10:20:58', '827009', '2024-10-05 02:31:25'),
(2, 'Snajula', 'Hashendra', 'sanjula@gmail.com', '$2y$10$K/hubBumrfvuHE192./VpeIdP66yMQf/v7E3xqCOq/SbbSitCHEUy', 'student', '2024-09-26 17:11:12', NULL, NULL),
(3, 'chaminda', 'ramanayaka', 'chaminda@gmail.com', '$2y$10$7pVbH4tq0xxmDcJld9i8j.vev6n8vgNHVcxOGOS2tISYpT2BxOfdC', 'student', '2024-09-26 18:07:34', NULL, NULL),
(4, 'Sadeepa', 'Malshan', 'sadeepa@gmail.com', '$2y$10$AhbQNiSqNAuO0es3wpth6OYDS3kAEwpMzA8TEmBpgj2f3Nr499Emm', 'student', '2024-10-04 01:05:14', NULL, NULL),
(5, 'Nuwan', 'Dammika', 'nuwan@gmail.com', '$2y$10$0G6THmN3iWapy/Nw6hQ5l.X2/GN26USdvxiuDLLQDyA/2xnERW2Za', 'student', '2024-10-04 01:26:10', NULL, NULL),
(6, 'chalani', 'shehara', 'chalani@gmail.com', '$2y$10$7GW0cXqgg7eLFctpx3RwLeu7MyT.2X0vKN.o.jt0g/3MrUFrpQ96C', 'student', '2024-10-06 16:29:00', NULL, NULL),
(7, 'sandaya', 'kumari', 'sandaya@gmail.com', '$2y$10$dERvWOM1HO37ojfHPkivhuGr8B2zlkZf.a3/2Oq3M7lk0onw2/pk2', 'student', '2024-10-06 16:41:34', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `utility_management`
--

CREATE TABLE `utility_management` (
  `Bill_id` varchar(4) NOT NULL,
  `Bill_name` varchar(4500) NOT NULL,
  `Bill_category` tinyint(4) NOT NULL,
  `Bill_amount` decimal(10,2) NOT NULL,
  `Bill_date` date NOT NULL,
  `Bill_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visa`
--

CREATE TABLE `visa` (
  `Visa_id` varchar(4) NOT NULL,
  `Rs_id` varchar(4) NOT NULL,
  `Job_id` varchar(4) NOT NULL,
  `Emp_id` varchar(4) NOT NULL,
  `Visa_name` varchar(4000) NOT NULL,
  `Visa_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`Appointment_id`),
  ADD KEY `Emp_id_idx` (`Emp_id`),
  ADD KEY `Customer_id_idx` (`Customer_id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_inquiries`
--
ALTER TABLE `contact_inquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`Course_id`);

--
-- Indexes for table `dashboard`
--
ALTER TABLE `dashboard`
  ADD PRIMARY KEY (`Dash_id`),
  ADD KEY `report_id_idx` (`report_id`),
  ADD KEY `Noti_id_idx` (`Noti_id`),
  ADD KEY `Appointment_id_idx` (`Appointment_id`),
  ADD KEY `bill_id_idx` (`bill_id`),
  ADD KEY `Rs_id_idx` (`Rs_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`Emp_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`Fb_id`),
  ADD KEY `Customer_id_idx` (`Customer_id`);

--
-- Indexes for table `job_department`
--
ALTER TABLE `job_department`
  ADD PRIMARY KEY (`Job_id`),
  ADD KEY `Emp_id_idx` (`Emp_id`);

--
-- Indexes for table `leave`
--
ALTER TABLE `leave`
  ADD PRIMARY KEY (`Le_id`),
  ADD KEY `Emp_id_idx` (`Emp_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`Msg_id`),
  ADD KEY `Rs_id_idx` (`Rs_id`),
  ADD KEY `Emp_id_idx` (`Emp_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`Noti_id`),
  ADD KEY `Appointment_id_idx` (`Appointment_id`),
  ADD KEY `Fb_id_idx` (`Fb_id`),
  ADD KEY `Msg_id_idx` (`Msg_id`),
  ADD KEY `Customer_id_idx` (`Customer_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`Payment_id`),
  ADD KEY `Rs_id_idx` (`Rs_id`);

--
-- Indexes for table `payroll`
--
ALTER TABLE `payroll`
  ADD PRIMARY KEY (`Payroll_id`),
  ADD KEY `Emp_id_idx` (`Emp_id`),
  ADD KEY `Salary_id_idx` (`Salary_id`),
  ADD KEY `Le_id_idx` (`Le_id`),
  ADD KEY `Qr_id_idx` (`Qr_id`),
  ADD KEY `Report_id_idx` (`Report_id`),
  ADD KEY `Job_id_idx` (`Job_id`);

--
-- Indexes for table `prospective_customer`
--
ALTER TABLE `prospective_customer`
  ADD PRIMARY KEY (`Customer_id`);

--
-- Indexes for table `qr`
--
ALTER TABLE `qr`
  ADD PRIMARY KEY (`Qr_id`),
  ADD KEY `Emp_id_idx` (`Emp_id`);

--
-- Indexes for table `registered_students`
--
ALTER TABLE `registered_students`
  ADD PRIMARY KEY (`Rs_id`),
  ADD KEY `Emp_id_idx` (`Emp_id`),
  ADD KEY `Job_id_idx` (`Job_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`Report_id`),
  ADD KEY `Bill_id_idx` (`Bill_id`),
  ADD KEY `Payment_id_idx` (`Payment_id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`Salary_id`),
  ADD KEY `Job_id_idx` (`Job_id`),
  ADD KEY `Emp_id_idx` (`Emp_id`);

--
-- Indexes for table `show_fund`
--
ALTER TABLE `show_fund`
  ADD PRIMARY KEY (`Sfund_id`),
  ADD KEY `Course_id_idx` (`Course_id`),
  ADD KEY `Rs_id_idx` (`Rs_id`);

--
-- Indexes for table `student_academic_qualification`
--
ALTER TABLE `student_academic_qualification`
  ADD PRIMARY KEY (`Aq_id`),
  ADD KEY `Rs_id_idx` (`Rs_id`);

--
-- Indexes for table `student_application`
--
ALTER TABLE `student_application`
  ADD PRIMARY KEY (`Appl_id`),
  ADD KEY `Course_id_idx` (`Course_id`),
  ADD KEY `Rs_id_idx` (`Rs_id`),
  ADD KEY `Emp_id_idx` (`Emp_id`),
  ADD KEY `Job_id_idx` (`Job_id`);

--
-- Indexes for table `student_documents`
--
ALTER TABLE `student_documents`
  ADD PRIMARY KEY (`Studdoc_id`),
  ADD KEY `Emp_id_idx` (`Emp_id`),
  ADD KEY `Rs_id_idx` (`Rs_id`);

--
-- Indexes for table `student_work_experiences`
--
ALTER TABLE `student_work_experiences`
  ADD PRIMARY KEY (`Pex_id`),
  ADD KEY `Rs_id_idx` (`Rs_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `utility_management`
--
ALTER TABLE `utility_management`
  ADD PRIMARY KEY (`Bill_id`);

--
-- Indexes for table `visa`
--
ALTER TABLE `visa`
  ADD PRIMARY KEY (`Visa_id`),
  ADD KEY `Rs_id_idx` (`Rs_id`),
  ADD KEY `Job_id_idx` (`Job_id`),
  ADD KEY `Emp_id_idx` (`Emp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact_inquiries`
--
ALTER TABLE `contact_inquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `fk_appointment_customer_id` FOREIGN KEY (`Customer_id`) REFERENCES `prospective_customer` (`Customer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_appointment_emp_id` FOREIGN KEY (`Emp_id`) REFERENCES `employees` (`Emp_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `dashboard`
--
ALTER TABLE `dashboard`
  ADD CONSTRAINT `fk_dashboard_appointment_id` FOREIGN KEY (`Appointment_id`) REFERENCES `appointment` (`Appointment_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_dashboard_bill_id` FOREIGN KEY (`bill_id`) REFERENCES `utility_management` (`Bill_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_dashboard_noti_id` FOREIGN KEY (`Noti_id`) REFERENCES `notification` (`Noti_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_dashboard_report_id` FOREIGN KEY (`report_id`) REFERENCES `reports` (`Report_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_dashboard_rs_id` FOREIGN KEY (`Rs_id`) REFERENCES `registered_students` (`Rs_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `fk_feedback_customer_id` FOREIGN KEY (`Customer_id`) REFERENCES `prospective_customer` (`Customer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `job_department`
--
ALTER TABLE `job_department`
  ADD CONSTRAINT `fk_job_department_emp_id` FOREIGN KEY (`Emp_id`) REFERENCES `employees` (`Emp_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `leave`
--
ALTER TABLE `leave`
  ADD CONSTRAINT `fk_leave_emp_id` FOREIGN KEY (`Emp_id`) REFERENCES `employees` (`Emp_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `fk_messages_emp_id` FOREIGN KEY (`Emp_id`) REFERENCES `employees` (`Emp_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_messages_rs_id` FOREIGN KEY (`Rs_id`) REFERENCES `registered_students` (`Rs_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `fk_notification_appointment_id` FOREIGN KEY (`Appointment_id`) REFERENCES `appointment` (`Appointment_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_notification_customer_id` FOREIGN KEY (`Customer_id`) REFERENCES `prospective_customer` (`Customer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_notification_fb_id` FOREIGN KEY (`Fb_id`) REFERENCES `feedback` (`Fb_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_notification_msg_id` FOREIGN KEY (`Msg_id`) REFERENCES `messages` (`Msg_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `fk_payment_rs_id` FOREIGN KEY (`Rs_id`) REFERENCES `registered_students` (`Rs_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `payroll`
--
ALTER TABLE `payroll`
  ADD CONSTRAINT `fk_payroll_emp_id` FOREIGN KEY (`Emp_id`) REFERENCES `employees` (`Emp_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_payroll_job_id` FOREIGN KEY (`Job_id`) REFERENCES `job_department` (`Job_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_payroll_leave_id` FOREIGN KEY (`Le_id`) REFERENCES `leave` (`Le_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_payroll_qr_id` FOREIGN KEY (`Qr_id`) REFERENCES `qr` (`Qr_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_payroll_report_id` FOREIGN KEY (`Report_id`) REFERENCES `reports` (`Report_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_payroll_salary_id` FOREIGN KEY (`Salary_id`) REFERENCES `salary` (`Salary_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `qr`
--
ALTER TABLE `qr`
  ADD CONSTRAINT `fk_qr_emp_id` FOREIGN KEY (`Emp_id`) REFERENCES `employees` (`Emp_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `registered_students`
--
ALTER TABLE `registered_students`
  ADD CONSTRAINT `fk_registered_students_emp_id` FOREIGN KEY (`Emp_id`) REFERENCES `employees` (`Emp_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_registered_students_job_id` FOREIGN KEY (`Job_id`) REFERENCES `job_department` (`Job_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `fk_reports_bill_id` FOREIGN KEY (`Bill_id`) REFERENCES `utility_management` (`Bill_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reports_payment_id` FOREIGN KEY (`Payment_id`) REFERENCES `payment` (`Payment_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `salary`
--
ALTER TABLE `salary`
  ADD CONSTRAINT `fk_salary_emp_id` FOREIGN KEY (`Emp_id`) REFERENCES `employees` (`Emp_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_salary_job_id` FOREIGN KEY (`Job_id`) REFERENCES `job_department` (`Job_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `show_fund`
--
ALTER TABLE `show_fund`
  ADD CONSTRAINT `fk_showfund_course_id` FOREIGN KEY (`Course_id`) REFERENCES `courses` (`Course_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_showfund_rs_id` FOREIGN KEY (`Rs_id`) REFERENCES `registered_students` (`Rs_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `student_academic_qualification`
--
ALTER TABLE `student_academic_qualification`
  ADD CONSTRAINT `fk_saqualification_rs_id` FOREIGN KEY (`Rs_id`) REFERENCES `registered_students` (`Rs_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `student_application`
--
ALTER TABLE `student_application`
  ADD CONSTRAINT `fk_application_course_id` FOREIGN KEY (`Course_id`) REFERENCES `courses` (`Course_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_application_emp_id` FOREIGN KEY (`Emp_id`) REFERENCES `employees` (`Emp_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_application_job_id` FOREIGN KEY (`Job_id`) REFERENCES `job_department` (`Job_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_application_rs_id` FOREIGN KEY (`Rs_id`) REFERENCES `registered_students` (`Rs_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `student_documents`
--
ALTER TABLE `student_documents`
  ADD CONSTRAINT `fk_documents_emp_id` FOREIGN KEY (`Emp_id`) REFERENCES `employees` (`Emp_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_documents_rs_id` FOREIGN KEY (`Rs_id`) REFERENCES `registered_students` (`Rs_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `student_work_experiences`
--
ALTER TABLE `student_work_experiences`
  ADD CONSTRAINT `fk_sworkexperience_rs_id` FOREIGN KEY (`Rs_id`) REFERENCES `registered_students` (`Rs_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `visa`
--
ALTER TABLE `visa`
  ADD CONSTRAINT `fk_visa_emp_id` FOREIGN KEY (`Emp_id`) REFERENCES `employees` (`Emp_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_visa_job_id` FOREIGN KEY (`Job_id`) REFERENCES `job_department` (`Job_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_visa_rs_id` FOREIGN KEY (`Rs_id`) REFERENCES `registered_students` (`Rs_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
