-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 28, 2022 at 02:28 PM
-- Server version: 5.5.68-MariaDB
-- PHP Version: 7.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nevakcinisani`
--
CREATE DATABASE IF NOT EXISTS `nevakcinisani` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `nevakcinisani`;

-- --------------------------------------------------------

--
-- Table structure for table `activation_code`
--

CREATE TABLE `activation_code` (
  `id_activation_code` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `activation_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `name`, `surname`, `email`) VALUES
(1, 'djuka', '$2a$12$BcoVXCzL5EagXljanTDdsu4rM3jH9b6Wk5lUSDgOfALQ5HqrHzmpC', 'Djordje', 'Djordjic', 'djuka@gmail.com'),
(2, 'marko', '$2y$10$eO0zG8hw7LmXe9uzs7Qg8OA5yZYjFMBw2Q2Yzgg95vu/7lX3oGbhy', 'marko', 'markovic', 'marko@gmail.com'),
(3, 'niko', '$2y$10$p1HX1MYGHr5zfCZ2jMkVgOMp4.4Y2ZY0LX4AKGfjKDPB4CZirhIk.', 'niko', 'niko', 'niko@gg.com');

-- --------------------------------------------------------

--
-- Table structure for table `blockade`
--

CREATE TABLE `blockade` (
  `id_blockade` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `is_blockade` tinyint(4) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `blockade_amount` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_category`, `name`, `parent_id`) VALUES
(1, 'Koza', 0),
(2, 'koza2', 0);

-- --------------------------------------------------------

--
-- Table structure for table `category_product`
--

CREATE TABLE `category_product` (
  `id_category_product` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id_city` int(11) NOT NULL,
  `city_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `city_postcode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id_city`, `city_name`, `city_postcode`) VALUES
(1, 'Subotica', 24000),
(2, 'Beograd', 11000);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email_status` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `activation_code` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `company_address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_city` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `pib` int(10) NOT NULL,
  `mobile_phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `name`, `lastname`, `email`, `email_status`, `activation_code`, `password`, `company_name`, `company_address`, `id_city`, `balance`, `pib`, `mobile_phone`) VALUES
(2, 'janko', 'jankovic', 'tester200test@protonmail.com', 'verified', 'NkFE8gcoLK', '$2y$10$JbFQDHdaFlpIlyLpG3EyVeUAnk1GHivHP/CYyocwj5OZExWiPt3fe', 'j', 'Lole 21', 1, 0, 12345, '2311312'),
(3, 'Djordje', 'Djordjic', 'sagfafa2@proton.me', 'verified', 'cpFXrYs7R', '$2y$10$SpMTjxLjCWJSfbMXFaqwouiRDFTAdnQ7KzpLfB3bDFaBRL2pjMfB.', 'Dhl', 'Lola', 1, 0, 321313, '566968'),
(4, 'Ana', 'Glogovcan', 'glovo@proton.me', 'not verified', '82uLadDgfb', '$2y$10$njinG8J0n9/vbuLGGLyeYul5LidGCWtvzhJExzJwKBRRMWqnhfXAq', 'Glovo', 'Glovo 23', 1, 0, 555333, '555333'),
(5, 'Marko', 'Markovic', 'pasujedw@proton.me', 'verified', 'zVXNyEwgC1', '$2y$10$UZO15rDalWTWdIST22jPNONFBepNPnWTSON3QkrZRqwGdpK0U6yUq', 'Prodaja obuce', 'Aksentija Marodica 30', 1, 0, 20003000, '065800900'),
(6, 'Nemanja', 'Popara', 'twitchpopara@gmail.com', 'verified', 'xXrYRNKCl4', '$2y$10$XwvU.eVVG8S3XjjxKGRtH.wV5ZVV7CSLh02exqtKjLuTDSYl.O/nW', 'Kurcina', 'Kurcina 69', 1, 0, 2147483647, '69696969'),
(7, 'zavisic', 'petar', 'zavisic.petar@gmail.com', 'verified', 'VqXiNry2PO', '$2y$10$Lmo/emjDdYc0/WFOaGDWPus1.wbTVyYJkpFiSeiOPrVvU.NUJO2UK', 'snis', 'Sonje Marinkovic 4', 1, 0, 658569, '0691136654'),
(8, 'hana', 'gasparic', 'gasparic.hana7@gmail.com', 'verified', 'hETGVKo4Cm', '$2y$10$eAyaA9qWM519BhVGhIfkUeGCmZr0rtoSmxcXUyMPtvHo16iic511K', 'INFOSTUD', 'krastavac 4', 1, 0, 456798, '069584456'),
(9, 'Vts', 'Vts', 'jankela222@proton.me', 'verified', 'aTPtDRxbQA', '$2y$10$h/QKztz9VgC8JOLhZpjxhOoEAlAWleDlsJ61tR6dR8EWbKQckFI42', 'Vts', 'Aksentija Marodica 10', 1, 0, 3423432, '5454545454');

-- --------------------------------------------------------

--
-- Table structure for table `customer_local`
--

CREATE TABLE `customer_local` (
  `id_customer_local` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer_local`
--

INSERT INTO `customer_local` (`id_customer_local`, `id_customer`, `name`, `lastname`, `email`, `password`, `city`, `address`) VALUES
(1, 2, 'pero', 'aa', 'aa@gmail.com', 'bb', 'subotica', 'Lole vboghl'),
(2, 2, 'Pera', 'Perica', 'bb@gmail.com', '$2y$10$XuGlfN4q1JMMqbw8XqiDMOjV0x6CdtX/KjB0vNnuy5PmvE/QGmMji', 'grad', 'adresa'),
(3, 2, 'Djordje', 'dj', 'bbbb@gmail.com', '$2y$10$K/lGjIQ5wn2i1Yv1cIvMF.vITVvQEfZ/GaymteldhS3MHvUQII4EO', 'sus', 'adrsa'),
(4, 2, 'Pera', 'Birkas', 'perica123@gmail.com', '$2y$10$MKPhPEoFcgvF96793QuADuCi81Ug4NZLgnazPBSJ0ncqVw6zaq5TC', 'a', 'ok'),
(5, 2, 'Marko', 'Markovic', 'marko@gmail.com', '$2y$10$TAlZDsthMqr8hZ9VJKfule682T/M5vRUT6CiqdOG7Iq/2X0fRyYi6', 'Djuka', 'Pera'),
(6, 2, 'Djuka', 'Djuric', 'daj@gmail.com', '$2y$10$L3VgiilaqZG4/WxfISb2feyPjRD/nVJYYtlwqSJoXVAFPCTjYhS8u', 'Subotica', 'Lola'),
(7, 2, 'Pera', 'Peric', 'nesto123@gmail.com', '$2y$10$x427b5n2ak0/ztZluvkohOwyuCfso54DHQWYrA1mmmuIIBIWOpWLa', 'Subotica', 'Lola'),
(8, 2, 'Jankeza', 'Jankic', 'janko@gmail.com', '$2y$10$f2rouTTtnbW69mHLLCeaBedQNhHjZ8kZs02FdNmOvv9QozbUsWmby', 'Beograd', 'Ns'),
(9, 2, 'Dap', 'Dap', 'dap@gmail.com', '$2y$10$tr7XB4x5NtodSWU7Xwugz.ZPeFY9Qg5EaIJn8NmrPmEJHim8vAbNK', 'Beograd', 'dap'),
(10, 2, 'AA', 'AA', 'ab@gmail.com', '$2y$10$ChX6kj8f8zm18Y63N2lkXeVtkL8W88K.V34RLzl4vdkSEfkS3BqEm', 'Beograd', 'a'),
(11, 2, 'Pera', 'a', 'dsad@gmail.com', '$2y$10$5h786zpL7yGOr9Aq8srovuI.gkivrVDipcgEQ7qNEpDbg0ZO4lu7q', 'Beograd', 'a'),
(12, 2, 's', 's', 'sasa@gmail.com', '$2y$10$gfdJv05DGpZVimNDHB/Pxu.IuYTg7ZuYY6PtEJLdsYznYotxjaQ7C', 'Beograd', 'aa'),
(13, 2, 'dsa', 'das', 'dasdsa@gmail.com', '$2y$10$xmRI/vDodjBE.s5XcZmYwOuqxpC/9EAKeX3T5ir9q9F4fZxSWtL9S', 'Beograd', 'a'),
(14, 2, 'bb', 'bb', 'bbas@gmail.com', '$2y$10$A0hdmAOA4fnuvZzpj7OyqevHeajOm.mC7mH7A6NVGy.ZoIqe3j/oW', 'Beograd', 'das'),
(15, 2, 'janko', 'jankovic', 'dasa@gmail.com', '$2y$10$BSH/tfJkrK8b9o.YjdDsseI5R6hSnNgIgCPtbcJ.BeCX.gYEWkSO2', 'Beograd', 'a'),
(16, 2, 'janko', 'Birkas', 'baba@gmail.com', '$2y$10$0ANmM/GdnDqBJgdZxOzot.7BW3TaUS1dozclsOGVgJLYBDlz.YlQC', 'Beograd', 'b'),
(17, 2, 'janko', 'jankovic', 'dadas@gmail.com', '$2y$10$.2U6j/r5Q6U3YwyF44SJ4.18jIDNJ0UTLSgn1OHljZEXQICBa.3A.', 'Beograd', 'a'),
(18, 2, 'Pera', 'jankovic', 'asa@gmail.com', '$2y$10$H1sQZ9DvytJXoY4hiRyBeeXtYosKeVRH.x/ZyfDg8516.wg7IktH2', 'Beograd', 'aa'),
(19, 2, 'Pera', 'jankovic', 'aa31231@gmail.com', '$2y$10$HWOC5SFzQGjBjgjc3m5gV.2Q8q3hIS/YBr7KFi1PAXdzMkuXiZzbq', 'Beograd', 'a'),
(20, 2, 'dsa', 'das', 'dsadsasa@gmail.com', '$2y$10$sxxhemCbS3osMwsHxUtGFuGaFzSYhuu5LNvBrkZgfAaaiiUnl5ACu', 'Beograd', 'aaa'),
(21, 9, 'Vtsas', 'VESSD', 'dasdasa@gmail.com', '$2y$10$yOlEzJa1xFBeKJV/g0FDyeuqPs/QHWrm0q0.qs71WcJWggEWnpIfK', 'Subotica', 'Nesto');

-- --------------------------------------------------------

--
-- Table structure for table `ordered_products`
--

CREATE TABLE `ordered_products` (
  `id_ordered_producuts` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `total_price` float(10,2) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ordered_products`
--

INSERT INTO `ordered_products` (`id_ordered_producuts`, `id_order`, `id_product`, `total_price`, `count`) VALUES
(1, 42, 2, 90.00, 1),
(2, 43, 2, 180.00, 2),
(3, 43, 4, 11.00, 1),
(4, 44, 2, 179.98, 2),
(5, 44, 4, 11.00, 1),
(6, 45, 2, 179.98, 2),
(7, 45, 4, 11.00, 1),
(8, 46, 3, 39.99, 1),
(9, 47, 3, 39.99, 1),
(10, 48, 3, 39.99, 1),
(11, 49, 3, 39.99, 1),
(12, 50, 4, 11.00, 1),
(13, 51, 4, 11.00, 1),
(14, 52, 2, 89.99, 1),
(15, 53, 4, 11.00, 1),
(16, 54, 4, 11.00, 1),
(17, 54, 3, 39.99, 1),
(18, 55, 3, 39.99, 1),
(19, 55, 4, 11.00, 1),
(20, 56, 4, 11.00, 1),
(21, 57, 3, 39.99, 1),
(22, 57, 4, 11.00, 1),
(23, 58, 3, 39.99, 1),
(24, 59, 3, 39.99, 1),
(25, 60, 3, 39.99, 1),
(26, 61, 2, 89.99, 1),
(27, 62, 2, 89.99, 1),
(28, 63, 3, 39.99, 1),
(29, 64, 4, 11.00, 1),
(30, 65, 5, 10.00, 1),
(31, 66, 3, 39.99, 1),
(32, 67, 3, 39.99, 1),
(33, 67, 2, 89.99, 1),
(34, 68, 4, 11.00, 1),
(35, 69, 5, 10.00, 1),
(36, 70, 3, 39.99, 1),
(37, 71, 4, 11.00, 1),
(38, 72, 5, 20.00, 2),
(39, 73, 4, 11.00, 1),
(40, 74, 4, 11.00, 1),
(41, 75, 4, 11.00, 1),
(42, 76, 3, 39.99, 1),
(43, 77, 4, 11.00, 1),
(44, 78, 3, 39.99, 1),
(45, 79, 3, 79.98, 2),
(46, 80, 4, 11.00, 1),
(47, 81, 4, 11.00, 1),
(48, 81, 3, 39.99, 1),
(49, 81, 2, 89.99, 1),
(50, 82, 4, 11.00, 1),
(51, 82, 3, 39.99, 1),
(52, 82, 2, 89.99, 1),
(53, 82, 5, 10.00, 1),
(54, 82, 1, 99.99, 1),
(55, 83, 3, 199.95, 5),
(56, 83, 2, 89.99, 1),
(57, 83, 4, 11.00, 1),
(58, 84, 4, 11.00, 1),
(59, 84, 2, 449.95, 5),
(60, 84, 3, 159.96, 4),
(61, 85, 5, 50.00, 5),
(62, 85, 4, 11.00, 1),
(63, 86, 5, 30.00, 3),
(64, 86, 4, 44.00, 4),
(65, 86, 1, 99.99, 1),
(66, 86, 3, 679.83, 17),
(67, 86, 2, 359.96, 4),
(68, 87, 5, 10.00, 1),
(69, 88, 5, 20.00, 2),
(70, 88, 4, 11.00, 1),
(71, 89, 3, 199.95, 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_order` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `order_note` text COLLATE utf8_unicode_ci NOT NULL,
  `datetime` datetime NOT NULL,
  `is_sent` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id_order`, `id_customer`, `order_note`, `datetime`, `is_sent`) VALUES
(1, 2, 'aaa', '0000-00-00 00:00:00', 0),
(2, 2, 'nista', '0000-00-00 00:00:00', 0),
(3, 2, 'nista', '0000-00-00 00:00:00', 0),
(4, 2, 'nista', '2022-06-21 17:59:35', 0),
(5, 2, '', '2022-06-21 21:22:48', 0),
(6, 2, '', '2022-06-21 21:23:12', 0),
(7, 2, '', '2022-06-21 21:28:36', 0),
(8, 2, 'nista', '2022-06-21 21:29:05', 0),
(9, 2, 'nista', '2022-06-21 21:35:33', 0),
(10, 2, 'nista', '2022-06-21 21:36:20', 0),
(11, 2, 'subotica', '2022-06-21 21:36:33', 0),
(12, 2, 'subotica', '2022-06-21 21:37:15', 0),
(13, 2, 'subotica', '2022-06-21 21:37:36', 0),
(14, 2, 'subotica', '2022-06-21 21:38:10', 0),
(15, 2, 'subotica', '2022-06-21 21:39:23', 0),
(16, 2, 'subotica', '2022-06-21 21:39:45', 0),
(17, 2, 'aa', '2022-06-21 21:40:17', 0),
(18, 2, 'aa', '2022-06-21 21:40:33', 0),
(19, 2, 'aa', '2022-06-21 21:40:36', 0),
(20, 2, 'aa', '2022-06-21 21:40:52', 0),
(21, 2, 'aa', '2022-06-21 21:40:59', 0),
(22, 2, 'aa', '2022-06-21 21:41:05', 0),
(23, 2, 'aa', '2022-06-21 21:41:31', 0),
(24, 2, 'aa', '2022-06-21 21:41:46', 0),
(25, 2, 'aa', '2022-06-21 21:41:52', 0),
(26, 2, 'aa', '2022-06-21 21:42:09', 0),
(27, 2, 'aa', '2022-06-21 21:42:33', 0),
(28, 2, 'aa', '2022-06-21 21:42:43', 0),
(29, 2, 'aa', '2022-06-21 21:43:39', 0),
(30, 2, 'aa', '2022-06-21 21:44:23', 0),
(31, 2, 'aa', '2022-06-21 21:44:55', 0),
(32, 2, 'aa', '2022-06-21 21:45:10', 0),
(33, 2, 'aa', '2022-06-21 21:46:29', 0),
(34, 2, 'aa', '2022-06-21 21:47:06', 0),
(35, 2, 'aa', '2022-06-21 21:47:33', 0),
(36, 2, 'das', '2022-06-21 21:48:38', 0),
(37, 2, 'das', '2022-06-21 21:49:23', 0),
(38, 2, 'das', '2022-06-21 21:49:53', 0),
(39, 2, 'das', '2022-06-21 21:50:06', 0),
(40, 2, 'das', '2022-06-21 21:50:53', 0),
(41, 2, 'das', '2022-06-21 21:51:12', 0),
(42, 2, 'das', '2022-06-21 21:51:29', 0),
(43, 2, 'Racun ', '2022-06-21 21:52:27', 0),
(44, 2, 'Racun ', '2022-06-21 21:53:28', 0),
(45, 2, 'Racun ', '2022-06-21 21:58:00', 0),
(46, 2, 'Racun', '2022-06-21 22:00:27', 0),
(47, 2, 'a', '2022-06-21 22:23:11', 0),
(48, 2, 'das', '2022-06-21 22:25:10', 0),
(49, 2, 'sa', '2022-06-21 22:28:26', 0),
(50, 2, 'a', '2022-06-21 22:29:03', 0),
(51, 2, 'bb', '2022-06-21 22:30:32', 0),
(52, 2, 'bb', '2022-06-21 22:30:42', 0),
(53, 2, 'a', '2022-06-21 22:31:42', 0),
(54, 2, 'Nista', '2022-06-22 20:24:36', 0),
(55, 2, 'aa', '2022-06-22 20:25:52', 0),
(56, 2, 'aa', '2022-06-22 20:27:38', 0),
(57, 2, 'aa', '2022-06-22 20:35:12', 0),
(58, 2, 'as', '2022-06-22 20:35:48', 0),
(59, 2, 'as', '2022-06-22 20:36:19', 0),
(60, 2, 's', '2022-06-22 20:36:43', 0),
(61, 2, 'bb', '2022-06-22 20:38:11', 0),
(62, 2, 'bb', '2022-06-22 20:39:17', 0),
(63, 2, 'as', '2022-06-22 20:43:12', 0),
(64, 2, 'as', '2022-06-22 20:44:17', 0),
(65, 2, 'kk', '2022-06-22 20:54:57', 0),
(66, 2, 'a', '2022-06-22 20:57:15', 0),
(67, 2, 'vv', '2022-06-22 20:57:53', 0),
(68, 2, 'a', '2022-06-22 20:58:18', 0),
(69, 2, 'bb', '2022-06-22 20:59:06', 0),
(70, 2, 'bvb', '2022-06-22 20:59:57', 0),
(71, 2, 'bb', '2022-06-22 21:00:52', 0),
(72, 2, 'bb', '2022-06-22 21:01:34', 0),
(73, 2, 'Nista novo', '2022-06-24 18:07:47', 0),
(74, 2, 'sada', '2022-06-25 11:56:42', 0),
(75, 2, 'das', '2022-06-25 13:54:04', 0),
(76, 2, 'das', '2022-06-25 13:55:41', 0),
(77, 2, 'nesto', '2022-06-25 13:58:01', 0),
(78, 2, 'dsa', '2022-06-25 13:59:13', 0),
(79, 2, 'aab', '2022-06-25 14:01:36', 0),
(80, 2, 'sda', '2022-06-25 14:03:04', 0),
(81, 2, 'vvv', '2022-06-25 14:05:56', 0),
(82, 2, 'ab', '2022-06-25 14:09:31', 0),
(83, 2, 'Molim vas upakujte dobro!\r\nPozdrav', '2022-06-25 14:10:19', 0),
(84, 2, 'Racun!\r\nHvala', '2022-06-25 14:13:20', 0),
(85, 5, 'Racun, hvala.', '2022-06-25 14:49:23', 0),
(86, 6, 'LMAO!', '2022-06-25 15:01:15', 0),
(87, 6, 'Kul sve', '2022-06-25 15:04:01', 1),
(88, 2, 'Posaljite mi predracun', '2022-06-27 22:46:47', 0),
(89, 9, 'Predracun', '2022-06-28 09:24:51', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `balance` int(11) NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `id_category`, `name`, `price`, `description`, `balance`, `image`) VALUES
(1, 1, 'Privezak', '99.00', 'Privezak za kljuceve                                                        ', 1000, ''),
(2, 1, 'Privezak2', '8944.00', 'Privezak random                            ', 1444, ''),
(3, 2, 'Privezak za kljuceve', '39.99', 'Od najfinijih materijala', 100, '1.png'),
(4, 1, 'Privezak3', '11.00', 'opis', 2, '2.png'),
(5, 1, 'Privezak 4', '10.00', 'Od najfinijeg materijala i stila', 15, '2.png');

-- --------------------------------------------------------

--
-- Table structure for table `pwd_reset`
--

CREATE TABLE `pwd_reset` (
  `id_pwd_reset` int(11) NOT NULL,
  `pwd_reset_email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `pwd_reset_selector` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `pwd_reset_token` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `pwd_reset_expires` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pwd_reset`
--

INSERT INTO `pwd_reset` (`id_pwd_reset`, `pwd_reset_email`, `pwd_reset_selector`, `pwd_reset_token`, `pwd_reset_expires`) VALUES
(35, 'zavisic.petar@gmail.com', '3fdae3585fca3a07', '1', 1656338549),
(37, 'tester900@protonmail.com', '264669690a41c9c7', '1', 1656339440),
(54, 'tester200test@protonmail.com', 'c0b3ef2ec73fa50a', '1', 1656341956),
(56, 'jankela222@proton.me', 'd1e6bc4ffd15dfb0', '1', 1656403420);

-- --------------------------------------------------------

--
-- Table structure for table `traffic`
--

CREATE TABLE `traffic` (
  `id_traffic` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `date` date NOT NULL,
  `owes` decimal(10,0) NOT NULL,
  `requires` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traffic`
--

INSERT INTO `traffic` (`id_traffic`, `id_customer`, `date`, `owes`, `requires`) VALUES
(2, 2, '2022-06-22', '31', '11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activation_code`
--
ALTER TABLE `activation_code`
  ADD PRIMARY KEY (`id_activation_code`),
  ADD KEY `activation_code-customer` (`id_customer`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `blockade`
--
ALTER TABLE `blockade`
  ADD PRIMARY KEY (`id_blockade`),
  ADD KEY `blockade-customer` (`id_customer`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `category_product`
--
ALTER TABLE `category_product`
  ADD PRIMARY KEY (`id_category_product`),
  ADD KEY `category_product-product` (`id_product`),
  ADD KEY `category_product-category` (`id_category`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id_city`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`),
  ADD KEY `customer-city` (`id_city`);

--
-- Indexes for table `customer_local`
--
ALTER TABLE `customer_local`
  ADD PRIMARY KEY (`id_customer_local`),
  ADD KEY `customer_local-customer` (`id_customer`);

--
-- Indexes for table `ordered_products`
--
ALTER TABLE `ordered_products`
  ADD PRIMARY KEY (`id_ordered_producuts`),
  ADD KEY `ordered_products-orders` (`id_order`),
  ADD KEY `ordered_products-product` (`id_product`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `order_customer` (`id_customer`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `product_category` (`id_category`);

--
-- Indexes for table `pwd_reset`
--
ALTER TABLE `pwd_reset`
  ADD PRIMARY KEY (`id_pwd_reset`);

--
-- Indexes for table `traffic`
--
ALTER TABLE `traffic`
  ADD PRIMARY KEY (`id_traffic`),
  ADD KEY `traffic-customer` (`id_customer`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activation_code`
--
ALTER TABLE `activation_code`
  MODIFY `id_activation_code` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blockade`
--
ALTER TABLE `blockade`
  MODIFY `id_blockade` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category_product`
--
ALTER TABLE `category_product`
  MODIFY `id_category_product` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id_city` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customer_local`
--
ALTER TABLE `customer_local`
  MODIFY `id_customer_local` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `ordered_products`
--
ALTER TABLE `ordered_products`
  MODIFY `id_ordered_producuts` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pwd_reset`
--
ALTER TABLE `pwd_reset`
  MODIFY `id_pwd_reset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `traffic`
--
ALTER TABLE `traffic`
  MODIFY `id_traffic` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activation_code`
--
ALTER TABLE `activation_code`
  ADD CONSTRAINT `activation_code-customer` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`);

--
-- Constraints for table `blockade`
--
ALTER TABLE `blockade`
  ADD CONSTRAINT `blockade-customer` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`);

--
-- Constraints for table `category_product`
--
ALTER TABLE `category_product`
  ADD CONSTRAINT `category_product-category` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`),
  ADD CONSTRAINT `category_product-product` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`);

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer-city` FOREIGN KEY (`id_city`) REFERENCES `city` (`id_city`);

--
-- Constraints for table `customer_local`
--
ALTER TABLE `customer_local`
  ADD CONSTRAINT `customer_local-customer` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`);

--
-- Constraints for table `ordered_products`
--
ALTER TABLE `ordered_products`
  ADD CONSTRAINT `ordered_products-orders` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id_order`),
  ADD CONSTRAINT `ordered_products-product` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `order_customer` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`);

--
-- Constraints for table `traffic`
--
ALTER TABLE `traffic`
  ADD CONSTRAINT `traffic-customer` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
