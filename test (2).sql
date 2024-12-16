-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 14, 2024 at 02:29 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `jawaban_soal`
--

CREATE TABLE `jawaban_soal` (
  `id_jawaban_soal` int NOT NULL,
  `id_soal` int NOT NULL,
  `jawaban_soal` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jawaban_soal`
--

INSERT INTO `jawaban_soal` (`id_jawaban_soal`, `id_soal`, `jawaban_soal`) VALUES
(56, 19, 'bag1_1a.png'),
(57, 19, 'bag1_1b.png'),
(58, 19, 'bag1_1c.png'),
(59, 19, 'bag1_1d.png'),
(60, 19, 'bag1_1e.png'),
(61, 19, 'bag1_1f.png'),
(62, 20, 'bag1_2a.png'),
(63, 20, 'bag1_2b.png'),
(64, 20, 'bag1_2c.png'),
(65, 20, 'bag1_2d.png'),
(66, 20, 'bag1_2e.png'),
(67, 20, 'bag1_2f.png'),
(68, 21, 'bag1_3a.png'),
(69, 21, 'bag1_3b.png'),
(70, 21, 'bag1_3c.png'),
(71, 21, 'bag1_3d.png'),
(72, 21, 'bag1_3e.png'),
(73, 21, 'bag1_3f.png'),
(74, 22, 'bag1_4a.png'),
(75, 22, 'bag1_4b.png'),
(76, 22, 'bag1_4c.png'),
(77, 22, 'bag1_4d.png'),
(78, 22, 'bag1_4e.png'),
(79, 22, 'bag1_4f.png'),
(80, 23, 'bag1_5a.png'),
(81, 23, 'bag1_5b.png'),
(82, 23, 'bag1_5c.png'),
(83, 23, 'bag1_5d.png'),
(84, 23, 'bag1_5e.png'),
(85, 23, 'bag1_5f.png'),
(86, 24, 'bag1_6a.png'),
(87, 24, 'bag1_6b.png'),
(88, 24, 'bag1_6c.png'),
(89, 24, 'bag1_6d.png'),
(90, 24, 'bag1_6e.png'),
(91, 24, 'bag1_6f.png'),
(92, 25, 'bag1_7a.png'),
(93, 25, 'bag1_7b.png'),
(94, 25, 'bag1_7c.png'),
(95, 25, 'bag1_7d.png'),
(96, 25, 'bag1_7e.png'),
(97, 25, 'bag1_7f.png'),
(98, 26, 'bag1_8a.png'),
(99, 26, 'bag1_8b.png'),
(100, 26, 'bag1_8c.png'),
(101, 26, 'bag1_8d.png'),
(102, 26, 'bag1_8e.png'),
(103, 26, 'bag1_8f.png'),
(104, 27, 'bag1_9a.png'),
(105, 27, 'bag1_9b.png'),
(106, 27, 'bag1_9c.png'),
(107, 27, 'bag1_9d.png'),
(108, 27, 'bag1_9e.png'),
(109, 27, 'bag1_9f.png'),
(110, 28, 'bag1_10a.png'),
(111, 28, 'bag1_10b.png'),
(112, 28, 'bag1_10c.png'),
(113, 28, 'bag1_10d.png'),
(114, 28, 'bag1_10e.png'),
(115, 28, 'bag1_10f.png'),
(116, 29, 'bag1_11a.png'),
(117, 29, 'bag1_11b.png'),
(118, 29, 'bag1_11c.png'),
(119, 29, 'bag1_11d.png'),
(120, 29, 'bag1_11e.png'),
(121, 29, 'bag1_11f.png'),
(122, 30, 'bag1_12a.png'),
(123, 30, 'bag1_12b.png'),
(124, 30, 'bag1_12c.png'),
(125, 30, 'bag1_12d.png'),
(126, 30, 'bag1_12e.png'),
(127, 30, 'bag1_12f.png'),
(128, 31, 'bag1_13a.png'),
(129, 31, 'bag1_13b.png'),
(130, 31, 'bag1_13c.png'),
(131, 31, 'bag1_13d.png'),
(132, 31, 'bag1_13e.png'),
(133, 31, 'bag1_13f.png'),
(134, 33, 'bag2_1a.png'),
(135, 33, 'bag2_1b.png'),
(136, 33, 'bag2_1c.png'),
(137, 33, 'bag2_1d.png'),
(138, 33, 'bag2_1e.png'),
(140, 34, 'bag2_2a.png'),
(141, 34, 'bag2_2b.png'),
(142, 34, 'bag2_2c.png'),
(143, 34, 'bag2_2d.png'),
(144, 34, 'bag2_2e.png'),
(146, 35, 'bag2_3a.png'),
(147, 35, 'bag2_3b.png'),
(148, 35, 'bag2_3c.png'),
(149, 35, 'bag2_3d.png'),
(150, 35, 'bag2_3e.png'),
(152, 36, 'bag2_4a.png'),
(153, 36, 'bag2_4b.png'),
(154, 36, 'bag2_4c.png'),
(155, 36, 'bag2_4d.png'),
(156, 36, 'bag2_4e.png'),
(158, 37, 'bag2_5a.png'),
(159, 37, 'bag2_5b.png'),
(160, 37, 'bag2_5c.png'),
(161, 37, 'bag2_5d.png'),
(162, 37, 'bag2_5e.png'),
(164, 38, 'bag2_6a.png'),
(165, 38, 'bag2_6b.png'),
(166, 38, 'bag2_6c.png'),
(167, 38, 'bag2_6d.png'),
(168, 38, 'bag2_6e.png'),
(170, 39, 'bag2_7a.png'),
(171, 39, 'bag2_7b.png'),
(172, 39, 'bag2_7c.png'),
(173, 39, 'bag2_7d.png'),
(174, 39, 'bag2_7e.png'),
(176, 40, 'bag2_8a.png'),
(177, 40, 'bag2_8b.png'),
(178, 40, 'bag2_8c.png'),
(179, 40, 'bag2_8d.png'),
(180, 40, 'bag2_8e.png'),
(182, 41, 'bag2_9a.png'),
(183, 41, 'bag2_9b.png'),
(184, 41, 'bag2_9c.png'),
(185, 41, 'bag2_9d.png'),
(186, 41, 'bag2_9e.png'),
(188, 42, 'bag2_10a.png'),
(189, 42, 'bag2_10b.png'),
(190, 42, 'bag2_10c.png'),
(191, 42, 'bag2_10d.png'),
(192, 42, 'bag2_10e.png'),
(194, 43, 'bag2_11a.png'),
(195, 43, 'bag2_11b.png'),
(196, 43, 'bag2_11c.png'),
(197, 43, 'bag2_11d.png'),
(198, 43, 'bag2_11e.png'),
(200, 44, 'bag2_12a.png'),
(201, 44, 'bag2_12b.png'),
(202, 44, 'bag2_12c.png'),
(203, 44, 'bag2_12d.png'),
(204, 44, 'bag2_12e.png'),
(206, 45, 'bag2_13a.png'),
(207, 45, 'bag2_13b.png'),
(208, 45, 'bag2_13c.png'),
(209, 45, 'bag2_13d.png'),
(210, 45, 'bag2_13e.png'),
(212, 46, 'bag2_14a.png'),
(213, 46, 'bag2_14b.png'),
(214, 46, 'bag2_14c.png'),
(215, 46, 'bag2_14d.png'),
(216, 46, 'bag2_14e.png'),
(218, 48, 'bag3_1.a.png'),
(220, 48, 'bag3_1.b.png'),
(221, 48, 'bag3_1.c.png'),
(222, 48, 'bag3_1.d.png'),
(223, 48, 'bag3_1.e.png'),
(224, 48, 'bag3_1.f.png'),
(225, 56, 'bag3_2.a.png'),
(226, 56, 'bag3_2.b.png'),
(227, 56, 'bag3_2.c.png'),
(228, 56, 'bag3_2.d.png'),
(229, 56, 'bag3_2.e.png'),
(230, 56, 'bag3_2.f.png'),
(231, 57, 'bag3_3.a.png'),
(232, 57, 'bag3_3.b.png'),
(233, 57, 'bag3_3.c.png'),
(234, 57, 'bag3_3.d.png'),
(235, 57, 'bag3_3.e.png'),
(236, 57, 'bag3_3.f.png'),
(237, 58, 'bag3_4.a.png'),
(238, 58, 'bag3_4.b.png'),
(239, 58, 'bag3_4.c.png'),
(240, 58, 'bag3_4.d.png'),
(241, 58, 'bag3_4.e.png'),
(242, 58, 'bag3_4.f.png'),
(243, 59, 'bag3_5.a.png'),
(244, 59, 'bag3_5.b.png'),
(245, 59, 'bag3_5.c.png'),
(246, 59, 'bag3_5.d.png'),
(247, 59, 'bag3_5.e.png'),
(248, 59, 'bag3_5.f.png'),
(249, 60, 'bag3_6.a.png'),
(250, 60, 'bag3_6.b.png'),
(251, 60, 'bag3_6.c.png'),
(252, 60, 'bag3_6.d.png'),
(253, 60, 'bag3_6.e.png'),
(254, 60, 'bag3_6.f.png'),
(255, 61, 'bag3_7.a.png'),
(256, 61, 'bag3_7.b.png'),
(257, 61, 'bag3_7.c.png'),
(258, 61, 'bag3_7.d.png'),
(259, 61, 'bag3_7.e.png'),
(260, 61, 'bag3_7.f.png'),
(261, 62, 'bag3_8.a.png'),
(262, 62, 'bag3_8.b.png'),
(263, 62, 'bag3_8.c.png'),
(264, 62, 'bag3_8.d.png'),
(265, 62, 'bag3_8.e.png'),
(266, 62, 'bag3_8.f.png'),
(267, 63, 'bag3_9.a.png'),
(268, 63, 'bag3_9.b.png'),
(269, 63, 'bag3_9.c.png'),
(270, 63, 'bag3_9.d.png'),
(271, 63, 'bag3_9.e.png'),
(272, 63, 'bag3_9.f.png'),
(273, 64, 'bag3_10.a.png'),
(274, 64, 'bag3_10.b.png'),
(275, 64, 'bag3_10.c.png'),
(276, 64, 'bag3_10.d.png'),
(277, 64, 'bag3_10.e.png'),
(278, 64, 'bag3_10.f.png'),
(279, 65, 'bag3_11.a.png'),
(280, 65, 'bag3_11.b.png'),
(281, 65, 'bag3_11.c.png'),
(282, 65, 'bag3_11.d.png'),
(283, 65, 'bag3_11.e.png'),
(284, 65, 'bag3_11.f.png'),
(285, 66, 'bag3_12.a.png'),
(286, 66, 'bag3_12.b.png'),
(287, 66, 'bag3_12.c.png'),
(288, 66, 'bag3_12.d.png'),
(289, 66, 'bag3_12.e.png'),
(290, 66, 'bag3_12.f.png'),
(291, 67, 'bag3_13.a.png'),
(292, 67, 'bag3_13.b.png'),
(293, 67, 'bag3_13.c.png'),
(294, 67, 'bag3_13.d.png'),
(295, 67, 'bag3_13.e.png'),
(296, 67, 'bag3_13.f.png'),
(297, 69, 'bag4_1a.png'),
(298, 69, 'bag4_1b.png'),
(299, 69, 'bag4_1c.png'),
(300, 69, 'bag4_1d.png'),
(301, 69, 'bag4_1e.png'),
(303, 70, 'bag4_2a.png'),
(304, 70, 'bag4_2b.png'),
(305, 70, 'bag4_2c.png'),
(306, 70, 'bag4_2d.png'),
(307, 70, 'bag4_2e.png'),
(309, 71, 'bag4_3a.png'),
(310, 71, 'bag4_3b.png'),
(311, 71, 'bag4_3c.png'),
(312, 71, 'bag4_3d.png'),
(313, 71, 'bag4_3e.png'),
(315, 72, 'bag4_4a.png'),
(316, 72, 'bag4_4b.png'),
(317, 72, 'bag4_4c.png'),
(318, 72, 'bag4_4d.png'),
(319, 72, 'bag4_4e.png'),
(321, 73, 'bag4_5a.png'),
(322, 73, 'bag4_5b.png'),
(323, 73, 'bag4_5c.png'),
(324, 73, 'bag4_5d.png'),
(325, 73, 'bag4_5e.png'),
(327, 74, 'bag4_6a.png'),
(328, 74, 'bag4_6b.png'),
(329, 74, 'bag4_6c.png'),
(330, 74, 'bag4_6d.png'),
(331, 74, 'bag4_6e.png'),
(333, 75, 'bag4_7a.png'),
(334, 75, 'bag4_7b.png'),
(335, 75, 'bag4_7c.png'),
(336, 75, 'bag4_7d.png'),
(337, 75, 'bag4_7e.png'),
(339, 76, 'bag4_8a.png'),
(340, 76, 'bag4_8b.png'),
(341, 76, 'bag4_8c.png'),
(342, 76, 'bag4_8d.png'),
(343, 76, 'bag4_8e.png'),
(345, 77, 'bag4_9a.png'),
(346, 77, 'bag4_9b.png'),
(347, 77, 'bag4_9c.png'),
(348, 77, 'bag4_9d.png'),
(349, 77, 'bag4_9e.png'),
(351, 78, 'bag4_10a.png'),
(352, 78, 'bag4_10b.png'),
(353, 78, 'bag4_10c.png'),
(354, 78, 'bag4_10d.png'),
(355, 78, 'bag4_10e.png');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_soal`
--

CREATE TABLE `jenis_soal` (
  `id_jenis_soal` int NOT NULL,
  `nama_jenis_soal` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tipe_soal` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenis_soal`
--

INSERT INTO `jenis_soal` (`id_jenis_soal`, `nama_jenis_soal`, `tipe_soal`) VALUES
(1, 'CFIT 3A', 'cfit');

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id_perusahaan` int NOT NULL,
  `nama_perusahaan` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int NOT NULL,
  `nama_role` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `nama_role`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `id_soal` int NOT NULL,
  `id_jenis_soal` int NOT NULL,
  `isi_soal` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `id_jawaban_soal` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`id_soal`, `id_jenis_soal`, `isi_soal`, `id_jawaban_soal`) VALUES
(18, 1, 'bag1_contoh soal.png', NULL),
(19, 1, 'bag1_soal1.png', 57),
(20, 1, 'bag1_soal2.png', 64),
(21, 1, 'bag1_soal3.png', 69),
(22, 1, 'bag1_soal4.png', 75),
(23, 1, 'bag1_soal5.png', 84),
(24, 1, 'bag1_soal6.png', 89),
(25, 1, 'bag1_soal7.png', 95),
(26, 1, 'bag1_soal8.png', 99),
(27, 1, 'bag1_soal9.png', 109),
(28, 1, 'bag1_soal10.png', 110),
(29, 1, 'bag1_soal11.png', 117),
(30, 1, 'bag1_soal12.png', 123),
(31, 1, 'bag1_soal13.png', 130),
(32, 1, 'bag2_contoh soal.png', NULL),
(33, 1, 'bag2_soal1.png', 134),
(34, 1, 'bag2_soal2.png', 141),
(35, 1, 'bag2_soal3.png', 147),
(36, 1, 'bag2_soal4.png', 153),
(37, 1, 'bag2_soal5.png', 158),
(38, 1, 'bag2_soal6.png', 168),
(39, 1, 'bag2_soal7.png', 171),
(40, 1, 'bag2_soal8.png', 177),
(41, 1, 'bag2_soal9.png', 184),
(42, 1, 'bag2_soal10.png', 189),
(43, 1, 'bag2_soal11.png', 195),
(44, 1, 'bag2_soal12.png', 203),
(45, 1, 'bag2_soal13.png', 206),
(46, 1, 'bag2_soal14.png', 216),
(47, 1, 'bag3_contoh soal.png', NULL),
(48, 1, 'bag3_soal.1.png', 223),
(56, 1, 'bag3_soal.2.png', 229),
(57, 1, 'bag3_soal.3.png', 235),
(58, 1, 'bag3_soal.4.png', 238),
(59, 1, 'bag3_soal.5.png', 245),
(60, 1, 'bag3_soal.6.png', 252),
(61, 1, 'bag3_soal.7.png', 259),
(62, 1, 'bag3_soal.8.png', 265),
(63, 1, 'bag3_soal.9.png', 271),
(64, 1, 'bag3_soal.10.png', 274),
(65, 1, 'bag3_soal.11.png', 281),
(66, 1, 'bag3_soal.12.png', 289),
(67, 1, 'bag3_soal.13.png', 291),
(68, 1, 'bag4_contoh soal.png', NULL),
(69, 1, 'bag4_soal1.png', 298),
(70, 1, 'bag4_soal2.png', 303),
(71, 1, 'bag4_soal3.png', 312),
(72, 1, 'bag4_soal4.png', 318),
(73, 1, 'bag4_soal5.png', 321),
(74, 1, 'bag4_soal6.png', 327),
(75, 1, 'bag4_soal7.png', 335),
(76, 1, 'bag4_soal8.png', 341),
(77, 1, 'bag4_soal9.png', 345),
(78, 1, 'bag4_soal10.png', 351);

-- --------------------------------------------------------

--
-- Table structure for table `soal_ujian`
--

CREATE TABLE `soal_ujian` (
  `id_soal_ujian` int NOT NULL,
  `id_test` int NOT NULL,
  `id_soal` int NOT NULL,
  `jawaban_soal_ujian` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `soal_ujian`
--

INSERT INTO `soal_ujian` (`id_soal_ujian`, `id_test`, `id_soal`, `jawaban_soal_ujian`) VALUES
(1, 1, 18, NULL),
(2, 1, 19, NULL),
(3, 1, 20, NULL),
(4, 1, 21, NULL),
(5, 1, 22, NULL),
(6, 1, 23, NULL),
(7, 1, 24, NULL),
(8, 1, 25, NULL),
(9, 1, 26, NULL),
(10, 1, 27, NULL),
(11, 1, 28, NULL),
(12, 1, 29, NULL),
(13, 1, 30, NULL),
(14, 1, 31, NULL),
(15, 1, 32, NULL),
(16, 1, 33, NULL),
(17, 1, 34, NULL),
(18, 1, 35, NULL),
(19, 1, 36, NULL),
(20, 1, 37, NULL),
(21, 1, 38, NULL),
(22, 1, 39, NULL),
(23, 1, 40, NULL),
(24, 1, 41, NULL),
(25, 1, 42, NULL),
(26, 1, 43, NULL),
(27, 1, 44, NULL),
(28, 1, 45, NULL),
(29, 1, 46, NULL),
(30, 1, 47, NULL),
(31, 1, 48, NULL),
(32, 1, 56, NULL),
(33, 1, 57, NULL),
(34, 1, 58, NULL),
(35, 1, 59, NULL),
(36, 1, 60, NULL),
(37, 1, 61, NULL),
(38, 1, 62, NULL),
(39, 1, 63, NULL),
(40, 1, 64, NULL),
(41, 1, 65, NULL),
(42, 1, 66, NULL),
(43, 1, 67, NULL),
(44, 1, 68, NULL),
(45, 1, 69, NULL),
(46, 1, 70, NULL),
(47, 1, 71, NULL),
(48, 1, 72, '316'),
(49, 1, 73, NULL),
(50, 1, 74, NULL),
(51, 1, 75, NULL),
(52, 1, 76, NULL),
(53, 1, 77, NULL),
(54, 1, 78, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id_test` int NOT NULL,
  `id_user` int NOT NULL,
  `mulai_test` datetime NOT NULL,
  `selesai_test` datetime NOT NULL,
  `lama_test` time NOT NULL,
  `status_test` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id_test`, `id_user`, `mulai_test`, `selesai_test`, `lama_test`, `status_test`) VALUES
(1, 7, '2024-12-12 13:37:00', '2024-12-12 14:39:00', '00:00:01', 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `id_role` int NOT NULL,
  `nama_user` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email_user` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `hp_user` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `password_user` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `lahir_user` date NOT NULL,
  `pendidikan_user` varchar(10) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_role`, `nama_user`, `email_user`, `hp_user`, `password_user`, `lahir_user`, `pendidikan_user`) VALUES
(4, 1, 'marcel', 'marcsatrioff@gmail.com', '62895330705438', '21232f297a57a5a743894a0e4a801fc3', '2024-11-23', ''),
(5, 2, 'Dewi Salwa', 'dewwi@gmail.com', '088950309029', 'ed36cdb491eaffe3bba9dbd2652a7bca', '2002-12-11', 'S1'),
(6, 2, 'syifa aulia', 'syifaaulia@gmail.com', '09889786', 'ed36cdb491eaffe3bba9dbd2652a7bca', '2024-11-12', 'D3'),
(7, 2, 'Dinniyah Haibah Saputri', 'dinniyah@gmail.com', '6285779927384', 'ed36cdb491eaffe3bba9dbd2652a7bca', '2000-12-01', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jawaban_soal`
--
ALTER TABLE `jawaban_soal`
  ADD PRIMARY KEY (`id_jawaban_soal`),
  ADD KEY `fk_soal` (`id_soal`);

--
-- Indexes for table `jenis_soal`
--
ALTER TABLE `jenis_soal`
  ADD PRIMARY KEY (`id_jenis_soal`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id_perusahaan`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id_soal`),
  ADD KEY `fk_jenis_soal` (`id_jenis_soal`),
  ADD KEY `fk_jawaban_soal` (`id_jawaban_soal`);

--
-- Indexes for table `soal_ujian`
--
ALTER TABLE `soal_ujian`
  ADD PRIMARY KEY (`id_soal_ujian`),
  ADD KEY `fk_detail_test` (`id_test`),
  ADD KEY `fk_detail_soal` (`id_soal`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id_test`),
  ADD KEY `fk_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `fk_role` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jawaban_soal`
--
ALTER TABLE `jawaban_soal`
  MODIFY `id_jawaban_soal` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=357;

--
-- AUTO_INCREMENT for table `jenis_soal`
--
ALTER TABLE `jenis_soal`
  MODIFY `id_jenis_soal` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id_perusahaan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `id_soal` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `soal_ujian`
--
ALTER TABLE `soal_ujian`
  MODIFY `id_soal_ujian` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id_test` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jawaban_soal`
--
ALTER TABLE `jawaban_soal`
  ADD CONSTRAINT `fk_soal` FOREIGN KEY (`id_soal`) REFERENCES `soal` (`id_soal`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `soal`
--
ALTER TABLE `soal`
  ADD CONSTRAINT `fk_jawaban_soal` FOREIGN KEY (`id_jawaban_soal`) REFERENCES `jawaban_soal` (`id_jawaban_soal`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_jenis_soal` FOREIGN KEY (`id_jenis_soal`) REFERENCES `jenis_soal` (`id_jenis_soal`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `soal_ujian`
--
ALTER TABLE `soal_ujian`
  ADD CONSTRAINT `fk_detail_soal` FOREIGN KEY (`id_soal`) REFERENCES `soal` (`id_soal`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_detail_test` FOREIGN KEY (`id_test`) REFERENCES `test` (`id_test`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `test`
--
ALTER TABLE `test`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_role` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
