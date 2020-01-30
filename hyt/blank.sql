-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2020 at 03:24 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blank`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` bigint(20) NOT NULL,
  `cat_name` varchar(20) NOT NULL,
  `cat_desc` varchar(20) NOT NULL,
  `parent_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `custven`
--

CREATE TABLE `custven` (
  `cv_id` bigint(20) NOT NULL,
  `cv_type` varchar(20) NOT NULL,
  `cv_name` varchar(20) NOT NULL,
  `cv_address` longtext NOT NULL,
  `cv_phno` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `exp_id` bigint(20) NOT NULL,
  `exp_categ` varchar(20) NOT NULL,
  `exp_amt` double NOT NULL,
  `subject` varchar(20) NOT NULL,
  `notes` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `ser_no` bigint(20) NOT NULL,
  `prod_id` bigint(20) NOT NULL,
  `prod_cnt` bigint(20) NOT NULL,
  `prod_status` tinyint(1) NOT NULL,
  `part_id` bigint(20) NOT NULL,
  `part_cnt` bigint(20) NOT NULL,
  `part_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `parts`
--

CREATE TABLE `parts` (
  `part_id` bigint(20) NOT NULL,
  `part_name` varchar(20) NOT NULL,
  `part_type` varchar(20) NOT NULL,
  `prod_id` bigint(20) NOT NULL,
  `part_amt` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pos`
--

CREATE TABLE `pos` (
  `pos_id` bigint(20) NOT NULL,
  `parent_id` bigint(20) NOT NULL,
  `quantity` bigint(20) NOT NULL,
  `total_amt` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `process`
--

CREATE TABLE `process` (
  `proc_id` bigint(20) NOT NULL,
  `proc_name` varchar(20) NOT NULL,
  `proc_desc` varchar(20) NOT NULL,
  `prod_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prod_id` bigint(20) NOT NULL,
  `prod_name` varchar(20) NOT NULL,
  `prod_type` varchar(20) NOT NULL,
  `proj_id` bigint(20) NOT NULL,
  `prod_amt` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `proj_id` bigint(20) NOT NULL,
  `proj_name` varchar(20) NOT NULL,
  `proj_type` varchar(20) NOT NULL,
  `proj_start_date` date NOT NULL,
  `proj_end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_invoice`
--

CREATE TABLE `purchase_invoice` (
  `purc_id` bigint(20) NOT NULL,
  `purc_amt` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_items`
--

CREATE TABLE `purchase_items` (
  `item_id` bigint(20) NOT NULL,
  `purc_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) NOT NULL,
  `rname` varchar(30) NOT NULL,
  `rdesc` varchar(100) NOT NULL,
  `acc_code` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `rname`, `rdesc`, `acc_code`) VALUES
(8, 'Full', 'Full Access', 'INDEX;A01;A02;C01;D03;D04;D05;D06;D01;D02;B01;G01;G02;G03;F01;'),
(10, 'ex', 'ex', 'INDEX;C01;G01;'),
(14, 'test2', 'test2', 'INDEX;A01;C01;G02;'),
(15, 'custm', 'custm', 'INDEX;A01;R01;');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sales_id` bigint(20) NOT NULL,
  `invoice_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `role` int(10) NOT NULL,
  `active` int(2) NOT NULL,
  `llogin` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `fname`, `pass`, `role`, `active`, `llogin`) VALUES
(0, 'mubeen', 'sayad', 'gowdra', 0, 0, ''),
(2, 'admin', 'Administrator', 'cf964d16eba49f7347608b6b9fac21af70a8a9a8', 8, 1, '18/10/2018 09:10 AM'),
(12, 'omkar', 'murgesh', 'gowdra123', 2, 1, 'ss'),
(45, 'omkar1', 'ert', '5d41402abc4b2a76b9719d911017c592', 56, 1, ''),
(46, 'omkar11', 'omkar11', 'e123d16c1a841901c02b937c33a9fe7d22255ca6', 15, 1, '22/01/2020 15:01 PM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `custven`
--
ALTER TABLE `custven`
  ADD PRIMARY KEY (`cv_id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`exp_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`ser_no`);

--
-- Indexes for table `parts`
--
ALTER TABLE `parts`
  ADD PRIMARY KEY (`part_id`);

--
-- Indexes for table `pos`
--
ALTER TABLE `pos`
  ADD PRIMARY KEY (`pos_id`);

--
-- Indexes for table `process`
--
ALTER TABLE `process`
  ADD PRIMARY KEY (`proc_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prod_id`),
  ADD KEY `prod_name` (`prod_name`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`proj_id`);

--
-- Indexes for table `purchase_invoice`
--
ALTER TABLE `purchase_invoice`
  ADD PRIMARY KEY (`purc_id`);

--
-- Indexes for table `purchase_items`
--
ALTER TABLE `purchase_items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rname` (`rname`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sales_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `custven`
--
ALTER TABLE `custven`
  MODIFY `cv_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `exp_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `ser_no` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parts`
--
ALTER TABLE `parts`
  MODIFY `part_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pos`
--
ALTER TABLE `pos`
  MODIFY `pos_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `process`
--
ALTER TABLE `process`
  MODIFY `proc_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prod_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `proj_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_invoice`
--
ALTER TABLE `purchase_invoice`
  MODIFY `purc_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_items`
--
ALTER TABLE `purchase_items`
  MODIFY `item_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` bigint(20) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
