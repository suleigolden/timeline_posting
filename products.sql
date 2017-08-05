--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `business_ID` varchar(20) NOT NULL,
  `Product_Name` varchar(100) NOT NULL,
  `Product_Description` varchar(300) NOT NULL,
  `photo` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
