-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-01-2025 a las 04:35:02
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
(1, 17, 91);

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
(1, 20, 91);

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
(1, 18, 'Estudiante', 'Servicio Social Comunitario', 12345678, 101, 15, 6);

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
(1, 'Aguascalientes', 4),
(2, 'Baja California', 1),
(3, 'Baja California Sur', 1),
(4, 'Campeche', 5),
(5, 'Chiapas', 2),
(6, 'Chihuahua', 1),
(7, 'Ciudad de México', 3),
(8, 'Coahuila', 1),
(9, 'Colima', 4),
(10, 'Durango', 1),
(11, 'Guanajuato', 3),
(12, 'Guerrero', 2),
(13, 'Hidalgo', 3),
(14, 'Jalisco', 4),
(15, 'Estado de México', 3),
(16, 'Michoacán', 4),
(17, 'Morelos', 3),
(18, 'Nayarit', 4),
(19, 'Nuevo León', 1),
(20, 'Oaxaca', 2),
(21, 'Puebla', 3),
(22, 'Querétaro', 3),
(23, 'Quintana Roo', 5),
(24, 'San Luis Potosí', 3),
(25, 'Sinaloa', 1),
(26, 'Sonora', 1),
(27, 'Tabasco', 5),
(28, 'Tamaulipas', 1),
(29, 'Tlaxcala', 3),
(30, 'Veracruz', 5),
(31, 'Yucatán', 5),
(32, 'Zacatecas', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `programa_id` bigint(20) NOT NULL,
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

INSERT INTO `estudiantes` (`id`, `programa_id`, `nombre`, `apellidos`, `domicilio`, `curp`, `telefono`, `correo`) VALUES
(1, 1, 'Juan', 'Pérez López', 'Calle 123, Colonia Centro, Ciudad de México', 'PELO920304HDFRRN01', 5551234567, 'juan.perez@example.com'),
(2, 1, 'María', 'González Ramírez', 'Av. Reforma 456, Guadalajara, Jalisco', 'GORM850615MJCLZR05', 5559876543, 'maria.gonzalez@example.com'),
(3, 1, 'Carlos', 'López Martínez', 'Calle Insurgentes 789, Monterrey, Nuevo León', 'LOMC960720HNLPRL08', 5556543210, 'carlos.lopez@example.com');

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
(1, 'Básico', 'Nivel educativo inicial que incluye primaria y secundaria'),
(2, 'Medio Superior', 'Nivel educativo intermedio que incluye preparatoria o bachillerato'),
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
  `id_coordinador` bigint(20) NOT NULL,
  `id_educador` bigint(20) NOT NULL,
  `inicio_periodo` date NOT NULL,
  `fin_periodo` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `programas`
--

INSERT INTO `programas` (`id`, `nombre`, `descripcion`, `id_tecnologico`, `id_nivel`, `meta`, `id_coordinador`, `id_educador`, `inicio_periodo`, `fin_periodo`) VALUES
(1, 'Aprende a leer y escribir II', 'Programa para aprender a leer y escribir', 91, 1, 25, 1, 1, '2025-01-01', '2025-01-30');

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
(1, 'Norte'),
(2, 'Sur'),
(3, 'Centro'),
(4, 'Occidente'),
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE `solicitudes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL,
  `id_programa` bigint(20) NOT NULL,
  `id_estudiante` bigint(20) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `solicitudes`
--

INSERT INTO `solicitudes` (`id`, `status`, `id_programa`, `id_estudiante`, `fecha`) VALUES
(1, 'Pendiente', 1, 1, '2025-01-16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tecnologicos`
--

CREATE TABLE `tecnologicos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `estado_id` bigint(20) NOT NULL,
  `modalidad` varchar(255) NOT NULL,
  `director` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tecnologicos`
--

INSERT INTO `tecnologicos` (`id`, `nombre`, `estado_id`, `modalidad`, `director`) VALUES
(1, 'Instituto Tecnológico de Aguascalientes', 1, 'Escolarizada', NULL),
(2, 'Instituto Tecnológico de Pabellón de Arteaga', 1, 'Abierta', NULL),
(3, 'Instituto Tecnológico El Llano Aguascalientes', 1, 'Escolarizada', NULL),
(4, 'Instituto Tecnológico de Ensenada', 2, 'Escolarizada', NULL),
(5, 'Instituto Tecnológico de Mexicali', 2, 'Escolarizada', NULL),
(6, 'Instituto Tecnológico de Tijuana', 2, 'Escolarizada', NULL),
(7, 'Instituto Tecnológico de Estudios Superiores de Los Cabos', 3, 'Escolarizada', NULL),
(8, 'Instituto Tecnológico de La Paz', 3, 'Escolarizada', NULL),
(9, 'Instituto Tecnológico Superior de Ciudad Constitución', 3, 'Escolarizada', NULL),
(10, 'Instituto Tecnológico Superior de Mulegé', 3, 'Escolarizada', NULL),
(11, 'Instituto Tecnológico de Campeche', 4, 'Escolarizada', NULL),
(12, 'Instituto Tecnológico de Chiná', 4, 'Escolarizada', NULL),
(13, 'Instituto Tecnológico de Lerma', 4, 'Escolarizada', NULL),
(14, 'Instituto Tecnológico Superior de Calkiní', 4, 'Escolarizada', NULL),
(15, 'Instituto Tecnológico Superior de Champotón', 4, 'Escolarizada', NULL),
(16, 'Instituto Tecnológico Superior de Escárcega', 4, 'Escolarizada', NULL),
(17, 'Instituto Tecnológico Superior de Hopelchén', 4, 'Escolarizada', NULL),
(18, 'Instituto Tecnológico de Comitán', 5, 'Escolarizada', NULL),
(19, 'Instituto Tecnológico de Frontera Comalapa', 5, 'Escolarizada', NULL),
(20, 'Instituto Tecnológico de Tapachula', 5, 'Escolarizada', NULL),
(21, 'Instituto Tecnológico de Tuxtla Gutiérrez', 5, 'Escolarizada', NULL),
(22, 'Instituto Tecnológico Superior de Cintalapa', 5, 'Escolarizada', NULL),
(23, 'Instituto Tecnológico de Chihuahua', 6, 'Escolarizada', NULL),
(24, 'Instituto Tecnológico de Chihuahua II', 6, 'Escolarizada', NULL),
(25, 'Instituto Tecnológico de Ciudad Cuauhtémoc', 6, 'Escolarizada', NULL),
(26, 'Instituto Tecnológico de Ciudad Jiménez', 6, 'Escolarizada', NULL),
(27, 'Instituto Tecnológico de Ciudad Juárez', 6, 'Escolarizada', NULL),
(28, 'Instituto Tecnológico de Delicias', 6, 'Escolarizada', NULL),
(29, 'Instituto Tecnológico de Parral', 6, 'Escolarizada', NULL),
(30, 'Instituto Tecnológico Superior de Nuevo Casas Grandes', 6, 'Escolarizada', NULL),
(31, 'Instituto Tecnológico de Álvaro Obregón', 7, 'Escolarizada', NULL),
(32, 'Instituto Tecnológico de Gustavo A. Madero', 7, 'Escolarizada', NULL),
(33, 'Instituto Tecnológico de Gustavo A. Madero II', 7, 'Escolarizada', NULL),
(34, 'Instituto Tecnológico de Iztapalapa', 7, 'Escolarizada', NULL),
(35, 'Instituto Tecnológico de Iztapalapa II', 7, 'Escolarizada', NULL),
(36, 'Instituto Tecnológico de Iztapalapa III', 7, 'Escolarizada', NULL),
(37, 'Instituto Tecnológico de Milpa Alta', 7, 'Escolarizada', NULL),
(38, 'Instituto Tecnológico de Milpa Alta II', 7, 'Escolarizada', NULL),
(39, 'Instituto Tecnológico de Tláhuac', 7, 'Escolarizada', NULL),
(40, 'Instituto Tecnológico de Tláhuac II', 7, 'Escolarizada', NULL),
(41, 'Instituto Tecnológico de Tláhuac III', 7, 'Escolarizada', NULL),
(42, 'Instituto Tecnológico de Tlalpan', 7, 'Escolarizada', NULL),
(43, 'Instituto Tecnológico de Estudios Superiores de La Región Carbonífera', 8, 'Escolarizada', NULL),
(44, 'Instituto Tecnológico de La Laguna', 8, 'Escolarizada', NULL),
(45, 'Instituto Tecnológico de Piedras Negras', 8, 'Escolarizada', NULL),
(46, 'Instituto Tecnológico de Saltillo', 8, 'Escolarizada', NULL),
(47, 'Instituto Tecnológico de Torreón', 8, 'Escolarizada', NULL),
(48, 'Instituto Tecnológico Superior de Ciudad Acuña', 8, 'Escolarizada', NULL),
(49, 'Instituto Tecnológico Superior de Monclova', 8, 'Escolarizada', NULL),
(50, 'Instituto Tecnológico Superior de Múzquiz', 8, 'Escolarizada', NULL),
(51, 'Instituto Tecnológico Superior de San Pedro de las Colonias', 8, 'Escolarizada', NULL),
(52, 'Instituto Tecnológico de Colima', 9, 'Escolarizada', NULL),
(53, 'Instituto Tecnológico de Durango', 10, 'Escolarizada', NULL),
(54, 'Instituto Tecnológico de El Salto', 10, 'Escolarizada', NULL),
(55, 'Instituto Tecnológico del Valle del Guadiana', 10, 'Escolarizada', NULL),
(56, 'Instituto Tecnológico Superior de La Región de los Llanos', 10, 'Escolarizada', NULL),
(57, 'Instituto Tecnológico Superior de Lerdo', 10, 'Escolarizada', NULL),
(58, 'Instituto Tecnológico Superior de Santa María del Oro', 10, 'Escolarizada', NULL),
(59, 'Instituto Tecnológico Superior de Santiago Papasquiaro', 10, 'Escolarizada', NULL),
(60, 'Instituto Tecnológico de Tlalnepantla', 15, 'Escolarizada', NULL),
(61, 'Instituto Tecnológico de Toluca', 15, 'Escolarizada', NULL),
(62, 'Tecnológico de Estudios Superiores de Chalco', 15, 'Escolarizada', NULL),
(63, 'Tecnológico de Estudios Superiores de Chicoloapan', 15, 'Escolarizada', NULL),
(64, 'Tecnológico de Estudios Superiores de Chimalhuacán', 15, 'Escolarizada', NULL),
(65, 'Tecnológico de Estudios Superiores de Coacalco', 15, 'Escolarizada', NULL),
(66, 'Tecnológico de Estudios Superiores de Cuautitlán Izcalli', 15, 'Escolarizada', NULL),
(67, 'Tecnológico de Estudios Superiores de Ecatepec', 15, 'Escolarizada', NULL),
(68, 'Tecnológico de Estudios Superiores de Huixquilucan', 15, 'Escolarizada', NULL),
(69, 'Tecnológico de Estudios Superiores de Ixtapaluca', 15, 'Escolarizada', NULL),
(70, 'Tecnológico de Estudios Superiores de Jilotepec', 15, 'Escolarizada', NULL),
(71, 'Tecnológico de Estudios Superiores de Jocotitlán', 15, 'Escolarizada', NULL),
(72, 'Tecnológico de Estudios Superiores de Oriente del Estado de México', 15, 'Escolarizada', NULL),
(73, 'Tecnológico de Estudios Superiores de San Felipe del Progreso', 15, 'Escolarizada', NULL),
(74, 'Tecnológico de Estudios Superiores de Tianguistenco', 15, 'Escolarizada', NULL),
(75, 'Tecnológico de Estudios Superiores de Valle de Bravo', 15, 'Escolarizada', NULL),
(76, 'Tecnológico de Estudios Superiores de Villa Guerrero', 15, 'Escolarizada', NULL),
(77, 'Instituto Tecnológico de Celaya', 11, 'Escolarizada', NULL),
(78, 'Instituto Tecnológico de León', 11, 'Escolarizada', NULL),
(79, 'Instituto Tecnológico de Roque', 11, 'Escolarizada', NULL),
(80, 'Instituto Tecnológico Superior de Abasolo', 11, 'Escolarizada', NULL),
(81, 'Instituto Tecnológico Superior de Guanajuato', 11, 'Escolarizada', NULL),
(82, 'Instituto Tecnológico Superior de Irapuato', 11, 'Escolarizada', NULL),
(83, 'Instituto Tecnológico Superior de Purísima Del Rincón', 11, 'Escolarizada', NULL),
(84, 'Instituto Tecnológico Superior de Salvatierra', 11, 'Escolarizada', NULL),
(85, 'Instituto Tecnológico Superior de Sur de Guanajuato', 11, 'Escolarizada', NULL),
(86, 'Instituto Tecnológico de Acapulco', 12, 'Escolarizada', NULL),
(87, 'Instituto Tecnológico de Chilpancingo', 12, 'Escolarizada', NULL),
(88, 'Instituto Tecnológico de Ciudad Altamirano', 12, 'Escolarizada', NULL),
(89, 'Instituto Tecnológico de Costa Grande', 12, 'Escolarizada', NULL),
(90, 'Instituto Tecnológico de Iguala', 12, 'Escolarizada', NULL),
(91, 'Instituto Tecnológico de San Marcos', 12, 'Escolarizada', 'Victor Hugo Agaton Catalan'),
(92, 'Instituto Tecnológico Superior de La Costa Chica', 12, 'Escolarizada', NULL),
(93, 'Instituto Tecnológico Superior de La Montaña', 12, 'Escolarizada', NULL),
(94, 'Instituto Tecnológico de Atitalaquia', 13, 'Escolarizada', NULL),
(95, 'Instituto Tecnológico de Huejutla', 13, 'Escolarizada', NULL),
(96, 'Instituto Tecnológico de Pachuca', 13, 'Escolarizada', NULL),
(97, 'Instituto Tecnológico Superior de Huichapan', 13, 'Escolarizada', NULL),
(98, 'Instituto Tecnológico Superior de Occidente del Estado de Hidalgo', 13, 'Escolarizada', NULL),
(99, 'Instituto Tecnológico Superior de Oriente del Estado de Hidalgo', 13, 'Escolarizada', NULL),
(100, 'Instituto Tecnológico de Ciudad Guzmán', 14, 'Escolarizada', NULL),
(101, 'Instituto Tecnológico de Ocotlán', 14, 'Escolarizada', NULL),
(102, 'Instituto Tecnológico de Tlajomulco', 14, 'Escolarizada', NULL),
(103, 'Instituto Tecnológico José Mario Molina Pasquel y Henríquez Unidad Arandas', 14, 'Escolarizada', NULL),
(104, 'Instituto Tecnológico José Mario Molina Pasquel y Henríquez Unidad Chapala', 14, 'Escolarizada', NULL),
(105, 'Instituto Tecnológico José Mario Molina Pasquel y Henríquez Unidad Cocula', 14, 'Escolarizada', NULL),
(106, 'Instituto Tecnológico José Mario Molina Pasquel y Henríquez Unidad El Grullo', 14, 'Escolarizada', NULL),
(107, 'Instituto Tecnológico José Mario Molina Pasquel y Henríquez Unidad La Huerta', 14, 'Escolarizada', NULL),
(108, 'Instituto Tecnológico José Mario Molina Pasquel y Henríquez Unidad Lagos de Moreno', 14, 'Escolarizada', NULL),
(109, 'Instituto Tecnológico José Mario Molina Pasquel y Henríquez Unidad Mascota', 14, 'Escolarizada', NULL),
(110, 'Instituto Tecnológico José Mario Molina Pasquel y Henríquez Unidad Puerto Vallarta', 14, 'Escolarizada', NULL),
(111, 'Instituto Tecnológico José Mario Molina Pasquel y Henríquez Unidad Tala', 14, 'Escolarizada', NULL),
(112, 'Instituto Tecnológico José Mario Molina Pasquel y Henríquez Unidad Tamazula de Gordiano', 14, 'Escolarizada', NULL),
(113, 'Instituto Tecnológico José Mario Molina Pasquel y Henríquez Unidad Tequila', 14, 'Escolarizada', NULL),
(114, 'Instituto Tecnológico José Mario Molina Pasquel y Henríquez Unidad Zapopan', 14, 'Escolarizada', NULL),
(115, 'Instituto Tecnológico José Mario Molina Pasquel y Henríquez Unidad Zapotlanejo', 14, 'Escolarizada', NULL),
(116, 'Instituto Tecnológico de Jiquilpan', 16, 'Escolarizada', NULL),
(117, 'Instituto Tecnológico de La Piedad', 16, 'Escolarizada', NULL),
(118, 'Instituto Tecnológico de Lázaro Cárdenas', 16, 'Escolarizada', NULL),
(119, 'Instituto Tecnológico de Morelia', 16, 'Abierta', NULL),
(120, 'Instituto Tecnológico de Valle de Morelia', 16, 'Escolarizada', NULL),
(121, 'Instituto Tecnológico de Zitácuaro', 16, 'Escolarizada', NULL),
(122, 'Instituto Tecnológico Superior de Apatzingán', 16, 'Escolarizada', NULL),
(123, 'Instituto Tecnológico Superior de Ciudad Hidalgo', 16, 'Escolarizada', NULL),
(124, 'Instituto Tecnológico Superior de Coalcomán', 16, 'Escolarizada', NULL),
(125, 'Instituto Tecnológico Superior de Huetamo', 16, 'Escolarizada', NULL),
(126, 'Instituto Tecnológico Superior de Los Reyes', 16, 'Escolarizada', NULL),
(127, 'Instituto Tecnológico Superior de Pátzcuaro', 16, 'Escolarizada', NULL),
(128, 'Instituto Tecnológico Superior de Purhépecha', 16, 'Escolarizada', NULL),
(129, 'Instituto Tecnológico Superior de Puruándiro', 16, 'Escolarizada', NULL),
(130, 'Instituto Tecnológico Superior de Tacámbaro', 16, 'Escolarizada', NULL),
(131, 'Instituto Tecnológico Superior de Uruapan', 16, 'Escolarizada', NULL),
(132, 'Instituto Tecnológico Superior de Zamora', 16, 'Escolarizada', NULL),
(133, 'Centro Nacional de Investigación y Desarrollo Tecnológico', 17, 'Escolarizada', NULL),
(134, 'Instituto Tecnológico de Cuautla', 17, 'Escolarizada', NULL),
(135, 'Instituto Tecnológico de Zacatepec', 17, 'Escolarizada', NULL),
(136, 'Instituto Tecnológico de Bahía de Banderas', 18, 'Escolarizada', NULL),
(137, 'Instituto Tecnológico de Norte de Nayarit', 18, 'Escolarizada', NULL),
(138, 'Instituto Tecnológico de Sur de Nayarit', 18, 'Escolarizada', NULL),
(139, 'Instituto Tecnológico de Tepic', 18, 'Escolarizada', NULL),
(140, 'Instituto Tecnológico de Linares', 19, 'Escolarizada', NULL),
(141, 'Instituto Tecnológico de Nuevo León', 19, 'Escolarizada', NULL),
(142, 'Instituto Tecnológico de Comitancillo', 20, 'Escolarizada', NULL),
(143, 'Instituto Tecnológico de Istmo', 20, 'Escolarizada', NULL),
(144, 'Instituto Tecnológico de La Cuenca del Papaloapan', 20, 'Escolarizada', NULL),
(145, 'Instituto Tecnológico de Oaxaca', 20, 'Escolarizada', NULL),
(146, 'Instituto Tecnológico de Pinotepa', 20, 'Escolarizada', NULL),
(147, 'Instituto Tecnológico de Pochutla', 20, 'Escolarizada', NULL),
(148, 'Instituto Tecnológico de Salina Cruz', 20, 'Escolarizada', NULL),
(149, 'Instituto Tecnológico de Tlaxiaco', 20, 'Escolarizada', NULL),
(150, 'Instituto Tecnológico de Tuxtepec', 20, 'Escolarizada', NULL),
(151, 'Instituto Tecnológico de Valle de Etla', 20, 'Escolarizada', NULL),
(152, 'Instituto Tecnológico de Valle de Oaxaca', 20, 'Escolarizada', NULL),
(153, 'Instituto Tecnológico Superior de San Miguel el Grande', 20, 'Escolarizada', NULL),
(154, 'Instituto Tecnológico Superior de Teposcolula', 20, 'Escolarizada', NULL),
(155, 'Instituto Tecnológico de Puebla', 21, 'Escolarizada', NULL),
(156, 'Instituto Tecnológico de Tecomatlán', 21, 'Escolarizada', NULL),
(157, 'Instituto Tecnológico de Tehuacán', 21, 'Escolarizada', NULL),
(158, 'Instituto Tecnológico Superior de Acatlán de Osorio', 21, 'Escolarizada', NULL),
(159, 'Instituto Tecnológico Superior de Atlixco', 21, 'Escolarizada', NULL),
(160, 'Instituto Tecnológico Superior de Ciudad Serdán', 21, 'Escolarizada', NULL),
(161, 'Instituto Tecnológico Superior de Huauchinango', 21, 'Escolarizada', NULL),
(162, 'Instituto Tecnológico Superior de La Sierra Negra de Ajalpan', 21, 'Escolarizada', NULL),
(163, 'Instituto Tecnológico Superior de La Sierra Norte de Puebla', 21, 'Escolarizada', NULL),
(164, 'Instituto Tecnológico Superior de Libres', 21, 'Escolarizada', NULL),
(165, 'Instituto Tecnológico Superior de San Martín Texmelucan', 21, 'Escolarizada', NULL),
(166, 'Instituto Tecnológico Superior de Tepeaca', 21, 'Escolarizada', NULL),
(167, 'Instituto Tecnológico Superior de Tepexi de Rodríguez', 21, 'Escolarizada', NULL),
(168, 'Instituto Tecnológico Superior de Teziutlán', 21, 'Escolarizada', NULL),
(169, 'Instituto Tecnológico Superior de Tlatlauquitepec', 21, 'Escolarizada', NULL),
(170, 'Instituto Tecnológico Superior de Venustiano Carranza', 21, 'Escolarizada', NULL),
(171, 'Instituto Tecnológico Superior de Zacapoaxtla', 21, 'Escolarizada', NULL),
(172, 'Centro Interdisciplinario de Investigación y Docencia en Educación Técnica', 22, 'Escolarizada', NULL),
(173, 'Instituto Tecnológico de Querétaro', 22, 'Escolarizada', NULL),
(174, 'Instituto Tecnológico de San Juan del Río', 22, 'Escolarizada', NULL),
(175, 'Instituto Tecnológico de Cancún', 23, 'Escolarizada', NULL),
(176, 'Instituto Tecnológico de Chetumal', 23, 'Escolarizada', NULL),
(177, 'Instituto Tecnológico de La Zona Maya', 23, 'Escolarizada', NULL),
(178, 'Instituto Tecnológico Superior de Felipe Carrillo Puerto', 23, 'Escolarizada', NULL),
(179, 'Instituto Tecnológico de Ciudad Valles', 24, 'Escolarizada', NULL),
(180, 'Instituto Tecnológico de Matehuala', 24, 'Escolarizada', NULL),
(181, 'Instituto Tecnológico de San Luis Potosí', 24, 'Escolarizada', NULL),
(182, 'Instituto Tecnológico Superior de Ébano', 24, 'Escolarizada', NULL),
(183, 'Instituto Tecnológico Superior de Rio Verde', 24, 'Escolarizada', NULL),
(184, 'Instituto Tecnológico Superior de San Luis Potosí Capital', 24, 'Escolarizada', NULL),
(185, 'Instituto Tecnológico Superior de Tamazunchale', 24, 'Escolarizada', NULL),
(186, 'Instituto Tecnológico de Culiacán', 25, 'Escolarizada', NULL),
(187, 'Instituto Tecnológico de Los Mochis', 25, 'Escolarizada', NULL),
(188, 'Instituto Tecnológico de Mazatlán', 25, 'Escolarizada', NULL),
(189, 'Instituto Tecnológico de Sinaloa de Leyva', 25, 'Escolarizada', NULL),
(190, 'Instituto Tecnológico Superior de Eldorado', 25, 'Escolarizada', NULL),
(191, 'Instituto Tecnológico Superior de Guasave', 25, 'Escolarizada', NULL),
(192, 'Instituto Tecnológico de Agua Prieta', 26, 'Escolarizada', NULL),
(193, 'Instituto Tecnológico de Guaymas', 26, 'Escolarizada', NULL),
(194, 'Instituto Tecnológico de Hermosillo', 26, 'Escolarizada', NULL),
(195, 'Instituto Tecnológico de Huatabampo', 26, 'Escolarizada', NULL),
(196, 'Instituto Tecnológico de Nogales', 26, 'Escolarizada', NULL),
(197, 'Instituto Tecnológico de Valle del Yaqui', 26, 'Escolarizada', NULL),
(198, 'Instituto Tecnológico Superior de Cajeme', 26, 'Escolarizada', NULL),
(199, 'Instituto Tecnológico Superior de Cananea', 26, 'Escolarizada', NULL),
(200, 'Instituto Tecnológico Superior de Puerto Peñasco', 26, 'Escolarizada', NULL),
(201, 'Instituto Tecnológico de Huimanguillo', 27, 'Escolarizada', NULL),
(202, 'Instituto Tecnológico de La Chontalpa', 27, 'Escolarizada', NULL),
(203, 'Instituto Tecnológico de La Zona Olmeca', 27, 'Escolarizada', NULL),
(204, 'Instituto Tecnológico de Villahermosa', 27, 'Escolarizada', NULL),
(205, 'Instituto Tecnológico Superior de Centla', 27, 'Escolarizada', NULL),
(206, 'Instituto Tecnológico Superior de Comalcalco', 27, 'Escolarizada', NULL),
(207, 'Instituto Tecnológico Superior de La Región Sierra', 27, 'Escolarizada', NULL),
(208, 'Instituto Tecnológico Superior de Los Ríos', 27, 'Escolarizada', NULL),
(209, 'Instituto Tecnológico Superior de Macuspana', 27, 'Escolarizada', NULL),
(210, 'Instituto Tecnológico Superior de Villa La Venta', 27, 'Escolarizada', NULL),
(211, 'Instituto Tecnológico de Altamira', 28, 'Escolarizada', NULL),
(212, 'Instituto Tecnológico de Ciudad Madero', 28, 'Escolarizada', NULL),
(213, 'Instituto Tecnológico de Ciudad Victoria', 28, 'Escolarizada', NULL),
(214, 'Instituto Tecnológico de Matamoros', 28, 'Escolarizada', NULL),
(215, 'Instituto Tecnológico de Nuevo Laredo', 28, 'Escolarizada', NULL),
(216, 'Instituto Tecnológico de Reynosa', 28, 'Escolarizada', NULL),
(217, 'Instituto Tecnológico Superior de El Mante', 28, 'Escolarizada', NULL),
(218, 'Instituto Tecnológico de Apizaco', 29, 'Escolarizada', NULL),
(219, 'Instituto Tecnológico del Altiplano de Tlaxcala', 29, 'Escolarizada', NULL),
(220, 'Instituto Tecnológico Superior de Tlaxco', 29, 'Escolarizada', NULL),
(221, 'Instituto Tecnológico de Boca del Río', 30, 'Escolarizada', NULL),
(222, 'Instituto Tecnológico de Cerro Azul', 30, 'Escolarizada', NULL),
(223, 'Instituto Tecnológico de Minatitlán', 30, 'Escolarizada', NULL),
(224, 'Instituto Tecnológico de Orizaba', 30, 'Escolarizada', NULL),
(225, 'Instituto Tecnológico de Úrsulo Galván', 30, 'A Distancia', NULL),
(226, 'Instituto Tecnológico de Veracruz', 30, 'Escolarizada', NULL),
(227, 'Instituto Tecnológico Superior de Acayucan', 30, 'Escolarizada', NULL),
(228, 'Instituto Tecnológico Superior de Álamo Temapache', 30, 'Escolarizada', NULL),
(229, 'Instituto Tecnológico Superior de Alvarado', 30, 'Escolarizada', NULL),
(230, 'Instituto Tecnológico Superior de Chicontepec', 30, 'Escolarizada', NULL),
(231, 'Instituto Tecnológico Superior de Coatzacoalcos', 30, 'Escolarizada', NULL),
(232, 'Instituto Tecnológico Superior de Cosamaloapan', 30, 'Escolarizada', NULL),
(233, 'Instituto Tecnológico Superior de Huatusco', 30, 'Escolarizada', NULL),
(234, 'Instituto Tecnológico Superior de Jesús Carranza', 30, 'Escolarizada', NULL),
(235, 'Instituto Tecnológico Superior de Juan Rodríguez Clara', 30, 'Escolarizada', NULL),
(236, 'Instituto Tecnológico Superior de Las Choapas', 30, 'Escolarizada', NULL),
(237, 'Instituto Tecnológico Superior de Martínez de la Torre', 30, 'Escolarizada', NULL),
(238, 'Instituto Tecnológico Superior de Misantla', 30, 'Escolarizada', NULL),
(239, 'Instituto Tecnológico Superior de Naranjos', 30, 'Escolarizada', NULL),
(240, 'Instituto Tecnológico Superior de Pánuco', 30, 'Escolarizada', NULL),
(241, 'Instituto Tecnológico Superior de Perote', 30, 'Escolarizada', NULL),
(242, 'Instituto Tecnológico Superior de Poza Rica', 30, 'Escolarizada', NULL),
(243, 'Instituto Tecnológico Superior de San Andrés Tuxtla', 30, 'Escolarizada', NULL),
(244, 'Instituto Tecnológico Superior de Tantoyuca', 30, 'Escolarizada', NULL),
(245, 'Instituto Tecnológico Superior de Tierra Blanca', 30, 'Escolarizada', NULL),
(246, 'Instituto Tecnológico Superior de Xalapa', 30, 'Escolarizada', NULL),
(247, 'Instituto Tecnológico Superior de Zongolica', 30, 'Escolarizada', NULL),
(248, 'Instituto Tecnológico de Conkal', 31, 'Escolarizada', NULL),
(249, 'Instituto Tecnológico de Mérida', 31, 'Escolarizada', NULL),
(250, 'Instituto Tecnológico de Tizimín', 31, 'Escolarizada', NULL),
(251, 'Instituto Tecnológico Superior de Motul', 31, 'Escolarizada', NULL),
(252, 'Instituto Tecnológico Superior de Progreso', 31, 'Escolarizada', NULL),
(253, 'Instituto Tecnológico Superior de Sur del Estado de Yucatán', 31, 'Escolarizada', NULL),
(254, 'Instituto Tecnológico Superior de Valladolid', 31, 'Escolarizada', NULL),
(255, 'Instituto Tecnológico de Zacatecas', 32, 'Escolarizada', NULL),
(256, 'Instituto Tecnológico Superior de Fresnillo', 32, 'Escolarizada', NULL),
(257, 'Instituto Tecnológico Superior de Jerez', 32, 'Escolarizada', NULL),
(258, 'Instituto Tecnológico Superior de Loreto', 32, 'Escolarizada', NULL),
(259, 'Instituto Tecnológico Superior de Nochistlán', 32, 'Escolarizada', NULL),
(260, 'Instituto Tecnológico Superior de Zacatecas Occidente', 32, 'Escolarizada', NULL),
(261, 'Instituto Tecnológico Superior Río Grande, Zacatecas', 32, 'Escolarizada', NULL),
(262, 'Instituto Tecnológico Superior Zacatecas Sur', 32, 'Escolarizada', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `telefono` bigint(20) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `correo_inst` varchar(255) DEFAULT NULL,
  `contrasena` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `telefono`, `correo`, `correo_inst`, `contrasena`) VALUES
(16, 'Juan', 'Pérez', 5551234567, 'juan.perez@example.com', 'juan.perez@instituto.edu.mx', '$2y$10$HJPzB8MACBrRUH2Uq1qYi.4ERWQZsu1NgqKxzJ0aUAmmTKj7cJmHa'),
(17, 'María', 'González', 5559876543, 'maria.gonzalez@example.com', 'maria.gonzalez@instituto.edu.mx', '$2y$10$HJPzB8MACBrRUH2Uq1qYi.4ERWQZsu1NgqKxzJ0aUAmmTKj7cJmHa'),
(18, 'Yimmi', 'Quintana', 5556543210, 'yimmi.quintan@example.com', '', '$2y$10$HJPzB8MACBrRUH2Uq1qYi.4ERWQZsu1NgqKxzJ0aUAmmTKj7cJmHa'),
(19, 'Ramón ', 'Jiménez López', 5554567890, 'ramon.jimenez_lopez@example.com', NULL, '$2y$10$HJPzB8MACBrRUH2Uq1qYi.4ERWQZsu1NgqKxzJ0aUAmmTKj7cJmHa'),
(20, 'Victor Hugo', 'Agaton Catalan', 5558765432, 'hugo.agaton@example.com', NULL, '$2y$10$HJPzB8MACBrRUH2Uq1qYi.4ERWQZsu1NgqKxzJ0aUAmmTKj7cJmHa');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `coordinadores_regionales`
--
ALTER TABLE `coordinadores_regionales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `educadores`
--
ALTER TABLE `educadores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `niveles`
--
ALTER TABLE `niveles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `programas`
--
ALTER TABLE `programas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `programa_educadores`
--
ALTER TABLE `programa_educadores`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `regiones`
--
ALTER TABLE `regiones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tecnologicos`
--
ALTER TABLE `tecnologicos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
