-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2021 at 09:52 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `transport`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` text NOT NULL,
  `employment_date` date NOT NULL,
  `phone_number` varchar(244) NOT NULL,
  `residence` varchar(255) NOT NULL,
  `cv` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `name_of_guarantor` varchar(255) NOT NULL,
  `phone_of_guarantor` varchar(255) NOT NULL,
  `residence_of_guarantor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `full_name`, `email`, `password`, `role`, `employment_date`, `phone_number`, `residence`, `cv`, `picture`, `dob`, `name_of_guarantor`, `phone_of_guarantor`, `residence_of_guarantor`) VALUES
(10, 'Emmanuel Igbokwe', 'emmy@gmail.com', '$2y$10$IXohGSQ8J7bhlzxq4EmUKer8nAUyVwpQPhbw.qcb2vKa0F7GXBVLu', 'Admin', '2020-12-08', '08039687856', '1', 'BoMwhitepaper.pdf', 'Ledger Dispay Shot.JPG', '2020-12-29', 'Osunkwo Anna', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `avaliable_buses`
--

CREATE TABLE `avaliable_buses` (
  `id` int(11) NOT NULL,
  `from_` varchar(255) NOT NULL,
  `to_` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `price` decimal(11,3) NOT NULL,
  `bus_name` varchar(255) NOT NULL,
  `bus_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `avaliable_seats`
--

CREATE TABLE `avaliable_seats` (
  `id` int(11) NOT NULL,
  `p_key` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `date_of_movement` date NOT NULL,
  `time_of_movement` time NOT NULL,
  `seat_no` int(11) NOT NULL,
  `seat_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `booked_seats`
--

CREATE TABLE `booked_seats` (
  `id` int(11) NOT NULL,
  `p_key` int(11) NOT NULL,
  `departure` varchar(255) NOT NULL,
  `arrival` varchar(255) NOT NULL,
  `seat_position` varchar(255) NOT NULL,
  `date_of_movement` date NOT NULL,
  `time_of_movement` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booked_seats`
--

INSERT INTO `booked_seats` (`id`, `p_key`, `departure`, `arrival`, `seat_position`, `date_of_movement`, `time_of_movement`) VALUES
(1, 112, 'Enugu', 'Lagos', '22', '2021-01-02', '11:45:00'),
(2, 1123, 'Lagos', 'Enugu', '78', '2021-01-02', '06:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `p_key` int(11) NOT NULL,
  `no_of_seats` int(11) NOT NULL,
  `discount` decimal(13,2) NOT NULL,
  `total` decimal(13,2) NOT NULL,
  `date_of_departure` date NOT NULL,
  `time_of_departure` time NOT NULL,
  `date_of_booking` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bus_management`
--

CREATE TABLE `bus_management` (
  `id` int(11) NOT NULL,
  `bus_no` int(11) NOT NULL,
  `bus_name` varchar(255) NOT NULL,
  `pic` varchar(11) NOT NULL,
  `seats` int(11) NOT NULL,
  `departure` varchar(244) NOT NULL,
  `arrival` varchar(255) NOT NULL,
  `time_` time NOT NULL,
  `price` decimal(13,2) NOT NULL,
  `ac` varchar(11) NOT NULL,
  `remarks` text NOT NULL,
  `suspend_bus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bus_management`
--

INSERT INTO `bus_management` (`id`, `bus_no`, `bus_name`, `pic`, `seats`, `departure`, `arrival`, `time_`, `price`, `ac`, `remarks`, `suspend_bus`) VALUES
(2, 333, 'Sienna', 'car_1.jpg', 10, 'Enugu', 'Lagos', '11:45:00', '13500.00', 'Yes', 'Everyday', 0),
(3, 339, 'Bullion 65', 'car_4.jpg', 10, 'Enugu', 'Calabar', '09:00:00', '13000.00', 'Yes', 'VIP', 0),
(4, 435, 'Toyota Haice', 'bus6.jpg', 10, 'Enugu', 'Lagos', '14:30:00', '12600.00', 'Yes', 'Extreme Comfort', 0),
(5, 677, 'Hummer HS4', 'car_7.jpg', 10, 'Enugu', 'Port-Harcourt', '16:00:00', '16000.00', 'Yes', 'Presidential', 0),
(6, 339, 'Bullion 66', 'bus5.jpg', 10, 'Enugu', 'Lagos', '06:45:00', '14000.00', 'Yes', 'High Speed', 0),
(7, 114, 'Elope 32', 'img_1.jpg', 10, 'Enugu', 'Port-Harcourt', '09:00:00', '13900.00', 'Yes', 'Comfort', 0),
(8, 677, 'Speeder', 'bus6.jpg', 10, 'Lagos', 'Enugu', '06:45:00', '13500.00', 'Yes', 'Fast Trip', 0),
(9, 112, 'Jumper 34', 'bus7.jpg', 10, 'Lagos', 'Enugu', '09:00:00', '15000.00', 'Yes', 'Flight Mode', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer_details`
--

CREATE TABLE `customer_details` (
  `id` int(11) NOT NULL,
  `p_key` int(11) NOT NULL,
  `p_full_name` varchar(255) NOT NULL,
  `p_gender` varchar(255) NOT NULL,
  `p_email` varchar(255) NOT NULL,
  `p_phone` varchar(244) NOT NULL,
  `p_next_of_kin` varchar(255) NOT NULL,
  `p_next_of_kin_phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `p_key` int(11) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `payment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `return_booking`
--

CREATE TABLE `return_booking` (
  `id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `return_bus_id` int(11) NOT NULL,
  `p_key` int(11) NOT NULL,
  `date_of_return` date NOT NULL,
  `time_of_return` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `avaliable_buses`
--
ALTER TABLE `avaliable_buses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `avaliable_seats`
--
ALTER TABLE `avaliable_seats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booked_seats`
--
ALTER TABLE `booked_seats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bus_management`
--
ALTER TABLE `bus_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_details`
--
ALTER TABLE `customer_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `return_booking`
--
ALTER TABLE `return_booking`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `avaliable_buses`
--
ALTER TABLE `avaliable_buses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `avaliable_seats`
--
ALTER TABLE `avaliable_seats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booked_seats`
--
ALTER TABLE `booked_seats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bus_management`
--
ALTER TABLE `bus_management`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customer_details`
--
ALTER TABLE `customer_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `return_booking`
--
ALTER TABLE `return_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
