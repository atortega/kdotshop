-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2018 at 03:13 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kdot`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `category_desc` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_desc`) VALUES
(2, 'accessories', 'ahjdalkshefn xmacnbfg'),
(3, 'Apparel', 'This is an apparel category'),
(4, 'Shoes', 'Any brand of shoes'),
(5, 'Bags', 'Any brand of bags and backpacks'),
(6, 'Jump Short', 'Any jump short');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `color_id` int(3) NOT NULL,
  `color` varchar(30) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`color_id`, `color`, `description`) VALUES
(1, 'White', 'White'),
(3, 'Red', 'Red'),
(4, 'Blue', 'Blue'),
(5, 'BLACK', 'Black');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `name`, `address`, `phone_number`, `email`, `password`) VALUES
(1, 'gesshchamix', 'canduman mandaue city', '45623', 'gesshchamix23@gmail.com', 'kdBKKRWCE26t6'),
(2, 'mildred', 'canduman mandaue city', '45623', 'chayers@gmail.com', 'kd7gq0mw.d/Ao'),
(3, 'joshua ligad', 'talamban cebu city', '45354468', 'joshua.r.ligad@gmail.com', 'kd7gq0mw.d/Ao'),
(4, 'chamix', 'asfagag', '12346861', 'chamix23@gmail.com', 'kdGGSSGAkHqd.'),
(5, 'chamix', 'Riverside Canduman Mandaue City', '09424392952', 'cham@gmail.com', 'kdXrw/NBs.0V2'),
(8, 'gesshchamix', 'asdmin', '09424392952', 'bela01@gmail.com', 'kdH9hC2M5rv6Q'),
(9, 'chloe', 'canduman mandaue city', '0', '', 'kdeGhQ6GlAtzc'),
(10, 'jake kharl', 'canduman mandaue city', '09183455800', 'jake@gmail.com', 'kdUvfbWkFzYn6'),
(11, 'Gleza Mae Tudtud', 'canduman', '09424392952', 'glezamae@gmail.com', 'kd6GUkWlv1A/E'),
(12, 'chai', 'basdiot', '0906 878 0639', 'chai@gmail.com', 'kdWpaI7wqmw1Y'),
(13, 'Pete Adre', 'Moalboal', '12345679', 'pete@yahoo.com', 'kd7gq0mw.d/Ao'),
(14, 'CHAILAB', 'diris amoa', '0906 878 0435', 'chailab@gmail.com', 'chailab');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_addresses`
--

CREATE TABLE `delivery_addresses` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `middle_initial` varchar(1) NOT NULL,
  `barangay` varchar(50) NOT NULL,
  `municipality` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `zipcode` int(5) NOT NULL,
  `country` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_methods`
--

