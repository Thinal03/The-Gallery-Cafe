-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 09, 2024 at 04:41 AM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `the_gallery_cafe`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

DROP TABLE IF EXISTS `cart_items`;
CREATE TABLE IF NOT EXISTS `cart_items` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `product_price` decimal(10,0) NOT NULL,
  `product_image` varchar(225) NOT NULL,
  `quantity` int NOT NULL,
  `session_id` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`id`, `product_name`, `product_price`, `product_image`, `quantity`, `session_id`) VALUES
(22, 'Water Bottle Medium 1L', '400', 'http://localhost/The%20Gallery%20Cafe/Resources/menu/Drinks/waterbottel%20medium.jpeg', 1, 'c24hlhpe04lnv39ctgeg04tbce'),
(21, 'Fruit Juice - Avocado', '560', 'http://localhost/The%20Gallery%20Cafe/Resources/menu/Drinks/Fruit%20Juice%20-%20avercado.jpg', 1, 'fgft6ftih4tleq7m4sk224ve68'),
(20, 'Fruit Juice - Melon', '510', 'http://localhost/The%20Gallery%20Cafe/Resources/menu/Drinks/Fruit%20Juice%20melon.jpeg', 1, 'fgft6ftih4tleq7m4sk224ve68'),
(19, 'Passon Mojito', '650', 'http://localhost/The%20Gallery%20Cafe/Resources/menu/Drinks/passon%20mojito.jpeg', 1, 'fgft6ftih4tleq7m4sk224ve68'),
(16, 'Water Bottle Medium 1L', '400', 'http://localhost/The%20Gallery%20Cafe/Resources/menu/Drinks/waterbottel%20medium.jpeg', 1, 'fgft6ftih4tleq7m4sk224ve68'),
(17, 'Chocolate Milkshake', '900', 'http://localhost/The%20Gallery%20Cafe/Resources/menu/Drinks/chocolate%20Milkshake.jpeg', 2, 'fgft6ftih4tleq7m4sk224ve68'),
(18, 'Water Bottle Small 500ml', '300', 'http://localhost/The%20Gallery%20Cafe/Resources/menu/Drinks/waterbottel%20small.jpeg', 1, 'fgft6ftih4tleq7m4sk224ve68'),
(23, 'Aquanga Mangot', '740', 'http://localhost/The%20Gallery%20Cafe/Resources/menu/Drinks/Aquanga%20Mangot%20mocktai.jpeg', 1, 'c24hlhpe04lnv39ctgeg04tbce'),
(24, '7 Up', '200', 'http://localhost/The%20Gallery%20Cafe/Resources/menu/Drinks/7up.jpeg', 1, 'c24hlhpe04lnv39ctgeg04tbce'),
(25, 'Prawn Biryani', '3400', 'http://localhost/The%20Gallery%20Cafe/Resources/menu/Foods/Prawn%20biriyani.jpg', 1, 'c24hlhpe04lnv39ctgeg04tbce'),
(26, 'The Galery Special Chicken Kottu', '4600', 'http://localhost/The%20Gallery%20Cafe/Resources/menu/Sri%20lankan%20Food/The%20Galery%20Special%20Chicken%20Kottu%201.jpg', 1, 'c24hlhpe04lnv39ctgeg04tbce'),
(27, 'Kulfi', '500', 'http://localhost/The%20Gallery%20Cafe/Resources/menu/Desert/Kulfi.jpeg', 1, 'c24hlhpe04lnv39ctgeg04tbce'),
(28, 'Strawberry Mojito', '710', 'http://localhost/The%20Gallery%20Cafe/Resources/menu/Drinks/strawberry%20mojito.jpeg', 2, '9j1njg0hml9hhnea4el457j5n2'),
(29, 'Mountan Dew', '200', 'http://localhost/The%20Gallery%20Cafe/Resources/menu/Drinks/mountan%20dew.jpeg', 2, '9j1njg0hml9hhnea4el457j5n2'),
(30, 'Kalimiri Kebab', '3200', 'http://localhost/The%20Gallery%20Cafe/Resources/menu/Foods/kalimiri%20kebab.jpeg', 2, '9j1njg0hml9hhnea4el457j5n2'),
(31, 'Chocolate Milkshake', '900', 'http://localhost/The%20Gallery%20Cafe/Resources/menu/Drinks/chocolate%20Milkshake.jpeg', 2, 'd4aj8aaq9fdu3jno30ep1s6rr0'),
(32, 'Aquanga Mangot', '740', 'http://localhost/The%20Gallery%20Cafe/Resources/menu/Drinks/Aquanga%20Mangot%20mocktai.jpeg', 2, 'd4aj8aaq9fdu3jno30ep1s6rr0'),
(33, 'Passon Mojito', '650', 'http://localhost/The%20Gallery%20Cafe/Resources/menu/Drinks/passon%20mojito.jpeg', 2, 'd4aj8aaq9fdu3jno30ep1s6rr0'),
(34, 'Watalappam', '400', 'http://localhost/The%20Gallery%20Cafe/Resources/menu/Desert/Watalappam.jpg', 1, 'd4aj8aaq9fdu3jno30ep1s6rr0'),
(35, 'Kulfi', '500', 'http://localhost/The%20Gallery%20Cafe/Resources/menu/Desert/Kulfi.jpeg', 1, 'd4aj8aaq9fdu3jno30ep1s6rr0'),
(36, 'Gulab Jamun', '410', 'http://localhost/The%20Gallery%20Cafe/Resources/menu/Desert/Gulab%20Jamun.jpeg', 1, 'd4aj8aaq9fdu3jno30ep1s6rr0'),
(37, 'Braised pork in brown sauce', '4000', 'http://localhost/The%20Gallery%20Cafe/Resources/menu/Chinese%20food/Braised_pork_in_brown_sauce.jpg', 1, 'd4aj8aaq9fdu3jno30ep1s6rr0'),
(38, 'Twice cooked pork', '4500', 'http://localhost/The%20Gallery%20Cafe/Resources/menu/Chinese%20food/Twice%20cooked%20pork.jpg', 1, 'd4aj8aaq9fdu3jno30ep1s6rr0'),
(39, 'Mango chilli chicken', '5100', 'http://localhost/The%20Gallery%20Cafe/Resources/menu/Chinese%20food/chiccken%20mango%20chilli%20chicken.jpg', 1, 'd4aj8aaq9fdu3jno30ep1s6rr0'),
(40, 'Charsiu', '4800', 'http://localhost/The%20Gallery%20Cafe/Resources/menu/Chinese%20food/Charsiu.jpg', 1, 'd4aj8aaq9fdu3jno30ep1s6rr0');

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

