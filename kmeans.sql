-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2023 at 10:23 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kmeans`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id` int(11) NOT NULL,
  `part_number` varchar(15) NOT NULL,
  `deskripsi` text NOT NULL,
  `stok` int(11) NOT NULL,
  `kategori` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id`, `part_number`, `deskripsi`, `stok`, `kategori`) VALUES
(1, 'FS19870', 'FULWTRSEP', 14, NULL),
(2, 'LF 9325', 'LUBEFILTER', 10, NULL),
(3, 'WF 2076', '*WTRFILTER DCA4-23', 14, NULL),
(4, 'FS 1006', '*FULWTRSEP', 62, NULL),
(5, 'AF25593', 'AIRFILTER ELEMENT', 34, NULL),
(6, '82375 A', 'ROT ELEMENT', 5, NULL),
(7, '875713', 'PREMIUM BLUE 7800 15W40 API CI-4/SL 200L', 2, NULL),
(8, 'CC 2869', 'PG PLUS P-20LTRS', 8, NULL),
(9, '3164067', 'SEALANT', 16, NULL),
(10, '5579265', 'KIT,OVERHAUL', 15, NULL),
(11, '5473398', 'KIT REPAIR, 1 X  CYLINDER HEAD', 20, NULL),
(12, '5579393', 'KIT,SERVICE', 32, NULL),
(13, '4398094', 'CROSSHEAD,VALVE', 4, NULL),
(14, '4006266', 'BUSHING', 0, NULL),
(15, '4006272', 'BUSHING', 5, NULL),
(16, '4095506', 'ROD,PUSH', 0, NULL),
(17, '4095511', 'ROD,PUSH', 3, NULL),
(18, '4095790', 'BREATHER,CRANKCASE', 4, NULL),
(19, '4088431', 'INJECTOR', 4, NULL),
(20, '4307242 EK80', 'PUMP,FUEL', 1, NULL),
(21, '3046200', '#SPIDER,JAW COUPLING', 9, NULL),
(22, '4095893', 'SEAL,O RING', 4, NULL),
(23, '4307148', 'SEAL, INJECTOR', 8, NULL),
(24, '3347937', '#SEAL,O RING', 4, NULL),
(25, '3347939', 'SEAL,O RING', 2, NULL),
(26, '4010577', 'SEAL,O RING', 2, NULL),
(27, '4399136', 'HOSE,FUEL', 4, NULL),
(28, '4975529', 'WASHER,SEALING', 8, NULL),
(29, '4975530', 'WASHER,SEALING', 9, NULL),
(30, '4398816', 'BRACE,TUBE', 28, NULL),
(31, '3093598', 'SCREW,BANJO CONNECTOR', 12, NULL),
(32, '4990915', 'SCREW,BANJO CONNECTOR', 69, NULL),
(33, '3864230', 'SEAL,O RING', 65, NULL),
(34, '3963988', 'WASHER,SEALING', 39, NULL),
(35, '3092786', 'SCREW,TWELVE POINT CA', 49, NULL),
(36, '3094028', 'PLUG,EXPANSION', 109, NULL),
(37, '4095457', 'BUSHING', 251, NULL),
(38, '4347897', 'GASKET,COVER PLATE', 0, NULL),
(39, '4095460', 'NOZZLE,PISTON COOLING', 8, NULL),
(40, '4006201', 'SCREW,TWELVE POINT CAP', 10, NULL),
(41, '4006200', 'SCREW,TWELVE POINT CAP', 7, NULL),
(42, '4032708', 'KIT,TUR REPAIR', 6, NULL),
(43, '3535977', 'SOLD IN HIGHER LEVEL ASSEMBLY', 11, NULL),
(44, '3331924', 'GASKET,TURBOCHARGER', 10, NULL),
(45, '3092282', 'NUT,REGULAR HEXAGON', 2, NULL),
(46, '4095971', 'SCREW,HEXAGON HEAD CA', 7, NULL),
(47, '4095974', 'GASKET,CONNECTION', 18, NULL),
(48, '4095975', 'NUT,REGULAR HEXAGON', 9, NULL),
(49, '4096161', 'SCREW,HEXAGON HEAD CA', 11, NULL),
(50, '4095448', 'GASKET,AFT HOUSING', 10, NULL),
(51, '4095450', 'GASKET,CONNECTION', 5, NULL),
(52, '4095895', 'SEAL,O RING', 12, NULL),
(53, '3016306', 'CLAMP,V BAND', 19, NULL),
(54, '4090033', 'KIT,WP REPAIR (MAJOR)', 6, NULL),
(55, '5282819', 'SEAL,O RING', 3, NULL),
(56, '4095892', 'SEAL,O RING', 25, NULL),
(57, '4095960', 'SEAL,O RING', 13, NULL),
(58, '4095427', 'BEARING,BALL', 11, NULL),
(59, '4095428', 'BEARING,BALL', 47, NULL),
(60, '4095875', 'RING,RETAINING', 45, NULL),
(61, '4096008', 'FLANGE,DRIVE COUPLING', 25, NULL),
(62, '3092114', 'THERMOSTAT', 23, NULL),
(63, '3092399', 'SEAL,THERMOSTAT', 22, NULL),
(64, '4096114', 'PLUG,EXPANSION', 38, NULL),
(65, '4095951', 'SEAL,O RING', 8, NULL),
(66, '4095546', 'GASKET,COVER PLATE', 0, NULL),
(67, '4990915', 'SCREW,BANJO CONNECTOR', 16, NULL),
(68, '3963988', 'WASHER,SEALING', 39, NULL),
(69, '4095558', 'GASKET,THERMOSTAT HOUSING', 15, NULL),
(70, '4095897', 'SEAL,O RING', 8, NULL),
(71, '4095947', 'SEAL,O RING', 3, NULL),
(72, '4096462', 'SEAL,O RING', 24, NULL),
(73, '107981', 'CAP,FILLER', 9, NULL),
(74, '3093966', 'PLUG,EXPANSION', 15, NULL),
(75, '4095540', 'BUSHING', 22, NULL),
(76, '4982656', 'COLLAR,SHAFT', 4, NULL),
(77, '4095534', 'SEAL,GROMMET', 28, NULL),
(78, '200819', 'DISC,VALVE', 0, NULL),
(79, '3092078', 'SPRING,COMPRESSION', 6, NULL),
(80, '3092410', 'WASHER, SEALING', 11, NULL),
(81, '4096461', 'SEAL,O RING', 4, NULL),
(82, '4096459', 'PLUG,THREADED', 15, NULL),
(83, '4397510', 'COOLER,OIL', 17, NULL),
(84, '4096669', 'SEAL,OIL', 45, NULL),
(85, '4096670', 'SEAL,DUST', 26, NULL),
(86, '4096827', 'SEAL,OIL', 19, NULL),
(87, '4365229', 'RETAINER, GEAR', 16, NULL),
(88, '4095478', 'RETAINER,GEAR', 23, NULL),
(89, '4095477', 'SHAFT,IDLER', 33, NULL),
(90, '2872254', 'SENSOR, PRESSURE', 18, NULL),
(91, '2897331', 'SENSOR, PRESSURE', 3, NULL),
(92, '3408587', 'SENSOR, PRESSURE', 6, NULL),
(93, '4088832', 'SENSOR,TEMPERATURE', 11, NULL),
(94, '4095897', 'SEAL,O RING', 8, NULL),
(95, '4096039', 'NIPPLE,HOSE', 37, NULL),
(96, '3021420', 'SOLENOID,FUEL PUMP', 32, NULL),
(97, '5491809', 'SENSOR,POSITION', 39, NULL),
(98, '4954905', 'SENSOR,TEMPERATURE', 76, NULL),
(99, '4978588', 'ISOLATOR,VIBRATION', 6, NULL),
(100, '4978589', 'ISOLATOR,VIBRATION', 7, NULL),
(101, '3016627', 'ALTERNATOR', 4, NULL),
(102, '4089706', 'TURBOCHARGER', 18, NULL),
(103, '4396012', 'MOTOR, STARTING', 30, NULL),
(104, '4398029', 'KIT, WATER PUMP', 34, NULL),
(105, '4345450', 'CAMSHAFT', 25, NULL),
(106, '4323150', 'HEAD,CYLINDER', 4, NULL),
(107, '4310384', 'BLOCK,CYLINDER', 38, NULL),
(108, '4334457', 'CRANKSHAFT,ENGINE', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kmeans`
--