CREATE TABLE `delivery_methods` (
  `delivery_method_id` int(11) NOT NULL,
  `delivery_method_name` varchar(50) NOT NULL,
  `delivery_method_desc` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `invoice_number` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notification_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `body_of_message` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `sku` int(11) NOT NULL,
  `delivery_method_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `date_updated` date NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` float NOT NULL,
  `total_amount` float NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `payment_method_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `amount` float NOT NULL,
  `date_paid` date NOT NULL,
  `reference_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `payment_method_id` int(11) NOT NULL,
  `payment_name` varchar(50) NOT NULL,
  `payment_desc` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `category_id` int(5) NOT NULL,
  `sub_category_id` int(11) NOT NULL DEFAULT '0',
  `thumb` varchar(50) DEFAULT NULL,
  `product_image` varchar(200) DEFAULT NULL,
  `originalfilename` varchar(255) DEFAULT NULL,
  `filesize` int(16) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_desc` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `category_id`, `sub_category_id`, `thumb`, `product_image`, `originalfilename`, `filesize`, `product_name`, `product_desc`) VALUES
(12, 2, 0, NULL, 'products/images/u44szTVbnUl1Tqm69qY4vU0UPDtFgvppRvKsk7S3.jpeg', 'couple watch2.jpg', 110324, 'Couple Watch', NULL),
(13, 2, 1, NULL, 'products/images/WaRaLntveSilqjyjTFE0n2VFoI7yhthT8lfPAH56.jpeg', 'handy mini fan1.jpg', 73692, 'Handy Mini Fan', NULL),
(14, 3, 0, NULL, 'products/images/bxhtrLHw8osD1rMuHUOgOxkZOgwIWJxLXJyzYk8j.jpeg', '2in1 Set (Dress+Blazer).jpg', 64281, 'Dress+Blazier', '2 in 1 Dress plus Blazier'),
(15, 3, 0, NULL, 'products/images/Jt2BWJFSYjdEcllGhg4EsRFeJtyd3NZ0W7SWCHPL.jpeg', '_45730c5e73f3a311ede8d434bc97b371.png', 82758, 'T-Shirt', NULL),
(16, 5, 0, NULL, 'products/images/OzNbNelQkKEY1rG2moAY8B41RnZlKLGMpOT3DNW9.jpeg', '5in1 Set2.jpg', 100879, 'Backpack', '5in1 set bags');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `size_id` int(3) NOT NULL,
  `size` varchar(30) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`size_id`, `size`, `description`) VALUES
(1, 'S', 'Small'),
(2, 'M', 'Medium'),
(3, 'L', 'Large'),
(4, 'XL', 'Extra Large'),
(5, 'XLL', 'Extrra Large');

-- --------------------------------------------------------

--
-- Table structure for table `sku`
--

CREATE TABLE `sku` (
  `id` int(11) NOT NULL,
  `sku` varchar(20) NOT NULL,
  `product_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL DEFAULT '0',
  `size_id` int(11) NOT NULL DEFAULT '0',
  `number_of_items` int(11) NOT NULL,
  `unit_price` decimal(16,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sku`
--

INSERT INTO `sku` (`id`, `sku`, `product_id`, `color_id`, `size_id`, `number_of_items`, `unit_price`) VALUES
(1, '22320000000012', 12, 3, 2, 24, '234.00'),
(2, '21500000000013', 13, 5, 0, 26, '156.00'),
(3, '30430000000014', 14, 4, 3, 25, '300.00'),
(4, '30340000000015', 15, 3, 4, 25, '400.00'),
(5, '50300000000016', 16, 3, 0, 5, '250.00');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `sub_category_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_name` varchar(50) NOT NULL,
  `sub_category_desc` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`sub_category_id`, `category_id`, `sub_category_name`, `sub_category_desc`) VALUES
(1, 2, 'Sub Cat for Accessories', 'adasdfadfsdaf'),
(2, 2, 'Another Sub Cat for Accessories', 'sdfasdfasddf'),
(3, 4, 'Sub Cat for Bag', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_categories`
--

CREATE TABLE `user_categories` (
  `user_category_id` int(11) NOT NULL,
  `user_category_name` varchar(50) NOT NULL,
  `user_category_desc` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`color_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `delivery_addresses`
--
ALTER TABLE `delivery_addresses`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `delivery_methods`
--
ALTER TABLE `delivery_methods`
  ADD PRIMARY KEY (`delivery_method_id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`invoice_number`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`payment_method_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`size_id`);

--
-- Indexes for table `sku`
--
ALTER TABLE `sku`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sku` (`sku`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`sub_category_id`);

--
-- Indexes for table `user_categories`
--
ALTER TABLE `user_categories`
  ADD PRIMARY KEY (`user_category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `color_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `delivery_addresses`
--
ALTER TABLE `delivery_addresses`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `delivery_methods`
--
ALTER TABLE `delivery_methods`
  MODIFY `delivery_method_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `payment_method_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `size_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sku`
--
ALTER TABLE `sku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `sub_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_categories`
--
ALTER TABLE `user_categories`
  MODIFY `user_category_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
