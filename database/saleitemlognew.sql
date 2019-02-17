CREATE TABLE `salesitemlognew` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `itemcode` varchar(50) NOT NULL,
  `itemname` varchar(100) DEFAULT NULL,
  `qtyonhand` int(15) DEFAULT NULL,
  `newqty` int(15) DEFAULT NULL,
  `qtyadjusted` int(15) DEFAULT '0',
  `uom` varchar(100) DEFAULT NULL,
  `adjustedon` date DEFAULT NULL,
  `handler` varchar(100) DEFAULT NULL,
  `notes` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