CREATE TABLE `tb_kmeans` (
  `id` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `bulan` int(11) NOT NULL,
  `masuk` int(11) NOT NULL,
  `keluar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kmeans`
--

INSERT INTO `tb_kmeans` (`id`, `id_barang`, `bulan`, `masuk`, `keluar`) VALUES
(1, 1, 2, 3, 1),
(2, 2, 2, 3, 1),
(3, 3, 2, 3, 1),
(4, 4, 2, 36, 2),
(5, 5, 2, 66, 2),
(6, 6, 2, 3, 2),
(7, 7, 2, 3, 1),
(8, 8, 2, 24, 1),
(9, 9, 2, 18, 8),
(10, 10, 2, 21, 6),
(11, 11, 2, 27, 7),
(12, 12, 2, 42, 9),
(13, 13, 2, 21, 14),
(14, 14, 2, 6, 7),
(15, 15, 2, 6, 2),
(16, 16, 2, 3, 2),
(17, 17, 2, 3, 1),
(18, 18, 2, 3, 1),
(19, 19, 2, 3, 1),
(20, 20, 2, 3, 1),
(21, 21, 2, 3, 1),
(22, 22, 2, 3, 1),
(23, 23, 2, 3, 1),
(24, 24, 2, 3, 1),
(25, 25, 2, 3, 1),
(26, 26, 2, 3, 1),
(27, 27, 2, 3, 1),
(28, 28, 2, 3, 1),
(29, 29, 2, 3, 1),
(30, 30, 2, 3, 1),
(31, 31, 2, 3, 1),
(32, 32, 2, 36, 1),
(33, 33, 2, 36, 12),
(34, 34, 2, 36, 12),
(35, 35, 2, 36, 12),
(36, 36, 2, 72, 12),
(37, 37, 2, 272, 24),
(38, 38, 2, 3, 24),
(39, 39, 2, 6, 1),
(40, 40, 2, 3, 2),
(41, 41, 2, 3, 1),
(42, 42, 2, 3, 1),
(43, 43, 2, 3, 1),
(44, 44, 2, 6, 1),
(45, 45, 2, 6, 2),
(46, 46, 2, 6, 2),
(47, 47, 2, 3, 2),
(48, 48, 2, 3, 1),
(49, 49, 2, 3, 1),
(50, 50, 2, 3, 1),
(51, 51, 2, 3, 1),
(52, 52, 2, 3, 1),
(53, 53, 2, 3, 1),
(54, 54, 2, 3, 1),
(55, 55, 2, 3, 1),
(56, 56, 2, 3, 1),
(57, 57, 2, 3, 1),
(58, 58, 2, 18, 6),
(59, 59, 2, 18, 6),
(60, 60, 2, 36, 12),
(61, 61, 2, 18, 6),
(62, 62, 2, 3, 1),
(63, 63, 2, 3, 1),
(64, 64, 2, 3, 1),
(65, 65, 2, 12, 4),
(66, 66, 2, 12, 4),
(67, 67, 2, 3, 1),
(68, 68, 2, 3, 1),
(69, 69, 2, 3, 1),
(70, 70, 2, 3, 1),
(71, 71, 2, 3, 1),
(72, 72, 2, 18, 6),
(73, 73, 2, 3, 1),
(74, 74, 2, 3, 1),
(75, 75, 2, 3, 1),
(76, 76, 2, 3, 1),
(77, 77, 2, 3, 1),
(78, 78, 2, 3, 1),
(79, 79, 2, 3, 1),
(80, 80, 2, 3, 1),
(81, 81, 2, 3, 1),
(82, 82, 2, 3, 1),
(83, 83, 2, 6, 2),
(84, 84, 2, 12, 4),
(85, 85, 2, 24, 8),
(86, 86, 2, 18, 6),
(87, 87, 2, 21, 7),
(88, 88, 2, 27, 9),
(89, 89, 2, 42, 14),
(90, 90, 2, 21, 7),
(91, 91, 2, 6, 12),
(92, 92, 2, 6, 12),
(93, 93, 2, 6, 6),
(94, 94, 2, 3, 8),
(95, 95, 2, 36, 12),
(96, 96, 2, 36, 6),
(97, 97, 2, 36, 1),
(98, 98, 2, 72, 1),
(99, 99, 2, 6, 4),
(100, 100, 2, 6, 4),
(101, 101, 2, 6, 2),
(102, 102, 2, 18, 24),
(103, 103, 2, 18, 3),
(104, 104, 2, 18, 3),
(105, 105, 2, 12, 4),
(106, 106, 2, 3, 4),
(107, 107, 2, 18, 4),
(108, 108, 2, 5, 6),
(109, 1, 3, 16, 6),
(110, 2, 3, 2, 12),
(111, 3, 3, 2, 24),
(112, 4, 3, 76, 150),
(113, 5, 3, 2, 2),
(114, 6, 3, 4, 14),
(115, 7, 3, 2, 1),
(116, 8, 3, 2, 2),
(117, 9, 3, 2, 3),
(118, 10, 3, 1, 1),
(119, 11, 3, 1, 1),
(120, 12, 3, 1, 0),
(121, 13, 3, 1, 0),
(122, 14, 3, 1, 0),
(123, 15, 3, 1, 0),
(124, 16, 3, 1, 0),
(125, 17, 3, 1, 0),
(126, 18, 3, 2, 0),
(127, 19, 3, 8, 6),
(128, 20, 3, 1, 1),
(129, 21, 3, 8, 0),
(130, 22, 3, 2, 0),
(131, 23, 3, 16, 0),
(132, 24, 3, 2, 0),
(133, 25, 3, 2, 0),
(134, 26, 3, 2, 0),
(135, 27, 3, 2, 0),
(136, 28, 3, 8, 0),
(137, 29, 3, 8, 1),
(138, 30, 3, 2, 0),
(139, 31, 3, 1, 2),
(140, 32, 3, 1, 3),
(141, 33, 3, 1, 3),
(142, 34, 3, 1, 0),
(143, 35, 3, 1, 0),
(144, 36, 3, 1, 0),
(145, 37, 3, 1, 0),
(146, 38, 3, 2, 0),
(147, 39, 3, 2, 0),
(148, 40, 3, 1, 0),
(149, 41, 3, 1, 0),
(150, 42, 3, 1, 1),
(151, 43, 3, 1, 0),
(152, 44, 3, 1, 0),
(153, 45, 3, 1, 0),
(154, 46, 3, 1, 0),
(155, 47, 3, 1, 0),
(156, 48, 3, 1, 0),
(157, 49, 3, 1, 0),
(158, 50, 3, 1, 0),
(159, 51, 3, 1, 0),
(160, 52, 3, 1, 0),
(161, 53, 3, 1, 0),
(162, 54, 3, 2, 0),
(163, 55, 3, 1, 0),
(164, 56, 3, 1, 0),
(165, 57, 3, 1, 0),
(166, 58, 3, 1, 0),
(167, 59, 3, 1, 0),
(168, 60, 3, 1, 0),
(169, 61, 3, 1, 0),
(170, 62, 3, 1, 0),
(171, 63, 3, 12, 0),
(172, 64, 3, 12, 0),
(173, 65, 3, 1, 0),
(174, 66, 3, 12, 0),
(175, 67, 3, 12, 0),
(176, 68, 3, 36, 0),
(177, 69, 3, 12, 0),
(178, 70, 3, 6, 0),
(179, 71, 3, 1, 0),
(180, 72, 3, 12, 0),
(181, 73, 3, 8, 0),
(182, 74, 3, 1, 0),
(183, 75, 3, 8, 0),
(184, 76, 3, 2, 0),
(185, 77, 3, 16, 0),
(186, 78, 3, 2, 0),
(187, 79, 3, 2, 0),
(188, 80, 3, 1, 0),
(189, 81, 3, 1, 0),
(190, 82, 3, 1, 0),
(191, 83, 3, 1, 0),
(192, 84, 3, 1, 0),
(193, 85, 3, 1, 0),
(194, 86, 3, 1, 0),
(195, 87, 3, 2, 0),
(196, 88, 3, 5, 0),
(197, 89, 3, 4, 0),
(198, 90, 3, 6, 1),
(199, 91, 3, 4, 0),
(200, 92, 3, 8, 0),
(201, 93, 3, 7, 0),
(202, 94, 3, 1, 0),
(203, 95, 3, 5, 0),
(204, 96, 3, 4, 0),
(205, 97, 3, 6, 0),
(206, 98, 3, 8, 0),
(207, 99, 3, 4, 0),
(208, 100, 3, 5, 0),
(209, 101, 3, 2, 1),
(210, 102, 3, 28, 1),
(211, 103, 3, 15, 0),
(212, 104, 3, 18, 0),
(213, 105, 3, 18, 0),
(214, 106, 3, 5, 0),
(215, 107, 3, 24, 0),
(216, 108, 3, 2, 0),
(217, 1, 4, 24, 16),
(218, 2, 4, 18, 6),
(219, 3, 4, 24, 2),
(220, 4, 4, 36, 0),
(221, 5, 4, 0, 0),
(222, 6, 4, 28, 0),
(223, 7, 4, 0, 1),
(224, 8, 4, 5, 0),
(225, 9, 4, 12, 0),
(226, 10, 4, 0, 0),
(227, 11, 4, 0, 0),
(228, 12, 4, 0, 0),
(229, 13, 4, 0, 4),
(230, 14, 4, 0, 0),
(231, 15, 4, 0, 0),
(232, 16, 4, 0, 0),
(233, 17, 4, 0, 6),
(234, 18, 4, 0, 0),
(235, 19, 4, 6, 0),
(236, 20, 4, 0, 1),
(237, 21, 4, 0, 1),
(238, 22, 4, 0, 0),
(239, 23, 4, 80, 0),
(240, 24, 4, 0, 0),
(241, 25, 4, 0, 0),
(242, 26, 4, 0, 0),
(243, 27, 4, 0, 0),
(244, 28, 4, 10, 0),
(245, 29, 4, 0, 0),
(246, 30, 4, 24, 0),
(247, 31, 4, 24, 3),
(248, 32, 4, 48, 0),
(249, 33, 4, 48, 0),
(250, 34, 4, 24, 10),
(251, 35, 4, 24, 0),
(252, 36, 4, 48, 0),
(253, 37, 4, 2, 0),
(254, 38, 4, 2, 10),
(255, 39, 4, 1, 0),
(256, 40, 4, 8, 0),
(257, 41, 4, 4, 0),
(258, 42, 4, 8, 2),
(259, 43, 4, 8, 0),
(260, 44, 4, 8, 0),
(261, 45, 4, 1, 4),
(262, 46, 4, 2, 0),
(263, 47, 4, 16, 0),
(264, 48, 4, 8, 0),
(265, 49, 4, 8, 0),
(266, 50, 4, 7, 0),
(267, 51, 4, 2, 0),
(268, 52, 4, 9, 0),
(269, 53, 4, 18, 0),
(270, 54, 4, 4, 0),
(271, 55, 4, 0, 0),
(272, 56, 4, 24, 0),
(273, 57, 4, 12, 0),
(274, 58, 4, 0, 0),
(275, 59, 4, 36, 0),
(276, 60, 4, 24, 0),
(277, 61, 4, 12, 0),
(278, 62, 4, 24, 2),
(279, 63, 4, 12, 0),
(280, 64, 4, 36, 0),
(281, 65, 4, 0, 0),
(282, 66, 4, 0, 0),
(283, 67, 4, 2, 0),
(284, 68, 4, 1, 0),
(285, 69, 4, 1, 0),
(286, 70, 4, 1, 0),
(287, 71, 4, 1, 0),
(288, 72, 4, 1, 0),
(289, 73, 4, 0, 0),
(290, 74, 4, 12, 0),
(291, 75, 4, 12, 0),
(292, 76, 4, 0, 0),
(293, 77, 4, 10, 0),
(294, 78, 4, 0, 0),
(295, 79, 4, 8, 0),
(296, 80, 4, 8, 0),
(297, 81, 4, 1, 0),
(298, 82, 4, 12, 0),
(299, 83, 4, 12, 0),
(300, 84, 4, 36, 0),
(301, 85, 4, 12, 0),
(302, 86, 4, 6, 0),
(303, 87, 4, 0, 0),
(304, 88, 4, 0, 0),
(305, 89, 4, 1, 0),
(306, 90, 4, 1, 2),
(307, 91, 4, 0, 0),
(308, 92, 4, 4, 0),
(309, 93, 4, 4, 0),
(310, 94, 4, 2, 5),
(311, 95, 4, 8, 0),
(312, 96, 4, 0, 0),
(313, 97, 4, 0, 0),
(314, 98, 4, 0, 0),
(315, 99, 4, 0, 0),
(316, 100, 4, 0, 0),
(317, 101, 4, 1, 1),
(318, 102, 4, 0, 1),
(319, 103, 4, 1, 0),
(320, 104, 4, 1, 0),
(321, 105, 4, 0, 0),
(322, 106, 4, 0, 0),
(323, 107, 4, 0, 0),
(324, 108, 4, 0, 0),
(325, 1, 5, 0, 6),
(326, 2, 5, 6, 0),
(327, 3, 5, 12, 0),
(328, 4, 5, 150, 84),
(329, 5, 5, 0, 30),
(330, 6, 5, 0, 14),
(331, 7, 5, 0, 0),
(332, 8, 5, 0, 20),
(333, 9, 5, 0, 5),
(334, 10, 5, 0, 0),
(335, 11, 5, 0, 0),
(336, 12, 5, 0, 2),
(337, 13, 5, 0, 0),
(338, 14, 5, 6, 6),
(339, 15, 5, 0, 0),
(340, 16, 5, 0, 2),
(341, 17, 5, 12, 6),
(342, 18, 5, 0, 0),
(343, 19, 5, 0, 6),
(344, 20, 5, 0, 0),
(345, 21, 5, 0, 0),
(346, 22, 5, 0, 0),
(347, 23, 5, 0, 90),
(348, 24, 5, 0, 0),
(349, 25, 5, 0, 2),
(350, 26, 5, 0, 2),
(351, 27, 5, 0, 0),
(352, 28, 5, 0, 12),
(353, 29, 5, 0, 0),
(354, 30, 5, 0, 0),
(355, 31, 5, 0, 10),
(356, 32, 5, 0, 12),
(357, 33, 5, 0, 5),
(358, 34, 5, 0, 0),
(359, 35, 5, 0, 0),
(360, 36, 5, 0, 0),
(361, 37, 5, 0, 0),
(362, 38, 5, 36, 9),
(363, 39, 5, 0, 0),
(364, 40, 5, 0, 0),
(365, 41, 5, 0, 0),
(366, 42, 5, 0, 2),
(367, 43, 5, 0, 0),
(368, 44, 5, 0, 4),
(369, 45, 5, 0, 0),
(370, 46, 5, 0, 0),
(371, 47, 5, 0, 0),
(372, 48, 5, 0, 2),
(373, 49, 5, 0, 0),
(374, 50, 5, 0, 0),
(375, 51, 5, 0, 0),
(376, 52, 5, 0, 0),
(377, 53, 5, 0, 2),
(378, 54, 5, 0, 2),
(379, 55, 5, 0, 0),
(380, 56, 5, 0, 2),
(381, 57, 5, 0, 2),
(382, 58, 5, 0, 2),
(383, 59, 5, 0, 2),
(384, 60, 5, 0, 4),
(385, 61, 5, 0, 0),
(386, 62, 5, 0, 2),
(387, 63, 5, 0, 4),
(388, 64, 5, 0, 12),
(389, 65, 5, 0, 1),
(390, 66, 5, 0, 20),
(391, 67, 5, 0, 0),
(392, 68, 5, 0, 0),
(393, 69, 5, 0, 0),
(394, 70, 5, 0, 1),
(395, 71, 5, 0, 1),
(396, 72, 5, 0, 1),
(397, 73, 5, 0, 1),
(398, 74, 5, 0, 0),
(399, 75, 5, 0, 0),
(400, 76, 5, 0, 0),
(401, 77, 5, 0, 0),
(402, 78, 5, 0, 4),
(403, 79, 5, 0, 6),
(404, 80, 5, 0, 0),
(405, 81, 5, 0, 0),
(406, 82, 5, 0, 0),
(407, 83, 5, 0, 0),
(408, 84, 5, 0, 0),
(409, 85, 5, 0, 3),
(410, 86, 5, 0, 0),
(411, 87, 5, 0, 0),
(412, 88, 5, 0, 0),
(413, 89, 5, 0, 0),
(414, 90, 5, 0, 0),
(415, 91, 5, 5, 0),
(416, 92, 5, 0, 0),
(417, 93, 5, 0, 0),
(418, 94, 5, 15, 0),
(419, 95, 5, 0, 0),
(420, 96, 5, 0, 2),
(421, 97, 5, 0, 2),
(422, 98, 5, 0, 3),
(423, 99, 5, 0, 0),
(424, 100, 5, 0, 0),
(425, 101, 5, 0, 1),
(426, 102, 5, 0, 2),
(427, 103, 5, 0, 1),
(428, 104, 5, 0, 0),
(429, 105, 5, 0, 1),
(430, 106, 5, 0, 0),
(431, 107, 5, 0, 0),
(432, 108, 5, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `jenis` enum('Masuk','Keluar') NOT NULL,
  `jumlah` int(11) NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id`, `id_barang`, `tanggal`, `jenis`, `jumlah`, `user`) VALUES
(1, 1, '2023-07-27 08:14:01', 'Masuk', 1, 1),
(2, 1, '2023-07-27 08:14:03', 'Keluar', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` enum('Administrator','Staff') NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`, `level`, `last_login`) VALUES
(1, 'admin', 'admin', 'Administrator', '2023-07-23 16:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kmeans`
--
ALTER TABLE `tb_kmeans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
--
-- AUTO_INCREMENT for table `tb_kmeans`
--
ALTER TABLE `tb_kmeans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=433;
--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_kmeans`
--
ALTER TABLE `tb_kmeans`
  ADD CONSTRAINT `tb_kmeans_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_transaksi_ibfk_2` FOREIGN KEY (`user`) REFERENCES `tb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
