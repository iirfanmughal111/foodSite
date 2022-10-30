-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 30, 2022 at 11:26 AM
-- Server version: 8.0.31-0ubuntu0.20.04.1
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
-- Database: `foodOrder`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `name`, `username`, `password`) VALUES
(1, 'Irfan', 'admin', '123'),
(5, 'Irfan', 'adminG', 'dfdsf'),
(8, 'Irfan', 'user2@abc.xyz', 'sdd');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `img_name` varchar(255) NOT NULL,
  `featured` varchar(255) NOT NULL,
  `active` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `img_name`, `featured`, `active`) VALUES
(2, 'Shwarma', 'burger.jpg', 'Yes', 'Yes'),
(4, 'Pizza', 'pizza.jpg', 'No', 'Yes'),
(5, 'Momo', 'momo.jpg', 'Yes', 'Yes'),
(6, 'Burger', 'burger.jpg', 'Yes', 'Yes'),
(7, 'New Item', 'pizza.jpg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `img_name` varchar(255) NOT NULL,
  `cat_id` int NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `img_name`, `cat_id`, `featured`, `active`) VALUES
(9, 'Burger', 'fresh burger', '600', 'Block Diagram (1).png', 4, 'No', 'Yes'),
(11, 'Pizza', 'ORDER BY Several Columns Example 2', '5000', 'menu-momo.jpg', 2, 'Yes', 'Yes'),
(12, 'Momo', 'Fresh Momo', '900', 'bg-django (1).png', 2, 'No', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int NOT NULL,
  `food` varchar(150) NOT NULL,
  `price` varchar(200) NOT NULL,
  `qty` varchar(100) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `order_date` varchar(155) NOT NULL,
  `status` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `c_name` varchar(155) NOT NULL,
  `c_contact` varchar(155) NOT NULL,
  `c_email` varchar(155) NOT NULL,
  `c_address` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `food`, `price`, `qty`, `total`, `order_date`, `status`, `c_name`, `c_contact`, `c_email`, `c_address`) VALUES
(2, 'Pizza', '5000', '43', '215000', '29-10-2022', 'In Progress', 'Irfan Mughal', '03204135236', 'iirfanmughal236@gmail.com', 'Daska new'),
(3, 'Pizza', '5000', '23', '115000', '29-10-2022', 'In Progress', 'Irfan Mughal', '03204135236', 'iirfanmughal236@gmail.com', 'Daska new'),
(4, 'Pizza', '5000', '23', '115000', '29-10-2022', 'In Progress', 'Irfan Mughal', '03204135236', 'iirfanmughal236@gmail.com', 'Daska new'),
(5, 'Pizza', '5000', '3', '15000', '29-10-2022', 'Delivered', 'Irfan Mughal', '03204135236', 'iirfanmughal236@gmail.com', 'Daska new'),
(6, 'Pizza', '5000', '4', '20000', '29-10-2022', 'In Progress', 'Irfan Mughal', '03204135236', 'iirfanmughal236@gmail.com', 'Daska new'),
(7, 'Pizza', '5000', '3', '15000', '29-10-2022', 'In Progress', 'Irfan Mughal', '03204135236', 'iirfanmughal236@gmail.com', 'Daska new'),
(8, 'Pizza', '5000', '3', '15000', '29-10-2022', 'In Progress', 'Irfan Mughal', '03204135236', 'iirfanmughal236@gmail.com', 'Daska new'),
(9, 'Pizza', '5000', '3', '15000', '29-10-2022', 'Delivered', 'Irfan Mughal3', '032041352363', 'iirfanmughal236@gmail.com', 'Daska new');

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_cat` (`cat_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD CONSTRAINT `FK_cat` FOREIGN KEY (`cat_id`) REFERENCES `tbl_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
