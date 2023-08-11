-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2022 at 03:42 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectb2`
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
(12, 'suyash', 'sanas', '3e1867f5aee83045775fbe355e6a3ce1'),
(18, 'yash', 'yash', 'c296539f3286a899d8b3f6632fd62274'),
(19, 'pritam', 'pritam', 'cbe93bfe45858156ab59563c9b791aae'),
(20, 'pratik', 'pratik', '0cb2b62754dfd12b6ed0161d4b447df7');

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
(4, 'Pizza', 'Food_Category_175.jpg', 'Yes', 'Yes'),
(5, 'Burger', 'Food_Category_170.jpg', 'Yes', 'Yes'),
(9, 'Momo', 'Food_Category_758.jpg', 'Yes', 'Yes'),
(10, 'Big Burger', 'Food_Category_753.jpg', 'No', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(9, 'Best Burger', 'Burger with Ham,Pineapple and lots of Cheese', '299', 'Food-Name-5983.jpg', 5, 'Yes', 'Yes'),
(10, 'Dumplings Specials', 'Chicken Dumplings with herbs from Mountains', '449', 'Food-Name-3003.jpg', 9, 'Yes', 'Yes'),
(12, 'Smokey BBQ Pizza', 'Best FIREWOOD Pizza in Town.', '250', 'Food-Name-1010.jpg', 4, 'Yes', 'Yes'),
(13, 'Chicken Tikka', 'Aromatic Tandoori Chicken Tikka Style - The Yum Yum Club', '349', 'Food-Name-2268.webp', 1, 'Yes', 'Yes'),
(14, 'testing food', 'food', '200', 'Food-Name-2015.jpg', 9, 'No', 'Yes'),
(15, 'Chicken Pizza', 'The Best chicken Pizza .', '299', 'Food-Name-8674.jfif', 4, 'Yes', 'Yes'),
(16, 'Grilled Burgers', 'Perfect grilled burgers', '249', 'Food-Name-8414.jfif', 5, 'Yes', 'Yes'),
(17, 'steamed momos', 'BEST Steamed momos', '199', 'Food-Name-3691.jfif', 9, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(150) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `payment` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `food`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`, `payment`) VALUES
(1, 'Best Burger', '299', 1, '299', '2022-01-07 04:53:47', 'Delivered', 'pritam', '1234567899', 'pritam@gmail.com', 'jiytydzjaxkn', ''),
(2, 'Smokey BBQ Pizza', '250', 2, '500', '2022-01-07 05:00:41', 'On Delivery', 'pritam lambade', '1234567899', 'pritam@gmail.com', 'sicsjjlcijcika', ''),
(3, 'Dumplings Specials', '449', 2, '898', '2022-01-07 05:02:20', 'Cancelled', 'pritam lambade', '1234567899', 'pritam@gmail.com', 'JDAIIOHOAiuuc', ''),
(5, 'Dumplings Specials', '449', 3, '1347', '2022-01-08 09:46:01', 'Delivered', 'Pritam Lambade', '1234567899', 'pritam@gmail.com', 'asdfghjkl', ''),
(6, 'Best Burger', '299', 1, '299', '2022-01-21 11:58:12', 'Delivered', 'yash salvi', '8853456768', 'salviyash@gamil.com', 'shdjdk hjsusu hsy', ''),
(7, 'steamed momos', '199', 1, '199', '2022-02-08 09:25:40', 'Delivered', 'harhsal umasare', '9999922222', 'pritamlambade@gmail.com', 'antilea', ''),
(8, 'Chicken Tikka', '349', 1, '349', '2022-03-11 05:05:01', 'ordered', 'suyash sanas', '8372973629', 'duashusdh@gamil.com', 'jhsxuh', ''),
(9, 'Dumplings Specials', '449', 1, '449', '2022-03-13 10:54:51', 'ordered', 'suyash sanas', '9860555476', 'duashusdh@gamil.com', 'gchgjhjhgy', ''),
(10, 'Dumplings Specials', '449', 1, '449', '2022-03-22 02:00:15', 'ordered', 'priyanka lambade', '356898765432', 'priyanka@gmail.com', 'chsdhuhdichd', ''),
(11, 'Dumplings Specials', '449', 1, '449', '2022-03-22 02:06:32', 'ordered', 'suyash sanas', '9860555476', 'duashusdh@gamil.com', 'csaki', ''),
(12, 'Dumplings Specials', '449', 1, '449', '2022-03-22 02:08:38', 'ordered', 'suyash sanas', '8372973629', 'duashusdh@gamil.com', 'kk', ''),
(13, 'Chicken Pizza', '299', 1, '299', '2022-03-25 02:56:49', 'ordered', 'pritam lambade', '9860555476', 'pritamlambade@gmail.com', 'jdiaisjksdsk', 'UPI'),
(14, 'Chicken Tikka', '349', 1, '349', '2022-03-25 02:57:47', 'ordered', 'pritam lambade', '8372973629', 'pritamlambade@gmail.com', 'jfdlsjclsjcolsdjc', 'No'),
(15, 'Dumplings Specials', '449', 1, '449', '2022-03-25 02:59:17', 'ordered', 'pritam lambade', '8372973629', 'pritamlambade@gmail.com', 'sjdhkjdahskadh', 'Cards'),
(16, 'Chicken Tikka', '349', 1, '349', '2022-03-25 03:00:50', 'ordered', 'pritam lambade', '9860555476', 'pritamlambade@gmail.com', 'aajksdjsia', 'Cash On Delivery'),
(17, 'Chicken Tikka', '349', 1, '349', '2022-03-25 03:21:47', 'ordered', 'pritam lambade', '9860555476', 'pritamlambade@gmail.com', '78,yf,jj', 'Credit/Debit/ATM Card');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
