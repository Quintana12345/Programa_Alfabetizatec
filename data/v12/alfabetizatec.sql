-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-01-2025 a las 22:26:48
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
-- Estructura de tabla para la tabla `coordinadores_nacionales`
--

CREATE TABLE `coordinadores_nacionales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_usuario` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `coordinadores_nacionales`
--

INSERT INTO `coordinadores_nacionales` (`id`, `id_usuario`) VALUES
(1, 19);

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coordinadores_regionales`
--

CREATE TABLE `coordinadores_regionales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_usuario` bigint(20) NOT NULL,
  `id_region` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `coordinadores_regionales`
--

INSERT INTO `coordinadores_regionales` (`id`, `id_usuario`, `id_region`) VALUES
(2, 20, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `educadores`
--

CREATE TABLE `educadores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_usuario` bigint(20) NOT NULL,
  `tipo_participante` varchar(255) NOT NULL,
  `modalidad` varchar(200) NOT NULL,
  `numero_control` bigint(20) DEFAULT NULL,
  `carrera` bigint(20) DEFAULT NULL,
  `id_tecnologico` bigint(20) DEFAULT NULL,
  `semestre` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `educadores`
--

INSERT INTO `educadores` (`id`, `id_usuario`, `tipo_participante`, `modalidad`, `numero_control`, `carrera`, `id_tecnologico`, `semestre`) VALUES
(1, 187, 'estudiante', 'alfabetizaTEC', 12, 12, 91, 12),
(2, 188, 'docente', 'servicio_comunitario', 0, 0, 91, 0),
(3, 189, 'externo', 'alfabetizaTEC', 0, 0, 91, 0),
(4, 190, 'externo', 'alfabetizaTEC', 0, 0, 91, 0),
(5, 191, 'estudiante Universitario', 'participacion_honorifica', 0, 0, 90, 0),
(6, 192, 'docente', 'valor_curricular', 0, 0, 90, 0),
(7, 193, 'externo', 'servicio_comunitario', 0, 0, 90, 0),
(8, 194, 'docente', 'valor_curricular', 0, 0, 90, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `id_region` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id`, `nombre`, `id_region`) VALUES
(1, 'Aguascalientes', 3),
(2, 'Baja California', 1),
(3, 'Baja California Sur', 1),
(4, 'Campeche', 5),
(5, 'Chiapas', 5),
(6, 'Chihuahua', 1),
(7, 'Ciudad de México', 4),
(8, 'Coahuila', 2),
(9, 'Colima', 3),
(10, 'Durango', 1),
(11, 'Guanajuato', 3),
(12, 'Guerrero', 5),
(13, 'Hidalgo', 5),
(14, 'Jalisco', 3),
(15, 'Estado de México', 4),
(16, 'Michoacán', 3),
(17, 'Morelos', 4),
(18, 'Nayarit', 4),
(19, 'Nuevo León', 2),
(20, 'Oaxaca', 5),
(21, 'Puebla', 4),
(22, 'Querétaro', 3),
(23, 'Quintana Roo', 5),
(24, 'San Luis Potosí', 3),
(25, 'Sinaloa', 1),
(26, 'Sonora', 1),
(27, 'Tabasco', 5),
(28, 'Tamaulipas', 2),
(29, 'Tlaxcala', 4),
(30, 'Veracruz', 6),
(31, 'Yucatán', 5),
(32, 'Zacatecas', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `domicilio` varchar(255) NOT NULL,
  `curp` varchar(255) NOT NULL,
  `telefono` bigint(20) NOT NULL,
  `correo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`id`, `nombre`, `apellidos`, `domicilio`, `curp`, `telefono`, `correo`) VALUES
(1, 'Lefty', 'mala fr', 'edomex', 'SOME001120HGRLRLA2', 7331701927, 'LEFTY@example.com'),
(2, 'Eliezer', 'Solano Martinez', 'San Marcos', 'SOME001120HGRLRLA2', 7331701927, 'develiezermartinez@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `niveles`
--

CREATE TABLE `niveles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `niveles`
--

INSERT INTO `niveles` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Analfabeta', 'Nivel educativo inicial que incluye primaria y secundaria'),
(2, 'Inicial', 'Nivel educativo intermedio que incluye preparatoria o bachillerato'),
(3, 'Superior', 'Nivel educativo avanzado que incluye licenciatura, maestría y doctorado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programas`
--

CREATE TABLE `programas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `id_tecnologico` bigint(20) NOT NULL,
  `id_nivel` bigint(20) NOT NULL,
  `meta` bigint(20) NOT NULL,
  `id_coordinador` bigint(20) DEFAULT NULL,
  `inicio_periodo` date NOT NULL,
  `fin_periodo` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `programas`
--

INSERT INTO `programas` (`id`, `nombre`, `descripcion`, `id_tecnologico`, `id_nivel`, `meta`, `id_coordinador`, `inicio_periodo`, `fin_periodo`) VALUES
(1, 'tuyo', '', 90, 1, 100, 0, '2025-01-22', '2025-01-22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa_educadores`
--

CREATE TABLE `programa_educadores` (
  `id` bigint(20) NOT NULL,
  `id_programa` bigint(20) NOT NULL,
  `id_educador` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regiones`
--

CREATE TABLE `regiones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `regiones`
--

INSERT INTO `regiones` (`id`, `nombre`) VALUES
(1, 'Occidente'),
(2, 'Noreste'),
(3, 'Bajio'),
(4, 'Centro'),
(5, 'Sureste');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `nivel_permiso` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`, `nivel_permiso`) VALUES
(1, 'Coordinador Nacional', '1'),
(2, 'Coordinador Regional', '2'),
(3, 'Coordinador de programa', '3'),
(4, 'Educador', '4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE `solicitudes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL,
  `id_programa` bigint(20) NOT NULL,
  `id_estudiante` bigint(20) NOT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `solicitudes`
--

INSERT INTO `solicitudes` (`id`, `status`, `id_programa`, `id_estudiante`, `fecha`) VALUES
(1, 'Aprobado', 1, 1, '2025-01-23'),
(2, 'pendiente', 2, 2, '2025-01-23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tecnologicos`
--

CREATE TABLE `tecnologicos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `estado_id` bigint(20) NOT NULL,
  `modalidad` varchar(255) NOT NULL,
  `director` varchar(200) DEFAULT NULL,
  `tipo_de_institucion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tecnologicos`
--

INSERT INTO `tecnologicos` (`id`, `nombre`, `estado_id`, `modalidad`, `director`, `tipo_de_institucion`) VALUES
(1, 'I.T. de Campeche', 4, '', NULL, ''),
(2, 'I.T. de Álvaro Obregón', 7, '', NULL, ''),
(3, 'I.T. de Chihuahua', 6, '', NULL, ''),
(4, 'I.T. de Celaya', 11, '', NULL, ''),
(5, 'I.T. de Delicias', 6, '', NULL, ''),
(6, 'I.T.S. de Río Verde', 24, '', NULL, ''),
(7, 'I.T. de Lázaro Cárdenas', 16, '', NULL, ''),
(8, 'I.T. de Mérida', 23, '', NULL, ''),
(9, 'I.T.S. de Álamo Temapache', 13, '', NULL, ''),
(10, 'I.T. de Culiacán', 25, '', NULL, ''),
(11, 'I.T.S. de La Costa Chica', 12, '', NULL, ''),
(12, 'I.T. de Nuevo León', 19, '', NULL, ''),
(13, 'T.E.S. de La Región Carbonifera', 8, '', NULL, ''),
(14, 'I.T.S. de Irapuato', 11, '', NULL, ''),
(15, 'I.T. de Iguala', 12, '', NULL, ''),
(16, 'I.T.S. de Zacapoaxtla', 21, '', NULL, ''),
(17, 'I.T. de Toluca', 15, '', NULL, ''),
(18, 'I.T. de Tapachula', 5, '', NULL, ''),
(19, 'I.T.S. de Centla', 27, '', NULL, ''),
(20, 'I.T. del Istmo', 20, '', NULL, ''),
(21, 'I.T. de Tláhuac', 7, '', NULL, ''),
(22, 'T.E.S. de Ote. del Edo. de México', 15, '', NULL, ''),
(23, 'I.T.S. de Teposcolula', 20, '', NULL, ''),
(24, 'I.T. de Comitancillo', 20, '', NULL, ''),
(25, 'I.T.S. de Zacatecas Sur', 32, '', NULL, ''),
(26, 'I.T. de Parral', 6, '', NULL, ''),
(27, 'T.E.S. de Ixtapaluca', 15, '', NULL, ''),
(28, 'I.T. de Cerro Azul', 13, '', NULL, ''),
(29, 'T.E.S. de Coacalco', 15, '', NULL, ''),
(30, 'T.E.S. de Tianguistenco', 15, '', NULL, ''),
(31, 'I.T.S. de La Montaña', 12, '', NULL, ''),
(32, 'I.T.S. de Xalapa', 13, '', NULL, ''),
(33, 'I.T. de Norte de Nayarit', 18, '', NULL, ''),
(34, 'Centro Interdisciplinario de Investigación y Docencia en Educación Técnica (CIIDET)', 22, '', NULL, ''),
(35, 'I.T. de Pochutla', 20, '', NULL, ''),
(36, 'I.T. de Zacatepec', 17, '', NULL, ''),
(37, 'I.T.S. de Huatusco', 13, '', NULL, ''),
(38, 'I.T. de Tláhuac II', 7, '', NULL, ''),
(39, 'I.T.S. de Acatlán de Osorio', 21, '', NULL, ''),
(40, 'I.T. de Zacatecas', 32, '', NULL, ''),
(41, 'I.T.S. de San Miguel El Grande', 20, '', NULL, ''),
(42, 'I.T. de Cancún', 23, '', NULL, ''),
(43, 'T.E.S. de Chicoloapan', 15, '', NULL, ''),
(44, 'I.T.S. de San Pedro de las Colonias', 8, '', NULL, ''),
(45, 'I.T. de Nogales', 26, '', NULL, ''),
(46, 'I.T. de San Juan del Río', 22, '', NULL, ''),
(47, 'I.T.S. de Salvatierra', 11, '', NULL, ''),
(48, 'I.T.S. de El Dorado', 25, '', NULL, ''),
(49, 'I.T. de Durango', 10, '', NULL, ''),
(50, 'I.T. de Mazatlán', 25, '', NULL, ''),
(51, 'I.T. de El Salto', 10, '', NULL, ''),
(52, 'I.T. de Chihuahua II', 6, '', NULL, ''),
(53, 'I.T. de Hermosillo', 26, '', NULL, ''),
(54, 'I.T. de Gustavo A. Madero II', 7, '', NULL, ''),
(55, 'I.T.S. de Los Ríos', 27, '', NULL, ''),
(56, 'I.T. de Ensenada', 2, '', NULL, ''),
(57, 'I.T.S. de Chicontepec', 13, '', NULL, ''),
(58, 'I.T. de Tuxtepec', 20, '', NULL, ''),
(59, 'I.T. de Tijuana', 2, '', NULL, ''),
(60, 'I.T.S. de Nuevo Casas Grandes', 6, '', NULL, ''),
(61, 'I.T.S. de Tlaxco', 21, '', NULL, ''),
(62, 'I.T. de Mexicali', 2, '', NULL, ''),
(63, 'I.T. de Iztapalapa II', 7, '', NULL, ''),
(64, 'I.T.S. de Misantla', 13, '', NULL, ''),
(65, 'I.T.S. de Guanajuato', 11, '', NULL, ''),
(66, 'I.T.S. de Purhepecha', 16, '', NULL, ''),
(67, 'I.T.S. de Cd. Acuña', 8, '', NULL, ''),
(68, 'I.T. de Pinotepa', 20, '', NULL, ''),
(69, 'I.T. de Iztapalapa', 7, '', NULL, ''),
(70, 'T.E.S. de Huixquilucan', 15, '', NULL, ''),
(71, 'T.E.S. de Chalco', 15, '', NULL, ''),
(72, 'T.E.S. de Jocotitlán', 15, '', NULL, ''),
(73, 'I.T.S. de Fresnillo', 32, '', NULL, ''),
(74, 'I.T. de Conkal', 23, '', NULL, ''),
(75, 'I.T. de La Chontalpa', 27, '', NULL, ''),
(76, 'I.T. de Huimanguillo', 27, '', NULL, ''),
(77, 'ITS de Purísima del Rincón', 11, '', NULL, ''),
(78, 'I.T.S. de Cosamaloapan', 13, '', NULL, ''),
(79, 'I.T. de Jiquilpan', 16, '', NULL, ''),
(80, 'I.T. de Tepic', 18, '', NULL, ''),
(81, 'I.T.S. de Tepexi de Rodríguez', 21, '', NULL, ''),
(82, 'I.T. de Ocotlán', 14, '', NULL, ''),
(83, 'T.E.S. de Cuautitlán Izcalli', 15, '', NULL, ''),
(84, 'I.T. de Chetumal', 23, '', NULL, ''),
(85, 'I.T. de Zitácuaro', 16, '', NULL, ''),
(86, 'I.T. de Villahermosa', 27, '', NULL, ''),
(87, 'I.T. de Lerma', 15, '', NULL, ''),
(88, 'I.T. de Acapulco', 12, '', NULL, ''),
(89, 'I.T. de Cuautla', 17, '', NULL, ''),
(90, 'I.T. de San Marcos', 12, '', NULL, ''),
(91, 'I.T.S. de Tamazunchale', 24, '', NULL, ''),
(92, 'I.T.S. de Monclova', 8, '', NULL, ''),
(93, 'I.T.S. de La Región de los Llanos', 24, '', NULL, ''),
(94, 'I.T.S. de Puerto Peñasco', 26, '', NULL, ''),
(95, 'I.T.S. de Múzquiz', 8, '', NULL, ''),
(96, 'ITS de Hopelchen', 4, '', NULL, ''),
(97, 'I.T.S. de Zacatecas Norte', 32, '', NULL, ''),
(98, 'I.T. de Valle de Morelia', 16, '', NULL, ''),
(99, 'I.T.S. de Tacámbaro', 16, '', NULL, ''),
(100, 'I.T. de Valle del Guadiana', 10, '', NULL, ''),
(101, 'I.T.S. de Alvarado', 13, '', NULL, ''),
(102, 'I.T. de Huejutla', 13, '', NULL, ''),
(103, 'I.T. de Salina Cruz', 20, '', NULL, ''),
(104, 'I.T. de Cd. Jiménez', 6, '', NULL, ''),
(105, 'I.T. de Agua Prieta', 26, '', NULL, ''),
(106, 'I.T.S. de Progreso', 23, '', NULL, ''),
(107, 'I.T.S. de Guasave', 25, '', NULL, ''),
(108, 'I.T.S. de Jesús Carranza', 13, '', NULL, ''),
(109, 'I.T. de Linares', 19, '', NULL, ''),
(110, 'I.T. de Roque', 11, '', NULL, ''),
(111, 'I.T.S. de Mulegé', 3, '', NULL, ''),
(112, 'I.T. de Cd. Juárez', 6, '', NULL, ''),
(113, 'I.T.S. de Nochistlán', 32, '', NULL, ''),
(114, 'I.T. de Tlajomulco', 14, '', NULL, ''),
(115, 'I.T. de Úrsulo Galván', 13, '', NULL, ''),
(116, 'I.T.S. de Felipe Carrillo Puerto', 23, '', NULL, ''),
(117, 'I.T. de Iztapalapa III', 7, '', NULL, ''),
(118, 'I.T. de La Piedad', 16, '', NULL, ''),
(119, 'I.T. de La Laguna', 10, '', NULL, ''),
(120, 'I.T.S. de Ote. del Edo. de Hidalgo', 13, '', NULL, ''),
(121, 'I.T. de Cd. Altamirano', 12, '', NULL, ''),
(122, 'I.T. de Tizimín', 23, '', NULL, ''),
(123, 'I.T. de Orizaba', 13, '', NULL, ''),
(124, 'I.T.S. de Lerdo', 10, '', NULL, ''),
(125, 'I.T.S. de La Sierra Negra de Ajalpan', 21, '', NULL, ''),
(126, 'I.T. de Torreón', 8, '', NULL, ''),
(127, 'I.T.S. de Tantoyuca', 13, '', NULL, ''),
(128, 'I.T.S. de Puruándiro', 16, '', NULL, ''),
(129, 'I.T. de Piedras Negras', 8, '', NULL, ''),
(130, 'I.T.S. de Santiago Papasquiaro', 10, '', NULL, ''),
(131, 'I.T. de La Zona Olmeca', 20, '', NULL, ''),
(132, 'I.T. de Apizaco', 21, '', NULL, ''),
(133, 'I.T.S. de Zongolica', 13, '', NULL, ''),
(134, 'I.T. de Cd. Victoria', 28, '', NULL, ''),
(135, 'I.T. de Atitalaquia', 13, '', NULL, ''),
(136, 'I.T. de Matehuala', 24, '', NULL, ''),
(137, 'I.T. de Valle del Yaqui', 26, '', NULL, ''),
(138, 'I.T. de Puebla', 21, '', NULL, ''),
(139, 'I.T.S. de Cajeme', 26, '', NULL, ''),
(140, 'I.T. de Nuevo Laredo', 28, '', NULL, ''),
(141, 'I.T.S. de Comalcalco', 27, '', NULL, ''),
(142, 'I.T. de Tlaxiaco', 20, '', NULL, ''),
(143, 'I.T. de Cd. Valles', 24, '', NULL, ''),
(144, 'CRODE Orizaba', 13, '', NULL, ''),
(145, 'I.T. de Oaxaca', 20, '', NULL, ''),
(146, 'I.T.S. de Atlixco', 21, '', NULL, ''),
(147, 'I.T.S. de Huichapan', 13, '', NULL, ''),
(148, 'I.T.S. de Pánuco', 13, '', NULL, ''),
(149, 'I.T. de Querétaro', 22, '', NULL, ''),
(150, 'I.T. de La Zona Maya', 23, '', NULL, ''),
(151, 'I.T.S. de Calkiní', 4, '', NULL, ''),
(152, 'T.E.S. de Jilotepec', 15, '', NULL, ''),
(153, 'I.T. de Aguascalientes', 0, 'Doctorado en Ciencias de la Ingeniería', NULL, 'Instituto Tecnológico de Aguascalientes'),
(154, 'I.T. de Baja california', 0, 'Doctorado en Ciencias de la Ingeniería', NULL, 'Instituto Tecnológico de Ensenada'),
(155, 'I.T. de Baja california sur', 0, 'Arquitectura', NULL, 'Instituto Tecnológico de Estudios Superiores de Lo'),
(156, 'I.T. de Chiapas', 0, 'Ingeniería en Agronomía', NULL, 'Instituto Tecnológico de Comitán'),
(157, 'I.T. de Ciudad de méxico', 0, 'Ingeniería en Diseño Industrial', NULL, 'Instituto Tecnológico de Álvaro Obregón'),
(158, 'I.T. de Coahuila', 0, 'Ingeniería Electromecánica', NULL, 'Instituto Tecnológico de Estudios Superiores de La'),
(159, 'I.T. de Colima', 0, 'Arquitectura', NULL, 'Instituto Tecnológico de Colima'),
(160, 'I.T. de Estado de méxico', 0, 'Doctorado en Ciencias de la Ingeniería', NULL, 'Instituto Tecnológico de Tlalnepantla'),
(161, 'I.T. de Guerrero', 0, 'Arquitectura', NULL, 'Instituto Tecnológico de Acapulco'),
(162, 'I.T. de Jalisco', 0, 'Arquitectura', NULL, 'Instituto Tecnológico de Ciudad Guzmán'),
(163, 'I.T. de Michoacán', 0, 'Arquitectura', NULL, 'Instituto Tecnológico de Jiquilpan'),
(164, 'I.T. de Morelos', 0, 'Doctorado en Ciencias de la Computación', NULL, 'Centro Nacional de Investigación y Desarrollo Tecn'),
(165, 'I.T. de Quintana roo', 0, 'Arquitectura', NULL, 'Instituto Tecnológico de Cancún'),
(166, 'I.T. de San luis potosí', 0, 'Ingeniería Ambiental', NULL, 'Instituto Tecnológico de Ciudad Valles'),
(167, 'I.T. de Sinaloa', 0, 'Doctorado en Ciencias de la Ingeniería', NULL, 'Instituto Tecnológico de Culiacán'),
(168, 'I.T. de Sonora', 0, 'Contador Público', NULL, 'Instituto Tecnológico de Agua Prieta'),
(169, 'I.T. de Tabasco', 0, 'Ingeniería en Innovación Agrícola Sustentable', NULL, 'Instituto Tecnológico de Huimanguillo'),
(170, 'I.T. de Tamaulipas', 0, 'Ingeniería en Agronomía', NULL, 'Instituto Tecnológico de Altamira'),
(171, 'I.T. de Tlaxcala', 0, 'Doctorado en Ciencias de la Ingeniería', NULL, 'Instituto Tecnológico de Apizaco'),
(172, 'I.T. de Veracruz', 0, 'Doctorado en Ciencias Ambientales', NULL, 'Instituto Tecnológico de Boca del Río'),
(173, 'I.T. de Yucatán', 0, 'Doctorado en Ciencias en Agricultura Tropical Sustentable', NULL, 'Instituto Tecnológico de Conkal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `curp` varchar(20) DEFAULT NULL,
  `telefono` bigint(20) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `correo_inst` varchar(255) DEFAULT NULL,
  `contrasena` text NOT NULL,
  `rol_id` int(11) NOT NULL,
  `puesto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `curp`, `telefono`, `correo`, `correo_inst`, `contrasena`, `rol_id`, `puesto`) VALUES
(16, 'Juan', 'Pérez', NULL, 5551234567, 'juan.perez@example.com', 'juan.perez@instituto.edu.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 4, NULL),
(19, 'Ramón ', 'Jiménez López', NULL, 5554567890, 'ramon.jimenez_lopez@example.com', NULL, '$2y$10$ikdzZgyYrnIVDTt6I35sT.KdqPulhZF8gNqPRi69gVxZi.mqmVJte', 1, NULL),
(20, 'Victor Hugo', 'Agaton Catalan', NULL, 5558765432, 'hugo.agaton@example.com', NULL, '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, NULL),
(30, 'Andrea', 'Zarate', 'ZAA001049HRLADDT5', 1234567890, 'Andrea.zarate@tecnm.mx', 'Andrea.zarate@tecnm.mx', '$2y$10$ikdzZgyYrnIVDTt6I35sT.KdqPulhZF8gNqPRi69gVxZi.mqmVJte', 3, 'coordinadora'),
(35, 'Francisco Manuel Tomas ', 'Arriola', 'AIEF890411HCCRSR19', 9811377393, '', 'vin_campeche@tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Jefe (a) del Departamento de Gestión Tecnológica y Vinculación '),
(36, 'Alejandra', 'Baleón', 'BAGA960106MDFLNL00', 5543716010, '', 'vin_aobregon@tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Jefe (a) del Departamento de Gestión Tecnológica y Vinculación '),
(37, 'Yadira Judith ', 'Flores', 'FOMY801219MCHLRD03', 6144044321, '', 'yadira.fm@chihuahua.tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Jefe (a) del Departamento de Gestión Tecnológica y Vinculación '),
(38, 'Gracia Cecilia', 'Gómez', 'GOMG750923MGTMRR02', 4614063333, '', 'cecilia.gomez@itcelaya.edu.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Otro (a)'),
(39, 'MARIA DEL ROSARIO ', 'BARAY', 'BAGR670914MCHRRS13', 6391119866, '', 'maria.bg@delicias.tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Jefe (a) del Departamento de Gestión Tecnológica y Vinculación '),
(40, 'AZALIA', 'MOYA', 'MOBA960903MSPYRZ03', 4871211071, '', 'azalia.mb@rioverde.tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Jefe (a) del Departamento de Gestión Tecnológica y Vinculación '),
(41, 'Gloria Viridiana', ' Vallejo ', 'VANG840305MMNLVL00', 7531244706, '', 'vin_lcardenas@tecnm.mx ', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Jefe (a) del Departamento de Gestión Tecnológica y Vinculación '),
(42, 'Luisa Gisell', 'Pat', 'PARL780903MYNTYS05', 9994269414, '', 'luisa.pr@merida.tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Otro (a)'),
(43, 'Frida Alicia', 'Pacheco', 'PAMF960822MVXCLR01', 2282287797, '', 'frida.pm@alamo.tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Director (a) de Planeación y Vinculación'),
(44, 'Raul Alfonso', 'Ayon', 'AOFR8102220HSLYLL01', 6671880026, '', 'vin_culiacan@tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Jefe (a) del Departamento de Gestión Tecnológica y Vinculación '),
(45, 'Jhonatan', 'Añorve ', 'AOTJ900814HGRXRH01', 7411155599, '', 'sub.vinculacion@costachica.tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Subdirector (a) de Planeación y Vinculación'),
(46, 'Lesly Yamilett', 'Treviño', 'TERL900502MNLRYS00', 8126536568, '', 'vin_nleon@tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Jefe (a) del Departamento de Gestión Tecnológica y Vinculación '),
(47, 'EVA GUADALUPE', 'SAID', 'SAFE650112MCLDRV01', 8611130454, '', 'subvinculacion@rcarbonifera.tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Subdirector (a) de Planeación y Vinculación'),
(48, 'Javier de Jesús', 'Rojas', 'ROGJ790104HGTJNV07', 4621264655, '', 'javier.rg@irapuato.tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Jefe (a) del Departamento de Gestión Tecnológica y Vinculación '),
(49, 'Carlos Alberto', 'Díaz ', 'DILC730417HGRZRR08 ', 7331012027, '', 'vin_iguala@tecnm.mx ', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Jefe (a) del Departamento de Gestión Tecnológica y Vinculación '),
(50, 'Delfino Cuauhtémoc  ', 'Bravo', 'BAAD681226HDFRRL09', 2331045867, '', 'dir.planeacion.vinculacion@zacapoaxtla.tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Director (a) de Planeación y Vinculación'),
(51, 'José Luis', 'García ', 'GARL710822HMCRVS05', 7221170939, '', 'vin@toluca.tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Jefe (a) del Departamento de Gestión Tecnológica y Vinculación '),
(52, 'Ana María', 'Salazar', 'SAOA811219MSLLRN07', 9626957266, '', 'vin_tapachula@tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Jefe (a) del Departamento de Gestión Tecnológica y Vinculación '),
(53, 'Arturo ', 'Arias', 'AIGA750722HTCRRR06', 9934953188, '', 'vinculacion@centla.tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Subdirector (a) de Planeación y Vinculación'),
(54, 'Claudia', 'Sánchez', 'SAMC840729MOCNRL01', 9711879270, '', 'servicio.social@itistmo.edu.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Otro (a)'),
(55, 'YAJAIRA', 'TAPIA', 'TARY950614MDFPSJ04', 5554793519, '', 'servicio.social@tlahuac.tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Otro (a)'),
(56, 'SILVIA GLORIA ', 'MENDOZA ', 'MEFS810128MVZNRL07', 5634352112, '', 'ss.rp@tesoem.edu.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Otro (a)'),
(57, 'DANIEL ', 'MIRANDA', 'MIED750719HOCRSN00', 9511187744, '', 'vin_dteposcolula@tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Jefe (a) del Departamento de Gestión Tecnológica y Vinculación '),
(58, 'YULMA', 'MENDEZ', 'MELY771006MOCNPL05', 9711757415, '', 'vin_comitancillo@tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Jefe (a) del Departamento de Gestión Tecnológica y Vinculación '),
(59, 'Héctor Eduardo ', 'Gutierrez ', 'GUCH860521HZSTSC00', 4491579793, '', 'hector.gc@zacatecassur.tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Jefe (a) del Departamento de Gestión Tecnológica y Vinculación '),
(60, 'ABIGAIL', 'SALGADO', 'SAMA720429MDGLNB04', 6271065588, '', 'gestion@itparral.edu.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Jefe (a) del Departamento de Gestión Tecnológica y Vinculación '),
(61, 'Carolina Anabel ', 'Ayala', 'AAHC841124MMCYRR02', 5548586705, '', 'servicio.socialyresidencias@tesi.edu.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Jefe (a) de Oficina de Servicios Externos'),
(62, 'Selene Inés ', 'Flores', 'FOSS880825PA6', 7851097068, '', 'ci_cerroazul@tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Otro (a)'),
(63, 'Claudia Teresa ', 'Trejo ', 'TEJC810720MDFRML08', 5579835575, '', 'deptossrp@tesco.edu.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Otro (a)'),
(64, 'EMMANUEL', ' GARDUÑO', 'GAME871011HMCRDM06', 5532519330, '', 'plan_dtianguistenco@tecnm. mx ', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Director (a) de Planeación y Vinculación'),
(65, 'ANANÍAS', 'JERÓNIMO', 'JEVA660327HGRRRN03', 7571117175, '', 'vin_dmontana@tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Otro (a)'),
(66, 'Ilse Sahil', 'Montiel ', 'MORI871206MVZNDL04', 2285014083, '', 'ilse.montiel@itsx.edu.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Otro (a)'),
(67, 'Noemí Elizabeth', 'Castañeda', 'CAIN690408MNTSNM04', 3118765877, '', 'vinculacion@nortenayarit.tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Subdirector (a) de Planeación y Vinculación'),
(68, 'Raúl', 'de La Torre', 'TOSR520927HSPRNL11', 4422009790, '', 'raul.ds@ciidet.tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Docente'),
(69, 'Héctor ', 'Orozco', 'OORH800102HSLRDC08', 9541338203, '', 'ci_pochutla@tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Otro (a)'),
(70, 'JESUS', 'RECILLAS', 'RERJ850329HMSCMS05', 7341815358, '', 'jesus.rr@zacatepec.tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Jefe (a) del Departamento de Gestión Tecnológica y Vinculación '),
(71, 'María Teresa ', 'Colin', 'COZT871123MVZLRR03', 2711048372, '', 'dposgrado@huatusco.tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Jefe (a) del Departamento de Gestión Tecnológica y Vinculación '),
(72, 'PAOLA ', 'MORENO', 'MORP790820MDFRML00', 5624000339, '', 'vin_tlahuac2@tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Jefe (a) del Departamento de Gestión Tecnológica y Vinculación '),
(73, 'Miriam', 'García', 'GARM620714MDFRJR12', 9531119347, '', 'vin_dacatlan@tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Jefe (a) del Departamento de Gestión Tecnológica y Vinculación '),
(74, 'AMAURY ', 'GUEL ', 'GUBA800315HSPLZM09vi', 4921342319, '', 'vin_zacatecas@tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Jefe (a) del Departamento de Gestión Tecnológica y Vinculación '),
(75, 'Brígido Gustavo ', 'González ', 'GOMB800723HOCNRR00', 9531044415, '', 'gustavo.gm@smiguelgde.tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Otro (a)'),
(76, 'JAVIER', 'PACHECO', 'PAHJ720107HVZCPV01', 9981478640, '', 'vin_cancun@tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Jefe (a) del Departamento de Gestión Tecnológica y Vinculación '),
(77, 'Eduardo', 'Ramos', 'RADE850808HDFMZD01', 5539845070, '', 'eduardo.ramos@teschic.edu.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Otro (a)'),
(78, 'ELIZABETH ', 'SANTOS', 'SAHE830109MDFNDL06', 8721092309, '', 'sub.vinculacion@tecsanpedro.edu.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Subdirector (a) de Planeación y Vinculación'),
(79, 'MARIO BENEDICTO', 'GONZALEZ', 'GOLM660312HSRNNR00', 6311739700, '', 'vin_nogales@tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Jefe (a) del Departamento de Gestión Tecnológica y Vinculación '),
(80, 'EDITH ', 'ROSALÍO', 'ROUE890620MQTSRD09', 4272724118, '', 'vin_sjuanrio@tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Jefe (a) del Departamento de Gestión Tecnológica y Vinculación '),
(81, 'Gustavo ', 'Cortes ', 'Coag880905hgtrrs02', 4661194762, '', 'gucortes@itess.edu.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Jefe (a) del Departamento de Gestión Tecnológica y Vinculación '),
(82, 'JOSÉ RAFAEL', 'CONTRERAS ', 'COCR870224HSLNHF03', 6673891514, '', 'JOSE.CC@ELDORADO.TECNM.MX', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Subdirector (a) de Planeación y Vinculación'),
(83, 'Jorge Agustín', 'Pimentel', 'PIMJ790927HDGMRR03', 6181709942, '', 'jpimentel@itdurango.edu.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Otro (a)'),
(84, 'ANA PAOLA', 'ORTIZ', 'OIBA870321MSLRRN07', 8110784143, '', 'vin_mazatlan@tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Jefe (a) del Departamento de Gestión Tecnológica y Vinculación '),
(85, 'Aldo Alejandro', 'Lujan', 'LUEA790910HDGJSL00', 6181800292, '', 'vin_salto@tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Jefe (a) del Departamento de Gestión Tecnológica y Vinculación '),
(86, 'ALEJANDRA', 'ROSAS', 'ROAA730424MCHSML06', 6141926067, '', 'servicio_social@chihuahua2.tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Otro (a)'),
(87, 'JULIA GRACIELA', 'PRECIADO', 'PELJ660102MSRRNL00', 6621314922, '', 'julia.preciadol@hermosillo.tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Jefe (a) del Departamento de Gestión Tecnológica y Vinculación '),
(88, 'HILDA AURORA', 'ROSAS', 'RORH680813MDFSDL08', 5564770869, '', 'hilda.rr@gamadero2.tecm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Otro (a)'),
(89, 'Cindy', 'Ricardes', 'RIGC910330MTCCTN05', 9341100030, '', 'depto.residenciaprof@rios.tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Otro (a)'),
(90, 'Lourdez Estephanie ', 'Campero', 'CALL851019MBCMNR02', 6461321665, '', 'vin_ensenada@tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Jefe (a) del Departamento de Gestión Tecnológica y Vinculación '),
(91, 'José Ángel', 'Ramírez', 'RAGA951014HVZMNR04', 9221852608, '', 'jose.ramirez@chicontepec.tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Otro (a)'),
(92, 'Nephtali', 'Chavez', 'CACN931027HOCHMP03', 2871320345, '', 'nephtali.cc@tuxtepec.tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Otro (a)'),
(93, 'Artemio ', 'Lara', 'LACA721219HBCRHR04', 6641673728, '', 'alara@tectijuana.edu.mx ', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Jefe (a) del Departamento de Gestión Tecnológica y Vinculación '),
(94, 'Armando Ivan', 'Ochoa ', 'OOBA851115HCHCCR00', 6141651235, '', 'd-vinculacion@itsncg.edu.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Jefe (a) del Departamento de Gestión Tecnológica y Vinculación '),
(95, 'Andrea ', 'Vega ', 'VEHA820225MTLGRN06', 2462975644, '', 'dda_dtlaxco@tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Otro (a)'),
(96, 'Martha Silvia', 'Alfaro', 'AALM681227MBCLPR01', 6861616058, '', 'GESTION@ITMEXICALI.EDU.MX', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Jefe (a) del Departamento de Gestión Tecnológica y Vinculación '),
(97, 'RICARDO', 'REYES ', 'RESR820627HMCYLC00', 5515992848, '', 'plan_iztapalapa2@tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Subdirector (a) de Planeación y Vinculación'),
(98, 'BEATRIZ', 'MIRANDA', 'MIJB780213MVZRMT04', 2351091383, '', 'bmirandaj@itsm.edu.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Otro (a)'),
(99, 'José Alejandro', 'Castro', 'CATA930525HGTSLL09', 4731405690, '', 'jefaturadevinculacion@guanajuato.tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Jefe (a) del Departamento de Gestión Tecnológica y Vinculación '),
(100, 'Florencio', 'Santos', 'SAAF710628HMNNSL02', 3511200516, '', 'florencio.sa@purhepecha.tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Director (a) de Planeación y Vinculación'),
(101, 'CARLOS', 'GUAJARDO', 'GUSC770406HCLJNR07', 8777703267, '', 'dir_vinculacion@cdacuna.tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Director (a) de Planeación y Vinculación'),
(102, 'Fernando ', 'Morales ', 'MOCF840618HOCRRR01', 9541579019, '', 'plan_pinotepa@tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Subdirector (a) de Planeación y Vinculación'),
(103, 'Luis Angel ', 'Mares ', 'MARL840514HOCRSS00', 2871102573, '', 'plan_iztapalapa@tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Subdirector (a) de Planeación y Vinculación'),
(104, 'María del Rocío ', 'Nava ', 'NAMR600114MDFVRC08', 5610813709, '', 'servicio.practicas@huixquilucan.tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Otro (a)'),
(105, 'JESUS ANTONIO ', 'GUEVARA', 'GUSJ880713HDFVNS00', 5513403567, '', 'subdirvinculacionyextension@tesch.edu.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Subdirector (a) de Planeación y Vinculación'),
(106, 'Gustavo Adolfo ', 'Estrada ', 'EALG650127HMCSPS01', 5527100349, '', 'direccion.vinculacion@tesjo.edu.mx      vin_djocotitlan@tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Director (a) de Planeación y Vinculación'),
(107, 'LETICIA ', 'HERNANDEZ', 'HERL680418MZSRJT01', 4931030590, '', 'gestionyvinculacion@fresnillo.tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Jefe (a) del Departamento de Gestión Tecnológica y Vinculación '),
(108, 'José Guadalupe', 'Basto', 'BACG851212HYNSHD00', 9997386485, '', 'vin_conkal@tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Jefe (a) del Departamento de Gestión Tecnológica y Vinculación '),
(109, 'ALVARO', 'LAZARO', 'LAHA770219HTCZRL05', 9932295597, '', 'vin_chontalpa@tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Jefe (a) del Departamento de Gestión Tecnológica y Vinculación '),
(110, 'FRANCISCO', 'ALVARADO', 'AARF800803HTCLDR01', 9171092141, '', 'vin_huimanguillo@tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Jefe (a) del Departamento de Gestión Tecnológica y Vinculación '),
(111, 'Fernando Antonio', 'Celaya', 'CEOF880925HGTLJR08', 4626293158, '', 'fernando.co@purisima.tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Subdirector (a) de Planeación y Vinculación'),
(112, 'ME. ROCIO ', 'ALFONSÍN', 'AOFR690221MVZLRC04', 2881064351, '', 'd.vinculacion@cosamaloapan.tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Jefe (a) del Departamento de Gestión Tecnológica y Vinculación '),
(113, 'Tonatiuh', 'Baltazar', 'BABT830311HMNLZN15', 3313969369, '', 'tonatiuh.bb@jiquilpan.tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Otro (a)'),
(114, 'Moisés', 'Garcés', 'GAMM731008HJCRRS09', 3111922893, '', 'gtvinculacion@ittepic.edu.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Jefe (a) del Departamento de Gestión Tecnológica y Vinculación '),
(115, 'ELIZABETH ', 'MEDEL ', 'MEME880906MPLDNL01', 2226792300, '', 'extension.itstr@gmail.com', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Jefe (a) del Departamento de Gestión Tecnológica y Vinculación '),
(116, 'GLADYS NALLELI', 'BECERRA ', 'BESG860331MJCCLL00', 3929224680, '', 'vin_ocotlan@tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Jefe (a) del Departamento de Gestión Tecnológica y Vinculación '),
(117, 'Karina Fabiola', 'Jiménez', 'JIOK751004MDFMLR06', 5544905607, '', 'subvinculacion@cuautitlan.tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Subdirector (a) de Planeación y Vinculación'),
(118, 'LOLY VICTORIA', 'TENORIO', 'TERL810530MYNNDL00', 9831209665, '', 'vin_chetumal@tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Jefe (a) del Departamento de Gestión Tecnológica y Vinculación '),
(119, 'Jhacer Kharen', 'Ruiz ', 'RUGJ821018MMNZRH05', 7223967206, '', 'jhacer.rg@zitacuaro.tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Otro (a)'),
(120, 'CITLALLI IRAIS', 'MARTINEZ', 'MASC850205MTCRBT04', 9931608948, '', 'vin_villahermosa@tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Jefe (a) del Departamento de Gestión Tecnológica y Vinculación '),
(121, 'Santiago Javier', 'Ayuso', 'AUAS720506HCCYGN05', 9818290573, '', 'vin_lerma@tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Jefe (a) del Departamento de Gestión Tecnológica y Vinculación '),
(122, 'Paulina Amaranta ', 'Bórquez ', 'Bodp900222d72', 7445886952, '', 'Vin_acapulco@tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Jefe (a) del Departamento de Gestión Tecnológica y Vinculación '),
(123, 'Areli Soledad', 'Ruiz', 'RUMA831211MMSZRR03', 7351260664, '', 'vin_cuautla.tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Jefe (a) del Departamento de Gestión Tecnológica y Vinculación '),
(124, 'Maricela ', 'Gallegos ', 'GACM680201MGRLVR08', 7451032304, '', 'vin_smarcos@tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Jefe (a) del Departamento de Gestión Tecnológica y Vinculación '),
(125, 'Plácido', 'Hernández', 'HEMP871005HSPRRL04', 4831081139, '', 'jdrp@tamazunchale.tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Otro (a)'),
(126, 'Arturo ', 'Martínez ', 'MAHA870112HCLRYR00', 8661166769, '', 'arturo.martinez@monclova.tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Otro (a)'),
(127, 'Julián José', 'López', 'LOOJ820516HDGPLL05', 6181571191, '', 'julian.lo@regionllanos.tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Otro (a)'),
(128, 'Rodrigo ', 'Garcia', 'GAHR711125HOCRRD07', 6381097847, '', 'rodrigo.gh@puertopenasco.tecnm.m,x', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Subdirector (a) Académico (a)'),
(129, 'Jesús Rafael', 'Sesatty', 'SESJ840528HCLSNS00', 8611047437, '', 'jesus.sesatty@tecmuzquiz.edu.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Jefe (a) del Departamento de Gestión Tecnológica y Vinculación '),
(130, 'Mirna Montserrat', 'Alpuche', 'AUGM961225MCCLMR13', 9961026430, '', 'mirna.ag@hopelchen.tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Otro (a)'),
(131, 'PEDRO', 'MURO', 'MUZP720128HZSRXD07', 4981009328, '', 'pedro.mz@zacatecasnte.tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Director (a) de Planeación y Vinculación'),
(132, 'Adelfina', 'Alquicira', 'AUAA631209MMNLVD05', 4432133067, '', 'adelfina.aa@vmorelia.tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Jefe (a) del Departamento de Gestión Tecnológica y Vinculación '),
(133, 'MARIA SUGEL', 'LOPEZ', 'LOAS780124MMNPGG03', 4591229733, '', 'vin_dtacambaro@tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Jefe (a) del Departamento de Gestión Tecnológica y Vinculación '),
(134, 'Fernando Eligio', 'Compeán ', 'COEF620528HDGMSR00', 6181586730, '', 'fernando.ce@vguadiana.tecnm,mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Jefe (a) de Oficina de Servicios Externos'),
(135, 'Jenny Jesús', 'Márquez', 'MADJ780224MVZRZN02', 2971040572, '', 'dep_@alvarado.tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Subdirector (a) Académico (a)'),
(136, 'MAYRELY', 'NAVA', 'NAGM761007HM0', 7711984515, '', 'vin_huejutla@tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Jefe (a) del Departamento de Gestión Tecnológica y Vinculación '),
(137, 'ADRIANA', 'LARA ', 'LALA860413MOCRPD09', 9711407214, '', 'ss@salinacruz.tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Otro (a)'),
(138, 'José René', 'Pérez', 'PECR750117HCHRHN06', 6291104056, '', 'jrperez@cdjimenez.tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Jefe (a) del Departamento de Gestión Tecnológica y Vinculación '),
(139, 'VICTOR MANUEL ', 'VALENZUELA', 'VAAV720224HSRLLC00', 6333348328, '', 'vin_aguaprieta@tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Jefe (a) del Departamento de Gestión Tecnológica y Vinculación '),
(140, 'Froilan Guadalupe ', 'Gomez ', 'GOCF821204HYNMNR07', 9991777370, '', 'jefevinculacion@progreso.tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Jefe (a) del Departamento de Gestión Tecnológica y Vinculación '),
(141, 'LIZETH', 'ALVAREZ', 'AAVL801204MSLLLZ09', 6871255770, '', 'dep_via@guasave.tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Otro (a)'),
(142, 'JOSÉ ANTONIO', 'LANDA ', 'LASA770324HVZNNN08', 2288377926, '', 'vinculacion_djcarranza@itsjc.edu.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Jefe (a) del Departamento de Gestión Tecnológica y Vinculación '),
(143, 'Elvia Rosa ', 'Ozuna ', 'OUCE880204MNLZRL09', 8211218954, '', 'eozuna@itlinares.edu.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Docente'),
(144, 'Wendy', 'Mondragón ', 'MOMW780306MGTNRN09', 4612002850, '', 'subdireccion.ac@roque.tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Subdirector (a) Académico (a)'),
(145, 'BIANCA YUDIRIA', 'MURILLO', 'MUAV870602MBSRVN01', 6151041958, '', 'bianca.ma@mulege.tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Docente'),
(146, 'Elizabeth', 'Gutiérrez', 'GUAE681023UB8', 6561766972, '', 'jefatura_da@cdjuarez.tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Otro (a)'),
(147, 'Francisco Gerardo ', 'Villarreal ', 'VILF890531HZSLNR01', 4631039153, '', 'gestion.vinculacion@itsn.edu.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Jefe (a) del Departamento de Gestión Tecnológica y Vinculación '),
(148, 'ALEJANDRO ', 'FRIAS ', 'FICA830309HJCRSL07', 3321816512, '', 'vin_tlajomulco@tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Jefe (a) del Departamento de Gestión Tecnológica y Vinculación '),
(149, 'Karla Ivón ', 'Moctezuma ', 'MOHK900620MVZCRR03', 2961040323, '', 'karla.mh@ugalvan.tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Otro (a)'),
(150, 'GILBERTO', 'CANCHE', 'CACG770203HQRNHL05', 9831060149, '', 'g.canche@itscarrillopuerto.edu.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Subdirector (a) de Planeación y Vinculación'),
(151, 'JOSÉ', 'LUNA', 'LUHJ580723HDFNRS09', 5564165851, '', 'jose.lh@iztapalapa3.tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Docente'),
(152, 'Jesús Eduardo ', 'Villegas ', 'VIMJ710725HMNLRS06', 3521116222, '', 'vin_piedad@tecnm.mx ', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Jefe (a) del Departamento de Gestión Tecnológica y Vinculación '),
(153, 'ALMA LETICIA', 'RAMOS ', 'RARA610428MDGMSL03', 8714144741, '', 'acad_laguna@tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Subdirector (a) Académico (a)'),
(154, 'Sonia Guadalupe', 'Aguilar ', 'AUMS761205MHGGRN09', 7712211493, '', 'subdir_vinculacion@itesa.edu.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Otro (a)'),
(155, 'Sergio ', 'Vivas ', 'VIHS861008HGRVRR05', 7671026640, '', 'plan_cdaltamirano@tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Subdirector (a) de Planeación y Vinculación'),
(156, 'Mayra Isabel ', 'MENDOZA', 'MELM790107MVZNGY01', 9862256057, '', 'vin_tizimin@tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Jefe (a) del Departamento de Gestión Tecnológica y Vinculación '),
(157, 'Jesús Alberto ', 'Cilias', 'Cihj710121hvzlrs00', 2721220919, '', 'Jesus.ch@orizaba.tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Jefe (a) del Departamento de Gestión Tecnológica y Vinculación '),
(158, 'JAIME', 'RODRIGUEZ', 'ROCJ621108HDGDSM09', 8711413232, '', 'subdireccionacademica@itslerdo.edu.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Subdirector (a) Académico (a)'),
(159, 'GUSTAVO ', 'GARCÍA ', 'GABG821011HPLRRS04', 2361234554, '', 'vin_itssna@ajalpan.tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Jefe (a) del Departamento de Gestión Tecnológica y Vinculación '),
(160, 'SANDRA LUZ', 'ESPINOZA', 'EIPS700605MPLSRN02', 8711769949, '', 'sandra.ep@torreon.tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Otro (a)'),
(161, 'Jesús Guillermo', 'Rivera', 'RIZJ770727HVZVMS09', 7891075241, '', 'guillermo.rivera@itsta.edu.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Director (a) de Planeación y Vinculación'),
(162, 'Francisco', 'León ', 'LESF760720HDFNNR04', 4434407644, '', 'biblioteca@puruandiro.tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Otro (a)'),
(163, 'AÍDA ', 'HERNÁNDEZ', 'HEAA601108MCLRVD04', 8787912767, '', 'plan_piedrasnegras@tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Subdirector (a) de Planeación y Vinculación'),
(164, 'Enrique Orlando ', 'Rodríguez ', 'ROSE790118HDGDNN00', 6741173041, '', 'enrique.rs@spapasquiaro.tec.mn', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Subdirector (a) de Planeación y Vinculación'),
(165, 'JUAN ', 'DE LA CRUZ ', 'CUMJ800620HTCRYN05', 9932029767, '', 'juan.cm@zolmeca.tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Jefe (a) del Departamento de Gestión Tecnológica y Vinculación '),
(166, 'MARIA VALERIA', 'MONTIEL', 'MOMV560703MTLNRL11', 2411198075, '', 'gestion@apizaco.tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Jefe (a) del Departamento de Gestión Tecnológica y Vinculación '),
(167, 'Adelina', 'Xocua', 'XOGA850829MVZCND04', 2781044509, '', 'dept_serviciosocial@zongolica.tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Otro (a)'),
(168, 'MARTHA ADELFA', 'AVALOS ', 'AAPM630829MTSVGR04', 8341119271, '', 'vin_cdvictoria.tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Jefe (a) del Departamento de Gestión Tecnológica y Vinculación '),
(169, 'Nancy', 'Vázquez ', 'VABN780421MHGZRN06', 7721339963, '', 'vin_atitalaquia@tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Jefe (a) del Departamento de Gestión Tecnológica y Vinculación '),
(170, 'Juan José', 'Robles', 'ROCJ771124HSPBNN05', 4881455163, '', 'juan.rc@matehuala.tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Otro (a)'),
(171, 'Alejandra Paola ', 'Borquez Lopez ', 'BOLA820629MSRRPL02', 6441970376, '', 'plan_vyaqui@tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Subdirector (a) de Planeación y Vinculación'),
(172, 'YARENTZI  ', 'GÓMEZ ', 'GOCY851030MPLMMR05', 5568609767, '', 'vinculacion@puebla.tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Jefe (a) del Departamento de Gestión Tecnológica y Vinculación '),
(173, 'Belinda Virginia ', 'Lamadrid ', 'LABB750531MSRMRL02', 6441263050, '', 'blamadrid@itesca.edu.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Jefe (a) de Proyectos de Investigación'),
(174, 'Gabriela', 'Rodríguez ', 'ROSG830320MTSDGB01 ', 8671000850, '', 'gabriela.rs@nlaredo.tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Docente'),
(175, 'JAZMIN', 'JAUREGUI', 'JAAJ280686MTCRRZ07', 9331013442, '', 'servicio_residencia@comalcalco.tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Otro (a)'),
(176, 'Daniel ', 'Carbajal', 'CADD8712148HOCRZN02', 9531103297, '', 'daniel_cd@itlaxiaco.tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Jefe (a) del Departamento de Gestión Tecnológica y Vinculación '),
(177, 'María Teresa ', 'Tejeda ', 'TEJT701206MDFJMR08', 4811135632, '', 'lenguas.extranjeras@tecvalles.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Jefe (a) de Oficina de Servicios Externos'),
(178, 'Angel', 'Hernández', 'HEBA630804HVZRRN06', 2722100836, '', 'vin_crodeorizaba@tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Jefe (a) del Departamento de Gestión Tecnológica y Vinculación '),
(179, 'Gabriela', 'Aguilar', 'AUOG760403MOCGRB08', 9515691022, '', 'plan_oaxaca@tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Subdirector (a) de Planeación y Vinculación'),
(180, 'Juana ', 'Alonso', 'AOOJ801229MPLSSN09', 2441097288, '', 'juana.alonso@itsatlixco.edu.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Otro (a)'),
(181, 'MARÍA ANGÉLICA ', 'CRUZ', 'CUCA700207MDFRMN08', 7731325737, '', 'macruz@iteshu.edu.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Otro (a)'),
(182, 'JOSE AGUSTIN', 'CARRIZALES', 'CAOA680304HVZRLG09', 8332454149, '', 'asgustin.carrizales@itspanuco.edu.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Otro (a)'),
(183, 'Mónica', 'Ortiz ', 'OIMM730319MQTRDN05', 4421575356, '', 'dgtyv_serviciosocial@queretaro.tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Otro (a)'),
(184, 'Victor Manuel ', 'R de León ', 'Rxgv780926hqrxrc06', 9831834201, '', 'Vin_zmaya@tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Jefe (a) del Departamento de Gestión Tecnológica y Vinculación '),
(185, 'JOSE DE LOS SANTOS', 'EVIA', 'EICS640830HCCVHN02', 9811161227, '', 'jevia@itescam.edu.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Jefe (a) del Departamento de Gestión Tecnológica y Vinculación '),
(186, 'Alejandro Martínez Santiago', 'Martínez', 'MASA901016HHGRNL02', 5527510831, '', 'alejandro.ms@jilotepec.tecnm.mx', '$2y$10$19tsorOCjhdOTqAe2arGYeIPbYUIP7lp/keOl0P2t6TDdcKM4zodG', 2, 'Docente'),
(187, 'mariam', 'sol', 'VAGC980101HGRLNN02', 7331701927, 'mar@gmail.com', 'mar.sm@example.com', '$2y$10$uS1u2xrn73n5JNb5c6BGxuvYEkL.RvAJia0PMQGlPCV7gVCWtR2Km', 4, 'nada'),
(188, 'maria', 'ines', 'VAGC980101HGRLNN02', 7331701927, 'maria@gmail.com', 'maria.ines@tecnm.mx', '$2y$10$TMK23IClz55lzh1Oc92i/OJvkOG.JcRxRJUef.f/Za9v/5ecez2Xa', 4, 'nada'),
(189, 'Eliezer', 'Solano Martinez', 'SOME001120HGRLRLA2', 7331701927, 'develiezermartinez@gmail.com', 'elie@tecnm.mx', '$2y$10$opxr7ma.gDAh0q2TlFgE4u2i2xjn.UstofVbcMpqxWI/OI2Cnxtdy', 4, 'Egresado'),
(190, 'dbtmf', 'bbtb', 'MOJI430121MGRNMN02', 7331701927, 'elie@tecnm.mx', 'elie@tecnm.mx', '$2y$10$D38m7ieuEao.G77JGGJqnOKqJCmyBIws1t5fERFJF6nCCTeclrLP.', 4, 'dev'),
(191, 'Eliezer', 'Solano Martinez', 'SOME001120HGRLRLA2', 7331701927, 'develiezermartinez@gmail.com', 'elie@tecnm.mx', '$2y$10$aDUZPKCX.5wUH5qrF.Xm.OFXe.vVGKANh43bd8sklHvhGZSHCatCS', 4, 'dev'),
(192, 'Yacsisiri', 'sALINAS CORTEZ', 'MOJI430121MGRNMN02', 54646846468, 'YACS@tecnm.mx', 'YACS@tecnm.mx', '$2y$10$fRNbvnuyPfyt5sfLfOGiy.XbarG2ywrxTW5QcUgF7Fuep96jebKRq', 4, 'homer'),
(193, 'Luis', 'Martinez Montoya', 'LUICASO1204123', 54646846468, 'LUIGI.MEMO@example.com', 'luigi@tecnm.mx', '$2y$10$/b.FxC9/LBQYGwd9mAAvbuai5a8lD.tmsFzNrIbUaaImc/e4eZxVm', 4, 'admin'),
(194, 'Modesto', 'Valdez', 'MODE430121MGRNMN02', 7331701927, 'modesto@gmail.com', 'modesto@gmail.com', '$2y$10$8RvQLxe8zYwGKjQiCf9u9O0BLZvC0sqHjoYq43Av3P4/IGO6zzxli', 4, 'dev');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `coordinadores_nacionales`
--
ALTER TABLE `coordinadores_nacionales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `coordinadores_programa`
--
ALTER TABLE `coordinadores_programa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `coordinadores_regionales`
--
ALTER TABLE `coordinadores_regionales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `educadores`
--
ALTER TABLE `educadores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `niveles`
--
ALTER TABLE `niveles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `programas`
--
ALTER TABLE `programas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `programa_educadores`
--
ALTER TABLE `programa_educadores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `regiones`
--
ALTER TABLE `regiones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tecnologicos`
--
ALTER TABLE `tecnologicos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `coordinadores_nacionales`
--
ALTER TABLE `coordinadores_nacionales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `coordinadores_programa`
--
ALTER TABLE `coordinadores_programa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT de la tabla `coordinadores_regionales`
--
ALTER TABLE `coordinadores_regionales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `educadores`
--
ALTER TABLE `educadores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `niveles`
--
ALTER TABLE `niveles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `programas`
--
ALTER TABLE `programas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `programa_educadores`
--
ALTER TABLE `programa_educadores`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `regiones`
--
ALTER TABLE `regiones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tecnologicos`
--
ALTER TABLE `tecnologicos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
