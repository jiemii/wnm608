-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 27, 2023 at 09:47 PM
-- Server version: 5.7.41-cll-lve
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jie_mi`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(10) DEFAULT NULL,
  `category` varchar(32) NOT NULL,
  `date_create` datetime NOT NULL,
  `date_modify` datetime NOT NULL,
  `description` text NOT NULL,
  `thumbnail` varchar(128) NOT NULL,
  `images` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `quantity`, `category`, `date_create`, `date_modify`, `description`, `thumbnail`, `images`) VALUES
(1, 'Large Qalam', '9.99', 10, 'pen', '2023-05-26 20:36:24', '2023-05-26 20:36:24', 'A qalam is a type of pen used in various cultures, primarily those with a tradition of Arabic and Persian calligraphy. ', 'pen_Large_Qalam.png', 'pen_Large_Qalam.png'),
(2, 'Small Qalam', '9.99', 10, 'pen', '2023-05-26 20:37:18', '2023-05-26 20:37:18', 'A qalam is a type of pen used in various cultures, primarily those with a tradition of Arabic and Persian calligraphy. ', 'pen_Small_Qalam.png', 'pen_Small_Qalam.png'),
(3, 'Jawa Qalam', '9.99', 10, 'pen', '2023-05-26 20:38:08', '2023-05-26 20:38:08', 'A qalam is a type of pen used in various cultures, primarily those with a tradition of Arabic and Persian calligraphy. ', 'pen_Jawa_Qalam.png', 'pen_Jawa_Qalam.png'),
(4, 'Long Qalam', '9.99', 10, 'pen', '2023-05-26 20:38:44', '2023-05-26 20:38:44', 'A qalam is a type of pen used in various cultures, primarily those with a tradition of Arabic and Persian calligraphy. ', 'pen_Long_Qalam.png', 'pen_Long_Qalam.png'),
(5, 'Matt', '19.99', 10, 'tool', '2023-05-26 20:39:48', '2023-05-26 20:39:48', 'A leather mat is a protective covering or pad made from leather, a durable and flexible material made from the tanned hide of animals. ', 'tool_matt.png', 'tool_matt.png'),
(6, 'Container', '14.99', 10, 'tool', '2023-05-26 20:41:09', '2023-05-26 20:41:09', 'The design of an inkwell usually includes a small, narrow opening to prevent the ink from drying out or spilling.', 'tool_container.png', 'tool_container.png'),
(7, 'Cut Holder', '14.99', 10, 'tool', '2023-05-26 20:42:53', '2023-05-26 20:42:53', 'The Cut Holder may refer to a tool used to hold or store various objects for cutting purposes.', 'tool_cut_holder.png', 'tool_cut_holder.png'),
(8, 'Ink', '19.99', 10, 'tool', '2023-05-26 20:43:47', '2023-05-26 20:43:47', 'Ink is a liquid or paste that contains pigments or dyes and is used to color a surface to produce an image, text, or design.', 'tool_ink.png', 'tool_ink.png'),
(9, 'Advanced Copybook', '24.99', 10, 'tool', '2023-05-26 20:44:38', '2023-05-26 20:44:38', 'A copybook for Arabic calligraphy is a book used for practice and learning Arabic calligraphy. It\'s typically structured with guidelines and examples of Arabic letters and words in a particular calligraphy style.', 'tool_advanced_copybook.png', 'tool_advanced_copybook.png'),
(10, 'Beginner Copybook', '24.99', 10, 'tool', '2023-05-26 20:45:42', '2023-05-26 20:45:42', 'A copybook for Arabic calligraphy is a book used for practice and learning Arabic calligraphy. It\'s typically structured with guidelines and examples of Arabic letters and words in a particular calligraphy style.', 'tool_beginner_copybook.png', 'tool_beginner_copybook.png'),
(11, 'Beginner Sets', '49.99', 10, 'sets', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'A beginner\'s set for Arabic calligraphy, or any type of calligraphy includes all the essential tools and materials you need to get started.\r\n', 'sets_beginner.png', 'sets_beginner.png'),
(12, 'Advanced Sets', '69.99', 10, 'sets', '2023-05-26 20:48:18', '2023-05-26 20:48:18', 'An advanced\'s set for Arabic calligraphy includes all the essential tools and materials you need to get started.', 'sets_advanced.png', 'sets_advanced.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
