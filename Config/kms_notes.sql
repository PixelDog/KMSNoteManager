-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 30, 2021 at 03:35 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kms_notes2`
--

CREATE DATABASE kms_notes2;

use kms_notes2;

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `note` varchar(1000) NOT NULL,
  `create_time` date NOT NULL DEFAULT current_timestamp(),
  `last_update_time` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `user_id`, `title`, `note`, `create_time`, `last_update_time`) VALUES
(1, 1, 'Note 1', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer venenatis risus vitae urna accumsan aliquet. Nunc non nisl faucibus, efficitur erat in, accumsan tellus. Donec fringilla nibh in justo viverra posuere. Etiam eget molestie libero, pulvinar rhoncus urna. In venenatis nec dolor non vestibulum. Nunc sed molestie urna. Integer ut velit aliquet, pulvinar leo quis, eleifend odio. Pellentesque varius augue in eros finibus, vitae tempus felis laoreet. Vivamus tempor nisi enim, vel rhoncus diam finibus quis. Proin id lectus ut justo vulputate mattis.', '2021-12-29', '2021-12-29'),
(2, 1, 'Note 2', 'Nulla blandit quam eget consequat porttitor. Cras in neque consequat, placerat odio porta, iaculis tellus. Vestibulum condimentum feugiat sem nec consectetur. Nam suscipit lobortis arcu, at fringilla est dapibus vitae. Cras convallis, nisl viverra maximus ultrices, libero turpis gravida dui, vel pretium risus massa et nunc. Sed ante urna, dictum at efficitur sed, egestas in neque. Maecenas semper volutpat odio, vel aliquet dui viverra et. Pellentesque quis mi aliquet, pharetra dolor sit amet, pharetra tortor. Vestibulum iaculis nunc a erat euismod, ut vestibulum magna ultrices. Proin efficitur dignissim sapien quis tempor. Vivamus ac leo sit amet massa finibus consequat in et est. Pellentesque nec velit nibh.', '2021-12-29', '2021-12-29'),
(3, 1, 'Note 3', 'this is the text of the note', '2021-12-29', '2021-12-29'),
(4, 1, 'Note 4', ' Cras convallis, nisl viverra maximus ultrices, libero turpis gravida dui, vel pretium risus massa et nunc. Sed ante urna, dictum at efficitur sed, egestas in neque. Maecenas semper volutpat odio, vel aliquet dui viverra et. Pellentesque quis mi aliquet, pharetra dolor sit amet, pharetra tortor.', '2021-12-29', '2021-12-29'),
(5, 1, 'Note 5', ' Pellentesque quis mi aliquet, pharetra dolor sit amet, pharetra tortor.', '2021-12-29', '2021-12-29'),
(6, 1, 'Note 6', 'Donec fringilla nibh in justo viverra posuere. Etiam eget molestie libero, pulvinar rhoncus urna. In venenatis nec dolor non vestibulum. Nunc sed molestie urna. Integer ut velit aliquet, pulvinar leo quis, eleifend odio. Pellentesque varius augue in eros finibus, vitae tempus felis laoreet. ', '2021-12-29', '2021-12-29'),
(7, 1, 'Note 7', 'Etiam eget molestie libero, pulvinar rhoncus urna. In venenatis nec dolor non vestibulum. Nunc sed molestie urna. Integer ut velit aliquet, pulvinar leo quis, eleifend odio.', '2021-12-29', '2021-12-29'),
(8, 1, 'Note 8', 'Etiam eget molestie libero, pulvinar rhoncus urna. In venenatis nec dolor non vestibulum. Nunc sed molestie urna.', '2021-12-29', '2021-12-29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `create_time` date NOT NULL DEFAULT current_timestamp(),
  `last_update_time` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `create_time`, `last_update_time`) VALUES
(1, 'joe_cool@cool.com', 'SoCool', '2021-12-28', '2021-12-28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `USER_ID` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `EMAIL` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
