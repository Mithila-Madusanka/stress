-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2024 at 12:11 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stress`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `nic` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `added_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `dob`, `nic`, `email`, `password`, `status`, `type`, `added_by`, `added_at`, `updated_by`, `updated_at`) VALUES
(1, 'Mithila', 'Madusanka', '2024-03-10', '965847854V', 'mithila@gmail.com', '013a01a6b935de5f7933a64396e1e5608caf29ff5d1145c5cc621f6cc916f850301200c27913e7861f0358559a97eaa0d7360ad65667a2ca7f6409cc25126a52PHoOSFjaRakuuzfMPLC2gGQBe3a/v0K2OZW7kSBAywY=', 'CONFIRMED', 'SUPER', 1, '2024-03-10 14:19:12', 1, '2024-03-16 09:29:27'),
(6, 'Kaml sample', 'Perera', '2024-03-03', '85625362V', 'kamal@gmail.com', '013a01a6b935de5f7933a64396e1e5608caf29ff5d1145c5cc621f6cc916f850301200c27913e7861f0358559a97eaa0d7360ad65667a2ca7f6409cc25126a52PHoOSFjaRakuuzfMPLC2gGQBe3a/v0K2OZW7kSBAywY=', 'CONFIRMED', 'NORMAL', 1, '2024-03-16 23:21:19', 6, '2024-03-16 23:23:22'),
(13, 'ABC', 'DEF', '0000-00-00', 'DEF', 'test@abc.com', '99a199f8399a59d742b0b0239a519c7bf0f7f746403c170e182289e2425e96ec5700d1d1d305e03b4fe26892d88e6a9a02f9f5abd202cc12c222c0b4b2d01bf0d/f7Mi/WhyYnhw7RQtMlfMcY3K448c8uhhbkr0OlYXg=', 'CONFIRMED', 'NORMAL', 1, '2023-04-28 07:01:00', NULL, NULL),
(7, 'manuja', 'prasanna', '2024-02-25', '525632562', 'manuja@gmail.com', '013a01a6b935de5f7933a64396e1e5608caf29ff5d1145c5cc621f6cc916f850301200c27913e7861f0358559a97eaa0d7360ad65667a2ca7f6409cc25126a52PHoOSFjaRakuuzfMPLC2gGQBe3a/v0K2OZW7kSBAywY=', 'CONFIRMED', 'SUPER', 1, '2024-03-17 02:37:25', NULL, NULL),
(8, 'kasun', 'nirmal', '2024-03-06', '5682235V', 'kasun@gmail.com', '013a01a6b935de5f7933a64396e1e5608caf29ff5d1145c5cc621f6cc916f850301200c27913e7861f0358559a97eaa0d7360ad65667a2ca7f6409cc25126a52PHoOSFjaRakuuzfMPLC2gGQBe3a/v0K2OZW7kSBAywY=', 'CONFIRMED', 'SUPER', 1, '2024-03-17 02:43:53', NULL, NULL),
(9, 'Amila', 'pathum', '2024-03-05', '856253625', 'amila@gmail.com', '013a01a6b935de5f7933a64396e1e5608caf29ff5d1145c5cc621f6cc916f850301200c27913e7861f0358559a97eaa0d7360ad65667a2ca7f6409cc25126a52PHoOSFjaRakuuzfMPLC2gGQBe3a/v0K2OZW7kSBAywY=', 'CONFIRMED', 'SUPER', 1, '2024-03-17 02:46:02', NULL, NULL),
(10, 'kasun', 'bbb', '2024-03-05', '1256859', 'kasun@gmail.com', '12345', 'CONFIRMED', 'SUPER', 1, '2024-03-17 02:48:32', NULL, NULL),
(14, 'Amal', 'Perera', '1969-05-25', '695842354V', 'amal@gmail.com', '9f43dfe922a92831013a44dbd50a497f1b605920921612207d85b516e19ff750176d40757567a49e47a056a9fe87182c934393ab75913d87c9cfb1181f630ae0YhQ3FB67OIv7NTTg+yvu6H8Za8nGltsYDApnJ2EB2FA=', 'CONFIRMED', 'SUPER', 1, '2024-04-23 06:01:17', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `best_practise`
--

CREATE TABLE `best_practise` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `level` varchar(20) DEFAULT NULL,
  `add_by` int(11) DEFAULT NULL,
  `add_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `best_practise`
--

INSERT INTO `best_practise` (`id`, `title`, `description`, `level`, `add_by`, `add_at`) VALUES
(1, 'Breathing Exercises 2', 'Take deep breaths in and out, focusing on your breath to calm your mind.', 'LOW', 10, '2024-04-11 11:03:39'),
(3, 'Test 1', 'sadsdsd', 'MID', 10, '2024-04-11 11:11:55'),
(4, 'Test 3', 'My name is ', 'MID', 10, '2024-04-11 11:13:15'),
(5, 'Test 1', 'sdsd', 'HIGH', 10, '2024-04-11 11:13:23'),
(6, 'Sleeping', 'Sample text', 'LOW', 10, '2024-04-15 13:02:47'),
(8, 'ABC', 'TEST QUOTA', 'LOW', 10, '2024-04-23 12:31:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `user_type` varchar(20) DEFAULT NULL,
  `mobile` int(11) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `registered_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `user_type`, `mobile`, `password`, `registered_at`) VALUES
