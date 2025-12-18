-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2025 at 04:52 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crossing_eats_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(2, 'admin', '1010');

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `category` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`id`, `name`, `price`, `description`, `image`, `category`) VALUES
(1, 'Tomato Curry Rice', 139.00, 'A hearty curry simmered with fresh tomatoes and a touch of island spice.', 'Tomato_Curry.jpg', 'main'),
(2, 'Sea-Bass Pie', 199.00, 'Flaky crust stuffed with tender sea bass and creamy filling — a seaside comfort favorite.', 'sea-bass-pie.jpg', 'main'),
(3, 'Minestrone Soup', 119.00, 'A colorful vegetable soup bursting with warmth, perfect for a cozy evening.', 'minestrone soup.jpg', 'soup'),
(6, 'Aji Fry teishoku', 199.00, 'Golden-fried horse mackerel paired with fluffy rice, miso soup, and crisp seasonal greens.', 'aji fry.jpg', 'main'),
(12, 'French Fries', 89.00, 'Crispy, golden fries with just the right amount of salt — everyone\'s favorite bite.', 'french-fries.jpg', 'snack'),
(15, ' Chicken & Mash', 159.00, 'Juicy pan-seared chicken served with creamy mashed potatoes and seasonal vegetables.', 'creamy chicken.jpg', 'main'),
(16, 'Chicken Samosa', 129.00, 'Golden-fried samosas stuffed with savory chicken filling.', 'samosa.jpg', 'snack'),
(17, 'Mozzarella Sticks', 89.00, 'Crispy on the outside, melty mozzarella on the inside.', 'mozarella stick.jpg', 'snack'),
(18, 'Berry French Toast', 89.00, 'Golden French toast topped with fresh berries and whipped cream.', 'french toast.jpg', 'dessert'),
(19, 'Strawberry Roll Cake', 99.00, 'Soft sponge cake rolled with fresh strawberries and light cream.', 'japanese roll cake.jpg', 'dessert'),
(20, 'Miso Soup', 49.00, 'Light miso broth with tofu, seaweed, and green onions.', 'miso soup.jpg', 'soup'),
(21, 'Corn Chowder', 59.00, 'Rich and comforting corn chowder with a smooth, creamy base.', 'corn chowder.jpg', 'soup'),
(22, 'Berry Smoothie', 79.00, 'Blended strawberries and blueberries with a smooth, creamy texture.', 'berry smoothie.jpg', 'beverage'),
(23, 'Chocolate Waffle', 89.00, 'Crispy waffle topped with whipped cream, strawberries, and chocolate sauce.', 'chocolate waffle.jpg', 'dessert'),
(24, 'Chicken Tenders', 99.00, 'Crispy breaded chicken tenders served with creamy dipping sauce.', 'chicken tender.jpg', 'snack'),
(25, 'Mango Smoothie', 79.00, 'Rich, velvety mango blended to perfection — a sweet tropical escape in every sip.', 'mango-smoothie.jpg', 'beverage'),
(26, 'Banana Smoothie', 79.00, 'Thick, creamy, and naturally sweet — an all-time classic.', 'banana-smoothie.jpg', 'beverage'),
(27, 'Strawberry Smoothie', 79.00, 'A refreshing blend of ripe strawberries and creamy milk.', 'strawberry-smoothie.jpg', 'beverage'),
(28, 'Carrot Potage', 49.00, 'Smooth, sweet carrot soup that feels like a warm hug on a cool day.', 'carrot-pottage.jpg', 'soup'),
(29, 'Mushroom Soup', 49.00, 'Earthy, creamy, and aromatic — a bowl of pure woodland comfort.', 'mushroom-soup.jpg', 'soup'),
(30, 'Fruit Tart', 99.00, 'A colorful medley of fruits over smooth custard — as cheerful as it is delicious.', 'fruit-tart.jpg', 'dessert'),
(31, 'Apple Pie', 139.00, 'Buttery crust filled with caramelized apples — a timeless homemade dessert.', 'apple-pie.jpg', 'dessert'),
(32, 'Carrot Cake', 149.00, 'Sweet and moist cake with grated carrots and a touch of cinnamon.', 'carrot-cake.jpg', 'dessert'),
(33, 'Potato Croquettes', 99.00, 'Crunchy on the outside, fluffy inside — a classic comfort snack.', 'potato croquettes.jpg', 'snack'),
(34, 'Sandwich', 129.00, 'Freshly made with soft bread, crisp veggies, and a generous layer of filling.', 'sandwich.jpg', 'snack'),
(35, 'Chocolate Milkshake', 69.00, 'Creamy chocolate milkshake topped with whipped cream and chocolate drizzle.', 'chocolate milkshake.jpg', 'beverage'),
(36, 'Vanilla Milkshake', 69.00, 'Smooth vanilla milkshake finished with whipped cream and a light sprinkle.', 'vanilla milkshake.jpg', 'beverage'),
(37, 'Pumpkin Soup', 59.00, 'Warm pumpkin soup topped with cream, herbs, and crunchy seeds.', 'pumpkin-soup.jpg', 'soup'),
(38, 'Salmon Bowl', 159.00, 'Seared salmon with sesame on creamy mash, served with fresh broccoli.', 'salmon rice bowl.jpg', 'main'),
(39, 'Teriyaki Rice', 169.00, 'Juicy teriyaki chicken served with fluffy rice and soft scrambled egg', 'chicken_teriyaki.jpg', 'main');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
