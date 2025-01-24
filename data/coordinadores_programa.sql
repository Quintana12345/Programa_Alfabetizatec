-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-01-2025 a las 13:48:38
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `alfabetizatec`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coordinadores_programa`
--

CREATE TABLE `coordinadores_programa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_usuario` bigint(20) NOT NULL,
  `id_tecnologico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `coordinadores_programa`
--

INSERT INTO `coordinadores_programa` (`id`, `id_usuario`, `id_tecnologico`) VALUES
(1, 18, 43),
(2, 30, 90),
(3, 35, 1),
(4, 36, 2),
(5, 37, 3),
(6, 38, 4),
(7, 39, 5),
(8, 40, 6),
(9, 41, 7),
(10, 42, 8),
(11, 43, 9),
(12, 44, 10),
(13, 45, 11),
(14, 46, 12),
(15, 47, 13),
(16, 48, 14),
(17, 49, 15),
(18, 50, 16),
(19, 51, 17),
(20, 52, 18),
(21, 53, 19),
(22, 54, 20),
(23, 55, 21),
(24, 56, 22),
(25, 57, 23),
(26, 58, 24),
(27, 59, 25),
(28, 60, 26),
(29, 61, 27),
(30, 62, 28),
(31, 63, 29),
(32, 64, 30),
(33, 65, 31),
(34, 66, 32),
(35, 67, 33),
(36, 68, 34),
(37, 69, 35),
(38, 70, 36),
(39, 71, 37),
(40, 72, 38),
(41, 73, 39),
(42, 74, 40),
(43, 75, 41),
(44, 76, 42),
(45, 77, 43),
(46, 78, 44),
(47, 79, 45),
(48, 80, 46),
(49, 81, 47),
(50, 82, 48),
(51, 83, 49),
(52, 84, 50),
(53, 85, 51),
(54, 86, 52),
(55, 87, 53),
(56, 88, 54),
(57, 89, 55),
(58, 90, 56),
(59, 91, 57),
(60, 92, 58),
(61, 93, 59),
(62, 94, 60),
(63, 95, 61),
(64, 96, 62),
(65, 97, 63),
(66, 98, 64),
(67, 99, 65),
(68, 100, 66),
(69, 101, 67),
(70, 102, 68),
(71, 103, 69),
(72, 104, 70),
(73, 105, 71),
(74, 106, 72),
(75, 107, 73),
(76, 108, 74),
(77, 109, 75),
(78, 110, 76),
(79, 111, 77),
(80, 112, 78),
(81, 113, 79),
(82, 114, 80),
(83, 115, 81),
(84, 116, 82),
(85, 117, 83),
(86, 118, 84),
(87, 119, 85),
(88, 120, 86),
(89, 121, 87),
(90, 122, 88),
(91, 123, 89),
(92, 124, 90),
(93, 125, 91),
(94, 126, 92),
(95, 127, 93),
(96, 128, 94),
(97, 129, 95),
(98, 130, 96),
(99, 131, 97),
(100, 132, 98),
(101, 133, 99),
(102, 134, 100),
(103, 135, 101),
(104, 136, 102),
(105, 137, 103),
(106, 138, 104),
(107, 139, 105),
(108, 140, 106),
(109, 141, 107),
(110, 142, 108),
(111, 143, 109),
(112, 144, 110),
(113, 145, 111),
(114, 146, 112),
(115, 147, 113),
(116, 148, 114),
(117, 149, 115),
(118, 150, 116),
(119, 151, 117),
(120, 152, 118),
(121, 153, 119),
(122, 154, 120),
(123, 155, 121),
(124, 156, 122),
(125, 157, 123),
(126, 158, 124),
(127, 159, 125),
(128, 160, 126),
(129, 161, 127),
(130, 162, 128),
(131, 163, 129),
(132, 164, 130),
(133, 165, 131),
(134, 166, 132),
(135, 167, 133),
(136, 168, 134),
(137, 169, 135),
(138, 170, 136),
(139, 171, 137),
(140, 172, 138),
(141, 173, 139),
(142, 174, 140),
(143, 175, 141),
(144, 176, 142),
(145, 177, 143),
(146, 178, 144),
(147, 179, 145),
(148, 180, 146),
(149, 181, 147),
(150, 182, 148),
(151, 183, 149),
(152, 184, 150),
(153, 185, 151),
(154, 186, 152);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `coordinadores_programa`
--
ALTER TABLE `coordinadores_programa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `coordinadores_programa`
--
ALTER TABLE `coordinadores_programa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
