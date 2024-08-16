-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2024 at 09:35 AM
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
-- Database: `textile_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `worker_id` int(11) NOT NULL,
  `mdate` date NOT NULL,
  `category` varchar(50) NOT NULL,
  `in_time` varchar(50) NOT NULL,
  `out_time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `worker_id`, `mdate`, `category`, `in_time`, `out_time`) VALUES
(15, 7, '2024-04-01', 'In time', '10:40', '10:40'),
(16, 7, '2024-04-02', 'In time', '10:47', '10:50'),
(17, 3, '2024-04-02', 'In time', '10:53', '10:54');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `in_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `invoice_id` varchar(50) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`in_id`, `product_id`, `quantity`, `invoice_id`, `create_at`) VALUES
(8, 11, 6, '305744', '2024-04-03 05:23:38'),
(9, 13, 2, '305744', '2024-04-03 05:23:38'),
(10, 11, 1, '905217', '2024-04-03 05:47:05'),
(11, 11, 3, '729698', '2024-04-03 05:51:41'),
(12, 11, 1, '455835', '2024-04-03 06:10:18'),
(13, 12, 1, '455835', '2024-04-03 06:10:18'),
(14, 13, 1, '455835', '2024-04-03 06:10:18'),
(15, 15, 1, '455835', '2024-04-03 06:10:18'),
(16, 15, 1, '166392', '2024-04-03 06:54:03'),
(17, 17, 1, '166392', '2024-04-03 06:54:03'),
(18, 11, 1, '709820', '2024-04-03 06:54:48'),
(19, 12, 1, '709820', '2024-04-03 06:54:48'),
(20, 11, 2, '102260', '2024-04-03 06:58:43'),
(21, 12, 1, '102260', '2024-04-03 06:58:43'),
(22, 11, 2, '264660', '2024-04-03 07:31:42'),
(23, 12, 3, '264660', '2024-04-03 07:31:42'),
(24, 13, 4, '264660', '2024-04-03 07:31:42');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pid` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `price` int(11) NOT NULL,
  `brand` varchar(60) NOT NULL,
  `category` varchar(60) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` text NOT NULL,
  `myimage` varchar(80) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pid`, `name`, `price`, `brand`, `category`, `quantity`, `description`, `myimage`, `created_at`) VALUES
(11, 'Men solid grey Track pants', 200, 'Levis', 'Track pants', 96, ' Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus, alias?', 'products/track_pants.jpeg', '2024-04-03 07:31:42'),
(12, 'Shorts for boys casual', 120, 'Westside', 'Shorts', 66, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus, alias?', 'products/shorts.webp', '2024-04-03 07:31:42'),
(13, 'Printed Bollywood Chiffon saree', 1500, 'H&M', 'Saree', 36, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus, alias?', 'products/saree.webp', '2024-04-03 07:31:42'),
(15, 'Woven paithani cotton saree', 800, 'Fab silk', 'Saree', 50, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus, alias?', 'products/cotten saree.webp', '2024-04-03 06:57:10'),
(17, 'dsa', 1000, 'Nike', '4322', 100, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus, alias?', 'products/bike.jpeg', '2024-04-03 06:57:05');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_products`
--

CREATE TABLE `supplier_products` (
  `pid` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `price` int(11) NOT NULL,
  `brand` varchar(60) NOT NULL,
  `category` varchar(60) NOT NULL,
  `quantity` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier_products`
--

INSERT INTO `supplier_products` (`pid`, `name`, `price`, `brand`, `category`, `quantity`, `supplier_id`, `created_at`) VALUES
(1, 'Men solid grey Track pants', 130, 'Levis', 'Track pants', 50, 11, '2024-04-01 06:01:26'),
(2, 'Shorts for boys casual', 100, 'Levis', 'Shorts', 100, 11, '2024-04-01 06:01:29'),
(3, 'Printed Bollywood Chiffon saree', 850, 'Nike', 'Saree', 30, 11, '2024-04-01 06:01:32'),
(8, 'Woven Paithani cotten saree', 1250, 'Westside', 'Saree', 60, 12, '2024-04-01 05:58:42');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `phone`, `password`, `created_at`) VALUES
(1, 'meera', 'meera@gmail.com', '7897823122', '827ccb0eea8a706c4c34a16891f84e7b', '2024-03-30 13:02:02'),
(10, 'ganesh', 'ganesh@gmail.com', '8756757576', '202cb962ac59075b964b07152d234b70', '2024-03-30 13:14:29'),
(11, 'santhosh', 'santhosh@gmail.com', '9687124323', '827ccb0eea8a706c4c34a16891f84e7b', '2024-04-01 04:57:57'),
(12, 'saravana', 'saravana@gmail.com', '7625945345', '202cb962ac59075b964b07152d234b70', '2024-04-01 05:55:31');

-- --------------------------------------------------------

--
-- Table structure for table `workers`
--

CREATE TABLE `workers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `worker_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `workers`
--

INSERT INTO `workers` (`id`, `name`, `email`, `phone`, `password`, `worker_id`) VALUES
(2, 'nishithas', 'nishitha@gmail.com', '8534535112', '827ccb0eea8a706c4c34a16891f84e7b', '1002'),
(3, 'samantha', 'samantha@gmail.com', '8912389222', 'f01e0d7992a3b7748538d02291b0beae', '1003'),
(4, 'raja', 'raja@gmail.com', '78685435345', '827ccb0eea8a706c4c34a16891f84e7b', '1004'),
(6, 'veera', 'veera@gmail.com', '635', 'c81e728d9d4c2f636f067f89cc14862c', '1005'),
(7, 'sam', 'sam@gmail.com', '973945344', '202cb962ac59075b964b07152d234b70', '1006');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`in_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `supplier_products`
--
ALTER TABLE `supplier_products`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workers`
--
ALTER TABLE `workers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `in_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `supplier_products`
--
ALTER TABLE `supplier_products`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `workers`
--
ALTER TABLE `workers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
