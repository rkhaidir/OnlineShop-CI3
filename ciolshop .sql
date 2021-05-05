-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2020 at 07:18 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ciolshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(125) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`, `role`) VALUES
(1, 'Khaidir', 'admin', '$2y$10$CpalghYghxAcc0Qo0fePiuH0d4JKvPlFRvWzhjJlNQ9WSir64rIbG', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `message` text NOT NULL,
  `sub_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `id_user`, `id_product`, `quantity`, `message`, `sub_total`) VALUES
(10, 1, 5, 1, '', 250000),
(11, 1, 1, 1, '', 150000);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `slug`) VALUES
(1, 'Baju', 'baju'),
(2, 'Celana', 'celana'),
(4, 'Kemeja', 'kemeja'),
(5, 'Jilbab', 'jilbab'),
(7, 'Jeans', 'jeans'),
(8, 'Jaket', 'jaket');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date` date NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `total` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(125) NOT NULL,
  `province` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `courier` varchar(125) NOT NULL,
  `cost_courier` int(11) NOT NULL,
  `waybill` varchar(125) DEFAULT NULL,
  `status` enum('waiting','paid','process','delivered','cancel') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `id_user`, `date`, `invoice`, `total`, `name`, `address`, `city`, `province`, `phone`, `courier`, `cost_courier`, `waybill`, `status`) VALUES
(1, 1, '2020-05-17', '120200517051437', 150000, 'Rakhmat Khaidir', 'Jln Kamelda 59', 'Banjarmasin', 'Kalimantan Selatan', '089620496618', 'JNE', 7000, '12121212121212', 'delivered'),
(2, 2, '2020-05-18', '220200518152229', 1600000, 'Rakhmat Khaidir', 'Jln Perdagangan 01', 'Jakarta Barat', 'DKI Jakarta', '089620496618', 'JNE', 28000, '232323245', 'delivered'),
(3, 2, '2020-05-18', '220200518154713', 150000, 'Rakhmat Khaidir', 'Jln Durian', 'Balangan', 'Kalimantan Selatan', '089620496618', 'JNE', 15000, NULL, 'process'),
(4, 2, '2020-05-18', '220200518215129', 250000, 'Rakhmat Khaidir', 'Jln Apa Saja', 'Singkawang', 'Kalimantan Barat', '089620496618', 'POS Indonesia', 65000, NULL, 'paid');

-- --------------------------------------------------------

--
-- Table structure for table `order_confirm`
--

CREATE TABLE `order_confirm` (
  `id` int(11) NOT NULL,
  `id_orders` int(11) NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `account_number` int(50) NOT NULL,
  `nominal` int(11) NOT NULL,
  `note` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_confirm`
--

INSERT INTO `order_confirm` (`id`, `id_orders`, `account_name`, `account_number`, `nominal`, `note`, `image`) VALUES
(1, 1, 'Rakhmat Khaidir', 2147483647, 207000, '-', '120200517051437-20200517125810.png'),
(2, 2, 'Rakhmat Khaidir', 2147483647, 1628000, '-', '220200518152229-20200518152322.jpg'),
(3, 3, 'Rakhmat Khaidir', 2147483647, 165000, '-', '220200518154713-20200518154933.jpg'),
(4, 4, 'Rakhmat Khaidir', 2147483647, 135000, '-', '220200518215129-20200518215202.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `id_orders` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(4) NOT NULL,
  `message` text NOT NULL,
  `sub_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `id_orders`, `id_product`, `quantity`, `message`, `sub_total`) VALUES
(1, 1, 1, 1, '', 150000),
(2, 2, 9, 2, 'Ukuran M', 1600000),
(3, 3, 1, 1, '', 150000),
(4, 4, 5, 1, '', 250000);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `size` varchar(125) NOT NULL,
  `color` varchar(255) NOT NULL,
  `type` enum('L','W') NOT NULL,
  `price` int(11) NOT NULL,
  `is_available` tinyint(1) NOT NULL DEFAULT 1,
  `image` varchar(255) NOT NULL,
  `delete` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `id_category`, `slug`, `title`, `description`, `size`, `color`, `type`, `price`, `is_available`, `image`, `delete`) VALUES
(1, 1, 'baju-hitam', 'Baju Hitam', 'Baju Hitam', 'M, L, XL', 'Hitam', 'L', 150000, 1, 'image-1.jpg', 1),
(2, 8, 'jaket-hitam', 'Jaket Hitam', 'Jaket Hitam', 'M, L, XL', 'Hitam', 'L', 200000, 1, 'image-2.jpg', 1),
(5, 8, 'hoddie-wanita', 'Hoddie Wanita', 'Hoddie Wanita', 'S, M, L', 'Coklat, Hitam', 'W', 250000, 1, 'hoddie-wanita-20200508171422.jpg', 1),
(6, 1, 'baju-pria-tshirt', 'Baju Pria Tshirt', 'Baju Pria Tshirt', 'S, M, L, XL', 'Merah, Biru', 'L', 150000, 1, 'baju-pria-tshirt-20200508194354.jpg', 1),
(7, 8, 'hoddie-wanita-2', 'Hoddie Wanita', 'Hoddie Wanita', 'M, L, XL', 'Coklat, Hitam', 'W', 100000, 1, 'hoddie-wanita-20200518112238.jpg', 1),
(8, 1, 'new-tshirt-men', 'New Tshirt Men', 'New Tshirt Men', 'M, L, XL', 'Coklat, Hitam', 'L', 235000, 1, 'new-tshirt-men-20200518114434.jpg', 1),
(9, 2, 'adidas', 'Adidas', 'adidas own the run astro pant men', 'S, M, L', 'Hitam', 'L', 800000, 1, 'adidas-own-the-run-astro-pant-men-20200518130239.jpg', 1),
(10, 1, 'mfmw-elyisa', 'MFMW Elyisa', 'MFMW Elyisa Cardigan Coklat', 'S, M, L', 'Coklat', 'W', 200000, 1, 'mfmw-elyisa-20200518131357.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `sequence` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `title`, `sequence`, `image`) VALUES
(1, 'Brand Festival Ramadhan', 1, 'img-1.jpg'),
(2, 'Gratis Ongkir', 2, 'img-2.jpg'),
(4, 'Special Ramadhan', 3, 'special-ramadhan-20200514150917.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `date_register` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `image`, `is_active`, `date_register`) VALUES
(1, 'Rakhmat Khaidir', 'rkhaidir084@yahoo.com', '$2y$10$9V8oAaE2lP4dv8/dHQHROu32Q0TceECn8GI1zZ3/RfdaaPRMhlIVS', 'rakhmat-khaidir-20200518134148.png', 1, 1589606335),
(2, 'test', 'test@roket.id', '$2y$10$G4JBqYZtsQXiRJlxWnSSke1IE27N9HIQrlT0TKJs8mJPKpmLvJdSC', '', 1, 1589606941),
(3, 'test', 'test@roket.com', '$2y$10$.XGuvelX4jEzd6tUgfpGrO3OXL1ROxY6Ovmah0L9ljM3xe3J9in3C', '', 1, 1589607434);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_confirm`
--
ALTER TABLE `order_confirm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_confirm`
--
ALTER TABLE `order_confirm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
