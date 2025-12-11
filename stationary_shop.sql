-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2022 at 01:19 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tv_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `id` int(11) NOT NULL,
  `Name` varchar(15) NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`id`, `Name`, `Description`) VALUES
(1, 'Cello', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_card`
--

CREATE TABLE `tbl_card` (
  `id` int(11) NOT NULL,
  `Cust_id` int(11) NOT NULL,
  `Card_number` int(16) NOT NULL,
  `Name` varchar(15) NOT NULL,
  `Expiry_month` varchar(2) NOT NULL,
  `Expiry_year` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cartchild`
--

CREATE TABLE `tbl_cartchild` (
  `id` int(11) NOT NULL,
  `CartM_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `order_qty` int(10) NOT NULL,
  `price` int(11) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_cartchild`
--

INSERT INTO `tbl_cartchild` (`id`, `CartM_id`, `item_id`, `order_qty`, `price`, `Date`) VALUES
(1, 1, 1, 1, 1999, '2022-10-15 10:22:57');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cartmaster`
--

CREATE TABLE `tbl_cartmaster` (
  `id` int(11) NOT NULL,
  `Cust_id` int(11) NOT NULL,
  `Total_price` int(10) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'cart'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_cartmaster`
--

INSERT INTO `tbl_cartmaster` (`id`, `Cust_id`, `Total_price`, `status`) VALUES
(1, 5, 1999, 'Purchased');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `Name` varchar(15) NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `Name`, `Description`) VALUES
(1, 'Pen', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_courier`
--

CREATE TABLE `tbl_courier` (
  `id` int(11) NOT NULL,
  `Staff_id` int(11) NOT NULL,
  `Name` varchar(10) NOT NULL,
  `Phone_number` varchar(10) NOT NULL,
  `Email` varchar(15) NOT NULL,
  `City` varchar(10) NOT NULL,
  `District` varchar(10) NOT NULL,
  `Pincode` varchar(7) NOT NULL,
  `Date` datetime NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `Firstname` varchar(10) NOT NULL,
  `Lastname` varchar(10) NOT NULL,
  `Phone_number` varchar(10) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `House_name` varchar(4) NOT NULL,
  `City` varchar(12) NOT NULL,
  `District` varchar(12) NOT NULL,
  `Pincode` varchar(7) NOT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Username` varchar(15) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `Firstname`, `Lastname`, `Phone_number`, `Email`, `House_name`, `City`, `District`, `Pincode`, `Date`, `Username`, `Password`) VALUES
(1, 'Test', 'Test last', '9865895689', 'test@gmail.com', 'Hn20', 'Kochi ', 'Kerala', '682025', '0000-00-00 00:00:00', 'test', '1234'),
(5, 'customer', 'customer', '7865437890', 'customer@gmail.com', 'hous', 'kochi', 'ernakulam', '682005', '0000-00-00 00:00:00', 'customer', 'asdf1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_Inactiveivery`
--

CREATE TABLE `tbl_Inactiveivery` (
  `id` int(11) NOT NULL,
  `Courier_id` int(11) NOT NULL,
  `Payment_id` int(11) NOT NULL,
  `Order_id` int(11) NOT NULL,
  `Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_item`
--

CREATE TABLE `tbl_item` (
  `id` int(11) NOT NULL,
  `Sub_id` int(11) NOT NULL,
  `Brand_id` int(11) NOT NULL,
  `Name` varchar(15) NOT NULL,
  `Description` text NOT NULL,
  `Image` tinytext NOT NULL,
  `Selling_price` int(5) NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_item`
--

INSERT INTO `tbl_item` (`id`, `Sub_id`, `Brand_id`, `Name`, `Description`, `Image`, `Selling_price`, `Status`) VALUES
(1, 1, 1, 'Hero Gell pen 9', 'Success Stationery Hero Original Premium Fountain Ink Pen 979 MoInactive Golden Color Extra Fine Nib Black Color Body(Business Class Design)', '2022-10-03-07-06-0681IPow3mcZL._SL1500_.jpg', 1999, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `id` int(11) NOT NULL,
  `Username` varchar(15) NOT NULL,
  `Password` varchar(8) NOT NULL,
  `User_type` varchar(10) NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `User_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`id`, `Username`, `Password`, `User_type`, `Status`, `User_id`) VALUES
(1, 'test', '1234', 'Customer', 1, 1),
(2, 'admin@gmail.com', 'admin', 'Admin', 1, 0),
(3, 'customer', 'asdf1', 'Customer', 1, 5),
(4, 'staff@gmail.com', 'staff', 'Staff', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `CartM_id` int(11) NOT NULL,
  `Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `id` int(11) NOT NULL,
  `Courier_id` int(11) NOT NULL,
  `Card_id` int(11) NOT NULL,
  `Order_id` int(11) NOT NULL,
  `Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchasechild`
--

CREATE TABLE `tbl_purchasechild` (
  `id` int(11) NOT NULL,
  `PurchaseM_id` int(11) NOT NULL,
  `Item_id` int(11) NOT NULL,
  `Cost_price` int(5) NOT NULL,
  `Quantity` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchasemaster`
--

CREATE TABLE `tbl_purchasemaster` (
  `id` int(11) NOT NULL,
  `Staff_id` int(11) NOT NULL,
  `Vendor_id` int(11) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_purchasemaster`
--

INSERT INTO `tbl_purchasemaster` (`id`, `Staff_id`, `Vendor_id`, `Date`) VALUES
(1, 1, 1, '2022-10-03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff`
--

CREATE TABLE `tbl_staff` (
  `id` int(11) NOT NULL,
  `Email` varchar(15) NOT NULL,
  `Password` varchar(8) NOT NULL,
  `Firstname` varchar(10) NOT NULL,
  `Lastname` varchar(10) NOT NULL,
  `Phone_number` varchar(10) NOT NULL,
  `House_name` varchar(10) NOT NULL,
  `City` varchar(12) NOT NULL,
  `District` varchar(12) NOT NULL,
  `Pincode` varchar(7) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_staff`
--

INSERT INTO `tbl_staff` (`id`, `Email`, `Password`, `Firstname`, `Lastname`, `Phone_number`, `House_name`, `City`, `District`, `Pincode`, `Date`) VALUES
(1, 'staff@gmail.com', 'staff', 'staff', 'staff', '9876543867', 'house', 'kochi', 'ernakulam', '682005', '2022-10-15 09:56:38');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategory`
--

CREATE TABLE `tbl_subcategory` (
  `id` int(11) NOT NULL,
  `Cat_id` varchar(11) NOT NULL,
  `Name` varchar(15) NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_subcategory`
--

INSERT INTO `tbl_subcategory` (`id`, `Cat_id`, `Name`, `Description`) VALUES
(1, '1', 'Gell Pen', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vendor`
--

CREATE TABLE `tbl_vendor` (
  `id` int(11) NOT NULL,
  `Staff_id` int(11) NOT NULL,
  `Name` varchar(11) NOT NULL,
  `Phone_number` varchar(10) NOT NULL,
  `House_name` varchar(10) NOT NULL,
  `City` varchar(10) NOT NULL,
  `District` varchar(10) NOT NULL,
  `Pincode` varchar(7) NOT NULL,
  `Date` datetime NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_vendor`
--

INSERT INTO `tbl_vendor` (`id`, `Staff_id`, `Name`, `Phone_number`, `House_name`, `City`, `District`, `Pincode`, `Date`, `Status`) VALUES
(1, 1, 'Chandrasekh', '9562106250', 'Palariivat', 'Kochi - Ke', 'Kerala', '682025', '0000-00-00 00:00:00', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_card`
--
ALTER TABLE `tbl_card`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cartchild`
--
ALTER TABLE `tbl_cartchild`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cartmaster`
--
ALTER TABLE `tbl_cartmaster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_courier`
--
ALTER TABLE `tbl_courier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_Inactiveivery`
--
ALTER TABLE `tbl_Inactiveivery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_item`
--
ALTER TABLE `tbl_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_purchasechild`
--
ALTER TABLE `tbl_purchasechild`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_purchasemaster`
--
ALTER TABLE `tbl_purchasemaster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_vendor`
--
ALTER TABLE `tbl_vendor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_card`
--
ALTER TABLE `tbl_card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_cartchild`
--
ALTER TABLE `tbl_cartchild`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_cartmaster`
--
ALTER TABLE `tbl_cartmaster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_courier`
--
ALTER TABLE `tbl_courier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_Inactiveivery`
--
ALTER TABLE `tbl_Inactiveivery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_item`
--
ALTER TABLE `tbl_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_purchasechild`
--
ALTER TABLE `tbl_purchasechild`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_purchasemaster`
--
ALTER TABLE `tbl_purchasemaster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_vendor`
--
ALTER TABLE `tbl_vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
