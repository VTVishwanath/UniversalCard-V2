-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 04, 2017 at 12:56 AM
-- Server version: 10.1.20-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id1549285_uc`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `AID` bigint(10) UNSIGNED NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(72) NOT NULL,
  `phone` bigint(10) UNSIGNED NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`AID`, `username`, `password`, `phone`, `email`) VALUES
(1, 'vishwanath', '$2y$12$8hw9eUi0He8PxWx2pBYBou/CG8fWBNHIQSvnYHUitXf3a7HjOVOzy', 9591104023, 'vtvishwanathbhat@gmail.com'),
(19, 'rainbow', '$2y$12$zI0I.foxRriHx5SGqgGmTOXnDgfMzHwLNvI0ChvAEMOl41zewR0bS', 8989989800, 'rainbow@teck.com'),
(22, 'john', '$2y$12$ijgS8Y64lRqMSYXfdUpFbOOI/Tz1BliHxITtiYOnkG4p13nGW3ys6', 8888888888, 'john@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `BID` bigint(30) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `total_amt` bigint(10) UNSIGNED NOT NULL,
  `type` varchar(30) NOT NULL,
  `UID` bigint(30) UNSIGNED NOT NULL,
  `RID` bigint(30) UNSIGNED NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`BID`, `date`, `total_amt`, `type`, `UID`, `RID`, `status`) VALUES
(1, '2016-11-14 23:26:59', 15, 'Chocolates', 1, 1, 'Success'),
(3, '2016-11-14 23:36:54', 5, 'Other', 1, 1, 'Success'),
(4, '2016-11-14 23:37:30', 50000, 'Other', 1, 1, 'Failed'),
(5, '2016-11-24 18:04:54', 50, 'Snacks', 2, 1, 'Success'),
(6, '2016-11-24 19:40:33', 5, 'Other', 1, 1, 'Success'),
(7, '2016-11-24 19:41:20', 5, 'Other', 1, 1, 'Success'),
(8, '2016-11-24 20:07:02', 6, 'Other', 1, 1, 'Success'),
(9, '2016-11-24 20:17:12', 4, 'Other', 1, 1, 'Success'),
(10, '2016-11-25 09:37:27', 5, 'Other', 1, 1, 'Success'),
(11, '2016-11-25 09:42:04', 4, 'Other', 1, 1, 'Success'),
(12, '2016-11-25 10:20:56', 10, 'Other', 1, 1, 'Success'),
(13, '2016-11-25 11:25:02', 20, 'Lunch', 1, 1, 'Success'),
(14, '2016-11-27 16:05:50', 50, 'Cold drinks', 2, 1, 'Success'),
(15, '2016-12-02 13:19:25', 4, 'Other', 1, 1, 'Success'),
(16, '2016-12-04 13:06:23', 4, 'Other', 1, 1, 'Success'),
(17, '2016-12-04 13:08:22', 10, 'Other', 1, 1, 'Success'),
(18, '2016-12-04 13:08:30', 10, 'Other', 1, 1, 'Success'),
(19, '2016-12-04 13:08:37', 10, 'Other', 1, 1, 'Success'),
(20, '2016-12-04 13:08:43', 10, 'Other', 1, 1, 'Success'),
(21, '2016-12-04 13:08:50', 10, 'Other', 1, 1, 'Success'),
(22, '2016-12-04 13:08:56', 10, 'Other', 1, 1, 'Success'),
(23, '2016-12-04 13:09:03', 10, 'Other', 1, 1, 'Success'),
(24, '2016-12-04 13:09:09', 10, 'Other', 1, 1, 'Success'),
(25, '2016-12-04 13:09:16', 10, 'Other', 1, 1, 'Success'),
(26, '2016-12-06 06:24:19', 10, 'Other', 1, 1, 'Success'),
(27, '2016-12-07 18:11:51', 4, 'Other', 1, 1, 'Success'),
(28, '2016-12-07 18:11:59', 4000000000, 'Other', 1, 1, 'Failed'),
(29, '2016-12-07 18:12:12', 4000000000, 'Other', 2, 1, 'Failed'),
(30, '2016-12-07 18:12:31', 4, 'Other', 2, 1, 'Success'),
(31, '2016-12-07 19:38:49', 12, 'Other', 1, 1, 'Success'),
(32, '2016-12-07 19:39:06', 999999, 'Other', 1, 1, 'Failed'),
(33, '2016-12-07 19:41:53', 78, 'Other', 1, 1, 'Success'),
(34, '2016-12-07 19:43:29', 699999, 'Other', 1, 1, 'Failed'),
(35, '2016-12-07 20:14:23', 8, 'Other', 1, 1, 'Success'),
(36, '2016-12-07 20:16:36', 666666, 'Other', 1, 1, 'Failed'),
(37, '2016-12-07 20:17:18', 96, 'Other', 1, 1, 'Success'),
(38, '2016-12-07 20:18:43', 777777, 'Other', 1, 1, 'Failed'),
(39, '2016-12-08 04:12:28', 56, 'Other', 1, 1, 'Success'),
(40, '2016-12-08 04:13:26', 5, 'Other', 2, 1, 'Success'),
(41, '2016-12-08 04:45:48', 666666, 'Other', 1, 1, 'Failed'),
(42, '2016-12-08 04:46:16', 666666, 'Other', 1, 1, 'Failed'),
(43, '2016-12-08 04:46:57', 999999, 'Other', 1, 1, 'Failed'),
(44, '2016-12-08 04:47:34', 89, 'Other', 1, 1, 'Success'),
(45, '2016-12-08 04:48:43', 788, 'Other', 1, 1, 'Success'),
(46, '2016-12-08 04:52:06', 5, 'Other', 1, 1, 'Success'),
(47, '2016-12-08 04:52:50', 999999, 'Other', 1, 1, 'Failed'),
(48, '2016-12-08 04:53:32', 5, 'Other', 1, 1, 'Success'),
(49, '2016-12-08 04:54:10', 777777, 'Other', 1, 1, 'Failed'),
(50, '2016-12-08 04:57:13', 2000, 'Other', 1, 1, 'Failed'),
(51, '2016-12-08 04:57:43', 7, 'Other', 1, 1, 'Success'),
(52, '2016-12-08 04:58:10', 5, 'Other', 1, 1, 'Success'),
(53, '2016-12-08 04:59:01', 52, 'Other', 1, 1, 'Success'),
(54, '2016-12-08 05:31:59', 5, 'Other', 1, 1, 'Success'),
(55, '2016-12-08 05:32:54', 56, 'Lunch', 1, 1, 'Success'),
(56, '2016-12-08 05:33:51', 500000, 'Chocolates', 1, 1, 'Failed'),
(57, '2017-02-07 09:29:31', 20, 'Other', 1, 1, 'Success'),
(58, '2017-02-15 17:51:29', 3, 'Other', 1, 1, 'Success'),
(59, '2017-02-15 18:35:09', 20, 'Other', 1, 1, 'Success'),
(60, '2017-02-15 19:04:26', 78, 'Other', 1, 1, 'Success'),
(61, '2017-02-15 19:05:23', 89, 'Other', 1, 1, 'Success'),
(62, '2017-02-15 19:29:03', 33, 'Other', 1, 1, 'Success'),
(63, '2017-02-15 19:29:45', 7, 'Other', 1, 1, 'Success'),
(64, '2017-02-15 19:32:45', 44, 'Other', 1, 1, 'Success'),
(65, '2017-02-15 19:37:10', 888888, 'Other', 1, 1, 'Failed'),
(66, '2017-02-15 19:48:04', 777777, 'Other', 1, 1, 'Failed'),
(67, '2017-02-15 19:49:25', 888888, 'Other', 1, 1, 'Failed'),
(68, '2017-02-15 19:51:13', 8, 'Other', 1, 1, 'Success'),
(69, '2017-02-15 19:56:04', 77, 'Other', 1, 1, 'Success'),
(70, '2017-02-15 19:58:34', 888888, 'Other', 1, 1, 'Failed'),
(71, '2017-02-15 20:08:27', 7, 'Other', 1, 1, 'Success'),
(72, '2017-02-15 20:09:24', 555555, 'Other', 1, 1, 'Failed'),
(73, '2017-02-15 20:11:20', 8, 'Other', 1, 1, 'Success'),
(74, '2017-02-15 20:23:58', 111111, 'Other', 1, 1, 'Failed'),
(75, '2017-02-16 11:08:51', 58, 'Other', 1, 1, 'Success'),
(76, '2017-02-16 11:21:15', 68, 'Other', 1, 1, 'Success'),
(77, '2017-02-16 11:46:28', 545555, 'Other', 1, 1, 'Failed'),
(78, '2017-02-16 11:47:30', 54, 'Other', 1, 1, 'Success'),
(79, '2017-03-22 16:22:59', 12, 'Other', 1, 1, 'Success'),
(80, '2017-03-23 04:27:37', 23, 'Other', 1, 1, 'Success'),
(81, '2017-03-23 18:49:04', 11, 'Other', 1, 1, 'Success'),
(82, '2017-03-23 18:49:10', 11, 'Other', 1, 1, 'Success'),
(83, '2017-03-23 18:49:16', 11, 'Other', 1, 1, 'Success'),
(84, '2017-03-24 07:46:39', 50, 'Lunch', 1, 1, 'Success'),
(85, '2017-03-24 07:47:35', 6, 'Cold drinks', 1, 1, 'Success'),
(86, '2017-03-24 07:49:11', 2, 'Snacks', 1, 1, 'Success'),
(87, '2017-05-07 09:01:00', 23, 'Other', 1, 1, 'Success'),
(88, '2017-05-07 19:41:50', 1, 'Other', 1, 1, 'Success'),
(89, '2017-05-07 19:42:12', 1, 'Other', 1, 1, 'Success'),
(90, '2017-05-07 19:43:35', 2, 'Other', 1, 1, 'Success'),
(91, '2017-05-07 19:45:45', 18446744073709551615, 'Other', 1, 1, 'Failed'),
(92, '2017-05-07 19:46:42', 54, 'Other', 1, 1, 'Success'),
(93, '2017-05-07 20:04:42', 12, 'Other', 1, 1, 'Success'),
(94, '2017-05-07 20:04:48', 12, 'Other', 1, 1, 'Success'),
(95, '2017-05-07 20:04:54', 12, 'Other', 1, 1, 'Success'),
(96, '2017-05-07 20:05:00', 12, 'Other', 1, 1, 'Success'),
(97, '2017-05-07 20:05:07', 12, 'Other', 1, 1, 'Success'),
(98, '2017-05-07 20:08:33', 11, 'Other', 1, 1, 'Success'),
(99, '2017-05-07 20:08:39', 11, 'Other', 1, 1, 'Success'),
(100, '2017-05-07 20:08:45', 11, 'Other', 1, 1, 'Success'),
(101, '2017-05-07 20:08:51', 11, 'Other', 1, 1, 'Success'),
(102, '2017-05-07 20:29:08', 12, 'Other', 1, 1, 'Success'),
(103, '2017-05-07 20:29:14', 12, 'Other', 1, 1, 'Success'),
(104, '2017-05-07 20:29:20', 12, 'Other', 1, 1, 'Success'),
(105, '2017-05-07 20:29:26', 12, 'Other', 1, 1, 'Success'),
(106, '2017-05-07 20:29:32', 12, 'Other', 1, 1, 'Success'),
(107, '2017-05-07 20:29:38', 12, 'Other', 1, 1, 'Success'),
(108, '2017-05-07 20:29:44', 12, 'Other', 1, 1, 'Success'),
(109, '2017-05-07 20:29:50', 12, 'Other', 1, 1, 'Success'),
(110, '2017-05-07 20:29:56', 12, 'Other', 1, 1, 'Success'),
(111, '2017-05-07 20:30:05', 12, 'Other', 1, 1, 'Success'),
(112, '2017-05-07 20:30:09', 12, 'Other', 1, 1, 'Success'),
(113, '2017-05-07 20:30:15', 12, 'Other', 1, 1, 'Success'),
(114, '2017-05-07 20:30:21', 12, 'Other', 1, 1, 'Success'),
(115, '2017-05-07 20:30:27', 12, 'Other', 1, 1, 'Success'),
(116, '2017-05-07 20:30:33', 12, 'Other', 1, 1, 'Success'),
(117, '2017-05-07 20:30:39', 12, 'Other', 1, 1, 'Success'),
(118, '2017-05-07 20:30:45', 12, 'Other', 1, 1, 'Success'),
(119, '2017-05-07 20:30:51', 12, 'Other', 1, 1, 'Success'),
(120, '2017-05-07 20:30:57', 12, 'Other', 1, 1, 'Success'),
(121, '2017-05-07 20:31:06', 12, 'Other', 1, 1, 'Success'),
(122, '2017-05-07 20:31:10', 12, 'Other', 1, 1, 'Success'),
(123, '2017-05-07 20:31:16', 12, 'Other', 1, 1, 'Success'),
(124, '2017-05-07 20:31:22', 12, 'Other', 1, 1, 'Success'),
(125, '2017-05-07 20:31:28', 12, 'Other', 1, 1, 'Success'),
(126, '2017-05-07 20:31:34', 12, 'Other', 1, 1, 'Success'),
(127, '2017-05-07 20:31:40', 12, 'Other', 1, 1, 'Success'),
(128, '2017-05-07 20:31:46', 12, 'Other', 1, 1, 'Success'),
(129, '2017-05-07 20:31:52', 12, 'Other', 1, 1, 'Success'),
(130, '2017-05-07 20:31:58', 12, 'Other', 1, 1, 'Success'),
(131, '2017-05-07 20:32:07', 12, 'Other', 1, 1, 'Success'),
(132, '2017-05-07 20:32:10', 12, 'Other', 1, 1, 'Success'),
(133, '2017-05-07 20:32:16', 12, 'Other', 1, 1, 'Success'),
(134, '2017-05-07 20:32:23', 12, 'Other', 1, 1, 'Success'),
(135, '2017-05-07 20:32:29', 12, 'Other', 1, 1, 'Success'),
(136, '2017-05-07 20:32:35', 12, 'Other', 1, 1, 'Success'),
(137, '2017-05-07 20:32:41', 12, 'Other', 1, 1, 'Success'),
(138, '2017-05-07 20:32:47', 12, 'Other', 1, 1, 'Success'),
(139, '2017-05-07 20:32:53', 12, 'Other', 1, 1, 'Success'),
(140, '2017-05-07 20:32:59', 12, 'Other', 1, 1, 'Success'),
(141, '2017-05-07 20:33:07', 12, 'Other', 1, 1, 'Success'),
(142, '2017-05-07 20:33:12', 12, 'Other', 1, 1, 'Success'),
(143, '2017-05-07 20:33:18', 12, 'Other', 1, 1, 'Success'),
(144, '2017-05-07 20:33:24', 12, 'Other', 1, 1, 'Success'),
(145, '2017-05-07 20:33:30', 12, 'Other', 1, 1, 'Success'),
(146, '2017-05-07 20:33:36', 12, 'Other', 1, 1, 'Success'),
(147, '2017-05-07 20:33:42', 12, 'Other', 1, 1, 'Success'),
(148, '2017-05-07 20:33:48', 12, 'Other', 1, 1, 'Success'),
(149, '2017-05-07 20:33:54', 12, 'Other', 1, 1, 'Success'),
(150, '2017-05-07 20:34:00', 12, 'Other', 1, 1, 'Success'),
(151, '2017-05-07 20:34:07', 12, 'Other', 1, 1, 'Success'),
(152, '2017-05-07 20:34:13', 12, 'Other', 1, 1, 'Success'),
(153, '2017-05-07 20:34:19', 12, 'Other', 1, 1, 'Success'),
(154, '2017-05-07 20:34:25', 12, 'Other', 1, 1, 'Success'),
(155, '2017-05-07 20:34:31', 12, 'Other', 1, 1, 'Success'),
(156, '2017-05-07 20:34:37', 12, 'Other', 1, 1, 'Success'),
(157, '2017-05-07 20:34:43', 12, 'Other', 1, 1, 'Success'),
(158, '2017-05-07 20:34:49', 12, 'Other', 1, 1, 'Success'),
(159, '2017-05-07 20:34:55', 12, 'Other', 1, 1, 'Success'),
(160, '2017-05-07 20:35:08', 12, 'Other', 1, 1, 'Success'),
(161, '2017-05-07 20:35:14', 12, 'Other', 1, 1, 'Success'),
(162, '2017-05-07 20:35:20', 12, 'Other', 1, 1, 'Success'),
(163, '2017-05-07 20:35:26', 12, 'Other', 1, 1, 'Success'),
(164, '2017-05-07 20:35:32', 12, 'Other', 1, 1, 'Success'),
(165, '2017-05-07 20:35:38', 12, 'Other', 1, 1, 'Success'),
(166, '2017-05-07 20:35:44', 12, 'Other', 1, 1, 'Success'),
(167, '2017-05-07 20:35:50', 12, 'Other', 1, 1, 'Success'),
(168, '2017-05-07 20:35:56', 12, 'Other', 1, 1, 'Success'),
(169, '2017-05-07 20:36:07', 12, 'Other', 1, 1, 'Success'),
(170, '2017-05-07 20:36:09', 12, 'Other', 1, 1, 'Success'),
(171, '2017-05-07 20:36:15', 12, 'Other', 1, 1, 'Success'),
(172, '2017-05-07 20:46:53', 4, 'Other', 1, 1, 'Success'),
(173, '2017-05-07 21:11:18', 8, 'Other', 1, 1, 'Success'),
(174, '2017-05-07 21:11:20', 8, 'Other', 1, 1, 'Success'),
(175, '2017-05-07 21:11:22', 8, 'Other', 1, 1, 'Success'),
(176, '2017-05-07 21:11:24', 8, 'Other', 1, 1, 'Success'),
(177, '2017-05-07 21:11:25', 8, 'Other', 1, 1, 'Success'),
(178, '2017-05-07 21:11:27', 8, 'Other', 1, 1, 'Success'),
(179, '2017-05-07 21:13:40', 1, 'Other', 1, 1, 'Success'),
(180, '2017-05-07 21:16:27', 1, 'Other', 1, 1, 'Success'),
(181, '2017-05-07 21:16:28', 1, 'Other', 1, 1, 'Success'),
(182, '2017-05-07 21:16:30', 1, 'Other', 1, 1, 'Success'),
(183, '2017-05-07 21:16:32', 1, 'Other', 1, 1, 'Success'),
(184, '2017-05-07 21:16:34', 1, 'Other', 1, 1, 'Success'),
(185, '2017-05-07 21:16:37', 1, 'Other', 1, 1, 'Success'),
(186, '2017-05-07 21:16:41', 1, 'Other', 1, 1, 'Success'),
(187, '2017-05-07 21:22:51', 2, 'Other', 1, 1, 'Success'),
(188, '2017-05-07 21:23:19', 1, 'Other', 1, 1, 'Success'),
(189, '2017-05-07 21:23:21', 1, 'Other', 1, 1, 'Success'),
(190, '2017-05-07 21:23:22', 1, 'Other', 1, 1, 'Success'),
(191, '2017-05-07 21:23:24', 1, 'Other', 1, 1, 'Success'),
(192, '2017-05-07 21:23:26', 1, 'Other', 1, 1, 'Success'),
(193, '2017-05-07 21:23:27', 1, 'Other', 1, 1, 'Success'),
(194, '2017-05-07 21:23:29', 1, 'Other', 1, 1, 'Success'),
(195, '2017-05-07 21:23:31', 1, 'Other', 1, 1, 'Success'),
(196, '2017-05-07 21:23:33', 1, 'Other', 1, 1, 'Success'),
(197, '2017-05-07 21:23:34', 1, 'Other', 1, 1, 'Success'),
(198, '2017-05-07 21:23:36', 1, 'Other', 1, 1, 'Success'),
(199, '2017-05-07 21:24:55', 1, 'Other', 1, 1, 'Success'),
(200, '2017-05-07 21:24:57', 1, 'Other', 1, 1, 'Success'),
(201, '2017-05-07 21:24:59', 1, 'Other', 1, 1, 'Success'),
(202, '2017-05-07 21:25:07', 1, 'Other', 1, 1, 'Success'),
(203, '2017-05-07 21:25:09', 1, 'Other', 1, 1, 'Success'),
(204, '2017-05-07 21:25:10', 1, 'Other', 1, 1, 'Success'),
(205, '2017-05-07 21:25:12', 1, 'Other', 1, 1, 'Success'),
(206, '2017-05-07 21:25:13', 1, 'Other', 1, 1, 'Success'),
(207, '2017-05-07 21:25:15', 1, 'Other', 1, 1, 'Success'),
(208, '2017-05-07 21:25:17', 1, 'Other', 1, 1, 'Success'),
(209, '2017-05-07 21:25:18', 1, 'Other', 1, 1, 'Success'),
(210, '2017-05-07 21:25:20', 1, 'Other', 1, 1, 'Success'),
(211, '2017-05-07 21:25:21', 1, 'Other', 1, 1, 'Success'),
(212, '2017-05-07 21:27:55', 2, 'Other', 1, 1, 'Success'),
(213, '2017-05-07 21:27:57', 2, 'Other', 1, 1, 'Success'),
(214, '2017-05-07 21:27:58', 2, 'Other', 1, 1, 'Success'),
(215, '2017-05-07 21:28:00', 2, 'Other', 1, 1, 'Success'),
(216, '2017-05-07 21:28:07', 2, 'Other', 1, 1, 'Success'),
(217, '2017-05-07 21:28:08', 2, 'Other', 1, 1, 'Success'),
(218, '2017-05-07 21:28:10', 2, 'Other', 1, 1, 'Success'),
(219, '2017-05-07 21:28:11', 2, 'Other', 1, 1, 'Success'),
(220, '2017-05-07 21:29:55', 3, 'Other', 1, 1, 'Success'),
(221, '2017-05-07 21:29:57', 3, 'Other', 1, 1, 'Success'),
(222, '2017-05-07 21:29:58', 3, 'Other', 1, 1, 'Success'),
(223, '2017-05-07 21:30:00', 3, 'Other', 1, 1, 'Success'),
(224, '2017-05-07 21:31:53', 3, 'Other', 1, 1, 'Success'),
(225, '2017-05-07 21:31:55', 3, 'Other', 1, 1, 'Success'),
(226, '2017-05-07 21:31:56', 3, 'Other', 1, 1, 'Success'),
(227, '2017-05-07 21:31:58', 3, 'Other', 1, 1, 'Success'),
(228, '2017-05-07 21:32:00', 3, 'Other', 1, 1, 'Success'),
(229, '2017-05-07 21:32:07', 3, 'Other', 1, 1, 'Success'),
(230, '2017-05-07 21:32:09', 3, 'Other', 1, 1, 'Success'),
(231, '2017-05-07 21:32:40', 3, 'Other', 1, 1, 'Success'),
(232, '2017-05-07 21:32:42', 3, 'Other', 1, 1, 'Success'),
(233, '2017-05-07 21:32:44', 3, 'Other', 1, 1, 'Success'),
(234, '2017-05-07 21:32:45', 3, 'Other', 1, 1, 'Success'),
(235, '2017-05-07 21:32:47', 3, 'Other', 1, 1, 'Success'),
(236, '2017-05-07 21:32:49', 3, 'Other', 1, 1, 'Success'),
(237, '2017-05-07 21:35:51', 3, 'Other', 1, 1, 'Success'),
(238, '2017-05-07 21:35:53', 3, 'Other', 1, 1, 'Success'),
(239, '2017-05-07 21:35:54', 3, 'Other', 1, 1, 'Success'),
(240, '2017-05-07 21:35:56', 3, 'Other', 1, 1, 'Success'),
(241, '2017-05-07 21:35:58', 3, 'Other', 1, 1, 'Success'),
(242, '2017-05-07 21:36:00', 3, 'Other', 1, 1, 'Success'),
(243, '2017-05-07 21:36:33', 3, 'Other', 1, 1, 'Success'),
(244, '2017-05-07 21:36:35', 3, 'Other', 1, 1, 'Success'),
(245, '2017-05-07 21:36:37', 3, 'Other', 1, 1, 'Success'),
(246, '2017-05-07 21:36:39', 3, 'Other', 1, 1, 'Success'),
(247, '2017-05-07 21:36:40', 3, 'Other', 1, 1, 'Success'),
(248, '2017-05-07 21:36:42', 3, 'Other', 1, 1, 'Success'),
(249, '2017-05-07 21:36:45', 3, 'Other', 1, 1, 'Success'),
(250, '2017-05-07 21:36:47', 3, 'Other', 1, 1, 'Success'),
(251, '2017-05-07 21:42:27', 12, 'Other', 1, 1, 'Success'),
(252, '2017-05-07 21:42:30', 12, 'Other', 1, 1, 'Success'),
(253, '2017-05-07 21:42:32', 12, 'Other', 1, 1, 'Success'),
(254, '2017-05-07 21:42:35', 12, 'Other', 1, 1, 'Success'),
(255, '2017-05-07 21:42:38', 12, 'Other', 1, 1, 'Success'),
(256, '2017-05-07 21:42:40', 12, 'Other', 1, 1, 'Success'),
(257, '2017-05-07 21:43:53', 12, 'Other', 1, 1, 'Success'),
(258, '2017-05-07 21:43:55', 12, 'Other', 1, 1, 'Success'),
(259, '2017-05-07 21:43:58', 12, 'Other', 1, 1, 'Success'),
(260, '2017-05-07 22:09:32', 23, 'Other', 1, 1, 'Success'),
(261, '2017-05-08 04:48:07', 22, 'Other', 1, 1, 'Success'),
(262, '2017-05-08 05:01:42', 36, 'Other', 1, 1, 'Success'),
(263, '2017-05-08 05:01:47', 36, 'Other', 1, 1, 'Success'),
(264, '2017-05-08 05:02:37', 36, 'Other', 1, 1, 'Success'),
(265, '2017-05-08 05:02:38', 36, 'Other', 1, 1, 'Success'),
(266, '2017-05-08 05:02:40', 36, 'Other', 1, 1, 'Success'),
(267, '2017-05-08 05:02:42', 36, 'Other', 1, 1, 'Success'),
(268, '2017-05-08 05:02:44', 36, 'Other', 1, 1, 'Success'),
(269, '2017-05-08 05:02:46', 36, 'Other', 1, 1, 'Success'),
(270, '2017-05-08 05:02:47', 36, 'Other', 1, 1, 'Success'),
(271, '2017-05-08 05:02:49', 36, 'Other', 1, 1, 'Success'),
(272, '2017-05-08 05:02:52', 36, 'Other', 1, 1, 'Success'),
(273, '2017-05-08 05:02:53', 36, 'Other', 1, 1, 'Success'),
(274, '2017-05-08 05:02:55', 36, 'Other', 1, 1, 'Success'),
(275, '2017-05-08 05:02:57', 36, 'Other', 1, 1, 'Success'),
(276, '2017-05-08 05:02:59', 36, 'Other', 1, 1, 'Success'),
(277, '2017-05-08 05:03:01', 36, 'Other', 1, 1, 'Success'),
(278, '2017-05-08 05:03:07', 36, 'Other', 1, 1, 'Success'),
(279, '2017-05-08 05:28:16', 45, 'Other', 1, 1, 'Success'),
(280, '2017-05-08 05:28:18', 45, 'Other', 1, 1, 'Success'),
(281, '2017-05-08 05:28:20', 45, 'Other', 1, 1, 'Success'),
(282, '2017-05-08 05:28:22', 45, 'Other', 1, 1, 'Success'),
(283, '2017-05-08 05:28:24', 45, 'Other', 1, 1, 'Success'),
(284, '2017-05-08 05:28:25', 45, 'Other', 1, 1, 'Success'),
(285, '2017-05-08 05:28:27', 45, 'Other', 1, 1, 'Success'),
(286, '2017-05-08 05:28:29', 45, 'Other', 1, 1, 'Success'),
(287, '2017-05-08 05:28:31', 45, 'Other', 1, 1, 'Success'),
(288, '2017-05-08 05:28:33', 45, 'Other', 1, 1, 'Success'),
(289, '2017-05-08 05:28:34', 45, 'Other', 1, 1, 'Success'),
(290, '2017-05-08 05:28:36', 45, 'Other', 1, 1, 'Success'),
(291, '2017-05-08 05:28:38', 45, 'Other', 1, 1, 'Success'),
(292, '2017-05-08 05:28:40', 45, 'Other', 1, 1, 'Success'),
(293, '2017-05-08 05:28:42', 45, 'Other', 1, 1, 'Success'),
(294, '2017-05-08 05:28:43', 45, 'Other', 1, 1, 'Success'),
(295, '2017-05-08 05:28:45', 45, 'Other', 1, 1, 'Success'),
(296, '2017-05-08 05:28:47', 45, 'Other', 1, 1, 'Success'),
(297, '2017-05-08 05:28:49', 45, 'Other', 1, 1, 'Success'),
(298, '2017-05-08 05:28:51', 45, 'Other', 1, 1, 'Success'),
(299, '2017-05-08 05:28:52', 45, 'Other', 1, 1, 'Success'),
(300, '2017-05-08 05:28:54', 45, 'Other', 1, 1, 'Success'),
(301, '2017-05-08 05:28:56', 45, 'Other', 1, 1, 'Success'),
(302, '2017-05-08 05:28:58', 45, 'Other', 1, 1, 'Success'),
(303, '2017-05-08 05:29:00', 45, 'Other', 1, 1, 'Success'),
(304, '2017-05-08 05:29:07', 45, 'Other', 1, 1, 'Success'),
(305, '2017-05-08 05:29:08', 45, 'Other', 1, 1, 'Success'),
(306, '2017-05-08 05:29:10', 45, 'Other', 1, 1, 'Success'),
(307, '2017-05-08 05:29:12', 45, 'Other', 1, 1, 'Success'),
(308, '2017-05-08 05:29:14', 45, 'Other', 1, 1, 'Success'),
(309, '2017-05-08 05:29:16', 45, 'Other', 1, 1, 'Success'),
(310, '2017-05-08 05:29:18', 45, 'Other', 1, 1, 'Success'),
(311, '2017-05-08 05:29:19', 45, 'Other', 1, 1, 'Success'),
(312, '2017-05-08 05:29:21', 45, 'Other', 1, 1, 'Success'),
(313, '2017-05-08 05:29:23', 45, 'Other', 1, 1, 'Success'),
(314, '2017-05-08 05:29:25', 45, 'Other', 1, 1, 'Success'),
(315, '2017-05-08 05:29:27', 45, 'Other', 1, 1, 'Success'),
(316, '2017-05-08 05:29:29', 45, 'Other', 1, 1, 'Success'),
(317, '2017-05-08 05:29:30', 45, 'Other', 1, 1, 'Success'),
(318, '2017-05-08 05:29:32', 45, 'Other', 1, 1, 'Success'),
(319, '2017-05-08 05:29:34', 45, 'Other', 1, 1, 'Success'),
(320, '2017-05-08 05:29:36', 45, 'Other', 1, 1, 'Success'),
(321, '2017-05-08 05:29:38', 45, 'Other', 1, 1, 'Success'),
(322, '2017-05-08 05:29:40', 45, 'Other', 1, 1, 'Success'),
(323, '2017-05-08 05:29:41', 45, 'Other', 1, 1, 'Success'),
(324, '2017-05-08 05:29:43', 45, 'Other', 1, 1, 'Success'),
(325, '2017-05-08 05:29:45', 45, 'Other', 1, 1, 'Success'),
(326, '2017-05-08 05:29:47', 45, 'Other', 1, 1, 'Success'),
(327, '2017-05-08 05:29:48', 45, 'Other', 1, 1, 'Success'),
(328, '2017-05-08 05:29:50', 45, 'Other', 1, 1, 'Success'),
(329, '2017-05-08 05:29:52', 45, 'Other', 1, 1, 'Success'),
(330, '2017-05-08 05:29:54', 45, 'Other', 1, 1, 'Success'),
(331, '2017-05-08 05:29:56', 45, 'Other', 1, 1, 'Success'),
(332, '2017-05-08 05:29:57', 45, 'Other', 1, 1, 'Success'),
(333, '2017-05-08 05:29:59', 45, 'Other', 1, 1, 'Success'),
(334, '2017-05-08 05:30:01', 45, 'Other', 1, 1, 'Success'),
(335, '2017-05-08 05:30:07', 45, 'Other', 1, 1, 'Success'),
(336, '2017-05-08 05:30:10', 45, 'Other', 1, 1, 'Success'),
(337, '2017-05-08 05:30:12', 45, 'Other', 1, 1, 'Success'),
(338, '2017-05-08 05:30:14', 45, 'Other', 1, 1, 'Success'),
(339, '2017-05-08 05:30:16', 45, 'Other', 1, 1, 'Success'),
(340, '2017-05-08 05:30:17', 45, 'Other', 1, 1, 'Success'),
(341, '2017-05-08 05:30:19', 45, 'Other', 1, 1, 'Success'),
(342, '2017-05-08 05:30:21', 45, 'Other', 1, 1, 'Success'),
(343, '2017-05-08 05:30:23', 45, 'Other', 1, 1, 'Success'),
(344, '2017-05-26 10:17:50', 21, 'Other', 1, 1, 'Success'),
(345, '2017-05-26 10:17:57', 21, 'Other', 1, 1, 'Success'),
(346, '2017-05-26 10:18:08', 21, 'Other', 1, 1, 'Success'),
(347, '2017-05-26 10:18:08', 21, 'Other', 1, 1, 'Success'),
(348, '2017-05-26 10:18:10', 21, 'Other', 1, 1, 'Success'),
(349, '2017-05-26 10:18:18', 21, 'Other', 1, 1, 'Success'),
(350, '2017-05-26 10:18:26', 21, 'Other', 1, 1, 'Success'),
(351, '2017-05-26 10:22:00', 19, 'Other', 1, 1, 'Success');

-- --------------------------------------------------------

--
-- Table structure for table `retailer`
--

CREATE TABLE `retailer` (
  `RID` bigint(30) UNSIGNED NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(72) NOT NULL,
  `phone` bigint(10) UNSIGNED NOT NULL,
  `email` varchar(50) NOT NULL,
  `balance` bigint(10) UNSIGNED NOT NULL,
  `PIN` int(4) UNSIGNED NOT NULL,
  `status` int(1) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `retailer`
--

INSERT INTO `retailer` (`RID`, `username`, `password`, `phone`, `email`, `balance`, `PIN`, `status`) VALUES
(5, 'MainCanteen', '$2y$12$l4u7Ll5rczeu9QgdDbQgAeNApPddKVwShu2VRWq2k/BzJTgFr2f4K', 9999999999, 'maincanteen@bvb.edu', 500, 2222, 0),
(4, 'LHCCanteen', '$2y$12$4BNXItcZknyevQY8.gkmueTNPc3Ze9sFeULtZsgoZeeS7Nc3m.2jq', 7777777777, 'lhccanteen@bvb.edu', 1000, 1111, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UID` bigint(30) UNSIGNED NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(72) NOT NULL,
  `profile_photo` varchar(300) NOT NULL,
  `phone` bigint(10) UNSIGNED NOT NULL,
  `email` varchar(50) NOT NULL,
  `balance` bigint(10) UNSIGNED NOT NULL,
  `RFID` varchar(30) NOT NULL,
  `PIN` int(4) UNSIGNED NOT NULL,
  `status` int(1) UNSIGNED NOT NULL,
  `forgotpass` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UID`, `username`, `password`, `profile_photo`, `phone`, `email`, `balance`, `RFID`, `PIN`, `status`, `forgotpass`) VALUES
(1, '2BV14IS114', '$2y$12$teaDtkAL.EvVLBcN4QWYTeS0jIgbprmOtOhjmnLee1/z7Hh5PKMma', '1499129553Thumbnail_User_Original_21441_IMG_1513.JPG', 9591104023, 'vtvishwanathbhat@gmail.com', 89712, '820039667AA7', 5555, 0, ''),
(2, '2bv14ec050', '$2y$12$udQD2NdKcKU0PAcoo/8pj.pty99pcPj1Zu43zWutixoJvtGLSm0Fu', '1494182371Thumbnail_User_Original_21755_IMG_2577.JPG', 7829506322, 'monikaahhvr@gmail.com', 788, '455612237889', 6666, 0, ''),
(10, '2bv14ei027', '$2y$12$vvtXYQk4Fh2LuCt9J1bIMOpvQvTnt.4oeo1cw4a1CLgF3jSBBNbCu', '1494182699Thumbnail_User_Original_21160_IMG_0819.JPG', 8951697387, 'chetanarc25@gmail.com', 1500, '123456789012', 7777, 0, ''),
(11, '2bv15ec421', '$2y$12$/oxxvkGknOkPthz8hxzd/O7WbDm7VAJZmwrVe1nn.iZjwjdP.Z6Ym', '1494182878Thumbnail_User_Original_22946_priyanka tubakad.jpg', 9740652534, 'priyankatubakad99@gmail.com', 1242, '987654321098', 8888, 0, ''),
(12, '2bv14is065', '$2y$12$ir8hbgTQQszDpgIFDec0sutSnugX7cpvRa5C0LuZ7izUkSowcdkCa', '149474354414370361_967101723399820_173141871038360659_n.jpg', 9482315243, 'pavansreekanth6@gmai.com', 9999999999, '012345678923', 7777, 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`AID`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`BID`),
  ADD KEY `rid_bill` (`RID`),
  ADD KEY `uid_bill` (`UID`);

--
-- Indexes for table `retailer`
--
ALTER TABLE `retailer`
  ADD PRIMARY KEY (`RID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `AID` bigint(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `BID` bigint(30) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=352;
--
-- AUTO_INCREMENT for table `retailer`
--
ALTER TABLE `retailer`
  MODIFY `RID` bigint(30) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UID` bigint(30) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
