-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 06, 2018 at 12:41 PM
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
-- Table structure for table `purchaseitemlog`
--

DROP TABLE IF EXISTS `purchaseitemlog`;
CREATE TABLE IF NOT EXISTS `purchaseitemlog` (
  `id` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `itemcode` varchar(50) NOT NULL,
  `itemname` varchar(100) NOT NULL,
  `qtyonhand` int(15) DEFAULT NULL,
  `newqty` int(15) DEFAULT NULL,
  `qtyadjusted` int(15) DEFAULT '0',
  `uom` varchar(100) DEFAULT NULL,
  `adjustedon` date DEFAULT NULL,
  `handler` varchar(100) NOT NULL,
  `notes` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchaseitemlog`
--

INSERT INTO `purchaseitemlog` (`id`, `itemcode`, `itemname`, `qtyonhand`, `newqty`, `qtyadjusted`, `uom`, `adjustedon`, `handler`, `notes`) VALUES
(0001, 'DAPL001', '1LTR Preforms', 100, NULL, 0, 'BX', '2018-12-06', 'DAPL', 'Initial Qty on Hand Added'),
(0002, 'DAPL001', '1LTR Preforms', 110, NULL, 10, 'BX', '2018-12-06', 'DAPL', 'Qty Updated '),
(0003, 'DAPL001', '1LTR Preforms', 100, NULL, -10, 'BX', '2018-12-06', 'DAPL', 'Qty subtracted'),
(0004, 'DAPL001', '1LTR Preforms', 90, NULL, -10, 'BX', '2018-12-06', 'DAPL', 'subratecd'),
(0005, 'DAPL002', '3LTRS preforms', 100, NULL, 0, 'BAG', '2018-12-06', 'DAPL', 'Stock Added'),
(0006, 'DAPL002', '3LTRS preforms', 111, NULL, 11, 'BAG', '2018-12-06', 'DAPL', 'Stock updated'),
(0007, 'DAPL002', '3LTRS preforms', 150, NULL, -1, 'BAG', '2018-12-06', 'DAPL', 'subtracted');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
