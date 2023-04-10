-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2023 at 03:17 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `futsalan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `username`, `password`) VALUES
(0, '', 'admin', '$2y$10$kkn46yooXeqqrbVQVGtvmOH9v5qzoWhXqNpO6ZrqL8Zw3gc6gg/Kq');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_selesai` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `nama`, `tanggal`, `jam_mulai`, `jam_selesai`) VALUES
(16, 'roqky', '2023-01-08', '21:00:00', '23:00:00'),
(18, 'dayat', '2023-01-08', '12:00:00', '15:00:00'),
(20, 'dayat', '2023-01-10', '11:00:00', '15:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(70) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`) VALUES
(12, 'LUYIRO', 'yahaha', 'baharudindayat59@gmail.com', '$2y$10$/38cqQQpxVijM6rchAYAGu/uifd28N.0TV9l8oQo34veLvw2Sxwqm'),
(13, 'Baharudin Nur Hidayat', 'dayat', 'dayat@gmail.com', '$2y$10$SQuHi5stX2nqwjxzo/pjCOqqQFqKPtnhH.Mc4ai641MFEaZom7y9u'),
(14, 'baharudindayat', 'roqky', 'Awowkwkw@gmail.com', '$2y$10$mCbuLPmIG6CSwLyq2UV9CePwhqVrEy47Lo.J3.ElzafkOtcT4tAcK'),
(15, 'ANANDA Y', 'yahaha', 'zainnjen@gmail.com', '$2y$10$0x5phLelahd00i.cylimOukQlD4z5Jw0L3LNidBmKivLyU7iVuBR2'),
(20, 'budi', 'budi', 'budi@aaa.aaa', '$2y$10$6154LaUeUzbg.Ze5rQn/d.2ueVSC3jkqUlh/TcumkoIrJO72VnlCi'),
(21, 'alex', 'alex', 'alex@gmail.com', '$2y$10$GM64RoyegEZdfzTLsAGUiuFePiS5iS1kLB6a217deGhrh5REDXtMi'),
(22, 'ngarang', 'bebas', 'bebas@gmail.com', '$2y$10$wEbXoc1oye17FAapr.qrHu/pMzrBoEOoN3suXeUQQvdIr3BcvUaS.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
