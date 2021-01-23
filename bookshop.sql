-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 23, 2021 at 09:47 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `added` datetime NOT NULL DEFAULT current_timestamp(),
  `name` varchar(30) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `price`, `stock`, `added`, `name`, `image`) VALUES
(93, 212, 5, '2021-01-23 22:32:42', 'A Book', 'a.webp'),
(95, 370, 1, '2021-01-23 22:33:02', 'B Book', 'b.webp'),
(97, 311, 0, '2021-01-23 22:33:20', 'C Book', 'c.webp'),
(98, 112, 6, '2021-01-23 22:33:36', 'D Book', 'd.webp'),
(99, 100, 1, '2021-01-24 01:58:15', 'E BOOK', 'e.webp'),
(100, 289, 10, '2021-01-24 01:58:57', 'F Book', 'f.webp'),
(101, 960, 6, '2021-01-24 01:59:20', 'G Book', 'g.webp'),
(102, 104, 4, '2021-01-24 01:59:41', 'H Book', 'h.webp');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `added` datetime NOT NULL DEFAULT current_timestamp(),
  `username` varchar(30) NOT NULL,
  `item_name` varchar(30) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `id`) VALUES
('admin', '$2y$10$qdNIL2ahZszpLV58LWi2Le.SaANg2pny4oP4GKJ.cgBBEVhi0mm7u', 1),
('kris', '$2y$10$pim6Hnw.9VOwZlJB.3/1muh6DnQ8wdVc.ytkPw9rZ9GclMbKMLVx.', 2),
('jane', '$2y$10$FsOz0wEetJJ1HWVGSwMYKuOyVjcokKjpUhxfw6PllnFlANSFlHve.', 3),
('jimm', '$2y$10$FgI2.w9gWHI7pvov0omz4erw5U6GWtItiDCZoMV7aaprK764o9KiG', 4),
('harry', '$2y$10$ASRXNmVqWvPmMhNclzMRAu1n4pgUGf4QT1KMfrN1B2L6pLKxiSKsW', 5),
('niki', '$2y$10$JxtEGpAlADC681LyqGjuseBHsl8Tv0Lk9alNR5t59C9nCgoAvnnRO', 11),
('nisha', '$2y$10$1dVkpmKSTf9X68VB1A/J6.QBLrJcXq1h9xxV6gA94T/bDQnOqiKve', 12),
('ayesha', '$2y$10$iKG9Z1vfHwbU1Yi0PNkt0e3Oh.b008DyZ5Y1aPhVs/5B0PWgAdOau', 13),
('jack', '$2y$10$toyTe/1Bv2VX0m9qG7jWs.WYSf43NgNnEq5LPH6neJhkxfNwWbVQ.', 14);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `username` varchar(30) NOT NULL,
  `total` int(11) NOT NULL,
  `ordered` datetime NOT NULL DEFAULT current_timestamp(),
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `name` text NOT NULL,
  `username` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `state` text NOT NULL,
  `city` text NOT NULL,
  `zip` int(11) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `joined` datetime NOT NULL DEFAULT current_timestamp(),
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`name`, `username`, `email`, `address`, `state`, `city`, `zip`, `phone`, `joined`, `id`) VALUES
('admin', 'admin', 'admin@bookstore.com', '#273, Ram Mandir St., 1st cross Hosahalli, Mandya', 'Karnataka', 'Mandya', 571401, 9731541334, '2021-01-09 17:49:32', 1),
('AYESHA', 'ayesha', 'ayesha@ayesha.com', '#231 New Bazaar, Dehradun', 'Telangana', 'Mamdid', 156478, 8095021456, '2021-01-24 01:31:16', 8),
('harry', 'harry', 'harry@harry.com', '#252, Ram Mandir St., 2st cross Hosahalli', 'Karnataka', 'Mandya', 571401, 8095080543, '2021-01-23 22:13:25', 5),
('JACK', 'jack', 'jack@jack.in', '#123 Walter St, New Road', 'Lakshadweep', 'Mehrauli', 456789, 9797856412, '2021-01-24 01:46:46', 9),
('Jane', 'jane', 'jane@yahoo.com', 'Postmaster, Post Office MEHRAULI, SOUTH WEST DELHI', 'Delhi', 'Mehrauli', 110030, 9731541335, '2021-01-17 01:49:27', 2),
('jimm', 'jimm', 'jimm@jimm.com', '#302 2nd Cross, Ashok Nagar', 'Delhi', 'Delhi', 571402, 9731541335, '2021-01-23 22:10:34', 4),
('Kris', 'kris', 'krishnakanthati@yahoo.com', '#273, Ram Mandir St., 1st cross Hosahalli, Mandya', 'Karnataka', 'Mandya', 571401, 9731541334, '2021-01-10 02:25:53', 3),
('niki', 'niki', 'niki@niki.com', '#10, New Street, Mirzapur', 'Gujarat', 'Dehradun', 564123, 8217243778, '2021-01-23 23:03:50', 6),
('Nisha', 'nisha', 'nisha@nisha.com', '#12 Wall Street, Bazaar', 'Karnataka', 'Gurgaon', 564789, 8172434561, '2021-01-24 00:11:01', 7);

--
-- Triggers `register`
--
DELIMITER $$
CREATE TRIGGER `cap` BEFORE INSERT ON `register` FOR EACH ROW SET NEW.name = UPPER(NEW.name)
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`username`,`item_name`,`quantity`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`),
  ADD KEY `username_2` (`username`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`username`) REFERENCES `register` (`username`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`username`) REFERENCES `register` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`username`) REFERENCES `register` (`username`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
