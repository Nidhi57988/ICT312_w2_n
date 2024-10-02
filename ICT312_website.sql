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
    category TEXT,
    description TEXT,
    rating FLOAT,
    rating_count INT,
    image_main VARCHAR(255),
    image_1 VARCHAR(255),
    image_2 VARCHAR(255),
    image_3 VARCHAR(255),
    image_4 VARCHAR(255),
    color_1 VARCHAR(50),
    color_2 VARCHAR(50),
    color_3 VARCHAR(50),
    color_4 VARCHAR(50),
    quantity VARCHAR(50)
);


INSERT INTO products (
    id, name, price, category, description, rating, rating_count, image_main, image_1, image_2, image_3, image_4, color_1, color_2, color_3, color_4, quantity) 
    VALUES 

    /*Smart Phones*/

    (1, 'Samsung Galaxy S24 Ultra', 1299.00, 'Smart Phones', 'The Galaxy S24 Ultra features a 6.8-inch QHD+ disp...',
    5, 1, 'images/products/2-1.png', 'images/products/2-1.png', 'images/products/2-2.png', 'images/products/2-3.png', 'images/products/2-4.png', 'Titanium Grey', 'Titanium Black', 'Titanium Violet', 'Titanium Yellow', 100),
    
    (2, 'Samsung Galaxy S24', 799.00, 'Smart Phones', 'Featuring a 6.2 FHD+ display, the Galaxy S24 is po...', 
    4.5, 2, 'images/products/1-1.png', 'images/products/1-1.png', 'images/products/1-2.png', 'images/products/1-3.png', 'images/products/1-4.png', 'Amber Yellow','Cobalt Violet', 'Marble Grey', 'Onyx Black', 120),

    (3, 'iPhone 16 Pro', 1199.00, 'Smart Phones', 'Built with a Grade 5 titanium frame and powered by...', 
    5, 3, 'images/products/3-1.png', 'images/products/3-1.png', 'images/products/3-2.png', 'images/products/3-3.png', 'images/products/3-4.png', 'Black Titanium', 'Desert Titanium', 'Natural Titanium', 'White Titanium', 110),

    (4, 'iPhone 16', 799.00, 'Smart Phones', 'Equipped with a 6.1" display and the A18 chip, it ...', 
    5, 4, 'images/products/4-1.png', 'images/products/4-1.png', 'images/products/4-2.png', 'images/products/4-3.png', 'images/products/4-4.png', 'Ultramarine', 'Teal', 'Pink', 'Black', 110),

    (5, 'Google Pixel 9', 799.00, 'Smart Phones', 'The Google Pixel 9 comes with a 6.3" OLED display ...', 
    4.5, 5, 'images/products/6-1.png', 'images/products/6-1.png', 'images/products/6-2.png', 'images/products/6-3.png', 'images/products/6-4.png', 'Peony', 'Porcelain', 'Winter Green', 'Obsidian', 80),

    (6, 'Samsung Galaxy Z Flip6', 1099.00, 'Smart Phones', 'The Galaxy Z Flip6 features a 6.7-inch Full HD+ ad..', 
    5, 6, 'images/products/7-1.png', 'images/products/7-1.png', 'images/products/7-2.png', 'images/products/7-3.png', 'images/products/7-4.png', 'Blue', 'Mint', 'Silver', 'Yellow', 90),

    (7, 'Motorola Moto G85', 300.00, 'Smart Phones', 'The Moto G85 5G is a mid-range phone featuring a 6...', 
    4, 7, 'images/products/8-1.png', 'images/products/8-1.png', 'images/products/8-2.png', 'images/products/8-3.png', 'images/products/8-4.png', 'Cobalt Blue', 'Olive Green','Urban Grey', '', 60),

    /*Smart Watches*/

    (8, 'Apple Watch Series 7', 390.00, 'Smart Watches', 'Apple Watch Series 7, offering advanced health monitoring features. Includes a new, larger display and faster charging for improved user experience.', 
    4, 7, 'images/products/25-1.png', 'images/products/25-1.png', 'images/products/25-2.png', 'images/products/25-3.png', 'images/products/25-4.png', 'Silver', 'Black','Starlight', 'Midnight', 100),

    (9, 'Samsung Galaxy Watch Active 2', 299.00, 'Smart Watches', 'Samsung Galaxy Watch Active 2, featuring a sleek design and customizable face. Tracks workouts, heart rate, and sleep patterns with precision.', 
    4, 7, 'images/products/26-1.png', 'images/products/26-1.png', 'images/products/26-2.png', 'images/products/26-3.png', 'images/products/26-4.png', 'Rose Gold', 'Aqua Black','Silver', 'Pink Gold', 100),

    (10, 'Motorola Moto 360', 270.00, 'Smart Watches', 'Motorola Moto 360 with a modern design and always-on display. Includes fitness tracking, heart rate monitoring, and built-in GPS.', 
    4, 7, 'images/products/27-1.png', 'images/products/27-1.png', 'images/products/27-2.png', 'images/products/27-3.png', 'images/products/27-4.png', 'Black', '','', '', 100),

    (11, 'Fitbit Versa 3', 199.00, 'Smart Watches', 'Fitbit Versa 3 with built-in GPS and heart rate monitoring for fitness enthusiasts. Features over 6 days of battery life and voice assistant compatibility.', 
    4, 7, 'images/products/28-1.png', 'images/products/28-1.png', 'images/products/28-2.png', 'images/products/28-3.png', 'images/products/28-4.png', 'Black', 'Platinum','Pink', 'Soft Gold', 100),

    (12, 'Garmin Forerunner', 599.00, 'Smart Watches', 'Garmin Forerunner, designed for athletes with advanced performance metrics. Offers comprehensive GPS tracking and up to 2 weeks of battery life.', 
    4, 7, 'images/products/29-1.png', 'images/products/29-1.png', 'images/products/29-2.png', 'images/products/29-3.png', 'images/products/29-4.png', 'Black', 'Whitestone','', '', 100),

    (13, 'Fossil Gen 5', 295.00, 'Smart Watches', 'Fossil Gen 5 smartwatch with Google Wear OS and customizable watch faces. Features heart rate tracking and built-in speaker for calls and alerts.', 
    4, 7, 'images/products/30-1.png', 'images/products/30-1.png', 'images/products/30-2.png', 'images/products/30-3.png', 'images/products/30-4.png', 'Black', 'Grey','', '', 100),

    (14, 'Skagen Falster 3', 129.00, 'Smart Watches', 'Skagen Falster 3, combining minimalist Danish design with smart features. Water-resistant and compatible with Google Pay for contactless payments.', 
    4, 7, 'images/products/31-1.png', 'images/products/31-1.png', 'images/products/31-2.png', 'images/products/31-3.png', 'images/products/31-4.png', 'Black', 'Grey','', '', 100),

    (15, 'Huawei Watch GT 2', 129.00, 'Smart Watches', 'Huawei Watch GT 2 with long battery life and accurate health tracking. Offers Bluetooth calling and music control for a seamless experience.', 
    4, 7, 'images/products/32-1.png', 'images/products/32-1.png', 'images/products/32-2.png', 'images/products/32-3.png', 'images/products/32-4.png', 'Black', 'Platinum','', '', 100),

    /*Laptops*/

    (16, 'Apple MacBook Air', 2999.00, 'Laptops', 'Latest Apple MacBook Air, featuring the powerful M1 chip for blazing fast performance. Lightweight and ultra-portable with up to 18 hours of battery life.', 
    4, 7, 'images/products/33-1.png', 'images/products/33-1.png', 'images/products/33-2.png', 'images/products/33-3.png', 'images/products/33-4.png', 'Midnight Black', 'Starlight','Space Grey', 'Silver', 100),

    (17, 'Dell XPS 13', 999.00, 'Laptops', 'Dell XPS 13 with an InfinityEdge display for virtually borderless viewing. Powered by the latest Intel processors for optimal productivity on the go.', 
    4, 7, 'images/products/34-1.png', 'images/products/34-1.png', 'images/products/34-2.png', 'images/products/34-3.png', 'images/products/34-4.png', 'Grey', 'Silver','', '', 100),

    (18, 'HP Envy 13', 1299.00, 'Laptops', 'HP Envy 13 with stunning design and powerful hardware for creators. Features a 4K display and enhanced security features like a fingerprint reader.', 
    4, 7, 'images/products/35-1.png', 'images/products/35-1.png', 'images/products/35-2.png', 'images/products/35-3.png', 'images/products/35-4.png', 'Blue', 'Silver', 'Black','', 100),

    (19, 'Lenovo ThinkPad', 639.00, 'Laptops', 'Lenovo ThinkPad, known for its durability and business-grade performance. Equipped with a long-lasting battery and robust security options.', 
    4, 7, 'images/products/36-1.png', 'images/products/36-1.png', 'images/products/36-2.png', 'images/products/36-3.png', 'images/products/36-4.png', 'Grey', 'Silver', 'Black', '', 100),

    (20, 'Asus ZenBook 13', 799.00, 'Laptops', 'Asus ZenBook 13 with ultra-slim design and OLED display for vibrant visuals. Includes a powerful Intel processor for multitasking and content creation.', 
    4, 7, 'images/products/37-1.png', 'images/products/37-1.png', 'images/products/37-2.png', 'images/products/37-3.png', 'images/products/37-4.png', 'Grey', 'Silver', 'Black', '', 100),

    (21, 'Acer Aspire 3', 650.00, 'Laptops', 'Acer Aspire 3, offering solid performance for everyday tasks and entertainment. Affordable yet dependable with a 15.6” screen and ample storage.', 
    4, 7, 'images/products/38-1.png', 'images/products/38-1.png', 'images/products/38-2.png', 'images/products/38-3.png', 'images/products/38-4.png', 'Charcoal Black', 'Pure Silver','Silver', '', 100),

    (22, 'MSI PS65', 650.00, 'Laptops', 'MSI PS65, built for creators with a sleek, lightweight chassis. Offers high-performance graphics and a 4K display for design and video editing.', 
    4, 7, 'images/products/39-1.png', 'images/products/39-1.png', 'images/products/39-2.png', 'images/products/39-3.png', 'images/products/39-4.png', 'Silver', 'Black','', '', 100),

    (23, 'Razer Blade 15', 700.00, 'Laptops', 'Razer Blade 15 with a powerful GPU for gaming and content creation. Includes a Full HD display and a customizable RGB keyboard.', 
    4, 7, 'images/products/40-1.png', 'images/products/40-1.png', 'images/products/40-2.png', 'images/products/40-3.png', 'images/products/40-4.png', 'BLue', 'Black','Grey', '', 100);


