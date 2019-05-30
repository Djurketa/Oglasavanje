-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2019 at 04:00 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aoglasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `article_image` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `name`, `user_id`, `description`, `article_image`, `price`, `category_id`, `created`) VALUES
(105, ' Laptop HP Elitebook 8440p i5', 16, '<p>i5 520M up to 2.93 ghz/</p>\r\n\r\n<p>4 GB RAM/</p>\r\n\r\n<p>250 GB HDD/</p>\r\n\r\n<p>14,1displej/</p>\r\n\r\n<p>baterija do 2 sata</p>\r\n', 'slika-276319-5c60386f4a215-velika.jpg', 250, 2, '2019-04-14 14:42:01'),
(106, 'TESLA TV 32\'\'T319BH Smart', 16, 'TESLA TV 32\'\'T319BHS Smart HD; LED WiFi Smart DVB-C/T2/S/S2; HDMIX2;USBX2;CI;LAN;HDMI-CEC;ARC;CRNA ', 'slika-839998-5caf0dcd052bd-velika.jpg', 320, 4, '2019-04-14 14:44:36'),
(99, 'OPEL 1.4', 16, '<p>DIGITALNA DVOZONSKA KLIMA</p>\r\n\r\n<p>SERVO-TRONIC</p>\r\n\r\n<p>VELIKA NAVIGACIJA U BOJI</p>\r\n\r\n<h1>CENTRALNO-DALJINSKO ZAKLJUCAVANJE</h1>\r\n\r\n<h1>ABS ESP DSC KOZNI VOLAN SA KOMANDAMA</h1>\r\n\r\n<h1>PROFILISANA SJEDISTA ISOFIX MASAZA U SJEDISTIMA</h1>\r\n', 'slika-1711219-5c9b4136cb0e1-velika.jpg', 21000, 1, '2019-04-12 14:00:19'),
(100, 'Opel Grandland X ', 16, '<p>Unutarnja oprema</p>\r\n\r\n<p>Automatsko ukljucivanje svjetala,</p>\r\n\r\n<p>crni poliuretanski upravljac s tri kraka i obrubom srebrne boje,</p>\r\n\r\n<p>deaktivacija zracnog jastuka za suvozaca pomocu kljuca,</p>\r\n\r\n<p>elektricni sustav brzog zagrijavanja (QuickHeat),</p>\r\n', 'slika-448614-5c51568cd9a4b-velika.jpg', 37000, 1, '2019-04-12 14:01:28'),
(101, ' VOLVO C30 2.0D', 16, ' 2.0 D - 100 KW 2008 GODISTE DIGITALNA KLIMA BORD KOMPJUTER TEMPOMAT SENZORI ZA KISU RUKONASLON MAGLO FAROVI 2X EL. PODIZACI STAKALA  EL. RETROVIZORI SA GRIJACIMA  ', 'slika-15976-5c5d4282a0596-velika.jpg', 11000, 1, '2019-04-12 14:02:26'),
(114, ' MacBook Air', 17, 'Kupljen 24.02.2017 u ovlastenom servisu. Garancija produžena 22.02.2018 na tri dodatne godine. Ukljucuje tzv. \"no matter what warranty\" prema kojem je, recimo, i lom displeja.', 'slika-14-5cb052a8cdc8f-velika.jpg', 1500, 2, '2019-04-14 14:56:16');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`) VALUES
(1, 'Automobili', 'automobili.jpg'),
(2, 'Racunari', 'racunari.jpg'),
(3, 'Mobilni uredjaji', 'mobilni.jpg'),
(4, 'Tehnika', 'tehnika.jpg'),
(5, 'Nekretnine', 'nekretnine.jpg'),
(6, 'Umjetnost', 'umjetnost.jpg'),
(7, 'Zivotinje', 'zivotinje.jpg'),
(8, 'Odjeca i obuca', 'odjecaiobuca.jpg'),
(9, 'Ostalo...', 'ostalo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `image_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `oAuth_id` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
