-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 06, 2018 at 12:40 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dapldev`
--

-- --------------------------------------------------------

--
-- Table structure for table `purchaseitemaster`
--

DROP TABLE IF EXISTS `purchaseitemaster`;
CREATE TABLE IF NOT EXISTS `purchaseitemaster` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `itemcode` varchar(100) NOT NULL,
  `itemname` varchar(50) NOT NULL,
  `category` varchar(50) DEFAULT ' ',
  `description` varchar(100) NOT NULL,
  `vendor` varchar(255) NOT NULL,
  `hsncode` varchar(100) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT '1',
  `priceperqty` decimal(10,2) NOT NULL,
  `salespriceperqty` decimal(10,2) DEFAULT NULL,
  `uom` varchar(100) NOT NULL,
  `taxmethod` varchar(20) NOT NULL DEFAULT '0',
  `taxname` varchar(100) NOT NULL,
  `taxrate` decimal(10,2) NOT NULL,
  `taxtype` varchar(50) NOT NULL,
  `taxid` varchar(50) NOT NULL,
  `taxamount` decimal(10,2) NOT NULL,
  `itemcost` decimal(10,2) NOT NULL,
  `taxableprice` decimal(10,2) NOT NULL,
  `pricedatefrom` date NOT NULL,
  `stockinqty` int(20) NOT NULL,
  `stockinuom` varchar(100) DEFAULT NULL,
  `lowstockalert` varchar(50) NOT NULL,
  `stockasofdate` date DEFAULT NULL,
  `usageunit` varchar(30) DEFAULT NULL,
  `handler` varchar(30) NOT NULL,
  `notes` varchar(255) NOT NULL,
  `updatedon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(155) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchaseitemaster`
--

INSERT INTO `purchaseitemaster` (`id`, `itemcode`, `itemname`, `category`, `description`, `vendor`, `hsncode`, `status`, `priceperqty`, `salespriceperqty`, `uom`, `taxmethod`, `taxname`, `taxrate`, `taxtype`, `taxid`, `taxamount`, `itemcost`, `taxableprice`, `pricedatefrom`, `stockinqty`, `stockinuom`, `lowstockalert`, `stockasofdate`, `usageunit`, `handler`, `notes`, `updatedon`, `image`) VALUES
(1, 'DAPL001', '1LTR Preforms', 'CAT003', '12312', '00009', '21321', '1', '120.00', NULL, 'BX', '1', '984', '18.00', '', '7', '21.60', '98.40', '120.00', '2018-12-06', 110, '', '10', '2018-12-06', NULL, 'DAPL', 'Initial Qty on Hand Added', '2018-12-06 11:57:49', NULL),
(2, 'DAPL002', '3LTRS preforms', 'CAT003', 'Packing materials', '00009', '', '1', '140.00', NULL, 'BAG', '1', '', '12.00', '', '16', '16.80', '123.20', '140.00', '2018-12-06', 150, NULL, '10', '2018-12-06', NULL, 'DAPL', 'Stock Added', '2018-12-06 12:08:47', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
