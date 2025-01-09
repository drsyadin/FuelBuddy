-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2024 at 09:38 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fd1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `username`, `password`) VALUES
(1, 'admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `approved_orders`
--

CREATE TABLE `approved_orders` (
  `approved_order_id` int(11) NOT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  `status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `approved_orders`
--

INSERT INTO `approved_orders` (`approved_order_id`, `customer_name`, `quantity`, `total_price`, `status`) VALUES
(7, 'levie', 5, '480.00', 0),
(8, 'alice', 2, '214.00', 0),
(9, 'Drisya Dinesh', 2, '214.00', 0),
(10, 'Drisya Dinesh', 2, '214.00', 0),
(11, 'jo', 2, '214.00', 0),
(13, 'vyshnav', 3, '321.00', 0),
(29, 'aman', 2, '192.00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `full_name`, `email`, `password`) VALUES
(1, 'drisya', 'drisya92112@gmail.com', '123'),
(2, 'aleena p g ', 'aleena@gmail.com', '111'),
(3, 'aman yasmine', 'aman@gmail.com', '111'),
(4, 'haneef zain', 'haneef@gmail.com', '111'),
(5, 'shafi', 'shafi@gmail.com', '123'),
(6, 'akhil', 'akhi@gmail.com', '111');

-- --------------------------------------------------------

--
-- Table structure for table `customer_details`
--

CREATE TABLE `customer_details` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_details`
--

INSERT INTO `customer_details` (`customer_id`, `customer_name`, `email`, `phone`, `address`) VALUES
(1, 'Drisya Dinesh', 'drisya92112@gmail.com', '9188354235', 'Kalayath House Kalayath Road'),
(2, 'aleena p g ', 'aleena@gmail.com', '9495781002', 'pathiyala house , manjumel '),
(3, 'aman yasmine', 'aman@gmail.com', '9848009600', 'aluva');

-- --------------------------------------------------------

--
-- Table structure for table `declined_orders`
--

CREATE TABLE `declined_orders` (
  `declined_order_id` int(11) NOT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `declined_orders`
--

INSERT INTO `declined_orders` (`declined_order_id`, `customer_name`, `quantity`, `total_price`) VALUES
(23, 'klevin', 5, '535.00'),
(24, 'asdfgyhjk', 2, '192.00'),
(25, 'james', 5, '480.00'),
(26, 'james', 5, '480.00'),
(27, 'Drisya Dinesh', 3, '321.00'),
(28, 'Drisya Dinesh', 3, '321.00'),
(29, 'Drisya Dinesh', 2, '214.00'),
(30, 'Drisya Dinesh', 2, '214.00'),
(31, 'Drisya Dinesh', 2, '214.00'),
(32, 'Drisya Dinesh', 2, '214.00'),
(33, 'Drisya Dinesh', 2, '214.00');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_boys`
--

CREATE TABLE `delivery_boys` (
  `delivery_boy_id` int(11) NOT NULL,
  `delivery_boy_name` varchar(255) NOT NULL,
  `contact` int(100) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `delivery_boys`
--

INSERT INTO `delivery_boys` (`delivery_boy_id`, `delivery_boy_name`, `contact`, `status`) VALUES
(1, 'john', 0, 'Assigned'),
(2, 'vyshnav ', 0, 'Assigned'),
(3, 'akhil', 0, 'Assigned'),
(4, 'haneef', 0, 'Assigned'),
(5, 'shafi', 0, 'Assigned'),
(8, 'Akhil', 0, 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `Message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `name`, `email`, `Message`, `created_at`) VALUES
(1, 'Drisya Dinesh', 'drisya92112@gmail.com', 'good service', '2023-11-11 19:31:45'),
(2, 'aman yasmine ', 'aman@gmail.com', 'good service', '2023-11-12 18:43:18');

-- --------------------------------------------------------

--
-- Table structure for table `fuel_orders`
--

CREATE TABLE `fuel_orders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `pickup_location` varchar(255) NOT NULL,
  `gps_address` varchar(255) NOT NULL,
  `pin_code` varchar(20) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `fuel_type` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fuel_orders`
--

INSERT INTO `fuel_orders` (`id`, `name`, `pickup_location`, `gps_address`, `pin_code`, `contact`, `fuel_type`, `quantity`, `total_price`, `order_date`) VALUES
(1, 'Drisya Dinesh', '9.9312328, 76.2673041', 'Kalayath House Kalayath Road', '682012', '9188354235', 'Diesel', 2, '192.00', '2023-11-11 09:11:14'),
(5, 'aleena', '9.9312328, 76.2673041', 'Kalayath House Kalayath Road', '682012', '9188354235', 'Petrol', 1, '107.00', '2023-11-11 09:17:00'),
(6, 'dinesh', '9.9312328, 76.2673041', 'asdfghjkl', '431809', '09188354235', 'Petrol', 5, '535.00', '2023-11-11 09:19:25'),
(9, 'dars', '9.9312328, 76.2673041', 'aluva', '682012', '9446039460', 'Petrol', 8, '856.00', '2023-11-11 09:33:56'),
(12, 'awsed', '9.9312328, 76.2673041', 'qwertyuio', '741852', '9638527418', 'Petrol', 2, '214.00', '2023-11-11 09:54:36'),
(13, 'siddhu', '9.9312328, 76.2673041', 'aluva', '78945', '9495781001', 'Petrol', 2, '214.00', '2023-11-11 10:43:40'),
(23, 'klevin', '9.9312328, 76.2673041', 'los angelos', '682012', '9446039460', 'Petrol', 5, '535.00', '2023-11-11 11:14:15'),
(24, 'james', '9.9312328, 76.2673041', 'canada', '2134565', '9886523410', 'Diesel', 5, '480.00', '2023-11-11 18:58:50'),
(25, 'qwertyui', '9.9312328, 76.2673041', 'asdfghjk', '9652', '9188354235', 'Petrol', 3, '321.00', '2023-11-11 19:02:35'),
(26, 'qwertyui', '9.9312328, 76.2673041', 'asdfghjk', '9652', '9188354235', 'Petrol', 3, '321.00', '2023-11-11 19:02:57'),
(27, 'qwertyui', '9.9312328, 76.2673041', 'asdfghjk', '9652', '9188354235', 'Petrol', 3, '321.00', '2023-11-11 19:03:01'),
(28, 'qwertyui', '9.9312328, 76.2673041', 'asdfghjk', '9652', '9188354235', 'Petrol', 3, '321.00', '2023-11-11 19:03:21'),
(29, 'aman', '8.2793932, 73.0523685', 'aluva', '785421', '9840009600', 'Diesel', 2, '192.00', '2023-11-12 14:16:57'),
(30, 'Drisya Dinesh', '8.2793932, 73.0523685', 'Kalayath House Kalayath Road', '682012', '9188354235', 'Petrol', 3, '321.00', '2023-11-12 15:58:54'),
(31, 'Drisya Dinesh', '10.0301439, 76.2772647', 'aluva', '682012', '9188354235', 'Petrol', 2, '214.00', '2023-11-12 18:56:23'),
(32, 'Drisya Dinesh', '10.0301439, 76.2772647', 'aluva', '682012', '9188354235', 'Petrol', 2, '214.00', '2023-11-12 18:57:34'),
(33, 'Drisya Dinesh', '10.0301439, 76.2772647', 'aluva', '682012', '9188354235', 'Petrol', 2, '214.00', '2023-11-12 18:59:01'),
(34, 'Drisya Dinesh', '10.0301439, 76.2772647', 'aluva', '682012', '9188354235', 'Petrol', 2, '214.00', '2023-11-12 19:28:17'),
(35, 'Drisya Dinesh', '10.0561661, 76.3279651', 'Kalayath House Kalayath Road', '682012', '9188354235', 'Petrol', 2, '214.00', '2023-11-13 05:45:49'),
(36, 'Drisya Dinesh', '9.9312328, 76.2673041', 'Kalayath House Kalayath Road', '682012', '1123456789', 'Petrol', 3, '321.00', '2023-11-13 07:16:39'),
(37, 'Drisya Dinesh', '9.9312328, 76.2673041', 'Kalayath House Kalayath Road', '682012', '0918835423', 'Petrol', 3, '321.00', '2023-11-13 07:19:53'),
(38, 'shafi', '10.0563369, 76.3279651', 'aluva', '987654', '9446039460', 'Petrol', 2, '214.00', '2023-11-13 07:41:29'),
(39, 'Drisya Dinesh', '9.9312328, 76.2673041', 'Kalayath House Kalayath Road', '682012', '9188354235', 'Petrol', 2, '214.00', '2024-01-01 08:23:51'),
(40, 'akhil', '10.0728832, 76.3756544', 'vaduthala', '682012', '6268284102', 'Petrol', 2, '214.00', '2024-01-10 18:49:11'),
(41, 'Drisya Dinesh', '10.0728832, 76.3756544', 'Kalayath House Kalayath Road', '682012', '9495781001', 'Petrol', 1, '107.00', '2024-01-10 18:50:02');

-- --------------------------------------------------------

--
-- Table structure for table `fuel_stations`
--

CREATE TABLE `fuel_stations` (
  `station_id` int(11) NOT NULL,
  `station_name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('Pending','Approved','Declined') NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fuel_stations`
--

INSERT INTO `fuel_stations` (`station_id`, `station_name`, `location`, `contact`, `username`, `password`, `status`) VALUES
(1, 'indian oil', 'muttom', '9495781001', 'indianoil ', '123', 'Approved'),
(2, 'bharat petrol', 'aluva', '9446039460', 'bhpetrol', '123', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `status` int(11) NOT NULL,
  `delivery_boy_id` int(11) DEFAULT NULL,
  `fuel_type` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_name`, `quantity`, `total_price`, `status`, `delivery_boy_id`, `fuel_type`) VALUES
(28, 'qwertyui', 3, '321.00', 2, 5, 'Petrol'),
(31, 'Drisya Dinesh', 2, '214.00', 2, NULL, 'Petrol'),
(38, 'shafi', 2, '214.00', 0, NULL, 'Petrol'),
(40, 'akhil', 2, '214.00', 0, NULL, 'Petrol'),
(41, 'Drisya Dinesh', 1, '107.00', 0, NULL, 'Petrol');

-- --------------------------------------------------------

--
-- Table structure for table `prebook_orders`
--

CREATE TABLE `prebook_orders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `pickup_location` varchar(255) NOT NULL,
  `gps_address` varchar(255) NOT NULL,
  `pin_code` varchar(10) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `fuel_type` varchar(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `prebook_date` date NOT NULL,
  `total_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prebook_orders`
--

INSERT INTO `prebook_orders` (`id`, `name`, `pickup_location`, `gps_address`, `pin_code`, `contact`, `fuel_type`, `quantity`, `prebook_date`, `total_price`) VALUES
(1, 'Drisya Dinesh', '9.9312328, 76.2673041', 'Kalayath House Kalayath Road', '682012', '741852', 'Petrol', 2, '2023-11-09', '214.00'),
(4, 'aleena', '9.9312328, 76.2673041', 'manjumel', '789654', '9446039460', 'Petrol', 9, '2023-11-12', '963.00'),
(6, 'Drisya ', '9.9312328, 76.2673041', 'Kalayath House Kalayath Road', '682012', '9446039460', 'Petrol', 2, '2023-11-19', '214.00'),
(7, 'levie', '9.9312328, 76.2673041', 'california', '431809', '9840009600', 'Diesel', 5, '2023-11-12', '480.00'),
(8, 'alice', '9.9312328, 76.2673041', 'canada', '789965', '9446039460', 'Petrol', 2, '2023-11-12', '214.00'),
(9, 'Drisya Dinesh', '9.9312328, 76.2673041', 'Kalayath House Kalayath Road', '682012', '9446039460', 'Petrol', 2, '2023-11-16', '214.00'),
(10, 'Drisya Dinesh', '9.9312328, 76.2673041', 'Kalayath House Kalayath Road', '682012', '9446039460', 'Petrol', 2, '2023-11-16', '214.00'),
(11, 'jo', '9.9312328, 76.2673041', 'america', '682012', '9446087101', 'Petrol', 2, '2023-11-12', '214.00'),
(12, 'asdfgyhjk', '9.9312328, 76.2673041', '876trewq', '741852', '9446039460', 'Diesel', 2, '2023-11-12', '192.00'),
(13, 'vyshnav', '9.9312328, 76.2673041', 'asdfghjkl', '789456', '9446039460', 'Petrol', 3, '2023-11-12', '321.00'),
(14, 'john', '9.9312328, 76.2673041', 'L A', '6521031', '9495991917', 'Petrol', 3, '2023-11-16', '321.00'),
(15, 'asdfghjk', '9.9312328, 76.2673041', 'lkjhgfdszxcvbnm,', '741852', '9418529631', 'Diesel', 1, '2023-11-17', '96.00'),
(16, 'Drisya Dinesh', '9.9312328, 76.2673041', 'Kalayath House Kalayath Road', '682012', '9188354235', 'Petrol', 4, '2023-11-14', '428.00'),
(17, 'Drisya Dinesh', '10.0728832, 76.3756544', 'Kalayath House Kalayath Road', '682012', '9188354235', 'Petrol', 3, '2024-01-12', '321.00');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` int(11) NOT NULL,
  `fuel_type` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `fuel_type`, `quantity`) VALUES
(5, 'diesel', 50),
(6, 'petrol', 26);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `approved_orders`
--
ALTER TABLE `approved_orders`
  ADD PRIMARY KEY (`approved_order_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `customer_details`
--
ALTER TABLE `customer_details`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `declined_orders`
--
ALTER TABLE `declined_orders`
  ADD PRIMARY KEY (`declined_order_id`);

--
-- Indexes for table `delivery_boys`
--
ALTER TABLE `delivery_boys`
  ADD PRIMARY KEY (`delivery_boy_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `fuel_orders`
--
ALTER TABLE `fuel_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fuel_stations`
--
ALTER TABLE `fuel_stations`
  ADD PRIMARY KEY (`station_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `FK_delivery_boy_id` (`delivery_boy_id`);

--
-- Indexes for table `prebook_orders`
--
ALTER TABLE `prebook_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `approved_orders`
--
ALTER TABLE `approved_orders`
  MODIFY `approved_order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer_details`
--
ALTER TABLE `customer_details`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `declined_orders`
--
ALTER TABLE `declined_orders`
  MODIFY `declined_order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `delivery_boys`
--
ALTER TABLE `delivery_boys`
  MODIFY `delivery_boy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fuel_orders`
--
ALTER TABLE `fuel_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `fuel_stations`
--
ALTER TABLE `fuel_stations`
  MODIFY `station_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `prebook_orders`
--
ALTER TABLE `prebook_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_delivery_boy_id` FOREIGN KEY (`delivery_boy_id`) REFERENCES `delivery_boys` (`delivery_boy_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
