-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 10, 2021 at 02:14 PM
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
  `name` varchar(30) NOT NULL,
  `image` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `image`, `price`, `stock`, `added`) VALUES
(54, 'New Book', 'f.webp', 114, 3, '2021-01-10 15:12:31'),
(55, 'The Book', 'c.webp', 255, 10, '2021-01-10 17:04:38'),
(56, 'Green Book', 'c.webp', 108, 2, '2021-01-10 18:13:50'),
(57, 'Same Book', 'h.webp', 103, 1, '2021-01-10 18:14:07');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `item_name` varchar(30) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `username`, `item_name`, `quantity`, `price`, `added`) VALUES
(54, 'admin', 'New Book', 1, 114, '2021-01-10 17:09:18'),
(54, 'admin', 'New Book', 7, 114, '2021-01-10 17:29:31'),
(55, 'admin', 'The Book', 1, 255, '2021-01-10 17:33:03'),
(54, 'kris', 'New Book', 1, 114, '2021-01-10 18:32:19'),
(55, 'kris', 'The Book', 21, 255, '2021-01-10 18:14:44');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(68, 'admin', '$2y$10$qdNIL2ahZszpLV58LWi2Le.SaANg2pny4oP4GKJ.cgBBEVhi0mm7u'),
(69, 'kris', '$2y$10$pim6Hnw.9VOwZlJB.3/1muh6DnQ8wdVc.ytkPw9rZ9GclMbKMLVx.');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `total` int(11) NOT NULL,
  `ordered` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `username`, `total`, `ordered`) VALUES
(19, 'kris', 5469, '2021-01-10 18:38:19'),
(20, 'kris', 5469, '2021-01-10 18:39:48'),
(21, 'kris', 5469, '2021-01-10 18:40:15');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `username` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `state` text NOT NULL,
  `city` text NOT NULL,
  `zip` int(11) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `joined` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `name`, `username`, `email`, `address`, `state`, `city`, `zip`, `phone`, `joined`) VALUES
(21, 'admin', 'admin', 'admin@bookstore.com', '#273, Ram Mandir St., 1st cross Hosahalli, Mandya', 'Karnataka', 'Mandya', 571401, 9731541334, '2021-01-09 17:49:32'),
(22, 'Kris', 'kris', 'krishnakanthati@yahoo.com', '#273, Ram Mandir St., 1st cross Hosahalli, Mandya', 'Karnataka', 'Mandya', 571401, 9731541334, '2021-01-10 02:25:53');

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
  ADD UNIQUE KEY `username` (`username`,`item_name`,`quantity`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