(1, 'Madushan', 'madushan@gmail.com', 'EMPLOYEE', 769763520, '013a01a6b935de5f7933a64396e1e5608caf29ff5d1145c5cc621f6cc916f850301200c27913e7861f0358559a97eaa0d7360ad65667a2ca7f6409cc25126a52PHoOSFjaRakuuzfMPLC2gGQBe3a/v0K2OZW7kSBAywY=', '2024-04-20 06:38:58'),
(2, 'Mithila', 'mithila@gmail.com', 'STUDENT', 785456325, '013a01a6b935de5f7933a64396e1e5608caf29ff5d1145c5cc621f6cc916f850301200c27913e7861f0358559a97eaa0d7360ad65667a2ca7f6409cc25126a52PHoOSFjaRakuuzfMPLC2gGQBe3a/v0K2OZW7kSBAywY=', '2024-04-20 06:47:10'),
(3, 'amal', 'amal@gmail.com', 'STUDENT', 759913078, 'faac89f3e7b5eff0bcf6db09adb73a2d17bdc583df56571b44c1064c0fe756f11066301e453fb5318ad0c55379616c3ad15360609dea718e7288215096462af4e8X+8l06Cb9LpmAnFjf1aXz7OWjktBt856twJz3RtPE=', '2024-04-22 15:02:51'),
(4, 'ABC', 'abc@gmail.com', 'STUDENT', 123456789, 'f10eec5517c7aff71d66c10e31ae86ca9c9b1055f8d27cb542a3e81fd86b5e5afd5fb718f5bee3a9f086402f5aa1b94393c5beac86b4a9ba16ef080b761c4dceSRq78XGBh0C0evBkrRoIp0vS8+Cx93O4IxWw9Rz+qyU=', '2023-04-28 12:31:00'),
(5, 'ABC', 'abc@gmail.com', 'STUDENT', 123456789, '677cbd783e257ff6138414aab47f83ef4a66a4f434ac3eb5a80a64b0fb9149d4f83014c62168af32788857a3cb3905f716bbb32aa033474c8d8aedae801a4636Z8lso3TgDWRlcQ7KqrixRo29gP1vhly77TAGzLW9g5k=', '2023-04-28 12:31:00'),
(6, 'Mithila', 'abcd@gmail.com', 'STUDENT', 7, '59d6ecf932e10cd071371300017ee2b7d1716de3bd405007db55a046cd6d5cde5f207654d248e07ad79b3548b26b26d68aa9df47d32f59ce97bb8dd9ce02ef78MbWIddpF90oXD65gXJ01ySWXiTB0OBdijtESAqZ7Z3c=', '2024-04-23 10:04:21'),
(9, 'Madushan', 'abcde@gmail.com', 'STUDENT', 2147483647, '5ce8e522a7a0ee714d83a7dfe0d1d768924d3463f540ed888f12abff9caa14f9df7d381a2ae8e731b2d9793f0bd3c47cccdd01952a05cadbfb705310cc1a1a8ctW8Qy5E59Y+991dxNmEObTTA8l3DNADcjz+sO/NsPKI=', '2024-04-23 10:41:56'),
(10, 'Madushan', 'abcdef@gmail.com', 'STUDENT', 5, '59d6ecf932e10cd071371300017ee2b7d1716de3bd405007db55a046cd6d5cde5f207654d248e07ad79b3548b26b26d68aa9df47d32f59ce97bb8dd9ce02ef78MbWIddpF90oXD65gXJ01ySWXiTB0OBdijtESAqZ7Z3c=', '2024-04-23 10:51:54'),
(11, 'JJ', 'jj@gmail.com', 'STUDENT', 2, 'cd3e59c16733e5eb335ca2a8fb74fbba4d01458942763b015d0e093b5bdae89dd525ae667df1b78a8ab1b33495a753d3f1cde62741bd8fb56acb35097e27f2e4FKI3Kroa1N4EYsxTTz60jOmgvTz4lcw7hkU6v94hh70=', '2024-04-23 11:01:33'),
(12, 'KK', 'kk@gmail.com', 'STUDENT', 5, '8a7f96c027f969b3a050c185947b54d99dfaa5f00f9505791a63a09983256299ed6efb5061ea851d093f094ba58f8851ba0916e873dc426665263c28e44a0a8741YYpbZNxiLz9u10kZ87u293pZuPNew3LinA5ZQpiDE=', '2024-04-23 11:04:58'),
(13, 'SS', 'SS@gmail.com', 'STUDENT', 5, '4aab0ffcf93f713b8e480e922e96b6f1f28cee8cb64a424a508a1a1a21728b555090dac990f070392808ba7d594014c69359788a701b6ae7b9c87d483c9fa6ecWs9VTtIS4M2P4B5jq3fq7j2eHzmIRd32DfULpDdulrM=', '2024-04-23 11:05:47'),
(14, 'KKJ', 'kkj@gmail.com', 'STUDENT', 4, '39697798c93a11b4cd8a7ea7d33c1bb27ab27536eedbee9b4a0b7b93d612cd939303aca956b8784d7137a12a34f4c92f0e22e902eaaa8571b85a30e1b35233c4Zby/gnNO/xFEk1viFNIO7xBwCa906n0c3mTe1ap+plo=', '2024-04-23 11:07:29'),
(15, 'KKL', 'kkl@gmail.com', 'STUDENT', 2147483647, '773f92d4ed173f53b371b18a277872c1d3d7be325114ebbb1f6667fde4b1ddab0c17631c4e94c193f95d0208b334cf270af6e943d1535bec184689abc6f47018UVWGyVWsD7x3yuP/iG21R6e12A5sMXsq5G54CCyEbgk=', '2024-04-23 11:40:14');

