-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2021 at 09:11 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommex`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `prod_id`, `price`, `file`, `date`) VALUES
(21, 28, 11, '130', 'IMG_20180803_105051.jpg.png', '2021-08-18'),
(23, 28, 11, '130', 'a1.jpg', '2021-08-19');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `file` varchar(255) NOT NULL,
  `scheduled_date` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `prod_id`, `weight`, `total_price`, `file`, `scheduled_date`, `status`, `date`) VALUES
(84, 28, 9, 6, 660, 'art.jpg', '2021-08-27T12:20', 0, '2021-08-18 12:20:41'),
(89, 28, 9, 7, 770, 'art.jpg', '2021-08-18T14:52', 2, '2021-08-18 14:52:54'),
(90, 28, 9, 1, 110, 'art.jpg', '', 1, '2021-08-18 15:21:40'),
(91, 28, 11, 1, 130, 'IMG_20180803_105051.jpg.png', '', 2, '2021-08-18 16:08:57'),
(92, 28, 11, 4, 520, 'IMG_20180803_105051.jpg.png', '2021-08-17T12:11', 2, '2021-08-19 10:10:10'),
(93, 28, 11, 2, 130, 'a1.jpg', '', 2, '2021-08-19 10:11:55');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `sub_products` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `p_name`, `sub_products`, `weight`, `price`, `picture`, `date`) VALUES
(3, 'Aluminiums', 'Heavy', '1', '50', 'a1.jpg', '2021-08-17'),
(4, 'Brass', 'Light', '1', '60', 'a2.jpg', '2021-08-17'),
(5, 'Cables', 'Light', '1', '70', 'a3.jpg', '2021-08-17'),
(6, 'Cardboard', 'Cardboard Material', '1', '80', 'a4.jpg', '2021-08-17'),
(7, 'Copper', 'Heavy Weight', '1', '90', 'a5.png', '2021-08-17'),
(8, 'Glass Bottels', 'Glass Bottle, Heavy Weight', '1', '100', 'a1.jpg', '2021-08-17'),
(9, 'Iron', 'Heavy', '1', '110', 'a2.jpg', '2021-08-17'),
(10, 'Lead', 'Heavy', '1', '120', 'a3.jpg', '2021-08-17'),
(11, 'Motor Pumps', 'Heavy Weight', '1', '130', 'a4.jpg', '2021-08-17'),
(12, 'Newspaper', 'Newspaper', '1', '140', 'a5.png', '2021-08-17'),
(13, 'Packaging Item Paper', 'Packaging Cartoon', '1', '150', 'a2.jpg', '2021-08-17'),
(14, 'Plastic', 'Plastic Bottels', '1', '160', 'a3.jpg', '2021-08-17'),
(15, 'Steel', 'Heavy Weight', '1', '170', 'a4.jpg', '2021-08-17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `date`) VALUES
(28, 'Kamana Pandey', 'Kamana4499@gmail.com', '12', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
