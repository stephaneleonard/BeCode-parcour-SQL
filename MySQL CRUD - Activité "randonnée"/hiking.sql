-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: db:3306
-- Generation Time: Mar 16, 2020 at 11:07 AM
-- Server version: 8.0.19
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `docker`
--

-- --------------------------------------------------------

--
-- Table structure for table `hiking`
--

CREATE TABLE `hiking` (
  `id` int NOT NULL,
  `name` varchar(400) NOT NULL,
  `difficulty` char(30) NOT NULL,
  `distance` int NOT NULL,
  `duration` time NOT NULL,
  `height_difference` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hiking`
--

INSERT INTO `hiking` (`id`, `name`, `difficulty`, `distance`, `duration`, `height_difference`) VALUES
(1, 'Deux boucles de Bras Sec à Palmiste Rouge', 'Moyen', 12, '05:00:00', 850),
(2, 'Le Sentier des Sources entre Cilaos et Bras Sec', 'Facile', 5, '01:14:00', 280),
(3, 'Le sommet du Piton Béthoune par le tour du Bonnet de Prêtre', 'Très difficile', 6, '04:00:00', 650),
(4, 'Le Dimitile depuis Bras Sec par le Kerveguen', 'Difficile', 25, '10:00:00', 1550),
(8, 'La marche de la mort', 'Très difficile', 100, '12:00:00', 1000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hiking`
--
ALTER TABLE `hiking`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hiking`
--
ALTER TABLE `hiking`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
