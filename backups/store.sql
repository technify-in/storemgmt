-- phpMyAdmin SQL Dump
-- version 4.3.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 04, 2015 at 03:03 PM
-- Server version: 5.6.23
-- PHP Version: 5.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE IF NOT EXISTS `attendance` (
  `att_id` int(11) NOT NULL,
  `eid` int(11) NOT NULL,
  `date` date NOT NULL,
  `stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`att_id`, `eid`, `date`, `stamp`) VALUES
(10, 2, '2015-03-06', '2015-03-03 13:16:11'),
(11, 3, '2015-05-03', '2015-03-03 13:14:52'),
(12, 2, '2012-03-03', '2015-03-03 13:15:03'),
(13, 1, '2015-03-03', '2015-03-03 13:23:09');

-- --------------------------------------------------------

--
-- Table structure for table `billout`
--

CREATE TABLE IF NOT EXISTS `billout` (
  `bill_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `discount` varchar(30) NOT NULL,
  `payid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `xyz` varchar(30) NOT NULL,
  `billed_by_eid` int(11) NOT NULL,
  `cash_by_eid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bill_item`
--

CREATE TABLE IF NOT EXISTS `bill_item` (
  `bill_id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `cnote` varchar(30) NOT NULL,
  `billitem_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `cid` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phno` varchar(30) DEFAULT NULL,
  `xyz` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `eid` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `designation` varchar(30) DEFAULT NULL,
  `contact` varchar(30) DEFAULT NULL,
  `fcontact` varchar(30) DEFAULT NULL,
  `photo` varchar(30) DEFAULT NULL,
  `dob` varchar(30) DEFAULT NULL,
  `password` varchar(40) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `username` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`eid`, `name`, `designation`, `contact`, `fcontact`, `photo`, `dob`, `password`, `active`, `username`) VALUES
(1, 'jaspal', 'Service', '+91 95-01-465775', '+91 96-46-161177', '#', '15-01-1990', 'jaspal775', 0, 'jaspal'),
(2, 'harmeet', 'Manager', '+91 95-01-002070', '95-01-002070', '#', '15-1-1990', 'harmeet070', 0, 'harmeet'),
(3, 'manjot', 'Sales', '9855280009', '+91 96-46-101992', '#', '19-9-1990', 'manjot009', 0, 'manjot');

-- --------------------------------------------------------

--
-- Table structure for table `firm`
--

CREATE TABLE IF NOT EXISTS `firm` (
  `fid` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `add` varchar(30) NOT NULL,
  `pno` varchar(30) DEFAULT NULL,
  `vno` varchar(30) NOT NULL,
  `bankdetails` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `pr_id` varchar(30) NOT NULL,
  `payid` int(11) NOT NULL,
  `amount` varchar(30) NOT NULL,
  `method` varchar(30) NOT NULL,
  `desc` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `sku` varchar(30) NOT NULL,
  `imei` varchar(30) DEFAULT NULL,
  `sno` varchar(30) DEFAULT NULL,
  `pid` int(11) NOT NULL,
  `name` varchar(63) NOT NULL,
  `tax` varchar(30) NOT NULL,
  `dp` varchar(30) NOT NULL,
  `mrp` varchar(30) NOT NULL,
  `vat_bill_id` varchar(30) NOT NULL,
  `p_condition` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vbill`
--

CREATE TABLE IF NOT EXISTS `vbill` (
  `vid` int(11) NOT NULL,
  `vat_bill_id` int(11) NOT NULL,
  `date` varchar(30) NOT NULL,
  `pid` int(11) NOT NULL,
  `xyz1` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`att_id`), ADD KEY `eid` (`eid`);

--
-- Indexes for table `billout`
--
ALTER TABLE `billout`
  ADD PRIMARY KEY (`bill_id`), ADD KEY `cid` (`cid`), ADD KEY `payid` (`payid`), ADD KEY `billed_by_eid` (`billed_by_eid`), ADD KEY `cash_by_eid` (`cash_by_eid`);

--
-- Indexes for table `bill_item`
--
ALTER TABLE `bill_item`
  ADD PRIMARY KEY (`billitem_id`), ADD KEY `bill_id` (`bill_id`), ADD KEY `pid` (`pid`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `firm`
--
ALTER TABLE `firm`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD KEY `payid` (`payid`), ADD KEY `pr_id` (`pr_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`), ADD KEY `vbid` (`vat_bill_id`);

--
-- Indexes for table `vbill`
--
ALTER TABLE `vbill`
  ADD PRIMARY KEY (`vat_bill_id`), ADD KEY `pid` (`pid`), ADD KEY `vid` (`vid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `att_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `billout`
--
ALTER TABLE `billout`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bill_item`
--
ALTER TABLE `bill_item`
  MODIFY `billitem_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `eid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `firm`
--
ALTER TABLE `firm`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vbill`
--
ALTER TABLE `vbill`
  MODIFY `vat_bill_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`eid`) REFERENCES `employee` (`eid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `billout`
--
ALTER TABLE `billout`
ADD CONSTRAINT `billout_ibfk_2` FOREIGN KEY (`billed_by_eid`) REFERENCES `employee` (`eid`),
ADD CONSTRAINT `billout_ibfk_3` FOREIGN KEY (`cash_by_eid`) REFERENCES `employee` (`eid`),
ADD CONSTRAINT `billout_ibfk_4` FOREIGN KEY (`cid`) REFERENCES `customer` (`cid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `bill_item`
--
ALTER TABLE `bill_item`
ADD CONSTRAINT `bill_item_ibfk_1` FOREIGN KEY (`bill_id`) REFERENCES `billout` (`bill_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `bill_item_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `products` (`pid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`payid`) REFERENCES `billout` (`payid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `vbill`
--
ALTER TABLE `vbill`
ADD CONSTRAINT `vbill_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `products` (`pid`),
ADD CONSTRAINT `vbill_ibfk_2` FOREIGN KEY (`vid`) REFERENCES `firm` (`fid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
