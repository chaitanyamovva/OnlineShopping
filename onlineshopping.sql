-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2019 at 01:10 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `onlineshopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE IF NOT EXISTS `checkout` (
  `firstname` varchar(240) NOT NULL,
  `email` varchar(240) NOT NULL,
  `address` varchar(240) NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `zip` varchar(240) NOT NULL,
  `cardname` int(240) NOT NULL,
  `cardnumber` int(240) NOT NULL,
  `expmonth` varchar(240) NOT NULL,
  `expyear` varchar(240) NOT NULL,
  `cvv` int(240) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`firstname`, `email`, `address`, `city`, `state`, `zip`, `cardname`, `cardnumber`, `expmonth`, `expyear`, `cvv`) VALUES
('qwd', 'asdf', 'asf', 'aef', 'aerf', 't6h 2a3', 0, 0, 'qwe', 'qwe', 0),
('chaitanya', 'movvasaichaitanya@gmail.com', '12', 'edmonton', 'AB', 't6h 2a3', 0, 0, '12', '12', 123);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `item_name` varchar(240) NOT NULL,
  `item_quantity` int(240) NOT NULL,
  `item_price` int(240) NOT NULL,
  `total_item_price` int(240) NOT NULL,
  `total` int(240) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(240) NOT NULL,
  `username` varchar(240) NOT NULL,
  `password` varchar(240) NOT NULL,
  `phno` int(240) NOT NULL,
  `email` varchar(240) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `phno`, `email`) VALUES
(0, 'chaitanya', 'chaitanya', 2147483647, 'qwe'),
(0, '', '123456', 2147483647, 'movvasaichaitanya@gmail.com'),
(0, '', 'Karthik@123', 2147483647, '33223'),
(0, '', '123456', 2147483647, 'movvasaichaitanya@gmail.com'),
(0, '', '123456', 2147483647, '33223'),
(0, '', 'narsi', 2147483647, 'movvasaichaitanya@gmail.com'),
(0, '', 'Karthik@123', 2147483647, 'chaitanya@gmail.com'),
(0, '', 'Karthik@123', 2147483647, 'movvasaichaitanya@gmail.com'),
(0, 'narsi', 'narsi', 2147483647, 'chaitanya@gmail.com'),
(0, 'kartik', 'abc', 1234567, 'chaitanya@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `onlineshopping_addcustomer`
--

CREATE TABLE IF NOT EXISTS `onlineshopping_addcustomer` (
  `customername` char(25) NOT NULL,
  `customerpsd` varchar(10) NOT NULL,
  `customerDOB` date NOT NULL,
  `customerphno` bigint(10) NOT NULL,
  `customeremail` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `onlineshopping_addcustomer`
--

INSERT INTO `onlineshopping_addcustomer` (`customername`, `customerpsd`, `customerDOB`, `customerphno`, `customeremail`) VALUES
('chaitanya', 'chaitanya', '2019-02-13', 7802434088, 'abc@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `onlineshopping_orders`
--

CREATE TABLE IF NOT EXISTS `onlineshopping_orders` (
  `orderid` int(11) NOT NULL,
  `username` text NOT NULL,
  `itemname` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `onlineshopping_orders`
--

INSERT INTO `onlineshopping_orders` (`orderid`, `username`, `itemname`, `quantity`, `price`) VALUES
(0, '', '', 0, 0),
(0, '', '', 0, 0),
(0, '', '', 0, 0),
(0, '', '', 0, 0),
(0, '', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `onlineshopping_products`
--

CREATE TABLE IF NOT EXISTS `onlineshopping_products` (
`id` int(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `image` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `onlineshopping_products`
--

INSERT INTO `onlineshopping_products` (`id`, `name`, `image`, `price`, `quantity`) VALUES
(7, 'iphone', 'uploads/1.jpg', 800, 4),
(8, 'samsung s9', 'uploads/3.png', 700, 4),
(9, 'oneplus 6t', 'uploads/2.jpg', 650, 2),
(10, 'samsung note s9', 'uploads/4.jpg', 850, 3);

-- --------------------------------------------------------

--
-- Table structure for table `shopkeeperlogin`
--

CREATE TABLE IF NOT EXISTS `shopkeeperlogin` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shopkeeperlogin`
--

INSERT INTO `shopkeeperlogin` (`id`, `name`, `password`) VALUES
(1, 'chaitanya', 'chaitanya');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `onlineshopping_addcustomer`
--
ALTER TABLE `onlineshopping_addcustomer`
 ADD UNIQUE KEY `customername` (`customername`), ADD UNIQUE KEY `customerpsd` (`customerpsd`), ADD UNIQUE KEY `customerphno` (`customerphno`), ADD UNIQUE KEY `customeremail` (`customeremail`);

--
-- Indexes for table `onlineshopping_products`
--
ALTER TABLE `onlineshopping_products`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `onlineshopping_products`
--
ALTER TABLE `onlineshopping_products`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
