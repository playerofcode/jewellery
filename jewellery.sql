-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2020 at 03:26 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jewellery`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobno` varchar(55) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(55) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `distributor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `mobno`, `email`, `password`, `state`, `city`, `zipcode`, `address`, `image`, `distributor`) VALUES
(12, 'Nishtha Gupta', '7485968574', 'nishtha@gmail.com', 'adminadmin', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `city_name` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `city_name`, `pincode`) VALUES
(4, 'Delhi', '221001');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `p_id` int(11) NOT NULL,
  `cat_id` varchar(55) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_qty` varchar(255) NOT NULL,
  `p_unit` varchar(55) NOT NULL,
  `p_img1` varchar(255) NOT NULL,
  `p_img2` varchar(255) NOT NULL,
  `p_img3` varchar(255) NOT NULL,
  `p_img4` varchar(255) NOT NULL,
  `p_description` text NOT NULL,
  `m_price` varchar(55) NOT NULL,
  `d_price` varchar(55) NOT NULL,
  `offer` varchar(55) NOT NULL,
  `availability` varchar(55) NOT NULL,
  `status` varchar(55) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `cat_id`, `p_name`, `p_qty`, `p_unit`, `p_img1`, `p_img2`, `p_img3`, `p_img4`, `p_description`, `m_price`, `d_price`, `offer`, `availability`, `status`, `date`) VALUES
(4, '7', 'Product 1', '1', 'piece', 'upload/product_image/att.jpg', 'upload/product_image/av.jpg', 'upload/product_image/baed.png', 'upload/product_image/bai1.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '8566', '5855', '32', 'yes', '1', '2020-08-01 11:47:41'),
(5, '8', 'Project on Ring', '1', 'piece', 'upload/product_image/b-pharma.jpg', 'upload/product_image/bai2.jpg', 'upload/product_image/chealth.jpg', 'upload/product_image/energym.jpg', 'project description', '5800', '4700', '19', 'yes', '1', '2020-08-01 18:26:14');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `cat_id` int(11) NOT NULL,
  `cat_image` varchar(255) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_status` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`cat_id`, `cat_image`, `cat_name`, `cat_status`) VALUES
(7, 'upload/product_image/bai.jpg', 'earrings', 'active'),
(8, 'upload/product_image/maggi2.jpg', 'Rings', 'active'),
(9, 'upload/product_image/maggi3.jpg', 'Chains', 'active'),
(10, 'upload/product_image/maggi4.png', 'Pendants', 'active'),
(11, 'upload/product_image/maggi11.png', 'Necklaces', 'active'),
(12, 'upload/product_image/maggi41.png', 'Pendants with chain', 'active'),
(13, 'upload/product_image/maggi12.png', 'bracelets', 'active'),
(14, 'upload/product_image/maggi31.jpg', 'bangles', 'active'),
(15, 'upload/product_image/maggi21.jpg', 'nosepins', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
