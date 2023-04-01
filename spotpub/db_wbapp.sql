-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2023 at 05:34 PM
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
-- Database: `db_wbapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(8) UNSIGNED NOT NULL,
  `order_date_added` date NOT NULL,
  `order_time_added` time NOT NULL,
  `order_saved` int(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `order_date_added`, `order_time_added`, `order_saved`) VALUES
(10000001, '2023-04-01', '21:27:56', 0),
(10000002, '2023-04-01', '21:29:10', 0),
(10000003, '2023-04-01', '22:33:46', 0),
(10000004, '2023-04-01', '22:39:06', 0),
(10000005, '2023-04-01', '23:00:38', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_final`
--

CREATE TABLE `tbl_order_final` (
  `order_id` int(8) NOT NULL DEFAULT 0,
  `prod_id` int(8) NOT NULL DEFAULT 0,
  `order_qty` int(8) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_items`
--

CREATE TABLE `tbl_order_items` (
  `order_id` int(8) NOT NULL DEFAULT 0,
  `prod_id` int(8) NOT NULL DEFAULT 0,
  `order_qty` int(8) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_order_items`
--

INSERT INTO `tbl_order_items` (`order_id`, `prod_id`, `order_qty`) VALUES
(10000001, 10000037, 54),
(10000001, 10000041, 66),
(10000002, 10000042, 3),
(10000003, 10000038, 43),
(10000003, 10000037, 5),
(10000004, 10000040, 4),
(10000004, 10000038, 4),
(10000004, 10000043, 7);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(8) UNSIGNED NOT NULL,
  `product_name` varchar(180) NOT NULL DEFAULT '',
  `prod_type` varchar(255) NOT NULL DEFAULT '',
  `prod_price` decimal(8,2) NOT NULL DEFAULT 0.00,
  `product_date_added` date NOT NULL,
  `product_time_added` time NOT NULL,
  `product_date_updated` date NOT NULL,
  `product_time_updated` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `prod_type`, `prod_price`, `product_date_added`, `product_time_added`, `product_date_updated`, `product_time_updated`) VALUES
(10000034, 'Hot Coffee', 'Beverages', '50.00', '2023-03-23', '03:47:37', '0000-00-00', '00:00:00'),
(10000035, 'Hot Choco', 'Beverages', '60.00', '2023-03-23', '03:47:51', '0000-00-00', '00:00:00'),
(10000036, 'Toxic Red', 'Cocktails', '120.00', '2023-03-23', '03:48:07', '0000-00-00', '00:00:00'),
(10000037, 'Mule', 'Beers', '70.00', '2023-03-23', '03:48:21', '0000-00-00', '00:00:00'),
(10000038, 'Pancit Canton', 'Noodles', '30.00', '2023-03-23', '03:48:40', '0000-00-00', '00:00:00'),
(10000039, 'Boneless Bangus', 'Rice Meals With Drinks', '160.00', '2023-03-23', '03:49:19', '0000-00-00', '00:00:00'),
(10000040, 'Chicken Skin', 'Starters', '200.00', '2023-03-23', '03:49:33', '0000-00-00', '00:00:00'),
(10000041, 'Three Cheese', 'Pizza', '250.00', '2023-03-23', '03:49:53', '0000-00-00', '00:00:00'),
(10000042, 'Ham', 'Rice Bowls', '65.00', '2023-03-23', '03:50:06', '0000-00-00', '00:00:00'),
(10000043, 'Vanilla', 'Noodles', '44.00', '2023-03-23', '10:56:23', '0000-00-00', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_type`
--

CREATE TABLE `tbl_type` (
  `type_id` int(3) UNSIGNED NOT NULL,
  `type_name` varchar(180) NOT NULL DEFAULT '',
  `type_date_added` date NOT NULL,
  `type_time_added` time NOT NULL,
  `type_date_updated` date NOT NULL,
  `type_time_updated` time NOT NULL,
  `type_status` int(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_type`
--

INSERT INTO `tbl_type` (`type_id`, `type_name`, `type_date_added`, `type_time_added`, `type_date_updated`, `type_time_updated`, `type_status`) VALUES
(23432, 'Beers', '2023-03-22', '09:11:36', '0000-00-00', '00:00:00', 1),
(23431, 'Cocktails', '2023-03-22', '09:11:29', '0000-00-00', '00:00:00', 1),
(23430, 'Beverages', '2023-03-22', '09:11:20', '0000-00-00', '00:00:00', 1),
(23433, 'Noodles', '2023-03-22', '09:11:42', '0000-00-00', '00:00:00', 1),
(23434, 'Rice Meals With Drinks', '2023-03-22', '09:11:54', '0000-00-00', '00:00:00', 1),
(23435, 'Starters', '2023-03-22', '09:12:00', '0000-00-00', '00:00:00', 1),
(23436, 'Pizza', '2023-03-22', '09:12:05', '0000-00-00', '00:00:00', 1),
(23437, 'Rice Bowls', '2023-03-22', '09:12:12', '0000-00-00', '00:00:00', 1),
(23440, 'Others', '2023-03-22', '11:08:18', '0000-00-00', '00:00:00', 1),
(23453, 'Others', '2023-03-23', '10:56:37', '0000-00-00', '00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(8) UNSIGNED NOT NULL,
  `user_lastname` varchar(180) NOT NULL DEFAULT '',
  `user_firstname` varchar(180) NOT NULL DEFAULT '',
  `user_email` varchar(180) NOT NULL DEFAULT '',
  `user_password` varchar(180) NOT NULL DEFAULT '',
  `user_date_added` date NOT NULL,
  `user_time_added` time NOT NULL,
  `user_date_updated` date NOT NULL,
  `user_time_updated` time NOT NULL,
  `user_status` int(1) NOT NULL DEFAULT 0,
  `user_token` varchar(255) NOT NULL DEFAULT '',
  `user_access` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_lastname`, `user_firstname`, `user_email`, `user_password`, `user_date_added`, `user_time_added`, `user_date_updated`, `user_time_updated`, `user_status`, `user_token`, `user_access`) VALUES
(10000001, 'Estelloso', 'Cas', '', '123', '2023-03-17', '10:22:42', '2023-03-22', '09:14:16', 1, '', 'Staff'),
(10000002, 'Canoy', 'Ron Gerald', 'rongeraldc@gmail.com', '123', '2023-03-21', '00:37:29', '0000-00-00', '00:00:00', 1, '', 'Supervisor'),
(10000003, 'Lapore', 'Lorvin Jude', 'lorvin@jude.com', '123', '2023-03-21', '01:03:39', '0000-00-00', '00:00:00', 1, '', 'Cashier'),
(10000004, 'Marie', 'Ella', 'ella@marie.com', '123', '2023-03-22', '10:20:26', '0000-00-00', '00:00:00', 1, '', 'Manager'),
(10000005, 'Causing', 'Francis', '', '123', '2023-03-22', '10:27:05', '2023-03-22', '20:53:36', 1, '', 'Owner');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_order_final`
--
ALTER TABLE `tbl_order_final`
  ADD KEY `prod_id` (`prod_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `tbl_order_items`
--
ALTER TABLE `tbl_order_items`
  ADD KEY `order_id` (`order_id`),
  ADD KEY `prod_id` (`prod_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_type`
--
ALTER TABLE `tbl_type`
  ADD PRIMARY KEY (`type_id`) USING BTREE;

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000006;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000044;

--
-- AUTO_INCREMENT for table `tbl_type`
--
ALTER TABLE `tbl_type`
  MODIFY `type_id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23454;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000006;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
