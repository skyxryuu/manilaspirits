-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2020 at 12:09 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manilaspiritsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `login_tbl`
--

CREATE TABLE `login_tbl` (
  `userId` int(11) NOT NULL,
  `firstName` text NOT NULL,
  `middleName` text NOT NULL,
  `lastName` text NOT NULL,
  `suffix` text NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(45) NOT NULL,
  `contact` bigint(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL,
  `ipAddress` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_tbl`
--

INSERT INTO `login_tbl` (`userId`, `firstName`, `middleName`, `lastName`, `suffix`, `username`, `password`, `email`, `contact`, `address`, `createdDate`, `status`, `ipAddress`) VALUES
(1, 'sample', 'sample', 'sample', 'jr', 'sample', '$2y$10$wvjtMCpPnyNcsmH644BKCuENhMqXaBTsihLXMwztyUEHc1u4RC8Aq', 'test@gmail.com', 0, ' Cainta Rizal', '2020-05-31 04:13:10', 1, '110.54.245.83');

-- --------------------------------------------------------

--
-- Table structure for table `order_tbl`
--

CREATE TABLE `order_tbl` (
  `orderId` int(45) NOT NULL,
  `userId` int(11) NOT NULL,
  `referenceNo` varchar(45) NOT NULL,
  `orderSummary` varchar(200) NOT NULL,
  `total` double(45,2) NOT NULL,
  `remarks` varchar(45) NOT NULL,
  `paymentType` varchar(45) NOT NULL,
  `creditCardNo` varchar(45) NOT NULL,
  `expirationDate` varchar(45) NOT NULL,
  `cvvNumber` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_tbl`
--

INSERT INTO `order_tbl` (`orderId`, `userId`, `referenceNo`, `orderSummary`, `total`, `remarks`, `paymentType`, `creditCardNo`, `expirationDate`, `cvvNumber`, `address`, `status`, `created_at`) VALUES
(1, 1, 'MS-7CGK41', 'Red Horse Beer', 45.00, '', 'COD', '', '', '', '   Makati City', 0, '2020-05-31 09:05:51'),
(2, 1, 'MS-LJHM68', 'San Miguel Especial\r\n', 40.00, '', 'COD', '', '', '', 'Cainta Rizal', 0, '2020-05-31 14:24:32'),
(3, 1, 'MS-9MH50G', 'San Miguel Pale Pilsen', 40.00, '', 'COD', '', '', '', ' Cainta Rizal', 0, '2020-06-06 17:01:49');

-- --------------------------------------------------------

--
-- Table structure for table `products_brands_tbl`
--

CREATE TABLE `products_brands_tbl` (
  `product_brands_id` int(11) NOT NULL,
  `product_brand` varchar(25) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_brands_tbl`
--

INSERT INTO `products_brands_tbl` (`product_brands_id`, `product_brand`, `createdDate`, `status`) VALUES
(1, 'San Miguel', '2020-05-30 14:39:34', 1),
(2, 'Fundador', '2020-05-31 08:25:38', 1),
(3, 'Johnnie Walker', '2020-06-07 09:40:10', 1),
(4, 'Bacardi', '2020-06-07 09:54:31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products_carousel_tbl`
--

CREATE TABLE `products_carousel_tbl` (
  `product_carousel_id` int(11) NOT NULL,
  `product_images` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_carousel_tbl`
--

INSERT INTO `products_carousel_tbl` (`product_carousel_id`, `product_images`, `product_id`) VALUES
(1, 'sanmig.png', 1),
(2, 'redhorse.png', 2),
(3, 'sanmigpilsen.png', 3),
(4, 'fundador-ultrasmooth.jpg', 4),
(5, 'fundador-light.jpg', 5),
(6, 'fundador-solera.jpg', 6),
(7, 'blacklabel.jpg', 7),
(8, 'bluelabel.jpg', 8),
(9, 'redlabel.jpg', 9),
(10, 'bacardigold.jpg', 10),
(11, 'bacardirazz.jpg', 11),
(12, 'bacardisuperior.png', 12);

-- --------------------------------------------------------

--
-- Table structure for table `products_category_tbl`
--

CREATE TABLE `products_category_tbl` (
  `product_category_id` int(11) NOT NULL,
  `product_category` varchar(50) NOT NULL,
  `status` int(1) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_category_tbl`
--

INSERT INTO `products_category_tbl` (`product_category_id`, `product_category`, `status`, `createdDate`) VALUES
(1, 'Beer', 1, '2020-05-30 14:33:54'),
(2, 'Brandy', 1, '2020-05-31 08:28:30'),
(3, 'Whisky', 1, '2020-06-07 09:36:06'),
(4, 'Rum', 1, '2020-06-07 09:54:54');

-- --------------------------------------------------------

--
-- Table structure for table `products_tbl`
--

CREATE TABLE `products_tbl` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_brand` varchar(100) NOT NULL,
  `product_category` varchar(100) NOT NULL,
  `product_price` varchar(10) NOT NULL,
  `product_discount` int(11) NOT NULL,
  `product_description` varchar(5000) NOT NULL,
  `product_stocks` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_tbl`
--

INSERT INTO `products_tbl` (`product_id`, `product_name`, `product_brand`, `product_category`, `product_price`, `product_discount`, `product_description`, `product_stocks`, `created_at`) VALUES
(1, 'San Miguel Especial\r\n', 'San Miguel', 'Beer', '40', 0, '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>PRODUCT DESCRIPTION:</strong>\r\n			<p>A discreet, light malty aroma with a hint of hops. Light flavor with a slight bitterness and a tint of malt. Serve at 8-10 °C with spicy food or as a social drink. San Miguel has its origin in the Phillipines where it was brewed by the Spanish immigrants. Some of the family members moved back to Spain and there by the Spanish name, San Miguel. The Spanish San Miguel dominates Europe.</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 100, '2020-05-31 08:08:57'),
(2, 'Red Horse Beer', 'San Miguel', 'Beer', '45', 0, '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>PRODUCT DESCRIPTION:</strong>\r\n			<p>A strong, high alcohol beer. It is deeply hued lager with a distinctive, sweetish taste, balanced by a smooth bitterness. For the man with real strength, inside and out.</p>		\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 100, '2020-05-31 08:08:01'),
(3, 'San Miguel Pale Pilsen', 'San Miguel', 'Beer', '40', 0, '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>PRODUCT DESCRIPTION:</strong>\r\n			<p>San Miguel Pale Pilsen is a pale, golden lager with a rich, full-bodied flavor. Its smooth, full-flavored taste complements its pleasant aroma, making it a perfectly balanced beer. It has a unique heritage of bringing people together, nourishing true friendships for over a hundred years.</p>		\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 100, '2020-05-31 08:18:29'),
(4, 'Fundador Ultra Smooth ', 'Fundador', 'Brandy', '450', 0, '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>PRODUCT DESCRIPTION:</strong>\r\n			<p>A premium quality distillate, it has a coppery amber color with rainbow-hued flashes of gold delivering a distinguished & unique ultra-smooth taste with a rich & mellow flavor.</p>		\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 100, '2020-05-31 08:34:59'),
(5, 'Fundador Light', 'Fundador', 'Brandy', '350', 0, '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>PRODUCT DESCRIPTION:</strong>\r\n			<p>The best-selling Fundador in the Philippines. A high-quality distillate aged in cellars by the traditional solera system delivers a balanced and clean aroma with a fragrance of wood seasoned sherry delivering a smooth light taste.</p>		\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 100, '2020-05-31 08:46:26'),
(6, 'Fundador Solera', 'Fundador ', 'Brandy', '500', 0, '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>PRODUCT DESCRIPTION:</strong>\r\n			<p>The standard Spanish brandy, its smoothness, distinct aroma and rich, full-bodied flavor is proof of its prestigious heritage as the best-selling premium spirit & one of the most iconic imported brands in the Philippines for more than a century since 1902.</p>		\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 100, '2020-05-31 08:55:09'),
(7, 'Johnnie Walker Black Label', 'Johnnie Walker', 'Whisky', '1200', 0, '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>PRODUCT DESCRIPTION:</strong>\r\n			<p>Johnnie Walker Black Label is a true icon, recognised as the benchmark for all other deluxe blends. Created using only whiskies aged for a minimum of 12 years from the four corners of Scotland, Johnnie Walker Black Label has an unmistakably smooth, deep, complex character. An impressive whisky to share on any occasion, whether you\'re entertaining at home with friends or on a memorable night out.</p>		\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 100, '2020-06-07 09:46:34'),
(8, 'Johnnie Walker Blue Label', 'Johnnie Walker', 'Whisky', '7200', 0, '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>PRODUCT DESCRIPTION:</strong>\r\n			<p>Johnnie Walker Blue Label is an unrivalled masterpiece. It is an exquisite blend made from some of Scotland’s rarest and most exceptional whiskies. Only one in every ten thousand casks has the elusive quality, character and flavour to deliver the remarkable signature taste of Johnnie Walker Blue Label. An extraordinary whisky for extraordinary occasions.</p>		\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 100, '2020-06-07 09:50:43'),
(9, 'Johnnie Walker Red Label', 'Johnnie Walker', 'Whisky', '800', 0, '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>PRODUCT DESCRIPTION:</strong>\r\n			<p>Johnnie Walker Red Label is the Pioneer Blend, the versatile one that has introduced the whisky to the world. Crafted from the four corners of Scotland, it crackles with spice and is bursting with vibrant, smoky flavours – followed by a mellow bed of vanilla, a fresh zestiness and the Johnnie Walker signature of a long, lingering, smoky finish.\r\n\r\nEnjoy Johnnie Walker Red Label in any way you like - on its own, over ice, or long with your favourite mixer.</p>		\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 100, '2020-06-07 09:53:43'),
(10, 'Bacardi Gold', 'Bacardi', 'Rum', '495', 0, '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>PRODUCT DESCRIPTION:</strong>\r\n			<p>Bacardi Gold offers a richer and deeper profile than BACARDI Carta Blanca. It is a slightly golden rum with smooth oak notes and touches of vanilla and butter caramel. It can be enjoyed straight or in elegant cocktails, such as El President (the original Rum Manhattan). It was the rum used to create the original Cuba Libre in 1900.</p>		\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 100, '2020-06-07 09:58:02'),
(11, 'Bacardi Razz', 'Bacardi', 'Rum', '1220', 0, '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>PRODUCT DESCRIPTION:</strong>\r\n			<p>Bacardi RAZZ is a molasses based raspberry flavored Rum and represents the successful Bacardi family and the spirit of modernity with different flavors ideal for celebrations and beach parties. Molasses is the thick, sticky brown by-product of sugar production.</p>		\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 100, '2020-06-07 10:05:20'),
(12, 'Bacardi Superior', 'Bacardi', 'Rum', '475', 0, '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>PRODUCT DESCRIPTION:</strong>\r\n			<p>Bacardi Superior is a light and aromatic rum with light floral and fruity notes. It is especially designed for mixing and it contains many subtle flavor notes. In fact, it complements light flavor ingredients, instead of dominating or disappearing in them.</p>		\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 100, '2020-06-07 10:07:54');

-- --------------------------------------------------------

--
-- Table structure for table `products_transactions_tbl`
--

CREATE TABLE `products_transactions_tbl` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `referenceNo` varchar(56) NOT NULL,
  `product_name` varchar(45) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_price` double(45,2) NOT NULL,
  `total` double(45,2) NOT NULL,
  `status` int(1) NOT NULL,
  `orderdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_transactions_tbl`
--

INSERT INTO `products_transactions_tbl` (`id`, `product_id`, `referenceNo`, `product_name`, `product_quantity`, `product_price`, `total`, `status`, `orderdate`) VALUES
(1, 1, 'MS-7CGK41', 'Red Horse Beer', 1, 45.00, 45.00, 0, '2020-05-31 09:05:51'),
(2, 2, 'MS-LJHM68', 'San Miguel Especial\r\n', 1, 40.00, 40.00, 0, '2020-05-31 14:24:32'),
(3, 3, 'MS-9MH50G', 'San Miguel Pale Pilsen', 1, 40.00, 40.00, 0, '2020-06-06 17:01:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login_tbl`
--
ALTER TABLE `login_tbl`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `order_tbl`
--
ALTER TABLE `order_tbl`
  ADD PRIMARY KEY (`orderId`);

--
-- Indexes for table `products_brands_tbl`
--
ALTER TABLE `products_brands_tbl`
  ADD PRIMARY KEY (`product_brands_id`);

--
-- Indexes for table `products_carousel_tbl`
--
ALTER TABLE `products_carousel_tbl`
  ADD PRIMARY KEY (`product_carousel_id`);

--
-- Indexes for table `products_category_tbl`
--
ALTER TABLE `products_category_tbl`
  ADD PRIMARY KEY (`product_category_id`);

--
-- Indexes for table `products_tbl`
--
ALTER TABLE `products_tbl`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `products_transactions_tbl`
--
ALTER TABLE `products_transactions_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login_tbl`
--
ALTER TABLE `login_tbl`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_tbl`
--
ALTER TABLE `order_tbl`
  MODIFY `orderId` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products_brands_tbl`
--
ALTER TABLE `products_brands_tbl`
  MODIFY `product_brands_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products_carousel_tbl`
--
ALTER TABLE `products_carousel_tbl`
  MODIFY `product_carousel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products_category_tbl`
--
ALTER TABLE `products_category_tbl`
  MODIFY `product_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products_tbl`
--
ALTER TABLE `products_tbl`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `products_transactions_tbl`
--
ALTER TABLE `products_transactions_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