-- --------------------------------------------------------

--
-- Table structure for table `user_records`
--

CREATE TABLE `user_records` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `stress_level` int(11) DEFAULT NULL,
  `saved_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_records`
--

INSERT INTO `user_records` (`id`, `user_id`, `stress_level`, `saved_at`) VALUES
(1, 1, 7, '2024-04-20 06:38:58'),
(3, 2, 3, '2024-04-17 06:47:10'),
(4, 2, 4, '2024-04-18 06:48:28'),
(5, 2, 2, '2024-04-20 08:48:21'),
(6, 1, 7, '2024-04-20 08:52:09'),
(8, 6, 5, '2024-04-23 10:04:21'),
(9, 7, 3, '2024-04-23 10:24:45'),
(10, 8, 1, '2024-04-23 10:26:17'),
(11, 9, 1, '2024-04-23 10:41:56'),
(12, 10, 2, '2024-04-23 10:51:54'),
(13, 6, 1, '2024-04-23 10:55:34'),
(14, 11, 1, '2024-04-23 11:01:33'),
(15, 12, 1, '2024-04-23 11:04:58'),
(16, 13, 1, '2024-04-23 11:05:47'),
(17, 14, 1, '2024-04-23 11:07:29'),
(18, 15, 1, '2024-04-23 11:40:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `best_practise`
--
ALTER TABLE `best_practise`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_records`
--
ALTER TABLE `user_records`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `best_practise`
--
ALTER TABLE `best_practise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_records`
--
ALTER TABLE `user_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
