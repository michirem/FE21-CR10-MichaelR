-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 23, 2021 at 11:45 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `CR10_MichaelR_BigLibrary`
--
CREATE DATABASE IF NOT EXISTS `CR10_MichaelR_BigLibrary` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `CR10_MichaelR_BigLibrary`;

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `author_id` int(11) NOT NULL,
  `f_name` varchar(25) NOT NULL,
  `l_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`author_id`, `f_name`, `l_name`) VALUES
(1, 'Lorrie', 'Bolus'),
(2, 'Esmeralda', 'Somner'),
(3, 'Dody', 'Hughlin'),
(4, 'Emalee', 'Standon'),
(5, 'Claresta', 'Galliard');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `author_id` int(11) NOT NULL,
  `ISBN` varchar(20) NOT NULL,
  `short_desc` varchar(255) NOT NULL,
  `publish_date` date NOT NULL,
  `publisher_id` int(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  `status` enum('available','reserved') NOT NULL,
  `title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `image`, `author_id`, `ISBN`, `short_desc`, `publish_date`, `publisher_id`, `type`, `status`, `title`) VALUES
(1, 'book1.png', 1, '886736480-4', 'Proin eu mi. Nulla ac enim. In tempor, turpis nec euismod scelerisque.', '2020-04-04', 5, 'Book', 'reserved', 'Adios Sabata'),
(2, 'cd1.png', 4, '119785178-X', 'Phasellus in felis. Donec semper sapien a libero. Nam dui.', '2018-07-23', 4, 'CD', 'available', 'Seventh Brother, The (A hetedik testvér)'),
(3, 'book2.png', 2, '848731013-3', 'Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio.', '2017-02-05', 1, 'Book', 'available', 'At Sea'),
(4, 'dvd1.png', 1, '549090415-1', 'Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.', '2020-01-02', 2, 'DVD', 'available', 'The empty Die'),
(5, 'book3.jpg', 1, '435577758-8', 'Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris.', '2018-11-09', 3, 'Book', 'reserved', 'Swades: We, the People (Our Country)'),
(6, 'book4.jpg', 3, '500055920-7', 'Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.', '2018-03-22', 5, 'Book', 'available', 'Ella Lola, a la Trilby'),
(7, 'cd2.png', 4, '420856531-4', 'Nulla ut erat id mauris vulputate elementum. Nullam varius. Nulla facilisi.', '2020-01-25', 4, 'CD', 'reserved', 'Warped Ones, The (Kyonetsu no kisetsu)'),
(8, 'dvd2.png', 3, '500686988-7', 'Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.', '2017-03-05', 3, 'DVD', 'available', 'Real Field'),
(17, 'book5.jpg', 2, '955936325-5', 'Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue.', '2017-03-13', 3, 'Book', 'reserved', 'Gospel of John, The'),
(18, 'book6.jpg', 1, '165507791-0', 'In congue. Etiam justo. Etiam pretium iaculis justo.', '2018-09-22', 4, 'Book', 'available', 'Unfinished Life, An'),
(19, 'cd3.png', 4, '769322545-5', 'In sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at.', '2016-12-23', 4, 'CD', 'available', 'Doomed to Die'),
(20, 'book7.jpg', 3, '770486692-3', 'In sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus.', '2017-03-22', 4, 'Book', 'available', 'My Favorite Year');

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `publisher_id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `address` varchar(40) NOT NULL,
  `size` enum('big','medium','small') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`publisher_id`, `name`, `address`, `size`) VALUES
(1, 'Waelchi and Nitzsche', '340 Iowa Place', 'small'),
(2, 'Windler LLC', '7 Waxwing Parkway', 'medium'),
(3, 'Lemke-Smitham', '41813 Rockefeller Pass', 'big'),
(4, 'Koelpin, Schoen', '729 Lake View Trail', 'small'),
(5, 'Price Group', '14 1st Terrace', 'medium');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `publisher_id` (`publisher_id`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`publisher_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `publisher`
--
ALTER TABLE `publisher`
  MODIFY `publisher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `author` (`author_id`),
  ADD CONSTRAINT `media_ibfk_2` FOREIGN KEY (`publisher_id`) REFERENCES `publisher` (`publisher_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
