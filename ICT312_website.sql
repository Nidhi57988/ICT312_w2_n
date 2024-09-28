-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Sep 22, 2024 at 09:32 AM
-- Server version: 8.0.35
-- PHP Version: 8.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ICT312_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`) VALUES
(2, 'prapti', 'paneru', 'prapti.paneru@gmail.com', '$2y$10$D0lc2QpTpwlgkxI8L.GNPelgcGzIEB43PRCLyTC4pwcAoViyLhMSC'),
(3, 'John', 'James', 'john.james@gmail.com', '$2y$10$NgX06ktEp6BikTlqzgf0m.ivu/1q7jJYpZiMgclyt.Rj48RqGazKK'),
(4, 'ron', 'mon', 'ron.mon@gmail.com', '$2y$10$WADWLLuzbRjae1kEoX/ZkOjZPZgyApZPHrMhfTOnI/wQzbbZ3WAU.');

-- --------------------------------------------------------

--
-- Table structure for table `user_feedback`
--

CREATE TABLE `user_feedback` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_feedback`
--

INSERT INTO `user_feedback` (`id`, `name`, `email`, `phone`, `message`) VALUES
(1, 'fsefsefsef', 'esfsef@gmail.com', '3424243243242', 'egsegsefgsecsdgsrghdsrbdsbeszgse'),
(2, 'prapti', 'panerup544@gmail.com', '0475938333', 'sesefhauwf awuifhawiufhawiufhawufahwiufhawoufh awf'),
(3, 'stggseg', '1234@gmail.com', '0475938333', 'this is a great website!');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_feedback`
--
ALTER TABLE `user_feedback`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_feedback`
--
ALTER TABLE `user_feedback`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    price DECIMAL(10, 2),
    code VARCHAR(255),
    description TEXT,
    rating FLOAT,
    rating_count INT,
    image_main VARCHAR(255),
    image_1 VARCHAR(255),
    image_2 VARCHAR(255),
    image_3 VARCHAR(255),
    image_4 VARCHAR(255),
    color VARCHAR(50)
);


INSERT INTO products (
    name, price, code, description, rating, rating_count, image_main, image_1, image_2, image_3, image_4, color) 
    VALUES 
    (1, 'Samsung Galaxy S24 Ultra', 1299.00, 'ET-SVL70MOEGWW', 'The Galaxy S24 Ultra features a 6.8-inch QHD+ disp...',
    5, 1, 'images/products/2-1.png', 'images/products/2-1.png', 'images/products/2-2.png', 'images/products/2-3.png', 'images/products/2-4.png', 'Orange'),
    
    (2, 'Samsung Galaxy S24', 799.00, 'AB-SVL70MOEGWW', 'Featuring a 6.2 FHD+ display, the Galaxy S24 is po...', 
4.5, 2, 'images/products/1-1.png', 'images/products/1-1.png', 'images/products/1-2.png', 'images/products/1-3.png', 'images/products/1-4.png', 'Yellow'),

(3, 'iPhone 16 Pro', 1199.00, 'AB-SVL70MOEGWW', 'Built with a Grade 5 titanium frame and powered by...', 
5, 3, 'images/products/3-1.png', 'images/products/3-1.png', 'images/products/3-2.png', 'images/products/3-3.png', 'images/products/3-4.png', 'Yellow'),

(4, 'iPhone 16', 799.00, 'AB-SVL70MOEGWW', 'Equipped with a 6.1" display and the A18 chip, it ...', 
5, 4, 'images/products/4-1.png', 'images/products/4-1.png', 'images/products/4-2.png', 'images/products/4-3.png', 'images/products/4-4.png', 'Yellow'),

(5, 'Google Pixel 9', 799.00, 'AB-SVL70MOEGWW', 'The Google Pixel 9 comes with a 6.3" OLED display ...', 
4.5, 5, 'images/products/6-1.png', 'images/products/6-1.png', 'images/products/6-2.png', 'images/products/6-3.png', 'images/products/6-4.png', 'Yellow'),

(6, 'Samsung Galaxy Z Flip6', 1099.00, 'AB-SVL70MOEGWW', 'The Galaxy Z Flip6 features a 6.7-inch Full HD+ ad..', 
5, 6, 'images/products/7-1.png', 'images/products/7-1.png', 'images/products/7-2.png', 'images/products/7-3.png', 'images/products/7-4.png', 'Yellow'),

(7, 'Motorola Moto G85', 300.00, 'AB-SVL70MOEGWW', 'The Moto G85 5G is a mid-range phone featuring a 6...', 
4, 7, 'images/products/8-1.png', 'images/products/8-1.png', 'images/products/8-2.png', 'images/products/8-3.png', 'images/products/8-4.png', 'Yellow');