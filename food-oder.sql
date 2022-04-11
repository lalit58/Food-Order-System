-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2022 at 02:01 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food-oder`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(1, 'Adminstrator', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(10, 'Lalit Kumar soren', 'lalitkumar', '21232f297a57a5a743894a0e4a801fc3'),
(13, 'LKS', 'lks', '004806ec9c0e2b008cb781a7c77809c8');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(1, 'Pizza', 'Food_Category_31.jpg', 'Yes', 'Yes'),
(6, 'Momo', 'Food_Category_376.jpg', 'Yes', 'Yes'),
(7, 'Biryani', 'Food_Category_334.jpg', 'No', 'Yes'),
(8, 'Burger', 'Food_Category_754.jpg', 'Yes', 'Yes'),
(10, 'Sandwich', 'Food_Category_103.jpg', 'No', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(1, 'Pizza', '          Delicious hot chicken pizza pizza        ', '220.00', 'Food-Food-8491.jpg', 1, 'Yes', 'Yes'),
(2, 'Burger', '   Very Delicious    ', '80.00', 'Food-Food-618.jpg', 8, 'Yes', 'Yes'),
(3, 'Hot Pizza', '       Very Deliciuos  chicken Pizza    ', '180.00', 'Food-Food-2994.jpg', 1, 'Yes', 'Yes'),
(5, 'Momo', '   Steam Chicken momo   ', '80.00', 'Food-Food-6719.jpg', 6, 'Yes', 'Yes'),
(6, 'Chat', '  Famous Chat in Odisha  ', '60.00', 'Food-Food-4798.jpg', 9, 'No', 'Yes'),
(26, 'Chicken Biriyani', '       Delicious Chicken Biryani       ', '212.00', 'Food-Food-9390.jpg', 7, 'Yes', 'Yes'),
(27, 'Test ', '    Demoooo  free   ', '0.00', '', 1, 'No', 'Yes'),
(28, 'Chicken Sandwich', '   Very good food    ', '111.00', '', 10, 'Yes', 'Yes'),
(29, 'car', '  carcfd  ffd ', '400.00', '', 7, 'Yes', 'Yes'),
(30, 'eeeddd', '   ssss ii ', '22.00', '', 1, 'No', 'Yes'),
(31, 'yyyy', '   yyyy uu ', '77.00', '', 8, 'Yes', 'Yes'),
(32, 'Sandwich', '   Delicious Chicken sandwiwtch  ', '100.00', '', 10, 'No', 'No'),
(33, 'Corn Pizza', '  Corn Pizza   ', '80.00', '', 1, 'No', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(20) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `food`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(9, 'Pizza', '220.00', 1, '220.00', '2022-02-01 08:15:42', 'On Delivery', '3alzxilvEX', '4614104349', 'bpg4a@eupw.com', 'aEIYhphthP'),
(10, 'Pizza', '220.00', 1, '220.00', '2022-02-01 08:33:11', 'Cancelled', 'cZ0UDry8eU', '8903910003', 'eq6w0@yvxh.com', 'Y2RgZ7fkK0'),
(11, 'Momo', '80.00', 1, '80.00', '2022-02-01 08:34:28', 'Cancelled', 'KHcPR0clH1', '0226719797', 'tpzzg@l00s.com', 'TZIUUpg2G1'),
(12, 'yyyy', '77.00', 1, '77.00', '2022-02-01 08:35:26', 'On Delivery', 'qS6nhxmdCM', '5006998022', 'pcbef@ty6d.com', 'TChmtwp51H'),
(13, 'Hot Pizza', '180.00', 3, '540.00', '2022-02-01 08:37:18', 'Delivered', 'XW0Sf70xcI', '6947403797', 'xsd6q@bosx.com', 'uxP3hhFF5W'),
(14, 'Momo', '80.00', 1, '80.00', '2022-02-01 08:44:06', 'Delivered', 'hXusx197wg', '9891123550', 'w0p72@fwz9.com', 'KDPk8cAqXT'),
(15, 'Hot Pizza', '180.00', 4, '720.00', '2022-02-01 08:56:56', 'Delivered', 'fF0zPb0vDl', '5529217443', '814mn@qbmn.com', 'IgJdyPfrmb');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_register`
--

CREATE TABLE `tbl_register` (
  `id` int(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `mobile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_register`
--

INSERT INTO `tbl_register` (`id`, `name`, `email`, `password`, `mobile`) VALUES
(7, 'user', 'user@gmail.com', '$2y$10$oKSl4I1C175vE5Xw4DsUUez5ymQClSlEuI1esK.jFkWu0ROszoKdC', '0123456789'),
(8, 'Lalit', 'lalit@gmail.com', '$2y$10$XKKihw1veGbvlf93s15hz.K7/u2DqX6DQlSUvTpJZpleed1ug2bqS', '0123456789');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_register`
--
ALTER TABLE `tbl_register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_register`
--
ALTER TABLE `tbl_register`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
