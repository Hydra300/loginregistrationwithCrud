-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2024 at 04:47 AM
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
-- Database: `activitylogreg`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `author` varchar(128) NOT NULL,
  `type` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `title`, `author`, `type`, `description`) VALUES
(2, 'How to be an Emperor', 'Prinz Ralph Raimund Garcia', 'Adventure', 'The forbidden book of conquering the world');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `password`) VALUES
(1, 'Prinzu', 'Garcia', 's2020608@usls.edu.ph', '$2y$10$CMGjBzAut6zuUi9eMARzte0xBQRQtWhyBgJMeiQLrahoB3USYUsHq'),
(4, 'Prinzu', 'Garcia', 's2020608@usls.edu.ph', '$2y$10$Ntm22KqWaI6s71Y86ZSucO.ekqyqTFopwe3MUsWH0.o2QGo9NPc8W'),
(5, 'Prinzu', 'Garcia', 's2020608@usls.edu.ph', '$2y$10$wPHfHwkoM8ThdaiBfqHH.uGrXHQ5sax7gfKXpeuYNMpK1lxXUkjP.'),
(6, 'Ralph Raimund', 'Garcia', 'ralphgarcia360@gmail.com', '$2y$10$e6o.UcZoC.8tOVDE4mh8Xuna7jIg9URHhi93kY4f3weVZ347lR8zK'),
(8, 'Prinzu', 'Garcia', 'ralphgarcia730@gmail.com', '$2y$10$U/yEmnfNJw9xaUcoZ08eSe8keRd7D0n5Rco0oR0KS03.6L2irqWjy'),
(9, 'Juan', 'Dela Cruz', 'juan@gmail.com', '$2y$10$mwy4poouCIApfvVzoOdCmu/mdJ.yZNVkavvlEgYJ88f0JL4wW.Lsy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
