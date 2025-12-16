-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2025 at 01:54 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`id`, `name`, `price`, `description`, `image`) VALUES
(1, 'Tomato Curry Rice', 139.00, 'A hearty curry simmered with fresh tomatoes and a touch of island spice.', 'Tomato_Curry.jpg'),
(2, 'Sea-Bass Pie', 199.00, 'Flaky crust stuffed with tender sea bass and creamy filling — a seaside comfort favorite.', 'sea-bass-pie.jpg'),
(3, 'Minestrone Soup', 119.00, 'A colorful vegetable soup bursting with warmth, perfect for a cozy evening.', 'minestrone soup.jpg'),
(6, 'Aji Fry teishoku', 199.00, 'Golden-fried horse mackerel paired with fluffy rice, miso soup, and crisp seasonal greens.', 'aji fry.jpg'),
(12, 'French Fries', 89.00, 'Crispy, golden fries with just the right amount of salt — everyone\'s favorite bite.', 'french-fries.jpg'),
(15, 'Creamy Chicken with Mashed Potatoes', 159.00, 'Juicy pan-seared chicken served with creamy mashed potatoes and seasonal vegetables.', 'creamy chicken.jpg'),
(16, 'Chicken Samosa', 129.00, 'Golden-fried samosas stuffed with savory chicken filling.', 'samosa.jpg'),
(17, 'Cheesy Mozzarella Sticks', 89.00, 'Crispy on the outside, melty mozzarella on the inside.', 'mozarella stick.jpg'),
(18, 'Berry French Toast', 89.00, 'Golden French toast topped with fresh berries and whipped cream.', 'french toast.jpg'),
(19, 'Strawberry Roll Cake', 99.00, 'Soft sponge cake rolled with fresh strawberries and light cream.', 'japanese roll cake.jpg'),
(20, 'Miso Soup', 49.00, 'Light miso broth with tofu, seaweed, and green onions.', 'miso soup.jpg'),
(21, 'Creamy Corn Chowder', 59.00, 'Rich and comforting corn chowder with a smooth, creamy base.', 'corn chowder.jpg'),
(22, 'Berry Smoothie', 79.00, 'Blended strawberries and blueberries with a smooth, creamy texture.', 'berry smoothie.jpg'),
(23, 'Chocolate Waffle', 89.00, 'Crispy waffle topped with whipped cream, strawberries, and chocolate sauce.', 'chocolate waffle.jpg'),
(24, 'Crispy Chicken Tenders', 99.00, 'Crispy breaded chicken tenders served with creamy dipping sauce.', 'chicken tender.jpg'),
(25, 'Mango Smoothie', 79.00, 'Rich, velvety mango blended to perfection — a sweet tropical escape in every sip.', 'mango-smoothie.jpg'),
(26, 'Banana Smoothie', 79.00, 'Thick, creamy, and naturally sweet — an all-time classic.', 'banana-smoothie.jpg'),
(27, 'Strawberry Smoothie', 79.00, 'A refreshing blend of ripe strawberries and creamy milk.', 'strawberry-smoothie.jpg'),
(28, 'Carrot Potage', 49.00, 'Smooth, sweet carrot soup that feels like a warm hug on a cool day.', 'carrot-pottage.jpg'),
(29, 'Mushroom Soup', 49.00, 'Earthy, creamy, and aromatic — a bowl of pure woodland comfort.', 'mushroom-soup.jpg'),
(30, 'Fruit Tart', 99.00, 'A colorful medley of fruits over smooth custard — as cheerful as it is delicious.', 'fruit-tart.jpg'),
(31, 'Apple Pie', 139.00, 'Buttery crust filled with caramelized apples — a timeless homemade dessert.', 'apple-pie.jpg'),
(32, 'Carrot Cake', 149.00, 'Sweet and moist cake with grated carrots and a touch of cinnamon.', 'carrot-cake.jpg'),
(33, 'Potato Croquettes', 99.00, 'Crunchy on the outside, fluffy inside — a classic comfort snack.', 'potato croquettes.jpg'),
(34, 'Sandwich', 129.00, 'Freshly made with soft bread, crisp veggies, and a generous layer of filling.', 'sandwich.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
