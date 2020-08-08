-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2020 at 02:51 PM
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
-- Table structure for table `coins`
--

CREATE TABLE `coins` (
  `p_id` int(11) NOT NULL,
  `cat_id` varchar(55) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_qty` varchar(11) NOT NULL,
  `p_unit` varchar(55) NOT NULL,
  `p_img1` varchar(255) NOT NULL,
  `p_img2` varchar(255) NOT NULL,
  `p_img3` varchar(255) NOT NULL,
  `p_img4` varchar(255) NOT NULL,
  `p_description` text NOT NULL,
  `m_price` varchar(55) NOT NULL,
  `d_price` varchar(55) NOT NULL,
  `offer` varchar(55) NOT NULL,
  `availability` varchar(11) NOT NULL,
  `status` varchar(55) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coins`
--

INSERT INTO `coins` (`p_id`, `cat_id`, `p_name`, `p_qty`, `p_unit`, `p_img1`, `p_img2`, `p_img3`, `p_img4`, `p_description`, `m_price`, `d_price`, `offer`, `availability`, `status`, `date`) VALUES
(3, 'cat id', '1 gram gold', '1', 'gm', 'upload/product_image/att.jpg', 'upload/product_image/bracelet21.jpg', 'upload/product_image/bracelet32.jpg', 'upload/product_image/bracelet41.jpg', 'product desciption', '8888', '7777', '13', 'yes', '1', '2020-08-08 11:37:28'),
(4, '', '2 Gram Gold', '2', 'gm', 'upload/product_image/bracelet11.jpg', 'upload/product_image/bracelet22.jpg', 'upload/product_image/bracelet33.jpg', 'upload/product_image/bracelet42.jpg', 'product description', '333', '111', '67', 'yes', '1', '2020-08-08 12:30:19');

-- --------------------------------------------------------

--
-- Table structure for table `collections`
--

CREATE TABLE `collections` (
  `p_id` int(11) NOT NULL,
  `cat_id` varchar(55) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_qty` varchar(11) NOT NULL,
  `p_unit` varchar(11) NOT NULL,
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
-- Dumping data for table `collections`
--

INSERT INTO `collections` (`p_id`, `cat_id`, `p_name`, `p_qty`, `p_unit`, `p_img1`, `p_img2`, `p_img3`, `p_img4`, `p_description`, `m_price`, `d_price`, `offer`, `availability`, `status`, `date`) VALUES
(300001, '3', 'Collection Product ', '1', 'piece', 'upload/product_image/birthstone1.jpg', 'upload/product_image/birthstonebraclet1.jpg', 'upload/product_image/charms1.jpg', 'upload/product_image/classic1.jpg', 'product description here', '15154', '5148', '66', 'yes', '1', '2020-08-04 15:59:48');

-- --------------------------------------------------------

--
-- Table structure for table `collection_category`
--

CREATE TABLE `collection_category` (
  `cat_id` int(11) NOT NULL,
  `cat_image` varchar(255) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `collection_category`
--

INSERT INTO `collection_category` (`cat_id`, `cat_image`, `cat_name`, `cat_status`) VALUES
(3, 'upload/product_image/birthstone.jpg', 'Birthstone pendants', 'active'),
(4, 'upload/product_image/birthstonebraclet.jpg', 'birthstone bracelet', 'active'),
(5, 'upload/product_image/facets.jpg', 'facets', 'active'),
(6, 'upload/product_image/classic.jpg', 'classics', 'active'),
(7, 'upload/product_image/charms.jpg', 'charms', 'active'),
(8, 'upload/product_image/electrify.jpg', 'electrify', 'active'),
(9, 'upload/product_image/glam.jpg', 'glam', 'active'),
(10, 'upload/product_image/valentine.jpg', 'valentines', 'active'),
(11, 'upload/product_image/smolitaires.jpg', 'smolitaires', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `email` varchar(110) NOT NULL,
  `mobno` varchar(55) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(12, 'Nishtha Gupta', '7485968574', 'nishtha@gmail.com', 'adminadmin', 'Uttar pradesh', 'Lucknow', '524152', 'Indira Nagar, Lucknow', '', ''),
(13, 'Vivek Gupta', '7485968574', 'vkgupta02255@gmail.com', 'admin', 'Uttar Pradesh', 'Lucknow', '226016', 'Indira Nagar, Sec 11, Lucknow, India', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `gifts`
--

CREATE TABLE `gifts` (
  `p_id` int(11) NOT NULL,
  `cat_id` varchar(55) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_qty` varchar(11) NOT NULL,
  `p_unit` varchar(55) NOT NULL,
  `p_img1` varchar(255) NOT NULL,
  `p_img2` varchar(255) NOT NULL,
  `p_img3` varchar(255) NOT NULL,
  `p_img4` varchar(255) NOT NULL,
  `p_description` text NOT NULL,
  `m_price` varchar(55) NOT NULL,
  `d_price` varchar(55) NOT NULL,
  `offer` varchar(55) NOT NULL,
  `availability` varchar(11) NOT NULL,
  `status` varchar(55) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gifts`
--

INSERT INTO `gifts` (`p_id`, `cat_id`, `p_name`, `p_qty`, `p_unit`, `p_img1`, `p_img2`, `p_img3`, `p_img4`, `p_description`, `m_price`, `d_price`, `offer`, `availability`, `status`, `date`) VALUES
(500000, '2', 'Gift Product ', '1', 'piece', 'upload/product_image/birthstone2.jpg', 'upload/product_image/ciaz1.jpg', 'upload/product_image/bus11.jpg', 'upload/product_image/baleno2.jpg', 'This is product description', '5000', '4000', '20', 'yes', '1', '2020-08-04 14:45:27');

-- --------------------------------------------------------

--
-- Table structure for table `gift_category`
--

CREATE TABLE `gift_category` (
  `cat_id` int(11) NOT NULL,
  `cat_image` varchar(255) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_status` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gift_category`
--

INSERT INTO `gift_category` (`cat_id`, `cat_image`, `cat_name`, `cat_status`) VALUES
(2, 'upload/product_image/ciaz.jpg', 'Gift for Girlfriend', 'active');

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
(4, 'Delhi', '221001'),
(5, 'Lucknow', '226016');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` varchar(55) NOT NULL,
  `customer_name` varchar(55) NOT NULL,
  `mobno` varchar(255) NOT NULL,
  `state` varchar(55) NOT NULL,
  `city` varchar(55) NOT NULL,
  `zipcode` varchar(55) NOT NULL,
  `address` varchar(255) NOT NULL,
  `grand_total` varchar(55) NOT NULL,
  `status` varchar(255) NOT NULL,
  `distributor` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `customer_name`, `mobno`, `state`, `city`, `zipcode`, `address`, `grand_total`, `status`, `distributor`, `date`) VALUES
(1, '12', 'Nishtha Gupta', '7485968574', 'UP', 'LKO', '859685', 'LKO', '27632', 'new_order', '', '2020-08-05 12:30:02'),
(2, '12', 'Nishtha Gupta', '7485968574', 'UP', 'LUCKNOW', '256341', 'LKO UP  India', '26581', 'new_order', '', '2020-08-05 14:49:50'),
(4, '5', 'final name', '8596748596', '', '', '', '', '850', 'shipped', '', '2020-08-05 15:17:08'),
(5, '12', 'Nishtha Gupta', '7485968574', 'xfcg', 'dxfcghvj', 'fxcgvhjb', 'fchgvj', '19577', 'shipped', '', '2020-08-05 15:34:28'),
(6, '12', 'Nishtha Gupta', '7485968574', 'Uttar pradesh', 'Lucknow', '524152', 'Indira Nagar, Lucknow', '12285', 'shipped', '', '2020-08-05 17:18:01'),
(7, '13', 'Vivek Gupta', '7485968574', 'Uttar Pradesh', 'Lucknow', '226016', 'Indira Nagar, Sec 11, Lucknow, India', '11710', 'shipped', '', '2020-08-07 10:06:23'),
(8, '12', 'Nishtha Gupta', '7485968574', 'Uttar pradesh', 'Lucknow', '524152', 'Indira Nagar, Lucknow', '7777', 'shipped', '', '2020-08-08 13:02:11'),
(9, '12', 'Nishtha Gupta', '7485968574', 'Uttar pradesh', 'Lucknow', '524152', 'Indira Nagar, Lucknow', '12107', 'shipped', '', '2020-08-08 17:14:39'),
(10, '13', 'Vivek Gupta', '7485968574', 'Uttar Pradesh', 'Lucknow', '226016', 'Indira Nagar, Sec 11, Lucknow, India', '74005', 'shipped', '', '2020-08-08 17:24:16');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` varchar(225) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `sub_total` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `product_name`, `quantity`, `sub_total`) VALUES
(1, '1', '100004', 'Sweet Pendant', '2', '9044'),
(2, '1', '100000', 'Earring 1', '1', '5855'),
(3, '1', '100005', 'Necklace 1', '1', '7585'),
(4, '1', '300001', 'Collection Product ', '1', '5148'),
(5, '2', '500000', 'Gift Product ', '1', '4000'),
(6, '2', '100001', 'Ring 1', '1', '4700'),
(7, '2', '100005', 'Necklace 1', '1', '7585'),
(8, '2', '300001', 'Collection Product ', '2', '10296'),
(9, '4', '100000', 'Earring 1', '1', '5855'),
(10, '4', '100003', 'Beautiful Chain', '1', '4500'),
(11, '4', '300001', 'Collection Product ', '1', '5148'),
(12, '5', '100000', 'Earring 1', '1', '5855'),
(13, '5', '100001', 'Ring 1', '1', '4700'),
(14, '5', '100003', 'Beautiful Chain', '1', '4500'),
(15, '5', '100004', 'Sweet Pendant', '1', '4522'),
(16, '6', '100005', 'Necklace 1', '1', '7585'),
(17, '6', '100001', 'Ring 1', '1', '4700'),
(18, '7', '100000', 'Earring 1', '2', '11710'),
(19, '8', '3', 'Product Name here', '1', '7777'),
(20, '9', '100004', 'Sweet Pendant', '1', '4522'),
(21, '9', '100005', 'Necklace 1', '1', '7585'),
(22, '10', '2', 'Silver Product 1', '1', '74005');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `customer_id` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `payment_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobno` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_for` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_mode` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `customer_id`, `payment_id`, `order_id`, `payment_status`, `amount`, `name`, `email`, `mobno`, `payment_for`, `payment_mode`) VALUES
(2, '18488', '48807-70220-27201-87995', '15966192936547', 'Success', '85', 'dxfcgvhbjkl', 'abc@gmail.com', '8596858585', 'dxfcgvhbjk', 'Credit Card'),
(3, '859647', '49760-07797-22691-18509', '15966204130522', 'Success', '50', 'Vivek ', 'meraemail@gmail.com', '7485968574', 'My Product', 'Credit Card'),
(4, '859647', '49760-07797-22691-18509', '15966204130522', 'Success', '50', 'Vivek ', 'meraemail@gmail.com', '7485968574', 'My Product', 'Credit Card'),
(5, '5', '84873-59709-52177-72900', '15966208029854', 'Success', '850', 'final name', 'testemail@gmail.com', '8596748596', 'jewellery', 'Credit Card');

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
(100000, '7', 'Earring 1', '1', 'piece', 'upload/product_image/earring5.jpg', 'upload/product_image/earrings1.jpg', 'upload/product_image/earrings3.jpg', 'upload/product_image/earrings4.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '8566', '5855', '32', 'yes', '1', '2020-08-01 11:47:41'),
(100001, '8', 'Ring 1', '1', 'piece', 'upload/product_image/ring3.jpg', 'upload/product_image/ring2.jpg', 'upload/product_image/ring1.jpg', 'upload/product_image/ring.jpg', 'project description', '5800', '4700', '19', 'yes', '1', '2020-08-01 18:26:14'),
(100003, '9', 'Beautiful Chain', '1', 'piece', 'upload/product_image/chain.jpg', 'upload/product_image/chain1.jpg', 'upload/product_image/chain2.jpg', 'upload/product_image/chain3.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '9852', '4500', '54', 'yes', '1', '2020-08-04 17:59:27'),
(100004, '10', 'Sweet Pendant', '1', 'piece', 'upload/product_image/pendant3.jpg', 'upload/product_image/pendant5.jpg', 'upload/product_image/pendant2.jpg', 'upload/product_image/pendant4.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '5822', '4522', '22', 'yes', '1', '2020-08-04 18:05:28'),
(100005, '11', 'Necklace 1', '1', 'piece', 'upload/product_image/necklace5.jpg', 'upload/product_image/necklace4.jpg', 'upload/product_image/necklace2.jpg', 'upload/product_image/necklace1.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '9588', '7585', '21', 'yes', '1', '2020-08-04 18:12:31'),
(100006, '13', 'Bracelet 1', '1', 'piece', 'upload/product_image/bracelet31.jpg', 'upload/product_image/bracelet4.jpg', 'upload/product_image/bracelet2.jpg', 'upload/product_image/bracelet1.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '8522', '7585', '11', 'yes', '1', '2020-08-04 18:18:12');

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
(7, 'upload/product_image/earring51.jpg', 'earrings', 'active'),
(8, 'upload/product_image/ring31.jpg', 'Rings', 'active'),
(9, 'upload/product_image/chain3.jpg', 'Chains', 'active'),
(10, 'upload/product_image/pendant31.jpg', 'Pendants', 'active'),
(11, 'upload/product_image/necklace51.jpg', 'Necklaces', 'active'),
(12, 'upload/product_image/maggi41.png', 'Pendants with chain', 'active'),
(13, 'upload/product_image/bracelet3.jpg', 'bracelets', 'active'),
(14, 'upload/product_image/maggi31.jpg', 'bangles', 'active'),
(15, 'upload/product_image/maggi21.jpg', 'nosepins', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `silvers`
--

CREATE TABLE `silvers` (
  `p_id` int(11) NOT NULL,
  `cat_id` varchar(55) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_qty` varchar(11) NOT NULL,
  `p_unit` varchar(55) NOT NULL,
  `p_img1` varchar(255) NOT NULL,
  `p_img2` varchar(255) NOT NULL,
  `p_img3` varchar(255) NOT NULL,
  `p_img4` varchar(255) NOT NULL,
  `p_description` text NOT NULL,
  `m_price` varchar(55) NOT NULL,
  `d_price` varchar(55) NOT NULL,
  `offer` varchar(55) NOT NULL,
  `availability` varchar(11) NOT NULL,
  `status` varchar(55) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `silvers`
--

INSERT INTO `silvers` (`p_id`, `cat_id`, `p_name`, `p_qty`, `p_unit`, `p_img1`, `p_img2`, `p_img3`, `p_img4`, `p_description`, `m_price`, `d_price`, `offer`, `availability`, `status`, `date`) VALUES
(2, '3', 'Silver Product 1', '1', 'gm', 'upload/product_image/birthstone3.jpg', 'upload/product_image/bracelet34.jpg', 'upload/product_image/bracelet12.jpg', 'upload/product_image/bracelet23.jpg', 'product description here 1', '85225', '74005', '13', 'yes', '1', '2020-08-08 15:14:49');

-- --------------------------------------------------------

--
-- Table structure for table `silver_category`
--

CREATE TABLE `silver_category` (
  `cat_id` int(11) NOT NULL,
  `cat_image` varchar(255) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_status` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `silver_category`
--

INSERT INTO `silver_category` (`cat_id`, `cat_image`, `cat_name`, `cat_status`) VALUES
(3, 'upload/product_image/bed.png', 'sassy silver', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coins`
--
ALTER TABLE `coins`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `collections`
--
ALTER TABLE `collections`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `collection_category`
--
ALTER TABLE `collection_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gifts`
--
ALTER TABLE `gifts`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `gift_category`
--
ALTER TABLE `gift_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
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
-- Indexes for table `silvers`
--
ALTER TABLE `silvers`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `silver_category`
--
ALTER TABLE `silver_category`
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
-- AUTO_INCREMENT for table `coins`
--
ALTER TABLE `coins`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `collections`
--
ALTER TABLE `collections`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=300002;

--
-- AUTO_INCREMENT for table `collection_category`
--
ALTER TABLE `collection_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `gifts`
--
ALTER TABLE `gifts`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=500001;

--
-- AUTO_INCREMENT for table `gift_category`
--
ALTER TABLE `gift_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100007;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `silvers`
--
ALTER TABLE `silvers`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `silver_category`
--
ALTER TABLE `silver_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