DROP TABLE IF EXISTS `checkout`;
CREATE TABLE IF NOT EXISTS `checkout` (
  `First_Name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Last_Name` varchar(25) NOT NULL,
  `User_name` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Email` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Phone_number` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `City` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Address` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `NameOnCard` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `CardNumber` varchar(16) NOT NULL,
  `Expiration` varchar(20) NOT NULL,
  `cvv` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`First_Name`, `Last_Name`, `User_name`, `Email`, `Phone_number`, `City`, `Address`, `NameOnCard`, `CardNumber`, `Expiration`, `cvv`) VALUES
('thinal', 'silva', 'thinal', 'thinalsilva314@gmail.com', '0767136964', 'Panadura', '178 1/2 wekade horana rd panadura', 'visa', '1234123412341234', '121209', 111),
('thinal', 'silva', 'thinal', 'thinalsilva314@gmail.com', '0767136964', 'Panadura', '178 1/2 wekade horana rd panadura', 'visa', '1234123412341234', '121209', 111),
('thinal', 'silva', 'thinal', 'thinalsilva314@gmail.com', '0767136964', 'Panadura', '178 1/2 wekade horana rd panadura', 'visa', '1234123412341234', '121209', 111),
('thinal', 'silva', 'thinal', 'thinalsilva314@gmail.com', '0767136964', 'Panadura', '178 1/2 wekade horana rd panadura', 'visa', '1234123412341234', '121209', 111),
('thinal', 'silva', 'txfghcvjb,n.m/', 'thinalsilva314@gmail.com', '0767136964', 'Panadura', '178 1/2 wekade horana rd panadura', 'visa', '234567890', '2345678', 345678),
('thinal', 'silva', 'sumu', 'thinalsilva314@gmail.com', '0767136964', 'Panadura', '178 1/2 wekade horana rd panadura', 'visa', '000', '0000', 0),
('thinal', 'silva', 'sumu', 'thinalsilva314@gmail.com', '0767136964', 'Panadura', '178 1/2 wekade horana rd panadura', 'visa', '000', '0000', 0),
('thinal', 'silva', 'sumu', 'thinalsilva314@gmail.com', '0767136964', 'Panadura', '178 1/2 wekade horana rd panadura', 'visa', '000', '0000', 0),
('thinal', 'silva', 'sumu', 'thinalsilva314@gmail.com', '0767136964', 'Panadura', '178 1/2 wekade horana rd panadura', 'visa', '000', '0000', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--
-- Error reading structure for table the_gallery_cafe.reservation: #145 - Table '.\the_gallery_cafe\reservation' is marked as crashed and should be repaired
-- Error reading data for table the_gallery_cafe.reservation: #145 - Table '.\the_gallery_cafe\reservation' is marked as crashed and should be repaired

-- --------------------------------------------------------

--
-- Table structure for table `signin`
--

DROP TABLE IF EXISTS `signin`;
CREATE TABLE IF NOT EXISTS `signin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usermessage`
--

DROP TABLE IF EXISTS `usermessage`;
CREATE TABLE IF NOT EXISTS `usermessage` (
  `Name` text NOT NULL,
  `Email` varchar(25) NOT NULL,
  `Phone_Number` int NOT NULL,
  `Subject` varchar(50) NOT NULL,
  `Message` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `usermessage`
--

INSERT INTO `usermessage` (`Name`, `Email`, `Phone_Number`, `Subject`, `Message`) VALUES
('thinal silva', 'thinal4@gmail.com', 767136964, 'Action Taken', 'fdghhkhgdfsdhgkl'),
('thinal silva', 'thinal4@gmail.com', 767136964, 'Action Taken', 'change my email address thinalsilva123@gmail,com ');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `phone` varchar(15) NOT NULL,
  `email` varchar(20) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(12) NOT NULL,
  `role` enum('admin','customer','staff','') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `phone`, `email`, `username`, `password`, `role`) VALUES
(28, '0765656964', 'tal4@gmail.com', 'sumu', '1234', 'customer'),
(29, '0767136964', 'thinalsilva314@gmail', 'sumu', '1234', 'customer'),
(23, '0767136964', 'thinalsilva314@gmail', 'laki', '1234', 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
